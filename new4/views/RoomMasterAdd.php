<?php

namespace PHPMaker2021\HIMS;

// Page object
$RoomMasterAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var froom_masteradd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    froom_masteradd = currentForm = new ew.Form("froom_masteradd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "room_master")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.room_master)
        ew.vars.tables.room_master = currentTable;
    froom_masteradd.addFields([
        ["RoomNo", [fields.RoomNo.visible && fields.RoomNo.required ? ew.Validators.required(fields.RoomNo.caption) : null], fields.RoomNo.isInvalid],
        ["RoomType", [fields.RoomType.visible && fields.RoomType.required ? ew.Validators.required(fields.RoomType.caption) : null], fields.RoomType.isInvalid],
        ["SharingRoom", [fields.SharingRoom.visible && fields.SharingRoom.required ? ew.Validators.required(fields.SharingRoom.caption) : null], fields.SharingRoom.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["Status", [fields.Status.visible && fields.Status.required ? ew.Validators.required(fields.Status.caption) : null], fields.Status.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["MobileNo", [fields.MobileNo.visible && fields.MobileNo.required ? ew.Validators.required(fields.MobileNo.caption) : null], fields.MobileNo.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null, ew.Validators.integer], fields.PatID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = froom_masteradd,
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
    froom_masteradd.validate = function () {
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
    froom_masteradd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    froom_masteradd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    froom_masteradd.lists.RoomType = <?= $Page->RoomType->toClientList($Page) ?>;
    froom_masteradd.lists.SharingRoom = <?= $Page->SharingRoom->toClientList($Page) ?>;
    froom_masteradd.lists.Status = <?= $Page->Status->toClientList($Page) ?>;
    loadjs.done("froom_masteradd");
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
<form name="froom_masteradd" id="froom_masteradd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="room_master">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->RoomNo->Visible) { // RoomNo ?>
    <div id="r_RoomNo" class="form-group row">
        <label id="elh_room_master_RoomNo" for="x_RoomNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RoomNo->caption() ?><?= $Page->RoomNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RoomNo->cellAttributes() ?>>
<span id="el_room_master_RoomNo">
<input type="<?= $Page->RoomNo->getInputTextType() ?>" data-table="room_master" data-field="x_RoomNo" name="x_RoomNo" id="x_RoomNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RoomNo->getPlaceHolder()) ?>" value="<?= $Page->RoomNo->EditValue ?>"<?= $Page->RoomNo->editAttributes() ?> aria-describedby="x_RoomNo_help">
<?= $Page->RoomNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RoomNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RoomType->Visible) { // RoomType ?>
    <div id="r_RoomType" class="form-group row">
        <label id="elh_room_master_RoomType" for="x_RoomType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RoomType->caption() ?><?= $Page->RoomType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RoomType->cellAttributes() ?>>
<span id="el_room_master_RoomType">
<div class="input-group ew-lookup-list" aria-describedby="x_RoomType_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RoomType"><?= EmptyValue(strval($Page->RoomType->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->RoomType->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->RoomType->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->RoomType->ReadOnly || $Page->RoomType->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RoomType',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->RoomType->getErrorMessage() ?></div>
<?= $Page->RoomType->getCustomMessage() ?>
<?= $Page->RoomType->Lookup->getParamTag($Page, "p_x_RoomType") ?>
<input type="hidden" is="selection-list" data-table="room_master" data-field="x_RoomType" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->RoomType->displayValueSeparatorAttribute() ?>" name="x_RoomType" id="x_RoomType" value="<?= $Page->RoomType->CurrentValue ?>"<?= $Page->RoomType->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SharingRoom->Visible) { // SharingRoom ?>
    <div id="r_SharingRoom" class="form-group row">
        <label id="elh_room_master_SharingRoom" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SharingRoom->caption() ?><?= $Page->SharingRoom->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SharingRoom->cellAttributes() ?>>
<span id="el_room_master_SharingRoom">
<template id="tp_x_SharingRoom">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="room_master" data-field="x_SharingRoom" name="x_SharingRoom" id="x_SharingRoom"<?= $Page->SharingRoom->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_SharingRoom" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_SharingRoom"
    name="x_SharingRoom"
    value="<?= HtmlEncode($Page->SharingRoom->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_SharingRoom"
    data-target="dsl_x_SharingRoom"
    data-repeatcolumn="5"
    class="form-control<?= $Page->SharingRoom->isInvalidClass() ?>"
    data-table="room_master"
    data-field="x_SharingRoom"
    data-value-separator="<?= $Page->SharingRoom->displayValueSeparatorAttribute() ?>"
    <?= $Page->SharingRoom->editAttributes() ?>>
<?= $Page->SharingRoom->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SharingRoom->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_room_master_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<span id="el_room_master_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="room_master" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <div id="r_Status" class="form-group row">
        <label id="elh_room_master_Status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Status->caption() ?><?= $Page->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Status->cellAttributes() ?>>
<span id="el_room_master_Status">
<template id="tp_x_Status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="room_master" data-field="x_Status" name="x_Status" id="x_Status"<?= $Page->Status->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Status" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Status"
    name="x_Status"
    value="<?= HtmlEncode($Page->Status->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_Status"
    data-target="dsl_x_Status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Status->isInvalidClass() ?>"
    data-table="room_master"
    data-field="x_Status"
    data-value-separator="<?= $Page->Status->displayValueSeparatorAttribute() ?>"
    <?= $Page->Status->editAttributes() ?>>
<?= $Page->Status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_room_master_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_room_master_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="room_master" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_room_master_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_room_master_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="room_master" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNo->Visible) { // MobileNo ?>
    <div id="r_MobileNo" class="form-group row">
        <label id="elh_room_master_MobileNo" for="x_MobileNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MobileNo->caption() ?><?= $Page->MobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNo->cellAttributes() ?>>
<span id="el_room_master_MobileNo">
<input type="<?= $Page->MobileNo->getInputTextType() ?>" data-table="room_master" data-field="x_MobileNo" name="x_MobileNo" id="x_MobileNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNo->getPlaceHolder()) ?>" value="<?= $Page->MobileNo->EditValue ?>"<?= $Page->MobileNo->editAttributes() ?> aria-describedby="x_MobileNo_help">
<?= $Page->MobileNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_room_master_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<span id="el_room_master_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="room_master" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
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
    ew.addEventHandlers("room_master");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
