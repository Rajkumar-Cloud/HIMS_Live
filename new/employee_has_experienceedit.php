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
$employee_has_experience_edit = new employee_has_experience_edit();

// Run the page
$employee_has_experience_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_experience_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var femployee_has_experienceedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	femployee_has_experienceedit = currentForm = new ew.Form("femployee_has_experienceedit", "edit");

	// Validate form
	femployee_has_experienceedit.validate = function() {
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
			<?php if ($employee_has_experience_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_edit->id->caption(), $employee_has_experience_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_edit->employee_id->Required) { ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_edit->employee_id->caption(), $employee_has_experience_edit->employee_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_has_experience_edit->employee_id->errorMessage()) ?>");
			<?php if ($employee_has_experience_edit->working_at->Required) { ?>
				elm = this.getElements("x" + infix + "_working_at");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_edit->working_at->caption(), $employee_has_experience_edit->working_at->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_edit->job_description->Required) { ?>
				elm = this.getElements("x" + infix + "_job_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_edit->job_description->caption(), $employee_has_experience_edit->job_description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_edit->role->Required) { ?>
				elm = this.getElements("x" + infix + "_role");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_edit->role->caption(), $employee_has_experience_edit->role->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_edit->start_date->Required) { ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_edit->start_date->caption(), $employee_has_experience_edit->start_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_has_experience_edit->start_date->errorMessage()) ?>");
			<?php if ($employee_has_experience_edit->end_date->Required) { ?>
				elm = this.getElements("x" + infix + "_end_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_edit->end_date->caption(), $employee_has_experience_edit->end_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_end_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_has_experience_edit->end_date->errorMessage()) ?>");
			<?php if ($employee_has_experience_edit->total_experience->Required) { ?>
				elm = this.getElements("x" + infix + "_total_experience");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_edit->total_experience->caption(), $employee_has_experience_edit->total_experience->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_edit->certificates->Required) { ?>
				felm = this.getElements("x" + infix + "_certificates");
				elm = this.getElements("fn_x" + infix + "_certificates");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_edit->certificates->caption(), $employee_has_experience_edit->certificates->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_edit->others->Required) { ?>
				felm = this.getElements("x" + infix + "_others");
				elm = this.getElements("fn_x" + infix + "_others");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_edit->others->caption(), $employee_has_experience_edit->others->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_edit->status->caption(), $employee_has_experience_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_edit->modifiedby->caption(), $employee_has_experience_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_edit->modifieddatetime->caption(), $employee_has_experience_edit->modifieddatetime->RequiredErrorMessage)) ?>");
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
	femployee_has_experienceedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	femployee_has_experienceedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	femployee_has_experienceedit.lists["x_status"] = <?php echo $employee_has_experience_edit->status->Lookup->toClientList($employee_has_experience_edit) ?>;
	femployee_has_experienceedit.lists["x_status"].options = <?php echo JsonEncode($employee_has_experience_edit->status->lookupOptions()) ?>;
	loadjs.done("femployee_has_experienceedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $employee_has_experience_edit->showPageHeader(); ?>
<?php
$employee_has_experience_edit->showMessage();
?>
<form name="femployee_has_experienceedit" id="femployee_has_experienceedit" class="<?php echo $employee_has_experience_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_has_experience">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_has_experience_edit->IsModal ?>">
<?php if ($employee_has_experience->getCurrentMasterTable() == "employee") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($employee_has_experience_edit->employee_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_has_experience_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_has_experience_id" class="<?php echo $employee_has_experience_edit->LeftColumnClass ?>"><?php echo $employee_has_experience_edit->id->caption() ?><?php echo $employee_has_experience_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_edit->RightColumnClass ?>"><div <?php echo $employee_has_experience_edit->id->cellAttributes() ?>>
<span id="el_employee_has_experience_id">
<span<?php echo $employee_has_experience_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_experience_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_has_experience_edit->id->CurrentValue) ?>">
<?php echo $employee_has_experience_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience_edit->employee_id->Visible) { // employee_id ?>
	<div id="r_employee_id" class="form-group row">
		<label id="elh_employee_has_experience_employee_id" for="x_employee_id" class="<?php echo $employee_has_experience_edit->LeftColumnClass ?>"><?php echo $employee_has_experience_edit->employee_id->caption() ?><?php echo $employee_has_experience_edit->employee_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_edit->RightColumnClass ?>"><div <?php echo $employee_has_experience_edit->employee_id->cellAttributes() ?>>
<?php if ($employee_has_experience_edit->employee_id->getSessionValue() != "") { ?>
<span id="el_employee_has_experience_employee_id">
<span<?php echo $employee_has_experience_edit->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_experience_edit->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_employee_id" name="x_employee_id" value="<?php echo HtmlEncode($employee_has_experience_edit->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_employee_has_experience_employee_id">
<input type="text" data-table="employee_has_experience" data-field="x_employee_id" name="x_employee_id" id="x_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience_edit->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_edit->employee_id->EditValue ?>"<?php echo $employee_has_experience_edit->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $employee_has_experience_edit->employee_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience_edit->working_at->Visible) { // working_at ?>
	<div id="r_working_at" class="form-group row">
		<label id="elh_employee_has_experience_working_at" for="x_working_at" class="<?php echo $employee_has_experience_edit->LeftColumnClass ?>"><?php echo $employee_has_experience_edit->working_at->caption() ?><?php echo $employee_has_experience_edit->working_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_edit->RightColumnClass ?>"><div <?php echo $employee_has_experience_edit->working_at->cellAttributes() ?>>
<span id="el_employee_has_experience_working_at">
<input type="text" data-table="employee_has_experience" data-field="x_working_at" name="x_working_at" id="x_working_at" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_edit->working_at->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_edit->working_at->EditValue ?>"<?php echo $employee_has_experience_edit->working_at->editAttributes() ?>>
</span>
<?php echo $employee_has_experience_edit->working_at->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience_edit->job_description->Visible) { // job description ?>
	<div id="r_job_description" class="form-group row">
		<label id="elh_employee_has_experience_job_description" for="x_job_description" class="<?php echo $employee_has_experience_edit->LeftColumnClass ?>"><?php echo $employee_has_experience_edit->job_description->caption() ?><?php echo $employee_has_experience_edit->job_description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_edit->RightColumnClass ?>"><div <?php echo $employee_has_experience_edit->job_description->cellAttributes() ?>>
<span id="el_employee_has_experience_job_description">
<input type="text" data-table="employee_has_experience" data-field="x_job_description" name="x_job_description" id="x_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_edit->job_description->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_edit->job_description->EditValue ?>"<?php echo $employee_has_experience_edit->job_description->editAttributes() ?>>
</span>
<?php echo $employee_has_experience_edit->job_description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience_edit->role->Visible) { // role ?>
	<div id="r_role" class="form-group row">
		<label id="elh_employee_has_experience_role" for="x_role" class="<?php echo $employee_has_experience_edit->LeftColumnClass ?>"><?php echo $employee_has_experience_edit->role->caption() ?><?php echo $employee_has_experience_edit->role->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_edit->RightColumnClass ?>"><div <?php echo $employee_has_experience_edit->role->cellAttributes() ?>>
<span id="el_employee_has_experience_role">
<input type="text" data-table="employee_has_experience" data-field="x_role" name="x_role" id="x_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_edit->role->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_edit->role->EditValue ?>"<?php echo $employee_has_experience_edit->role->editAttributes() ?>>
</span>
<?php echo $employee_has_experience_edit->role->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience_edit->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label id="elh_employee_has_experience_start_date" for="x_start_date" class="<?php echo $employee_has_experience_edit->LeftColumnClass ?>"><?php echo $employee_has_experience_edit->start_date->caption() ?><?php echo $employee_has_experience_edit->start_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_edit->RightColumnClass ?>"><div <?php echo $employee_has_experience_edit->start_date->cellAttributes() ?>>
<span id="el_employee_has_experience_start_date">
<input type="text" data-table="employee_has_experience" data-field="x_start_date" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($employee_has_experience_edit->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_edit->start_date->EditValue ?>"<?php echo $employee_has_experience_edit->start_date->editAttributes() ?>>
<?php if (!$employee_has_experience_edit->start_date->ReadOnly && !$employee_has_experience_edit->start_date->Disabled && !isset($employee_has_experience_edit->start_date->EditAttrs["readonly"]) && !isset($employee_has_experience_edit->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experienceedit", "datetimepicker"], function() {
	ew.createDateTimePicker("femployee_has_experienceedit", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $employee_has_experience_edit->start_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience_edit->end_date->Visible) { // end_date ?>
	<div id="r_end_date" class="form-group row">
		<label id="elh_employee_has_experience_end_date" for="x_end_date" class="<?php echo $employee_has_experience_edit->LeftColumnClass ?>"><?php echo $employee_has_experience_edit->end_date->caption() ?><?php echo $employee_has_experience_edit->end_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_edit->RightColumnClass ?>"><div <?php echo $employee_has_experience_edit->end_date->cellAttributes() ?>>
<span id="el_employee_has_experience_end_date">
<input type="text" data-table="employee_has_experience" data-field="x_end_date" name="x_end_date" id="x_end_date" placeholder="<?php echo HtmlEncode($employee_has_experience_edit->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_edit->end_date->EditValue ?>"<?php echo $employee_has_experience_edit->end_date->editAttributes() ?>>
<?php if (!$employee_has_experience_edit->end_date->ReadOnly && !$employee_has_experience_edit->end_date->Disabled && !isset($employee_has_experience_edit->end_date->EditAttrs["readonly"]) && !isset($employee_has_experience_edit->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experienceedit", "datetimepicker"], function() {
	ew.createDateTimePicker("femployee_has_experienceedit", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $employee_has_experience_edit->end_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience_edit->total_experience->Visible) { // total_experience ?>
	<div id="r_total_experience" class="form-group row">
		<label id="elh_employee_has_experience_total_experience" for="x_total_experience" class="<?php echo $employee_has_experience_edit->LeftColumnClass ?>"><?php echo $employee_has_experience_edit->total_experience->caption() ?><?php echo $employee_has_experience_edit->total_experience->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_edit->RightColumnClass ?>"><div <?php echo $employee_has_experience_edit->total_experience->cellAttributes() ?>>
<span id="el_employee_has_experience_total_experience">
<input type="text" data-table="employee_has_experience" data-field="x_total_experience" name="x_total_experience" id="x_total_experience" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_edit->total_experience->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_edit->total_experience->EditValue ?>"<?php echo $employee_has_experience_edit->total_experience->editAttributes() ?>>
</span>
<?php echo $employee_has_experience_edit->total_experience->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience_edit->certificates->Visible) { // certificates ?>
	<div id="r_certificates" class="form-group row">
		<label id="elh_employee_has_experience_certificates" class="<?php echo $employee_has_experience_edit->LeftColumnClass ?>"><?php echo $employee_has_experience_edit->certificates->caption() ?><?php echo $employee_has_experience_edit->certificates->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_edit->RightColumnClass ?>"><div <?php echo $employee_has_experience_edit->certificates->cellAttributes() ?>>
<span id="el_employee_has_experience_certificates">
<div id="fd_x_certificates">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_experience_edit->certificates->title() ?>" data-table="employee_has_experience" data-field="x_certificates" name="x_certificates" id="x_certificates" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_experience_edit->certificates->editAttributes() ?><?php if ($employee_has_experience_edit->certificates->ReadOnly || $employee_has_experience_edit->certificates->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_certificates"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_certificates" id= "fn_x_certificates" value="<?php echo $employee_has_experience_edit->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x_certificates" id= "fa_x_certificates" value="<?php echo (Post("fa_x_certificates") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_certificates" id= "fs_x_certificates" value="100">
<input type="hidden" name="fx_x_certificates" id= "fx_x_certificates" value="<?php echo $employee_has_experience_edit->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_certificates" id= "fm_x_certificates" value="<?php echo $employee_has_experience_edit->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x_certificates" id= "fc_x_certificates" value="<?php echo $employee_has_experience_edit->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $employee_has_experience_edit->certificates->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience_edit->others->Visible) { // others ?>
	<div id="r_others" class="form-group row">
		<label id="elh_employee_has_experience_others" class="<?php echo $employee_has_experience_edit->LeftColumnClass ?>"><?php echo $employee_has_experience_edit->others->caption() ?><?php echo $employee_has_experience_edit->others->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_edit->RightColumnClass ?>"><div <?php echo $employee_has_experience_edit->others->cellAttributes() ?>>
<span id="el_employee_has_experience_others">
<div id="fd_x_others">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_experience_edit->others->title() ?>" data-table="employee_has_experience" data-field="x_others" name="x_others" id="x_others" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_experience_edit->others->editAttributes() ?><?php if ($employee_has_experience_edit->others->ReadOnly || $employee_has_experience_edit->others->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_others"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_others" id= "fn_x_others" value="<?php echo $employee_has_experience_edit->others->Upload->FileName ?>">
<input type="hidden" name="fa_x_others" id= "fa_x_others" value="<?php echo (Post("fa_x_others") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_others" id= "fs_x_others" value="100">
<input type="hidden" name="fx_x_others" id= "fx_x_others" value="<?php echo $employee_has_experience_edit->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_others" id= "fm_x_others" value="<?php echo $employee_has_experience_edit->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x_others" id= "fc_x_others" value="<?php echo $employee_has_experience_edit->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $employee_has_experience_edit->others->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_experience_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_has_experience_status" for="x_status" class="<?php echo $employee_has_experience_edit->LeftColumnClass ?>"><?php echo $employee_has_experience_edit->status->caption() ?><?php echo $employee_has_experience_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_experience_edit->RightColumnClass ?>"><div <?php echo $employee_has_experience_edit->status->cellAttributes() ?>>
<span id="el_employee_has_experience_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_experience" data-field="x_status" data-value-separator="<?php echo $employee_has_experience_edit->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $employee_has_experience_edit->status->editAttributes() ?>>
			<?php echo $employee_has_experience_edit->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $employee_has_experience_edit->status->Lookup->getParamTag($employee_has_experience_edit, "p_x_status") ?>
</span>
<?php echo $employee_has_experience_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_has_experience_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_has_experience_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_has_experience_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_has_experience_edit->showPageFooter();
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
$employee_has_experience_edit->terminate();
?>