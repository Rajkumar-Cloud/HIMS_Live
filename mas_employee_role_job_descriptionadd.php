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
$mas_employee_role_job_description_add = new mas_employee_role_job_description_add();

// Run the page
$mas_employee_role_job_description_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_employee_role_job_description_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fmas_employee_role_job_descriptionadd = currentForm = new ew.Form("fmas_employee_role_job_descriptionadd", "add");

// Validate form
fmas_employee_role_job_descriptionadd.validate = function() {
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
		<?php if ($mas_employee_role_job_description_add->role->Required) { ?>
			elm = this.getElements("x" + infix + "_role");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_employee_role_job_description->role->caption(), $mas_employee_role_job_description->role->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_employee_role_job_description_add->job_description->Required) { ?>
			elm = this.getElements("x" + infix + "_job_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_employee_role_job_description->job_description->caption(), $mas_employee_role_job_description->job_description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_employee_role_job_description_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_employee_role_job_description->status->caption(), $mas_employee_role_job_description->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_employee_role_job_description_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_employee_role_job_description->createdby->caption(), $mas_employee_role_job_description->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_employee_role_job_description_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_employee_role_job_description->createddatetime->caption(), $mas_employee_role_job_description->createddatetime->RequiredErrorMessage)) ?>");
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
fmas_employee_role_job_descriptionadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_employee_role_job_descriptionadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_employee_role_job_descriptionadd.lists["x_status"] = <?php echo $mas_employee_role_job_description_add->status->Lookup->toClientList() ?>;
fmas_employee_role_job_descriptionadd.lists["x_status"].options = <?php echo JsonEncode($mas_employee_role_job_description_add->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_employee_role_job_description_add->showPageHeader(); ?>
<?php
$mas_employee_role_job_description_add->showMessage();
?>
<form name="fmas_employee_role_job_descriptionadd" id="fmas_employee_role_job_descriptionadd" class="<?php echo $mas_employee_role_job_description_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_employee_role_job_description_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_employee_role_job_description_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_employee_role_job_description">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$mas_employee_role_job_description_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($mas_employee_role_job_description->role->Visible) { // role ?>
	<div id="r_role" class="form-group row">
		<label id="elh_mas_employee_role_job_description_role" for="x_role" class="<?php echo $mas_employee_role_job_description_add->LeftColumnClass ?>"><?php echo $mas_employee_role_job_description->role->caption() ?><?php echo ($mas_employee_role_job_description->role->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_employee_role_job_description_add->RightColumnClass ?>"><div<?php echo $mas_employee_role_job_description->role->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_role">
<input type="text" data-table="mas_employee_role_job_description" data-field="x_role" name="x_role" id="x_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($mas_employee_role_job_description->role->getPlaceHolder()) ?>" value="<?php echo $mas_employee_role_job_description->role->EditValue ?>"<?php echo $mas_employee_role_job_description->role->editAttributes() ?>>
</span>
<?php echo $mas_employee_role_job_description->role->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_employee_role_job_description->job_description->Visible) { // job_description ?>
	<div id="r_job_description" class="form-group row">
		<label id="elh_mas_employee_role_job_description_job_description" for="x_job_description" class="<?php echo $mas_employee_role_job_description_add->LeftColumnClass ?>"><?php echo $mas_employee_role_job_description->job_description->caption() ?><?php echo ($mas_employee_role_job_description->job_description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_employee_role_job_description_add->RightColumnClass ?>"><div<?php echo $mas_employee_role_job_description->job_description->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_job_description">
<input type="text" data-table="mas_employee_role_job_description" data-field="x_job_description" name="x_job_description" id="x_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($mas_employee_role_job_description->job_description->getPlaceHolder()) ?>" value="<?php echo $mas_employee_role_job_description->job_description->EditValue ?>"<?php echo $mas_employee_role_job_description->job_description->editAttributes() ?>>
</span>
<?php echo $mas_employee_role_job_description->job_description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_employee_role_job_description->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_mas_employee_role_job_description_status" for="x_status" class="<?php echo $mas_employee_role_job_description_add->LeftColumnClass ?>"><?php echo $mas_employee_role_job_description->status->caption() ?><?php echo ($mas_employee_role_job_description->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_employee_role_job_description_add->RightColumnClass ?>"><div<?php echo $mas_employee_role_job_description->status->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_employee_role_job_description" data-field="x_status" data-value-separator="<?php echo $mas_employee_role_job_description->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $mas_employee_role_job_description->status->editAttributes() ?>>
		<?php echo $mas_employee_role_job_description->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $mas_employee_role_job_description->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $mas_employee_role_job_description->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_employee_role_job_description_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_employee_role_job_description_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_employee_role_job_description_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_employee_role_job_description_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_employee_role_job_description_add->terminate();
?>