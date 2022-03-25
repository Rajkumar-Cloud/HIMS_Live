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
$view_ip_advance_add = new view_ip_advance_add();

// Run the page
$view_ip_advance_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_advance_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fview_ip_advanceadd = currentForm = new ew.Form("fview_ip_advanceadd", "add");

// Validate form
fview_ip_advanceadd.validate = function() {
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
		<?php if ($view_ip_advance_add->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Name->caption(), $view_ip_advance->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Mobile->caption(), $view_ip_advance->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->voucher_type->caption(), $view_ip_advance->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Details->caption(), $view_ip_advance->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->ModeofPayment->caption(), $view_ip_advance->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Amount->caption(), $view_ip_advance->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_advance->Amount->errorMessage()) ?>");
		<?php if ($view_ip_advance_add->AnyDues->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyDues");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->AnyDues->caption(), $view_ip_advance->AnyDues->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->createdby->caption(), $view_ip_advance->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->createddatetime->caption(), $view_ip_advance->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->PatID->caption(), $view_ip_advance->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_advance->PatID->errorMessage()) ?>");
		<?php if ($view_ip_advance_add->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->PatientID->caption(), $view_ip_advance->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->PatientName->caption(), $view_ip_advance->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->VisiteType->Required) { ?>
			elm = this.getElements("x" + infix + "_VisiteType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->VisiteType->caption(), $view_ip_advance->VisiteType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->VisitDate->Required) { ?>
			elm = this.getElements("x" + infix + "_VisitDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->VisitDate->caption(), $view_ip_advance->VisitDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_VisitDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_advance->VisitDate->errorMessage()) ?>");
		<?php if ($view_ip_advance_add->AdvanceNo->Required) { ?>
			elm = this.getElements("x" + infix + "_AdvanceNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->AdvanceNo->caption(), $view_ip_advance->AdvanceNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->Status->Required) { ?>
			elm = this.getElements("x" + infix + "_Status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Status->caption(), $view_ip_advance->Status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Date->caption(), $view_ip_advance->Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_advance->Date->errorMessage()) ?>");
		<?php if ($view_ip_advance_add->AdvanceValidityDate->Required) { ?>
			elm = this.getElements("x" + infix + "_AdvanceValidityDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->AdvanceValidityDate->caption(), $view_ip_advance->AdvanceValidityDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AdvanceValidityDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_advance->AdvanceValidityDate->errorMessage()) ?>");
		<?php if ($view_ip_advance_add->TotalRemainingAdvance->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalRemainingAdvance");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->TotalRemainingAdvance->caption(), $view_ip_advance->TotalRemainingAdvance->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Remarks->caption(), $view_ip_advance->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->SeectPaymentMode->Required) { ?>
			elm = this.getElements("x" + infix + "_SeectPaymentMode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->SeectPaymentMode->caption(), $view_ip_advance->SeectPaymentMode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->PaidAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_PaidAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->PaidAmount->caption(), $view_ip_advance->PaidAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->Currency->Required) { ?>
			elm = this.getElements("x" + infix + "_Currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Currency->caption(), $view_ip_advance->Currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->CardNumber->caption(), $view_ip_advance->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->BankName->caption(), $view_ip_advance->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->HospID->caption(), $view_ip_advance->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Reception->caption(), $view_ip_advance->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->mrnno->caption(), $view_ip_advance->mrnno->RequiredErrorMessage)) ?>");
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
fview_ip_advanceadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_advanceadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_advanceadd.lists["x_ModeofPayment"] = <?php echo $view_ip_advance_add->ModeofPayment->Lookup->toClientList() ?>;
fview_ip_advanceadd.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_ip_advance_add->ModeofPayment->lookupOptions()) ?>;
fview_ip_advanceadd.lists["x_Reception"] = <?php echo $view_ip_advance_add->Reception->Lookup->toClientList() ?>;
fview_ip_advanceadd.lists["x_Reception"].options = <?php echo JsonEncode($view_ip_advance_add->Reception->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_ip_advance_add->showPageHeader(); ?>
<?php
$view_ip_advance_add->showMessage();
?>
<form name="fview_ip_advanceadd" id="fview_ip_advanceadd" class="<?php echo $view_ip_advance_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_advance_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_advance_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_advance">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_advance_add->IsModal ?>">
<?php if ($view_ip_advance->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_mrnNo" value="<?php echo $view_ip_advance->mrnno->getSessionValue() ?>">
<input type="hidden" name="fk_id" value="<?php echo $view_ip_advance->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $view_ip_advance->PatID->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($view_ip_advance->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_view_ip_advance_Name" for="x_Name" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Name" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->Name->caption() ?><?php echo ($view_ip_advance->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->Name->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Name" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_Name">
<input type="text" data-table="view_ip_advance" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Name->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Name->EditValue ?>"<?php echo $view_ip_advance->Name->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_view_ip_advance_Mobile" for="x_Mobile" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Mobile" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->Mobile->caption() ?><?php echo ($view_ip_advance->Mobile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->Mobile->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Mobile" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_Mobile">
<input type="text" data-table="view_ip_advance" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Mobile->EditValue ?>"<?php echo $view_ip_advance->Mobile->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_view_ip_advance_voucher_type" for="x_voucher_type" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_voucher_type" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->voucher_type->caption() ?><?php echo ($view_ip_advance->voucher_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->voucher_type->cellAttributes() ?>>
<script id="tpx_view_ip_advance_voucher_type" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_voucher_type">
<input type="text" data-table="view_ip_advance" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->voucher_type->EditValue ?>"<?php echo $view_ip_advance->voucher_type->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_view_ip_advance_Details" for="x_Details" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Details" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->Details->caption() ?><?php echo ($view_ip_advance->Details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->Details->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Details" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_Details">
<input type="text" data-table="view_ip_advance" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Details->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Details->EditValue ?>"<?php echo $view_ip_advance->Details->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_view_ip_advance_ModeofPayment" for="x_ModeofPayment" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_ModeofPayment" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->ModeofPayment->caption() ?><?php echo ($view_ip_advance->ModeofPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_ip_advance_ModeofPayment" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_advance" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_ip_advance->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $view_ip_advance->ModeofPayment->editAttributes() ?>>
		<?php echo $view_ip_advance->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
	</select>
</div>
<?php echo $view_ip_advance->ModeofPayment->Lookup->getParamTag("p_x_ModeofPayment") ?>
</span>
</script>
<?php echo $view_ip_advance->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_view_ip_advance_Amount" for="x_Amount" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Amount" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->Amount->caption() ?><?php echo ($view_ip_advance->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->Amount->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Amount" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_Amount">
<input type="text" data-table="view_ip_advance" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($view_ip_advance->Amount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Amount->EditValue ?>"<?php echo $view_ip_advance->Amount->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_view_ip_advance_AnyDues" for="x_AnyDues" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_AnyDues" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->AnyDues->caption() ?><?php echo ($view_ip_advance->AnyDues->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->AnyDues->cellAttributes() ?>>
<script id="tpx_view_ip_advance_AnyDues" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_AnyDues">
<input type="text" data-table="view_ip_advance" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->AnyDues->EditValue ?>"<?php echo $view_ip_advance->AnyDues->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_view_ip_advance_PatID" for="x_PatID" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_PatID" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->PatID->caption() ?><?php echo ($view_ip_advance->PatID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->PatID->cellAttributes() ?>>
<?php if ($view_ip_advance->PatID->getSessionValue() <> "") { ?>
<script id="tpx_view_ip_advance_PatID" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_PatID">
<span<?php echo $view_ip_advance->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->PatID->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_PatID" name="x_PatID" value="<?php echo HtmlEncode($view_ip_advance->PatID->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_view_ip_advance_PatID" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_PatID">
<input type="text" data-table="view_ip_advance" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?php echo HtmlEncode($view_ip_advance->PatID->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PatID->EditValue ?>"<?php echo $view_ip_advance->PatID->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $view_ip_advance->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_view_ip_advance_PatientID" for="x_PatientID" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_PatientID" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->PatientID->caption() ?><?php echo ($view_ip_advance->PatientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PatientID" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_PatientID">
<input type="text" data-table="view_ip_advance" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PatientID->EditValue ?>"<?php echo $view_ip_advance->PatientID->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_view_ip_advance_PatientName" for="x_PatientName" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_PatientName" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->PatientName->caption() ?><?php echo ($view_ip_advance->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->PatientName->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PatientName" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_PatientName">
<input type="text" data-table="view_ip_advance" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PatientName->EditValue ?>"<?php echo $view_ip_advance->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->VisiteType->Visible) { // VisiteType ?>
	<div id="r_VisiteType" class="form-group row">
		<label id="elh_view_ip_advance_VisiteType" for="x_VisiteType" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_VisiteType" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->VisiteType->caption() ?><?php echo ($view_ip_advance->VisiteType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->VisiteType->cellAttributes() ?>>
<script id="tpx_view_ip_advance_VisiteType" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_VisiteType">
<input type="text" data-table="view_ip_advance" data-field="x_VisiteType" name="x_VisiteType" id="x_VisiteType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->VisiteType->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->VisiteType->EditValue ?>"<?php echo $view_ip_advance->VisiteType->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->VisiteType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->VisitDate->Visible) { // VisitDate ?>
	<div id="r_VisitDate" class="form-group row">
		<label id="elh_view_ip_advance_VisitDate" for="x_VisitDate" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_VisitDate" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->VisitDate->caption() ?><?php echo ($view_ip_advance->VisitDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->VisitDate->cellAttributes() ?>>
<script id="tpx_view_ip_advance_VisitDate" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_VisitDate">
<input type="text" data-table="view_ip_advance" data-field="x_VisitDate" name="x_VisitDate" id="x_VisitDate" placeholder="<?php echo HtmlEncode($view_ip_advance->VisitDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->VisitDate->EditValue ?>"<?php echo $view_ip_advance->VisitDate->editAttributes() ?>>
<?php if (!$view_ip_advance->VisitDate->ReadOnly && !$view_ip_advance->VisitDate->Disabled && !isset($view_ip_advance->VisitDate->EditAttrs["readonly"]) && !isset($view_ip_advance->VisitDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ip_advanceadd_js">
ew.createDateTimePicker("fview_ip_advanceadd", "x_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ip_advance->VisitDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->AdvanceNo->Visible) { // AdvanceNo ?>
	<div id="r_AdvanceNo" class="form-group row">
		<label id="elh_view_ip_advance_AdvanceNo" for="x_AdvanceNo" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_AdvanceNo" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->AdvanceNo->caption() ?><?php echo ($view_ip_advance->AdvanceNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->AdvanceNo->cellAttributes() ?>>
<script id="tpx_view_ip_advance_AdvanceNo" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_AdvanceNo">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x_AdvanceNo" id="x_AdvanceNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->AdvanceNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->AdvanceNo->EditValue ?>"<?php echo $view_ip_advance->AdvanceNo->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->AdvanceNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_view_ip_advance_Status" for="x_Status" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Status" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->Status->caption() ?><?php echo ($view_ip_advance->Status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->Status->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Status" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_Status">
<input type="text" data-table="view_ip_advance" data-field="x_Status" name="x_Status" id="x_Status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Status->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Status->EditValue ?>"<?php echo $view_ip_advance->Status->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->Date->Visible) { // Date ?>
	<div id="r_Date" class="form-group row">
		<label id="elh_view_ip_advance_Date" for="x_Date" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Date" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->Date->caption() ?><?php echo ($view_ip_advance->Date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->Date->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Date" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_Date">
<input type="text" data-table="view_ip_advance" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?php echo HtmlEncode($view_ip_advance->Date->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Date->EditValue ?>"<?php echo $view_ip_advance->Date->editAttributes() ?>>
<?php if (!$view_ip_advance->Date->ReadOnly && !$view_ip_advance->Date->Disabled && !isset($view_ip_advance->Date->EditAttrs["readonly"]) && !isset($view_ip_advance->Date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ip_advanceadd_js">
ew.createDateTimePicker("fview_ip_advanceadd", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ip_advance->Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<div id="r_AdvanceValidityDate" class="form-group row">
		<label id="elh_view_ip_advance_AdvanceValidityDate" for="x_AdvanceValidityDate" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_AdvanceValidityDate" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->AdvanceValidityDate->caption() ?><?php echo ($view_ip_advance->AdvanceValidityDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->AdvanceValidityDate->cellAttributes() ?>>
<script id="tpx_view_ip_advance_AdvanceValidityDate" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_AdvanceValidityDate">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x_AdvanceValidityDate" id="x_AdvanceValidityDate" placeholder="<?php echo HtmlEncode($view_ip_advance->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->AdvanceValidityDate->EditValue ?>"<?php echo $view_ip_advance->AdvanceValidityDate->editAttributes() ?>>
<?php if (!$view_ip_advance->AdvanceValidityDate->ReadOnly && !$view_ip_advance->AdvanceValidityDate->Disabled && !isset($view_ip_advance->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($view_ip_advance->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ip_advanceadd_js">
ew.createDateTimePicker("fview_ip_advanceadd", "x_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ip_advance->AdvanceValidityDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<div id="r_TotalRemainingAdvance" class="form-group row">
		<label id="elh_view_ip_advance_TotalRemainingAdvance" for="x_TotalRemainingAdvance" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_TotalRemainingAdvance" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->TotalRemainingAdvance->caption() ?><?php echo ($view_ip_advance->TotalRemainingAdvance->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->TotalRemainingAdvance->cellAttributes() ?>>
<script id="tpx_view_ip_advance_TotalRemainingAdvance" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_TotalRemainingAdvance">
<input type="text" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x_TotalRemainingAdvance" id="x_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->TotalRemainingAdvance->EditValue ?>"<?php echo $view_ip_advance->TotalRemainingAdvance->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->TotalRemainingAdvance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_view_ip_advance_Remarks" for="x_Remarks" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Remarks" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->Remarks->caption() ?><?php echo ($view_ip_advance->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->Remarks->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Remarks" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_Remarks">
<input type="text" data-table="view_ip_advance" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Remarks->EditValue ?>"<?php echo $view_ip_advance->Remarks->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<div id="r_SeectPaymentMode" class="form-group row">
		<label id="elh_view_ip_advance_SeectPaymentMode" for="x_SeectPaymentMode" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_SeectPaymentMode" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->SeectPaymentMode->caption() ?><?php echo ($view_ip_advance->SeectPaymentMode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->SeectPaymentMode->cellAttributes() ?>>
<script id="tpx_view_ip_advance_SeectPaymentMode" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_SeectPaymentMode">
<input type="text" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->SeectPaymentMode->EditValue ?>"<?php echo $view_ip_advance->SeectPaymentMode->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->SeectPaymentMode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->PaidAmount->Visible) { // PaidAmount ?>
	<div id="r_PaidAmount" class="form-group row">
		<label id="elh_view_ip_advance_PaidAmount" for="x_PaidAmount" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_PaidAmount" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->PaidAmount->caption() ?><?php echo ($view_ip_advance->PaidAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->PaidAmount->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PaidAmount" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_PaidAmount">
<input type="text" data-table="view_ip_advance" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PaidAmount->EditValue ?>"<?php echo $view_ip_advance->PaidAmount->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->PaidAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_view_ip_advance_Currency" for="x_Currency" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Currency" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->Currency->caption() ?><?php echo ($view_ip_advance->Currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->Currency->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Currency" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_Currency">
<input type="text" data-table="view_ip_advance" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Currency->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Currency->EditValue ?>"<?php echo $view_ip_advance->Currency->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_view_ip_advance_CardNumber" for="x_CardNumber" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_CardNumber" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->CardNumber->caption() ?><?php echo ($view_ip_advance->CardNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->CardNumber->cellAttributes() ?>>
<script id="tpx_view_ip_advance_CardNumber" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_CardNumber">
<input type="text" data-table="view_ip_advance" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->CardNumber->EditValue ?>"<?php echo $view_ip_advance->CardNumber->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_view_ip_advance_BankName" for="x_BankName" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_BankName" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->BankName->caption() ?><?php echo ($view_ip_advance->BankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->BankName->cellAttributes() ?>>
<script id="tpx_view_ip_advance_BankName" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_BankName">
<input type="text" data-table="view_ip_advance" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->BankName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->BankName->EditValue ?>"<?php echo $view_ip_advance->BankName->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_advance->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_view_ip_advance_Reception" for="x_Reception" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_Reception" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->Reception->caption() ?><?php echo ($view_ip_advance->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->Reception->cellAttributes() ?>>
<?php if ($view_ip_advance->Reception->getSessionValue() <> "") { ?>
<script id="tpx_view_ip_advance_Reception" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_Reception">
<span<?php echo $view_ip_advance->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->Reception->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($view_ip_advance->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_view_ip_advance_Reception" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_Reception">
<?php $view_ip_advance->Reception->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_ip_advance->Reception->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?php echo strval($view_ip_advance->Reception->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ip_advance->Reception->ViewValue) : $view_ip_advance->Reception->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_advance->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ip_advance->Reception->ReadOnly || $view_ip_advance->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_advance->Reception->Lookup->getParamTag("p_x_Reception") ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_advance->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?php echo $view_ip_advance->Reception->CurrentValue ?>"<?php echo $view_ip_advance->Reception->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $view_ip_advance->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_advance->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_view_ip_advance_mrnno" for="x_mrnno" class="<?php echo $view_ip_advance_add->LeftColumnClass ?>"><script id="tpc_view_ip_advance_mrnno" class="view_ip_advanceadd" type="text/html"><span><?php echo $view_ip_advance->mrnno->caption() ?><?php echo ($view_ip_advance->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_advance_add->RightColumnClass ?>"><div<?php echo $view_ip_advance->mrnno->cellAttributes() ?>>
<?php if ($view_ip_advance->mrnno->getSessionValue() <> "") { ?>
<script id="tpx_view_ip_advance_mrnno" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_mrnno">
<span<?php echo $view_ip_advance->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->mrnno->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($view_ip_advance->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_view_ip_advance_mrnno" class="view_ip_advanceadd" type="text/html">
<span id="el_view_ip_advance_mrnno">
<input type="text" data-table="view_ip_advance" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->mrnno->EditValue ?>"<?php echo $view_ip_advance->mrnno->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $view_ip_advance->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_ip_advanceadd" class="ew-custom-template"></div>
<script id="tpm_view_ip_advanceadd" type="text/html">
<div id="ct_view_ip_advance_add"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_view_ip_advance_Reception"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_Reception"/}}</h3>
	</div>
		<div hidden class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_ip_advance_PatID"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_PatID"/}}</h3>
	</div>
		<div hidden class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_ip_advance_mrnno"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_mrnno"/}}</h3>
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
		<td>{{include tmpl="#tpc_view_ip_advance_PatientID"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_PatientID"/}}</td>
			<td>{{include tmpl="#tpc_view_ip_advance_PatientName"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_PatientName"/}}</td>
			<td>{{include tmpl="#tpc_view_ip_advance_Mobile"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_Mobile"/}}</td>
		</tr>
		<tr>
		<td>{{include tmpl="#tpc_view_ip_advance_Date"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_Date"/}}</td>
		<td>{{include tmpl="#tpc_view_ip_advance_AdvanceValidityDate"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_AdvanceValidityDate"/}}</td>
		<td></td>
		</tr>
		 <tr>
			<td>{{include tmpl="#tpc_view_ip_advance_AdvanceNo"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_AdvanceNo"/}}</td>
			<td>{{include tmpl="#tpc_view_ip_advance_Status"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_Status"/}}</td>
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
			<td>{{include tmpl="#tpc_view_ip_advance_ModeofPayment"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_ModeofPayment"/}}</td>
			<td>{{include tmpl="#tpc_view_ip_advance_Amount"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_Amount"/}}</td>
			<td>{{include tmpl="#tpc_view_ip_advance_Remarks"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_Remarks"/}}</td>
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
			<td>{{include tmpl="#tpc_view_ip_advance_CardNumber"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_CardNumber"/}}</td>
			<td>{{include tmpl="#tpc_view_ip_advance_BankName"/}}&nbsp;{{include tmpl="#tpx_view_ip_advance_BankName"/}}</td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
</div>
</script>
<?php if (!$view_ip_advance_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_ip_advance_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ip_advance_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ip_advance->Rows) ?> };
ew.applyTemplate("tpd_view_ip_advanceadd", "tpm_view_ip_advanceadd", "view_ip_advanceadd", "<?php echo $view_ip_advance->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_ip_advanceadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ip_advance_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

 document.getElementById("viewBankName").style.display = "none";
</script>
<?php include_once "footer.php" ?>
<?php
$view_ip_advance_add->terminate();
?>