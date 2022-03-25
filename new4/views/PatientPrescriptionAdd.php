<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientPrescriptionAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_prescriptionadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpatient_prescriptionadd = currentForm = new ew.Form("fpatient_prescriptionadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_prescription")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_prescription)
        ew.vars.tables.patient_prescription = currentTable;
    fpatient_prescriptionadd.addFields([
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null, ew.Validators.integer], fields.PatientId.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Medicine", [fields.Medicine.visible && fields.Medicine.required ? ew.Validators.required(fields.Medicine.caption) : null], fields.Medicine.isInvalid],
        ["M", [fields.M.visible && fields.M.required ? ew.Validators.required(fields.M.caption) : null], fields.M.isInvalid],
        ["A", [fields.A.visible && fields.A.required ? ew.Validators.required(fields.A.caption) : null], fields.A.isInvalid],
        ["N", [fields.N.visible && fields.N.required ? ew.Validators.required(fields.N.caption) : null], fields.N.isInvalid],
        ["NoOfDays", [fields.NoOfDays.visible && fields.NoOfDays.required ? ew.Validators.required(fields.NoOfDays.caption) : null], fields.NoOfDays.isInvalid],
        ["PreRoute", [fields.PreRoute.visible && fields.PreRoute.required ? ew.Validators.required(fields.PreRoute.caption) : null], fields.PreRoute.isInvalid],
        ["TimeOfTaking", [fields.TimeOfTaking.visible && fields.TimeOfTaking.required ? ew.Validators.required(fields.TimeOfTaking.caption) : null], fields.TimeOfTaking.isInvalid],
        ["Type", [fields.Type.visible && fields.Type.required ? ew.Validators.required(fields.Type.caption) : null], fields.Type.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["Status", [fields.Status.visible && fields.Status.required ? ew.Validators.required(fields.Status.caption) : null], fields.Status.isInvalid],
        ["CreatedBy", [fields.CreatedBy.visible && fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["CreateDateTime", [fields.CreateDateTime.visible && fields.CreateDateTime.required ? ew.Validators.required(fields.CreateDateTime.caption) : null], fields.CreateDateTime.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.visible && fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.visible && fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null], fields.ModifiedDateTime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_prescriptionadd,
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
    fpatient_prescriptionadd.validate = function () {
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
    fpatient_prescriptionadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_prescriptionadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_prescriptionadd.lists.Medicine = <?= $Page->Medicine->toClientList($Page) ?>;
    fpatient_prescriptionadd.lists.PreRoute = <?= $Page->PreRoute->toClientList($Page) ?>;
    fpatient_prescriptionadd.lists.TimeOfTaking = <?= $Page->TimeOfTaking->toClientList($Page) ?>;
    fpatient_prescriptionadd.lists.Type = <?= $Page->Type->toClientList($Page) ?>;
    fpatient_prescriptionadd.lists.Status = <?= $Page->Status->toClientList($Page) ?>;
    loadjs.done("fpatient_prescriptionadd");
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
<form name="fpatient_prescriptionadd" id="fpatient_prescriptionadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?= HtmlEncode($Page->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?= HtmlEncode($Page->mrnno->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_prescription_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<?php if ($Page->Reception->getSessionValue() != "") { ?>
<template id="tpx_patient_prescription_Reception"><span id="el_patient_prescription_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_prescription_Reception"><span id="el_patient_prescription_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_patient_prescription_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_PatientId"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<?php if ($Page->PatientId->getSessionValue() != "") { ?>
<template id="tpx_patient_prescription_PatientId"><span id="el_patient_prescription_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientId->getDisplayValue($Page->PatientId->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_PatientId" name="x_PatientId" value="<?= HtmlEncode($Page->PatientId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_prescription_PatientId"><span id="el_patient_prescription_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_prescription" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_prescription_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_patient_prescription_PatientName"><span id="el_patient_prescription_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_prescription" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Medicine->Visible) { // Medicine ?>
    <div id="r_Medicine" class="form-group row">
        <label id="elh_patient_prescription_Medicine" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_Medicine"><?= $Page->Medicine->caption() ?><?= $Page->Medicine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medicine->cellAttributes() ?>>
<template id="tpx_patient_prescription_Medicine"><span id="el_patient_prescription_Medicine">
<?php
$onchange = $Page->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x_Medicine" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->Medicine->getInputTextType() ?>" class="form-control" name="sv_x_Medicine" id="sv_x_Medicine" value="<?= RemoveHtml($Page->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>"<?= $Page->Medicine->editAttributes() ?> aria-describedby="x_Medicine_help">
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Medicine->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->Medicine->ReadOnly || $Page->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_Medicine" data-input="sv_x_Medicine" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Medicine->displayValueSeparatorAttribute() ?>" name="x_Medicine" id="x_Medicine" value="<?= HtmlEncode($Page->Medicine->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->Medicine->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Medicine->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptionadd"], function() {
    fpatient_prescriptionadd.createAutoSuggest(Object.assign({"id":"x_Medicine","forceSelect":false}, ew.vars.tables.patient_prescription.fields.Medicine.autoSuggestOptions));
});
</script>
<?= $Page->Medicine->Lookup->getParamTag($Page, "p_x_Medicine") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
    <div id="r_M" class="form-group row">
        <label id="elh_patient_prescription_M" for="x_M" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_M"><?= $Page->M->caption() ?><?= $Page->M->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->M->cellAttributes() ?>>
<template id="tpx_patient_prescription_M"><span id="el_patient_prescription_M">
<input type="<?= $Page->M->getInputTextType() ?>" data-table="patient_prescription" data-field="x_M" name="x_M" id="x_M" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->M->getPlaceHolder()) ?>" value="<?= $Page->M->EditValue ?>"<?= $Page->M->editAttributes() ?> aria-describedby="x_M_help">
<?= $Page->M->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->M->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
    <div id="r_A" class="form-group row">
        <label id="elh_patient_prescription_A" for="x_A" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_A"><?= $Page->A->caption() ?><?= $Page->A->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A->cellAttributes() ?>>
<template id="tpx_patient_prescription_A"><span id="el_patient_prescription_A">
<input type="<?= $Page->A->getInputTextType() ?>" data-table="patient_prescription" data-field="x_A" name="x_A" id="x_A" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->A->getPlaceHolder()) ?>" value="<?= $Page->A->EditValue ?>"<?= $Page->A->editAttributes() ?> aria-describedby="x_A_help">
<?= $Page->A->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->N->Visible) { // N ?>
    <div id="r_N" class="form-group row">
        <label id="elh_patient_prescription_N" for="x_N" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_N"><?= $Page->N->caption() ?><?= $Page->N->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->N->cellAttributes() ?>>
<template id="tpx_patient_prescription_N"><span id="el_patient_prescription_N">
<input type="<?= $Page->N->getInputTextType() ?>" data-table="patient_prescription" data-field="x_N" name="x_N" id="x_N" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->N->getPlaceHolder()) ?>" value="<?= $Page->N->EditValue ?>"<?= $Page->N->editAttributes() ?> aria-describedby="x_N_help">
<?= $Page->N->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->N->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
    <div id="r_NoOfDays" class="form-group row">
        <label id="elh_patient_prescription_NoOfDays" for="x_NoOfDays" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_NoOfDays"><?= $Page->NoOfDays->caption() ?><?= $Page->NoOfDays->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfDays->cellAttributes() ?>>
<template id="tpx_patient_prescription_NoOfDays"><span id="el_patient_prescription_NoOfDays">
<input type="<?= $Page->NoOfDays->getInputTextType() ?>" data-table="patient_prescription" data-field="x_NoOfDays" name="x_NoOfDays" id="x_NoOfDays" size="5" maxlength="45" placeholder="<?= HtmlEncode($Page->NoOfDays->getPlaceHolder()) ?>" value="<?= $Page->NoOfDays->EditValue ?>"<?= $Page->NoOfDays->editAttributes() ?> aria-describedby="x_NoOfDays_help">
<?= $Page->NoOfDays->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfDays->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { // PreRoute ?>
    <div id="r_PreRoute" class="form-group row">
        <label id="elh_patient_prescription_PreRoute" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_PreRoute"><?= $Page->PreRoute->caption() ?><?= $Page->PreRoute->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreRoute->cellAttributes() ?>>
<template id="tpx_patient_prescription_PreRoute"><span id="el_patient_prescription_PreRoute">
<?php
$onchange = $Page->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x_PreRoute" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Page->PreRoute->getInputTextType() ?>" class="form-control" name="sv_x_PreRoute" id="sv_x_PreRoute" value="<?= RemoveHtml($Page->PreRoute->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>"<?= $Page->PreRoute->editAttributes() ?> aria-describedby="x_PreRoute_help">
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$Page->PreRoute->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_PreRoute" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->PreRoute->caption() ?>" data-title="<?= $Page->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_PreRoute',url:'<?= GetUrl("PresMasRouteAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_PreRoute" data-input="sv_x_PreRoute" data-value-separator="<?= $Page->PreRoute->displayValueSeparatorAttribute() ?>" name="x_PreRoute" id="x_PreRoute" value="<?= HtmlEncode($Page->PreRoute->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->PreRoute->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PreRoute->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptionadd"], function() {
    fpatient_prescriptionadd.createAutoSuggest(Object.assign({"id":"x_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"}, ew.vars.tables.patient_prescription.fields.PreRoute.autoSuggestOptions));
});
</script>
<?= $Page->PreRoute->Lookup->getParamTag($Page, "p_x_PreRoute") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
    <div id="r_TimeOfTaking" class="form-group row">
        <label id="elh_patient_prescription_TimeOfTaking" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_TimeOfTaking"><?= $Page->TimeOfTaking->caption() ?><?= $Page->TimeOfTaking->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TimeOfTaking->cellAttributes() ?>>
<template id="tpx_patient_prescription_TimeOfTaking"><span id="el_patient_prescription_TimeOfTaking">
<?php
$onchange = $Page->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x_TimeOfTaking" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Page->TimeOfTaking->getInputTextType() ?>" class="form-control" name="sv_x_TimeOfTaking" id="sv_x_TimeOfTaking" value="<?= RemoveHtml($Page->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>"<?= $Page->TimeOfTaking->editAttributes() ?> aria-describedby="x_TimeOfTaking_help">
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$Page->TimeOfTaking->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TimeOfTaking" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TimeOfTaking->caption() ?>" data-title="<?= $Page->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TimeOfTaking',url:'<?= GetUrl("PresMasTimeoftakingAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_TimeOfTaking" data-input="sv_x_TimeOfTaking" data-value-separator="<?= $Page->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x_TimeOfTaking" id="x_TimeOfTaking" value="<?= HtmlEncode($Page->TimeOfTaking->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->TimeOfTaking->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TimeOfTaking->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptionadd"], function() {
    fpatient_prescriptionadd.createAutoSuggest(Object.assign({"id":"x_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"}, ew.vars.tables.patient_prescription.fields.TimeOfTaking.autoSuggestOptions));
});
</script>
<?= $Page->TimeOfTaking->Lookup->getParamTag($Page, "p_x_TimeOfTaking") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <div id="r_Type" class="form-group row">
        <label id="elh_patient_prescription_Type" for="x_Type" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_Type"><?= $Page->Type->caption() ?><?= $Page->Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Type->cellAttributes() ?>>
