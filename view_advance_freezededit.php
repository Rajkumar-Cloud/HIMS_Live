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
$view_advance_freezed_edit = new view_advance_freezed_edit();

// Run the page
$view_advance_freezed_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_advance_freezed_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_advance_freezededit = currentForm = new ew.Form("fview_advance_freezededit", "edit");

// Validate form
fview_advance_freezededit.validate = function() {
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
		<?php if ($view_advance_freezed_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->id->caption(), $view_advance_freezed->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->freezed->Required) { ?>
			elm = this.getElements("x" + infix + "_freezed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->freezed->caption(), $view_advance_freezed->freezed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->PatientID->caption(), $view_advance_freezed->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->PatientName->caption(), $view_advance_freezed->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Name->caption(), $view_advance_freezed->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Mobile->caption(), $view_advance_freezed->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->voucher_type->caption(), $view_advance_freezed->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Details->caption(), $view_advance_freezed->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->ModeofPayment->caption(), $view_advance_freezed->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Amount->caption(), $view_advance_freezed->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->AnyDues->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyDues");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->AnyDues->caption(), $view_advance_freezed->AnyDues->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->createdby->caption(), $view_advance_freezed->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->createddatetime->caption(), $view_advance_freezed->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->modifiedby->caption(), $view_advance_freezed->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->modifieddatetime->caption(), $view_advance_freezed->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->PatID->caption(), $view_advance_freezed->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->VisiteType->Required) { ?>
			elm = this.getElements("x" + infix + "_VisiteType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->VisiteType->caption(), $view_advance_freezed->VisiteType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->VisitDate->Required) { ?>
			elm = this.getElements("x" + infix + "_VisitDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->VisitDate->caption(), $view_advance_freezed->VisitDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->AdvanceNo->Required) { ?>
			elm = this.getElements("x" + infix + "_AdvanceNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->AdvanceNo->caption(), $view_advance_freezed->AdvanceNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->Status->Required) { ?>
			elm = this.getElements("x" + infix + "_Status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Status->caption(), $view_advance_freezed->Status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Date->caption(), $view_advance_freezed->Date->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->AdvanceValidityDate->Required) { ?>
			elm = this.getElements("x" + infix + "_AdvanceValidityDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->AdvanceValidityDate->caption(), $view_advance_freezed->AdvanceValidityDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->TotalRemainingAdvance->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalRemainingAdvance");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->TotalRemainingAdvance->caption(), $view_advance_freezed->TotalRemainingAdvance->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Remarks->caption(), $view_advance_freezed->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->SeectPaymentMode->Required) { ?>
			elm = this.getElements("x" + infix + "_SeectPaymentMode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->SeectPaymentMode->caption(), $view_advance_freezed->SeectPaymentMode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->PaidAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_PaidAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->PaidAmount->caption(), $view_advance_freezed->PaidAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->Currency->Required) { ?>
			elm = this.getElements("x" + infix + "_Currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Currency->caption(), $view_advance_freezed->Currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CardNumber->caption(), $view_advance_freezed->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->BankName->caption(), $view_advance_freezed->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->HospID->caption(), $view_advance_freezed->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Reception->caption(), $view_advance_freezed->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->mrnno->caption(), $view_advance_freezed->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->GetUserName->Required) { ?>
			elm = this.getElements("x" + infix + "_GetUserName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->GetUserName->caption(), $view_advance_freezed->GetUserName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->AdjustmentwithAdvance->Required) { ?>
			elm = this.getElements("x" + infix + "_AdjustmentwithAdvance");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->AdjustmentwithAdvance->caption(), $view_advance_freezed->AdjustmentwithAdvance->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->AdjustmentBillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_AdjustmentBillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->AdjustmentBillNumber->caption(), $view_advance_freezed->AdjustmentBillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->CancelAdvance->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelAdvance");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CancelAdvance->caption(), $view_advance_freezed->CancelAdvance->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->CancelReasan->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelReasan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CancelReasan->caption(), $view_advance_freezed->CancelReasan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->CancelBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CancelBy->caption(), $view_advance_freezed->CancelBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->CancelDate->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CancelDate->caption(), $view_advance_freezed->CancelDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->CancelDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CancelDateTime->caption(), $view_advance_freezed->CancelDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->CanceledBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CanceledBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CanceledBy->caption(), $view_advance_freezed->CanceledBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->CancelStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CancelStatus->caption(), $view_advance_freezed->CancelStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->Cash->Required) { ?>
			elm = this.getElements("x" + infix + "_Cash");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Cash->caption(), $view_advance_freezed->Cash->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_edit->Card->Required) { ?>
			elm = this.getElements("x" + infix + "_Card");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Card->caption(), $view_advance_freezed->Card->RequiredErrorMessage)) ?>");
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
fview_advance_freezededit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_advance_freezededit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_advance_freezededit.lists["x_freezed"] = <?php echo $view_advance_freezed_edit->freezed->Lookup->toClientList() ?>;
fview_advance_freezededit.lists["x_freezed"].options = <?php echo JsonEncode($view_advance_freezed_edit->freezed->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_advance_freezed_edit->showPageHeader(); ?>
<?php
$view_advance_freezed_edit->showMessage();
?>
<form name="fview_advance_freezededit" id="fview_advance_freezededit" class="<?php echo $view_advance_freezed_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_advance_freezed_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_advance_freezed_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_advance_freezed">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_advance_freezed_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_advance_freezed->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_advance_freezed_id" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->id->caption() ?><?php echo ($view_advance_freezed->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->id->cellAttributes() ?>>
<span id="el_view_advance_freezed_id">
<span<?php echo $view_advance_freezed->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_advance_freezed->id->CurrentValue) ?>">
<?php echo $view_advance_freezed->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->freezed->Visible) { // freezed ?>
	<div id="r_freezed" class="form-group row">
		<label id="elh_view_advance_freezed_freezed" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->freezed->caption() ?><?php echo ($view_advance_freezed->freezed->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->freezed->cellAttributes() ?>>
<span id="el_view_advance_freezed_freezed">
<div id="tp_x_freezed" class="ew-template"><input type="radio" class="form-check-input" data-table="view_advance_freezed" data-field="x_freezed" data-value-separator="<?php echo $view_advance_freezed->freezed->displayValueSeparatorAttribute() ?>" name="x_freezed" id="x_freezed" value="{value}"<?php echo $view_advance_freezed->freezed->editAttributes() ?>></div>
<div id="dsl_x_freezed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_advance_freezed->freezed->radioButtonListHtml(FALSE, "x_freezed") ?>
</div></div>
</span>
<?php echo $view_advance_freezed->freezed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_view_advance_freezed_PatientID" for="x_PatientID" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->PatientID->caption() ?><?php echo ($view_advance_freezed->PatientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->PatientID->cellAttributes() ?>>
<span id="el_view_advance_freezed_PatientID">
<span<?php echo $view_advance_freezed->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->PatientID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" value="<?php echo HtmlEncode($view_advance_freezed->PatientID->CurrentValue) ?>">
<?php echo $view_advance_freezed->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_view_advance_freezed_PatientName" for="x_PatientName" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->PatientName->caption() ?><?php echo ($view_advance_freezed->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->PatientName->cellAttributes() ?>>
<span id="el_view_advance_freezed_PatientName">
<span<?php echo $view_advance_freezed->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->PatientName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($view_advance_freezed->PatientName->CurrentValue) ?>">
<?php echo $view_advance_freezed->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_view_advance_freezed_Name" for="x_Name" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->Name->caption() ?><?php echo ($view_advance_freezed->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->Name->cellAttributes() ?>>
<span id="el_view_advance_freezed_Name">
<span<?php echo $view_advance_freezed->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Name->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Name" name="x_Name" id="x_Name" value="<?php echo HtmlEncode($view_advance_freezed->Name->CurrentValue) ?>">
<?php echo $view_advance_freezed->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_view_advance_freezed_Mobile" for="x_Mobile" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->Mobile->caption() ?><?php echo ($view_advance_freezed->Mobile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->Mobile->cellAttributes() ?>>
<span id="el_view_advance_freezed_Mobile">
<span<?php echo $view_advance_freezed->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Mobile->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" value="<?php echo HtmlEncode($view_advance_freezed->Mobile->CurrentValue) ?>">
<?php echo $view_advance_freezed->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_view_advance_freezed_voucher_type" for="x_voucher_type" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->voucher_type->caption() ?><?php echo ($view_advance_freezed->voucher_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->voucher_type->cellAttributes() ?>>
<span id="el_view_advance_freezed_voucher_type">
<span<?php echo $view_advance_freezed->voucher_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->voucher_type->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" value="<?php echo HtmlEncode($view_advance_freezed->voucher_type->CurrentValue) ?>">
<?php echo $view_advance_freezed->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_view_advance_freezed_Details" for="x_Details" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->Details->caption() ?><?php echo ($view_advance_freezed->Details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->Details->cellAttributes() ?>>
<span id="el_view_advance_freezed_Details">
<span<?php echo $view_advance_freezed->Details->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Details->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Details" name="x_Details" id="x_Details" value="<?php echo HtmlEncode($view_advance_freezed->Details->CurrentValue) ?>">
<?php echo $view_advance_freezed->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_view_advance_freezed_ModeofPayment" for="x_ModeofPayment" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->ModeofPayment->caption() ?><?php echo ($view_advance_freezed->ModeofPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->ModeofPayment->cellAttributes() ?>>
<span id="el_view_advance_freezed_ModeofPayment">
<span<?php echo $view_advance_freezed->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->ModeofPayment->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" value="<?php echo HtmlEncode($view_advance_freezed->ModeofPayment->CurrentValue) ?>">
<?php echo $view_advance_freezed->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_view_advance_freezed_Amount" for="x_Amount" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->Amount->caption() ?><?php echo ($view_advance_freezed->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->Amount->cellAttributes() ?>>
<span id="el_view_advance_freezed_Amount">
<span<?php echo $view_advance_freezed->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Amount->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Amount" name="x_Amount" id="x_Amount" value="<?php echo HtmlEncode($view_advance_freezed->Amount->CurrentValue) ?>">
<?php echo $view_advance_freezed->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_view_advance_freezed_AnyDues" for="x_AnyDues" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->AnyDues->caption() ?><?php echo ($view_advance_freezed->AnyDues->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->AnyDues->cellAttributes() ?>>
<span id="el_view_advance_freezed_AnyDues">
<span<?php echo $view_advance_freezed->AnyDues->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->AnyDues->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" value="<?php echo HtmlEncode($view_advance_freezed->AnyDues->CurrentValue) ?>">
<?php echo $view_advance_freezed->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_view_advance_freezed_createdby" for="x_createdby" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->createdby->caption() ?><?php echo ($view_advance_freezed->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->createdby->cellAttributes() ?>>
<span id="el_view_advance_freezed_createdby">
<span<?php echo $view_advance_freezed->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->createdby->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($view_advance_freezed->createdby->CurrentValue) ?>">
<?php echo $view_advance_freezed->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_view_advance_freezed_createddatetime" for="x_createddatetime" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->createddatetime->caption() ?><?php echo ($view_advance_freezed->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->createddatetime->cellAttributes() ?>>
<span id="el_view_advance_freezed_createddatetime">
<span<?php echo $view_advance_freezed->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->createddatetime->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($view_advance_freezed->createddatetime->CurrentValue) ?>">
<?php echo $view_advance_freezed->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_view_advance_freezed_modifiedby" for="x_modifiedby" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->modifiedby->caption() ?><?php echo ($view_advance_freezed->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->modifiedby->cellAttributes() ?>>
<span id="el_view_advance_freezed_modifiedby">
<span<?php echo $view_advance_freezed->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->modifiedby->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" value="<?php echo HtmlEncode($view_advance_freezed->modifiedby->CurrentValue) ?>">
<?php echo $view_advance_freezed->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_view_advance_freezed_modifieddatetime" for="x_modifieddatetime" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->modifieddatetime->caption() ?><?php echo ($view_advance_freezed->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->modifieddatetime->cellAttributes() ?>>
<span id="el_view_advance_freezed_modifieddatetime">
<span<?php echo $view_advance_freezed->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->modifieddatetime->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" value="<?php echo HtmlEncode($view_advance_freezed->modifieddatetime->CurrentValue) ?>">
<?php echo $view_advance_freezed->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_view_advance_freezed_PatID" for="x_PatID" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->PatID->caption() ?><?php echo ($view_advance_freezed->PatID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->PatID->cellAttributes() ?>>
<span id="el_view_advance_freezed_PatID">
<span<?php echo $view_advance_freezed->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->PatID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatID" name="x_PatID" id="x_PatID" value="<?php echo HtmlEncode($view_advance_freezed->PatID->CurrentValue) ?>">
<?php echo $view_advance_freezed->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->VisiteType->Visible) { // VisiteType ?>
	<div id="r_VisiteType" class="form-group row">
		<label id="elh_view_advance_freezed_VisiteType" for="x_VisiteType" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->VisiteType->caption() ?><?php echo ($view_advance_freezed->VisiteType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->VisiteType->cellAttributes() ?>>
<span id="el_view_advance_freezed_VisiteType">
<span<?php echo $view_advance_freezed->VisiteType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->VisiteType->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisiteType" name="x_VisiteType" id="x_VisiteType" value="<?php echo HtmlEncode($view_advance_freezed->VisiteType->CurrentValue) ?>">
<?php echo $view_advance_freezed->VisiteType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->VisitDate->Visible) { // VisitDate ?>
	<div id="r_VisitDate" class="form-group row">
		<label id="elh_view_advance_freezed_VisitDate" for="x_VisitDate" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->VisitDate->caption() ?><?php echo ($view_advance_freezed->VisitDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->VisitDate->cellAttributes() ?>>
<span id="el_view_advance_freezed_VisitDate">
<span<?php echo $view_advance_freezed->VisitDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->VisitDate->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisitDate" name="x_VisitDate" id="x_VisitDate" value="<?php echo HtmlEncode($view_advance_freezed->VisitDate->CurrentValue) ?>">
<?php echo $view_advance_freezed->VisitDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->AdvanceNo->Visible) { // AdvanceNo ?>
	<div id="r_AdvanceNo" class="form-group row">
		<label id="elh_view_advance_freezed_AdvanceNo" for="x_AdvanceNo" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->AdvanceNo->caption() ?><?php echo ($view_advance_freezed->AdvanceNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->AdvanceNo->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdvanceNo">
<span<?php echo $view_advance_freezed->AdvanceNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->AdvanceNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceNo" name="x_AdvanceNo" id="x_AdvanceNo" value="<?php echo HtmlEncode($view_advance_freezed->AdvanceNo->CurrentValue) ?>">
<?php echo $view_advance_freezed->AdvanceNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_view_advance_freezed_Status" for="x_Status" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->Status->caption() ?><?php echo ($view_advance_freezed->Status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->Status->cellAttributes() ?>>
<span id="el_view_advance_freezed_Status">
<span<?php echo $view_advance_freezed->Status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Status->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Status" name="x_Status" id="x_Status" value="<?php echo HtmlEncode($view_advance_freezed->Status->CurrentValue) ?>">
<?php echo $view_advance_freezed->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->Date->Visible) { // Date ?>
	<div id="r_Date" class="form-group row">
		<label id="elh_view_advance_freezed_Date" for="x_Date" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->Date->caption() ?><?php echo ($view_advance_freezed->Date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->Date->cellAttributes() ?>>
<span id="el_view_advance_freezed_Date">
<span<?php echo $view_advance_freezed->Date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Date->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Date" name="x_Date" id="x_Date" value="<?php echo HtmlEncode($view_advance_freezed->Date->CurrentValue) ?>">
<?php echo $view_advance_freezed->Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<div id="r_AdvanceValidityDate" class="form-group row">
		<label id="elh_view_advance_freezed_AdvanceValidityDate" for="x_AdvanceValidityDate" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->AdvanceValidityDate->caption() ?><?php echo ($view_advance_freezed->AdvanceValidityDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->AdvanceValidityDate->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdvanceValidityDate">
<span<?php echo $view_advance_freezed->AdvanceValidityDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->AdvanceValidityDate->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceValidityDate" name="x_AdvanceValidityDate" id="x_AdvanceValidityDate" value="<?php echo HtmlEncode($view_advance_freezed->AdvanceValidityDate->CurrentValue) ?>">
<?php echo $view_advance_freezed->AdvanceValidityDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<div id="r_TotalRemainingAdvance" class="form-group row">
		<label id="elh_view_advance_freezed_TotalRemainingAdvance" for="x_TotalRemainingAdvance" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->TotalRemainingAdvance->caption() ?><?php echo ($view_advance_freezed->TotalRemainingAdvance->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->TotalRemainingAdvance->cellAttributes() ?>>
<span id="el_view_advance_freezed_TotalRemainingAdvance">
<span<?php echo $view_advance_freezed->TotalRemainingAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->TotalRemainingAdvance->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_TotalRemainingAdvance" name="x_TotalRemainingAdvance" id="x_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_advance_freezed->TotalRemainingAdvance->CurrentValue) ?>">
<?php echo $view_advance_freezed->TotalRemainingAdvance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_view_advance_freezed_Remarks" for="x_Remarks" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->Remarks->caption() ?><?php echo ($view_advance_freezed->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->Remarks->cellAttributes() ?>>
<span id="el_view_advance_freezed_Remarks">
<span<?php echo $view_advance_freezed->Remarks->viewAttributes() ?>>
<?php echo $view_advance_freezed->Remarks->EditValue ?></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" value="<?php echo HtmlEncode($view_advance_freezed->Remarks->CurrentValue) ?>">
<?php echo $view_advance_freezed->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<div id="r_SeectPaymentMode" class="form-group row">
		<label id="elh_view_advance_freezed_SeectPaymentMode" for="x_SeectPaymentMode" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->SeectPaymentMode->caption() ?><?php echo ($view_advance_freezed->SeectPaymentMode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->SeectPaymentMode->cellAttributes() ?>>
<span id="el_view_advance_freezed_SeectPaymentMode">
<span<?php echo $view_advance_freezed->SeectPaymentMode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->SeectPaymentMode->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" value="<?php echo HtmlEncode($view_advance_freezed->SeectPaymentMode->CurrentValue) ?>">
<?php echo $view_advance_freezed->SeectPaymentMode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->PaidAmount->Visible) { // PaidAmount ?>
	<div id="r_PaidAmount" class="form-group row">
		<label id="elh_view_advance_freezed_PaidAmount" for="x_PaidAmount" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->PaidAmount->caption() ?><?php echo ($view_advance_freezed->PaidAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->PaidAmount->cellAttributes() ?>>
<span id="el_view_advance_freezed_PaidAmount">
<span<?php echo $view_advance_freezed->PaidAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->PaidAmount->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" value="<?php echo HtmlEncode($view_advance_freezed->PaidAmount->CurrentValue) ?>">
<?php echo $view_advance_freezed->PaidAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_view_advance_freezed_Currency" for="x_Currency" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->Currency->caption() ?><?php echo ($view_advance_freezed->Currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->Currency->cellAttributes() ?>>
<span id="el_view_advance_freezed_Currency">
<span<?php echo $view_advance_freezed->Currency->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Currency->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Currency" name="x_Currency" id="x_Currency" value="<?php echo HtmlEncode($view_advance_freezed->Currency->CurrentValue) ?>">
<?php echo $view_advance_freezed->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_view_advance_freezed_CardNumber" for="x_CardNumber" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->CardNumber->caption() ?><?php echo ($view_advance_freezed->CardNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->CardNumber->cellAttributes() ?>>
<span id="el_view_advance_freezed_CardNumber">
<span<?php echo $view_advance_freezed->CardNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->CardNumber->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" value="<?php echo HtmlEncode($view_advance_freezed->CardNumber->CurrentValue) ?>">
<?php echo $view_advance_freezed->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_view_advance_freezed_BankName" for="x_BankName" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->BankName->caption() ?><?php echo ($view_advance_freezed->BankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->BankName->cellAttributes() ?>>
<span id="el_view_advance_freezed_BankName">
<span<?php echo $view_advance_freezed->BankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->BankName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_BankName" name="x_BankName" id="x_BankName" value="<?php echo HtmlEncode($view_advance_freezed->BankName->CurrentValue) ?>">
<?php echo $view_advance_freezed->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_view_advance_freezed_HospID" for="x_HospID" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->HospID->caption() ?><?php echo ($view_advance_freezed->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->HospID->cellAttributes() ?>>
<span id="el_view_advance_freezed_HospID">
<span<?php echo $view_advance_freezed->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->HospID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($view_advance_freezed->HospID->CurrentValue) ?>">
<?php echo $view_advance_freezed->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_view_advance_freezed_Reception" for="x_Reception" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->Reception->caption() ?><?php echo ($view_advance_freezed->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->Reception->cellAttributes() ?>>
<span id="el_view_advance_freezed_Reception">
<span<?php echo $view_advance_freezed->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Reception->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($view_advance_freezed->Reception->CurrentValue) ?>">
<?php echo $view_advance_freezed->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_view_advance_freezed_mrnno" for="x_mrnno" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->mrnno->caption() ?><?php echo ($view_advance_freezed->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->mrnno->cellAttributes() ?>>
<span id="el_view_advance_freezed_mrnno">
<span<?php echo $view_advance_freezed->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($view_advance_freezed->mrnno->CurrentValue) ?>">
<?php echo $view_advance_freezed->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->GetUserName->Visible) { // GetUserName ?>
	<div id="r_GetUserName" class="form-group row">
		<label id="elh_view_advance_freezed_GetUserName" for="x_GetUserName" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->GetUserName->caption() ?><?php echo ($view_advance_freezed->GetUserName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->GetUserName->cellAttributes() ?>>
<span id="el_view_advance_freezed_GetUserName">
<span<?php echo $view_advance_freezed->GetUserName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->GetUserName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_GetUserName" name="x_GetUserName" id="x_GetUserName" value="<?php echo HtmlEncode($view_advance_freezed->GetUserName->CurrentValue) ?>">
<?php echo $view_advance_freezed->GetUserName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->AdjustmentwithAdvance->Visible) { // AdjustmentwithAdvance ?>
	<div id="r_AdjustmentwithAdvance" class="form-group row">
		<label id="elh_view_advance_freezed_AdjustmentwithAdvance" for="x_AdjustmentwithAdvance" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->AdjustmentwithAdvance->caption() ?><?php echo ($view_advance_freezed->AdjustmentwithAdvance->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->AdjustmentwithAdvance->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdjustmentwithAdvance">
<span<?php echo $view_advance_freezed->AdjustmentwithAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->AdjustmentwithAdvance->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentwithAdvance" name="x_AdjustmentwithAdvance" id="x_AdjustmentwithAdvance" value="<?php echo HtmlEncode($view_advance_freezed->AdjustmentwithAdvance->CurrentValue) ?>">
<?php echo $view_advance_freezed->AdjustmentwithAdvance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->AdjustmentBillNumber->Visible) { // AdjustmentBillNumber ?>
	<div id="r_AdjustmentBillNumber" class="form-group row">
		<label id="elh_view_advance_freezed_AdjustmentBillNumber" for="x_AdjustmentBillNumber" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->AdjustmentBillNumber->caption() ?><?php echo ($view_advance_freezed->AdjustmentBillNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->AdjustmentBillNumber->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdjustmentBillNumber">
<span<?php echo $view_advance_freezed->AdjustmentBillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->AdjustmentBillNumber->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentBillNumber" name="x_AdjustmentBillNumber" id="x_AdjustmentBillNumber" value="<?php echo HtmlEncode($view_advance_freezed->AdjustmentBillNumber->CurrentValue) ?>">
<?php echo $view_advance_freezed->AdjustmentBillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->CancelAdvance->Visible) { // CancelAdvance ?>
	<div id="r_CancelAdvance" class="form-group row">
		<label id="elh_view_advance_freezed_CancelAdvance" for="x_CancelAdvance" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->CancelAdvance->caption() ?><?php echo ($view_advance_freezed->CancelAdvance->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->CancelAdvance->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelAdvance">
<span<?php echo $view_advance_freezed->CancelAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->CancelAdvance->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelAdvance" name="x_CancelAdvance" id="x_CancelAdvance" value="<?php echo HtmlEncode($view_advance_freezed->CancelAdvance->CurrentValue) ?>">
<?php echo $view_advance_freezed->CancelAdvance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->CancelReasan->Visible) { // CancelReasan ?>
	<div id="r_CancelReasan" class="form-group row">
		<label id="elh_view_advance_freezed_CancelReasan" for="x_CancelReasan" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->CancelReasan->caption() ?><?php echo ($view_advance_freezed->CancelReasan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->CancelReasan->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelReasan">
<span<?php echo $view_advance_freezed->CancelReasan->viewAttributes() ?>>
<?php echo $view_advance_freezed->CancelReasan->EditValue ?></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelReasan" name="x_CancelReasan" id="x_CancelReasan" value="<?php echo HtmlEncode($view_advance_freezed->CancelReasan->CurrentValue) ?>">
<?php echo $view_advance_freezed->CancelReasan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->CancelBy->Visible) { // CancelBy ?>
	<div id="r_CancelBy" class="form-group row">
		<label id="elh_view_advance_freezed_CancelBy" for="x_CancelBy" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->CancelBy->caption() ?><?php echo ($view_advance_freezed->CancelBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->CancelBy->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelBy">
<span<?php echo $view_advance_freezed->CancelBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->CancelBy->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelBy" name="x_CancelBy" id="x_CancelBy" value="<?php echo HtmlEncode($view_advance_freezed->CancelBy->CurrentValue) ?>">
<?php echo $view_advance_freezed->CancelBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->CancelDate->Visible) { // CancelDate ?>
	<div id="r_CancelDate" class="form-group row">
		<label id="elh_view_advance_freezed_CancelDate" for="x_CancelDate" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->CancelDate->caption() ?><?php echo ($view_advance_freezed->CancelDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->CancelDate->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelDate">
<span<?php echo $view_advance_freezed->CancelDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->CancelDate->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDate" name="x_CancelDate" id="x_CancelDate" value="<?php echo HtmlEncode($view_advance_freezed->CancelDate->CurrentValue) ?>">
<?php echo $view_advance_freezed->CancelDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->CancelDateTime->Visible) { // CancelDateTime ?>
	<div id="r_CancelDateTime" class="form-group row">
		<label id="elh_view_advance_freezed_CancelDateTime" for="x_CancelDateTime" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->CancelDateTime->caption() ?><?php echo ($view_advance_freezed->CancelDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->CancelDateTime->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelDateTime">
<span<?php echo $view_advance_freezed->CancelDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->CancelDateTime->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDateTime" name="x_CancelDateTime" id="x_CancelDateTime" value="<?php echo HtmlEncode($view_advance_freezed->CancelDateTime->CurrentValue) ?>">
<?php echo $view_advance_freezed->CancelDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->CanceledBy->Visible) { // CanceledBy ?>
	<div id="r_CanceledBy" class="form-group row">
		<label id="elh_view_advance_freezed_CanceledBy" for="x_CanceledBy" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->CanceledBy->caption() ?><?php echo ($view_advance_freezed->CanceledBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->CanceledBy->cellAttributes() ?>>
<span id="el_view_advance_freezed_CanceledBy">
<span<?php echo $view_advance_freezed->CanceledBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->CanceledBy->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CanceledBy" name="x_CanceledBy" id="x_CanceledBy" value="<?php echo HtmlEncode($view_advance_freezed->CanceledBy->CurrentValue) ?>">
<?php echo $view_advance_freezed->CanceledBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->CancelStatus->Visible) { // CancelStatus ?>
	<div id="r_CancelStatus" class="form-group row">
		<label id="elh_view_advance_freezed_CancelStatus" for="x_CancelStatus" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->CancelStatus->caption() ?><?php echo ($view_advance_freezed->CancelStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->CancelStatus->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelStatus">
<span<?php echo $view_advance_freezed->CancelStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->CancelStatus->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelStatus" name="x_CancelStatus" id="x_CancelStatus" value="<?php echo HtmlEncode($view_advance_freezed->CancelStatus->CurrentValue) ?>">
<?php echo $view_advance_freezed->CancelStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->Cash->Visible) { // Cash ?>
	<div id="r_Cash" class="form-group row">
		<label id="elh_view_advance_freezed_Cash" for="x_Cash" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->Cash->caption() ?><?php echo ($view_advance_freezed->Cash->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->Cash->cellAttributes() ?>>
<span id="el_view_advance_freezed_Cash">
<span<?php echo $view_advance_freezed->Cash->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Cash->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Cash" name="x_Cash" id="x_Cash" value="<?php echo HtmlEncode($view_advance_freezed->Cash->CurrentValue) ?>">
<?php echo $view_advance_freezed->Cash->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_advance_freezed->Card->Visible) { // Card ?>
	<div id="r_Card" class="form-group row">
		<label id="elh_view_advance_freezed_Card" for="x_Card" class="<?php echo $view_advance_freezed_edit->LeftColumnClass ?>"><?php echo $view_advance_freezed->Card->caption() ?><?php echo ($view_advance_freezed->Card->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_advance_freezed_edit->RightColumnClass ?>"><div<?php echo $view_advance_freezed->Card->cellAttributes() ?>>
<span id="el_view_advance_freezed_Card">
<span<?php echo $view_advance_freezed->Card->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Card->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Card" name="x_Card" id="x_Card" value="<?php echo HtmlEncode($view_advance_freezed->Card->CurrentValue) ?>">
<?php echo $view_advance_freezed->Card->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_advance_freezed_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_advance_freezed_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_advance_freezed_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_advance_freezed_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_advance_freezed_edit->terminate();
?>