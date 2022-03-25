<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeLanguagesAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_languagesadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    femployee_languagesadd = currentForm = new ew.Form("femployee_languagesadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_languages")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_languages)
        ew.vars.tables.employee_languages = currentTable;
    femployee_languagesadd.addFields([
        ["language_id", [fields.language_id.visible && fields.language_id.required ? ew.Validators.required(fields.language_id.caption) : null, ew.Validators.integer], fields.language_id.isInvalid],
        ["employee", [fields.employee.visible && fields.employee.required ? ew.Validators.required(fields.employee.caption) : null, ew.Validators.integer], fields.employee.isInvalid],
        ["reading", [fields.reading.visible && fields.reading.required ? ew.Validators.required(fields.reading.caption) : null], fields.reading.isInvalid],
        ["speaking", [fields.speaking.visible && fields.speaking.required ? ew.Validators.required(fields.speaking.caption) : null], fields.speaking.isInvalid],
        ["writing", [fields.writing.visible && fields.writing.required ? ew.Validators.required(fields.writing.caption) : null], fields.writing.isInvalid],
        ["understanding", [fields.understanding.visible && fields.understanding.required ? ew.Validators.required(fields.understanding.caption) : null], fields.understanding.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_languagesadd,
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
    femployee_languagesadd.validate = function () {
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
    femployee_languagesadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_languagesadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_languagesadd.lists.reading = <?= $Page->reading->toClientList($Page) ?>;
    femployee_languagesadd.lists.speaking = <?= $Page->speaking->toClientList($Page) ?>;
    femployee_languagesadd.lists.writing = <?= $Page->writing->toClientList($Page) ?>;
    femployee_languagesadd.lists.understanding = <?= $Page->understanding->toClientList($Page) ?>;
    loadjs.done("femployee_languagesadd");
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
<form name="femployee_languagesadd" id="femployee_languagesadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_languages">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->language_id->Visible) { // language_id ?>
    <div id="r_language_id" class="form-group row">
        <label id="elh_employee_languages_language_id" for="x_language_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->language_id->caption() ?><?= $Page->language_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->language_id->cellAttributes() ?>>
<span id="el_employee_languages_language_id">
<input type="<?= $Page->language_id->getInputTextType() ?>" data-table="employee_languages" data-field="x_language_id" name="x_language_id" id="x_language_id" size="30" placeholder="<?= HtmlEncode($Page->language_id->getPlaceHolder()) ?>" value="<?= $Page->language_id->EditValue ?>"<?= $Page->language_id->editAttributes() ?> aria-describedby="x_language_id_help">
<?= $Page->language_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->language_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <div id="r_employee" class="form-group row">
        <label id="elh_employee_languages_employee" for="x_employee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee->caption() ?><?= $Page->employee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_languages_employee">
<input type="<?= $Page->employee->getInputTextType() ?>" data-table="employee_languages" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?= HtmlEncode($Page->employee->getPlaceHolder()) ?>" value="<?= $Page->employee->EditValue ?>"<?= $Page->employee->editAttributes() ?> aria-describedby="x_employee_help">
<?= $Page->employee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->reading->Visible) { // reading ?>
    <div id="r_reading" class="form-group row">
        <label id="elh_employee_languages_reading" class="<?= $Page->LeftColumnClass ?>"><?= $Page->reading->caption() ?><?= $Page->reading->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->reading->cellAttributes() ?>>
<span id="el_employee_languages_reading">
<template id="tp_x_reading">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_languages" data-field="x_reading" name="x_reading" id="x_reading"<?= $Page->reading->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_reading" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_reading"
    name="x_reading"
    value="<?= HtmlEncode($Page->reading->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_reading"
    data-target="dsl_x_reading"
    data-repeatcolumn="5"
    class="form-control<?= $Page->reading->isInvalidClass() ?>"
    data-table="employee_languages"
    data-field="x_reading"
    data-value-separator="<?= $Page->reading->displayValueSeparatorAttribute() ?>"
    <?= $Page->reading->editAttributes() ?>>
<?= $Page->reading->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->reading->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->speaking->Visible) { // speaking ?>
    <div id="r_speaking" class="form-group row">
        <label id="elh_employee_languages_speaking" class="<?= $Page->LeftColumnClass ?>"><?= $Page->speaking->caption() ?><?= $Page->speaking->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->speaking->cellAttributes() ?>>
<span id="el_employee_languages_speaking">
<template id="tp_x_speaking">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_languages" data-field="x_speaking" name="x_speaking" id="x_speaking"<?= $Page->speaking->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_speaking" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_speaking"
    name="x_speaking"
    value="<?= HtmlEncode($Page->speaking->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_speaking"
    data-target="dsl_x_speaking"
    data-repeatcolumn="5"
    class="form-control<?= $Page->speaking->isInvalidClass() ?>"
    data-table="employee_languages"
    data-field="x_speaking"
    data-value-separator="<?= $Page->speaking->displayValueSeparatorAttribute() ?>"
    <?= $Page->speaking->editAttributes() ?>>
<?= $Page->speaking->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->speaking->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->writing->Visible) { // writing ?>
    <div id="r_writing" class="form-group row">
        <label id="elh_employee_languages_writing" class="<?= $Page->LeftColumnClass ?>"><?= $Page->writing->caption() ?><?= $Page->writing->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->writing->cellAttributes() ?>>
<span id="el_employee_languages_writing">
<template id="tp_x_writing">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_languages" data-field="x_writing" name="x_writing" id="x_writing"<?= $Page->writing->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_writing" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_writing"
    name="x_writing"
    value="<?= HtmlEncode($Page->writing->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_writing"
    data-target="dsl_x_writing"
    data-repeatcolumn="5"
    class="form-control<?= $Page->writing->isInvalidClass() ?>"
    data-table="employee_languages"
    data-field="x_writing"
    data-value-separator="<?= $Page->writing->displayValueSeparatorAttribute() ?>"
    <?= $Page->writing->editAttributes() ?>>
<?= $Page->writing->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->writing->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->understanding->Visible) { // understanding ?>
    <div id="r_understanding" class="form-group row">
        <label id="elh_employee_languages_understanding" class="<?= $Page->LeftColumnClass ?>"><?= $Page->understanding->caption() ?><?= $Page->understanding->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->understanding->cellAttributes() ?>>
<span id="el_employee_languages_understanding">
<template id="tp_x_understanding">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_languages" data-field="x_understanding" name="x_understanding" id="x_understanding"<?= $Page->understanding->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_understanding" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_understanding"
    name="x_understanding"
    value="<?= HtmlEncode($Page->understanding->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_understanding"
    data-target="dsl_x_understanding"
    data-repeatcolumn="5"
    class="form-control<?= $Page->understanding->isInvalidClass() ?>"
    data-table="employee_languages"
    data-field="x_understanding"
    data-value-separator="<?= $Page->understanding->displayValueSeparatorAttribute() ?>"
    <?= $Page->understanding->editAttributes() ?>>
<?= $Page->understanding->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->understanding->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
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
    ew.addEventHandlers("employee_languages");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
