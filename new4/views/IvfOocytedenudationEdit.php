<?php

namespace PHPMaker2021\HIMS;

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
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_oocytedenudation")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_oocytedenudation)
        ew.vars.tables.ivf_oocytedenudation = currentTable;
    fivf_oocytedenudationedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["ResultDate", [fields.ResultDate.visible && fields.ResultDate.required ? ew.Validators.required(fields.ResultDate.caption) : null, ew.Validators.datetime(11)], fields.ResultDate.isInvalid],
        ["Surgeon", [fields.Surgeon.visible && fields.Surgeon.required ? ew.Validators.required(fields.Surgeon.caption) : null], fields.Surgeon.isInvalid],
        ["AsstSurgeon", [fields.AsstSurgeon.visible && fields.AsstSurgeon.required ? ew.Validators.required(fields.AsstSurgeon.caption) : null], fields.AsstSurgeon.isInvalid],
        ["Anaesthetist", [fields.Anaesthetist.visible && fields.Anaesthetist.required ? ew.Validators.required(fields.Anaesthetist.caption) : null], fields.Anaesthetist.isInvalid],
        ["AnaestheiaType", [fields.AnaestheiaType.visible && fields.AnaestheiaType.required ? ew.Validators.required(fields.AnaestheiaType.caption) : null], fields.AnaestheiaType.isInvalid],
        ["PrimaryEmbryologist", [fields.PrimaryEmbryologist.visible && fields.PrimaryEmbryologist.required ? ew.Validators.required(fields.PrimaryEmbryologist.caption) : null], fields.PrimaryEmbryologist.isInvalid],
        ["SecondaryEmbryologist", [fields.SecondaryEmbryologist.visible && fields.SecondaryEmbryologist.required ? ew.Validators.required(fields.SecondaryEmbryologist.caption) : null], fields.SecondaryEmbryologist.isInvalid],
        ["OPUNotes", [fields.OPUNotes.visible && fields.OPUNotes.required ? ew.Validators.required(fields.OPUNotes.caption) : null], fields.OPUNotes.isInvalid],
        ["NoOfFolliclesRight", [fields.NoOfFolliclesRight.visible && fields.NoOfFolliclesRight.required ? ew.Validators.required(fields.NoOfFolliclesRight.caption) : null], fields.NoOfFolliclesRight.isInvalid],
        ["NoOfFolliclesLeft", [fields.NoOfFolliclesLeft.visible && fields.NoOfFolliclesLeft.required ? ew.Validators.required(fields.NoOfFolliclesLeft.caption) : null], fields.NoOfFolliclesLeft.isInvalid],
        ["NoOfOocytes", [fields.NoOfOocytes.visible && fields.NoOfOocytes.required ? ew.Validators.required(fields.NoOfOocytes.caption) : null], fields.NoOfOocytes.isInvalid],
        ["RecordOocyteDenudation", [fields.RecordOocyteDenudation.visible && fields.RecordOocyteDenudation.required ? ew.Validators.required(fields.RecordOocyteDenudation.caption) : null], fields.RecordOocyteDenudation.isInvalid],
        ["DateOfDenudation", [fields.DateOfDenudation.visible && fields.DateOfDenudation.required ? ew.Validators.required(fields.DateOfDenudation.caption) : null, ew.Validators.datetime(11)], fields.DateOfDenudation.isInvalid],
        ["DenudationDoneBy", [fields.DenudationDoneBy.visible && fields.DenudationDoneBy.required ? ew.Validators.required(fields.DenudationDoneBy.caption) : null], fields.DenudationDoneBy.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["ExpFollicles", [fields.ExpFollicles.visible && fields.ExpFollicles.required ? ew.Validators.required(fields.ExpFollicles.caption) : null], fields.ExpFollicles.isInvalid],
        ["SecondaryDenudationDoneBy", [fields.SecondaryDenudationDoneBy.visible && fields.SecondaryDenudationDoneBy.required ? ew.Validators.required(fields.SecondaryDenudationDoneBy.caption) : null], fields.SecondaryDenudationDoneBy.isInvalid],
        ["patient2", [fields.patient2.visible && fields.patient2.required ? ew.Validators.required(fields.patient2.caption) : null], fields.patient2.isInvalid],
        ["OocytesDonate1", [fields.OocytesDonate1.visible && fields.OocytesDonate1.required ? ew.Validators.required(fields.OocytesDonate1.caption) : null], fields.OocytesDonate1.isInvalid],
        ["OocytesDonate2", [fields.OocytesDonate2.visible && fields.OocytesDonate2.required ? ew.Validators.required(fields.OocytesDonate2.caption) : null], fields.OocytesDonate2.isInvalid],
        ["ETDonate", [fields.ETDonate.visible && fields.ETDonate.required ? ew.Validators.required(fields.ETDonate.caption) : null], fields.ETDonate.isInvalid],
        ["OocyteOrgin", [fields.OocyteOrgin.visible && fields.OocyteOrgin.required ? ew.Validators.required(fields.OocyteOrgin.caption) : null], fields.OocyteOrgin.isInvalid],
        ["patient1", [fields.patient1.visible && fields.patient1.required ? ew.Validators.required(fields.patient1.caption) : null], fields.patient1.isInvalid],
        ["OocyteType", [fields.OocyteType.visible && fields.OocyteType.required ? ew.Validators.required(fields.OocyteType.caption) : null], fields.OocyteType.isInvalid],
        ["MIOocytesDonate1", [fields.MIOocytesDonate1.visible && fields.MIOocytesDonate1.required ? ew.Validators.required(fields.MIOocytesDonate1.caption) : null], fields.MIOocytesDonate1.isInvalid],
        ["MIOocytesDonate2", [fields.MIOocytesDonate2.visible && fields.MIOocytesDonate2.required ? ew.Validators.required(fields.MIOocytesDonate2.caption) : null], fields.MIOocytesDonate2.isInvalid],
        ["SelfMI", [fields.SelfMI.visible && fields.SelfMI.required ? ew.Validators.required(fields.SelfMI.caption) : null], fields.SelfMI.isInvalid],
        ["SelfMII", [fields.SelfMII.visible && fields.SelfMII.required ? ew.Validators.required(fields.SelfMII.caption) : null], fields.SelfMII.isInvalid],
        ["patient3", [fields.patient3.visible && fields.patient3.required ? ew.Validators.required(fields.patient3.caption) : null], fields.patient3.isInvalid],
        ["patient4", [fields.patient4.visible && fields.patient4.required ? ew.Validators.required(fields.patient4.caption) : null], fields.patient4.isInvalid],
        ["OocytesDonate3", [fields.OocytesDonate3.visible && fields.OocytesDonate3.required ? ew.Validators.required(fields.OocytesDonate3.caption) : null], fields.OocytesDonate3.isInvalid],
        ["OocytesDonate4", [fields.OocytesDonate4.visible && fields.OocytesDonate4.required ? ew.Validators.required(fields.OocytesDonate4.caption) : null], fields.OocytesDonate4.isInvalid],
        ["MIOocytesDonate3", [fields.MIOocytesDonate3.visible && fields.MIOocytesDonate3.required ? ew.Validators.required(fields.MIOocytesDonate3.caption) : null], fields.MIOocytesDonate3.isInvalid],
        ["MIOocytesDonate4", [fields.MIOocytesDonate4.visible && fields.MIOocytesDonate4.required ? ew.Validators.required(fields.MIOocytesDonate4.caption) : null], fields.MIOocytesDonate4.isInvalid],
        ["SelfOocytesMI", [fields.SelfOocytesMI.visible && fields.SelfOocytesMI.required ? ew.Validators.required(fields.SelfOocytesMI.caption) : null], fields.SelfOocytesMI.isInvalid],
        ["SelfOocytesMII", [fields.SelfOocytesMII.visible && fields.SelfOocytesMII.required ? ew.Validators.required(fields.SelfOocytesMII.caption) : null], fields.SelfOocytesMII.isInvalid],
        ["donor", [fields.donor.visible && fields.donor.required ? ew.Validators.required(fields.donor.caption) : null, ew.Validators.integer], fields.donor.isInvalid]
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
    fivf_oocytedenudationedit.lists.patient2 = <?= $Page->patient2->toClientList($Page) ?>;
    fivf_oocytedenudationedit.lists.OocyteOrgin = <?= $Page->OocyteOrgin->toClientList($Page) ?>;
    fivf_oocytedenudationedit.lists.patient1 = <?= $Page->patient1->toClientList($Page) ?>;
    fivf_oocytedenudationedit.lists.OocyteType = <?= $Page->OocyteType->toClientList($Page) ?>;
    fivf_oocytedenudationedit.lists.patient3 = <?= $Page->patient3->toClientList($Page) ?>;
    fivf_oocytedenudationedit.lists.patient4 = <?= $Page->patient4->toClientList($Page) ?>;
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
<form name="fivf_oocytedenudationedit" id="fivf_oocytedenudationedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "view_ivf_treatment") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="view_ivf_treatment">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->TidNo->getSessionValue()) ?>">
<input type="hidden" name="fk_RIDNO" value="<?= HtmlEncode($Page->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?= HtmlEncode($Page->Name->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ivf_oocytedenudation_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_id"><span id="el_ivf_oocytedenudation_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_oocytedenudation_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_RIDNo"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<?php if ($Page->RIDNo->getSessionValue() != "") { ?>
<template id="tpx_ivf_oocytedenudation_RIDNo"><span id="el_ivf_oocytedenudation_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RIDNo->getDisplayValue($Page->RIDNo->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_RIDNo" name="x_RIDNo" value="<?= HtmlEncode($Page->RIDNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_ivf_oocytedenudation_RIDNo"><span id="el_ivf_oocytedenudation_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_oocytedenudation_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_Name"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<?php if ($Page->Name->getSessionValue() != "") { ?>
<template id="tpx_ivf_oocytedenudation_Name"><span id="el_ivf_oocytedenudation_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Name->getDisplayValue($Page->Name->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_Name" name="x_Name" value="<?= HtmlEncode($Page->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_ivf_oocytedenudation_Name"><span id="el_ivf_oocytedenudation_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <div id="r_ResultDate" class="form-group row">
        <label id="elh_ivf_oocytedenudation_ResultDate" for="x_ResultDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_ResultDate"><?= $Page->ResultDate->caption() ?><?= $Page->ResultDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultDate->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_ResultDate"><span id="el_ivf_oocytedenudation_ResultDate">
<input type="<?= $Page->ResultDate->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-format="11" name="x_ResultDate" id="x_ResultDate" placeholder="<?= HtmlEncode($Page->ResultDate->getPlaceHolder()) ?>" value="<?= $Page->ResultDate->EditValue ?>"<?= $Page->ResultDate->editAttributes() ?> aria-describedby="x_ResultDate_help">
<?= $Page->ResultDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResultDate->getErrorMessage() ?></div>
<?php if (!$Page->ResultDate->ReadOnly && !$Page->ResultDate->Disabled && !isset($Page->ResultDate->EditAttrs["readonly"]) && !isset($Page->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_oocytedenudationedit", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <div id="r_Surgeon" class="form-group row">
        <label id="elh_ivf_oocytedenudation_Surgeon" for="x_Surgeon" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_Surgeon"><?= $Page->Surgeon->caption() ?><?= $Page->Surgeon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Surgeon->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_Surgeon"><span id="el_ivf_oocytedenudation_Surgeon">
<input type="<?= $Page->Surgeon->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x_Surgeon" id="x_Surgeon" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Surgeon->getPlaceHolder()) ?>" value="<?= $Page->Surgeon->EditValue ?>"<?= $Page->Surgeon->editAttributes() ?> aria-describedby="x_Surgeon_help">
<?= $Page->Surgeon->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Surgeon->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AsstSurgeon->Visible) { // AsstSurgeon ?>
    <div id="r_AsstSurgeon" class="form-group row">
        <label id="elh_ivf_oocytedenudation_AsstSurgeon" for="x_AsstSurgeon" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_AsstSurgeon"><?= $Page->AsstSurgeon->caption() ?><?= $Page->AsstSurgeon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AsstSurgeon->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_AsstSurgeon"><span id="el_ivf_oocytedenudation_AsstSurgeon">
<input type="<?= $Page->AsstSurgeon->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x_AsstSurgeon" id="x_AsstSurgeon" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->AsstSurgeon->getPlaceHolder()) ?>" value="<?= $Page->AsstSurgeon->EditValue ?>"<?= $Page->AsstSurgeon->editAttributes() ?> aria-describedby="x_AsstSurgeon_help">
<?= $Page->AsstSurgeon->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AsstSurgeon->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
    <div id="r_Anaesthetist" class="form-group row">
        <label id="elh_ivf_oocytedenudation_Anaesthetist" for="x_Anaesthetist" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_Anaesthetist"><?= $Page->Anaesthetist->caption() ?><?= $Page->Anaesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anaesthetist->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_Anaesthetist"><span id="el_ivf_oocytedenudation_Anaesthetist">
<input type="<?= $Page->Anaesthetist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x_Anaesthetist" id="x_Anaesthetist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Anaesthetist->getPlaceHolder()) ?>" value="<?= $Page->Anaesthetist->EditValue ?>"<?= $Page->Anaesthetist->editAttributes() ?> aria-describedby="x_Anaesthetist_help">
<?= $Page->Anaesthetist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Anaesthetist->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnaestheiaType->Visible) { // AnaestheiaType ?>
    <div id="r_AnaestheiaType" class="form-group row">
        <label id="elh_ivf_oocytedenudation_AnaestheiaType" for="x_AnaestheiaType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_AnaestheiaType"><?= $Page->AnaestheiaType->caption() ?><?= $Page->AnaestheiaType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnaestheiaType->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_AnaestheiaType"><span id="el_ivf_oocytedenudation_AnaestheiaType">
<input type="<?= $Page->AnaestheiaType->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x_AnaestheiaType" id="x_AnaestheiaType" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->AnaestheiaType->getPlaceHolder()) ?>" value="<?= $Page->AnaestheiaType->EditValue ?>"<?= $Page->AnaestheiaType->editAttributes() ?> aria-describedby="x_AnaestheiaType_help">
<?= $Page->AnaestheiaType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnaestheiaType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
    <div id="r_PrimaryEmbryologist" class="form-group row">
        <label id="elh_ivf_oocytedenudation_PrimaryEmbryologist" for="x_PrimaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_PrimaryEmbryologist"><?= $Page->PrimaryEmbryologist->caption() ?><?= $Page->PrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrimaryEmbryologist->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_PrimaryEmbryologist"><span id="el_ivf_oocytedenudation_PrimaryEmbryologist">
<input type="<?= $Page->PrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x_PrimaryEmbryologist" id="x_PrimaryEmbryologist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->PrimaryEmbryologist->EditValue ?>"<?= $Page->PrimaryEmbryologist->editAttributes() ?> aria-describedby="x_PrimaryEmbryologist_help">
<?= $Page->PrimaryEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrimaryEmbryologist->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
    <div id="r_SecondaryEmbryologist" class="form-group row">
        <label id="elh_ivf_oocytedenudation_SecondaryEmbryologist" for="x_SecondaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_SecondaryEmbryologist"><?= $Page->SecondaryEmbryologist->caption() ?><?= $Page->SecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SecondaryEmbryologist->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SecondaryEmbryologist"><span id="el_ivf_oocytedenudation_SecondaryEmbryologist">
<input type="<?= $Page->SecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x_SecondaryEmbryologist" id="x_SecondaryEmbryologist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->SecondaryEmbryologist->EditValue ?>"<?= $Page->SecondaryEmbryologist->editAttributes() ?> aria-describedby="x_SecondaryEmbryologist_help">
<?= $Page->SecondaryEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SecondaryEmbryologist->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OPUNotes->Visible) { // OPUNotes ?>
    <div id="r_OPUNotes" class="form-group row">
        <label id="elh_ivf_oocytedenudation_OPUNotes" for="x_OPUNotes" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_OPUNotes"><?= $Page->OPUNotes->caption() ?><?= $Page->OPUNotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPUNotes->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OPUNotes"><span id="el_ivf_oocytedenudation_OPUNotes">
<textarea data-table="ivf_oocytedenudation" data-field="x_OPUNotes" name="x_OPUNotes" id="x_OPUNotes" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->OPUNotes->getPlaceHolder()) ?>"<?= $Page->OPUNotes->editAttributes() ?> aria-describedby="x_OPUNotes_help"><?= $Page->OPUNotes->EditValue ?></textarea>
<?= $Page->OPUNotes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OPUNotes->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
    <div id="r_NoOfFolliclesRight" class="form-group row">
        <label id="elh_ivf_oocytedenudation_NoOfFolliclesRight" for="x_NoOfFolliclesRight" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_NoOfFolliclesRight"><?= $Page->NoOfFolliclesRight->caption() ?><?= $Page->NoOfFolliclesRight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfFolliclesRight->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_NoOfFolliclesRight"><span id="el_ivf_oocytedenudation_NoOfFolliclesRight">
<input type="<?= $Page->NoOfFolliclesRight->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x_NoOfFolliclesRight" id="x_NoOfFolliclesRight" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->NoOfFolliclesRight->getPlaceHolder()) ?>" value="<?= $Page->NoOfFolliclesRight->EditValue ?>"<?= $Page->NoOfFolliclesRight->editAttributes() ?> aria-describedby="x_NoOfFolliclesRight_help">
<?= $Page->NoOfFolliclesRight->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfFolliclesRight->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
    <div id="r_NoOfFolliclesLeft" class="form-group row">
        <label id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" for="x_NoOfFolliclesLeft" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_NoOfFolliclesLeft"><?= $Page->NoOfFolliclesLeft->caption() ?><?= $Page->NoOfFolliclesLeft->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfFolliclesLeft->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_NoOfFolliclesLeft"><span id="el_ivf_oocytedenudation_NoOfFolliclesLeft">
