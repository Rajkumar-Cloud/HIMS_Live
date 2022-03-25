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
$sys_workdays_add = new sys_workdays_add();

// Run the page
$sys_workdays_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_workdays_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fsys_workdaysadd = currentForm = new ew.Form("fsys_workdaysadd", "add");

// Validate form
fsys_workdaysadd.validate = function() {
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
		<?php if ($sys_workdays_add->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_workdays->name->caption(), $sys_workdays->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_workdays_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_workdays->status->caption(), $sys_workdays->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_workdays_add->country->Required) { ?>
			elm = this.getElements("x" + infix + "_country");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_workdays->country->caption(), $sys_workdays->country->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_country");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($sys_workdays->country->errorMessage()) ?>");
		<?php if ($sys_workdays_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_workdays->HospID->caption(), $sys_workdays->HospID->RequiredErrorMessage)) ?>");
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
fsys_workdaysadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_workdaysadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fsys_workdaysadd.lists["x_status"] = <?php echo $sys_workdays_add->status->Lookup->toClientList() ?>;
fsys_workdaysadd.lists["x_status"].options = <?php echo JsonEncode($sys_workdays_add->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_workdays_add->showPageHeader(); ?>
<?php
$sys_workdays_add->showMessage();
?>
<form name="fsys_workdaysadd" id="fsys_workdaysadd" class="<?php echo $sys_workdays_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_workdays_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_workdays_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_workdays">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$sys_workdays_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($sys_workdays->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_sys_workdays_name" for="x_name" class="<?php echo $sys_workdays_add->LeftColumnClass ?>"><?php echo $sys_workdays->name->caption() ?><?php echo ($sys_workdays->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_workdays_add->RightColumnClass ?>"><div<?php echo $sys_workdays->name->cellAttributes() ?>>
<span id="el_sys_workdays_name">
<input type="text" data-table="sys_workdays" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($sys_workdays->name->getPlaceHolder()) ?>" value="<?php echo $sys_workdays->name->EditValue ?>"<?php echo $sys_workdays->name->editAttributes() ?>>
</span>
<?php echo $sys_workdays->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_workdays->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_sys_workdays_status" class="<?php echo $sys_workdays_add->LeftColumnClass ?>"><?php echo $sys_workdays->status->caption() ?><?php echo ($sys_workdays->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_workdays_add->RightColumnClass ?>"><div<?php echo $sys_workdays->status->cellAttributes() ?>>
<span id="el_sys_workdays_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="sys_workdays" data-field="x_status" data-value-separator="<?php echo $sys_workdays->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $sys_workdays->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $sys_workdays->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $sys_workdays->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_workdays->country->Visible) { // country ?>
	<div id="r_country" class="form-group row">
		<label id="elh_sys_workdays_country" for="x_country" class="<?php echo $sys_workdays_add->LeftColumnClass ?>"><?php echo $sys_workdays->country->caption() ?><?php echo ($sys_workdays->country->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_workdays_add->RightColumnClass ?>"><div<?php echo $sys_workdays->country->cellAttributes() ?>>
<span id="el_sys_workdays_country">
<input type="text" data-table="sys_workdays" data-field="x_country" name="x_country" id="x_country" size="30" placeholder="<?php echo HtmlEncode($sys_workdays->country->getPlaceHolder()) ?>" value="<?php echo $sys_workdays->country->EditValue ?>"<?php echo $sys_workdays->country->editAttributes() ?>>
</span>
<?php echo $sys_workdays->country->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sys_workdays_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sys_workdays_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_workdays_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sys_workdays_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_workdays_add->terminate();
?>