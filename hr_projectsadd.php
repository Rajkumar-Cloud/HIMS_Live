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
$hr_projects_add = new hr_projects_add();

// Run the page
$hr_projects_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_projects_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fhr_projectsadd = currentForm = new ew.Form("fhr_projectsadd", "add");

// Validate form
fhr_projectsadd.validate = function() {
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
		<?php if ($hr_projects_add->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_projects->name->caption(), $hr_projects->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_projects_add->client->Required) { ?>
			elm = this.getElements("x" + infix + "_client");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_projects->client->caption(), $hr_projects->client->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_client");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_projects->client->errorMessage()) ?>");
		<?php if ($hr_projects_add->details->Required) { ?>
			elm = this.getElements("x" + infix + "_details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_projects->details->caption(), $hr_projects->details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_projects_add->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_projects->created->caption(), $hr_projects->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_projects->created->errorMessage()) ?>");
		<?php if ($hr_projects_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_projects->status->caption(), $hr_projects->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_projects_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_projects->HospID->caption(), $hr_projects->HospID->RequiredErrorMessage)) ?>");
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
fhr_projectsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_projectsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_projectsadd.lists["x_status"] = <?php echo $hr_projects_add->status->Lookup->toClientList() ?>;
fhr_projectsadd.lists["x_status"].options = <?php echo JsonEncode($hr_projects_add->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_projects_add->showPageHeader(); ?>
<?php
$hr_projects_add->showMessage();
?>
<form name="fhr_projectsadd" id="fhr_projectsadd" class="<?php echo $hr_projects_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_projects_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_projects_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_projects">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$hr_projects_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($hr_projects->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_projects_name" for="x_name" class="<?php echo $hr_projects_add->LeftColumnClass ?>"><?php echo $hr_projects->name->caption() ?><?php echo ($hr_projects->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_projects_add->RightColumnClass ?>"><div<?php echo $hr_projects->name->cellAttributes() ?>>
<span id="el_hr_projects_name">
<input type="text" data-table="hr_projects" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hr_projects->name->getPlaceHolder()) ?>" value="<?php echo $hr_projects->name->EditValue ?>"<?php echo $hr_projects->name->editAttributes() ?>>
</span>
<?php echo $hr_projects->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_projects->client->Visible) { // client ?>
	<div id="r_client" class="form-group row">
		<label id="elh_hr_projects_client" for="x_client" class="<?php echo $hr_projects_add->LeftColumnClass ?>"><?php echo $hr_projects->client->caption() ?><?php echo ($hr_projects->client->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_projects_add->RightColumnClass ?>"><div<?php echo $hr_projects->client->cellAttributes() ?>>
<span id="el_hr_projects_client">
<input type="text" data-table="hr_projects" data-field="x_client" name="x_client" id="x_client" size="30" placeholder="<?php echo HtmlEncode($hr_projects->client->getPlaceHolder()) ?>" value="<?php echo $hr_projects->client->EditValue ?>"<?php echo $hr_projects->client->editAttributes() ?>>
</span>
<?php echo $hr_projects->client->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_projects->details->Visible) { // details ?>
	<div id="r_details" class="form-group row">
		<label id="elh_hr_projects_details" for="x_details" class="<?php echo $hr_projects_add->LeftColumnClass ?>"><?php echo $hr_projects->details->caption() ?><?php echo ($hr_projects->details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_projects_add->RightColumnClass ?>"><div<?php echo $hr_projects->details->cellAttributes() ?>>
<span id="el_hr_projects_details">
<textarea data-table="hr_projects" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_projects->details->getPlaceHolder()) ?>"<?php echo $hr_projects->details->editAttributes() ?>><?php echo $hr_projects->details->EditValue ?></textarea>
</span>
<?php echo $hr_projects->details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_projects->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_hr_projects_created" for="x_created" class="<?php echo $hr_projects_add->LeftColumnClass ?>"><?php echo $hr_projects->created->caption() ?><?php echo ($hr_projects->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_projects_add->RightColumnClass ?>"><div<?php echo $hr_projects->created->cellAttributes() ?>>
<span id="el_hr_projects_created">
<input type="text" data-table="hr_projects" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($hr_projects->created->getPlaceHolder()) ?>" value="<?php echo $hr_projects->created->EditValue ?>"<?php echo $hr_projects->created->editAttributes() ?>>
<?php if (!$hr_projects->created->ReadOnly && !$hr_projects->created->Disabled && !isset($hr_projects->created->EditAttrs["readonly"]) && !isset($hr_projects->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_projectsadd", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_projects->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_projects->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_hr_projects_status" class="<?php echo $hr_projects_add->LeftColumnClass ?>"><?php echo $hr_projects->status->caption() ?><?php echo ($hr_projects->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_projects_add->RightColumnClass ?>"><div<?php echo $hr_projects->status->cellAttributes() ?>>
<span id="el_hr_projects_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_projects" data-field="x_status" data-value-separator="<?php echo $hr_projects->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $hr_projects->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_projects->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $hr_projects->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_projects_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_projects_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_projects_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_projects_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_projects_add->terminate();
?>