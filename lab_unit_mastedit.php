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
$lab_unit_mast_edit = new lab_unit_mast_edit();

// Run the page
$lab_unit_mast_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_unit_mast_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var flab_unit_mastedit = currentForm = new ew.Form("flab_unit_mastedit", "edit");

// Validate form
flab_unit_mastedit.validate = function() {
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
		<?php if ($lab_unit_mast_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_unit_mast->id->caption(), $lab_unit_mast->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_unit_mast_edit->Code->Required) { ?>
			elm = this.getElements("x" + infix + "_Code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_unit_mast->Code->caption(), $lab_unit_mast->Code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_unit_mast_edit->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_unit_mast->Name->caption(), $lab_unit_mast->Name->RequiredErrorMessage)) ?>");
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
flab_unit_mastedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_unit_mastedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_unit_mast_edit->showPageHeader(); ?>
<?php
$lab_unit_mast_edit->showMessage();
?>
<form name="flab_unit_mastedit" id="flab_unit_mastedit" class="<?php echo $lab_unit_mast_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_unit_mast_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_unit_mast_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_unit_mast">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$lab_unit_mast_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($lab_unit_mast->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_lab_unit_mast_id" class="<?php echo $lab_unit_mast_edit->LeftColumnClass ?>"><?php echo $lab_unit_mast->id->caption() ?><?php echo ($lab_unit_mast->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_unit_mast_edit->RightColumnClass ?>"><div<?php echo $lab_unit_mast->id->cellAttributes() ?>>
<span id="el_lab_unit_mast_id">
<span<?php echo $lab_unit_mast->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_unit_mast->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_unit_mast" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($lab_unit_mast->id->CurrentValue) ?>">
<?php echo $lab_unit_mast->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_unit_mast->Code->Visible) { // Code ?>
	<div id="r_Code" class="form-group row">
		<label id="elh_lab_unit_mast_Code" for="x_Code" class="<?php echo $lab_unit_mast_edit->LeftColumnClass ?>"><?php echo $lab_unit_mast->Code->caption() ?><?php echo ($lab_unit_mast->Code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_unit_mast_edit->RightColumnClass ?>"><div<?php echo $lab_unit_mast->Code->cellAttributes() ?>>
<span id="el_lab_unit_mast_Code">
<input type="text" data-table="lab_unit_mast" data-field="x_Code" name="x_Code" id="x_Code" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_unit_mast->Code->getPlaceHolder()) ?>" value="<?php echo $lab_unit_mast->Code->EditValue ?>"<?php echo $lab_unit_mast->Code->editAttributes() ?>>
</span>
<?php echo $lab_unit_mast->Code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_unit_mast->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_lab_unit_mast_Name" for="x_Name" class="<?php echo $lab_unit_mast_edit->LeftColumnClass ?>"><?php echo $lab_unit_mast->Name->caption() ?><?php echo ($lab_unit_mast->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_unit_mast_edit->RightColumnClass ?>"><div<?php echo $lab_unit_mast->Name->cellAttributes() ?>>
<span id="el_lab_unit_mast_Name">
<input type="text" data-table="lab_unit_mast" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_unit_mast->Name->getPlaceHolder()) ?>" value="<?php echo $lab_unit_mast->Name->EditValue ?>"<?php echo $lab_unit_mast->Name->editAttributes() ?>>
</span>
<?php echo $lab_unit_mast->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_unit_mast_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_unit_mast_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_unit_mast_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_unit_mast_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_unit_mast_edit->terminate();
?>