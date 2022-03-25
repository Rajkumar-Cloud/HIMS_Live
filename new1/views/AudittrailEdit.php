<?php

namespace PHPMaker2021\project3;

// Page object
$AudittrailEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var faudittrailedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    faudittrailedit = currentForm = new ew.Form("faudittrailedit", "edit");

    // Add fields
    var fields = ew.vars.tables.audittrail.fields;
    faudittrailedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null, ew.Validators.integer], fields.id.isInvalid],
        ["datetime", [fields.datetime.required ? ew.Validators.required(fields.datetime.caption) : null, ew.Validators.datetime(0)], fields.datetime.isInvalid],
        ["script", [fields.script.required ? ew.Validators.required(fields.script.caption) : null], fields.script.isInvalid],
        ["user", [fields.user.required ? ew.Validators.required(fields.user.caption) : null], fields.user.isInvalid],
        ["_action", [fields._action.required ? ew.Validators.required(fields._action.caption) : null], fields._action.isInvalid],
        ["_table", [fields._table.required ? ew.Validators.required(fields._table.caption) : null], fields._table.isInvalid],
        ["field", [fields.field.required ? ew.Validators.required(fields.field.caption) : null], fields.field.isInvalid],
        ["keyvalue", [fields.keyvalue.required ? ew.Validators.required(fields.keyvalue.caption) : null], fields.keyvalue.isInvalid],
        ["oldvalue", [fields.oldvalue.required ? ew.Validators.required(fields.oldvalue.caption) : null], fields.oldvalue.isInvalid],
        ["newvalue", [fields.newvalue.required ? ew.Validators.required(fields.newvalue.caption) : null], fields.newvalue.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = faudittrailedit,
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
    faudittrailedit.validate = function () {
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
    faudittrailedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    faudittrailedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("faudittrailedit");
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
<form name="faudittrailedit" id="faudittrailedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="audittrail">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_audittrail_id" for="x_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<input type="<?= $Page->id->getInputTextType() ?>" data-table="audittrail" data-field="x_id" name="x_id" id="x_id" size="30" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?> aria-describedby="x_id_help">
<?= $Page->id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage() ?></div>
<input type="hidden" data-table="audittrail" data-field="x_id" data-hidden="1" name="o_id" id="o_id" value="<?= HtmlEncode($Page->id->OldValue ?? $Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->datetime->Visible) { // datetime ?>
    <div id="r_datetime" class="form-group row">
        <label id="elh_audittrail_datetime" for="x_datetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->datetime->caption() ?><?= $Page->datetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->datetime->cellAttributes() ?>>
<span id="el_audittrail_datetime">
<input type="<?= $Page->datetime->getInputTextType() ?>" data-table="audittrail" data-field="x_datetime" name="x_datetime" id="x_datetime" placeholder="<?= HtmlEncode($Page->datetime->getPlaceHolder()) ?>" value="<?= $Page->datetime->EditValue ?>"<?= $Page->datetime->editAttributes() ?> aria-describedby="x_datetime_help">
<?= $Page->datetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->datetime->getErrorMessage() ?></div>
<?php if (!$Page->datetime->ReadOnly && !$Page->datetime->Disabled && !isset($Page->datetime->EditAttrs["readonly"]) && !isset($Page->datetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["faudittrailedit", "datetimepicker"], function() {
    ew.createDateTimePicker("faudittrailedit", "x_datetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->script->Visible) { // script ?>
    <div id="r_script" class="form-group row">
        <label id="elh_audittrail_script" for="x_script" class="<?= $Page->LeftColumnClass ?>"><?= $Page->script->caption() ?><?= $Page->script->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->script->cellAttributes() ?>>
<span id="el_audittrail_script">
<input type="<?= $Page->script->getInputTextType() ?>" data-table="audittrail" data-field="x_script" name="x_script" id="x_script" size="30" maxlength="80" placeholder="<?= HtmlEncode($Page->script->getPlaceHolder()) ?>" value="<?= $Page->script->EditValue ?>"<?= $Page->script->editAttributes() ?> aria-describedby="x_script_help">
<?= $Page->script->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->script->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->user->Visible) { // user ?>
    <div id="r_user" class="form-group row">
        <label id="elh_audittrail_user" for="x_user" class="<?= $Page->LeftColumnClass ?>"><?= $Page->user->caption() ?><?= $Page->user->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->user->cellAttributes() ?>>
<span id="el_audittrail_user">
<input type="<?= $Page->user->getInputTextType() ?>" data-table="audittrail" data-field="x_user" name="x_user" id="x_user" size="30" maxlength="80" placeholder="<?= HtmlEncode($Page->user->getPlaceHolder()) ?>" value="<?= $Page->user->EditValue ?>"<?= $Page->user->editAttributes() ?> aria-describedby="x_user_help">
<?= $Page->user->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->user->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_action->Visible) { // action ?>
    <div id="r__action" class="form-group row">
        <label id="elh_audittrail__action" for="x__action" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_action->caption() ?><?= $Page->_action->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_action->cellAttributes() ?>>
<span id="el_audittrail__action">
<input type="<?= $Page->_action->getInputTextType() ?>" data-table="audittrail" data-field="x__action" name="x__action" id="x__action" size="30" maxlength="80" placeholder="<?= HtmlEncode($Page->_action->getPlaceHolder()) ?>" value="<?= $Page->_action->EditValue ?>"<?= $Page->_action->editAttributes() ?> aria-describedby="x__action_help">
<?= $Page->_action->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_action->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_table->Visible) { // table ?>
    <div id="r__table" class="form-group row">
        <label id="elh_audittrail__table" for="x__table" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_table->caption() ?><?= $Page->_table->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_table->cellAttributes() ?>>
<span id="el_audittrail__table">
<input type="<?= $Page->_table->getInputTextType() ?>" data-table="audittrail" data-field="x__table" name="x__table" id="x__table" size="30" maxlength="80" placeholder="<?= HtmlEncode($Page->_table->getPlaceHolder()) ?>" value="<?= $Page->_table->EditValue ?>"<?= $Page->_table->editAttributes() ?> aria-describedby="x__table_help">
<?= $Page->_table->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_table->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->field->Visible) { // field ?>
    <div id="r_field" class="form-group row">
        <label id="elh_audittrail_field" for="x_field" class="<?= $Page->LeftColumnClass ?>"><?= $Page->field->caption() ?><?= $Page->field->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->field->cellAttributes() ?>>
<span id="el_audittrail_field">
<input type="<?= $Page->field->getInputTextType() ?>" data-table="audittrail" data-field="x_field" name="x_field" id="x_field" size="30" maxlength="80" placeholder="<?= HtmlEncode($Page->field->getPlaceHolder()) ?>" value="<?= $Page->field->EditValue ?>"<?= $Page->field->editAttributes() ?> aria-describedby="x_field_help">
<?= $Page->field->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->field->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->keyvalue->Visible) { // keyvalue ?>
    <div id="r_keyvalue" class="form-group row">
        <label id="elh_audittrail_keyvalue" for="x_keyvalue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->keyvalue->caption() ?><?= $Page->keyvalue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->keyvalue->cellAttributes() ?>>
<span id="el_audittrail_keyvalue">
<textarea data-table="audittrail" data-field="x_keyvalue" name="x_keyvalue" id="x_keyvalue" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->keyvalue->getPlaceHolder()) ?>"<?= $Page->keyvalue->editAttributes() ?> aria-describedby="x_keyvalue_help"><?= $Page->keyvalue->EditValue ?></textarea>
<?= $Page->keyvalue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->keyvalue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->oldvalue->Visible) { // oldvalue ?>
    <div id="r_oldvalue" class="form-group row">
        <label id="elh_audittrail_oldvalue" for="x_oldvalue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->oldvalue->caption() ?><?= $Page->oldvalue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->oldvalue->cellAttributes() ?>>
<span id="el_audittrail_oldvalue">
<textarea data-table="audittrail" data-field="x_oldvalue" name="x_oldvalue" id="x_oldvalue" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->oldvalue->getPlaceHolder()) ?>"<?= $Page->oldvalue->editAttributes() ?> aria-describedby="x_oldvalue_help"><?= $Page->oldvalue->EditValue ?></textarea>
<?= $Page->oldvalue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->oldvalue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->newvalue->Visible) { // newvalue ?>
    <div id="r_newvalue" class="form-group row">
        <label id="elh_audittrail_newvalue" for="x_newvalue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->newvalue->caption() ?><?= $Page->newvalue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->newvalue->cellAttributes() ?>>
<span id="el_audittrail_newvalue">
<textarea data-table="audittrail" data-field="x_newvalue" name="x_newvalue" id="x_newvalue" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->newvalue->getPlaceHolder()) ?>"<?= $Page->newvalue->editAttributes() ?> aria-describedby="x_newvalue_help"><?= $Page->newvalue->EditValue ?></textarea>
<?= $Page->newvalue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->newvalue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("audittrail");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
