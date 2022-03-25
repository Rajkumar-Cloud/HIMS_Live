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
$doctors_edit = new doctors_edit();

// Run the page
$doctors_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$doctors_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdoctorsedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fdoctorsedit = currentForm = new ew.Form("fdoctorsedit", "edit");

	// Validate form
	fdoctorsedit.validate = function() {
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
			<?php if ($doctors_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->id->caption(), $doctors_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->CODE->caption(), $doctors_edit->CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->NAME->Required) { ?>
				elm = this.getElements("x" + infix + "_NAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->NAME->caption(), $doctors_edit->NAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->DEPARTMENT->Required) { ?>
				elm = this.getElements("x" + infix + "_DEPARTMENT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->DEPARTMENT->caption(), $doctors_edit->DEPARTMENT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->start_time->Required) { ?>
				elm = this.getElements("x" + infix + "_start_time");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->start_time->caption(), $doctors_edit->start_time->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->end_time->Required) { ?>
				elm = this.getElements("x" + infix + "_end_time");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->end_time->caption(), $doctors_edit->end_time->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->start_time1->Required) { ?>
				elm = this.getElements("x" + infix + "_start_time1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->start_time1->caption(), $doctors_edit->start_time1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->end_time1->Required) { ?>
				elm = this.getElements("x" + infix + "_end_time1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->end_time1->caption(), $doctors_edit->end_time1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->start_time2->Required) { ?>
				elm = this.getElements("x" + infix + "_start_time2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->start_time2->caption(), $doctors_edit->start_time2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->end_time2->Required) { ?>
				elm = this.getElements("x" + infix + "_end_time2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->end_time2->caption(), $doctors_edit->end_time2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->slot_time->Required) { ?>
				elm = this.getElements("x" + infix + "_slot_time");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->slot_time->caption(), $doctors_edit->slot_time->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_slot_time");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($doctors_edit->slot_time->errorMessage()) ?>");
			<?php if ($doctors_edit->Fees->Required) { ?>
				elm = this.getElements("x" + infix + "_Fees");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->Fees->caption(), $doctors_edit->Fees->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Fees");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($doctors_edit->Fees->errorMessage()) ?>");
			<?php if ($doctors_edit->ProfilePic->Required) { ?>
				felm = this.getElements("x" + infix + "_ProfilePic");
				elm = this.getElements("fn_x" + infix + "_ProfilePic");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->ProfilePic->caption(), $doctors_edit->ProfilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->slot_days->Required) { ?>
				elm = this.getElements("x" + infix + "_slot_days[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->slot_days->caption(), $doctors_edit->slot_days->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->Status->caption(), $doctors_edit->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->scheduler_id->Required) { ?>
				elm = this.getElements("x" + infix + "_scheduler_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->scheduler_id->caption(), $doctors_edit->scheduler_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->HospID->caption(), $doctors_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($doctors_edit->Designation->Required) { ?>
				elm = this.getElements("x" + infix + "_Designation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors_edit->Designation->caption(), $doctors_edit->Designation->RequiredErrorMessage)) ?>");
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
	fdoctorsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fdoctorsedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fdoctorsedit.lists["x_slot_days[]"] = <?php echo $doctors_edit->slot_days->Lookup->toClientList($doctors_edit) ?>;
	fdoctorsedit.lists["x_slot_days[]"].options = <?php echo JsonEncode($doctors_edit->slot_days->lookupOptions()) ?>;
	fdoctorsedit.lists["x_Status"] = <?php echo $doctors_edit->Status->Lookup->toClientList($doctors_edit) ?>;
	fdoctorsedit.lists["x_Status"].options = <?php echo JsonEncode($doctors_edit->Status->lookupOptions()) ?>;
	loadjs.done("fdoctorsedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $doctors_edit->showPageHeader(); ?>
<?php
$doctors_edit->showMessage();
?>
<form name="fdoctorsedit" id="fdoctorsedit" class="<?php echo $doctors_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="doctors">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$doctors_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($doctors_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_doctors_id" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->id->caption() ?><?php echo $doctors_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->id->cellAttributes() ?>>
<span id="el_doctors_id">
<span<?php echo $doctors_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($doctors_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="doctors" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($doctors_edit->id->CurrentValue) ?>">
<?php echo $doctors_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_doctors_CODE" for="x_CODE" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->CODE->caption() ?><?php echo $doctors_edit->CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->CODE->cellAttributes() ?>>
<span id="el_doctors_CODE">
<input type="text" data-table="doctors" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_edit->CODE->getPlaceHolder()) ?>" value="<?php echo $doctors_edit->CODE->EditValue ?>"<?php echo $doctors_edit->CODE->editAttributes() ?>>
</span>
<?php echo $doctors_edit->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->NAME->Visible) { // NAME ?>
	<div id="r_NAME" class="form-group row">
		<label id="elh_doctors_NAME" for="x_NAME" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->NAME->caption() ?><?php echo $doctors_edit->NAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->NAME->cellAttributes() ?>>
<span id="el_doctors_NAME">
<input type="text" data-table="doctors" data-field="x_NAME" name="x_NAME" id="x_NAME" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_edit->NAME->getPlaceHolder()) ?>" value="<?php echo $doctors_edit->NAME->EditValue ?>"<?php echo $doctors_edit->NAME->editAttributes() ?>>
</span>
<?php echo $doctors_edit->NAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="r_DEPARTMENT" class="form-group row">
		<label id="elh_doctors_DEPARTMENT" for="x_DEPARTMENT" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->DEPARTMENT->caption() ?><?php echo $doctors_edit->DEPARTMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->DEPARTMENT->cellAttributes() ?>>
<span id="el_doctors_DEPARTMENT">
<input type="text" data-table="doctors" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_edit->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $doctors_edit->DEPARTMENT->EditValue ?>"<?php echo $doctors_edit->DEPARTMENT->editAttributes() ?>>
</span>
<?php echo $doctors_edit->DEPARTMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->start_time->Visible) { // start_time ?>
	<div id="r_start_time" class="form-group row">
		<label id="elh_doctors_start_time" for="x_start_time" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->start_time->caption() ?><?php echo $doctors_edit->start_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->start_time->cellAttributes() ?>>
<span id="el_doctors_start_time">
<input type="text" data-table="doctors" data-field="x_start_time" name="x_start_time" id="x_start_time" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_edit->start_time->getPlaceHolder()) ?>" value="<?php echo $doctors_edit->start_time->EditValue ?>"<?php echo $doctors_edit->start_time->editAttributes() ?>>
<?php if (!$doctors_edit->start_time->ReadOnly && !$doctors_edit->start_time->Disabled && !isset($doctors_edit->start_time->EditAttrs["readonly"]) && !isset($doctors_edit->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsedit", "timepicker"], function() {
	ew.createTimePicker("fdoctorsedit", "x_start_time", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<?php echo $doctors_edit->start_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->end_time->Visible) { // end_time ?>
	<div id="r_end_time" class="form-group row">
		<label id="elh_doctors_end_time" for="x_end_time" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->end_time->caption() ?><?php echo $doctors_edit->end_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->end_time->cellAttributes() ?>>
<span id="el_doctors_end_time">
<input type="text" data-table="doctors" data-field="x_end_time" name="x_end_time" id="x_end_time" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_edit->end_time->getPlaceHolder()) ?>" value="<?php echo $doctors_edit->end_time->EditValue ?>"<?php echo $doctors_edit->end_time->editAttributes() ?>>
<?php if (!$doctors_edit->end_time->ReadOnly && !$doctors_edit->end_time->Disabled && !isset($doctors_edit->end_time->EditAttrs["readonly"]) && !isset($doctors_edit->end_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsedit", "timepicker"], function() {
	ew.createTimePicker("fdoctorsedit", "x_end_time", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<?php echo $doctors_edit->end_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->start_time1->Visible) { // start_time1 ?>
	<div id="r_start_time1" class="form-group row">
		<label id="elh_doctors_start_time1" for="x_start_time1" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->start_time1->caption() ?><?php echo $doctors_edit->start_time1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->start_time1->cellAttributes() ?>>
<span id="el_doctors_start_time1">
<input type="text" data-table="doctors" data-field="x_start_time1" name="x_start_time1" id="x_start_time1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_edit->start_time1->getPlaceHolder()) ?>" value="<?php echo $doctors_edit->start_time1->EditValue ?>"<?php echo $doctors_edit->start_time1->editAttributes() ?>>
<?php if (!$doctors_edit->start_time1->ReadOnly && !$doctors_edit->start_time1->Disabled && !isset($doctors_edit->start_time1->EditAttrs["readonly"]) && !isset($doctors_edit->start_time1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsedit", "timepicker"], function() {
	ew.createTimePicker("fdoctorsedit", "x_start_time1", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<?php echo $doctors_edit->start_time1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->end_time1->Visible) { // end_time1 ?>
	<div id="r_end_time1" class="form-group row">
		<label id="elh_doctors_end_time1" for="x_end_time1" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->end_time1->caption() ?><?php echo $doctors_edit->end_time1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->end_time1->cellAttributes() ?>>
<span id="el_doctors_end_time1">
<input type="text" data-table="doctors" data-field="x_end_time1" name="x_end_time1" id="x_end_time1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_edit->end_time1->getPlaceHolder()) ?>" value="<?php echo $doctors_edit->end_time1->EditValue ?>"<?php echo $doctors_edit->end_time1->editAttributes() ?>>
<?php if (!$doctors_edit->end_time1->ReadOnly && !$doctors_edit->end_time1->Disabled && !isset($doctors_edit->end_time1->EditAttrs["readonly"]) && !isset($doctors_edit->end_time1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsedit", "timepicker"], function() {
	ew.createTimePicker("fdoctorsedit", "x_end_time1", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<?php echo $doctors_edit->end_time1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->start_time2->Visible) { // start_time2 ?>
	<div id="r_start_time2" class="form-group row">
		<label id="elh_doctors_start_time2" for="x_start_time2" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->start_time2->caption() ?><?php echo $doctors_edit->start_time2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->start_time2->cellAttributes() ?>>
<span id="el_doctors_start_time2">
<input type="text" data-table="doctors" data-field="x_start_time2" name="x_start_time2" id="x_start_time2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_edit->start_time2->getPlaceHolder()) ?>" value="<?php echo $doctors_edit->start_time2->EditValue ?>"<?php echo $doctors_edit->start_time2->editAttributes() ?>>
<?php if (!$doctors_edit->start_time2->ReadOnly && !$doctors_edit->start_time2->Disabled && !isset($doctors_edit->start_time2->EditAttrs["readonly"]) && !isset($doctors_edit->start_time2->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsedit", "timepicker"], function() {
	ew.createTimePicker("fdoctorsedit", "x_start_time2", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<?php echo $doctors_edit->start_time2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->end_time2->Visible) { // end_time2 ?>
	<div id="r_end_time2" class="form-group row">
		<label id="elh_doctors_end_time2" for="x_end_time2" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->end_time2->caption() ?><?php echo $doctors_edit->end_time2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->end_time2->cellAttributes() ?>>
<span id="el_doctors_end_time2">
<input type="text" data-table="doctors" data-field="x_end_time2" name="x_end_time2" id="x_end_time2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_edit->end_time2->getPlaceHolder()) ?>" value="<?php echo $doctors_edit->end_time2->EditValue ?>"<?php echo $doctors_edit->end_time2->editAttributes() ?>>
<?php if (!$doctors_edit->end_time2->ReadOnly && !$doctors_edit->end_time2->Disabled && !isset($doctors_edit->end_time2->EditAttrs["readonly"]) && !isset($doctors_edit->end_time2->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsedit", "timepicker"], function() {
	ew.createTimePicker("fdoctorsedit", "x_end_time2", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<?php echo $doctors_edit->end_time2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->slot_time->Visible) { // slot_time ?>
	<div id="r_slot_time" class="form-group row">
		<label id="elh_doctors_slot_time" for="x_slot_time" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->slot_time->caption() ?><?php echo $doctors_edit->slot_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->slot_time->cellAttributes() ?>>
<span id="el_doctors_slot_time">
<input type="text" data-table="doctors" data-field="x_slot_time" name="x_slot_time" id="x_slot_time" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_edit->slot_time->getPlaceHolder()) ?>" value="<?php echo $doctors_edit->slot_time->EditValue ?>"<?php echo $doctors_edit->slot_time->editAttributes() ?>>
</span>
<?php echo $doctors_edit->slot_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->Fees->Visible) { // Fees ?>
	<div id="r_Fees" class="form-group row">
		<label id="elh_doctors_Fees" for="x_Fees" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->Fees->caption() ?><?php echo $doctors_edit->Fees->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->Fees->cellAttributes() ?>>
<span id="el_doctors_Fees">
<input type="text" data-table="doctors" data-field="x_Fees" name="x_Fees" id="x_Fees" size="30" placeholder="<?php echo HtmlEncode($doctors_edit->Fees->getPlaceHolder()) ?>" value="<?php echo $doctors_edit->Fees->EditValue ?>"<?php echo $doctors_edit->Fees->editAttributes() ?>>
</span>
<?php echo $doctors_edit->Fees->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->ProfilePic->Visible) { // ProfilePic ?>
	<div id="r_ProfilePic" class="form-group row">
		<label id="elh_doctors_ProfilePic" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->ProfilePic->caption() ?><?php echo $doctors_edit->ProfilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->ProfilePic->cellAttributes() ?>>
<span id="el_doctors_ProfilePic">
<div id="fd_x_ProfilePic">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $doctors_edit->ProfilePic->title() ?>" data-table="doctors" data-field="x_ProfilePic" name="x_ProfilePic" id="x_ProfilePic" lang="<?php echo CurrentLanguageID() ?>"<?php echo $doctors_edit->ProfilePic->editAttributes() ?><?php if ($doctors_edit->ProfilePic->ReadOnly || $doctors_edit->ProfilePic->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_ProfilePic"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_ProfilePic" id= "fn_x_ProfilePic" value="<?php echo $doctors_edit->ProfilePic->Upload->FileName ?>">
<input type="hidden" name="fa_x_ProfilePic" id= "fa_x_ProfilePic" value="<?php echo (Post("fa_x_ProfilePic") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_ProfilePic" id= "fs_x_ProfilePic" value="450">
<input type="hidden" name="fx_x_ProfilePic" id= "fx_x_ProfilePic" value="<?php echo $doctors_edit->ProfilePic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_ProfilePic" id= "fm_x_ProfilePic" value="<?php echo $doctors_edit->ProfilePic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_ProfilePic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $doctors_edit->ProfilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->slot_days->Visible) { // slot_days ?>
	<div id="r_slot_days" class="form-group row">
		<label id="elh_doctors_slot_days" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->slot_days->caption() ?><?php echo $doctors_edit->slot_days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->slot_days->cellAttributes() ?>>
<span id="el_doctors_slot_days">
<div id="tp_x_slot_days" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="doctors" data-field="x_slot_days" data-value-separator="<?php echo $doctors_edit->slot_days->displayValueSeparatorAttribute() ?>" name="x_slot_days[]" id="x_slot_days[]" value="{value}"<?php echo $doctors_edit->slot_days->editAttributes() ?>></div>
<div id="dsl_x_slot_days" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $doctors_edit->slot_days->checkBoxListHtml(FALSE, "x_slot_days[]") ?>
</div></div>
<?php echo $doctors_edit->slot_days->Lookup->getParamTag($doctors_edit, "p_x_slot_days") ?>
</span>
<?php echo $doctors_edit->slot_days->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_doctors_Status" for="x_Status" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->Status->caption() ?><?php echo $doctors_edit->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->Status->cellAttributes() ?>>
<span id="el_doctors_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="doctors" data-field="x_Status" data-value-separator="<?php echo $doctors_edit->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $doctors_edit->Status->editAttributes() ?>>
			<?php echo $doctors_edit->Status->selectOptionListHtml("x_Status") ?>
		</select>
</div>
<?php echo $doctors_edit->Status->Lookup->getParamTag($doctors_edit, "p_x_Status") ?>
</span>
<?php echo $doctors_edit->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->scheduler_id->Visible) { // scheduler_id ?>
	<div id="r_scheduler_id" class="form-group row">
		<label id="elh_doctors_scheduler_id" for="x_scheduler_id" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->scheduler_id->caption() ?><?php echo $doctors_edit->scheduler_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->scheduler_id->cellAttributes() ?>>
<span id="el_doctors_scheduler_id">
<input type="text" data-table="doctors" data-field="x_scheduler_id" name="x_scheduler_id" id="x_scheduler_id" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_edit->scheduler_id->getPlaceHolder()) ?>" value="<?php echo $doctors_edit->scheduler_id->EditValue ?>"<?php echo $doctors_edit->scheduler_id->editAttributes() ?>>
</span>
<?php echo $doctors_edit->scheduler_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors_edit->Designation->Visible) { // Designation ?>
	<div id="r_Designation" class="form-group row">
		<label id="elh_doctors_Designation" for="x_Designation" class="<?php echo $doctors_edit->LeftColumnClass ?>"><?php echo $doctors_edit->Designation->caption() ?><?php echo $doctors_edit->Designation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_edit->RightColumnClass ?>"><div <?php echo $doctors_edit->Designation->cellAttributes() ?>>
<span id="el_doctors_Designation">
<input type="text" data-table="doctors" data-field="x_Designation" name="x_Designation" id="x_Designation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_edit->Designation->getPlaceHolder()) ?>" value="<?php echo $doctors_edit->Designation->EditValue ?>"<?php echo $doctors_edit->Designation->editAttributes() ?>>
</span>
<?php echo $doctors_edit->Designation->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("appointment_scheduler", explode(",", $doctors->getCurrentDetailTable())) && $appointment_scheduler->DetailEdit) {
?>
<?php if ($doctors->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("appointment_scheduler", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "appointment_schedulergrid.php" ?>
<?php } ?>
<?php if (!$doctors_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $doctors_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $doctors_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$doctors_edit->showPageFooter();
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
$doctors_edit->terminate();
?>