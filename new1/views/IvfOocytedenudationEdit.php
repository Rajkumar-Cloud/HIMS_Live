<?php

namespace PHPMaker2021\project3;

// Page object
$IvfOocytedenudationEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_oocytedenudationedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fivf_oocytedenudationedit = currentForm = new ew.Form("fivf_oocytedenudationedit", "edit");

    // Add fields
    var fields = ew.vars.tables.ivf_oocytedenudation.fields;
    fivf_oocytedenudationedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNo", [fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["Name", [fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["ResultDate", [fields.ResultDate.required ? ew.Validators.required(fields.ResultDate.caption) : null, ew.Validators.datetime(0)], fields.ResultDate.isInvalid],
        ["Surgeon", [fields.Surgeon.required ? ew.Validators.required(fields.Surgeon.caption) : null], fields.Surgeon.isInvalid],
        ["AsstSurgeon", [fields.AsstSurgeon.required ? ew.Validators.required(fields.AsstSurgeon.caption) : null], fields.AsstSurgeon.isInvalid],
        ["Anaesthetist", [fields.Anaesthetist.required ? ew.Validators.required(fields.Anaesthetist.caption) : null], fields.Anaesthetist.isInvalid],
        ["AnaestheiaType", [fields.AnaestheiaType.required ? ew.Validators.required(fields.AnaestheiaType.caption) : null], fields.AnaestheiaType.isInvalid],
        ["PrimaryEmbryologist", [fields.PrimaryEmbryologist.required ? ew.Validators.required(fields.PrimaryEmbryologist.caption) : null], fields.PrimaryEmbryologist.isInvalid],
        ["SecondaryEmbryologist", [fields.SecondaryEmbryologist.required ? ew.Validators.required(fields.SecondaryEmbryologist.caption) : null], fields.SecondaryEmbryologist.isInvalid],
        ["OPUNotes", [fields.OPUNotes.required ? ew.Validators.required(fields.OPUNotes.caption) : null], fields.OPUNotes.isInvalid],
        ["NoOfFolliclesRight", [fields.NoOfFolliclesRight.required ? ew.Validators.required(fields.NoOfFolliclesRight.caption) : null], fields.NoOfFolliclesRight.isInvalid],
        ["NoOfFolliclesLeft", [fields.NoOfFolliclesLeft.required ? ew.Validators.required(fields.NoOfFolliclesLeft.caption) : null], fields.NoOfFolliclesLeft.isInvalid],
        ["NoOfOocytes", [fields.NoOfOocytes.required ? ew.Validators.required(fields.NoOfOocytes.caption) : null], fields.NoOfOocytes.isInvalid],
        ["RecordOocyteDenudation", [fields.RecordOocyteDenudation.required ? ew.Validators.required(fields.RecordOocyteDenudation.caption) : null], fields.RecordOocyteDenudation.isInvalid],
        ["DateOfDenudation", [fields.DateOfDenudation.required ? ew.Validators.required(fields.DateOfDenudation.caption) : null, ew.Validators.datetime(0)], fields.DateOfDenudation.isInvalid],
        ["DenudationDoneBy", [fields.DenudationDoneBy.required ? ew.Validators.required(fields.DenudationDoneBy.caption) : null], fields.DenudationDoneBy.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["TidNo", [fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["ExpFollicles", [fields.ExpFollicles.required ? ew.Validators.required(fields.ExpFollicles.caption) : null], fields.ExpFollicles.isInvalid],
        ["SecondaryDenudationDoneBy", [fields.SecondaryDenudationDoneBy.required ? ew.Validators.required(fields.SecondaryDenudationDoneBy.caption) : null], fields.SecondaryDenudationDoneBy.isInvalid],
        ["OocyteOrgin", [fields.OocyteOrgin.required ? ew.Validators.required(fields.OocyteOrgin.caption) : null], fields.OocyteOrgin.isInvalid],
        ["patient1", [fields.patient1.required ? ew.Validators.required(fields.patient1.caption) : null, ew.Validators.integer], fields.patient1.isInvalid],
        ["patient2", [fields.patient2.required ? ew.Validators.required(fields.patient2.caption) : null, ew.Validators.integer], fields.patient2.isInvalid],
        ["OocytesDonate1", [fields.OocytesDonate1.required ? ew.Validators.required(fields.OocytesDonate1.caption) : null], fields.OocytesDonate1.isInvalid],
        ["OocytesDonate2", [fields.OocytesDonate2.required ? ew.Validators.required(fields.OocytesDonate2.caption) : null], fields.OocytesDonate2.isInvalid],
        ["ETDonate", [fields.ETDonate.required ? ew.Validators.required(fields.ETDonate.caption) : null], fields.ETDonate.isInvalid],
        ["OocyteType", [fields.OocyteType.required ? ew.Validators.required(fields.OocyteType.caption) : null], fields.OocyteType.isInvalid],
        ["MIOocytesDonate1", [fields.MIOocytesDonate1.required ? ew.Validators.required(fields.MIOocytesDonate1.caption) : null], fields.MIOocytesDonate1.isInvalid],
        ["MIOocytesDonate2", [fields.MIOocytesDonate2.required ? ew.Validators.required(fields.MIOocytesDonate2.caption) : null], fields.MIOocytesDonate2.isInvalid],
        ["SelfMI", [fields.SelfMI.required ? ew.Validators.required(fields.SelfMI.caption) : null], fields.SelfMI.isInvalid],
        ["SelfMII", [fields.SelfMII.required ? ew.Validators.required(fields.SelfMII.caption) : null], fields.SelfMII.isInvalid],
        ["patient3", [fields.patient3.required ? ew.Validators.required(fields.patient3.caption) : null, ew.Validators.integer], fields.patient3.isInvalid],
        ["patient4", [fields.patient4.required ? ew.Validators.required(fields.patient4.caption) : null, ew.Validators.integer], fields.patient4.isInvalid],
        ["OocytesDonate3", [fields.OocytesDonate3.required ? ew.Validators.required(fields.OocytesDonate3.caption) : null], fields.OocytesDonate3.isInvalid],
        ["OocytesDonate4", [fields.OocytesDonate4.required ? ew.Validators.required(fields.OocytesDonate4.caption) : null], fields.OocytesDonate4.isInvalid],
        ["MIOocytesDonate3", [fields.MIOocytesDonate3.required ? ew.Validators.required(fields.MIOocytesDonate3.caption) : null], fields.MIOocytesDonate3.isInvalid],
        ["MIOocytesDonate4", [fields.MIOocytesDonate4.required ? ew.Validators.required(fields.MIOocytesDonate4.caption) : null], fields.MIOocytesDonate4.isInvalid],
        ["SelfOocytesMI", [fields.SelfOocytesMI.required ? ew.Validators.required(fields.SelfOocytesMI.caption) : null], fields.SelfOocytesMI.isInvalid],
        ["SelfOocytesMII", [fields.SelfOocytesMII.required ? ew.Validators.required(fields.SelfOocytesMII.caption) : null], fields.SelfOocytesMII.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_oocytedenudationedit,
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
    fivf_oocytedenudationedit.validate = function () {
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
    fivf_oocytedenudationedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_oocytedenudationedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fivf_oocytedenudationedit");
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
<form name="fivf_oocytedenudationedit" id="fivf_oocytedenudationedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ivf_oocytedenudation_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_oocytedenudation_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_oocytedenudation_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <div id="r_ResultDate" class="form-group row">
        <label id="elh_ivf_oocytedenudation_ResultDate" for="x_ResultDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ResultDate->caption() ?><?= $Page->ResultDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_ResultDate">
<input type="<?= $Page->ResultDate->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?= HtmlEncode($Page->ResultDate->getPlaceHolder()) ?>" value="<?= $Page->ResultDate->EditValue ?>"<?= $Page->ResultDate->editAttributes() ?> aria-describedby="x_ResultDate_help">
<?= $Page->ResultDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResultDate->getErrorMessage() ?></div>
<?php if (!$Page->ResultDate->ReadOnly && !$Page->ResultDate->Disabled && !isset($Page->ResultDate->EditAttrs["readonly"]) && !isset($Page->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_oocytedenudationedit", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <div id="r_Surgeon" class="form-group row">
        <label id="elh_ivf_oocytedenudation_Surgeon" for="x_Surgeon" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Surgeon->caption() ?><?= $Page->Surgeon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Surgeon->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_Surgeon">
<input type="<?= $Page->Surgeon->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x_Surgeon" id="x_Surgeon" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Surgeon->getPlaceHolder()) ?>" value="<?= $Page->Surgeon->EditValue ?>"<?= $Page->Surgeon->editAttributes() ?> aria-describedby="x_Surgeon_help">
<?= $Page->Surgeon->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Surgeon->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AsstSurgeon->Visible) { // AsstSurgeon ?>
    <div id="r_AsstSurgeon" class="form-group row">
        <label id="elh_ivf_oocytedenudation_AsstSurgeon" for="x_AsstSurgeon" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AsstSurgeon->caption() ?><?= $Page->AsstSurgeon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AsstSurgeon->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_AsstSurgeon">
<input type="<?= $Page->AsstSurgeon->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x_AsstSurgeon" id="x_AsstSurgeon" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->AsstSurgeon->getPlaceHolder()) ?>" value="<?= $Page->AsstSurgeon->EditValue ?>"<?= $Page->AsstSurgeon->editAttributes() ?> aria-describedby="x_AsstSurgeon_help">
<?= $Page->AsstSurgeon->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AsstSurgeon->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
    <div id="r_Anaesthetist" class="form-group row">
        <label id="elh_ivf_oocytedenudation_Anaesthetist" for="x_Anaesthetist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Anaesthetist->caption() ?><?= $Page->Anaesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anaesthetist->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_Anaesthetist">
<input type="<?= $Page->Anaesthetist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x_Anaesthetist" id="x_Anaesthetist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Anaesthetist->getPlaceHolder()) ?>" value="<?= $Page->Anaesthetist->EditValue ?>"<?= $Page->Anaesthetist->editAttributes() ?> aria-describedby="x_Anaesthetist_help">
<?= $Page->Anaesthetist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Anaesthetist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnaestheiaType->Visible) { // AnaestheiaType ?>
    <div id="r_AnaestheiaType" class="form-group row">
        <label id="elh_ivf_oocytedenudation_AnaestheiaType" for="x_AnaestheiaType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AnaestheiaType->caption() ?><?= $Page->AnaestheiaType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnaestheiaType->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_AnaestheiaType">
<input type="<?= $Page->AnaestheiaType->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x_AnaestheiaType" id="x_AnaestheiaType" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->AnaestheiaType->getPlaceHolder()) ?>" value="<?= $Page->AnaestheiaType->EditValue ?>"<?= $Page->AnaestheiaType->editAttributes() ?> aria-describedby="x_AnaestheiaType_help">
<?= $Page->AnaestheiaType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnaestheiaType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
    <div id="r_PrimaryEmbryologist" class="form-group row">
        <label id="elh_ivf_oocytedenudation_PrimaryEmbryologist" for="x_PrimaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrimaryEmbryologist->caption() ?><?= $Page->PrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_PrimaryEmbryologist">
<input type="<?= $Page->PrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x_PrimaryEmbryologist" id="x_PrimaryEmbryologist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->PrimaryEmbryologist->EditValue ?>"<?= $Page->PrimaryEmbryologist->editAttributes() ?> aria-describedby="x_PrimaryEmbryologist_help">
<?= $Page->PrimaryEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrimaryEmbryologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
    <div id="r_SecondaryEmbryologist" class="form-group row">
        <label id="elh_ivf_oocytedenudation_SecondaryEmbryologist" for="x_SecondaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SecondaryEmbryologist->caption() ?><?= $Page->SecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_SecondaryEmbryologist">
<input type="<?= $Page->SecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x_SecondaryEmbryologist" id="x_SecondaryEmbryologist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->SecondaryEmbryologist->EditValue ?>"<?= $Page->SecondaryEmbryologist->editAttributes() ?> aria-describedby="x_SecondaryEmbryologist_help">
<?= $Page->SecondaryEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SecondaryEmbryologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OPUNotes->Visible) { // OPUNotes ?>
    <div id="r_OPUNotes" class="form-group row">
        <label id="elh_ivf_oocytedenudation_OPUNotes" for="x_OPUNotes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OPUNotes->caption() ?><?= $Page->OPUNotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPUNotes->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_OPUNotes">
<textarea data-table="ivf_oocytedenudation" data-field="x_OPUNotes" name="x_OPUNotes" id="x_OPUNotes" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->OPUNotes->getPlaceHolder()) ?>"<?= $Page->OPUNotes->editAttributes() ?> aria-describedby="x_OPUNotes_help"><?= $Page->OPUNotes->EditValue ?></textarea>
<?= $Page->OPUNotes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OPUNotes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
    <div id="r_NoOfFolliclesRight" class="form-group row">
        <label id="elh_ivf_oocytedenudation_NoOfFolliclesRight" for="x_NoOfFolliclesRight" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoOfFolliclesRight->caption() ?><?= $Page->NoOfFolliclesRight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfFolliclesRight->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_NoOfFolliclesRight">
<input type="<?= $Page->NoOfFolliclesRight->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x_NoOfFolliclesRight" id="x_NoOfFolliclesRight" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->NoOfFolliclesRight->getPlaceHolder()) ?>" value="<?= $Page->NoOfFolliclesRight->EditValue ?>"<?= $Page->NoOfFolliclesRight->editAttributes() ?> aria-describedby="x_NoOfFolliclesRight_help">
<?= $Page->NoOfFolliclesRight->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfFolliclesRight->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
    <div id="r_NoOfFolliclesLeft" class="form-group row">
        <label id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" for="x_NoOfFolliclesLeft" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoOfFolliclesLeft->caption() ?><?= $Page->NoOfFolliclesLeft->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfFolliclesLeft->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_NoOfFolliclesLeft">
<input type="<?= $Page->NoOfFolliclesLeft->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x_NoOfFolliclesLeft" id="x_NoOfFolliclesLeft" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->NoOfFolliclesLeft->getPlaceHolder()) ?>" value="<?= $Page->NoOfFolliclesLeft->EditValue ?>"<?= $Page->NoOfFolliclesLeft->editAttributes() ?> aria-describedby="x_NoOfFolliclesLeft_help">
<?= $Page->NoOfFolliclesLeft->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfFolliclesLeft->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfOocytes->Visible) { // NoOfOocytes ?>
    <div id="r_NoOfOocytes" class="form-group row">
        <label id="elh_ivf_oocytedenudation_NoOfOocytes" for="x_NoOfOocytes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoOfOocytes->caption() ?><?= $Page->NoOfOocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfOocytes->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_NoOfOocytes">
<input type="<?= $Page->NoOfOocytes->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x_NoOfOocytes" id="x_NoOfOocytes" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->NoOfOocytes->getPlaceHolder()) ?>" value="<?= $Page->NoOfOocytes->EditValue ?>"<?= $Page->NoOfOocytes->editAttributes() ?> aria-describedby="x_NoOfOocytes_help">
<?= $Page->NoOfOocytes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfOocytes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
    <div id="r_RecordOocyteDenudation" class="form-group row">
        <label id="elh_ivf_oocytedenudation_RecordOocyteDenudation" for="x_RecordOocyteDenudation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RecordOocyteDenudation->caption() ?><?= $Page->RecordOocyteDenudation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RecordOocyteDenudation->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_RecordOocyteDenudation">
