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
$employee_document_edit = new employee_document_edit();

// Run the page
$employee_document_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_document_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployee_documentedit = currentForm = new ew.Form("femployee_documentedit", "edit");

// Validate form
femployee_documentedit.validate = function() {
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
		<?php if ($employee_document_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->id->caption(), $employee_document->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_edit->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->employee_id->caption(), $employee_document->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_document->employee_id->errorMessage()) ?>");
		<?php if ($employee_document_edit->DocumentName->Required) { ?>
			elm = this.getElements("x" + infix + "_DocumentName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->DocumentName->caption(), $employee_document->DocumentName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_edit->DocumentNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_DocumentNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->DocumentNumber->caption(), $employee_document->DocumentNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_edit->DocumentUpload->Required) { ?>
			felm = this.getElements("x" + infix + "_DocumentUpload");
			elm = this.getElements("fn_x" + infix + "_DocumentUpload");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_document->DocumentUpload->caption(), $employee_document->DocumentUpload->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->status->caption(), $employee_document->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->modifiedby->caption(), $employee_document->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->modifieddatetime->caption(), $employee_document->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->HospID->caption(), $employee_document->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_document->HospID->errorMessage()) ?>");

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
femployee_documentedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_documentedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_documentedit.lists["x_DocumentName"] = <?php echo $employee_document_edit->DocumentName->Lookup->toClientList() ?>;
femployee_documentedit.lists["x_DocumentName"].options = <?php echo JsonEncode($employee_document_edit->DocumentName->lookupOptions()) ?>;
femployee_documentedit.lists["x_status"] = <?php echo $employee_document_edit->status->Lookup->toClientList() ?>;
femployee_documentedit.lists["x_status"].options = <?php echo JsonEncode($employee_document_edit->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_document_edit->showPageHeader(); ?>
<?php
$employee_document_edit->showMessage();
?>
<form name="femployee_documentedit" id="femployee_documentedit" class="<?php echo $employee_document_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_document_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_document_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_document">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_document_edit->IsModal ?>">
<?php if ($employee_document->getCurrentMasterTable() == "employee") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo $employee_document->employee_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_document->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_document_id" class="<?php echo $employee_document_edit->LeftColumnClass ?>"><?php echo $employee_document->id->caption() ?><?php echo ($employee_document->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_document_edit->RightColumnClass ?>"><div<?php echo $employee_document->id->cellAttributes() ?>>
<span id="el_employee_document_id">
<span<?php echo $employee_document->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_document->id->CurrentValue) ?>">
<?php echo $employee_document->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_document->employee_id->Visible) { // employee_id ?>
	<div id="r_employee_id" class="form-group row">
		<label id="elh_employee_document_employee_id" for="x_employee_id" class="<?php echo $employee_document_edit->LeftColumnClass ?>"><?php echo $employee_document->employee_id->caption() ?><?php echo ($employee_document->employee_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_document_edit->RightColumnClass ?>"><div<?php echo $employee_document->employee_id->cellAttributes() ?>>
<?php if ($employee_document->employee_id->getSessionValue() <> "") { ?>
<span id="el_employee_document_employee_id">
<span<?php echo $employee_document->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_employee_id" name="x_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_employee_document_employee_id">
<input type="text" data-table="employee_document" data-field="x_employee_id" name="x_employee_id" id="x_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_document->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_document->employee_id->EditValue ?>"<?php echo $employee_document->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $employee_document->employee_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_document->DocumentName->Visible) { // DocumentName ?>
	<div id="r_DocumentName" class="form-group row">
		<label id="elh_employee_document_DocumentName" for="x_DocumentName" class="<?php echo $employee_document_edit->LeftColumnClass ?>"><?php echo $employee_document->DocumentName->caption() ?><?php echo ($employee_document->DocumentName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_document_edit->RightColumnClass ?>"><div<?php echo $employee_document->DocumentName->cellAttributes() ?>>
<span id="el_employee_document_DocumentName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_DocumentName" data-value-separator="<?php echo $employee_document->DocumentName->displayValueSeparatorAttribute() ?>" id="x_DocumentName" name="x_DocumentName"<?php echo $employee_document->DocumentName->editAttributes() ?>>
		<?php echo $employee_document->DocumentName->selectOptionListHtml("x_DocumentName") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$employee_document->DocumentName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_document->DocumentName->caption() ?>" data-title="<?php echo $employee_document->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DocumentName',url:'mas_documentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_document->DocumentName->Lookup->getParamTag("p_x_DocumentName") ?>
</span>
<?php echo $employee_document->DocumentName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_document->DocumentNumber->Visible) { // DocumentNumber ?>
	<div id="r_DocumentNumber" class="form-group row">
		<label id="elh_employee_document_DocumentNumber" for="x_DocumentNumber" class="<?php echo $employee_document_edit->LeftColumnClass ?>"><?php echo $employee_document->DocumentNumber->caption() ?><?php echo ($employee_document->DocumentNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_document_edit->RightColumnClass ?>"><div<?php echo $employee_document->DocumentNumber->cellAttributes() ?>>
<span id="el_employee_document_DocumentNumber">
<input type="text" data-table="employee_document" data-field="x_DocumentNumber" name="x_DocumentNumber" id="x_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_document->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $employee_document->DocumentNumber->EditValue ?>"<?php echo $employee_document->DocumentNumber->editAttributes() ?>>
</span>
<?php echo $employee_document->DocumentNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_document->DocumentUpload->Visible) { // DocumentUpload ?>
	<div id="r_DocumentUpload" class="form-group row">
		<label id="elh_employee_document_DocumentUpload" class="<?php echo $employee_document_edit->LeftColumnClass ?>"><?php echo $employee_document->DocumentUpload->caption() ?><?php echo ($employee_document->DocumentUpload->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_document_edit->RightColumnClass ?>"><div<?php echo $employee_document->DocumentUpload->cellAttributes() ?>>
<span id="el_employee_document_DocumentUpload">
<div id="fd_x_DocumentUpload">
<span title="<?php echo $employee_document->DocumentUpload->title() ? $employee_document->DocumentUpload->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_document->DocumentUpload->ReadOnly || $employee_document->DocumentUpload->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_document" data-field="x_DocumentUpload" name="x_DocumentUpload" id="x_DocumentUpload"<?php echo $employee_document->DocumentUpload->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_DocumentUpload" id= "fn_x_DocumentUpload" value="<?php echo $employee_document->DocumentUpload->Upload->FileName ?>">
<?php if (Post("fa_x_DocumentUpload") == "0") { ?>
<input type="hidden" name="fa_x_DocumentUpload" id= "fa_x_DocumentUpload" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_DocumentUpload" id= "fa_x_DocumentUpload" value="1">
<?php } ?>
<input type="hidden" name="fs_x_DocumentUpload" id= "fs_x_DocumentUpload" value="450">
<input type="hidden" name="fx_x_DocumentUpload" id= "fx_x_DocumentUpload" value="<?php echo $employee_document->DocumentUpload->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_DocumentUpload" id= "fm_x_DocumentUpload" value="<?php echo $employee_document->DocumentUpload->UploadMaxFileSize ?>">
</div>
<table id="ft_x_DocumentUpload" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $employee_document->DocumentUpload->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_document->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_document_status" for="x_status" class="<?php echo $employee_document_edit->LeftColumnClass ?>"><?php echo $employee_document->status->caption() ?><?php echo ($employee_document->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_document_edit->RightColumnClass ?>"><div<?php echo $employee_document->status->cellAttributes() ?>>
<span id="el_employee_document_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_status" data-value-separator="<?php echo $employee_document->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $employee_document->status->editAttributes() ?>>
		<?php echo $employee_document->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $employee_document->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $employee_document->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_document->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_employee_document_HospID" for="x_HospID" class="<?php echo $employee_document_edit->LeftColumnClass ?>"><?php echo $employee_document->HospID->caption() ?><?php echo ($employee_document->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_document_edit->RightColumnClass ?>"><div<?php echo $employee_document->HospID->cellAttributes() ?>>
<span id="el_employee_document_HospID">
<input type="text" data-table="employee_document" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_document->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_document->HospID->EditValue ?>"<?php echo $employee_document->HospID->editAttributes() ?>>
</span>
<?php echo $employee_document->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_document_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_document_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_document_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_document_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_document_edit->terminate();
?>