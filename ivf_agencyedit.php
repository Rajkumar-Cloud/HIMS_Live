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
$ivf_agency_edit = new ivf_agency_edit();

// Run the page
$ivf_agency_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_agency_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fivf_agencyedit = currentForm = new ew.Form("fivf_agencyedit", "edit");

// Validate form
fivf_agencyedit.validate = function() {
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
		<?php if ($ivf_agency_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency->id->caption(), $ivf_agency->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_agency_edit->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency->Name->caption(), $ivf_agency->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_agency_edit->Street->Required) { ?>
			elm = this.getElements("x" + infix + "_Street");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency->Street->caption(), $ivf_agency->Street->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_agency_edit->Town->Required) { ?>
			elm = this.getElements("x" + infix + "_Town");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency->Town->caption(), $ivf_agency->Town->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_agency_edit->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency->State->caption(), $ivf_agency->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_agency_edit->Pin->Required) { ?>
			elm = this.getElements("x" + infix + "_Pin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency->Pin->caption(), $ivf_agency->Pin->RequiredErrorMessage)) ?>");
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
fivf_agencyedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_agencyedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_agency_edit->showPageHeader(); ?>
<?php
$ivf_agency_edit->showMessage();
?>
<form name="fivf_agencyedit" id="fivf_agencyedit" class="<?php echo $ivf_agency_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_agency_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_agency_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_agency">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_agency_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($ivf_agency->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_agency_id" class="<?php echo $ivf_agency_edit->LeftColumnClass ?>"><?php echo $ivf_agency->id->caption() ?><?php echo ($ivf_agency->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_agency_edit->RightColumnClass ?>"><div<?php echo $ivf_agency->id->cellAttributes() ?>>
<span id="el_ivf_agency_id">
<span<?php echo $ivf_agency->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_agency->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_agency" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_agency->id->CurrentValue) ?>">
<?php echo $ivf_agency->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_agency->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_agency_Name" for="x_Name" class="<?php echo $ivf_agency_edit->LeftColumnClass ?>"><?php echo $ivf_agency->Name->caption() ?><?php echo ($ivf_agency->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_agency_edit->RightColumnClass ?>"><div<?php echo $ivf_agency->Name->cellAttributes() ?>>
<span id="el_ivf_agency_Name">
<input type="text" data-table="ivf_agency" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_agency->Name->EditValue ?>"<?php echo $ivf_agency->Name->editAttributes() ?>>
</span>
<?php echo $ivf_agency->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_agency->Street->Visible) { // Street ?>
	<div id="r_Street" class="form-group row">
		<label id="elh_ivf_agency_Street" for="x_Street" class="<?php echo $ivf_agency_edit->LeftColumnClass ?>"><?php echo $ivf_agency->Street->caption() ?><?php echo ($ivf_agency->Street->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_agency_edit->RightColumnClass ?>"><div<?php echo $ivf_agency->Street->cellAttributes() ?>>
<span id="el_ivf_agency_Street">
<input type="text" data-table="ivf_agency" data-field="x_Street" name="x_Street" id="x_Street" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency->Street->getPlaceHolder()) ?>" value="<?php echo $ivf_agency->Street->EditValue ?>"<?php echo $ivf_agency->Street->editAttributes() ?>>
</span>
<?php echo $ivf_agency->Street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_agency->Town->Visible) { // Town ?>
	<div id="r_Town" class="form-group row">
		<label id="elh_ivf_agency_Town" for="x_Town" class="<?php echo $ivf_agency_edit->LeftColumnClass ?>"><?php echo $ivf_agency->Town->caption() ?><?php echo ($ivf_agency->Town->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_agency_edit->RightColumnClass ?>"><div<?php echo $ivf_agency->Town->cellAttributes() ?>>
<span id="el_ivf_agency_Town">
<input type="text" data-table="ivf_agency" data-field="x_Town" name="x_Town" id="x_Town" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency->Town->getPlaceHolder()) ?>" value="<?php echo $ivf_agency->Town->EditValue ?>"<?php echo $ivf_agency->Town->editAttributes() ?>>
</span>
<?php echo $ivf_agency->Town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_agency->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_ivf_agency_State" for="x_State" class="<?php echo $ivf_agency_edit->LeftColumnClass ?>"><?php echo $ivf_agency->State->caption() ?><?php echo ($ivf_agency->State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_agency_edit->RightColumnClass ?>"><div<?php echo $ivf_agency->State->cellAttributes() ?>>
<span id="el_ivf_agency_State">
<input type="text" data-table="ivf_agency" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency->State->getPlaceHolder()) ?>" value="<?php echo $ivf_agency->State->EditValue ?>"<?php echo $ivf_agency->State->editAttributes() ?>>
</span>
<?php echo $ivf_agency->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_agency->Pin->Visible) { // Pin ?>
	<div id="r_Pin" class="form-group row">
		<label id="elh_ivf_agency_Pin" for="x_Pin" class="<?php echo $ivf_agency_edit->LeftColumnClass ?>"><?php echo $ivf_agency->Pin->caption() ?><?php echo ($ivf_agency->Pin->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_agency_edit->RightColumnClass ?>"><div<?php echo $ivf_agency->Pin->cellAttributes() ?>>
<span id="el_ivf_agency_Pin">
<input type="text" data-table="ivf_agency" data-field="x_Pin" name="x_Pin" id="x_Pin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency->Pin->getPlaceHolder()) ?>" value="<?php echo $ivf_agency->Pin->EditValue ?>"<?php echo $ivf_agency->Pin->editAttributes() ?>>
</span>
<?php echo $ivf_agency->Pin->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_agency_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_agency_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_agency_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_agency_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_agency_edit->terminate();
?>