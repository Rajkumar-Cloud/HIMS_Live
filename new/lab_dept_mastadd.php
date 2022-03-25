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
<?php include_once "header.php"; ?>
<script>
var flab_dept_mastadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	flab_dept_mastadd = currentForm = new ew.Form("flab_dept_mastadd", "add");

	// Validate form
	flab_dept_mastadd.validate = function() {
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
			<?php if ($lab_dept_mast_add->MainCD->Required) { ?>
				elm = this.getElements("x" + infix + "_MainCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast_add->MainCD->caption(), $lab_dept_mast_add->MainCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_dept_mast_add->Code->Required) { ?>
				elm = this.getElements("x" + infix + "_Code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast_add->Code->caption(), $lab_dept_mast_add->Code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_dept_mast_add->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast_add->Name->caption(), $lab_dept_mast_add->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_dept_mast_add->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast_add->Order->caption(), $lab_dept_mast_add->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_dept_mast_add->Order->errorMessage()) ?>");
			<?php if ($lab_dept_mast_add->SignCD->Required) { ?>
				elm = this.getElements("x" + infix + "_SignCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast_add->SignCD->caption(), $lab_dept_mast_add->SignCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_dept_mast_add->Collection->Required) { ?>
				elm = this.getElements("x" + infix + "_Collection");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast_add->Collection->caption(), $lab_dept_mast_add->Collection->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_dept_mast_add->EditDate->Required) { ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast_add->EditDate->caption(), $lab_dept_mast_add->EditDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_dept_mast_add->EditDate->errorMessage()) ?>");
			<?php if ($lab_dept_mast_add->SMS->Required) { ?>
				elm = this.getElements("x" + infix + "_SMS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast_add->SMS->caption(), $lab_dept_mast_add->SMS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_dept_mast_add->Note->Required) { ?>
				elm = this.getElements("x" + infix + "_Note");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast_add->Note->caption(), $lab_dept_mast_add->Note->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_dept_mast_add->WorkList->Required) { ?>
				elm = this.getElements("x" + infix + "_WorkList");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast_add->WorkList->caption(), $lab_dept_mast_add->WorkList->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_dept_mast_add->_Page->Required) { ?>
				elm = this.getElements("x" + infix + "__Page");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast_add->_Page->caption(), $lab_dept_mast_add->_Page->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__Page");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_dept_mast_add->_Page->errorMessage()) ?>");
			<?php if ($lab_dept_mast_add->Incharge->Required) { ?>
				elm = this.getElements("x" + infix + "_Incharge");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast_add->Incharge->caption(), $lab_dept_mast_add->Incharge->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_dept_mast_add->AutoNum->Required) { ?>
				elm = this.getElements("x" + infix + "_AutoNum");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_dept_mast_add->AutoNum->caption(), $lab_dept_mast_add->AutoNum->RequiredErrorMessage)) ?>");
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
	flab_dept_mastadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flab_dept_mastadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("flab_dept_mastadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_dept_mast_add->showPageHeader(); ?>
<?php
$lab_dept_mast_add->showMessage();
?>
<form name="flab_dept_mastadd" id="flab_dept_mastadd" class="<?php echo $lab_dept_mast_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_dept_mast">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lab_dept_mast_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($lab_dept_mast_add->MainCD->Visible) { // MainCD ?>
	<div id="r_MainCD" class="form-group row">
		<label id="elh_lab_dept_mast_MainCD" for="x_MainCD" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast_add->MainCD->caption() ?><?php echo $lab_dept_mast_add->MainCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div <?php echo $lab_dept_mast_add->MainCD->cellAttributes() ?>>
<span id="el_lab_dept_mast_MainCD">
<input type="text" data-table="lab_dept_mast" data-field="x_MainCD" name="x_MainCD" id="x_MainCD" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_dept_mast_add->MainCD->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast_add->MainCD->EditValue ?>"<?php echo $lab_dept_mast_add->MainCD->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast_add->MainCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast_add->Code->Visible) { // Code ?>
	<div id="r_Code" class="form-group row">
		<label id="elh_lab_dept_mast_Code" for="x_Code" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast_add->Code->caption() ?><?php echo $lab_dept_mast_add->Code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div <?php echo $lab_dept_mast_add->Code->cellAttributes() ?>>
<span id="el_lab_dept_mast_Code">
<input type="text" data-table="lab_dept_mast" data-field="x_Code" name="x_Code" id="x_Code" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($lab_dept_mast_add->Code->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast_add->Code->EditValue ?>"<?php echo $lab_dept_mast_add->Code->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast_add->Code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast_add->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_lab_dept_mast_Name" for="x_Name" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast_add->Name->caption() ?><?php echo $lab_dept_mast_add->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div <?php echo $lab_dept_mast_add->Name->cellAttributes() ?>>
<span id="el_lab_dept_mast_Name">
<input type="text" data-table="lab_dept_mast" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_dept_mast_add->Name->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast_add->Name->EditValue ?>"<?php echo $lab_dept_mast_add->Name->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast_add->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast_add->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_lab_dept_mast_Order" for="x_Order" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast_add->Order->caption() ?><?php echo $lab_dept_mast_add->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div <?php echo $lab_dept_mast_add->Order->cellAttributes() ?>>
<span id="el_lab_dept_mast_Order">
<input type="text" data-table="lab_dept_mast" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($lab_dept_mast_add->Order->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast_add->Order->EditValue ?>"<?php echo $lab_dept_mast_add->Order->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast_add->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast_add->SignCD->Visible) { // SignCD ?>
	<div id="r_SignCD" class="form-group row">
		<label id="elh_lab_dept_mast_SignCD" for="x_SignCD" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast_add->SignCD->caption() ?><?php echo $lab_dept_mast_add->SignCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div <?php echo $lab_dept_mast_add->SignCD->cellAttributes() ?>>
<span id="el_lab_dept_mast_SignCD">
<input type="text" data-table="lab_dept_mast" data-field="x_SignCD" name="x_SignCD" id="x_SignCD" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($lab_dept_mast_add->SignCD->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast_add->SignCD->EditValue ?>"<?php echo $lab_dept_mast_add->SignCD->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast_add->SignCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast_add->Collection->Visible) { // Collection ?>
	<div id="r_Collection" class="form-group row">
		<label id="elh_lab_dept_mast_Collection" for="x_Collection" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast_add->Collection->caption() ?><?php echo $lab_dept_mast_add->Collection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div <?php echo $lab_dept_mast_add->Collection->cellAttributes() ?>>
<span id="el_lab_dept_mast_Collection">
<input type="text" data-table="lab_dept_mast" data-field="x_Collection" name="x_Collection" id="x_Collection" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_dept_mast_add->Collection->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast_add->Collection->EditValue ?>"<?php echo $lab_dept_mast_add->Collection->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast_add->Collection->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast_add->EditDate->Visible) { // EditDate ?>
	<div id="r_EditDate" class="form-group row">
		<label id="elh_lab_dept_mast_EditDate" for="x_EditDate" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast_add->EditDate->caption() ?><?php echo $lab_dept_mast_add->EditDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div <?php echo $lab_dept_mast_add->EditDate->cellAttributes() ?>>
<span id="el_lab_dept_mast_EditDate">
<input type="text" data-table="lab_dept_mast" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?php echo HtmlEncode($lab_dept_mast_add->EditDate->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast_add->EditDate->EditValue ?>"<?php echo $lab_dept_mast_add->EditDate->editAttributes() ?>>
<?php if (!$lab_dept_mast_add->EditDate->ReadOnly && !$lab_dept_mast_add->EditDate->Disabled && !isset($lab_dept_mast_add->EditDate->EditAttrs["readonly"]) && !isset($lab_dept_mast_add->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_dept_mastadd", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_dept_mastadd", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $lab_dept_mast_add->EditDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast_add->SMS->Visible) { // SMS ?>
	<div id="r_SMS" class="form-group row">
		<label id="elh_lab_dept_mast_SMS" for="x_SMS" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast_add->SMS->caption() ?><?php echo $lab_dept_mast_add->SMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div <?php echo $lab_dept_mast_add->SMS->cellAttributes() ?>>
<span id="el_lab_dept_mast_SMS">
<input type="text" data-table="lab_dept_mast" data-field="x_SMS" name="x_SMS" id="x_SMS" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_dept_mast_add->SMS->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast_add->SMS->EditValue ?>"<?php echo $lab_dept_mast_add->SMS->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast_add->SMS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast_add->Note->Visible) { // Note ?>
	<div id="r_Note" class="form-group row">
		<label id="elh_lab_dept_mast_Note" for="x_Note" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast_add->Note->caption() ?><?php echo $lab_dept_mast_add->Note->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div <?php echo $lab_dept_mast_add->Note->cellAttributes() ?>>
<span id="el_lab_dept_mast_Note">
<textarea data-table="lab_dept_mast" data-field="x_Note" name="x_Note" id="x_Note" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_dept_mast_add->Note->getPlaceHolder()) ?>"<?php echo $lab_dept_mast_add->Note->editAttributes() ?>><?php echo $lab_dept_mast_add->Note->EditValue ?></textarea>
</span>
<?php echo $lab_dept_mast_add->Note->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast_add->WorkList->Visible) { // WorkList ?>
	<div id="r_WorkList" class="form-group row">
		<label id="elh_lab_dept_mast_WorkList" for="x_WorkList" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast_add->WorkList->caption() ?><?php echo $lab_dept_mast_add->WorkList->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div <?php echo $lab_dept_mast_add->WorkList->cellAttributes() ?>>
<span id="el_lab_dept_mast_WorkList">
<input type="text" data-table="lab_dept_mast" data-field="x_WorkList" name="x_WorkList" id="x_WorkList" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_dept_mast_add->WorkList->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast_add->WorkList->EditValue ?>"<?php echo $lab_dept_mast_add->WorkList->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast_add->WorkList->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast_add->_Page->Visible) { // Page ?>
	<div id="r__Page" class="form-group row">
		<label id="elh_lab_dept_mast__Page" for="x__Page" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast_add->_Page->caption() ?><?php echo $lab_dept_mast_add->_Page->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div <?php echo $lab_dept_mast_add->_Page->cellAttributes() ?>>
<span id="el_lab_dept_mast__Page">
<input type="text" data-table="lab_dept_mast" data-field="x__Page" name="x__Page" id="x__Page" size="30" placeholder="<?php echo HtmlEncode($lab_dept_mast_add->_Page->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast_add->_Page->EditValue ?>"<?php echo $lab_dept_mast_add->_Page->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast_add->_Page->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast_add->Incharge->Visible) { // Incharge ?>
	<div id="r_Incharge" class="form-group row">
		<label id="elh_lab_dept_mast_Incharge" for="x_Incharge" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast_add->Incharge->caption() ?><?php echo $lab_dept_mast_add->Incharge->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div <?php echo $lab_dept_mast_add->Incharge->cellAttributes() ?>>
<span id="el_lab_dept_mast_Incharge">
<input type="text" data-table="lab_dept_mast" data-field="x_Incharge" name="x_Incharge" id="x_Incharge" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_dept_mast_add->Incharge->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast_add->Incharge->EditValue ?>"<?php echo $lab_dept_mast_add->Incharge->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast_add->Incharge->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_dept_mast_add->AutoNum->Visible) { // AutoNum ?>
	<div id="r_AutoNum" class="form-group row">
		<label id="elh_lab_dept_mast_AutoNum" for="x_AutoNum" class="<?php echo $lab_dept_mast_add->LeftColumnClass ?>"><?php echo $lab_dept_mast_add->AutoNum->caption() ?><?php echo $lab_dept_mast_add->AutoNum->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_dept_mast_add->RightColumnClass ?>"><div <?php echo $lab_dept_mast_add->AutoNum->cellAttributes() ?>>
<span id="el_lab_dept_mast_AutoNum">
<input type="text" data-table="lab_dept_mast" data-field="x_AutoNum" name="x_AutoNum" id="x_AutoNum" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_dept_mast_add->AutoNum->getPlaceHolder()) ?>" value="<?php echo $lab_dept_mast_add->AutoNum->EditValue ?>"<?php echo $lab_dept_mast_add->AutoNum->editAttributes() ?>>
</span>
<?php echo $lab_dept_mast_add->AutoNum->CustomMsg ?></div></div>
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
$lab_dept_mast_add->terminate();
?>