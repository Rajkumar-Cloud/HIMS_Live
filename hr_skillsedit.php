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
$hr_skills_edit = new hr_skills_edit();

// Run the page
$hr_skills_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_skills_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fhr_skillsedit = currentForm = new ew.Form("fhr_skillsedit", "edit");

// Validate form
fhr_skillsedit.validate = function() {
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
		<?php if ($hr_skills_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_skills->id->caption(), $hr_skills->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_skills_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_skills->name->caption(), $hr_skills->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_skills_edit->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_skills->description->caption(), $hr_skills->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_skills_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_skills->HospID->caption(), $hr_skills->HospID->RequiredErrorMessage)) ?>");
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
fhr_skillsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_skillsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_skills_edit->showPageHeader(); ?>
<?php
$hr_skills_edit->showMessage();
?>
<form name="fhr_skillsedit" id="fhr_skillsedit" class="<?php echo $hr_skills_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_skills_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_skills_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_skills">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$hr_skills_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($hr_skills->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_hr_skills_id" class="<?php echo $hr_skills_edit->LeftColumnClass ?>"><?php echo $hr_skills->id->caption() ?><?php echo ($hr_skills->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_skills_edit->RightColumnClass ?>"><div<?php echo $hr_skills->id->cellAttributes() ?>>
<span id="el_hr_skills_id">
<span<?php echo $hr_skills->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($hr_skills->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="hr_skills" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($hr_skills->id->CurrentValue) ?>">
<?php echo $hr_skills->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_skills->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_skills_name" for="x_name" class="<?php echo $hr_skills_edit->LeftColumnClass ?>"><?php echo $hr_skills->name->caption() ?><?php echo ($hr_skills->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_skills_edit->RightColumnClass ?>"><div<?php echo $hr_skills->name->cellAttributes() ?>>
<span id="el_hr_skills_name">
<input type="text" data-table="hr_skills" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hr_skills->name->getPlaceHolder()) ?>" value="<?php echo $hr_skills->name->EditValue ?>"<?php echo $hr_skills->name->editAttributes() ?>>
</span>
<?php echo $hr_skills->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_skills->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_hr_skills_description" for="x_description" class="<?php echo $hr_skills_edit->LeftColumnClass ?>"><?php echo $hr_skills->description->caption() ?><?php echo ($hr_skills->description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_skills_edit->RightColumnClass ?>"><div<?php echo $hr_skills->description->cellAttributes() ?>>
<span id="el_hr_skills_description">
<textarea data-table="hr_skills" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_skills->description->getPlaceHolder()) ?>"<?php echo $hr_skills->description->editAttributes() ?>><?php echo $hr_skills->description->EditValue ?></textarea>
</span>
<?php echo $hr_skills->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_skills_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_skills_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_skills_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_skills_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_skills_edit->terminate();
?>