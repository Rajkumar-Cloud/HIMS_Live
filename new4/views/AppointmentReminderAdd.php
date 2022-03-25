<?php

namespace PHPMaker2021\HIMS;

// Page object
$AppointmentReminderAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fappointment_reminderadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fappointment_reminderadd = currentForm = new ew.Form("fappointment_reminderadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "appointment_reminder")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.appointment_reminder)
        ew.vars.tables.appointment_reminder = currentTable;
    fappointment_reminderadd.addFields([
        ["reminder", [fields.reminder.visible && fields.reminder.required ? ew.Validators.required(fields.reminder.caption) : null], fields.reminder.isInvalid],
        ["Drid", [fields.Drid.visible && fields.Drid.required ? ew.Validators.required(fields.Drid.caption) : null, ew.Validators.integer], fields.Drid.isInvalid],
        ["DrName", [fields.DrName.visible && fields.DrName.required ? ew.Validators.required(fields.DrName.caption) : null], fields.DrName.isInvalid],
        ["Duration", [fields.Duration.visible && fields.Duration.required ? ew.Validators.required(fields.Duration.caption) : null, ew.Validators.integer], fields.Duration.isInvalid],
        ["Date", [fields.Date.visible && fields.Date.required ? ew.Validators.required(fields.Date.caption) : null, ew.Validators.datetime(0)], fields.Date.isInvalid],
        ["SMSSend", [fields.SMSSend.visible && fields.SMSSend.required ? ew.Validators.required(fields.SMSSend.caption) : null, ew.Validators.integer], fields.SMSSend.isInvalid],
        ["EmailSend", [fields.EmailSend.visible && fields.EmailSend.required ? ew.Validators.required(fields.EmailSend.caption) : null, ew.Validators.integer], fields.EmailSend.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fappointment_reminderadd,
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
    fappointment_reminderadd.validate = function () {
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
    fappointment_reminderadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fappointment_reminderadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fappointment_reminderadd");
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
<form name="fappointment_reminderadd" id="fappointment_reminderadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="appointment_reminder">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->reminder->Visible) { // reminder ?>
    <div id="r_reminder" class="form-group row">
        <label id="elh_appointment_reminder_reminder" for="x_reminder" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_reminder_reminder"><?= $Page->reminder->caption() ?><?= $Page->reminder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->reminder->cellAttributes() ?>>
<template id="tpx_appointment_reminder_reminder"><span id="el_appointment_reminder_reminder">
<textarea data-table="appointment_reminder" data-field="x_reminder" name="x_reminder" id="x_reminder" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->reminder->getPlaceHolder()) ?>"<?= $Page->reminder->editAttributes() ?> aria-describedby="x_reminder_help"><?= $Page->reminder->EditValue ?></textarea>
<?= $Page->reminder->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->reminder->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Drid->Visible) { // Drid ?>
    <div id="r_Drid" class="form-group row">
        <label id="elh_appointment_reminder_Drid" for="x_Drid" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_reminder_Drid"><?= $Page->Drid->caption() ?><?= $Page->Drid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Drid->cellAttributes() ?>>
<template id="tpx_appointment_reminder_Drid"><span id="el_appointment_reminder_Drid">
<input type="<?= $Page->Drid->getInputTextType() ?>" data-table="appointment_reminder" data-field="x_Drid" name="x_Drid" id="x_Drid" size="30" placeholder="<?= HtmlEncode($Page->Drid->getPlaceHolder()) ?>" value="<?= $Page->Drid->EditValue ?>"<?= $Page->Drid->editAttributes() ?> aria-describedby="x_Drid_help">
<?= $Page->Drid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Drid->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <div id="r_DrName" class="form-group row">
        <label id="elh_appointment_reminder_DrName" for="x_DrName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_reminder_DrName"><?= $Page->DrName->caption() ?><?= $Page->DrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrName->cellAttributes() ?>>
<template id="tpx_appointment_reminder_DrName"><span id="el_appointment_reminder_DrName">
<input type="<?= $Page->DrName->getInputTextType() ?>" data-table="appointment_reminder" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrName->getPlaceHolder()) ?>" value="<?= $Page->DrName->EditValue ?>"<?= $Page->DrName->editAttributes() ?> aria-describedby="x_DrName_help">
<?= $Page->DrName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
    <div id="r_Duration" class="form-group row">
        <label id="elh_appointment_reminder_Duration" for="x_Duration" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_reminder_Duration"><?= $Page->Duration->caption() ?><?= $Page->Duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Duration->cellAttributes() ?>>
<template id="tpx_appointment_reminder_Duration"><span id="el_appointment_reminder_Duration">
<input type="<?= $Page->Duration->getInputTextType() ?>" data-table="appointment_reminder" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" placeholder="<?= HtmlEncode($Page->Duration->getPlaceHolder()) ?>" value="<?= $Page->Duration->EditValue ?>"<?= $Page->Duration->editAttributes() ?> aria-describedby="x_Duration_help">
<?= $Page->Duration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Duration->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
    <div id="r_Date" class="form-group row">
        <label id="elh_appointment_reminder_Date" for="x_Date" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_reminder_Date"><?= $Page->Date->caption() ?><?= $Page->Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Date->cellAttributes() ?>>
<template id="tpx_appointment_reminder_Date"><span id="el_appointment_reminder_Date">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="appointment_reminder" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?> aria-describedby="x_Date_help">
<?= $Page->Date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage() ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_reminderadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_reminderadd", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SMSSend->Visible) { // SMSSend ?>
    <div id="r_SMSSend" class="form-group row">
        <label id="elh_appointment_reminder_SMSSend" for="x_SMSSend" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_reminder_SMSSend"><?= $Page->SMSSend->caption() ?><?= $Page->SMSSend->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SMSSend->cellAttributes() ?>>
<template id="tpx_appointment_reminder_SMSSend"><span id="el_appointment_reminder_SMSSend">
<input type="<?= $Page->SMSSend->getInputTextType() ?>" data-table="appointment_reminder" data-field="x_SMSSend" name="x_SMSSend" id="x_SMSSend" size="30" placeholder="<?= HtmlEncode($Page->SMSSend->getPlaceHolder()) ?>" value="<?= $Page->SMSSend->EditValue ?>"<?= $Page->SMSSend->editAttributes() ?> aria-describedby="x_SMSSend_help">
<?= $Page->SMSSend->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SMSSend->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmailSend->Visible) { // EmailSend ?>
    <div id="r_EmailSend" class="form-group row">
        <label id="elh_appointment_reminder_EmailSend" for="x_EmailSend" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_reminder_EmailSend"><?= $Page->EmailSend->caption() ?><?= $Page->EmailSend->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmailSend->cellAttributes() ?>>
<template id="tpx_appointment_reminder_EmailSend"><span id="el_appointment_reminder_EmailSend">
<input type="<?= $Page->EmailSend->getInputTextType() ?>" data-table="appointment_reminder" data-field="x_EmailSend" name="x_EmailSend" id="x_EmailSend" size="30" placeholder="<?= HtmlEncode($Page->EmailSend->getPlaceHolder()) ?>" value="<?= $Page->EmailSend->EditValue ?>"<?= $Page->EmailSend->editAttributes() ?> aria-describedby="x_EmailSend_help">
<?= $Page->EmailSend->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EmailSend->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_appointment_reminderadd" class="ew-custom-template"></div>
<template id="tpm_appointment_reminderadd">
<div id="ct_AppointmentReminderAdd"><style type="text/css" >
.form-control {
	display: table;
	max-width: none;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 90%;
}
@media (min-width: 576px)
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 90%;
}
.input-group>.form-control.ew-lookup-text {
	width: 90%;
}
@media (min-width: 576px)
.input-group>.form-control.ew-lookup-text {
	width: 90%;
}
</style>
<table class="ew-table" style="width:100%">
	 <tbody>
		<tr><td><slot class="ew-slot" name="tpc_appointment_reminder_reminder"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_reminder_reminder"></slot></td><td><slot class="ew-slot" name="tpc_appointment_reminder_Drid"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_reminder_Drid"></slot></td></tr>
		<tr><td><slot class="ew-slot" name="tpc_appointment_reminder_DrName"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_reminder_DrName"></slot></td><td></td></tr>
		<tr><td><slot class="ew-slot" name="tpc_appointment_reminder_Duration"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_reminder_Duration"></slot></td><td><slot class="ew-slot" name="tpc_appointment_reminder_Date"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_reminder_Date"></slot></td></tr>
		<tr><td><slot class="ew-slot" name="tpc_appointment_reminder_SMSSend"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_reminder_SMSSend"></slot></td><td><slot class="ew-slot" name="tpc_appointment_reminder_EmailSend"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_reminder_EmailSend"></slot></td></tr>
		</tbody>
</table>
</div>
</template>
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_appointment_reminderadd", "tpm_appointment_reminderadd", "appointment_reminderadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("appointment_reminder");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