<template id="tpx_patient_prescription_Type"><span id="el_patient_prescription_Type">
    <select
        id="x_Type"
        name="x_Type"
        class="form-control ew-select<?= $Page->Type->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x_Type"
        data-table="patient_prescription"
        data-field="x_Type"
        data-value-separator="<?= $Page->Type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Type->getPlaceHolder()) ?>"
        <?= $Page->Type->editAttributes() ?>>
        <?= $Page->Type->selectOptionListHtml("x_Type") ?>
    </select>
    <?= $Page->Type->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Type->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x_Type']"),
        options = { name: "x_Type", selectId: "patient_prescription_x_Type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_prescription.fields.Type.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Type.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_prescription_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<?php if ($Page->mrnno->getSessionValue() != "") { ?>
<template id="tpx_patient_prescription_mrnno"><span id="el_patient_prescription_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_prescription_mrnno"><span id="el_patient_prescription_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_prescription" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_patient_prescription_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_patient_prescription_Age"><span id="el_patient_prescription_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_prescription_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_Gender"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_patient_prescription_Gender"><span id="el_patient_prescription_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_patient_prescription_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_patient_prescription_profilePic"><span id="el_patient_prescription_profilePic">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <div id="r_Status" class="form-group row">
        <label id="elh_patient_prescription_Status" for="x_Status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_Status"><?= $Page->Status->caption() ?><?= $Page->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Status->cellAttributes() ?>>
<template id="tpx_patient_prescription_Status"><span id="el_patient_prescription_Status">
    <select
        id="x_Status"
        name="x_Status"
        class="form-control ew-select<?= $Page->Status->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x_Status"
        data-table="patient_prescription"
        data-field="x_Status"
        data-value-separator="<?= $Page->Status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Status->getPlaceHolder()) ?>"
        <?= $Page->Status->editAttributes() ?>>
        <?= $Page->Status->selectOptionListHtml("x_Status") ?>
    </select>
    <?= $Page->Status->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Status->getErrorMessage() ?></div>
<?= $Page->Status->Lookup->getParamTag($Page, "p_x_Status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x_Status']"),
        options = { name: "x_Status", selectId: "patient_prescription_x_Status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Status.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <div id="r_CreatedBy" class="form-group row">
        <label id="elh_patient_prescription_CreatedBy" for="x_CreatedBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_CreatedBy"><?= $Page->CreatedBy->caption() ?><?= $Page->CreatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedBy->cellAttributes() ?>>
<template id="tpx_patient_prescription_CreatedBy"><span id="el_patient_prescription_CreatedBy">
<input type="<?= $Page->CreatedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreatedBy->getPlaceHolder()) ?>" value="<?= $Page->CreatedBy->EditValue ?>"<?= $Page->CreatedBy->editAttributes() ?> aria-describedby="x_CreatedBy_help">
<?= $Page->CreatedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedBy->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
    <div id="r_CreateDateTime" class="form-group row">
        <label id="elh_patient_prescription_CreateDateTime" for="x_CreateDateTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_CreateDateTime"><?= $Page->CreateDateTime->caption() ?><?= $Page->CreateDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreateDateTime->cellAttributes() ?>>
<template id="tpx_patient_prescription_CreateDateTime"><span id="el_patient_prescription_CreateDateTime">
<input type="<?= $Page->CreateDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreateDateTime" name="x_CreateDateTime" id="x_CreateDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreateDateTime->getPlaceHolder()) ?>" value="<?= $Page->CreateDateTime->EditValue ?>"<?= $Page->CreateDateTime->editAttributes() ?> aria-describedby="x_CreateDateTime_help">
<?= $Page->CreateDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreateDateTime->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <div id="r_ModifiedBy" class="form-group row">
        <label id="elh_patient_prescription_ModifiedBy" for="x_ModifiedBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_ModifiedBy"><?= $Page->ModifiedBy->caption() ?><?= $Page->ModifiedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedBy->cellAttributes() ?>>
<template id="tpx_patient_prescription_ModifiedBy"><span id="el_patient_prescription_ModifiedBy">
<input type="<?= $Page->ModifiedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Page->ModifiedBy->EditValue ?>"<?= $Page->ModifiedBy->editAttributes() ?> aria-describedby="x_ModifiedBy_help">
<?= $Page->ModifiedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedBy->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <div id="r_ModifiedDateTime" class="form-group row">
        <label id="elh_patient_prescription_ModifiedDateTime" for="x_ModifiedDateTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_prescription_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?><?= $Page->ModifiedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<template id="tpx_patient_prescription_ModifiedDateTime"><span id="el_patient_prescription_ModifiedDateTime">
<input type="<?= $Page->ModifiedDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Page->ModifiedDateTime->EditValue ?>"<?= $Page->ModifiedDateTime->editAttributes() ?> aria-describedby="x_ModifiedDateTime_help">
<?= $Page->ModifiedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedDateTime->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_prescriptionadd" class="ew-custom-template"></div>
<template id="tpm_patient_prescriptionadd">
<div id="ct_PatientPrescriptionAdd"><style>
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
</style>
	<?php
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results1[0]["profilePic"];
	}
	?>
<p id="profilePic" hidden><slot class="ew-slot" name="tpc_patient_prescription_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_prescription_profilePic"></slot></p>
<p id="SurfaceArea" hidden><slot class="ew-slot" name="tpx_SurfaceArea"></slot></p>
<p id="BodyMassIndex" hidden><slot class="ew-slot" name="tpx_BodyMassIndex"></slot></p>
<div class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h4 class="widget-user-desc"><span class="ew-cell">Patient Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2"  src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_prescription_mrnno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_prescription_mrnno"></slot></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Gender : <?php echo $results1[0]["gender"]; ?></h5>
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
		  <tr>
	 <td><slot class="ew-slot" name="tpc_patient_prescription_Medicine"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_prescription_Medicine"></slot></td>
	 <td><slot class="ew-slot" name="tpc_patient_prescription_M"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_prescription_M"></slot></td>
	 <td><slot class="ew-slot" name="tpc_patient_prescription_A"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_prescription_A"></slot></td>
	 <td><slot class="ew-slot" name="tpc_patient_prescription_N"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_prescription_N"></slot></td>
	 <td><slot class="ew-slot" name="tpc_patient_prescription_NoOfDays"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_prescription_NoOfDays"></slot></td>
	 <td><slot class="ew-slot" name="tpc_patient_prescription_PreRoute"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_prescription_PreRoute"></slot></td>
	 <td><slot class="ew-slot" name="tpc_patient_prescription_TimeOfTaking"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_prescription_TimeOfTaking"></slot></td>
	 <td><slot class="ew-slot" name="tpc_patient_prescription_Type"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_prescription_Type"></slot></td>
	 <td><slot class="ew-slot" name="tpc_patient_prescription_Status"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_prescription_Status"></slot></td>
</tr>
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
    ew.applyTemplate("tpd_patient_prescriptionadd", "tpm_patient_prescriptionadd", "patient_prescriptionadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("patient_prescription");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    var c=document.getElementById("el_patient_prescription_profilePic").children,d=c[0].children,evalue=c[0].innerText;
});
</script>
