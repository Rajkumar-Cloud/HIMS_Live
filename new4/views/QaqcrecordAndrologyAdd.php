<?php

namespace PHPMaker2021\HIMS;

// Page object
$QaqcrecordAndrologyAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fqaqcrecord_andrologyadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fqaqcrecord_andrologyadd = currentForm = new ew.Form("fqaqcrecord_andrologyadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "qaqcrecord_andrology")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.qaqcrecord_andrology)
        ew.vars.tables.qaqcrecord_andrology = currentTable;
    fqaqcrecord_andrologyadd.addFields([
        ["Date", [fields.Date.visible && fields.Date.required ? ew.Validators.required(fields.Date.caption) : null, ew.Validators.datetime(0)], fields.Date.isInvalid],
        ["LN2_Level", [fields.LN2_Level.visible && fields.LN2_Level.required ? ew.Validators.required(fields.LN2_Level.caption) : null, ew.Validators.float], fields.LN2_Level.isInvalid],
        ["LN2_Checked", [fields.LN2_Checked.visible && fields.LN2_Checked.required ? ew.Validators.required(fields.LN2_Checked.caption) : null], fields.LN2_Checked.isInvalid],
        ["Incubator_Temp", [fields.Incubator_Temp.visible && fields.Incubator_Temp.required ? ew.Validators.required(fields.Incubator_Temp.caption) : null, ew.Validators.float], fields.Incubator_Temp.isInvalid],
        ["Incubator_Cleaned", [fields.Incubator_Cleaned.visible && fields.Incubator_Cleaned.required ? ew.Validators.required(fields.Incubator_Cleaned.caption) : null], fields.Incubator_Cleaned.isInvalid],
        ["LAF_MG", [fields.LAF_MG.visible && fields.LAF_MG.required ? ew.Validators.required(fields.LAF_MG.caption) : null, ew.Validators.float], fields.LAF_MG.isInvalid],
        ["LAF_Cleaned", [fields.LAF_Cleaned.visible && fields.LAF_Cleaned.required ? ew.Validators.required(fields.LAF_Cleaned.caption) : null], fields.LAF_Cleaned.isInvalid],
        ["REF_Temp", [fields.REF_Temp.visible && fields.REF_Temp.required ? ew.Validators.required(fields.REF_Temp.caption) : null, ew.Validators.float], fields.REF_Temp.isInvalid],
        ["REF_Cleaned", [fields.REF_Cleaned.visible && fields.REF_Cleaned.required ? ew.Validators.required(fields.REF_Cleaned.caption) : null], fields.REF_Cleaned.isInvalid],
        ["Heating_Temp", [fields.Heating_Temp.visible && fields.Heating_Temp.required ? ew.Validators.required(fields.Heating_Temp.caption) : null, ew.Validators.float], fields.Heating_Temp.isInvalid],
        ["Heating_Cleaned", [fields.Heating_Cleaned.visible && fields.Heating_Cleaned.required ? ew.Validators.required(fields.Heating_Cleaned.caption) : null], fields.Heating_Cleaned.isInvalid],
        ["Createdby", [fields.Createdby.visible && fields.Createdby.required ? ew.Validators.required(fields.Createdby.caption) : null], fields.Createdby.isInvalid],
        ["CreatedDate", [fields.CreatedDate.visible && fields.CreatedDate.required ? ew.Validators.required(fields.CreatedDate.caption) : null], fields.CreatedDate.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fqaqcrecord_andrologyadd,
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
    fqaqcrecord_andrologyadd.validate = function () {
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
    fqaqcrecord_andrologyadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fqaqcrecord_andrologyadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fqaqcrecord_andrologyadd.lists.LN2_Checked = <?= $Page->LN2_Checked->toClientList($Page) ?>;
    fqaqcrecord_andrologyadd.lists.Incubator_Cleaned = <?= $Page->Incubator_Cleaned->toClientList($Page) ?>;
    fqaqcrecord_andrologyadd.lists.LAF_Cleaned = <?= $Page->LAF_Cleaned->toClientList($Page) ?>;
    fqaqcrecord_andrologyadd.lists.REF_Cleaned = <?= $Page->REF_Cleaned->toClientList($Page) ?>;
    fqaqcrecord_andrologyadd.lists.Heating_Cleaned = <?= $Page->Heating_Cleaned->toClientList($Page) ?>;
    loadjs.done("fqaqcrecord_andrologyadd");
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
<form name="fqaqcrecord_andrologyadd" id="fqaqcrecord_andrologyadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="qaqcrecord_andrology">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Date->Visible) { // Date ?>
    <div id="r_Date" class="form-group row">
        <label id="elh_qaqcrecord_andrology_Date" for="x_Date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Date->caption() ?><?= $Page->Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Date->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Date">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?> aria-describedby="x_Date_help">
<?= $Page->Date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage() ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fqaqcrecord_andrologyadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fqaqcrecord_andrologyadd", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LN2_Level->Visible) { // LN2_Level ?>
    <div id="r_LN2_Level" class="form-group row">
        <label id="elh_qaqcrecord_andrology_LN2_Level" for="x_LN2_Level" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LN2_Level->caption() ?><?= $Page->LN2_Level->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LN2_Level->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LN2_Level">
<input type="<?= $Page->LN2_Level->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" name="x_LN2_Level" id="x_LN2_Level" size="30" placeholder="<?= HtmlEncode($Page->LN2_Level->getPlaceHolder()) ?>" value="<?= $Page->LN2_Level->EditValue ?>"<?= $Page->LN2_Level->editAttributes() ?> aria-describedby="x_LN2_Level_help">
<?= $Page->LN2_Level->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LN2_Level->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LN2_Checked->Visible) { // LN2_Checked ?>
    <div id="r_LN2_Checked" class="form-group row">
        <label id="elh_qaqcrecord_andrology_LN2_Checked" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LN2_Checked->caption() ?><?= $Page->LN2_Checked->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LN2_Checked->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LN2_Checked">
<template id="tp_x_LN2_Checked">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" name="x_LN2_Checked" id="x_LN2_Checked"<?= $Page->LN2_Checked->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_LN2_Checked" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_LN2_Checked[]"
    name="x_LN2_Checked[]"
    value="<?= HtmlEncode($Page->LN2_Checked->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_LN2_Checked"
    data-target="dsl_x_LN2_Checked"
    data-repeatcolumn="5"
    class="form-control<?= $Page->LN2_Checked->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_LN2_Checked"
    data-value-separator="<?= $Page->LN2_Checked->displayValueSeparatorAttribute() ?>"
    <?= $Page->LN2_Checked->editAttributes() ?>>
<?= $Page->LN2_Checked->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LN2_Checked->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Incubator_Temp->Visible) { // Incubator_Temp ?>
    <div id="r_Incubator_Temp" class="form-group row">
        <label id="elh_qaqcrecord_andrology_Incubator_Temp" for="x_Incubator_Temp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Incubator_Temp->caption() ?><?= $Page->Incubator_Temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Incubator_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Incubator_Temp">
<input type="<?= $Page->Incubator_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" name="x_Incubator_Temp" id="x_Incubator_Temp" size="30" placeholder="<?= HtmlEncode($Page->Incubator_Temp->getPlaceHolder()) ?>" value="<?= $Page->Incubator_Temp->EditValue ?>"<?= $Page->Incubator_Temp->editAttributes() ?> aria-describedby="x_Incubator_Temp_help">
<?= $Page->Incubator_Temp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Incubator_Temp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
    <div id="r_Incubator_Cleaned" class="form-group row">
        <label id="elh_qaqcrecord_andrology_Incubator_Cleaned" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Incubator_Cleaned->caption() ?><?= $Page->Incubator_Cleaned->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Incubator_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Incubator_Cleaned">
<template id="tp_x_Incubator_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" name="x_Incubator_Cleaned" id="x_Incubator_Cleaned"<?= $Page->Incubator_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Incubator_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Incubator_Cleaned[]"
    name="x_Incubator_Cleaned[]"
    value="<?= HtmlEncode($Page->Incubator_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_Incubator_Cleaned"
    data-target="dsl_x_Incubator_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Incubator_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_Incubator_Cleaned"
    data-value-separator="<?= $Page->Incubator_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->Incubator_Cleaned->editAttributes() ?>>
<?= $Page->Incubator_Cleaned->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Incubator_Cleaned->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LAF_MG->Visible) { // LAF_MG ?>
    <div id="r_LAF_MG" class="form-group row">
        <label id="elh_qaqcrecord_andrology_LAF_MG" for="x_LAF_MG" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LAF_MG->caption() ?><?= $Page->LAF_MG->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LAF_MG->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LAF_MG">
<input type="<?= $Page->LAF_MG->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" name="x_LAF_MG" id="x_LAF_MG" size="30" placeholder="<?= HtmlEncode($Page->LAF_MG->getPlaceHolder()) ?>" value="<?= $Page->LAF_MG->EditValue ?>"<?= $Page->LAF_MG->editAttributes() ?> aria-describedby="x_LAF_MG_help">
<?= $Page->LAF_MG->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LAF_MG->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
    <div id="r_LAF_Cleaned" class="form-group row">
        <label id="elh_qaqcrecord_andrology_LAF_Cleaned" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LAF_Cleaned->caption() ?><?= $Page->LAF_Cleaned->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LAF_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LAF_Cleaned">
<template id="tp_x_LAF_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" name="x_LAF_Cleaned" id="x_LAF_Cleaned"<?= $Page->LAF_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_LAF_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_LAF_Cleaned[]"
    name="x_LAF_Cleaned[]"
    value="<?= HtmlEncode($Page->LAF_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_LAF_Cleaned"
    data-target="dsl_x_LAF_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->LAF_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_LAF_Cleaned"
    data-value-separator="<?= $Page->LAF_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->LAF_Cleaned->editAttributes() ?>>
<?= $Page->LAF_Cleaned->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LAF_Cleaned->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->REF_Temp->Visible) { // REF_Temp ?>
    <div id="r_REF_Temp" class="form-group row">
        <label id="elh_qaqcrecord_andrology_REF_Temp" for="x_REF_Temp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->REF_Temp->caption() ?><?= $Page->REF_Temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->REF_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_REF_Temp">
<input type="<?= $Page->REF_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" name="x_REF_Temp" id="x_REF_Temp" size="30" placeholder="<?= HtmlEncode($Page->REF_Temp->getPlaceHolder()) ?>" value="<?= $Page->REF_Temp->EditValue ?>"<?= $Page->REF_Temp->editAttributes() ?> aria-describedby="x_REF_Temp_help">
<?= $Page->REF_Temp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->REF_Temp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->REF_Cleaned->Visible) { // REF_Cleaned ?>
    <div id="r_REF_Cleaned" class="form-group row">
        <label id="elh_qaqcrecord_andrology_REF_Cleaned" class="<?= $Page->LeftColumnClass ?>"><?= $Page->REF_Cleaned->caption() ?><?= $Page->REF_Cleaned->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->REF_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_REF_Cleaned">
<template id="tp_x_REF_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" name="x_REF_Cleaned" id="x_REF_Cleaned"<?= $Page->REF_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_REF_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_REF_Cleaned[]"
    name="x_REF_Cleaned[]"
    value="<?= HtmlEncode($Page->REF_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_REF_Cleaned"
    data-target="dsl_x_REF_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->REF_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_REF_Cleaned"
    data-value-separator="<?= $Page->REF_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->REF_Cleaned->editAttributes() ?>>
<?= $Page->REF_Cleaned->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->REF_Cleaned->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Heating_Temp->Visible) { // Heating_Temp ?>
    <div id="r_Heating_Temp" class="form-group row">
        <label id="elh_qaqcrecord_andrology_Heating_Temp" for="x_Heating_Temp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Heating_Temp->caption() ?><?= $Page->Heating_Temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Heating_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Heating_Temp">
<input type="<?= $Page->Heating_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" name="x_Heating_Temp" id="x_Heating_Temp" size="30" placeholder="<?= HtmlEncode($Page->Heating_Temp->getPlaceHolder()) ?>" value="<?= $Page->Heating_Temp->EditValue ?>"<?= $Page->Heating_Temp->editAttributes() ?> aria-describedby="x_Heating_Temp_help">
<?= $Page->Heating_Temp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Heating_Temp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
    <div id="r_Heating_Cleaned" class="form-group row">
        <label id="elh_qaqcrecord_andrology_Heating_Cleaned" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Heating_Cleaned->caption() ?><?= $Page->Heating_Cleaned->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Heating_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Heating_Cleaned">
<template id="tp_x_Heating_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" name="x_Heating_Cleaned" id="x_Heating_Cleaned"<?= $Page->Heating_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Heating_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Heating_Cleaned[]"
    name="x_Heating_Cleaned[]"
    value="<?= HtmlEncode($Page->Heating_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_Heating_Cleaned"
    data-target="dsl_x_Heating_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Heating_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_Heating_Cleaned"
    data-value-separator="<?= $Page->Heating_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->Heating_Cleaned->editAttributes() ?>>
<?= $Page->Heating_Cleaned->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Heating_Cleaned->getErrorMessage() ?></div>
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
    ew.addEventHandlers("qaqcrecord_andrology");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
