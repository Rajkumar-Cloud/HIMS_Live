<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrCoursesEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhr_coursesedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fhr_coursesedit = currentForm = new ew.Form("fhr_coursesedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "hr_courses")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.hr_courses)
        ew.vars.tables.hr_courses = currentTable;
    fhr_coursesedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["code", [fields.code.visible && fields.code.required ? ew.Validators.required(fields.code.caption) : null], fields.code.isInvalid],
        ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
        ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
        ["coordinator", [fields.coordinator.visible && fields.coordinator.required ? ew.Validators.required(fields.coordinator.caption) : null, ew.Validators.integer], fields.coordinator.isInvalid],
        ["trainer", [fields.trainer.visible && fields.trainer.required ? ew.Validators.required(fields.trainer.caption) : null], fields.trainer.isInvalid],
        ["trainer_info", [fields.trainer_info.visible && fields.trainer_info.required ? ew.Validators.required(fields.trainer_info.caption) : null], fields.trainer_info.isInvalid],
        ["paymentType", [fields.paymentType.visible && fields.paymentType.required ? ew.Validators.required(fields.paymentType.caption) : null], fields.paymentType.isInvalid],
        ["currency", [fields.currency.visible && fields.currency.required ? ew.Validators.required(fields.currency.caption) : null], fields.currency.isInvalid],
        ["cost", [fields.cost.visible && fields.cost.required ? ew.Validators.required(fields.cost.caption) : null, ew.Validators.float], fields.cost.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["created", [fields.created.visible && fields.created.required ? ew.Validators.required(fields.created.caption) : null, ew.Validators.datetime(0)], fields.created.isInvalid],
        ["updated", [fields.updated.visible && fields.updated.required ? ew.Validators.required(fields.updated.caption) : null, ew.Validators.datetime(0)], fields.updated.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fhr_coursesedit,
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
    fhr_coursesedit.validate = function () {
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
    fhr_coursesedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fhr_coursesedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fhr_coursesedit.lists.paymentType = <?= $Page->paymentType->toClientList($Page) ?>;
    fhr_coursesedit.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("fhr_coursesedit");
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
<form name="fhr_coursesedit" id="fhr_coursesedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_courses">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_hr_courses_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_hr_courses_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="hr_courses" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->code->Visible) { // code ?>
    <div id="r_code" class="form-group row">
        <label id="elh_hr_courses_code" for="x_code" class="<?= $Page->LeftColumnClass ?>"><?= $Page->code->caption() ?><?= $Page->code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->code->cellAttributes() ?>>
<span id="el_hr_courses_code">
<textarea data-table="hr_courses" data-field="x_code" name="x_code" id="x_code" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->code->getPlaceHolder()) ?>"<?= $Page->code->editAttributes() ?> aria-describedby="x_code_help"><?= $Page->code->EditValue ?></textarea>
<?= $Page->code->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->code->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name" class="form-group row">
        <label id="elh_hr_courses_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->name->cellAttributes() ?>>
<span id="el_hr_courses_name">
<textarea data-table="hr_courses" data-field="x_name" name="x_name" id="x_name" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help"><?= $Page->name->EditValue ?></textarea>
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description" class="form-group row">
        <label id="elh_hr_courses_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->description->cellAttributes() ?>>
<span id="el_hr_courses_description">
<textarea data-table="hr_courses" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->coordinator->Visible) { // coordinator ?>
    <div id="r_coordinator" class="form-group row">
        <label id="elh_hr_courses_coordinator" for="x_coordinator" class="<?= $Page->LeftColumnClass ?>"><?= $Page->coordinator->caption() ?><?= $Page->coordinator->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->coordinator->cellAttributes() ?>>
<span id="el_hr_courses_coordinator">
<input type="<?= $Page->coordinator->getInputTextType() ?>" data-table="hr_courses" data-field="x_coordinator" name="x_coordinator" id="x_coordinator" size="30" placeholder="<?= HtmlEncode($Page->coordinator->getPlaceHolder()) ?>" value="<?= $Page->coordinator->EditValue ?>"<?= $Page->coordinator->editAttributes() ?> aria-describedby="x_coordinator_help">
<?= $Page->coordinator->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->coordinator->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->trainer->Visible) { // trainer ?>
    <div id="r_trainer" class="form-group row">
        <label id="elh_hr_courses_trainer" for="x_trainer" class="<?= $Page->LeftColumnClass ?>"><?= $Page->trainer->caption() ?><?= $Page->trainer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->trainer->cellAttributes() ?>>
<span id="el_hr_courses_trainer">
<textarea data-table="hr_courses" data-field="x_trainer" name="x_trainer" id="x_trainer" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->trainer->getPlaceHolder()) ?>"<?= $Page->trainer->editAttributes() ?> aria-describedby="x_trainer_help"><?= $Page->trainer->EditValue ?></textarea>
<?= $Page->trainer->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->trainer->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->trainer_info->Visible) { // trainer_info ?>
    <div id="r_trainer_info" class="form-group row">
        <label id="elh_hr_courses_trainer_info" for="x_trainer_info" class="<?= $Page->LeftColumnClass ?>"><?= $Page->trainer_info->caption() ?><?= $Page->trainer_info->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->trainer_info->cellAttributes() ?>>
<span id="el_hr_courses_trainer_info">
<textarea data-table="hr_courses" data-field="x_trainer_info" name="x_trainer_info" id="x_trainer_info" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->trainer_info->getPlaceHolder()) ?>"<?= $Page->trainer_info->editAttributes() ?> aria-describedby="x_trainer_info_help"><?= $Page->trainer_info->EditValue ?></textarea>
<?= $Page->trainer_info->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->trainer_info->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
    <div id="r_paymentType" class="form-group row">
        <label id="elh_hr_courses_paymentType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->paymentType->caption() ?><?= $Page->paymentType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->paymentType->cellAttributes() ?>>
<span id="el_hr_courses_paymentType">
<template id="tp_x_paymentType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_courses" data-field="x_paymentType" name="x_paymentType" id="x_paymentType"<?= $Page->paymentType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_paymentType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_paymentType"
    name="x_paymentType"
    value="<?= HtmlEncode($Page->paymentType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_paymentType"
    data-target="dsl_x_paymentType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->paymentType->isInvalidClass() ?>"
    data-table="hr_courses"
    data-field="x_paymentType"
    data-value-separator="<?= $Page->paymentType->displayValueSeparatorAttribute() ?>"
    <?= $Page->paymentType->editAttributes() ?>>
<?= $Page->paymentType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->paymentType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
    <div id="r_currency" class="form-group row">
        <label id="elh_hr_courses_currency" for="x_currency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->currency->caption() ?><?= $Page->currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->currency->cellAttributes() ?>>
<span id="el_hr_courses_currency">
<input type="<?= $Page->currency->getInputTextType() ?>" data-table="hr_courses" data-field="x_currency" name="x_currency" id="x_currency" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->currency->getPlaceHolder()) ?>" value="<?= $Page->currency->EditValue ?>"<?= $Page->currency->editAttributes() ?> aria-describedby="x_currency_help">
<?= $Page->currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->currency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->cost->Visible) { // cost ?>
    <div id="r_cost" class="form-group row">
        <label id="elh_hr_courses_cost" for="x_cost" class="<?= $Page->LeftColumnClass ?>"><?= $Page->cost->caption() ?><?= $Page->cost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->cost->cellAttributes() ?>>
<span id="el_hr_courses_cost">
<input type="<?= $Page->cost->getInputTextType() ?>" data-table="hr_courses" data-field="x_cost" name="x_cost" id="x_cost" size="30" placeholder="<?= HtmlEncode($Page->cost->getPlaceHolder()) ?>" value="<?= $Page->cost->EditValue ?>"<?= $Page->cost->editAttributes() ?> aria-describedby="x_cost_help">
<?= $Page->cost->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->cost->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_hr_courses_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_hr_courses_status">
<template id="tp_x_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_courses" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
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
    data-table="hr_courses"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>>
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <div id="r_created" class="form-group row">
        <label id="elh_hr_courses_created" for="x_created" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created->caption() ?><?= $Page->created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->created->cellAttributes() ?>>
<span id="el_hr_courses_created">
<input type="<?= $Page->created->getInputTextType() ?>" data-table="hr_courses" data-field="x_created" name="x_created" id="x_created" placeholder="<?= HtmlEncode($Page->created->getPlaceHolder()) ?>" value="<?= $Page->created->EditValue ?>"<?= $Page->created->editAttributes() ?> aria-describedby="x_created_help">
<?= $Page->created->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created->getErrorMessage() ?></div>
<?php if (!$Page->created->ReadOnly && !$Page->created->Disabled && !isset($Page->created->EditAttrs["readonly"]) && !isset($Page->created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhr_coursesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fhr_coursesedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <div id="r_updated" class="form-group row">
        <label id="elh_hr_courses_updated" for="x_updated" class="<?= $Page->LeftColumnClass ?>"><?= $Page->updated->caption() ?><?= $Page->updated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->updated->cellAttributes() ?>>
<span id="el_hr_courses_updated">
<input type="<?= $Page->updated->getInputTextType() ?>" data-table="hr_courses" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?= HtmlEncode($Page->updated->getPlaceHolder()) ?>" value="<?= $Page->updated->EditValue ?>"<?= $Page->updated->editAttributes() ?> aria-describedby="x_updated_help">
<?= $Page->updated->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->updated->getErrorMessage() ?></div>
<?php if (!$Page->updated->ReadOnly && !$Page->updated->Disabled && !isset($Page->updated->EditAttrs["readonly"]) && !isset($Page->updated->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhr_coursesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fhr_coursesedit", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
    ew.addEventHandlers("hr_courses");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
