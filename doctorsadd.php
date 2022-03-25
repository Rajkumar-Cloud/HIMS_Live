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
$doctors_add = new doctors_add();

// Run the page
$doctors_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$doctors_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fdoctorsadd = currentForm = new ew.Form("fdoctorsadd", "add");

// Validate form
fdoctorsadd.validate = function() {
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
		<?php if ($doctors_add->CODE->Required) { ?>
			elm = this.getElements("x" + infix + "_CODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->CODE->caption(), $doctors->CODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($doctors_add->NAME->Required) { ?>
			elm = this.getElements("x" + infix + "_NAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->NAME->caption(), $doctors->NAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($doctors_add->DEPARTMENT->Required) { ?>
			elm = this.getElements("x" + infix + "_DEPARTMENT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->DEPARTMENT->caption(), $doctors->DEPARTMENT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($doctors_add->start_time->Required) { ?>
			elm = this.getElements("x" + infix + "_start_time");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->start_time->caption(), $doctors->start_time->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($doctors_add->end_time->Required) { ?>
			elm = this.getElements("x" + infix + "_end_time");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->end_time->caption(), $doctors->end_time->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($doctors_add->start_time1->Required) { ?>
			elm = this.getElements("x" + infix + "_start_time1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->start_time1->caption(), $doctors->start_time1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($doctors_add->end_time1->Required) { ?>
			elm = this.getElements("x" + infix + "_end_time1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->end_time1->caption(), $doctors->end_time1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($doctors_add->start_time2->Required) { ?>
			elm = this.getElements("x" + infix + "_start_time2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->start_time2->caption(), $doctors->start_time2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($doctors_add->end_time2->Required) { ?>
			elm = this.getElements("x" + infix + "_end_time2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->end_time2->caption(), $doctors->end_time2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($doctors_add->slot_time->Required) { ?>
			elm = this.getElements("x" + infix + "_slot_time");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->slot_time->caption(), $doctors->slot_time->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_slot_time");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($doctors->slot_time->errorMessage()) ?>");
		<?php if ($doctors_add->Fees->Required) { ?>
			elm = this.getElements("x" + infix + "_Fees");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->Fees->caption(), $doctors->Fees->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Fees");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($doctors->Fees->errorMessage()) ?>");
		<?php if ($doctors_add->ProfilePic->Required) { ?>
			felm = this.getElements("x" + infix + "_ProfilePic");
			elm = this.getElements("fn_x" + infix + "_ProfilePic");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $doctors->ProfilePic->caption(), $doctors->ProfilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($doctors_add->slot_days->Required) { ?>
			elm = this.getElements("x" + infix + "_slot_days[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->slot_days->caption(), $doctors->slot_days->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($doctors_add->Status->Required) { ?>
			elm = this.getElements("x" + infix + "_Status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->Status->caption(), $doctors->Status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($doctors_add->scheduler_id->Required) { ?>
			elm = this.getElements("x" + infix + "_scheduler_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->scheduler_id->caption(), $doctors->scheduler_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($doctors_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->HospID->caption(), $doctors->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($doctors_add->Designation->Required) { ?>
			elm = this.getElements("x" + infix + "_Designation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $doctors->Designation->caption(), $doctors->Designation->RequiredErrorMessage)) ?>");
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
fdoctorsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdoctorsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fdoctorsadd.lists["x_slot_days[]"] = <?php echo $doctors_add->slot_days->Lookup->toClientList() ?>;
fdoctorsadd.lists["x_slot_days[]"].options = <?php echo JsonEncode($doctors_add->slot_days->lookupOptions()) ?>;
fdoctorsadd.lists["x_Status"] = <?php echo $doctors_add->Status->Lookup->toClientList() ?>;
fdoctorsadd.lists["x_Status"].options = <?php echo JsonEncode($doctors_add->Status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $doctors_add->showPageHeader(); ?>
<?php
$doctors_add->showMessage();
?>
<form name="fdoctorsadd" id="fdoctorsadd" class="<?php echo $doctors_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($doctors_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $doctors_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="doctors">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$doctors_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($doctors->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_doctors_CODE" for="x_CODE" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->CODE->caption() ?><?php echo ($doctors->CODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->CODE->cellAttributes() ?>>
<span id="el_doctors_CODE">
<input type="text" data-table="doctors" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors->CODE->getPlaceHolder()) ?>" value="<?php echo $doctors->CODE->EditValue ?>"<?php echo $doctors->CODE->editAttributes() ?>>
</span>
<?php echo $doctors->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->NAME->Visible) { // NAME ?>
	<div id="r_NAME" class="form-group row">
		<label id="elh_doctors_NAME" for="x_NAME" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->NAME->caption() ?><?php echo ($doctors->NAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->NAME->cellAttributes() ?>>
<span id="el_doctors_NAME">
<input type="text" data-table="doctors" data-field="x_NAME" name="x_NAME" id="x_NAME" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors->NAME->getPlaceHolder()) ?>" value="<?php echo $doctors->NAME->EditValue ?>"<?php echo $doctors->NAME->editAttributes() ?>>
</span>
<?php echo $doctors->NAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="r_DEPARTMENT" class="form-group row">
		<label id="elh_doctors_DEPARTMENT" for="x_DEPARTMENT" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->DEPARTMENT->caption() ?><?php echo ($doctors->DEPARTMENT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->DEPARTMENT->cellAttributes() ?>>
<span id="el_doctors_DEPARTMENT">
<input type="text" data-table="doctors" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $doctors->DEPARTMENT->EditValue ?>"<?php echo $doctors->DEPARTMENT->editAttributes() ?>>
</span>
<?php echo $doctors->DEPARTMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->start_time->Visible) { // start_time ?>
	<div id="r_start_time" class="form-group row">
		<label id="elh_doctors_start_time" for="x_start_time" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->start_time->caption() ?><?php echo ($doctors->start_time->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->start_time->cellAttributes() ?>>
<span id="el_doctors_start_time">
<input type="text" data-table="doctors" data-field="x_start_time" name="x_start_time" id="x_start_time" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors->start_time->getPlaceHolder()) ?>" value="<?php echo $doctors->start_time->EditValue ?>"<?php echo $doctors->start_time->editAttributes() ?>>
<?php if (!$doctors->start_time->ReadOnly && !$doctors->start_time->Disabled && !isset($doctors->start_time->EditAttrs["readonly"]) && !isset($doctors->start_time->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fdoctorsadd", "x_start_time", {"timeFormat":"H:i:s","step":15});</script><?php } ?>
</span>
<?php echo $doctors->start_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->end_time->Visible) { // end_time ?>
	<div id="r_end_time" class="form-group row">
		<label id="elh_doctors_end_time" for="x_end_time" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->end_time->caption() ?><?php echo ($doctors->end_time->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->end_time->cellAttributes() ?>>
<span id="el_doctors_end_time">
<input type="text" data-table="doctors" data-field="x_end_time" name="x_end_time" id="x_end_time" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors->end_time->getPlaceHolder()) ?>" value="<?php echo $doctors->end_time->EditValue ?>"<?php echo $doctors->end_time->editAttributes() ?>>
<?php if (!$doctors->end_time->ReadOnly && !$doctors->end_time->Disabled && !isset($doctors->end_time->EditAttrs["readonly"]) && !isset($doctors->end_time->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fdoctorsadd", "x_end_time", {"timeFormat":"H:i:s","step":15});</script><?php } ?>
</span>
<?php echo $doctors->end_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->start_time1->Visible) { // start_time1 ?>
	<div id="r_start_time1" class="form-group row">
		<label id="elh_doctors_start_time1" for="x_start_time1" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->start_time1->caption() ?><?php echo ($doctors->start_time1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->start_time1->cellAttributes() ?>>
<span id="el_doctors_start_time1">
<input type="text" data-table="doctors" data-field="x_start_time1" name="x_start_time1" id="x_start_time1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors->start_time1->getPlaceHolder()) ?>" value="<?php echo $doctors->start_time1->EditValue ?>"<?php echo $doctors->start_time1->editAttributes() ?>>
<?php if (!$doctors->start_time1->ReadOnly && !$doctors->start_time1->Disabled && !isset($doctors->start_time1->EditAttrs["readonly"]) && !isset($doctors->start_time1->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fdoctorsadd", "x_start_time1", {"timeFormat":"H:i:s","step":15});</script><?php } ?>
</span>
<?php echo $doctors->start_time1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->end_time1->Visible) { // end_time1 ?>
	<div id="r_end_time1" class="form-group row">
		<label id="elh_doctors_end_time1" for="x_end_time1" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->end_time1->caption() ?><?php echo ($doctors->end_time1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->end_time1->cellAttributes() ?>>
<span id="el_doctors_end_time1">
<input type="text" data-table="doctors" data-field="x_end_time1" name="x_end_time1" id="x_end_time1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors->end_time1->getPlaceHolder()) ?>" value="<?php echo $doctors->end_time1->EditValue ?>"<?php echo $doctors->end_time1->editAttributes() ?>>
<?php if (!$doctors->end_time1->ReadOnly && !$doctors->end_time1->Disabled && !isset($doctors->end_time1->EditAttrs["readonly"]) && !isset($doctors->end_time1->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fdoctorsadd", "x_end_time1", {"timeFormat":"H:i:s","step":15});</script><?php } ?>
</span>
<?php echo $doctors->end_time1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->start_time2->Visible) { // start_time2 ?>
	<div id="r_start_time2" class="form-group row">
		<label id="elh_doctors_start_time2" for="x_start_time2" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->start_time2->caption() ?><?php echo ($doctors->start_time2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->start_time2->cellAttributes() ?>>
<span id="el_doctors_start_time2">
<input type="text" data-table="doctors" data-field="x_start_time2" name="x_start_time2" id="x_start_time2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors->start_time2->getPlaceHolder()) ?>" value="<?php echo $doctors->start_time2->EditValue ?>"<?php echo $doctors->start_time2->editAttributes() ?>>
<?php if (!$doctors->start_time2->ReadOnly && !$doctors->start_time2->Disabled && !isset($doctors->start_time2->EditAttrs["readonly"]) && !isset($doctors->start_time2->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fdoctorsadd", "x_start_time2", {"timeFormat":"H:i:s","step":15});</script><?php } ?>
</span>
<?php echo $doctors->start_time2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->end_time2->Visible) { // end_time2 ?>
	<div id="r_end_time2" class="form-group row">
		<label id="elh_doctors_end_time2" for="x_end_time2" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->end_time2->caption() ?><?php echo ($doctors->end_time2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->end_time2->cellAttributes() ?>>
<span id="el_doctors_end_time2">
<input type="text" data-table="doctors" data-field="x_end_time2" name="x_end_time2" id="x_end_time2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors->end_time2->getPlaceHolder()) ?>" value="<?php echo $doctors->end_time2->EditValue ?>"<?php echo $doctors->end_time2->editAttributes() ?>>
<?php if (!$doctors->end_time2->ReadOnly && !$doctors->end_time2->Disabled && !isset($doctors->end_time2->EditAttrs["readonly"]) && !isset($doctors->end_time2->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fdoctorsadd", "x_end_time2", {"timeFormat":"H:i:s","step":15});</script><?php } ?>
</span>
<?php echo $doctors->end_time2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->slot_time->Visible) { // slot_time ?>
	<div id="r_slot_time" class="form-group row">
		<label id="elh_doctors_slot_time" for="x_slot_time" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->slot_time->caption() ?><?php echo ($doctors->slot_time->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->slot_time->cellAttributes() ?>>
<span id="el_doctors_slot_time">
<input type="text" data-table="doctors" data-field="x_slot_time" name="x_slot_time" id="x_slot_time" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors->slot_time->getPlaceHolder()) ?>" value="<?php echo $doctors->slot_time->EditValue ?>"<?php echo $doctors->slot_time->editAttributes() ?>>
</span>
<?php echo $doctors->slot_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->Fees->Visible) { // Fees ?>
	<div id="r_Fees" class="form-group row">
		<label id="elh_doctors_Fees" for="x_Fees" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->Fees->caption() ?><?php echo ($doctors->Fees->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->Fees->cellAttributes() ?>>
<span id="el_doctors_Fees">
<input type="text" data-table="doctors" data-field="x_Fees" name="x_Fees" id="x_Fees" size="30" placeholder="<?php echo HtmlEncode($doctors->Fees->getPlaceHolder()) ?>" value="<?php echo $doctors->Fees->EditValue ?>"<?php echo $doctors->Fees->editAttributes() ?>>
</span>
<?php echo $doctors->Fees->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->ProfilePic->Visible) { // ProfilePic ?>
	<div id="r_ProfilePic" class="form-group row">
		<label id="elh_doctors_ProfilePic" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->ProfilePic->caption() ?><?php echo ($doctors->ProfilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->ProfilePic->cellAttributes() ?>>
<span id="el_doctors_ProfilePic">
<div id="fd_x_ProfilePic">
<span title="<?php echo $doctors->ProfilePic->title() ? $doctors->ProfilePic->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($doctors->ProfilePic->ReadOnly || $doctors->ProfilePic->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="doctors" data-field="x_ProfilePic" name="x_ProfilePic" id="x_ProfilePic"<?php echo $doctors->ProfilePic->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_ProfilePic" id= "fn_x_ProfilePic" value="<?php echo $doctors->ProfilePic->Upload->FileName ?>">
<input type="hidden" name="fa_x_ProfilePic" id= "fa_x_ProfilePic" value="0">
<input type="hidden" name="fs_x_ProfilePic" id= "fs_x_ProfilePic" value="450">
<input type="hidden" name="fx_x_ProfilePic" id= "fx_x_ProfilePic" value="<?php echo $doctors->ProfilePic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_ProfilePic" id= "fm_x_ProfilePic" value="<?php echo $doctors->ProfilePic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_ProfilePic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $doctors->ProfilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->slot_days->Visible) { // slot_days ?>
	<div id="r_slot_days" class="form-group row">
		<label id="elh_doctors_slot_days" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->slot_days->caption() ?><?php echo ($doctors->slot_days->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->slot_days->cellAttributes() ?>>
<span id="el_doctors_slot_days">
<div id="tp_x_slot_days" class="ew-template"><input type="checkbox" class="form-check-input" data-table="doctors" data-field="x_slot_days" data-value-separator="<?php echo $doctors->slot_days->displayValueSeparatorAttribute() ?>" name="x_slot_days[]" id="x_slot_days[]" value="{value}"<?php echo $doctors->slot_days->editAttributes() ?>></div>
<div id="dsl_x_slot_days" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $doctors->slot_days->checkBoxListHtml(FALSE, "x_slot_days[]") ?>
</div></div>
<?php echo $doctors->slot_days->Lookup->getParamTag("p_x_slot_days") ?>
</span>
<?php echo $doctors->slot_days->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_doctors_Status" for="x_Status" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->Status->caption() ?><?php echo ($doctors->Status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->Status->cellAttributes() ?>>
<span id="el_doctors_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="doctors" data-field="x_Status" data-value-separator="<?php echo $doctors->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $doctors->Status->editAttributes() ?>>
		<?php echo $doctors->Status->selectOptionListHtml("x_Status") ?>
	</select>
</div>
<?php echo $doctors->Status->Lookup->getParamTag("p_x_Status") ?>
</span>
<?php echo $doctors->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->scheduler_id->Visible) { // scheduler_id ?>
	<div id="r_scheduler_id" class="form-group row">
		<label id="elh_doctors_scheduler_id" for="x_scheduler_id" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->scheduler_id->caption() ?><?php echo ($doctors->scheduler_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->scheduler_id->cellAttributes() ?>>
<span id="el_doctors_scheduler_id">
<input type="text" data-table="doctors" data-field="x_scheduler_id" name="x_scheduler_id" id="x_scheduler_id" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors->scheduler_id->getPlaceHolder()) ?>" value="<?php echo $doctors->scheduler_id->EditValue ?>"<?php echo $doctors->scheduler_id->editAttributes() ?>>
</span>
<?php echo $doctors->scheduler_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($doctors->Designation->Visible) { // Designation ?>
	<div id="r_Designation" class="form-group row">
		<label id="elh_doctors_Designation" for="x_Designation" class="<?php echo $doctors_add->LeftColumnClass ?>"><?php echo $doctors->Designation->caption() ?><?php echo ($doctors->Designation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $doctors_add->RightColumnClass ?>"><div<?php echo $doctors->Designation->cellAttributes() ?>>
<span id="el_doctors_Designation">
<input type="text" data-table="doctors" data-field="x_Designation" name="x_Designation" id="x_Designation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors->Designation->getPlaceHolder()) ?>" value="<?php echo $doctors->Designation->EditValue ?>"<?php echo $doctors->Designation->editAttributes() ?>>
</span>
<?php echo $doctors->Designation->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("_appointment_scheduler", explode(",", $doctors->getCurrentDetailTable())) && $_appointment_scheduler->DetailAdd) {
?>
<?php if ($doctors->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("_appointment_scheduler", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "_appointment_schedulergrid.php" ?>
<?php } ?>
<?php if (!$doctors_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $doctors_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $doctors_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$doctors_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$doctors_add->terminate();
?>