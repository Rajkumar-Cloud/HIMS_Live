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
$appointment_patienttypee_edit = new appointment_patienttypee_edit();

// Run the page
$appointment_patienttypee_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_patienttypee_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fappointment_patienttypeeedit = currentForm = new ew.Form("fappointment_patienttypeeedit", "edit");

// Validate form
fappointment_patienttypeeedit.validate = function() {
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
		<?php if ($appointment_patienttypee_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_patienttypee->id->caption(), $appointment_patienttypee->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($appointment_patienttypee_edit->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_patienttypee->Name->caption(), $appointment_patienttypee->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($appointment_patienttypee_edit->Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_patienttypee->Type->caption(), $appointment_patienttypee->Type->RequiredErrorMessage)) ?>");
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
fappointment_patienttypeeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fappointment_patienttypeeedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fappointment_patienttypeeedit.lists["x_Type"] = <?php echo $appointment_patienttypee_edit->Type->Lookup->toClientList() ?>;
fappointment_patienttypeeedit.lists["x_Type"].options = <?php echo JsonEncode($appointment_patienttypee_edit->Type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $appointment_patienttypee_edit->showPageHeader(); ?>
<?php
$appointment_patienttypee_edit->showMessage();
?>
<form name="fappointment_patienttypeeedit" id="fappointment_patienttypeeedit" class="<?php echo $appointment_patienttypee_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($appointment_patienttypee_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $appointment_patienttypee_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_patienttypee">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$appointment_patienttypee_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($appointment_patienttypee->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_appointment_patienttypee_id" class="<?php echo $appointment_patienttypee_edit->LeftColumnClass ?>"><?php echo $appointment_patienttypee->id->caption() ?><?php echo ($appointment_patienttypee->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_patienttypee_edit->RightColumnClass ?>"><div<?php echo $appointment_patienttypee->id->cellAttributes() ?>>
<span id="el_appointment_patienttypee_id">
<span<?php echo $appointment_patienttypee->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($appointment_patienttypee->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="appointment_patienttypee" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($appointment_patienttypee->id->CurrentValue) ?>">
<?php echo $appointment_patienttypee->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_patienttypee->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_appointment_patienttypee_Name" for="x_Name" class="<?php echo $appointment_patienttypee_edit->LeftColumnClass ?>"><?php echo $appointment_patienttypee->Name->caption() ?><?php echo ($appointment_patienttypee->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_patienttypee_edit->RightColumnClass ?>"><div<?php echo $appointment_patienttypee->Name->cellAttributes() ?>>
<span id="el_appointment_patienttypee_Name">
<input type="text" data-table="appointment_patienttypee" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_patienttypee->Name->getPlaceHolder()) ?>" value="<?php echo $appointment_patienttypee->Name->EditValue ?>"<?php echo $appointment_patienttypee->Name->editAttributes() ?>>
</span>
<?php echo $appointment_patienttypee->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_patienttypee->Type->Visible) { // Type ?>
	<div id="r_Type" class="form-group row">
		<label id="elh_appointment_patienttypee_Type" for="x_Type" class="<?php echo $appointment_patienttypee_edit->LeftColumnClass ?>"><?php echo $appointment_patienttypee->Type->caption() ?><?php echo ($appointment_patienttypee->Type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_patienttypee_edit->RightColumnClass ?>"><div<?php echo $appointment_patienttypee->Type->cellAttributes() ?>>
<span id="el_appointment_patienttypee_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="appointment_patienttypee" data-field="x_Type" data-value-separator="<?php echo $appointment_patienttypee->Type->displayValueSeparatorAttribute() ?>" id="x_Type" name="x_Type"<?php echo $appointment_patienttypee->Type->editAttributes() ?>>
		<?php echo $appointment_patienttypee->Type->selectOptionListHtml("x_Type") ?>
	</select>
</div>
</span>
<?php echo $appointment_patienttypee->Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$appointment_patienttypee_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $appointment_patienttypee_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $appointment_patienttypee_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$appointment_patienttypee_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$appointment_patienttypee_edit->terminate();
?>