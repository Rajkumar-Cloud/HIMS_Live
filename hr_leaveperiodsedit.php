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
$hr_leaveperiods_edit = new hr_leaveperiods_edit();

// Run the page
$hr_leaveperiods_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_leaveperiods_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fhr_leaveperiodsedit = currentForm = new ew.Form("fhr_leaveperiodsedit", "edit");

// Validate form
fhr_leaveperiodsedit.validate = function() {
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
		<?php if ($hr_leaveperiods_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leaveperiods->id->caption(), $hr_leaveperiods->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_leaveperiods_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leaveperiods->name->caption(), $hr_leaveperiods->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_leaveperiods_edit->date_start->Required) { ?>
			elm = this.getElements("x" + infix + "_date_start");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leaveperiods->date_start->caption(), $hr_leaveperiods->date_start->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_start");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_leaveperiods->date_start->errorMessage()) ?>");
		<?php if ($hr_leaveperiods_edit->date_end->Required) { ?>
			elm = this.getElements("x" + infix + "_date_end");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leaveperiods->date_end->caption(), $hr_leaveperiods->date_end->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_end");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_leaveperiods->date_end->errorMessage()) ?>");
		<?php if ($hr_leaveperiods_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leaveperiods->status->caption(), $hr_leaveperiods->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_leaveperiods_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leaveperiods->HospID->caption(), $hr_leaveperiods->HospID->RequiredErrorMessage)) ?>");
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
fhr_leaveperiodsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_leaveperiodsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_leaveperiodsedit.lists["x_status"] = <?php echo $hr_leaveperiods_edit->status->Lookup->toClientList() ?>;
fhr_leaveperiodsedit.lists["x_status"].options = <?php echo JsonEncode($hr_leaveperiods_edit->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_leaveperiods_edit->showPageHeader(); ?>
<?php
$hr_leaveperiods_edit->showMessage();
?>
<form name="fhr_leaveperiodsedit" id="fhr_leaveperiodsedit" class="<?php echo $hr_leaveperiods_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_leaveperiods_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_leaveperiods_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_leaveperiods">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$hr_leaveperiods_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($hr_leaveperiods->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_hr_leaveperiods_id" class="<?php echo $hr_leaveperiods_edit->LeftColumnClass ?>"><?php echo $hr_leaveperiods->id->caption() ?><?php echo ($hr_leaveperiods->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leaveperiods_edit->RightColumnClass ?>"><div<?php echo $hr_leaveperiods->id->cellAttributes() ?>>
<span id="el_hr_leaveperiods_id">
<span<?php echo $hr_leaveperiods->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($hr_leaveperiods->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="hr_leaveperiods" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($hr_leaveperiods->id->CurrentValue) ?>">
<?php echo $hr_leaveperiods->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leaveperiods->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_leaveperiods_name" for="x_name" class="<?php echo $hr_leaveperiods_edit->LeftColumnClass ?>"><?php echo $hr_leaveperiods->name->caption() ?><?php echo ($hr_leaveperiods->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leaveperiods_edit->RightColumnClass ?>"><div<?php echo $hr_leaveperiods->name->cellAttributes() ?>>
<span id="el_hr_leaveperiods_name">
<input type="text" data-table="hr_leaveperiods" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hr_leaveperiods->name->getPlaceHolder()) ?>" value="<?php echo $hr_leaveperiods->name->EditValue ?>"<?php echo $hr_leaveperiods->name->editAttributes() ?>>
</span>
<?php echo $hr_leaveperiods->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leaveperiods->date_start->Visible) { // date_start ?>
	<div id="r_date_start" class="form-group row">
		<label id="elh_hr_leaveperiods_date_start" for="x_date_start" class="<?php echo $hr_leaveperiods_edit->LeftColumnClass ?>"><?php echo $hr_leaveperiods->date_start->caption() ?><?php echo ($hr_leaveperiods->date_start->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leaveperiods_edit->RightColumnClass ?>"><div<?php echo $hr_leaveperiods->date_start->cellAttributes() ?>>
<span id="el_hr_leaveperiods_date_start">
<input type="text" data-table="hr_leaveperiods" data-field="x_date_start" name="x_date_start" id="x_date_start" placeholder="<?php echo HtmlEncode($hr_leaveperiods->date_start->getPlaceHolder()) ?>" value="<?php echo $hr_leaveperiods->date_start->EditValue ?>"<?php echo $hr_leaveperiods->date_start->editAttributes() ?>>
<?php if (!$hr_leaveperiods->date_start->ReadOnly && !$hr_leaveperiods->date_start->Disabled && !isset($hr_leaveperiods->date_start->EditAttrs["readonly"]) && !isset($hr_leaveperiods->date_start->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_leaveperiodsedit", "x_date_start", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_leaveperiods->date_start->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leaveperiods->date_end->Visible) { // date_end ?>
	<div id="r_date_end" class="form-group row">
		<label id="elh_hr_leaveperiods_date_end" for="x_date_end" class="<?php echo $hr_leaveperiods_edit->LeftColumnClass ?>"><?php echo $hr_leaveperiods->date_end->caption() ?><?php echo ($hr_leaveperiods->date_end->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leaveperiods_edit->RightColumnClass ?>"><div<?php echo $hr_leaveperiods->date_end->cellAttributes() ?>>
<span id="el_hr_leaveperiods_date_end">
<input type="text" data-table="hr_leaveperiods" data-field="x_date_end" name="x_date_end" id="x_date_end" placeholder="<?php echo HtmlEncode($hr_leaveperiods->date_end->getPlaceHolder()) ?>" value="<?php echo $hr_leaveperiods->date_end->EditValue ?>"<?php echo $hr_leaveperiods->date_end->editAttributes() ?>>
<?php if (!$hr_leaveperiods->date_end->ReadOnly && !$hr_leaveperiods->date_end->Disabled && !isset($hr_leaveperiods->date_end->EditAttrs["readonly"]) && !isset($hr_leaveperiods->date_end->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_leaveperiodsedit", "x_date_end", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_leaveperiods->date_end->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leaveperiods->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_hr_leaveperiods_status" class="<?php echo $hr_leaveperiods_edit->LeftColumnClass ?>"><?php echo $hr_leaveperiods->status->caption() ?><?php echo ($hr_leaveperiods->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leaveperiods_edit->RightColumnClass ?>"><div<?php echo $hr_leaveperiods->status->cellAttributes() ?>>
<span id="el_hr_leaveperiods_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leaveperiods" data-field="x_status" data-value-separator="<?php echo $hr_leaveperiods->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $hr_leaveperiods->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leaveperiods->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $hr_leaveperiods->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_leaveperiods_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_leaveperiods_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_leaveperiods_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_leaveperiods_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_leaveperiods_edit->terminate();
?>