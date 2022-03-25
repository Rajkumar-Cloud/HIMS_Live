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
$appointment_reminder_edit = new appointment_reminder_edit();

// Run the page
$appointment_reminder_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_reminder_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fappointment_reminderedit = currentForm = new ew.Form("fappointment_reminderedit", "edit");

// Validate form
fappointment_reminderedit.validate = function() {
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
		<?php if ($appointment_reminder_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->id->caption(), $appointment_reminder->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($appointment_reminder_edit->reminder->Required) { ?>
			elm = this.getElements("x" + infix + "_reminder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->reminder->caption(), $appointment_reminder->reminder->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($appointment_reminder_edit->Drid->Required) { ?>
			elm = this.getElements("x" + infix + "_Drid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->Drid->caption(), $appointment_reminder->Drid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Drid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_reminder->Drid->errorMessage()) ?>");
		<?php if ($appointment_reminder_edit->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->DrName->caption(), $appointment_reminder->DrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($appointment_reminder_edit->Duration->Required) { ?>
			elm = this.getElements("x" + infix + "_Duration");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->Duration->caption(), $appointment_reminder->Duration->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Duration");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_reminder->Duration->errorMessage()) ?>");
		<?php if ($appointment_reminder_edit->Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->Date->caption(), $appointment_reminder->Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_reminder->Date->errorMessage()) ?>");
		<?php if ($appointment_reminder_edit->SMSSend->Required) { ?>
			elm = this.getElements("x" + infix + "_SMSSend");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->SMSSend->caption(), $appointment_reminder->SMSSend->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SMSSend");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_reminder->SMSSend->errorMessage()) ?>");
		<?php if ($appointment_reminder_edit->EmailSend->Required) { ?>
			elm = this.getElements("x" + infix + "_EmailSend");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->EmailSend->caption(), $appointment_reminder->EmailSend->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EmailSend");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_reminder->EmailSend->errorMessage()) ?>");

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
fappointment_reminderedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fappointment_reminderedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $appointment_reminder_edit->showPageHeader(); ?>
<?php
$appointment_reminder_edit->showMessage();
?>
<form name="fappointment_reminderedit" id="fappointment_reminderedit" class="<?php echo $appointment_reminder_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($appointment_reminder_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $appointment_reminder_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_reminder">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$appointment_reminder_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($appointment_reminder->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_appointment_reminder_id" class="<?php echo $appointment_reminder_edit->LeftColumnClass ?>"><?php echo $appointment_reminder->id->caption() ?><?php echo ($appointment_reminder->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_reminder_edit->RightColumnClass ?>"><div<?php echo $appointment_reminder->id->cellAttributes() ?>>
<span id="el_appointment_reminder_id">
<span<?php echo $appointment_reminder->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($appointment_reminder->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="appointment_reminder" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($appointment_reminder->id->CurrentValue) ?>">
<?php echo $appointment_reminder->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder->reminder->Visible) { // reminder ?>
	<div id="r_reminder" class="form-group row">
		<label id="elh_appointment_reminder_reminder" for="x_reminder" class="<?php echo $appointment_reminder_edit->LeftColumnClass ?>"><?php echo $appointment_reminder->reminder->caption() ?><?php echo ($appointment_reminder->reminder->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_reminder_edit->RightColumnClass ?>"><div<?php echo $appointment_reminder->reminder->cellAttributes() ?>>
<span id="el_appointment_reminder_reminder">
<textarea data-table="appointment_reminder" data-field="x_reminder" name="x_reminder" id="x_reminder" cols="35" rows="4" placeholder="<?php echo HtmlEncode($appointment_reminder->reminder->getPlaceHolder()) ?>"<?php echo $appointment_reminder->reminder->editAttributes() ?>><?php echo $appointment_reminder->reminder->EditValue ?></textarea>
</span>
<?php echo $appointment_reminder->reminder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder->Drid->Visible) { // Drid ?>
	<div id="r_Drid" class="form-group row">
		<label id="elh_appointment_reminder_Drid" for="x_Drid" class="<?php echo $appointment_reminder_edit->LeftColumnClass ?>"><?php echo $appointment_reminder->Drid->caption() ?><?php echo ($appointment_reminder->Drid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_reminder_edit->RightColumnClass ?>"><div<?php echo $appointment_reminder->Drid->cellAttributes() ?>>
<span id="el_appointment_reminder_Drid">
<input type="text" data-table="appointment_reminder" data-field="x_Drid" name="x_Drid" id="x_Drid" size="30" placeholder="<?php echo HtmlEncode($appointment_reminder->Drid->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder->Drid->EditValue ?>"<?php echo $appointment_reminder->Drid->editAttributes() ?>>
</span>
<?php echo $appointment_reminder->Drid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label id="elh_appointment_reminder_DrName" for="x_DrName" class="<?php echo $appointment_reminder_edit->LeftColumnClass ?>"><?php echo $appointment_reminder->DrName->caption() ?><?php echo ($appointment_reminder->DrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_reminder_edit->RightColumnClass ?>"><div<?php echo $appointment_reminder->DrName->cellAttributes() ?>>
<span id="el_appointment_reminder_DrName">
<input type="text" data-table="appointment_reminder" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_reminder->DrName->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder->DrName->EditValue ?>"<?php echo $appointment_reminder->DrName->editAttributes() ?>>
</span>
<?php echo $appointment_reminder->DrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder->Duration->Visible) { // Duration ?>
	<div id="r_Duration" class="form-group row">
		<label id="elh_appointment_reminder_Duration" for="x_Duration" class="<?php echo $appointment_reminder_edit->LeftColumnClass ?>"><?php echo $appointment_reminder->Duration->caption() ?><?php echo ($appointment_reminder->Duration->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_reminder_edit->RightColumnClass ?>"><div<?php echo $appointment_reminder->Duration->cellAttributes() ?>>
<span id="el_appointment_reminder_Duration">
<input type="text" data-table="appointment_reminder" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" placeholder="<?php echo HtmlEncode($appointment_reminder->Duration->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder->Duration->EditValue ?>"<?php echo $appointment_reminder->Duration->editAttributes() ?>>
</span>
<?php echo $appointment_reminder->Duration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder->Date->Visible) { // Date ?>
	<div id="r_Date" class="form-group row">
		<label id="elh_appointment_reminder_Date" for="x_Date" class="<?php echo $appointment_reminder_edit->LeftColumnClass ?>"><?php echo $appointment_reminder->Date->caption() ?><?php echo ($appointment_reminder->Date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_reminder_edit->RightColumnClass ?>"><div<?php echo $appointment_reminder->Date->cellAttributes() ?>>
<span id="el_appointment_reminder_Date">
<input type="text" data-table="appointment_reminder" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?php echo HtmlEncode($appointment_reminder->Date->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder->Date->EditValue ?>"<?php echo $appointment_reminder->Date->editAttributes() ?>>
<?php if (!$appointment_reminder->Date->ReadOnly && !$appointment_reminder->Date->Disabled && !isset($appointment_reminder->Date->EditAttrs["readonly"]) && !isset($appointment_reminder->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fappointment_reminderedit", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $appointment_reminder->Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder->SMSSend->Visible) { // SMSSend ?>
	<div id="r_SMSSend" class="form-group row">
		<label id="elh_appointment_reminder_SMSSend" for="x_SMSSend" class="<?php echo $appointment_reminder_edit->LeftColumnClass ?>"><?php echo $appointment_reminder->SMSSend->caption() ?><?php echo ($appointment_reminder->SMSSend->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_reminder_edit->RightColumnClass ?>"><div<?php echo $appointment_reminder->SMSSend->cellAttributes() ?>>
<span id="el_appointment_reminder_SMSSend">
<input type="text" data-table="appointment_reminder" data-field="x_SMSSend" name="x_SMSSend" id="x_SMSSend" size="30" placeholder="<?php echo HtmlEncode($appointment_reminder->SMSSend->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder->SMSSend->EditValue ?>"<?php echo $appointment_reminder->SMSSend->editAttributes() ?>>
</span>
<?php echo $appointment_reminder->SMSSend->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder->EmailSend->Visible) { // EmailSend ?>
	<div id="r_EmailSend" class="form-group row">
		<label id="elh_appointment_reminder_EmailSend" for="x_EmailSend" class="<?php echo $appointment_reminder_edit->LeftColumnClass ?>"><?php echo $appointment_reminder->EmailSend->caption() ?><?php echo ($appointment_reminder->EmailSend->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_reminder_edit->RightColumnClass ?>"><div<?php echo $appointment_reminder->EmailSend->cellAttributes() ?>>
<span id="el_appointment_reminder_EmailSend">
<input type="text" data-table="appointment_reminder" data-field="x_EmailSend" name="x_EmailSend" id="x_EmailSend" size="30" placeholder="<?php echo HtmlEncode($appointment_reminder->EmailSend->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder->EmailSend->EditValue ?>"<?php echo $appointment_reminder->EmailSend->editAttributes() ?>>
</span>
<?php echo $appointment_reminder->EmailSend->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$appointment_reminder_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $appointment_reminder_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $appointment_reminder_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$appointment_reminder_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$appointment_reminder_edit->terminate();
?>