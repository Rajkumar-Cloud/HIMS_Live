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
$hr_projects_edit = new hr_projects_edit();

// Run the page
$hr_projects_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_projects_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fhr_projectsedit = currentForm = new ew.Form("fhr_projectsedit", "edit");

// Validate form
fhr_projectsedit.validate = function() {
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
		<?php if ($hr_projects_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_projects->id->caption(), $hr_projects->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_projects_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_projects->name->caption(), $hr_projects->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_projects_edit->client->Required) { ?>
			elm = this.getElements("x" + infix + "_client");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_projects->client->caption(), $hr_projects->client->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_client");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_projects->client->errorMessage()) ?>");
		<?php if ($hr_projects_edit->details->Required) { ?>
			elm = this.getElements("x" + infix + "_details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_projects->details->caption(), $hr_projects->details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_projects_edit->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_projects->created->caption(), $hr_projects->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_projects->created->errorMessage()) ?>");
		<?php if ($hr_projects_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_projects->status->caption(), $hr_projects->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_projects_edit->HospID->Required) { ?>
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
fhr_projectsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_projectsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_projectsedit.lists["x_status"] = <?php echo $hr_projects_edit->status->Lookup->toClientList() ?>;
fhr_projectsedit.lists["x_status"].options = <?php echo JsonEncode($hr_projects_edit->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_projects_edit->showPageHeader(); ?>
<?php
$hr_projects_edit->showMessage();
?>
<form name="fhr_projectsedit" id="fhr_projectsedit" class="<?php echo $hr_projects_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_projects_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_projects_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_projects">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$hr_projects_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($hr_projects->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_hr_projects_id" class="<?php echo $hr_projects_edit->LeftColumnClass ?>"><?php echo $hr_projects->id->caption() ?><?php echo ($hr_projects->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_projects_edit->RightColumnClass ?>"><div<?php echo $hr_projects->id->cellAttributes() ?>>
<span id="el_hr_projects_id">
<span<?php echo $hr_projects->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($hr_projects->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="hr_projects" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($hr_projects->id->CurrentValue) ?>">
<?php echo $hr_projects->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_projects->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_projects_name" for="x_name" class="<?php echo $hr_projects_edit->LeftColumnClass ?>"><?php echo $hr_projects->name->caption() ?><?php echo ($hr_projects->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_projects_edit->RightColumnClass ?>"><div<?php echo $hr_projects->name->cellAttributes() ?>>
<span id="el_hr_projects_name">
<input type="text" data-table="hr_projects" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hr_projects->name->getPlaceHolder()) ?>" value="<?php echo $hr_projects->name->EditValue ?>"<?php echo $hr_projects->name->editAttributes() ?>>
</span>
<?php echo $hr_projects->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_projects->client->Visible) { // client ?>
	<div id="r_client" class="form-group row">
		<label id="elh_hr_projects_client" for="x_client" class="<?php echo $hr_projects_edit->LeftColumnClass ?>"><?php echo $hr_projects->client->caption() ?><?php echo ($hr_projects->client->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_projects_edit->RightColumnClass ?>"><div<?php echo $hr_projects->client->cellAttributes() ?>>
<span id="el_hr_projects_client">
<input type="text" data-table="hr_projects" data-field="x_client" name="x_client" id="x_client" size="30" placeholder="<?php echo HtmlEncode($hr_projects->client->getPlaceHolder()) ?>" value="<?php echo $hr_projects->client->EditValue ?>"<?php echo $hr_projects->client->editAttributes() ?>>
</span>
<?php echo $hr_projects->client->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_projects->details->Visible) { // details ?>
	<div id="r_details" class="form-group row">
		<label id="elh_hr_projects_details" for="x_details" class="<?php echo $hr_projects_edit->LeftColumnClass ?>"><?php echo $hr_projects->details->caption() ?><?php echo ($hr_projects->details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_projects_edit->RightColumnClass ?>"><div<?php echo $hr_projects->details->cellAttributes() ?>>
<span id="el_hr_projects_details">
<textarea data-table="hr_projects" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_projects->details->getPlaceHolder()) ?>"<?php echo $hr_projects->details->editAttributes() ?>><?php echo $hr_projects->details->EditValue ?></textarea>
</span>
<?php echo $hr_projects->details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_projects->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_hr_projects_created" for="x_created" class="<?php echo $hr_projects_edit->LeftColumnClass ?>"><?php echo $hr_projects->created->caption() ?><?php echo ($hr_projects->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_projects_edit->RightColumnClass ?>"><div<?php echo $hr_projects->created->cellAttributes() ?>>
<span id="el_hr_projects_created">
<input type="text" data-table="hr_projects" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($hr_projects->created->getPlaceHolder()) ?>" value="<?php echo $hr_projects->created->EditValue ?>"<?php echo $hr_projects->created->editAttributes() ?>>
<?php if (!$hr_projects->created->ReadOnly && !$hr_projects->created->Disabled && !isset($hr_projects->created->EditAttrs["readonly"]) && !isset($hr_projects->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_projectsedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_projects->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_projects->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_hr_projects_status" class="<?php echo $hr_projects_edit->LeftColumnClass ?>"><?php echo $hr_projects->status->caption() ?><?php echo ($hr_projects->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_projects_edit->RightColumnClass ?>"><div<?php echo $hr_projects->status->cellAttributes() ?>>
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
<?php if (!$hr_projects_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_projects_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_projects_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_projects_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_projects_edit->terminate();
?>