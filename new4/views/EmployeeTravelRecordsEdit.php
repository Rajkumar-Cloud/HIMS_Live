<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeTravelRecordsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_travel_recordsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    femployee_travel_recordsedit = currentForm = new ew.Form("femployee_travel_recordsedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_travel_records")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_travel_records)
        ew.vars.tables.employee_travel_records = currentTable;
    femployee_travel_recordsedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee", [fields.employee.visible && fields.employee.required ? ew.Validators.required(fields.employee.caption) : null, ew.Validators.integer], fields.employee.isInvalid],
        ["type", [fields.type.visible && fields.type.required ? ew.Validators.required(fields.type.caption) : null], fields.type.isInvalid],
        ["purpose", [fields.purpose.visible && fields.purpose.required ? ew.Validators.required(fields.purpose.caption) : null], fields.purpose.isInvalid],
        ["travel_from", [fields.travel_from.visible && fields.travel_from.required ? ew.Validators.required(fields.travel_from.caption) : null], fields.travel_from.isInvalid],
        ["travel_to", [fields.travel_to.visible && fields.travel_to.required ? ew.Validators.required(fields.travel_to.caption) : null], fields.travel_to.isInvalid],
        ["travel_date", [fields.travel_date.visible && fields.travel_date.required ? ew.Validators.required(fields.travel_date.caption) : null, ew.Validators.datetime(0)], fields.travel_date.isInvalid],
        ["return_date", [fields.return_date.visible && fields.return_date.required ? ew.Validators.required(fields.return_date.caption) : null, ew.Validators.datetime(0)], fields.return_date.isInvalid],
        ["details", [fields.details.visible && fields.details.required ? ew.Validators.required(fields.details.caption) : null], fields.details.isInvalid],
        ["funding", [fields.funding.visible && fields.funding.required ? ew.Validators.required(fields.funding.caption) : null, ew.Validators.float], fields.funding.isInvalid],
        ["currency", [fields.currency.visible && fields.currency.required ? ew.Validators.required(fields.currency.caption) : null, ew.Validators.integer], fields.currency.isInvalid],
        ["attachment1", [fields.attachment1.visible && fields.attachment1.required ? ew.Validators.required(fields.attachment1.caption) : null], fields.attachment1.isInvalid],
        ["attachment2", [fields.attachment2.visible && fields.attachment2.required ? ew.Validators.required(fields.attachment2.caption) : null], fields.attachment2.isInvalid],
        ["attachment3", [fields.attachment3.visible && fields.attachment3.required ? ew.Validators.required(fields.attachment3.caption) : null], fields.attachment3.isInvalid],
        ["created", [fields.created.visible && fields.created.required ? ew.Validators.required(fields.created.caption) : null, ew.Validators.datetime(0)], fields.created.isInvalid],
        ["updated", [fields.updated.visible && fields.updated.required ? ew.Validators.required(fields.updated.caption) : null, ew.Validators.datetime(0)], fields.updated.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_travel_recordsedit,
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
    femployee_travel_recordsedit.validate = function () {
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
    femployee_travel_recordsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_travel_recordsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_travel_recordsedit.lists.type = <?= $Page->type->toClientList($Page) ?>;
    femployee_travel_recordsedit.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("femployee_travel_recordsedit");
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
<form name="femployee_travel_recordsedit" id="femployee_travel_recordsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_travel_records">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_employee_travel_records_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_travel_records_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_travel_records" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <div id="r_employee" class="form-group row">
        <label id="elh_employee_travel_records_employee" for="x_employee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee->caption() ?><?= $Page->employee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_travel_records_employee">
<input type="<?= $Page->employee->getInputTextType() ?>" data-table="employee_travel_records" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?= HtmlEncode($Page->employee->getPlaceHolder()) ?>" value="<?= $Page->employee->EditValue ?>"<?= $Page->employee->editAttributes() ?> aria-describedby="x_employee_help">
<?= $Page->employee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->type->Visible) { // type ?>
    <div id="r_type" class="form-group row">
        <label id="elh_employee_travel_records_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->type->caption() ?><?= $Page->type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->type->cellAttributes() ?>>
<span id="el_employee_travel_records_type">
<template id="tp_x_type">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_travel_records" data-field="x_type" name="x_type" id="x_type"<?= $Page->type->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_type" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_type"
    name="x_type"
    value="<?= HtmlEncode($Page->type->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_type"
    data-target="dsl_x_type"
    data-repeatcolumn="5"
    class="form-control<?= $Page->type->isInvalidClass() ?>"
    data-table="employee_travel_records"
    data-field="x_type"
    data-value-separator="<?= $Page->type->displayValueSeparatorAttribute() ?>"
    <?= $Page->type->editAttributes() ?>>
<?= $Page->type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->purpose->Visible) { // purpose ?>
    <div id="r_purpose" class="form-group row">
        <label id="elh_employee_travel_records_purpose" for="x_purpose" class="<?= $Page->LeftColumnClass ?>"><?= $Page->purpose->caption() ?><?= $Page->purpose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->purpose->cellAttributes() ?>>
<span id="el_employee_travel_records_purpose">
<input type="<?= $Page->purpose->getInputTextType() ?>" data-table="employee_travel_records" data-field="x_purpose" name="x_purpose" id="x_purpose" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->purpose->getPlaceHolder()) ?>" value="<?= $Page->purpose->EditValue ?>"<?= $Page->purpose->editAttributes() ?> aria-describedby="x_purpose_help">
<?= $Page->purpose->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->purpose->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->travel_from->Visible) { // travel_from ?>
    <div id="r_travel_from" class="form-group row">
        <label id="elh_employee_travel_records_travel_from" for="x_travel_from" class="<?= $Page->LeftColumnClass ?>"><?= $Page->travel_from->caption() ?><?= $Page->travel_from->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->travel_from->cellAttributes() ?>>
<span id="el_employee_travel_records_travel_from">
<input type="<?= $Page->travel_from->getInputTextType() ?>" data-table="employee_travel_records" data-field="x_travel_from" name="x_travel_from" id="x_travel_from" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->travel_from->getPlaceHolder()) ?>" value="<?= $Page->travel_from->EditValue ?>"<?= $Page->travel_from->editAttributes() ?> aria-describedby="x_travel_from_help">
<?= $Page->travel_from->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->travel_from->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->travel_to->Visible) { // travel_to ?>
    <div id="r_travel_to" class="form-group row">
        <label id="elh_employee_travel_records_travel_to" for="x_travel_to" class="<?= $Page->LeftColumnClass ?>"><?= $Page->travel_to->caption() ?><?= $Page->travel_to->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->travel_to->cellAttributes() ?>>
<span id="el_employee_travel_records_travel_to">
<input type="<?= $Page->travel_to->getInputTextType() ?>" data-table="employee_travel_records" data-field="x_travel_to" name="x_travel_to" id="x_travel_to" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->travel_to->getPlaceHolder()) ?>" value="<?= $Page->travel_to->EditValue ?>"<?= $Page->travel_to->editAttributes() ?> aria-describedby="x_travel_to_help">
<?= $Page->travel_to->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->travel_to->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->travel_date->Visible) { // travel_date ?>
    <div id="r_travel_date" class="form-group row">
        <label id="elh_employee_travel_records_travel_date" for="x_travel_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->travel_date->caption() ?><?= $Page->travel_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->travel_date->cellAttributes() ?>>
<span id="el_employee_travel_records_travel_date">
<input type="<?= $Page->travel_date->getInputTextType() ?>" data-table="employee_travel_records" data-field="x_travel_date" name="x_travel_date" id="x_travel_date" placeholder="<?= HtmlEncode($Page->travel_date->getPlaceHolder()) ?>" value="<?= $Page->travel_date->EditValue ?>"<?= $Page->travel_date->editAttributes() ?> aria-describedby="x_travel_date_help">
<?= $Page->travel_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->travel_date->getErrorMessage() ?></div>
<?php if (!$Page->travel_date->ReadOnly && !$Page->travel_date->Disabled && !isset($Page->travel_date->EditAttrs["readonly"]) && !isset($Page->travel_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_travel_recordsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_travel_recordsedit", "x_travel_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->return_date->Visible) { // return_date ?>
    <div id="r_return_date" class="form-group row">
        <label id="elh_employee_travel_records_return_date" for="x_return_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->return_date->caption() ?><?= $Page->return_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->return_date->cellAttributes() ?>>
<span id="el_employee_travel_records_return_date">
<input type="<?= $Page->return_date->getInputTextType() ?>" data-table="employee_travel_records" data-field="x_return_date" name="x_return_date" id="x_return_date" placeholder="<?= HtmlEncode($Page->return_date->getPlaceHolder()) ?>" value="<?= $Page->return_date->EditValue ?>"<?= $Page->return_date->editAttributes() ?> aria-describedby="x_return_date_help">
<?= $Page->return_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->return_date->getErrorMessage() ?></div>
<?php if (!$Page->return_date->ReadOnly && !$Page->return_date->Disabled && !isset($Page->return_date->EditAttrs["readonly"]) && !isset($Page->return_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_travel_recordsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_travel_recordsedit", "x_return_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <div id="r_details" class="form-group row">
        <label id="elh_employee_travel_records_details" for="x_details" class="<?= $Page->LeftColumnClass ?>"><?= $Page->details->caption() ?><?= $Page->details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_travel_records_details">
<textarea data-table="employee_travel_records" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->details->getPlaceHolder()) ?>"<?= $Page->details->editAttributes() ?> aria-describedby="x_details_help"><?= $Page->details->EditValue ?></textarea>
<?= $Page->details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->details->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->funding->Visible) { // funding ?>
    <div id="r_funding" class="form-group row">
        <label id="elh_employee_travel_records_funding" for="x_funding" class="<?= $Page->LeftColumnClass ?>"><?= $Page->funding->caption() ?><?= $Page->funding->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->funding->cellAttributes() ?>>
<span id="el_employee_travel_records_funding">
<input type="<?= $Page->funding->getInputTextType() ?>" data-table="employee_travel_records" data-field="x_funding" name="x_funding" id="x_funding" size="30" placeholder="<?= HtmlEncode($Page->funding->getPlaceHolder()) ?>" value="<?= $Page->funding->EditValue ?>"<?= $Page->funding->editAttributes() ?> aria-describedby="x_funding_help">
<?= $Page->funding->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->funding->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
    <div id="r_currency" class="form-group row">
        <label id="elh_employee_travel_records_currency" for="x_currency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->currency->caption() ?><?= $Page->currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->currency->cellAttributes() ?>>
<span id="el_employee_travel_records_currency">
<input type="<?= $Page->currency->getInputTextType() ?>" data-table="employee_travel_records" data-field="x_currency" name="x_currency" id="x_currency" size="30" placeholder="<?= HtmlEncode($Page->currency->getPlaceHolder()) ?>" value="<?= $Page->currency->EditValue ?>"<?= $Page->currency->editAttributes() ?> aria-describedby="x_currency_help">
<?= $Page->currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->currency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->attachment1->Visible) { // attachment1 ?>
    <div id="r_attachment1" class="form-group row">
        <label id="elh_employee_travel_records_attachment1" for="x_attachment1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->attachment1->caption() ?><?= $Page->attachment1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->attachment1->cellAttributes() ?>>
<span id="el_employee_travel_records_attachment1">
<input type="<?= $Page->attachment1->getInputTextType() ?>" data-table="employee_travel_records" data-field="x_attachment1" name="x_attachment1" id="x_attachment1" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->attachment1->getPlaceHolder()) ?>" value="<?= $Page->attachment1->EditValue ?>"<?= $Page->attachment1->editAttributes() ?> aria-describedby="x_attachment1_help">
<?= $Page->attachment1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->attachment1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->attachment2->Visible) { // attachment2 ?>
    <div id="r_attachment2" class="form-group row">
        <label id="elh_employee_travel_records_attachment2" for="x_attachment2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->attachment2->caption() ?><?= $Page->attachment2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->attachment2->cellAttributes() ?>>
<span id="el_employee_travel_records_attachment2">
<input type="<?= $Page->attachment2->getInputTextType() ?>" data-table="employee_travel_records" data-field="x_attachment2" name="x_attachment2" id="x_attachment2" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->attachment2->getPlaceHolder()) ?>" value="<?= $Page->attachment2->EditValue ?>"<?= $Page->attachment2->editAttributes() ?> aria-describedby="x_attachment2_help">
<?= $Page->attachment2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->attachment2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->attachment3->Visible) { // attachment3 ?>
    <div id="r_attachment3" class="form-group row">
        <label id="elh_employee_travel_records_attachment3" for="x_attachment3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->attachment3->caption() ?><?= $Page->attachment3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->attachment3->cellAttributes() ?>>
<span id="el_employee_travel_records_attachment3">
<input type="<?= $Page->attachment3->getInputTextType() ?>" data-table="employee_travel_records" data-field="x_attachment3" name="x_attachment3" id="x_attachment3" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->attachment3->getPlaceHolder()) ?>" value="<?= $Page->attachment3->EditValue ?>"<?= $Page->attachment3->editAttributes() ?> aria-describedby="x_attachment3_help">
<?= $Page->attachment3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->attachment3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <div id="r_created" class="form-group row">
        <label id="elh_employee_travel_records_created" for="x_created" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created->caption() ?><?= $Page->created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->created->cellAttributes() ?>>
<span id="el_employee_travel_records_created">
<input type="<?= $Page->created->getInputTextType() ?>" data-table="employee_travel_records" data-field="x_created" name="x_created" id="x_created" placeholder="<?= HtmlEncode($Page->created->getPlaceHolder()) ?>" value="<?= $Page->created->EditValue ?>"<?= $Page->created->editAttributes() ?> aria-describedby="x_created_help">
<?= $Page->created->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created->getErrorMessage() ?></div>
<?php if (!$Page->created->ReadOnly && !$Page->created->Disabled && !isset($Page->created->EditAttrs["readonly"]) && !isset($Page->created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_travel_recordsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_travel_recordsedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <div id="r_updated" class="form-group row">
        <label id="elh_employee_travel_records_updated" for="x_updated" class="<?= $Page->LeftColumnClass ?>"><?= $Page->updated->caption() ?><?= $Page->updated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->updated->cellAttributes() ?>>
<span id="el_employee_travel_records_updated">
<input type="<?= $Page->updated->getInputTextType() ?>" data-table="employee_travel_records" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?= HtmlEncode($Page->updated->getPlaceHolder()) ?>" value="<?= $Page->updated->EditValue ?>"<?= $Page->updated->editAttributes() ?> aria-describedby="x_updated_help">
<?= $Page->updated->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->updated->getErrorMessage() ?></div>
<?php if (!$Page->updated->ReadOnly && !$Page->updated->Disabled && !isset($Page->updated->EditAttrs["readonly"]) && !isset($Page->updated->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_travel_recordsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_travel_recordsedit", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_employee_travel_records_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_travel_records_status">
<template id="tp_x_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_travel_records" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
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
    data-table="employee_travel_records"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>>
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
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
    ew.addEventHandlers("employee_travel_records");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