<input type="<?= $Page->RecordOocyteDenudation->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x_RecordOocyteDenudation" id="x_RecordOocyteDenudation" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->RecordOocyteDenudation->getPlaceHolder()) ?>" value="<?= $Page->RecordOocyteDenudation->EditValue ?>"<?= $Page->RecordOocyteDenudation->editAttributes() ?> aria-describedby="x_RecordOocyteDenudation_help">
<?= $Page->RecordOocyteDenudation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RecordOocyteDenudation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateOfDenudation->Visible) { // DateOfDenudation ?>
    <div id="r_DateOfDenudation" class="form-group row">
        <label id="elh_ivf_oocytedenudation_DateOfDenudation" for="x_DateOfDenudation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DateOfDenudation->caption() ?><?= $Page->DateOfDenudation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateOfDenudation->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_DateOfDenudation">
<input type="<?= $Page->DateOfDenudation->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="x_DateOfDenudation" id="x_DateOfDenudation" placeholder="<?= HtmlEncode($Page->DateOfDenudation->getPlaceHolder()) ?>" value="<?= $Page->DateOfDenudation->EditValue ?>"<?= $Page->DateOfDenudation->editAttributes() ?> aria-describedby="x_DateOfDenudation_help">
<?= $Page->DateOfDenudation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateOfDenudation->getErrorMessage() ?></div>
<?php if (!$Page->DateOfDenudation->ReadOnly && !$Page->DateOfDenudation->Disabled && !isset($Page->DateOfDenudation->EditAttrs["readonly"]) && !isset($Page->DateOfDenudation->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_oocytedenudationedit", "x_DateOfDenudation", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
    <div id="r_DenudationDoneBy" class="form-group row">
        <label id="elh_ivf_oocytedenudation_DenudationDoneBy" for="x_DenudationDoneBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DenudationDoneBy->caption() ?><?= $Page->DenudationDoneBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DenudationDoneBy->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_DenudationDoneBy">
<input type="<?= $Page->DenudationDoneBy->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x_DenudationDoneBy" id="x_DenudationDoneBy" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->DenudationDoneBy->getPlaceHolder()) ?>" value="<?= $Page->DenudationDoneBy->EditValue ?>"<?= $Page->DenudationDoneBy->editAttributes() ?> aria-describedby="x_DenudationDoneBy_help">
<?= $Page->DenudationDoneBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DenudationDoneBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_ivf_oocytedenudation_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_ivf_oocytedenudation_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_ivf_oocytedenudation_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_oocytedenudationedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_ivf_oocytedenudation_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_ivf_oocytedenudation_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_oocytedenudationedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_oocytedenudation_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ExpFollicles->Visible) { // ExpFollicles ?>
    <div id="r_ExpFollicles" class="form-group row">
        <label id="elh_ivf_oocytedenudation_ExpFollicles" for="x_ExpFollicles" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ExpFollicles->caption() ?><?= $Page->ExpFollicles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ExpFollicles->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_ExpFollicles">
<input type="<?= $Page->ExpFollicles->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x_ExpFollicles" id="x_ExpFollicles" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ExpFollicles->getPlaceHolder()) ?>" value="<?= $Page->ExpFollicles->EditValue ?>"<?= $Page->ExpFollicles->editAttributes() ?> aria-describedby="x_ExpFollicles_help">
<?= $Page->ExpFollicles->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ExpFollicles->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
    <div id="r_SecondaryDenudationDoneBy" class="form-group row">
        <label id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" for="x_SecondaryDenudationDoneBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SecondaryDenudationDoneBy->caption() ?><?= $Page->SecondaryDenudationDoneBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SecondaryDenudationDoneBy->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_SecondaryDenudationDoneBy">
<input type="<?= $Page->SecondaryDenudationDoneBy->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x_SecondaryDenudationDoneBy" id="x_SecondaryDenudationDoneBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SecondaryDenudationDoneBy->getPlaceHolder()) ?>" value="<?= $Page->SecondaryDenudationDoneBy->EditValue ?>"<?= $Page->SecondaryDenudationDoneBy->editAttributes() ?> aria-describedby="x_SecondaryDenudationDoneBy_help">
<?= $Page->SecondaryDenudationDoneBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SecondaryDenudationDoneBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocyteOrgin->Visible) { // OocyteOrgin ?>
    <div id="r_OocyteOrgin" class="form-group row">
        <label id="elh_ivf_oocytedenudation_OocyteOrgin" for="x_OocyteOrgin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OocyteOrgin->caption() ?><?= $Page->OocyteOrgin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocyteOrgin->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_OocyteOrgin">
<input type="<?= $Page->OocyteOrgin->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="x_OocyteOrgin" id="x_OocyteOrgin" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocyteOrgin->getPlaceHolder()) ?>" value="<?= $Page->OocyteOrgin->EditValue ?>"<?= $Page->OocyteOrgin->editAttributes() ?> aria-describedby="x_OocyteOrgin_help">
<?= $Page->OocyteOrgin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocyteOrgin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient1->Visible) { // patient1 ?>
    <div id="r_patient1" class="form-group row">
        <label id="elh_ivf_oocytedenudation_patient1" for="x_patient1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patient1->caption() ?><?= $Page->patient1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient1->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_patient1">
<input type="<?= $Page->patient1->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_patient1" name="x_patient1" id="x_patient1" size="30" placeholder="<?= HtmlEncode($Page->patient1->getPlaceHolder()) ?>" value="<?= $Page->patient1->EditValue ?>"<?= $Page->patient1->editAttributes() ?> aria-describedby="x_patient1_help">
<?= $Page->patient1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patient1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient2->Visible) { // patient2 ?>
    <div id="r_patient2" class="form-group row">
        <label id="elh_ivf_oocytedenudation_patient2" for="x_patient2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patient2->caption() ?><?= $Page->patient2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient2->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_patient2">
<input type="<?= $Page->patient2->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_patient2" name="x_patient2" id="x_patient2" size="30" placeholder="<?= HtmlEncode($Page->patient2->getPlaceHolder()) ?>" value="<?= $Page->patient2->EditValue ?>"<?= $Page->patient2->editAttributes() ?> aria-describedby="x_patient2_help">
<?= $Page->patient2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patient2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocytesDonate1->Visible) { // OocytesDonate1 ?>
    <div id="r_OocytesDonate1" class="form-group row">
        <label id="elh_ivf_oocytedenudation_OocytesDonate1" for="x_OocytesDonate1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OocytesDonate1->caption() ?><?= $Page->OocytesDonate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocytesDonate1->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_OocytesDonate1">
<input type="<?= $Page->OocytesDonate1->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate1" name="x_OocytesDonate1" id="x_OocytesDonate1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocytesDonate1->getPlaceHolder()) ?>" value="<?= $Page->OocytesDonate1->EditValue ?>"<?= $Page->OocytesDonate1->editAttributes() ?> aria-describedby="x_OocytesDonate1_help">
<?= $Page->OocytesDonate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocytesDonate1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocytesDonate2->Visible) { // OocytesDonate2 ?>
    <div id="r_OocytesDonate2" class="form-group row">
        <label id="elh_ivf_oocytedenudation_OocytesDonate2" for="x_OocytesDonate2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OocytesDonate2->caption() ?><?= $Page->OocytesDonate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocytesDonate2->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_OocytesDonate2">
<input type="<?= $Page->OocytesDonate2->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate2" name="x_OocytesDonate2" id="x_OocytesDonate2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocytesDonate2->getPlaceHolder()) ?>" value="<?= $Page->OocytesDonate2->EditValue ?>"<?= $Page->OocytesDonate2->editAttributes() ?> aria-describedby="x_OocytesDonate2_help">
<?= $Page->OocytesDonate2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocytesDonate2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETDonate->Visible) { // ETDonate ?>
    <div id="r_ETDonate" class="form-group row">
        <label id="elh_ivf_oocytedenudation_ETDonate" for="x_ETDonate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ETDonate->caption() ?><?= $Page->ETDonate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETDonate->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_ETDonate">
<input type="<?= $Page->ETDonate->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_ETDonate" name="x_ETDonate" id="x_ETDonate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ETDonate->getPlaceHolder()) ?>" value="<?= $Page->ETDonate->EditValue ?>"<?= $Page->ETDonate->editAttributes() ?> aria-describedby="x_ETDonate_help">
<?= $Page->ETDonate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ETDonate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocyteType->Visible) { // OocyteType ?>
    <div id="r_OocyteType" class="form-group row">
        <label id="elh_ivf_oocytedenudation_OocyteType" for="x_OocyteType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OocyteType->caption() ?><?= $Page->OocyteType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocyteType->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_OocyteType">
<input type="<?= $Page->OocyteType->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="x_OocyteType" id="x_OocyteType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocyteType->getPlaceHolder()) ?>" value="<?= $Page->OocyteType->EditValue ?>"<?= $Page->OocyteType->editAttributes() ?> aria-describedby="x_OocyteType_help">
<?= $Page->OocyteType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocyteType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
    <div id="r_MIOocytesDonate1" class="form-group row">
        <label id="elh_ivf_oocytedenudation_MIOocytesDonate1" for="x_MIOocytesDonate1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MIOocytesDonate1->caption() ?><?= $Page->MIOocytesDonate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MIOocytesDonate1->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_MIOocytesDonate1">
