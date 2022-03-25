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
<?php include_once "header.php"; ?>
<script>
var fappointment_patienttypeeedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fappointment_patienttypeeedit = currentForm = new ew.Form("fappointment_patienttypeeedit", "edit");

	// Validate form
	fappointment_patienttypeeedit.validate = function() {
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
			<?php if ($appointment_patienttypee_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_patienttypee_edit->id->caption(), $appointment_patienttypee_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_patienttypee_edit->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_patienttypee_edit->Name->caption(), $appointment_patienttypee_edit->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_patienttypee_edit->Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_patienttypee_edit->Type->caption(), $appointment_patienttypee_edit->Type->RequiredErrorMessage)) ?>");
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
	fappointment_patienttypeeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fappointment_patienttypeeedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fappointment_patienttypeeedit.lists["x_Type"] = <?php echo $appointment_patienttypee_edit->Type->Lookup->toClientList($appointment_patienttypee_edit) ?>;
	fappointment_patienttypeeedit.lists["x_Type"].options = <?php echo JsonEncode($appointment_patienttypee_edit->Type->options(FALSE, TRUE)) ?>;
	loadjs.done("fappointment_patienttypeeedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $appointment_patienttypee_edit->showPageHeader(); ?>
<?php
$appointment_patienttypee_edit->showMessage();
?>
<form name="fappointment_patienttypeeedit" id="fappointment_patienttypeeedit" class="<?php echo $appointment_patienttypee_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_patienttypee">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$appointment_patienttypee_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($appointment_patienttypee_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_appointment_patienttypee_id" class="<?php echo $appointment_patienttypee_edit->LeftColumnClass ?>"><?php echo $appointment_patienttypee_edit->id->caption() ?><?php echo $appointment_patienttypee_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_patienttypee_edit->RightColumnClass ?>"><div <?php echo $appointment_patienttypee_edit->id->cellAttributes() ?>>
<span id="el_appointment_patienttypee_id">
<span<?php echo $appointment_patienttypee_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_patienttypee_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_patienttypee" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($appointment_patienttypee_edit->id->CurrentValue) ?>">
<?php echo $appointment_patienttypee_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_patienttypee_edit->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_appointment_patienttypee_Name" for="x_Name" class="<?php echo $appointment_patienttypee_edit->LeftColumnClass ?>"><?php echo $appointment_patienttypee_edit->Name->caption() ?><?php echo $appointment_patienttypee_edit->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_patienttypee_edit->RightColumnClass ?>"><div <?php echo $appointment_patienttypee_edit->Name->cellAttributes() ?>>
<span id="el_appointment_patienttypee_Name">
<input type="text" data-table="appointment_patienttypee" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_patienttypee_edit->Name->getPlaceHolder()) ?>" value="<?php echo $appointment_patienttypee_edit->Name->EditValue ?>"<?php echo $appointment_patienttypee_edit->Name->editAttributes() ?>>
</span>
<?php echo $appointment_patienttypee_edit->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_patienttypee_edit->Type->Visible) { // Type ?>
	<div id="r_Type" class="form-group row">
		<label id="elh_appointment_patienttypee_Type" for="x_Type" class="<?php echo $appointment_patienttypee_edit->LeftColumnClass ?>"><?php echo $appointment_patienttypee_edit->Type->caption() ?><?php echo $appointment_patienttypee_edit->Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $appointment_patienttypee_edit->RightColumnClass ?>"><div <?php echo $appointment_patienttypee_edit->Type->cellAttributes() ?>>
<span id="el_appointment_patienttypee_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="appointment_patienttypee" data-field="x_Type" data-value-separator="<?php echo $appointment_patienttypee_edit->Type->displayValueSeparatorAttribute() ?>" id="x_Type" name="x_Type"<?php echo $appointment_patienttypee_edit->Type->editAttributes() ?>>
			<?php echo $appointment_patienttypee_edit->Type->selectOptionListHtml("x_Type") ?>
		</select>
</div>
</span>
<?php echo $appointment_patienttypee_edit->Type->CustomMsg ?></div></div>
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
$appointment_patienttypee_edit->terminate();
?>