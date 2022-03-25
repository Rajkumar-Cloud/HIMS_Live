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
$view_ip_billing_edit = new view_ip_billing_edit();

// Run the page
$view_ip_billing_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_billing_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_ip_billingedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fview_ip_billingedit = currentForm = new ew.Form("fview_ip_billingedit", "edit");

	// Validate form
	fview_ip_billingedit.validate = function() {
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
			<?php if ($view_ip_billing_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->id->caption(), $view_ip_billing_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->PatientID->caption(), $view_ip_billing_edit->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->patient_name->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->patient_name->caption(), $view_ip_billing_edit->patient_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->mrnNo->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->mrnNo->caption(), $view_ip_billing_edit->mrnNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->mobileno->Required) { ?>
				elm = this.getElements("x" + infix + "_mobileno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->mobileno->caption(), $view_ip_billing_edit->mobileno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->profilePic->caption(), $view_ip_billing_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->gender->Required) { ?>
				elm = this.getElements("x" + infix + "_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->gender->caption(), $view_ip_billing_edit->gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->age->Required) { ?>
				elm = this.getElements("x" + infix + "_age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->age->caption(), $view_ip_billing_edit->age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->physician_id->Required) { ?>
				elm = this.getElements("x" + infix + "_physician_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->physician_id->caption(), $view_ip_billing_edit->physician_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->typeRegsisteration->Required) { ?>
				elm = this.getElements("x" + infix + "_typeRegsisteration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->typeRegsisteration->caption(), $view_ip_billing_edit->typeRegsisteration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->PaymentCategory->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentCategory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->PaymentCategory->caption(), $view_ip_billing_edit->PaymentCategory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->admission_consultant_id->Required) { ?>
				elm = this.getElements("x" + infix + "_admission_consultant_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->admission_consultant_id->caption(), $view_ip_billing_edit->admission_consultant_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->leading_consultant_id->Required) { ?>
				elm = this.getElements("x" + infix + "_leading_consultant_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->leading_consultant_id->caption(), $view_ip_billing_edit->leading_consultant_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->cause->Required) { ?>
				elm = this.getElements("x" + infix + "_cause");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->cause->caption(), $view_ip_billing_edit->cause->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->admission_date->Required) { ?>
				elm = this.getElements("x" + infix + "_admission_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->admission_date->caption(), $view_ip_billing_edit->admission_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->release_date->Required) { ?>
				elm = this.getElements("x" + infix + "_release_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->release_date->caption(), $view_ip_billing_edit->release_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_release_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_billing_edit->release_date->errorMessage()) ?>");
			<?php if ($view_ip_billing_edit->PaymentStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->PaymentStatus->caption(), $view_ip_billing_edit->PaymentStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->status->caption(), $view_ip_billing_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->createdby->caption(), $view_ip_billing_edit->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->createddatetime->caption(), $view_ip_billing_edit->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->modifiedby->caption(), $view_ip_billing_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->modifieddatetime->caption(), $view_ip_billing_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->HospID->caption(), $view_ip_billing_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->ReferedByDr->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferedByDr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->ReferedByDr->caption(), $view_ip_billing_edit->ReferedByDr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->ReferClinicname->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferClinicname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->ReferClinicname->caption(), $view_ip_billing_edit->ReferClinicname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->ReferCity->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferCity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->ReferCity->caption(), $view_ip_billing_edit->ReferCity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->ReferMobileNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferMobileNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->ReferMobileNo->caption(), $view_ip_billing_edit->ReferMobileNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->ReferA4TreatingConsultant->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->ReferA4TreatingConsultant->caption(), $view_ip_billing_edit->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->PurposreReferredfor->Required) { ?>
				elm = this.getElements("x" + infix + "_PurposreReferredfor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->PurposreReferredfor->caption(), $view_ip_billing_edit->PurposreReferredfor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->patient_id->caption(), $view_ip_billing_edit->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->BillClosing->Required) { ?>
				elm = this.getElements("x" + infix + "_BillClosing");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->BillClosing->caption(), $view_ip_billing_edit->BillClosing->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->BillClosingDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillClosingDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->BillClosingDate->caption(), $view_ip_billing_edit->BillClosingDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillClosingDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_billing_edit->BillClosingDate->errorMessage()) ?>");
			<?php if ($view_ip_billing_edit->BillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->BillNumber->caption(), $view_ip_billing_edit->BillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->ClosingAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_ClosingAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->ClosingAmount->caption(), $view_ip_billing_edit->ClosingAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->ClosingType->Required) { ?>
				elm = this.getElements("x" + infix + "_ClosingType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->ClosingType->caption(), $view_ip_billing_edit->ClosingType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->BillAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_BillAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->BillAmount->caption(), $view_ip_billing_edit->BillAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->billclosedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_billclosedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->billclosedBy->caption(), $view_ip_billing_edit->billclosedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->bllcloseByDate->Required) { ?>
				elm = this.getElements("x" + infix + "_bllcloseByDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->bllcloseByDate->caption(), $view_ip_billing_edit->bllcloseByDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_billing_edit->ReportHeader->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportHeader[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing_edit->ReportHeader->caption(), $view_ip_billing_edit->ReportHeader->RequiredErrorMessage)) ?>");
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
	fview_ip_billingedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_ip_billingedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_ip_billingedit.lists["x_BillClosing"] = <?php echo $view_ip_billing_edit->BillClosing->Lookup->toClientList($view_ip_billing_edit) ?>;
	fview_ip_billingedit.lists["x_BillClosing"].options = <?php echo JsonEncode($view_ip_billing_edit->BillClosing->options(FALSE, TRUE)) ?>;
	fview_ip_billingedit.lists["x_ReportHeader[]"] = <?php echo $view_ip_billing_edit->ReportHeader->Lookup->toClientList($view_ip_billing_edit) ?>;
	fview_ip_billingedit.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_ip_billing_edit->ReportHeader->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_ip_billingedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_ip_billing_edit->showPageHeader(); ?>
<?php
$view_ip_billing_edit->showMessage();
?>
<form name="fview_ip_billingedit" id="fview_ip_billingedit" class="<?php echo $view_ip_billing_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_billing">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_billing_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($view_ip_billing_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_ip_billing_id" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_id" type="text/html"><?php echo $view_ip_billing_edit->id->caption() ?><?php echo $view_ip_billing_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_id" type="text/html"><span id="el_view_ip_billing_id">
<span<?php echo $view_ip_billing_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_ip_billing_edit->id->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_view_ip_billing_PatientID" for="x_PatientID" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_PatientID" type="text/html"><?php echo $view_ip_billing_edit->PatientID->caption() ?><?php echo $view_ip_billing_edit->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_billing_PatientID" type="text/html"><span id="el_view_ip_billing_PatientID">
<span<?php echo $view_ip_billing_edit->PatientID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->PatientID->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" value="<?php echo HtmlEncode($view_ip_billing_edit->PatientID->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->patient_name->Visible) { // patient_name ?>
	<div id="r_patient_name" class="form-group row">
		<label id="elh_view_ip_billing_patient_name" for="x_patient_name" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_patient_name" type="text/html"><?php echo $view_ip_billing_edit->patient_name->caption() ?><?php echo $view_ip_billing_edit->patient_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->patient_name->cellAttributes() ?>>
<script id="tpx_view_ip_billing_patient_name" type="text/html"><span id="el_view_ip_billing_patient_name">
<span<?php echo $view_ip_billing_edit->patient_name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->patient_name->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" value="<?php echo HtmlEncode($view_ip_billing_edit->patient_name->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->patient_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->mrnNo->Visible) { // mrnNo ?>
	<div id="r_mrnNo" class="form-group row">
		<label id="elh_view_ip_billing_mrnNo" for="x_mrnNo" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_mrnNo" type="text/html"><?php echo $view_ip_billing_edit->mrnNo->caption() ?><?php echo $view_ip_billing_edit->mrnNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->mrnNo->cellAttributes() ?>>
<script id="tpx_view_ip_billing_mrnNo" type="text/html"><span id="el_view_ip_billing_mrnNo">
<span<?php echo $view_ip_billing_edit->mrnNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->mrnNo->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" value="<?php echo HtmlEncode($view_ip_billing_edit->mrnNo->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->mrnNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->mobileno->Visible) { // mobileno ?>
	<div id="r_mobileno" class="form-group row">
		<label id="elh_view_ip_billing_mobileno" for="x_mobileno" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_mobileno" type="text/html"><?php echo $view_ip_billing_edit->mobileno->caption() ?><?php echo $view_ip_billing_edit->mobileno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->mobileno->cellAttributes() ?>>
<script id="tpx_view_ip_billing_mobileno" type="text/html"><span id="el_view_ip_billing_mobileno">
<span<?php echo $view_ip_billing_edit->mobileno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->mobileno->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" value="<?php echo HtmlEncode($view_ip_billing_edit->mobileno->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->mobileno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_view_ip_billing_profilePic" for="x_profilePic" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_profilePic" type="text/html"><?php echo $view_ip_billing_edit->profilePic->caption() ?><?php echo $view_ip_billing_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->profilePic->cellAttributes() ?>>
<script id="tpx_view_ip_billing_profilePic" type="text/html"><span id="el_view_ip_billing_profilePic">
<span<?php echo $view_ip_billing_edit->profilePic->viewAttributes() ?>><?php echo $view_ip_billing_edit->profilePic->EditValue ?></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" value="<?php echo HtmlEncode($view_ip_billing_edit->profilePic->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_view_ip_billing_gender" for="x_gender" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_gender" type="text/html"><?php echo $view_ip_billing_edit->gender->caption() ?><?php echo $view_ip_billing_edit->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->gender->cellAttributes() ?>>
<script id="tpx_view_ip_billing_gender" type="text/html"><span id="el_view_ip_billing_gender">
<span<?php echo $view_ip_billing_edit->gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->gender->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_gender" name="x_gender" id="x_gender" value="<?php echo HtmlEncode($view_ip_billing_edit->gender->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->age->Visible) { // age ?>
	<div id="r_age" class="form-group row">
		<label id="elh_view_ip_billing_age" for="x_age" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_age" type="text/html"><?php echo $view_ip_billing_edit->age->caption() ?><?php echo $view_ip_billing_edit->age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->age->cellAttributes() ?>>
<script id="tpx_view_ip_billing_age" type="text/html"><span id="el_view_ip_billing_age">
<span<?php echo $view_ip_billing_edit->age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->age->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_age" name="x_age" id="x_age" value="<?php echo HtmlEncode($view_ip_billing_edit->age->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->physician_id->Visible) { // physician_id ?>
	<div id="r_physician_id" class="form-group row">
		<label id="elh_view_ip_billing_physician_id" for="x_physician_id" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_physician_id" type="text/html"><?php echo $view_ip_billing_edit->physician_id->caption() ?><?php echo $view_ip_billing_edit->physician_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->physician_id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_physician_id" type="text/html"><span id="el_view_ip_billing_physician_id">
<span<?php echo $view_ip_billing_edit->physician_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->physician_id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_physician_id" name="x_physician_id" id="x_physician_id" value="<?php echo HtmlEncode($view_ip_billing_edit->physician_id->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->physician_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<div id="r_typeRegsisteration" class="form-group row">
		<label id="elh_view_ip_billing_typeRegsisteration" for="x_typeRegsisteration" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_typeRegsisteration" type="text/html"><?php echo $view_ip_billing_edit->typeRegsisteration->caption() ?><?php echo $view_ip_billing_edit->typeRegsisteration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_view_ip_billing_typeRegsisteration" type="text/html"><span id="el_view_ip_billing_typeRegsisteration">
<span<?php echo $view_ip_billing_edit->typeRegsisteration->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->typeRegsisteration->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_typeRegsisteration" name="x_typeRegsisteration" id="x_typeRegsisteration" value="<?php echo HtmlEncode($view_ip_billing_edit->typeRegsisteration->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->typeRegsisteration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->PaymentCategory->Visible) { // PaymentCategory ?>
	<div id="r_PaymentCategory" class="form-group row">
		<label id="elh_view_ip_billing_PaymentCategory" for="x_PaymentCategory" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_PaymentCategory" type="text/html"><?php echo $view_ip_billing_edit->PaymentCategory->caption() ?><?php echo $view_ip_billing_edit->PaymentCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->PaymentCategory->cellAttributes() ?>>
<script id="tpx_view_ip_billing_PaymentCategory" type="text/html"><span id="el_view_ip_billing_PaymentCategory">
<span<?php echo $view_ip_billing_edit->PaymentCategory->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->PaymentCategory->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_PaymentCategory" name="x_PaymentCategory" id="x_PaymentCategory" value="<?php echo HtmlEncode($view_ip_billing_edit->PaymentCategory->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->PaymentCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<div id="r_admission_consultant_id" class="form-group row">
		<label id="elh_view_ip_billing_admission_consultant_id" for="x_admission_consultant_id" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_admission_consultant_id" type="text/html"><?php echo $view_ip_billing_edit->admission_consultant_id->caption() ?><?php echo $view_ip_billing_edit->admission_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_admission_consultant_id" type="text/html"><span id="el_view_ip_billing_admission_consultant_id">
<span<?php echo $view_ip_billing_edit->admission_consultant_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->admission_consultant_id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_admission_consultant_id" name="x_admission_consultant_id" id="x_admission_consultant_id" value="<?php echo HtmlEncode($view_ip_billing_edit->admission_consultant_id->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->admission_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<div id="r_leading_consultant_id" class="form-group row">
		<label id="elh_view_ip_billing_leading_consultant_id" for="x_leading_consultant_id" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_leading_consultant_id" type="text/html"><?php echo $view_ip_billing_edit->leading_consultant_id->caption() ?><?php echo $view_ip_billing_edit->leading_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_leading_consultant_id" type="text/html"><span id="el_view_ip_billing_leading_consultant_id">
<span<?php echo $view_ip_billing_edit->leading_consultant_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->leading_consultant_id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_leading_consultant_id" name="x_leading_consultant_id" id="x_leading_consultant_id" value="<?php echo HtmlEncode($view_ip_billing_edit->leading_consultant_id->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->leading_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->cause->Visible) { // cause ?>
	<div id="r_cause" class="form-group row">
		<label id="elh_view_ip_billing_cause" for="x_cause" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_cause" type="text/html"><?php echo $view_ip_billing_edit->cause->caption() ?><?php echo $view_ip_billing_edit->cause->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->cause->cellAttributes() ?>>
<script id="tpx_view_ip_billing_cause" type="text/html"><span id="el_view_ip_billing_cause">
<span<?php echo $view_ip_billing_edit->cause->viewAttributes() ?>><?php echo $view_ip_billing_edit->cause->EditValue ?></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_cause" name="x_cause" id="x_cause" value="<?php echo HtmlEncode($view_ip_billing_edit->cause->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->cause->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->admission_date->Visible) { // admission_date ?>
	<div id="r_admission_date" class="form-group row">
		<label id="elh_view_ip_billing_admission_date" for="x_admission_date" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_admission_date" type="text/html"><?php echo $view_ip_billing_edit->admission_date->caption() ?><?php echo $view_ip_billing_edit->admission_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->admission_date->cellAttributes() ?>>
<script id="tpx_view_ip_billing_admission_date" type="text/html"><span id="el_view_ip_billing_admission_date">
<span<?php echo $view_ip_billing_edit->admission_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->admission_date->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_admission_date" name="x_admission_date" id="x_admission_date" value="<?php echo HtmlEncode($view_ip_billing_edit->admission_date->CurrentValue) ?>">
<script type="text/html" class="view_ip_billingedit_js">
loadjs.ready(["fview_ip_billingedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_billingedit", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ip_billing_edit->admission_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->release_date->Visible) { // release_date ?>
	<div id="r_release_date" class="form-group row">
		<label id="elh_view_ip_billing_release_date" for="x_release_date" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_release_date" type="text/html"><?php echo $view_ip_billing_edit->release_date->caption() ?><?php echo $view_ip_billing_edit->release_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->release_date->cellAttributes() ?>>
<script id="tpx_view_ip_billing_release_date" type="text/html"><span id="el_view_ip_billing_release_date">
<input type="text" data-table="view_ip_billing" data-field="x_release_date" data-format="7" name="x_release_date" id="x_release_date" placeholder="<?php echo HtmlEncode($view_ip_billing_edit->release_date->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing_edit->release_date->EditValue ?>"<?php echo $view_ip_billing_edit->release_date->editAttributes() ?>>
<?php if (!$view_ip_billing_edit->release_date->ReadOnly && !$view_ip_billing_edit->release_date->Disabled && !isset($view_ip_billing_edit->release_date->EditAttrs["readonly"]) && !isset($view_ip_billing_edit->release_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ip_billingedit_js">
loadjs.ready(["fview_ip_billingedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_billingedit", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $view_ip_billing_edit->release_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label id="elh_view_ip_billing_PaymentStatus" for="x_PaymentStatus" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_PaymentStatus" type="text/html"><?php echo $view_ip_billing_edit->PaymentStatus->caption() ?><?php echo $view_ip_billing_edit->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->PaymentStatus->cellAttributes() ?>>
<script id="tpx_view_ip_billing_PaymentStatus" type="text/html"><span id="el_view_ip_billing_PaymentStatus">
<span<?php echo $view_ip_billing_edit->PaymentStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->PaymentStatus->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_PaymentStatus" name="x_PaymentStatus" id="x_PaymentStatus" value="<?php echo HtmlEncode($view_ip_billing_edit->PaymentStatus->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->PaymentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_ip_billing_status" for="x_status" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_status" type="text/html"><?php echo $view_ip_billing_edit->status->caption() ?><?php echo $view_ip_billing_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->status->cellAttributes() ?>>
<script id="tpx_view_ip_billing_status" type="text/html"><span id="el_view_ip_billing_status">
<span<?php echo $view_ip_billing_edit->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->status->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_status" name="x_status" id="x_status" value="<?php echo HtmlEncode($view_ip_billing_edit->status->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_view_ip_billing_createdby" for="x_createdby" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_createdby" type="text/html"><?php echo $view_ip_billing_edit->createdby->caption() ?><?php echo $view_ip_billing_edit->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->createdby->cellAttributes() ?>>
<script id="tpx_view_ip_billing_createdby" type="text/html"><span id="el_view_ip_billing_createdby">
<span<?php echo $view_ip_billing_edit->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->createdby->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($view_ip_billing_edit->createdby->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_view_ip_billing_createddatetime" for="x_createddatetime" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_createddatetime" type="text/html"><?php echo $view_ip_billing_edit->createddatetime->caption() ?><?php echo $view_ip_billing_edit->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->createddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_billing_createddatetime" type="text/html"><span id="el_view_ip_billing_createddatetime">
<span<?php echo $view_ip_billing_edit->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->createddatetime->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($view_ip_billing_edit->createddatetime->CurrentValue) ?>">
<script type="text/html" class="view_ip_billingedit_js">
loadjs.ready(["fview_ip_billingedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_billingedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ip_billing_edit->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_view_ip_billing_modifiedby" for="x_modifiedby" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_modifiedby" type="text/html"><?php echo $view_ip_billing_edit->modifiedby->caption() ?><?php echo $view_ip_billing_edit->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->modifiedby->cellAttributes() ?>>
<script id="tpx_view_ip_billing_modifiedby" type="text/html"><span id="el_view_ip_billing_modifiedby">
<span<?php echo $view_ip_billing_edit->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->modifiedby->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" value="<?php echo HtmlEncode($view_ip_billing_edit->modifiedby->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_view_ip_billing_modifieddatetime" for="x_modifieddatetime" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_modifieddatetime" type="text/html"><?php echo $view_ip_billing_edit->modifieddatetime->caption() ?><?php echo $view_ip_billing_edit->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_billing_modifieddatetime" type="text/html"><span id="el_view_ip_billing_modifieddatetime">
<span<?php echo $view_ip_billing_edit->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->modifieddatetime->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" value="<?php echo HtmlEncode($view_ip_billing_edit->modifieddatetime->CurrentValue) ?>">
<script type="text/html" class="view_ip_billingedit_js">
loadjs.ready(["fview_ip_billingedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_billingedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ip_billing_edit->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_view_ip_billing_HospID" for="x_HospID" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_HospID" type="text/html"><?php echo $view_ip_billing_edit->HospID->caption() ?><?php echo $view_ip_billing_edit->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->HospID->cellAttributes() ?>>
<script id="tpx_view_ip_billing_HospID" type="text/html"><span id="el_view_ip_billing_HospID">
<span<?php echo $view_ip_billing_edit->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->HospID->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($view_ip_billing_edit->HospID->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label id="elh_view_ip_billing_ReferedByDr" for="x_ReferedByDr" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ReferedByDr" type="text/html"><?php echo $view_ip_billing_edit->ReferedByDr->caption() ?><?php echo $view_ip_billing_edit->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->ReferedByDr->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferedByDr" type="text/html"><span id="el_view_ip_billing_ReferedByDr">
<span<?php echo $view_ip_billing_edit->ReferedByDr->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->ReferedByDr->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferedByDr" name="x_ReferedByDr" id="x_ReferedByDr" value="<?php echo HtmlEncode($view_ip_billing_edit->ReferedByDr->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->ReferedByDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_view_ip_billing_ReferClinicname" for="x_ReferClinicname" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ReferClinicname" type="text/html"><?php echo $view_ip_billing_edit->ReferClinicname->caption() ?><?php echo $view_ip_billing_edit->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->ReferClinicname->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferClinicname" type="text/html"><span id="el_view_ip_billing_ReferClinicname">
<span<?php echo $view_ip_billing_edit->ReferClinicname->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->ReferClinicname->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" value="<?php echo HtmlEncode($view_ip_billing_edit->ReferClinicname->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_view_ip_billing_ReferCity" for="x_ReferCity" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ReferCity" type="text/html"><?php echo $view_ip_billing_edit->ReferCity->caption() ?><?php echo $view_ip_billing_edit->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->ReferCity->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferCity" type="text/html"><span id="el_view_ip_billing_ReferCity">
<span<?php echo $view_ip_billing_edit->ReferCity->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->ReferCity->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" value="<?php echo HtmlEncode($view_ip_billing_edit->ReferCity->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_view_ip_billing_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ReferMobileNo" type="text/html"><?php echo $view_ip_billing_edit->ReferMobileNo->caption() ?><?php echo $view_ip_billing_edit->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferMobileNo" type="text/html"><span id="el_view_ip_billing_ReferMobileNo">
<span<?php echo $view_ip_billing_edit->ReferMobileNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->ReferMobileNo->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" value="<?php echo HtmlEncode($view_ip_billing_edit->ReferMobileNo->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label id="elh_view_ip_billing_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ReferA4TreatingConsultant" type="text/html"><?php echo $view_ip_billing_edit->ReferA4TreatingConsultant->caption() ?><?php echo $view_ip_billing_edit->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferA4TreatingConsultant" type="text/html"><span id="el_view_ip_billing_ReferA4TreatingConsultant">
<span<?php echo $view_ip_billing_edit->ReferA4TreatingConsultant->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->ReferA4TreatingConsultant->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?php echo HtmlEncode($view_ip_billing_edit->ReferA4TreatingConsultant->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->ReferA4TreatingConsultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label id="elh_view_ip_billing_PurposreReferredfor" for="x_PurposreReferredfor" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_PurposreReferredfor" type="text/html"><?php echo $view_ip_billing_edit->PurposreReferredfor->caption() ?><?php echo $view_ip_billing_edit->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_view_ip_billing_PurposreReferredfor" type="text/html"><span id="el_view_ip_billing_PurposreReferredfor">
<span<?php echo $view_ip_billing_edit->PurposreReferredfor->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->PurposreReferredfor->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" value="<?php echo HtmlEncode($view_ip_billing_edit->PurposreReferredfor->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->PurposreReferredfor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_view_ip_billing_patient_id" for="x_patient_id" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_patient_id" type="text/html"><?php echo $view_ip_billing_edit->patient_id->caption() ?><?php echo $view_ip_billing_edit->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->patient_id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_patient_id" type="text/html"><span id="el_view_ip_billing_patient_id">
<span<?php echo $view_ip_billing_edit->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_billing_edit->patient_id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_billing" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" value="<?php echo HtmlEncode($view_ip_billing_edit->patient_id->CurrentValue) ?>">
<?php echo $view_ip_billing_edit->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->BillClosing->Visible) { // BillClosing ?>
	<div id="r_BillClosing" class="form-group row">
		<label id="elh_view_ip_billing_BillClosing" for="x_BillClosing" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_BillClosing" type="text/html"><?php echo $view_ip_billing_edit->BillClosing->caption() ?><?php echo $view_ip_billing_edit->BillClosing->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->BillClosing->cellAttributes() ?>>
<script id="tpx_view_ip_billing_BillClosing" type="text/html"><span id="el_view_ip_billing_BillClosing">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_billing" data-field="x_BillClosing" data-value-separator="<?php echo $view_ip_billing_edit->BillClosing->displayValueSeparatorAttribute() ?>" id="x_BillClosing" name="x_BillClosing"<?php echo $view_ip_billing_edit->BillClosing->editAttributes() ?>>
			<?php echo $view_ip_billing_edit->BillClosing->selectOptionListHtml("x_BillClosing") ?>
		</select>
</div>
</span></script>
<?php echo $view_ip_billing_edit->BillClosing->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->BillClosingDate->Visible) { // BillClosingDate ?>
	<div id="r_BillClosingDate" class="form-group row">
		<label id="elh_view_ip_billing_BillClosingDate" for="x_BillClosingDate" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_BillClosingDate" type="text/html"><?php echo $view_ip_billing_edit->BillClosingDate->caption() ?><?php echo $view_ip_billing_edit->BillClosingDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->BillClosingDate->cellAttributes() ?>>
<script id="tpx_view_ip_billing_BillClosingDate" type="text/html"><span id="el_view_ip_billing_BillClosingDate">
<input type="text" data-table="view_ip_billing" data-field="x_BillClosingDate" data-format="7" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?php echo HtmlEncode($view_ip_billing_edit->BillClosingDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing_edit->BillClosingDate->EditValue ?>"<?php echo $view_ip_billing_edit->BillClosingDate->editAttributes() ?>>
<?php if (!$view_ip_billing_edit->BillClosingDate->ReadOnly && !$view_ip_billing_edit->BillClosingDate->Disabled && !isset($view_ip_billing_edit->BillClosingDate->EditAttrs["readonly"]) && !isset($view_ip_billing_edit->BillClosingDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ip_billingedit_js">
loadjs.ready(["fview_ip_billingedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_billingedit", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $view_ip_billing_edit->BillClosingDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_view_ip_billing_BillNumber" for="x_BillNumber" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_BillNumber" type="text/html"><?php echo $view_ip_billing_edit->BillNumber->caption() ?><?php echo $view_ip_billing_edit->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->BillNumber->cellAttributes() ?>>
<script id="tpx_view_ip_billing_BillNumber" type="text/html"><span id="el_view_ip_billing_BillNumber">
<input type="text" data-table="view_ip_billing" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing_edit->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing_edit->BillNumber->EditValue ?>"<?php echo $view_ip_billing_edit->BillNumber->editAttributes() ?>>
</span></script>
<?php echo $view_ip_billing_edit->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->ClosingAmount->Visible) { // ClosingAmount ?>
	<div id="r_ClosingAmount" class="form-group row">
		<label id="elh_view_ip_billing_ClosingAmount" for="x_ClosingAmount" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ClosingAmount" type="text/html"><?php echo $view_ip_billing_edit->ClosingAmount->caption() ?><?php echo $view_ip_billing_edit->ClosingAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->ClosingAmount->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ClosingAmount" type="text/html"><span id="el_view_ip_billing_ClosingAmount">
<input type="text" data-table="view_ip_billing" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing_edit->ClosingAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing_edit->ClosingAmount->EditValue ?>"<?php echo $view_ip_billing_edit->ClosingAmount->editAttributes() ?>>
</span></script>
<?php echo $view_ip_billing_edit->ClosingAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->ClosingType->Visible) { // ClosingType ?>
	<div id="r_ClosingType" class="form-group row">
		<label id="elh_view_ip_billing_ClosingType" for="x_ClosingType" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ClosingType" type="text/html"><?php echo $view_ip_billing_edit->ClosingType->caption() ?><?php echo $view_ip_billing_edit->ClosingType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->ClosingType->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ClosingType" type="text/html"><span id="el_view_ip_billing_ClosingType">
<input type="text" data-table="view_ip_billing" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing_edit->ClosingType->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing_edit->ClosingType->EditValue ?>"<?php echo $view_ip_billing_edit->ClosingType->editAttributes() ?>>
</span></script>
<?php echo $view_ip_billing_edit->ClosingType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->BillAmount->Visible) { // BillAmount ?>
	<div id="r_BillAmount" class="form-group row">
		<label id="elh_view_ip_billing_BillAmount" for="x_BillAmount" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_BillAmount" type="text/html"><?php echo $view_ip_billing_edit->BillAmount->caption() ?><?php echo $view_ip_billing_edit->BillAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->BillAmount->cellAttributes() ?>>
<script id="tpx_view_ip_billing_BillAmount" type="text/html"><span id="el_view_ip_billing_BillAmount">
<input type="text" data-table="view_ip_billing" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing_edit->BillAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing_edit->BillAmount->EditValue ?>"<?php echo $view_ip_billing_edit->BillAmount->editAttributes() ?>>
</span></script>
<?php echo $view_ip_billing_edit->BillAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing_edit->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_view_ip_billing_ReportHeader" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ReportHeader" type="text/html"><?php echo $view_ip_billing_edit->ReportHeader->caption() ?><?php echo $view_ip_billing_edit->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div <?php echo $view_ip_billing_edit->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReportHeader" type="text/html"><span id="el_view_ip_billing_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_ip_billing" data-field="x_ReportHeader" data-value-separator="<?php echo $view_ip_billing_edit->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $view_ip_billing_edit->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_billing_edit->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span></script>
<?php echo $view_ip_billing_edit->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_ip_billingedit" class="ew-custom-template"></div>
<script id="tpm_view_ip_billingedit" type="text/html">
<div id="ct_view_ip_billing_edit"><style>
.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
	width: 90%;
}
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 90%;
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
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>
<?php

function convertToIndianCurrency($number) {
	$no = round($number);
	$decimal = round($number - ($no = floor($number)), 2) * 100;    
	$digits_length = strlen($no);    
	$i = 0;
	$str = array();
	$words = array(
		0 => '',
		1 => 'One',
		2 => 'Two',
		3 => 'Three',
		4 => 'Four',
		5 => 'Five',
		6 => 'Six',
		7 => 'Seven',
		8 => 'Eight',
		9 => 'Nine',
		10 => 'Ten',
		11 => 'Eleven',
		12 => 'Twelve',
		13 => 'Thirteen',
		14 => 'Fourteen',
		15 => 'Fifteen',
		16 => 'Sixteen',
		17 => 'Seventeen',
		18 => 'Eighteen',
		19 => 'Nineteen',
		20 => 'Twenty',
		30 => 'Thirty',
		40 => 'Forty',
		50 => 'Fifty',
		60 => 'Sixty',
		70 => 'Seventy',
		80 => 'Eighty',
		90 => 'Ninety');
	$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
	while ($i < $digits_length) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += $divider == 10 ? 1 : 2;
		if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
			$str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
		} else {
			$str [] = null;
		}  
	}
	$Rupees = implode(' ', array_reverse($str));
	$paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
	return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}
	$invoiceId = $Page->id->CurrentValue;
	$dbhelper = &DbHelper();
	$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where id='".$invoiceId."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$physician_id = $results1[0]["physician_id"];
	$BillNumber =  $results1[0]["BillNumber"];
	$sql = "SELECT * FROM ganeshkumar_bjhims.doctors where id='".$physician_id."'; ";
	$results1A = $dbhelper->ExecuteRows($sql);
	$Doctor = $results1A[0]["NAME"];
	$patient_id = $results1[0]["PatientID"];
	$PatId = $results1[0]["patient_id"];
	$HospID = $results1[0]["HospID"];
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$PatId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Patid =  $row["id"];
	 $PatientID =  $row["PatientID"];
	 $PatientName =  $row["first_name"];
	 $gender =  $row["gender"];
	 $dob =  $row["dob"];
	 $Age =  $row["Age"];
	 if($dob != null)
	 {
	 	$Age = $Age;
	 }
	 $mobile_no =  $row["mobile_no"];
	 $IdentificationMark =  $row["IdentificationMark"];
	 $Religion =  $row["Religion"];
	 $street =  $row["street"];
	 $town =  $row["town"];
	 $province =  $row["province"];
	 $country =  $row["country"];
	 $postal_code =  $row["postal_code"];
	 $PEmail =  $row["PEmail"];
	if( $street != '')
	{
		$address .= $street;
	}
	if( $town != '')
	{
		$address .= ', '.$town;
	}
	if( $province != '')
	{
		$address .= ', '.$province;
	}
	if( $country != '')
	{
		$address .= ', '.$country;
	}
	 if( $postal_code != '')
	{
		$address .= ', '.$postal_code;
	}
	 $rs->MoveNext();
 }
$aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 $sql = "SELECT * FROM ganeshkumar_bjhims.hospital where id='".$HospID."' ;";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["BillingGST"] != "")
{
$HospGST = "GST No:". $results2[0]["BillingGST"];
}
if($Page->ReportHeader->CurrentValue=="Yes")
{
$id =  $results2[0]["id"];
 $logo = $results2[0]["logo"];
 $hospital = $results2[0]["hospital"];
 $street = $results2[0]["street"];
 $area = $results2[0]["area"];
 $town = $results2[0]["town"];
 $province = $results2[0]["province"];
 $postal_code = $results2[0]["postal_code"];
 $phone_no = $results2[0]["phone_no"];
 $PreFixCode = $results2[0]["PreFixCode"];
 $status = $results2[0]["status"];
$createdby =  $results2[0]["createdby"];
$createddatetime =  $results2[0]["createddatetime"];
$modifiedby =  $results2[0]["modifiedby"];
$modifieddatetime =  $results2[0]["modifieddatetime"];
$BillingGST =  $results2[0]["BillingGST"];
$pharmacyGST =  $results2[0]["pharmacyGST"];
$hospaddress = '';
if( $street != '')
{
	$hospaddress .= $street;
}
if( $area != '')
{
	$hospaddress .= ', '.$area;
}
if( $town != '')
{
	$hospaddress .= ', '.$town;
}
if( $province != '')
{
	$hospaddress .= ', '.$province;
}
if( $country != '')
{
	$hospaddress .= ', '.$country;
}
if( $postal_code != '')
{
	$hospaddress .= ', '.$postal_code . '.';
	}
$hospphone_no = '';
if( $phone_no != '')
{
	$hospphone_no .= '		<tr>
			<td  style="width:50px;"></td>
			<td align="center">Ph: '.$phone_no.' .</td>
			<td  style="width:50px;"></td>
		</tr>';
}
$heeddeer = '<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr>
			<td  style="width:50px;"></td>
			<td><h2 align="center">'.$hospital.'</h2></td>
			<td  style="width:50px;"></td>
		</tr>
		<tr>
			<td  style="width:50px;"></td>
			<td align="center">'.$hospaddress.'</td>
			<td  style="width:50px;"></td>
		</tr>
		'.$hospphone_no.'
	</tbody>
</table>
';
echo $heeddeer;
}
 ?>
<table width="100%">
	 <tbody>
		<tr>
<td></td>
<td>
<?php
		if($Page->ReportHeader->CurrentValue=="Yes")
		{
			echo '<h5 align="center"><u>PATIENT BILL OF SUPPLY</u></h5>';
		}else{
			echo '<h2 align="center">PATIENT BILL OF SUPPLY</h2>';
		}
?>
</td>
<td  style="float: right;"><?php echo $HospGST; ?></td>
</tr>
	</tbody>
</table>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;">Patient Id: <?php echo $PatientID; ?> </td><td  style="float: right;">Bill No: <?php echo $BillNumber; ?></td></tr>
		<tr><td  style="float:left;">Patient Name: <?php echo $PatientName; ?></td><td  style="float: right;">Bill Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
		<tr><td  style="float:left;"> Age: <?php echo $Age; ?> </td><td  style="float: right;">Consultant: <?php echo $Doctor; ?></td></tr>
		<tr><td  style="float:left;width:50%;">Gender: <?php echo $gender; ?> </td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;"></td></tr>
	</tbody>
</table>
	</font>
<?php
$GRTotal = 0;
$dbhelper = &DbHelper();
$sqlA = "SELECT Service_Department FROM ganeshkumar_bjhims.patient_services where Reception='".$invoiceId."' group by Service_Department;";
$rsA = $dbhelper->LoadRecordset($sqlA);
while (!$rsA->EOF) {
	$rowA = &$rsA->fields;
 $hhh = '<font size="4" > <b>'.$rowA["Service_Department"].'</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Description</b></td>
<td align="center"><b>Unit Price</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b align="right">Price</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_services where Reception='".$invoiceId."' and  Service_Department='".$rowA["Service_Department"]."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Services"];
				$ItemCode =  $row["ItemCode"];
				$Qty = $row["Quantity"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["SubTotal"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$Rate.'</td><td align="center">'.$Qty.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SSTotal = $SSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
	  $GRTotal = $GRTotal + $SSTotal;
	  	$rsA->MoveNext();
}

//==============================
//$GRTotal = 0;

$dbhelper = &DbHelper();
$sqlA = "SELECT BRCODE,BRNAME FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$invoiceId."' group by BRCODE,BRNAME;";
$rsA = $dbhelper->LoadRecordset($sqlA);
while (!$rsA->EOF) {
	$rowA = &$rsA->fields;
 $hhh = '<font size="4" > <b>'.$rowA["BRNAME"].'</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Description</b></td>
<td align="center"><b>Mfg</b></td>
<td align="center"><b>Exp</b></td>
<td align="center"><b>Batch</b></td>
<td align="center"><b>Unit Price</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b align="right">Price</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$invoiceId."' and  BRCODE='".$rowA["BRCODE"]."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Product"];
				$ItemCode =  $row["PRC"];
				$Mfg =  $row["Mfg"];

				//$EXPDT =  $row["EXPDT"];
				$EXPDT =  date("d-m-Y", strtotime($row["EXPDT"]));
				$BATCHNO =  $row["BATCHNO"];
				$Qty = number_format($row["IQ"]);
				$Rate =  $row["RT"];
				$SubTotal =  $row["DAMT"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

$hhh .= '<tr><td>'.$Services.'</td><td>'.$Mfg.'</td><td>'.$EXPDT.'</td><td>'.$BATCHNO.'</td><td align="right">'.$Rate.'</td><td align="center">'.$Qty.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SSTotal = $SSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td></td><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
	  $GRTotal = $GRTotal + $SSTotal;
	  	$rsA->MoveNext();
}
 $hhh = '<font size="4" > <b>Advance</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Advance No</b></td>
<td align="center"><b>Date </b></td>
<td align="center"><b>Mode Of Payment</b></td>
<td align="center"><b align="right">Amount</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SASTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_other_voucher where Reception='".$invoiceId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["AdvanceNo"];
				$ItemCode =  date("d-m-Y", strtotime( $row["Date"]));
				$Qty = 1; //$row["Services"];
				$Rate =  $row["ModeofPayment"];
				$SubTotal =  $row["Amount"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

				$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$ItemCode.'</td><td align="center">'.$Rate.'</td><td align="right">'.number_format($row["Amount"],2).'</td></tr>  ';
$SASTotal = $SASTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SASTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
 $hhh = '<font size="4" > <b>Refund</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Refund No</b></td>
<td align="center"><b>Date </b></td>
<td align="center"><b>Mode Of Payment</b></td>
<td align="center"><b align="right">Amount</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SrSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_refund_voucher where Reception='".$invoiceId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["AdvanceNo"];
				$ItemCode =  date("d-m-Y", strtotime( $row["Date"]));
				$Qty = 1; //$row["Services"];
				$Rate =  $row["ModeofPayment"];
				$SubTotal =  number_format($row["Amount"],2);

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

				$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$ItemCode.'</td><td align="center">'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SrSTotal = $SrSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SrSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
if($SSTotal != '')
{
	  echo $hhh;
}
 $hhh = '<font size="4" > 
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="left" style="width:50%"><b>Total Bill Amount</b></td>
<td align="right"><b align="right">'.number_format($GRTotal,2).'</b></td>
</tr>';
 $hhh .= '
<tr>
<td align="left" style="width:50%"><b>Total Advance Amount</b></td>
<td align="right"><b align="right">'.number_format($SASTotal,2).'</b></td>
</tr>';
if($SSTotal != '')
{
 $hhh .= '
<tr>
<td align="left" style="width:50%"><b>Total Refund Amount</b></td>
<td align="right"><b align="right">'.number_format($SrSTotal,2).'</b></td>
</tr>';
	   $BALTotal = ($GRTotal - $SASTotal)+$SrSTotal;
	$hhh .= '<tr><td align="left">(Total Bill Amount - Total Advance Amount) + Total Refund Amount </td><td align="right">'.number_format($BALTotal,2).'</td></tr>  ';
}else
{
 $BALTotal = $GRTotal - $SASTotal;
$hhh .= '<tr><td align="left">Total Bill Amount - Total Advance Amount </td><td align="right">'.number_format($BALTotal,2).'</td></tr>  ';
}
$hhh .= '</table> </font><br>';
 echo $hhh;
 if($BALTotal > 100)
 {
 	echo '</br><b>Balance amount to be paid : '.$BALTotal.' <b></br>';
 	$AccountClosingType = 'Paid';
 }
 if($BALTotal < 0)
 {
 	echo '</br><b>Balance amount to be Refund : '.$BALTotal.' <b></br>';
 	$AccountClosingType = 'Refund';
 }
 if($BALTotal >= 0 && $BALTotal <= 100)
 {
	 echo '</br><b>Bill Tallied <b> </br>';
 }
	  $tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
	  echo '<b>Grand Total :   '. number_format($GRTotal,2).' </b></br>';
	  echo '<b>Grand Total in words  :   '. convertToIndianCurrency($GRTotal).' </b></br>';
?>
<br><br>
<table class="ew-table">
	 <tbody>
		<tr><td>{{include tmpl="#tpc_view_ip_billing_release_date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_billing_release_date")/}}</td><td>{{include tmpl="#tpc_view_ip_billing_BillClosing"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_billing_BillClosing")/}}</td><td>{{include tmpl="#tpc_view_ip_billing_BillClosingDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_billing_BillClosingDate")/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_view_ip_billing_BillAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_billing_BillAmount")/}}</td><td>{{include tmpl="#tpc_view_ip_billing_ClosingAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_billing_ClosingAmount")/}}</td><td>{{include tmpl="#tpc_view_ip_billing_ClosingType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_billing_ClosingType")/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_view_ip_billing_BillNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_billing_BillNumber")/}}</td><td>{{include tmpl="#tpc_view_ip_billing_ReportHeader"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_billing_ReportHeader")/}}</td><td></td></tr>
	</tbody>
</table>
<br>
<font size="4" >
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p align="right">Signature<p>
	  </font>
</div>
</script>

<?php if (!$view_ip_billing_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_ip_billing_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ip_billing_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_ip_billing->Rows) ?> };
	ew.applyTemplate("tpd_view_ip_billingedit", "tpm_view_ip_billingedit", "view_ip_billingedit", "<?php echo $view_ip_billing->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_ip_billingedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_ip_billing_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("x_BillNumber").readOnly=!0,document.getElementById("x_ClosingAmount").value="<?php echo number_format($BALTotal,2); ?>",document.getElementById("x_ClosingType").value="<?php echo $AccountClosingType; ?>",document.getElementById("x_ClosingAmount").readOnly=!0,document.getElementById("x_ClosingType").readOnly=!0,document.getElementById("x_BillAmount").readOnly=!0,document.getElementById("x_BillAmount").value="<?php echo number_format($GRTotal,2); ?>";
});
</script>
<?php include_once "footer.php"; ?>
<?php
$view_ip_billing_edit->terminate();
?>