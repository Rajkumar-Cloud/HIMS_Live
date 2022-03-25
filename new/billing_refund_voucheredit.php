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
$billing_refund_voucher_edit = new billing_refund_voucher_edit();

// Run the page
$billing_refund_voucher_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_refund_voucher_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbilling_refund_voucheredit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fbilling_refund_voucheredit = currentForm = new ew.Form("fbilling_refund_voucheredit", "edit");

	// Validate form
	fbilling_refund_voucheredit.validate = function() {
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
			<?php if ($billing_refund_voucher_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->id->caption(), $billing_refund_voucher_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->Name->caption(), $billing_refund_voucher_edit->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->Mobile->caption(), $billing_refund_voucher_edit->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->voucher_type->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->voucher_type->caption(), $billing_refund_voucher_edit->voucher_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->Details->caption(), $billing_refund_voucher_edit->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->ModeofPayment->caption(), $billing_refund_voucher_edit->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->Amount->caption(), $billing_refund_voucher_edit->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_refund_voucher_edit->Amount->errorMessage()) ?>");
			<?php if ($billing_refund_voucher_edit->AnyDues->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyDues");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->AnyDues->caption(), $billing_refund_voucher_edit->AnyDues->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->modifiedby->caption(), $billing_refund_voucher_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->modifieddatetime->caption(), $billing_refund_voucher_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->PatID->caption(), $billing_refund_voucher_edit->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->PatientID->caption(), $billing_refund_voucher_edit->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->PatientName->caption(), $billing_refund_voucher_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->VisiteType->Required) { ?>
				elm = this.getElements("x" + infix + "_VisiteType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->VisiteType->caption(), $billing_refund_voucher_edit->VisiteType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->VisitDate->Required) { ?>
				elm = this.getElements("x" + infix + "_VisitDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->VisitDate->caption(), $billing_refund_voucher_edit->VisitDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VisitDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_refund_voucher_edit->VisitDate->errorMessage()) ?>");
			<?php if ($billing_refund_voucher_edit->AdvanceNo->Required) { ?>
				elm = this.getElements("x" + infix + "_AdvanceNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->AdvanceNo->caption(), $billing_refund_voucher_edit->AdvanceNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->Status->caption(), $billing_refund_voucher_edit->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->Date->Required) { ?>
				elm = this.getElements("x" + infix + "_Date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->Date->caption(), $billing_refund_voucher_edit->Date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_refund_voucher_edit->Date->errorMessage()) ?>");
			<?php if ($billing_refund_voucher_edit->AdvanceValidityDate->Required) { ?>
				elm = this.getElements("x" + infix + "_AdvanceValidityDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->AdvanceValidityDate->caption(), $billing_refund_voucher_edit->AdvanceValidityDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AdvanceValidityDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_refund_voucher_edit->AdvanceValidityDate->errorMessage()) ?>");
			<?php if ($billing_refund_voucher_edit->TotalRemainingAdvance->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalRemainingAdvance");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->TotalRemainingAdvance->caption(), $billing_refund_voucher_edit->TotalRemainingAdvance->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->Remarks->caption(), $billing_refund_voucher_edit->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->SeectPaymentMode->Required) { ?>
				elm = this.getElements("x" + infix + "_SeectPaymentMode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->SeectPaymentMode->caption(), $billing_refund_voucher_edit->SeectPaymentMode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->PaidAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_PaidAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->PaidAmount->caption(), $billing_refund_voucher_edit->PaidAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->Currency->Required) { ?>
				elm = this.getElements("x" + infix + "_Currency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->Currency->caption(), $billing_refund_voucher_edit->Currency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->CardNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CardNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->CardNumber->caption(), $billing_refund_voucher_edit->CardNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->BankName->Required) { ?>
				elm = this.getElements("x" + infix + "_BankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->BankName->caption(), $billing_refund_voucher_edit->BankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->HospID->caption(), $billing_refund_voucher_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->Reception->caption(), $billing_refund_voucher_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->mrnno->caption(), $billing_refund_voucher_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_refund_voucher_edit->GetUserName->Required) { ?>
				elm = this.getElements("x" + infix + "_GetUserName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_refund_voucher_edit->GetUserName->caption(), $billing_refund_voucher_edit->GetUserName->RequiredErrorMessage)) ?>");
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
	fbilling_refund_voucheredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbilling_refund_voucheredit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbilling_refund_voucheredit.lists["x_ModeofPayment"] = <?php echo $billing_refund_voucher_edit->ModeofPayment->Lookup->toClientList($billing_refund_voucher_edit) ?>;
	fbilling_refund_voucheredit.lists["x_ModeofPayment"].options = <?php echo JsonEncode($billing_refund_voucher_edit->ModeofPayment->lookupOptions()) ?>;
	loadjs.done("fbilling_refund_voucheredit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $billing_refund_voucher_edit->showPageHeader(); ?>
<?php
$billing_refund_voucher_edit->showMessage();
?>
<form name="fbilling_refund_voucheredit" id="fbilling_refund_voucheredit" class="<?php echo $billing_refund_voucher_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_refund_voucher">
<?php if ($billing_refund_voucher->isConfirm()) { // Confirm page ?>
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="confirm" id="confirm" value="confirm">
<?php } else { ?>
<input type="hidden" name="action" id="action" value="confirm">
<?php } ?>
<input type="hidden" name="modal" value="<?php echo (int)$billing_refund_voucher_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($billing_refund_voucher_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_billing_refund_voucher_id" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_id" type="text/html"><?php echo $billing_refund_voucher_edit->id->caption() ?><?php echo $billing_refund_voucher_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->id->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_id" type="text/html"><span id="el_billing_refund_voucher_id">
<span<?php echo $billing_refund_voucher_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($billing_refund_voucher_edit->id->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_billing_refund_voucher_id" type="text/html"><span id="el_billing_refund_voucher_id">
<span<?php echo $billing_refund_voucher_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->id->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($billing_refund_voucher_edit->id->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_billing_refund_voucher_Name" for="x_Name" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_Name" type="text/html"><?php echo $billing_refund_voucher_edit->Name->caption() ?><?php echo $billing_refund_voucher_edit->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->Name->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_Name" type="text/html"><span id="el_billing_refund_voucher_Name">
<input type="text" data-table="billing_refund_voucher" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->Name->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->Name->EditValue ?>"<?php echo $billing_refund_voucher_edit->Name->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_Name" type="text/html"><span id="el_billing_refund_voucher_Name">
<span<?php echo $billing_refund_voucher_edit->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->Name->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_Name" name="x_Name" id="x_Name" value="<?php echo HtmlEncode($billing_refund_voucher_edit->Name->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_billing_refund_voucher_Mobile" for="x_Mobile" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_Mobile" type="text/html"><?php echo $billing_refund_voucher_edit->Mobile->caption() ?><?php echo $billing_refund_voucher_edit->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->Mobile->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_Mobile" type="text/html"><span id="el_billing_refund_voucher_Mobile">
<input type="text" data-table="billing_refund_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->Mobile->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->Mobile->EditValue ?>"<?php echo $billing_refund_voucher_edit->Mobile->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_Mobile" type="text/html"><span id="el_billing_refund_voucher_Mobile">
<span<?php echo $billing_refund_voucher_edit->Mobile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->Mobile->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" value="<?php echo HtmlEncode($billing_refund_voucher_edit->Mobile->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_billing_refund_voucher_voucher_type" for="x_voucher_type" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_voucher_type" type="text/html"><?php echo $billing_refund_voucher_edit->voucher_type->caption() ?><?php echo $billing_refund_voucher_edit->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->voucher_type->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_voucher_type" type="text/html"><span id="el_billing_refund_voucher_voucher_type">
<input type="text" data-table="billing_refund_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->voucher_type->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->voucher_type->EditValue ?>"<?php echo $billing_refund_voucher_edit->voucher_type->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_voucher_type" type="text/html"><span id="el_billing_refund_voucher_voucher_type">
<span<?php echo $billing_refund_voucher_edit->voucher_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->voucher_type->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" value="<?php echo HtmlEncode($billing_refund_voucher_edit->voucher_type->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_billing_refund_voucher_Details" for="x_Details" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_Details" type="text/html"><?php echo $billing_refund_voucher_edit->Details->caption() ?><?php echo $billing_refund_voucher_edit->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->Details->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_Details" type="text/html"><span id="el_billing_refund_voucher_Details">
<input type="text" data-table="billing_refund_voucher" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->Details->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->Details->EditValue ?>"<?php echo $billing_refund_voucher_edit->Details->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_Details" type="text/html"><span id="el_billing_refund_voucher_Details">
<span<?php echo $billing_refund_voucher_edit->Details->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->Details->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_Details" name="x_Details" id="x_Details" value="<?php echo HtmlEncode($billing_refund_voucher_edit->Details->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_billing_refund_voucher_ModeofPayment" for="x_ModeofPayment" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_ModeofPayment" type="text/html"><?php echo $billing_refund_voucher_edit->ModeofPayment->caption() ?><?php echo $billing_refund_voucher_edit->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->ModeofPayment->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_ModeofPayment" type="text/html"><span id="el_billing_refund_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="billing_refund_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $billing_refund_voucher_edit->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $billing_refund_voucher_edit->ModeofPayment->editAttributes() ?>>
			<?php echo $billing_refund_voucher_edit->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
		</select>
</div>
<?php echo $billing_refund_voucher_edit->ModeofPayment->Lookup->getParamTag($billing_refund_voucher_edit, "p_x_ModeofPayment") ?>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_ModeofPayment" type="text/html"><span id="el_billing_refund_voucher_ModeofPayment">
<span<?php echo $billing_refund_voucher_edit->ModeofPayment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->ModeofPayment->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" value="<?php echo HtmlEncode($billing_refund_voucher_edit->ModeofPayment->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_billing_refund_voucher_Amount" for="x_Amount" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_Amount" type="text/html"><?php echo $billing_refund_voucher_edit->Amount->caption() ?><?php echo $billing_refund_voucher_edit->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->Amount->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_Amount" type="text/html"><span id="el_billing_refund_voucher_Amount">
<input type="text" data-table="billing_refund_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->Amount->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->Amount->EditValue ?>"<?php echo $billing_refund_voucher_edit->Amount->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_Amount" type="text/html"><span id="el_billing_refund_voucher_Amount">
<span<?php echo $billing_refund_voucher_edit->Amount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->Amount->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" value="<?php echo HtmlEncode($billing_refund_voucher_edit->Amount->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_billing_refund_voucher_AnyDues" for="x_AnyDues" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_AnyDues" type="text/html"><?php echo $billing_refund_voucher_edit->AnyDues->caption() ?><?php echo $billing_refund_voucher_edit->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->AnyDues->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_AnyDues" type="text/html"><span id="el_billing_refund_voucher_AnyDues">
<input type="text" data-table="billing_refund_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->AnyDues->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->AnyDues->EditValue ?>"<?php echo $billing_refund_voucher_edit->AnyDues->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_AnyDues" type="text/html"><span id="el_billing_refund_voucher_AnyDues">
<span<?php echo $billing_refund_voucher_edit->AnyDues->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->AnyDues->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" value="<?php echo HtmlEncode($billing_refund_voucher_edit->AnyDues->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_billing_refund_voucher_PatID" for="x_PatID" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_PatID" type="text/html"><?php echo $billing_refund_voucher_edit->PatID->caption() ?><?php echo $billing_refund_voucher_edit->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->PatID->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_PatID" type="text/html"><span id="el_billing_refund_voucher_PatID">
<span<?php echo $billing_refund_voucher_edit->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->PatID->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_PatID" name="x_PatID" id="x_PatID" value="<?php echo HtmlEncode($billing_refund_voucher_edit->PatID->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_billing_refund_voucher_PatID" type="text/html"><span id="el_billing_refund_voucher_PatID">
<span<?php echo $billing_refund_voucher_edit->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->PatID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_PatID" name="x_PatID" id="x_PatID" value="<?php echo HtmlEncode($billing_refund_voucher_edit->PatID->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_billing_refund_voucher_PatientID" for="x_PatientID" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_PatientID" type="text/html"><?php echo $billing_refund_voucher_edit->PatientID->caption() ?><?php echo $billing_refund_voucher_edit->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->PatientID->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_PatientID" type="text/html"><span id="el_billing_refund_voucher_PatientID">
<input type="text" data-table="billing_refund_voucher" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->PatientID->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->PatientID->EditValue ?>"<?php echo $billing_refund_voucher_edit->PatientID->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_PatientID" type="text/html"><span id="el_billing_refund_voucher_PatientID">
<span<?php echo $billing_refund_voucher_edit->PatientID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->PatientID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" value="<?php echo HtmlEncode($billing_refund_voucher_edit->PatientID->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_billing_refund_voucher_PatientName" for="x_PatientName" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_PatientName" type="text/html"><?php echo $billing_refund_voucher_edit->PatientName->caption() ?><?php echo $billing_refund_voucher_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->PatientName->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_PatientName" type="text/html"><span id="el_billing_refund_voucher_PatientName">
<input type="text" data-table="billing_refund_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->PatientName->EditValue ?>"<?php echo $billing_refund_voucher_edit->PatientName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_PatientName" type="text/html"><span id="el_billing_refund_voucher_PatientName">
<span<?php echo $billing_refund_voucher_edit->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->PatientName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($billing_refund_voucher_edit->PatientName->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->VisiteType->Visible) { // VisiteType ?>
	<div id="r_VisiteType" class="form-group row">
		<label id="elh_billing_refund_voucher_VisiteType" for="x_VisiteType" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_VisiteType" type="text/html"><?php echo $billing_refund_voucher_edit->VisiteType->caption() ?><?php echo $billing_refund_voucher_edit->VisiteType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->VisiteType->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_VisiteType" type="text/html"><span id="el_billing_refund_voucher_VisiteType">
<input type="text" data-table="billing_refund_voucher" data-field="x_VisiteType" name="x_VisiteType" id="x_VisiteType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->VisiteType->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->VisiteType->EditValue ?>"<?php echo $billing_refund_voucher_edit->VisiteType->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_VisiteType" type="text/html"><span id="el_billing_refund_voucher_VisiteType">
<span<?php echo $billing_refund_voucher_edit->VisiteType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->VisiteType->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_VisiteType" name="x_VisiteType" id="x_VisiteType" value="<?php echo HtmlEncode($billing_refund_voucher_edit->VisiteType->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->VisiteType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->VisitDate->Visible) { // VisitDate ?>
	<div id="r_VisitDate" class="form-group row">
		<label id="elh_billing_refund_voucher_VisitDate" for="x_VisitDate" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_VisitDate" type="text/html"><?php echo $billing_refund_voucher_edit->VisitDate->caption() ?><?php echo $billing_refund_voucher_edit->VisitDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->VisitDate->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_VisitDate" type="text/html"><span id="el_billing_refund_voucher_VisitDate">
<input type="text" data-table="billing_refund_voucher" data-field="x_VisitDate" name="x_VisitDate" id="x_VisitDate" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->VisitDate->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->VisitDate->EditValue ?>"<?php echo $billing_refund_voucher_edit->VisitDate->editAttributes() ?>>
<?php if (!$billing_refund_voucher_edit->VisitDate->ReadOnly && !$billing_refund_voucher_edit->VisitDate->Disabled && !isset($billing_refund_voucher_edit->VisitDate->EditAttrs["readonly"]) && !isset($billing_refund_voucher_edit->VisitDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="billing_refund_voucheredit_js">
loadjs.ready(["fbilling_refund_voucheredit", "datetimepicker"], function() {
	ew.createDateTimePicker("fbilling_refund_voucheredit", "x_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_VisitDate" type="text/html"><span id="el_billing_refund_voucher_VisitDate">
<span<?php echo $billing_refund_voucher_edit->VisitDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->VisitDate->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_VisitDate" name="x_VisitDate" id="x_VisitDate" value="<?php echo HtmlEncode($billing_refund_voucher_edit->VisitDate->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->VisitDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->AdvanceNo->Visible) { // AdvanceNo ?>
	<div id="r_AdvanceNo" class="form-group row">
		<label id="elh_billing_refund_voucher_AdvanceNo" for="x_AdvanceNo" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_AdvanceNo" type="text/html"><?php echo $billing_refund_voucher_edit->AdvanceNo->caption() ?><?php echo $billing_refund_voucher_edit->AdvanceNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->AdvanceNo->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_AdvanceNo" type="text/html"><span id="el_billing_refund_voucher_AdvanceNo">
<input type="text" data-table="billing_refund_voucher" data-field="x_AdvanceNo" name="x_AdvanceNo" id="x_AdvanceNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->AdvanceNo->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->AdvanceNo->EditValue ?>"<?php echo $billing_refund_voucher_edit->AdvanceNo->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_AdvanceNo" type="text/html"><span id="el_billing_refund_voucher_AdvanceNo">
<span<?php echo $billing_refund_voucher_edit->AdvanceNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->AdvanceNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_AdvanceNo" name="x_AdvanceNo" id="x_AdvanceNo" value="<?php echo HtmlEncode($billing_refund_voucher_edit->AdvanceNo->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->AdvanceNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_billing_refund_voucher_Status" for="x_Status" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_Status" type="text/html"><?php echo $billing_refund_voucher_edit->Status->caption() ?><?php echo $billing_refund_voucher_edit->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->Status->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_Status" type="text/html"><span id="el_billing_refund_voucher_Status">
<input type="text" data-table="billing_refund_voucher" data-field="x_Status" name="x_Status" id="x_Status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->Status->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->Status->EditValue ?>"<?php echo $billing_refund_voucher_edit->Status->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_Status" type="text/html"><span id="el_billing_refund_voucher_Status">
<span<?php echo $billing_refund_voucher_edit->Status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->Status->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_Status" name="x_Status" id="x_Status" value="<?php echo HtmlEncode($billing_refund_voucher_edit->Status->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->Date->Visible) { // Date ?>
	<div id="r_Date" class="form-group row">
		<label id="elh_billing_refund_voucher_Date" for="x_Date" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_Date" type="text/html"><?php echo $billing_refund_voucher_edit->Date->caption() ?><?php echo $billing_refund_voucher_edit->Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->Date->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_Date" type="text/html"><span id="el_billing_refund_voucher_Date">
<input type="text" data-table="billing_refund_voucher" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->Date->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->Date->EditValue ?>"<?php echo $billing_refund_voucher_edit->Date->editAttributes() ?>>
<?php if (!$billing_refund_voucher_edit->Date->ReadOnly && !$billing_refund_voucher_edit->Date->Disabled && !isset($billing_refund_voucher_edit->Date->EditAttrs["readonly"]) && !isset($billing_refund_voucher_edit->Date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="billing_refund_voucheredit_js">
loadjs.ready(["fbilling_refund_voucheredit", "datetimepicker"], function() {
	ew.createDateTimePicker("fbilling_refund_voucheredit", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_Date" type="text/html"><span id="el_billing_refund_voucher_Date">
<span<?php echo $billing_refund_voucher_edit->Date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->Date->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_Date" name="x_Date" id="x_Date" value="<?php echo HtmlEncode($billing_refund_voucher_edit->Date->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<div id="r_AdvanceValidityDate" class="form-group row">
		<label id="elh_billing_refund_voucher_AdvanceValidityDate" for="x_AdvanceValidityDate" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_AdvanceValidityDate" type="text/html"><?php echo $billing_refund_voucher_edit->AdvanceValidityDate->caption() ?><?php echo $billing_refund_voucher_edit->AdvanceValidityDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->AdvanceValidityDate->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_AdvanceValidityDate" type="text/html"><span id="el_billing_refund_voucher_AdvanceValidityDate">
<input type="text" data-table="billing_refund_voucher" data-field="x_AdvanceValidityDate" name="x_AdvanceValidityDate" id="x_AdvanceValidityDate" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->AdvanceValidityDate->EditValue ?>"<?php echo $billing_refund_voucher_edit->AdvanceValidityDate->editAttributes() ?>>
<?php if (!$billing_refund_voucher_edit->AdvanceValidityDate->ReadOnly && !$billing_refund_voucher_edit->AdvanceValidityDate->Disabled && !isset($billing_refund_voucher_edit->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($billing_refund_voucher_edit->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="billing_refund_voucheredit_js">
loadjs.ready(["fbilling_refund_voucheredit", "datetimepicker"], function() {
	ew.createDateTimePicker("fbilling_refund_voucheredit", "x_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_AdvanceValidityDate" type="text/html"><span id="el_billing_refund_voucher_AdvanceValidityDate">
<span<?php echo $billing_refund_voucher_edit->AdvanceValidityDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->AdvanceValidityDate->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_AdvanceValidityDate" name="x_AdvanceValidityDate" id="x_AdvanceValidityDate" value="<?php echo HtmlEncode($billing_refund_voucher_edit->AdvanceValidityDate->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->AdvanceValidityDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<div id="r_TotalRemainingAdvance" class="form-group row">
		<label id="elh_billing_refund_voucher_TotalRemainingAdvance" for="x_TotalRemainingAdvance" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_TotalRemainingAdvance" type="text/html"><?php echo $billing_refund_voucher_edit->TotalRemainingAdvance->caption() ?><?php echo $billing_refund_voucher_edit->TotalRemainingAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->TotalRemainingAdvance->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_TotalRemainingAdvance" type="text/html"><span id="el_billing_refund_voucher_TotalRemainingAdvance">
<input type="text" data-table="billing_refund_voucher" data-field="x_TotalRemainingAdvance" name="x_TotalRemainingAdvance" id="x_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->TotalRemainingAdvance->EditValue ?>"<?php echo $billing_refund_voucher_edit->TotalRemainingAdvance->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_TotalRemainingAdvance" type="text/html"><span id="el_billing_refund_voucher_TotalRemainingAdvance">
<span<?php echo $billing_refund_voucher_edit->TotalRemainingAdvance->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->TotalRemainingAdvance->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_TotalRemainingAdvance" name="x_TotalRemainingAdvance" id="x_TotalRemainingAdvance" value="<?php echo HtmlEncode($billing_refund_voucher_edit->TotalRemainingAdvance->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->TotalRemainingAdvance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_billing_refund_voucher_Remarks" for="x_Remarks" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_Remarks" type="text/html"><?php echo $billing_refund_voucher_edit->Remarks->caption() ?><?php echo $billing_refund_voucher_edit->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->Remarks->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_Remarks" type="text/html"><span id="el_billing_refund_voucher_Remarks">
<input type="text" data-table="billing_refund_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->Remarks->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->Remarks->EditValue ?>"<?php echo $billing_refund_voucher_edit->Remarks->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_Remarks" type="text/html"><span id="el_billing_refund_voucher_Remarks">
<span<?php echo $billing_refund_voucher_edit->Remarks->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->Remarks->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" value="<?php echo HtmlEncode($billing_refund_voucher_edit->Remarks->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<div id="r_SeectPaymentMode" class="form-group row">
		<label id="elh_billing_refund_voucher_SeectPaymentMode" for="x_SeectPaymentMode" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_SeectPaymentMode" type="text/html"><?php echo $billing_refund_voucher_edit->SeectPaymentMode->caption() ?><?php echo $billing_refund_voucher_edit->SeectPaymentMode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->SeectPaymentMode->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_SeectPaymentMode" type="text/html"><span id="el_billing_refund_voucher_SeectPaymentMode">
<input type="text" data-table="billing_refund_voucher" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->SeectPaymentMode->EditValue ?>"<?php echo $billing_refund_voucher_edit->SeectPaymentMode->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_SeectPaymentMode" type="text/html"><span id="el_billing_refund_voucher_SeectPaymentMode">
<span<?php echo $billing_refund_voucher_edit->SeectPaymentMode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->SeectPaymentMode->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" value="<?php echo HtmlEncode($billing_refund_voucher_edit->SeectPaymentMode->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->SeectPaymentMode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->PaidAmount->Visible) { // PaidAmount ?>
	<div id="r_PaidAmount" class="form-group row">
		<label id="elh_billing_refund_voucher_PaidAmount" for="x_PaidAmount" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_PaidAmount" type="text/html"><?php echo $billing_refund_voucher_edit->PaidAmount->caption() ?><?php echo $billing_refund_voucher_edit->PaidAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->PaidAmount->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_PaidAmount" type="text/html"><span id="el_billing_refund_voucher_PaidAmount">
<input type="text" data-table="billing_refund_voucher" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->PaidAmount->EditValue ?>"<?php echo $billing_refund_voucher_edit->PaidAmount->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_PaidAmount" type="text/html"><span id="el_billing_refund_voucher_PaidAmount">
<span<?php echo $billing_refund_voucher_edit->PaidAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->PaidAmount->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" value="<?php echo HtmlEncode($billing_refund_voucher_edit->PaidAmount->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->PaidAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_billing_refund_voucher_Currency" for="x_Currency" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_Currency" type="text/html"><?php echo $billing_refund_voucher_edit->Currency->caption() ?><?php echo $billing_refund_voucher_edit->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->Currency->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_Currency" type="text/html"><span id="el_billing_refund_voucher_Currency">
<input type="text" data-table="billing_refund_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->Currency->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->Currency->EditValue ?>"<?php echo $billing_refund_voucher_edit->Currency->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_Currency" type="text/html"><span id="el_billing_refund_voucher_Currency">
<span<?php echo $billing_refund_voucher_edit->Currency->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->Currency->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" value="<?php echo HtmlEncode($billing_refund_voucher_edit->Currency->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_billing_refund_voucher_CardNumber" for="x_CardNumber" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_CardNumber" type="text/html"><?php echo $billing_refund_voucher_edit->CardNumber->caption() ?><?php echo $billing_refund_voucher_edit->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->CardNumber->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_CardNumber" type="text/html"><span id="el_billing_refund_voucher_CardNumber">
<input type="text" data-table="billing_refund_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->CardNumber->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->CardNumber->EditValue ?>"<?php echo $billing_refund_voucher_edit->CardNumber->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_CardNumber" type="text/html"><span id="el_billing_refund_voucher_CardNumber">
<span<?php echo $billing_refund_voucher_edit->CardNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->CardNumber->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" value="<?php echo HtmlEncode($billing_refund_voucher_edit->CardNumber->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_billing_refund_voucher_BankName" for="x_BankName" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_BankName" type="text/html"><?php echo $billing_refund_voucher_edit->BankName->caption() ?><?php echo $billing_refund_voucher_edit->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->BankName->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_BankName" type="text/html"><span id="el_billing_refund_voucher_BankName">
<input type="text" data-table="billing_refund_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_refund_voucher_edit->BankName->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher_edit->BankName->EditValue ?>"<?php echo $billing_refund_voucher_edit->BankName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_refund_voucher_BankName" type="text/html"><span id="el_billing_refund_voucher_BankName">
<span<?php echo $billing_refund_voucher_edit->BankName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->BankName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" value="<?php echo HtmlEncode($billing_refund_voucher_edit->BankName->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_billing_refund_voucher_Reception" for="x_Reception" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_Reception" type="text/html"><?php echo $billing_refund_voucher_edit->Reception->caption() ?><?php echo $billing_refund_voucher_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->Reception->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_Reception" type="text/html"><span id="el_billing_refund_voucher_Reception">
<span<?php echo $billing_refund_voucher_edit->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->Reception->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($billing_refund_voucher_edit->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_billing_refund_voucher_Reception" type="text/html"><span id="el_billing_refund_voucher_Reception">
<span<?php echo $billing_refund_voucher_edit->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->Reception->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($billing_refund_voucher_edit->Reception->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_refund_voucher_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_billing_refund_voucher_mrnno" for="x_mrnno" class="<?php echo $billing_refund_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_refund_voucher_mrnno" type="text/html"><?php echo $billing_refund_voucher_edit->mrnno->caption() ?><?php echo $billing_refund_voucher_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_refund_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_refund_voucher_edit->mrnno->cellAttributes() ?>>
<?php if (!$billing_refund_voucher->isConfirm()) { ?>
<script id="tpx_billing_refund_voucher_mrnno" type="text/html"><span id="el_billing_refund_voucher_mrnno">
<span<?php echo $billing_refund_voucher_edit->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->mrnno->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($billing_refund_voucher_edit->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_billing_refund_voucher_mrnno" type="text/html"><span id="el_billing_refund_voucher_mrnno">
<span<?php echo $billing_refund_voucher_edit->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_refund_voucher_edit->mrnno->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_refund_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($billing_refund_voucher_edit->mrnno->FormValue) ?>">
<?php } ?>
<?php echo $billing_refund_voucher_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_billing_refund_voucheredit" class="ew-custom-template"></div>
<script id="tpm_billing_refund_voucheredit" type="text/html">
<div id="ct_billing_refund_voucher_edit"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_billing_refund_voucher_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_refund_voucher_PatID")/}}</h3>
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
		<td>{{include tmpl="#tpc_billing_refund_voucher_PatientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_refund_voucher_PatientID")/}}</td>
			<td>{{include tmpl="#tpc_billing_refund_voucher_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_refund_voucher_PatientName")/}}</td>
			<td>{{include tmpl="#tpc_billing_refund_voucher_Mobile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_refund_voucher_Mobile")/}}</td>
		</tr>
		<tr>
		<td>{{include tmpl="#tpc_billing_refund_voucher_Date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_refund_voucher_Date")/}}</td>
		<td>{{include tmpl="#tpc_billing_refund_voucher_AdvanceValidityDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_refund_voucher_AdvanceValidityDate")/}}</td>
		<td></td>
		</tr>
		 <tr>
			<td>{{include tmpl="#tpc_billing_refund_voucher_AdvanceNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_refund_voucher_AdvanceNo")/}}</td>
			<td>{{include tmpl="#tpc_billing_refund_voucher_Status"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_refund_voucher_Status")/}}</td>
			<td></td>
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
			<div class="card-header"  style="background-color:#E706B7">
				<h3 class="card-title">Payment Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td>{{include tmpl="#tpc_billing_refund_voucher_ModeofPayment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_refund_voucher_ModeofPayment")/}}</td>
			<td>{{include tmpl="#tpc_billing_refund_voucher_Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_refund_voucher_Amount")/}}</td>
			<td>{{include tmpl="#tpc_billing_refund_voucher_Remarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_refund_voucher_Remarks")/}}</td>
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
			<td>{{include tmpl="#tpc_billing_refund_voucher_CardNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_refund_voucher_CardNumber")/}}</td>
			<td>{{include tmpl="#tpc_billing_refund_voucher_BankName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_refund_voucher_BankName")/}}</td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
</div>
</script>

<?php if (!$billing_refund_voucher_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $billing_refund_voucher_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<?php if (!$billing_refund_voucher->isConfirm()) { // Confirm page ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" onclick="this.form.action.value='confirm';"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $billing_refund_voucher_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
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
	ew.templateData = { rows: <?php echo JsonEncode($billing_refund_voucher->Rows) ?> };
	ew.applyTemplate("tpd_billing_refund_voucheredit", "tpm_billing_refund_voucheredit", "billing_refund_voucheredit", "<?php echo $billing_refund_voucher->CustomExport ?>", ew.templateData.rows[0]);
	$("script.billing_refund_voucheredit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$billing_refund_voucher_edit->showPageFooter();
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
$billing_refund_voucher_edit->terminate();
?>