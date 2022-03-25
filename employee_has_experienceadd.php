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
$employee_has_experience_add = new employee_has_experience_add();

// Run the page
$employee_has_experience_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_experience_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var femployee_has_experienceadd = currentForm = new ew.Form("femployee_has_experienceadd", "add");

// Validate form
femployee_has_experienceadd.validate = function() {
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
		<?php if ($employee_has_experience_add->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->employee_id->caption(), $employee_has_experience->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_experience->employee_id->errorMessage()) ?>");
		<?php if ($employee_has_experience_add->working_at->Required) { ?>
			elm = this.getElements("x" + infix + "_working_at");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->working_at->caption(), $employee_has_experience->working_at->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_add->job_description->Required) { ?>
			elm = this.getElements("x" + infix + "_job_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->job_description->caption(), $employee_has_experience->job_description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_add->role->Required) { ?>
			elm = this.getElements("x" + infix + "_role");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->role->caption(), $employee_has_experience->role->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_add->start_date->Required) { ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->start_date->caption(), $employee_has_experience->start_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_experience->start_date->errorMessage()) ?>");
		<?php if ($employee_has_experience_add->end_date->Required) { ?>
			elm = this.getElements("x" + infix + "_end_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->end_date->caption(), $employee_has_experience->end_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_end_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_experience->end_date->errorMessage()) ?>");
		<?php if ($employee_has_experience_add->total_experience->Required) { ?>
			elm = this.getElements("x" + infix + "_total_experience");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->total_experience->caption(), $employee_has_experience->total_experience->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_add->certificates->Required) { ?>
			felm = this.getElements("x" + infix + "_certificates");
			elm = this.getElements("fn_x" + infix + "_certificates");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->certificates->caption(), $employee_has_experience->certificates->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_add->others->Required) { ?>
			felm = this.getElements("x" + infix + "_others");
			elm = this.getElements("fn_x" + infix + "_others");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->others->caption(), $employee_has_experience->others->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->status->caption(), $employee_has_experience->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->createdby->caption(), $employee_has_experience->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->createddatetime->caption(), $employee_has_experience->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->HospID->caption(), $employee_has_experience->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_experience->HospID->errorMessage()) ?>");

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
femployee_has_experienceadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_has_experienceadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_has_experienceadd.lists["x_status"] = <?php echo $employee_has_experience_add->status->Lookup->toClientList() ?>;
femployee_has_experienceadd.lists["x_status"].options = <?php echo JsonEncode($employee_has_experience_add->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_has_experience_add->showPageHeader(); ?>
<?php
$employee_has_experience_add->showMessage();
?>
<form name="femployee_has_experienceadd" id="femployee_has_experienceadd" class="<?php echo $employee_has_experience_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_has_experience_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_has_experience_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_has_experience">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_has_experience_add->IsModal ?>">
<?php if ($employee_has_experience->getCurrentMasterTable() == "employee") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo $employee_has_experience->employee_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_has_experience->employee_id->Visible) { // employee_id ?>
	<div id="r_employee_id" class="form-group row">
		<label id="elh_employee_has_experience_employee_id" for="x_employee_id" class="<?php echo $employee_has_experience_add->LeftColumnClass ?>"><?php echo $employee_has_experience->employee_id->caption() ?><?php echo ($employee_has_experience->employee_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_add->RightColumnClass ?>"><div<?php echo $employee_has_experience->employee_id->cellAttributes() ?>>
<?php if ($employee_has_experience->employee_id->getSessionValue() <> "") { ?>
<span id="el_employee_has_experience_employee_id">
<span<?php echo $employee_has_experience->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_employee_id" name="x_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_employee_has_experience_employee_id">
<input type="text" data-table="employee_has_experience" data-field="x_employee_id" name="x_employee_id" id="x_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->employee_id->EditValue ?>"<?php echo $employee_has_experience->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $employee_has_experience->employee_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience->working_at->Visible) { // working_at ?>
	<div id="r_working_at" class="form-group row">
		<label id="elh_employee_has_experience_working_at" for="x_working_at" class="<?php echo $employee_has_experience_add->LeftColumnClass ?>"><?php echo $employee_has_experience->working_at->caption() ?><?php echo ($employee_has_experience->working_at->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_add->RightColumnClass ?>"><div<?php echo $employee_has_experience->working_at->cellAttributes() ?>>
<span id="el_employee_has_experience_working_at">
<input type="text" data-table="employee_has_experience" data-field="x_working_at" name="x_working_at" id="x_working_at" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->working_at->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->working_at->EditValue ?>"<?php echo $employee_has_experience->working_at->editAttributes() ?>>
</span>
<?php echo $employee_has_experience->working_at->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience->job_description->Visible) { // job description ?>
	<div id="r_job_description" class="form-group row">
		<label id="elh_employee_has_experience_job_description" for="x_job_description" class="<?php echo $employee_has_experience_add->LeftColumnClass ?>"><?php echo $employee_has_experience->job_description->caption() ?><?php echo ($employee_has_experience->job_description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_add->RightColumnClass ?>"><div<?php echo $employee_has_experience->job_description->cellAttributes() ?>>
<span id="el_employee_has_experience_job_description">
<input type="text" data-table="employee_has_experience" data-field="x_job_description" name="x_job_description" id="x_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->job_description->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->job_description->EditValue ?>"<?php echo $employee_has_experience->job_description->editAttributes() ?>>
</span>
<?php echo $employee_has_experience->job_description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience->role->Visible) { // role ?>
	<div id="r_role" class="form-group row">
		<label id="elh_employee_has_experience_role" for="x_role" class="<?php echo $employee_has_experience_add->LeftColumnClass ?>"><?php echo $employee_has_experience->role->caption() ?><?php echo ($employee_has_experience->role->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_add->RightColumnClass ?>"><div<?php echo $employee_has_experience->role->cellAttributes() ?>>
<span id="el_employee_has_experience_role">
<input type="text" data-table="employee_has_experience" data-field="x_role" name="x_role" id="x_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->role->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->role->EditValue ?>"<?php echo $employee_has_experience->role->editAttributes() ?>>
</span>
<?php echo $employee_has_experience->role->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label id="elh_employee_has_experience_start_date" for="x_start_date" class="<?php echo $employee_has_experience_add->LeftColumnClass ?>"><?php echo $employee_has_experience->start_date->caption() ?><?php echo ($employee_has_experience->start_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_add->RightColumnClass ?>"><div<?php echo $employee_has_experience->start_date->cellAttributes() ?>>
<span id="el_employee_has_experience_start_date">
<input type="text" data-table="employee_has_experience" data-field="x_start_date" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($employee_has_experience->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->start_date->EditValue ?>"<?php echo $employee_has_experience->start_date->editAttributes() ?>>
<?php if (!$employee_has_experience->start_date->ReadOnly && !$employee_has_experience->start_date->Disabled && !isset($employee_has_experience->start_date->EditAttrs["readonly"]) && !isset($employee_has_experience->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_has_experienceadd", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_has_experience->start_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience->end_date->Visible) { // end_date ?>
	<div id="r_end_date" class="form-group row">
		<label id="elh_employee_has_experience_end_date" for="x_end_date" class="<?php echo $employee_has_experience_add->LeftColumnClass ?>"><?php echo $employee_has_experience->end_date->caption() ?><?php echo ($employee_has_experience->end_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_add->RightColumnClass ?>"><div<?php echo $employee_has_experience->end_date->cellAttributes() ?>>
<span id="el_employee_has_experience_end_date">
<input type="text" data-table="employee_has_experience" data-field="x_end_date" name="x_end_date" id="x_end_date" placeholder="<?php echo HtmlEncode($employee_has_experience->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->end_date->EditValue ?>"<?php echo $employee_has_experience->end_date->editAttributes() ?>>
<?php if (!$employee_has_experience->end_date->ReadOnly && !$employee_has_experience->end_date->Disabled && !isset($employee_has_experience->end_date->EditAttrs["readonly"]) && !isset($employee_has_experience->end_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_has_experienceadd", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_has_experience->end_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience->total_experience->Visible) { // total_experience ?>
	<div id="r_total_experience" class="form-group row">
		<label id="elh_employee_has_experience_total_experience" for="x_total_experience" class="<?php echo $employee_has_experience_add->LeftColumnClass ?>"><?php echo $employee_has_experience->total_experience->caption() ?><?php echo ($employee_has_experience->total_experience->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_add->RightColumnClass ?>"><div<?php echo $employee_has_experience->total_experience->cellAttributes() ?>>
<span id="el_employee_has_experience_total_experience">
<input type="text" data-table="employee_has_experience" data-field="x_total_experience" name="x_total_experience" id="x_total_experience" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->total_experience->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->total_experience->EditValue ?>"<?php echo $employee_has_experience->total_experience->editAttributes() ?>>
</span>
<?php echo $employee_has_experience->total_experience->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience->certificates->Visible) { // certificates ?>
	<div id="r_certificates" class="form-group row">
		<label id="elh_employee_has_experience_certificates" class="<?php echo $employee_has_experience_add->LeftColumnClass ?>"><?php echo $employee_has_experience->certificates->caption() ?><?php echo ($employee_has_experience->certificates->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_add->RightColumnClass ?>"><div<?php echo $employee_has_experience->certificates->cellAttributes() ?>>
<span id="el_employee_has_experience_certificates">
<div id="fd_x_certificates">
<span title="<?php echo $employee_has_experience->certificates->title() ? $employee_has_experience->certificates->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_experience->certificates->ReadOnly || $employee_has_experience->certificates->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_experience" data-field="x_certificates" name="x_certificates" id="x_certificates" multiple="multiple"<?php echo $employee_has_experience->certificates->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_certificates" id= "fn_x_certificates" value="<?php echo $employee_has_experience->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x_certificates" id= "fa_x_certificates" value="0">
<input type="hidden" name="fs_x_certificates" id= "fs_x_certificates" value="100">
<input type="hidden" name="fx_x_certificates" id= "fx_x_certificates" value="<?php echo $employee_has_experience->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_certificates" id= "fm_x_certificates" value="<?php echo $employee_has_experience->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x_certificates" id= "fc_x_certificates" value="<?php echo $employee_has_experience->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $employee_has_experience->certificates->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience->others->Visible) { // others ?>
	<div id="r_others" class="form-group row">
		<label id="elh_employee_has_experience_others" class="<?php echo $employee_has_experience_add->LeftColumnClass ?>"><?php echo $employee_has_experience->others->caption() ?><?php echo ($employee_has_experience->others->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_add->RightColumnClass ?>"><div<?php echo $employee_has_experience->others->cellAttributes() ?>>
<span id="el_employee_has_experience_others">
<div id="fd_x_others">
<span title="<?php echo $employee_has_experience->others->title() ? $employee_has_experience->others->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_experience->others->ReadOnly || $employee_has_experience->others->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_experience" data-field="x_others" name="x_others" id="x_others" multiple="multiple"<?php echo $employee_has_experience->others->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_others" id= "fn_x_others" value="<?php echo $employee_has_experience->others->Upload->FileName ?>">
<input type="hidden" name="fa_x_others" id= "fa_x_others" value="0">
<input type="hidden" name="fs_x_others" id= "fs_x_others" value="100">
<input type="hidden" name="fx_x_others" id= "fx_x_others" value="<?php echo $employee_has_experience->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_others" id= "fm_x_others" value="<?php echo $employee_has_experience->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x_others" id= "fc_x_others" value="<?php echo $employee_has_experience->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $employee_has_experience->others->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_has_experience_status" for="x_status" class="<?php echo $employee_has_experience_add->LeftColumnClass ?>"><?php echo $employee_has_experience->status->caption() ?><?php echo ($employee_has_experience->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_add->RightColumnClass ?>"><div<?php echo $employee_has_experience->status->cellAttributes() ?>>
<span id="el_employee_has_experience_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_experience" data-field="x_status" data-value-separator="<?php echo $employee_has_experience->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $employee_has_experience->status->editAttributes() ?>>
		<?php echo $employee_has_experience->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $employee_has_experience->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $employee_has_experience->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_employee_has_experience_HospID" for="x_HospID" class="<?php echo $employee_has_experience_add->LeftColumnClass ?>"><?php echo $employee_has_experience->HospID->caption() ?><?php echo ($employee_has_experience->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_add->RightColumnClass ?>"><div<?php echo $employee_has_experience->HospID->cellAttributes() ?>>
<span id="el_employee_has_experience_HospID">
<input type="text" data-table="employee_has_experience" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->HospID->EditValue ?>"<?php echo $employee_has_experience->HospID->editAttributes() ?>>
</span>
<?php echo $employee_has_experience->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_has_experience_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_has_experience_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_has_experience_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_has_experience_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_has_experience_add->terminate();
?>