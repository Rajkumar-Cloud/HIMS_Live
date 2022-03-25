<?php

namespace PHPMaker2021\HIMS;

// Page object
$AppointmentBlockSlotEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fappointment_block_slotedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fappointment_block_slotedit = currentForm = new ew.Form("fappointment_block_slotedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "appointment_block_slot")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.appointment_block_slot)
        ew.vars.tables.appointment_block_slot = currentTable;
    fappointment_block_slotedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Drid", [fields.Drid.visible && fields.Drid.required ? ew.Validators.required(fields.Drid.caption) : null, ew.Validators.integer], fields.Drid.isInvalid],
        ["DrName", [fields.DrName.visible && fields.DrName.required ? ew.Validators.required(fields.DrName.caption) : null], fields.DrName.isInvalid],
        ["Details", [fields.Details.visible && fields.Details.required ? ew.Validators.required(fields.Details.caption) : null], fields.Details.isInvalid],
        ["BlockType", [fields.BlockType.visible && fields.BlockType.required ? ew.Validators.required(fields.BlockType.caption) : null], fields.BlockType.isInvalid],
        ["FromDate", [fields.FromDate.visible && fields.FromDate.required ? ew.Validators.required(fields.FromDate.caption) : null, ew.Validators.datetime(0)], fields.FromDate.isInvalid],
        ["ToDate", [fields.ToDate.visible && fields.ToDate.required ? ew.Validators.required(fields.ToDate.caption) : null, ew.Validators.datetime(0)], fields.ToDate.isInvalid],
        ["FromTime", [fields.FromTime.visible && fields.FromTime.required ? ew.Validators.required(fields.FromTime.caption) : null, ew.Validators.datetime(0)], fields.FromTime.isInvalid],
        ["ToTime", [fields.ToTime.visible && fields.ToTime.required ? ew.Validators.required(fields.ToTime.caption) : null, ew.Validators.datetime(0)], fields.ToTime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fappointment_block_slotedit,
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
    fappointment_block_slotedit.validate = function () {
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
    fappointment_block_slotedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fappointment_block_slotedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fappointment_block_slotedit");
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
<form name="fappointment_block_slotedit" id="fappointment_block_slotedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="appointment_block_slot">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_appointment_block_slot_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_appointment_block_slot_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_block_slot" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Drid->Visible) { // Drid ?>
    <div id="r_Drid" class="form-group row">
        <label id="elh_appointment_block_slot_Drid" for="x_Drid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Drid->caption() ?><?= $Page->Drid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Drid->cellAttributes() ?>>
<span id="el_appointment_block_slot_Drid">
<input type="<?= $Page->Drid->getInputTextType() ?>" data-table="appointment_block_slot" data-field="x_Drid" name="x_Drid" id="x_Drid" size="30" placeholder="<?= HtmlEncode($Page->Drid->getPlaceHolder()) ?>" value="<?= $Page->Drid->EditValue ?>"<?= $Page->Drid->editAttributes() ?> aria-describedby="x_Drid_help">
<?= $Page->Drid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Drid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <div id="r_DrName" class="form-group row">
        <label id="elh_appointment_block_slot_DrName" for="x_DrName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrName->caption() ?><?= $Page->DrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrName->cellAttributes() ?>>
<span id="el_appointment_block_slot_DrName">
<input type="<?= $Page->DrName->getInputTextType() ?>" data-table="appointment_block_slot" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrName->getPlaceHolder()) ?>" value="<?= $Page->DrName->EditValue ?>"<?= $Page->DrName->editAttributes() ?> aria-describedby="x_DrName_help">
<?= $Page->DrName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label id="elh_appointment_block_slot_Details" for="x_Details" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Details->caption() ?><?= $Page->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
<span id="el_appointment_block_slot_Details">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="appointment_block_slot" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?> aria-describedby="x_Details_help">
<?= $Page->Details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BlockType->Visible) { // BlockType ?>
    <div id="r_BlockType" class="form-group row">
        <label id="elh_appointment_block_slot_BlockType" for="x_BlockType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BlockType->caption() ?><?= $Page->BlockType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BlockType->cellAttributes() ?>>
<span id="el_appointment_block_slot_BlockType">
<input type="<?= $Page->BlockType->getInputTextType() ?>" data-table="appointment_block_slot" data-field="x_BlockType" name="x_BlockType" id="x_BlockType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BlockType->getPlaceHolder()) ?>" value="<?= $Page->BlockType->EditValue ?>"<?= $Page->BlockType->editAttributes() ?> aria-describedby="x_BlockType_help">
<?= $Page->BlockType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BlockType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FromDate->Visible) { // FromDate ?>
    <div id="r_FromDate" class="form-group row">
        <label id="elh_appointment_block_slot_FromDate" for="x_FromDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FromDate->caption() ?><?= $Page->FromDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FromDate->cellAttributes() ?>>
<span id="el_appointment_block_slot_FromDate">
<input type="<?= $Page->FromDate->getInputTextType() ?>" data-table="appointment_block_slot" data-field="x_FromDate" name="x_FromDate" id="x_FromDate" placeholder="<?= HtmlEncode($Page->FromDate->getPlaceHolder()) ?>" value="<?= $Page->FromDate->EditValue ?>"<?= $Page->FromDate->editAttributes() ?> aria-describedby="x_FromDate_help">
<?= $Page->FromDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FromDate->getErrorMessage() ?></div>
<?php if (!$Page->FromDate->ReadOnly && !$Page->FromDate->Disabled && !isset($Page->FromDate->EditAttrs["readonly"]) && !isset($Page->FromDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_block_slotedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_block_slotedit", "x_FromDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ToDate->Visible) { // ToDate ?>
    <div id="r_ToDate" class="form-group row">
        <label id="elh_appointment_block_slot_ToDate" for="x_ToDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ToDate->caption() ?><?= $Page->ToDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ToDate->cellAttributes() ?>>
<span id="el_appointment_block_slot_ToDate">
<input type="<?= $Page->ToDate->getInputTextType() ?>" data-table="appointment_block_slot" data-field="x_ToDate" name="x_ToDate" id="x_ToDate" placeholder="<?= HtmlEncode($Page->ToDate->getPlaceHolder()) ?>" value="<?= $Page->ToDate->EditValue ?>"<?= $Page->ToDate->editAttributes() ?> aria-describedby="x_ToDate_help">
<?= $Page->ToDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ToDate->getErrorMessage() ?></div>
<?php if (!$Page->ToDate->ReadOnly && !$Page->ToDate->Disabled && !isset($Page->ToDate->EditAttrs["readonly"]) && !isset($Page->ToDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_block_slotedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_block_slotedit", "x_ToDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FromTime->Visible) { // FromTime ?>
    <div id="r_FromTime" class="form-group row">
        <label id="elh_appointment_block_slot_FromTime" for="x_FromTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FromTime->caption() ?><?= $Page->FromTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FromTime->cellAttributes() ?>>
<span id="el_appointment_block_slot_FromTime">
<input type="<?= $Page->FromTime->getInputTextType() ?>" data-table="appointment_block_slot" data-field="x_FromTime" name="x_FromTime" id="x_FromTime" placeholder="<?= HtmlEncode($Page->FromTime->getPlaceHolder()) ?>" value="<?= $Page->FromTime->EditValue ?>"<?= $Page->FromTime->editAttributes() ?> aria-describedby="x_FromTime_help">
<?= $Page->FromTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FromTime->getErrorMessage() ?></div>
<?php if (!$Page->FromTime->ReadOnly && !$Page->FromTime->Disabled && !isset($Page->FromTime->EditAttrs["readonly"]) && !isset($Page->FromTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_block_slotedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_block_slotedit", "x_FromTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ToTime->Visible) { // ToTime ?>
    <div id="r_ToTime" class="form-group row">
        <label id="elh_appointment_block_slot_ToTime" for="x_ToTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ToTime->caption() ?><?= $Page->ToTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ToTime->cellAttributes() ?>>
<span id="el_appointment_block_slot_ToTime">
<input type="<?= $Page->ToTime->getInputTextType() ?>" data-table="appointment_block_slot" data-field="x_ToTime" name="x_ToTime" id="x_ToTime" placeholder="<?= HtmlEncode($Page->ToTime->getPlaceHolder()) ?>" value="<?= $Page->ToTime->EditValue ?>"<?= $Page->ToTime->editAttributes() ?> aria-describedby="x_ToTime_help">
<?= $Page->ToTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ToTime->getErrorMessage() ?></div>
<?php if (!$Page->ToTime->ReadOnly && !$Page->ToTime->Disabled && !isset($Page->ToTime->EditAttrs["readonly"]) && !isset($Page->ToTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_block_slotedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_block_slotedit", "x_ToTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
    ew.addEventHandlers("appointment_block_slot");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
