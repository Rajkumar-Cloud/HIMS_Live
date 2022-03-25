<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivfedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fivfedit = currentForm = new ew.Form("fivfedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf)
        ew.vars.tables.ivf = currentTable;
    fivfedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Male", [fields.Male.visible && fields.Male.required ? ew.Validators.required(fields.Male.caption) : null], fields.Male.isInvalid],
        ["Female", [fields.Female.visible && fields.Female.required ? ew.Validators.required(fields.Female.caption) : null], fields.Female.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["malepropic", [fields.malepropic.visible && fields.malepropic.required ? ew.Validators.fileRequired(fields.malepropic.caption) : null], fields.malepropic.isInvalid],
        ["femalepropic", [fields.femalepropic.visible && fields.femalepropic.required ? ew.Validators.fileRequired(fields.femalepropic.caption) : null], fields.femalepropic.isInvalid],
        ["HusbandEducation", [fields.HusbandEducation.visible && fields.HusbandEducation.required ? ew.Validators.required(fields.HusbandEducation.caption) : null], fields.HusbandEducation.isInvalid],
        ["WifeEducation", [fields.WifeEducation.visible && fields.WifeEducation.required ? ew.Validators.required(fields.WifeEducation.caption) : null], fields.WifeEducation.isInvalid],
        ["HusbandWorkHours", [fields.HusbandWorkHours.visible && fields.HusbandWorkHours.required ? ew.Validators.required(fields.HusbandWorkHours.caption) : null], fields.HusbandWorkHours.isInvalid],
        ["WifeWorkHours", [fields.WifeWorkHours.visible && fields.WifeWorkHours.required ? ew.Validators.required(fields.WifeWorkHours.caption) : null], fields.WifeWorkHours.isInvalid],
        ["PatientLanguage", [fields.PatientLanguage.visible && fields.PatientLanguage.required ? ew.Validators.required(fields.PatientLanguage.caption) : null], fields.PatientLanguage.isInvalid],
        ["ReferedBy", [fields.ReferedBy.visible && fields.ReferedBy.required ? ew.Validators.required(fields.ReferedBy.caption) : null], fields.ReferedBy.isInvalid],
        ["ReferPhNo", [fields.ReferPhNo.visible && fields.ReferPhNo.required ? ew.Validators.required(fields.ReferPhNo.caption) : null], fields.ReferPhNo.isInvalid],
        ["WifeCell", [fields.WifeCell.visible && fields.WifeCell.required ? ew.Validators.required(fields.WifeCell.caption) : null], fields.WifeCell.isInvalid],
        ["HusbandCell", [fields.HusbandCell.visible && fields.HusbandCell.required ? ew.Validators.required(fields.HusbandCell.caption) : null], fields.HusbandCell.isInvalid],
        ["WifeEmail", [fields.WifeEmail.visible && fields.WifeEmail.required ? ew.Validators.required(fields.WifeEmail.caption) : null], fields.WifeEmail.isInvalid],
        ["HusbandEmail", [fields.HusbandEmail.visible && fields.HusbandEmail.required ? ew.Validators.required(fields.HusbandEmail.caption) : null], fields.HusbandEmail.isInvalid],
        ["ARTCYCLE", [fields.ARTCYCLE.visible && fields.ARTCYCLE.required ? ew.Validators.required(fields.ARTCYCLE.caption) : null], fields.ARTCYCLE.isInvalid],
        ["RESULT", [fields.RESULT.visible && fields.RESULT.required ? ew.Validators.required(fields.RESULT.caption) : null], fields.RESULT.isInvalid],
        ["malepic", [fields.malepic.visible && fields.malepic.required ? ew.Validators.required(fields.malepic.caption) : null], fields.malepic.isInvalid],
        ["femalepic", [fields.femalepic.visible && fields.femalepic.required ? ew.Validators.required(fields.femalepic.caption) : null], fields.femalepic.isInvalid],
        ["Mgendar", [fields.Mgendar.visible && fields.Mgendar.required ? ew.Validators.required(fields.Mgendar.caption) : null], fields.Mgendar.isInvalid],
        ["Fgendar", [fields.Fgendar.visible && fields.Fgendar.required ? ew.Validators.required(fields.Fgendar.caption) : null], fields.Fgendar.isInvalid],
        ["CoupleID", [fields.CoupleID.visible && fields.CoupleID.required ? ew.Validators.required(fields.CoupleID.caption) : null], fields.CoupleID.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["PartnerName", [fields.PartnerName.visible && fields.PartnerName.required ? ew.Validators.required(fields.PartnerName.caption) : null], fields.PartnerName.isInvalid],
        ["PartnerID", [fields.PartnerID.visible && fields.PartnerID.required ? ew.Validators.required(fields.PartnerID.caption) : null], fields.PartnerID.isInvalid],
        ["DrID", [fields.DrID.visible && fields.DrID.required ? ew.Validators.required(fields.DrID.caption) : null], fields.DrID.isInvalid],
        ["DrDepartment", [fields.DrDepartment.visible && fields.DrDepartment.required ? ew.Validators.required(fields.DrDepartment.caption) : null], fields.DrDepartment.isInvalid],
        ["Doctor", [fields.Doctor.visible && fields.Doctor.required ? ew.Validators.required(fields.Doctor.caption) : null], fields.Doctor.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivfedit,
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
    fivfedit.validate = function () {
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
    fivfedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivfedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivfedit.lists.Male = <?= $Page->Male->toClientList($Page) ?>;
    fivfedit.lists.Female = <?= $Page->Female->toClientList($Page) ?>;
    fivfedit.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fivfedit.lists.ReferedBy = <?= $Page->ReferedBy->toClientList($Page) ?>;
    fivfedit.lists.ARTCYCLE = <?= $Page->ARTCYCLE->toClientList($Page) ?>;
    fivfedit.lists.RESULT = <?= $Page->RESULT->toClientList($Page) ?>;
    fivfedit.lists.DrID = <?= $Page->DrID->toClientList($Page) ?>;
    loadjs.done("fivfedit");
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
<form name="fivfedit" id="fivfedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ivf_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_id"><span id="el_ivf_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="ivf" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Male->Visible) { // Male ?>
    <div id="r_Male" class="form-group row">
        <label id="elh_ivf_Male" for="x_Male" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_Male"><?= $Page->Male->caption() ?><?= $Page->Male->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Male->cellAttributes() ?>>
<template id="tpx_ivf_Male"><span id="el_ivf_Male">
<?php $Page->Male->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_Male_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Male"><?= EmptyValue(strval($Page->Male->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Male->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Male->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Male->ReadOnly || $Page->Male->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Male',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Male->getErrorMessage() ?></div>
<?= $Page->Male->getCustomMessage() ?>
<?= $Page->Male->Lookup->getParamTag($Page, "p_x_Male") ?>
<input type="hidden" is="selection-list" data-table="ivf" data-field="x_Male" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Male->displayValueSeparatorAttribute() ?>" name="x_Male" id="x_Male" value="<?= $Page->Male->CurrentValue ?>"<?= $Page->Male->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Female->Visible) { // Female ?>
    <div id="r_Female" class="form-group row">
        <label id="elh_ivf_Female" for="x_Female" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_Female"><?= $Page->Female->caption() ?><?= $Page->Female->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Female->cellAttributes() ?>>
<template id="tpx_ivf_Female"><span id="el_ivf_Female">
<?php $Page->Female->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_Female_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Female"><?= EmptyValue(strval($Page->Female->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Female->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Female->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Female->ReadOnly || $Page->Female->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Female',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Female->getErrorMessage() ?></div>
<?= $Page->Female->getCustomMessage() ?>
<?= $Page->Female->Lookup->getParamTag($Page, "p_x_Female") ?>
<input type="hidden" is="selection-list" data-table="ivf" data-field="x_Female" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Female->displayValueSeparatorAttribute() ?>" name="x_Female" id="x_Female" value="<?= $Page->Female->CurrentValue ?>"<?= $Page->Female->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_ivf_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<template id="tpx_ivf_status"><span id="el_ivf_status">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="ivf_x_status"
        data-table="ivf"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x_status") ?>
    </select>
    <?= $Page->status->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_x_status']"),
        options = { name: "x_status", selectId: "ivf_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->malepropic->Visible) { // malepropic ?>
    <div id="r_malepropic" class="form-group row">
        <label id="elh_ivf_malepropic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_malepropic"><?= $Page->malepropic->caption() ?><?= $Page->malepropic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->malepropic->cellAttributes() ?>>
<template id="tpx_ivf_malepropic"><span id="el_ivf_malepropic">
<div id="fd_x_malepropic">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->malepropic->title() ?>" data-table="ivf" data-field="x_malepropic" name="x_malepropic" id="x_malepropic" lang="<?= CurrentLanguageID() ?>"<?= $Page->malepropic->editAttributes() ?><?= ($Page->malepropic->ReadOnly || $Page->malepropic->Disabled) ? " disabled" : "" ?> aria-describedby="x_malepropic_help">
        <label class="custom-file-label ew-file-label" for="x_malepropic"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<?= $Page->malepropic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->malepropic->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_malepropic" id= "fn_x_malepropic" value="<?= $Page->malepropic->Upload->FileName ?>">
<input type="hidden" name="fa_x_malepropic" id= "fa_x_malepropic" value="<?= (Post("fa_x_malepropic") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_malepropic" id= "fs_x_malepropic" value="450">
<input type="hidden" name="fx_x_malepropic" id= "fx_x_malepropic" value="<?= $Page->malepropic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_malepropic" id= "fm_x_malepropic" value="<?= $Page->malepropic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_malepropic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->femalepropic->Visible) { // femalepropic ?>
    <div id="r_femalepropic" class="form-group row">
        <label id="elh_ivf_femalepropic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_femalepropic"><?= $Page->femalepropic->caption() ?><?= $Page->femalepropic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->femalepropic->cellAttributes() ?>>
<template id="tpx_ivf_femalepropic"><span id="el_ivf_femalepropic">
<div id="fd_x_femalepropic">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->femalepropic->title() ?>" data-table="ivf" data-field="x_femalepropic" name="x_femalepropic" id="x_femalepropic" lang="<?= CurrentLanguageID() ?>"<?= $Page->femalepropic->editAttributes() ?><?= ($Page->femalepropic->ReadOnly || $Page->femalepropic->Disabled) ? " disabled" : "" ?> aria-describedby="x_femalepropic_help">
        <label class="custom-file-label ew-file-label" for="x_femalepropic"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<?= $Page->femalepropic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->femalepropic->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_femalepropic" id= "fn_x_femalepropic" value="<?= $Page->femalepropic->Upload->FileName ?>">
<input type="hidden" name="fa_x_femalepropic" id= "fa_x_femalepropic" value="<?= (Post("fa_x_femalepropic") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_femalepropic" id= "fs_x_femalepropic" value="450">
<input type="hidden" name="fx_x_femalepropic" id= "fx_x_femalepropic" value="<?= $Page->femalepropic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_femalepropic" id= "fm_x_femalepropic" value="<?= $Page->femalepropic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_femalepropic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
    <div id="r_HusbandEducation" class="form-group row">
        <label id="elh_ivf_HusbandEducation" for="x_HusbandEducation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_HusbandEducation"><?= $Page->HusbandEducation->caption() ?><?= $Page->HusbandEducation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandEducation->cellAttributes() ?>>
<template id="tpx_ivf_HusbandEducation"><span id="el_ivf_HusbandEducation">
<input type="<?= $Page->HusbandEducation->getInputTextType() ?>" data-table="ivf" data-field="x_HusbandEducation" name="x_HusbandEducation" id="x_HusbandEducation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandEducation->getPlaceHolder()) ?>" value="<?= $Page->HusbandEducation->EditValue ?>"<?= $Page->HusbandEducation->editAttributes() ?> aria-describedby="x_HusbandEducation_help">
<?= $Page->HusbandEducation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HusbandEducation->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
    <div id="r_WifeEducation" class="form-group row">
        <label id="elh_ivf_WifeEducation" for="x_WifeEducation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_WifeEducation"><?= $Page->WifeEducation->caption() ?><?= $Page->WifeEducation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WifeEducation->cellAttributes() ?>>
<template id="tpx_ivf_WifeEducation"><span id="el_ivf_WifeEducation">
<input type="<?= $Page->WifeEducation->getInputTextType() ?>" data-table="ivf" data-field="x_WifeEducation" name="x_WifeEducation" id="x_WifeEducation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WifeEducation->getPlaceHolder()) ?>" value="<?= $Page->WifeEducation->EditValue ?>"<?= $Page->WifeEducation->editAttributes() ?> aria-describedby="x_WifeEducation_help">
<?= $Page->WifeEducation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WifeEducation->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
    <div id="r_HusbandWorkHours" class="form-group row">
        <label id="elh_ivf_HusbandWorkHours" for="x_HusbandWorkHours" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_HusbandWorkHours"><?= $Page->HusbandWorkHours->caption() ?><?= $Page->HusbandWorkHours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandWorkHours->cellAttributes() ?>>
<template id="tpx_ivf_HusbandWorkHours"><span id="el_ivf_HusbandWorkHours">
<input type="<?= $Page->HusbandWorkHours->getInputTextType() ?>" data-table="ivf" data-field="x_HusbandWorkHours" name="x_HusbandWorkHours" id="x_HusbandWorkHours" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandWorkHours->getPlaceHolder()) ?>" value="<?= $Page->HusbandWorkHours->EditValue ?>"<?= $Page->HusbandWorkHours->editAttributes() ?> aria-describedby="x_HusbandWorkHours_help">
<?= $Page->HusbandWorkHours->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HusbandWorkHours->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
    <div id="r_WifeWorkHours" class="form-group row">
        <label id="elh_ivf_WifeWorkHours" for="x_WifeWorkHours" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_WifeWorkHours"><?= $Page->WifeWorkHours->caption() ?><?= $Page->WifeWorkHours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WifeWorkHours->cellAttributes() ?>>
<template id="tpx_ivf_WifeWorkHours"><span id="el_ivf_WifeWorkHours">
<input type="<?= $Page->WifeWorkHours->getInputTextType() ?>" data-table="ivf" data-field="x_WifeWorkHours" name="x_WifeWorkHours" id="x_WifeWorkHours" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WifeWorkHours->getPlaceHolder()) ?>" value="<?= $Page->WifeWorkHours->EditValue ?>"<?= $Page->WifeWorkHours->editAttributes() ?> aria-describedby="x_WifeWorkHours_help">
<?= $Page->WifeWorkHours->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WifeWorkHours->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
    <div id="r_PatientLanguage" class="form-group row">
        <label id="elh_ivf_PatientLanguage" for="x_PatientLanguage" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_PatientLanguage"><?= $Page->PatientLanguage->caption() ?><?= $Page->PatientLanguage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientLanguage->cellAttributes() ?>>
<template id="tpx_ivf_PatientLanguage"><span id="el_ivf_PatientLanguage">
<input type="<?= $Page->PatientLanguage->getInputTextType() ?>" data-table="ivf" data-field="x_PatientLanguage" name="x_PatientLanguage" id="x_PatientLanguage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientLanguage->getPlaceHolder()) ?>" value="<?= $Page->PatientLanguage->EditValue ?>"<?= $Page->PatientLanguage->editAttributes() ?> aria-describedby="x_PatientLanguage_help">
<?= $Page->PatientLanguage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientLanguage->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
    <div id="r_ReferedBy" class="form-group row">
        <label id="elh_ivf_ReferedBy" for="x_ReferedBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ReferedBy"><?= $Page->ReferedBy->caption() ?><?= $Page->ReferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferedBy->cellAttributes() ?>>
<template id="tpx_ivf_ReferedBy"><span id="el_ivf_ReferedBy">
<?php $Page->ReferedBy->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_ReferedBy_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferedBy"><?= EmptyValue(strval($Page->ReferedBy->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->ReferedBy->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->ReferedBy->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->ReferedBy->ReadOnly || $Page->ReferedBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferedBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$Page->ReferedBy->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferedBy" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->ReferedBy->caption() ?>" data-title="<?= $Page->ReferedBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferedBy',url:'<?= GetUrl("MasReferenceTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->ReferedBy->getErrorMessage() ?></div>
<?= $Page->ReferedBy->getCustomMessage() ?>
<?= $Page->ReferedBy->Lookup->getParamTag($Page, "p_x_ReferedBy") ?>
<input type="hidden" is="selection-list" data-table="ivf" data-field="x_ReferedBy" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->ReferedBy->displayValueSeparatorAttribute() ?>" name="x_ReferedBy" id="x_ReferedBy" value="<?= $Page->ReferedBy->CurrentValue ?>"<?= $Page->ReferedBy->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
    <div id="r_ReferPhNo" class="form-group row">
        <label id="elh_ivf_ReferPhNo" for="x_ReferPhNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ReferPhNo"><?= $Page->ReferPhNo->caption() ?><?= $Page->ReferPhNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferPhNo->cellAttributes() ?>>
<template id="tpx_ivf_ReferPhNo"><span id="el_ivf_ReferPhNo">
<input type="<?= $Page->ReferPhNo->getInputTextType() ?>" data-table="ivf" data-field="x_ReferPhNo" name="x_ReferPhNo" id="x_ReferPhNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferPhNo->getPlaceHolder()) ?>" value="<?= $Page->ReferPhNo->EditValue ?>"<?= $Page->ReferPhNo->editAttributes() ?> aria-describedby="x_ReferPhNo_help">
<?= $Page->ReferPhNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferPhNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
    <div id="r_WifeCell" class="form-group row">
        <label id="elh_ivf_WifeCell" for="x_WifeCell" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_WifeCell"><?= $Page->WifeCell->caption() ?><?= $Page->WifeCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WifeCell->cellAttributes() ?>>
<template id="tpx_ivf_WifeCell"><span id="el_ivf_WifeCell">
<input type="<?= $Page->WifeCell->getInputTextType() ?>" data-table="ivf" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WifeCell->getPlaceHolder()) ?>" value="<?= $Page->WifeCell->EditValue ?>"<?= $Page->WifeCell->editAttributes() ?> aria-describedby="x_WifeCell_help">
<?= $Page->WifeCell->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WifeCell->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
    <div id="r_HusbandCell" class="form-group row">
        <label id="elh_ivf_HusbandCell" for="x_HusbandCell" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_HusbandCell"><?= $Page->HusbandCell->caption() ?><?= $Page->HusbandCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandCell->cellAttributes() ?>>
<template id="tpx_ivf_HusbandCell"><span id="el_ivf_HusbandCell">
<input type="<?= $Page->HusbandCell->getInputTextType() ?>" data-table="ivf" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandCell->getPlaceHolder()) ?>" value="<?= $Page->HusbandCell->EditValue ?>"<?= $Page->HusbandCell->editAttributes() ?> aria-describedby="x_HusbandCell_help">
<?= $Page->HusbandCell->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HusbandCell->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WifeEmail->Visible) { // WifeEmail ?>
    <div id="r_WifeEmail" class="form-group row">
        <label id="elh_ivf_WifeEmail" for="x_WifeEmail" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_WifeEmail"><?= $Page->WifeEmail->caption() ?><?= $Page->WifeEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WifeEmail->cellAttributes() ?>>
<template id="tpx_ivf_WifeEmail"><span id="el_ivf_WifeEmail">
<input type="<?= $Page->WifeEmail->getInputTextType() ?>" data-table="ivf" data-field="x_WifeEmail" name="x_WifeEmail" id="x_WifeEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WifeEmail->getPlaceHolder()) ?>" value="<?= $Page->WifeEmail->EditValue ?>"<?= $Page->WifeEmail->editAttributes() ?> aria-describedby="x_WifeEmail_help">
<?= $Page->WifeEmail->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WifeEmail->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandEmail->Visible) { // HusbandEmail ?>
    <div id="r_HusbandEmail" class="form-group row">
        <label id="elh_ivf_HusbandEmail" for="x_HusbandEmail" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_HusbandEmail"><?= $Page->HusbandEmail->caption() ?><?= $Page->HusbandEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandEmail->cellAttributes() ?>>
<template id="tpx_ivf_HusbandEmail"><span id="el_ivf_HusbandEmail">
<input type="<?= $Page->HusbandEmail->getInputTextType() ?>" data-table="ivf" data-field="x_HusbandEmail" name="x_HusbandEmail" id="x_HusbandEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandEmail->getPlaceHolder()) ?>" value="<?= $Page->HusbandEmail->EditValue ?>"<?= $Page->HusbandEmail->editAttributes() ?> aria-describedby="x_HusbandEmail_help">
<?= $Page->HusbandEmail->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HusbandEmail->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
    <div id="r_ARTCYCLE" class="form-group row">
        <label id="elh_ivf_ARTCYCLE" for="x_ARTCYCLE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ARTCYCLE"><?= $Page->ARTCYCLE->caption() ?><?= $Page->ARTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCYCLE->cellAttributes() ?>>
<template id="tpx_ivf_ARTCYCLE"><span id="el_ivf_ARTCYCLE">
    <select
        id="x_ARTCYCLE"
        name="x_ARTCYCLE"
        class="form-control ew-select<?= $Page->ARTCYCLE->isInvalidClass() ?>"
        data-select2-id="ivf_x_ARTCYCLE"
        data-table="ivf"
        data-field="x_ARTCYCLE"
        data-value-separator="<?= $Page->ARTCYCLE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ARTCYCLE->getPlaceHolder()) ?>"
        <?= $Page->ARTCYCLE->editAttributes() ?>>
        <?= $Page->ARTCYCLE->selectOptionListHtml("x_ARTCYCLE") ?>
    </select>
    <?= $Page->ARTCYCLE->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ARTCYCLE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_x_ARTCYCLE']"),
        options = { name: "x_ARTCYCLE", selectId: "ivf_x_ARTCYCLE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf.fields.ARTCYCLE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf.fields.ARTCYCLE.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
    <div id="r_RESULT" class="form-group row">
        <label id="elh_ivf_RESULT" for="x_RESULT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_RESULT"><?= $Page->RESULT->caption() ?><?= $Page->RESULT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RESULT->cellAttributes() ?>>
<template id="tpx_ivf_RESULT"><span id="el_ivf_RESULT">
    <select
        id="x_RESULT"
        name="x_RESULT"
        class="form-control ew-select<?= $Page->RESULT->isInvalidClass() ?>"
        data-select2-id="ivf_x_RESULT"
        data-table="ivf"
        data-field="x_RESULT"
        data-value-separator="<?= $Page->RESULT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RESULT->getPlaceHolder()) ?>"
        <?= $Page->RESULT->editAttributes() ?>>
        <?= $Page->RESULT->selectOptionListHtml("x_RESULT") ?>
    </select>
    <?= $Page->RESULT->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RESULT->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_x_RESULT']"),
        options = { name: "x_RESULT", selectId: "ivf_x_RESULT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf.fields.RESULT.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf.fields.RESULT.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->malepic->Visible) { // malepic ?>
    <div id="r_malepic" class="form-group row">
        <label id="elh_ivf_malepic" for="x_malepic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_malepic"><?= $Page->malepic->caption() ?><?= $Page->malepic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->malepic->cellAttributes() ?>>
<template id="tpx_ivf_malepic"><span id="el_ivf_malepic">
<textarea data-table="ivf" data-field="x_malepic" name="x_malepic" id="x_malepic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->malepic->getPlaceHolder()) ?>"<?= $Page->malepic->editAttributes() ?> aria-describedby="x_malepic_help"><?= $Page->malepic->EditValue ?></textarea>
<?= $Page->malepic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->malepic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->femalepic->Visible) { // femalepic ?>
    <div id="r_femalepic" class="form-group row">
        <label id="elh_ivf_femalepic" for="x_femalepic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_femalepic"><?= $Page->femalepic->caption() ?><?= $Page->femalepic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->femalepic->cellAttributes() ?>>
<template id="tpx_ivf_femalepic"><span id="el_ivf_femalepic">
<textarea data-table="ivf" data-field="x_femalepic" name="x_femalepic" id="x_femalepic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->femalepic->getPlaceHolder()) ?>"<?= $Page->femalepic->editAttributes() ?> aria-describedby="x_femalepic_help"><?= $Page->femalepic->EditValue ?></textarea>
<?= $Page->femalepic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->femalepic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mgendar->Visible) { // Mgendar ?>
    <div id="r_Mgendar" class="form-group row">
        <label id="elh_ivf_Mgendar" for="x_Mgendar" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_Mgendar"><?= $Page->Mgendar->caption() ?><?= $Page->Mgendar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mgendar->cellAttributes() ?>>
<template id="tpx_ivf_Mgendar"><span id="el_ivf_Mgendar">
<textarea data-table="ivf" data-field="x_Mgendar" name="x_Mgendar" id="x_Mgendar" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Mgendar->getPlaceHolder()) ?>"<?= $Page->Mgendar->editAttributes() ?> aria-describedby="x_Mgendar_help"><?= $Page->Mgendar->EditValue ?></textarea>
<?= $Page->Mgendar->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mgendar->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fgendar->Visible) { // Fgendar ?>
    <div id="r_Fgendar" class="form-group row">
        <label id="elh_ivf_Fgendar" for="x_Fgendar" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_Fgendar"><?= $Page->Fgendar->caption() ?><?= $Page->Fgendar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fgendar->cellAttributes() ?>>
<template id="tpx_ivf_Fgendar"><span id="el_ivf_Fgendar">
<textarea data-table="ivf" data-field="x_Fgendar" name="x_Fgendar" id="x_Fgendar" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Fgendar->getPlaceHolder()) ?>"<?= $Page->Fgendar->editAttributes() ?> aria-describedby="x_Fgendar_help"><?= $Page->Fgendar->EditValue ?></textarea>
<?= $Page->Fgendar->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fgendar->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
    <div id="r_CoupleID" class="form-group row">
        <label id="elh_ivf_CoupleID" for="x_CoupleID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_CoupleID"><?= $Page->CoupleID->caption() ?><?= $Page->CoupleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CoupleID->cellAttributes() ?>>
<template id="tpx_ivf_CoupleID"><span id="el_ivf_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CoupleID->getDisplayValue($Page->CoupleID->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="ivf" data-field="x_CoupleID" data-hidden="1" name="x_CoupleID" id="x_CoupleID" value="<?= HtmlEncode($Page->CoupleID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_ivf_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_ivf_PatientName"><span id="el_ivf_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="ivf" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_ivf_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_PatientID"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_ivf_PatientID"><span id="el_ivf_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="ivf" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label id="elh_ivf_PartnerName" for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_PartnerName"><?= $Page->PartnerName->caption() ?><?= $Page->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx_ivf_PartnerName"><span id="el_ivf_PartnerName">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="ivf" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?> aria-describedby="x_PartnerName_help">
<?= $Page->PartnerName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <div id="r_PartnerID" class="form-group row">
        <label id="elh_ivf_PartnerID" for="x_PartnerID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_PartnerID"><?= $Page->PartnerID->caption() ?><?= $Page->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerID->cellAttributes() ?>>
<template id="tpx_ivf_PartnerID"><span id="el_ivf_PartnerID">
<input type="<?= $Page->PartnerID->getInputTextType() ?>" data-table="ivf" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerID->getPlaceHolder()) ?>" value="<?= $Page->PartnerID->EditValue ?>"<?= $Page->PartnerID->editAttributes() ?> aria-describedby="x_PartnerID_help">
<?= $Page->PartnerID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <div id="r_DrID" class="form-group row">
        <label id="elh_ivf_DrID" for="x_DrID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_DrID"><?= $Page->DrID->caption() ?><?= $Page->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrID->cellAttributes() ?>>
<template id="tpx_ivf_DrID"><span id="el_ivf_DrID">
<?php $Page->DrID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_DrID_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?= EmptyValue(strval($Page->DrID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DrID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DrID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DrID->ReadOnly || $Page->DrID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DrID->getErrorMessage() ?></div>
<?= $Page->DrID->getCustomMessage() ?>
<?= $Page->DrID->Lookup->getParamTag($Page, "p_x_DrID") ?>
<input type="hidden" is="selection-list" data-table="ivf" data-field="x_DrID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?= $Page->DrID->CurrentValue ?>"<?= $Page->DrID->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
    <div id="r_DrDepartment" class="form-group row">
        <label id="elh_ivf_DrDepartment" for="x_DrDepartment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_DrDepartment"><?= $Page->DrDepartment->caption() ?><?= $Page->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrDepartment->cellAttributes() ?>>
<template id="tpx_ivf_DrDepartment"><span id="el_ivf_DrDepartment">
<input type="<?= $Page->DrDepartment->getInputTextType() ?>" data-table="ivf" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrDepartment->getPlaceHolder()) ?>" value="<?= $Page->DrDepartment->EditValue ?>"<?= $Page->DrDepartment->editAttributes() ?> aria-describedby="x_DrDepartment_help">
<?= $Page->DrDepartment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrDepartment->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <div id="r_Doctor" class="form-group row">
        <label id="elh_ivf_Doctor" for="x_Doctor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_Doctor"><?= $Page->Doctor->caption() ?><?= $Page->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Doctor->cellAttributes() ?>>
<template id="tpx_ivf_Doctor"><span id="el_ivf_Doctor">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="ivf" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?> aria-describedby="x_Doctor_help">
<?= $Page->Doctor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivfedit" class="ew-custom-template"></div>
<template id="tpm_ivfedit">
<div id="ct_IvfEdit"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<?php
$IVFid = $_GET["id"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
?>	
				   <div class="ew-row" style="display: none;">
				   <slot class="ew-slot" name="tpc_ivf_malepic"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_malepic"></slot>
				   <slot class="ew-slot" name="tpc_ivf_Mgendar"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_Mgendar"></slot>
				   <slot class="ew-slot" name="tpc_ivf_PartnerName"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_PartnerName"></slot>
				   <slot class="ew-slot" name="tpc_ivf_PartnerID"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_PartnerID"></slot>
				   <slot class="ew-slot" name="tpc_ivf_WifeCell"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_WifeCell"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_malepropic"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_malepropic"></slot></span>
				  </div>
				   <div class="ew-row" style="display: none;">
				   <slot class="ew-slot" name="tpc_ivf_femalepic"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_femalepic"></slot>
				   <slot class="ew-slot" name="tpc_ivf_Fgendar"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_Fgendar"></slot>
				   <slot class="ew-slot" name="tpc_ivf_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_PatientName"></slot>
				   <slot class="ew-slot" name="tpc_ivf_PatientID"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_PatientID"></slot>
				   <slot class="ew-slot" name="tpc_ivf_HusbandCell"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_HusbandCell"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_femalepropic"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_femalepropic"></slot></span>
				  </div>
<script>
	document.getElementById("x_malepic").value = '<?php echo $results1[0]["profilePic"]; ?>';
	document.getElementById("x_femalepic").value = '<?php echo $results2[0]["profilePic"]; ?>';
</script>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body card-widget widget-user">
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_Female"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_Female"></slot></span>
				  </div>
			<div class="widget-user-image">
			   		<img id="femaleprofilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results2[0]["profilePic"]; ?>'  alt="User Avatar"> 
			  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_WifeEducation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_WifeEducation"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_WifeWorkHours"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_WifeWorkHours"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_WifeCell"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_WifeCell"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_WifeEmail"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_WifeEmail"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body card-widget widget-user">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_Male"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_Male"></slot></span>
				  </div>
			<div class="widget-user-image">
			   		<img id="maleprofilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results1[0]["profilePic"]; ?>' alt="User Avatar"> 
			  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_HusbandEducation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_HusbandEducation"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_HusbandWorkHours"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_HusbandWorkHours"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_HusbandCell"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_HusbandCell"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_HusbandEmail"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_HusbandEmail"></slot></span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<table class="ew-table">
	 <tbody>
		 <tr>
		 	<td><slot class="ew-slot" name="tpc_ivf_DrID"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_DrID"></slot></td>
			<td><slot class="ew-slot" name="tpc_ivf_Doctor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_Doctor"></slot></td>
			<td><slot class="ew-slot" name="tpc_ivf_DrDepartment"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_DrDepartment"></slot></td>
		</tr>
	  </tbody>
</table>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Refered By</h3>
			</div>
			<div class="card-body">
 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_PatientLanguage"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_PatientLanguage"></slot></span>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ReferedBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ReferedBy"></slot></span>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ReferPhNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ReferPhNo"></slot></span>
</div>
	</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_status"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_status"></slot></span>
				  </div>
	</div>
		</div>				
	</div>
</div>
</div>
</template>
<?php
    if (in_array("ivf_treatment_plan", explode(",", $Page->getCurrentDetailTable())) && $ivf_treatment_plan->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("ivf_treatment_plan", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "IvfTreatmentPlanGrid.php" ?>
<?php } ?>
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_ivfedit", "tpm_ivfedit", "ivfedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("ivf");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
