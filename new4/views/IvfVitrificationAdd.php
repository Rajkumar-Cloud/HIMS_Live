<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfVitrificationAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_vitrificationadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fivf_vitrificationadd = currentForm = new ew.Form("fivf_vitrificationadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_vitrification")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_vitrification)
        ew.vars.tables.ivf_vitrification = currentTable;
    fivf_vitrificationadd.addFields([
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["TiDNo", [fields.TiDNo.visible && fields.TiDNo.required ? ew.Validators.required(fields.TiDNo.caption) : null, ew.Validators.integer], fields.TiDNo.isInvalid],
        ["vitrificationDate", [fields.vitrificationDate.visible && fields.vitrificationDate.required ? ew.Validators.required(fields.vitrificationDate.caption) : null, ew.Validators.datetime(0)], fields.vitrificationDate.isInvalid],
        ["PrimaryEmbryologist", [fields.PrimaryEmbryologist.visible && fields.PrimaryEmbryologist.required ? ew.Validators.required(fields.PrimaryEmbryologist.caption) : null], fields.PrimaryEmbryologist.isInvalid],
        ["SecondaryEmbryologist", [fields.SecondaryEmbryologist.visible && fields.SecondaryEmbryologist.required ? ew.Validators.required(fields.SecondaryEmbryologist.caption) : null], fields.SecondaryEmbryologist.isInvalid],
        ["EmbryoNo", [fields.EmbryoNo.visible && fields.EmbryoNo.required ? ew.Validators.required(fields.EmbryoNo.caption) : null], fields.EmbryoNo.isInvalid],
        ["FertilisationDate", [fields.FertilisationDate.visible && fields.FertilisationDate.required ? ew.Validators.required(fields.FertilisationDate.caption) : null, ew.Validators.datetime(0)], fields.FertilisationDate.isInvalid],
        ["Day", [fields.Day.visible && fields.Day.required ? ew.Validators.required(fields.Day.caption) : null], fields.Day.isInvalid],
        ["Grade", [fields.Grade.visible && fields.Grade.required ? ew.Validators.required(fields.Grade.caption) : null], fields.Grade.isInvalid],
        ["Incubator", [fields.Incubator.visible && fields.Incubator.required ? ew.Validators.required(fields.Incubator.caption) : null], fields.Incubator.isInvalid],
        ["Tank", [fields.Tank.visible && fields.Tank.required ? ew.Validators.required(fields.Tank.caption) : null], fields.Tank.isInvalid],
        ["Canister", [fields.Canister.visible && fields.Canister.required ? ew.Validators.required(fields.Canister.caption) : null], fields.Canister.isInvalid],
        ["Gobiet", [fields.Gobiet.visible && fields.Gobiet.required ? ew.Validators.required(fields.Gobiet.caption) : null], fields.Gobiet.isInvalid],
        ["CryolockNo", [fields.CryolockNo.visible && fields.CryolockNo.required ? ew.Validators.required(fields.CryolockNo.caption) : null], fields.CryolockNo.isInvalid],
        ["CryolockColour", [fields.CryolockColour.visible && fields.CryolockColour.required ? ew.Validators.required(fields.CryolockColour.caption) : null], fields.CryolockColour.isInvalid],
        ["Stage", [fields.Stage.visible && fields.Stage.required ? ew.Validators.required(fields.Stage.caption) : null], fields.Stage.isInvalid],
        ["thawDate", [fields.thawDate.visible && fields.thawDate.required ? ew.Validators.required(fields.thawDate.caption) : null, ew.Validators.datetime(0)], fields.thawDate.isInvalid],
        ["thawPrimaryEmbryologist", [fields.thawPrimaryEmbryologist.visible && fields.thawPrimaryEmbryologist.required ? ew.Validators.required(fields.thawPrimaryEmbryologist.caption) : null], fields.thawPrimaryEmbryologist.isInvalid],
        ["thawSecondaryEmbryologist", [fields.thawSecondaryEmbryologist.visible && fields.thawSecondaryEmbryologist.required ? ew.Validators.required(fields.thawSecondaryEmbryologist.caption) : null], fields.thawSecondaryEmbryologist.isInvalid],
        ["thawET", [fields.thawET.visible && fields.thawET.required ? ew.Validators.required(fields.thawET.caption) : null], fields.thawET.isInvalid],
        ["thawReFrozen", [fields.thawReFrozen.visible && fields.thawReFrozen.required ? ew.Validators.required(fields.thawReFrozen.caption) : null], fields.thawReFrozen.isInvalid],
        ["thawAbserve", [fields.thawAbserve.visible && fields.thawAbserve.required ? ew.Validators.required(fields.thawAbserve.caption) : null], fields.thawAbserve.isInvalid],
        ["thawDiscard", [fields.thawDiscard.visible && fields.thawDiscard.required ? ew.Validators.required(fields.thawDiscard.caption) : null], fields.thawDiscard.isInvalid],
        ["Catheter", [fields.Catheter.visible && fields.Catheter.required ? ew.Validators.required(fields.Catheter.caption) : null], fields.Catheter.isInvalid],
        ["Difficulty", [fields.Difficulty.visible && fields.Difficulty.required ? ew.Validators.required(fields.Difficulty.caption) : null], fields.Difficulty.isInvalid],
        ["Easy", [fields.Easy.visible && fields.Easy.required ? ew.Validators.required(fields.Easy.caption) : null], fields.Easy.isInvalid],
        ["Comments", [fields.Comments.visible && fields.Comments.required ? ew.Validators.required(fields.Comments.caption) : null], fields.Comments.isInvalid],
        ["Doctor", [fields.Doctor.visible && fields.Doctor.required ? ew.Validators.required(fields.Doctor.caption) : null], fields.Doctor.isInvalid],
        ["Embryologist", [fields.Embryologist.visible && fields.Embryologist.required ? ew.Validators.required(fields.Embryologist.caption) : null], fields.Embryologist.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_vitrificationadd,
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
    fivf_vitrificationadd.validate = function () {
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
    fivf_vitrificationadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_vitrificationadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_vitrificationadd.lists.Day = <?= $Page->Day->toClientList($Page) ?>;
    fivf_vitrificationadd.lists.Grade = <?= $Page->Grade->toClientList($Page) ?>;
    loadjs.done("fivf_vitrificationadd");
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
<form name="fivf_vitrificationadd" id="fivf_vitrificationadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_vitrification">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_vitrification_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_ivf_vitrification_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_ivf_vitrification_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TiDNo->Visible) { // TiDNo ?>
    <div id="r_TiDNo" class="form-group row">
        <label id="elh_ivf_vitrification_TiDNo" for="x_TiDNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TiDNo->caption() ?><?= $Page->TiDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TiDNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_TiDNo">
<input type="<?= $Page->TiDNo->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_TiDNo" name="x_TiDNo" id="x_TiDNo" size="30" placeholder="<?= HtmlEncode($Page->TiDNo->getPlaceHolder()) ?>" value="<?= $Page->TiDNo->EditValue ?>"<?= $Page->TiDNo->editAttributes() ?> aria-describedby="x_TiDNo_help">
<?= $Page->TiDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TiDNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
    <div id="r_vitrificationDate" class="form-group row">
        <label id="elh_ivf_vitrification_vitrificationDate" for="x_vitrificationDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitrificationDate->caption() ?><?= $Page->vitrificationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitrificationDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_vitrificationDate">
<input type="<?= $Page->vitrificationDate->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x_vitrificationDate" id="x_vitrificationDate" placeholder="<?= HtmlEncode($Page->vitrificationDate->getPlaceHolder()) ?>" value="<?= $Page->vitrificationDate->EditValue ?>"<?= $Page->vitrificationDate->editAttributes() ?> aria-describedby="x_vitrificationDate_help">
<?= $Page->vitrificationDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitrificationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitrificationDate->ReadOnly && !$Page->vitrificationDate->Disabled && !isset($Page->vitrificationDate->EditAttrs["readonly"]) && !isset($Page->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_vitrificationadd", "x_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
    <div id="r_PrimaryEmbryologist" class="form-group row">
        <label id="elh_ivf_vitrification_PrimaryEmbryologist" for="x_PrimaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrimaryEmbryologist->caption() ?><?= $Page->PrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_PrimaryEmbryologist">
<input type="<?= $Page->PrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x_PrimaryEmbryologist" id="x_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->PrimaryEmbryologist->EditValue ?>"<?= $Page->PrimaryEmbryologist->editAttributes() ?> aria-describedby="x_PrimaryEmbryologist_help">
<?= $Page->PrimaryEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrimaryEmbryologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
    <div id="r_SecondaryEmbryologist" class="form-group row">
        <label id="elh_ivf_vitrification_SecondaryEmbryologist" for="x_SecondaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SecondaryEmbryologist->caption() ?><?= $Page->SecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_SecondaryEmbryologist">
<input type="<?= $Page->SecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x_SecondaryEmbryologist" id="x_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->SecondaryEmbryologist->EditValue ?>"<?= $Page->SecondaryEmbryologist->editAttributes() ?> aria-describedby="x_SecondaryEmbryologist_help">
<?= $Page->SecondaryEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SecondaryEmbryologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
    <div id="r_EmbryoNo" class="form-group row">
        <label id="elh_ivf_vitrification_EmbryoNo" for="x_EmbryoNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EmbryoNo->caption() ?><?= $Page->EmbryoNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmbryoNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_EmbryoNo">
<input type="<?= $Page->EmbryoNo->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x_EmbryoNo" id="x_EmbryoNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->EmbryoNo->EditValue ?>"<?= $Page->EmbryoNo->editAttributes() ?> aria-describedby="x_EmbryoNo_help">
<?= $Page->EmbryoNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EmbryoNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
    <div id="r_FertilisationDate" class="form-group row">
        <label id="elh_ivf_vitrification_FertilisationDate" for="x_FertilisationDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FertilisationDate->caption() ?><?= $Page->FertilisationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FertilisationDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_FertilisationDate">
<input type="<?= $Page->FertilisationDate->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x_FertilisationDate" id="x_FertilisationDate" placeholder="<?= HtmlEncode($Page->FertilisationDate->getPlaceHolder()) ?>" value="<?= $Page->FertilisationDate->EditValue ?>"<?= $Page->FertilisationDate->editAttributes() ?> aria-describedby="x_FertilisationDate_help">
<?= $Page->FertilisationDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FertilisationDate->getErrorMessage() ?></div>
<?php if (!$Page->FertilisationDate->ReadOnly && !$Page->FertilisationDate->Disabled && !isset($Page->FertilisationDate->EditAttrs["readonly"]) && !isset($Page->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_vitrificationadd", "x_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day->Visible) { // Day ?>
    <div id="r_Day" class="form-group row">
        <label id="elh_ivf_vitrification_Day" for="x_Day" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day->caption() ?><?= $Page->Day->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day->cellAttributes() ?>>
<span id="el_ivf_vitrification_Day">
    <select
        id="x_Day"
        name="x_Day"
        class="form-control ew-select<?= $Page->Day->isInvalidClass() ?>"
        data-select2-id="ivf_vitrification_x_Day"
        data-table="ivf_vitrification"
        data-field="x_Day"
        data-value-separator="<?= $Page->Day->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day->getPlaceHolder()) ?>"
        <?= $Page->Day->editAttributes() ?>>
        <?= $Page->Day->selectOptionListHtml("x_Day") ?>
    </select>
    <?= $Page->Day->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitrification_x_Day']"),
        options = { name: "x_Day", selectId: "ivf_vitrification_x_Day", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_vitrification.fields.Day.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitrification.fields.Day.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade->Visible) { // Grade ?>
    <div id="r_Grade" class="form-group row">
        <label id="elh_ivf_vitrification_Grade" for="x_Grade" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Grade->caption() ?><?= $Page->Grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade->cellAttributes() ?>>
<span id="el_ivf_vitrification_Grade">
    <select
        id="x_Grade"
        name="x_Grade"
        class="form-control ew-select<?= $Page->Grade->isInvalidClass() ?>"
        data-select2-id="ivf_vitrification_x_Grade"
        data-table="ivf_vitrification"
        data-field="x_Grade"
        data-value-separator="<?= $Page->Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Grade->getPlaceHolder()) ?>"
        <?= $Page->Grade->editAttributes() ?>>
        <?= $Page->Grade->selectOptionListHtml("x_Grade") ?>
    </select>
    <?= $Page->Grade->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitrification_x_Grade']"),
        options = { name: "x_Grade", selectId: "ivf_vitrification_x_Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_vitrification.fields.Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitrification.fields.Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
    <div id="r_Incubator" class="form-group row">
        <label id="elh_ivf_vitrification_Incubator" for="x_Incubator" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Incubator->caption() ?><?= $Page->Incubator->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Incubator->cellAttributes() ?>>
<span id="el_ivf_vitrification_Incubator">
<input type="<?= $Page->Incubator->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Incubator" name="x_Incubator" id="x_Incubator" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Incubator->getPlaceHolder()) ?>" value="<?= $Page->Incubator->EditValue ?>"<?= $Page->Incubator->editAttributes() ?> aria-describedby="x_Incubator_help">
<?= $Page->Incubator->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Incubator->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
    <div id="r_Tank" class="form-group row">
        <label id="elh_ivf_vitrification_Tank" for="x_Tank" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tank->caption() ?><?= $Page->Tank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tank->cellAttributes() ?>>
<span id="el_ivf_vitrification_Tank">
<input type="<?= $Page->Tank->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Tank" name="x_Tank" id="x_Tank" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tank->getPlaceHolder()) ?>" value="<?= $Page->Tank->EditValue ?>"<?= $Page->Tank->editAttributes() ?> aria-describedby="x_Tank_help">
<?= $Page->Tank->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tank->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Canister->Visible) { // Canister ?>
    <div id="r_Canister" class="form-group row">
        <label id="elh_ivf_vitrification_Canister" for="x_Canister" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Canister->caption() ?><?= $Page->Canister->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Canister->cellAttributes() ?>>
<span id="el_ivf_vitrification_Canister">
<input type="<?= $Page->Canister->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Canister" name="x_Canister" id="x_Canister" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Canister->getPlaceHolder()) ?>" value="<?= $Page->Canister->EditValue ?>"<?= $Page->Canister->editAttributes() ?> aria-describedby="x_Canister_help">
<?= $Page->Canister->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Canister->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gobiet->Visible) { // Gobiet ?>
    <div id="r_Gobiet" class="form-group row">
        <label id="elh_ivf_vitrification_Gobiet" for="x_Gobiet" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Gobiet->caption() ?><?= $Page->Gobiet->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gobiet->cellAttributes() ?>>
<span id="el_ivf_vitrification_Gobiet">
<input type="<?= $Page->Gobiet->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Gobiet" name="x_Gobiet" id="x_Gobiet" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gobiet->getPlaceHolder()) ?>" value="<?= $Page->Gobiet->EditValue ?>"<?= $Page->Gobiet->editAttributes() ?> aria-describedby="x_Gobiet_help">
<?= $Page->Gobiet->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gobiet->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CryolockNo->Visible) { // CryolockNo ?>
    <div id="r_CryolockNo" class="form-group row">
        <label id="elh_ivf_vitrification_CryolockNo" for="x_CryolockNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CryolockNo->caption() ?><?= $Page->CryolockNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CryolockNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_CryolockNo">
<input type="<?= $Page->CryolockNo->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x_CryolockNo" id="x_CryolockNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CryolockNo->getPlaceHolder()) ?>" value="<?= $Page->CryolockNo->EditValue ?>"<?= $Page->CryolockNo->editAttributes() ?> aria-describedby="x_CryolockNo_help">
<?= $Page->CryolockNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CryolockNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CryolockColour->Visible) { // CryolockColour ?>
    <div id="r_CryolockColour" class="form-group row">
        <label id="elh_ivf_vitrification_CryolockColour" for="x_CryolockColour" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CryolockColour->caption() ?><?= $Page->CryolockColour->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CryolockColour->cellAttributes() ?>>
<span id="el_ivf_vitrification_CryolockColour">
<input type="<?= $Page->CryolockColour->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x_CryolockColour" id="x_CryolockColour" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CryolockColour->getPlaceHolder()) ?>" value="<?= $Page->CryolockColour->EditValue ?>"<?= $Page->CryolockColour->editAttributes() ?> aria-describedby="x_CryolockColour_help">
<?= $Page->CryolockColour->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CryolockColour->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
    <div id="r_Stage" class="form-group row">
        <label id="elh_ivf_vitrification_Stage" for="x_Stage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Stage->caption() ?><?= $Page->Stage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Stage->cellAttributes() ?>>
<span id="el_ivf_vitrification_Stage">
<input type="<?= $Page->Stage->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Stage" name="x_Stage" id="x_Stage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>" value="<?= $Page->Stage->EditValue ?>"<?= $Page->Stage->editAttributes() ?> aria-describedby="x_Stage_help">
<?= $Page->Stage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawDate->Visible) { // thawDate ?>
    <div id="r_thawDate" class="form-group row">
        <label id="elh_ivf_vitrification_thawDate" for="x_thawDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawDate->caption() ?><?= $Page->thawDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawDate">
<input type="<?= $Page->thawDate->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_thawDate" name="x_thawDate" id="x_thawDate" placeholder="<?= HtmlEncode($Page->thawDate->getPlaceHolder()) ?>" value="<?= $Page->thawDate->EditValue ?>"<?= $Page->thawDate->editAttributes() ?> aria-describedby="x_thawDate_help">
<?= $Page->thawDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawDate->getErrorMessage() ?></div>
<?php if (!$Page->thawDate->ReadOnly && !$Page->thawDate->Disabled && !isset($Page->thawDate->EditAttrs["readonly"]) && !isset($Page->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_vitrificationadd", "x_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
    <div id="r_thawPrimaryEmbryologist" class="form-group row">
        <label id="elh_ivf_vitrification_thawPrimaryEmbryologist" for="x_thawPrimaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawPrimaryEmbryologist->caption() ?><?= $Page->thawPrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawPrimaryEmbryologist">
<input type="<?= $Page->thawPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_thawPrimaryEmbryologist" name="x_thawPrimaryEmbryologist" id="x_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawPrimaryEmbryologist->EditValue ?>"<?= $Page->thawPrimaryEmbryologist->editAttributes() ?> aria-describedby="x_thawPrimaryEmbryologist_help">
<?= $Page->thawPrimaryEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
    <div id="r_thawSecondaryEmbryologist" class="form-group row">
        <label id="elh_ivf_vitrification_thawSecondaryEmbryologist" for="x_thawSecondaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawSecondaryEmbryologist->caption() ?><?= $Page->thawSecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawSecondaryEmbryologist">
<input type="<?= $Page->thawSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_thawSecondaryEmbryologist" name="x_thawSecondaryEmbryologist" id="x_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawSecondaryEmbryologist->EditValue ?>"<?= $Page->thawSecondaryEmbryologist->editAttributes() ?> aria-describedby="x_thawSecondaryEmbryologist_help">
<?= $Page->thawSecondaryEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawET->Visible) { // thawET ?>
    <div id="r_thawET" class="form-group row">
        <label id="elh_ivf_vitrification_thawET" for="x_thawET" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawET->caption() ?><?= $Page->thawET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawET->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawET">
<input type="<?= $Page->thawET->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_thawET" name="x_thawET" id="x_thawET" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawET->getPlaceHolder()) ?>" value="<?= $Page->thawET->EditValue ?>"<?= $Page->thawET->editAttributes() ?> aria-describedby="x_thawET_help">
<?= $Page->thawET->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawET->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
    <div id="r_thawReFrozen" class="form-group row">
        <label id="elh_ivf_vitrification_thawReFrozen" for="x_thawReFrozen" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawReFrozen->caption() ?><?= $Page->thawReFrozen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawReFrozen->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawReFrozen">
<input type="<?= $Page->thawReFrozen->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_thawReFrozen" name="x_thawReFrozen" id="x_thawReFrozen" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawReFrozen->getPlaceHolder()) ?>" value="<?= $Page->thawReFrozen->EditValue ?>"<?= $Page->thawReFrozen->editAttributes() ?> aria-describedby="x_thawReFrozen_help">
<?= $Page->thawReFrozen->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawReFrozen->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
    <div id="r_thawAbserve" class="form-group row">
        <label id="elh_ivf_vitrification_thawAbserve" for="x_thawAbserve" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawAbserve->caption() ?><?= $Page->thawAbserve->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawAbserve->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawAbserve">
<input type="<?= $Page->thawAbserve->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_thawAbserve" name="x_thawAbserve" id="x_thawAbserve" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawAbserve->getPlaceHolder()) ?>" value="<?= $Page->thawAbserve->EditValue ?>"<?= $Page->thawAbserve->editAttributes() ?> aria-describedby="x_thawAbserve_help">
<?= $Page->thawAbserve->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawAbserve->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
    <div id="r_thawDiscard" class="form-group row">
        <label id="elh_ivf_vitrification_thawDiscard" for="x_thawDiscard" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawDiscard->caption() ?><?= $Page->thawDiscard->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawDiscard->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawDiscard">
<input type="<?= $Page->thawDiscard->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_thawDiscard" name="x_thawDiscard" id="x_thawDiscard" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawDiscard->getPlaceHolder()) ?>" value="<?= $Page->thawDiscard->EditValue ?>"<?= $Page->thawDiscard->editAttributes() ?> aria-describedby="x_thawDiscard_help">
<?= $Page->thawDiscard->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawDiscard->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Catheter->Visible) { // Catheter ?>
    <div id="r_Catheter" class="form-group row">
        <label id="elh_ivf_vitrification_Catheter" for="x_Catheter" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Catheter->caption() ?><?= $Page->Catheter->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Catheter->cellAttributes() ?>>
<span id="el_ivf_vitrification_Catheter">
<input type="<?= $Page->Catheter->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Catheter" name="x_Catheter" id="x_Catheter" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Catheter->getPlaceHolder()) ?>" value="<?= $Page->Catheter->EditValue ?>"<?= $Page->Catheter->editAttributes() ?> aria-describedby="x_Catheter_help">
<?= $Page->Catheter->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Catheter->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Difficulty->Visible) { // Difficulty ?>
    <div id="r_Difficulty" class="form-group row">
        <label id="elh_ivf_vitrification_Difficulty" for="x_Difficulty" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Difficulty->caption() ?><?= $Page->Difficulty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Difficulty->cellAttributes() ?>>
<span id="el_ivf_vitrification_Difficulty">
<input type="<?= $Page->Difficulty->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Difficulty" name="x_Difficulty" id="x_Difficulty" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Difficulty->getPlaceHolder()) ?>" value="<?= $Page->Difficulty->EditValue ?>"<?= $Page->Difficulty->editAttributes() ?> aria-describedby="x_Difficulty_help">
<?= $Page->Difficulty->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Difficulty->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Easy->Visible) { // Easy ?>
    <div id="r_Easy" class="form-group row">
        <label id="elh_ivf_vitrification_Easy" for="x_Easy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Easy->caption() ?><?= $Page->Easy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Easy->cellAttributes() ?>>
<span id="el_ivf_vitrification_Easy">
<input type="<?= $Page->Easy->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Easy" name="x_Easy" id="x_Easy" size="30" maxlength="220" placeholder="<?= HtmlEncode($Page->Easy->getPlaceHolder()) ?>" value="<?= $Page->Easy->EditValue ?>"<?= $Page->Easy->editAttributes() ?> aria-describedby="x_Easy_help">
<?= $Page->Easy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Easy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
    <div id="r_Comments" class="form-group row">
        <label id="elh_ivf_vitrification_Comments" for="x_Comments" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Comments->caption() ?><?= $Page->Comments->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Comments->cellAttributes() ?>>
<span id="el_ivf_vitrification_Comments">
<input type="<?= $Page->Comments->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Comments" name="x_Comments" id="x_Comments" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Comments->getPlaceHolder()) ?>" value="<?= $Page->Comments->EditValue ?>"<?= $Page->Comments->editAttributes() ?> aria-describedby="x_Comments_help">
<?= $Page->Comments->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Comments->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <div id="r_Doctor" class="form-group row">
        <label id="elh_ivf_vitrification_Doctor" for="x_Doctor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Doctor->caption() ?><?= $Page->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Doctor->cellAttributes() ?>>
<span id="el_ivf_vitrification_Doctor">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?> aria-describedby="x_Doctor_help">
<?= $Page->Doctor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Embryologist->Visible) { // Embryologist ?>
    <div id="r_Embryologist" class="form-group row">
        <label id="elh_ivf_vitrification_Embryologist" for="x_Embryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Embryologist->caption() ?><?= $Page->Embryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Embryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_Embryologist">
<input type="<?= $Page->Embryologist->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Embryologist" name="x_Embryologist" id="x_Embryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Embryologist->getPlaceHolder()) ?>" value="<?= $Page->Embryologist->EditValue ?>"<?= $Page->Embryologist->editAttributes() ?> aria-describedby="x_Embryologist_help">
<?= $Page->Embryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Embryologist->getErrorMessage() ?></div>
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
    ew.addEventHandlers("ivf_vitrification");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
