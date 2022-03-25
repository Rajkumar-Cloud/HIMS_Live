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
$hr_expensespaymentmethods_add = new hr_expensespaymentmethods_add();

// Run the page
$hr_expensespaymentmethods_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_expensespaymentmethods_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fhr_expensespaymentmethodsadd = currentForm = new ew.Form("fhr_expensespaymentmethodsadd", "add");

// Validate form
fhr_expensespaymentmethodsadd.validate = function() {
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
		<?php if ($hr_expensespaymentmethods_add->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_expensespaymentmethods->name->caption(), $hr_expensespaymentmethods->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_expensespaymentmethods_add->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_expensespaymentmethods->created->caption(), $hr_expensespaymentmethods->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_expensespaymentmethods->created->errorMessage()) ?>");
		<?php if ($hr_expensespaymentmethods_add->updated->Required) { ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_expensespaymentmethods->updated->caption(), $hr_expensespaymentmethods->updated->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_expensespaymentmethods->updated->errorMessage()) ?>");
		<?php if ($hr_expensespaymentmethods_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_expensespaymentmethods->HospID->caption(), $hr_expensespaymentmethods->HospID->RequiredErrorMessage)) ?>");
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
fhr_expensespaymentmethodsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_expensespaymentmethodsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_expensespaymentmethods_add->showPageHeader(); ?>
<?php
$hr_expensespaymentmethods_add->showMessage();
?>
<form name="fhr_expensespaymentmethodsadd" id="fhr_expensespaymentmethodsadd" class="<?php echo $hr_expensespaymentmethods_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_expensespaymentmethods_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_expensespaymentmethods_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_expensespaymentmethods">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$hr_expensespaymentmethods_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($hr_expensespaymentmethods->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_expensespaymentmethods_name" for="x_name" class="<?php echo $hr_expensespaymentmethods_add->LeftColumnClass ?>"><?php echo $hr_expensespaymentmethods->name->caption() ?><?php echo ($hr_expensespaymentmethods->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_expensespaymentmethods_add->RightColumnClass ?>"><div<?php echo $hr_expensespaymentmethods->name->cellAttributes() ?>>
<span id="el_hr_expensespaymentmethods_name">
<textarea data-table="hr_expensespaymentmethods" data-field="x_name" name="x_name" id="x_name" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_expensespaymentmethods->name->getPlaceHolder()) ?>"<?php echo $hr_expensespaymentmethods->name->editAttributes() ?>><?php echo $hr_expensespaymentmethods->name->EditValue ?></textarea>
</span>
<?php echo $hr_expensespaymentmethods->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_expensespaymentmethods->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_hr_expensespaymentmethods_created" for="x_created" class="<?php echo $hr_expensespaymentmethods_add->LeftColumnClass ?>"><?php echo $hr_expensespaymentmethods->created->caption() ?><?php echo ($hr_expensespaymentmethods->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_expensespaymentmethods_add->RightColumnClass ?>"><div<?php echo $hr_expensespaymentmethods->created->cellAttributes() ?>>
<span id="el_hr_expensespaymentmethods_created">
<input type="text" data-table="hr_expensespaymentmethods" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($hr_expensespaymentmethods->created->getPlaceHolder()) ?>" value="<?php echo $hr_expensespaymentmethods->created->EditValue ?>"<?php echo $hr_expensespaymentmethods->created->editAttributes() ?>>
<?php if (!$hr_expensespaymentmethods->created->ReadOnly && !$hr_expensespaymentmethods->created->Disabled && !isset($hr_expensespaymentmethods->created->EditAttrs["readonly"]) && !isset($hr_expensespaymentmethods->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_expensespaymentmethodsadd", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_expensespaymentmethods->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_expensespaymentmethods->updated->Visible) { // updated ?>
	<div id="r_updated" class="form-group row">
		<label id="elh_hr_expensespaymentmethods_updated" for="x_updated" class="<?php echo $hr_expensespaymentmethods_add->LeftColumnClass ?>"><?php echo $hr_expensespaymentmethods->updated->caption() ?><?php echo ($hr_expensespaymentmethods->updated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_expensespaymentmethods_add->RightColumnClass ?>"><div<?php echo $hr_expensespaymentmethods->updated->cellAttributes() ?>>
<span id="el_hr_expensespaymentmethods_updated">
<input type="text" data-table="hr_expensespaymentmethods" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?php echo HtmlEncode($hr_expensespaymentmethods->updated->getPlaceHolder()) ?>" value="<?php echo $hr_expensespaymentmethods->updated->EditValue ?>"<?php echo $hr_expensespaymentmethods->updated->editAttributes() ?>>
<?php if (!$hr_expensespaymentmethods->updated->ReadOnly && !$hr_expensespaymentmethods->updated->Disabled && !isset($hr_expensespaymentmethods->updated->EditAttrs["readonly"]) && !isset($hr_expensespaymentmethods->updated->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_expensespaymentmethodsadd", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_expensespaymentmethods->updated->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_expensespaymentmethods_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_expensespaymentmethods_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_expensespaymentmethods_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_expensespaymentmethods_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_expensespaymentmethods_add->terminate();
?>