<?php

namespace PHPMaker2021\project3;

// Page object
$EmployeeDocumentAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_documentadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    femployee_documentadd = currentForm = new ew.Form("femployee_documentadd", "add");

    // Add fields
    var fields = ew.vars.tables.employee_document.fields;
    femployee_documentadd.addFields([
        ["employee_id", [fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["DocumentName", [fields.DocumentName.required ? ew.Validators.required(fields.DocumentName.caption) : null, ew.Validators.integer], fields.DocumentName.isInvalid],
        ["DocumentNumber", [fields.DocumentNumber.required ? ew.Validators.required(fields.DocumentNumber.caption) : null], fields.DocumentNumber.isInvalid],
        ["DocumentUpload", [fields.DocumentUpload.required ? ew.Validators.required(fields.DocumentUpload.caption) : null], fields.DocumentUpload.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_documentadd,
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
    femployee_documentadd.validate = function () {
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
    femployee_documentadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_documentadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("femployee_documentadd");
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
<form name="femployee_documentadd" id="femployee_documentadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_document">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->employee_id->Visible) { // employee_id ?>
    <div id="r_employee_id" class="form-group row">
        <label id="elh_employee_document_employee_id" for="x_employee_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee_id->caption() ?><?= $Page->employee_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee_id->cellAttributes() ?>>
<span id="el_employee_document_employee_id">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_document" data-field="x_employee_id" name="x_employee_id" id="x_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?> aria-describedby="x_employee_id_help">
<?= $Page->employee_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DocumentName->Visible) { // DocumentName ?>
    <div id="r_DocumentName" class="form-group row">
        <label id="elh_employee_document_DocumentName" for="x_DocumentName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DocumentName->caption() ?><?= $Page->DocumentName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DocumentName->cellAttributes() ?>>
<span id="el_employee_document_DocumentName">
<input type="<?= $Page->DocumentName->getInputTextType() ?>" data-table="employee_document" data-field="x_DocumentName" name="x_DocumentName" id="x_DocumentName" size="30" placeholder="<?= HtmlEncode($Page->DocumentName->getPlaceHolder()) ?>" value="<?= $Page->DocumentName->EditValue ?>"<?= $Page->DocumentName->editAttributes() ?> aria-describedby="x_DocumentName_help">
<?= $Page->DocumentName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DocumentName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DocumentNumber->Visible) { // DocumentNumber ?>
    <div id="r_DocumentNumber" class="form-group row">
        <label id="elh_employee_document_DocumentNumber" for="x_DocumentNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DocumentNumber->caption() ?><?= $Page->DocumentNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DocumentNumber->cellAttributes() ?>>
<span id="el_employee_document_DocumentNumber">
<input type="<?= $Page->DocumentNumber->getInputTextType() ?>" data-table="employee_document" data-field="x_DocumentNumber" name="x_DocumentNumber" id="x_DocumentNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DocumentNumber->getPlaceHolder()) ?>" value="<?= $Page->DocumentNumber->EditValue ?>"<?= $Page->DocumentNumber->editAttributes() ?> aria-describedby="x_DocumentNumber_help">
<?= $Page->DocumentNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DocumentNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DocumentUpload->Visible) { // DocumentUpload ?>
    <div id="r_DocumentUpload" class="form-group row">
        <label id="elh_employee_document_DocumentUpload" for="x_DocumentUpload" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DocumentUpload->caption() ?><?= $Page->DocumentUpload->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DocumentUpload->cellAttributes() ?>>
<span id="el_employee_document_DocumentUpload">
<textarea data-table="employee_document" data-field="x_DocumentUpload" name="x_DocumentUpload" id="x_DocumentUpload" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DocumentUpload->getPlaceHolder()) ?>"<?= $Page->DocumentUpload->editAttributes() ?> aria-describedby="x_DocumentUpload_help"><?= $Page->DocumentUpload->EditValue ?></textarea>
<?= $Page->DocumentUpload->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DocumentUpload->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_employee_document_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_document_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="employee_document" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_employee_document_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_employee_document_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="employee_document" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_employee_document_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_employee_document_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="employee_document" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_documentadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_documentadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_employee_document_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_employee_document_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="employee_document" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_employee_document_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_document_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="employee_document" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_documentadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_documentadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("employee_document");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
