<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeetrainingsessionsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployeetrainingsessionsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    femployeetrainingsessionsedit = currentForm = new ew.Form("femployeetrainingsessionsedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employeetrainingsessions")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employeetrainingsessions)
        ew.vars.tables.employeetrainingsessions = currentTable;
    femployeetrainingsessionsedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee", [fields.employee.visible && fields.employee.required ? ew.Validators.required(fields.employee.caption) : null, ew.Validators.integer], fields.employee.isInvalid],
        ["trainingSession", [fields.trainingSession.visible && fields.trainingSession.required ? ew.Validators.required(fields.trainingSession.caption) : null, ew.Validators.integer], fields.trainingSession.isInvalid],
        ["feedBack", [fields.feedBack.visible && fields.feedBack.required ? ew.Validators.required(fields.feedBack.caption) : null], fields.feedBack.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["proof", [fields.proof.visible && fields.proof.required ? ew.Validators.required(fields.proof.caption) : null], fields.proof.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployeetrainingsessionsedit,
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
    femployeetrainingsessionsedit.validate = function () {
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
    femployeetrainingsessionsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployeetrainingsessionsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployeetrainingsessionsedit.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("femployeetrainingsessionsedit");
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
<form name="femployeetrainingsessionsedit" id="femployeetrainingsessionsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employeetrainingsessions">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_employeetrainingsessions_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_employeetrainingsessions_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employeetrainingsessions" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <div id="r_employee" class="form-group row">
        <label id="elh_employeetrainingsessions_employee" for="x_employee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee->caption() ?><?= $Page->employee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee->cellAttributes() ?>>
<span id="el_employeetrainingsessions_employee">
<input type="<?= $Page->employee->getInputTextType() ?>" data-table="employeetrainingsessions" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?= HtmlEncode($Page->employee->getPlaceHolder()) ?>" value="<?= $Page->employee->EditValue ?>"<?= $Page->employee->editAttributes() ?> aria-describedby="x_employee_help">
<?= $Page->employee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->trainingSession->Visible) { // trainingSession ?>
    <div id="r_trainingSession" class="form-group row">
        <label id="elh_employeetrainingsessions_trainingSession" for="x_trainingSession" class="<?= $Page->LeftColumnClass ?>"><?= $Page->trainingSession->caption() ?><?= $Page->trainingSession->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->trainingSession->cellAttributes() ?>>
<span id="el_employeetrainingsessions_trainingSession">
<input type="<?= $Page->trainingSession->getInputTextType() ?>" data-table="employeetrainingsessions" data-field="x_trainingSession" name="x_trainingSession" id="x_trainingSession" size="30" placeholder="<?= HtmlEncode($Page->trainingSession->getPlaceHolder()) ?>" value="<?= $Page->trainingSession->EditValue ?>"<?= $Page->trainingSession->editAttributes() ?> aria-describedby="x_trainingSession_help">
<?= $Page->trainingSession->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->trainingSession->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->feedBack->Visible) { // feedBack ?>
    <div id="r_feedBack" class="form-group row">
        <label id="elh_employeetrainingsessions_feedBack" for="x_feedBack" class="<?= $Page->LeftColumnClass ?>"><?= $Page->feedBack->caption() ?><?= $Page->feedBack->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->feedBack->cellAttributes() ?>>
<span id="el_employeetrainingsessions_feedBack">
<textarea data-table="employeetrainingsessions" data-field="x_feedBack" name="x_feedBack" id="x_feedBack" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->feedBack->getPlaceHolder()) ?>"<?= $Page->feedBack->editAttributes() ?> aria-describedby="x_feedBack_help"><?= $Page->feedBack->EditValue ?></textarea>
<?= $Page->feedBack->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->feedBack->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_employeetrainingsessions_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_employeetrainingsessions_status">
<template id="tp_x_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employeetrainingsessions" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_status" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_status"
    name="x_status"
    value="<?= HtmlEncode($Page->status->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_status"
    data-target="dsl_x_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->status->isInvalidClass() ?>"
    data-table="employeetrainingsessions"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>>
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->proof->Visible) { // proof ?>
    <div id="r_proof" class="form-group row">
        <label id="elh_employeetrainingsessions_proof" for="x_proof" class="<?= $Page->LeftColumnClass ?>"><?= $Page->proof->caption() ?><?= $Page->proof->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->proof->cellAttributes() ?>>
<span id="el_employeetrainingsessions_proof">
<textarea data-table="employeetrainingsessions" data-field="x_proof" name="x_proof" id="x_proof" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->proof->getPlaceHolder()) ?>"<?= $Page->proof->editAttributes() ?> aria-describedby="x_proof_help"><?= $Page->proof->EditValue ?></textarea>
<?= $Page->proof->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->proof->getErrorMessage() ?></div>
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
    ew.addEventHandlers("employeetrainingsessions");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