<input type="<?= $Page->NoOfFolliclesLeft->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x_NoOfFolliclesLeft" id="x_NoOfFolliclesLeft" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->NoOfFolliclesLeft->getPlaceHolder()) ?>" value="<?= $Page->NoOfFolliclesLeft->EditValue ?>"<?= $Page->NoOfFolliclesLeft->editAttributes() ?> aria-describedby="x_NoOfFolliclesLeft_help">
<?= $Page->NoOfFolliclesLeft->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfFolliclesLeft->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfOocytes->Visible) { // NoOfOocytes ?>
    <div id="r_NoOfOocytes" class="form-group row">
        <label id="elh_ivf_oocytedenudation_NoOfOocytes" for="x_NoOfOocytes" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_NoOfOocytes"><?= $Page->NoOfOocytes->caption() ?><?= $Page->NoOfOocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfOocytes->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_NoOfOocytes"><span id="el_ivf_oocytedenudation_NoOfOocytes">
<input type="<?= $Page->NoOfOocytes->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x_NoOfOocytes" id="x_NoOfOocytes" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->NoOfOocytes->getPlaceHolder()) ?>" value="<?= $Page->NoOfOocytes->EditValue ?>"<?= $Page->NoOfOocytes->editAttributes() ?> aria-describedby="x_NoOfOocytes_help">
<?= $Page->NoOfOocytes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfOocytes->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
    <div id="r_RecordOocyteDenudation" class="form-group row">
        <label id="elh_ivf_oocytedenudation_RecordOocyteDenudation" for="x_RecordOocyteDenudation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_RecordOocyteDenudation"><?= $Page->RecordOocyteDenudation->caption() ?><?= $Page->RecordOocyteDenudation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RecordOocyteDenudation->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_RecordOocyteDenudation"><span id="el_ivf_oocytedenudation_RecordOocyteDenudation">
