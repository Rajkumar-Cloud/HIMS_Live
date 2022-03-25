<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("IvfTreatmentPlanGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_treatment_plangrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fivf_treatment_plangrid = new ew.Form("fivf_treatment_plangrid", "grid");
    fivf_treatment_plangrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_treatment_plan")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_treatment_plan)
        ew.vars.tables.ivf_treatment_plan = currentTable;
    fivf_treatment_plangrid.addFields([
        ["TreatmentStartDate", [fields.TreatmentStartDate.visible && fields.TreatmentStartDate.required ? ew.Validators.required(fields.TreatmentStartDate.caption) : null, ew.Validators.datetime(7)], fields.TreatmentStartDate.isInvalid],
        ["treatment_status", [fields.treatment_status.visible && fields.treatment_status.required ? ew.Validators.required(fields.treatment_status.caption) : null], fields.treatment_status.isInvalid],
        ["ARTCYCLE", [fields.ARTCYCLE.visible && fields.ARTCYCLE.required ? ew.Validators.required(fields.ARTCYCLE.caption) : null], fields.ARTCYCLE.isInvalid],
        ["IVFCycleNO", [fields.IVFCycleNO.visible && fields.IVFCycleNO.required ? ew.Validators.required(fields.IVFCycleNO.caption) : null], fields.IVFCycleNO.isInvalid],
        ["Treatment", [fields.Treatment.visible && fields.Treatment.required ? ew.Validators.required(fields.Treatment.caption) : null], fields.Treatment.isInvalid],
        ["TreatmentTec", [fields.TreatmentTec.visible && fields.TreatmentTec.required ? ew.Validators.required(fields.TreatmentTec.caption) : null], fields.TreatmentTec.isInvalid],
        ["TypeOfCycle", [fields.TypeOfCycle.visible && fields.TypeOfCycle.required ? ew.Validators.required(fields.TypeOfCycle.caption) : null], fields.TypeOfCycle.isInvalid],
        ["SpermOrgin", [fields.SpermOrgin.visible && fields.SpermOrgin.required ? ew.Validators.required(fields.SpermOrgin.caption) : null], fields.SpermOrgin.isInvalid],
        ["State", [fields.State.visible && fields.State.required ? ew.Validators.required(fields.State.caption) : null], fields.State.isInvalid],
        ["Origin", [fields.Origin.visible && fields.Origin.required ? ew.Validators.required(fields.Origin.caption) : null], fields.Origin.isInvalid],
        ["MACS", [fields.MACS.visible && fields.MACS.required ? ew.Validators.required(fields.MACS.caption) : null], fields.MACS.isInvalid],
        ["Technique", [fields.Technique.visible && fields.Technique.required ? ew.Validators.required(fields.Technique.caption) : null], fields.Technique.isInvalid],
        ["PgdPlanning", [fields.PgdPlanning.visible && fields.PgdPlanning.required ? ew.Validators.required(fields.PgdPlanning.caption) : null], fields.PgdPlanning.isInvalid],
        ["IMSI", [fields.IMSI.visible && fields.IMSI.required ? ew.Validators.required(fields.IMSI.caption) : null], fields.IMSI.isInvalid],
        ["SequentialCulture", [fields.SequentialCulture.visible && fields.SequentialCulture.required ? ew.Validators.required(fields.SequentialCulture.caption) : null], fields.SequentialCulture.isInvalid],
        ["TimeLapse", [fields.TimeLapse.visible && fields.TimeLapse.required ? ew.Validators.required(fields.TimeLapse.caption) : null], fields.TimeLapse.isInvalid],
        ["AH", [fields.AH.visible && fields.AH.required ? ew.Validators.required(fields.AH.caption) : null], fields.AH.isInvalid],
        ["Weight", [fields.Weight.visible && fields.Weight.required ? ew.Validators.required(fields.Weight.caption) : null], fields.Weight.isInvalid],
        ["BMI", [fields.BMI.visible && fields.BMI.required ? ew.Validators.required(fields.BMI.caption) : null], fields.BMI.isInvalid],
        ["MaleIndications", [fields.MaleIndications.visible && fields.MaleIndications.required ? ew.Validators.required(fields.MaleIndications.caption) : null], fields.MaleIndications.isInvalid],
        ["FemaleIndications", [fields.FemaleIndications.visible && fields.FemaleIndications.required ? ew.Validators.required(fields.FemaleIndications.caption) : null], fields.FemaleIndications.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_treatment_plangrid,
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
    fivf_treatment_plangrid.validate = function () {
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
    fivf_treatment_plangrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "TreatmentStartDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "treatment_status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ARTCYCLE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IVFCycleNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Treatment", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TreatmentTec", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TypeOfCycle", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SpermOrgin", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "State", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Origin", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MACS", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Technique", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PgdPlanning", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IMSI", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SequentialCulture", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TimeLapse", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AH", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Weight", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BMI", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MaleIndications", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "FemaleIndications", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fivf_treatment_plangrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_treatment_plangrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_treatment_plangrid.lists.treatment_status = <?= $Grid->treatment_status->toClientList($Grid) ?>;
    fivf_treatment_plangrid.lists.ARTCYCLE = <?= $Grid->ARTCYCLE->toClientList($Grid) ?>;
    fivf_treatment_plangrid.lists.Treatment = <?= $Grid->Treatment->toClientList($Grid) ?>;
    fivf_treatment_plangrid.lists.TypeOfCycle = <?= $Grid->TypeOfCycle->toClientList($Grid) ?>;
    fivf_treatment_plangrid.lists.SpermOrgin = <?= $Grid->SpermOrgin->toClientList($Grid) ?>;
    fivf_treatment_plangrid.lists.State = <?= $Grid->State->toClientList($Grid) ?>;
    fivf_treatment_plangrid.lists.Origin = <?= $Grid->Origin->toClientList($Grid) ?>;
    fivf_treatment_plangrid.lists.MACS = <?= $Grid->MACS->toClientList($Grid) ?>;
    fivf_treatment_plangrid.lists.PgdPlanning = <?= $Grid->PgdPlanning->toClientList($Grid) ?>;
    fivf_treatment_plangrid.lists.MaleIndications = <?= $Grid->MaleIndications->toClientList($Grid) ?>;
    fivf_treatment_plangrid.lists.FemaleIndications = <?= $Grid->FemaleIndications->toClientList($Grid) ?>;
    loadjs.done("fivf_treatment_plangrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_treatment_plan">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_treatment_plangrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_treatment_plan" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_treatment_plangrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <th data-name="TreatmentStartDate" class="<?= $Grid->TreatmentStartDate->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate"><?= $Grid->renderSort($Grid->TreatmentStartDate) ?></div></th>
<?php } ?>
<?php if ($Grid->treatment_status->Visible) { // treatment_status ?>
        <th data-name="treatment_status" class="<?= $Grid->treatment_status->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status"><?= $Grid->renderSort($Grid->treatment_status) ?></div></th>
<?php } ?>
<?php if ($Grid->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <th data-name="ARTCYCLE" class="<?= $Grid->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE"><?= $Grid->renderSort($Grid->ARTCYCLE) ?></div></th>
<?php } ?>
<?php if ($Grid->IVFCycleNO->Visible) { // IVFCycleNO ?>
        <th data-name="IVFCycleNO" class="<?= $Grid->IVFCycleNO->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO"><?= $Grid->renderSort($Grid->IVFCycleNO) ?></div></th>
<?php } ?>
<?php if ($Grid->Treatment->Visible) { // Treatment ?>
        <th data-name="Treatment" class="<?= $Grid->Treatment->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment"><?= $Grid->renderSort($Grid->Treatment) ?></div></th>
<?php } ?>
<?php if ($Grid->TreatmentTec->Visible) { // TreatmentTec ?>
        <th data-name="TreatmentTec" class="<?= $Grid->TreatmentTec->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec"><?= $Grid->renderSort($Grid->TreatmentTec) ?></div></th>
<?php } ?>
<?php if ($Grid->TypeOfCycle->Visible) { // TypeOfCycle ?>
        <th data-name="TypeOfCycle" class="<?= $Grid->TypeOfCycle->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle"><?= $Grid->renderSort($Grid->TypeOfCycle) ?></div></th>
<?php } ?>
<?php if ($Grid->SpermOrgin->Visible) { // SpermOrgin ?>
        <th data-name="SpermOrgin" class="<?= $Grid->SpermOrgin->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin"><?= $Grid->renderSort($Grid->SpermOrgin) ?></div></th>
<?php } ?>
<?php if ($Grid->State->Visible) { // State ?>
        <th data-name="State" class="<?= $Grid->State->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_State" class="ivf_treatment_plan_State"><?= $Grid->renderSort($Grid->State) ?></div></th>
<?php } ?>
<?php if ($Grid->Origin->Visible) { // Origin ?>
        <th data-name="Origin" class="<?= $Grid->Origin->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin"><?= $Grid->renderSort($Grid->Origin) ?></div></th>
<?php } ?>
<?php if ($Grid->MACS->Visible) { // MACS ?>
        <th data-name="MACS" class="<?= $Grid->MACS->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS"><?= $Grid->renderSort($Grid->MACS) ?></div></th>
<?php } ?>
<?php if ($Grid->Technique->Visible) { // Technique ?>
        <th data-name="Technique" class="<?= $Grid->Technique->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique"><?= $Grid->renderSort($Grid->Technique) ?></div></th>
<?php } ?>
<?php if ($Grid->PgdPlanning->Visible) { // PgdPlanning ?>
        <th data-name="PgdPlanning" class="<?= $Grid->PgdPlanning->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning"><?= $Grid->renderSort($Grid->PgdPlanning) ?></div></th>
<?php } ?>
<?php if ($Grid->IMSI->Visible) { // IMSI ?>
        <th data-name="IMSI" class="<?= $Grid->IMSI->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI"><?= $Grid->renderSort($Grid->IMSI) ?></div></th>
<?php } ?>
<?php if ($Grid->SequentialCulture->Visible) { // SequentialCulture ?>
        <th data-name="SequentialCulture" class="<?= $Grid->SequentialCulture->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture"><?= $Grid->renderSort($Grid->SequentialCulture) ?></div></th>
<?php } ?>
<?php if ($Grid->TimeLapse->Visible) { // TimeLapse ?>
        <th data-name="TimeLapse" class="<?= $Grid->TimeLapse->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse"><?= $Grid->renderSort($Grid->TimeLapse) ?></div></th>
<?php } ?>
<?php if ($Grid->AH->Visible) { // AH ?>
        <th data-name="AH" class="<?= $Grid->AH->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH"><?= $Grid->renderSort($Grid->AH) ?></div></th>
<?php } ?>
<?php if ($Grid->Weight->Visible) { // Weight ?>
        <th data-name="Weight" class="<?= $Grid->Weight->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight"><?= $Grid->renderSort($Grid->Weight) ?></div></th>
<?php } ?>
<?php if ($Grid->BMI->Visible) { // BMI ?>
        <th data-name="BMI" class="<?= $Grid->BMI->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI"><?= $Grid->renderSort($Grid->BMI) ?></div></th>
<?php } ?>
<?php if ($Grid->MaleIndications->Visible) { // MaleIndications ?>
        <th data-name="MaleIndications" class="<?= $Grid->MaleIndications->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications"><?= $Grid->renderSort($Grid->MaleIndications) ?></div></th>
<?php } ?>
<?php if ($Grid->FemaleIndications->Visible) { // FemaleIndications ?>
        <th data-name="FemaleIndications" class="<?= $Grid->FemaleIndications->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications"><?= $Grid->renderSort($Grid->FemaleIndications) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_ivf_treatment_plan", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <td data-name="TreatmentStartDate" <?= $Grid->TreatmentStartDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_TreatmentStartDate" class="form-group">
<input type="<?= $Grid->TreatmentStartDate->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-format="7" name="x<?= $Grid->RowIndex ?>_TreatmentStartDate" id="x<?= $Grid->RowIndex ?>_TreatmentStartDate" placeholder="<?= HtmlEncode($Grid->TreatmentStartDate->getPlaceHolder()) ?>" value="<?= $Grid->TreatmentStartDate->EditValue ?>"<?= $Grid->TreatmentStartDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TreatmentStartDate->getErrorMessage() ?></div>
<?php if (!$Grid->TreatmentStartDate->ReadOnly && !$Grid->TreatmentStartDate->Disabled && !isset($Grid->TreatmentStartDate->EditAttrs["readonly"]) && !isset($Grid->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_treatment_plangrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_treatment_plangrid", "x<?= $Grid->RowIndex ?>_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TreatmentStartDate" id="o<?= $Grid->RowIndex ?>_TreatmentStartDate" value="<?= HtmlEncode($Grid->TreatmentStartDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_TreatmentStartDate" class="form-group">
<input type="<?= $Grid->TreatmentStartDate->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-format="7" name="x<?= $Grid->RowIndex ?>_TreatmentStartDate" id="x<?= $Grid->RowIndex ?>_TreatmentStartDate" placeholder="<?= HtmlEncode($Grid->TreatmentStartDate->getPlaceHolder()) ?>" value="<?= $Grid->TreatmentStartDate->EditValue ?>"<?= $Grid->TreatmentStartDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TreatmentStartDate->getErrorMessage() ?></div>
<?php if (!$Grid->TreatmentStartDate->ReadOnly && !$Grid->TreatmentStartDate->Disabled && !isset($Grid->TreatmentStartDate->EditAttrs["readonly"]) && !isset($Grid->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_treatment_plangrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_treatment_plangrid", "x<?= $Grid->RowIndex ?>_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_TreatmentStartDate">
<span<?= $Grid->TreatmentStartDate->viewAttributes() ?>>
<?= $Grid->TreatmentStartDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_TreatmentStartDate" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_TreatmentStartDate" value="<?= HtmlEncode($Grid->TreatmentStartDate->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_TreatmentStartDate" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_TreatmentStartDate" value="<?= HtmlEncode($Grid->TreatmentStartDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->treatment_status->Visible) { // treatment_status ?>
        <td data-name="treatment_status" <?= $Grid->treatment_status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_treatment_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_treatment_status"
        name="x<?= $Grid->RowIndex ?>_treatment_status"
        class="form-control ew-select<?= $Grid->treatment_status->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_treatment_status"
        data-table="ivf_treatment_plan"
        data-field="x_treatment_status"
        data-value-separator="<?= $Grid->treatment_status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->treatment_status->getPlaceHolder()) ?>"
        <?= $Grid->treatment_status->editAttributes() ?>>
        <?= $Grid->treatment_status->selectOptionListHtml("x{$Grid->RowIndex}_treatment_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->treatment_status->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_treatment_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_treatment_status", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_treatment_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.treatment_status.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.treatment_status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_treatment_status" id="o<?= $Grid->RowIndex ?>_treatment_status" value="<?= HtmlEncode($Grid->treatment_status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_treatment_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_treatment_status"
        name="x<?= $Grid->RowIndex ?>_treatment_status"
        class="form-control ew-select<?= $Grid->treatment_status->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_treatment_status"
        data-table="ivf_treatment_plan"
        data-field="x_treatment_status"
        data-value-separator="<?= $Grid->treatment_status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->treatment_status->getPlaceHolder()) ?>"
        <?= $Grid->treatment_status->editAttributes() ?>>
        <?= $Grid->treatment_status->selectOptionListHtml("x{$Grid->RowIndex}_treatment_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->treatment_status->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_treatment_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_treatment_status", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_treatment_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.treatment_status.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.treatment_status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_treatment_status">
<span<?= $Grid->treatment_status->viewAttributes() ?>>
<?= $Grid->treatment_status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_treatment_status" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_treatment_status" value="<?= HtmlEncode($Grid->treatment_status->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_treatment_status" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_treatment_status" value="<?= HtmlEncode($Grid->treatment_status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td data-name="ARTCYCLE" <?= $Grid->ARTCYCLE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_ARTCYCLE" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_ARTCYCLE">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="x<?= $Grid->RowIndex ?>_ARTCYCLE" id="x<?= $Grid->RowIndex ?>_ARTCYCLE"<?= $Grid->ARTCYCLE->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_ARTCYCLE" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_ARTCYCLE"
    name="x<?= $Grid->RowIndex ?>_ARTCYCLE"
    value="<?= HtmlEncode($Grid->ARTCYCLE->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_ARTCYCLE"
    data-target="dsl_x<?= $Grid->RowIndex ?>_ARTCYCLE"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->ARTCYCLE->isInvalidClass() ?>"
    data-table="ivf_treatment_plan"
    data-field="x_ARTCYCLE"
    data-value-separator="<?= $Grid->ARTCYCLE->displayValueSeparatorAttribute() ?>"
    <?= $Grid->ARTCYCLE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ARTCYCLE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ARTCYCLE" id="o<?= $Grid->RowIndex ?>_ARTCYCLE" value="<?= HtmlEncode($Grid->ARTCYCLE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_ARTCYCLE" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_ARTCYCLE">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="x<?= $Grid->RowIndex ?>_ARTCYCLE" id="x<?= $Grid->RowIndex ?>_ARTCYCLE"<?= $Grid->ARTCYCLE->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_ARTCYCLE" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_ARTCYCLE"
    name="x<?= $Grid->RowIndex ?>_ARTCYCLE"
    value="<?= HtmlEncode($Grid->ARTCYCLE->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_ARTCYCLE"
    data-target="dsl_x<?= $Grid->RowIndex ?>_ARTCYCLE"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->ARTCYCLE->isInvalidClass() ?>"
    data-table="ivf_treatment_plan"
    data-field="x_ARTCYCLE"
    data-value-separator="<?= $Grid->ARTCYCLE->displayValueSeparatorAttribute() ?>"
    <?= $Grid->ARTCYCLE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ARTCYCLE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_ARTCYCLE">
<span<?= $Grid->ARTCYCLE->viewAttributes() ?>>
<?= $Grid->ARTCYCLE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_ARTCYCLE" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_ARTCYCLE" value="<?= HtmlEncode($Grid->ARTCYCLE->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_ARTCYCLE" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_ARTCYCLE" value="<?= HtmlEncode($Grid->ARTCYCLE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->IVFCycleNO->Visible) { // IVFCycleNO ?>
        <td data-name="IVFCycleNO" <?= $Grid->IVFCycleNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_IVFCycleNO" class="form-group">
<input type="<?= $Grid->IVFCycleNO->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x<?= $Grid->RowIndex ?>_IVFCycleNO" id="x<?= $Grid->RowIndex ?>_IVFCycleNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IVFCycleNO->getPlaceHolder()) ?>" value="<?= $Grid->IVFCycleNO->EditValue ?>"<?= $Grid->IVFCycleNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IVFCycleNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IVFCycleNO" id="o<?= $Grid->RowIndex ?>_IVFCycleNO" value="<?= HtmlEncode($Grid->IVFCycleNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_IVFCycleNO" class="form-group">
<input type="<?= $Grid->IVFCycleNO->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x<?= $Grid->RowIndex ?>_IVFCycleNO" id="x<?= $Grid->RowIndex ?>_IVFCycleNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IVFCycleNO->getPlaceHolder()) ?>" value="<?= $Grid->IVFCycleNO->EditValue ?>"<?= $Grid->IVFCycleNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IVFCycleNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_IVFCycleNO">
<span<?= $Grid->IVFCycleNO->viewAttributes() ?>>
<?= $Grid->IVFCycleNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_IVFCycleNO" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_IVFCycleNO" value="<?= HtmlEncode($Grid->IVFCycleNO->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_IVFCycleNO" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_IVFCycleNO" value="<?= HtmlEncode($Grid->IVFCycleNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Treatment->Visible) { // Treatment ?>
        <td data-name="Treatment" <?= $Grid->Treatment->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_Treatment" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Treatment"
        name="x<?= $Grid->RowIndex ?>_Treatment"
        class="form-control ew-select<?= $Grid->Treatment->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Treatment"
        data-table="ivf_treatment_plan"
        data-field="x_Treatment"
        data-value-separator="<?= $Grid->Treatment->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Treatment->getPlaceHolder()) ?>"
        <?= $Grid->Treatment->editAttributes() ?>>
        <?= $Grid->Treatment->selectOptionListHtml("x{$Grid->RowIndex}_Treatment") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Treatment->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Treatment']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Treatment", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Treatment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.Treatment.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.Treatment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Treatment" id="o<?= $Grid->RowIndex ?>_Treatment" value="<?= HtmlEncode($Grid->Treatment->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_Treatment" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Treatment"
        name="x<?= $Grid->RowIndex ?>_Treatment"
        class="form-control ew-select<?= $Grid->Treatment->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Treatment"
        data-table="ivf_treatment_plan"
        data-field="x_Treatment"
        data-value-separator="<?= $Grid->Treatment->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Treatment->getPlaceHolder()) ?>"
        <?= $Grid->Treatment->editAttributes() ?>>
        <?= $Grid->Treatment->selectOptionListHtml("x{$Grid->RowIndex}_Treatment") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Treatment->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Treatment']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Treatment", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Treatment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.Treatment.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.Treatment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_Treatment">
<span<?= $Grid->Treatment->viewAttributes() ?>>
<?= $Grid->Treatment->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_Treatment" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_Treatment" value="<?= HtmlEncode($Grid->Treatment->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_Treatment" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_Treatment" value="<?= HtmlEncode($Grid->Treatment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TreatmentTec->Visible) { // TreatmentTec ?>
        <td data-name="TreatmentTec" <?= $Grid->TreatmentTec->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_TreatmentTec" class="form-group">
<input type="<?= $Grid->TreatmentTec->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x<?= $Grid->RowIndex ?>_TreatmentTec" id="x<?= $Grid->RowIndex ?>_TreatmentTec" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TreatmentTec->getPlaceHolder()) ?>" value="<?= $Grid->TreatmentTec->EditValue ?>"<?= $Grid->TreatmentTec->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TreatmentTec->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TreatmentTec" id="o<?= $Grid->RowIndex ?>_TreatmentTec" value="<?= HtmlEncode($Grid->TreatmentTec->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_TreatmentTec" class="form-group">
<input type="<?= $Grid->TreatmentTec->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x<?= $Grid->RowIndex ?>_TreatmentTec" id="x<?= $Grid->RowIndex ?>_TreatmentTec" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TreatmentTec->getPlaceHolder()) ?>" value="<?= $Grid->TreatmentTec->EditValue ?>"<?= $Grid->TreatmentTec->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TreatmentTec->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_TreatmentTec">
<span<?= $Grid->TreatmentTec->viewAttributes() ?>>
<?= $Grid->TreatmentTec->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_TreatmentTec" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_TreatmentTec" value="<?= HtmlEncode($Grid->TreatmentTec->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_TreatmentTec" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_TreatmentTec" value="<?= HtmlEncode($Grid->TreatmentTec->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TypeOfCycle->Visible) { // TypeOfCycle ?>
        <td data-name="TypeOfCycle" <?= $Grid->TypeOfCycle->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_TypeOfCycle" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_TypeOfCycle">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="x<?= $Grid->RowIndex ?>_TypeOfCycle" id="x<?= $Grid->RowIndex ?>_TypeOfCycle"<?= $Grid->TypeOfCycle->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_TypeOfCycle" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_TypeOfCycle"
    name="x<?= $Grid->RowIndex ?>_TypeOfCycle"
    value="<?= HtmlEncode($Grid->TypeOfCycle->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_TypeOfCycle"
    data-target="dsl_x<?= $Grid->RowIndex ?>_TypeOfCycle"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->TypeOfCycle->isInvalidClass() ?>"
    data-table="ivf_treatment_plan"
    data-field="x_TypeOfCycle"
    data-value-separator="<?= $Grid->TypeOfCycle->displayValueSeparatorAttribute() ?>"
    <?= $Grid->TypeOfCycle->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TypeOfCycle->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TypeOfCycle" id="o<?= $Grid->RowIndex ?>_TypeOfCycle" value="<?= HtmlEncode($Grid->TypeOfCycle->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_TypeOfCycle" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_TypeOfCycle">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="x<?= $Grid->RowIndex ?>_TypeOfCycle" id="x<?= $Grid->RowIndex ?>_TypeOfCycle"<?= $Grid->TypeOfCycle->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_TypeOfCycle" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_TypeOfCycle"
    name="x<?= $Grid->RowIndex ?>_TypeOfCycle"
    value="<?= HtmlEncode($Grid->TypeOfCycle->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_TypeOfCycle"
    data-target="dsl_x<?= $Grid->RowIndex ?>_TypeOfCycle"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->TypeOfCycle->isInvalidClass() ?>"
    data-table="ivf_treatment_plan"
    data-field="x_TypeOfCycle"
    data-value-separator="<?= $Grid->TypeOfCycle->displayValueSeparatorAttribute() ?>"
    <?= $Grid->TypeOfCycle->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TypeOfCycle->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_TypeOfCycle">
<span<?= $Grid->TypeOfCycle->viewAttributes() ?>>
<?= $Grid->TypeOfCycle->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_TypeOfCycle" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_TypeOfCycle" value="<?= HtmlEncode($Grid->TypeOfCycle->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_TypeOfCycle" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_TypeOfCycle" value="<?= HtmlEncode($Grid->TypeOfCycle->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SpermOrgin->Visible) { // SpermOrgin ?>
        <td data-name="SpermOrgin" <?= $Grid->SpermOrgin->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_SpermOrgin" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_SpermOrgin"
        name="x<?= $Grid->RowIndex ?>_SpermOrgin"
        class="form-control ew-select<?= $Grid->SpermOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_SpermOrgin"
        data-table="ivf_treatment_plan"
        data-field="x_SpermOrgin"
        data-value-separator="<?= $Grid->SpermOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->SpermOrgin->getPlaceHolder()) ?>"
        <?= $Grid->SpermOrgin->editAttributes() ?>>
        <?= $Grid->SpermOrgin->selectOptionListHtml("x{$Grid->RowIndex}_SpermOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->SpermOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_SpermOrgin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_SpermOrgin", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_SpermOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.SpermOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.SpermOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SpermOrgin" id="o<?= $Grid->RowIndex ?>_SpermOrgin" value="<?= HtmlEncode($Grid->SpermOrgin->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_SpermOrgin" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_SpermOrgin"
        name="x<?= $Grid->RowIndex ?>_SpermOrgin"
        class="form-control ew-select<?= $Grid->SpermOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_SpermOrgin"
        data-table="ivf_treatment_plan"
        data-field="x_SpermOrgin"
        data-value-separator="<?= $Grid->SpermOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->SpermOrgin->getPlaceHolder()) ?>"
        <?= $Grid->SpermOrgin->editAttributes() ?>>
        <?= $Grid->SpermOrgin->selectOptionListHtml("x{$Grid->RowIndex}_SpermOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->SpermOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_SpermOrgin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_SpermOrgin", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_SpermOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.SpermOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.SpermOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_SpermOrgin">
<span<?= $Grid->SpermOrgin->viewAttributes() ?>>
<?= $Grid->SpermOrgin->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_SpermOrgin" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_SpermOrgin" value="<?= HtmlEncode($Grid->SpermOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_SpermOrgin" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_SpermOrgin" value="<?= HtmlEncode($Grid->SpermOrgin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->State->Visible) { // State ?>
        <td data-name="State" <?= $Grid->State->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_State" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_State"
        name="x<?= $Grid->RowIndex ?>_State"
        class="form-control ew-select<?= $Grid->State->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_State"
        data-table="ivf_treatment_plan"
        data-field="x_State"
        data-value-separator="<?= $Grid->State->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->State->getPlaceHolder()) ?>"
        <?= $Grid->State->editAttributes() ?>>
        <?= $Grid->State->selectOptionListHtml("x{$Grid->RowIndex}_State") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->State->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_State']"),
        options = { name: "x<?= $Grid->RowIndex ?>_State", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_State", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.State.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.State.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" data-hidden="1" name="o<?= $Grid->RowIndex ?>_State" id="o<?= $Grid->RowIndex ?>_State" value="<?= HtmlEncode($Grid->State->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_State" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_State"
        name="x<?= $Grid->RowIndex ?>_State"
        class="form-control ew-select<?= $Grid->State->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_State"
        data-table="ivf_treatment_plan"
        data-field="x_State"
        data-value-separator="<?= $Grid->State->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->State->getPlaceHolder()) ?>"
        <?= $Grid->State->editAttributes() ?>>
        <?= $Grid->State->selectOptionListHtml("x{$Grid->RowIndex}_State") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->State->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_State']"),
        options = { name: "x<?= $Grid->RowIndex ?>_State", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_State", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.State.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.State.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_State">
<span<?= $Grid->State->viewAttributes() ?>>
<?= $Grid->State->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_State" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_State" value="<?= HtmlEncode($Grid->State->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_State" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_State" value="<?= HtmlEncode($Grid->State->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Origin->Visible) { // Origin ?>
        <td data-name="Origin" <?= $Grid->Origin->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_Origin" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Origin"
        name="x<?= $Grid->RowIndex ?>_Origin"
        class="form-control ew-select<?= $Grid->Origin->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Origin"
        data-table="ivf_treatment_plan"
        data-field="x_Origin"
        data-value-separator="<?= $Grid->Origin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Origin->getPlaceHolder()) ?>"
        <?= $Grid->Origin->editAttributes() ?>>
        <?= $Grid->Origin->selectOptionListHtml("x{$Grid->RowIndex}_Origin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Origin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Origin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Origin", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Origin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.Origin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.Origin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Origin" id="o<?= $Grid->RowIndex ?>_Origin" value="<?= HtmlEncode($Grid->Origin->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_Origin" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Origin"
        name="x<?= $Grid->RowIndex ?>_Origin"
        class="form-control ew-select<?= $Grid->Origin->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Origin"
        data-table="ivf_treatment_plan"
        data-field="x_Origin"
        data-value-separator="<?= $Grid->Origin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Origin->getPlaceHolder()) ?>"
        <?= $Grid->Origin->editAttributes() ?>>
        <?= $Grid->Origin->selectOptionListHtml("x{$Grid->RowIndex}_Origin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Origin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Origin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Origin", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Origin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.Origin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.Origin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_Origin">
<span<?= $Grid->Origin->viewAttributes() ?>>
<?= $Grid->Origin->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_Origin" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_Origin" value="<?= HtmlEncode($Grid->Origin->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_Origin" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_Origin" value="<?= HtmlEncode($Grid->Origin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MACS->Visible) { // MACS ?>
        <td data-name="MACS" <?= $Grid->MACS->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_MACS" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_MACS">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_MACS" name="x<?= $Grid->RowIndex ?>_MACS" id="x<?= $Grid->RowIndex ?>_MACS"<?= $Grid->MACS->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_MACS" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_MACS"
    name="x<?= $Grid->RowIndex ?>_MACS"
    value="<?= HtmlEncode($Grid->MACS->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_MACS"
    data-target="dsl_x<?= $Grid->RowIndex ?>_MACS"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->MACS->isInvalidClass() ?>"
    data-table="ivf_treatment_plan"
    data-field="x_MACS"
    data-value-separator="<?= $Grid->MACS->displayValueSeparatorAttribute() ?>"
    <?= $Grid->MACS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MACS->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MACS" id="o<?= $Grid->RowIndex ?>_MACS" value="<?= HtmlEncode($Grid->MACS->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_MACS" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_MACS">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_MACS" name="x<?= $Grid->RowIndex ?>_MACS" id="x<?= $Grid->RowIndex ?>_MACS"<?= $Grid->MACS->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_MACS" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_MACS"
    name="x<?= $Grid->RowIndex ?>_MACS"
    value="<?= HtmlEncode($Grid->MACS->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_MACS"
    data-target="dsl_x<?= $Grid->RowIndex ?>_MACS"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->MACS->isInvalidClass() ?>"
    data-table="ivf_treatment_plan"
    data-field="x_MACS"
    data-value-separator="<?= $Grid->MACS->displayValueSeparatorAttribute() ?>"
    <?= $Grid->MACS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MACS->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_MACS">
<span<?= $Grid->MACS->viewAttributes() ?>>
<?= $Grid->MACS->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_MACS" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_MACS" value="<?= HtmlEncode($Grid->MACS->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_MACS" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_MACS" value="<?= HtmlEncode($Grid->MACS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Technique->Visible) { // Technique ?>
        <td data-name="Technique" <?= $Grid->Technique->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_Technique" class="form-group">
<input type="<?= $Grid->Technique->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Technique" name="x<?= $Grid->RowIndex ?>_Technique" id="x<?= $Grid->RowIndex ?>_Technique" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Technique->getPlaceHolder()) ?>" value="<?= $Grid->Technique->EditValue ?>"<?= $Grid->Technique->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Technique->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Technique" id="o<?= $Grid->RowIndex ?>_Technique" value="<?= HtmlEncode($Grid->Technique->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_Technique" class="form-group">
<input type="<?= $Grid->Technique->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Technique" name="x<?= $Grid->RowIndex ?>_Technique" id="x<?= $Grid->RowIndex ?>_Technique" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Technique->getPlaceHolder()) ?>" value="<?= $Grid->Technique->EditValue ?>"<?= $Grid->Technique->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Technique->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_Technique">
<span<?= $Grid->Technique->viewAttributes() ?>>
<?= $Grid->Technique->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_Technique" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_Technique" value="<?= HtmlEncode($Grid->Technique->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_Technique" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_Technique" value="<?= HtmlEncode($Grid->Technique->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PgdPlanning->Visible) { // PgdPlanning ?>
        <td data-name="PgdPlanning" <?= $Grid->PgdPlanning->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_PgdPlanning" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_PgdPlanning">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="x<?= $Grid->RowIndex ?>_PgdPlanning" id="x<?= $Grid->RowIndex ?>_PgdPlanning"<?= $Grid->PgdPlanning->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_PgdPlanning" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_PgdPlanning"
    name="x<?= $Grid->RowIndex ?>_PgdPlanning"
    value="<?= HtmlEncode($Grid->PgdPlanning->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_PgdPlanning"
    data-target="dsl_x<?= $Grid->RowIndex ?>_PgdPlanning"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->PgdPlanning->isInvalidClass() ?>"
    data-table="ivf_treatment_plan"
    data-field="x_PgdPlanning"
    data-value-separator="<?= $Grid->PgdPlanning->displayValueSeparatorAttribute() ?>"
    <?= $Grid->PgdPlanning->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PgdPlanning->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PgdPlanning" id="o<?= $Grid->RowIndex ?>_PgdPlanning" value="<?= HtmlEncode($Grid->PgdPlanning->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_PgdPlanning" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_PgdPlanning">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="x<?= $Grid->RowIndex ?>_PgdPlanning" id="x<?= $Grid->RowIndex ?>_PgdPlanning"<?= $Grid->PgdPlanning->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_PgdPlanning" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_PgdPlanning"
    name="x<?= $Grid->RowIndex ?>_PgdPlanning"
    value="<?= HtmlEncode($Grid->PgdPlanning->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_PgdPlanning"
    data-target="dsl_x<?= $Grid->RowIndex ?>_PgdPlanning"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->PgdPlanning->isInvalidClass() ?>"
    data-table="ivf_treatment_plan"
    data-field="x_PgdPlanning"
    data-value-separator="<?= $Grid->PgdPlanning->displayValueSeparatorAttribute() ?>"
    <?= $Grid->PgdPlanning->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PgdPlanning->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_PgdPlanning">
<span<?= $Grid->PgdPlanning->viewAttributes() ?>>
<?= $Grid->PgdPlanning->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_PgdPlanning" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_PgdPlanning" value="<?= HtmlEncode($Grid->PgdPlanning->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_PgdPlanning" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_PgdPlanning" value="<?= HtmlEncode($Grid->PgdPlanning->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->IMSI->Visible) { // IMSI ?>
        <td data-name="IMSI" <?= $Grid->IMSI->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_IMSI" class="form-group">
<input type="<?= $Grid->IMSI->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x<?= $Grid->RowIndex ?>_IMSI" id="x<?= $Grid->RowIndex ?>_IMSI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IMSI->getPlaceHolder()) ?>" value="<?= $Grid->IMSI->EditValue ?>"<?= $Grid->IMSI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IMSI->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IMSI" id="o<?= $Grid->RowIndex ?>_IMSI" value="<?= HtmlEncode($Grid->IMSI->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_IMSI" class="form-group">
<input type="<?= $Grid->IMSI->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x<?= $Grid->RowIndex ?>_IMSI" id="x<?= $Grid->RowIndex ?>_IMSI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IMSI->getPlaceHolder()) ?>" value="<?= $Grid->IMSI->EditValue ?>"<?= $Grid->IMSI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IMSI->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_IMSI">
<span<?= $Grid->IMSI->viewAttributes() ?>>
<?= $Grid->IMSI->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_IMSI" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_IMSI" value="<?= HtmlEncode($Grid->IMSI->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_IMSI" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_IMSI" value="<?= HtmlEncode($Grid->IMSI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SequentialCulture->Visible) { // SequentialCulture ?>
        <td data-name="SequentialCulture" <?= $Grid->SequentialCulture->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_SequentialCulture" class="form-group">
<input type="<?= $Grid->SequentialCulture->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x<?= $Grid->RowIndex ?>_SequentialCulture" id="x<?= $Grid->RowIndex ?>_SequentialCulture" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SequentialCulture->getPlaceHolder()) ?>" value="<?= $Grid->SequentialCulture->EditValue ?>"<?= $Grid->SequentialCulture->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SequentialCulture->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SequentialCulture" id="o<?= $Grid->RowIndex ?>_SequentialCulture" value="<?= HtmlEncode($Grid->SequentialCulture->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_SequentialCulture" class="form-group">
<input type="<?= $Grid->SequentialCulture->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x<?= $Grid->RowIndex ?>_SequentialCulture" id="x<?= $Grid->RowIndex ?>_SequentialCulture" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SequentialCulture->getPlaceHolder()) ?>" value="<?= $Grid->SequentialCulture->EditValue ?>"<?= $Grid->SequentialCulture->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SequentialCulture->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_SequentialCulture">
<span<?= $Grid->SequentialCulture->viewAttributes() ?>>
<?= $Grid->SequentialCulture->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_SequentialCulture" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_SequentialCulture" value="<?= HtmlEncode($Grid->SequentialCulture->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_SequentialCulture" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_SequentialCulture" value="<?= HtmlEncode($Grid->SequentialCulture->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TimeLapse->Visible) { // TimeLapse ?>
        <td data-name="TimeLapse" <?= $Grid->TimeLapse->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_TimeLapse" class="form-group">
<input type="<?= $Grid->TimeLapse->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x<?= $Grid->RowIndex ?>_TimeLapse" id="x<?= $Grid->RowIndex ?>_TimeLapse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TimeLapse->getPlaceHolder()) ?>" value="<?= $Grid->TimeLapse->EditValue ?>"<?= $Grid->TimeLapse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TimeLapse->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TimeLapse" id="o<?= $Grid->RowIndex ?>_TimeLapse" value="<?= HtmlEncode($Grid->TimeLapse->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_TimeLapse" class="form-group">
<input type="<?= $Grid->TimeLapse->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x<?= $Grid->RowIndex ?>_TimeLapse" id="x<?= $Grid->RowIndex ?>_TimeLapse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TimeLapse->getPlaceHolder()) ?>" value="<?= $Grid->TimeLapse->EditValue ?>"<?= $Grid->TimeLapse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TimeLapse->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_TimeLapse">
<span<?= $Grid->TimeLapse->viewAttributes() ?>>
<?= $Grid->TimeLapse->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_TimeLapse" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_TimeLapse" value="<?= HtmlEncode($Grid->TimeLapse->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_TimeLapse" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_TimeLapse" value="<?= HtmlEncode($Grid->TimeLapse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AH->Visible) { // AH ?>
        <td data-name="AH" <?= $Grid->AH->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_AH" class="form-group">
<input type="<?= $Grid->AH->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_AH" name="x<?= $Grid->RowIndex ?>_AH" id="x<?= $Grid->RowIndex ?>_AH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AH->getPlaceHolder()) ?>" value="<?= $Grid->AH->EditValue ?>"<?= $Grid->AH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AH->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AH" id="o<?= $Grid->RowIndex ?>_AH" value="<?= HtmlEncode($Grid->AH->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_AH" class="form-group">
<input type="<?= $Grid->AH->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_AH" name="x<?= $Grid->RowIndex ?>_AH" id="x<?= $Grid->RowIndex ?>_AH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AH->getPlaceHolder()) ?>" value="<?= $Grid->AH->EditValue ?>"<?= $Grid->AH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AH->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_AH">
<span<?= $Grid->AH->viewAttributes() ?>>
<?= $Grid->AH->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_AH" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_AH" value="<?= HtmlEncode($Grid->AH->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_AH" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_AH" value="<?= HtmlEncode($Grid->AH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Weight->Visible) { // Weight ?>
        <td data-name="Weight" <?= $Grid->Weight->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_Weight" class="form-group">
<input type="<?= $Grid->Weight->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Weight" name="x<?= $Grid->RowIndex ?>_Weight" id="x<?= $Grid->RowIndex ?>_Weight" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Weight->getPlaceHolder()) ?>" value="<?= $Grid->Weight->EditValue ?>"<?= $Grid->Weight->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Weight->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Weight" id="o<?= $Grid->RowIndex ?>_Weight" value="<?= HtmlEncode($Grid->Weight->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_Weight" class="form-group">
<input type="<?= $Grid->Weight->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Weight" name="x<?= $Grid->RowIndex ?>_Weight" id="x<?= $Grid->RowIndex ?>_Weight" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Weight->getPlaceHolder()) ?>" value="<?= $Grid->Weight->EditValue ?>"<?= $Grid->Weight->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Weight->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_Weight">
<span<?= $Grid->Weight->viewAttributes() ?>>
<?= $Grid->Weight->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_Weight" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_Weight" value="<?= HtmlEncode($Grid->Weight->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_Weight" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_Weight" value="<?= HtmlEncode($Grid->Weight->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BMI->Visible) { // BMI ?>
        <td data-name="BMI" <?= $Grid->BMI->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_BMI" class="form-group">
<input type="<?= $Grid->BMI->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_BMI" name="x<?= $Grid->RowIndex ?>_BMI" id="x<?= $Grid->RowIndex ?>_BMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BMI->getPlaceHolder()) ?>" value="<?= $Grid->BMI->EditValue ?>"<?= $Grid->BMI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BMI->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BMI" id="o<?= $Grid->RowIndex ?>_BMI" value="<?= HtmlEncode($Grid->BMI->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_BMI" class="form-group">
<input type="<?= $Grid->BMI->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_BMI" name="x<?= $Grid->RowIndex ?>_BMI" id="x<?= $Grid->RowIndex ?>_BMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BMI->getPlaceHolder()) ?>" value="<?= $Grid->BMI->EditValue ?>"<?= $Grid->BMI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BMI->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_BMI">
<span<?= $Grid->BMI->viewAttributes() ?>>
<?= $Grid->BMI->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_BMI" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_BMI" value="<?= HtmlEncode($Grid->BMI->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_BMI" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_BMI" value="<?= HtmlEncode($Grid->BMI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MaleIndications->Visible) { // MaleIndications ?>
        <td data-name="MaleIndications" <?= $Grid->MaleIndications->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_MaleIndications" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_MaleIndications"
        name="x<?= $Grid->RowIndex ?>_MaleIndications"
        class="form-control ew-select<?= $Grid->MaleIndications->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_MaleIndications"
        data-table="ivf_treatment_plan"
        data-field="x_MaleIndications"
        data-value-separator="<?= $Grid->MaleIndications->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->MaleIndications->getPlaceHolder()) ?>"
        <?= $Grid->MaleIndications->editAttributes() ?>>
        <?= $Grid->MaleIndications->selectOptionListHtml("x{$Grid->RowIndex}_MaleIndications") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->MaleIndications->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_MaleIndications']"),
        options = { name: "x<?= $Grid->RowIndex ?>_MaleIndications", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_MaleIndications", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.MaleIndications.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.MaleIndications.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MaleIndications" id="o<?= $Grid->RowIndex ?>_MaleIndications" value="<?= HtmlEncode($Grid->MaleIndications->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_MaleIndications" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_MaleIndications"
        name="x<?= $Grid->RowIndex ?>_MaleIndications"
        class="form-control ew-select<?= $Grid->MaleIndications->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_MaleIndications"
        data-table="ivf_treatment_plan"
        data-field="x_MaleIndications"
        data-value-separator="<?= $Grid->MaleIndications->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->MaleIndications->getPlaceHolder()) ?>"
        <?= $Grid->MaleIndications->editAttributes() ?>>
        <?= $Grid->MaleIndications->selectOptionListHtml("x{$Grid->RowIndex}_MaleIndications") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->MaleIndications->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_MaleIndications']"),
        options = { name: "x<?= $Grid->RowIndex ?>_MaleIndications", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_MaleIndications", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.MaleIndications.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.MaleIndications.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_MaleIndications">
<span<?= $Grid->MaleIndications->viewAttributes() ?>>
<?= $Grid->MaleIndications->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_MaleIndications" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_MaleIndications" value="<?= HtmlEncode($Grid->MaleIndications->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_MaleIndications" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_MaleIndications" value="<?= HtmlEncode($Grid->MaleIndications->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->FemaleIndications->Visible) { // FemaleIndications ?>
        <td data-name="FemaleIndications" <?= $Grid->FemaleIndications->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_FemaleIndications" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_FemaleIndications"
        name="x<?= $Grid->RowIndex ?>_FemaleIndications"
        class="form-control ew-select<?= $Grid->FemaleIndications->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_FemaleIndications"
        data-table="ivf_treatment_plan"
        data-field="x_FemaleIndications"
        data-value-separator="<?= $Grid->FemaleIndications->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->FemaleIndications->getPlaceHolder()) ?>"
        <?= $Grid->FemaleIndications->editAttributes() ?>>
        <?= $Grid->FemaleIndications->selectOptionListHtml("x{$Grid->RowIndex}_FemaleIndications") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->FemaleIndications->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_FemaleIndications']"),
        options = { name: "x<?= $Grid->RowIndex ?>_FemaleIndications", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_FemaleIndications", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.FemaleIndications.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.FemaleIndications.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FemaleIndications" id="o<?= $Grid->RowIndex ?>_FemaleIndications" value="<?= HtmlEncode($Grid->FemaleIndications->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_FemaleIndications" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_FemaleIndications"
        name="x<?= $Grid->RowIndex ?>_FemaleIndications"
        class="form-control ew-select<?= $Grid->FemaleIndications->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_FemaleIndications"
        data-table="ivf_treatment_plan"
        data-field="x_FemaleIndications"
        data-value-separator="<?= $Grid->FemaleIndications->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->FemaleIndications->getPlaceHolder()) ?>"
        <?= $Grid->FemaleIndications->editAttributes() ?>>
        <?= $Grid->FemaleIndications->selectOptionListHtml("x{$Grid->RowIndex}_FemaleIndications") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->FemaleIndications->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_FemaleIndications']"),
        options = { name: "x<?= $Grid->RowIndex ?>_FemaleIndications", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_FemaleIndications", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.FemaleIndications.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.FemaleIndications.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_treatment_plan_FemaleIndications">
<span<?= $Grid->FemaleIndications->viewAttributes() ?>>
<?= $Grid->FemaleIndications->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" data-hidden="1" name="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_FemaleIndications" id="fivf_treatment_plangrid$x<?= $Grid->RowIndex ?>_FemaleIndications" value="<?= HtmlEncode($Grid->FemaleIndications->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" data-hidden="1" name="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_FemaleIndications" id="fivf_treatment_plangrid$o<?= $Grid->RowIndex ?>_FemaleIndications" value="<?= HtmlEncode($Grid->FemaleIndications->OldValue) ?>">
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
loadjs.ready(["fivf_treatment_plangrid","load"], function () {
    fivf_treatment_plangrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_ivf_treatment_plan", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <td data-name="TreatmentStartDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_TreatmentStartDate" class="form-group ivf_treatment_plan_TreatmentStartDate">
<input type="<?= $Grid->TreatmentStartDate->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-format="7" name="x<?= $Grid->RowIndex ?>_TreatmentStartDate" id="x<?= $Grid->RowIndex ?>_TreatmentStartDate" placeholder="<?= HtmlEncode($Grid->TreatmentStartDate->getPlaceHolder()) ?>" value="<?= $Grid->TreatmentStartDate->EditValue ?>"<?= $Grid->TreatmentStartDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TreatmentStartDate->getErrorMessage() ?></div>
<?php if (!$Grid->TreatmentStartDate->ReadOnly && !$Grid->TreatmentStartDate->Disabled && !isset($Grid->TreatmentStartDate->EditAttrs["readonly"]) && !isset($Grid->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_treatment_plangrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_treatment_plangrid", "x<?= $Grid->RowIndex ?>_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_TreatmentStartDate" class="form-group ivf_treatment_plan_TreatmentStartDate">
<span<?= $Grid->TreatmentStartDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TreatmentStartDate->getDisplayValue($Grid->TreatmentStartDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TreatmentStartDate" id="x<?= $Grid->RowIndex ?>_TreatmentStartDate" value="<?= HtmlEncode($Grid->TreatmentStartDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TreatmentStartDate" id="o<?= $Grid->RowIndex ?>_TreatmentStartDate" value="<?= HtmlEncode($Grid->TreatmentStartDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->treatment_status->Visible) { // treatment_status ?>
        <td data-name="treatment_status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_treatment_status" class="form-group ivf_treatment_plan_treatment_status">
    <select
        id="x<?= $Grid->RowIndex ?>_treatment_status"
        name="x<?= $Grid->RowIndex ?>_treatment_status"
        class="form-control ew-select<?= $Grid->treatment_status->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_treatment_status"
        data-table="ivf_treatment_plan"
        data-field="x_treatment_status"
        data-value-separator="<?= $Grid->treatment_status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->treatment_status->getPlaceHolder()) ?>"
        <?= $Grid->treatment_status->editAttributes() ?>>
        <?= $Grid->treatment_status->selectOptionListHtml("x{$Grid->RowIndex}_treatment_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->treatment_status->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_treatment_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_treatment_status", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_treatment_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.treatment_status.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.treatment_status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_treatment_status" class="form-group ivf_treatment_plan_treatment_status">
<span<?= $Grid->treatment_status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->treatment_status->getDisplayValue($Grid->treatment_status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_treatment_status" id="x<?= $Grid->RowIndex ?>_treatment_status" value="<?= HtmlEncode($Grid->treatment_status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_treatment_status" id="o<?= $Grid->RowIndex ?>_treatment_status" value="<?= HtmlEncode($Grid->treatment_status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td data-name="ARTCYCLE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_ARTCYCLE" class="form-group ivf_treatment_plan_ARTCYCLE">
<template id="tp_x<?= $Grid->RowIndex ?>_ARTCYCLE">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="x<?= $Grid->RowIndex ?>_ARTCYCLE" id="x<?= $Grid->RowIndex ?>_ARTCYCLE"<?= $Grid->ARTCYCLE->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_ARTCYCLE" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_ARTCYCLE"
    name="x<?= $Grid->RowIndex ?>_ARTCYCLE"
    value="<?= HtmlEncode($Grid->ARTCYCLE->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_ARTCYCLE"
    data-target="dsl_x<?= $Grid->RowIndex ?>_ARTCYCLE"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->ARTCYCLE->isInvalidClass() ?>"
    data-table="ivf_treatment_plan"
    data-field="x_ARTCYCLE"
    data-value-separator="<?= $Grid->ARTCYCLE->displayValueSeparatorAttribute() ?>"
    <?= $Grid->ARTCYCLE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ARTCYCLE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_ARTCYCLE" class="form-group ivf_treatment_plan_ARTCYCLE">
<span<?= $Grid->ARTCYCLE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ARTCYCLE->getDisplayValue($Grid->ARTCYCLE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ARTCYCLE" id="x<?= $Grid->RowIndex ?>_ARTCYCLE" value="<?= HtmlEncode($Grid->ARTCYCLE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ARTCYCLE" id="o<?= $Grid->RowIndex ?>_ARTCYCLE" value="<?= HtmlEncode($Grid->ARTCYCLE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->IVFCycleNO->Visible) { // IVFCycleNO ?>
        <td data-name="IVFCycleNO">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_IVFCycleNO" class="form-group ivf_treatment_plan_IVFCycleNO">
<input type="<?= $Grid->IVFCycleNO->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x<?= $Grid->RowIndex ?>_IVFCycleNO" id="x<?= $Grid->RowIndex ?>_IVFCycleNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IVFCycleNO->getPlaceHolder()) ?>" value="<?= $Grid->IVFCycleNO->EditValue ?>"<?= $Grid->IVFCycleNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IVFCycleNO->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_IVFCycleNO" class="form-group ivf_treatment_plan_IVFCycleNO">
<span<?= $Grid->IVFCycleNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->IVFCycleNO->getDisplayValue($Grid->IVFCycleNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_IVFCycleNO" id="x<?= $Grid->RowIndex ?>_IVFCycleNO" value="<?= HtmlEncode($Grid->IVFCycleNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IVFCycleNO" id="o<?= $Grid->RowIndex ?>_IVFCycleNO" value="<?= HtmlEncode($Grid->IVFCycleNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Treatment->Visible) { // Treatment ?>
        <td data-name="Treatment">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_Treatment" class="form-group ivf_treatment_plan_Treatment">
    <select
        id="x<?= $Grid->RowIndex ?>_Treatment"
        name="x<?= $Grid->RowIndex ?>_Treatment"
        class="form-control ew-select<?= $Grid->Treatment->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Treatment"
        data-table="ivf_treatment_plan"
        data-field="x_Treatment"
        data-value-separator="<?= $Grid->Treatment->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Treatment->getPlaceHolder()) ?>"
        <?= $Grid->Treatment->editAttributes() ?>>
        <?= $Grid->Treatment->selectOptionListHtml("x{$Grid->RowIndex}_Treatment") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Treatment->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Treatment']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Treatment", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Treatment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.Treatment.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.Treatment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_Treatment" class="form-group ivf_treatment_plan_Treatment">
<span<?= $Grid->Treatment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Treatment->getDisplayValue($Grid->Treatment->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Treatment" id="x<?= $Grid->RowIndex ?>_Treatment" value="<?= HtmlEncode($Grid->Treatment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Treatment" id="o<?= $Grid->RowIndex ?>_Treatment" value="<?= HtmlEncode($Grid->Treatment->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TreatmentTec->Visible) { // TreatmentTec ?>
        <td data-name="TreatmentTec">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_TreatmentTec" class="form-group ivf_treatment_plan_TreatmentTec">
<input type="<?= $Grid->TreatmentTec->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x<?= $Grid->RowIndex ?>_TreatmentTec" id="x<?= $Grid->RowIndex ?>_TreatmentTec" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TreatmentTec->getPlaceHolder()) ?>" value="<?= $Grid->TreatmentTec->EditValue ?>"<?= $Grid->TreatmentTec->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TreatmentTec->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_TreatmentTec" class="form-group ivf_treatment_plan_TreatmentTec">
<span<?= $Grid->TreatmentTec->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TreatmentTec->getDisplayValue($Grid->TreatmentTec->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TreatmentTec" id="x<?= $Grid->RowIndex ?>_TreatmentTec" value="<?= HtmlEncode($Grid->TreatmentTec->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TreatmentTec" id="o<?= $Grid->RowIndex ?>_TreatmentTec" value="<?= HtmlEncode($Grid->TreatmentTec->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TypeOfCycle->Visible) { // TypeOfCycle ?>
        <td data-name="TypeOfCycle">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_TypeOfCycle" class="form-group ivf_treatment_plan_TypeOfCycle">
<template id="tp_x<?= $Grid->RowIndex ?>_TypeOfCycle">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="x<?= $Grid->RowIndex ?>_TypeOfCycle" id="x<?= $Grid->RowIndex ?>_TypeOfCycle"<?= $Grid->TypeOfCycle->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_TypeOfCycle" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_TypeOfCycle"
    name="x<?= $Grid->RowIndex ?>_TypeOfCycle"
    value="<?= HtmlEncode($Grid->TypeOfCycle->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_TypeOfCycle"
    data-target="dsl_x<?= $Grid->RowIndex ?>_TypeOfCycle"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->TypeOfCycle->isInvalidClass() ?>"
    data-table="ivf_treatment_plan"
    data-field="x_TypeOfCycle"
    data-value-separator="<?= $Grid->TypeOfCycle->displayValueSeparatorAttribute() ?>"
    <?= $Grid->TypeOfCycle->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TypeOfCycle->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_TypeOfCycle" class="form-group ivf_treatment_plan_TypeOfCycle">
<span<?= $Grid->TypeOfCycle->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TypeOfCycle->getDisplayValue($Grid->TypeOfCycle->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TypeOfCycle" id="x<?= $Grid->RowIndex ?>_TypeOfCycle" value="<?= HtmlEncode($Grid->TypeOfCycle->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TypeOfCycle" id="o<?= $Grid->RowIndex ?>_TypeOfCycle" value="<?= HtmlEncode($Grid->TypeOfCycle->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SpermOrgin->Visible) { // SpermOrgin ?>
        <td data-name="SpermOrgin">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_SpermOrgin" class="form-group ivf_treatment_plan_SpermOrgin">
    <select
        id="x<?= $Grid->RowIndex ?>_SpermOrgin"
        name="x<?= $Grid->RowIndex ?>_SpermOrgin"
        class="form-control ew-select<?= $Grid->SpermOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_SpermOrgin"
        data-table="ivf_treatment_plan"
        data-field="x_SpermOrgin"
        data-value-separator="<?= $Grid->SpermOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->SpermOrgin->getPlaceHolder()) ?>"
        <?= $Grid->SpermOrgin->editAttributes() ?>>
        <?= $Grid->SpermOrgin->selectOptionListHtml("x{$Grid->RowIndex}_SpermOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->SpermOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_SpermOrgin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_SpermOrgin", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_SpermOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.SpermOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.SpermOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_SpermOrgin" class="form-group ivf_treatment_plan_SpermOrgin">
<span<?= $Grid->SpermOrgin->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SpermOrgin->getDisplayValue($Grid->SpermOrgin->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SpermOrgin" id="x<?= $Grid->RowIndex ?>_SpermOrgin" value="<?= HtmlEncode($Grid->SpermOrgin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SpermOrgin" id="o<?= $Grid->RowIndex ?>_SpermOrgin" value="<?= HtmlEncode($Grid->SpermOrgin->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->State->Visible) { // State ?>
        <td data-name="State">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_State" class="form-group ivf_treatment_plan_State">
    <select
        id="x<?= $Grid->RowIndex ?>_State"
        name="x<?= $Grid->RowIndex ?>_State"
        class="form-control ew-select<?= $Grid->State->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_State"
        data-table="ivf_treatment_plan"
        data-field="x_State"
        data-value-separator="<?= $Grid->State->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->State->getPlaceHolder()) ?>"
        <?= $Grid->State->editAttributes() ?>>
        <?= $Grid->State->selectOptionListHtml("x{$Grid->RowIndex}_State") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->State->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_State']"),
        options = { name: "x<?= $Grid->RowIndex ?>_State", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_State", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.State.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.State.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_State" class="form-group ivf_treatment_plan_State">
<span<?= $Grid->State->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->State->getDisplayValue($Grid->State->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" data-hidden="1" name="x<?= $Grid->RowIndex ?>_State" id="x<?= $Grid->RowIndex ?>_State" value="<?= HtmlEncode($Grid->State->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" data-hidden="1" name="o<?= $Grid->RowIndex ?>_State" id="o<?= $Grid->RowIndex ?>_State" value="<?= HtmlEncode($Grid->State->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Origin->Visible) { // Origin ?>
        <td data-name="Origin">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_Origin" class="form-group ivf_treatment_plan_Origin">
    <select
        id="x<?= $Grid->RowIndex ?>_Origin"
        name="x<?= $Grid->RowIndex ?>_Origin"
        class="form-control ew-select<?= $Grid->Origin->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Origin"
        data-table="ivf_treatment_plan"
        data-field="x_Origin"
        data-value-separator="<?= $Grid->Origin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Origin->getPlaceHolder()) ?>"
        <?= $Grid->Origin->editAttributes() ?>>
        <?= $Grid->Origin->selectOptionListHtml("x{$Grid->RowIndex}_Origin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Origin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Origin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Origin", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_Origin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.Origin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.Origin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_Origin" class="form-group ivf_treatment_plan_Origin">
<span<?= $Grid->Origin->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Origin->getDisplayValue($Grid->Origin->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Origin" id="x<?= $Grid->RowIndex ?>_Origin" value="<?= HtmlEncode($Grid->Origin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Origin" id="o<?= $Grid->RowIndex ?>_Origin" value="<?= HtmlEncode($Grid->Origin->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MACS->Visible) { // MACS ?>
        <td data-name="MACS">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_MACS" class="form-group ivf_treatment_plan_MACS">
<template id="tp_x<?= $Grid->RowIndex ?>_MACS">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_MACS" name="x<?= $Grid->RowIndex ?>_MACS" id="x<?= $Grid->RowIndex ?>_MACS"<?= $Grid->MACS->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_MACS" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_MACS"
    name="x<?= $Grid->RowIndex ?>_MACS"
    value="<?= HtmlEncode($Grid->MACS->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_MACS"
    data-target="dsl_x<?= $Grid->RowIndex ?>_MACS"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->MACS->isInvalidClass() ?>"
    data-table="ivf_treatment_plan"
    data-field="x_MACS"
    data-value-separator="<?= $Grid->MACS->displayValueSeparatorAttribute() ?>"
    <?= $Grid->MACS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MACS->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_MACS" class="form-group ivf_treatment_plan_MACS">
<span<?= $Grid->MACS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MACS->getDisplayValue($Grid->MACS->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MACS" id="x<?= $Grid->RowIndex ?>_MACS" value="<?= HtmlEncode($Grid->MACS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MACS" id="o<?= $Grid->RowIndex ?>_MACS" value="<?= HtmlEncode($Grid->MACS->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Technique->Visible) { // Technique ?>
        <td data-name="Technique">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_Technique" class="form-group ivf_treatment_plan_Technique">
<input type="<?= $Grid->Technique->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Technique" name="x<?= $Grid->RowIndex ?>_Technique" id="x<?= $Grid->RowIndex ?>_Technique" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Technique->getPlaceHolder()) ?>" value="<?= $Grid->Technique->EditValue ?>"<?= $Grid->Technique->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Technique->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_Technique" class="form-group ivf_treatment_plan_Technique">
<span<?= $Grid->Technique->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Technique->getDisplayValue($Grid->Technique->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Technique" id="x<?= $Grid->RowIndex ?>_Technique" value="<?= HtmlEncode($Grid->Technique->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Technique" id="o<?= $Grid->RowIndex ?>_Technique" value="<?= HtmlEncode($Grid->Technique->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PgdPlanning->Visible) { // PgdPlanning ?>
        <td data-name="PgdPlanning">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_PgdPlanning" class="form-group ivf_treatment_plan_PgdPlanning">
<template id="tp_x<?= $Grid->RowIndex ?>_PgdPlanning">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="x<?= $Grid->RowIndex ?>_PgdPlanning" id="x<?= $Grid->RowIndex ?>_PgdPlanning"<?= $Grid->PgdPlanning->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_PgdPlanning" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_PgdPlanning"
    name="x<?= $Grid->RowIndex ?>_PgdPlanning"
    value="<?= HtmlEncode($Grid->PgdPlanning->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_PgdPlanning"
    data-target="dsl_x<?= $Grid->RowIndex ?>_PgdPlanning"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->PgdPlanning->isInvalidClass() ?>"
    data-table="ivf_treatment_plan"
    data-field="x_PgdPlanning"
    data-value-separator="<?= $Grid->PgdPlanning->displayValueSeparatorAttribute() ?>"
    <?= $Grid->PgdPlanning->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PgdPlanning->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_PgdPlanning" class="form-group ivf_treatment_plan_PgdPlanning">
<span<?= $Grid->PgdPlanning->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PgdPlanning->getDisplayValue($Grid->PgdPlanning->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PgdPlanning" id="x<?= $Grid->RowIndex ?>_PgdPlanning" value="<?= HtmlEncode($Grid->PgdPlanning->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PgdPlanning" id="o<?= $Grid->RowIndex ?>_PgdPlanning" value="<?= HtmlEncode($Grid->PgdPlanning->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->IMSI->Visible) { // IMSI ?>
        <td data-name="IMSI">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_IMSI" class="form-group ivf_treatment_plan_IMSI">
<input type="<?= $Grid->IMSI->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x<?= $Grid->RowIndex ?>_IMSI" id="x<?= $Grid->RowIndex ?>_IMSI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IMSI->getPlaceHolder()) ?>" value="<?= $Grid->IMSI->EditValue ?>"<?= $Grid->IMSI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IMSI->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_IMSI" class="form-group ivf_treatment_plan_IMSI">
<span<?= $Grid->IMSI->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->IMSI->getDisplayValue($Grid->IMSI->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" data-hidden="1" name="x<?= $Grid->RowIndex ?>_IMSI" id="x<?= $Grid->RowIndex ?>_IMSI" value="<?= HtmlEncode($Grid->IMSI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IMSI" id="o<?= $Grid->RowIndex ?>_IMSI" value="<?= HtmlEncode($Grid->IMSI->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SequentialCulture->Visible) { // SequentialCulture ?>
        <td data-name="SequentialCulture">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_SequentialCulture" class="form-group ivf_treatment_plan_SequentialCulture">
<input type="<?= $Grid->SequentialCulture->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x<?= $Grid->RowIndex ?>_SequentialCulture" id="x<?= $Grid->RowIndex ?>_SequentialCulture" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SequentialCulture->getPlaceHolder()) ?>" value="<?= $Grid->SequentialCulture->EditValue ?>"<?= $Grid->SequentialCulture->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SequentialCulture->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_SequentialCulture" class="form-group ivf_treatment_plan_SequentialCulture">
<span<?= $Grid->SequentialCulture->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SequentialCulture->getDisplayValue($Grid->SequentialCulture->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SequentialCulture" id="x<?= $Grid->RowIndex ?>_SequentialCulture" value="<?= HtmlEncode($Grid->SequentialCulture->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SequentialCulture" id="o<?= $Grid->RowIndex ?>_SequentialCulture" value="<?= HtmlEncode($Grid->SequentialCulture->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TimeLapse->Visible) { // TimeLapse ?>
        <td data-name="TimeLapse">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_TimeLapse" class="form-group ivf_treatment_plan_TimeLapse">
<input type="<?= $Grid->TimeLapse->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x<?= $Grid->RowIndex ?>_TimeLapse" id="x<?= $Grid->RowIndex ?>_TimeLapse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TimeLapse->getPlaceHolder()) ?>" value="<?= $Grid->TimeLapse->EditValue ?>"<?= $Grid->TimeLapse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TimeLapse->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_TimeLapse" class="form-group ivf_treatment_plan_TimeLapse">
<span<?= $Grid->TimeLapse->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TimeLapse->getDisplayValue($Grid->TimeLapse->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TimeLapse" id="x<?= $Grid->RowIndex ?>_TimeLapse" value="<?= HtmlEncode($Grid->TimeLapse->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TimeLapse" id="o<?= $Grid->RowIndex ?>_TimeLapse" value="<?= HtmlEncode($Grid->TimeLapse->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AH->Visible) { // AH ?>
        <td data-name="AH">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_AH" class="form-group ivf_treatment_plan_AH">
<input type="<?= $Grid->AH->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_AH" name="x<?= $Grid->RowIndex ?>_AH" id="x<?= $Grid->RowIndex ?>_AH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AH->getPlaceHolder()) ?>" value="<?= $Grid->AH->EditValue ?>"<?= $Grid->AH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AH->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_AH" class="form-group ivf_treatment_plan_AH">
<span<?= $Grid->AH->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AH->getDisplayValue($Grid->AH->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AH" id="x<?= $Grid->RowIndex ?>_AH" value="<?= HtmlEncode($Grid->AH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AH" id="o<?= $Grid->RowIndex ?>_AH" value="<?= HtmlEncode($Grid->AH->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Weight->Visible) { // Weight ?>
        <td data-name="Weight">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_Weight" class="form-group ivf_treatment_plan_Weight">
<input type="<?= $Grid->Weight->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Weight" name="x<?= $Grid->RowIndex ?>_Weight" id="x<?= $Grid->RowIndex ?>_Weight" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Weight->getPlaceHolder()) ?>" value="<?= $Grid->Weight->EditValue ?>"<?= $Grid->Weight->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Weight->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_Weight" class="form-group ivf_treatment_plan_Weight">
<span<?= $Grid->Weight->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Weight->getDisplayValue($Grid->Weight->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Weight" id="x<?= $Grid->RowIndex ?>_Weight" value="<?= HtmlEncode($Grid->Weight->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Weight" id="o<?= $Grid->RowIndex ?>_Weight" value="<?= HtmlEncode($Grid->Weight->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BMI->Visible) { // BMI ?>
        <td data-name="BMI">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_BMI" class="form-group ivf_treatment_plan_BMI">
<input type="<?= $Grid->BMI->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_BMI" name="x<?= $Grid->RowIndex ?>_BMI" id="x<?= $Grid->RowIndex ?>_BMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BMI->getPlaceHolder()) ?>" value="<?= $Grid->BMI->EditValue ?>"<?= $Grid->BMI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BMI->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_BMI" class="form-group ivf_treatment_plan_BMI">
<span<?= $Grid->BMI->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BMI->getDisplayValue($Grid->BMI->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BMI" id="x<?= $Grid->RowIndex ?>_BMI" value="<?= HtmlEncode($Grid->BMI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BMI" id="o<?= $Grid->RowIndex ?>_BMI" value="<?= HtmlEncode($Grid->BMI->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MaleIndications->Visible) { // MaleIndications ?>
        <td data-name="MaleIndications">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_MaleIndications" class="form-group ivf_treatment_plan_MaleIndications">
    <select
        id="x<?= $Grid->RowIndex ?>_MaleIndications"
        name="x<?= $Grid->RowIndex ?>_MaleIndications"
        class="form-control ew-select<?= $Grid->MaleIndications->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_MaleIndications"
        data-table="ivf_treatment_plan"
        data-field="x_MaleIndications"
        data-value-separator="<?= $Grid->MaleIndications->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->MaleIndications->getPlaceHolder()) ?>"
        <?= $Grid->MaleIndications->editAttributes() ?>>
        <?= $Grid->MaleIndications->selectOptionListHtml("x{$Grid->RowIndex}_MaleIndications") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->MaleIndications->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_MaleIndications']"),
        options = { name: "x<?= $Grid->RowIndex ?>_MaleIndications", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_MaleIndications", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.MaleIndications.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.MaleIndications.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_MaleIndications" class="form-group ivf_treatment_plan_MaleIndications">
<span<?= $Grid->MaleIndications->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MaleIndications->getDisplayValue($Grid->MaleIndications->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MaleIndications" id="x<?= $Grid->RowIndex ?>_MaleIndications" value="<?= HtmlEncode($Grid->MaleIndications->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MaleIndications" id="o<?= $Grid->RowIndex ?>_MaleIndications" value="<?= HtmlEncode($Grid->MaleIndications->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->FemaleIndications->Visible) { // FemaleIndications ?>
        <td data-name="FemaleIndications">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_FemaleIndications" class="form-group ivf_treatment_plan_FemaleIndications">
    <select
        id="x<?= $Grid->RowIndex ?>_FemaleIndications"
        name="x<?= $Grid->RowIndex ?>_FemaleIndications"
        class="form-control ew-select<?= $Grid->FemaleIndications->isInvalidClass() ?>"
        data-select2-id="ivf_treatment_plan_x<?= $Grid->RowIndex ?>_FemaleIndications"
        data-table="ivf_treatment_plan"
        data-field="x_FemaleIndications"
        data-value-separator="<?= $Grid->FemaleIndications->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->FemaleIndications->getPlaceHolder()) ?>"
        <?= $Grid->FemaleIndications->editAttributes() ?>>
        <?= $Grid->FemaleIndications->selectOptionListHtml("x{$Grid->RowIndex}_FemaleIndications") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->FemaleIndications->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_treatment_plan_x<?= $Grid->RowIndex ?>_FemaleIndications']"),
        options = { name: "x<?= $Grid->RowIndex ?>_FemaleIndications", selectId: "ivf_treatment_plan_x<?= $Grid->RowIndex ?>_FemaleIndications", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_treatment_plan.fields.FemaleIndications.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_treatment_plan.fields.FemaleIndications.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_FemaleIndications" class="form-group ivf_treatment_plan_FemaleIndications">
<span<?= $Grid->FemaleIndications->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->FemaleIndications->getDisplayValue($Grid->FemaleIndications->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" data-hidden="1" name="x<?= $Grid->RowIndex ?>_FemaleIndications" id="x<?= $Grid->RowIndex ?>_FemaleIndications" value="<?= HtmlEncode($Grid->FemaleIndications->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FemaleIndications" id="o<?= $Grid->RowIndex ?>_FemaleIndications" value="<?= HtmlEncode($Grid->FemaleIndications->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fivf_treatment_plangrid","load"], function() {
    fivf_treatment_plangrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fivf_treatment_plangrid">
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
    ew.addEventHandlers("ivf_treatment_plan");
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
        container: "gmp_ivf_treatment_plan",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
