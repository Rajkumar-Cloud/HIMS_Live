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
$doctors_addopt = new doctors_addopt();

// Run the page
$doctors_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$doctors_addopt->Page_Render();
?>
<script>
var fdoctorsaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fdoctorsaddopt = currentForm = new ew.Form("fdoctorsaddopt", "addopt");

	// Validate form
	fdoctorsaddopt.validate = function() {
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
			<?php if ($doctors_addopt->CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->CODE->caption(), $doctors_addopt->CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_addopt->NAME->Required) { ?>
				elm = this.getElements("x" + infix + "_NAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->NAME->caption(), $doctors_addopt->NAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_addopt->DEPARTMENT->Required) { ?>
				elm = this.getElements("x" + infix + "_DEPARTMENT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->DEPARTMENT->caption(), $doctors_addopt->DEPARTMENT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_addopt->start_time->Required) { ?>
				elm = this.getElements("x" + infix + "_start_time");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->start_time->caption(), $doctors_addopt->start_time->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_addopt->end_time->Required) { ?>
				elm = this.getElements("x" + infix + "_end_time");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->end_time->caption(), $doctors_addopt->end_time->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_addopt->start_time1->Required) { ?>
				elm = this.getElements("x" + infix + "_start_time1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->start_time1->caption(), $doctors_addopt->start_time1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_addopt->end_time1->Required) { ?>
				elm = this.getElements("x" + infix + "_end_time1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->end_time1->caption(), $doctors_addopt->end_time1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_addopt->start_time2->Required) { ?>
				elm = this.getElements("x" + infix + "_start_time2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->start_time2->caption(), $doctors_addopt->start_time2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_addopt->end_time2->Required) { ?>
				elm = this.getElements("x" + infix + "_end_time2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->end_time2->caption(), $doctors_addopt->end_time2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_addopt->slot_time->Required) { ?>
				elm = this.getElements("x" + infix + "_slot_time");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->slot_time->caption(), $doctors_addopt->slot_time->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_slot_time");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($doctors_addopt->slot_time->errorMessage()) ?>");
			<?php if ($doctors_addopt->Fees->Required) { ?>
				elm = this.getElements("x" + infix + "_Fees");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->Fees->caption(), $doctors_addopt->Fees->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Fees");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($doctors_addopt->Fees->errorMessage()) ?>");
			<?php if ($doctors_addopt->ProfilePic->Required) { ?>
				felm = this.getElements("x" + infix + "_ProfilePic");
				elm = this.getElements("fn_x" + infix + "_ProfilePic");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->ProfilePic->caption(), $doctors_addopt->ProfilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_addopt->slot_days->Required) { ?>
				elm = this.getElements("x" + infix + "_slot_days[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->slot_days->caption(), $doctors_addopt->slot_days->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_addopt->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->Status->caption(), $doctors_addopt->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_addopt->scheduler_id->Required) { ?>
				elm = this.getElements("x" + infix + "_scheduler_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->scheduler_id->caption(), $doctors_addopt->scheduler_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_addopt->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->HospID->caption(), $doctors_addopt->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_addopt->Designation->Required) { ?>
				elm = this.getElements("x" + infix + "_Designation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_addopt->Designation->caption(), $doctors_addopt->Designation->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fdoctorsaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fdoctorsaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fdoctorsaddopt.lists["x_slot_days[]"] = <?php echo $doctors_addopt->slot_days->Lookup->toClientList($doctors_addopt) ?>;
	fdoctorsaddopt.lists["x_slot_days[]"].options = <?php echo JsonEncode($doctors_addopt->slot_days->lookupOptions()) ?>;
	fdoctorsaddopt.lists["x_Status"] = <?php echo $doctors_addopt->Status->Lookup->toClientList($doctors_addopt) ?>;
	fdoctorsaddopt.lists["x_Status"].options = <?php echo JsonEncode($doctors_addopt->Status->lookupOptions()) ?>;
	loadjs.done("fdoctorsaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $doctors_addopt->showPageHeader(); ?>
<?php
$doctors_addopt->showMessage();
?>
<form name="fdoctorsaddopt" id="fdoctorsaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $doctors_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($doctors_addopt->CODE->Visible) { // CODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CODE"><?php echo $doctors_addopt->CODE->caption() ?><?php echo $doctors_addopt->CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="doctors" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_addopt->CODE->getPlaceHolder()) ?>" value="<?php echo $doctors_addopt->CODE->EditValue ?>"<?php echo $doctors_addopt->CODE->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->NAME->Visible) { // NAME ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NAME"><?php echo $doctors_addopt->NAME->caption() ?><?php echo $doctors_addopt->NAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="doctors" data-field="x_NAME" name="x_NAME" id="x_NAME" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_addopt->NAME->getPlaceHolder()) ?>" value="<?php echo $doctors_addopt->NAME->EditValue ?>"<?php echo $doctors_addopt->NAME->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_DEPARTMENT"><?php echo $doctors_addopt->DEPARTMENT->caption() ?><?php echo $doctors_addopt->DEPARTMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="doctors" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_addopt->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $doctors_addopt->DEPARTMENT->EditValue ?>"<?php echo $doctors_addopt->DEPARTMENT->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->start_time->Visible) { // start_time ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_start_time"><?php echo $doctors_addopt->start_time->caption() ?><?php echo $doctors_addopt->start_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="doctors" data-field="x_start_time" name="x_start_time" id="x_start_time" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_addopt->start_time->getPlaceHolder()) ?>" value="<?php echo $doctors_addopt->start_time->EditValue ?>"<?php echo $doctors_addopt->start_time->editAttributes() ?>>
<?php if (!$doctors_addopt->start_time->ReadOnly && !$doctors_addopt->start_time->Disabled && !isset($doctors_addopt->start_time->EditAttrs["readonly"]) && !isset($doctors_addopt->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsaddopt", "timepicker"], function() {
	ew.createTimePicker("fdoctorsaddopt", "x_start_time", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->end_time->Visible) { // end_time ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_end_time"><?php echo $doctors_addopt->end_time->caption() ?><?php echo $doctors_addopt->end_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="doctors" data-field="x_end_time" name="x_end_time" id="x_end_time" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_addopt->end_time->getPlaceHolder()) ?>" value="<?php echo $doctors_addopt->end_time->EditValue ?>"<?php echo $doctors_addopt->end_time->editAttributes() ?>>
<?php if (!$doctors_addopt->end_time->ReadOnly && !$doctors_addopt->end_time->Disabled && !isset($doctors_addopt->end_time->EditAttrs["readonly"]) && !isset($doctors_addopt->end_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsaddopt", "timepicker"], function() {
	ew.createTimePicker("fdoctorsaddopt", "x_end_time", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->start_time1->Visible) { // start_time1 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_start_time1"><?php echo $doctors_addopt->start_time1->caption() ?><?php echo $doctors_addopt->start_time1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="doctors" data-field="x_start_time1" name="x_start_time1" id="x_start_time1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_addopt->start_time1->getPlaceHolder()) ?>" value="<?php echo $doctors_addopt->start_time1->EditValue ?>"<?php echo $doctors_addopt->start_time1->editAttributes() ?>>
<?php if (!$doctors_addopt->start_time1->ReadOnly && !$doctors_addopt->start_time1->Disabled && !isset($doctors_addopt->start_time1->EditAttrs["readonly"]) && !isset($doctors_addopt->start_time1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsaddopt", "timepicker"], function() {
	ew.createTimePicker("fdoctorsaddopt", "x_start_time1", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->end_time1->Visible) { // end_time1 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_end_time1"><?php echo $doctors_addopt->end_time1->caption() ?><?php echo $doctors_addopt->end_time1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="doctors" data-field="x_end_time1" name="x_end_time1" id="x_end_time1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_addopt->end_time1->getPlaceHolder()) ?>" value="<?php echo $doctors_addopt->end_time1->EditValue ?>"<?php echo $doctors_addopt->end_time1->editAttributes() ?>>
<?php if (!$doctors_addopt->end_time1->ReadOnly && !$doctors_addopt->end_time1->Disabled && !isset($doctors_addopt->end_time1->EditAttrs["readonly"]) && !isset($doctors_addopt->end_time1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsaddopt", "timepicker"], function() {
	ew.createTimePicker("fdoctorsaddopt", "x_end_time1", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->start_time2->Visible) { // start_time2 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_start_time2"><?php echo $doctors_addopt->start_time2->caption() ?><?php echo $doctors_addopt->start_time2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="doctors" data-field="x_start_time2" name="x_start_time2" id="x_start_time2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_addopt->start_time2->getPlaceHolder()) ?>" value="<?php echo $doctors_addopt->start_time2->EditValue ?>"<?php echo $doctors_addopt->start_time2->editAttributes() ?>>
<?php if (!$doctors_addopt->start_time2->ReadOnly && !$doctors_addopt->start_time2->Disabled && !isset($doctors_addopt->start_time2->EditAttrs["readonly"]) && !isset($doctors_addopt->start_time2->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsaddopt", "timepicker"], function() {
	ew.createTimePicker("fdoctorsaddopt", "x_start_time2", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->end_time2->Visible) { // end_time2 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_end_time2"><?php echo $doctors_addopt->end_time2->caption() ?><?php echo $doctors_addopt->end_time2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="doctors" data-field="x_end_time2" name="x_end_time2" id="x_end_time2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_addopt->end_time2->getPlaceHolder()) ?>" value="<?php echo $doctors_addopt->end_time2->EditValue ?>"<?php echo $doctors_addopt->end_time2->editAttributes() ?>>
<?php if (!$doctors_addopt->end_time2->ReadOnly && !$doctors_addopt->end_time2->Disabled && !isset($doctors_addopt->end_time2->EditAttrs["readonly"]) && !isset($doctors_addopt->end_time2->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsaddopt", "timepicker"], function() {
	ew.createTimePicker("fdoctorsaddopt", "x_end_time2", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->slot_time->Visible) { // slot_time ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_slot_time"><?php echo $doctors_addopt->slot_time->caption() ?><?php echo $doctors_addopt->slot_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="doctors" data-field="x_slot_time" name="x_slot_time" id="x_slot_time" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_addopt->slot_time->getPlaceHolder()) ?>" value="<?php echo $doctors_addopt->slot_time->EditValue ?>"<?php echo $doctors_addopt->slot_time->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->Fees->Visible) { // Fees ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Fees"><?php echo $doctors_addopt->Fees->caption() ?><?php echo $doctors_addopt->Fees->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="doctors" data-field="x_Fees" name="x_Fees" id="x_Fees" size="30" placeholder="<?php echo HtmlEncode($doctors_addopt->Fees->getPlaceHolder()) ?>" value="<?php echo $doctors_addopt->Fees->EditValue ?>"<?php echo $doctors_addopt->Fees->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->ProfilePic->Visible) { // ProfilePic ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $doctors_addopt->ProfilePic->caption() ?><?php echo $doctors_addopt->ProfilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div id="fd_x_ProfilePic">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $doctors_addopt->ProfilePic->title() ?>" data-table="doctors" data-field="x_ProfilePic" name="x_ProfilePic" id="x_ProfilePic" lang="<?php echo CurrentLanguageID() ?>"<?php echo $doctors_addopt->ProfilePic->editAttributes() ?><?php if ($doctors_addopt->ProfilePic->ReadOnly || $doctors_addopt->ProfilePic->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_ProfilePic"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_ProfilePic" id= "fn_x_ProfilePic" value="<?php echo $doctors_addopt->ProfilePic->Upload->FileName ?>">
<input type="hidden" name="fa_x_ProfilePic" id= "fa_x_ProfilePic" value="0">
<input type="hidden" name="fs_x_ProfilePic" id= "fs_x_ProfilePic" value="450">
<input type="hidden" name="fx_x_ProfilePic" id= "fx_x_ProfilePic" value="<?php echo $doctors_addopt->ProfilePic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_ProfilePic" id= "fm_x_ProfilePic" value="<?php echo $doctors_addopt->ProfilePic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_ProfilePic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->slot_days->Visible) { // slot_days ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $doctors_addopt->slot_days->caption() ?><?php echo $doctors_addopt->slot_days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div id="tp_x_slot_days" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="doctors" data-field="x_slot_days" data-value-separator="<?php echo $doctors_addopt->slot_days->displayValueSeparatorAttribute() ?>" name="x_slot_days[]" id="x_slot_days[]" value="{value}"<?php echo $doctors_addopt->slot_days->editAttributes() ?>></div>
<div id="dsl_x_slot_days" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $doctors_addopt->slot_days->checkBoxListHtml(FALSE, "x_slot_days[]") ?>
</div></div>
<?php echo $doctors_addopt->slot_days->Lookup->getParamTag($doctors_addopt, "p_x_slot_days") ?>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->Status->Visible) { // Status ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Status"><?php echo $doctors_addopt->Status->caption() ?><?php echo $doctors_addopt->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="doctors" data-field="x_Status" data-value-separator="<?php echo $doctors_addopt->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $doctors_addopt->Status->editAttributes() ?>>
			<?php echo $doctors_addopt->Status->selectOptionListHtml("x_Status") ?>
		</select>
</div>
<?php echo $doctors_addopt->Status->Lookup->getParamTag($doctors_addopt, "p_x_Status") ?>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->scheduler_id->Visible) { // scheduler_id ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_scheduler_id"><?php echo $doctors_addopt->scheduler_id->caption() ?><?php echo $doctors_addopt->scheduler_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="doctors" data-field="x_scheduler_id" name="x_scheduler_id" id="x_scheduler_id" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_addopt->scheduler_id->getPlaceHolder()) ?>" value="<?php echo $doctors_addopt->scheduler_id->EditValue ?>"<?php echo $doctors_addopt->scheduler_id->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($doctors_addopt->HospID->Visible) { // HospID ?>
	<input type="hidden" data-table="doctors" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($doctors_addopt->HospID->CurrentValue) ?>">
<?php } ?>
<?php if ($doctors_addopt->Designation->Visible) { // Designation ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Designation"><?php echo $doctors_addopt->Designation->caption() ?><?php echo $doctors_addopt->Designation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="doctors" data-field="x_Designation" name="x_Designation" id="x_Designation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_addopt->Designation->getPlaceHolder()) ?>" value="<?php echo $doctors_addopt->Designation->EditValue ?>"<?php echo $doctors_addopt->Designation->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$doctors_addopt->showPageFooter();
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
$doctors_addopt->terminate();
?>