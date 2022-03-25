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
$hr_paygrades_add = new hr_paygrades_add();

// Run the page
$hr_paygrades_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_paygrades_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fhr_paygradesadd = currentForm = new ew.Form("fhr_paygradesadd", "add");

// Validate form
fhr_paygradesadd.validate = function() {
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
		<?php if ($hr_paygrades_add->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_paygrades->name->caption(), $hr_paygrades->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_paygrades_add->currency->Required) { ?>
			elm = this.getElements("x" + infix + "_currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_paygrades->currency->caption(), $hr_paygrades->currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_paygrades_add->min_salary->Required) { ?>
			elm = this.getElements("x" + infix + "_min_salary");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_paygrades->min_salary->caption(), $hr_paygrades->min_salary->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_min_salary");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_paygrades->min_salary->errorMessage()) ?>");
		<?php if ($hr_paygrades_add->max_salary->Required) { ?>
			elm = this.getElements("x" + infix + "_max_salary");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_paygrades->max_salary->caption(), $hr_paygrades->max_salary->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_max_salary");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_paygrades->max_salary->errorMessage()) ?>");
		<?php if ($hr_paygrades_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_paygrades->HospID->caption(), $hr_paygrades->HospID->RequiredErrorMessage)) ?>");
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
fhr_paygradesadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_paygradesadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_paygrades_add->showPageHeader(); ?>
<?php
$hr_paygrades_add->showMessage();
?>
<form name="fhr_paygradesadd" id="fhr_paygradesadd" class="<?php echo $hr_paygrades_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_paygrades_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_paygrades_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_paygrades">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$hr_paygrades_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($hr_paygrades->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_paygrades_name" for="x_name" class="<?php echo $hr_paygrades_add->LeftColumnClass ?>"><?php echo $hr_paygrades->name->caption() ?><?php echo ($hr_paygrades->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_paygrades_add->RightColumnClass ?>"><div<?php echo $hr_paygrades->name->cellAttributes() ?>>
<span id="el_hr_paygrades_name">
<input type="text" data-table="hr_paygrades" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hr_paygrades->name->getPlaceHolder()) ?>" value="<?php echo $hr_paygrades->name->EditValue ?>"<?php echo $hr_paygrades->name->editAttributes() ?>>
</span>
<?php echo $hr_paygrades->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_paygrades->currency->Visible) { // currency ?>
	<div id="r_currency" class="form-group row">
		<label id="elh_hr_paygrades_currency" for="x_currency" class="<?php echo $hr_paygrades_add->LeftColumnClass ?>"><?php echo $hr_paygrades->currency->caption() ?><?php echo ($hr_paygrades->currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_paygrades_add->RightColumnClass ?>"><div<?php echo $hr_paygrades->currency->cellAttributes() ?>>
<span id="el_hr_paygrades_currency">
<input type="text" data-table="hr_paygrades" data-field="x_currency" name="x_currency" id="x_currency" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($hr_paygrades->currency->getPlaceHolder()) ?>" value="<?php echo $hr_paygrades->currency->EditValue ?>"<?php echo $hr_paygrades->currency->editAttributes() ?>>
</span>
<?php echo $hr_paygrades->currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_paygrades->min_salary->Visible) { // min_salary ?>
	<div id="r_min_salary" class="form-group row">
		<label id="elh_hr_paygrades_min_salary" for="x_min_salary" class="<?php echo $hr_paygrades_add->LeftColumnClass ?>"><?php echo $hr_paygrades->min_salary->caption() ?><?php echo ($hr_paygrades->min_salary->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_paygrades_add->RightColumnClass ?>"><div<?php echo $hr_paygrades->min_salary->cellAttributes() ?>>
<span id="el_hr_paygrades_min_salary">
<input type="text" data-table="hr_paygrades" data-field="x_min_salary" name="x_min_salary" id="x_min_salary" size="30" placeholder="<?php echo HtmlEncode($hr_paygrades->min_salary->getPlaceHolder()) ?>" value="<?php echo $hr_paygrades->min_salary->EditValue ?>"<?php echo $hr_paygrades->min_salary->editAttributes() ?>>
</span>
<?php echo $hr_paygrades->min_salary->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_paygrades->max_salary->Visible) { // max_salary ?>
	<div id="r_max_salary" class="form-group row">
		<label id="elh_hr_paygrades_max_salary" for="x_max_salary" class="<?php echo $hr_paygrades_add->LeftColumnClass ?>"><?php echo $hr_paygrades->max_salary->caption() ?><?php echo ($hr_paygrades->max_salary->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_paygrades_add->RightColumnClass ?>"><div<?php echo $hr_paygrades->max_salary->cellAttributes() ?>>
<span id="el_hr_paygrades_max_salary">
<input type="text" data-table="hr_paygrades" data-field="x_max_salary" name="x_max_salary" id="x_max_salary" size="30" placeholder="<?php echo HtmlEncode($hr_paygrades->max_salary->getPlaceHolder()) ?>" value="<?php echo $hr_paygrades->max_salary->EditValue ?>"<?php echo $hr_paygrades->max_salary->editAttributes() ?>>
</span>
<?php echo $hr_paygrades->max_salary->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_paygrades_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_paygrades_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_paygrades_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_paygrades_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_paygrades_add->terminate();
?>