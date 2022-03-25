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
$hr_jobtitles_add = new hr_jobtitles_add();

// Run the page
$hr_jobtitles_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_jobtitles_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fhr_jobtitlesadd = currentForm = new ew.Form("fhr_jobtitlesadd", "add");

// Validate form
fhr_jobtitlesadd.validate = function() {
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
		<?php if ($hr_jobtitles_add->code->Required) { ?>
			elm = this.getElements("x" + infix + "_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_jobtitles->code->caption(), $hr_jobtitles->code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_jobtitles_add->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_jobtitles->name->caption(), $hr_jobtitles->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_jobtitles_add->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_jobtitles->description->caption(), $hr_jobtitles->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_jobtitles_add->specification->Required) { ?>
			elm = this.getElements("x" + infix + "_specification");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_jobtitles->specification->caption(), $hr_jobtitles->specification->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_jobtitles_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_jobtitles->HospID->caption(), $hr_jobtitles->HospID->RequiredErrorMessage)) ?>");
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
fhr_jobtitlesadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_jobtitlesadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_jobtitles_add->showPageHeader(); ?>
<?php
$hr_jobtitles_add->showMessage();
?>
<form name="fhr_jobtitlesadd" id="fhr_jobtitlesadd" class="<?php echo $hr_jobtitles_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_jobtitles_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_jobtitles_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_jobtitles">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$hr_jobtitles_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($hr_jobtitles->code->Visible) { // code ?>
	<div id="r_code" class="form-group row">
		<label id="elh_hr_jobtitles_code" for="x_code" class="<?php echo $hr_jobtitles_add->LeftColumnClass ?>"><?php echo $hr_jobtitles->code->caption() ?><?php echo ($hr_jobtitles->code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_jobtitles_add->RightColumnClass ?>"><div<?php echo $hr_jobtitles->code->cellAttributes() ?>>
<span id="el_hr_jobtitles_code">
<input type="text" data-table="hr_jobtitles" data-field="x_code" name="x_code" id="x_code" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($hr_jobtitles->code->getPlaceHolder()) ?>" value="<?php echo $hr_jobtitles->code->EditValue ?>"<?php echo $hr_jobtitles->code->editAttributes() ?>>
</span>
<?php echo $hr_jobtitles->code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_jobtitles->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_jobtitles_name" for="x_name" class="<?php echo $hr_jobtitles_add->LeftColumnClass ?>"><?php echo $hr_jobtitles->name->caption() ?><?php echo ($hr_jobtitles->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_jobtitles_add->RightColumnClass ?>"><div<?php echo $hr_jobtitles->name->cellAttributes() ?>>
<span id="el_hr_jobtitles_name">
<input type="text" data-table="hr_jobtitles" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hr_jobtitles->name->getPlaceHolder()) ?>" value="<?php echo $hr_jobtitles->name->EditValue ?>"<?php echo $hr_jobtitles->name->editAttributes() ?>>
</span>
<?php echo $hr_jobtitles->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_jobtitles->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_hr_jobtitles_description" for="x_description" class="<?php echo $hr_jobtitles_add->LeftColumnClass ?>"><?php echo $hr_jobtitles->description->caption() ?><?php echo ($hr_jobtitles->description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_jobtitles_add->RightColumnClass ?>"><div<?php echo $hr_jobtitles->description->cellAttributes() ?>>
<span id="el_hr_jobtitles_description">
<input type="text" data-table="hr_jobtitles" data-field="x_description" name="x_description" id="x_description" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($hr_jobtitles->description->getPlaceHolder()) ?>" value="<?php echo $hr_jobtitles->description->EditValue ?>"<?php echo $hr_jobtitles->description->editAttributes() ?>>
</span>
<?php echo $hr_jobtitles->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_jobtitles->specification->Visible) { // specification ?>
	<div id="r_specification" class="form-group row">
		<label id="elh_hr_jobtitles_specification" for="x_specification" class="<?php echo $hr_jobtitles_add->LeftColumnClass ?>"><?php echo $hr_jobtitles->specification->caption() ?><?php echo ($hr_jobtitles->specification->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_jobtitles_add->RightColumnClass ?>"><div<?php echo $hr_jobtitles->specification->cellAttributes() ?>>
<span id="el_hr_jobtitles_specification">
<textarea data-table="hr_jobtitles" data-field="x_specification" name="x_specification" id="x_specification" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_jobtitles->specification->getPlaceHolder()) ?>"<?php echo $hr_jobtitles->specification->editAttributes() ?>><?php echo $hr_jobtitles->specification->EditValue ?></textarea>
</span>
<?php echo $hr_jobtitles->specification->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_jobtitles_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_jobtitles_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_jobtitles_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_jobtitles_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_jobtitles_add->terminate();
?>