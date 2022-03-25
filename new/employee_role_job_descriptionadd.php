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
$employee_role_job_description_add = new employee_role_job_description_add();

// Run the page
$employee_role_job_description_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_role_job_description_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var femployee_role_job_descriptionadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	femployee_role_job_descriptionadd = currentForm = new ew.Form("femployee_role_job_descriptionadd", "add");

	// Validate form
	femployee_role_job_descriptionadd.validate = function() {
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
			<?php if ($employee_role_job_description_add->role->Required) { ?>
				elm = this.getElements("x" + infix + "_role");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description_add->role->caption(), $employee_role_job_description_add->role->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_role_job_description_add->job_description->Required) { ?>
				elm = this.getElements("x" + infix + "_job_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description_add->job_description->caption(), $employee_role_job_description_add->job_description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_role_job_description_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description_add->status->caption(), $employee_role_job_description_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_role_job_description_add->status->errorMessage()) ?>");
			<?php if ($employee_role_job_description_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description_add->createdby->caption(), $employee_role_job_description_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_role_job_description_add->createdby->errorMessage()) ?>");
			<?php if ($employee_role_job_description_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description_add->createddatetime->caption(), $employee_role_job_description_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_role_job_description_add->createddatetime->errorMessage()) ?>");
			<?php if ($employee_role_job_description_add->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description_add->modifiedby->caption(), $employee_role_job_description_add->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_role_job_description_add->modifiedby->errorMessage()) ?>");
			<?php if ($employee_role_job_description_add->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description_add->modifieddatetime->caption(), $employee_role_job_description_add->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_role_job_description_add->modifieddatetime->errorMessage()) ?>");

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
	femployee_role_job_descriptionadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	femployee_role_job_descriptionadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("femployee_role_job_descriptionadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $employee_role_job_description_add->showPageHeader(); ?>
<?php
$employee_role_job_description_add->showMessage();
?>
<form name="femployee_role_job_descriptionadd" id="femployee_role_job_descriptionadd" class="<?php echo $employee_role_job_description_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_role_job_description">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_role_job_description_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_role_job_description_add->role->Visible) { // role ?>
	<div id="r_role" class="form-group row">
		<label id="elh_employee_role_job_description_role" for="x_role" class="<?php echo $employee_role_job_description_add->LeftColumnClass ?>"><?php echo $employee_role_job_description_add->role->caption() ?><?php echo $employee_role_job_description_add->role->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_add->RightColumnClass ?>"><div <?php echo $employee_role_job_description_add->role->cellAttributes() ?>>
<span id="el_employee_role_job_description_role">
<input type="text" data-table="employee_role_job_description" data-field="x_role" name="x_role" id="x_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_role_job_description_add->role->getPlaceHolder()) ?>" value="<?php echo $employee_role_job_description_add->role->EditValue ?>"<?php echo $employee_role_job_description_add->role->editAttributes() ?>>
</span>
<?php echo $employee_role_job_description_add->role->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_role_job_description_add->job_description->Visible) { // job_description ?>
	<div id="r_job_description" class="form-group row">
		<label id="elh_employee_role_job_description_job_description" for="x_job_description" class="<?php echo $employee_role_job_description_add->LeftColumnClass ?>"><?php echo $employee_role_job_description_add->job_description->caption() ?><?php echo $employee_role_job_description_add->job_description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_add->RightColumnClass ?>"><div <?php echo $employee_role_job_description_add->job_description->cellAttributes() ?>>
<span id="el_employee_role_job_description_job_description">
<input type="text" data-table="employee_role_job_description" data-field="x_job_description" name="x_job_description" id="x_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_role_job_description_add->job_description->getPlaceHolder()) ?>" value="<?php echo $employee_role_job_description_add->job_description->EditValue ?>"<?php echo $employee_role_job_description_add->job_description->editAttributes() ?>>
</span>
<?php echo $employee_role_job_description_add->job_description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_role_job_description_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_role_job_description_status" for="x_status" class="<?php echo $employee_role_job_description_add->LeftColumnClass ?>"><?php echo $employee_role_job_description_add->status->caption() ?><?php echo $employee_role_job_description_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_add->RightColumnClass ?>"><div <?php echo $employee_role_job_description_add->status->cellAttributes() ?>>
<span id="el_employee_role_job_description_status">
<input type="text" data-table="employee_role_job_description" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($employee_role_job_description_add->status->getPlaceHolder()) ?>" value="<?php echo $employee_role_job_description_add->status->EditValue ?>"<?php echo $employee_role_job_description_add->status->editAttributes() ?>>
</span>
<?php echo $employee_role_job_description_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_role_job_description_add->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_employee_role_job_description_createdby" for="x_createdby" class="<?php echo $employee_role_job_description_add->LeftColumnClass ?>"><?php echo $employee_role_job_description_add->createdby->caption() ?><?php echo $employee_role_job_description_add->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_add->RightColumnClass ?>"><div <?php echo $employee_role_job_description_add->createdby->cellAttributes() ?>>
<span id="el_employee_role_job_description_createdby">
<input type="text" data-table="employee_role_job_description" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($employee_role_job_description_add->createdby->getPlaceHolder()) ?>" value="<?php echo $employee_role_job_description_add->createdby->EditValue ?>"<?php echo $employee_role_job_description_add->createdby->editAttributes() ?>>
</span>
<?php echo $employee_role_job_description_add->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_role_job_description_add->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_employee_role_job_description_createddatetime" for="x_createddatetime" class="<?php echo $employee_role_job_description_add->LeftColumnClass ?>"><?php echo $employee_role_job_description_add->createddatetime->caption() ?><?php echo $employee_role_job_description_add->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_add->RightColumnClass ?>"><div <?php echo $employee_role_job_description_add->createddatetime->cellAttributes() ?>>
<span id="el_employee_role_job_description_createddatetime">
<input type="text" data-table="employee_role_job_description" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($employee_role_job_description_add->createddatetime->getPlaceHolder()) ?>" value="<?php echo $employee_role_job_description_add->createddatetime->EditValue ?>"<?php echo $employee_role_job_description_add->createddatetime->editAttributes() ?>>
<?php if (!$employee_role_job_description_add->createddatetime->ReadOnly && !$employee_role_job_description_add->createddatetime->Disabled && !isset($employee_role_job_description_add->createddatetime->EditAttrs["readonly"]) && !isset($employee_role_job_description_add->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_role_job_descriptionadd", "datetimepicker"], function() {
	ew.createDateTimePicker("femployee_role_job_descriptionadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $employee_role_job_description_add->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_role_job_description_add->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_employee_role_job_description_modifiedby" for="x_modifiedby" class="<?php echo $employee_role_job_description_add->LeftColumnClass ?>"><?php echo $employee_role_job_description_add->modifiedby->caption() ?><?php echo $employee_role_job_description_add->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_add->RightColumnClass ?>"><div <?php echo $employee_role_job_description_add->modifiedby->cellAttributes() ?>>
<span id="el_employee_role_job_description_modifiedby">
<input type="text" data-table="employee_role_job_description" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($employee_role_job_description_add->modifiedby->getPlaceHolder()) ?>" value="<?php echo $employee_role_job_description_add->modifiedby->EditValue ?>"<?php echo $employee_role_job_description_add->modifiedby->editAttributes() ?>>
</span>
<?php echo $employee_role_job_description_add->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_role_job_description_add->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_employee_role_job_description_modifieddatetime" for="x_modifieddatetime" class="<?php echo $employee_role_job_description_add->LeftColumnClass ?>"><?php echo $employee_role_job_description_add->modifieddatetime->caption() ?><?php echo $employee_role_job_description_add->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_add->RightColumnClass ?>"><div <?php echo $employee_role_job_description_add->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_role_job_description_modifieddatetime">
<input type="text" data-table="employee_role_job_description" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($employee_role_job_description_add->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $employee_role_job_description_add->modifieddatetime->EditValue ?>"<?php echo $employee_role_job_description_add->modifieddatetime->editAttributes() ?>>
<?php if (!$employee_role_job_description_add->modifieddatetime->ReadOnly && !$employee_role_job_description_add->modifieddatetime->Disabled && !isset($employee_role_job_description_add->modifieddatetime->EditAttrs["readonly"]) && !isset($employee_role_job_description_add->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_role_job_descriptionadd", "datetimepicker"], function() {
	ew.createDateTimePicker("femployee_role_job_descriptionadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $employee_role_job_description_add->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_role_job_description_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_role_job_description_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_role_job_description_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_role_job_description_add->showPageFooter();
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
$employee_role_job_description_add->terminate();
?>