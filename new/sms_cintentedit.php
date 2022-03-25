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
$sms_cintent_edit = new sms_cintent_edit();

// Run the page
$sms_cintent_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_cintent_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsms_cintentedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fsms_cintentedit = currentForm = new ew.Form("fsms_cintentedit", "edit");

	// Validate form
	fsms_cintentedit.validate = function() {
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
			<?php if ($sms_cintent_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_cintent_edit->id->caption(), $sms_cintent_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sms_cintent_edit->SMSType->Required) { ?>
				elm = this.getElements("x" + infix + "_SMSType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_cintent_edit->SMSType->caption(), $sms_cintent_edit->SMSType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sms_cintent_edit->Content->Required) { ?>
				elm = this.getElements("x" + infix + "_Content");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_cintent_edit->Content->caption(), $sms_cintent_edit->Content->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sms_cintent_edit->Enabled->Required) { ?>
				elm = this.getElements("x" + infix + "_Enabled[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_cintent_edit->Enabled->caption(), $sms_cintent_edit->Enabled->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sms_cintent_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_cintent_edit->HospID->caption(), $sms_cintent_edit->HospID->RequiredErrorMessage)) ?>");
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
	fsms_cintentedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fsms_cintentedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fsms_cintentedit.lists["x_SMSType"] = <?php echo $sms_cintent_edit->SMSType->Lookup->toClientList($sms_cintent_edit) ?>;
	fsms_cintentedit.lists["x_SMSType"].options = <?php echo JsonEncode($sms_cintent_edit->SMSType->lookupOptions()) ?>;
	fsms_cintentedit.lists["x_Enabled[]"] = <?php echo $sms_cintent_edit->Enabled->Lookup->toClientList($sms_cintent_edit) ?>;
	fsms_cintentedit.lists["x_Enabled[]"].options = <?php echo JsonEncode($sms_cintent_edit->Enabled->options(FALSE, TRUE)) ?>;
	loadjs.done("fsms_cintentedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $sms_cintent_edit->showPageHeader(); ?>
<?php
$sms_cintent_edit->showMessage();
?>
<form name="fsms_cintentedit" id="fsms_cintentedit" class="<?php echo $sms_cintent_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_cintent">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$sms_cintent_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($sms_cintent_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_sms_cintent_id" class="<?php echo $sms_cintent_edit->LeftColumnClass ?>"><?php echo $sms_cintent_edit->id->caption() ?><?php echo $sms_cintent_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_cintent_edit->RightColumnClass ?>"><div <?php echo $sms_cintent_edit->id->cellAttributes() ?>>
<span id="el_sms_cintent_id">
<span<?php echo $sms_cintent_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($sms_cintent_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="sms_cintent" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($sms_cintent_edit->id->CurrentValue) ?>">
<?php echo $sms_cintent_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sms_cintent_edit->SMSType->Visible) { // SMSType ?>
	<div id="r_SMSType" class="form-group row">
		<label id="elh_sms_cintent_SMSType" for="x_SMSType" class="<?php echo $sms_cintent_edit->LeftColumnClass ?>"><?php echo $sms_cintent_edit->SMSType->caption() ?><?php echo $sms_cintent_edit->SMSType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_cintent_edit->RightColumnClass ?>"><div <?php echo $sms_cintent_edit->SMSType->cellAttributes() ?>>
<span id="el_sms_cintent_SMSType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="sms_cintent" data-field="x_SMSType" data-value-separator="<?php echo $sms_cintent_edit->SMSType->displayValueSeparatorAttribute() ?>" id="x_SMSType" name="x_SMSType"<?php echo $sms_cintent_edit->SMSType->editAttributes() ?>>
			<?php echo $sms_cintent_edit->SMSType->selectOptionListHtml("x_SMSType") ?>
		</select>
</div>
<?php echo $sms_cintent_edit->SMSType->Lookup->getParamTag($sms_cintent_edit, "p_x_SMSType") ?>
</span>
<?php echo $sms_cintent_edit->SMSType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sms_cintent_edit->Content->Visible) { // Content ?>
	<div id="r_Content" class="form-group row">
		<label id="elh_sms_cintent_Content" for="x_Content" class="<?php echo $sms_cintent_edit->LeftColumnClass ?>"><?php echo $sms_cintent_edit->Content->caption() ?><?php echo $sms_cintent_edit->Content->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_cintent_edit->RightColumnClass ?>"><div <?php echo $sms_cintent_edit->Content->cellAttributes() ?>>
<span id="el_sms_cintent_Content">
<textarea data-table="sms_cintent" data-field="x_Content" name="x_Content" id="x_Content" cols="35" rows="4" placeholder="<?php echo HtmlEncode($sms_cintent_edit->Content->getPlaceHolder()) ?>"<?php echo $sms_cintent_edit->Content->editAttributes() ?>><?php echo $sms_cintent_edit->Content->EditValue ?></textarea>
</span>
<?php echo $sms_cintent_edit->Content->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sms_cintent_edit->Enabled->Visible) { // Enabled ?>
	<div id="r_Enabled" class="form-group row">
		<label id="elh_sms_cintent_Enabled" class="<?php echo $sms_cintent_edit->LeftColumnClass ?>"><?php echo $sms_cintent_edit->Enabled->caption() ?><?php echo $sms_cintent_edit->Enabled->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_cintent_edit->RightColumnClass ?>"><div <?php echo $sms_cintent_edit->Enabled->cellAttributes() ?>>
<span id="el_sms_cintent_Enabled">
<div id="tp_x_Enabled" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="sms_cintent" data-field="x_Enabled" data-value-separator="<?php echo $sms_cintent_edit->Enabled->displayValueSeparatorAttribute() ?>" name="x_Enabled[]" id="x_Enabled[]" value="{value}"<?php echo $sms_cintent_edit->Enabled->editAttributes() ?>></div>
<div id="dsl_x_Enabled" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $sms_cintent_edit->Enabled->checkBoxListHtml(FALSE, "x_Enabled[]") ?>
</div></div>
</span>
<?php echo $sms_cintent_edit->Enabled->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sms_cintent_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sms_cintent_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sms_cintent_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sms_cintent_edit->showPageFooter();
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
$sms_cintent_edit->terminate();
?>