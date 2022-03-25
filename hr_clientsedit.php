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
$hr_clients_edit = new hr_clients_edit();

// Run the page
$hr_clients_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_clients_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fhr_clientsedit = currentForm = new ew.Form("fhr_clientsedit", "edit");

// Validate form
fhr_clientsedit.validate = function() {
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
		<?php if ($hr_clients_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_clients->id->caption(), $hr_clients->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_clients_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_clients->name->caption(), $hr_clients->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_clients_edit->details->Required) { ?>
			elm = this.getElements("x" + infix + "_details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_clients->details->caption(), $hr_clients->details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_clients_edit->first_contact_date->Required) { ?>
			elm = this.getElements("x" + infix + "_first_contact_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_clients->first_contact_date->caption(), $hr_clients->first_contact_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_first_contact_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_clients->first_contact_date->errorMessage()) ?>");
		<?php if ($hr_clients_edit->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_clients->created->caption(), $hr_clients->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_clients->created->errorMessage()) ?>");
		<?php if ($hr_clients_edit->address->Required) { ?>
			elm = this.getElements("x" + infix + "_address");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_clients->address->caption(), $hr_clients->address->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_clients_edit->contact_number->Required) { ?>
			elm = this.getElements("x" + infix + "_contact_number");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_clients->contact_number->caption(), $hr_clients->contact_number->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_clients_edit->contact_email->Required) { ?>
			elm = this.getElements("x" + infix + "_contact_email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_clients->contact_email->caption(), $hr_clients->contact_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_clients_edit->company_url->Required) { ?>
			elm = this.getElements("x" + infix + "_company_url");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_clients->company_url->caption(), $hr_clients->company_url->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_clients_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_clients->status->caption(), $hr_clients->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_clients_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_clients->HospID->caption(), $hr_clients->HospID->RequiredErrorMessage)) ?>");
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
fhr_clientsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_clientsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_clientsedit.lists["x_status"] = <?php echo $hr_clients_edit->status->Lookup->toClientList() ?>;
fhr_clientsedit.lists["x_status"].options = <?php echo JsonEncode($hr_clients_edit->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_clients_edit->showPageHeader(); ?>
<?php
$hr_clients_edit->showMessage();
?>
<form name="fhr_clientsedit" id="fhr_clientsedit" class="<?php echo $hr_clients_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_clients_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_clients_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_clients">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$hr_clients_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($hr_clients->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_hr_clients_id" class="<?php echo $hr_clients_edit->LeftColumnClass ?>"><?php echo $hr_clients->id->caption() ?><?php echo ($hr_clients->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_clients_edit->RightColumnClass ?>"><div<?php echo $hr_clients->id->cellAttributes() ?>>
<span id="el_hr_clients_id">
<span<?php echo $hr_clients->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($hr_clients->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="hr_clients" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($hr_clients->id->CurrentValue) ?>">
<?php echo $hr_clients->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_clients->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_clients_name" for="x_name" class="<?php echo $hr_clients_edit->LeftColumnClass ?>"><?php echo $hr_clients->name->caption() ?><?php echo ($hr_clients->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_clients_edit->RightColumnClass ?>"><div<?php echo $hr_clients->name->cellAttributes() ?>>
<span id="el_hr_clients_name">
<input type="text" data-table="hr_clients" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hr_clients->name->getPlaceHolder()) ?>" value="<?php echo $hr_clients->name->EditValue ?>"<?php echo $hr_clients->name->editAttributes() ?>>
</span>
<?php echo $hr_clients->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_clients->details->Visible) { // details ?>
	<div id="r_details" class="form-group row">
		<label id="elh_hr_clients_details" for="x_details" class="<?php echo $hr_clients_edit->LeftColumnClass ?>"><?php echo $hr_clients->details->caption() ?><?php echo ($hr_clients->details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_clients_edit->RightColumnClass ?>"><div<?php echo $hr_clients->details->cellAttributes() ?>>
<span id="el_hr_clients_details">
<textarea data-table="hr_clients" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_clients->details->getPlaceHolder()) ?>"<?php echo $hr_clients->details->editAttributes() ?>><?php echo $hr_clients->details->EditValue ?></textarea>
</span>
<?php echo $hr_clients->details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_clients->first_contact_date->Visible) { // first_contact_date ?>
	<div id="r_first_contact_date" class="form-group row">
		<label id="elh_hr_clients_first_contact_date" for="x_first_contact_date" class="<?php echo $hr_clients_edit->LeftColumnClass ?>"><?php echo $hr_clients->first_contact_date->caption() ?><?php echo ($hr_clients->first_contact_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_clients_edit->RightColumnClass ?>"><div<?php echo $hr_clients->first_contact_date->cellAttributes() ?>>
<span id="el_hr_clients_first_contact_date">
<input type="text" data-table="hr_clients" data-field="x_first_contact_date" name="x_first_contact_date" id="x_first_contact_date" placeholder="<?php echo HtmlEncode($hr_clients->first_contact_date->getPlaceHolder()) ?>" value="<?php echo $hr_clients->first_contact_date->EditValue ?>"<?php echo $hr_clients->first_contact_date->editAttributes() ?>>
<?php if (!$hr_clients->first_contact_date->ReadOnly && !$hr_clients->first_contact_date->Disabled && !isset($hr_clients->first_contact_date->EditAttrs["readonly"]) && !isset($hr_clients->first_contact_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_clientsedit", "x_first_contact_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_clients->first_contact_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_clients->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_hr_clients_created" for="x_created" class="<?php echo $hr_clients_edit->LeftColumnClass ?>"><?php echo $hr_clients->created->caption() ?><?php echo ($hr_clients->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_clients_edit->RightColumnClass ?>"><div<?php echo $hr_clients->created->cellAttributes() ?>>
<span id="el_hr_clients_created">
<input type="text" data-table="hr_clients" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($hr_clients->created->getPlaceHolder()) ?>" value="<?php echo $hr_clients->created->EditValue ?>"<?php echo $hr_clients->created->editAttributes() ?>>
<?php if (!$hr_clients->created->ReadOnly && !$hr_clients->created->Disabled && !isset($hr_clients->created->EditAttrs["readonly"]) && !isset($hr_clients->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_clientsedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_clients->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_clients->address->Visible) { // address ?>
	<div id="r_address" class="form-group row">
		<label id="elh_hr_clients_address" for="x_address" class="<?php echo $hr_clients_edit->LeftColumnClass ?>"><?php echo $hr_clients->address->caption() ?><?php echo ($hr_clients->address->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_clients_edit->RightColumnClass ?>"><div<?php echo $hr_clients->address->cellAttributes() ?>>
<span id="el_hr_clients_address">
<textarea data-table="hr_clients" data-field="x_address" name="x_address" id="x_address" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_clients->address->getPlaceHolder()) ?>"<?php echo $hr_clients->address->editAttributes() ?>><?php echo $hr_clients->address->EditValue ?></textarea>
</span>
<?php echo $hr_clients->address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_clients->contact_number->Visible) { // contact_number ?>
	<div id="r_contact_number" class="form-group row">
		<label id="elh_hr_clients_contact_number" for="x_contact_number" class="<?php echo $hr_clients_edit->LeftColumnClass ?>"><?php echo $hr_clients->contact_number->caption() ?><?php echo ($hr_clients->contact_number->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_clients_edit->RightColumnClass ?>"><div<?php echo $hr_clients->contact_number->cellAttributes() ?>>
<span id="el_hr_clients_contact_number">
<input type="text" data-table="hr_clients" data-field="x_contact_number" name="x_contact_number" id="x_contact_number" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($hr_clients->contact_number->getPlaceHolder()) ?>" value="<?php echo $hr_clients->contact_number->EditValue ?>"<?php echo $hr_clients->contact_number->editAttributes() ?>>
</span>
<?php echo $hr_clients->contact_number->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_clients->contact_email->Visible) { // contact_email ?>
	<div id="r_contact_email" class="form-group row">
		<label id="elh_hr_clients_contact_email" for="x_contact_email" class="<?php echo $hr_clients_edit->LeftColumnClass ?>"><?php echo $hr_clients->contact_email->caption() ?><?php echo ($hr_clients->contact_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_clients_edit->RightColumnClass ?>"><div<?php echo $hr_clients->contact_email->cellAttributes() ?>>
<span id="el_hr_clients_contact_email">
<input type="text" data-table="hr_clients" data-field="x_contact_email" name="x_contact_email" id="x_contact_email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hr_clients->contact_email->getPlaceHolder()) ?>" value="<?php echo $hr_clients->contact_email->EditValue ?>"<?php echo $hr_clients->contact_email->editAttributes() ?>>
</span>
<?php echo $hr_clients->contact_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_clients->company_url->Visible) { // company_url ?>
	<div id="r_company_url" class="form-group row">
		<label id="elh_hr_clients_company_url" for="x_company_url" class="<?php echo $hr_clients_edit->LeftColumnClass ?>"><?php echo $hr_clients->company_url->caption() ?><?php echo ($hr_clients->company_url->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_clients_edit->RightColumnClass ?>"><div<?php echo $hr_clients->company_url->cellAttributes() ?>>
<span id="el_hr_clients_company_url">
<textarea data-table="hr_clients" data-field="x_company_url" name="x_company_url" id="x_company_url" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_clients->company_url->getPlaceHolder()) ?>"<?php echo $hr_clients->company_url->editAttributes() ?>><?php echo $hr_clients->company_url->EditValue ?></textarea>
</span>
<?php echo $hr_clients->company_url->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_clients->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_hr_clients_status" class="<?php echo $hr_clients_edit->LeftColumnClass ?>"><?php echo $hr_clients->status->caption() ?><?php echo ($hr_clients->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_clients_edit->RightColumnClass ?>"><div<?php echo $hr_clients->status->cellAttributes() ?>>
<span id="el_hr_clients_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_clients" data-field="x_status" data-value-separator="<?php echo $hr_clients->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $hr_clients->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_clients->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $hr_clients->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_clients_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_clients_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_clients_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_clients_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_clients_edit->terminate();
?>