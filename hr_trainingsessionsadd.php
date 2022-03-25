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
$hr_trainingsessions_add = new hr_trainingsessions_add();

// Run the page
$hr_trainingsessions_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_trainingsessions_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fhr_trainingsessionsadd = currentForm = new ew.Form("fhr_trainingsessionsadd", "add");

// Validate form
fhr_trainingsessionsadd.validate = function() {
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
		<?php if ($hr_trainingsessions_add->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_trainingsessions->name->caption(), $hr_trainingsessions->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_trainingsessions_add->course->Required) { ?>
			elm = this.getElements("x" + infix + "_course");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_trainingsessions->course->caption(), $hr_trainingsessions->course->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_course");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_trainingsessions->course->errorMessage()) ?>");
		<?php if ($hr_trainingsessions_add->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_trainingsessions->description->caption(), $hr_trainingsessions->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_trainingsessions_add->scheduled->Required) { ?>
			elm = this.getElements("x" + infix + "_scheduled");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_trainingsessions->scheduled->caption(), $hr_trainingsessions->scheduled->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_scheduled");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_trainingsessions->scheduled->errorMessage()) ?>");
		<?php if ($hr_trainingsessions_add->dueDate->Required) { ?>
			elm = this.getElements("x" + infix + "_dueDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_trainingsessions->dueDate->caption(), $hr_trainingsessions->dueDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_dueDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_trainingsessions->dueDate->errorMessage()) ?>");
		<?php if ($hr_trainingsessions_add->deliveryMethod->Required) { ?>
			elm = this.getElements("x" + infix + "_deliveryMethod");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_trainingsessions->deliveryMethod->caption(), $hr_trainingsessions->deliveryMethod->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_trainingsessions_add->deliveryLocation->Required) { ?>
			elm = this.getElements("x" + infix + "_deliveryLocation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_trainingsessions->deliveryLocation->caption(), $hr_trainingsessions->deliveryLocation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_trainingsessions_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_trainingsessions->status->caption(), $hr_trainingsessions->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_trainingsessions_add->attendanceType->Required) { ?>
			elm = this.getElements("x" + infix + "_attendanceType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_trainingsessions->attendanceType->caption(), $hr_trainingsessions->attendanceType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_trainingsessions_add->attachment->Required) { ?>
			elm = this.getElements("x" + infix + "_attachment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_trainingsessions->attachment->caption(), $hr_trainingsessions->attachment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_trainingsessions_add->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_trainingsessions->created->caption(), $hr_trainingsessions->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_trainingsessions->created->errorMessage()) ?>");
		<?php if ($hr_trainingsessions_add->updated->Required) { ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_trainingsessions->updated->caption(), $hr_trainingsessions->updated->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_trainingsessions->updated->errorMessage()) ?>");
		<?php if ($hr_trainingsessions_add->requireProof->Required) { ?>
			elm = this.getElements("x" + infix + "_requireProof");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_trainingsessions->requireProof->caption(), $hr_trainingsessions->requireProof->RequiredErrorMessage)) ?>");
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
fhr_trainingsessionsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_trainingsessionsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_trainingsessionsadd.lists["x_deliveryMethod"] = <?php echo $hr_trainingsessions_add->deliveryMethod->Lookup->toClientList() ?>;
fhr_trainingsessionsadd.lists["x_deliveryMethod"].options = <?php echo JsonEncode($hr_trainingsessions_add->deliveryMethod->options(FALSE, TRUE)) ?>;
fhr_trainingsessionsadd.lists["x_status"] = <?php echo $hr_trainingsessions_add->status->Lookup->toClientList() ?>;
fhr_trainingsessionsadd.lists["x_status"].options = <?php echo JsonEncode($hr_trainingsessions_add->status->options(FALSE, TRUE)) ?>;
fhr_trainingsessionsadd.lists["x_attendanceType"] = <?php echo $hr_trainingsessions_add->attendanceType->Lookup->toClientList() ?>;
fhr_trainingsessionsadd.lists["x_attendanceType"].options = <?php echo JsonEncode($hr_trainingsessions_add->attendanceType->options(FALSE, TRUE)) ?>;
fhr_trainingsessionsadd.lists["x_requireProof"] = <?php echo $hr_trainingsessions_add->requireProof->Lookup->toClientList() ?>;
fhr_trainingsessionsadd.lists["x_requireProof"].options = <?php echo JsonEncode($hr_trainingsessions_add->requireProof->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_trainingsessions_add->showPageHeader(); ?>
<?php
$hr_trainingsessions_add->showMessage();
?>
<form name="fhr_trainingsessionsadd" id="fhr_trainingsessionsadd" class="<?php echo $hr_trainingsessions_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_trainingsessions_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_trainingsessions_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_trainingsessions">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$hr_trainingsessions_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($hr_trainingsessions->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_trainingsessions_name" for="x_name" class="<?php echo $hr_trainingsessions_add->LeftColumnClass ?>"><?php echo $hr_trainingsessions->name->caption() ?><?php echo ($hr_trainingsessions->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_trainingsessions_add->RightColumnClass ?>"><div<?php echo $hr_trainingsessions->name->cellAttributes() ?>>
<span id="el_hr_trainingsessions_name">
<textarea data-table="hr_trainingsessions" data-field="x_name" name="x_name" id="x_name" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_trainingsessions->name->getPlaceHolder()) ?>"<?php echo $hr_trainingsessions->name->editAttributes() ?>><?php echo $hr_trainingsessions->name->EditValue ?></textarea>
</span>
<?php echo $hr_trainingsessions->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_trainingsessions->course->Visible) { // course ?>
	<div id="r_course" class="form-group row">
		<label id="elh_hr_trainingsessions_course" for="x_course" class="<?php echo $hr_trainingsessions_add->LeftColumnClass ?>"><?php echo $hr_trainingsessions->course->caption() ?><?php echo ($hr_trainingsessions->course->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_trainingsessions_add->RightColumnClass ?>"><div<?php echo $hr_trainingsessions->course->cellAttributes() ?>>
<span id="el_hr_trainingsessions_course">
<input type="text" data-table="hr_trainingsessions" data-field="x_course" name="x_course" id="x_course" size="30" placeholder="<?php echo HtmlEncode($hr_trainingsessions->course->getPlaceHolder()) ?>" value="<?php echo $hr_trainingsessions->course->EditValue ?>"<?php echo $hr_trainingsessions->course->editAttributes() ?>>
</span>
<?php echo $hr_trainingsessions->course->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_trainingsessions->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_hr_trainingsessions_description" for="x_description" class="<?php echo $hr_trainingsessions_add->LeftColumnClass ?>"><?php echo $hr_trainingsessions->description->caption() ?><?php echo ($hr_trainingsessions->description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_trainingsessions_add->RightColumnClass ?>"><div<?php echo $hr_trainingsessions->description->cellAttributes() ?>>
<span id="el_hr_trainingsessions_description">
<textarea data-table="hr_trainingsessions" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_trainingsessions->description->getPlaceHolder()) ?>"<?php echo $hr_trainingsessions->description->editAttributes() ?>><?php echo $hr_trainingsessions->description->EditValue ?></textarea>
</span>
<?php echo $hr_trainingsessions->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_trainingsessions->scheduled->Visible) { // scheduled ?>
	<div id="r_scheduled" class="form-group row">
		<label id="elh_hr_trainingsessions_scheduled" for="x_scheduled" class="<?php echo $hr_trainingsessions_add->LeftColumnClass ?>"><?php echo $hr_trainingsessions->scheduled->caption() ?><?php echo ($hr_trainingsessions->scheduled->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_trainingsessions_add->RightColumnClass ?>"><div<?php echo $hr_trainingsessions->scheduled->cellAttributes() ?>>
<span id="el_hr_trainingsessions_scheduled">
<input type="text" data-table="hr_trainingsessions" data-field="x_scheduled" name="x_scheduled" id="x_scheduled" placeholder="<?php echo HtmlEncode($hr_trainingsessions->scheduled->getPlaceHolder()) ?>" value="<?php echo $hr_trainingsessions->scheduled->EditValue ?>"<?php echo $hr_trainingsessions->scheduled->editAttributes() ?>>
<?php if (!$hr_trainingsessions->scheduled->ReadOnly && !$hr_trainingsessions->scheduled->Disabled && !isset($hr_trainingsessions->scheduled->EditAttrs["readonly"]) && !isset($hr_trainingsessions->scheduled->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_trainingsessionsadd", "x_scheduled", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_trainingsessions->scheduled->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_trainingsessions->dueDate->Visible) { // dueDate ?>
	<div id="r_dueDate" class="form-group row">
		<label id="elh_hr_trainingsessions_dueDate" for="x_dueDate" class="<?php echo $hr_trainingsessions_add->LeftColumnClass ?>"><?php echo $hr_trainingsessions->dueDate->caption() ?><?php echo ($hr_trainingsessions->dueDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_trainingsessions_add->RightColumnClass ?>"><div<?php echo $hr_trainingsessions->dueDate->cellAttributes() ?>>
<span id="el_hr_trainingsessions_dueDate">
<input type="text" data-table="hr_trainingsessions" data-field="x_dueDate" name="x_dueDate" id="x_dueDate" placeholder="<?php echo HtmlEncode($hr_trainingsessions->dueDate->getPlaceHolder()) ?>" value="<?php echo $hr_trainingsessions->dueDate->EditValue ?>"<?php echo $hr_trainingsessions->dueDate->editAttributes() ?>>
<?php if (!$hr_trainingsessions->dueDate->ReadOnly && !$hr_trainingsessions->dueDate->Disabled && !isset($hr_trainingsessions->dueDate->EditAttrs["readonly"]) && !isset($hr_trainingsessions->dueDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_trainingsessionsadd", "x_dueDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_trainingsessions->dueDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_trainingsessions->deliveryMethod->Visible) { // deliveryMethod ?>
	<div id="r_deliveryMethod" class="form-group row">
		<label id="elh_hr_trainingsessions_deliveryMethod" class="<?php echo $hr_trainingsessions_add->LeftColumnClass ?>"><?php echo $hr_trainingsessions->deliveryMethod->caption() ?><?php echo ($hr_trainingsessions->deliveryMethod->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_trainingsessions_add->RightColumnClass ?>"><div<?php echo $hr_trainingsessions->deliveryMethod->cellAttributes() ?>>
<span id="el_hr_trainingsessions_deliveryMethod">
<div id="tp_x_deliveryMethod" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_trainingsessions" data-field="x_deliveryMethod" data-value-separator="<?php echo $hr_trainingsessions->deliveryMethod->displayValueSeparatorAttribute() ?>" name="x_deliveryMethod" id="x_deliveryMethod" value="{value}"<?php echo $hr_trainingsessions->deliveryMethod->editAttributes() ?>></div>
<div id="dsl_x_deliveryMethod" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_trainingsessions->deliveryMethod->radioButtonListHtml(FALSE, "x_deliveryMethod") ?>
</div></div>
</span>
<?php echo $hr_trainingsessions->deliveryMethod->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_trainingsessions->deliveryLocation->Visible) { // deliveryLocation ?>
	<div id="r_deliveryLocation" class="form-group row">
		<label id="elh_hr_trainingsessions_deliveryLocation" for="x_deliveryLocation" class="<?php echo $hr_trainingsessions_add->LeftColumnClass ?>"><?php echo $hr_trainingsessions->deliveryLocation->caption() ?><?php echo ($hr_trainingsessions->deliveryLocation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_trainingsessions_add->RightColumnClass ?>"><div<?php echo $hr_trainingsessions->deliveryLocation->cellAttributes() ?>>
<span id="el_hr_trainingsessions_deliveryLocation">
<textarea data-table="hr_trainingsessions" data-field="x_deliveryLocation" name="x_deliveryLocation" id="x_deliveryLocation" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_trainingsessions->deliveryLocation->getPlaceHolder()) ?>"<?php echo $hr_trainingsessions->deliveryLocation->editAttributes() ?>><?php echo $hr_trainingsessions->deliveryLocation->EditValue ?></textarea>
</span>
<?php echo $hr_trainingsessions->deliveryLocation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_trainingsessions->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_hr_trainingsessions_status" class="<?php echo $hr_trainingsessions_add->LeftColumnClass ?>"><?php echo $hr_trainingsessions->status->caption() ?><?php echo ($hr_trainingsessions->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_trainingsessions_add->RightColumnClass ?>"><div<?php echo $hr_trainingsessions->status->cellAttributes() ?>>
<span id="el_hr_trainingsessions_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_trainingsessions" data-field="x_status" data-value-separator="<?php echo $hr_trainingsessions->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $hr_trainingsessions->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_trainingsessions->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $hr_trainingsessions->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_trainingsessions->attendanceType->Visible) { // attendanceType ?>
	<div id="r_attendanceType" class="form-group row">
		<label id="elh_hr_trainingsessions_attendanceType" class="<?php echo $hr_trainingsessions_add->LeftColumnClass ?>"><?php echo $hr_trainingsessions->attendanceType->caption() ?><?php echo ($hr_trainingsessions->attendanceType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_trainingsessions_add->RightColumnClass ?>"><div<?php echo $hr_trainingsessions->attendanceType->cellAttributes() ?>>
<span id="el_hr_trainingsessions_attendanceType">
<div id="tp_x_attendanceType" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_trainingsessions" data-field="x_attendanceType" data-value-separator="<?php echo $hr_trainingsessions->attendanceType->displayValueSeparatorAttribute() ?>" name="x_attendanceType" id="x_attendanceType" value="{value}"<?php echo $hr_trainingsessions->attendanceType->editAttributes() ?>></div>
<div id="dsl_x_attendanceType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_trainingsessions->attendanceType->radioButtonListHtml(FALSE, "x_attendanceType") ?>
</div></div>
</span>
<?php echo $hr_trainingsessions->attendanceType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_trainingsessions->attachment->Visible) { // attachment ?>
	<div id="r_attachment" class="form-group row">
		<label id="elh_hr_trainingsessions_attachment" for="x_attachment" class="<?php echo $hr_trainingsessions_add->LeftColumnClass ?>"><?php echo $hr_trainingsessions->attachment->caption() ?><?php echo ($hr_trainingsessions->attachment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_trainingsessions_add->RightColumnClass ?>"><div<?php echo $hr_trainingsessions->attachment->cellAttributes() ?>>
<span id="el_hr_trainingsessions_attachment">
<textarea data-table="hr_trainingsessions" data-field="x_attachment" name="x_attachment" id="x_attachment" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_trainingsessions->attachment->getPlaceHolder()) ?>"<?php echo $hr_trainingsessions->attachment->editAttributes() ?>><?php echo $hr_trainingsessions->attachment->EditValue ?></textarea>
</span>
<?php echo $hr_trainingsessions->attachment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_trainingsessions->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_hr_trainingsessions_created" for="x_created" class="<?php echo $hr_trainingsessions_add->LeftColumnClass ?>"><?php echo $hr_trainingsessions->created->caption() ?><?php echo ($hr_trainingsessions->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_trainingsessions_add->RightColumnClass ?>"><div<?php echo $hr_trainingsessions->created->cellAttributes() ?>>
<span id="el_hr_trainingsessions_created">
<input type="text" data-table="hr_trainingsessions" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($hr_trainingsessions->created->getPlaceHolder()) ?>" value="<?php echo $hr_trainingsessions->created->EditValue ?>"<?php echo $hr_trainingsessions->created->editAttributes() ?>>
<?php if (!$hr_trainingsessions->created->ReadOnly && !$hr_trainingsessions->created->Disabled && !isset($hr_trainingsessions->created->EditAttrs["readonly"]) && !isset($hr_trainingsessions->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_trainingsessionsadd", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_trainingsessions->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_trainingsessions->updated->Visible) { // updated ?>
	<div id="r_updated" class="form-group row">
		<label id="elh_hr_trainingsessions_updated" for="x_updated" class="<?php echo $hr_trainingsessions_add->LeftColumnClass ?>"><?php echo $hr_trainingsessions->updated->caption() ?><?php echo ($hr_trainingsessions->updated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_trainingsessions_add->RightColumnClass ?>"><div<?php echo $hr_trainingsessions->updated->cellAttributes() ?>>
<span id="el_hr_trainingsessions_updated">
<input type="text" data-table="hr_trainingsessions" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?php echo HtmlEncode($hr_trainingsessions->updated->getPlaceHolder()) ?>" value="<?php echo $hr_trainingsessions->updated->EditValue ?>"<?php echo $hr_trainingsessions->updated->editAttributes() ?>>
<?php if (!$hr_trainingsessions->updated->ReadOnly && !$hr_trainingsessions->updated->Disabled && !isset($hr_trainingsessions->updated->EditAttrs["readonly"]) && !isset($hr_trainingsessions->updated->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_trainingsessionsadd", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_trainingsessions->updated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_trainingsessions->requireProof->Visible) { // requireProof ?>
	<div id="r_requireProof" class="form-group row">
		<label id="elh_hr_trainingsessions_requireProof" class="<?php echo $hr_trainingsessions_add->LeftColumnClass ?>"><?php echo $hr_trainingsessions->requireProof->caption() ?><?php echo ($hr_trainingsessions->requireProof->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_trainingsessions_add->RightColumnClass ?>"><div<?php echo $hr_trainingsessions->requireProof->cellAttributes() ?>>
<span id="el_hr_trainingsessions_requireProof">
<div id="tp_x_requireProof" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_trainingsessions" data-field="x_requireProof" data-value-separator="<?php echo $hr_trainingsessions->requireProof->displayValueSeparatorAttribute() ?>" name="x_requireProof" id="x_requireProof" value="{value}"<?php echo $hr_trainingsessions->requireProof->editAttributes() ?>></div>
<div id="dsl_x_requireProof" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_trainingsessions->requireProof->radioButtonListHtml(FALSE, "x_requireProof") ?>
</div></div>
</span>
<?php echo $hr_trainingsessions->requireProof->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_trainingsessions_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_trainingsessions_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_trainingsessions_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_trainingsessions_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_trainingsessions_add->terminate();
?>