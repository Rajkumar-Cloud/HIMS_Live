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
$patient_document_add = new patient_document_add();

// Run the page
$patient_document_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_document_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_documentadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpatient_documentadd = currentForm = new ew.Form("fpatient_documentadd", "add");

	// Validate form
	fpatient_documentadd.validate = function() {
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
			<?php if ($patient_document_add->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document_add->patient_id->caption(), $patient_document_add->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_document_add->patient_id->errorMessage()) ?>");
			<?php if ($patient_document_add->DocumentName->Required) { ?>
				elm = this.getElements("x" + infix + "_DocumentName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document_add->DocumentName->caption(), $patient_document_add->DocumentName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_document_add->DocumentUpload->Required) { ?>
				felm = this.getElements("x" + infix + "_DocumentUpload");
				elm = this.getElements("fn_x" + infix + "_DocumentUpload");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $patient_document_add->DocumentUpload->caption(), $patient_document_add->DocumentUpload->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_document_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document_add->status->caption(), $patient_document_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_document_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document_add->createdby->caption(), $patient_document_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_document_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document_add->createddatetime->caption(), $patient_document_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_document_add->DocumentNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_DocumentNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document_add->DocumentNumber->caption(), $patient_document_add->DocumentNumber->RequiredErrorMessage)) ?>");
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
	fpatient_documentadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_documentadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_documentadd.lists["x_DocumentName"] = <?php echo $patient_document_add->DocumentName->Lookup->toClientList($patient_document_add) ?>;
	fpatient_documentadd.lists["x_DocumentName"].options = <?php echo JsonEncode($patient_document_add->DocumentName->lookupOptions()) ?>;
	fpatient_documentadd.lists["x_status"] = <?php echo $patient_document_add->status->Lookup->toClientList($patient_document_add) ?>;
	fpatient_documentadd.lists["x_status"].options = <?php echo JsonEncode($patient_document_add->status->lookupOptions()) ?>;
	loadjs.done("fpatient_documentadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_document_add->showPageHeader(); ?>
<?php
$patient_document_add->showMessage();
?>
<form name="fpatient_documentadd" id="fpatient_documentadd" class="<?php echo $patient_document_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_document">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_document_add->IsModal ?>">
<?php if ($patient_document->getCurrentMasterTable() == "patient") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_document_add->patient_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($patient_document_add->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_patient_document_patient_id" for="x_patient_id" class="<?php echo $patient_document_add->LeftColumnClass ?>"><?php echo $patient_document_add->patient_id->caption() ?><?php echo $patient_document_add->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_document_add->RightColumnClass ?>"><div <?php echo $patient_document_add->patient_id->cellAttributes() ?>>
<?php if ($patient_document_add->patient_id->getSessionValue() != "") { ?>
<span id="el_patient_document_patient_id">
<span<?php echo $patient_document_add->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_document_add->patient_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_patient_id" name="x_patient_id" value="<?php echo HtmlEncode($patient_document_add->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_document_patient_id">
<input type="text" data-table="patient_document" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_document_add->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_document_add->patient_id->EditValue ?>"<?php echo $patient_document_add->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_document_add->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_document_add->DocumentName->Visible) { // DocumentName ?>
	<div id="r_DocumentName" class="form-group row">
		<label id="elh_patient_document_DocumentName" for="x_DocumentName" class="<?php echo $patient_document_add->LeftColumnClass ?>"><?php echo $patient_document_add->DocumentName->caption() ?><?php echo $patient_document_add->DocumentName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_document_add->RightColumnClass ?>"><div <?php echo $patient_document_add->DocumentName->cellAttributes() ?>>
<span id="el_patient_document_DocumentName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_document" data-field="x_DocumentName" data-value-separator="<?php echo $patient_document_add->DocumentName->displayValueSeparatorAttribute() ?>" id="x_DocumentName" name="x_DocumentName"<?php echo $patient_document_add->DocumentName->editAttributes() ?>>
			<?php echo $patient_document_add->DocumentName->selectOptionListHtml("x_DocumentName") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$patient_document_add->DocumentName->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_document_add->DocumentName->caption() ?>" data-title="<?php echo $patient_document_add->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DocumentName',url:'mas_documentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $patient_document_add->DocumentName->Lookup->getParamTag($patient_document_add, "p_x_DocumentName") ?>
</span>
<?php echo $patient_document_add->DocumentName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_document_add->DocumentUpload->Visible) { // DocumentUpload ?>
	<div id="r_DocumentUpload" class="form-group row">
		<label id="elh_patient_document_DocumentUpload" class="<?php echo $patient_document_add->LeftColumnClass ?>"><?php echo $patient_document_add->DocumentUpload->caption() ?><?php echo $patient_document_add->DocumentUpload->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_document_add->RightColumnClass ?>"><div <?php echo $patient_document_add->DocumentUpload->cellAttributes() ?>>
<span id="el_patient_document_DocumentUpload">
<div id="fd_x_DocumentUpload">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $patient_document_add->DocumentUpload->title() ?>" data-table="patient_document" data-field="x_DocumentUpload" name="x_DocumentUpload" id="x_DocumentUpload" lang="<?php echo CurrentLanguageID() ?>"<?php echo $patient_document_add->DocumentUpload->editAttributes() ?><?php if ($patient_document_add->DocumentUpload->ReadOnly || $patient_document_add->DocumentUpload->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_DocumentUpload"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_DocumentUpload" id= "fn_x_DocumentUpload" value="<?php echo $patient_document_add->DocumentUpload->Upload->FileName ?>">
<input type="hidden" name="fa_x_DocumentUpload" id= "fa_x_DocumentUpload" value="0">
<input type="hidden" name="fs_x_DocumentUpload" id= "fs_x_DocumentUpload" value="450">
<input type="hidden" name="fx_x_DocumentUpload" id= "fx_x_DocumentUpload" value="<?php echo $patient_document_add->DocumentUpload->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_DocumentUpload" id= "fm_x_DocumentUpload" value="<?php echo $patient_document_add->DocumentUpload->UploadMaxFileSize ?>">
</div>
<table id="ft_x_DocumentUpload" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $patient_document_add->DocumentUpload->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_document_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_document_status" for="x_status" class="<?php echo $patient_document_add->LeftColumnClass ?>"><?php echo $patient_document_add->status->caption() ?><?php echo $patient_document_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_document_add->RightColumnClass ?>"><div <?php echo $patient_document_add->status->cellAttributes() ?>>
<span id="el_patient_document_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_document" data-field="x_status" data-value-separator="<?php echo $patient_document_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_document_add->status->editAttributes() ?>>
			<?php echo $patient_document_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $patient_document_add->status->Lookup->getParamTag($patient_document_add, "p_x_status") ?>
</span>
<?php echo $patient_document_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_document_add->DocumentNumber->Visible) { // DocumentNumber ?>
	<div id="r_DocumentNumber" class="form-group row">
		<label id="elh_patient_document_DocumentNumber" for="x_DocumentNumber" class="<?php echo $patient_document_add->LeftColumnClass ?>"><?php echo $patient_document_add->DocumentNumber->caption() ?><?php echo $patient_document_add->DocumentNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_document_add->RightColumnClass ?>"><div <?php echo $patient_document_add->DocumentNumber->cellAttributes() ?>>
<span id="el_patient_document_DocumentNumber">
<input type="text" data-table="patient_document" data-field="x_DocumentNumber" name="x_DocumentNumber" id="x_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_document_add->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $patient_document_add->DocumentNumber->EditValue ?>"<?php echo $patient_document_add->DocumentNumber->editAttributes() ?>>
</span>
<?php echo $patient_document_add->DocumentNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_document_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_document_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_document_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_document_add->showPageFooter();
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
$patient_document_add->terminate();
?>