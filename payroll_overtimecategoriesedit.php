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
$payroll_overtimecategories_edit = new payroll_overtimecategories_edit();

// Run the page
$payroll_overtimecategories_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$payroll_overtimecategories_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpayroll_overtimecategoriesedit = currentForm = new ew.Form("fpayroll_overtimecategoriesedit", "edit");

// Validate form
fpayroll_overtimecategoriesedit.validate = function() {
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
		<?php if ($payroll_overtimecategories_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $payroll_overtimecategories->id->caption(), $payroll_overtimecategories->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($payroll_overtimecategories_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $payroll_overtimecategories->name->caption(), $payroll_overtimecategories->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($payroll_overtimecategories_edit->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $payroll_overtimecategories->created->caption(), $payroll_overtimecategories->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($payroll_overtimecategories->created->errorMessage()) ?>");
		<?php if ($payroll_overtimecategories_edit->updated->Required) { ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $payroll_overtimecategories->updated->caption(), $payroll_overtimecategories->updated->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($payroll_overtimecategories->updated->errorMessage()) ?>");

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
fpayroll_overtimecategoriesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpayroll_overtimecategoriesedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $payroll_overtimecategories_edit->showPageHeader(); ?>
<?php
$payroll_overtimecategories_edit->showMessage();
?>
<form name="fpayroll_overtimecategoriesedit" id="fpayroll_overtimecategoriesedit" class="<?php echo $payroll_overtimecategories_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($payroll_overtimecategories_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $payroll_overtimecategories_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="payroll_overtimecategories">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$payroll_overtimecategories_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($payroll_overtimecategories->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_payroll_overtimecategories_id" class="<?php echo $payroll_overtimecategories_edit->LeftColumnClass ?>"><?php echo $payroll_overtimecategories->id->caption() ?><?php echo ($payroll_overtimecategories->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $payroll_overtimecategories_edit->RightColumnClass ?>"><div<?php echo $payroll_overtimecategories->id->cellAttributes() ?>>
<span id="el_payroll_overtimecategories_id">
<span<?php echo $payroll_overtimecategories->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($payroll_overtimecategories->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="payroll_overtimecategories" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($payroll_overtimecategories->id->CurrentValue) ?>">
<?php echo $payroll_overtimecategories->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($payroll_overtimecategories->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_payroll_overtimecategories_name" for="x_name" class="<?php echo $payroll_overtimecategories_edit->LeftColumnClass ?>"><?php echo $payroll_overtimecategories->name->caption() ?><?php echo ($payroll_overtimecategories->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $payroll_overtimecategories_edit->RightColumnClass ?>"><div<?php echo $payroll_overtimecategories->name->cellAttributes() ?>>
<span id="el_payroll_overtimecategories_name">
<textarea data-table="payroll_overtimecategories" data-field="x_name" name="x_name" id="x_name" cols="35" rows="4" placeholder="<?php echo HtmlEncode($payroll_overtimecategories->name->getPlaceHolder()) ?>"<?php echo $payroll_overtimecategories->name->editAttributes() ?>><?php echo $payroll_overtimecategories->name->EditValue ?></textarea>
</span>
<?php echo $payroll_overtimecategories->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($payroll_overtimecategories->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_payroll_overtimecategories_created" for="x_created" class="<?php echo $payroll_overtimecategories_edit->LeftColumnClass ?>"><?php echo $payroll_overtimecategories->created->caption() ?><?php echo ($payroll_overtimecategories->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $payroll_overtimecategories_edit->RightColumnClass ?>"><div<?php echo $payroll_overtimecategories->created->cellAttributes() ?>>
<span id="el_payroll_overtimecategories_created">
<input type="text" data-table="payroll_overtimecategories" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($payroll_overtimecategories->created->getPlaceHolder()) ?>" value="<?php echo $payroll_overtimecategories->created->EditValue ?>"<?php echo $payroll_overtimecategories->created->editAttributes() ?>>
<?php if (!$payroll_overtimecategories->created->ReadOnly && !$payroll_overtimecategories->created->Disabled && !isset($payroll_overtimecategories->created->EditAttrs["readonly"]) && !isset($payroll_overtimecategories->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpayroll_overtimecategoriesedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $payroll_overtimecategories->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($payroll_overtimecategories->updated->Visible) { // updated ?>
	<div id="r_updated" class="form-group row">
		<label id="elh_payroll_overtimecategories_updated" for="x_updated" class="<?php echo $payroll_overtimecategories_edit->LeftColumnClass ?>"><?php echo $payroll_overtimecategories->updated->caption() ?><?php echo ($payroll_overtimecategories->updated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $payroll_overtimecategories_edit->RightColumnClass ?>"><div<?php echo $payroll_overtimecategories->updated->cellAttributes() ?>>
<span id="el_payroll_overtimecategories_updated">
<input type="text" data-table="payroll_overtimecategories" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?php echo HtmlEncode($payroll_overtimecategories->updated->getPlaceHolder()) ?>" value="<?php echo $payroll_overtimecategories->updated->EditValue ?>"<?php echo $payroll_overtimecategories->updated->editAttributes() ?>>
<?php if (!$payroll_overtimecategories->updated->ReadOnly && !$payroll_overtimecategories->updated->Disabled && !isset($payroll_overtimecategories->updated->EditAttrs["readonly"]) && !isset($payroll_overtimecategories->updated->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpayroll_overtimecategoriesedit", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $payroll_overtimecategories->updated->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$payroll_overtimecategories_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $payroll_overtimecategories_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $payroll_overtimecategories_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$payroll_overtimecategories_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$payroll_overtimecategories_edit->terminate();
?>