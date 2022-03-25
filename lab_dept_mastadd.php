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
$lab_dept_mast_add = new lab_dept_mast_add();

// Run the page
$lab_dept_mast_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_dept_mast_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var flab_dept_mastadd = currentForm = new ew.Form("flab_dept_mastadd", "add");

// Validate form
flab_dept_mastadd.validate = function() {
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
		<?php if ($lab_dept_mast_add->MainCD->Required) { ?>
			elm = this.getElements("x" + infix + "_MainCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast->MainCD->caption(), $lab_dept_mast->MainCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_dept_mast_add->Code->Required) { ?>
			elm = this.getElements("x" + infix + "_Code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast->Code->caption(), $lab_dept_mast->Code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_dept_mast_add->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast->Name->caption(), $lab_dept_mast->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_dept_mast_add->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast->Order->caption(), $lab_dept_mast->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_dept_mast->Order->errorMessage()) ?>");
		<?php if ($lab_dept_mast_add->SignCD->Required) { ?>
			elm = this.getElements("x" + infix + "_SignCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast->SignCD->caption(), $lab_dept_mast->SignCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_dept_mast_add->Collection->Required) { ?>
			elm = this.getElements("x" + infix + "_Collection");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast->Collection->caption(), $lab_dept_mast->Collection->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_dept_mast_add->EditDate->Required) { ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast->EditDate->caption(), $lab_dept_mast->EditDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_dept_mast->EditDate->errorMessage()) ?>");
		<?php if ($lab_dept_mast_add->SMS->Required) { ?>
			elm = this.getElements("x" + infix + "_SMS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast->SMS->caption(), $lab_dept_mast->SMS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_dept_mast_add->Note->Required) { ?>
			elm = this.getElements("x" + infix + "_Note");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast->Note->caption(), $lab_dept_mast->Note->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_dept_mast_add->WorkList->Required) { ?>
			elm = this.getElements("x" + infix + "_WorkList");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast->WorkList->caption(), $lab_dept_mast->WorkList->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_dept_mast_add->_Page->Required) { ?>
			elm = this.getElements("x" + infix + "__Page");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast->_Page->caption(), $lab_dept_mast->_Page->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "__Page");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_dept_mast->_Page->errorMessage()) ?>");
		<?php if ($lab_dept_mast_add->Incharge->Required) { ?>
			elm = this.getElements("x" + infix + "_Incharge");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast->Incharge->caption(), $lab_dept_mast->Incharge->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_dept_mast_add->AutoNum->Required) { ?>
			elm = this.getElements("x" + infix + "_AutoNum");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast->AutoNum->caption(), $lab_dept_mast->AutoNum->RequiredErrorMessage)) ?>");
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
flab_dept_mastadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_dept_mastadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_dept_mast_add->showPageHeader(); ?>
<?php
$lab_dept_mast_add->showMessage();
?>
<form name="flab_dept_mastadd" id="flab_dept_mastadd" class="<?php echo $lab_dept_mast_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_dept_mast_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_dept_mast_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_dept_mast">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lab_dept_mast_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($lab_dept_mast->MainCD->Visible) { // MainCD ?>
	<div id="r_MainCD" class="form-group row">
		<label id="elh_lab_dept_mast_MainCD" for="x_MainCD" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast->MainCD->caption() ?><?php echo ($lab_dept_mast->MainCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div<?php echo $lab_dept_mast->MainCD->cellAttributes() ?>>
<span id="el_lab_dept_mast_MainCD">
<input type="text" data-table="lab_dept_mast" data-field="x_MainCD" name="x_MainCD" id="x_MainCD" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_dept_mast->MainCD->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast->MainCD->EditValue ?>"<?php echo $lab_dept_mast->MainCD->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast->MainCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast->Code->Visible) { // Code ?>
	<div id="r_Code" class="form-group row">
		<label id="elh_lab_dept_mast_Code" for="x_Code" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast->Code->caption() ?><?php echo ($lab_dept_mast->Code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div<?php echo $lab_dept_mast->Code->cellAttributes() ?>>
<span id="el_lab_dept_mast_Code">
<input type="text" data-table="lab_dept_mast" data-field="x_Code" name="x_Code" id="x_Code" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($lab_dept_mast->Code->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast->Code->EditValue ?>"<?php echo $lab_dept_mast->Code->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast->Code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_lab_dept_mast_Name" for="x_Name" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast->Name->caption() ?><?php echo ($lab_dept_mast->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div<?php echo $lab_dept_mast->Name->cellAttributes() ?>>
<span id="el_lab_dept_mast_Name">
<input type="text" data-table="lab_dept_mast" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_dept_mast->Name->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast->Name->EditValue ?>"<?php echo $lab_dept_mast->Name->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_lab_dept_mast_Order" for="x_Order" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast->Order->caption() ?><?php echo ($lab_dept_mast->Order->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div<?php echo $lab_dept_mast->Order->cellAttributes() ?>>
<span id="el_lab_dept_mast_Order">
<input type="text" data-table="lab_dept_mast" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($lab_dept_mast->Order->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast->Order->EditValue ?>"<?php echo $lab_dept_mast->Order->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast->SignCD->Visible) { // SignCD ?>
	<div id="r_SignCD" class="form-group row">
		<label id="elh_lab_dept_mast_SignCD" for="x_SignCD" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast->SignCD->caption() ?><?php echo ($lab_dept_mast->SignCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div<?php echo $lab_dept_mast->SignCD->cellAttributes() ?>>
<span id="el_lab_dept_mast_SignCD">
<input type="text" data-table="lab_dept_mast" data-field="x_SignCD" name="x_SignCD" id="x_SignCD" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($lab_dept_mast->SignCD->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast->SignCD->EditValue ?>"<?php echo $lab_dept_mast->SignCD->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast->SignCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast->Collection->Visible) { // Collection ?>
	<div id="r_Collection" class="form-group row">
		<label id="elh_lab_dept_mast_Collection" for="x_Collection" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast->Collection->caption() ?><?php echo ($lab_dept_mast->Collection->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div<?php echo $lab_dept_mast->Collection->cellAttributes() ?>>
<span id="el_lab_dept_mast_Collection">
<input type="text" data-table="lab_dept_mast" data-field="x_Collection" name="x_Collection" id="x_Collection" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_dept_mast->Collection->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast->Collection->EditValue ?>"<?php echo $lab_dept_mast->Collection->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast->Collection->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast->EditDate->Visible) { // EditDate ?>
	<div id="r_EditDate" class="form-group row">
		<label id="elh_lab_dept_mast_EditDate" for="x_EditDate" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast->EditDate->caption() ?><?php echo ($lab_dept_mast->EditDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div<?php echo $lab_dept_mast->EditDate->cellAttributes() ?>>
<span id="el_lab_dept_mast_EditDate">
<input type="text" data-table="lab_dept_mast" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?php echo HtmlEncode($lab_dept_mast->EditDate->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast->EditDate->EditValue ?>"<?php echo $lab_dept_mast->EditDate->editAttributes() ?>>
<?php if (!$lab_dept_mast->EditDate->ReadOnly && !$lab_dept_mast->EditDate->Disabled && !isset($lab_dept_mast->EditDate->EditAttrs["readonly"]) && !isset($lab_dept_mast->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_dept_mastadd", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $lab_dept_mast->EditDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast->SMS->Visible) { // SMS ?>
	<div id="r_SMS" class="form-group row">
		<label id="elh_lab_dept_mast_SMS" for="x_SMS" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast->SMS->caption() ?><?php echo ($lab_dept_mast->SMS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div<?php echo $lab_dept_mast->SMS->cellAttributes() ?>>
<span id="el_lab_dept_mast_SMS">
<input type="text" data-table="lab_dept_mast" data-field="x_SMS" name="x_SMS" id="x_SMS" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_dept_mast->SMS->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast->SMS->EditValue ?>"<?php echo $lab_dept_mast->SMS->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast->SMS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast->Note->Visible) { // Note ?>
	<div id="r_Note" class="form-group row">
		<label id="elh_lab_dept_mast_Note" for="x_Note" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast->Note->caption() ?><?php echo ($lab_dept_mast->Note->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div<?php echo $lab_dept_mast->Note->cellAttributes() ?>>
<span id="el_lab_dept_mast_Note">
<textarea data-table="lab_dept_mast" data-field="x_Note" name="x_Note" id="x_Note" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_dept_mast->Note->getPlaceHolder()) ?>"<?php echo $lab_dept_mast->Note->editAttributes() ?>><?php echo $lab_dept_mast->Note->EditValue ?></textarea>
</span>
<?php echo $lab_dept_mast->Note->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast->WorkList->Visible) { // WorkList ?>
	<div id="r_WorkList" class="form-group row">
		<label id="elh_lab_dept_mast_WorkList" for="x_WorkList" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast->WorkList->caption() ?><?php echo ($lab_dept_mast->WorkList->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div<?php echo $lab_dept_mast->WorkList->cellAttributes() ?>>
<span id="el_lab_dept_mast_WorkList">
<input type="text" data-table="lab_dept_mast" data-field="x_WorkList" name="x_WorkList" id="x_WorkList" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_dept_mast->WorkList->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast->WorkList->EditValue ?>"<?php echo $lab_dept_mast->WorkList->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast->WorkList->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast->_Page->Visible) { // Page ?>
	<div id="r__Page" class="form-group row">
		<label id="elh_lab_dept_mast__Page" for="x__Page" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast->_Page->caption() ?><?php echo ($lab_dept_mast->_Page->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div<?php echo $lab_dept_mast->_Page->cellAttributes() ?>>
<span id="el_lab_dept_mast__Page">
<input type="text" data-table="lab_dept_mast" data-field="x__Page" name="x__Page" id="x__Page" size="30" placeholder="<?php echo HtmlEncode($lab_dept_mast->_Page->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast->_Page->EditValue ?>"<?php echo $lab_dept_mast->_Page->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast->_Page->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast->Incharge->Visible) { // Incharge ?>
	<div id="r_Incharge" class="form-group row">
		<label id="elh_lab_dept_mast_Incharge" for="x_Incharge" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast->Incharge->caption() ?><?php echo ($lab_dept_mast->Incharge->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div<?php echo $lab_dept_mast->Incharge->cellAttributes() ?>>
<span id="el_lab_dept_mast_Incharge">
<input type="text" data-table="lab_dept_mast" data-field="x_Incharge" name="x_Incharge" id="x_Incharge" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_dept_mast->Incharge->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast->Incharge->EditValue ?>"<?php echo $lab_dept_mast->Incharge->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast->Incharge->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast->AutoNum->Visible) { // AutoNum ?>
	<div id="r_AutoNum" class="form-group row">
		<label id="elh_lab_dept_mast_AutoNum" for="x_AutoNum" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast->AutoNum->caption() ?><?php echo ($lab_dept_mast->AutoNum->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div<?php echo $lab_dept_mast->AutoNum->cellAttributes() ?>>
<span id="el_lab_dept_mast_AutoNum">
<input type="text" data-table="lab_dept_mast" data-field="x_AutoNum" name="x_AutoNum" id="x_AutoNum" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_dept_mast->AutoNum->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast->AutoNum->EditValue ?>"<?php echo $lab_dept_mast->AutoNum->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast->AutoNum->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_dept_mast_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_dept_mast_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_dept_mast_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_dept_mast_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_dept_mast_add->terminate();
?>