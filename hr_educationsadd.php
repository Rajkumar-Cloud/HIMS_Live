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
$hr_educations_add = new hr_educations_add();

// Run the page
$hr_educations_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_educations_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fhr_educationsadd = currentForm = new ew.Form("fhr_educationsadd", "add");

// Validate form
fhr_educationsadd.validate = function() {
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
		<?php if ($hr_educations_add->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_educations->name->caption(), $hr_educations->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_educations_add->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_educations->description->caption(), $hr_educations->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_educations_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_educations->HospID->caption(), $hr_educations->HospID->RequiredErrorMessage)) ?>");
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
fhr_educationsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_educationsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_educations_add->showPageHeader(); ?>
<?php
$hr_educations_add->showMessage();
?>
<form name="fhr_educationsadd" id="fhr_educationsadd" class="<?php echo $hr_educations_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_educations_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_educations_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_educations">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$hr_educations_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($hr_educations->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_educations_name" for="x_name" class="<?php echo $hr_educations_add->LeftColumnClass ?>"><?php echo $hr_educations->name->caption() ?><?php echo ($hr_educations->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_educations_add->RightColumnClass ?>"><div<?php echo $hr_educations->name->cellAttributes() ?>>
<span id="el_hr_educations_name">
<input type="text" data-table="hr_educations" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hr_educations->name->getPlaceHolder()) ?>" value="<?php echo $hr_educations->name->EditValue ?>"<?php echo $hr_educations->name->editAttributes() ?>>
</span>
<?php echo $hr_educations->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_educations->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_hr_educations_description" for="x_description" class="<?php echo $hr_educations_add->LeftColumnClass ?>"><?php echo $hr_educations->description->caption() ?><?php echo ($hr_educations->description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_educations_add->RightColumnClass ?>"><div<?php echo $hr_educations->description->cellAttributes() ?>>
<span id="el_hr_educations_description">
<textarea data-table="hr_educations" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_educations->description->getPlaceHolder()) ?>"<?php echo $hr_educations->description->editAttributes() ?>><?php echo $hr_educations->description->EditValue ?></textarea>
</span>
<?php echo $hr_educations->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_educations_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_educations_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_educations_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_educations_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_educations_add->terminate();
?>