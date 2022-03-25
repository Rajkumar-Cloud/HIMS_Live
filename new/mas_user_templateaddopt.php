<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
var fmas_user_templateaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fmas_user_templateaddopt = currentForm = new ew.Form("fmas_user_templateaddopt", "addopt");

	// Validate form
	fmas_user_templateaddopt.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
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
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_addopt->TemplateName->caption(), $mas_user_template_addopt->TemplateName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_addopt->TemplateType->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_addopt->TemplateType->caption(), $mas_user_template_addopt->TemplateType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_addopt->Template->Required) { ?>
				elm = this.getElements("x" + infix + "_Template");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_addopt->Template->caption(), $mas_user_template_addopt->Template->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_addopt->created->Required) { ?>
				elm = this.getElements("x" + infix + "_created");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_addopt->created->caption(), $mas_user_template_addopt->created->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_addopt->createdDatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createdDatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_addopt->createdDatetime->caption(), $mas_user_template_addopt->createdDatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_addopt->modified->Required) { ?>
				elm = this.getElements("x" + infix + "_modified");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_addopt->modified->caption(), $mas_user_template_addopt->modified->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_addopt->modifiedDatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedDatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_addopt->modifiedDatetime->caption(), $mas_user_template_addopt->modifiedDatetime->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fmas_user_templateaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_user_templateaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmas_user_templateaddopt.lists["x_TemplateType"] = <?php echo $mas_user_template_addopt->TemplateType->Lookup->toClientList($mas_user_template_addopt) ?>;
	fmas_user_templateaddopt.lists["x_TemplateType"].options = <?php echo JsonEncode($mas_user_template_addopt->TemplateType->lookupOptions()) ?>;
	loadjs.done("fmas_user_templateaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_user_template_addopt->showPageHeader(); ?>
<?php
$mas_user_template_addopt->showMessage();
?>
<form name="fmas_user_templateaddopt" id="fmas_user_templateaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $mas_user_template_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($mas_user_template_addopt->TemplateName->Visible) { // TemplateName ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TemplateName"><?php echo $mas_user_template_addopt->TemplateName->caption() ?><?php echo $mas_user_template_addopt->TemplateName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="mas_user_template" data-field="x_TemplateName" name="x_TemplateName" id="x_TemplateName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_user_template_addopt->TemplateName->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_addopt->TemplateName->EditValue ?>"<?php echo $mas_user_template_addopt->TemplateName->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($mas_user_template_addopt->TemplateType->Visible) { // TemplateType ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TemplateType"><?php echo $mas_user_template_addopt->TemplateType->caption() ?><?php echo $mas_user_template_addopt->TemplateType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_user_template" data-field="x_TemplateType" data-value-separator="<?php echo $mas_user_template_addopt->TemplateType->displayValueSeparatorAttribute() ?>" id="x_TemplateType" name="x_TemplateType"<?php echo $mas_user_template_addopt->TemplateType->editAttributes() ?>>
			<?php echo $mas_user_template_addopt->TemplateType->selectOptionListHtml("x_TemplateType") ?>
		</select>
</div>
<?php echo $mas_user_template_addopt->TemplateType->Lookup->getParamTag($mas_user_template_addopt, "p_x_TemplateType") ?>
</div>
	</div>
<?php } ?>
<?php if ($mas_user_template_addopt->Template->Visible) { // Template ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $mas_user_template_addopt->Template->caption() ?><?php echo $mas_user_template_addopt->Template->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php $mas_user_template_addopt->Template->EditAttrs->appendClass("editor"); ?>
<textarea data-table="mas_user_template" data-field="x_Template" name="x_Template" id="x_Template" cols="35" rows="25" placeholder="<?php echo HtmlEncode($mas_user_template_addopt->Template->getPlaceHolder()) ?>"<?php echo $mas_user_template_addopt->Template->editAttributes() ?>><?php echo $mas_user_template_addopt->Template->EditValue ?></textarea>
<script>
loadjs.ready(["fmas_user_templateaddopt", "editor"], function() {
	ew.createEditor("fmas_user_templateaddopt", "x_Template", 35, 25, <?php echo $mas_user_template_addopt->Template->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
</div>
	</div>
<?php } ?>
<?php if ($mas_user_template_addopt->created->Visible) { // created ?>
	<input type="hidden" data-table="mas_user_template" data-field="x_created" name="x_created" id="x_created" value="<?php echo HtmlEncode($mas_user_template_addopt->created->CurrentValue) ?>">
<?php } ?>
<?php if ($mas_user_template_addopt->createdDatetime->Visible) { // createdDatetime ?>
	<input type="hidden" data-table="mas_user_template" data-field="x_createdDatetime" name="x_createdDatetime" id="x_createdDatetime" value="<?php echo HtmlEncode($mas_user_template_addopt->createdDatetime->CurrentValue) ?>">
<?php } ?>
<?php if ($mas_user_template_addopt->modified->Visible) { // modified ?>
	<input type="hidden" data-table="mas_user_template" data-field="x_modified" name="x_modified" id="x_modified" value="<?php echo HtmlEncode($mas_user_template_addopt->modified->CurrentValue) ?>">
<?php } ?>
<?php if ($mas_user_template_addopt->modifiedDatetime->Visible) { // modifiedDatetime ?>
	<input type="hidden" data-table="mas_user_template" data-field="x_modifiedDatetime" name="x_modifiedDatetime" id="x_modifiedDatetime" value="<?php echo HtmlEncode($mas_user_template_addopt->modifiedDatetime->CurrentValue) ?>">
<?php } ?>
</form>
<?php
$mas_user_template_addopt->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php
$mas_user_template_addopt->terminate();
?>