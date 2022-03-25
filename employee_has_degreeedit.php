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
$employee_has_degree_edit = new employee_has_degree_edit();

// Run the page
$employee_has_degree_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_degree_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployee_has_degreeedit = currentForm = new ew.Form("femployee_has_degreeedit", "edit");

// Validate form
femployee_has_degreeedit.validate = function() {
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
		<?php if ($employee_has_degree_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->id->caption(), $employee_has_degree->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_edit->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->employee_id->caption(), $employee_has_degree->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_degree->employee_id->errorMessage()) ?>");
		<?php if ($employee_has_degree_edit->degree_id->Required) { ?>
			elm = this.getElements("x" + infix + "_degree_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->degree_id->caption(), $employee_has_degree->degree_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_edit->college_or_school->Required) { ?>
			elm = this.getElements("x" + infix + "_college_or_school");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->college_or_school->caption(), $employee_has_degree->college_or_school->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_edit->university_or_board->Required) { ?>
			elm = this.getElements("x" + infix + "_university_or_board");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->university_or_board->caption(), $employee_has_degree->university_or_board->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_edit->year_of_passing->Required) { ?>
			elm = this.getElements("x" + infix + "_year_of_passing");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->year_of_passing->caption(), $employee_has_degree->year_of_passing->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_edit->scoring_marks->Required) { ?>
			elm = this.getElements("x" + infix + "_scoring_marks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->scoring_marks->caption(), $employee_has_degree->scoring_marks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_edit->certificates->Required) { ?>
			felm = this.getElements("x" + infix + "_certificates");
			elm = this.getElements("fn_x" + infix + "_certificates");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->certificates->caption(), $employee_has_degree->certificates->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_edit->others->Required) { ?>
			felm = this.getElements("x" + infix + "_others");
			elm = this.getElements("fn_x" + infix + "_others");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->others->caption(), $employee_has_degree->others->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->status->caption(), $employee_has_degree->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->modifiedby->caption(), $employee_has_degree->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->modifieddatetime->caption(), $employee_has_degree->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->HospID->caption(), $employee_has_degree->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_degree->HospID->errorMessage()) ?>");

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
femployee_has_degreeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_has_degreeedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_has_degreeedit.lists["x_degree_id"] = <?php echo $employee_has_degree_edit->degree_id->Lookup->toClientList() ?>;
femployee_has_degreeedit.lists["x_degree_id"].options = <?php echo JsonEncode($employee_has_degree_edit->degree_id->lookupOptions()) ?>;
femployee_has_degreeedit.lists["x_status"] = <?php echo $employee_has_degree_edit->status->Lookup->toClientList() ?>;
femployee_has_degreeedit.lists["x_status"].options = <?php echo JsonEncode($employee_has_degree_edit->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_has_degree_edit->showPageHeader(); ?>
<?php
$employee_has_degree_edit->showMessage();
?>
<form name="femployee_has_degreeedit" id="femployee_has_degreeedit" class="<?php echo $employee_has_degree_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_has_degree_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_has_degree_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_has_degree">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_has_degree_edit->IsModal ?>">
<?php if ($employee_has_degree->getCurrentMasterTable() == "employee") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo $employee_has_degree->employee_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_has_degree->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_has_degree_id" class="<?php echo $employee_has_degree_edit->LeftColumnClass ?>"><?php echo $employee_has_degree->id->caption() ?><?php echo ($employee_has_degree->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_degree_edit->RightColumnClass ?>"><div<?php echo $employee_has_degree->id->cellAttributes() ?>>
<span id="el_employee_has_degree_id">
<span<?php echo $employee_has_degree->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_degree->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_has_degree->id->CurrentValue) ?>">
<?php echo $employee_has_degree->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_degree->employee_id->Visible) { // employee_id ?>
	<div id="r_employee_id" class="form-group row">
		<label id="elh_employee_has_degree_employee_id" for="x_employee_id" class="<?php echo $employee_has_degree_edit->LeftColumnClass ?>"><?php echo $employee_has_degree->employee_id->caption() ?><?php echo ($employee_has_degree->employee_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_degree_edit->RightColumnClass ?>"><div<?php echo $employee_has_degree->employee_id->cellAttributes() ?>>
<?php if ($employee_has_degree->employee_id->getSessionValue() <> "") { ?>
<span id="el_employee_has_degree_employee_id">
<span<?php echo $employee_has_degree->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_degree->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_employee_id" name="x_employee_id" value="<?php echo HtmlEncode($employee_has_degree->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_employee_has_degree_employee_id">
<input type="text" data-table="employee_has_degree" data-field="x_employee_id" name="x_employee_id" id="x_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_degree->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->employee_id->EditValue ?>"<?php echo $employee_has_degree->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $employee_has_degree->employee_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_degree->degree_id->Visible) { // degree_id ?>
	<div id="r_degree_id" class="form-group row">
		<label id="elh_employee_has_degree_degree_id" for="x_degree_id" class="<?php echo $employee_has_degree_edit->LeftColumnClass ?>"><?php echo $employee_has_degree->degree_id->caption() ?><?php echo ($employee_has_degree->degree_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_degree_edit->RightColumnClass ?>"><div<?php echo $employee_has_degree->degree_id->cellAttributes() ?>>
<span id="el_employee_has_degree_degree_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_degree_id" data-value-separator="<?php echo $employee_has_degree->degree_id->displayValueSeparatorAttribute() ?>" id="x_degree_id" name="x_degree_id"<?php echo $employee_has_degree->degree_id->editAttributes() ?>>
		<?php echo $employee_has_degree->degree_id->selectOptionListHtml("x_degree_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$employee_has_degree->degree_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_degree_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_has_degree->degree_id->caption() ?>" data-title="<?php echo $employee_has_degree->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_degree_id',url:'mas_degreeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_has_degree->degree_id->Lookup->getParamTag("p_x_degree_id") ?>
</span>
<?php echo $employee_has_degree->degree_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_degree->college_or_school->Visible) { // college_or_school ?>
	<div id="r_college_or_school" class="form-group row">
		<label id="elh_employee_has_degree_college_or_school" for="x_college_or_school" class="<?php echo $employee_has_degree_edit->LeftColumnClass ?>"><?php echo $employee_has_degree->college_or_school->caption() ?><?php echo ($employee_has_degree->college_or_school->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_degree_edit->RightColumnClass ?>"><div<?php echo $employee_has_degree->college_or_school->cellAttributes() ?>>
<span id="el_employee_has_degree_college_or_school">
<input type="text" data-table="employee_has_degree" data-field="x_college_or_school" name="x_college_or_school" id="x_college_or_school" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->college_or_school->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->college_or_school->EditValue ?>"<?php echo $employee_has_degree->college_or_school->editAttributes() ?>>
</span>
<?php echo $employee_has_degree->college_or_school->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_degree->university_or_board->Visible) { // university_or_board ?>
	<div id="r_university_or_board" class="form-group row">
		<label id="elh_employee_has_degree_university_or_board" for="x_university_or_board" class="<?php echo $employee_has_degree_edit->LeftColumnClass ?>"><?php echo $employee_has_degree->university_or_board->caption() ?><?php echo ($employee_has_degree->university_or_board->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_degree_edit->RightColumnClass ?>"><div<?php echo $employee_has_degree->university_or_board->cellAttributes() ?>>
<span id="el_employee_has_degree_university_or_board">
<input type="text" data-table="employee_has_degree" data-field="x_university_or_board" name="x_university_or_board" id="x_university_or_board" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->university_or_board->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->university_or_board->EditValue ?>"<?php echo $employee_has_degree->university_or_board->editAttributes() ?>>
</span>
<?php echo $employee_has_degree->university_or_board->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_degree->year_of_passing->Visible) { // year_of_passing ?>
	<div id="r_year_of_passing" class="form-group row">
		<label id="elh_employee_has_degree_year_of_passing" for="x_year_of_passing" class="<?php echo $employee_has_degree_edit->LeftColumnClass ?>"><?php echo $employee_has_degree->year_of_passing->caption() ?><?php echo ($employee_has_degree->year_of_passing->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_degree_edit->RightColumnClass ?>"><div<?php echo $employee_has_degree->year_of_passing->cellAttributes() ?>>
<span id="el_employee_has_degree_year_of_passing">
<input type="text" data-table="employee_has_degree" data-field="x_year_of_passing" name="x_year_of_passing" id="x_year_of_passing" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->year_of_passing->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->year_of_passing->EditValue ?>"<?php echo $employee_has_degree->year_of_passing->editAttributes() ?>>
</span>
<?php echo $employee_has_degree->year_of_passing->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_degree->scoring_marks->Visible) { // scoring_marks ?>
	<div id="r_scoring_marks" class="form-group row">
		<label id="elh_employee_has_degree_scoring_marks" for="x_scoring_marks" class="<?php echo $employee_has_degree_edit->LeftColumnClass ?>"><?php echo $employee_has_degree->scoring_marks->caption() ?><?php echo ($employee_has_degree->scoring_marks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_degree_edit->RightColumnClass ?>"><div<?php echo $employee_has_degree->scoring_marks->cellAttributes() ?>>
<span id="el_employee_has_degree_scoring_marks">
<input type="text" data-table="employee_has_degree" data-field="x_scoring_marks" name="x_scoring_marks" id="x_scoring_marks" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->scoring_marks->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->scoring_marks->EditValue ?>"<?php echo $employee_has_degree->scoring_marks->editAttributes() ?>>
</span>
<?php echo $employee_has_degree->scoring_marks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_degree->certificates->Visible) { // certificates ?>
	<div id="r_certificates" class="form-group row">
		<label id="elh_employee_has_degree_certificates" class="<?php echo $employee_has_degree_edit->LeftColumnClass ?>"><?php echo $employee_has_degree->certificates->caption() ?><?php echo ($employee_has_degree->certificates->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_degree_edit->RightColumnClass ?>"><div<?php echo $employee_has_degree->certificates->cellAttributes() ?>>
<span id="el_employee_has_degree_certificates">
<div id="fd_x_certificates">
<span title="<?php echo $employee_has_degree->certificates->title() ? $employee_has_degree->certificates->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_degree->certificates->ReadOnly || $employee_has_degree->certificates->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_degree" data-field="x_certificates" name="x_certificates" id="x_certificates" multiple="multiple"<?php echo $employee_has_degree->certificates->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_certificates" id= "fn_x_certificates" value="<?php echo $employee_has_degree->certificates->Upload->FileName ?>">
<?php if (Post("fa_x_certificates") == "0") { ?>
<input type="hidden" name="fa_x_certificates" id= "fa_x_certificates" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_certificates" id= "fa_x_certificates" value="1">
<?php } ?>
<input type="hidden" name="fs_x_certificates" id= "fs_x_certificates" value="100">
<input type="hidden" name="fx_x_certificates" id= "fx_x_certificates" value="<?php echo $employee_has_degree->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_certificates" id= "fm_x_certificates" value="<?php echo $employee_has_degree->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x_certificates" id= "fc_x_certificates" value="<?php echo $employee_has_degree->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $employee_has_degree->certificates->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_degree->others->Visible) { // others ?>
	<div id="r_others" class="form-group row">
		<label id="elh_employee_has_degree_others" class="<?php echo $employee_has_degree_edit->LeftColumnClass ?>"><?php echo $employee_has_degree->others->caption() ?><?php echo ($employee_has_degree->others->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_degree_edit->RightColumnClass ?>"><div<?php echo $employee_has_degree->others->cellAttributes() ?>>
<span id="el_employee_has_degree_others">
<div id="fd_x_others">
<span title="<?php echo $employee_has_degree->others->title() ? $employee_has_degree->others->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_degree->others->ReadOnly || $employee_has_degree->others->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_degree" data-field="x_others" name="x_others" id="x_others" multiple="multiple"<?php echo $employee_has_degree->others->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_others" id= "fn_x_others" value="<?php echo $employee_has_degree->others->Upload->FileName ?>">
<?php if (Post("fa_x_others") == "0") { ?>
<input type="hidden" name="fa_x_others" id= "fa_x_others" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_others" id= "fa_x_others" value="1">
<?php } ?>
<input type="hidden" name="fs_x_others" id= "fs_x_others" value="100">
<input type="hidden" name="fx_x_others" id= "fx_x_others" value="<?php echo $employee_has_degree->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_others" id= "fm_x_others" value="<?php echo $employee_has_degree->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x_others" id= "fc_x_others" value="<?php echo $employee_has_degree->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $employee_has_degree->others->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_degree->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_has_degree_status" for="x_status" class="<?php echo $employee_has_degree_edit->LeftColumnClass ?>"><?php echo $employee_has_degree->status->caption() ?><?php echo ($employee_has_degree->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_degree_edit->RightColumnClass ?>"><div<?php echo $employee_has_degree->status->cellAttributes() ?>>
<span id="el_employee_has_degree_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_status" data-value-separator="<?php echo $employee_has_degree->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $employee_has_degree->status->editAttributes() ?>>
		<?php echo $employee_has_degree->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $employee_has_degree->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $employee_has_degree->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_has_degree->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_employee_has_degree_HospID" for="x_HospID" class="<?php echo $employee_has_degree_edit->LeftColumnClass ?>"><?php echo $employee_has_degree->HospID->caption() ?><?php echo ($employee_has_degree->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_has_degree_edit->RightColumnClass ?>"><div<?php echo $employee_has_degree->HospID->cellAttributes() ?>>
<span id="el_employee_has_degree_HospID">
<input type="text" data-table="employee_has_degree" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_has_degree->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->HospID->EditValue ?>"<?php echo $employee_has_degree->HospID->editAttributes() ?>>
</span>
<?php echo $employee_has_degree->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_has_degree_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_has_degree_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_has_degree_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_has_degree_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_has_degree_edit->terminate();
?>