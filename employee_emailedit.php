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
$employee_email_edit = new employee_email_edit();

// Run the page
$employee_email_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_email_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployee_emailedit = currentForm = new ew.Form("femployee_emailedit", "edit");

// Validate form
femployee_emailedit.validate = function() {
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
		<?php if ($employee_email_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->id->caption(), $employee_email->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_edit->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->employee_id->caption(), $employee_email->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_email->employee_id->errorMessage()) ?>");
		<?php if ($employee_email_edit->_email->Required) { ?>
			elm = this.getElements("x" + infix + "__email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->_email->caption(), $employee_email->_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_edit->email_type->Required) { ?>
			elm = this.getElements("x" + infix + "_email_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->email_type->caption(), $employee_email->email_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->status->caption(), $employee_email->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->modifiedby->caption(), $employee_email->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->modifieddatetime->caption(), $employee_email->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->HospID->caption(), $employee_email->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_email->HospID->errorMessage()) ?>");

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
femployee_emailedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_emailedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_emailedit.lists["x_email_type"] = <?php echo $employee_email_edit->email_type->Lookup->toClientList() ?>;
femployee_emailedit.lists["x_email_type"].options = <?php echo JsonEncode($employee_email_edit->email_type->lookupOptions()) ?>;
femployee_emailedit.lists["x_status"] = <?php echo $employee_email_edit->status->Lookup->toClientList() ?>;
femployee_emailedit.lists["x_status"].options = <?php echo JsonEncode($employee_email_edit->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_email_edit->showPageHeader(); ?>
<?php
$employee_email_edit->showMessage();
?>
<form name="femployee_emailedit" id="femployee_emailedit" class="<?php echo $employee_email_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_email_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_email_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_email">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_email_edit->IsModal ?>">
<?php if ($employee_email->getCurrentMasterTable() == "employee") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo $employee_email->employee_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_email->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_email_id" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email->id->caption() ?><?php echo ($employee_email->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div<?php echo $employee_email->id->cellAttributes() ?>>
<span id="el_employee_email_id">
<span<?php echo $employee_email->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_email->id->CurrentValue) ?>">
<?php echo $employee_email->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email->employee_id->Visible) { // employee_id ?>
	<div id="r_employee_id" class="form-group row">
		<label id="elh_employee_email_employee_id" for="x_employee_id" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email->employee_id->caption() ?><?php echo ($employee_email->employee_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div<?php echo $employee_email->employee_id->cellAttributes() ?>>
<?php if ($employee_email->employee_id->getSessionValue() <> "") { ?>
<span id="el_employee_email_employee_id">
<span<?php echo $employee_email->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_employee_id" name="x_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_employee_email_employee_id">
<input type="text" data-table="employee_email" data-field="x_employee_id" name="x_employee_id" id="x_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_email->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_email->employee_id->EditValue ?>"<?php echo $employee_email->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $employee_email->employee_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email->_email->Visible) { // email ?>
	<div id="r__email" class="form-group row">
		<label id="elh_employee_email__email" for="x__email" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email->_email->caption() ?><?php echo ($employee_email->_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div<?php echo $employee_email->_email->cellAttributes() ?>>
<span id="el_employee_email__email">
<input type="text" data-table="employee_email" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_email->_email->getPlaceHolder()) ?>" value="<?php echo $employee_email->_email->EditValue ?>"<?php echo $employee_email->_email->editAttributes() ?>>
</span>
<?php echo $employee_email->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email->email_type->Visible) { // email_type ?>
	<div id="r_email_type" class="form-group row">
		<label id="elh_employee_email_email_type" for="x_email_type" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email->email_type->caption() ?><?php echo ($employee_email->email_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div<?php echo $employee_email->email_type->cellAttributes() ?>>
<span id="el_employee_email_email_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_email_type" data-value-separator="<?php echo $employee_email->email_type->displayValueSeparatorAttribute() ?>" id="x_email_type" name="x_email_type"<?php echo $employee_email->email_type->editAttributes() ?>>
		<?php echo $employee_email->email_type->selectOptionListHtml("x_email_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_email_type") && !$employee_email->email_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_email_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_email->email_type->caption() ?>" data-title="<?php echo $employee_email->email_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_email_type',url:'sys_email_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_email->email_type->Lookup->getParamTag("p_x_email_type") ?>
</span>
<?php echo $employee_email->email_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_email_status" for="x_status" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email->status->caption() ?><?php echo ($employee_email->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div<?php echo $employee_email->status->cellAttributes() ?>>
<span id="el_employee_email_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_status" data-value-separator="<?php echo $employee_email->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $employee_email->status->editAttributes() ?>>
		<?php echo $employee_email->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $employee_email->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $employee_email->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_employee_email_modifiedby" for="x_modifiedby" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email->modifiedby->caption() ?><?php echo ($employee_email->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div<?php echo $employee_email->modifiedby->cellAttributes() ?>>
<span id="el_employee_email_modifiedby">
<span<?php echo $employee_email->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->modifiedby->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" value="<?php echo HtmlEncode($employee_email->modifiedby->CurrentValue) ?>">
<?php echo $employee_email->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_employee_email_modifieddatetime" for="x_modifieddatetime" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email->modifieddatetime->caption() ?><?php echo ($employee_email->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div<?php echo $employee_email->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_email_modifieddatetime">
<span<?php echo $employee_email->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->modifieddatetime->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" value="<?php echo HtmlEncode($employee_email->modifieddatetime->CurrentValue) ?>">
<?php echo $employee_email->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_employee_email_HospID" for="x_HospID" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email->HospID->caption() ?><?php echo ($employee_email->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div<?php echo $employee_email->HospID->cellAttributes() ?>>
<span id="el_employee_email_HospID">
<input type="text" data-table="employee_email" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_email->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_email->HospID->EditValue ?>"<?php echo $employee_email->HospID->editAttributes() ?>>
</span>
<?php echo $employee_email->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_email_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_email_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_email_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_email_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_email_edit->terminate();
?>