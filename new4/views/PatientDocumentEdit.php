<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientDocumentEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_documentedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpatient_documentedit = currentForm = new ew.Form("fpatient_documentedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_document")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_document)
        ew.vars.tables.patient_document = currentTable;
    fpatient_documentedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["patient_id", [fields.patient_id.visible && fields.patient_id.required ? ew.Validators.required(fields.patient_id.caption) : null], fields.patient_id.isInvalid],
        ["DocumentName", [fields.DocumentName.visible && fields.DocumentName.required ? ew.Validators.required(fields.DocumentName.caption) : null], fields.DocumentName.isInvalid],
        ["DocumentUpload", [fields.DocumentUpload.visible && fields.DocumentUpload.required ? ew.Validators.fileRequired(fields.DocumentUpload.caption) : null], fields.DocumentUpload.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["DocumentNumber", [fields.DocumentNumber.visible && fields.DocumentNumber.required ? ew.Validators.required(fields.DocumentNumber.caption) : null], fields.DocumentNumber.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_documentedit,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    fpatient_documentedit.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
        }

        // Process detail forms
        var dfs = $fobj.find("input[name='detailpage']").get();
        for (var i = 0; i < dfs.length; i++) {
            var df = dfs[i],
                val = df.value,
                frm = ew.forms.get(val);
            if (val && frm && !frm.validate())
                return false;
        }
        return true;
    }

    // Form_CustomValidate
    fpatient_documentedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_documentedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_documentedit.lists.DocumentName = <?= $Page->DocumentName->toClientList($Page) ?>;
    fpatient_documentedit.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("fpatient_documentedit");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpatient_documentedit" id="fpatient_documentedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_document">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "patient") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="patient">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->patient_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_patient_document_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_document_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <div id="r_patient_id" class="form-group row">
        <label id="elh_patient_document_patient_id" for="x_patient_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patient_id->caption() ?><?= $Page->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_id->cellAttributes() ?>>
<span id="el_patient_document_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->patient_id->getDisplayValue($Page->patient_id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_patient_id" data-hidden="1" name="x_patient_id" id="x_patient_id" value="<?= HtmlEncode($Page->patient_id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DocumentName->Visible) { // DocumentName ?>
    <div id="r_DocumentName" class="form-group row">
        <label id="elh_patient_document_DocumentName" for="x_DocumentName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DocumentName->caption() ?><?= $Page->DocumentName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DocumentName->cellAttributes() ?>>
<span id="el_patient_document_DocumentName">
<div class="input-group flex-nowrap">
    <select
        id="x_DocumentName"
        name="x_DocumentName"
        class="form-control ew-select<?= $Page->DocumentName->isInvalidClass() ?>"
        data-select2-id="patient_document_x_DocumentName"
        data-table="patient_document"
        data-field="x_DocumentName"
        data-value-separator="<?= $Page->DocumentName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DocumentName->getPlaceHolder()) ?>"
        <?= $Page->DocumentName->editAttributes() ?>>
        <?= $Page->DocumentName->selectOptionListHtml("x_DocumentName") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$Page->DocumentName->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DocumentName" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->DocumentName->caption() ?>" data-title="<?= $Page->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DocumentName',url:'<?= GetUrl("MasDocumentAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->DocumentName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DocumentName->getErrorMessage() ?></div>
<?= $Page->DocumentName->Lookup->getParamTag($Page, "p_x_DocumentName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_document_x_DocumentName']"),
        options = { name: "x_DocumentName", selectId: "patient_document_x_DocumentName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_document.fields.DocumentName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DocumentUpload->Visible) { // DocumentUpload ?>
    <div id="r_DocumentUpload" class="form-group row">
        <label id="elh_patient_document_DocumentUpload" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DocumentUpload->caption() ?><?= $Page->DocumentUpload->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DocumentUpload->cellAttributes() ?>>
<span id="el_patient_document_DocumentUpload">
<div id="fd_x_DocumentUpload">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->DocumentUpload->title() ?>" data-table="patient_document" data-field="x_DocumentUpload" name="x_DocumentUpload" id="x_DocumentUpload" lang="<?= CurrentLanguageID() ?>"<?= $Page->DocumentUpload->editAttributes() ?><?= ($Page->DocumentUpload->ReadOnly || $Page->DocumentUpload->Disabled) ? " disabled" : "" ?> aria-describedby="x_DocumentUpload_help">
        <label class="custom-file-label ew-file-label" for="x_DocumentUpload"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<?= $Page->DocumentUpload->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DocumentUpload->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_DocumentUpload" id= "fn_x_DocumentUpload" value="<?= $Page->DocumentUpload->Upload->FileName ?>">
<input type="hidden" name="fa_x_DocumentUpload" id= "fa_x_DocumentUpload" value="<?= (Post("fa_x_DocumentUpload") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_DocumentUpload" id= "fs_x_DocumentUpload" value="450">
<input type="hidden" name="fx_x_DocumentUpload" id= "fx_x_DocumentUpload" value="<?= $Page->DocumentUpload->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_DocumentUpload" id= "fm_x_DocumentUpload" value="<?= $Page->DocumentUpload->UploadMaxFileSize ?>">
</div>
<table id="ft_x_DocumentUpload" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_patient_document_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_patient_document_status">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="patient_document_x_status"
        data-table="patient_document"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x_status") ?>
    </select>
    <?= $Page->status->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_document_x_status']"),
        options = { name: "x_status", selectId: "patient_document_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_document.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DocumentNumber->Visible) { // DocumentNumber ?>
    <div id="r_DocumentNumber" class="form-group row">
        <label id="elh_patient_document_DocumentNumber" for="x_DocumentNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DocumentNumber->caption() ?><?= $Page->DocumentNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DocumentNumber->cellAttributes() ?>>
<span id="el_patient_document_DocumentNumber">
<input type="<?= $Page->DocumentNumber->getInputTextType() ?>" data-table="patient_document" data-field="x_DocumentNumber" name="x_DocumentNumber" id="x_DocumentNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DocumentNumber->getPlaceHolder()) ?>" value="<?= $Page->DocumentNumber->EditValue ?>"<?= $Page->DocumentNumber->editAttributes() ?> aria-describedby="x_DocumentNumber_help">
<?= $Page->DocumentNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DocumentNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("patient_document");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
