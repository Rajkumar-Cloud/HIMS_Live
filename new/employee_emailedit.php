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
<?php include_once "header.php"; ?>
<script>
var femployee_emailedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	femployee_emailedit = currentForm = new ew.Form("femployee_emailedit", "edit");

	// Validate form
	femployee_emailedit.validate = function() {
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
			<?php if ($employee_email_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email_edit->id->caption(), $employee_email_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_email_edit->employee_id->Required) { ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email_edit->employee_id->caption(), $employee_email_edit->employee_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_email_edit->_email->Required) { ?>
				elm = this.getElements("x" + infix + "__email");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email_edit->_email->caption(), $employee_email_edit->_email->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_email_edit->email_type->Required) { ?>
				elm = this.getElements("x" + infix + "_email_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email_edit->email_type->caption(), $employee_email_edit->email_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_email_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email_edit->status->caption(), $employee_email_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_email_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email_edit->modifiedby->caption(), $employee_email_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_email_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email_edit->modifieddatetime->caption(), $employee_email_edit->modifieddatetime->RequiredErrorMessage)) ?>");
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
	femployee_emailedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	femployee_emailedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	femployee_emailedit.lists["x_employee_id"] = <?php echo $employee_email_edit->employee_id->Lookup->toClientList($employee_email_edit) ?>;
	femployee_emailedit.lists["x_employee_id"].options = <?php echo JsonEncode($employee_email_edit->employee_id->lookupOptions()) ?>;
	femployee_emailedit.lists["x_email_type"] = <?php echo $employee_email_edit->email_type->Lookup->toClientList($employee_email_edit) ?>;
	femployee_emailedit.lists["x_email_type"].options = <?php echo JsonEncode($employee_email_edit->email_type->lookupOptions()) ?>;
	femployee_emailedit.lists["x_status"] = <?php echo $employee_email_edit->status->Lookup->toClientList($employee_email_edit) ?>;
	femployee_emailedit.lists["x_status"].options = <?php echo JsonEncode($employee_email_edit->status->lookupOptions()) ?>;
	loadjs.done("femployee_emailedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $employee_email_edit->showPageHeader(); ?>
<?php
$employee_email_edit->showMessage();
?>
<form name="femployee_emailedit" id="femployee_emailedit" class="<?php echo $employee_email_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_email">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_email_edit->IsModal ?>">
<?php if ($employee_email->getCurrentMasterTable() == "employee") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($employee_email_edit->employee_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_email_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_email_id" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email_edit->id->caption() ?><?php echo $employee_email_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div <?php echo $employee_email_edit->id->cellAttributes() ?>>
<span id="el_employee_email_id">
<span<?php echo $employee_email_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_email_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_email_edit->id->CurrentValue) ?>">
<?php echo $employee_email_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email_edit->employee_id->Visible) { // employee_id ?>
	<div id="r_employee_id" class="form-group row">
		<label id="elh_employee_email_employee_id" for="x_employee_id" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email_edit->employee_id->caption() ?><?php echo $employee_email_edit->employee_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div <?php echo $employee_email_edit->employee_id->cellAttributes() ?>>
<?php if ($employee_email_edit->employee_id->getSessionValue() != "") { ?>
<span id="el_employee_email_employee_id">
<span<?php echo $employee_email_edit->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_email_edit->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_employee_id" name="x_employee_id" value="<?php echo HtmlEncode($employee_email_edit->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_employee_email_employee_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_employee_id" data-value-separator="<?php echo $employee_email_edit->employee_id->displayValueSeparatorAttribute() ?>" id="x_employee_id" name="x_employee_id"<?php echo $employee_email_edit->employee_id->editAttributes() ?>>
			<?php echo $employee_email_edit->employee_id->selectOptionListHtml("x_employee_id") ?>
		</select>
</div>
<?php echo $employee_email_edit->employee_id->Lookup->getParamTag($employee_email_edit, "p_x_employee_id") ?>
</span>
<?php } ?>
<?php echo $employee_email_edit->employee_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email_edit->_email->Visible) { // email ?>
	<div id="r__email" class="form-group row">
		<label id="elh_employee_email__email" for="x__email" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email_edit->_email->caption() ?><?php echo $employee_email_edit->_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div <?php echo $employee_email_edit->_email->cellAttributes() ?>>
<span id="el_employee_email__email">
<input type="text" data-table="employee_email" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_email_edit->_email->getPlaceHolder()) ?>" value="<?php echo $employee_email_edit->_email->EditValue ?>"<?php echo $employee_email_edit->_email->editAttributes() ?>>
</span>
<?php echo $employee_email_edit->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email_edit->email_type->Visible) { // email_type ?>
	<div id="r_email_type" class="form-group row">
		<label id="elh_employee_email_email_type" for="x_email_type" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email_edit->email_type->caption() ?><?php echo $employee_email_edit->email_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div <?php echo $employee_email_edit->email_type->cellAttributes() ?>>
<span id="el_employee_email_email_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_email_type" data-value-separator="<?php echo $employee_email_edit->email_type->displayValueSeparatorAttribute() ?>" id="x_email_type" name="x_email_type"<?php echo $employee_email_edit->email_type->editAttributes() ?>>
			<?php echo $employee_email_edit->email_type->selectOptionListHtml("x_email_type") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_email_type") && !$employee_email_edit->email_type->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_email_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_email_edit->email_type->caption() ?>" data-title="<?php echo $employee_email_edit->email_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_email_type',url:'sys_email_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_email_edit->email_type->Lookup->getParamTag($employee_email_edit, "p_x_email_type") ?>
</span>
<?php echo $employee_email_edit->email_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_email_status" for="x_status" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email_edit->status->caption() ?><?php echo $employee_email_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div <?php echo $employee_email_edit->status->cellAttributes() ?>>
<span id="el_employee_email_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_status" data-value-separator="<?php echo $employee_email_edit->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $employee_email_edit->status->editAttributes() ?>>
			<?php echo $employee_email_edit->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $employee_email_edit->status->Lookup->getParamTag($employee_email_edit, "p_x_status") ?>
</span>
<?php echo $employee_email_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email_edit->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_employee_email_modifiedby" for="x_modifiedby" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email_edit->modifiedby->caption() ?><?php echo $employee_email_edit->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div <?php echo $employee_email_edit->modifiedby->cellAttributes() ?>>
<span id="el_employee_email_modifiedby">
<span<?php echo $employee_email_edit->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_email_edit->modifiedby->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" value="<?php echo HtmlEncode($employee_email_edit->modifiedby->CurrentValue) ?>">
<?php echo $employee_email_edit->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email_edit->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_employee_email_modifieddatetime" for="x_modifieddatetime" class="<?php echo $employee_email_edit->LeftColumnClass ?>"><?php echo $employee_email_edit->modifieddatetime->caption() ?><?php echo $employee_email_edit->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_edit->RightColumnClass ?>"><div <?php echo $employee_email_edit->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_email_modifieddatetime">
<span<?php echo $employee_email_edit->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_email_edit->modifieddatetime->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" value="<?php echo HtmlEncode($employee_email_edit->modifieddatetime->CurrentValue) ?>">
<?php echo $employee_email_edit->modifieddatetime->CustomMsg ?></div></div>
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
$employee_email_edit->terminate();
?>