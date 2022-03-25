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
$sys_province_add = new sys_province_add();

// Run the page
$sys_province_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_province_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fsys_provinceadd = currentForm = new ew.Form("fsys_provinceadd", "add");

// Validate form
fsys_provinceadd.validate = function() {
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
		<?php if ($sys_province_add->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_province->name->caption(), $sys_province->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_province_add->code->Required) { ?>
			elm = this.getElements("x" + infix + "_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_province->code->caption(), $sys_province->code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_province_add->country->Required) { ?>
			elm = this.getElements("x" + infix + "_country");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_province->country->caption(), $sys_province->country->RequiredErrorMessage)) ?>");
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
fsys_provinceadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_provinceadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_province_add->showPageHeader(); ?>
<?php
$sys_province_add->showMessage();
?>
<form name="fsys_provinceadd" id="fsys_provinceadd" class="<?php echo $sys_province_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_province_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_province_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_province">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$sys_province_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($sys_province->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_sys_province_name" for="x_name" class="<?php echo $sys_province_add->LeftColumnClass ?>"><?php echo $sys_province->name->caption() ?><?php echo ($sys_province->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_province_add->RightColumnClass ?>"><div<?php echo $sys_province->name->cellAttributes() ?>>
<span id="el_sys_province_name">
<input type="text" data-table="sys_province" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($sys_province->name->getPlaceHolder()) ?>" value="<?php echo $sys_province->name->EditValue ?>"<?php echo $sys_province->name->editAttributes() ?>>
</span>
<?php echo $sys_province->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_province->code->Visible) { // code ?>
	<div id="r_code" class="form-group row">
		<label id="elh_sys_province_code" for="x_code" class="<?php echo $sys_province_add->LeftColumnClass ?>"><?php echo $sys_province->code->caption() ?><?php echo ($sys_province->code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_province_add->RightColumnClass ?>"><div<?php echo $sys_province->code->cellAttributes() ?>>
<span id="el_sys_province_code">
<input type="text" data-table="sys_province" data-field="x_code" name="x_code" id="x_code" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($sys_province->code->getPlaceHolder()) ?>" value="<?php echo $sys_province->code->EditValue ?>"<?php echo $sys_province->code->editAttributes() ?>>
</span>
<?php echo $sys_province->code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_province->country->Visible) { // country ?>
	<div id="r_country" class="form-group row">
		<label id="elh_sys_province_country" for="x_country" class="<?php echo $sys_province_add->LeftColumnClass ?>"><?php echo $sys_province->country->caption() ?><?php echo ($sys_province->country->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_province_add->RightColumnClass ?>"><div<?php echo $sys_province->country->cellAttributes() ?>>
<span id="el_sys_province_country">
<input type="text" data-table="sys_province" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($sys_province->country->getPlaceHolder()) ?>" value="<?php echo $sys_province->country->EditValue ?>"<?php echo $sys_province->country->editAttributes() ?>>
</span>
<?php echo $sys_province->country->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sys_province_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sys_province_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_province_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sys_province_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_province_add->terminate();
?>