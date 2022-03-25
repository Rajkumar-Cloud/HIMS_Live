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
$mas_user_template_addopt = new mas_user_template_addopt();

// Run the page
$mas_user_template_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_user_template_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fmas_user_templateaddopt = currentForm = new ew.Form("fmas_user_templateaddopt", "addopt");

// Validate form
fmas_user_templateaddopt.validate = function() {
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
		<?php if ($mas_user_template_addopt->TemplateName->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template->TemplateName->caption(), $mas_user_template->TemplateName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_addopt->TemplateType->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template->TemplateType->caption(), $mas_user_template->TemplateType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_addopt->Template->Required) { ?>
			elm = this.getElements("x" + infix + "_Template");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template->Template->caption(), $mas_user_template->Template->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_addopt->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template->created->caption(), $mas_user_template->created->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_addopt->createdDatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createdDatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template->createdDatetime->caption(), $mas_user_template->createdDatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_addopt->modified->Required) { ?>
			elm = this.getElements("x" + infix + "_modified");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template->modified->caption(), $mas_user_template->modified->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_addopt->modifiedDatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedDatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template->modifiedDatetime->caption(), $mas_user_template->modifiedDatetime->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fmas_user_templateaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_user_templateaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_user_templateaddopt.lists["x_TemplateType"] = <?php echo $mas_user_template_addopt->TemplateType->Lookup->toClientList() ?>;
fmas_user_templateaddopt.lists["x_TemplateType"].options = <?php echo JsonEncode($mas_user_template_addopt->TemplateType->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_user_template_addopt->showPageHeader(); ?>
<?php
$mas_user_template_addopt->showMessage();
?>
<form name="fmas_user_templateaddopt" id="fmas_user_templateaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($mas_user_template_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_user_template_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $mas_user_template_addopt->TableVar ?>">
<?php if ($mas_user_template->TemplateName->Visible) { // TemplateName ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TemplateName"><?php echo $mas_user_template->TemplateName->caption() ?><?php echo ($mas_user_template->TemplateName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="mas_user_template" data-field="x_TemplateName" name="x_TemplateName" id="x_TemplateName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_user_template->TemplateName->getPlaceHolder()) ?>" value="<?php echo $mas_user_template->TemplateName->EditValue ?>"<?php echo $mas_user_template->TemplateName->editAttributes() ?>>
<?php echo $mas_user_template->TemplateName->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($mas_user_template->TemplateType->Visible) { // TemplateType ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TemplateType"><?php echo $mas_user_template->TemplateType->caption() ?><?php echo ($mas_user_template->TemplateType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_user_template" data-field="x_TemplateType" data-value-separator="<?php echo $mas_user_template->TemplateType->displayValueSeparatorAttribute() ?>" id="x_TemplateType" name="x_TemplateType"<?php echo $mas_user_template->TemplateType->editAttributes() ?>>
		<?php echo $mas_user_template->TemplateType->selectOptionListHtml("x_TemplateType") ?>
	</select>
</div>
<?php echo $mas_user_template->TemplateType->Lookup->getParamTag("p_x_TemplateType") ?>
<?php echo $mas_user_template->TemplateType->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($mas_user_template->Template->Visible) { // Template ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $mas_user_template->Template->caption() ?><?php echo ($mas_user_template->Template->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php AppendClass($mas_user_template->Template->EditAttrs["class"], "editor"); ?>
<textarea data-table="mas_user_template" data-field="x_Template" name="x_Template" id="x_Template" cols="35" rows="25" placeholder="<?php echo HtmlEncode($mas_user_template->Template->getPlaceHolder()) ?>"<?php echo $mas_user_template->Template->editAttributes() ?>><?php echo $mas_user_template->Template->EditValue ?></textarea>
<script>
ew.createEditor("fmas_user_templateaddopt", "x_Template", 35, 25, <?php echo ($mas_user_template->Template->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $mas_user_template->Template->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($mas_user_template->created->Visible) { // created ?>
	<input type="hidden" data-table="mas_user_template" data-field="x_created" name="x_created" id="x_created" value="<?php echo HtmlEncode($mas_user_template->created->CurrentValue) ?>">
<?php } ?>
<?php if ($mas_user_template->createdDatetime->Visible) { // createdDatetime ?>
	<input type="hidden" data-table="mas_user_template" data-field="x_createdDatetime" name="x_createdDatetime" id="x_createdDatetime" value="<?php echo HtmlEncode($mas_user_template->createdDatetime->CurrentValue) ?>">
	<?php if (!$mas_user_template->createdDatetime->ReadOnly && !$mas_user_template->createdDatetime->Disabled && !isset($mas_user_template->createdDatetime->EditAttrs["readonly"]) && !isset($mas_user_template->createdDatetime->EditAttrs["disabled"])) { ?>
	<script>
	ew.createDateTimePicker("fmas_user_templateaddopt", "x_createdDatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
	</script>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template->modified->Visible) { // modified ?>
	<input type="hidden" data-table="mas_user_template" data-field="x_modified" name="x_modified" id="x_modified" value="<?php echo HtmlEncode($mas_user_template->modified->CurrentValue) ?>">
<?php } ?>
<?php if ($mas_user_template->modifiedDatetime->Visible) { // modifiedDatetime ?>
	<input type="hidden" data-table="mas_user_template" data-field="x_modifiedDatetime" name="x_modifiedDatetime" id="x_modifiedDatetime" value="<?php echo HtmlEncode($mas_user_template->modifiedDatetime->CurrentValue) ?>">
	<?php if (!$mas_user_template->modifiedDatetime->ReadOnly && !$mas_user_template->modifiedDatetime->Disabled && !isset($mas_user_template->modifiedDatetime->EditAttrs["readonly"]) && !isset($mas_user_template->modifiedDatetime->EditAttrs["disabled"])) { ?>
	<script>
	ew.createDateTimePicker("fmas_user_templateaddopt", "x_modifiedDatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
	</script>
	<?php } ?>
<?php } ?>
</form>
<?php
$mas_user_template_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$mas_user_template_addopt->terminate();
?>