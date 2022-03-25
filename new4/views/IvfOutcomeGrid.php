<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("IvfOutcomeGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_outcomegrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fivf_outcomegrid = new ew.Form("fivf_outcomegrid", "grid");
    fivf_outcomegrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_outcome")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_outcome)
        ew.vars.tables.ivf_outcome = currentTable;
    fivf_outcomegrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNO", [fields.RIDNO.visible && fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null, ew.Validators.integer], fields.RIDNO.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["treatment_status", [fields.treatment_status.visible && fields.treatment_status.required ? ew.Validators.required(fields.treatment_status.caption) : null], fields.treatment_status.isInvalid],
        ["ARTCYCLE", [fields.ARTCYCLE.visible && fields.ARTCYCLE.required ? ew.Validators.required(fields.ARTCYCLE.caption) : null], fields.ARTCYCLE.isInvalid],
        ["RESULT", [fields.RESULT.visible && fields.RESULT.required ? ew.Validators.required(fields.RESULT.caption) : null], fields.RESULT.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["outcomeDate", [fields.outcomeDate.visible && fields.outcomeDate.required ? ew.Validators.required(fields.outcomeDate.caption) : null, ew.Validators.datetime(0)], fields.outcomeDate.isInvalid],
        ["outcomeDay", [fields.outcomeDay.visible && fields.outcomeDay.required ? ew.Validators.required(fields.outcomeDay.caption) : null, ew.Validators.datetime(0)], fields.outcomeDay.isInvalid],
        ["OPResult", [fields.OPResult.visible && fields.OPResult.required ? ew.Validators.required(fields.OPResult.caption) : null], fields.OPResult.isInvalid],
        ["Gestation", [fields.Gestation.visible && fields.Gestation.required ? ew.Validators.required(fields.Gestation.caption) : null], fields.Gestation.isInvalid],
        ["TransferdEmbryos", [fields.TransferdEmbryos.visible && fields.TransferdEmbryos.required ? ew.Validators.required(fields.TransferdEmbryos.caption) : null], fields.TransferdEmbryos.isInvalid],
        ["InitalOfSacs", [fields.InitalOfSacs.visible && fields.InitalOfSacs.required ? ew.Validators.required(fields.InitalOfSacs.caption) : null], fields.InitalOfSacs.isInvalid],
        ["ImplimentationRate", [fields.ImplimentationRate.visible && fields.ImplimentationRate.required ? ew.Validators.required(fields.ImplimentationRate.caption) : null], fields.ImplimentationRate.isInvalid],
        ["EmbryoNo", [fields.EmbryoNo.visible && fields.EmbryoNo.required ? ew.Validators.required(fields.EmbryoNo.caption) : null], fields.EmbryoNo.isInvalid],
        ["ExtrauterineSac", [fields.ExtrauterineSac.visible && fields.ExtrauterineSac.required ? ew.Validators.required(fields.ExtrauterineSac.caption) : null], fields.ExtrauterineSac.isInvalid],
        ["PregnancyMonozygotic", [fields.PregnancyMonozygotic.visible && fields.PregnancyMonozygotic.required ? ew.Validators.required(fields.PregnancyMonozygotic.caption) : null], fields.PregnancyMonozygotic.isInvalid],
        ["TypeGestation", [fields.TypeGestation.visible && fields.TypeGestation.required ? ew.Validators.required(fields.TypeGestation.caption) : null], fields.TypeGestation.isInvalid],
        ["Urine", [fields.Urine.visible && fields.Urine.required ? ew.Validators.required(fields.Urine.caption) : null], fields.Urine.isInvalid],
        ["PTdate", [fields.PTdate.visible && fields.PTdate.required ? ew.Validators.required(fields.PTdate.caption) : null], fields.PTdate.isInvalid],
        ["Reduced", [fields.Reduced.visible && fields.Reduced.required ? ew.Validators.required(fields.Reduced.caption) : null], fields.Reduced.isInvalid],
        ["INduced", [fields.INduced.visible && fields.INduced.required ? ew.Validators.required(fields.INduced.caption) : null], fields.INduced.isInvalid],
        ["INducedDate", [fields.INducedDate.visible && fields.INducedDate.required ? ew.Validators.required(fields.INducedDate.caption) : null], fields.INducedDate.isInvalid],
        ["Miscarriage", [fields.Miscarriage.visible && fields.Miscarriage.required ? ew.Validators.required(fields.Miscarriage.caption) : null], fields.Miscarriage.isInvalid],
        ["Induced1", [fields.Induced1.visible && fields.Induced1.required ? ew.Validators.required(fields.Induced1.caption) : null], fields.Induced1.isInvalid],
        ["Type", [fields.Type.visible && fields.Type.required ? ew.Validators.required(fields.Type.caption) : null], fields.Type.isInvalid],
        ["IfClinical", [fields.IfClinical.visible && fields.IfClinical.required ? ew.Validators.required(fields.IfClinical.caption) : null], fields.IfClinical.isInvalid],
        ["GADate", [fields.GADate.visible && fields.GADate.required ? ew.Validators.required(fields.GADate.caption) : null], fields.GADate.isInvalid],
        ["GA", [fields.GA.visible && fields.GA.required ? ew.Validators.required(fields.GA.caption) : null], fields.GA.isInvalid],
        ["FoetalDeath", [fields.FoetalDeath.visible && fields.FoetalDeath.required ? ew.Validators.required(fields.FoetalDeath.caption) : null], fields.FoetalDeath.isInvalid],
        ["FerinatalDeath", [fields.FerinatalDeath.visible && fields.FerinatalDeath.required ? ew.Validators.required(fields.FerinatalDeath.caption) : null], fields.FerinatalDeath.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["Ectopic", [fields.Ectopic.visible && fields.Ectopic.required ? ew.Validators.required(fields.Ectopic.caption) : null], fields.Ectopic.isInvalid],
        ["Extra", [fields.Extra.visible && fields.Extra.required ? ew.Validators.required(fields.Extra.caption) : null], fields.Extra.isInvalid],
        ["Implantation", [fields.Implantation.visible && fields.Implantation.required ? ew.Validators.required(fields.Implantation.caption) : null], fields.Implantation.isInvalid],
        ["DeliveryDate", [fields.DeliveryDate.visible && fields.DeliveryDate.required ? ew.Validators.required(fields.DeliveryDate.caption) : null, ew.Validators.datetime(7)], fields.DeliveryDate.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_outcomegrid,
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
    fivf_outcomegrid.validate = function () {
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
            var checkrow = (gridinsert) ? !this.emptyRow(rowIndex) : true;
            if (checkrow) {
                addcnt++;

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
            } // End Grid Add checking
        }
        return true;
    }

    // Check empty row
    fivf_outcomegrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "RIDNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Name", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Age", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "treatment_status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ARTCYCLE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RESULT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createdby", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createddatetime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "modifiedby", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "modifieddatetime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "outcomeDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "outcomeDay", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "OPResult", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Gestation", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TransferdEmbryos", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "InitalOfSacs", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ImplimentationRate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EmbryoNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ExtrauterineSac", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PregnancyMonozygotic", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TypeGestation", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Urine", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PTdate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Reduced", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "INduced", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "INducedDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Miscarriage", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Induced1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IfClinical", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GADate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GA", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "FoetalDeath", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "FerinatalDeath", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TidNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Ectopic", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Extra", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Implantation", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DeliveryDate", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fivf_outcomegrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_outcomegrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_outcomegrid.lists.Gestation = <?= $Grid->Gestation->toClientList($Grid) ?>;
    fivf_outcomegrid.lists.Urine = <?= $Grid->Urine->toClientList($Grid) ?>;
    fivf_outcomegrid.lists.Miscarriage = <?= $Grid->Miscarriage->toClientList($Grid) ?>;
    fivf_outcomegrid.lists.Induced1 = <?= $Grid->Induced1->toClientList($Grid) ?>;
    fivf_outcomegrid.lists.Type = <?= $Grid->Type->toClientList($Grid) ?>;
    fivf_outcomegrid.lists.FoetalDeath = <?= $Grid->FoetalDeath->toClientList($Grid) ?>;
    fivf_outcomegrid.lists.FerinatalDeath = <?= $Grid->FerinatalDeath->toClientList($Grid) ?>;
    fivf_outcomegrid.lists.Ectopic = <?= $Grid->Ectopic->toClientList($Grid) ?>;
    fivf_outcomegrid.lists.Extra = <?= $Grid->Extra->toClientList($Grid) ?>;
    loadjs.done("fivf_outcomegrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_outcome">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_outcomegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_outcome" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_outcomegrid" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Grid->RowType = ROWTYPE_HEADER;

// Render list options
$Grid->renderListOptions();

// Render list options (header, left)
$Grid->ListOptions->render("header", "left");
?>
<?php if ($Grid->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_ivf_outcome_id" class="ivf_outcome_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->RIDNO->Visible) { // RIDNO ?>
        <th data-name="RIDNO" class="<?= $Grid->RIDNO->headerCellClass() ?>"><div id="elh_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO"><?= $Grid->renderSort($Grid->RIDNO) ?></div></th>
<?php } ?>
<?php if ($Grid->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Grid->Name->headerCellClass() ?>"><div id="elh_ivf_outcome_Name" class="ivf_outcome_Name"><?= $Grid->renderSort($Grid->Name) ?></div></th>
<?php } ?>
<?php if ($Grid->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Grid->Age->headerCellClass() ?>"><div id="elh_ivf_outcome_Age" class="ivf_outcome_Age"><?= $Grid->renderSort($Grid->Age) ?></div></th>
<?php } ?>
<?php if ($Grid->treatment_status->Visible) { // treatment_status ?>
        <th data-name="treatment_status" class="<?= $Grid->treatment_status->headerCellClass() ?>"><div id="elh_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status"><?= $Grid->renderSort($Grid->treatment_status) ?></div></th>
<?php } ?>
<?php if ($Grid->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <th data-name="ARTCYCLE" class="<?= $Grid->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE"><?= $Grid->renderSort($Grid->ARTCYCLE) ?></div></th>
<?php } ?>
<?php if ($Grid->RESULT->Visible) { // RESULT ?>
        <th data-name="RESULT" class="<?= $Grid->RESULT->headerCellClass() ?>"><div id="elh_ivf_outcome_RESULT" class="ivf_outcome_RESULT"><?= $Grid->renderSort($Grid->RESULT) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_ivf_outcome_status" class="ivf_outcome_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
<?php } ?>
<?php if ($Grid->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Grid->createdby->headerCellClass() ?>"><div id="elh_ivf_outcome_createdby" class="ivf_outcome_createdby"><?= $Grid->renderSort($Grid->createdby) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Grid->modifiedby->headerCellClass() ?>"><div id="elh_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby"><?= $Grid->renderSort($Grid->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Grid->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime"><?= $Grid->renderSort($Grid->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->outcomeDate->Visible) { // outcomeDate ?>
        <th data-name="outcomeDate" class="<?= $Grid->outcomeDate->headerCellClass() ?>"><div id="elh_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate"><?= $Grid->renderSort($Grid->outcomeDate) ?></div></th>
<?php } ?>
<?php if ($Grid->outcomeDay->Visible) { // outcomeDay ?>
        <th data-name="outcomeDay" class="<?= $Grid->outcomeDay->headerCellClass() ?>"><div id="elh_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay"><?= $Grid->renderSort($Grid->outcomeDay) ?></div></th>
<?php } ?>
<?php if ($Grid->OPResult->Visible) { // OPResult ?>
        <th data-name="OPResult" class="<?= $Grid->OPResult->headerCellClass() ?>"><div id="elh_ivf_outcome_OPResult" class="ivf_outcome_OPResult"><?= $Grid->renderSort($Grid->OPResult) ?></div></th>
<?php } ?>
<?php if ($Grid->Gestation->Visible) { // Gestation ?>
        <th data-name="Gestation" class="<?= $Grid->Gestation->headerCellClass() ?>"><div id="elh_ivf_outcome_Gestation" class="ivf_outcome_Gestation"><?= $Grid->renderSort($Grid->Gestation) ?></div></th>
<?php } ?>
<?php if ($Grid->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
        <th data-name="TransferdEmbryos" class="<?= $Grid->TransferdEmbryos->headerCellClass() ?>"><div id="elh_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos"><?= $Grid->renderSort($Grid->TransferdEmbryos) ?></div></th>
<?php } ?>
<?php if ($Grid->InitalOfSacs->Visible) { // InitalOfSacs ?>
        <th data-name="InitalOfSacs" class="<?= $Grid->InitalOfSacs->headerCellClass() ?>"><div id="elh_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs"><?= $Grid->renderSort($Grid->InitalOfSacs) ?></div></th>
<?php } ?>
<?php if ($Grid->ImplimentationRate->Visible) { // ImplimentationRate ?>
        <th data-name="ImplimentationRate" class="<?= $Grid->ImplimentationRate->headerCellClass() ?>"><div id="elh_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate"><?= $Grid->renderSort($Grid->ImplimentationRate) ?></div></th>
<?php } ?>
<?php if ($Grid->EmbryoNo->Visible) { // EmbryoNo ?>
        <th data-name="EmbryoNo" class="<?= $Grid->EmbryoNo->headerCellClass() ?>"><div id="elh_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo"><?= $Grid->renderSort($Grid->EmbryoNo) ?></div></th>
<?php } ?>
<?php if ($Grid->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
        <th data-name="ExtrauterineSac" class="<?= $Grid->ExtrauterineSac->headerCellClass() ?>"><div id="elh_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac"><?= $Grid->renderSort($Grid->ExtrauterineSac) ?></div></th>
<?php } ?>
<?php if ($Grid->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
        <th data-name="PregnancyMonozygotic" class="<?= $Grid->PregnancyMonozygotic->headerCellClass() ?>"><div id="elh_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic"><?= $Grid->renderSort($Grid->PregnancyMonozygotic) ?></div></th>
<?php } ?>
<?php if ($Grid->TypeGestation->Visible) { // TypeGestation ?>
        <th data-name="TypeGestation" class="<?= $Grid->TypeGestation->headerCellClass() ?>"><div id="elh_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation"><?= $Grid->renderSort($Grid->TypeGestation) ?></div></th>
<?php } ?>
<?php if ($Grid->Urine->Visible) { // Urine ?>
        <th data-name="Urine" class="<?= $Grid->Urine->headerCellClass() ?>"><div id="elh_ivf_outcome_Urine" class="ivf_outcome_Urine"><?= $Grid->renderSort($Grid->Urine) ?></div></th>
<?php } ?>
<?php if ($Grid->PTdate->Visible) { // PTdate ?>
        <th data-name="PTdate" class="<?= $Grid->PTdate->headerCellClass() ?>"><div id="elh_ivf_outcome_PTdate" class="ivf_outcome_PTdate"><?= $Grid->renderSort($Grid->PTdate) ?></div></th>
<?php } ?>
<?php if ($Grid->Reduced->Visible) { // Reduced ?>
        <th data-name="Reduced" class="<?= $Grid->Reduced->headerCellClass() ?>"><div id="elh_ivf_outcome_Reduced" class="ivf_outcome_Reduced"><?= $Grid->renderSort($Grid->Reduced) ?></div></th>
<?php } ?>
<?php if ($Grid->INduced->Visible) { // INduced ?>
        <th data-name="INduced" class="<?= $Grid->INduced->headerCellClass() ?>"><div id="elh_ivf_outcome_INduced" class="ivf_outcome_INduced"><?= $Grid->renderSort($Grid->INduced) ?></div></th>
<?php } ?>
<?php if ($Grid->INducedDate->Visible) { // INducedDate ?>
        <th data-name="INducedDate" class="<?= $Grid->INducedDate->headerCellClass() ?>"><div id="elh_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate"><?= $Grid->renderSort($Grid->INducedDate) ?></div></th>
<?php } ?>
<?php if ($Grid->Miscarriage->Visible) { // Miscarriage ?>
        <th data-name="Miscarriage" class="<?= $Grid->Miscarriage->headerCellClass() ?>"><div id="elh_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage"><?= $Grid->renderSort($Grid->Miscarriage) ?></div></th>
<?php } ?>
<?php if ($Grid->Induced1->Visible) { // Induced1 ?>
        <th data-name="Induced1" class="<?= $Grid->Induced1->headerCellClass() ?>"><div id="elh_ivf_outcome_Induced1" class="ivf_outcome_Induced1"><?= $Grid->renderSort($Grid->Induced1) ?></div></th>
<?php } ?>
<?php if ($Grid->Type->Visible) { // Type ?>
        <th data-name="Type" class="<?= $Grid->Type->headerCellClass() ?>"><div id="elh_ivf_outcome_Type" class="ivf_outcome_Type"><?= $Grid->renderSort($Grid->Type) ?></div></th>
<?php } ?>
<?php if ($Grid->IfClinical->Visible) { // IfClinical ?>
        <th data-name="IfClinical" class="<?= $Grid->IfClinical->headerCellClass() ?>"><div id="elh_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical"><?= $Grid->renderSort($Grid->IfClinical) ?></div></th>
<?php } ?>
<?php if ($Grid->GADate->Visible) { // GADate ?>
        <th data-name="GADate" class="<?= $Grid->GADate->headerCellClass() ?>"><div id="elh_ivf_outcome_GADate" class="ivf_outcome_GADate"><?= $Grid->renderSort($Grid->GADate) ?></div></th>
<?php } ?>
<?php if ($Grid->GA->Visible) { // GA ?>
        <th data-name="GA" class="<?= $Grid->GA->headerCellClass() ?>"><div id="elh_ivf_outcome_GA" class="ivf_outcome_GA"><?= $Grid->renderSort($Grid->GA) ?></div></th>
<?php } ?>
<?php if ($Grid->FoetalDeath->Visible) { // FoetalDeath ?>
        <th data-name="FoetalDeath" class="<?= $Grid->FoetalDeath->headerCellClass() ?>"><div id="elh_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath"><?= $Grid->renderSort($Grid->FoetalDeath) ?></div></th>
<?php } ?>
<?php if ($Grid->FerinatalDeath->Visible) { // FerinatalDeath ?>
        <th data-name="FerinatalDeath" class="<?= $Grid->FerinatalDeath->headerCellClass() ?>"><div id="elh_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath"><?= $Grid->renderSort($Grid->FerinatalDeath) ?></div></th>
<?php } ?>
<?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Grid->TidNo->headerCellClass() ?>"><div id="elh_ivf_outcome_TidNo" class="ivf_outcome_TidNo"><?= $Grid->renderSort($Grid->TidNo) ?></div></th>
<?php } ?>
<?php if ($Grid->Ectopic->Visible) { // Ectopic ?>
        <th data-name="Ectopic" class="<?= $Grid->Ectopic->headerCellClass() ?>"><div id="elh_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic"><?= $Grid->renderSort($Grid->Ectopic) ?></div></th>
<?php } ?>
<?php if ($Grid->Extra->Visible) { // Extra ?>
        <th data-name="Extra" class="<?= $Grid->Extra->headerCellClass() ?>"><div id="elh_ivf_outcome_Extra" class="ivf_outcome_Extra"><?= $Grid->renderSort($Grid->Extra) ?></div></th>
<?php } ?>
<?php if ($Grid->Implantation->Visible) { // Implantation ?>
        <th data-name="Implantation" class="<?= $Grid->Implantation->headerCellClass() ?>"><div id="elh_ivf_outcome_Implantation" class="ivf_outcome_Implantation"><?= $Grid->renderSort($Grid->Implantation) ?></div></th>
<?php } ?>
<?php if ($Grid->DeliveryDate->Visible) { // DeliveryDate ?>
        <th data-name="DeliveryDate" class="<?= $Grid->DeliveryDate->headerCellClass() ?>"><div id="elh_ivf_outcome_DeliveryDate" class="ivf_outcome_DeliveryDate"><?= $Grid->renderSort($Grid->DeliveryDate) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Grid->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
$Grid->StartRecord = 1;
$Grid->StopRecord = $Grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($Grid->isConfirm() || $Grid->EventCancelled)) {
    $CurrentForm->Index = -1;
    if ($CurrentForm->hasValue($Grid->FormKeyCountName) && ($Grid->isGridAdd() || $Grid->isGridEdit() || $Grid->isConfirm())) {
        $Grid->KeyCount = $CurrentForm->getValue($Grid->FormKeyCountName);
        $Grid->StopRecord = $Grid->StartRecord + $Grid->KeyCount - 1;
    }
}
$Grid->RecordCount = $Grid->StartRecord - 1;
if ($Grid->Recordset && !$Grid->Recordset->EOF) {
    // Nothing to do
} elseif (!$Grid->AllowAddDeleteRow && $Grid->StopRecord == 0) {
    $Grid->StopRecord = $Grid->GridAddRowCount;
}

// Initialize aggregate
$Grid->RowType = ROWTYPE_AGGREGATEINIT;
$Grid->resetAttributes();
$Grid->renderRow();
if ($Grid->isGridAdd())
    $Grid->RowIndex = 0;
if ($Grid->isGridEdit())
    $Grid->RowIndex = 0;
while ($Grid->RecordCount < $Grid->StopRecord) {
    $Grid->RecordCount++;
    if ($Grid->RecordCount >= $Grid->StartRecord) {
        $Grid->RowCount++;
        if ($Grid->isGridAdd() || $Grid->isGridEdit() || $Grid->isConfirm()) {
            $Grid->RowIndex++;
            $CurrentForm->Index = $Grid->RowIndex;
            if ($CurrentForm->hasValue($Grid->FormActionName) && ($Grid->isConfirm() || $Grid->EventCancelled)) {
                $Grid->RowAction = strval($CurrentForm->getValue($Grid->FormActionName));
            } elseif ($Grid->isGridAdd()) {
                $Grid->RowAction = "insert";
            } else {
                $Grid->RowAction = "";
            }
        }

        // Set up key count
        $Grid->KeyCount = $Grid->RowIndex;

        // Init row class and style
        $Grid->resetAttributes();
        $Grid->CssClass = "";
        if ($Grid->isGridAdd()) {
            if ($Grid->CurrentMode == "copy") {
                $Grid->loadRowValues($Grid->Recordset); // Load row values
                $Grid->OldKey = $Grid->getKey(true); // Get from CurrentValue
            } else {
                $Grid->loadRowValues(); // Load default values
                $Grid->OldKey = "";
            }
        } else {
            $Grid->loadRowValues($Grid->Recordset); // Load row values
            $Grid->OldKey = $Grid->getKey(true); // Get from CurrentValue
        }
        $Grid->setKey($Grid->OldKey);
        $Grid->RowType = ROWTYPE_VIEW; // Render view
        if ($Grid->isGridAdd()) { // Grid add
            $Grid->RowType = ROWTYPE_ADD; // Render add
        }
        if ($Grid->isGridAdd() && $Grid->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) { // Insert failed
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }
        if ($Grid->isGridEdit()) { // Grid edit
            if ($Grid->EventCancelled) {
                $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
            }
            if ($Grid->RowAction == "insert") {
                $Grid->RowType = ROWTYPE_ADD; // Render add
            } else {
                $Grid->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Grid->isGridEdit() && ($Grid->RowType == ROWTYPE_EDIT || $Grid->RowType == ROWTYPE_ADD) && $Grid->EventCancelled) { // Update failed
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }
        if ($Grid->RowType == ROWTYPE_EDIT) { // Edit row
            $Grid->EditRowCount++;
        }
        if ($Grid->isConfirm()) { // Confirm row
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }

        // Set up row id / data-rowindex
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_ivf_outcome", "data-rowtype" => $Grid->RowType]);

        // Render row
        $Grid->renderRow();

        // Render list options
        $Grid->renderListOptions();

        // Skip delete row / empty row for confirm page
        if ($Grid->RowAction != "delete" && $Grid->RowAction != "insertdelete" && !($Grid->RowAction == "insert" && $Grid->isConfirm() && $Grid->emptyRow())) {
?>
    <tr <?= $Grid->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Grid->ListOptions->render("body", "left", $Grid->RowCount);
?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id" <?= $Grid->id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_id" class="form-group"></span>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_id" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_id" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_id" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="ivf_outcome" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" <?= $Grid->RIDNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->RIDNO->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_RIDNO" class="form-group">
<span<?= $Grid->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNO->getDisplayValue($Grid->RIDNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_RIDNO" name="x<?= $Grid->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Grid->RIDNO->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_RIDNO" class="form-group">
<input type="<?= $Grid->RIDNO->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_RIDNO" name="x<?= $Grid->RowIndex ?>_RIDNO" id="x<?= $Grid->RowIndex ?>_RIDNO" size="30" placeholder="<?= HtmlEncode($Grid->RIDNO->getPlaceHolder()) ?>" value="<?= $Grid->RIDNO->EditValue ?>"<?= $Grid->RIDNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RIDNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RIDNO" id="o<?= $Grid->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Grid->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->RIDNO->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_RIDNO" class="form-group">
<span<?= $Grid->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNO->getDisplayValue($Grid->RIDNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_RIDNO" name="x<?= $Grid->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Grid->RIDNO->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_RIDNO" class="form-group">
<input type="<?= $Grid->RIDNO->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_RIDNO" name="x<?= $Grid->RowIndex ?>_RIDNO" id="x<?= $Grid->RowIndex ?>_RIDNO" size="30" placeholder="<?= HtmlEncode($Grid->RIDNO->getPlaceHolder()) ?>" value="<?= $Grid->RIDNO->EditValue ?>"<?= $Grid->RIDNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RIDNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_RIDNO">
<span<?= $Grid->RIDNO->viewAttributes() ?>>
<?= $Grid->RIDNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_RIDNO" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Grid->RIDNO->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_RIDNO" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Grid->RIDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Grid->Name->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->Name->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Name" class="form-group">
<span<?= $Grid->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Name->getDisplayValue($Grid->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Name" name="x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Name" class="form-group">
<input type="<?= $Grid->Name->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Name" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Name->getPlaceHolder()) ?>" value="<?= $Grid->Name->EditValue ?>"<?= $Grid->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Name" id="o<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->Name->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Name" class="form-group">
<span<?= $Grid->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Name->getDisplayValue($Grid->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Name" name="x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Name" class="form-group">
<input type="<?= $Grid->Name->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Name" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Name->getPlaceHolder()) ?>" value="<?= $Grid->Name->EditValue ?>"<?= $Grid->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Name">
<span<?= $Grid->Name->viewAttributes() ?>>
<?= $Grid->Name->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Name" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Name" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Grid->Age->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<?= $Grid->Age->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Age" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Age" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->treatment_status->Visible) { // treatment_status ?>
        <td data-name="treatment_status" <?= $Grid->treatment_status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_treatment_status" class="form-group">
<input type="<?= $Grid->treatment_status->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_treatment_status" name="x<?= $Grid->RowIndex ?>_treatment_status" id="x<?= $Grid->RowIndex ?>_treatment_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->treatment_status->getPlaceHolder()) ?>" value="<?= $Grid->treatment_status->EditValue ?>"<?= $Grid->treatment_status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->treatment_status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_treatment_status" id="o<?= $Grid->RowIndex ?>_treatment_status" value="<?= HtmlEncode($Grid->treatment_status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_treatment_status" class="form-group">
<input type="<?= $Grid->treatment_status->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_treatment_status" name="x<?= $Grid->RowIndex ?>_treatment_status" id="x<?= $Grid->RowIndex ?>_treatment_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->treatment_status->getPlaceHolder()) ?>" value="<?= $Grid->treatment_status->EditValue ?>"<?= $Grid->treatment_status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->treatment_status->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_treatment_status">
<span<?= $Grid->treatment_status->viewAttributes() ?>>
<?= $Grid->treatment_status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_treatment_status" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_treatment_status" value="<?= HtmlEncode($Grid->treatment_status->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_treatment_status" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_treatment_status" value="<?= HtmlEncode($Grid->treatment_status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td data-name="ARTCYCLE" <?= $Grid->ARTCYCLE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_ARTCYCLE" class="form-group">
<input type="<?= $Grid->ARTCYCLE->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x<?= $Grid->RowIndex ?>_ARTCYCLE" id="x<?= $Grid->RowIndex ?>_ARTCYCLE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ARTCYCLE->getPlaceHolder()) ?>" value="<?= $Grid->ARTCYCLE->EditValue ?>"<?= $Grid->ARTCYCLE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ARTCYCLE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ARTCYCLE" id="o<?= $Grid->RowIndex ?>_ARTCYCLE" value="<?= HtmlEncode($Grid->ARTCYCLE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_ARTCYCLE" class="form-group">
<input type="<?= $Grid->ARTCYCLE->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x<?= $Grid->RowIndex ?>_ARTCYCLE" id="x<?= $Grid->RowIndex ?>_ARTCYCLE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ARTCYCLE->getPlaceHolder()) ?>" value="<?= $Grid->ARTCYCLE->EditValue ?>"<?= $Grid->ARTCYCLE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ARTCYCLE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_ARTCYCLE">
<span<?= $Grid->ARTCYCLE->viewAttributes() ?>>
<?= $Grid->ARTCYCLE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_ARTCYCLE" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_ARTCYCLE" value="<?= HtmlEncode($Grid->ARTCYCLE->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_ARTCYCLE" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_ARTCYCLE" value="<?= HtmlEncode($Grid->ARTCYCLE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RESULT->Visible) { // RESULT ?>
        <td data-name="RESULT" <?= $Grid->RESULT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_RESULT" class="form-group">
<input type="<?= $Grid->RESULT->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_RESULT" name="x<?= $Grid->RowIndex ?>_RESULT" id="x<?= $Grid->RowIndex ?>_RESULT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RESULT->getPlaceHolder()) ?>" value="<?= $Grid->RESULT->EditValue ?>"<?= $Grid->RESULT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RESULT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RESULT" id="o<?= $Grid->RowIndex ?>_RESULT" value="<?= HtmlEncode($Grid->RESULT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_RESULT" class="form-group">
<input type="<?= $Grid->RESULT->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_RESULT" name="x<?= $Grid->RowIndex ?>_RESULT" id="x<?= $Grid->RowIndex ?>_RESULT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RESULT->getPlaceHolder()) ?>" value="<?= $Grid->RESULT->EditValue ?>"<?= $Grid->RESULT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RESULT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_RESULT">
<span<?= $Grid->RESULT->viewAttributes() ?>>
<?= $Grid->RESULT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_RESULT" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_RESULT" value="<?= HtmlEncode($Grid->RESULT->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_RESULT" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_RESULT" value="<?= HtmlEncode($Grid->RESULT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_status" class="form-group">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_status" class="form-group">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_status" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_status" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_status" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_status" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Grid->createdby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_createdby" class="form-group">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_createdby" class="form-group">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<?= $Grid->createdby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_createdby" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_createdby" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_createddatetime" class="form-group">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_createddatetime" class="form-group">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_createddatetime" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_createddatetime" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Grid->modifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_modifiedby" class="form-group">
<input type="<?= $Grid->modifiedby->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_modifiedby" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" size="30" placeholder="<?= HtmlEncode($Grid->modifiedby->getPlaceHolder()) ?>" value="<?= $Grid->modifiedby->EditValue ?>"<?= $Grid->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifiedby->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_modifiedby" class="form-group">
<input type="<?= $Grid->modifiedby->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_modifiedby" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" size="30" placeholder="<?= HtmlEncode($Grid->modifiedby->getPlaceHolder()) ?>" value="<?= $Grid->modifiedby->EditValue ?>"<?= $Grid->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifiedby->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<?= $Grid->modifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_modifiedby" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_modifiedby" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Grid->modifieddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_modifieddatetime" class="form-group">
<input type="<?= $Grid->modifieddatetime->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" placeholder="<?= HtmlEncode($Grid->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Grid->modifieddatetime->EditValue ?>"<?= $Grid->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->modifieddatetime->ReadOnly && !$Grid->modifieddatetime->Disabled && !isset($Grid->modifieddatetime->EditAttrs["readonly"]) && !isset($Grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_modifieddatetime" class="form-group">
<input type="<?= $Grid->modifieddatetime->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" placeholder="<?= HtmlEncode($Grid->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Grid->modifieddatetime->EditValue ?>"<?= $Grid->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->modifieddatetime->ReadOnly && !$Grid->modifieddatetime->Disabled && !isset($Grid->modifieddatetime->EditAttrs["readonly"]) && !isset($Grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<?= $Grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_modifieddatetime" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_modifieddatetime" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->outcomeDate->Visible) { // outcomeDate ?>
        <td data-name="outcomeDate" <?= $Grid->outcomeDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_outcomeDate" class="form-group">
<input type="<?= $Grid->outcomeDate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_outcomeDate" name="x<?= $Grid->RowIndex ?>_outcomeDate" id="x<?= $Grid->RowIndex ?>_outcomeDate" placeholder="<?= HtmlEncode($Grid->outcomeDate->getPlaceHolder()) ?>" value="<?= $Grid->outcomeDate->EditValue ?>"<?= $Grid->outcomeDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->outcomeDate->getErrorMessage() ?></div>
<?php if (!$Grid->outcomeDate->ReadOnly && !$Grid->outcomeDate->Disabled && !isset($Grid->outcomeDate->EditAttrs["readonly"]) && !isset($Grid->outcomeDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_outcomeDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_outcomeDate" id="o<?= $Grid->RowIndex ?>_outcomeDate" value="<?= HtmlEncode($Grid->outcomeDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_outcomeDate" class="form-group">
<input type="<?= $Grid->outcomeDate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_outcomeDate" name="x<?= $Grid->RowIndex ?>_outcomeDate" id="x<?= $Grid->RowIndex ?>_outcomeDate" placeholder="<?= HtmlEncode($Grid->outcomeDate->getPlaceHolder()) ?>" value="<?= $Grid->outcomeDate->EditValue ?>"<?= $Grid->outcomeDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->outcomeDate->getErrorMessage() ?></div>
<?php if (!$Grid->outcomeDate->ReadOnly && !$Grid->outcomeDate->Disabled && !isset($Grid->outcomeDate->EditAttrs["readonly"]) && !isset($Grid->outcomeDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_outcomeDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_outcomeDate">
<span<?= $Grid->outcomeDate->viewAttributes() ?>>
<?= $Grid->outcomeDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_outcomeDate" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_outcomeDate" value="<?= HtmlEncode($Grid->outcomeDate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_outcomeDate" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_outcomeDate" value="<?= HtmlEncode($Grid->outcomeDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->outcomeDay->Visible) { // outcomeDay ?>
        <td data-name="outcomeDay" <?= $Grid->outcomeDay->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_outcomeDay" class="form-group">
<input type="<?= $Grid->outcomeDay->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_outcomeDay" name="x<?= $Grid->RowIndex ?>_outcomeDay" id="x<?= $Grid->RowIndex ?>_outcomeDay" placeholder="<?= HtmlEncode($Grid->outcomeDay->getPlaceHolder()) ?>" value="<?= $Grid->outcomeDay->EditValue ?>"<?= $Grid->outcomeDay->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->outcomeDay->getErrorMessage() ?></div>
<?php if (!$Grid->outcomeDay->ReadOnly && !$Grid->outcomeDay->Disabled && !isset($Grid->outcomeDay->EditAttrs["readonly"]) && !isset($Grid->outcomeDay->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_outcomeDay", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" data-hidden="1" name="o<?= $Grid->RowIndex ?>_outcomeDay" id="o<?= $Grid->RowIndex ?>_outcomeDay" value="<?= HtmlEncode($Grid->outcomeDay->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_outcomeDay" class="form-group">
<input type="<?= $Grid->outcomeDay->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_outcomeDay" name="x<?= $Grid->RowIndex ?>_outcomeDay" id="x<?= $Grid->RowIndex ?>_outcomeDay" placeholder="<?= HtmlEncode($Grid->outcomeDay->getPlaceHolder()) ?>" value="<?= $Grid->outcomeDay->EditValue ?>"<?= $Grid->outcomeDay->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->outcomeDay->getErrorMessage() ?></div>
<?php if (!$Grid->outcomeDay->ReadOnly && !$Grid->outcomeDay->Disabled && !isset($Grid->outcomeDay->EditAttrs["readonly"]) && !isset($Grid->outcomeDay->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_outcomeDay", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_outcomeDay">
<span<?= $Grid->outcomeDay->viewAttributes() ?>>
<?= $Grid->outcomeDay->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_outcomeDay" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_outcomeDay" value="<?= HtmlEncode($Grid->outcomeDay->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_outcomeDay" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_outcomeDay" value="<?= HtmlEncode($Grid->outcomeDay->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->OPResult->Visible) { // OPResult ?>
        <td data-name="OPResult" <?= $Grid->OPResult->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_OPResult" class="form-group">
<input type="<?= $Grid->OPResult->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_OPResult" name="x<?= $Grid->RowIndex ?>_OPResult" id="x<?= $Grid->RowIndex ?>_OPResult" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->OPResult->getPlaceHolder()) ?>" value="<?= $Grid->OPResult->EditValue ?>"<?= $Grid->OPResult->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OPResult->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OPResult" id="o<?= $Grid->RowIndex ?>_OPResult" value="<?= HtmlEncode($Grid->OPResult->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_OPResult" class="form-group">
<input type="<?= $Grid->OPResult->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_OPResult" name="x<?= $Grid->RowIndex ?>_OPResult" id="x<?= $Grid->RowIndex ?>_OPResult" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->OPResult->getPlaceHolder()) ?>" value="<?= $Grid->OPResult->EditValue ?>"<?= $Grid->OPResult->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OPResult->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_OPResult">
<span<?= $Grid->OPResult->viewAttributes() ?>>
<?= $Grid->OPResult->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_OPResult" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_OPResult" value="<?= HtmlEncode($Grid->OPResult->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_OPResult" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_OPResult" value="<?= HtmlEncode($Grid->OPResult->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Gestation->Visible) { // Gestation ?>
        <td data-name="Gestation" <?= $Grid->Gestation->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Gestation" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Gestation">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Gestation" name="x<?= $Grid->RowIndex ?>_Gestation" id="x<?= $Grid->RowIndex ?>_Gestation"<?= $Grid->Gestation->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Gestation" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Gestation"
    name="x<?= $Grid->RowIndex ?>_Gestation"
    value="<?= HtmlEncode($Grid->Gestation->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Gestation"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Gestation"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Gestation->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Gestation"
    data-value-separator="<?= $Grid->Gestation->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Gestation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gestation->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gestation" id="o<?= $Grid->RowIndex ?>_Gestation" value="<?= HtmlEncode($Grid->Gestation->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Gestation" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Gestation">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Gestation" name="x<?= $Grid->RowIndex ?>_Gestation" id="x<?= $Grid->RowIndex ?>_Gestation"<?= $Grid->Gestation->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Gestation" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Gestation"
    name="x<?= $Grid->RowIndex ?>_Gestation"
    value="<?= HtmlEncode($Grid->Gestation->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Gestation"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Gestation"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Gestation->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Gestation"
    data-value-separator="<?= $Grid->Gestation->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Gestation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gestation->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Gestation">
<span<?= $Grid->Gestation->viewAttributes() ?>>
<?= $Grid->Gestation->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Gestation" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Gestation" value="<?= HtmlEncode($Grid->Gestation->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Gestation" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Gestation" value="<?= HtmlEncode($Grid->Gestation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
        <td data-name="TransferdEmbryos" <?= $Grid->TransferdEmbryos->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_TransferdEmbryos" class="form-group">
<input type="<?= $Grid->TransferdEmbryos->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x<?= $Grid->RowIndex ?>_TransferdEmbryos" id="x<?= $Grid->RowIndex ?>_TransferdEmbryos" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TransferdEmbryos->getPlaceHolder()) ?>" value="<?= $Grid->TransferdEmbryos->EditValue ?>"<?= $Grid->TransferdEmbryos->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TransferdEmbryos->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TransferdEmbryos" id="o<?= $Grid->RowIndex ?>_TransferdEmbryos" value="<?= HtmlEncode($Grid->TransferdEmbryos->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_TransferdEmbryos" class="form-group">
<input type="<?= $Grid->TransferdEmbryos->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x<?= $Grid->RowIndex ?>_TransferdEmbryos" id="x<?= $Grid->RowIndex ?>_TransferdEmbryos" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TransferdEmbryos->getPlaceHolder()) ?>" value="<?= $Grid->TransferdEmbryos->EditValue ?>"<?= $Grid->TransferdEmbryos->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TransferdEmbryos->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_TransferdEmbryos">
<span<?= $Grid->TransferdEmbryos->viewAttributes() ?>>
<?= $Grid->TransferdEmbryos->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_TransferdEmbryos" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_TransferdEmbryos" value="<?= HtmlEncode($Grid->TransferdEmbryos->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_TransferdEmbryos" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_TransferdEmbryos" value="<?= HtmlEncode($Grid->TransferdEmbryos->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->InitalOfSacs->Visible) { // InitalOfSacs ?>
        <td data-name="InitalOfSacs" <?= $Grid->InitalOfSacs->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_InitalOfSacs" class="form-group">
<input type="<?= $Grid->InitalOfSacs->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x<?= $Grid->RowIndex ?>_InitalOfSacs" id="x<?= $Grid->RowIndex ?>_InitalOfSacs" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->InitalOfSacs->getPlaceHolder()) ?>" value="<?= $Grid->InitalOfSacs->EditValue ?>"<?= $Grid->InitalOfSacs->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->InitalOfSacs->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" data-hidden="1" name="o<?= $Grid->RowIndex ?>_InitalOfSacs" id="o<?= $Grid->RowIndex ?>_InitalOfSacs" value="<?= HtmlEncode($Grid->InitalOfSacs->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_InitalOfSacs" class="form-group">
<input type="<?= $Grid->InitalOfSacs->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x<?= $Grid->RowIndex ?>_InitalOfSacs" id="x<?= $Grid->RowIndex ?>_InitalOfSacs" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->InitalOfSacs->getPlaceHolder()) ?>" value="<?= $Grid->InitalOfSacs->EditValue ?>"<?= $Grid->InitalOfSacs->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->InitalOfSacs->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_InitalOfSacs">
<span<?= $Grid->InitalOfSacs->viewAttributes() ?>>
<?= $Grid->InitalOfSacs->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_InitalOfSacs" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_InitalOfSacs" value="<?= HtmlEncode($Grid->InitalOfSacs->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_InitalOfSacs" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_InitalOfSacs" value="<?= HtmlEncode($Grid->InitalOfSacs->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ImplimentationRate->Visible) { // ImplimentationRate ?>
        <td data-name="ImplimentationRate" <?= $Grid->ImplimentationRate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_ImplimentationRate" class="form-group">
<input type="<?= $Grid->ImplimentationRate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x<?= $Grid->RowIndex ?>_ImplimentationRate" id="x<?= $Grid->RowIndex ?>_ImplimentationRate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ImplimentationRate->getPlaceHolder()) ?>" value="<?= $Grid->ImplimentationRate->EditValue ?>"<?= $Grid->ImplimentationRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ImplimentationRate->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ImplimentationRate" id="o<?= $Grid->RowIndex ?>_ImplimentationRate" value="<?= HtmlEncode($Grid->ImplimentationRate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_ImplimentationRate" class="form-group">
<input type="<?= $Grid->ImplimentationRate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x<?= $Grid->RowIndex ?>_ImplimentationRate" id="x<?= $Grid->RowIndex ?>_ImplimentationRate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ImplimentationRate->getPlaceHolder()) ?>" value="<?= $Grid->ImplimentationRate->EditValue ?>"<?= $Grid->ImplimentationRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ImplimentationRate->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_ImplimentationRate">
<span<?= $Grid->ImplimentationRate->viewAttributes() ?>>
<?= $Grid->ImplimentationRate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_ImplimentationRate" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_ImplimentationRate" value="<?= HtmlEncode($Grid->ImplimentationRate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_ImplimentationRate" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_ImplimentationRate" value="<?= HtmlEncode($Grid->ImplimentationRate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EmbryoNo->Visible) { // EmbryoNo ?>
        <td data-name="EmbryoNo" <?= $Grid->EmbryoNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_EmbryoNo" class="form-group">
<input type="<?= $Grid->EmbryoNo->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x<?= $Grid->RowIndex ?>_EmbryoNo" id="x<?= $Grid->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EmbryoNo->getPlaceHolder()) ?>" value="<?= $Grid->EmbryoNo->EditValue ?>"<?= $Grid->EmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EmbryoNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EmbryoNo" id="o<?= $Grid->RowIndex ?>_EmbryoNo" value="<?= HtmlEncode($Grid->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_EmbryoNo" class="form-group">
<input type="<?= $Grid->EmbryoNo->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x<?= $Grid->RowIndex ?>_EmbryoNo" id="x<?= $Grid->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EmbryoNo->getPlaceHolder()) ?>" value="<?= $Grid->EmbryoNo->EditValue ?>"<?= $Grid->EmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EmbryoNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_EmbryoNo">
<span<?= $Grid->EmbryoNo->viewAttributes() ?>>
<?= $Grid->EmbryoNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_EmbryoNo" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_EmbryoNo" value="<?= HtmlEncode($Grid->EmbryoNo->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_EmbryoNo" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_EmbryoNo" value="<?= HtmlEncode($Grid->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
        <td data-name="ExtrauterineSac" <?= $Grid->ExtrauterineSac->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_ExtrauterineSac" class="form-group">
<input type="<?= $Grid->ExtrauterineSac->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x<?= $Grid->RowIndex ?>_ExtrauterineSac" id="x<?= $Grid->RowIndex ?>_ExtrauterineSac" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ExtrauterineSac->getPlaceHolder()) ?>" value="<?= $Grid->ExtrauterineSac->EditValue ?>"<?= $Grid->ExtrauterineSac->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExtrauterineSac->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ExtrauterineSac" id="o<?= $Grid->RowIndex ?>_ExtrauterineSac" value="<?= HtmlEncode($Grid->ExtrauterineSac->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_ExtrauterineSac" class="form-group">
<input type="<?= $Grid->ExtrauterineSac->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x<?= $Grid->RowIndex ?>_ExtrauterineSac" id="x<?= $Grid->RowIndex ?>_ExtrauterineSac" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ExtrauterineSac->getPlaceHolder()) ?>" value="<?= $Grid->ExtrauterineSac->EditValue ?>"<?= $Grid->ExtrauterineSac->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExtrauterineSac->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_ExtrauterineSac">
<span<?= $Grid->ExtrauterineSac->viewAttributes() ?>>
<?= $Grid->ExtrauterineSac->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_ExtrauterineSac" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_ExtrauterineSac" value="<?= HtmlEncode($Grid->ExtrauterineSac->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_ExtrauterineSac" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_ExtrauterineSac" value="<?= HtmlEncode($Grid->ExtrauterineSac->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
        <td data-name="PregnancyMonozygotic" <?= $Grid->PregnancyMonozygotic->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_PregnancyMonozygotic" class="form-group">
<input type="<?= $Grid->PregnancyMonozygotic->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x<?= $Grid->RowIndex ?>_PregnancyMonozygotic" id="x<?= $Grid->RowIndex ?>_PregnancyMonozygotic" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PregnancyMonozygotic->getPlaceHolder()) ?>" value="<?= $Grid->PregnancyMonozygotic->EditValue ?>"<?= $Grid->PregnancyMonozygotic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PregnancyMonozygotic->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PregnancyMonozygotic" id="o<?= $Grid->RowIndex ?>_PregnancyMonozygotic" value="<?= HtmlEncode($Grid->PregnancyMonozygotic->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_PregnancyMonozygotic" class="form-group">
<input type="<?= $Grid->PregnancyMonozygotic->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x<?= $Grid->RowIndex ?>_PregnancyMonozygotic" id="x<?= $Grid->RowIndex ?>_PregnancyMonozygotic" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PregnancyMonozygotic->getPlaceHolder()) ?>" value="<?= $Grid->PregnancyMonozygotic->EditValue ?>"<?= $Grid->PregnancyMonozygotic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PregnancyMonozygotic->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_PregnancyMonozygotic">
<span<?= $Grid->PregnancyMonozygotic->viewAttributes() ?>>
<?= $Grid->PregnancyMonozygotic->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_PregnancyMonozygotic" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_PregnancyMonozygotic" value="<?= HtmlEncode($Grid->PregnancyMonozygotic->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_PregnancyMonozygotic" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_PregnancyMonozygotic" value="<?= HtmlEncode($Grid->PregnancyMonozygotic->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TypeGestation->Visible) { // TypeGestation ?>
        <td data-name="TypeGestation" <?= $Grid->TypeGestation->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_TypeGestation" class="form-group">
<input type="<?= $Grid->TypeGestation->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TypeGestation" name="x<?= $Grid->RowIndex ?>_TypeGestation" id="x<?= $Grid->RowIndex ?>_TypeGestation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TypeGestation->getPlaceHolder()) ?>" value="<?= $Grid->TypeGestation->EditValue ?>"<?= $Grid->TypeGestation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TypeGestation->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TypeGestation" id="o<?= $Grid->RowIndex ?>_TypeGestation" value="<?= HtmlEncode($Grid->TypeGestation->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_TypeGestation" class="form-group">
<input type="<?= $Grid->TypeGestation->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TypeGestation" name="x<?= $Grid->RowIndex ?>_TypeGestation" id="x<?= $Grid->RowIndex ?>_TypeGestation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TypeGestation->getPlaceHolder()) ?>" value="<?= $Grid->TypeGestation->EditValue ?>"<?= $Grid->TypeGestation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TypeGestation->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_TypeGestation">
<span<?= $Grid->TypeGestation->viewAttributes() ?>>
<?= $Grid->TypeGestation->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_TypeGestation" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_TypeGestation" value="<?= HtmlEncode($Grid->TypeGestation->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_TypeGestation" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_TypeGestation" value="<?= HtmlEncode($Grid->TypeGestation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Urine->Visible) { // Urine ?>
        <td data-name="Urine" <?= $Grid->Urine->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Urine" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Urine"
        name="x<?= $Grid->RowIndex ?>_Urine"
        class="form-control ew-select<?= $Grid->Urine->isInvalidClass() ?>"
        data-select2-id="ivf_outcome_x<?= $Grid->RowIndex ?>_Urine"
        data-table="ivf_outcome"
        data-field="x_Urine"
        data-value-separator="<?= $Grid->Urine->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Urine->getPlaceHolder()) ?>"
        <?= $Grid->Urine->editAttributes() ?>>
        <?= $Grid->Urine->selectOptionListHtml("x{$Grid->RowIndex}_Urine") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Urine->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_outcome_x<?= $Grid->RowIndex ?>_Urine']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Urine", selectId: "ivf_outcome_x<?= $Grid->RowIndex ?>_Urine", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_outcome.fields.Urine.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_outcome.fields.Urine.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Urine" id="o<?= $Grid->RowIndex ?>_Urine" value="<?= HtmlEncode($Grid->Urine->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Urine" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Urine"
        name="x<?= $Grid->RowIndex ?>_Urine"
        class="form-control ew-select<?= $Grid->Urine->isInvalidClass() ?>"
        data-select2-id="ivf_outcome_x<?= $Grid->RowIndex ?>_Urine"
        data-table="ivf_outcome"
        data-field="x_Urine"
        data-value-separator="<?= $Grid->Urine->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Urine->getPlaceHolder()) ?>"
        <?= $Grid->Urine->editAttributes() ?>>
        <?= $Grid->Urine->selectOptionListHtml("x{$Grid->RowIndex}_Urine") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Urine->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_outcome_x<?= $Grid->RowIndex ?>_Urine']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Urine", selectId: "ivf_outcome_x<?= $Grid->RowIndex ?>_Urine", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_outcome.fields.Urine.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_outcome.fields.Urine.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Urine">
<span<?= $Grid->Urine->viewAttributes() ?>>
<?= $Grid->Urine->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Urine" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Urine" value="<?= HtmlEncode($Grid->Urine->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Urine" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Urine" value="<?= HtmlEncode($Grid->Urine->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PTdate->Visible) { // PTdate ?>
        <td data-name="PTdate" <?= $Grid->PTdate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_PTdate" class="form-group">
<input type="<?= $Grid->PTdate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_PTdate" name="x<?= $Grid->RowIndex ?>_PTdate" id="x<?= $Grid->RowIndex ?>_PTdate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PTdate->getPlaceHolder()) ?>" value="<?= $Grid->PTdate->EditValue ?>"<?= $Grid->PTdate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PTdate->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PTdate" id="o<?= $Grid->RowIndex ?>_PTdate" value="<?= HtmlEncode($Grid->PTdate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_PTdate" class="form-group">
<input type="<?= $Grid->PTdate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_PTdate" name="x<?= $Grid->RowIndex ?>_PTdate" id="x<?= $Grid->RowIndex ?>_PTdate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PTdate->getPlaceHolder()) ?>" value="<?= $Grid->PTdate->EditValue ?>"<?= $Grid->PTdate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PTdate->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_PTdate">
<span<?= $Grid->PTdate->viewAttributes() ?>>
<?= $Grid->PTdate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_PTdate" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_PTdate" value="<?= HtmlEncode($Grid->PTdate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_PTdate" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_PTdate" value="<?= HtmlEncode($Grid->PTdate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Reduced->Visible) { // Reduced ?>
        <td data-name="Reduced" <?= $Grid->Reduced->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Reduced" class="form-group">
<input type="<?= $Grid->Reduced->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Reduced" name="x<?= $Grid->RowIndex ?>_Reduced" id="x<?= $Grid->RowIndex ?>_Reduced" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Reduced->getPlaceHolder()) ?>" value="<?= $Grid->Reduced->EditValue ?>"<?= $Grid->Reduced->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reduced->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reduced" id="o<?= $Grid->RowIndex ?>_Reduced" value="<?= HtmlEncode($Grid->Reduced->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Reduced" class="form-group">
<input type="<?= $Grid->Reduced->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Reduced" name="x<?= $Grid->RowIndex ?>_Reduced" id="x<?= $Grid->RowIndex ?>_Reduced" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Reduced->getPlaceHolder()) ?>" value="<?= $Grid->Reduced->EditValue ?>"<?= $Grid->Reduced->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reduced->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Reduced">
<span<?= $Grid->Reduced->viewAttributes() ?>>
<?= $Grid->Reduced->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Reduced" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Reduced" value="<?= HtmlEncode($Grid->Reduced->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Reduced" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Reduced" value="<?= HtmlEncode($Grid->Reduced->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->INduced->Visible) { // INduced ?>
        <td data-name="INduced" <?= $Grid->INduced->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_INduced" class="form-group">
<input type="<?= $Grid->INduced->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_INduced" name="x<?= $Grid->RowIndex ?>_INduced" id="x<?= $Grid->RowIndex ?>_INduced" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INduced->getPlaceHolder()) ?>" value="<?= $Grid->INduced->EditValue ?>"<?= $Grid->INduced->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INduced->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" data-hidden="1" name="o<?= $Grid->RowIndex ?>_INduced" id="o<?= $Grid->RowIndex ?>_INduced" value="<?= HtmlEncode($Grid->INduced->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_INduced" class="form-group">
<input type="<?= $Grid->INduced->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_INduced" name="x<?= $Grid->RowIndex ?>_INduced" id="x<?= $Grid->RowIndex ?>_INduced" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INduced->getPlaceHolder()) ?>" value="<?= $Grid->INduced->EditValue ?>"<?= $Grid->INduced->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INduced->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_INduced">
<span<?= $Grid->INduced->viewAttributes() ?>>
<?= $Grid->INduced->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_INduced" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_INduced" value="<?= HtmlEncode($Grid->INduced->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_INduced" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_INduced" value="<?= HtmlEncode($Grid->INduced->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->INducedDate->Visible) { // INducedDate ?>
        <td data-name="INducedDate" <?= $Grid->INducedDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_INducedDate" class="form-group">
<input type="<?= $Grid->INducedDate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_INducedDate" name="x<?= $Grid->RowIndex ?>_INducedDate" id="x<?= $Grid->RowIndex ?>_INducedDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INducedDate->getPlaceHolder()) ?>" value="<?= $Grid->INducedDate->EditValue ?>"<?= $Grid->INducedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INducedDate->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_INducedDate" id="o<?= $Grid->RowIndex ?>_INducedDate" value="<?= HtmlEncode($Grid->INducedDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_INducedDate" class="form-group">
<input type="<?= $Grid->INducedDate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_INducedDate" name="x<?= $Grid->RowIndex ?>_INducedDate" id="x<?= $Grid->RowIndex ?>_INducedDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INducedDate->getPlaceHolder()) ?>" value="<?= $Grid->INducedDate->EditValue ?>"<?= $Grid->INducedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INducedDate->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_INducedDate">
<span<?= $Grid->INducedDate->viewAttributes() ?>>
<?= $Grid->INducedDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_INducedDate" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_INducedDate" value="<?= HtmlEncode($Grid->INducedDate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_INducedDate" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_INducedDate" value="<?= HtmlEncode($Grid->INducedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Miscarriage->Visible) { // Miscarriage ?>
        <td data-name="Miscarriage" <?= $Grid->Miscarriage->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Miscarriage" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Miscarriage">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Miscarriage" name="x<?= $Grid->RowIndex ?>_Miscarriage" id="x<?= $Grid->RowIndex ?>_Miscarriage"<?= $Grid->Miscarriage->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Miscarriage" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Miscarriage"
    name="x<?= $Grid->RowIndex ?>_Miscarriage"
    value="<?= HtmlEncode($Grid->Miscarriage->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Miscarriage"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Miscarriage"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Miscarriage->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Miscarriage"
    data-value-separator="<?= $Grid->Miscarriage->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Miscarriage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Miscarriage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Miscarriage" id="o<?= $Grid->RowIndex ?>_Miscarriage" value="<?= HtmlEncode($Grid->Miscarriage->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Miscarriage" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Miscarriage">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Miscarriage" name="x<?= $Grid->RowIndex ?>_Miscarriage" id="x<?= $Grid->RowIndex ?>_Miscarriage"<?= $Grid->Miscarriage->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Miscarriage" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Miscarriage"
    name="x<?= $Grid->RowIndex ?>_Miscarriage"
    value="<?= HtmlEncode($Grid->Miscarriage->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Miscarriage"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Miscarriage"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Miscarriage->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Miscarriage"
    data-value-separator="<?= $Grid->Miscarriage->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Miscarriage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Miscarriage->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Miscarriage">
<span<?= $Grid->Miscarriage->viewAttributes() ?>>
<?= $Grid->Miscarriage->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Miscarriage" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Miscarriage" value="<?= HtmlEncode($Grid->Miscarriage->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Miscarriage" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Miscarriage" value="<?= HtmlEncode($Grid->Miscarriage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Induced1->Visible) { // Induced1 ?>
        <td data-name="Induced1" <?= $Grid->Induced1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Induced1" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Induced1">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Induced1" name="x<?= $Grid->RowIndex ?>_Induced1" id="x<?= $Grid->RowIndex ?>_Induced1"<?= $Grid->Induced1->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Induced1" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Induced1"
    name="x<?= $Grid->RowIndex ?>_Induced1"
    value="<?= HtmlEncode($Grid->Induced1->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Induced1"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Induced1"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Induced1->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Induced1"
    data-value-separator="<?= $Grid->Induced1->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Induced1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Induced1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Induced1" id="o<?= $Grid->RowIndex ?>_Induced1" value="<?= HtmlEncode($Grid->Induced1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Induced1" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Induced1">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Induced1" name="x<?= $Grid->RowIndex ?>_Induced1" id="x<?= $Grid->RowIndex ?>_Induced1"<?= $Grid->Induced1->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Induced1" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Induced1"
    name="x<?= $Grid->RowIndex ?>_Induced1"
    value="<?= HtmlEncode($Grid->Induced1->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Induced1"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Induced1"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Induced1->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Induced1"
    data-value-separator="<?= $Grid->Induced1->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Induced1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Induced1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Induced1">
<span<?= $Grid->Induced1->viewAttributes() ?>>
<?= $Grid->Induced1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Induced1" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Induced1" value="<?= HtmlEncode($Grid->Induced1->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Induced1" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Induced1" value="<?= HtmlEncode($Grid->Induced1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Type->Visible) { // Type ?>
        <td data-name="Type" <?= $Grid->Type->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Type" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Type">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Type" name="x<?= $Grid->RowIndex ?>_Type" id="x<?= $Grid->RowIndex ?>_Type"<?= $Grid->Type->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Type" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Type"
    name="x<?= $Grid->RowIndex ?>_Type"
    value="<?= HtmlEncode($Grid->Type->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Type"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Type"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Type->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Type"
    data-value-separator="<?= $Grid->Type->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Type->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Type" id="o<?= $Grid->RowIndex ?>_Type" value="<?= HtmlEncode($Grid->Type->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Type" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Type">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Type" name="x<?= $Grid->RowIndex ?>_Type" id="x<?= $Grid->RowIndex ?>_Type"<?= $Grid->Type->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Type" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Type"
    name="x<?= $Grid->RowIndex ?>_Type"
    value="<?= HtmlEncode($Grid->Type->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Type"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Type"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Type->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Type"
    data-value-separator="<?= $Grid->Type->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Type->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Type">
<span<?= $Grid->Type->viewAttributes() ?>>
<?= $Grid->Type->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Type" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Type" value="<?= HtmlEncode($Grid->Type->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Type" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Type" value="<?= HtmlEncode($Grid->Type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->IfClinical->Visible) { // IfClinical ?>
        <td data-name="IfClinical" <?= $Grid->IfClinical->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_IfClinical" class="form-group">
<input type="<?= $Grid->IfClinical->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_IfClinical" name="x<?= $Grid->RowIndex ?>_IfClinical" id="x<?= $Grid->RowIndex ?>_IfClinical" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IfClinical->getPlaceHolder()) ?>" value="<?= $Grid->IfClinical->EditValue ?>"<?= $Grid->IfClinical->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IfClinical->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IfClinical" id="o<?= $Grid->RowIndex ?>_IfClinical" value="<?= HtmlEncode($Grid->IfClinical->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_IfClinical" class="form-group">
<input type="<?= $Grid->IfClinical->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_IfClinical" name="x<?= $Grid->RowIndex ?>_IfClinical" id="x<?= $Grid->RowIndex ?>_IfClinical" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IfClinical->getPlaceHolder()) ?>" value="<?= $Grid->IfClinical->EditValue ?>"<?= $Grid->IfClinical->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IfClinical->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_IfClinical">
<span<?= $Grid->IfClinical->viewAttributes() ?>>
<?= $Grid->IfClinical->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_IfClinical" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_IfClinical" value="<?= HtmlEncode($Grid->IfClinical->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_IfClinical" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_IfClinical" value="<?= HtmlEncode($Grid->IfClinical->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->GADate->Visible) { // GADate ?>
        <td data-name="GADate" <?= $Grid->GADate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_GADate" class="form-group">
<input type="<?= $Grid->GADate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_GADate" name="x<?= $Grid->RowIndex ?>_GADate" id="x<?= $Grid->RowIndex ?>_GADate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GADate->getPlaceHolder()) ?>" value="<?= $Grid->GADate->EditValue ?>"<?= $Grid->GADate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GADate->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GADate" id="o<?= $Grid->RowIndex ?>_GADate" value="<?= HtmlEncode($Grid->GADate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_GADate" class="form-group">
<input type="<?= $Grid->GADate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_GADate" name="x<?= $Grid->RowIndex ?>_GADate" id="x<?= $Grid->RowIndex ?>_GADate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GADate->getPlaceHolder()) ?>" value="<?= $Grid->GADate->EditValue ?>"<?= $Grid->GADate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GADate->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_GADate">
<span<?= $Grid->GADate->viewAttributes() ?>>
<?= $Grid->GADate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_GADate" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_GADate" value="<?= HtmlEncode($Grid->GADate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_GADate" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_GADate" value="<?= HtmlEncode($Grid->GADate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->GA->Visible) { // GA ?>
        <td data-name="GA" <?= $Grid->GA->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_GA" class="form-group">
<input type="<?= $Grid->GA->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_GA" name="x<?= $Grid->RowIndex ?>_GA" id="x<?= $Grid->RowIndex ?>_GA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GA->getPlaceHolder()) ?>" value="<?= $Grid->GA->EditValue ?>"<?= $Grid->GA->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GA->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GA" id="o<?= $Grid->RowIndex ?>_GA" value="<?= HtmlEncode($Grid->GA->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_GA" class="form-group">
<input type="<?= $Grid->GA->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_GA" name="x<?= $Grid->RowIndex ?>_GA" id="x<?= $Grid->RowIndex ?>_GA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GA->getPlaceHolder()) ?>" value="<?= $Grid->GA->EditValue ?>"<?= $Grid->GA->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GA->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_GA">
<span<?= $Grid->GA->viewAttributes() ?>>
<?= $Grid->GA->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_GA" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_GA" value="<?= HtmlEncode($Grid->GA->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_GA" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_GA" value="<?= HtmlEncode($Grid->GA->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->FoetalDeath->Visible) { // FoetalDeath ?>
        <td data-name="FoetalDeath" <?= $Grid->FoetalDeath->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_FoetalDeath" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_FoetalDeath"
        name="x<?= $Grid->RowIndex ?>_FoetalDeath"
        class="form-control ew-select<?= $Grid->FoetalDeath->isInvalidClass() ?>"
        data-select2-id="ivf_outcome_x<?= $Grid->RowIndex ?>_FoetalDeath"
        data-table="ivf_outcome"
        data-field="x_FoetalDeath"
        data-value-separator="<?= $Grid->FoetalDeath->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->FoetalDeath->getPlaceHolder()) ?>"
        <?= $Grid->FoetalDeath->editAttributes() ?>>
        <?= $Grid->FoetalDeath->selectOptionListHtml("x{$Grid->RowIndex}_FoetalDeath") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->FoetalDeath->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_outcome_x<?= $Grid->RowIndex ?>_FoetalDeath']"),
        options = { name: "x<?= $Grid->RowIndex ?>_FoetalDeath", selectId: "ivf_outcome_x<?= $Grid->RowIndex ?>_FoetalDeath", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_outcome.fields.FoetalDeath.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_outcome.fields.FoetalDeath.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FoetalDeath" id="o<?= $Grid->RowIndex ?>_FoetalDeath" value="<?= HtmlEncode($Grid->FoetalDeath->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_FoetalDeath" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_FoetalDeath"
        name="x<?= $Grid->RowIndex ?>_FoetalDeath"
        class="form-control ew-select<?= $Grid->FoetalDeath->isInvalidClass() ?>"
        data-select2-id="ivf_outcome_x<?= $Grid->RowIndex ?>_FoetalDeath"
        data-table="ivf_outcome"
        data-field="x_FoetalDeath"
        data-value-separator="<?= $Grid->FoetalDeath->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->FoetalDeath->getPlaceHolder()) ?>"
        <?= $Grid->FoetalDeath->editAttributes() ?>>
        <?= $Grid->FoetalDeath->selectOptionListHtml("x{$Grid->RowIndex}_FoetalDeath") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->FoetalDeath->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_outcome_x<?= $Grid->RowIndex ?>_FoetalDeath']"),
        options = { name: "x<?= $Grid->RowIndex ?>_FoetalDeath", selectId: "ivf_outcome_x<?= $Grid->RowIndex ?>_FoetalDeath", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_outcome.fields.FoetalDeath.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_outcome.fields.FoetalDeath.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_FoetalDeath">
<span<?= $Grid->FoetalDeath->viewAttributes() ?>>
<?= $Grid->FoetalDeath->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_FoetalDeath" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_FoetalDeath" value="<?= HtmlEncode($Grid->FoetalDeath->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_FoetalDeath" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_FoetalDeath" value="<?= HtmlEncode($Grid->FoetalDeath->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->FerinatalDeath->Visible) { // FerinatalDeath ?>
        <td data-name="FerinatalDeath" <?= $Grid->FerinatalDeath->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_FerinatalDeath" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_FerinatalDeath"
        name="x<?= $Grid->RowIndex ?>_FerinatalDeath"
        class="form-control ew-select<?= $Grid->FerinatalDeath->isInvalidClass() ?>"
        data-select2-id="ivf_outcome_x<?= $Grid->RowIndex ?>_FerinatalDeath"
        data-table="ivf_outcome"
        data-field="x_FerinatalDeath"
        data-value-separator="<?= $Grid->FerinatalDeath->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->FerinatalDeath->getPlaceHolder()) ?>"
        <?= $Grid->FerinatalDeath->editAttributes() ?>>
        <?= $Grid->FerinatalDeath->selectOptionListHtml("x{$Grid->RowIndex}_FerinatalDeath") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->FerinatalDeath->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_outcome_x<?= $Grid->RowIndex ?>_FerinatalDeath']"),
        options = { name: "x<?= $Grid->RowIndex ?>_FerinatalDeath", selectId: "ivf_outcome_x<?= $Grid->RowIndex ?>_FerinatalDeath", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_outcome.fields.FerinatalDeath.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_outcome.fields.FerinatalDeath.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FerinatalDeath" id="o<?= $Grid->RowIndex ?>_FerinatalDeath" value="<?= HtmlEncode($Grid->FerinatalDeath->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_FerinatalDeath" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_FerinatalDeath"
        name="x<?= $Grid->RowIndex ?>_FerinatalDeath"
        class="form-control ew-select<?= $Grid->FerinatalDeath->isInvalidClass() ?>"
        data-select2-id="ivf_outcome_x<?= $Grid->RowIndex ?>_FerinatalDeath"
        data-table="ivf_outcome"
        data-field="x_FerinatalDeath"
        data-value-separator="<?= $Grid->FerinatalDeath->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->FerinatalDeath->getPlaceHolder()) ?>"
        <?= $Grid->FerinatalDeath->editAttributes() ?>>
        <?= $Grid->FerinatalDeath->selectOptionListHtml("x{$Grid->RowIndex}_FerinatalDeath") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->FerinatalDeath->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_outcome_x<?= $Grid->RowIndex ?>_FerinatalDeath']"),
        options = { name: "x<?= $Grid->RowIndex ?>_FerinatalDeath", selectId: "ivf_outcome_x<?= $Grid->RowIndex ?>_FerinatalDeath", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_outcome.fields.FerinatalDeath.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_outcome.fields.FerinatalDeath.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_FerinatalDeath">
<span<?= $Grid->FerinatalDeath->viewAttributes() ?>>
<?= $Grid->FerinatalDeath->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_FerinatalDeath" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_FerinatalDeath" value="<?= HtmlEncode($Grid->FerinatalDeath->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_FerinatalDeath" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_FerinatalDeath" value="<?= HtmlEncode($Grid->FerinatalDeath->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Grid->TidNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->TidNo->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_TidNo" class="form-group">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_TidNo" class="form-group">
<input type="<?= $Grid->TidNo->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Grid->TidNo->getPlaceHolder()) ?>" value="<?= $Grid->TidNo->EditValue ?>"<?= $Grid->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TidNo" id="o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->TidNo->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_TidNo" class="form-group">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_TidNo" class="form-group">
<input type="<?= $Grid->TidNo->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Grid->TidNo->getPlaceHolder()) ?>" value="<?= $Grid->TidNo->EditValue ?>"<?= $Grid->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_TidNo">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<?= $Grid->TidNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_TidNo" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_TidNo" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Ectopic->Visible) { // Ectopic ?>
        <td data-name="Ectopic" <?= $Grid->Ectopic->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Ectopic" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Ectopic">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Ectopic" name="x<?= $Grid->RowIndex ?>_Ectopic" id="x<?= $Grid->RowIndex ?>_Ectopic"<?= $Grid->Ectopic->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Ectopic" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Ectopic"
    name="x<?= $Grid->RowIndex ?>_Ectopic"
    value="<?= HtmlEncode($Grid->Ectopic->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Ectopic"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Ectopic"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Ectopic->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Ectopic"
    data-value-separator="<?= $Grid->Ectopic->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Ectopic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Ectopic->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Ectopic" id="o<?= $Grid->RowIndex ?>_Ectopic" value="<?= HtmlEncode($Grid->Ectopic->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Ectopic" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Ectopic">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Ectopic" name="x<?= $Grid->RowIndex ?>_Ectopic" id="x<?= $Grid->RowIndex ?>_Ectopic"<?= $Grid->Ectopic->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Ectopic" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Ectopic"
    name="x<?= $Grid->RowIndex ?>_Ectopic"
    value="<?= HtmlEncode($Grid->Ectopic->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Ectopic"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Ectopic"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Ectopic->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Ectopic"
    data-value-separator="<?= $Grid->Ectopic->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Ectopic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Ectopic->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Ectopic">
<span<?= $Grid->Ectopic->viewAttributes() ?>>
<?= $Grid->Ectopic->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Ectopic" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Ectopic" value="<?= HtmlEncode($Grid->Ectopic->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Ectopic" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Ectopic" value="<?= HtmlEncode($Grid->Ectopic->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Extra->Visible) { // Extra ?>
        <td data-name="Extra" <?= $Grid->Extra->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Extra" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Extra">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Extra" name="x<?= $Grid->RowIndex ?>_Extra" id="x<?= $Grid->RowIndex ?>_Extra"<?= $Grid->Extra->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Extra" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Extra"
    name="x<?= $Grid->RowIndex ?>_Extra"
    value="<?= HtmlEncode($Grid->Extra->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Extra"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Extra"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Extra->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Extra"
    data-value-separator="<?= $Grid->Extra->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Extra->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Extra->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Extra" id="o<?= $Grid->RowIndex ?>_Extra" value="<?= HtmlEncode($Grid->Extra->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Extra" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Extra">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Extra" name="x<?= $Grid->RowIndex ?>_Extra" id="x<?= $Grid->RowIndex ?>_Extra"<?= $Grid->Extra->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Extra" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Extra"
    name="x<?= $Grid->RowIndex ?>_Extra"
    value="<?= HtmlEncode($Grid->Extra->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Extra"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Extra"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Extra->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Extra"
    data-value-separator="<?= $Grid->Extra->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Extra->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Extra->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Extra">
<span<?= $Grid->Extra->viewAttributes() ?>>
<?= $Grid->Extra->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Extra" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Extra" value="<?= HtmlEncode($Grid->Extra->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Extra" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Extra" value="<?= HtmlEncode($Grid->Extra->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Implantation->Visible) { // Implantation ?>
        <td data-name="Implantation" <?= $Grid->Implantation->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Implantation" class="form-group">
<input type="<?= $Grid->Implantation->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Implantation" name="x<?= $Grid->RowIndex ?>_Implantation" id="x<?= $Grid->RowIndex ?>_Implantation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Implantation->getPlaceHolder()) ?>" value="<?= $Grid->Implantation->EditValue ?>"<?= $Grid->Implantation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Implantation->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Implantation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Implantation" id="o<?= $Grid->RowIndex ?>_Implantation" value="<?= HtmlEncode($Grid->Implantation->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Implantation" class="form-group">
<input type="<?= $Grid->Implantation->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Implantation" name="x<?= $Grid->RowIndex ?>_Implantation" id="x<?= $Grid->RowIndex ?>_Implantation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Implantation->getPlaceHolder()) ?>" value="<?= $Grid->Implantation->EditValue ?>"<?= $Grid->Implantation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Implantation->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_Implantation">
<span<?= $Grid->Implantation->viewAttributes() ?>>
<?= $Grid->Implantation->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Implantation" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Implantation" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_Implantation" value="<?= HtmlEncode($Grid->Implantation->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Implantation" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Implantation" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_Implantation" value="<?= HtmlEncode($Grid->Implantation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DeliveryDate->Visible) { // DeliveryDate ?>
        <td data-name="DeliveryDate" <?= $Grid->DeliveryDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_DeliveryDate" class="form-group">
<input type="<?= $Grid->DeliveryDate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_DeliveryDate" data-format="7" name="x<?= $Grid->RowIndex ?>_DeliveryDate" id="x<?= $Grid->RowIndex ?>_DeliveryDate" placeholder="<?= HtmlEncode($Grid->DeliveryDate->getPlaceHolder()) ?>" value="<?= $Grid->DeliveryDate->EditValue ?>"<?= $Grid->DeliveryDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeliveryDate->getErrorMessage() ?></div>
<?php if (!$Grid->DeliveryDate->ReadOnly && !$Grid->DeliveryDate->Disabled && !isset($Grid->DeliveryDate->EditAttrs["readonly"]) && !isset($Grid->DeliveryDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_DeliveryDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_DeliveryDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DeliveryDate" id="o<?= $Grid->RowIndex ?>_DeliveryDate" value="<?= HtmlEncode($Grid->DeliveryDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_DeliveryDate" class="form-group">
<input type="<?= $Grid->DeliveryDate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_DeliveryDate" data-format="7" name="x<?= $Grid->RowIndex ?>_DeliveryDate" id="x<?= $Grid->RowIndex ?>_DeliveryDate" placeholder="<?= HtmlEncode($Grid->DeliveryDate->getPlaceHolder()) ?>" value="<?= $Grid->DeliveryDate->EditValue ?>"<?= $Grid->DeliveryDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeliveryDate->getErrorMessage() ?></div>
<?php if (!$Grid->DeliveryDate->ReadOnly && !$Grid->DeliveryDate->Disabled && !isset($Grid->DeliveryDate->EditAttrs["readonly"]) && !isset($Grid->DeliveryDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_DeliveryDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_outcome_DeliveryDate">
<span<?= $Grid->DeliveryDate->viewAttributes() ?>>
<?= $Grid->DeliveryDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_DeliveryDate" data-hidden="1" name="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_DeliveryDate" id="fivf_outcomegrid$x<?= $Grid->RowIndex ?>_DeliveryDate" value="<?= HtmlEncode($Grid->DeliveryDate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_DeliveryDate" data-hidden="1" name="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_DeliveryDate" id="fivf_outcomegrid$o<?= $Grid->RowIndex ?>_DeliveryDate" value="<?= HtmlEncode($Grid->DeliveryDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowCount);
?>
    </tr>
<?php if ($Grid->RowType == ROWTYPE_ADD || $Grid->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fivf_outcomegrid","load"], function () {
    fivf_outcomegrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
    }
    } // End delete row checking
    if (!$Grid->isGridAdd() || $Grid->CurrentMode == "copy")
        if (!$Grid->Recordset->EOF) {
            $Grid->Recordset->moveNext();
        }
}
?>
<?php
    if ($Grid->CurrentMode == "add" || $Grid->CurrentMode == "copy" || $Grid->CurrentMode == "edit") {
        $Grid->RowIndex = '$rowindex$';
        $Grid->loadRowValues();

        // Set row properties
        $Grid->resetAttributes();
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_ivf_outcome", "data-rowtype" => ROWTYPE_ADD]);
        $Grid->RowAttrs->appendClass("ew-template");
        $Grid->RowType = ROWTYPE_ADD;

        // Render row
        $Grid->renderRow();

        // Render list options
        $Grid->renderListOptions();
        $Grid->StartRowCount = 0;
?>
    <tr <?= $Grid->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Grid->ListOptions->render("body", "left", $Grid->RowIndex);
?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_id" class="form-group ivf_outcome_id"></span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_id" class="form-group ivf_outcome_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->RIDNO->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_outcome_RIDNO" class="form-group ivf_outcome_RIDNO">
<span<?= $Grid->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNO->getDisplayValue($Grid->RIDNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_RIDNO" name="x<?= $Grid->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Grid->RIDNO->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_RIDNO" class="form-group ivf_outcome_RIDNO">
<input type="<?= $Grid->RIDNO->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_RIDNO" name="x<?= $Grid->RowIndex ?>_RIDNO" id="x<?= $Grid->RowIndex ?>_RIDNO" size="30" placeholder="<?= HtmlEncode($Grid->RIDNO->getPlaceHolder()) ?>" value="<?= $Grid->RIDNO->EditValue ?>"<?= $Grid->RIDNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RIDNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_RIDNO" class="form-group ivf_outcome_RIDNO">
<span<?= $Grid->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNO->getDisplayValue($Grid->RIDNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RIDNO" id="x<?= $Grid->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Grid->RIDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RIDNO" id="o<?= $Grid->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Grid->RIDNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Name->Visible) { // Name ?>
        <td data-name="Name">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->Name->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_outcome_Name" class="form-group ivf_outcome_Name">
<span<?= $Grid->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Name->getDisplayValue($Grid->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Name" name="x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Name" class="form-group ivf_outcome_Name">
<input type="<?= $Grid->Name->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Name" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Name->getPlaceHolder()) ?>" value="<?= $Grid->Name->EditValue ?>"<?= $Grid->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Name" class="form-group ivf_outcome_Name">
<span<?= $Grid->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Name->getDisplayValue($Grid->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Name" id="o<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Age" class="form-group ivf_outcome_Age">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Age" class="form-group ivf_outcome_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Age->getDisplayValue($Grid->Age->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->treatment_status->Visible) { // treatment_status ?>
        <td data-name="treatment_status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_treatment_status" class="form-group ivf_outcome_treatment_status">
<input type="<?= $Grid->treatment_status->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_treatment_status" name="x<?= $Grid->RowIndex ?>_treatment_status" id="x<?= $Grid->RowIndex ?>_treatment_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->treatment_status->getPlaceHolder()) ?>" value="<?= $Grid->treatment_status->EditValue ?>"<?= $Grid->treatment_status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->treatment_status->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_treatment_status" class="form-group ivf_outcome_treatment_status">
<span<?= $Grid->treatment_status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->treatment_status->getDisplayValue($Grid->treatment_status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_treatment_status" id="x<?= $Grid->RowIndex ?>_treatment_status" value="<?= HtmlEncode($Grid->treatment_status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_treatment_status" id="o<?= $Grid->RowIndex ?>_treatment_status" value="<?= HtmlEncode($Grid->treatment_status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td data-name="ARTCYCLE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_ARTCYCLE" class="form-group ivf_outcome_ARTCYCLE">
<input type="<?= $Grid->ARTCYCLE->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x<?= $Grid->RowIndex ?>_ARTCYCLE" id="x<?= $Grid->RowIndex ?>_ARTCYCLE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ARTCYCLE->getPlaceHolder()) ?>" value="<?= $Grid->ARTCYCLE->EditValue ?>"<?= $Grid->ARTCYCLE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ARTCYCLE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_ARTCYCLE" class="form-group ivf_outcome_ARTCYCLE">
<span<?= $Grid->ARTCYCLE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ARTCYCLE->getDisplayValue($Grid->ARTCYCLE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ARTCYCLE" id="x<?= $Grid->RowIndex ?>_ARTCYCLE" value="<?= HtmlEncode($Grid->ARTCYCLE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ARTCYCLE" id="o<?= $Grid->RowIndex ?>_ARTCYCLE" value="<?= HtmlEncode($Grid->ARTCYCLE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RESULT->Visible) { // RESULT ?>
        <td data-name="RESULT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_RESULT" class="form-group ivf_outcome_RESULT">
<input type="<?= $Grid->RESULT->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_RESULT" name="x<?= $Grid->RowIndex ?>_RESULT" id="x<?= $Grid->RowIndex ?>_RESULT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RESULT->getPlaceHolder()) ?>" value="<?= $Grid->RESULT->EditValue ?>"<?= $Grid->RESULT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RESULT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_RESULT" class="form-group ivf_outcome_RESULT">
<span<?= $Grid->RESULT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RESULT->getDisplayValue($Grid->RESULT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RESULT" id="x<?= $Grid->RowIndex ?>_RESULT" value="<?= HtmlEncode($Grid->RESULT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RESULT" id="o<?= $Grid->RowIndex ?>_RESULT" value="<?= HtmlEncode($Grid->RESULT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_status" class="form-group ivf_outcome_status">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_status" class="form-group ivf_outcome_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_createdby" class="form-group ivf_outcome_createdby">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_createdby" class="form-group ivf_outcome_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdby->getDisplayValue($Grid->createdby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_createddatetime" class="form-group ivf_outcome_createddatetime">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_createddatetime" class="form-group ivf_outcome_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_modifiedby" class="form-group ivf_outcome_modifiedby">
<input type="<?= $Grid->modifiedby->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_modifiedby" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" size="30" placeholder="<?= HtmlEncode($Grid->modifiedby->getPlaceHolder()) ?>" value="<?= $Grid->modifiedby->EditValue ?>"<?= $Grid->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifiedby->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_modifiedby" class="form-group ivf_outcome_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifiedby->getDisplayValue($Grid->modifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_modifieddatetime" class="form-group ivf_outcome_modifieddatetime">
<input type="<?= $Grid->modifieddatetime->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" placeholder="<?= HtmlEncode($Grid->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Grid->modifieddatetime->EditValue ?>"<?= $Grid->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->modifieddatetime->ReadOnly && !$Grid->modifieddatetime->Disabled && !isset($Grid->modifieddatetime->EditAttrs["readonly"]) && !isset($Grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_modifieddatetime" class="form-group ivf_outcome_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifieddatetime->getDisplayValue($Grid->modifieddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->outcomeDate->Visible) { // outcomeDate ?>
        <td data-name="outcomeDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_outcomeDate" class="form-group ivf_outcome_outcomeDate">
<input type="<?= $Grid->outcomeDate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_outcomeDate" name="x<?= $Grid->RowIndex ?>_outcomeDate" id="x<?= $Grid->RowIndex ?>_outcomeDate" placeholder="<?= HtmlEncode($Grid->outcomeDate->getPlaceHolder()) ?>" value="<?= $Grid->outcomeDate->EditValue ?>"<?= $Grid->outcomeDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->outcomeDate->getErrorMessage() ?></div>
<?php if (!$Grid->outcomeDate->ReadOnly && !$Grid->outcomeDate->Disabled && !isset($Grid->outcomeDate->EditAttrs["readonly"]) && !isset($Grid->outcomeDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_outcomeDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_outcomeDate" class="form-group ivf_outcome_outcomeDate">
<span<?= $Grid->outcomeDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->outcomeDate->getDisplayValue($Grid->outcomeDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_outcomeDate" id="x<?= $Grid->RowIndex ?>_outcomeDate" value="<?= HtmlEncode($Grid->outcomeDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_outcomeDate" id="o<?= $Grid->RowIndex ?>_outcomeDate" value="<?= HtmlEncode($Grid->outcomeDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->outcomeDay->Visible) { // outcomeDay ?>
        <td data-name="outcomeDay">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_outcomeDay" class="form-group ivf_outcome_outcomeDay">
<input type="<?= $Grid->outcomeDay->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_outcomeDay" name="x<?= $Grid->RowIndex ?>_outcomeDay" id="x<?= $Grid->RowIndex ?>_outcomeDay" placeholder="<?= HtmlEncode($Grid->outcomeDay->getPlaceHolder()) ?>" value="<?= $Grid->outcomeDay->EditValue ?>"<?= $Grid->outcomeDay->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->outcomeDay->getErrorMessage() ?></div>
<?php if (!$Grid->outcomeDay->ReadOnly && !$Grid->outcomeDay->Disabled && !isset($Grid->outcomeDay->EditAttrs["readonly"]) && !isset($Grid->outcomeDay->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_outcomeDay", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_outcomeDay" class="form-group ivf_outcome_outcomeDay">
<span<?= $Grid->outcomeDay->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->outcomeDay->getDisplayValue($Grid->outcomeDay->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" data-hidden="1" name="x<?= $Grid->RowIndex ?>_outcomeDay" id="x<?= $Grid->RowIndex ?>_outcomeDay" value="<?= HtmlEncode($Grid->outcomeDay->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" data-hidden="1" name="o<?= $Grid->RowIndex ?>_outcomeDay" id="o<?= $Grid->RowIndex ?>_outcomeDay" value="<?= HtmlEncode($Grid->outcomeDay->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->OPResult->Visible) { // OPResult ?>
        <td data-name="OPResult">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_OPResult" class="form-group ivf_outcome_OPResult">
<input type="<?= $Grid->OPResult->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_OPResult" name="x<?= $Grid->RowIndex ?>_OPResult" id="x<?= $Grid->RowIndex ?>_OPResult" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->OPResult->getPlaceHolder()) ?>" value="<?= $Grid->OPResult->EditValue ?>"<?= $Grid->OPResult->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OPResult->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_OPResult" class="form-group ivf_outcome_OPResult">
<span<?= $Grid->OPResult->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->OPResult->getDisplayValue($Grid->OPResult->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" data-hidden="1" name="x<?= $Grid->RowIndex ?>_OPResult" id="x<?= $Grid->RowIndex ?>_OPResult" value="<?= HtmlEncode($Grid->OPResult->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OPResult" id="o<?= $Grid->RowIndex ?>_OPResult" value="<?= HtmlEncode($Grid->OPResult->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Gestation->Visible) { // Gestation ?>
        <td data-name="Gestation">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Gestation" class="form-group ivf_outcome_Gestation">
<template id="tp_x<?= $Grid->RowIndex ?>_Gestation">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Gestation" name="x<?= $Grid->RowIndex ?>_Gestation" id="x<?= $Grid->RowIndex ?>_Gestation"<?= $Grid->Gestation->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Gestation" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Gestation"
    name="x<?= $Grid->RowIndex ?>_Gestation"
    value="<?= HtmlEncode($Grid->Gestation->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Gestation"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Gestation"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Gestation->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Gestation"
    data-value-separator="<?= $Grid->Gestation->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Gestation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gestation->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Gestation" class="form-group ivf_outcome_Gestation">
<span<?= $Grid->Gestation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Gestation->getDisplayValue($Grid->Gestation->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Gestation" id="x<?= $Grid->RowIndex ?>_Gestation" value="<?= HtmlEncode($Grid->Gestation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gestation" id="o<?= $Grid->RowIndex ?>_Gestation" value="<?= HtmlEncode($Grid->Gestation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
        <td data-name="TransferdEmbryos">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_TransferdEmbryos" class="form-group ivf_outcome_TransferdEmbryos">
<input type="<?= $Grid->TransferdEmbryos->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x<?= $Grid->RowIndex ?>_TransferdEmbryos" id="x<?= $Grid->RowIndex ?>_TransferdEmbryos" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TransferdEmbryos->getPlaceHolder()) ?>" value="<?= $Grid->TransferdEmbryos->EditValue ?>"<?= $Grid->TransferdEmbryos->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TransferdEmbryos->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_TransferdEmbryos" class="form-group ivf_outcome_TransferdEmbryos">
<span<?= $Grid->TransferdEmbryos->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TransferdEmbryos->getDisplayValue($Grid->TransferdEmbryos->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TransferdEmbryos" id="x<?= $Grid->RowIndex ?>_TransferdEmbryos" value="<?= HtmlEncode($Grid->TransferdEmbryos->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TransferdEmbryos" id="o<?= $Grid->RowIndex ?>_TransferdEmbryos" value="<?= HtmlEncode($Grid->TransferdEmbryos->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->InitalOfSacs->Visible) { // InitalOfSacs ?>
        <td data-name="InitalOfSacs">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_InitalOfSacs" class="form-group ivf_outcome_InitalOfSacs">
<input type="<?= $Grid->InitalOfSacs->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x<?= $Grid->RowIndex ?>_InitalOfSacs" id="x<?= $Grid->RowIndex ?>_InitalOfSacs" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->InitalOfSacs->getPlaceHolder()) ?>" value="<?= $Grid->InitalOfSacs->EditValue ?>"<?= $Grid->InitalOfSacs->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->InitalOfSacs->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_InitalOfSacs" class="form-group ivf_outcome_InitalOfSacs">
<span<?= $Grid->InitalOfSacs->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->InitalOfSacs->getDisplayValue($Grid->InitalOfSacs->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" data-hidden="1" name="x<?= $Grid->RowIndex ?>_InitalOfSacs" id="x<?= $Grid->RowIndex ?>_InitalOfSacs" value="<?= HtmlEncode($Grid->InitalOfSacs->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" data-hidden="1" name="o<?= $Grid->RowIndex ?>_InitalOfSacs" id="o<?= $Grid->RowIndex ?>_InitalOfSacs" value="<?= HtmlEncode($Grid->InitalOfSacs->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ImplimentationRate->Visible) { // ImplimentationRate ?>
        <td data-name="ImplimentationRate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_ImplimentationRate" class="form-group ivf_outcome_ImplimentationRate">
<input type="<?= $Grid->ImplimentationRate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x<?= $Grid->RowIndex ?>_ImplimentationRate" id="x<?= $Grid->RowIndex ?>_ImplimentationRate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ImplimentationRate->getPlaceHolder()) ?>" value="<?= $Grid->ImplimentationRate->EditValue ?>"<?= $Grid->ImplimentationRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ImplimentationRate->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_ImplimentationRate" class="form-group ivf_outcome_ImplimentationRate">
<span<?= $Grid->ImplimentationRate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ImplimentationRate->getDisplayValue($Grid->ImplimentationRate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ImplimentationRate" id="x<?= $Grid->RowIndex ?>_ImplimentationRate" value="<?= HtmlEncode($Grid->ImplimentationRate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ImplimentationRate" id="o<?= $Grid->RowIndex ?>_ImplimentationRate" value="<?= HtmlEncode($Grid->ImplimentationRate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EmbryoNo->Visible) { // EmbryoNo ?>
        <td data-name="EmbryoNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_EmbryoNo" class="form-group ivf_outcome_EmbryoNo">
<input type="<?= $Grid->EmbryoNo->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x<?= $Grid->RowIndex ?>_EmbryoNo" id="x<?= $Grid->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EmbryoNo->getPlaceHolder()) ?>" value="<?= $Grid->EmbryoNo->EditValue ?>"<?= $Grid->EmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EmbryoNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_EmbryoNo" class="form-group ivf_outcome_EmbryoNo">
<span<?= $Grid->EmbryoNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EmbryoNo->getDisplayValue($Grid->EmbryoNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EmbryoNo" id="x<?= $Grid->RowIndex ?>_EmbryoNo" value="<?= HtmlEncode($Grid->EmbryoNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EmbryoNo" id="o<?= $Grid->RowIndex ?>_EmbryoNo" value="<?= HtmlEncode($Grid->EmbryoNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
        <td data-name="ExtrauterineSac">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_ExtrauterineSac" class="form-group ivf_outcome_ExtrauterineSac">
<input type="<?= $Grid->ExtrauterineSac->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x<?= $Grid->RowIndex ?>_ExtrauterineSac" id="x<?= $Grid->RowIndex ?>_ExtrauterineSac" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ExtrauterineSac->getPlaceHolder()) ?>" value="<?= $Grid->ExtrauterineSac->EditValue ?>"<?= $Grid->ExtrauterineSac->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExtrauterineSac->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_ExtrauterineSac" class="form-group ivf_outcome_ExtrauterineSac">
<span<?= $Grid->ExtrauterineSac->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ExtrauterineSac->getDisplayValue($Grid->ExtrauterineSac->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ExtrauterineSac" id="x<?= $Grid->RowIndex ?>_ExtrauterineSac" value="<?= HtmlEncode($Grid->ExtrauterineSac->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ExtrauterineSac" id="o<?= $Grid->RowIndex ?>_ExtrauterineSac" value="<?= HtmlEncode($Grid->ExtrauterineSac->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
        <td data-name="PregnancyMonozygotic">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_PregnancyMonozygotic" class="form-group ivf_outcome_PregnancyMonozygotic">
<input type="<?= $Grid->PregnancyMonozygotic->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x<?= $Grid->RowIndex ?>_PregnancyMonozygotic" id="x<?= $Grid->RowIndex ?>_PregnancyMonozygotic" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PregnancyMonozygotic->getPlaceHolder()) ?>" value="<?= $Grid->PregnancyMonozygotic->EditValue ?>"<?= $Grid->PregnancyMonozygotic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PregnancyMonozygotic->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_PregnancyMonozygotic" class="form-group ivf_outcome_PregnancyMonozygotic">
<span<?= $Grid->PregnancyMonozygotic->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PregnancyMonozygotic->getDisplayValue($Grid->PregnancyMonozygotic->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PregnancyMonozygotic" id="x<?= $Grid->RowIndex ?>_PregnancyMonozygotic" value="<?= HtmlEncode($Grid->PregnancyMonozygotic->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PregnancyMonozygotic" id="o<?= $Grid->RowIndex ?>_PregnancyMonozygotic" value="<?= HtmlEncode($Grid->PregnancyMonozygotic->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TypeGestation->Visible) { // TypeGestation ?>
        <td data-name="TypeGestation">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_TypeGestation" class="form-group ivf_outcome_TypeGestation">
<input type="<?= $Grid->TypeGestation->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TypeGestation" name="x<?= $Grid->RowIndex ?>_TypeGestation" id="x<?= $Grid->RowIndex ?>_TypeGestation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TypeGestation->getPlaceHolder()) ?>" value="<?= $Grid->TypeGestation->EditValue ?>"<?= $Grid->TypeGestation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TypeGestation->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_TypeGestation" class="form-group ivf_outcome_TypeGestation">
<span<?= $Grid->TypeGestation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TypeGestation->getDisplayValue($Grid->TypeGestation->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TypeGestation" id="x<?= $Grid->RowIndex ?>_TypeGestation" value="<?= HtmlEncode($Grid->TypeGestation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TypeGestation" id="o<?= $Grid->RowIndex ?>_TypeGestation" value="<?= HtmlEncode($Grid->TypeGestation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Urine->Visible) { // Urine ?>
        <td data-name="Urine">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Urine" class="form-group ivf_outcome_Urine">
    <select
        id="x<?= $Grid->RowIndex ?>_Urine"
        name="x<?= $Grid->RowIndex ?>_Urine"
        class="form-control ew-select<?= $Grid->Urine->isInvalidClass() ?>"
        data-select2-id="ivf_outcome_x<?= $Grid->RowIndex ?>_Urine"
        data-table="ivf_outcome"
        data-field="x_Urine"
        data-value-separator="<?= $Grid->Urine->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Urine->getPlaceHolder()) ?>"
        <?= $Grid->Urine->editAttributes() ?>>
        <?= $Grid->Urine->selectOptionListHtml("x{$Grid->RowIndex}_Urine") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Urine->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_outcome_x<?= $Grid->RowIndex ?>_Urine']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Urine", selectId: "ivf_outcome_x<?= $Grid->RowIndex ?>_Urine", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_outcome.fields.Urine.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_outcome.fields.Urine.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Urine" class="form-group ivf_outcome_Urine">
<span<?= $Grid->Urine->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Urine->getDisplayValue($Grid->Urine->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Urine" id="x<?= $Grid->RowIndex ?>_Urine" value="<?= HtmlEncode($Grid->Urine->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Urine" id="o<?= $Grid->RowIndex ?>_Urine" value="<?= HtmlEncode($Grid->Urine->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PTdate->Visible) { // PTdate ?>
        <td data-name="PTdate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_PTdate" class="form-group ivf_outcome_PTdate">
<input type="<?= $Grid->PTdate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_PTdate" name="x<?= $Grid->RowIndex ?>_PTdate" id="x<?= $Grid->RowIndex ?>_PTdate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PTdate->getPlaceHolder()) ?>" value="<?= $Grid->PTdate->EditValue ?>"<?= $Grid->PTdate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PTdate->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_PTdate" class="form-group ivf_outcome_PTdate">
<span<?= $Grid->PTdate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PTdate->getDisplayValue($Grid->PTdate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PTdate" id="x<?= $Grid->RowIndex ?>_PTdate" value="<?= HtmlEncode($Grid->PTdate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PTdate" id="o<?= $Grid->RowIndex ?>_PTdate" value="<?= HtmlEncode($Grid->PTdate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Reduced->Visible) { // Reduced ?>
        <td data-name="Reduced">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Reduced" class="form-group ivf_outcome_Reduced">
<input type="<?= $Grid->Reduced->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Reduced" name="x<?= $Grid->RowIndex ?>_Reduced" id="x<?= $Grid->RowIndex ?>_Reduced" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Reduced->getPlaceHolder()) ?>" value="<?= $Grid->Reduced->EditValue ?>"<?= $Grid->Reduced->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reduced->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Reduced" class="form-group ivf_outcome_Reduced">
<span<?= $Grid->Reduced->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reduced->getDisplayValue($Grid->Reduced->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reduced" id="x<?= $Grid->RowIndex ?>_Reduced" value="<?= HtmlEncode($Grid->Reduced->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reduced" id="o<?= $Grid->RowIndex ?>_Reduced" value="<?= HtmlEncode($Grid->Reduced->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->INduced->Visible) { // INduced ?>
        <td data-name="INduced">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_INduced" class="form-group ivf_outcome_INduced">
<input type="<?= $Grid->INduced->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_INduced" name="x<?= $Grid->RowIndex ?>_INduced" id="x<?= $Grid->RowIndex ?>_INduced" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INduced->getPlaceHolder()) ?>" value="<?= $Grid->INduced->EditValue ?>"<?= $Grid->INduced->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INduced->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_INduced" class="form-group ivf_outcome_INduced">
<span<?= $Grid->INduced->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->INduced->getDisplayValue($Grid->INduced->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" data-hidden="1" name="x<?= $Grid->RowIndex ?>_INduced" id="x<?= $Grid->RowIndex ?>_INduced" value="<?= HtmlEncode($Grid->INduced->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" data-hidden="1" name="o<?= $Grid->RowIndex ?>_INduced" id="o<?= $Grid->RowIndex ?>_INduced" value="<?= HtmlEncode($Grid->INduced->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->INducedDate->Visible) { // INducedDate ?>
        <td data-name="INducedDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_INducedDate" class="form-group ivf_outcome_INducedDate">
<input type="<?= $Grid->INducedDate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_INducedDate" name="x<?= $Grid->RowIndex ?>_INducedDate" id="x<?= $Grid->RowIndex ?>_INducedDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INducedDate->getPlaceHolder()) ?>" value="<?= $Grid->INducedDate->EditValue ?>"<?= $Grid->INducedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INducedDate->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_INducedDate" class="form-group ivf_outcome_INducedDate">
<span<?= $Grid->INducedDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->INducedDate->getDisplayValue($Grid->INducedDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_INducedDate" id="x<?= $Grid->RowIndex ?>_INducedDate" value="<?= HtmlEncode($Grid->INducedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_INducedDate" id="o<?= $Grid->RowIndex ?>_INducedDate" value="<?= HtmlEncode($Grid->INducedDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Miscarriage->Visible) { // Miscarriage ?>
        <td data-name="Miscarriage">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Miscarriage" class="form-group ivf_outcome_Miscarriage">
<template id="tp_x<?= $Grid->RowIndex ?>_Miscarriage">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Miscarriage" name="x<?= $Grid->RowIndex ?>_Miscarriage" id="x<?= $Grid->RowIndex ?>_Miscarriage"<?= $Grid->Miscarriage->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Miscarriage" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Miscarriage"
    name="x<?= $Grid->RowIndex ?>_Miscarriage"
    value="<?= HtmlEncode($Grid->Miscarriage->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Miscarriage"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Miscarriage"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Miscarriage->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Miscarriage"
    data-value-separator="<?= $Grid->Miscarriage->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Miscarriage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Miscarriage->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Miscarriage" class="form-group ivf_outcome_Miscarriage">
<span<?= $Grid->Miscarriage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Miscarriage->getDisplayValue($Grid->Miscarriage->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Miscarriage" id="x<?= $Grid->RowIndex ?>_Miscarriage" value="<?= HtmlEncode($Grid->Miscarriage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Miscarriage" id="o<?= $Grid->RowIndex ?>_Miscarriage" value="<?= HtmlEncode($Grid->Miscarriage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Induced1->Visible) { // Induced1 ?>
        <td data-name="Induced1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Induced1" class="form-group ivf_outcome_Induced1">
<template id="tp_x<?= $Grid->RowIndex ?>_Induced1">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Induced1" name="x<?= $Grid->RowIndex ?>_Induced1" id="x<?= $Grid->RowIndex ?>_Induced1"<?= $Grid->Induced1->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Induced1" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Induced1"
    name="x<?= $Grid->RowIndex ?>_Induced1"
    value="<?= HtmlEncode($Grid->Induced1->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Induced1"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Induced1"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Induced1->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Induced1"
    data-value-separator="<?= $Grid->Induced1->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Induced1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Induced1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Induced1" class="form-group ivf_outcome_Induced1">
<span<?= $Grid->Induced1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Induced1->getDisplayValue($Grid->Induced1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Induced1" id="x<?= $Grid->RowIndex ?>_Induced1" value="<?= HtmlEncode($Grid->Induced1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Induced1" id="o<?= $Grid->RowIndex ?>_Induced1" value="<?= HtmlEncode($Grid->Induced1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Type->Visible) { // Type ?>
        <td data-name="Type">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Type" class="form-group ivf_outcome_Type">
<template id="tp_x<?= $Grid->RowIndex ?>_Type">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Type" name="x<?= $Grid->RowIndex ?>_Type" id="x<?= $Grid->RowIndex ?>_Type"<?= $Grid->Type->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Type" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Type"
    name="x<?= $Grid->RowIndex ?>_Type"
    value="<?= HtmlEncode($Grid->Type->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Type"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Type"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Type->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Type"
    data-value-separator="<?= $Grid->Type->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Type->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Type" class="form-group ivf_outcome_Type">
<span<?= $Grid->Type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Type->getDisplayValue($Grid->Type->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Type" id="x<?= $Grid->RowIndex ?>_Type" value="<?= HtmlEncode($Grid->Type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Type" id="o<?= $Grid->RowIndex ?>_Type" value="<?= HtmlEncode($Grid->Type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->IfClinical->Visible) { // IfClinical ?>
        <td data-name="IfClinical">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_IfClinical" class="form-group ivf_outcome_IfClinical">
<input type="<?= $Grid->IfClinical->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_IfClinical" name="x<?= $Grid->RowIndex ?>_IfClinical" id="x<?= $Grid->RowIndex ?>_IfClinical" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IfClinical->getPlaceHolder()) ?>" value="<?= $Grid->IfClinical->EditValue ?>"<?= $Grid->IfClinical->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IfClinical->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_IfClinical" class="form-group ivf_outcome_IfClinical">
<span<?= $Grid->IfClinical->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->IfClinical->getDisplayValue($Grid->IfClinical->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" data-hidden="1" name="x<?= $Grid->RowIndex ?>_IfClinical" id="x<?= $Grid->RowIndex ?>_IfClinical" value="<?= HtmlEncode($Grid->IfClinical->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IfClinical" id="o<?= $Grid->RowIndex ?>_IfClinical" value="<?= HtmlEncode($Grid->IfClinical->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GADate->Visible) { // GADate ?>
        <td data-name="GADate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_GADate" class="form-group ivf_outcome_GADate">
<input type="<?= $Grid->GADate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_GADate" name="x<?= $Grid->RowIndex ?>_GADate" id="x<?= $Grid->RowIndex ?>_GADate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GADate->getPlaceHolder()) ?>" value="<?= $Grid->GADate->EditValue ?>"<?= $Grid->GADate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GADate->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_GADate" class="form-group ivf_outcome_GADate">
<span<?= $Grid->GADate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GADate->getDisplayValue($Grid->GADate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GADate" id="x<?= $Grid->RowIndex ?>_GADate" value="<?= HtmlEncode($Grid->GADate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GADate" id="o<?= $Grid->RowIndex ?>_GADate" value="<?= HtmlEncode($Grid->GADate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GA->Visible) { // GA ?>
        <td data-name="GA">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_GA" class="form-group ivf_outcome_GA">
<input type="<?= $Grid->GA->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_GA" name="x<?= $Grid->RowIndex ?>_GA" id="x<?= $Grid->RowIndex ?>_GA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GA->getPlaceHolder()) ?>" value="<?= $Grid->GA->EditValue ?>"<?= $Grid->GA->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GA->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_GA" class="form-group ivf_outcome_GA">
<span<?= $Grid->GA->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GA->getDisplayValue($Grid->GA->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GA" id="x<?= $Grid->RowIndex ?>_GA" value="<?= HtmlEncode($Grid->GA->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GA" id="o<?= $Grid->RowIndex ?>_GA" value="<?= HtmlEncode($Grid->GA->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->FoetalDeath->Visible) { // FoetalDeath ?>
        <td data-name="FoetalDeath">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_FoetalDeath" class="form-group ivf_outcome_FoetalDeath">
    <select
        id="x<?= $Grid->RowIndex ?>_FoetalDeath"
        name="x<?= $Grid->RowIndex ?>_FoetalDeath"
        class="form-control ew-select<?= $Grid->FoetalDeath->isInvalidClass() ?>"
        data-select2-id="ivf_outcome_x<?= $Grid->RowIndex ?>_FoetalDeath"
        data-table="ivf_outcome"
        data-field="x_FoetalDeath"
        data-value-separator="<?= $Grid->FoetalDeath->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->FoetalDeath->getPlaceHolder()) ?>"
        <?= $Grid->FoetalDeath->editAttributes() ?>>
        <?= $Grid->FoetalDeath->selectOptionListHtml("x{$Grid->RowIndex}_FoetalDeath") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->FoetalDeath->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_outcome_x<?= $Grid->RowIndex ?>_FoetalDeath']"),
        options = { name: "x<?= $Grid->RowIndex ?>_FoetalDeath", selectId: "ivf_outcome_x<?= $Grid->RowIndex ?>_FoetalDeath", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_outcome.fields.FoetalDeath.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_outcome.fields.FoetalDeath.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_FoetalDeath" class="form-group ivf_outcome_FoetalDeath">
<span<?= $Grid->FoetalDeath->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->FoetalDeath->getDisplayValue($Grid->FoetalDeath->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" data-hidden="1" name="x<?= $Grid->RowIndex ?>_FoetalDeath" id="x<?= $Grid->RowIndex ?>_FoetalDeath" value="<?= HtmlEncode($Grid->FoetalDeath->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FoetalDeath" id="o<?= $Grid->RowIndex ?>_FoetalDeath" value="<?= HtmlEncode($Grid->FoetalDeath->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->FerinatalDeath->Visible) { // FerinatalDeath ?>
        <td data-name="FerinatalDeath">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_FerinatalDeath" class="form-group ivf_outcome_FerinatalDeath">
    <select
        id="x<?= $Grid->RowIndex ?>_FerinatalDeath"
        name="x<?= $Grid->RowIndex ?>_FerinatalDeath"
        class="form-control ew-select<?= $Grid->FerinatalDeath->isInvalidClass() ?>"
        data-select2-id="ivf_outcome_x<?= $Grid->RowIndex ?>_FerinatalDeath"
        data-table="ivf_outcome"
        data-field="x_FerinatalDeath"
        data-value-separator="<?= $Grid->FerinatalDeath->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->FerinatalDeath->getPlaceHolder()) ?>"
        <?= $Grid->FerinatalDeath->editAttributes() ?>>
        <?= $Grid->FerinatalDeath->selectOptionListHtml("x{$Grid->RowIndex}_FerinatalDeath") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->FerinatalDeath->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_outcome_x<?= $Grid->RowIndex ?>_FerinatalDeath']"),
        options = { name: "x<?= $Grid->RowIndex ?>_FerinatalDeath", selectId: "ivf_outcome_x<?= $Grid->RowIndex ?>_FerinatalDeath", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_outcome.fields.FerinatalDeath.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_outcome.fields.FerinatalDeath.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_FerinatalDeath" class="form-group ivf_outcome_FerinatalDeath">
<span<?= $Grid->FerinatalDeath->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->FerinatalDeath->getDisplayValue($Grid->FerinatalDeath->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" data-hidden="1" name="x<?= $Grid->RowIndex ?>_FerinatalDeath" id="x<?= $Grid->RowIndex ?>_FerinatalDeath" value="<?= HtmlEncode($Grid->FerinatalDeath->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FerinatalDeath" id="o<?= $Grid->RowIndex ?>_FerinatalDeath" value="<?= HtmlEncode($Grid->FerinatalDeath->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->TidNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_outcome_TidNo" class="form-group ivf_outcome_TidNo">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_TidNo" class="form-group ivf_outcome_TidNo">
<input type="<?= $Grid->TidNo->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Grid->TidNo->getPlaceHolder()) ?>" value="<?= $Grid->TidNo->EditValue ?>"<?= $Grid->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_TidNo" class="form-group ivf_outcome_TidNo">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TidNo" id="o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Ectopic->Visible) { // Ectopic ?>
        <td data-name="Ectopic">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Ectopic" class="form-group ivf_outcome_Ectopic">
<template id="tp_x<?= $Grid->RowIndex ?>_Ectopic">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Ectopic" name="x<?= $Grid->RowIndex ?>_Ectopic" id="x<?= $Grid->RowIndex ?>_Ectopic"<?= $Grid->Ectopic->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Ectopic" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Ectopic"
    name="x<?= $Grid->RowIndex ?>_Ectopic"
    value="<?= HtmlEncode($Grid->Ectopic->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Ectopic"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Ectopic"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Ectopic->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Ectopic"
    data-value-separator="<?= $Grid->Ectopic->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Ectopic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Ectopic->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Ectopic" class="form-group ivf_outcome_Ectopic">
<span<?= $Grid->Ectopic->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Ectopic->getDisplayValue($Grid->Ectopic->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Ectopic" id="x<?= $Grid->RowIndex ?>_Ectopic" value="<?= HtmlEncode($Grid->Ectopic->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Ectopic" id="o<?= $Grid->RowIndex ?>_Ectopic" value="<?= HtmlEncode($Grid->Ectopic->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Extra->Visible) { // Extra ?>
        <td data-name="Extra">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Extra" class="form-group ivf_outcome_Extra">
<template id="tp_x<?= $Grid->RowIndex ?>_Extra">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Extra" name="x<?= $Grid->RowIndex ?>_Extra" id="x<?= $Grid->RowIndex ?>_Extra"<?= $Grid->Extra->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Extra" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Extra"
    name="x<?= $Grid->RowIndex ?>_Extra"
    value="<?= HtmlEncode($Grid->Extra->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_Extra"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Extra"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Extra->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Extra"
    data-value-separator="<?= $Grid->Extra->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Extra->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Extra->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Extra" class="form-group ivf_outcome_Extra">
<span<?= $Grid->Extra->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Extra->getDisplayValue($Grid->Extra->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Extra" id="x<?= $Grid->RowIndex ?>_Extra" value="<?= HtmlEncode($Grid->Extra->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Extra" id="o<?= $Grid->RowIndex ?>_Extra" value="<?= HtmlEncode($Grid->Extra->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Implantation->Visible) { // Implantation ?>
        <td data-name="Implantation">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Implantation" class="form-group ivf_outcome_Implantation">
<input type="<?= $Grid->Implantation->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Implantation" name="x<?= $Grid->RowIndex ?>_Implantation" id="x<?= $Grid->RowIndex ?>_Implantation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Implantation->getPlaceHolder()) ?>" value="<?= $Grid->Implantation->EditValue ?>"<?= $Grid->Implantation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Implantation->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Implantation" class="form-group ivf_outcome_Implantation">
<span<?= $Grid->Implantation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Implantation->getDisplayValue($Grid->Implantation->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Implantation" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Implantation" id="x<?= $Grid->RowIndex ?>_Implantation" value="<?= HtmlEncode($Grid->Implantation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Implantation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Implantation" id="o<?= $Grid->RowIndex ?>_Implantation" value="<?= HtmlEncode($Grid->Implantation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DeliveryDate->Visible) { // DeliveryDate ?>
        <td data-name="DeliveryDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_DeliveryDate" class="form-group ivf_outcome_DeliveryDate">
<input type="<?= $Grid->DeliveryDate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_DeliveryDate" data-format="7" name="x<?= $Grid->RowIndex ?>_DeliveryDate" id="x<?= $Grid->RowIndex ?>_DeliveryDate" placeholder="<?= HtmlEncode($Grid->DeliveryDate->getPlaceHolder()) ?>" value="<?= $Grid->DeliveryDate->EditValue ?>"<?= $Grid->DeliveryDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeliveryDate->getErrorMessage() ?></div>
<?php if (!$Grid->DeliveryDate->ReadOnly && !$Grid->DeliveryDate->Disabled && !isset($Grid->DeliveryDate->EditAttrs["readonly"]) && !isset($Grid->DeliveryDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomegrid", "x<?= $Grid->RowIndex ?>_DeliveryDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_DeliveryDate" class="form-group ivf_outcome_DeliveryDate">
<span<?= $Grid->DeliveryDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DeliveryDate->getDisplayValue($Grid->DeliveryDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_DeliveryDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DeliveryDate" id="x<?= $Grid->RowIndex ?>_DeliveryDate" value="<?= HtmlEncode($Grid->DeliveryDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_DeliveryDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DeliveryDate" id="o<?= $Grid->RowIndex ?>_DeliveryDate" value="<?= HtmlEncode($Grid->DeliveryDate->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fivf_outcomegrid","load"], function() {
    fivf_outcomegrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Grid->CurrentMode == "add" || $Grid->CurrentMode == "copy") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
<?php if ($Grid->CurrentMode == "edit") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
<?php if ($Grid->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fivf_outcomegrid">
</div><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Grid->Recordset) {
    $Grid->Recordset->close();
}
?>
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $Grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Grid->TotalRecords == 0 && !$Grid->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$Grid->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("ivf_outcome");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php if (!$Grid->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_ivf_outcome",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
