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
$hr_expensescategories_add = new hr_expensescategories_add();

// Run the page
$hr_expensescategories_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_expensescategories_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fhr_expensescategoriesadd = currentForm = new ew.Form("fhr_expensescategoriesadd", "add");

// Validate form
fhr_expensescategoriesadd.validate = function() {
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
		<?php if ($hr_expensescategories_add->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_expensescategories->name->caption(), $hr_expensescategories->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_expensescategories_add->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_expensescategories->created->caption(), $hr_expensescategories->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_expensescategories->created->errorMessage()) ?>");
		<?php if ($hr_expensescategories_add->updated->Required) { ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_expensescategories->updated->caption(), $hr_expensescategories->updated->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_expensescategories->updated->errorMessage()) ?>");
		<?php if ($hr_expensescategories_add->pre_approve->Required) { ?>
			elm = this.getElements("x" + infix + "_pre_approve");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_expensescategories->pre_approve->caption(), $hr_expensescategories->pre_approve->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_expensescategories_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_expensescategories->HospID->caption(), $hr_expensescategories->HospID->RequiredErrorMessage)) ?>");
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
fhr_expensescategoriesadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_expensescategoriesadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_expensescategoriesadd.lists["x_pre_approve"] = <?php echo $hr_expensescategories_add->pre_approve->Lookup->toClientList() ?>;
fhr_expensescategoriesadd.lists["x_pre_approve"].options = <?php echo JsonEncode($hr_expensescategories_add->pre_approve->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_expensescategories_add->showPageHeader(); ?>
<?php
$hr_expensescategories_add->showMessage();
?>
<form name="fhr_expensescategoriesadd" id="fhr_expensescategoriesadd" class="<?php echo $hr_expensescategories_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_expensescategories_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_expensescategories_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_expensescategories">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$hr_expensescategories_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($hr_expensescategories->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_expensescategories_name" for="x_name" class="<?php echo $hr_expensescategories_add->LeftColumnClass ?>"><?php echo $hr_expensescategories->name->caption() ?><?php echo ($hr_expensescategories->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_expensescategories_add->RightColumnClass ?>"><div<?php echo $hr_expensescategories->name->cellAttributes() ?>>
<span id="el_hr_expensescategories_name">
<textarea data-table="hr_expensescategories" data-field="x_name" name="x_name" id="x_name" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_expensescategories->name->getPlaceHolder()) ?>"<?php echo $hr_expensescategories->name->editAttributes() ?>><?php echo $hr_expensescategories->name->EditValue ?></textarea>
</span>
<?php echo $hr_expensescategories->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_expensescategories->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_hr_expensescategories_created" for="x_created" class="<?php echo $hr_expensescategories_add->LeftColumnClass ?>"><?php echo $hr_expensescategories->created->caption() ?><?php echo ($hr_expensescategories->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_expensescategories_add->RightColumnClass ?>"><div<?php echo $hr_expensescategories->created->cellAttributes() ?>>
<span id="el_hr_expensescategories_created">
<input type="text" data-table="hr_expensescategories" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($hr_expensescategories->created->getPlaceHolder()) ?>" value="<?php echo $hr_expensescategories->created->EditValue ?>"<?php echo $hr_expensescategories->created->editAttributes() ?>>
<?php if (!$hr_expensescategories->created->ReadOnly && !$hr_expensescategories->created->Disabled && !isset($hr_expensescategories->created->EditAttrs["readonly"]) && !isset($hr_expensescategories->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_expensescategoriesadd", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_expensescategories->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_expensescategories->updated->Visible) { // updated ?>
	<div id="r_updated" class="form-group row">
		<label id="elh_hr_expensescategories_updated" for="x_updated" class="<?php echo $hr_expensescategories_add->LeftColumnClass ?>"><?php echo $hr_expensescategories->updated->caption() ?><?php echo ($hr_expensescategories->updated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_expensescategories_add->RightColumnClass ?>"><div<?php echo $hr_expensescategories->updated->cellAttributes() ?>>
<span id="el_hr_expensescategories_updated">
<input type="text" data-table="hr_expensescategories" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?php echo HtmlEncode($hr_expensescategories->updated->getPlaceHolder()) ?>" value="<?php echo $hr_expensescategories->updated->EditValue ?>"<?php echo $hr_expensescategories->updated->editAttributes() ?>>
<?php if (!$hr_expensescategories->updated->ReadOnly && !$hr_expensescategories->updated->Disabled && !isset($hr_expensescategories->updated->EditAttrs["readonly"]) && !isset($hr_expensescategories->updated->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_expensescategoriesadd", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_expensescategories->updated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_expensescategories->pre_approve->Visible) { // pre_approve ?>
	<div id="r_pre_approve" class="form-group row">
		<label id="elh_hr_expensescategories_pre_approve" class="<?php echo $hr_expensescategories_add->LeftColumnClass ?>"><?php echo $hr_expensescategories->pre_approve->caption() ?><?php echo ($hr_expensescategories->pre_approve->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_expensescategories_add->RightColumnClass ?>"><div<?php echo $hr_expensescategories->pre_approve->cellAttributes() ?>>
<span id="el_hr_expensescategories_pre_approve">
<div id="tp_x_pre_approve" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_expensescategories" data-field="x_pre_approve" data-value-separator="<?php echo $hr_expensescategories->pre_approve->displayValueSeparatorAttribute() ?>" name="x_pre_approve" id="x_pre_approve" value="{value}"<?php echo $hr_expensescategories->pre_approve->editAttributes() ?>></div>
<div id="dsl_x_pre_approve" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_expensescategories->pre_approve->radioButtonListHtml(FALSE, "x_pre_approve") ?>
</div></div>
</span>
<?php echo $hr_expensescategories->pre_approve->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_expensescategories_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_expensescategories_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_expensescategories_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_expensescategories_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_expensescategories_add->terminate();
?>