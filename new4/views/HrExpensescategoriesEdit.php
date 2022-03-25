<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrExpensescategoriesEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhr_expensescategoriesedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fhr_expensescategoriesedit = currentForm = new ew.Form("fhr_expensescategoriesedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "hr_expensescategories")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.hr_expensescategories)
        ew.vars.tables.hr_expensescategories = currentTable;
    fhr_expensescategoriesedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
        ["created", [fields.created.visible && fields.created.required ? ew.Validators.required(fields.created.caption) : null, ew.Validators.datetime(0)], fields.created.isInvalid],
        ["updated", [fields.updated.visible && fields.updated.required ? ew.Validators.required(fields.updated.caption) : null, ew.Validators.datetime(0)], fields.updated.isInvalid],
        ["pre_approve", [fields.pre_approve.visible && fields.pre_approve.required ? ew.Validators.required(fields.pre_approve.caption) : null], fields.pre_approve.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fhr_expensescategoriesedit,
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
    fhr_expensescategoriesedit.validate = function () {
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
    fhr_expensescategoriesedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fhr_expensescategoriesedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fhr_expensescategoriesedit.lists.pre_approve = <?= $Page->pre_approve->toClientList($Page) ?>;
    loadjs.done("fhr_expensescategoriesedit");
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
<form name="fhr_expensescategoriesedit" id="fhr_expensescategoriesedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_expensescategories">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_hr_expensescategories_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_hr_expensescategories_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="hr_expensescategories" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name" class="form-group row">
        <label id="elh_hr_expensescategories_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->name->cellAttributes() ?>>
<span id="el_hr_expensescategories_name">
<textarea data-table="hr_expensescategories" data-field="x_name" name="x_name" id="x_name" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help"><?= $Page->name->EditValue ?></textarea>
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <div id="r_created" class="form-group row">
        <label id="elh_hr_expensescategories_created" for="x_created" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created->caption() ?><?= $Page->created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->created->cellAttributes() ?>>
<span id="el_hr_expensescategories_created">
<input type="<?= $Page->created->getInputTextType() ?>" data-table="hr_expensescategories" data-field="x_created" name="x_created" id="x_created" placeholder="<?= HtmlEncode($Page->created->getPlaceHolder()) ?>" value="<?= $Page->created->EditValue ?>"<?= $Page->created->editAttributes() ?> aria-describedby="x_created_help">
<?= $Page->created->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created->getErrorMessage() ?></div>
<?php if (!$Page->created->ReadOnly && !$Page->created->Disabled && !isset($Page->created->EditAttrs["readonly"]) && !isset($Page->created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhr_expensescategoriesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fhr_expensescategoriesedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <div id="r_updated" class="form-group row">
        <label id="elh_hr_expensescategories_updated" for="x_updated" class="<?= $Page->LeftColumnClass ?>"><?= $Page->updated->caption() ?><?= $Page->updated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->updated->cellAttributes() ?>>
<span id="el_hr_expensescategories_updated">
<input type="<?= $Page->updated->getInputTextType() ?>" data-table="hr_expensescategories" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?= HtmlEncode($Page->updated->getPlaceHolder()) ?>" value="<?= $Page->updated->EditValue ?>"<?= $Page->updated->editAttributes() ?> aria-describedby="x_updated_help">
<?= $Page->updated->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->updated->getErrorMessage() ?></div>
<?php if (!$Page->updated->ReadOnly && !$Page->updated->Disabled && !isset($Page->updated->EditAttrs["readonly"]) && !isset($Page->updated->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhr_expensescategoriesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fhr_expensescategoriesedit", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pre_approve->Visible) { // pre_approve ?>
    <div id="r_pre_approve" class="form-group row">
        <label id="elh_hr_expensescategories_pre_approve" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pre_approve->caption() ?><?= $Page->pre_approve->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pre_approve->cellAttributes() ?>>
<span id="el_hr_expensescategories_pre_approve">
<template id="tp_x_pre_approve">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_expensescategories" data-field="x_pre_approve" name="x_pre_approve" id="x_pre_approve"<?= $Page->pre_approve->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_pre_approve" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_pre_approve"
    name="x_pre_approve"
    value="<?= HtmlEncode($Page->pre_approve->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_pre_approve"
    data-target="dsl_x_pre_approve"
    data-repeatcolumn="5"
    class="form-control<?= $Page->pre_approve->isInvalidClass() ?>"
    data-table="hr_expensescategories"
    data-field="x_pre_approve"
    data-value-separator="<?= $Page->pre_approve->displayValueSeparatorAttribute() ?>"
    <?= $Page->pre_approve->editAttributes() ?>>
<?= $Page->pre_approve->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pre_approve->getErrorMessage() ?></div>
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
    ew.addEventHandlers("hr_expensescategories");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
