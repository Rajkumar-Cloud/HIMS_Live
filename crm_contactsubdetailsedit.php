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
$crm_contactsubdetails_edit = new crm_contactsubdetails_edit();

// Run the page
$crm_contactsubdetails_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_contactsubdetails_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fcrm_contactsubdetailsedit = currentForm = new ew.Form("fcrm_contactsubdetailsedit", "edit");

// Validate form
fcrm_contactsubdetailsedit.validate = function() {
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
		<?php if ($crm_contactsubdetails_edit->contactsubscriptionid->Required) { ?>
			elm = this.getElements("x" + infix + "_contactsubscriptionid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactsubdetails->contactsubscriptionid->caption(), $crm_contactsubdetails->contactsubscriptionid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_contactsubscriptionid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_contactsubdetails->contactsubscriptionid->errorMessage()) ?>");
		<?php if ($crm_contactsubdetails_edit->birthday->Required) { ?>
			elm = this.getElements("x" + infix + "_birthday");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactsubdetails->birthday->caption(), $crm_contactsubdetails->birthday->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_birthday");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_contactsubdetails->birthday->errorMessage()) ?>");
		<?php if ($crm_contactsubdetails_edit->laststayintouchrequest->Required) { ?>
			elm = this.getElements("x" + infix + "_laststayintouchrequest");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactsubdetails->laststayintouchrequest->caption(), $crm_contactsubdetails->laststayintouchrequest->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_laststayintouchrequest");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_contactsubdetails->laststayintouchrequest->errorMessage()) ?>");
		<?php if ($crm_contactsubdetails_edit->laststayintouchsavedate->Required) { ?>
			elm = this.getElements("x" + infix + "_laststayintouchsavedate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactsubdetails->laststayintouchsavedate->caption(), $crm_contactsubdetails->laststayintouchsavedate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_laststayintouchsavedate");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_contactsubdetails->laststayintouchsavedate->errorMessage()) ?>");
		<?php if ($crm_contactsubdetails_edit->leadsource->Required) { ?>
			elm = this.getElements("x" + infix + "_leadsource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactsubdetails->leadsource->caption(), $crm_contactsubdetails->leadsource->RequiredErrorMessage)) ?>");
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
fcrm_contactsubdetailsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_contactsubdetailsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_contactsubdetails_edit->showPageHeader(); ?>
<?php
$crm_contactsubdetails_edit->showMessage();
?>
<form name="fcrm_contactsubdetailsedit" id="fcrm_contactsubdetailsedit" class="<?php echo $crm_contactsubdetails_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_contactsubdetails_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_contactsubdetails_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_contactsubdetails">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$crm_contactsubdetails_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($crm_contactsubdetails->contactsubscriptionid->Visible) { // contactsubscriptionid ?>
	<div id="r_contactsubscriptionid" class="form-group row">
		<label id="elh_crm_contactsubdetails_contactsubscriptionid" for="x_contactsubscriptionid" class="<?php echo $crm_contactsubdetails_edit->LeftColumnClass ?>"><?php echo $crm_contactsubdetails->contactsubscriptionid->caption() ?><?php echo ($crm_contactsubdetails->contactsubscriptionid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactsubdetails_edit->RightColumnClass ?>"><div<?php echo $crm_contactsubdetails->contactsubscriptionid->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_contactsubscriptionid">
<span<?php echo $crm_contactsubdetails->contactsubscriptionid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($crm_contactsubdetails->contactsubscriptionid->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="crm_contactsubdetails" data-field="x_contactsubscriptionid" name="x_contactsubscriptionid" id="x_contactsubscriptionid" value="<?php echo HtmlEncode($crm_contactsubdetails->contactsubscriptionid->CurrentValue) ?>">
<?php echo $crm_contactsubdetails->contactsubscriptionid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactsubdetails->birthday->Visible) { // birthday ?>
	<div id="r_birthday" class="form-group row">
		<label id="elh_crm_contactsubdetails_birthday" for="x_birthday" class="<?php echo $crm_contactsubdetails_edit->LeftColumnClass ?>"><?php echo $crm_contactsubdetails->birthday->caption() ?><?php echo ($crm_contactsubdetails->birthday->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactsubdetails_edit->RightColumnClass ?>"><div<?php echo $crm_contactsubdetails->birthday->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_birthday">
<input type="text" data-table="crm_contactsubdetails" data-field="x_birthday" name="x_birthday" id="x_birthday" placeholder="<?php echo HtmlEncode($crm_contactsubdetails->birthday->getPlaceHolder()) ?>" value="<?php echo $crm_contactsubdetails->birthday->EditValue ?>"<?php echo $crm_contactsubdetails->birthday->editAttributes() ?>>
<?php if (!$crm_contactsubdetails->birthday->ReadOnly && !$crm_contactsubdetails->birthday->Disabled && !isset($crm_contactsubdetails->birthday->EditAttrs["readonly"]) && !isset($crm_contactsubdetails->birthday->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fcrm_contactsubdetailsedit", "x_birthday", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $crm_contactsubdetails->birthday->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactsubdetails->laststayintouchrequest->Visible) { // laststayintouchrequest ?>
	<div id="r_laststayintouchrequest" class="form-group row">
		<label id="elh_crm_contactsubdetails_laststayintouchrequest" for="x_laststayintouchrequest" class="<?php echo $crm_contactsubdetails_edit->LeftColumnClass ?>"><?php echo $crm_contactsubdetails->laststayintouchrequest->caption() ?><?php echo ($crm_contactsubdetails->laststayintouchrequest->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactsubdetails_edit->RightColumnClass ?>"><div<?php echo $crm_contactsubdetails->laststayintouchrequest->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_laststayintouchrequest">
<input type="text" data-table="crm_contactsubdetails" data-field="x_laststayintouchrequest" name="x_laststayintouchrequest" id="x_laststayintouchrequest" size="30" placeholder="<?php echo HtmlEncode($crm_contactsubdetails->laststayintouchrequest->getPlaceHolder()) ?>" value="<?php echo $crm_contactsubdetails->laststayintouchrequest->EditValue ?>"<?php echo $crm_contactsubdetails->laststayintouchrequest->editAttributes() ?>>
</span>
<?php echo $crm_contactsubdetails->laststayintouchrequest->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactsubdetails->laststayintouchsavedate->Visible) { // laststayintouchsavedate ?>
	<div id="r_laststayintouchsavedate" class="form-group row">
		<label id="elh_crm_contactsubdetails_laststayintouchsavedate" for="x_laststayintouchsavedate" class="<?php echo $crm_contactsubdetails_edit->LeftColumnClass ?>"><?php echo $crm_contactsubdetails->laststayintouchsavedate->caption() ?><?php echo ($crm_contactsubdetails->laststayintouchsavedate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactsubdetails_edit->RightColumnClass ?>"><div<?php echo $crm_contactsubdetails->laststayintouchsavedate->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_laststayintouchsavedate">
<input type="text" data-table="crm_contactsubdetails" data-field="x_laststayintouchsavedate" name="x_laststayintouchsavedate" id="x_laststayintouchsavedate" size="30" placeholder="<?php echo HtmlEncode($crm_contactsubdetails->laststayintouchsavedate->getPlaceHolder()) ?>" value="<?php echo $crm_contactsubdetails->laststayintouchsavedate->EditValue ?>"<?php echo $crm_contactsubdetails->laststayintouchsavedate->editAttributes() ?>>
</span>
<?php echo $crm_contactsubdetails->laststayintouchsavedate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactsubdetails->leadsource->Visible) { // leadsource ?>
	<div id="r_leadsource" class="form-group row">
		<label id="elh_crm_contactsubdetails_leadsource" for="x_leadsource" class="<?php echo $crm_contactsubdetails_edit->LeftColumnClass ?>"><?php echo $crm_contactsubdetails->leadsource->caption() ?><?php echo ($crm_contactsubdetails->leadsource->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactsubdetails_edit->RightColumnClass ?>"><div<?php echo $crm_contactsubdetails->leadsource->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_leadsource">
<input type="text" data-table="crm_contactsubdetails" data-field="x_leadsource" name="x_leadsource" id="x_leadsource" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($crm_contactsubdetails->leadsource->getPlaceHolder()) ?>" value="<?php echo $crm_contactsubdetails->leadsource->EditValue ?>"<?php echo $crm_contactsubdetails->leadsource->editAttributes() ?>>
</span>
<?php echo $crm_contactsubdetails->leadsource->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$crm_contactsubdetails_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $crm_contactsubdetails_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_contactsubdetails_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$crm_contactsubdetails_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_contactsubdetails_edit->terminate();
?>