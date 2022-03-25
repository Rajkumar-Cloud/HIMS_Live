<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeePermissionsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_permissionsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    femployee_permissionsedit = currentForm = new ew.Form("femployee_permissionsedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_permissions")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_permissions)
        ew.vars.tables.employee_permissions = currentTable;
    femployee_permissionsedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["user_level", [fields.user_level.visible && fields.user_level.required ? ew.Validators.required(fields.user_level.caption) : null], fields.user_level.isInvalid],
        ["module_id", [fields.module_id.visible && fields.module_id.required ? ew.Validators.required(fields.module_id.caption) : null, ew.Validators.integer], fields.module_id.isInvalid],
        ["_permission", [fields._permission.visible && fields._permission.required ? ew.Validators.required(fields._permission.caption) : null], fields._permission.isInvalid],
        ["meta", [fields.meta.visible && fields.meta.required ? ew.Validators.required(fields.meta.caption) : null], fields.meta.isInvalid],
        ["value", [fields.value.visible && fields.value.required ? ew.Validators.required(fields.value.caption) : null], fields.value.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_permissionsedit,
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
    femployee_permissionsedit.validate = function () {
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
    femployee_permissionsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_permissionsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_permissionsedit.lists.user_level = <?= $Page->user_level->toClientList($Page) ?>;
    loadjs.done("femployee_permissionsedit");
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
<form name="femployee_permissionsedit" id="femployee_permissionsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_permissions">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_employee_permissions_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_permissions_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_permissions" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->user_level->Visible) { // user_level ?>
    <div id="r_user_level" class="form-group row">
        <label id="elh_employee_permissions_user_level" class="<?= $Page->LeftColumnClass ?>"><?= $Page->user_level->caption() ?><?= $Page->user_level->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->user_level->cellAttributes() ?>>
<span id="el_employee_permissions_user_level">
<template id="tp_x_user_level">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_permissions" data-field="x_user_level" name="x_user_level" id="x_user_level"<?= $Page->user_level->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_user_level" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_user_level"
    name="x_user_level"
    value="<?= HtmlEncode($Page->user_level->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_user_level"
    data-target="dsl_x_user_level"
    data-repeatcolumn="5"
    class="form-control<?= $Page->user_level->isInvalidClass() ?>"
    data-table="employee_permissions"
    data-field="x_user_level"
    data-value-separator="<?= $Page->user_level->displayValueSeparatorAttribute() ?>"
    <?= $Page->user_level->editAttributes() ?>>
<?= $Page->user_level->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->user_level->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->module_id->Visible) { // module_id ?>
    <div id="r_module_id" class="form-group row">
        <label id="elh_employee_permissions_module_id" for="x_module_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->module_id->caption() ?><?= $Page->module_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->module_id->cellAttributes() ?>>
<span id="el_employee_permissions_module_id">
<input type="<?= $Page->module_id->getInputTextType() ?>" data-table="employee_permissions" data-field="x_module_id" name="x_module_id" id="x_module_id" size="30" placeholder="<?= HtmlEncode($Page->module_id->getPlaceHolder()) ?>" value="<?= $Page->module_id->EditValue ?>"<?= $Page->module_id->editAttributes() ?> aria-describedby="x_module_id_help">
<?= $Page->module_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->module_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_permission->Visible) { // permission ?>
    <div id="r__permission" class="form-group row">
        <label id="elh_employee_permissions__permission" for="x__permission" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_permission->caption() ?><?= $Page->_permission->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_permission->cellAttributes() ?>>
<span id="el_employee_permissions__permission">
<input type="<?= $Page->_permission->getInputTextType() ?>" data-table="employee_permissions" data-field="x__permission" name="x__permission" id="x__permission" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->_permission->getPlaceHolder()) ?>" value="<?= $Page->_permission->EditValue ?>"<?= $Page->_permission->editAttributes() ?> aria-describedby="x__permission_help">
<?= $Page->_permission->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_permission->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->meta->Visible) { // meta ?>
    <div id="r_meta" class="form-group row">
        <label id="elh_employee_permissions_meta" for="x_meta" class="<?= $Page->LeftColumnClass ?>"><?= $Page->meta->caption() ?><?= $Page->meta->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->meta->cellAttributes() ?>>
<span id="el_employee_permissions_meta">
<textarea data-table="employee_permissions" data-field="x_meta" name="x_meta" id="x_meta" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->meta->getPlaceHolder()) ?>"<?= $Page->meta->editAttributes() ?> aria-describedby="x_meta_help"><?= $Page->meta->EditValue ?></textarea>
<?= $Page->meta->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->meta->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->value->Visible) { // value ?>
    <div id="r_value" class="form-group row">
        <label id="elh_employee_permissions_value" for="x_value" class="<?= $Page->LeftColumnClass ?>"><?= $Page->value->caption() ?><?= $Page->value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->value->cellAttributes() ?>>
<span id="el_employee_permissions_value">
<input type="<?= $Page->value->getInputTextType() ?>" data-table="employee_permissions" data-field="x_value" name="x_value" id="x_value" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->value->getPlaceHolder()) ?>" value="<?= $Page->value->EditValue ?>"<?= $Page->value->editAttributes() ?> aria-describedby="x_value_help">
<?= $Page->value->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->value->getErrorMessage() ?></div>
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
    ew.addEventHandlers("employee_permissions");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
