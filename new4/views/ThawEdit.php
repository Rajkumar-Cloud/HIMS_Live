<?php

namespace PHPMaker2021\HIMS;

// Page object
$ThawEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fthawedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fthawedit = currentForm = new ew.Form("fthawedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "thaw")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.thaw)
        ew.vars.tables.thaw = currentTable;
    fthawedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null], fields.RIDNo.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["TiDNo", [fields.TiDNo.visible && fields.TiDNo.required ? ew.Validators.required(fields.TiDNo.caption) : null], fields.TiDNo.isInvalid],
        ["thawDate", [fields.thawDate.visible && fields.thawDate.required ? ew.Validators.required(fields.thawDate.caption) : null, ew.Validators.datetime(0)], fields.thawDate.isInvalid],
        ["thawPrimaryEmbryologist", [fields.thawPrimaryEmbryologist.visible && fields.thawPrimaryEmbryologist.required ? ew.Validators.required(fields.thawPrimaryEmbryologist.caption) : null], fields.thawPrimaryEmbryologist.isInvalid],
        ["thawSecondaryEmbryologist", [fields.thawSecondaryEmbryologist.visible && fields.thawSecondaryEmbryologist.required ? ew.Validators.required(fields.thawSecondaryEmbryologist.caption) : null], fields.thawSecondaryEmbryologist.isInvalid],
        ["thawReFrozen", [fields.thawReFrozen.visible && fields.thawReFrozen.required ? ew.Validators.required(fields.thawReFrozen.caption) : null], fields.thawReFrozen.isInvalid],
        ["vitrificationDate", [fields.vitrificationDate.visible && fields.vitrificationDate.required ? ew.Validators.required(fields.vitrificationDate.caption) : null], fields.vitrificationDate.isInvalid],
        ["PrimaryEmbryologist", [fields.PrimaryEmbryologist.visible && fields.PrimaryEmbryologist.required ? ew.Validators.required(fields.PrimaryEmbryologist.caption) : null], fields.PrimaryEmbryologist.isInvalid],
        ["SecondaryEmbryologist", [fields.SecondaryEmbryologist.visible && fields.SecondaryEmbryologist.required ? ew.Validators.required(fields.SecondaryEmbryologist.caption) : null], fields.SecondaryEmbryologist.isInvalid],
        ["EmbryoNo", [fields.EmbryoNo.visible && fields.EmbryoNo.required ? ew.Validators.required(fields.EmbryoNo.caption) : null], fields.EmbryoNo.isInvalid],
        ["FertilisationDate", [fields.FertilisationDate.visible && fields.FertilisationDate.required ? ew.Validators.required(fields.FertilisationDate.caption) : null], fields.FertilisationDate.isInvalid],
        ["Day", [fields.Day.visible && fields.Day.required ? ew.Validators.required(fields.Day.caption) : null], fields.Day.isInvalid],
        ["Grade", [fields.Grade.visible && fields.Grade.required ? ew.Validators.required(fields.Grade.caption) : null], fields.Grade.isInvalid],
        ["Incubator", [fields.Incubator.visible && fields.Incubator.required ? ew.Validators.required(fields.Incubator.caption) : null], fields.Incubator.isInvalid],
        ["Tank", [fields.Tank.visible && fields.Tank.required ? ew.Validators.required(fields.Tank.caption) : null], fields.Tank.isInvalid],
        ["Canister", [fields.Canister.visible && fields.Canister.required ? ew.Validators.required(fields.Canister.caption) : null], fields.Canister.isInvalid],
        ["Gobiet", [fields.Gobiet.visible && fields.Gobiet.required ? ew.Validators.required(fields.Gobiet.caption) : null], fields.Gobiet.isInvalid],
        ["CryolockNo", [fields.CryolockNo.visible && fields.CryolockNo.required ? ew.Validators.required(fields.CryolockNo.caption) : null], fields.CryolockNo.isInvalid],
        ["CryolockColour", [fields.CryolockColour.visible && fields.CryolockColour.required ? ew.Validators.required(fields.CryolockColour.caption) : null], fields.CryolockColour.isInvalid],
        ["Stage", [fields.Stage.visible && fields.Stage.required ? ew.Validators.required(fields.Stage.caption) : null], fields.Stage.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fthawedit,
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
    fthawedit.validate = function () {
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
    fthawedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fthawedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fthawedit.lists.thawReFrozen = <?= $Page->thawReFrozen->toClientList($Page) ?>;
    loadjs.done("fthawedit");
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
<form name="fthawedit" id="fthawedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="thaw">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_thaw_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_thaw_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_thaw_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_thaw_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RIDNo->getDisplayValue($Page->RIDNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_RIDNo" data-hidden="1" name="x_RIDNo" id="x_RIDNo" value="<?= HtmlEncode($Page->RIDNo->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_thaw_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_thaw_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientName->getDisplayValue($Page->PatientName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_PatientName" data-hidden="1" name="x_PatientName" id="x_PatientName" value="<?= HtmlEncode($Page->PatientName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TiDNo->Visible) { // TiDNo ?>
    <div id="r_TiDNo" class="form-group row">
        <label id="elh_thaw_TiDNo" for="x_TiDNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TiDNo->caption() ?><?= $Page->TiDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TiDNo->cellAttributes() ?>>
<span id="el_thaw_TiDNo">
<span<?= $Page->TiDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TiDNo->getDisplayValue($Page->TiDNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_TiDNo" data-hidden="1" name="x_TiDNo" id="x_TiDNo" value="<?= HtmlEncode($Page->TiDNo->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawDate->Visible) { // thawDate ?>
    <div id="r_thawDate" class="form-group row">
        <label id="elh_thaw_thawDate" for="x_thawDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawDate->caption() ?><?= $Page->thawDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawDate->cellAttributes() ?>>
<span id="el_thaw_thawDate">
<input type="<?= $Page->thawDate->getInputTextType() ?>" data-table="thaw" data-field="x_thawDate" name="x_thawDate" id="x_thawDate" placeholder="<?= HtmlEncode($Page->thawDate->getPlaceHolder()) ?>" value="<?= $Page->thawDate->EditValue ?>"<?= $Page->thawDate->editAttributes() ?> aria-describedby="x_thawDate_help">
<?= $Page->thawDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawDate->getErrorMessage() ?></div>
<?php if (!$Page->thawDate->ReadOnly && !$Page->thawDate->Disabled && !isset($Page->thawDate->EditAttrs["readonly"]) && !isset($Page->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fthawedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fthawedit", "x_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
    <div id="r_thawPrimaryEmbryologist" class="form-group row">
        <label id="elh_thaw_thawPrimaryEmbryologist" for="x_thawPrimaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawPrimaryEmbryologist->caption() ?><?= $Page->thawPrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_thaw_thawPrimaryEmbryologist">
<input type="<?= $Page->thawPrimaryEmbryologist->getInputTextType() ?>" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="x_thawPrimaryEmbryologist" id="x_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawPrimaryEmbryologist->EditValue ?>"<?= $Page->thawPrimaryEmbryologist->editAttributes() ?> aria-describedby="x_thawPrimaryEmbryologist_help">
<?= $Page->thawPrimaryEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
    <div id="r_thawSecondaryEmbryologist" class="form-group row">
        <label id="elh_thaw_thawSecondaryEmbryologist" for="x_thawSecondaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawSecondaryEmbryologist->caption() ?><?= $Page->thawSecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_thaw_thawSecondaryEmbryologist">
<input type="<?= $Page->thawSecondaryEmbryologist->getInputTextType() ?>" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="x_thawSecondaryEmbryologist" id="x_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawSecondaryEmbryologist->EditValue ?>"<?= $Page->thawSecondaryEmbryologist->editAttributes() ?> aria-describedby="x_thawSecondaryEmbryologist_help">
<?= $Page->thawSecondaryEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
    <div id="r_thawReFrozen" class="form-group row">
        <label id="elh_thaw_thawReFrozen" for="x_thawReFrozen" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawReFrozen->caption() ?><?= $Page->thawReFrozen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawReFrozen->cellAttributes() ?>>
<span id="el_thaw_thawReFrozen">
    <select
        id="x_thawReFrozen"
        name="x_thawReFrozen"
        class="form-control ew-select<?= $Page->thawReFrozen->isInvalidClass() ?>"
        data-select2-id="thaw_x_thawReFrozen"
        data-table="thaw"
        data-field="x_thawReFrozen"
        data-value-separator="<?= $Page->thawReFrozen->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->thawReFrozen->getPlaceHolder()) ?>"
        <?= $Page->thawReFrozen->editAttributes() ?>>
        <?= $Page->thawReFrozen->selectOptionListHtml("x_thawReFrozen") ?>
    </select>
    <?= $Page->thawReFrozen->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->thawReFrozen->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='thaw_x_thawReFrozen']"),
        options = { name: "x_thawReFrozen", selectId: "thaw_x_thawReFrozen", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.thaw.fields.thawReFrozen.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.thaw.fields.thawReFrozen.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
    <div id="r_vitrificationDate" class="form-group row">
        <label id="elh_thaw_vitrificationDate" for="x_vitrificationDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitrificationDate->caption() ?><?= $Page->vitrificationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitrificationDate->cellAttributes() ?>>
<span id="el_thaw_vitrificationDate">
<span<?= $Page->vitrificationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->vitrificationDate->getDisplayValue($Page->vitrificationDate->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_vitrificationDate" data-hidden="1" name="x_vitrificationDate" id="x_vitrificationDate" value="<?= HtmlEncode($Page->vitrificationDate->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
    <div id="r_PrimaryEmbryologist" class="form-group row">
        <label id="elh_thaw_PrimaryEmbryologist" for="x_PrimaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrimaryEmbryologist->caption() ?><?= $Page->PrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el_thaw_PrimaryEmbryologist">
<span<?= $Page->PrimaryEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PrimaryEmbryologist->getDisplayValue($Page->PrimaryEmbryologist->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_PrimaryEmbryologist" data-hidden="1" name="x_PrimaryEmbryologist" id="x_PrimaryEmbryologist" value="<?= HtmlEncode($Page->PrimaryEmbryologist->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
    <div id="r_SecondaryEmbryologist" class="form-group row">
        <label id="elh_thaw_SecondaryEmbryologist" for="x_SecondaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SecondaryEmbryologist->caption() ?><?= $Page->SecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el_thaw_SecondaryEmbryologist">
<span<?= $Page->SecondaryEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->SecondaryEmbryologist->getDisplayValue($Page->SecondaryEmbryologist->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_SecondaryEmbryologist" data-hidden="1" name="x_SecondaryEmbryologist" id="x_SecondaryEmbryologist" value="<?= HtmlEncode($Page->SecondaryEmbryologist->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
    <div id="r_EmbryoNo" class="form-group row">
        <label id="elh_thaw_EmbryoNo" for="x_EmbryoNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EmbryoNo->caption() ?><?= $Page->EmbryoNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmbryoNo->cellAttributes() ?>>
<span id="el_thaw_EmbryoNo">
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->EmbryoNo->getDisplayValue($Page->EmbryoNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_EmbryoNo" data-hidden="1" name="x_EmbryoNo" id="x_EmbryoNo" value="<?= HtmlEncode($Page->EmbryoNo->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
    <div id="r_FertilisationDate" class="form-group row">
        <label id="elh_thaw_FertilisationDate" for="x_FertilisationDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FertilisationDate->caption() ?><?= $Page->FertilisationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FertilisationDate->cellAttributes() ?>>
<span id="el_thaw_FertilisationDate">
<span<?= $Page->FertilisationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->FertilisationDate->getDisplayValue($Page->FertilisationDate->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_FertilisationDate" data-hidden="1" name="x_FertilisationDate" id="x_FertilisationDate" value="<?= HtmlEncode($Page->FertilisationDate->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day->Visible) { // Day ?>
    <div id="r_Day" class="form-group row">
        <label id="elh_thaw_Day" for="x_Day" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day->caption() ?><?= $Page->Day->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day->cellAttributes() ?>>
<span id="el_thaw_Day">
<span<?= $Page->Day->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Day->getDisplayValue($Page->Day->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Day" data-hidden="1" name="x_Day" id="x_Day" value="<?= HtmlEncode($Page->Day->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade->Visible) { // Grade ?>
    <div id="r_Grade" class="form-group row">
        <label id="elh_thaw_Grade" for="x_Grade" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Grade->caption() ?><?= $Page->Grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade->cellAttributes() ?>>
<span id="el_thaw_Grade">
<span<?= $Page->Grade->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Grade->getDisplayValue($Page->Grade->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Grade" data-hidden="1" name="x_Grade" id="x_Grade" value="<?= HtmlEncode($Page->Grade->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
    <div id="r_Incubator" class="form-group row">
        <label id="elh_thaw_Incubator" for="x_Incubator" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Incubator->caption() ?><?= $Page->Incubator->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Incubator->cellAttributes() ?>>
<span id="el_thaw_Incubator">
<span<?= $Page->Incubator->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Incubator->getDisplayValue($Page->Incubator->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Incubator" data-hidden="1" name="x_Incubator" id="x_Incubator" value="<?= HtmlEncode($Page->Incubator->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
    <div id="r_Tank" class="form-group row">
        <label id="elh_thaw_Tank" for="x_Tank" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tank->caption() ?><?= $Page->Tank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tank->cellAttributes() ?>>
<span id="el_thaw_Tank">
<span<?= $Page->Tank->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Tank->getDisplayValue($Page->Tank->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Tank" data-hidden="1" name="x_Tank" id="x_Tank" value="<?= HtmlEncode($Page->Tank->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Canister->Visible) { // Canister ?>
    <div id="r_Canister" class="form-group row">
        <label id="elh_thaw_Canister" for="x_Canister" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Canister->caption() ?><?= $Page->Canister->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Canister->cellAttributes() ?>>
<span id="el_thaw_Canister">
<span<?= $Page->Canister->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Canister->getDisplayValue($Page->Canister->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Canister" data-hidden="1" name="x_Canister" id="x_Canister" value="<?= HtmlEncode($Page->Canister->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gobiet->Visible) { // Gobiet ?>
    <div id="r_Gobiet" class="form-group row">
        <label id="elh_thaw_Gobiet" for="x_Gobiet" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Gobiet->caption() ?><?= $Page->Gobiet->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gobiet->cellAttributes() ?>>
<span id="el_thaw_Gobiet">
<span<?= $Page->Gobiet->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Gobiet->getDisplayValue($Page->Gobiet->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Gobiet" data-hidden="1" name="x_Gobiet" id="x_Gobiet" value="<?= HtmlEncode($Page->Gobiet->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CryolockNo->Visible) { // CryolockNo ?>
    <div id="r_CryolockNo" class="form-group row">
        <label id="elh_thaw_CryolockNo" for="x_CryolockNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CryolockNo->caption() ?><?= $Page->CryolockNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CryolockNo->cellAttributes() ?>>
<span id="el_thaw_CryolockNo">
<span<?= $Page->CryolockNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CryolockNo->getDisplayValue($Page->CryolockNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_CryolockNo" data-hidden="1" name="x_CryolockNo" id="x_CryolockNo" value="<?= HtmlEncode($Page->CryolockNo->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CryolockColour->Visible) { // CryolockColour ?>
    <div id="r_CryolockColour" class="form-group row">
        <label id="elh_thaw_CryolockColour" for="x_CryolockColour" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CryolockColour->caption() ?><?= $Page->CryolockColour->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CryolockColour->cellAttributes() ?>>
<span id="el_thaw_CryolockColour">
<span<?= $Page->CryolockColour->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CryolockColour->getDisplayValue($Page->CryolockColour->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_CryolockColour" data-hidden="1" name="x_CryolockColour" id="x_CryolockColour" value="<?= HtmlEncode($Page->CryolockColour->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
    <div id="r_Stage" class="form-group row">
        <label id="elh_thaw_Stage" for="x_Stage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Stage->caption() ?><?= $Page->Stage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Stage->cellAttributes() ?>>
<span id="el_thaw_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Stage->getDisplayValue($Page->Stage->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Stage" data-hidden="1" name="x_Stage" id="x_Stage" value="<?= HtmlEncode($Page->Stage->CurrentValue) ?>">
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
    ew.addEventHandlers("thaw");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
