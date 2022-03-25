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
$sms_cintent_add = new sms_cintent_add();

// Run the page
$sms_cintent_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_cintent_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsms_cintentadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fsms_cintentadd = currentForm = new ew.Form("fsms_cintentadd", "add");

	// Validate form
	fsms_cintentadd.validate = function() {
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
			<?php if ($sms_cintent_add->SMSType->Required) { ?>
				elm = this.getElements("x" + infix + "_SMSType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_cintent_add->SMSType->caption(), $sms_cintent_add->SMSType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sms_cintent_add->Content->Required) { ?>
				elm = this.getElements("x" + infix + "_Content");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_cintent_add->Content->caption(), $sms_cintent_add->Content->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sms_cintent_add->Enabled->Required) { ?>
				elm = this.getElements("x" + infix + "_Enabled[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_cintent_add->Enabled->caption(), $sms_cintent_add->Enabled->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sms_cintent_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_cintent_add->HospID->caption(), $sms_cintent_add->HospID->RequiredErrorMessage)) ?>");
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
	fsms_cintentadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fsms_cintentadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fsms_cintentadd.lists["x_SMSType"] = <?php echo $sms_cintent_add->SMSType->Lookup->toClientList($sms_cintent_add) ?>;
	fsms_cintentadd.lists["x_SMSType"].options = <?php echo JsonEncode($sms_cintent_add->SMSType->lookupOptions()) ?>;
	fsms_cintentadd.lists["x_Enabled[]"] = <?php echo $sms_cintent_add->Enabled->Lookup->toClientList($sms_cintent_add) ?>;
	fsms_cintentadd.lists["x_Enabled[]"].options = <?php echo JsonEncode($sms_cintent_add->Enabled->options(FALSE, TRUE)) ?>;
	loadjs.done("fsms_cintentadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $sms_cintent_add->showPageHeader(); ?>
<?php
$sms_cintent_add->showMessage();
?>
<form name="fsms_cintentadd" id="fsms_cintentadd" class="<?php echo $sms_cintent_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_cintent">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$sms_cintent_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($sms_cintent_add->SMSType->Visible) { // SMSType ?>
	<div id="r_SMSType" class="form-group row">
		<label id="elh_sms_cintent_SMSType" for="x_SMSType" class="<?php echo $sms_cintent_add->LeftColumnClass ?>"><?php echo $sms_cintent_add->SMSType->caption() ?><?php echo $sms_cintent_add->SMSType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_cintent_add->RightColumnClass ?>"><div <?php echo $sms_cintent_add->SMSType->cellAttributes() ?>>
<span id="el_sms_cintent_SMSType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="sms_cintent" data-field="x_SMSType" data-value-separator="<?php echo $sms_cintent_add->SMSType->displayValueSeparatorAttribute() ?>" id="x_SMSType" name="x_SMSType"<?php echo $sms_cintent_add->SMSType->editAttributes() ?>>
			<?php echo $sms_cintent_add->SMSType->selectOptionListHtml("x_SMSType") ?>
		</select>
</div>
<?php echo $sms_cintent_add->SMSType->Lookup->getParamTag($sms_cintent_add, "p_x_SMSType") ?>
</span>
<?php echo $sms_cintent_add->SMSType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sms_cintent_add->Content->Visible) { // Content ?>
	<div id="r_Content" class="form-group row">
		<label id="elh_sms_cintent_Content" for="x_Content" class="<?php echo $sms_cintent_add->LeftColumnClass ?>"><?php echo $sms_cintent_add->Content->caption() ?><?php echo $sms_cintent_add->Content->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_cintent_add->RightColumnClass ?>"><div <?php echo $sms_cintent_add->Content->cellAttributes() ?>>
<span id="el_sms_cintent_Content">
<textarea data-table="sms_cintent" data-field="x_Content" name="x_Content" id="x_Content" cols="35" rows="4" placeholder="<?php echo HtmlEncode($sms_cintent_add->Content->getPlaceHolder()) ?>"<?php echo $sms_cintent_add->Content->editAttributes() ?>><?php echo $sms_cintent_add->Content->EditValue ?></textarea>
</span>
<?php echo $sms_cintent_add->Content->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sms_cintent_add->Enabled->Visible) { // Enabled ?>
	<div id="r_Enabled" class="form-group row">
		<label id="elh_sms_cintent_Enabled" class="<?php echo $sms_cintent_add->LeftColumnClass ?>"><?php echo $sms_cintent_add->Enabled->caption() ?><?php echo $sms_cintent_add->Enabled->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_cintent_add->RightColumnClass ?>"><div <?php echo $sms_cintent_add->Enabled->cellAttributes() ?>>
<span id="el_sms_cintent_Enabled">
<div id="tp_x_Enabled" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="sms_cintent" data-field="x_Enabled" data-value-separator="<?php echo $sms_cintent_add->Enabled->displayValueSeparatorAttribute() ?>" name="x_Enabled[]" id="x_Enabled[]" value="{value}"<?php echo $sms_cintent_add->Enabled->editAttributes() ?>></div>
<div id="dsl_x_Enabled" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $sms_cintent_add->Enabled->checkBoxListHtml(FALSE, "x_Enabled[]") ?>
</div></div>
</span>
<?php echo $sms_cintent_add->Enabled->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sms_cintent_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sms_cintent_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sms_cintent_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sms_cintent_add->showPageFooter();
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
$sms_cintent_add->terminate();
?>