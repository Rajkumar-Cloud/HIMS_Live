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
$hr_holidays_add = new hr_holidays_add();

// Run the page
$hr_holidays_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_holidays_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fhr_holidaysadd = currentForm = new ew.Form("fhr_holidaysadd", "add");

// Validate form
fhr_holidaysadd.validate = function() {
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
		<?php if ($hr_holidays_add->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_holidays->name->caption(), $hr_holidays->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_holidays_add->dateh->Required) { ?>
			elm = this.getElements("x" + infix + "_dateh");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_holidays->dateh->caption(), $hr_holidays->dateh->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_dateh");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_holidays->dateh->errorMessage()) ?>");
		<?php if ($hr_holidays_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_holidays->status->caption(), $hr_holidays->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_holidays_add->country->Required) { ?>
			elm = this.getElements("x" + infix + "_country");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_holidays->country->caption(), $hr_holidays->country->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_country");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_holidays->country->errorMessage()) ?>");
		<?php if ($hr_holidays_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_holidays->HospID->caption(), $hr_holidays->HospID->RequiredErrorMessage)) ?>");
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
fhr_holidaysadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_holidaysadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_holidaysadd.lists["x_status"] = <?php echo $hr_holidays_add->status->Lookup->toClientList() ?>;
fhr_holidaysadd.lists["x_status"].options = <?php echo JsonEncode($hr_holidays_add->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_holidays_add->showPageHeader(); ?>
<?php
$hr_holidays_add->showMessage();
?>
<form name="fhr_holidaysadd" id="fhr_holidaysadd" class="<?php echo $hr_holidays_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_holidays_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_holidays_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_holidays">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$hr_holidays_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($hr_holidays->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_holidays_name" for="x_name" class="<?php echo $hr_holidays_add->LeftColumnClass ?>"><?php echo $hr_holidays->name->caption() ?><?php echo ($hr_holidays->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_holidays_add->RightColumnClass ?>"><div<?php echo $hr_holidays->name->cellAttributes() ?>>
<span id="el_hr_holidays_name">
<input type="text" data-table="hr_holidays" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hr_holidays->name->getPlaceHolder()) ?>" value="<?php echo $hr_holidays->name->EditValue ?>"<?php echo $hr_holidays->name->editAttributes() ?>>
</span>
<?php echo $hr_holidays->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_holidays->dateh->Visible) { // dateh ?>
	<div id="r_dateh" class="form-group row">
		<label id="elh_hr_holidays_dateh" for="x_dateh" class="<?php echo $hr_holidays_add->LeftColumnClass ?>"><?php echo $hr_holidays->dateh->caption() ?><?php echo ($hr_holidays->dateh->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_holidays_add->RightColumnClass ?>"><div<?php echo $hr_holidays->dateh->cellAttributes() ?>>
<span id="el_hr_holidays_dateh">
<input type="text" data-table="hr_holidays" data-field="x_dateh" name="x_dateh" id="x_dateh" placeholder="<?php echo HtmlEncode($hr_holidays->dateh->getPlaceHolder()) ?>" value="<?php echo $hr_holidays->dateh->EditValue ?>"<?php echo $hr_holidays->dateh->editAttributes() ?>>
<?php if (!$hr_holidays->dateh->ReadOnly && !$hr_holidays->dateh->Disabled && !isset($hr_holidays->dateh->EditAttrs["readonly"]) && !isset($hr_holidays->dateh->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_holidaysadd", "x_dateh", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_holidays->dateh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_holidays->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_hr_holidays_status" class="<?php echo $hr_holidays_add->LeftColumnClass ?>"><?php echo $hr_holidays->status->caption() ?><?php echo ($hr_holidays->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_holidays_add->RightColumnClass ?>"><div<?php echo $hr_holidays->status->cellAttributes() ?>>
<span id="el_hr_holidays_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_holidays" data-field="x_status" data-value-separator="<?php echo $hr_holidays->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $hr_holidays->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_holidays->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $hr_holidays->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_holidays->country->Visible) { // country ?>
	<div id="r_country" class="form-group row">
		<label id="elh_hr_holidays_country" for="x_country" class="<?php echo $hr_holidays_add->LeftColumnClass ?>"><?php echo $hr_holidays->country->caption() ?><?php echo ($hr_holidays->country->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_holidays_add->RightColumnClass ?>"><div<?php echo $hr_holidays->country->cellAttributes() ?>>
<span id="el_hr_holidays_country">
<input type="text" data-table="hr_holidays" data-field="x_country" name="x_country" id="x_country" size="30" placeholder="<?php echo HtmlEncode($hr_holidays->country->getPlaceHolder()) ?>" value="<?php echo $hr_holidays->country->EditValue ?>"<?php echo $hr_holidays->country->editAttributes() ?>>
</span>
<?php echo $hr_holidays->country->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_holidays_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_holidays_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_holidays_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_holidays_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_holidays_add->terminate();
?>