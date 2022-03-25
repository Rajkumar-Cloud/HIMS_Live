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
$patient_document_edit = new patient_document_edit();

// Run the page
$patient_document_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_document_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpatient_documentedit = currentForm = new ew.Form("fpatient_documentedit", "edit");

// Validate form
fpatient_documentedit.validate = function() {
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
		<?php if ($patient_document_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->id->caption(), $patient_document->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_edit->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->patient_id->caption(), $patient_document->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_edit->DocumentName->Required) { ?>
			elm = this.getElements("x" + infix + "_DocumentName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->DocumentName->caption(), $patient_document->DocumentName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_edit->DocumentUpload->Required) { ?>
			felm = this.getElements("x" + infix + "_DocumentUpload");
			elm = this.getElements("fn_x" + infix + "_DocumentUpload");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $patient_document->DocumentUpload->caption(), $patient_document->DocumentUpload->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->status->caption(), $patient_document->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->modifiedby->caption(), $patient_document->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->modifieddatetime->caption(), $patient_document->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_edit->DocumentNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_DocumentNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->DocumentNumber->caption(), $patient_document->DocumentNumber->RequiredErrorMessage)) ?>");
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
fpatient_documentedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_documentedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_documentedit.lists["x_DocumentName"] = <?php echo $patient_document_edit->DocumentName->Lookup->toClientList() ?>;
fpatient_documentedit.lists["x_DocumentName"].options = <?php echo JsonEncode($patient_document_edit->DocumentName->lookupOptions()) ?>;
fpatient_documentedit.lists["x_status"] = <?php echo $patient_document_edit->status->Lookup->toClientList() ?>;
fpatient_documentedit.lists["x_status"].options = <?php echo JsonEncode($patient_document_edit->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_document_edit->showPageHeader(); ?>
<?php
$patient_document_edit->showMessage();
?>
<form name="fpatient_documentedit" id="fpatient_documentedit" class="<?php echo $patient_document_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_document_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_document_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_document">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_document_edit->IsModal ?>">
<?php if ($patient_document->getCurrentMasterTable() == "patient") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo $patient_document->patient_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($patient_document->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_document_id" class="<?php echo $patient_document_edit->LeftColumnClass ?>"><?php echo $patient_document->id->caption() ?><?php echo ($patient_document->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_document_edit->RightColumnClass ?>"><div<?php echo $patient_document->id->cellAttributes() ?>>
<span id="el_patient_document_id">
<span<?php echo $patient_document->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_document->id->CurrentValue) ?>">
<?php echo $patient_document->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_document->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_patient_document_patient_id" for="x_patient_id" class="<?php echo $patient_document_edit->LeftColumnClass ?>"><?php echo $patient_document->patient_id->caption() ?><?php echo ($patient_document->patient_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_document_edit->RightColumnClass ?>"><div<?php echo $patient_document->patient_id->cellAttributes() ?>>
<span id="el_patient_document_patient_id">
<span<?php echo $patient_document->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->patient_id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" value="<?php echo HtmlEncode($patient_document->patient_id->CurrentValue) ?>">
<?php echo $patient_document->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_document->DocumentName->Visible) { // DocumentName ?>
	<div id="r_DocumentName" class="form-group row">
		<label id="elh_patient_document_DocumentName" for="x_DocumentName" class="<?php echo $patient_document_edit->LeftColumnClass ?>"><?php echo $patient_document->DocumentName->caption() ?><?php echo ($patient_document->DocumentName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_document_edit->RightColumnClass ?>"><div<?php echo $patient_document->DocumentName->cellAttributes() ?>>
<span id="el_patient_document_DocumentName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_document" data-field="x_DocumentName" data-value-separator="<?php echo $patient_document->DocumentName->displayValueSeparatorAttribute() ?>" id="x_DocumentName" name="x_DocumentName"<?php echo $patient_document->DocumentName->editAttributes() ?>>
		<?php echo $patient_document->DocumentName->selectOptionListHtml("x_DocumentName") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$patient_document->DocumentName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_document->DocumentName->caption() ?>" data-title="<?php echo $patient_document->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DocumentName',url:'mas_documentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $patient_document->DocumentName->Lookup->getParamTag("p_x_DocumentName") ?>
</span>
<?php echo $patient_document->DocumentName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_document->DocumentUpload->Visible) { // DocumentUpload ?>
	<div id="r_DocumentUpload" class="form-group row">
		<label id="elh_patient_document_DocumentUpload" class="<?php echo $patient_document_edit->LeftColumnClass ?>"><?php echo $patient_document->DocumentUpload->caption() ?><?php echo ($patient_document->DocumentUpload->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_document_edit->RightColumnClass ?>"><div<?php echo $patient_document->DocumentUpload->cellAttributes() ?>>
<span id="el_patient_document_DocumentUpload">
<div id="fd_x_DocumentUpload">
<span title="<?php echo $patient_document->DocumentUpload->title() ? $patient_document->DocumentUpload->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($patient_document->DocumentUpload->ReadOnly || $patient_document->DocumentUpload->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="patient_document" data-field="x_DocumentUpload" name="x_DocumentUpload" id="x_DocumentUpload"<?php echo $patient_document->DocumentUpload->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_DocumentUpload" id= "fn_x_DocumentUpload" value="<?php echo $patient_document->DocumentUpload->Upload->FileName ?>">
<?php if (Post("fa_x_DocumentUpload") == "0") { ?>
<input type="hidden" name="fa_x_DocumentUpload" id= "fa_x_DocumentUpload" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_DocumentUpload" id= "fa_x_DocumentUpload" value="1">
<?php } ?>
<input type="hidden" name="fs_x_DocumentUpload" id= "fs_x_DocumentUpload" value="450">
<input type="hidden" name="fx_x_DocumentUpload" id= "fx_x_DocumentUpload" value="<?php echo $patient_document->DocumentUpload->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_DocumentUpload" id= "fm_x_DocumentUpload" value="<?php echo $patient_document->DocumentUpload->UploadMaxFileSize ?>">
</div>
<table id="ft_x_DocumentUpload" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $patient_document->DocumentUpload->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_document->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_document_status" for="x_status" class="<?php echo $patient_document_edit->LeftColumnClass ?>"><?php echo $patient_document->status->caption() ?><?php echo ($patient_document->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_document_edit->RightColumnClass ?>"><div<?php echo $patient_document->status->cellAttributes() ?>>
<span id="el_patient_document_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_document" data-field="x_status" data-value-separator="<?php echo $patient_document->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_document->status->editAttributes() ?>>
		<?php echo $patient_document->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $patient_document->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $patient_document->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_document->DocumentNumber->Visible) { // DocumentNumber ?>
	<div id="r_DocumentNumber" class="form-group row">
		<label id="elh_patient_document_DocumentNumber" for="x_DocumentNumber" class="<?php echo $patient_document_edit->LeftColumnClass ?>"><?php echo $patient_document->DocumentNumber->caption() ?><?php echo ($patient_document->DocumentNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_document_edit->RightColumnClass ?>"><div<?php echo $patient_document->DocumentNumber->cellAttributes() ?>>
<span id="el_patient_document_DocumentNumber">
<input type="text" data-table="patient_document" data-field="x_DocumentNumber" name="x_DocumentNumber" id="x_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_document->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $patient_document->DocumentNumber->EditValue ?>"<?php echo $patient_document->DocumentNumber->editAttributes() ?>>
</span>
<?php echo $patient_document->DocumentNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_document_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_document_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_document_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_document_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_document_edit->terminate();
?>