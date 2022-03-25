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
$appointment_block_slot_edit = new appointment_block_slot_edit();

// Run the page
$appointment_block_slot_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_block_slot_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fappointment_block_slotedit = currentForm = new ew.Form("fappointment_block_slotedit", "edit");

// Validate form
fappointment_block_slotedit.validate = function() {
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
		<?php if ($appointment_block_slot_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot->id->caption(), $appointment_block_slot->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($appointment_block_slot_edit->Drid->Required) { ?>
			elm = this.getElements("x" + infix + "_Drid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot->Drid->caption(), $appointment_block_slot->Drid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Drid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_block_slot->Drid->errorMessage()) ?>");
		<?php if ($appointment_block_slot_edit->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot->DrName->caption(), $appointment_block_slot->DrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($appointment_block_slot_edit->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot->Details->caption(), $appointment_block_slot->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($appointment_block_slot_edit->BlockType->Required) { ?>
			elm = this.getElements("x" + infix + "_BlockType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot->BlockType->caption(), $appointment_block_slot->BlockType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($appointment_block_slot_edit->FromDate->Required) { ?>
			elm = this.getElements("x" + infix + "_FromDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot->FromDate->caption(), $appointment_block_slot->FromDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FromDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_block_slot->FromDate->errorMessage()) ?>");
		<?php if ($appointment_block_slot_edit->ToDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ToDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot->ToDate->caption(), $appointment_block_slot->ToDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ToDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_block_slot->ToDate->errorMessage()) ?>");
		<?php if ($appointment_block_slot_edit->FromTime->Required) { ?>
			elm = this.getElements("x" + infix + "_FromTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot->FromTime->caption(), $appointment_block_slot->FromTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FromTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_block_slot->FromTime->errorMessage()) ?>");
		<?php if ($appointment_block_slot_edit->ToTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ToTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot->ToTime->caption(), $appointment_block_slot->ToTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ToTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_block_slot->ToTime->errorMessage()) ?>");

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
fappointment_block_slotedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fappointment_block_slotedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $appointment_block_slot_edit->showPageHeader(); ?>
<?php
$appointment_block_slot_edit->showMessage();
?>
<form name="fappointment_block_slotedit" id="fappointment_block_slotedit" class="<?php echo $appointment_block_slot_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($appointment_block_slot_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $appointment_block_slot_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_block_slot">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$appointment_block_slot_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($appointment_block_slot->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_appointment_block_slot_id" class="<?php echo $appointment_block_slot_edit->LeftColumnClass ?>"><?php echo $appointment_block_slot->id->caption() ?><?php echo ($appointment_block_slot->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_block_slot_edit->RightColumnClass ?>"><div<?php echo $appointment_block_slot->id->cellAttributes() ?>>
<span id="el_appointment_block_slot_id">
<span<?php echo $appointment_block_slot->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($appointment_block_slot->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="appointment_block_slot" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($appointment_block_slot->id->CurrentValue) ?>">
<?php echo $appointment_block_slot->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot->Drid->Visible) { // Drid ?>
	<div id="r_Drid" class="form-group row">
		<label id="elh_appointment_block_slot_Drid" for="x_Drid" class="<?php echo $appointment_block_slot_edit->LeftColumnClass ?>"><?php echo $appointment_block_slot->Drid->caption() ?><?php echo ($appointment_block_slot->Drid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_block_slot_edit->RightColumnClass ?>"><div<?php echo $appointment_block_slot->Drid->cellAttributes() ?>>
<span id="el_appointment_block_slot_Drid">
<input type="text" data-table="appointment_block_slot" data-field="x_Drid" name="x_Drid" id="x_Drid" size="30" placeholder="<?php echo HtmlEncode($appointment_block_slot->Drid->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot->Drid->EditValue ?>"<?php echo $appointment_block_slot->Drid->editAttributes() ?>>
</span>
<?php echo $appointment_block_slot->Drid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label id="elh_appointment_block_slot_DrName" for="x_DrName" class="<?php echo $appointment_block_slot_edit->LeftColumnClass ?>"><?php echo $appointment_block_slot->DrName->caption() ?><?php echo ($appointment_block_slot->DrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_block_slot_edit->RightColumnClass ?>"><div<?php echo $appointment_block_slot->DrName->cellAttributes() ?>>
<span id="el_appointment_block_slot_DrName">
<input type="text" data-table="appointment_block_slot" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_block_slot->DrName->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot->DrName->EditValue ?>"<?php echo $appointment_block_slot->DrName->editAttributes() ?>>
</span>
<?php echo $appointment_block_slot->DrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_appointment_block_slot_Details" for="x_Details" class="<?php echo $appointment_block_slot_edit->LeftColumnClass ?>"><?php echo $appointment_block_slot->Details->caption() ?><?php echo ($appointment_block_slot->Details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_block_slot_edit->RightColumnClass ?>"><div<?php echo $appointment_block_slot->Details->cellAttributes() ?>>
<span id="el_appointment_block_slot_Details">
<input type="text" data-table="appointment_block_slot" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_block_slot->Details->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot->Details->EditValue ?>"<?php echo $appointment_block_slot->Details->editAttributes() ?>>
</span>
<?php echo $appointment_block_slot->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot->BlockType->Visible) { // BlockType ?>
	<div id="r_BlockType" class="form-group row">
		<label id="elh_appointment_block_slot_BlockType" for="x_BlockType" class="<?php echo $appointment_block_slot_edit->LeftColumnClass ?>"><?php echo $appointment_block_slot->BlockType->caption() ?><?php echo ($appointment_block_slot->BlockType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_block_slot_edit->RightColumnClass ?>"><div<?php echo $appointment_block_slot->BlockType->cellAttributes() ?>>
<span id="el_appointment_block_slot_BlockType">
<input type="text" data-table="appointment_block_slot" data-field="x_BlockType" name="x_BlockType" id="x_BlockType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_block_slot->BlockType->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot->BlockType->EditValue ?>"<?php echo $appointment_block_slot->BlockType->editAttributes() ?>>
</span>
<?php echo $appointment_block_slot->BlockType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot->FromDate->Visible) { // FromDate ?>
	<div id="r_FromDate" class="form-group row">
		<label id="elh_appointment_block_slot_FromDate" for="x_FromDate" class="<?php echo $appointment_block_slot_edit->LeftColumnClass ?>"><?php echo $appointment_block_slot->FromDate->caption() ?><?php echo ($appointment_block_slot->FromDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_block_slot_edit->RightColumnClass ?>"><div<?php echo $appointment_block_slot->FromDate->cellAttributes() ?>>
<span id="el_appointment_block_slot_FromDate">
<input type="text" data-table="appointment_block_slot" data-field="x_FromDate" name="x_FromDate" id="x_FromDate" placeholder="<?php echo HtmlEncode($appointment_block_slot->FromDate->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot->FromDate->EditValue ?>"<?php echo $appointment_block_slot->FromDate->editAttributes() ?>>
<?php if (!$appointment_block_slot->FromDate->ReadOnly && !$appointment_block_slot->FromDate->Disabled && !isset($appointment_block_slot->FromDate->EditAttrs["readonly"]) && !isset($appointment_block_slot->FromDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fappointment_block_slotedit", "x_FromDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $appointment_block_slot->FromDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot->ToDate->Visible) { // ToDate ?>
	<div id="r_ToDate" class="form-group row">
		<label id="elh_appointment_block_slot_ToDate" for="x_ToDate" class="<?php echo $appointment_block_slot_edit->LeftColumnClass ?>"><?php echo $appointment_block_slot->ToDate->caption() ?><?php echo ($appointment_block_slot->ToDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_block_slot_edit->RightColumnClass ?>"><div<?php echo $appointment_block_slot->ToDate->cellAttributes() ?>>
<span id="el_appointment_block_slot_ToDate">
<input type="text" data-table="appointment_block_slot" data-field="x_ToDate" name="x_ToDate" id="x_ToDate" placeholder="<?php echo HtmlEncode($appointment_block_slot->ToDate->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot->ToDate->EditValue ?>"<?php echo $appointment_block_slot->ToDate->editAttributes() ?>>
<?php if (!$appointment_block_slot->ToDate->ReadOnly && !$appointment_block_slot->ToDate->Disabled && !isset($appointment_block_slot->ToDate->EditAttrs["readonly"]) && !isset($appointment_block_slot->ToDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fappointment_block_slotedit", "x_ToDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $appointment_block_slot->ToDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot->FromTime->Visible) { // FromTime ?>
	<div id="r_FromTime" class="form-group row">
		<label id="elh_appointment_block_slot_FromTime" for="x_FromTime" class="<?php echo $appointment_block_slot_edit->LeftColumnClass ?>"><?php echo $appointment_block_slot->FromTime->caption() ?><?php echo ($appointment_block_slot->FromTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_block_slot_edit->RightColumnClass ?>"><div<?php echo $appointment_block_slot->FromTime->cellAttributes() ?>>
<span id="el_appointment_block_slot_FromTime">
<input type="text" data-table="appointment_block_slot" data-field="x_FromTime" name="x_FromTime" id="x_FromTime" placeholder="<?php echo HtmlEncode($appointment_block_slot->FromTime->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot->FromTime->EditValue ?>"<?php echo $appointment_block_slot->FromTime->editAttributes() ?>>
<?php if (!$appointment_block_slot->FromTime->ReadOnly && !$appointment_block_slot->FromTime->Disabled && !isset($appointment_block_slot->FromTime->EditAttrs["readonly"]) && !isset($appointment_block_slot->FromTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fappointment_block_slotedit", "x_FromTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $appointment_block_slot->FromTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot->ToTime->Visible) { // ToTime ?>
	<div id="r_ToTime" class="form-group row">
		<label id="elh_appointment_block_slot_ToTime" for="x_ToTime" class="<?php echo $appointment_block_slot_edit->LeftColumnClass ?>"><?php echo $appointment_block_slot->ToTime->caption() ?><?php echo ($appointment_block_slot->ToTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_block_slot_edit->RightColumnClass ?>"><div<?php echo $appointment_block_slot->ToTime->cellAttributes() ?>>
<span id="el_appointment_block_slot_ToTime">
<input type="text" data-table="appointment_block_slot" data-field="x_ToTime" name="x_ToTime" id="x_ToTime" placeholder="<?php echo HtmlEncode($appointment_block_slot->ToTime->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot->ToTime->EditValue ?>"<?php echo $appointment_block_slot->ToTime->editAttributes() ?>>
<?php if (!$appointment_block_slot->ToTime->ReadOnly && !$appointment_block_slot->ToTime->Disabled && !isset($appointment_block_slot->ToTime->EditAttrs["readonly"]) && !isset($appointment_block_slot->ToTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fappointment_block_slotedit", "x_ToTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $appointment_block_slot->ToTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$appointment_block_slot_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $appointment_block_slot_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $appointment_block_slot_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$appointment_block_slot_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$appointment_block_slot_edit->terminate();
?>