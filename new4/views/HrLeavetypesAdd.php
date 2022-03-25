<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrLeavetypesAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhr_leavetypesadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fhr_leavetypesadd = currentForm = new ew.Form("fhr_leavetypesadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "hr_leavetypes")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.hr_leavetypes)
        ew.vars.tables.hr_leavetypes = currentTable;
    fhr_leavetypesadd.addFields([
        ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
        ["supervisor_leave_assign", [fields.supervisor_leave_assign.visible && fields.supervisor_leave_assign.required ? ew.Validators.required(fields.supervisor_leave_assign.caption) : null], fields.supervisor_leave_assign.isInvalid],
        ["employee_can_apply", [fields.employee_can_apply.visible && fields.employee_can_apply.required ? ew.Validators.required(fields.employee_can_apply.caption) : null], fields.employee_can_apply.isInvalid],
        ["apply_beyond_current", [fields.apply_beyond_current.visible && fields.apply_beyond_current.required ? ew.Validators.required(fields.apply_beyond_current.caption) : null], fields.apply_beyond_current.isInvalid],
        ["leave_accrue", [fields.leave_accrue.visible && fields.leave_accrue.required ? ew.Validators.required(fields.leave_accrue.caption) : null], fields.leave_accrue.isInvalid],
        ["carried_forward", [fields.carried_forward.visible && fields.carried_forward.required ? ew.Validators.required(fields.carried_forward.caption) : null], fields.carried_forward.isInvalid],
        ["default_per_year", [fields.default_per_year.visible && fields.default_per_year.required ? ew.Validators.required(fields.default_per_year.caption) : null, ew.Validators.float], fields.default_per_year.isInvalid],
        ["carried_forward_percentage", [fields.carried_forward_percentage.visible && fields.carried_forward_percentage.required ? ew.Validators.required(fields.carried_forward_percentage.caption) : null, ew.Validators.integer], fields.carried_forward_percentage.isInvalid],
        ["carried_forward_leave_availability", [fields.carried_forward_leave_availability.visible && fields.carried_forward_leave_availability.required ? ew.Validators.required(fields.carried_forward_leave_availability.caption) : null, ew.Validators.integer], fields.carried_forward_leave_availability.isInvalid],
        ["propotionate_on_joined_date", [fields.propotionate_on_joined_date.visible && fields.propotionate_on_joined_date.required ? ew.Validators.required(fields.propotionate_on_joined_date.caption) : null], fields.propotionate_on_joined_date.isInvalid],
        ["send_notification_emails", [fields.send_notification_emails.visible && fields.send_notification_emails.required ? ew.Validators.required(fields.send_notification_emails.caption) : null], fields.send_notification_emails.isInvalid],
        ["leave_group", [fields.leave_group.visible && fields.leave_group.required ? ew.Validators.required(fields.leave_group.caption) : null, ew.Validators.integer], fields.leave_group.isInvalid],
        ["leave_color", [fields.leave_color.visible && fields.leave_color.required ? ew.Validators.required(fields.leave_color.caption) : null], fields.leave_color.isInvalid],
        ["max_carried_forward_amount", [fields.max_carried_forward_amount.visible && fields.max_carried_forward_amount.required ? ew.Validators.required(fields.max_carried_forward_amount.caption) : null, ew.Validators.integer], fields.max_carried_forward_amount.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fhr_leavetypesadd,
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
    fhr_leavetypesadd.validate = function () {
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
    fhr_leavetypesadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fhr_leavetypesadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fhr_leavetypesadd.lists.supervisor_leave_assign = <?= $Page->supervisor_leave_assign->toClientList($Page) ?>;
    fhr_leavetypesadd.lists.employee_can_apply = <?= $Page->employee_can_apply->toClientList($Page) ?>;
    fhr_leavetypesadd.lists.apply_beyond_current = <?= $Page->apply_beyond_current->toClientList($Page) ?>;
    fhr_leavetypesadd.lists.leave_accrue = <?= $Page->leave_accrue->toClientList($Page) ?>;
    fhr_leavetypesadd.lists.carried_forward = <?= $Page->carried_forward->toClientList($Page) ?>;
    fhr_leavetypesadd.lists.propotionate_on_joined_date = <?= $Page->propotionate_on_joined_date->toClientList($Page) ?>;
    fhr_leavetypesadd.lists.send_notification_emails = <?= $Page->send_notification_emails->toClientList($Page) ?>;
    loadjs.done("fhr_leavetypesadd");
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
<form name="fhr_leavetypesadd" id="fhr_leavetypesadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_leavetypes">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name" class="form-group row">
        <label id="elh_hr_leavetypes_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->name->cellAttributes() ?>>
<span id="el_hr_leavetypes_name">
<input type="<?= $Page->name->getInputTextType() ?>" data-table="hr_leavetypes" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>" value="<?= $Page->name->EditValue ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help">
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->supervisor_leave_assign->Visible) { // supervisor_leave_assign ?>
    <div id="r_supervisor_leave_assign" class="form-group row">
        <label id="elh_hr_leavetypes_supervisor_leave_assign" class="<?= $Page->LeftColumnClass ?>"><?= $Page->supervisor_leave_assign->caption() ?><?= $Page->supervisor_leave_assign->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->supervisor_leave_assign->cellAttributes() ?>>
<span id="el_hr_leavetypes_supervisor_leave_assign">
<template id="tp_x_supervisor_leave_assign">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_leavetypes" data-field="x_supervisor_leave_assign" name="x_supervisor_leave_assign" id="x_supervisor_leave_assign"<?= $Page->supervisor_leave_assign->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_supervisor_leave_assign" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_supervisor_leave_assign"
    name="x_supervisor_leave_assign"
    value="<?= HtmlEncode($Page->supervisor_leave_assign->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_supervisor_leave_assign"
    data-target="dsl_x_supervisor_leave_assign"
    data-repeatcolumn="5"
    class="form-control<?= $Page->supervisor_leave_assign->isInvalidClass() ?>"
    data-table="hr_leavetypes"
    data-field="x_supervisor_leave_assign"
    data-value-separator="<?= $Page->supervisor_leave_assign->displayValueSeparatorAttribute() ?>"
    <?= $Page->supervisor_leave_assign->editAttributes() ?>>
<?= $Page->supervisor_leave_assign->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->supervisor_leave_assign->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee_can_apply->Visible) { // employee_can_apply ?>
    <div id="r_employee_can_apply" class="form-group row">
        <label id="elh_hr_leavetypes_employee_can_apply" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee_can_apply->caption() ?><?= $Page->employee_can_apply->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee_can_apply->cellAttributes() ?>>
<span id="el_hr_leavetypes_employee_can_apply">
<template id="tp_x_employee_can_apply">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_leavetypes" data-field="x_employee_can_apply" name="x_employee_can_apply" id="x_employee_can_apply"<?= $Page->employee_can_apply->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_employee_can_apply" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_employee_can_apply"
    name="x_employee_can_apply"
    value="<?= HtmlEncode($Page->employee_can_apply->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_employee_can_apply"
    data-target="dsl_x_employee_can_apply"
    data-repeatcolumn="5"
    class="form-control<?= $Page->employee_can_apply->isInvalidClass() ?>"
    data-table="hr_leavetypes"
    data-field="x_employee_can_apply"
    data-value-separator="<?= $Page->employee_can_apply->displayValueSeparatorAttribute() ?>"
    <?= $Page->employee_can_apply->editAttributes() ?>>
<?= $Page->employee_can_apply->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee_can_apply->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->apply_beyond_current->Visible) { // apply_beyond_current ?>
    <div id="r_apply_beyond_current" class="form-group row">
        <label id="elh_hr_leavetypes_apply_beyond_current" class="<?= $Page->LeftColumnClass ?>"><?= $Page->apply_beyond_current->caption() ?><?= $Page->apply_beyond_current->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->apply_beyond_current->cellAttributes() ?>>
<span id="el_hr_leavetypes_apply_beyond_current">
<template id="tp_x_apply_beyond_current">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_leavetypes" data-field="x_apply_beyond_current" name="x_apply_beyond_current" id="x_apply_beyond_current"<?= $Page->apply_beyond_current->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_apply_beyond_current" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_apply_beyond_current"
    name="x_apply_beyond_current"
    value="<?= HtmlEncode($Page->apply_beyond_current->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_apply_beyond_current"
    data-target="dsl_x_apply_beyond_current"
    data-repeatcolumn="5"
    class="form-control<?= $Page->apply_beyond_current->isInvalidClass() ?>"
    data-table="hr_leavetypes"
    data-field="x_apply_beyond_current"
    data-value-separator="<?= $Page->apply_beyond_current->displayValueSeparatorAttribute() ?>"
    <?= $Page->apply_beyond_current->editAttributes() ?>>
<?= $Page->apply_beyond_current->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->apply_beyond_current->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leave_accrue->Visible) { // leave_accrue ?>
    <div id="r_leave_accrue" class="form-group row">
        <label id="elh_hr_leavetypes_leave_accrue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leave_accrue->caption() ?><?= $Page->leave_accrue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leave_accrue->cellAttributes() ?>>
<span id="el_hr_leavetypes_leave_accrue">
<template id="tp_x_leave_accrue">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_leavetypes" data-field="x_leave_accrue" name="x_leave_accrue" id="x_leave_accrue"<?= $Page->leave_accrue->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_leave_accrue" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_leave_accrue"
    name="x_leave_accrue"
    value="<?= HtmlEncode($Page->leave_accrue->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_leave_accrue"
    data-target="dsl_x_leave_accrue"
    data-repeatcolumn="5"
    class="form-control<?= $Page->leave_accrue->isInvalidClass() ?>"
    data-table="hr_leavetypes"
    data-field="x_leave_accrue"
    data-value-separator="<?= $Page->leave_accrue->displayValueSeparatorAttribute() ?>"
    <?= $Page->leave_accrue->editAttributes() ?>>
<?= $Page->leave_accrue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leave_accrue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->carried_forward->Visible) { // carried_forward ?>
    <div id="r_carried_forward" class="form-group row">
        <label id="elh_hr_leavetypes_carried_forward" class="<?= $Page->LeftColumnClass ?>"><?= $Page->carried_forward->caption() ?><?= $Page->carried_forward->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->carried_forward->cellAttributes() ?>>
<span id="el_hr_leavetypes_carried_forward">
<template id="tp_x_carried_forward">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_leavetypes" data-field="x_carried_forward" name="x_carried_forward" id="x_carried_forward"<?= $Page->carried_forward->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_carried_forward" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_carried_forward"
    name="x_carried_forward"
    value="<?= HtmlEncode($Page->carried_forward->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_carried_forward"
    data-target="dsl_x_carried_forward"
    data-repeatcolumn="5"
    class="form-control<?= $Page->carried_forward->isInvalidClass() ?>"
    data-table="hr_leavetypes"
    data-field="x_carried_forward"
    data-value-separator="<?= $Page->carried_forward->displayValueSeparatorAttribute() ?>"
    <?= $Page->carried_forward->editAttributes() ?>>
<?= $Page->carried_forward->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->carried_forward->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->default_per_year->Visible) { // default_per_year ?>
    <div id="r_default_per_year" class="form-group row">
        <label id="elh_hr_leavetypes_default_per_year" for="x_default_per_year" class="<?= $Page->LeftColumnClass ?>"><?= $Page->default_per_year->caption() ?><?= $Page->default_per_year->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->default_per_year->cellAttributes() ?>>
<span id="el_hr_leavetypes_default_per_year">
<input type="<?= $Page->default_per_year->getInputTextType() ?>" data-table="hr_leavetypes" data-field="x_default_per_year" name="x_default_per_year" id="x_default_per_year" size="30" placeholder="<?= HtmlEncode($Page->default_per_year->getPlaceHolder()) ?>" value="<?= $Page->default_per_year->EditValue ?>"<?= $Page->default_per_year->editAttributes() ?> aria-describedby="x_default_per_year_help">
<?= $Page->default_per_year->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->default_per_year->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->carried_forward_percentage->Visible) { // carried_forward_percentage ?>
    <div id="r_carried_forward_percentage" class="form-group row">
        <label id="elh_hr_leavetypes_carried_forward_percentage" for="x_carried_forward_percentage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->carried_forward_percentage->caption() ?><?= $Page->carried_forward_percentage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->carried_forward_percentage->cellAttributes() ?>>
<span id="el_hr_leavetypes_carried_forward_percentage">
<input type="<?= $Page->carried_forward_percentage->getInputTextType() ?>" data-table="hr_leavetypes" data-field="x_carried_forward_percentage" name="x_carried_forward_percentage" id="x_carried_forward_percentage" size="30" placeholder="<?= HtmlEncode($Page->carried_forward_percentage->getPlaceHolder()) ?>" value="<?= $Page->carried_forward_percentage->EditValue ?>"<?= $Page->carried_forward_percentage->editAttributes() ?> aria-describedby="x_carried_forward_percentage_help">
<?= $Page->carried_forward_percentage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->carried_forward_percentage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->carried_forward_leave_availability->Visible) { // carried_forward_leave_availability ?>
    <div id="r_carried_forward_leave_availability" class="form-group row">
        <label id="elh_hr_leavetypes_carried_forward_leave_availability" for="x_carried_forward_leave_availability" class="<?= $Page->LeftColumnClass ?>"><?= $Page->carried_forward_leave_availability->caption() ?><?= $Page->carried_forward_leave_availability->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->carried_forward_leave_availability->cellAttributes() ?>>
<span id="el_hr_leavetypes_carried_forward_leave_availability">
<input type="<?= $Page->carried_forward_leave_availability->getInputTextType() ?>" data-table="hr_leavetypes" data-field="x_carried_forward_leave_availability" name="x_carried_forward_leave_availability" id="x_carried_forward_leave_availability" size="30" placeholder="<?= HtmlEncode($Page->carried_forward_leave_availability->getPlaceHolder()) ?>" value="<?= $Page->carried_forward_leave_availability->EditValue ?>"<?= $Page->carried_forward_leave_availability->editAttributes() ?> aria-describedby="x_carried_forward_leave_availability_help">
<?= $Page->carried_forward_leave_availability->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->carried_forward_leave_availability->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->propotionate_on_joined_date->Visible) { // propotionate_on_joined_date ?>
    <div id="r_propotionate_on_joined_date" class="form-group row">
        <label id="elh_hr_leavetypes_propotionate_on_joined_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->propotionate_on_joined_date->caption() ?><?= $Page->propotionate_on_joined_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->propotionate_on_joined_date->cellAttributes() ?>>
<span id="el_hr_leavetypes_propotionate_on_joined_date">
<template id="tp_x_propotionate_on_joined_date">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_leavetypes" data-field="x_propotionate_on_joined_date" name="x_propotionate_on_joined_date" id="x_propotionate_on_joined_date"<?= $Page->propotionate_on_joined_date->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_propotionate_on_joined_date" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_propotionate_on_joined_date"
    name="x_propotionate_on_joined_date"
    value="<?= HtmlEncode($Page->propotionate_on_joined_date->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_propotionate_on_joined_date"
    data-target="dsl_x_propotionate_on_joined_date"
    data-repeatcolumn="5"
    class="form-control<?= $Page->propotionate_on_joined_date->isInvalidClass() ?>"
    data-table="hr_leavetypes"
    data-field="x_propotionate_on_joined_date"
    data-value-separator="<?= $Page->propotionate_on_joined_date->displayValueSeparatorAttribute() ?>"
    <?= $Page->propotionate_on_joined_date->editAttributes() ?>>
<?= $Page->propotionate_on_joined_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->propotionate_on_joined_date->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->send_notification_emails->Visible) { // send_notification_emails ?>
    <div id="r_send_notification_emails" class="form-group row">
        <label id="elh_hr_leavetypes_send_notification_emails" class="<?= $Page->LeftColumnClass ?>"><?= $Page->send_notification_emails->caption() ?><?= $Page->send_notification_emails->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->send_notification_emails->cellAttributes() ?>>
<span id="el_hr_leavetypes_send_notification_emails">
<template id="tp_x_send_notification_emails">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_leavetypes" data-field="x_send_notification_emails" name="x_send_notification_emails" id="x_send_notification_emails"<?= $Page->send_notification_emails->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_send_notification_emails" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_send_notification_emails"
    name="x_send_notification_emails"
    value="<?= HtmlEncode($Page->send_notification_emails->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_send_notification_emails"
    data-target="dsl_x_send_notification_emails"
    data-repeatcolumn="5"
    class="form-control<?= $Page->send_notification_emails->isInvalidClass() ?>"
    data-table="hr_leavetypes"
    data-field="x_send_notification_emails"
    data-value-separator="<?= $Page->send_notification_emails->displayValueSeparatorAttribute() ?>"
    <?= $Page->send_notification_emails->editAttributes() ?>>
<?= $Page->send_notification_emails->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->send_notification_emails->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leave_group->Visible) { // leave_group ?>
    <div id="r_leave_group" class="form-group row">
        <label id="elh_hr_leavetypes_leave_group" for="x_leave_group" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leave_group->caption() ?><?= $Page->leave_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leave_group->cellAttributes() ?>>
<span id="el_hr_leavetypes_leave_group">
<input type="<?= $Page->leave_group->getInputTextType() ?>" data-table="hr_leavetypes" data-field="x_leave_group" name="x_leave_group" id="x_leave_group" size="30" placeholder="<?= HtmlEncode($Page->leave_group->getPlaceHolder()) ?>" value="<?= $Page->leave_group->EditValue ?>"<?= $Page->leave_group->editAttributes() ?> aria-describedby="x_leave_group_help">
<?= $Page->leave_group->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leave_group->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leave_color->Visible) { // leave_color ?>
    <div id="r_leave_color" class="form-group row">
        <label id="elh_hr_leavetypes_leave_color" for="x_leave_color" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leave_color->caption() ?><?= $Page->leave_color->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leave_color->cellAttributes() ?>>
<span id="el_hr_leavetypes_leave_color">
<input type="<?= $Page->leave_color->getInputTextType() ?>" data-table="hr_leavetypes" data-field="x_leave_color" name="x_leave_color" id="x_leave_color" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->leave_color->getPlaceHolder()) ?>" value="<?= $Page->leave_color->EditValue ?>"<?= $Page->leave_color->editAttributes() ?> aria-describedby="x_leave_color_help">
<?= $Page->leave_color->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leave_color->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->max_carried_forward_amount->Visible) { // max_carried_forward_amount ?>
    <div id="r_max_carried_forward_amount" class="form-group row">
        <label id="elh_hr_leavetypes_max_carried_forward_amount" for="x_max_carried_forward_amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->max_carried_forward_amount->caption() ?><?= $Page->max_carried_forward_amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->max_carried_forward_amount->cellAttributes() ?>>
<span id="el_hr_leavetypes_max_carried_forward_amount">
<input type="<?= $Page->max_carried_forward_amount->getInputTextType() ?>" data-table="hr_leavetypes" data-field="x_max_carried_forward_amount" name="x_max_carried_forward_amount" id="x_max_carried_forward_amount" size="30" placeholder="<?= HtmlEncode($Page->max_carried_forward_amount->getPlaceHolder()) ?>" value="<?= $Page->max_carried_forward_amount->EditValue ?>"<?= $Page->max_carried_forward_amount->editAttributes() ?> aria-describedby="x_max_carried_forward_amount_help">
<?= $Page->max_carried_forward_amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->max_carried_forward_amount->getErrorMessage() ?></div>
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
    ew.addEventHandlers("hr_leavetypes");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