<input type="<?= $Page->RecordOocyteDenudation->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x_RecordOocyteDenudation" id="x_RecordOocyteDenudation" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->RecordOocyteDenudation->getPlaceHolder()) ?>" value="<?= $Page->RecordOocyteDenudation->EditValue ?>"<?= $Page->RecordOocyteDenudation->editAttributes() ?> aria-describedby="x_RecordOocyteDenudation_help">
<?= $Page->RecordOocyteDenudation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RecordOocyteDenudation->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateOfDenudation->Visible) { // DateOfDenudation ?>
    <div id="r_DateOfDenudation" class="form-group row">
        <label id="elh_ivf_oocytedenudation_DateOfDenudation" for="x_DateOfDenudation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_DateOfDenudation"><?= $Page->DateOfDenudation->caption() ?><?= $Page->DateOfDenudation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateOfDenudation->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_DateOfDenudation"><span id="el_ivf_oocytedenudation_DateOfDenudation">
<input type="<?= $Page->DateOfDenudation->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-format="11" name="x_DateOfDenudation" id="x_DateOfDenudation" placeholder="<?= HtmlEncode($Page->DateOfDenudation->getPlaceHolder()) ?>" value="<?= $Page->DateOfDenudation->EditValue ?>"<?= $Page->DateOfDenudation->editAttributes() ?> aria-describedby="x_DateOfDenudation_help">
<?= $Page->DateOfDenudation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateOfDenudation->getErrorMessage() ?></div>
<?php if (!$Page->DateOfDenudation->ReadOnly && !$Page->DateOfDenudation->Disabled && !isset($Page->DateOfDenudation->EditAttrs["readonly"]) && !isset($Page->DateOfDenudation->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_oocytedenudationedit", "x_DateOfDenudation", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
    <div id="r_DenudationDoneBy" class="form-group row">
        <label id="elh_ivf_oocytedenudation_DenudationDoneBy" for="x_DenudationDoneBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_DenudationDoneBy"><?= $Page->DenudationDoneBy->caption() ?><?= $Page->DenudationDoneBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DenudationDoneBy->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_DenudationDoneBy"><span id="el_ivf_oocytedenudation_DenudationDoneBy">
<input type="<?= $Page->DenudationDoneBy->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x_DenudationDoneBy" id="x_DenudationDoneBy" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->DenudationDoneBy->getPlaceHolder()) ?>" value="<?= $Page->DenudationDoneBy->EditValue ?>"<?= $Page->DenudationDoneBy->editAttributes() ?> aria-describedby="x_DenudationDoneBy_help">
<?= $Page->DenudationDoneBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DenudationDoneBy->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_ivf_oocytedenudation_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_status"><span id="el_ivf_oocytedenudation_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_oocytedenudation_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_TidNo"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<?php if ($Page->TidNo->getSessionValue() != "") { ?>
<template id="tpx_ivf_oocytedenudation_TidNo"><span id="el_ivf_oocytedenudation_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TidNo->getDisplayValue($Page->TidNo->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_TidNo" name="x_TidNo" value="<?= HtmlEncode($Page->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_ivf_oocytedenudation_TidNo"><span id="el_ivf_oocytedenudation_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ExpFollicles->Visible) { // ExpFollicles ?>
    <div id="r_ExpFollicles" class="form-group row">
        <label id="elh_ivf_oocytedenudation_ExpFollicles" for="x_ExpFollicles" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_ExpFollicles"><?= $Page->ExpFollicles->caption() ?><?= $Page->ExpFollicles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ExpFollicles->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_ExpFollicles"><span id="el_ivf_oocytedenudation_ExpFollicles">
<input type="<?= $Page->ExpFollicles->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x_ExpFollicles" id="x_ExpFollicles" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ExpFollicles->getPlaceHolder()) ?>" value="<?= $Page->ExpFollicles->EditValue ?>"<?= $Page->ExpFollicles->editAttributes() ?> aria-describedby="x_ExpFollicles_help">
<?= $Page->ExpFollicles->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ExpFollicles->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
    <div id="r_SecondaryDenudationDoneBy" class="form-group row">
        <label id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" for="x_SecondaryDenudationDoneBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_SecondaryDenudationDoneBy"><?= $Page->SecondaryDenudationDoneBy->caption() ?><?= $Page->SecondaryDenudationDoneBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SecondaryDenudationDoneBy->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SecondaryDenudationDoneBy"><span id="el_ivf_oocytedenudation_SecondaryDenudationDoneBy">
<input type="<?= $Page->SecondaryDenudationDoneBy->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x_SecondaryDenudationDoneBy" id="x_SecondaryDenudationDoneBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SecondaryDenudationDoneBy->getPlaceHolder()) ?>" value="<?= $Page->SecondaryDenudationDoneBy->EditValue ?>"<?= $Page->SecondaryDenudationDoneBy->editAttributes() ?> aria-describedby="x_SecondaryDenudationDoneBy_help">
<?= $Page->SecondaryDenudationDoneBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SecondaryDenudationDoneBy->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient2->Visible) { // patient2 ?>
    <div id="r_patient2" class="form-group row">
        <label id="elh_ivf_oocytedenudation_patient2" for="x_patient2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_patient2"><?= $Page->patient2->caption() ?><?= $Page->patient2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient2->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_patient2"><span id="el_ivf_oocytedenudation_patient2">
<div class="input-group ew-lookup-list" aria-describedby="x_patient2_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient2"><?= EmptyValue(strval($Page->patient2->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->patient2->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->patient2->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->patient2->ReadOnly || $Page->patient2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->patient2->getErrorMessage() ?></div>
<?= $Page->patient2->getCustomMessage() ?>
<?= $Page->patient2->Lookup->getParamTag($Page, "p_x_patient2") ?>
<input type="hidden" is="selection-list" data-table="ivf_oocytedenudation" data-field="x_patient2" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->patient2->displayValueSeparatorAttribute() ?>" name="x_patient2" id="x_patient2" value="<?= $Page->patient2->CurrentValue ?>"<?= $Page->patient2->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocytesDonate1->Visible) { // OocytesDonate1 ?>
    <div id="r_OocytesDonate1" class="form-group row">
        <label id="elh_ivf_oocytedenudation_OocytesDonate1" for="x_OocytesDonate1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_OocytesDonate1"><?= $Page->OocytesDonate1->caption() ?><?= $Page->OocytesDonate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocytesDonate1->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocytesDonate1"><span id="el_ivf_oocytedenudation_OocytesDonate1">
<input type="<?= $Page->OocytesDonate1->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate1" name="x_OocytesDonate1" id="x_OocytesDonate1" placeholder="<?= HtmlEncode($Page->OocytesDonate1->getPlaceHolder()) ?>" value="<?= $Page->OocytesDonate1->EditValue ?>"<?= $Page->OocytesDonate1->editAttributes() ?> aria-describedby="x_OocytesDonate1_help">
<?= $Page->OocytesDonate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocytesDonate1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocytesDonate2->Visible) { // OocytesDonate2 ?>
    <div id="r_OocytesDonate2" class="form-group row">
        <label id="elh_ivf_oocytedenudation_OocytesDonate2" for="x_OocytesDonate2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_OocytesDonate2"><?= $Page->OocytesDonate2->caption() ?><?= $Page->OocytesDonate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocytesDonate2->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocytesDonate2"><span id="el_ivf_oocytedenudation_OocytesDonate2">
<input type="<?= $Page->OocytesDonate2->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate2" name="x_OocytesDonate2" id="x_OocytesDonate2" placeholder="<?= HtmlEncode($Page->OocytesDonate2->getPlaceHolder()) ?>" value="<?= $Page->OocytesDonate2->EditValue ?>"<?= $Page->OocytesDonate2->editAttributes() ?> aria-describedby="x_OocytesDonate2_help">
<?= $Page->OocytesDonate2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocytesDonate2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETDonate->Visible) { // ETDonate ?>
    <div id="r_ETDonate" class="form-group row">
        <label id="elh_ivf_oocytedenudation_ETDonate" for="x_ETDonate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_ETDonate"><?= $Page->ETDonate->caption() ?><?= $Page->ETDonate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETDonate->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_ETDonate"><span id="el_ivf_oocytedenudation_ETDonate">
<input type="<?= $Page->ETDonate->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_ETDonate" name="x_ETDonate" id="x_ETDonate" placeholder="<?= HtmlEncode($Page->ETDonate->getPlaceHolder()) ?>" value="<?= $Page->ETDonate->EditValue ?>"<?= $Page->ETDonate->editAttributes() ?> aria-describedby="x_ETDonate_help">
<?= $Page->ETDonate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ETDonate->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocyteOrgin->Visible) { // OocyteOrgin ?>
    <div id="r_OocyteOrgin" class="form-group row">
        <label id="elh_ivf_oocytedenudation_OocyteOrgin" for="x_OocyteOrgin" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_OocyteOrgin"><?= $Page->OocyteOrgin->caption() ?><?= $Page->OocyteOrgin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocyteOrgin->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocyteOrgin"><span id="el_ivf_oocytedenudation_OocyteOrgin">
    <select
        id="x_OocyteOrgin"
        name="x_OocyteOrgin"
        class="form-control ew-select<?= $Page->OocyteOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_oocytedenudation_x_OocyteOrgin"
        data-table="ivf_oocytedenudation"
        data-field="x_OocyteOrgin"
        data-value-separator="<?= $Page->OocyteOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->OocyteOrgin->getPlaceHolder()) ?>"
        <?= $Page->OocyteOrgin->editAttributes() ?>>
        <?= $Page->OocyteOrgin->selectOptionListHtml("x_OocyteOrgin") ?>
    </select>
    <?= $Page->OocyteOrgin->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->OocyteOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_oocytedenudation_x_OocyteOrgin']"),
        options = { name: "x_OocyteOrgin", selectId: "ivf_oocytedenudation_x_OocyteOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_oocytedenudation.fields.OocyteOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_oocytedenudation.fields.OocyteOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient1->Visible) { // patient1 ?>
    <div id="r_patient1" class="form-group row">
        <label id="elh_ivf_oocytedenudation_patient1" for="x_patient1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_patient1"><?= $Page->patient1->caption() ?><?= $Page->patient1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient1->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_patient1"><span id="el_ivf_oocytedenudation_patient1">
<div class="input-group ew-lookup-list" aria-describedby="x_patient1_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient1"><?= EmptyValue(strval($Page->patient1->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->patient1->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->patient1->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->patient1->ReadOnly || $Page->patient1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->patient1->getErrorMessage() ?></div>
<?= $Page->patient1->getCustomMessage() ?>
<?= $Page->patient1->Lookup->getParamTag($Page, "p_x_patient1") ?>
<input type="hidden" is="selection-list" data-table="ivf_oocytedenudation" data-field="x_patient1" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->patient1->displayValueSeparatorAttribute() ?>" name="x_patient1" id="x_patient1" value="<?= $Page->patient1->CurrentValue ?>"<?= $Page->patient1->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocyteType->Visible) { // OocyteType ?>
    <div id="r_OocyteType" class="form-group row">
        <label id="elh_ivf_oocytedenudation_OocyteType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_OocyteType"><?= $Page->OocyteType->caption() ?><?= $Page->OocyteType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocyteType->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocyteType"><span id="el_ivf_oocytedenudation_OocyteType">
<template id="tp_x_OocyteType">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="x_OocyteType" id="x_OocyteType"<?= $Page->OocyteType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_OocyteType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_OocyteType[]"
    name="x_OocyteType[]"
    value="<?= HtmlEncode($Page->OocyteType->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_OocyteType"
    data-target="dsl_x_OocyteType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->OocyteType->isInvalidClass() ?>"
    data-table="ivf_oocytedenudation"
    data-field="x_OocyteType"
    data-value-separator="<?= $Page->OocyteType->displayValueSeparatorAttribute() ?>"
    <?= $Page->OocyteType->editAttributes() ?>>
<?= $Page->OocyteType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocyteType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
    <div id="r_MIOocytesDonate1" class="form-group row">
        <label id="elh_ivf_oocytedenudation_MIOocytesDonate1" for="x_MIOocytesDonate1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_MIOocytesDonate1"><?= $Page->MIOocytesDonate1->caption() ?><?= $Page->MIOocytesDonate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MIOocytesDonate1->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_MIOocytesDonate1"><span id="el_ivf_oocytedenudation_MIOocytesDonate1">
<input type="<?= $Page->MIOocytesDonate1->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x_MIOocytesDonate1" id="x_MIOocytesDonate1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MIOocytesDonate1->getPlaceHolder()) ?>" value="<?= $Page->MIOocytesDonate1->EditValue ?>"<?= $Page->MIOocytesDonate1->editAttributes() ?> aria-describedby="x_MIOocytesDonate1_help">
<?= $Page->MIOocytesDonate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MIOocytesDonate1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
    <div id="r_MIOocytesDonate2" class="form-group row">
        <label id="elh_ivf_oocytedenudation_MIOocytesDonate2" for="x_MIOocytesDonate2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_MIOocytesDonate2"><?= $Page->MIOocytesDonate2->caption() ?><?= $Page->MIOocytesDonate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MIOocytesDonate2->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_MIOocytesDonate2"><span id="el_ivf_oocytedenudation_MIOocytesDonate2">
<input type="<?= $Page->MIOocytesDonate2->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x_MIOocytesDonate2" id="x_MIOocytesDonate2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MIOocytesDonate2->getPlaceHolder()) ?>" value="<?= $Page->MIOocytesDonate2->EditValue ?>"<?= $Page->MIOocytesDonate2->editAttributes() ?> aria-describedby="x_MIOocytesDonate2_help">
<?= $Page->MIOocytesDonate2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MIOocytesDonate2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SelfMI->Visible) { // SelfMI ?>
    <div id="r_SelfMI" class="form-group row">
        <label id="elh_ivf_oocytedenudation_SelfMI" for="x_SelfMI" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_SelfMI"><?= $Page->SelfMI->caption() ?><?= $Page->SelfMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SelfMI->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SelfMI"><span id="el_ivf_oocytedenudation_SelfMI">
<input type="<?= $Page->SelfMI->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x_SelfMI" id="x_SelfMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SelfMI->getPlaceHolder()) ?>" value="<?= $Page->SelfMI->EditValue ?>"<?= $Page->SelfMI->editAttributes() ?> aria-describedby="x_SelfMI_help">
<?= $Page->SelfMI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SelfMI->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SelfMII->Visible) { // SelfMII ?>
    <div id="r_SelfMII" class="form-group row">
        <label id="elh_ivf_oocytedenudation_SelfMII" for="x_SelfMII" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_SelfMII"><?= $Page->SelfMII->caption() ?><?= $Page->SelfMII->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SelfMII->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SelfMII"><span id="el_ivf_oocytedenudation_SelfMII">
<input type="<?= $Page->SelfMII->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x_SelfMII" id="x_SelfMII" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SelfMII->getPlaceHolder()) ?>" value="<?= $Page->SelfMII->EditValue ?>"<?= $Page->SelfMII->editAttributes() ?> aria-describedby="x_SelfMII_help">
<?= $Page->SelfMII->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SelfMII->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient3->Visible) { // patient3 ?>
    <div id="r_patient3" class="form-group row">
        <label id="elh_ivf_oocytedenudation_patient3" for="x_patient3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_patient3"><?= $Page->patient3->caption() ?><?= $Page->patient3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient3->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_patient3"><span id="el_ivf_oocytedenudation_patient3">
<div class="input-group ew-lookup-list" aria-describedby="x_patient3_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient3"><?= EmptyValue(strval($Page->patient3->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->patient3->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->patient3->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->patient3->ReadOnly || $Page->patient3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->patient3->getErrorMessage() ?></div>
<?= $Page->patient3->getCustomMessage() ?>
<?= $Page->patient3->Lookup->getParamTag($Page, "p_x_patient3") ?>
<input type="hidden" is="selection-list" data-table="ivf_oocytedenudation" data-field="x_patient3" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->patient3->displayValueSeparatorAttribute() ?>" name="x_patient3" id="x_patient3" value="<?= $Page->patient3->CurrentValue ?>"<?= $Page->patient3->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient4->Visible) { // patient4 ?>
    <div id="r_patient4" class="form-group row">
        <label id="elh_ivf_oocytedenudation_patient4" for="x_patient4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_patient4"><?= $Page->patient4->caption() ?><?= $Page->patient4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient4->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_patient4"><span id="el_ivf_oocytedenudation_patient4">
<div class="input-group ew-lookup-list" aria-describedby="x_patient4_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient4"><?= EmptyValue(strval($Page->patient4->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->patient4->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->patient4->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->patient4->ReadOnly || $Page->patient4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->patient4->getErrorMessage() ?></div>
<?= $Page->patient4->getCustomMessage() ?>
<?= $Page->patient4->Lookup->getParamTag($Page, "p_x_patient4") ?>
<input type="hidden" is="selection-list" data-table="ivf_oocytedenudation" data-field="x_patient4" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->patient4->displayValueSeparatorAttribute() ?>" name="x_patient4" id="x_patient4" value="<?= $Page->patient4->CurrentValue ?>"<?= $Page->patient4->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocytesDonate3->Visible) { // OocytesDonate3 ?>
    <div id="r_OocytesDonate3" class="form-group row">
        <label id="elh_ivf_oocytedenudation_OocytesDonate3" for="x_OocytesDonate3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_OocytesDonate3"><?= $Page->OocytesDonate3->caption() ?><?= $Page->OocytesDonate3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocytesDonate3->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocytesDonate3"><span id="el_ivf_oocytedenudation_OocytesDonate3">
<input type="<?= $Page->OocytesDonate3->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x_OocytesDonate3" id="x_OocytesDonate3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocytesDonate3->getPlaceHolder()) ?>" value="<?= $Page->OocytesDonate3->EditValue ?>"<?= $Page->OocytesDonate3->editAttributes() ?> aria-describedby="x_OocytesDonate3_help">
<?= $Page->OocytesDonate3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocytesDonate3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocytesDonate4->Visible) { // OocytesDonate4 ?>
    <div id="r_OocytesDonate4" class="form-group row">
        <label id="elh_ivf_oocytedenudation_OocytesDonate4" for="x_OocytesDonate4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_OocytesDonate4"><?= $Page->OocytesDonate4->caption() ?><?= $Page->OocytesDonate4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocytesDonate4->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocytesDonate4"><span id="el_ivf_oocytedenudation_OocytesDonate4">
<input type="<?= $Page->OocytesDonate4->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x_OocytesDonate4" id="x_OocytesDonate4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocytesDonate4->getPlaceHolder()) ?>" value="<?= $Page->OocytesDonate4->EditValue ?>"<?= $Page->OocytesDonate4->editAttributes() ?> aria-describedby="x_OocytesDonate4_help">
<?= $Page->OocytesDonate4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocytesDonate4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
    <div id="r_MIOocytesDonate3" class="form-group row">
        <label id="elh_ivf_oocytedenudation_MIOocytesDonate3" for="x_MIOocytesDonate3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_MIOocytesDonate3"><?= $Page->MIOocytesDonate3->caption() ?><?= $Page->MIOocytesDonate3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MIOocytesDonate3->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_MIOocytesDonate3"><span id="el_ivf_oocytedenudation_MIOocytesDonate3">
<input type="<?= $Page->MIOocytesDonate3->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x_MIOocytesDonate3" id="x_MIOocytesDonate3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MIOocytesDonate3->getPlaceHolder()) ?>" value="<?= $Page->MIOocytesDonate3->EditValue ?>"<?= $Page->MIOocytesDonate3->editAttributes() ?> aria-describedby="x_MIOocytesDonate3_help">
<?= $Page->MIOocytesDonate3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MIOocytesDonate3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
    <div id="r_MIOocytesDonate4" class="form-group row">
        <label id="elh_ivf_oocytedenudation_MIOocytesDonate4" for="x_MIOocytesDonate4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_MIOocytesDonate4"><?= $Page->MIOocytesDonate4->caption() ?><?= $Page->MIOocytesDonate4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MIOocytesDonate4->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_MIOocytesDonate4"><span id="el_ivf_oocytedenudation_MIOocytesDonate4">
<input type="<?= $Page->MIOocytesDonate4->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x_MIOocytesDonate4" id="x_MIOocytesDonate4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MIOocytesDonate4->getPlaceHolder()) ?>" value="<?= $Page->MIOocytesDonate4->EditValue ?>"<?= $Page->MIOocytesDonate4->editAttributes() ?> aria-describedby="x_MIOocytesDonate4_help">
<?= $Page->MIOocytesDonate4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MIOocytesDonate4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
    <div id="r_SelfOocytesMI" class="form-group row">
        <label id="elh_ivf_oocytedenudation_SelfOocytesMI" for="x_SelfOocytesMI" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_SelfOocytesMI"><?= $Page->SelfOocytesMI->caption() ?><?= $Page->SelfOocytesMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SelfOocytesMI->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SelfOocytesMI"><span id="el_ivf_oocytedenudation_SelfOocytesMI">
<input type="<?= $Page->SelfOocytesMI->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x_SelfOocytesMI" id="x_SelfOocytesMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SelfOocytesMI->getPlaceHolder()) ?>" value="<?= $Page->SelfOocytesMI->EditValue ?>"<?= $Page->SelfOocytesMI->editAttributes() ?> aria-describedby="x_SelfOocytesMI_help">
<?= $Page->SelfOocytesMI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SelfOocytesMI->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
    <div id="r_SelfOocytesMII" class="form-group row">
        <label id="elh_ivf_oocytedenudation_SelfOocytesMII" for="x_SelfOocytesMII" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_SelfOocytesMII"><?= $Page->SelfOocytesMII->caption() ?><?= $Page->SelfOocytesMII->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SelfOocytesMII->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SelfOocytesMII"><span id="el_ivf_oocytedenudation_SelfOocytesMII">
<input type="<?= $Page->SelfOocytesMII->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x_SelfOocytesMII" id="x_SelfOocytesMII" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SelfOocytesMII->getPlaceHolder()) ?>" value="<?= $Page->SelfOocytesMII->EditValue ?>"<?= $Page->SelfOocytesMII->editAttributes() ?> aria-describedby="x_SelfOocytesMII_help">
<?= $Page->SelfOocytesMII->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SelfOocytesMII->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->donor->Visible) { // donor ?>
    <div id="r_donor" class="form-group row">
        <label id="elh_ivf_oocytedenudation_donor" for="x_donor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_donor"><?= $Page->donor->caption() ?><?= $Page->donor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->donor->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_donor"><span id="el_ivf_oocytedenudation_donor">
<input type="<?= $Page->donor->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_donor" name="x_donor" id="x_donor" size="30" placeholder="<?= HtmlEncode($Page->donor->getPlaceHolder()) ?>" value="<?= $Page->donor->EditValue ?>"<?= $Page->donor->editAttributes() ?> aria-describedby="x_donor_help">
<?= $Page->donor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->donor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_oocytedenudationedit" class="ew-custom-template"></div>
<template id="tpm_ivf_oocytedenudationedit">
<div id="ct_IvfOocytedenudationEdit"><style>
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
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$showmaster = $_GET["showmaster"] ;
if( $showmaster=="ivf_treatment_plan")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$IVFid."'; ";
$resultst = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$resultst[0]["RIDNO"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
}else{
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["profilePic"] == "")
{
   $PatientProfilePic = "hims\profile-picture.png";
}else{
 $PatientProfilePic = $results2[0]["profilePic"];
}
if($results1[0]["profilePic"] == "")
{
   $PartnerProfilePic = "hims\profile-picture.png";
}else{
 $PartnerProfilePic = $results1[0]["profilePic"];
}
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_treatment_plan where id='".$cid."'; ";
$resultsB = $dbhelper->ExecuteRows($sql);
?>	
<input type="hidden" id="TidNO" name="TidNO" value="<?php echo $resultst[0]["id"]; ?>">
<input type="hidden" id="RIDNO" name="RIDNO" value="<?php echo $results[0]["id"]; ?>">
<input type="hidden" id="Female" name="Female" value="<?php echo $results[0]["Female"]; ?>">
<div class="row">
<div class="col-md-6">
Couple ID : <?php echo $results[0]["CoupleID"]; ?>
</div>
<div class="col-md-6">
IVF Cycle NO : <?php echo $resultsB[0]["IVFCycleNO"]; ?>
</div>
</div>
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<?php
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistoryRowCount > 0)
	{
		if($cid == $VitalsHistory[$VitalsHistoryRowCount-1]["TidNo"])
		{
			$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";  // ---- view
		}else{
			$kk = 0;
			for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
				if($cid == $VitalsHistory[$x]["TidNo"])
				{
					$kk = 1;
					$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$x]["id"]."";  // ---- view
				}
			}
			if($kk == 0)
			{
				$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";
			}
		}
	}else{
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_et_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivf_et_chart = $dbhelper->ExecuteRows($sql);
	$Vivf_et_chartRowCount = count($ivf_et_chart);
	if($ivf_et_chart == false)
	{
		$Etcountwarn = "";
		$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($Vivf_et_chartRowCount > 0)
		{
			$Etcountwarn ='<span class="badge bg-warning">'.$Vivf_et_chartRowCount.'</span>';
			if($cid == $ivf_et_chart[$Vivf_et_chartRowCount-1]["TidNo"])
			{
				$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $Vivf_et_chartRowCount; $x++) {
					if($cid == $ivf_et_chart[$x]["TidNo"])
					{
						$kk = 1;
						$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
	//http://localhost:1445/ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_art_summary where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfartsummary = $dbhelper->ExecuteRows($sql);
	$ivfartsummaryRowCount = count($ivfartsummary);
	if($ivfartsummary == false)
	{
		$ivfartsummarycountwarn = "";
		$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfartsummaryRowCount > 0)
		{
			$ivfartsummarycountwarn ='<span class="badge bg-warning">'.$ivfartsummaryRowCount.'</span>';
			if($cid == $ivfartsummary[$ivfartsummaryRowCount-1]["TidNo"])
			{
				$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfartsummaryRowCount; $x++) {
					if($cid == $ivfartsummary[$x]["TidNo"])
					{
						$kk = 1;
						$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_Name=597&fk_RIDNO=11
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
	if($ivfstimulationchart == false)
	{
		$ivfstimulationchartwarn = "";
		$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$ivfstimulationchartwarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $ivfstimulationchart[$ivfstimulationchartRowCount-1]["TidNo"])
			{
				$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfstimulationchartRowCount; $x++) {
					if($cid == $ivfstimulationchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$IVFid."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_ovum_pick_up_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfovumpickupchart = $dbhelper->ExecuteRows($sql);
	$ivfovumpickupchartRowCount = count($ivfovumpickupchart);
	if($ivfovumpickupchart == false)
	{
		$ivfovumpickupchartwarn = "";
		$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfovumpickupchartRowCount > 0)
		{
			$ivfovumpickupchartwarn ='<span class="badge bg-warning">'.$ivfovumpickupchartRowCount.'</span>';
			if($cid == $ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["TidNo"])
			{
				$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfovumpickupchartRowCount; $x++) {
					if($cid == $ivfovumpickupchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
   // http://localhost:1445/ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_otherprocedure where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfotherprocedure = $dbhelper->ExecuteRows($sql);
	$ivfotherprocedureRowCount = count($ivfotherprocedure);
	if($ivfotherprocedure == false)
	{
		$ivfotherprocedurewarn = "";
		$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfotherprocedureRowCount > 0)
		{
			$ivfotherprocedurewarn ='<span class="badge bg-warning">'.$ivfotherprocedureRowCount.'</span>';
			if($cid == $ivfotherprocedure[$ivfotherprocedureRowCount-1]["TidNo"])
			{
				$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfotherprocedureRowCount; $x++) {
					if($cid == $ivfotherprocedure[$x]["TidNo"])
					{
						$kk = 1;
						$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$ivfembryologychartlistUrl = "ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	//http://localhost:1445/ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$patientserviceslistUrl = "patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";
	//http://localhost:1445/patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_Name=597&fk_RIDNO=11&fk_id=1
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	//http://localhost:1445/ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_RIDNO=11&fk_Name=597
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$TrPlanurl = "ivf_treatment_planview.php?showdetail=&id=".$cid."&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";
	//http://localhost:1445/ivf_treatment_planview.php?showdetail=&id=1&showmaster=ivf&fk_id=11&fk_Female=597
?>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Ovum Pick Up </h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_ResultDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_ResultDate"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_Surgeon"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_Surgeon"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_AsstSurgeon"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_AsstSurgeon"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_Anaesthetist"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_Anaesthetist"></slot></span>
						</td>
						<td style="width:50%">
						<slot class="ew-slot" name="tpc_ivf_oocytedenudation_AnaestheiaType"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_AnaestheiaType"></slot>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_PrimaryEmbryologist"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_PrimaryEmbryologist"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_SecondaryEmbryologist"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_SecondaryEmbryologist"></slot></span>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_OPUNotes"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_OPUNotes"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_OocyteOrgin"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_OocyteOrgin"></slot></span>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_ExpFollicles"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_ExpFollicles"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_NoOfFolliclesRight"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_NoOfFolliclesRight"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_NoOfFolliclesLeft"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_NoOfFolliclesLeft"></slot></span>
						</td>
					</tr>
						<tr>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_NoOfOocytes"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_NoOfOocytes"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_OocyteType"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_OocyteType"></slot></span>
						</td>
						<td>
						</td>
					</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
<div class="col-4">
<button type="button" class="btn btn-block btn-success" onclick="ShowDenudationDoneBy()">Record Oocyte Denudation</button>
</div>
<div class="row" id="DateOfDenudationShow">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Denudation </h3>
			</div>
			<div class="card-body">  
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_DateOfDenudation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_DateOfDenudation"></slot></span>
						</td>
						<td>
							<span class="ew-cell"></span>
						</td>
					</tr>
						<tr>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_DenudationDoneBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_DenudationDoneBy"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_SecondaryDenudationDoneBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_SecondaryDenudationDoneBy"></slot></span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
</div>
<div class="row" id="SelfOocyteShow">
<div class="row">
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Self Oocyte  </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
				<tbody>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_SelfOocytesMI"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_SelfOocytesMI"></slot></span></td>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_SelfOocytesMII"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_SelfOocytesMII"></slot></span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>
<div class="col-6">
</div>
</div>
</div>
<div class="row" id="OocyteDonateToPatientShow">
<div class="row">
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 1 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
				<tbody>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_patient1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_patient1"></slot></span></td></tr>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_MIOocytesDonate1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_MIOocytesDonate1"></slot></span></td>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_OocytesDonate1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_OocytesDonate1"></slot></span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 2 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
								<tbody>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_patient2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_patient2"></slot></span></td></tr>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_MIOocytesDonate2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_MIOocytesDonate2"></slot></span></td>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_OocytesDonate2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_OocytesDonate2"></slot></span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>			
</div>				
<div class="row">
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 3 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
				<tbody>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_patient3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_patient3"></slot></span></td></tr>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_MIOocytesDonate3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_MIOocytesDonate3"></slot></span></td>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_OocytesDonate3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_OocytesDonate3"></slot></span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 4 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
								<tbody>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_patient4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_patient4"></slot></span></td></tr>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_MIOocytesDonate4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_MIOocytesDonate4"></slot></span></td>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_OocytesDonate4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_OocytesDonate4"></slot></span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>			
</div>
</div>
		</br>
				<div id="addElement"></div>
	</br>		
	</div>
</div>
	<font size="4" >
<table class="table table-striped ew-table ew-export-table" style="width:40%;">
<tr>
<td><b>Oocyte No</b></td>
<td><b>Stage</b></td>
<td><b>Remarks</b></td>
</tr>
<?php
$cidviddd = $_GET["id"] ;
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_embryology_chart where DidNO='".$cidviddd."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Day0sino"];
				$ItemCode =  $row["Day0OocyteStage"];
				$Qty = 1; //$row["Services"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["Remarks"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
	$rs->MoveNext();
}
echo $hhh;
?>		
</table> 
<br>
<div class="col-4">
<a href="view_ivf_oocytedenudation_embryology_chartlist.php?cmd=search&x_DidNO=<?php echo $cidviddd; ?>" type="button" class="btn btn-block btn-success btn-lg">Edit Oocyte Denudation</a>
</div>
<br>
	  </font>
</div>
</template>
<?php
    if (in_array("ivf_embryology_chart", explode(",", $Page->getCurrentDetailTable())) && $ivf_embryology_chart->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("ivf_embryology_chart", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "IvfEmbryologyChartGrid.php" ?>
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
    ew.applyTemplate("tpd_ivf_oocytedenudationedit", "tpm_ivf_oocytedenudationedit", "ivf_oocytedenudationedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("ivf_oocytedenudation");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    function ShowDenudationDoneBy(){document.getElementById("DateOfDenudationShow").style.visibility="visible";var t=document.getElementById("x_NoOfOocytes").value,e="";e+="<table id='capacitationTable' class='' align='left' border='0' cellpadding='1' cellspacing='1' style='width:60%'>",e+="<thead id='capacitationTableHead'><tr  style='background-color:#707B7C;color:white;' ><td id='PreCapacitation'>Oocyte No</td>",e+="<td id='PostCapacitation'>Stage</td><td id='MaxCapacitation'>Remarks</td></tr></thead><tbody>";for(var a=1;a<=t;a++)e=(e=(e=e+"<tr><td><input type='text' id='OocyteNo"+a+"' name='OocyteNo"+a+"' value='"+a+"'></td>")+"<td><select id='Stage"+a+"' name='Stage"+a+"'><option value=''></option><option value='MII'>MII</option><option value='MI'>MI</option><option value='GV'>GV</option><option value='Others'>Others</option></select></td>")+"<td><input type='text' id='Remarks"+a+"' name='Remarks"+a+"'></td></tr>";e+="</tbody></table>";var o=document.createElement("div");o.innerHTML=e;var i=document.getElementById("addElement");i.innerHTML="",i.appendChild(o)}
});
</script>
