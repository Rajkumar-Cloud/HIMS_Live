<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrTrainingsessionsAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhr_trainingsessionsadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fhr_trainingsessionsadd = currentForm = new ew.Form("fhr_trainingsessionsadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "hr_trainingsessions")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.hr_trainingsessions)
        ew.vars.tables.hr_trainingsessions = currentTable;
    fhr_trainingsessionsadd.addFields([
        ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
        ["course", [fields.course.visible && fields.course.required ? ew.Validators.required(fields.course.caption) : null, ew.Validators.integer], fields.course.isInvalid],
        ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
        ["scheduled", [fields.scheduled.visible && fields.scheduled.required ? ew.Validators.required(fields.scheduled.caption) : null, ew.Validators.datetime(0)], fields.scheduled.isInvalid],
        ["dueDate", [fields.dueDate.visible && fields.dueDate.required ? ew.Validators.required(fields.dueDate.caption) : null, ew.Validators.datetime(0)], fields.dueDate.isInvalid],
        ["deliveryMethod", [fields.deliveryMethod.visible && fields.deliveryMethod.required ? ew.Validators.required(fields.deliveryMethod.caption) : null], fields.deliveryMethod.isInvalid],
        ["deliveryLocation", [fields.deliveryLocation.visible && fields.deliveryLocation.required ? ew.Validators.required(fields.deliveryLocation.caption) : null], fields.deliveryLocation.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["attendanceType", [fields.attendanceType.visible && fields.attendanceType.required ? ew.Validators.required(fields.attendanceType.caption) : null], fields.attendanceType.isInvalid],
        ["attachment", [fields.attachment.visible && fields.attachment.required ? ew.Validators.required(fields.attachment.caption) : null], fields.attachment.isInvalid],
        ["created", [fields.created.visible && fields.created.required ? ew.Validators.required(fields.created.caption) : null, ew.Validators.datetime(0)], fields.created.isInvalid],
        ["updated", [fields.updated.visible && fields.updated.required ? ew.Validators.required(fields.updated.caption) : null, ew.Validators.datetime(0)], fields.updated.isInvalid],
        ["requireProof", [fields.requireProof.visible && fields.requireProof.required ? ew.Validators.required(fields.requireProof.caption) : null], fields.requireProof.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fhr_trainingsessionsadd,
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
    fhr_trainingsessionsadd.validate = function () {
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
    fhr_trainingsessionsadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fhr_trainingsessionsadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fhr_trainingsessionsadd.lists.deliveryMethod = <?= $Page->deliveryMethod->toClientList($Page) ?>;
    fhr_trainingsessionsadd.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fhr_trainingsessionsadd.lists.attendanceType = <?= $Page->attendanceType->toClientList($Page) ?>;
    fhr_trainingsessionsadd.lists.requireProof = <?= $Page->requireProof->toClientList($Page) ?>;
    loadjs.done("fhr_trainingsessionsadd");
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
<form name="fhr_trainingsessionsadd" id="fhr_trainingsessionsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_trainingsessions">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name" class="form-group row">
        <label id="elh_hr_trainingsessions_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->name->cellAttributes() ?>>
<span id="el_hr_trainingsessions_name">
<textarea data-table="hr_trainingsessions" data-field="x_name" name="x_name" id="x_name" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help"><?= $Page->name->EditValue ?></textarea>
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->course->Visible) { // course ?>
    <div id="r_course" class="form-group row">
        <label id="elh_hr_trainingsessions_course" for="x_course" class="<?= $Page->LeftColumnClass ?>"><?= $Page->course->caption() ?><?= $Page->course->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->course->cellAttributes() ?>>
<span id="el_hr_trainingsessions_course">
<input type="<?= $Page->course->getInputTextType() ?>" data-table="hr_trainingsessions" data-field="x_course" name="x_course" id="x_course" size="30" placeholder="<?= HtmlEncode($Page->course->getPlaceHolder()) ?>" value="<?= $Page->course->EditValue ?>"<?= $Page->course->editAttributes() ?> aria-describedby="x_course_help">
<?= $Page->course->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->course->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description" class="form-group row">
        <label id="elh_hr_trainingsessions_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->description->cellAttributes() ?>>
<span id="el_hr_trainingsessions_description">
<textarea data-table="hr_trainingsessions" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->scheduled->Visible) { // scheduled ?>
    <div id="r_scheduled" class="form-group row">
        <label id="elh_hr_trainingsessions_scheduled" for="x_scheduled" class="<?= $Page->LeftColumnClass ?>"><?= $Page->scheduled->caption() ?><?= $Page->scheduled->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->scheduled->cellAttributes() ?>>
<span id="el_hr_trainingsessions_scheduled">
<input type="<?= $Page->scheduled->getInputTextType() ?>" data-table="hr_trainingsessions" data-field="x_scheduled" name="x_scheduled" id="x_scheduled" placeholder="<?= HtmlEncode($Page->scheduled->getPlaceHolder()) ?>" value="<?= $Page->scheduled->EditValue ?>"<?= $Page->scheduled->editAttributes() ?> aria-describedby="x_scheduled_help">
<?= $Page->scheduled->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->scheduled->getErrorMessage() ?></div>
<?php if (!$Page->scheduled->ReadOnly && !$Page->scheduled->Disabled && !isset($Page->scheduled->EditAttrs["readonly"]) && !isset($Page->scheduled->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhr_trainingsessionsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fhr_trainingsessionsadd", "x_scheduled", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->dueDate->Visible) { // dueDate ?>
    <div id="r_dueDate" class="form-group row">
        <label id="elh_hr_trainingsessions_dueDate" for="x_dueDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->dueDate->caption() ?><?= $Page->dueDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->dueDate->cellAttributes() ?>>
<span id="el_hr_trainingsessions_dueDate">
<input type="<?= $Page->dueDate->getInputTextType() ?>" data-table="hr_trainingsessions" data-field="x_dueDate" name="x_dueDate" id="x_dueDate" placeholder="<?= HtmlEncode($Page->dueDate->getPlaceHolder()) ?>" value="<?= $Page->dueDate->EditValue ?>"<?= $Page->dueDate->editAttributes() ?> aria-describedby="x_dueDate_help">
<?= $Page->dueDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->dueDate->getErrorMessage() ?></div>
<?php if (!$Page->dueDate->ReadOnly && !$Page->dueDate->Disabled && !isset($Page->dueDate->EditAttrs["readonly"]) && !isset($Page->dueDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhr_trainingsessionsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fhr_trainingsessionsadd", "x_dueDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->deliveryMethod->Visible) { // deliveryMethod ?>
    <div id="r_deliveryMethod" class="form-group row">
        <label id="elh_hr_trainingsessions_deliveryMethod" class="<?= $Page->LeftColumnClass ?>"><?= $Page->deliveryMethod->caption() ?><?= $Page->deliveryMethod->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->deliveryMethod->cellAttributes() ?>>
<span id="el_hr_trainingsessions_deliveryMethod">
<template id="tp_x_deliveryMethod">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_trainingsessions" data-field="x_deliveryMethod" name="x_deliveryMethod" id="x_deliveryMethod"<?= $Page->deliveryMethod->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_deliveryMethod" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_deliveryMethod"
    name="x_deliveryMethod"
    value="<?= HtmlEncode($Page->deliveryMethod->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_deliveryMethod"
    data-target="dsl_x_deliveryMethod"
    data-repeatcolumn="5"
    class="form-control<?= $Page->deliveryMethod->isInvalidClass() ?>"
    data-table="hr_trainingsessions"
    data-field="x_deliveryMethod"
    data-value-separator="<?= $Page->deliveryMethod->displayValueSeparatorAttribute() ?>"
    <?= $Page->deliveryMethod->editAttributes() ?>>
<?= $Page->deliveryMethod->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->deliveryMethod->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->deliveryLocation->Visible) { // deliveryLocation ?>
    <div id="r_deliveryLocation" class="form-group row">
        <label id="elh_hr_trainingsessions_deliveryLocation" for="x_deliveryLocation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->deliveryLocation->caption() ?><?= $Page->deliveryLocation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->deliveryLocation->cellAttributes() ?>>
<span id="el_hr_trainingsessions_deliveryLocation">
<textarea data-table="hr_trainingsessions" data-field="x_deliveryLocation" name="x_deliveryLocation" id="x_deliveryLocation" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->deliveryLocation->getPlaceHolder()) ?>"<?= $Page->deliveryLocation->editAttributes() ?> aria-describedby="x_deliveryLocation_help"><?= $Page->deliveryLocation->EditValue ?></textarea>
<?= $Page->deliveryLocation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->deliveryLocation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_hr_trainingsessions_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_hr_trainingsessions_status">
<template id="tp_x_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_trainingsessions" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
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
    data-table="hr_trainingsessions"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>>
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->attendanceType->Visible) { // attendanceType ?>
    <div id="r_attendanceType" class="form-group row">
        <label id="elh_hr_trainingsessions_attendanceType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->attendanceType->caption() ?><?= $Page->attendanceType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->attendanceType->cellAttributes() ?>>
<span id="el_hr_trainingsessions_attendanceType">
<template id="tp_x_attendanceType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_trainingsessions" data-field="x_attendanceType" name="x_attendanceType" id="x_attendanceType"<?= $Page->attendanceType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_attendanceType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_attendanceType"
    name="x_attendanceType"
    value="<?= HtmlEncode($Page->attendanceType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_attendanceType"
    data-target="dsl_x_attendanceType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->attendanceType->isInvalidClass() ?>"
    data-table="hr_trainingsessions"
    data-field="x_attendanceType"
    data-value-separator="<?= $Page->attendanceType->displayValueSeparatorAttribute() ?>"
    <?= $Page->attendanceType->editAttributes() ?>>
<?= $Page->attendanceType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->attendanceType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->attachment->Visible) { // attachment ?>
    <div id="r_attachment" class="form-group row">
        <label id="elh_hr_trainingsessions_attachment" for="x_attachment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->attachment->caption() ?><?= $Page->attachment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->attachment->cellAttributes() ?>>
<span id="el_hr_trainingsessions_attachment">
<textarea data-table="hr_trainingsessions" data-field="x_attachment" name="x_attachment" id="x_attachment" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->attachment->getPlaceHolder()) ?>"<?= $Page->attachment->editAttributes() ?> aria-describedby="x_attachment_help"><?= $Page->attachment->EditValue ?></textarea>
<?= $Page->attachment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->attachment->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <div id="r_created" class="form-group row">
        <label id="elh_hr_trainingsessions_created" for="x_created" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created->caption() ?><?= $Page->created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->created->cellAttributes() ?>>
<span id="el_hr_trainingsessions_created">
<input type="<?= $Page->created->getInputTextType() ?>" data-table="hr_trainingsessions" data-field="x_created" name="x_created" id="x_created" placeholder="<?= HtmlEncode($Page->created->getPlaceHolder()) ?>" value="<?= $Page->created->EditValue ?>"<?= $Page->created->editAttributes() ?> aria-describedby="x_created_help">
<?= $Page->created->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created->getErrorMessage() ?></div>
<?php if (!$Page->created->ReadOnly && !$Page->created->Disabled && !isset($Page->created->EditAttrs["readonly"]) && !isset($Page->created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhr_trainingsessionsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fhr_trainingsessionsadd", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <div id="r_updated" class="form-group row">
        <label id="elh_hr_trainingsessions_updated" for="x_updated" class="<?= $Page->LeftColumnClass ?>"><?= $Page->updated->caption() ?><?= $Page->updated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->updated->cellAttributes() ?>>
<span id="el_hr_trainingsessions_updated">
<input type="<?= $Page->updated->getInputTextType() ?>" data-table="hr_trainingsessions" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?= HtmlEncode($Page->updated->getPlaceHolder()) ?>" value="<?= $Page->updated->EditValue ?>"<?= $Page->updated->editAttributes() ?> aria-describedby="x_updated_help">
<?= $Page->updated->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->updated->getErrorMessage() ?></div>
<?php if (!$Page->updated->ReadOnly && !$Page->updated->Disabled && !isset($Page->updated->EditAttrs["readonly"]) && !isset($Page->updated->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhr_trainingsessionsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fhr_trainingsessionsadd", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->requireProof->Visible) { // requireProof ?>
    <div id="r_requireProof" class="form-group row">
        <label id="elh_hr_trainingsessions_requireProof" class="<?= $Page->LeftColumnClass ?>"><?= $Page->requireProof->caption() ?><?= $Page->requireProof->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->requireProof->cellAttributes() ?>>
<span id="el_hr_trainingsessions_requireProof">
<template id="tp_x_requireProof">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_trainingsessions" data-field="x_requireProof" name="x_requireProof" id="x_requireProof"<?= $Page->requireProof->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_requireProof" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_requireProof"
    name="x_requireProof"
    value="<?= HtmlEncode($Page->requireProof->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_requireProof"
    data-target="dsl_x_requireProof"
    data-repeatcolumn="5"
    class="form-control<?= $Page->requireProof->isInvalidClass() ?>"
    data-table="hr_trainingsessions"
    data-field="x_requireProof"
    data-value-separator="<?= $Page->requireProof->displayValueSeparatorAttribute() ?>"
    <?= $Page->requireProof->editAttributes() ?>>
<?= $Page->requireProof->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->requireProof->getErrorMessage() ?></div>
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
    ew.addEventHandlers("hr_trainingsessions");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
