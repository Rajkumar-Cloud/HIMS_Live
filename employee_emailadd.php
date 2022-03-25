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
$employee_email_add = new employee_email_add();

// Run the page
$employee_email_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_email_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var femployee_emailadd = currentForm = new ew.Form("femployee_emailadd", "add");

// Validate form
femployee_emailadd.validate = function() {
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
		<?php if ($employee_email_add->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->employee_id->caption(), $employee_email->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_email->employee_id->errorMessage()) ?>");
		<?php if ($employee_email_add->_email->Required) { ?>
			elm = this.getElements("x" + infix + "__email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->_email->caption(), $employee_email->_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_add->email_type->Required) { ?>
			elm = this.getElements("x" + infix + "_email_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->email_type->caption(), $employee_email->email_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->status->caption(), $employee_email->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->createdby->caption(), $employee_email->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_email->createdby->errorMessage()) ?>");
		<?php if ($employee_email_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->createddatetime->caption(), $employee_email->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_email->createddatetime->errorMessage()) ?>");
		<?php if ($employee_email_add->HospID->Required) { ?>
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
femployee_emailadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_emailadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_emailadd.lists["x_email_type"] = <?php echo $employee_email_add->email_type->Lookup->toClientList() ?>;
femployee_emailadd.lists["x_email_type"].options = <?php echo JsonEncode($employee_email_add->email_type->lookupOptions()) ?>;
femployee_emailadd.lists["x_status"] = <?php echo $employee_email_add->status->Lookup->toClientList() ?>;
femployee_emailadd.lists["x_status"].options = <?php echo JsonEncode($employee_email_add->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_email_add->showPageHeader(); ?>
<?php
$employee_email_add->showMessage();
?>
<form name="femployee_emailadd" id="femployee_emailadd" class="<?php echo $employee_email_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_email_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_email_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_email">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_email_add->IsModal ?>">
<?php if ($employee_email->getCurrentMasterTable() == "employee") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo $employee_email->employee_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_email->employee_id->Visible) { // employee_id ?>
	<div id="r_employee_id" class="form-group row">
		<label id="elh_employee_email_employee_id" for="x_employee_id" class="<?php echo $employee_email_add->LeftColumnClass ?>"><?php echo $employee_email->employee_id->caption() ?><?php echo ($employee_email->employee_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_add->RightColumnClass ?>"><div<?php echo $employee_email->employee_id->cellAttributes() ?>>
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
		<label id="elh_employee_email__email" for="x__email" class="<?php echo $employee_email_add->LeftColumnClass ?>"><?php echo $employee_email->_email->caption() ?><?php echo ($employee_email->_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_add->RightColumnClass ?>"><div<?php echo $employee_email->_email->cellAttributes() ?>>
<span id="el_employee_email__email">
<input type="text" data-table="employee_email" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_email->_email->getPlaceHolder()) ?>" value="<?php echo $employee_email->_email->EditValue ?>"<?php echo $employee_email->_email->editAttributes() ?>>
</span>
<?php echo $employee_email->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email->email_type->Visible) { // email_type ?>
	<div id="r_email_type" class="form-group row">
		<label id="elh_employee_email_email_type" for="x_email_type" class="<?php echo $employee_email_add->LeftColumnClass ?>"><?php echo $employee_email->email_type->caption() ?><?php echo ($employee_email->email_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_add->RightColumnClass ?>"><div<?php echo $employee_email->email_type->cellAttributes() ?>>
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
		<label id="elh_employee_email_status" for="x_status" class="<?php echo $employee_email_add->LeftColumnClass ?>"><?php echo $employee_email->status->caption() ?><?php echo ($employee_email->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_add->RightColumnClass ?>"><div<?php echo $employee_email->status->cellAttributes() ?>>
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
<?php if ($employee_email->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_employee_email_createdby" for="x_createdby" class="<?php echo $employee_email_add->LeftColumnClass ?>"><?php echo $employee_email->createdby->caption() ?><?php echo ($employee_email->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_add->RightColumnClass ?>"><div<?php echo $employee_email->createdby->cellAttributes() ?>>
<span id="el_employee_email_createdby">
<input type="text" data-table="employee_email" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($employee_email->createdby->getPlaceHolder()) ?>" value="<?php echo $employee_email->createdby->EditValue ?>"<?php echo $employee_email->createdby->editAttributes() ?>>
</span>
<?php echo $employee_email->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_employee_email_createddatetime" for="x_createddatetime" class="<?php echo $employee_email_add->LeftColumnClass ?>"><?php echo $employee_email->createddatetime->caption() ?><?php echo ($employee_email->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_add->RightColumnClass ?>"><div<?php echo $employee_email->createddatetime->cellAttributes() ?>>
<span id="el_employee_email_createddatetime">
<input type="text" data-table="employee_email" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($employee_email->createddatetime->getPlaceHolder()) ?>" value="<?php echo $employee_email->createddatetime->EditValue ?>"<?php echo $employee_email->createddatetime->editAttributes() ?>>
<?php if (!$employee_email->createddatetime->ReadOnly && !$employee_email->createddatetime->Disabled && !isset($employee_email->createddatetime->EditAttrs["readonly"]) && !isset($employee_email->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_emailadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_email->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_email->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_employee_email_HospID" for="x_HospID" class="<?php echo $employee_email_add->LeftColumnClass ?>"><?php echo $employee_email->HospID->caption() ?><?php echo ($employee_email->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_email_add->RightColumnClass ?>"><div<?php echo $employee_email->HospID->cellAttributes() ?>>
<span id="el_employee_email_HospID">
<input type="text" data-table="employee_email" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_email->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_email->HospID->EditValue ?>"<?php echo $employee_email->HospID->editAttributes() ?>>
</span>
<?php echo $employee_email->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_email_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_email_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_email_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_email_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_email_add->terminate();
?>