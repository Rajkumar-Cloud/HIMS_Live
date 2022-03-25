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
$view_ip_advance_edit = new view_ip_advance_edit();

// Run the page
$view_ip_advance_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_advance_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_ip_advanceedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fview_ip_advanceedit = currentForm = new ew.Form("fview_ip_advanceedit", "edit");

	// Validate form
	fview_ip_advanceedit.validate = function() {
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
			<?php if ($view_ip_advance_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->id->caption(), $view_ip_advance_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->Name->caption(), $view_ip_advance_edit->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->Mobile->caption(), $view_ip_advance_edit->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->voucher_type->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->voucher_type->caption(), $view_ip_advance_edit->voucher_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->Details->caption(), $view_ip_advance_edit->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->ModeofPayment->caption(), $view_ip_advance_edit->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->Amount->caption(), $view_ip_advance_edit->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_advance_edit->Amount->errorMessage()) ?>");
			<?php if ($view_ip_advance_edit->AnyDues->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyDues");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->AnyDues->caption(), $view_ip_advance_edit->AnyDues->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->modifiedby->caption(), $view_ip_advance_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->modifieddatetime->caption(), $view_ip_advance_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->PatID->caption(), $view_ip_advance_edit->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->PatientID->caption(), $view_ip_advance_edit->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->PatientName->caption(), $view_ip_advance_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->VisiteType->Required) { ?>
				elm = this.getElements("x" + infix + "_VisiteType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->VisiteType->caption(), $view_ip_advance_edit->VisiteType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->VisitDate->Required) { ?>
				elm = this.getElements("x" + infix + "_VisitDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->VisitDate->caption(), $view_ip_advance_edit->VisitDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VisitDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_advance_edit->VisitDate->errorMessage()) ?>");
			<?php if ($view_ip_advance_edit->AdvanceNo->Required) { ?>
				elm = this.getElements("x" + infix + "_AdvanceNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->AdvanceNo->caption(), $view_ip_advance_edit->AdvanceNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->Status->caption(), $view_ip_advance_edit->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->Date->Required) { ?>
				elm = this.getElements("x" + infix + "_Date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->Date->caption(), $view_ip_advance_edit->Date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_advance_edit->Date->errorMessage()) ?>");
			<?php if ($view_ip_advance_edit->AdvanceValidityDate->Required) { ?>
				elm = this.getElements("x" + infix + "_AdvanceValidityDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->AdvanceValidityDate->caption(), $view_ip_advance_edit->AdvanceValidityDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AdvanceValidityDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_advance_edit->AdvanceValidityDate->errorMessage()) ?>");
			<?php if ($view_ip_advance_edit->TotalRemainingAdvance->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalRemainingAdvance");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->TotalRemainingAdvance->caption(), $view_ip_advance_edit->TotalRemainingAdvance->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->Remarks->caption(), $view_ip_advance_edit->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->SeectPaymentMode->Required) { ?>
				elm = this.getElements("x" + infix + "_SeectPaymentMode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->SeectPaymentMode->caption(), $view_ip_advance_edit->SeectPaymentMode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->PaidAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_PaidAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->PaidAmount->caption(), $view_ip_advance_edit->PaidAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->Currency->Required) { ?>
				elm = this.getElements("x" + infix + "_Currency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->Currency->caption(), $view_ip_advance_edit->Currency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->CardNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CardNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->CardNumber->caption(), $view_ip_advance_edit->CardNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->BankName->Required) { ?>
				elm = this.getElements("x" + infix + "_BankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->BankName->caption(), $view_ip_advance_edit->BankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->HospID->caption(), $view_ip_advance_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->Reception->caption(), $view_ip_advance_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_edit->mrnno->caption(), $view_ip_advance_edit->mrnno->RequiredErrorMessage)) ?>");
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
	fview_ip_advanceedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_ip_advanceedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_ip_advanceedit.lists["x_ModeofPayment"] = <?php echo $view_ip_advance_edit->ModeofPayment->Lookup->toClientList($view_ip_advance_edit) ?>;
	fview_ip_advanceedit.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_ip_advance_edit->ModeofPayment->lookupOptions()) ?>;
	loadjs.done("fview_ip_advanceedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_ip_advance_edit->showPageHeader(); ?>
<?php
$view_ip_advance_edit->showMessage();
?>
<form name="fview_ip_advanceedit" id="fview_ip_advanceedit" class="<?php echo $view_ip_advance_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_advance">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_advance_edit->IsModal ?>">
<?php if ($view_ip_advance->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($view_ip_advance_edit->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_ip_advance_edit->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($view_ip_advance_edit->PatID->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($view_ip_advance_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_ip_advance_id" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_id" type="text/html"><?php echo $view_ip_advance_edit->id->caption() ?><?php echo $view_ip_advance_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->id->cellAttributes() ?>>
<script id="tpx_view_ip_advance_id" type="text/html"><span id="el_view_ip_advance_id">
<span<?php echo $view_ip_advance_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_ip_advance_edit->id->CurrentValue) ?>">
<?php echo $view_ip_advance_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_view_ip_advance_Name" for="x_Name" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Name" type="text/html"><?php echo $view_ip_advance_edit->Name->caption() ?><?php echo $view_ip_advance_edit->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->Name->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Name" type="text/html"><span id="el_view_ip_advance_Name">
<input type="text" data-table="view_ip_advance" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->Name->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->Name->EditValue ?>"<?php echo $view_ip_advance_edit->Name->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_view_ip_advance_Mobile" for="x_Mobile" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Mobile" type="text/html"><?php echo $view_ip_advance_edit->Mobile->caption() ?><?php echo $view_ip_advance_edit->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->Mobile->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Mobile" type="text/html"><span id="el_view_ip_advance_Mobile">
<input type="text" data-table="view_ip_advance" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->Mobile->EditValue ?>"<?php echo $view_ip_advance_edit->Mobile->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_view_ip_advance_voucher_type" for="x_voucher_type" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_voucher_type" type="text/html"><?php echo $view_ip_advance_edit->voucher_type->caption() ?><?php echo $view_ip_advance_edit->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->voucher_type->cellAttributes() ?>>
<script id="tpx_view_ip_advance_voucher_type" type="text/html"><span id="el_view_ip_advance_voucher_type">
<input type="text" data-table="view_ip_advance" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->voucher_type->EditValue ?>"<?php echo $view_ip_advance_edit->voucher_type->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_view_ip_advance_Details" for="x_Details" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Details" type="text/html"><?php echo $view_ip_advance_edit->Details->caption() ?><?php echo $view_ip_advance_edit->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->Details->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Details" type="text/html"><span id="el_view_ip_advance_Details">
<input type="text" data-table="view_ip_advance" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->Details->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->Details->EditValue ?>"<?php echo $view_ip_advance_edit->Details->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_view_ip_advance_ModeofPayment" for="x_ModeofPayment" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_ModeofPayment" type="text/html"><?php echo $view_ip_advance_edit->ModeofPayment->caption() ?><?php echo $view_ip_advance_edit->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_ip_advance_ModeofPayment" type="text/html"><span id="el_view_ip_advance_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_advance" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_ip_advance_edit->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $view_ip_advance_edit->ModeofPayment->editAttributes() ?>>
			<?php echo $view_ip_advance_edit->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
		</select>
</div>
<?php echo $view_ip_advance_edit->ModeofPayment->Lookup->getParamTag($view_ip_advance_edit, "p_x_ModeofPayment") ?>
</span></script>
<?php echo $view_ip_advance_edit->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_view_ip_advance_Amount" for="x_Amount" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Amount" type="text/html"><?php echo $view_ip_advance_edit->Amount->caption() ?><?php echo $view_ip_advance_edit->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->Amount->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Amount" type="text/html"><span id="el_view_ip_advance_Amount">
<input type="text" data-table="view_ip_advance" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->Amount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->Amount->EditValue ?>"<?php echo $view_ip_advance_edit->Amount->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_view_ip_advance_AnyDues" for="x_AnyDues" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_AnyDues" type="text/html"><?php echo $view_ip_advance_edit->AnyDues->caption() ?><?php echo $view_ip_advance_edit->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->AnyDues->cellAttributes() ?>>
<script id="tpx_view_ip_advance_AnyDues" type="text/html"><span id="el_view_ip_advance_AnyDues">
<input type="text" data-table="view_ip_advance" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->AnyDues->EditValue ?>"<?php echo $view_ip_advance_edit->AnyDues->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_view_ip_advance_PatID" for="x_PatID" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_PatID" type="text/html"><?php echo $view_ip_advance_edit->PatID->caption() ?><?php echo $view_ip_advance_edit->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->PatID->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PatID" type="text/html"><span id="el_view_ip_advance_PatID">
<span<?php echo $view_ip_advance_edit->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_edit->PatID->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="x_PatID" id="x_PatID" value="<?php echo HtmlEncode($view_ip_advance_edit->PatID->CurrentValue) ?>">
<?php echo $view_ip_advance_edit->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_view_ip_advance_PatientID" for="x_PatientID" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_PatientID" type="text/html"><?php echo $view_ip_advance_edit->PatientID->caption() ?><?php echo $view_ip_advance_edit->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PatientID" type="text/html"><span id="el_view_ip_advance_PatientID">
<input type="text" data-table="view_ip_advance" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->PatientID->EditValue ?>"<?php echo $view_ip_advance_edit->PatientID->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_view_ip_advance_PatientName" for="x_PatientName" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_PatientName" type="text/html"><?php echo $view_ip_advance_edit->PatientName->caption() ?><?php echo $view_ip_advance_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->PatientName->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PatientName" type="text/html"><span id="el_view_ip_advance_PatientName">
<input type="text" data-table="view_ip_advance" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->PatientName->EditValue ?>"<?php echo $view_ip_advance_edit->PatientName->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->VisiteType->Visible) { // VisiteType ?>
	<div id="r_VisiteType" class="form-group row">
		<label id="elh_view_ip_advance_VisiteType" for="x_VisiteType" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_VisiteType" type="text/html"><?php echo $view_ip_advance_edit->VisiteType->caption() ?><?php echo $view_ip_advance_edit->VisiteType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->VisiteType->cellAttributes() ?>>
<script id="tpx_view_ip_advance_VisiteType" type="text/html"><span id="el_view_ip_advance_VisiteType">
<input type="text" data-table="view_ip_advance" data-field="x_VisiteType" name="x_VisiteType" id="x_VisiteType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->VisiteType->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->VisiteType->EditValue ?>"<?php echo $view_ip_advance_edit->VisiteType->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->VisiteType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->VisitDate->Visible) { // VisitDate ?>
	<div id="r_VisitDate" class="form-group row">
		<label id="elh_view_ip_advance_VisitDate" for="x_VisitDate" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_VisitDate" type="text/html"><?php echo $view_ip_advance_edit->VisitDate->caption() ?><?php echo $view_ip_advance_edit->VisitDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->VisitDate->cellAttributes() ?>>
<script id="tpx_view_ip_advance_VisitDate" type="text/html"><span id="el_view_ip_advance_VisitDate">
<input type="text" data-table="view_ip_advance" data-field="x_VisitDate" name="x_VisitDate" id="x_VisitDate" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->VisitDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->VisitDate->EditValue ?>"<?php echo $view_ip_advance_edit->VisitDate->editAttributes() ?>>
<?php if (!$view_ip_advance_edit->VisitDate->ReadOnly && !$view_ip_advance_edit->VisitDate->Disabled && !isset($view_ip_advance_edit->VisitDate->EditAttrs["readonly"]) && !isset($view_ip_advance_edit->VisitDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ip_advanceedit_js">
loadjs.ready(["fview_ip_advanceedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_advanceedit", "x_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ip_advance_edit->VisitDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->AdvanceNo->Visible) { // AdvanceNo ?>
	<div id="r_AdvanceNo" class="form-group row">
		<label id="elh_view_ip_advance_AdvanceNo" for="x_AdvanceNo" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_AdvanceNo" type="text/html"><?php echo $view_ip_advance_edit->AdvanceNo->caption() ?><?php echo $view_ip_advance_edit->AdvanceNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->AdvanceNo->cellAttributes() ?>>
<script id="tpx_view_ip_advance_AdvanceNo" type="text/html"><span id="el_view_ip_advance_AdvanceNo">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x_AdvanceNo" id="x_AdvanceNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->AdvanceNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->AdvanceNo->EditValue ?>"<?php echo $view_ip_advance_edit->AdvanceNo->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->AdvanceNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_view_ip_advance_Status" for="x_Status" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Status" type="text/html"><?php echo $view_ip_advance_edit->Status->caption() ?><?php echo $view_ip_advance_edit->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->Status->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Status" type="text/html"><span id="el_view_ip_advance_Status">
<input type="text" data-table="view_ip_advance" data-field="x_Status" name="x_Status" id="x_Status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->Status->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->Status->EditValue ?>"<?php echo $view_ip_advance_edit->Status->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->Date->Visible) { // Date ?>
	<div id="r_Date" class="form-group row">
		<label id="elh_view_ip_advance_Date" for="x_Date" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Date" type="text/html"><?php echo $view_ip_advance_edit->Date->caption() ?><?php echo $view_ip_advance_edit->Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->Date->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Date" type="text/html"><span id="el_view_ip_advance_Date">
<input type="text" data-table="view_ip_advance" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->Date->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->Date->EditValue ?>"<?php echo $view_ip_advance_edit->Date->editAttributes() ?>>
<?php if (!$view_ip_advance_edit->Date->ReadOnly && !$view_ip_advance_edit->Date->Disabled && !isset($view_ip_advance_edit->Date->EditAttrs["readonly"]) && !isset($view_ip_advance_edit->Date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ip_advanceedit_js">
loadjs.ready(["fview_ip_advanceedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_advanceedit", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ip_advance_edit->Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<div id="r_AdvanceValidityDate" class="form-group row">
		<label id="elh_view_ip_advance_AdvanceValidityDate" for="x_AdvanceValidityDate" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_AdvanceValidityDate" type="text/html"><?php echo $view_ip_advance_edit->AdvanceValidityDate->caption() ?><?php echo $view_ip_advance_edit->AdvanceValidityDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->AdvanceValidityDate->cellAttributes() ?>>
<script id="tpx_view_ip_advance_AdvanceValidityDate" type="text/html"><span id="el_view_ip_advance_AdvanceValidityDate">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x_AdvanceValidityDate" id="x_AdvanceValidityDate" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->AdvanceValidityDate->EditValue ?>"<?php echo $view_ip_advance_edit->AdvanceValidityDate->editAttributes() ?>>
<?php if (!$view_ip_advance_edit->AdvanceValidityDate->ReadOnly && !$view_ip_advance_edit->AdvanceValidityDate->Disabled && !isset($view_ip_advance_edit->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($view_ip_advance_edit->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ip_advanceedit_js">
loadjs.ready(["fview_ip_advanceedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_advanceedit", "x_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ip_advance_edit->AdvanceValidityDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<div id="r_TotalRemainingAdvance" class="form-group row">
		<label id="elh_view_ip_advance_TotalRemainingAdvance" for="x_TotalRemainingAdvance" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_TotalRemainingAdvance" type="text/html"><?php echo $view_ip_advance_edit->TotalRemainingAdvance->caption() ?><?php echo $view_ip_advance_edit->TotalRemainingAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->TotalRemainingAdvance->cellAttributes() ?>>
<script id="tpx_view_ip_advance_TotalRemainingAdvance" type="text/html"><span id="el_view_ip_advance_TotalRemainingAdvance">
<input type="text" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x_TotalRemainingAdvance" id="x_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->TotalRemainingAdvance->EditValue ?>"<?php echo $view_ip_advance_edit->TotalRemainingAdvance->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->TotalRemainingAdvance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_view_ip_advance_Remarks" for="x_Remarks" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Remarks" type="text/html"><?php echo $view_ip_advance_edit->Remarks->caption() ?><?php echo $view_ip_advance_edit->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->Remarks->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Remarks" type="text/html"><span id="el_view_ip_advance_Remarks">
<input type="text" data-table="view_ip_advance" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->Remarks->EditValue ?>"<?php echo $view_ip_advance_edit->Remarks->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<div id="r_SeectPaymentMode" class="form-group row">
		<label id="elh_view_ip_advance_SeectPaymentMode" for="x_SeectPaymentMode" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_SeectPaymentMode" type="text/html"><?php echo $view_ip_advance_edit->SeectPaymentMode->caption() ?><?php echo $view_ip_advance_edit->SeectPaymentMode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->SeectPaymentMode->cellAttributes() ?>>
<script id="tpx_view_ip_advance_SeectPaymentMode" type="text/html"><span id="el_view_ip_advance_SeectPaymentMode">
<input type="text" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->SeectPaymentMode->EditValue ?>"<?php echo $view_ip_advance_edit->SeectPaymentMode->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->SeectPaymentMode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->PaidAmount->Visible) { // PaidAmount ?>
	<div id="r_PaidAmount" class="form-group row">
		<label id="elh_view_ip_advance_PaidAmount" for="x_PaidAmount" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_PaidAmount" type="text/html"><?php echo $view_ip_advance_edit->PaidAmount->caption() ?><?php echo $view_ip_advance_edit->PaidAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->PaidAmount->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PaidAmount" type="text/html"><span id="el_view_ip_advance_PaidAmount">
<input type="text" data-table="view_ip_advance" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->PaidAmount->EditValue ?>"<?php echo $view_ip_advance_edit->PaidAmount->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->PaidAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_view_ip_advance_Currency" for="x_Currency" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Currency" type="text/html"><?php echo $view_ip_advance_edit->Currency->caption() ?><?php echo $view_ip_advance_edit->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->Currency->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Currency" type="text/html"><span id="el_view_ip_advance_Currency">
<input type="text" data-table="view_ip_advance" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->Currency->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->Currency->EditValue ?>"<?php echo $view_ip_advance_edit->Currency->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_view_ip_advance_CardNumber" for="x_CardNumber" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_CardNumber" type="text/html"><?php echo $view_ip_advance_edit->CardNumber->caption() ?><?php echo $view_ip_advance_edit->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->CardNumber->cellAttributes() ?>>
<script id="tpx_view_ip_advance_CardNumber" type="text/html"><span id="el_view_ip_advance_CardNumber">
<input type="text" data-table="view_ip_advance" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->CardNumber->EditValue ?>"<?php echo $view_ip_advance_edit->CardNumber->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_view_ip_advance_BankName" for="x_BankName" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_BankName" type="text/html"><?php echo $view_ip_advance_edit->BankName->caption() ?><?php echo $view_ip_advance_edit->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->BankName->cellAttributes() ?>>
<script id="tpx_view_ip_advance_BankName" type="text/html"><span id="el_view_ip_advance_BankName">
<input type="text" data-table="view_ip_advance" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_edit->BankName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_edit->BankName->EditValue ?>"<?php echo $view_ip_advance_edit->BankName->editAttributes() ?>>
</span></script>
<?php echo $view_ip_advance_edit->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_view_ip_advance_Reception" for="x_Reception" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Reception" type="text/html"><?php echo $view_ip_advance_edit->Reception->caption() ?><?php echo $view_ip_advance_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->Reception->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Reception" type="text/html"><span id="el_view_ip_advance_Reception">
<span<?php echo $view_ip_advance_edit->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_edit->Reception->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($view_ip_advance_edit->Reception->CurrentValue) ?>">
<?php echo $view_ip_advance_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_view_ip_advance_mrnno" for="x_mrnno" class="<?php echo $view_ip_advance_edit->LeftColumnClass ?>"><script id="tpc_view_ip_advance_mrnno" type="text/html"><?php echo $view_ip_advance_edit->mrnno->caption() ?><?php echo $view_ip_advance_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_advance_edit->RightColumnClass ?>"><div <?php echo $view_ip_advance_edit->mrnno->cellAttributes() ?>>
<script id="tpx_view_ip_advance_mrnno" type="text/html"><span id="el_view_ip_advance_mrnno">
<span<?php echo $view_ip_advance_edit->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_edit->mrnno->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($view_ip_advance_edit->mrnno->CurrentValue) ?>">
<?php echo $view_ip_advance_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_ip_advanceedit" class="ew-custom-template"></div>
<script id="tpm_view_ip_advanceedit" type="text/html">
<div id="ct_view_ip_advance_edit"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_view_ip_advance_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_advance_PatID")/}}</h3>
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
		<td>{{include tmpl="#tpc_view_ip_advance_PatientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_advance_PatientID")/}}</td>
			<td>{{include tmpl="#tpc_view_ip_advance_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_advance_PatientName")/}}</td>
			<td>{{include tmpl="#tpc_view_ip_advance_Mobile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_advance_Mobile")/}}</td>
		</tr>
		<tr>
		<td>{{include tmpl="#tpc_view_ip_advance_Date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_advance_Date")/}}</td>
		<td>{{include tmpl="#tpc_view_ip_advance_AdvanceValidityDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_advance_AdvanceValidityDate")/}}</td>
		<td></td>
		</tr>
		 <tr>
			<td>{{include tmpl="#tpc_view_ip_advance_AdvanceNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_advance_AdvanceNo")/}}</td>
			<td>{{include tmpl="#tpc_view_ip_advance_Status"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_advance_Status")/}}</td>
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
			<td>{{include tmpl="#tpc_view_ip_advance_ModeofPayment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_advance_ModeofPayment")/}}</td>
			<td>{{include tmpl="#tpc_view_ip_advance_Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_advance_Amount")/}}</td>
			<td>{{include tmpl="#tpc_view_ip_advance_Remarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_advance_Remarks")/}}</td>
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
			<td>{{include tmpl="#tpc_view_ip_advance_CardNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_advance_CardNumber")/}}</td>
			<td>{{include tmpl="#tpc_view_ip_advance_BankName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_advance_BankName")/}}</td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
</div>
</script>

<?php if (!$view_ip_advance_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_ip_advance_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ip_advance_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_ip_advance->Rows) ?> };
	ew.applyTemplate("tpd_view_ip_advanceedit", "tpm_view_ip_advanceedit", "view_ip_advanceedit", "<?php echo $view_ip_advance->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_ip_advanceedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_ip_advance_edit->showPageFooter();
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
$view_ip_advance_edit->terminate();
?>