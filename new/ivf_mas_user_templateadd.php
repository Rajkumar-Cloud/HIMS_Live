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
$ivf_mas_user_template_add = new ivf_mas_user_template_add();

// Run the page
$ivf_mas_user_template_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_mas_user_template_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_mas_user_templateadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_mas_user_templateadd = currentForm = new ew.Form("fivf_mas_user_templateadd", "add");

	// Validate form
	fivf_mas_user_templateadd.validate = function() {
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
			<?php if ($ivf_mas_user_template_add->TemplateName->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_user_template_add->TemplateName->caption(), $ivf_mas_user_template_add->TemplateName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_mas_user_template_add->TemplateType->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_user_template_add->TemplateType->caption(), $ivf_mas_user_template_add->TemplateType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_mas_user_template_add->Template->Required) { ?>
				elm = this.getElements("x" + infix + "_Template");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_user_template_add->Template->caption(), $ivf_mas_user_template_add->Template->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_mas_user_template_add->created->Required) { ?>
				elm = this.getElements("x" + infix + "_created");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_user_template_add->created->caption(), $ivf_mas_user_template_add->created->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_mas_user_template_add->createdDatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createdDatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_user_template_add->createdDatetime->caption(), $ivf_mas_user_template_add->createdDatetime->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fivf_mas_user_templateadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_mas_user_templateadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_mas_user_templateadd.lists["x_TemplateType"] = <?php echo $ivf_mas_user_template_add->TemplateType->Lookup->toClientList($ivf_mas_user_template_add) ?>;
	fivf_mas_user_templateadd.lists["x_TemplateType"].options = <?php echo JsonEncode($ivf_mas_user_template_add->TemplateType->lookupOptions()) ?>;
	loadjs.done("fivf_mas_user_templateadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_mas_user_template_add->showPageHeader(); ?>
<?php
$ivf_mas_user_template_add->showMessage();
?>
<form name="fivf_mas_user_templateadd" id="fivf_mas_user_templateadd" class="<?php echo $ivf_mas_user_template_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_user_template">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_mas_user_template_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($ivf_mas_user_template_add->TemplateName->Visible) { // TemplateName ?>
	<div id="r_TemplateName" class="form-group row">
		<label id="elh_ivf_mas_user_template_TemplateName" for="x_TemplateName" class="<?php echo $ivf_mas_user_template_add->LeftColumnClass ?>"><?php echo $ivf_mas_user_template_add->TemplateName->caption() ?><?php echo $ivf_mas_user_template_add->TemplateName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_mas_user_template_add->RightColumnClass ?>"><div <?php echo $ivf_mas_user_template_add->TemplateName->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_TemplateName">
<input type="text" data-table="ivf_mas_user_template" data-field="x_TemplateName" name="x_TemplateName" id="x_TemplateName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_mas_user_template_add->TemplateName->getPlaceHolder()) ?>" value="<?php echo $ivf_mas_user_template_add->TemplateName->EditValue ?>"<?php echo $ivf_mas_user_template_add->TemplateName->editAttributes() ?>>
</span>
<?php echo $ivf_mas_user_template_add->TemplateName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_mas_user_template_add->TemplateType->Visible) { // TemplateType ?>
	<div id="r_TemplateType" class="form-group row">
		<label id="elh_ivf_mas_user_template_TemplateType" for="x_TemplateType" class="<?php echo $ivf_mas_user_template_add->LeftColumnClass ?>"><?php echo $ivf_mas_user_template_add->TemplateType->caption() ?><?php echo $ivf_mas_user_template_add->TemplateType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_mas_user_template_add->RightColumnClass ?>"><div <?php echo $ivf_mas_user_template_add->TemplateType->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_TemplateType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_mas_user_template" data-field="x_TemplateType" data-value-separator="<?php echo $ivf_mas_user_template_add->TemplateType->displayValueSeparatorAttribute() ?>" id="x_TemplateType" name="x_TemplateType"<?php echo $ivf_mas_user_template_add->TemplateType->editAttributes() ?>>
			<?php echo $ivf_mas_user_template_add->TemplateType->selectOptionListHtml("x_TemplateType") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_template_type") && !$ivf_mas_user_template_add->TemplateType->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateType" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_mas_user_template_add->TemplateType->caption() ?>" data-title="<?php echo $ivf_mas_user_template_add->TemplateType->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateType',url:'ivf_mas_template_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_mas_user_template_add->TemplateType->Lookup->getParamTag($ivf_mas_user_template_add, "p_x_TemplateType") ?>
</span>
<?php echo $ivf_mas_user_template_add->TemplateType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_mas_user_template_add->Template->Visible) { // Template ?>
	<div id="r_Template" class="form-group row">
		<label id="elh_ivf_mas_user_template_Template" for="x_Template" class="<?php echo $ivf_mas_user_template_add->LeftColumnClass ?>"><?php echo $ivf_mas_user_template_add->Template->caption() ?><?php echo $ivf_mas_user_template_add->Template->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_mas_user_template_add->RightColumnClass ?>"><div <?php echo $ivf_mas_user_template_add->Template->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_Template">
<textarea data-table="ivf_mas_user_template" data-field="x_Template" name="x_Template" id="x_Template" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_mas_user_template_add->Template->getPlaceHolder()) ?>"<?php echo $ivf_mas_user_template_add->Template->editAttributes() ?>><?php echo $ivf_mas_user_template_add->Template->EditValue ?></textarea>
</span>
<?php echo $ivf_mas_user_template_add->Template->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_mas_user_template_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_mas_user_template_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_mas_user_template_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_mas_user_template_add->showPageFooter();
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
<?php include_once "footer.php"; ?>
<?php
$ivf_mas_user_template_add->terminate();
?>