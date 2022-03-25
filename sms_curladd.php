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
$sms_curl_add = new sms_curl_add();

// Run the page
$sms_curl_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_curl_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fsms_curladd = currentForm = new ew.Form("fsms_curladd", "add");

// Validate form
fsms_curladd.validate = function() {
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
		<?php if ($sms_curl_add->SMSType->Required) { ?>
			elm = this.getElements("x" + infix + "_SMSType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_curl->SMSType->caption(), $sms_curl->SMSType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sms_curl_add->Content->Required) { ?>
			elm = this.getElements("x" + infix + "_Content");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_curl->Content->caption(), $sms_curl->Content->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sms_curl_add->Enabled->Required) { ?>
			elm = this.getElements("x" + infix + "_Enabled");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_curl->Enabled->caption(), $sms_curl->Enabled->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sms_curl_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_curl->HospID->caption(), $sms_curl->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($sms_curl->HospID->errorMessage()) ?>");

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
fsms_curladd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsms_curladd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sms_curl_add->showPageHeader(); ?>
<?php
$sms_curl_add->showMessage();
?>
<form name="fsms_curladd" id="fsms_curladd" class="<?php echo $sms_curl_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sms_curl_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sms_curl_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_curl">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$sms_curl_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($sms_curl->SMSType->Visible) { // SMSType ?>
	<div id="r_SMSType" class="form-group row">
		<label id="elh_sms_curl_SMSType" for="x_SMSType" class="<?php echo $sms_curl_add->LeftColumnClass ?>"><?php echo $sms_curl->SMSType->caption() ?><?php echo ($sms_curl->SMSType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_curl_add->RightColumnClass ?>"><div<?php echo $sms_curl->SMSType->cellAttributes() ?>>
<span id="el_sms_curl_SMSType">
<input type="text" data-table="sms_curl" data-field="x_SMSType" name="x_SMSType" id="x_SMSType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($sms_curl->SMSType->getPlaceHolder()) ?>" value="<?php echo $sms_curl->SMSType->EditValue ?>"<?php echo $sms_curl->SMSType->editAttributes() ?>>
</span>
<?php echo $sms_curl->SMSType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sms_curl->Content->Visible) { // Content ?>
	<div id="r_Content" class="form-group row">
		<label id="elh_sms_curl_Content" for="x_Content" class="<?php echo $sms_curl_add->LeftColumnClass ?>"><?php echo $sms_curl->Content->caption() ?><?php echo ($sms_curl->Content->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_curl_add->RightColumnClass ?>"><div<?php echo $sms_curl->Content->cellAttributes() ?>>
<span id="el_sms_curl_Content">
<textarea data-table="sms_curl" data-field="x_Content" name="x_Content" id="x_Content" cols="35" rows="4" placeholder="<?php echo HtmlEncode($sms_curl->Content->getPlaceHolder()) ?>"<?php echo $sms_curl->Content->editAttributes() ?>><?php echo $sms_curl->Content->EditValue ?></textarea>
</span>
<?php echo $sms_curl->Content->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sms_curl->Enabled->Visible) { // Enabled ?>
	<div id="r_Enabled" class="form-group row">
		<label id="elh_sms_curl_Enabled" for="x_Enabled" class="<?php echo $sms_curl_add->LeftColumnClass ?>"><?php echo $sms_curl->Enabled->caption() ?><?php echo ($sms_curl->Enabled->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_curl_add->RightColumnClass ?>"><div<?php echo $sms_curl->Enabled->cellAttributes() ?>>
<span id="el_sms_curl_Enabled">
<input type="text" data-table="sms_curl" data-field="x_Enabled" name="x_Enabled" id="x_Enabled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($sms_curl->Enabled->getPlaceHolder()) ?>" value="<?php echo $sms_curl->Enabled->EditValue ?>"<?php echo $sms_curl->Enabled->editAttributes() ?>>
</span>
<?php echo $sms_curl->Enabled->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sms_curl->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_sms_curl_HospID" for="x_HospID" class="<?php echo $sms_curl_add->LeftColumnClass ?>"><?php echo $sms_curl->HospID->caption() ?><?php echo ($sms_curl->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_curl_add->RightColumnClass ?>"><div<?php echo $sms_curl->HospID->cellAttributes() ?>>
<span id="el_sms_curl_HospID">
<input type="text" data-table="sms_curl" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($sms_curl->HospID->getPlaceHolder()) ?>" value="<?php echo $sms_curl->HospID->EditValue ?>"<?php echo $sms_curl->HospID->editAttributes() ?>>
</span>
<?php echo $sms_curl->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sms_curl_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sms_curl_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sms_curl_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sms_curl_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sms_curl_add->terminate();
?>