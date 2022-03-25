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
$payroll_deductiongroup_edit = new payroll_deductiongroup_edit();

// Run the page
$payroll_deductiongroup_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$payroll_deductiongroup_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpayroll_deductiongroupedit = currentForm = new ew.Form("fpayroll_deductiongroupedit", "edit");

// Validate form
fpayroll_deductiongroupedit.validate = function() {
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
		<?php if ($payroll_deductiongroup_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $payroll_deductiongroup->id->caption(), $payroll_deductiongroup->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($payroll_deductiongroup_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $payroll_deductiongroup->name->caption(), $payroll_deductiongroup->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($payroll_deductiongroup_edit->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $payroll_deductiongroup->description->caption(), $payroll_deductiongroup->description->RequiredErrorMessage)) ?>");
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
fpayroll_deductiongroupedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpayroll_deductiongroupedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $payroll_deductiongroup_edit->showPageHeader(); ?>
<?php
$payroll_deductiongroup_edit->showMessage();
?>
<form name="fpayroll_deductiongroupedit" id="fpayroll_deductiongroupedit" class="<?php echo $payroll_deductiongroup_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($payroll_deductiongroup_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $payroll_deductiongroup_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="payroll_deductiongroup">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$payroll_deductiongroup_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($payroll_deductiongroup->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_payroll_deductiongroup_id" class="<?php echo $payroll_deductiongroup_edit->LeftColumnClass ?>"><?php echo $payroll_deductiongroup->id->caption() ?><?php echo ($payroll_deductiongroup->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $payroll_deductiongroup_edit->RightColumnClass ?>"><div<?php echo $payroll_deductiongroup->id->cellAttributes() ?>>
<span id="el_payroll_deductiongroup_id">
<span<?php echo $payroll_deductiongroup->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($payroll_deductiongroup->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="payroll_deductiongroup" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($payroll_deductiongroup->id->CurrentValue) ?>">
<?php echo $payroll_deductiongroup->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($payroll_deductiongroup->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_payroll_deductiongroup_name" for="x_name" class="<?php echo $payroll_deductiongroup_edit->LeftColumnClass ?>"><?php echo $payroll_deductiongroup->name->caption() ?><?php echo ($payroll_deductiongroup->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $payroll_deductiongroup_edit->RightColumnClass ?>"><div<?php echo $payroll_deductiongroup->name->cellAttributes() ?>>
<span id="el_payroll_deductiongroup_name">
<input type="text" data-table="payroll_deductiongroup" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($payroll_deductiongroup->name->getPlaceHolder()) ?>" value="<?php echo $payroll_deductiongroup->name->EditValue ?>"<?php echo $payroll_deductiongroup->name->editAttributes() ?>>
</span>
<?php echo $payroll_deductiongroup->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($payroll_deductiongroup->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_payroll_deductiongroup_description" for="x_description" class="<?php echo $payroll_deductiongroup_edit->LeftColumnClass ?>"><?php echo $payroll_deductiongroup->description->caption() ?><?php echo ($payroll_deductiongroup->description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $payroll_deductiongroup_edit->RightColumnClass ?>"><div<?php echo $payroll_deductiongroup->description->cellAttributes() ?>>
<span id="el_payroll_deductiongroup_description">
<input type="text" data-table="payroll_deductiongroup" data-field="x_description" name="x_description" id="x_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($payroll_deductiongroup->description->getPlaceHolder()) ?>" value="<?php echo $payroll_deductiongroup->description->EditValue ?>"<?php echo $payroll_deductiongroup->description->editAttributes() ?>>
</span>
<?php echo $payroll_deductiongroup->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$payroll_deductiongroup_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $payroll_deductiongroup_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $payroll_deductiongroup_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$payroll_deductiongroup_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$payroll_deductiongroup_edit->terminate();
?>