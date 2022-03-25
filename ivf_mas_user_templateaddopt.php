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
$ivf_mas_user_template_addopt = new ivf_mas_user_template_addopt();

// Run the page
$ivf_mas_user_template_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_mas_user_template_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fivf_mas_user_templateaddopt = currentForm = new ew.Form("fivf_mas_user_templateaddopt", "addopt");

// Validate form
fivf_mas_user_templateaddopt.validate = function() {
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
		<?php if ($ivf_mas_user_template_addopt->TemplateName->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_user_template->TemplateName->caption(), $ivf_mas_user_template->TemplateName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_mas_user_template_addopt->TemplateType->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_user_template->TemplateType->caption(), $ivf_mas_user_template->TemplateType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_mas_user_template_addopt->Template->Required) { ?>
			elm = this.getElements("x" + infix + "_Template");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_user_template->Template->caption(), $ivf_mas_user_template->Template->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_mas_user_template_addopt->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_user_template->created->caption(), $ivf_mas_user_template->created->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_mas_user_template_addopt->createdDatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createdDatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_user_template->createdDatetime->caption(), $ivf_mas_user_template->createdDatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_mas_user_template_addopt->modified->Required) { ?>
			elm = this.getElements("x" + infix + "_modified");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_user_template->modified->caption(), $ivf_mas_user_template->modified->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_mas_user_template_addopt->modifiedDatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedDatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_user_template->modifiedDatetime->caption(), $ivf_mas_user_template->modifiedDatetime->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fivf_mas_user_templateaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_mas_user_templateaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_mas_user_templateaddopt.lists["x_TemplateType"] = <?php echo $ivf_mas_user_template_addopt->TemplateType->Lookup->toClientList() ?>;
fivf_mas_user_templateaddopt.lists["x_TemplateType"].options = <?php echo JsonEncode($ivf_mas_user_template_addopt->TemplateType->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_mas_user_template_addopt->showPageHeader(); ?>
<?php
$ivf_mas_user_template_addopt->showMessage();
?>
<form name="fivf_mas_user_templateaddopt" id="fivf_mas_user_templateaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($ivf_mas_user_template_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_mas_user_template_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $ivf_mas_user_template_addopt->TableVar ?>">
<?php if ($ivf_mas_user_template->TemplateName->Visible) { // TemplateName ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TemplateName"><?php echo $ivf_mas_user_template->TemplateName->caption() ?><?php echo ($ivf_mas_user_template->TemplateName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_mas_user_template" data-field="x_TemplateName" name="x_TemplateName" id="x_TemplateName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_mas_user_template->TemplateName->getPlaceHolder()) ?>" value="<?php echo $ivf_mas_user_template->TemplateName->EditValue ?>"<?php echo $ivf_mas_user_template->TemplateName->editAttributes() ?>>
<?php echo $ivf_mas_user_template->TemplateName->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($ivf_mas_user_template->TemplateType->Visible) { // TemplateType ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TemplateType"><?php echo $ivf_mas_user_template->TemplateType->caption() ?><?php echo ($ivf_mas_user_template->TemplateType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_mas_user_template" data-field="x_TemplateType" data-value-separator="<?php echo $ivf_mas_user_template->TemplateType->displayValueSeparatorAttribute() ?>" id="x_TemplateType" name="x_TemplateType"<?php echo $ivf_mas_user_template->TemplateType->editAttributes() ?>>
		<?php echo $ivf_mas_user_template->TemplateType->selectOptionListHtml("x_TemplateType") ?>
	</select>
</div>
<?php echo $ivf_mas_user_template->TemplateType->Lookup->getParamTag("p_x_TemplateType") ?>
<?php echo $ivf_mas_user_template->TemplateType->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($ivf_mas_user_template->Template->Visible) { // Template ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Template"><?php echo $ivf_mas_user_template->Template->caption() ?><?php echo ($ivf_mas_user_template->Template->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<textarea data-table="ivf_mas_user_template" data-field="x_Template" name="x_Template" id="x_Template" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_mas_user_template->Template->getPlaceHolder()) ?>"<?php echo $ivf_mas_user_template->Template->editAttributes() ?>><?php echo $ivf_mas_user_template->Template->EditValue ?></textarea>
<?php echo $ivf_mas_user_template->Template->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($ivf_mas_user_template->created->Visible) { // created ?>
	<input type="hidden" data-table="ivf_mas_user_template" data-field="x_created" name="x_created" id="x_created" value="<?php echo HtmlEncode($ivf_mas_user_template->created->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_mas_user_template->createdDatetime->Visible) { // createdDatetime ?>
	<input type="hidden" data-table="ivf_mas_user_template" data-field="x_createdDatetime" name="x_createdDatetime" id="x_createdDatetime" value="<?php echo HtmlEncode($ivf_mas_user_template->createdDatetime->CurrentValue) ?>">
	<?php if (!$ivf_mas_user_template->createdDatetime->ReadOnly && !$ivf_mas_user_template->createdDatetime->Disabled && !isset($ivf_mas_user_template->createdDatetime->EditAttrs["readonly"]) && !isset($ivf_mas_user_template->createdDatetime->EditAttrs["disabled"])) { ?>
	<script>
	ew.createDateTimePicker("fivf_mas_user_templateaddopt", "x_createdDatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
	</script>
	<?php } ?>
<?php } ?>
<?php if ($ivf_mas_user_template->modified->Visible) { // modified ?>
	<input type="hidden" data-table="ivf_mas_user_template" data-field="x_modified" name="x_modified" id="x_modified" value="<?php echo HtmlEncode($ivf_mas_user_template->modified->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_mas_user_template->modifiedDatetime->Visible) { // modifiedDatetime ?>
	<input type="hidden" data-table="ivf_mas_user_template" data-field="x_modifiedDatetime" name="x_modifiedDatetime" id="x_modifiedDatetime" value="<?php echo HtmlEncode($ivf_mas_user_template->modifiedDatetime->CurrentValue) ?>">
	<?php if (!$ivf_mas_user_template->modifiedDatetime->ReadOnly && !$ivf_mas_user_template->modifiedDatetime->Disabled && !isset($ivf_mas_user_template->modifiedDatetime->EditAttrs["readonly"]) && !isset($ivf_mas_user_template->modifiedDatetime->EditAttrs["disabled"])) { ?>
	<script>
	ew.createDateTimePicker("fivf_mas_user_templateaddopt", "x_modifiedDatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
	</script>
	<?php } ?>
<?php } ?>
</form>
<?php
$ivf_mas_user_template_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$ivf_mas_user_template_addopt->terminate();
?>