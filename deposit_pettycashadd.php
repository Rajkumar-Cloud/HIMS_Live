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
$deposit_pettycash_add = new deposit_pettycash_add();

// Run the page
$deposit_pettycash_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$deposit_pettycash_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fdeposit_pettycashadd = currentForm = new ew.Form("fdeposit_pettycashadd", "add");

// Validate form
fdeposit_pettycashadd.validate = function() {
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
		<?php if ($deposit_pettycash_add->TransType->Required) { ?>
			elm = this.getElements("x" + infix + "_TransType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $deposit_pettycash->TransType->caption(), $deposit_pettycash->TransType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($deposit_pettycash_add->ShiftNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_ShiftNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $deposit_pettycash->ShiftNumber->caption(), $deposit_pettycash->ShiftNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($deposit_pettycash_add->TerminalNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_TerminalNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $deposit_pettycash->TerminalNumber->caption(), $deposit_pettycash->TerminalNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($deposit_pettycash_add->User->Required) { ?>
			elm = this.getElements("x" + infix + "_User");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $deposit_pettycash->User->caption(), $deposit_pettycash->User->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($deposit_pettycash_add->OpenedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_OpenedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $deposit_pettycash->OpenedDateTime->caption(), $deposit_pettycash->OpenedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OpenedDateTime");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($deposit_pettycash->OpenedDateTime->errorMessage()) ?>");
		<?php if ($deposit_pettycash_add->AccoundHead->Required) { ?>
			elm = this.getElements("x" + infix + "_AccoundHead");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $deposit_pettycash->AccoundHead->caption(), $deposit_pettycash->AccoundHead->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($deposit_pettycash_add->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $deposit_pettycash->Amount->caption(), $deposit_pettycash->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($deposit_pettycash->Amount->errorMessage()) ?>");
		<?php if ($deposit_pettycash_add->Narration->Required) { ?>
			elm = this.getElements("x" + infix + "_Narration");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $deposit_pettycash->Narration->caption(), $deposit_pettycash->Narration->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($deposit_pettycash_add->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $deposit_pettycash->CreatedBy->caption(), $deposit_pettycash->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($deposit_pettycash_add->CreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $deposit_pettycash->CreatedDateTime->caption(), $deposit_pettycash->CreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($deposit_pettycash_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $deposit_pettycash->HospID->caption(), $deposit_pettycash->HospID->RequiredErrorMessage)) ?>");
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
fdeposit_pettycashadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdeposit_pettycashadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fdeposit_pettycashadd.lists["x_TransType"] = <?php echo $deposit_pettycash_add->TransType->Lookup->toClientList() ?>;
fdeposit_pettycashadd.lists["x_TransType"].options = <?php echo JsonEncode($deposit_pettycash_add->TransType->options(FALSE, TRUE)) ?>;
fdeposit_pettycashadd.lists["x_TerminalNumber"] = <?php echo $deposit_pettycash_add->TerminalNumber->Lookup->toClientList() ?>;
fdeposit_pettycashadd.lists["x_TerminalNumber"].options = <?php echo JsonEncode($deposit_pettycash_add->TerminalNumber->options(FALSE, TRUE)) ?>;
fdeposit_pettycashadd.lists["x_AccoundHead"] = <?php echo $deposit_pettycash_add->AccoundHead->Lookup->toClientList() ?>;
fdeposit_pettycashadd.lists["x_AccoundHead"].options = <?php echo JsonEncode($deposit_pettycash_add->AccoundHead->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $deposit_pettycash_add->showPageHeader(); ?>
<?php
$deposit_pettycash_add->showMessage();
?>
<form name="fdeposit_pettycashadd" id="fdeposit_pettycashadd" class="<?php echo $deposit_pettycash_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($deposit_pettycash_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $deposit_pettycash_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="deposit_pettycash">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$deposit_pettycash_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($deposit_pettycash->TransType->Visible) { // TransType ?>
	<div id="r_TransType" class="form-group row">
		<label id="elh_deposit_pettycash_TransType" for="x_TransType" class="<?php echo $deposit_pettycash_add->LeftColumnClass ?>"><?php echo $deposit_pettycash->TransType->caption() ?><?php echo ($deposit_pettycash->TransType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $deposit_pettycash_add->RightColumnClass ?>"><div<?php echo $deposit_pettycash->TransType->cellAttributes() ?>>
<span id="el_deposit_pettycash_TransType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="deposit_pettycash" data-field="x_TransType" data-value-separator="<?php echo $deposit_pettycash->TransType->displayValueSeparatorAttribute() ?>" id="x_TransType" name="x_TransType"<?php echo $deposit_pettycash->TransType->editAttributes() ?>>
		<?php echo $deposit_pettycash->TransType->selectOptionListHtml("x_TransType") ?>
	</select>
</div>
</span>
<?php echo $deposit_pettycash->TransType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($deposit_pettycash->ShiftNumber->Visible) { // ShiftNumber ?>
	<div id="r_ShiftNumber" class="form-group row">
		<label id="elh_deposit_pettycash_ShiftNumber" for="x_ShiftNumber" class="<?php echo $deposit_pettycash_add->LeftColumnClass ?>"><?php echo $deposit_pettycash->ShiftNumber->caption() ?><?php echo ($deposit_pettycash->ShiftNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $deposit_pettycash_add->RightColumnClass ?>"><div<?php echo $deposit_pettycash->ShiftNumber->cellAttributes() ?>>
<span id="el_deposit_pettycash_ShiftNumber">
<input type="text" data-table="deposit_pettycash" data-field="x_ShiftNumber" name="x_ShiftNumber" id="x_ShiftNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($deposit_pettycash->ShiftNumber->getPlaceHolder()) ?>" value="<?php echo $deposit_pettycash->ShiftNumber->EditValue ?>"<?php echo $deposit_pettycash->ShiftNumber->editAttributes() ?>>
</span>
<?php echo $deposit_pettycash->ShiftNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($deposit_pettycash->TerminalNumber->Visible) { // TerminalNumber ?>
	<div id="r_TerminalNumber" class="form-group row">
		<label id="elh_deposit_pettycash_TerminalNumber" for="x_TerminalNumber" class="<?php echo $deposit_pettycash_add->LeftColumnClass ?>"><?php echo $deposit_pettycash->TerminalNumber->caption() ?><?php echo ($deposit_pettycash->TerminalNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $deposit_pettycash_add->RightColumnClass ?>"><div<?php echo $deposit_pettycash->TerminalNumber->cellAttributes() ?>>
<span id="el_deposit_pettycash_TerminalNumber">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="deposit_pettycash" data-field="x_TerminalNumber" data-value-separator="<?php echo $deposit_pettycash->TerminalNumber->displayValueSeparatorAttribute() ?>" id="x_TerminalNumber" name="x_TerminalNumber"<?php echo $deposit_pettycash->TerminalNumber->editAttributes() ?>>
		<?php echo $deposit_pettycash->TerminalNumber->selectOptionListHtml("x_TerminalNumber") ?>
	</select>
</div>
</span>
<?php echo $deposit_pettycash->TerminalNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($deposit_pettycash->User->Visible) { // User ?>
	<div id="r_User" class="form-group row">
		<label id="elh_deposit_pettycash_User" for="x_User" class="<?php echo $deposit_pettycash_add->LeftColumnClass ?>"><?php echo $deposit_pettycash->User->caption() ?><?php echo ($deposit_pettycash->User->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $deposit_pettycash_add->RightColumnClass ?>"><div<?php echo $deposit_pettycash->User->cellAttributes() ?>>
<span id="el_deposit_pettycash_User">
<input type="text" data-table="deposit_pettycash" data-field="x_User" name="x_User" id="x_User" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($deposit_pettycash->User->getPlaceHolder()) ?>" value="<?php echo $deposit_pettycash->User->EditValue ?>"<?php echo $deposit_pettycash->User->editAttributes() ?>>
</span>
<?php echo $deposit_pettycash->User->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($deposit_pettycash->OpenedDateTime->Visible) { // OpenedDateTime ?>
	<div id="r_OpenedDateTime" class="form-group row">
		<label id="elh_deposit_pettycash_OpenedDateTime" for="x_OpenedDateTime" class="<?php echo $deposit_pettycash_add->LeftColumnClass ?>"><?php echo $deposit_pettycash->OpenedDateTime->caption() ?><?php echo ($deposit_pettycash->OpenedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $deposit_pettycash_add->RightColumnClass ?>"><div<?php echo $deposit_pettycash->OpenedDateTime->cellAttributes() ?>>
<span id="el_deposit_pettycash_OpenedDateTime">
<input type="text" data-table="deposit_pettycash" data-field="x_OpenedDateTime" data-format="7" name="x_OpenedDateTime" id="x_OpenedDateTime" placeholder="<?php echo HtmlEncode($deposit_pettycash->OpenedDateTime->getPlaceHolder()) ?>" value="<?php echo $deposit_pettycash->OpenedDateTime->EditValue ?>"<?php echo $deposit_pettycash->OpenedDateTime->editAttributes() ?>>
<?php if (!$deposit_pettycash->OpenedDateTime->ReadOnly && !$deposit_pettycash->OpenedDateTime->Disabled && !isset($deposit_pettycash->OpenedDateTime->EditAttrs["readonly"]) && !isset($deposit_pettycash->OpenedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fdeposit_pettycashadd", "x_OpenedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $deposit_pettycash->OpenedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($deposit_pettycash->AccoundHead->Visible) { // AccoundHead ?>
	<div id="r_AccoundHead" class="form-group row">
		<label id="elh_deposit_pettycash_AccoundHead" for="x_AccoundHead" class="<?php echo $deposit_pettycash_add->LeftColumnClass ?>"><?php echo $deposit_pettycash->AccoundHead->caption() ?><?php echo ($deposit_pettycash->AccoundHead->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $deposit_pettycash_add->RightColumnClass ?>"><div<?php echo $deposit_pettycash->AccoundHead->cellAttributes() ?>>
<span id="el_deposit_pettycash_AccoundHead">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="deposit_pettycash" data-field="x_AccoundHead" data-value-separator="<?php echo $deposit_pettycash->AccoundHead->displayValueSeparatorAttribute() ?>" id="x_AccoundHead" name="x_AccoundHead"<?php echo $deposit_pettycash->AccoundHead->editAttributes() ?>>
		<?php echo $deposit_pettycash->AccoundHead->selectOptionListHtml("x_AccoundHead") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "deposit_account_head") && !$deposit_pettycash->AccoundHead->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_AccoundHead" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $deposit_pettycash->AccoundHead->caption() ?>" data-title="<?php echo $deposit_pettycash->AccoundHead->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_AccoundHead',url:'deposit_account_headaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $deposit_pettycash->AccoundHead->Lookup->getParamTag("p_x_AccoundHead") ?>
</span>
<?php echo $deposit_pettycash->AccoundHead->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($deposit_pettycash->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_deposit_pettycash_Amount" for="x_Amount" class="<?php echo $deposit_pettycash_add->LeftColumnClass ?>"><?php echo $deposit_pettycash->Amount->caption() ?><?php echo ($deposit_pettycash->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $deposit_pettycash_add->RightColumnClass ?>"><div<?php echo $deposit_pettycash->Amount->cellAttributes() ?>>
<span id="el_deposit_pettycash_Amount">
<input type="text" data-table="deposit_pettycash" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($deposit_pettycash->Amount->getPlaceHolder()) ?>" value="<?php echo $deposit_pettycash->Amount->EditValue ?>"<?php echo $deposit_pettycash->Amount->editAttributes() ?>>
</span>
<?php echo $deposit_pettycash->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($deposit_pettycash->Narration->Visible) { // Narration ?>
	<div id="r_Narration" class="form-group row">
		<label id="elh_deposit_pettycash_Narration" for="x_Narration" class="<?php echo $deposit_pettycash_add->LeftColumnClass ?>"><?php echo $deposit_pettycash->Narration->caption() ?><?php echo ($deposit_pettycash->Narration->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $deposit_pettycash_add->RightColumnClass ?>"><div<?php echo $deposit_pettycash->Narration->cellAttributes() ?>>
<span id="el_deposit_pettycash_Narration">
<textarea data-table="deposit_pettycash" data-field="x_Narration" name="x_Narration" id="x_Narration" cols="35" rows="4" placeholder="<?php echo HtmlEncode($deposit_pettycash->Narration->getPlaceHolder()) ?>"<?php echo $deposit_pettycash->Narration->editAttributes() ?>><?php echo $deposit_pettycash->Narration->EditValue ?></textarea>
</span>
<?php echo $deposit_pettycash->Narration->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$deposit_pettycash_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $deposit_pettycash_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $deposit_pettycash_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$deposit_pettycash_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$deposit_pettycash_add->terminate();
?>