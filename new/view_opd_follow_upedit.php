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
$view_opd_follow_up_edit = new view_opd_follow_up_edit();

// Run the page
$view_opd_follow_up_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_opd_follow_up_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_opd_follow_upedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fview_opd_follow_upedit = currentForm = new ew.Form("fview_opd_follow_upedit", "edit");

	// Validate form
	fview_opd_follow_upedit.validate = function() {
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
			<?php if ($view_opd_follow_up_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->id->caption(), $view_opd_follow_up_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->Reception->caption(), $view_opd_follow_up_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->PatientId->caption(), $view_opd_follow_up_edit->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->mrnno->caption(), $view_opd_follow_up_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->PatientName->caption(), $view_opd_follow_up_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->Telephone->Required) { ?>
				elm = this.getElements("x" + infix + "_Telephone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->Telephone->caption(), $view_opd_follow_up_edit->Telephone->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->Age->caption(), $view_opd_follow_up_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->Gender->caption(), $view_opd_follow_up_edit->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->profilePic->caption(), $view_opd_follow_up_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->procedurenotes->Required) { ?>
				elm = this.getElements("x" + infix + "_procedurenotes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->procedurenotes->caption(), $view_opd_follow_up_edit->procedurenotes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->NextReviewDate->Required) { ?>
				elm = this.getElements("x" + infix + "_NextReviewDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->NextReviewDate->caption(), $view_opd_follow_up_edit->NextReviewDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NextReviewDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_opd_follow_up_edit->NextReviewDate->errorMessage()) ?>");
			<?php if ($view_opd_follow_up_edit->ICSIAdvised->Required) { ?>
				elm = this.getElements("x" + infix + "_ICSIAdvised[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->ICSIAdvised->caption(), $view_opd_follow_up_edit->ICSIAdvised->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->DeliveryRegistered->Required) { ?>
				elm = this.getElements("x" + infix + "_DeliveryRegistered[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->DeliveryRegistered->caption(), $view_opd_follow_up_edit->DeliveryRegistered->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->EDD->Required) { ?>
				elm = this.getElements("x" + infix + "_EDD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->EDD->caption(), $view_opd_follow_up_edit->EDD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EDD");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_opd_follow_up_edit->EDD->errorMessage()) ?>");
			<?php if ($view_opd_follow_up_edit->SerologyPositive->Required) { ?>
				elm = this.getElements("x" + infix + "_SerologyPositive[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->SerologyPositive->caption(), $view_opd_follow_up_edit->SerologyPositive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->Allergy->Required) { ?>
				elm = this.getElements("x" + infix + "_Allergy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->Allergy->caption(), $view_opd_follow_up_edit->Allergy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->status->caption(), $view_opd_follow_up_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_opd_follow_up_edit->status->errorMessage()) ?>");
			<?php if ($view_opd_follow_up_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->modifiedby->caption(), $view_opd_follow_up_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->modifieddatetime->caption(), $view_opd_follow_up_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->LMP->Required) { ?>
				elm = this.getElements("x" + infix + "_LMP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->LMP->caption(), $view_opd_follow_up_edit->LMP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LMP");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_opd_follow_up_edit->LMP->errorMessage()) ?>");
			<?php if ($view_opd_follow_up_edit->Procedure->Required) { ?>
				elm = this.getElements("x" + infix + "_Procedure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->Procedure->caption(), $view_opd_follow_up_edit->Procedure->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_opd_follow_up_edit->ProcedureDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcedureDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->ProcedureDateTime->caption(), $view_opd_follow_up_edit->ProcedureDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProcedureDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_opd_follow_up_edit->ProcedureDateTime->errorMessage()) ?>");
			<?php if ($view_opd_follow_up_edit->ICSIDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ICSIDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->ICSIDate->caption(), $view_opd_follow_up_edit->ICSIDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ICSIDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_opd_follow_up_edit->ICSIDate->errorMessage()) ?>");
			<?php if ($view_opd_follow_up_edit->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up_edit->RIDNo->caption(), $view_opd_follow_up_edit->RIDNo->RequiredErrorMessage)) ?>");
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
	fview_opd_follow_upedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_opd_follow_upedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_opd_follow_upedit.lists["x_ICSIAdvised[]"] = <?php echo $view_opd_follow_up_edit->ICSIAdvised->Lookup->toClientList($view_opd_follow_up_edit) ?>;
	fview_opd_follow_upedit.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($view_opd_follow_up_edit->ICSIAdvised->options(FALSE, TRUE)) ?>;
	fview_opd_follow_upedit.lists["x_DeliveryRegistered[]"] = <?php echo $view_opd_follow_up_edit->DeliveryRegistered->Lookup->toClientList($view_opd_follow_up_edit) ?>;
	fview_opd_follow_upedit.lists["x_DeliveryRegistered[]"].options = <?php echo JsonEncode($view_opd_follow_up_edit->DeliveryRegistered->options(FALSE, TRUE)) ?>;
	fview_opd_follow_upedit.lists["x_SerologyPositive[]"] = <?php echo $view_opd_follow_up_edit->SerologyPositive->Lookup->toClientList($view_opd_follow_up_edit) ?>;
	fview_opd_follow_upedit.lists["x_SerologyPositive[]"].options = <?php echo JsonEncode($view_opd_follow_up_edit->SerologyPositive->options(FALSE, TRUE)) ?>;
	fview_opd_follow_upedit.lists["x_Allergy"] = <?php echo $view_opd_follow_up_edit->Allergy->Lookup->toClientList($view_opd_follow_up_edit) ?>;
	fview_opd_follow_upedit.lists["x_Allergy"].options = <?php echo JsonEncode($view_opd_follow_up_edit->Allergy->lookupOptions()) ?>;
	loadjs.done("fview_opd_follow_upedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_opd_follow_up_edit->showPageHeader(); ?>
<?php
$view_opd_follow_up_edit->showMessage();
?>
<form name="fview_opd_follow_upedit" id="fview_opd_follow_upedit" class="<?php echo $view_opd_follow_up_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_opd_follow_up">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_opd_follow_up_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_opd_follow_up_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_opd_follow_up_id" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->id->caption() ?><?php echo $view_opd_follow_up_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->id->cellAttributes() ?>>
<span id="el_view_opd_follow_up_id">
<span<?php echo $view_opd_follow_up_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_opd_follow_up_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_opd_follow_up" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_opd_follow_up_edit->id->CurrentValue) ?>">
<?php echo $view_opd_follow_up_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_view_opd_follow_up_Reception" for="x_Reception" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->Reception->caption() ?><?php echo $view_opd_follow_up_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->Reception->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Reception">
<input type="text" data-table="view_opd_follow_up" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->Reception->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up_edit->Reception->EditValue ?>"<?php echo $view_opd_follow_up_edit->Reception->editAttributes() ?>>
</span>
<?php echo $view_opd_follow_up_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_view_opd_follow_up_PatientId" for="x_PatientId" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->PatientId->caption() ?><?php echo $view_opd_follow_up_edit->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->PatientId->cellAttributes() ?>>
<span id="el_view_opd_follow_up_PatientId">
<input type="text" data-table="view_opd_follow_up" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up_edit->PatientId->EditValue ?>"<?php echo $view_opd_follow_up_edit->PatientId->editAttributes() ?>>
</span>
<?php echo $view_opd_follow_up_edit->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_view_opd_follow_up_mrnno" for="x_mrnno" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->mrnno->caption() ?><?php echo $view_opd_follow_up_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->mrnno->cellAttributes() ?>>
<span id="el_view_opd_follow_up_mrnno">
<input type="text" data-table="view_opd_follow_up" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up_edit->mrnno->EditValue ?>"<?php echo $view_opd_follow_up_edit->mrnno->editAttributes() ?>>
</span>
<?php echo $view_opd_follow_up_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_view_opd_follow_up_PatientName" for="x_PatientName" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->PatientName->caption() ?><?php echo $view_opd_follow_up_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->PatientName->cellAttributes() ?>>
<span id="el_view_opd_follow_up_PatientName">
<input type="text" data-table="view_opd_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up_edit->PatientName->EditValue ?>"<?php echo $view_opd_follow_up_edit->PatientName->editAttributes() ?>>
</span>
<?php echo $view_opd_follow_up_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->Telephone->Visible) { // Telephone ?>
	<div id="r_Telephone" class="form-group row">
		<label id="elh_view_opd_follow_up_Telephone" for="x_Telephone" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->Telephone->caption() ?><?php echo $view_opd_follow_up_edit->Telephone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->Telephone->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Telephone">
<input type="text" data-table="view_opd_follow_up" data-field="x_Telephone" name="x_Telephone" id="x_Telephone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->Telephone->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up_edit->Telephone->EditValue ?>"<?php echo $view_opd_follow_up_edit->Telephone->editAttributes() ?>>
</span>
<?php echo $view_opd_follow_up_edit->Telephone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_view_opd_follow_up_Age" for="x_Age" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->Age->caption() ?><?php echo $view_opd_follow_up_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->Age->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Age">
<input type="text" data-table="view_opd_follow_up" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->Age->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up_edit->Age->EditValue ?>"<?php echo $view_opd_follow_up_edit->Age->editAttributes() ?>>
</span>
<?php echo $view_opd_follow_up_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_view_opd_follow_up_Gender" for="x_Gender" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->Gender->caption() ?><?php echo $view_opd_follow_up_edit->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->Gender->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Gender">
<input type="text" data-table="view_opd_follow_up" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->Gender->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up_edit->Gender->EditValue ?>"<?php echo $view_opd_follow_up_edit->Gender->editAttributes() ?>>
</span>
<?php echo $view_opd_follow_up_edit->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_view_opd_follow_up_profilePic" for="x_profilePic" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->profilePic->caption() ?><?php echo $view_opd_follow_up_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->profilePic->cellAttributes() ?>>
<span id="el_view_opd_follow_up_profilePic">
<textarea data-table="view_opd_follow_up" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->profilePic->getPlaceHolder()) ?>"<?php echo $view_opd_follow_up_edit->profilePic->editAttributes() ?>><?php echo $view_opd_follow_up_edit->profilePic->EditValue ?></textarea>
</span>
<?php echo $view_opd_follow_up_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->procedurenotes->Visible) { // procedurenotes ?>
	<div id="r_procedurenotes" class="form-group row">
		<label id="elh_view_opd_follow_up_procedurenotes" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->procedurenotes->caption() ?><?php echo $view_opd_follow_up_edit->procedurenotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->procedurenotes->cellAttributes() ?>>
<span id="el_view_opd_follow_up_procedurenotes">
<?php $view_opd_follow_up_edit->procedurenotes->EditAttrs->appendClass("editor"); ?>
<textarea data-table="view_opd_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->procedurenotes->getPlaceHolder()) ?>"<?php echo $view_opd_follow_up_edit->procedurenotes->editAttributes() ?>><?php echo $view_opd_follow_up_edit->procedurenotes->EditValue ?></textarea>
<script>
loadjs.ready(["fview_opd_follow_upedit", "editor"], function() {
	ew.createEditor("fview_opd_follow_upedit", "x_procedurenotes", 35, 4, <?php echo $view_opd_follow_up_edit->procedurenotes->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
</span>
<?php echo $view_opd_follow_up_edit->procedurenotes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->NextReviewDate->Visible) { // NextReviewDate ?>
	<div id="r_NextReviewDate" class="form-group row">
		<label id="elh_view_opd_follow_up_NextReviewDate" for="x_NextReviewDate" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->NextReviewDate->caption() ?><?php echo $view_opd_follow_up_edit->NextReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->NextReviewDate->cellAttributes() ?>>
<span id="el_view_opd_follow_up_NextReviewDate">
<input type="text" data-table="view_opd_follow_up" data-field="x_NextReviewDate" name="x_NextReviewDate" id="x_NextReviewDate" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up_edit->NextReviewDate->EditValue ?>"<?php echo $view_opd_follow_up_edit->NextReviewDate->editAttributes() ?>>
<?php if (!$view_opd_follow_up_edit->NextReviewDate->ReadOnly && !$view_opd_follow_up_edit->NextReviewDate->Disabled && !isset($view_opd_follow_up_edit->NextReviewDate->EditAttrs["readonly"]) && !isset($view_opd_follow_up_edit->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_opd_follow_upedit", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_opd_follow_up_edit->NextReviewDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<div id="r_ICSIAdvised" class="form-group row">
		<label id="elh_view_opd_follow_up_ICSIAdvised" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->ICSIAdvised->caption() ?><?php echo $view_opd_follow_up_edit->ICSIAdvised->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->ICSIAdvised->cellAttributes() ?>>
<span id="el_view_opd_follow_up_ICSIAdvised">
<div id="tp_x_ICSIAdvised" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_opd_follow_up" data-field="x_ICSIAdvised" data-value-separator="<?php echo $view_opd_follow_up_edit->ICSIAdvised->displayValueSeparatorAttribute() ?>" name="x_ICSIAdvised[]" id="x_ICSIAdvised[]" value="{value}"<?php echo $view_opd_follow_up_edit->ICSIAdvised->editAttributes() ?>></div>
<div id="dsl_x_ICSIAdvised" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_opd_follow_up_edit->ICSIAdvised->checkBoxListHtml(FALSE, "x_ICSIAdvised[]") ?>
</div></div>
</span>
<?php echo $view_opd_follow_up_edit->ICSIAdvised->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<div id="r_DeliveryRegistered" class="form-group row">
		<label id="elh_view_opd_follow_up_DeliveryRegistered" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->DeliveryRegistered->caption() ?><?php echo $view_opd_follow_up_edit->DeliveryRegistered->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->DeliveryRegistered->cellAttributes() ?>>
<span id="el_view_opd_follow_up_DeliveryRegistered">
<div id="tp_x_DeliveryRegistered" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_opd_follow_up" data-field="x_DeliveryRegistered" data-value-separator="<?php echo $view_opd_follow_up_edit->DeliveryRegistered->displayValueSeparatorAttribute() ?>" name="x_DeliveryRegistered[]" id="x_DeliveryRegistered[]" value="{value}"<?php echo $view_opd_follow_up_edit->DeliveryRegistered->editAttributes() ?>></div>
<div id="dsl_x_DeliveryRegistered" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_opd_follow_up_edit->DeliveryRegistered->checkBoxListHtml(FALSE, "x_DeliveryRegistered[]") ?>
</div></div>
</span>
<?php echo $view_opd_follow_up_edit->DeliveryRegistered->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->EDD->Visible) { // EDD ?>
	<div id="r_EDD" class="form-group row">
		<label id="elh_view_opd_follow_up_EDD" for="x_EDD" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->EDD->caption() ?><?php echo $view_opd_follow_up_edit->EDD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->EDD->cellAttributes() ?>>
<span id="el_view_opd_follow_up_EDD">
<input type="text" data-table="view_opd_follow_up" data-field="x_EDD" name="x_EDD" id="x_EDD" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->EDD->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up_edit->EDD->EditValue ?>"<?php echo $view_opd_follow_up_edit->EDD->editAttributes() ?>>
<?php if (!$view_opd_follow_up_edit->EDD->ReadOnly && !$view_opd_follow_up_edit->EDD->Disabled && !isset($view_opd_follow_up_edit->EDD->EditAttrs["readonly"]) && !isset($view_opd_follow_up_edit->EDD->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_opd_follow_upedit", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_opd_follow_up_edit->EDD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->SerologyPositive->Visible) { // SerologyPositive ?>
	<div id="r_SerologyPositive" class="form-group row">
		<label id="elh_view_opd_follow_up_SerologyPositive" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->SerologyPositive->caption() ?><?php echo $view_opd_follow_up_edit->SerologyPositive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->SerologyPositive->cellAttributes() ?>>
<span id="el_view_opd_follow_up_SerologyPositive">
<div id="tp_x_SerologyPositive" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_opd_follow_up" data-field="x_SerologyPositive" data-value-separator="<?php echo $view_opd_follow_up_edit->SerologyPositive->displayValueSeparatorAttribute() ?>" name="x_SerologyPositive[]" id="x_SerologyPositive[]" value="{value}"<?php echo $view_opd_follow_up_edit->SerologyPositive->editAttributes() ?>></div>
<div id="dsl_x_SerologyPositive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_opd_follow_up_edit->SerologyPositive->checkBoxListHtml(FALSE, "x_SerologyPositive[]") ?>
</div></div>
</span>
<?php echo $view_opd_follow_up_edit->SerologyPositive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->Allergy->Visible) { // Allergy ?>
	<div id="r_Allergy" class="form-group row">
		<label id="elh_view_opd_follow_up_Allergy" for="x_Allergy" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->Allergy->caption() ?><?php echo $view_opd_follow_up_edit->Allergy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->Allergy->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Allergy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Allergy"><?php echo EmptyValue(strval($view_opd_follow_up_edit->Allergy->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_opd_follow_up_edit->Allergy->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_opd_follow_up_edit->Allergy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_opd_follow_up_edit->Allergy->ReadOnly || $view_opd_follow_up_edit->Allergy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Allergy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_opd_follow_up_edit->Allergy->Lookup->getParamTag($view_opd_follow_up_edit, "p_x_Allergy") ?>
<input type="hidden" data-table="view_opd_follow_up" data-field="x_Allergy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_opd_follow_up_edit->Allergy->displayValueSeparatorAttribute() ?>" name="x_Allergy" id="x_Allergy" value="<?php echo $view_opd_follow_up_edit->Allergy->CurrentValue ?>"<?php echo $view_opd_follow_up_edit->Allergy->editAttributes() ?>>
</span>
<?php echo $view_opd_follow_up_edit->Allergy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_opd_follow_up_status" for="x_status" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->status->caption() ?><?php echo $view_opd_follow_up_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->status->cellAttributes() ?>>
<span id="el_view_opd_follow_up_status">
<input type="text" data-table="view_opd_follow_up" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->status->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up_edit->status->EditValue ?>"<?php echo $view_opd_follow_up_edit->status->editAttributes() ?>>
</span>
<?php echo $view_opd_follow_up_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->LMP->Visible) { // LMP ?>
	<div id="r_LMP" class="form-group row">
		<label id="elh_view_opd_follow_up_LMP" for="x_LMP" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->LMP->caption() ?><?php echo $view_opd_follow_up_edit->LMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->LMP->cellAttributes() ?>>
<span id="el_view_opd_follow_up_LMP">
<input type="text" data-table="view_opd_follow_up" data-field="x_LMP" name="x_LMP" id="x_LMP" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->LMP->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up_edit->LMP->EditValue ?>"<?php echo $view_opd_follow_up_edit->LMP->editAttributes() ?>>
<?php if (!$view_opd_follow_up_edit->LMP->ReadOnly && !$view_opd_follow_up_edit->LMP->Disabled && !isset($view_opd_follow_up_edit->LMP->EditAttrs["readonly"]) && !isset($view_opd_follow_up_edit->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_opd_follow_upedit", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_opd_follow_up_edit->LMP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label id="elh_view_opd_follow_up_Procedure" for="x_Procedure" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->Procedure->caption() ?><?php echo $view_opd_follow_up_edit->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->Procedure->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Procedure">
<textarea data-table="view_opd_follow_up" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->Procedure->getPlaceHolder()) ?>"<?php echo $view_opd_follow_up_edit->Procedure->editAttributes() ?>><?php echo $view_opd_follow_up_edit->Procedure->EditValue ?></textarea>
</span>
<?php echo $view_opd_follow_up_edit->Procedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<div id="r_ProcedureDateTime" class="form-group row">
		<label id="elh_view_opd_follow_up_ProcedureDateTime" for="x_ProcedureDateTime" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->ProcedureDateTime->caption() ?><?php echo $view_opd_follow_up_edit->ProcedureDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->ProcedureDateTime->cellAttributes() ?>>
<span id="el_view_opd_follow_up_ProcedureDateTime">
<input type="text" data-table="view_opd_follow_up" data-field="x_ProcedureDateTime" name="x_ProcedureDateTime" id="x_ProcedureDateTime" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->ProcedureDateTime->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up_edit->ProcedureDateTime->EditValue ?>"<?php echo $view_opd_follow_up_edit->ProcedureDateTime->editAttributes() ?>>
<?php if (!$view_opd_follow_up_edit->ProcedureDateTime->ReadOnly && !$view_opd_follow_up_edit->ProcedureDateTime->Disabled && !isset($view_opd_follow_up_edit->ProcedureDateTime->EditAttrs["readonly"]) && !isset($view_opd_follow_up_edit->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_opd_follow_upedit", "x_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_opd_follow_up_edit->ProcedureDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->ICSIDate->Visible) { // ICSIDate ?>
	<div id="r_ICSIDate" class="form-group row">
		<label id="elh_view_opd_follow_up_ICSIDate" for="x_ICSIDate" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->ICSIDate->caption() ?><?php echo $view_opd_follow_up_edit->ICSIDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->ICSIDate->cellAttributes() ?>>
<span id="el_view_opd_follow_up_ICSIDate">
<input type="text" data-table="view_opd_follow_up" data-field="x_ICSIDate" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->ICSIDate->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up_edit->ICSIDate->EditValue ?>"<?php echo $view_opd_follow_up_edit->ICSIDate->editAttributes() ?>>
<?php if (!$view_opd_follow_up_edit->ICSIDate->ReadOnly && !$view_opd_follow_up_edit->ICSIDate->Disabled && !isset($view_opd_follow_up_edit->ICSIDate->EditAttrs["readonly"]) && !isset($view_opd_follow_up_edit->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_opd_follow_upedit", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_opd_follow_up_edit->ICSIDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up_edit->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_view_opd_follow_up_RIDNo" for="x_RIDNo" class="<?php echo $view_opd_follow_up_edit->LeftColumnClass ?>"><?php echo $view_opd_follow_up_edit->RIDNo->caption() ?><?php echo $view_opd_follow_up_edit->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $view_opd_follow_up_edit->RIDNo->cellAttributes() ?>>
<span id="el_view_opd_follow_up_RIDNo">
<textarea data-table="view_opd_follow_up" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_opd_follow_up_edit->RIDNo->getPlaceHolder()) ?>"<?php echo $view_opd_follow_up_edit->RIDNo->editAttributes() ?>><?php echo $view_opd_follow_up_edit->RIDNo->EditValue ?></textarea>
</span>
<?php echo $view_opd_follow_up_edit->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_opd_follow_up_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_opd_follow_up_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_opd_follow_up_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_opd_follow_up_edit->showPageFooter();
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
$view_opd_follow_up_edit->terminate();
?>