<input type="<?= $Page->MIOocytesDonate1->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x_MIOocytesDonate1" id="x_MIOocytesDonate1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MIOocytesDonate1->getPlaceHolder()) ?>" value="<?= $Page->MIOocytesDonate1->EditValue ?>"<?= $Page->MIOocytesDonate1->editAttributes() ?> aria-describedby="x_MIOocytesDonate1_help">
<?= $Page->MIOocytesDonate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MIOocytesDonate1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
    <div id="r_MIOocytesDonate2" class="form-group row">
        <label id="elh_ivf_oocytedenudation_MIOocytesDonate2" for="x_MIOocytesDonate2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MIOocytesDonate2->caption() ?><?= $Page->MIOocytesDonate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MIOocytesDonate2->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_MIOocytesDonate2">
<input type="<?= $Page->MIOocytesDonate2->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x_MIOocytesDonate2" id="x_MIOocytesDonate2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MIOocytesDonate2->getPlaceHolder()) ?>" value="<?= $Page->MIOocytesDonate2->EditValue ?>"<?= $Page->MIOocytesDonate2->editAttributes() ?> aria-describedby="x_MIOocytesDonate2_help">
<?= $Page->MIOocytesDonate2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MIOocytesDonate2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SelfMI->Visible) { // SelfMI ?>
    <div id="r_SelfMI" class="form-group row">
        <label id="elh_ivf_oocytedenudation_SelfMI" for="x_SelfMI" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SelfMI->caption() ?><?= $Page->SelfMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SelfMI->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_SelfMI">
<input type="<?= $Page->SelfMI->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x_SelfMI" id="x_SelfMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SelfMI->getPlaceHolder()) ?>" value="<?= $Page->SelfMI->EditValue ?>"<?= $Page->SelfMI->editAttributes() ?> aria-describedby="x_SelfMI_help">
<?= $Page->SelfMI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SelfMI->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SelfMII->Visible) { // SelfMII ?>
    <div id="r_SelfMII" class="form-group row">
        <label id="elh_ivf_oocytedenudation_SelfMII" for="x_SelfMII" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SelfMII->caption() ?><?= $Page->SelfMII->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SelfMII->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_SelfMII">
<input type="<?= $Page->SelfMII->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x_SelfMII" id="x_SelfMII" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SelfMII->getPlaceHolder()) ?>" value="<?= $Page->SelfMII->EditValue ?>"<?= $Page->SelfMII->editAttributes() ?> aria-describedby="x_SelfMII_help">
<?= $Page->SelfMII->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SelfMII->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient3->Visible) { // patient3 ?>
    <div id="r_patient3" class="form-group row">
        <label id="elh_ivf_oocytedenudation_patient3" for="x_patient3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patient3->caption() ?><?= $Page->patient3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient3->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_patient3">
<input type="<?= $Page->patient3->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_patient3" name="x_patient3" id="x_patient3" size="30" placeholder="<?= HtmlEncode($Page->patient3->getPlaceHolder()) ?>" value="<?= $Page->patient3->EditValue ?>"<?= $Page->patient3->editAttributes() ?> aria-describedby="x_patient3_help">
<?= $Page->patient3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patient3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient4->Visible) { // patient4 ?>
    <div id="r_patient4" class="form-group row">
        <label id="elh_ivf_oocytedenudation_patient4" for="x_patient4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patient4->caption() ?><?= $Page->patient4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient4->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_patient4">
<input type="<?= $Page->patient4->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_patient4" name="x_patient4" id="x_patient4" size="30" placeholder="<?= HtmlEncode($Page->patient4->getPlaceHolder()) ?>" value="<?= $Page->patient4->EditValue ?>"<?= $Page->patient4->editAttributes() ?> aria-describedby="x_patient4_help">
<?= $Page->patient4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patient4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocytesDonate3->Visible) { // OocytesDonate3 ?>
    <div id="r_OocytesDonate3" class="form-group row">
        <label id="elh_ivf_oocytedenudation_OocytesDonate3" for="x_OocytesDonate3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OocytesDonate3->caption() ?><?= $Page->OocytesDonate3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocytesDonate3->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_OocytesDonate3">
<input type="<?= $Page->OocytesDonate3->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x_OocytesDonate3" id="x_OocytesDonate3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocytesDonate3->getPlaceHolder()) ?>" value="<?= $Page->OocytesDonate3->EditValue ?>"<?= $Page->OocytesDonate3->editAttributes() ?> aria-describedby="x_OocytesDonate3_help">
<?= $Page->OocytesDonate3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocytesDonate3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocytesDonate4->Visible) { // OocytesDonate4 ?>
    <div id="r_OocytesDonate4" class="form-group row">
        <label id="elh_ivf_oocytedenudation_OocytesDonate4" for="x_OocytesDonate4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OocytesDonate4->caption() ?><?= $Page->OocytesDonate4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocytesDonate4->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_OocytesDonate4">
<input type="<?= $Page->OocytesDonate4->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x_OocytesDonate4" id="x_OocytesDonate4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocytesDonate4->getPlaceHolder()) ?>" value="<?= $Page->OocytesDonate4->EditValue ?>"<?= $Page->OocytesDonate4->editAttributes() ?> aria-describedby="x_OocytesDonate4_help">
<?= $Page->OocytesDonate4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocytesDonate4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
    <div id="r_MIOocytesDonate3" class="form-group row">
        <label id="elh_ivf_oocytedenudation_MIOocytesDonate3" for="x_MIOocytesDonate3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MIOocytesDonate3->caption() ?><?= $Page->MIOocytesDonate3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MIOocytesDonate3->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_MIOocytesDonate3">
<input type="<?= $Page->MIOocytesDonate3->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x_MIOocytesDonate3" id="x_MIOocytesDonate3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MIOocytesDonate3->getPlaceHolder()) ?>" value="<?= $Page->MIOocytesDonate3->EditValue ?>"<?= $Page->MIOocytesDonate3->editAttributes() ?> aria-describedby="x_MIOocytesDonate3_help">
<?= $Page->MIOocytesDonate3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MIOocytesDonate3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
    <div id="r_MIOocytesDonate4" class="form-group row">
        <label id="elh_ivf_oocytedenudation_MIOocytesDonate4" for="x_MIOocytesDonate4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MIOocytesDonate4->caption() ?><?= $Page->MIOocytesDonate4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MIOocytesDonate4->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_MIOocytesDonate4">
<input type="<?= $Page->MIOocytesDonate4->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x_MIOocytesDonate4" id="x_MIOocytesDonate4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MIOocytesDonate4->getPlaceHolder()) ?>" value="<?= $Page->MIOocytesDonate4->EditValue ?>"<?= $Page->MIOocytesDonate4->editAttributes() ?> aria-describedby="x_MIOocytesDonate4_help">
<?= $Page->MIOocytesDonate4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MIOocytesDonate4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
    <div id="r_SelfOocytesMI" class="form-group row">
        <label id="elh_ivf_oocytedenudation_SelfOocytesMI" for="x_SelfOocytesMI" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SelfOocytesMI->caption() ?><?= $Page->SelfOocytesMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SelfOocytesMI->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_SelfOocytesMI">
<input type="<?= $Page->SelfOocytesMI->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x_SelfOocytesMI" id="x_SelfOocytesMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SelfOocytesMI->getPlaceHolder()) ?>" value="<?= $Page->SelfOocytesMI->EditValue ?>"<?= $Page->SelfOocytesMI->editAttributes() ?> aria-describedby="x_SelfOocytesMI_help">
<?= $Page->SelfOocytesMI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SelfOocytesMI->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
    <div id="r_SelfOocytesMII" class="form-group row">
        <label id="elh_ivf_oocytedenudation_SelfOocytesMII" for="x_SelfOocytesMII" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SelfOocytesMII->caption() ?><?= $Page->SelfOocytesMII->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SelfOocytesMII->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_SelfOocytesMII">
<input type="<?= $Page->SelfOocytesMII->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x_SelfOocytesMII" id="x_SelfOocytesMII" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SelfOocytesMII->getPlaceHolder()) ?>" value="<?= $Page->SelfOocytesMII->EditValue ?>"<?= $Page->SelfOocytesMII->editAttributes() ?> aria-describedby="x_SelfOocytesMII_help">
<?= $Page->SelfOocytesMII->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SelfOocytesMII->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("ivf_oocytedenudation");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
