<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("IvfOocytedenudationGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_oocytedenudationgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fivf_oocytedenudationgrid = new ew.Form("fivf_oocytedenudationgrid", "grid");
    fivf_oocytedenudationgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_oocytedenudation")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_oocytedenudation)
        ew.vars.tables.ivf_oocytedenudation = currentTable;
    fivf_oocytedenudationgrid.addFields([
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
        var f = fivf_oocytedenudationgrid,
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
    fivf_oocytedenudationgrid.validate = function () {
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
    fivf_oocytedenudationgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "RIDNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Name", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ResultDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Surgeon", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AsstSurgeon", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Anaesthetist", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AnaestheiaType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrimaryEmbryologist", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SecondaryEmbryologist", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NoOfFolliclesRight", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NoOfFolliclesLeft", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NoOfOocytes", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RecordOocyteDenudation", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DateOfDenudation", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DenudationDoneBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TidNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ExpFollicles", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SecondaryDenudationDoneBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "OocyteOrgin", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "patient1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "OocyteType[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MIOocytesDonate1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MIOocytesDonate2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SelfMI", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SelfMII", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "patient3", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "patient4", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "OocytesDonate3", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "OocytesDonate4", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MIOocytesDonate3", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MIOocytesDonate4", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SelfOocytesMI", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SelfOocytesMII", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "donor", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fivf_oocytedenudationgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_oocytedenudationgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_oocytedenudationgrid.lists.OocyteOrgin = <?= $Grid->OocyteOrgin->toClientList($Grid) ?>;
    fivf_oocytedenudationgrid.lists.patient1 = <?= $Grid->patient1->toClientList($Grid) ?>;
    fivf_oocytedenudationgrid.lists.OocyteType = <?= $Grid->OocyteType->toClientList($Grid) ?>;
    fivf_oocytedenudationgrid.lists.patient3 = <?= $Grid->patient3->toClientList($Grid) ?>;
    fivf_oocytedenudationgrid.lists.patient4 = <?= $Grid->patient4->toClientList($Grid) ?>;
    loadjs.done("fivf_oocytedenudationgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_oocytedenudation">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_oocytedenudationgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_oocytedenudation" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_oocytedenudationgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Grid->RIDNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo"><?= $Grid->renderSort($Grid->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Grid->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Grid->Name->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name"><?= $Grid->renderSort($Grid->Name) ?></div></th>
<?php } ?>
<?php if ($Grid->ResultDate->Visible) { // ResultDate ?>
        <th data-name="ResultDate" class="<?= $Grid->ResultDate->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate"><?= $Grid->renderSort($Grid->ResultDate) ?></div></th>
<?php } ?>
<?php if ($Grid->Surgeon->Visible) { // Surgeon ?>
        <th data-name="Surgeon" class="<?= $Grid->Surgeon->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon"><?= $Grid->renderSort($Grid->Surgeon) ?></div></th>
<?php } ?>
<?php if ($Grid->AsstSurgeon->Visible) { // AsstSurgeon ?>
        <th data-name="AsstSurgeon" class="<?= $Grid->AsstSurgeon->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon"><?= $Grid->renderSort($Grid->AsstSurgeon) ?></div></th>
<?php } ?>
<?php if ($Grid->Anaesthetist->Visible) { // Anaesthetist ?>
        <th data-name="Anaesthetist" class="<?= $Grid->Anaesthetist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist"><?= $Grid->renderSort($Grid->Anaesthetist) ?></div></th>
<?php } ?>
<?php if ($Grid->AnaestheiaType->Visible) { // AnaestheiaType ?>
        <th data-name="AnaestheiaType" class="<?= $Grid->AnaestheiaType->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType"><?= $Grid->renderSort($Grid->AnaestheiaType) ?></div></th>
<?php } ?>
<?php if ($Grid->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <th data-name="PrimaryEmbryologist" class="<?= $Grid->PrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist"><?= $Grid->renderSort($Grid->PrimaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Grid->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <th data-name="SecondaryEmbryologist" class="<?= $Grid->SecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist"><?= $Grid->renderSort($Grid->SecondaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Grid->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
        <th data-name="NoOfFolliclesRight" class="<?= $Grid->NoOfFolliclesRight->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight"><?= $Grid->renderSort($Grid->NoOfFolliclesRight) ?></div></th>
<?php } ?>
<?php if ($Grid->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
        <th data-name="NoOfFolliclesLeft" class="<?= $Grid->NoOfFolliclesLeft->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft"><?= $Grid->renderSort($Grid->NoOfFolliclesLeft) ?></div></th>
<?php } ?>
<?php if ($Grid->NoOfOocytes->Visible) { // NoOfOocytes ?>
        <th data-name="NoOfOocytes" class="<?= $Grid->NoOfOocytes->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes"><?= $Grid->renderSort($Grid->NoOfOocytes) ?></div></th>
<?php } ?>
<?php if ($Grid->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
        <th data-name="RecordOocyteDenudation" class="<?= $Grid->RecordOocyteDenudation->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation"><?= $Grid->renderSort($Grid->RecordOocyteDenudation) ?></div></th>
<?php } ?>
<?php if ($Grid->DateOfDenudation->Visible) { // DateOfDenudation ?>
        <th data-name="DateOfDenudation" class="<?= $Grid->DateOfDenudation->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation"><?= $Grid->renderSort($Grid->DateOfDenudation) ?></div></th>
<?php } ?>
<?php if ($Grid->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
        <th data-name="DenudationDoneBy" class="<?= $Grid->DenudationDoneBy->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy"><?= $Grid->renderSort($Grid->DenudationDoneBy) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
<?php } ?>
<?php if ($Grid->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Grid->createdby->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby"><?= $Grid->renderSort($Grid->createdby) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Grid->modifiedby->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby"><?= $Grid->renderSort($Grid->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Grid->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime"><?= $Grid->renderSort($Grid->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Grid->TidNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo"><?= $Grid->renderSort($Grid->TidNo) ?></div></th>
<?php } ?>
<?php if ($Grid->ExpFollicles->Visible) { // ExpFollicles ?>
        <th data-name="ExpFollicles" class="<?= $Grid->ExpFollicles->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles"><?= $Grid->renderSort($Grid->ExpFollicles) ?></div></th>
<?php } ?>
<?php if ($Grid->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
        <th data-name="SecondaryDenudationDoneBy" class="<?= $Grid->SecondaryDenudationDoneBy->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy"><?= $Grid->renderSort($Grid->SecondaryDenudationDoneBy) ?></div></th>
<?php } ?>
<?php if ($Grid->OocyteOrgin->Visible) { // OocyteOrgin ?>
        <th data-name="OocyteOrgin" class="<?= $Grid->OocyteOrgin->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin"><?= $Grid->renderSort($Grid->OocyteOrgin) ?></div></th>
<?php } ?>
<?php if ($Grid->patient1->Visible) { // patient1 ?>
        <th data-name="patient1" class="<?= $Grid->patient1->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1"><?= $Grid->renderSort($Grid->patient1) ?></div></th>
<?php } ?>
<?php if ($Grid->OocyteType->Visible) { // OocyteType ?>
        <th data-name="OocyteType" class="<?= $Grid->OocyteType->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType"><?= $Grid->renderSort($Grid->OocyteType) ?></div></th>
<?php } ?>
<?php if ($Grid->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
        <th data-name="MIOocytesDonate1" class="<?= $Grid->MIOocytesDonate1->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1"><?= $Grid->renderSort($Grid->MIOocytesDonate1) ?></div></th>
<?php } ?>
<?php if ($Grid->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
        <th data-name="MIOocytesDonate2" class="<?= $Grid->MIOocytesDonate2->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2"><?= $Grid->renderSort($Grid->MIOocytesDonate2) ?></div></th>
<?php } ?>
<?php if ($Grid->SelfMI->Visible) { // SelfMI ?>
        <th data-name="SelfMI" class="<?= $Grid->SelfMI->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI"><?= $Grid->renderSort($Grid->SelfMI) ?></div></th>
<?php } ?>
<?php if ($Grid->SelfMII->Visible) { // SelfMII ?>
        <th data-name="SelfMII" class="<?= $Grid->SelfMII->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII"><?= $Grid->renderSort($Grid->SelfMII) ?></div></th>
<?php } ?>
<?php if ($Grid->patient3->Visible) { // patient3 ?>
        <th data-name="patient3" class="<?= $Grid->patient3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3"><?= $Grid->renderSort($Grid->patient3) ?></div></th>
<?php } ?>
<?php if ($Grid->patient4->Visible) { // patient4 ?>
        <th data-name="patient4" class="<?= $Grid->patient4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4"><?= $Grid->renderSort($Grid->patient4) ?></div></th>
<?php } ?>
<?php if ($Grid->OocytesDonate3->Visible) { // OocytesDonate3 ?>
        <th data-name="OocytesDonate3" class="<?= $Grid->OocytesDonate3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3"><?= $Grid->renderSort($Grid->OocytesDonate3) ?></div></th>
<?php } ?>
<?php if ($Grid->OocytesDonate4->Visible) { // OocytesDonate4 ?>
        <th data-name="OocytesDonate4" class="<?= $Grid->OocytesDonate4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4"><?= $Grid->renderSort($Grid->OocytesDonate4) ?></div></th>
<?php } ?>
<?php if ($Grid->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
        <th data-name="MIOocytesDonate3" class="<?= $Grid->MIOocytesDonate3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3"><?= $Grid->renderSort($Grid->MIOocytesDonate3) ?></div></th>
<?php } ?>
<?php if ($Grid->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
        <th data-name="MIOocytesDonate4" class="<?= $Grid->MIOocytesDonate4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4"><?= $Grid->renderSort($Grid->MIOocytesDonate4) ?></div></th>
<?php } ?>
<?php if ($Grid->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
        <th data-name="SelfOocytesMI" class="<?= $Grid->SelfOocytesMI->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI"><?= $Grid->renderSort($Grid->SelfOocytesMI) ?></div></th>
<?php } ?>
<?php if ($Grid->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
        <th data-name="SelfOocytesMII" class="<?= $Grid->SelfOocytesMII->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII"><?= $Grid->renderSort($Grid->SelfOocytesMII) ?></div></th>
<?php } ?>
<?php if ($Grid->donor->Visible) { // donor ?>
        <th data-name="donor" class="<?= $Grid->donor->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_donor" class="ivf_oocytedenudation_donor"><?= $Grid->renderSort($Grid->donor) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_ivf_oocytedenudation", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_id" class="form-group"></span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_id" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_id" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Grid->RIDNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->RIDNo->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_RIDNo" class="form-group">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNo->getDisplayValue($Grid->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_RIDNo" class="form-group">
<input type="<?= $Grid->RIDNo->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" id="x<?= $Grid->RowIndex ?>_RIDNo" size="30" placeholder="<?= HtmlEncode($Grid->RIDNo->getPlaceHolder()) ?>" value="<?= $Grid->RIDNo->EditValue ?>"<?= $Grid->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RIDNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RIDNo" id="o<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->RIDNo->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_RIDNo" class="form-group">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNo->getDisplayValue($Grid->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_RIDNo" class="form-group">
<input type="<?= $Grid->RIDNo->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" id="x<?= $Grid->RowIndex ?>_RIDNo" size="30" placeholder="<?= HtmlEncode($Grid->RIDNo->getPlaceHolder()) ?>" value="<?= $Grid->RIDNo->EditValue ?>"<?= $Grid->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RIDNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_RIDNo">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<?= $Grid->RIDNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_RIDNo" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_RIDNo" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Grid->Name->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->Name->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_Name" class="form-group">
<span<?= $Grid->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Name->getDisplayValue($Grid->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Name" name="x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_Name" class="form-group">
<input type="<?= $Grid->Name->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Name" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Name->getPlaceHolder()) ?>" value="<?= $Grid->Name->EditValue ?>"<?= $Grid->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Name" id="o<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->Name->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_Name" class="form-group">
<span<?= $Grid->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Name->getDisplayValue($Grid->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Name" name="x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_Name" class="form-group">
<input type="<?= $Grid->Name->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Name" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Name->getPlaceHolder()) ?>" value="<?= $Grid->Name->EditValue ?>"<?= $Grid->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_Name">
<span<?= $Grid->Name->viewAttributes() ?>>
<?= $Grid->Name->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_Name" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_Name" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate" <?= $Grid->ResultDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_ResultDate" class="form-group">
<input type="<?= $Grid->ResultDate->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-format="11" name="x<?= $Grid->RowIndex ?>_ResultDate" id="x<?= $Grid->RowIndex ?>_ResultDate" placeholder="<?= HtmlEncode($Grid->ResultDate->getPlaceHolder()) ?>" value="<?= $Grid->ResultDate->EditValue ?>"<?= $Grid->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultDate->getErrorMessage() ?></div>
<?php if (!$Grid->ResultDate->ReadOnly && !$Grid->ResultDate->Disabled && !isset($Grid->ResultDate->EditAttrs["readonly"]) && !isset($Grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?= $Grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultDate" id="o<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_ResultDate" class="form-group">
<input type="<?= $Grid->ResultDate->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-format="11" name="x<?= $Grid->RowIndex ?>_ResultDate" id="x<?= $Grid->RowIndex ?>_ResultDate" placeholder="<?= HtmlEncode($Grid->ResultDate->getPlaceHolder()) ?>" value="<?= $Grid->ResultDate->EditValue ?>"<?= $Grid->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultDate->getErrorMessage() ?></div>
<?php if (!$Grid->ResultDate->ReadOnly && !$Grid->ResultDate->Disabled && !isset($Grid->ResultDate->EditAttrs["readonly"]) && !isset($Grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?= $Grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_ResultDate">
<span<?= $Grid->ResultDate->viewAttributes() ?>>
<?= $Grid->ResultDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_ResultDate" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_ResultDate" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Surgeon->Visible) { // Surgeon ?>
        <td data-name="Surgeon" <?= $Grid->Surgeon->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_Surgeon" class="form-group">
<input type="<?= $Grid->Surgeon->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x<?= $Grid->RowIndex ?>_Surgeon" id="x<?= $Grid->RowIndex ?>_Surgeon" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Surgeon->getPlaceHolder()) ?>" value="<?= $Grid->Surgeon->EditValue ?>"<?= $Grid->Surgeon->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Surgeon->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Surgeon" id="o<?= $Grid->RowIndex ?>_Surgeon" value="<?= HtmlEncode($Grid->Surgeon->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_Surgeon" class="form-group">
<input type="<?= $Grid->Surgeon->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x<?= $Grid->RowIndex ?>_Surgeon" id="x<?= $Grid->RowIndex ?>_Surgeon" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Surgeon->getPlaceHolder()) ?>" value="<?= $Grid->Surgeon->EditValue ?>"<?= $Grid->Surgeon->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Surgeon->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_Surgeon">
<span<?= $Grid->Surgeon->viewAttributes() ?>>
<?= $Grid->Surgeon->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_Surgeon" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_Surgeon" value="<?= HtmlEncode($Grid->Surgeon->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_Surgeon" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_Surgeon" value="<?= HtmlEncode($Grid->Surgeon->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AsstSurgeon->Visible) { // AsstSurgeon ?>
        <td data-name="AsstSurgeon" <?= $Grid->AsstSurgeon->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_AsstSurgeon" class="form-group">
<input type="<?= $Grid->AsstSurgeon->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x<?= $Grid->RowIndex ?>_AsstSurgeon" id="x<?= $Grid->RowIndex ?>_AsstSurgeon" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->AsstSurgeon->getPlaceHolder()) ?>" value="<?= $Grid->AsstSurgeon->EditValue ?>"<?= $Grid->AsstSurgeon->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AsstSurgeon->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AsstSurgeon" id="o<?= $Grid->RowIndex ?>_AsstSurgeon" value="<?= HtmlEncode($Grid->AsstSurgeon->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_AsstSurgeon" class="form-group">
<input type="<?= $Grid->AsstSurgeon->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x<?= $Grid->RowIndex ?>_AsstSurgeon" id="x<?= $Grid->RowIndex ?>_AsstSurgeon" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->AsstSurgeon->getPlaceHolder()) ?>" value="<?= $Grid->AsstSurgeon->EditValue ?>"<?= $Grid->AsstSurgeon->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AsstSurgeon->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_AsstSurgeon">
<span<?= $Grid->AsstSurgeon->viewAttributes() ?>>
<?= $Grid->AsstSurgeon->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_AsstSurgeon" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_AsstSurgeon" value="<?= HtmlEncode($Grid->AsstSurgeon->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_AsstSurgeon" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_AsstSurgeon" value="<?= HtmlEncode($Grid->AsstSurgeon->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Anaesthetist->Visible) { // Anaesthetist ?>
        <td data-name="Anaesthetist" <?= $Grid->Anaesthetist->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_Anaesthetist" class="form-group">
<input type="<?= $Grid->Anaesthetist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x<?= $Grid->RowIndex ?>_Anaesthetist" id="x<?= $Grid->RowIndex ?>_Anaesthetist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Anaesthetist->getPlaceHolder()) ?>" value="<?= $Grid->Anaesthetist->EditValue ?>"<?= $Grid->Anaesthetist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Anaesthetist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Anaesthetist" id="o<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= HtmlEncode($Grid->Anaesthetist->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_Anaesthetist" class="form-group">
<input type="<?= $Grid->Anaesthetist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x<?= $Grid->RowIndex ?>_Anaesthetist" id="x<?= $Grid->RowIndex ?>_Anaesthetist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Anaesthetist->getPlaceHolder()) ?>" value="<?= $Grid->Anaesthetist->EditValue ?>"<?= $Grid->Anaesthetist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Anaesthetist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_Anaesthetist">
<span<?= $Grid->Anaesthetist->viewAttributes() ?>>
<?= $Grid->Anaesthetist->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_Anaesthetist" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= HtmlEncode($Grid->Anaesthetist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_Anaesthetist" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= HtmlEncode($Grid->Anaesthetist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AnaestheiaType->Visible) { // AnaestheiaType ?>
        <td data-name="AnaestheiaType" <?= $Grid->AnaestheiaType->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_AnaestheiaType" class="form-group">
<input type="<?= $Grid->AnaestheiaType->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x<?= $Grid->RowIndex ?>_AnaestheiaType" id="x<?= $Grid->RowIndex ?>_AnaestheiaType" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->AnaestheiaType->getPlaceHolder()) ?>" value="<?= $Grid->AnaestheiaType->EditValue ?>"<?= $Grid->AnaestheiaType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnaestheiaType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnaestheiaType" id="o<?= $Grid->RowIndex ?>_AnaestheiaType" value="<?= HtmlEncode($Grid->AnaestheiaType->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_AnaestheiaType" class="form-group">
<input type="<?= $Grid->AnaestheiaType->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x<?= $Grid->RowIndex ?>_AnaestheiaType" id="x<?= $Grid->RowIndex ?>_AnaestheiaType" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->AnaestheiaType->getPlaceHolder()) ?>" value="<?= $Grid->AnaestheiaType->EditValue ?>"<?= $Grid->AnaestheiaType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnaestheiaType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_AnaestheiaType">
<span<?= $Grid->AnaestheiaType->viewAttributes() ?>>
<?= $Grid->AnaestheiaType->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_AnaestheiaType" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_AnaestheiaType" value="<?= HtmlEncode($Grid->AnaestheiaType->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_AnaestheiaType" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_AnaestheiaType" value="<?= HtmlEncode($Grid->AnaestheiaType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <td data-name="PrimaryEmbryologist" <?= $Grid->PrimaryEmbryologist->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_PrimaryEmbryologist" class="form-group">
<input type="<?= $Grid->PrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x<?= $Grid->RowIndex ?>_PrimaryEmbryologist" id="x<?= $Grid->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->PrimaryEmbryologist->EditValue ?>"<?= $Grid->PrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrimaryEmbryologist" id="o<?= $Grid->RowIndex ?>_PrimaryEmbryologist" value="<?= HtmlEncode($Grid->PrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_PrimaryEmbryologist" class="form-group">
<input type="<?= $Grid->PrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x<?= $Grid->RowIndex ?>_PrimaryEmbryologist" id="x<?= $Grid->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->PrimaryEmbryologist->EditValue ?>"<?= $Grid->PrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_PrimaryEmbryologist">
<span<?= $Grid->PrimaryEmbryologist->viewAttributes() ?>>
<?= $Grid->PrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_PrimaryEmbryologist" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_PrimaryEmbryologist" value="<?= HtmlEncode($Grid->PrimaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_PrimaryEmbryologist" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_PrimaryEmbryologist" value="<?= HtmlEncode($Grid->PrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <td data-name="SecondaryEmbryologist" <?= $Grid->SecondaryEmbryologist->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SecondaryEmbryologist" class="form-group">
<input type="<?= $Grid->SecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x<?= $Grid->RowIndex ?>_SecondaryEmbryologist" id="x<?= $Grid->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->SecondaryEmbryologist->EditValue ?>"<?= $Grid->SecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SecondaryEmbryologist" id="o<?= $Grid->RowIndex ?>_SecondaryEmbryologist" value="<?= HtmlEncode($Grid->SecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SecondaryEmbryologist" class="form-group">
<input type="<?= $Grid->SecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x<?= $Grid->RowIndex ?>_SecondaryEmbryologist" id="x<?= $Grid->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->SecondaryEmbryologist->EditValue ?>"<?= $Grid->SecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SecondaryEmbryologist">
<span<?= $Grid->SecondaryEmbryologist->viewAttributes() ?>>
<?= $Grid->SecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_SecondaryEmbryologist" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_SecondaryEmbryologist" value="<?= HtmlEncode($Grid->SecondaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_SecondaryEmbryologist" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_SecondaryEmbryologist" value="<?= HtmlEncode($Grid->SecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
        <td data-name="NoOfFolliclesRight" <?= $Grid->NoOfFolliclesRight->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesRight" class="form-group">
<input type="<?= $Grid->NoOfFolliclesRight->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x<?= $Grid->RowIndex ?>_NoOfFolliclesRight" id="x<?= $Grid->RowIndex ?>_NoOfFolliclesRight" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->NoOfFolliclesRight->getPlaceHolder()) ?>" value="<?= $Grid->NoOfFolliclesRight->EditValue ?>"<?= $Grid->NoOfFolliclesRight->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoOfFolliclesRight->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NoOfFolliclesRight" id="o<?= $Grid->RowIndex ?>_NoOfFolliclesRight" value="<?= HtmlEncode($Grid->NoOfFolliclesRight->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesRight" class="form-group">
<input type="<?= $Grid->NoOfFolliclesRight->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x<?= $Grid->RowIndex ?>_NoOfFolliclesRight" id="x<?= $Grid->RowIndex ?>_NoOfFolliclesRight" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->NoOfFolliclesRight->getPlaceHolder()) ?>" value="<?= $Grid->NoOfFolliclesRight->EditValue ?>"<?= $Grid->NoOfFolliclesRight->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoOfFolliclesRight->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesRight">
<span<?= $Grid->NoOfFolliclesRight->viewAttributes() ?>>
<?= $Grid->NoOfFolliclesRight->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_NoOfFolliclesRight" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_NoOfFolliclesRight" value="<?= HtmlEncode($Grid->NoOfFolliclesRight->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_NoOfFolliclesRight" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_NoOfFolliclesRight" value="<?= HtmlEncode($Grid->NoOfFolliclesRight->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
        <td data-name="NoOfFolliclesLeft" <?= $Grid->NoOfFolliclesLeft->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesLeft" class="form-group">
<input type="<?= $Grid->NoOfFolliclesLeft->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" id="x<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->NoOfFolliclesLeft->getPlaceHolder()) ?>" value="<?= $Grid->NoOfFolliclesLeft->EditValue ?>"<?= $Grid->NoOfFolliclesLeft->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoOfFolliclesLeft->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" id="o<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" value="<?= HtmlEncode($Grid->NoOfFolliclesLeft->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesLeft" class="form-group">
<input type="<?= $Grid->NoOfFolliclesLeft->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" id="x<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->NoOfFolliclesLeft->getPlaceHolder()) ?>" value="<?= $Grid->NoOfFolliclesLeft->EditValue ?>"<?= $Grid->NoOfFolliclesLeft->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoOfFolliclesLeft->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?= $Grid->NoOfFolliclesLeft->viewAttributes() ?>>
<?= $Grid->NoOfFolliclesLeft->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" value="<?= HtmlEncode($Grid->NoOfFolliclesLeft->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" value="<?= HtmlEncode($Grid->NoOfFolliclesLeft->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NoOfOocytes->Visible) { // NoOfOocytes ?>
        <td data-name="NoOfOocytes" <?= $Grid->NoOfOocytes->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_NoOfOocytes" class="form-group">
<input type="<?= $Grid->NoOfOocytes->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x<?= $Grid->RowIndex ?>_NoOfOocytes" id="x<?= $Grid->RowIndex ?>_NoOfOocytes" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->NoOfOocytes->getPlaceHolder()) ?>" value="<?= $Grid->NoOfOocytes->EditValue ?>"<?= $Grid->NoOfOocytes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoOfOocytes->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NoOfOocytes" id="o<?= $Grid->RowIndex ?>_NoOfOocytes" value="<?= HtmlEncode($Grid->NoOfOocytes->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_NoOfOocytes" class="form-group">
<input type="<?= $Grid->NoOfOocytes->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x<?= $Grid->RowIndex ?>_NoOfOocytes" id="x<?= $Grid->RowIndex ?>_NoOfOocytes" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->NoOfOocytes->getPlaceHolder()) ?>" value="<?= $Grid->NoOfOocytes->EditValue ?>"<?= $Grid->NoOfOocytes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoOfOocytes->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_NoOfOocytes">
<span<?= $Grid->NoOfOocytes->viewAttributes() ?>>
<?= $Grid->NoOfOocytes->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_NoOfOocytes" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_NoOfOocytes" value="<?= HtmlEncode($Grid->NoOfOocytes->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_NoOfOocytes" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_NoOfOocytes" value="<?= HtmlEncode($Grid->NoOfOocytes->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
        <td data-name="RecordOocyteDenudation" <?= $Grid->RecordOocyteDenudation->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_RecordOocyteDenudation" class="form-group">
<input type="<?= $Grid->RecordOocyteDenudation->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x<?= $Grid->RowIndex ?>_RecordOocyteDenudation" id="x<?= $Grid->RowIndex ?>_RecordOocyteDenudation" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->RecordOocyteDenudation->getPlaceHolder()) ?>" value="<?= $Grid->RecordOocyteDenudation->EditValue ?>"<?= $Grid->RecordOocyteDenudation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RecordOocyteDenudation->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RecordOocyteDenudation" id="o<?= $Grid->RowIndex ?>_RecordOocyteDenudation" value="<?= HtmlEncode($Grid->RecordOocyteDenudation->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_RecordOocyteDenudation" class="form-group">
<input type="<?= $Grid->RecordOocyteDenudation->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x<?= $Grid->RowIndex ?>_RecordOocyteDenudation" id="x<?= $Grid->RowIndex ?>_RecordOocyteDenudation" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->RecordOocyteDenudation->getPlaceHolder()) ?>" value="<?= $Grid->RecordOocyteDenudation->EditValue ?>"<?= $Grid->RecordOocyteDenudation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RecordOocyteDenudation->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_RecordOocyteDenudation">
<span<?= $Grid->RecordOocyteDenudation->viewAttributes() ?>>
<?= $Grid->RecordOocyteDenudation->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_RecordOocyteDenudation" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_RecordOocyteDenudation" value="<?= HtmlEncode($Grid->RecordOocyteDenudation->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_RecordOocyteDenudation" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_RecordOocyteDenudation" value="<?= HtmlEncode($Grid->RecordOocyteDenudation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DateOfDenudation->Visible) { // DateOfDenudation ?>
        <td data-name="DateOfDenudation" <?= $Grid->DateOfDenudation->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_DateOfDenudation" class="form-group">
<input type="<?= $Grid->DateOfDenudation->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-format="11" name="x<?= $Grid->RowIndex ?>_DateOfDenudation" id="x<?= $Grid->RowIndex ?>_DateOfDenudation" placeholder="<?= HtmlEncode($Grid->DateOfDenudation->getPlaceHolder()) ?>" value="<?= $Grid->DateOfDenudation->EditValue ?>"<?= $Grid->DateOfDenudation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DateOfDenudation->getErrorMessage() ?></div>
<?php if (!$Grid->DateOfDenudation->ReadOnly && !$Grid->DateOfDenudation->Disabled && !isset($Grid->DateOfDenudation->EditAttrs["readonly"]) && !isset($Grid->DateOfDenudation->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?= $Grid->RowIndex ?>_DateOfDenudation", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DateOfDenudation" id="o<?= $Grid->RowIndex ?>_DateOfDenudation" value="<?= HtmlEncode($Grid->DateOfDenudation->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_DateOfDenudation" class="form-group">
<input type="<?= $Grid->DateOfDenudation->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-format="11" name="x<?= $Grid->RowIndex ?>_DateOfDenudation" id="x<?= $Grid->RowIndex ?>_DateOfDenudation" placeholder="<?= HtmlEncode($Grid->DateOfDenudation->getPlaceHolder()) ?>" value="<?= $Grid->DateOfDenudation->EditValue ?>"<?= $Grid->DateOfDenudation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DateOfDenudation->getErrorMessage() ?></div>
<?php if (!$Grid->DateOfDenudation->ReadOnly && !$Grid->DateOfDenudation->Disabled && !isset($Grid->DateOfDenudation->EditAttrs["readonly"]) && !isset($Grid->DateOfDenudation->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?= $Grid->RowIndex ?>_DateOfDenudation", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_DateOfDenudation">
<span<?= $Grid->DateOfDenudation->viewAttributes() ?>>
<?= $Grid->DateOfDenudation->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_DateOfDenudation" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_DateOfDenudation" value="<?= HtmlEncode($Grid->DateOfDenudation->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_DateOfDenudation" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_DateOfDenudation" value="<?= HtmlEncode($Grid->DateOfDenudation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
        <td data-name="DenudationDoneBy" <?= $Grid->DenudationDoneBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_DenudationDoneBy" class="form-group">
<input type="<?= $Grid->DenudationDoneBy->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x<?= $Grid->RowIndex ?>_DenudationDoneBy" id="x<?= $Grid->RowIndex ?>_DenudationDoneBy" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->DenudationDoneBy->getPlaceHolder()) ?>" value="<?= $Grid->DenudationDoneBy->EditValue ?>"<?= $Grid->DenudationDoneBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DenudationDoneBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DenudationDoneBy" id="o<?= $Grid->RowIndex ?>_DenudationDoneBy" value="<?= HtmlEncode($Grid->DenudationDoneBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_DenudationDoneBy" class="form-group">
<input type="<?= $Grid->DenudationDoneBy->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x<?= $Grid->RowIndex ?>_DenudationDoneBy" id="x<?= $Grid->RowIndex ?>_DenudationDoneBy" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->DenudationDoneBy->getPlaceHolder()) ?>" value="<?= $Grid->DenudationDoneBy->EditValue ?>"<?= $Grid->DenudationDoneBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DenudationDoneBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_DenudationDoneBy">
<span<?= $Grid->DenudationDoneBy->viewAttributes() ?>>
<?= $Grid->DenudationDoneBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_DenudationDoneBy" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_DenudationDoneBy" value="<?= HtmlEncode($Grid->DenudationDoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_DenudationDoneBy" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_DenudationDoneBy" value="<?= HtmlEncode($Grid->DenudationDoneBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_status" class="form-group">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_status" class="form-group">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_status" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_status" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Grid->createdby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<?= $Grid->createdby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_createdby" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_createdby" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_createddatetime" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_createddatetime" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Grid->modifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<?= $Grid->modifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_modifiedby" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_modifiedby" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Grid->modifieddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<?= $Grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Grid->TidNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->TidNo->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_TidNo" class="form-group">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_TidNo" class="form-group">
<input type="<?= $Grid->TidNo->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Grid->TidNo->getPlaceHolder()) ?>" value="<?= $Grid->TidNo->EditValue ?>"<?= $Grid->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TidNo" id="o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->TidNo->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_TidNo" class="form-group">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_TidNo" class="form-group">
<input type="<?= $Grid->TidNo->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Grid->TidNo->getPlaceHolder()) ?>" value="<?= $Grid->TidNo->EditValue ?>"<?= $Grid->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_TidNo">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<?= $Grid->TidNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_TidNo" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_TidNo" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ExpFollicles->Visible) { // ExpFollicles ?>
        <td data-name="ExpFollicles" <?= $Grid->ExpFollicles->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_ExpFollicles" class="form-group">
<input type="<?= $Grid->ExpFollicles->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x<?= $Grid->RowIndex ?>_ExpFollicles" id="x<?= $Grid->RowIndex ?>_ExpFollicles" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ExpFollicles->getPlaceHolder()) ?>" value="<?= $Grid->ExpFollicles->EditValue ?>"<?= $Grid->ExpFollicles->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExpFollicles->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ExpFollicles" id="o<?= $Grid->RowIndex ?>_ExpFollicles" value="<?= HtmlEncode($Grid->ExpFollicles->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_ExpFollicles" class="form-group">
<input type="<?= $Grid->ExpFollicles->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x<?= $Grid->RowIndex ?>_ExpFollicles" id="x<?= $Grid->RowIndex ?>_ExpFollicles" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ExpFollicles->getPlaceHolder()) ?>" value="<?= $Grid->ExpFollicles->EditValue ?>"<?= $Grid->ExpFollicles->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExpFollicles->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_ExpFollicles">
<span<?= $Grid->ExpFollicles->viewAttributes() ?>>
<?= $Grid->ExpFollicles->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_ExpFollicles" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_ExpFollicles" value="<?= HtmlEncode($Grid->ExpFollicles->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_ExpFollicles" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_ExpFollicles" value="<?= HtmlEncode($Grid->ExpFollicles->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
        <td data-name="SecondaryDenudationDoneBy" <?= $Grid->SecondaryDenudationDoneBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="form-group">
<input type="<?= $Grid->SecondaryDenudationDoneBy->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" id="x<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SecondaryDenudationDoneBy->getPlaceHolder()) ?>" value="<?= $Grid->SecondaryDenudationDoneBy->EditValue ?>"<?= $Grid->SecondaryDenudationDoneBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SecondaryDenudationDoneBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" id="o<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?= HtmlEncode($Grid->SecondaryDenudationDoneBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="form-group">
<input type="<?= $Grid->SecondaryDenudationDoneBy->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" id="x<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SecondaryDenudationDoneBy->getPlaceHolder()) ?>" value="<?= $Grid->SecondaryDenudationDoneBy->EditValue ?>"<?= $Grid->SecondaryDenudationDoneBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SecondaryDenudationDoneBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?= $Grid->SecondaryDenudationDoneBy->viewAttributes() ?>>
<?= $Grid->SecondaryDenudationDoneBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?= HtmlEncode($Grid->SecondaryDenudationDoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?= HtmlEncode($Grid->SecondaryDenudationDoneBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->OocyteOrgin->Visible) { // OocyteOrgin ?>
        <td data-name="OocyteOrgin" <?= $Grid->OocyteOrgin->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_OocyteOrgin" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_OocyteOrgin"
        name="x<?= $Grid->RowIndex ?>_OocyteOrgin"
        class="form-control ew-select<?= $Grid->OocyteOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_oocytedenudation_x<?= $Grid->RowIndex ?>_OocyteOrgin"
        data-table="ivf_oocytedenudation"
        data-field="x_OocyteOrgin"
        data-value-separator="<?= $Grid->OocyteOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->OocyteOrgin->getPlaceHolder()) ?>"
        <?= $Grid->OocyteOrgin->editAttributes() ?>>
        <?= $Grid->OocyteOrgin->selectOptionListHtml("x{$Grid->RowIndex}_OocyteOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->OocyteOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_oocytedenudation_x<?= $Grid->RowIndex ?>_OocyteOrgin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_OocyteOrgin", selectId: "ivf_oocytedenudation_x<?= $Grid->RowIndex ?>_OocyteOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_oocytedenudation.fields.OocyteOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_oocytedenudation.fields.OocyteOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OocyteOrgin" id="o<?= $Grid->RowIndex ?>_OocyteOrgin" value="<?= HtmlEncode($Grid->OocyteOrgin->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_OocyteOrgin" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_OocyteOrgin"
        name="x<?= $Grid->RowIndex ?>_OocyteOrgin"
        class="form-control ew-select<?= $Grid->OocyteOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_oocytedenudation_x<?= $Grid->RowIndex ?>_OocyteOrgin"
        data-table="ivf_oocytedenudation"
        data-field="x_OocyteOrgin"
        data-value-separator="<?= $Grid->OocyteOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->OocyteOrgin->getPlaceHolder()) ?>"
        <?= $Grid->OocyteOrgin->editAttributes() ?>>
        <?= $Grid->OocyteOrgin->selectOptionListHtml("x{$Grid->RowIndex}_OocyteOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->OocyteOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_oocytedenudation_x<?= $Grid->RowIndex ?>_OocyteOrgin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_OocyteOrgin", selectId: "ivf_oocytedenudation_x<?= $Grid->RowIndex ?>_OocyteOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_oocytedenudation.fields.OocyteOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_oocytedenudation.fields.OocyteOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_OocyteOrgin">
<span<?= $Grid->OocyteOrgin->viewAttributes() ?>>
<?= $Grid->OocyteOrgin->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_OocyteOrgin" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_OocyteOrgin" value="<?= HtmlEncode($Grid->OocyteOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_OocyteOrgin" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_OocyteOrgin" value="<?= HtmlEncode($Grid->OocyteOrgin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->patient1->Visible) { // patient1 ?>
        <td data-name="patient1" <?= $Grid->patient1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_patient1" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_patient1"><?= EmptyValue(strval($Grid->patient1->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->patient1->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->patient1->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->patient1->ReadOnly || $Grid->patient1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_patient1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->patient1->getErrorMessage() ?></div>
<?= $Grid->patient1->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_patient1") ?>
<input type="hidden" is="selection-list" data-table="ivf_oocytedenudation" data-field="x_patient1" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->patient1->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_patient1" id="x<?= $Grid->RowIndex ?>_patient1" value="<?= $Grid->patient1->CurrentValue ?>"<?= $Grid->patient1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patient1" id="o<?= $Grid->RowIndex ?>_patient1" value="<?= HtmlEncode($Grid->patient1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_patient1" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_patient1"><?= EmptyValue(strval($Grid->patient1->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->patient1->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->patient1->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->patient1->ReadOnly || $Grid->patient1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_patient1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->patient1->getErrorMessage() ?></div>
<?= $Grid->patient1->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_patient1") ?>
<input type="hidden" is="selection-list" data-table="ivf_oocytedenudation" data-field="x_patient1" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->patient1->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_patient1" id="x<?= $Grid->RowIndex ?>_patient1" value="<?= $Grid->patient1->CurrentValue ?>"<?= $Grid->patient1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_patient1">
<span<?= $Grid->patient1->viewAttributes() ?>>
<?= $Grid->patient1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_patient1" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_patient1" value="<?= HtmlEncode($Grid->patient1->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_patient1" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_patient1" value="<?= HtmlEncode($Grid->patient1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->OocyteType->Visible) { // OocyteType ?>
        <td data-name="OocyteType" <?= $Grid->OocyteType->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_OocyteType" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_OocyteType">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="x<?= $Grid->RowIndex ?>_OocyteType" id="x<?= $Grid->RowIndex ?>_OocyteType"<?= $Grid->OocyteType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_OocyteType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_OocyteType[]"
    name="x<?= $Grid->RowIndex ?>_OocyteType[]"
    value="<?= HtmlEncode($Grid->OocyteType->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_OocyteType"
    data-target="dsl_x<?= $Grid->RowIndex ?>_OocyteType"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->OocyteType->isInvalidClass() ?>"
    data-table="ivf_oocytedenudation"
    data-field="x_OocyteType"
    data-value-separator="<?= $Grid->OocyteType->displayValueSeparatorAttribute() ?>"
    <?= $Grid->OocyteType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OocyteType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OocyteType[]" id="o<?= $Grid->RowIndex ?>_OocyteType[]" value="<?= HtmlEncode($Grid->OocyteType->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_OocyteType" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_OocyteType">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="x<?= $Grid->RowIndex ?>_OocyteType" id="x<?= $Grid->RowIndex ?>_OocyteType"<?= $Grid->OocyteType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_OocyteType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_OocyteType[]"
    name="x<?= $Grid->RowIndex ?>_OocyteType[]"
    value="<?= HtmlEncode($Grid->OocyteType->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_OocyteType"
    data-target="dsl_x<?= $Grid->RowIndex ?>_OocyteType"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->OocyteType->isInvalidClass() ?>"
    data-table="ivf_oocytedenudation"
    data-field="x_OocyteType"
    data-value-separator="<?= $Grid->OocyteType->displayValueSeparatorAttribute() ?>"
    <?= $Grid->OocyteType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OocyteType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_OocyteType">
<span<?= $Grid->OocyteType->viewAttributes() ?>>
<?= $Grid->OocyteType->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_OocyteType" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_OocyteType" value="<?= HtmlEncode($Grid->OocyteType->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_OocyteType[]" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_OocyteType[]" value="<?= HtmlEncode($Grid->OocyteType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
        <td data-name="MIOocytesDonate1" <?= $Grid->MIOocytesDonate1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate1" class="form-group">
<input type="<?= $Grid->MIOocytesDonate1->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate1" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MIOocytesDonate1->getPlaceHolder()) ?>" value="<?= $Grid->MIOocytesDonate1->EditValue ?>"<?= $Grid->MIOocytesDonate1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MIOocytesDonate1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MIOocytesDonate1" id="o<?= $Grid->RowIndex ?>_MIOocytesDonate1" value="<?= HtmlEncode($Grid->MIOocytesDonate1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate1" class="form-group">
<input type="<?= $Grid->MIOocytesDonate1->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate1" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MIOocytesDonate1->getPlaceHolder()) ?>" value="<?= $Grid->MIOocytesDonate1->EditValue ?>"<?= $Grid->MIOocytesDonate1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MIOocytesDonate1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate1">
<span<?= $Grid->MIOocytesDonate1->viewAttributes() ?>>
<?= $Grid->MIOocytesDonate1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_MIOocytesDonate1" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_MIOocytesDonate1" value="<?= HtmlEncode($Grid->MIOocytesDonate1->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_MIOocytesDonate1" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_MIOocytesDonate1" value="<?= HtmlEncode($Grid->MIOocytesDonate1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
        <td data-name="MIOocytesDonate2" <?= $Grid->MIOocytesDonate2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate2" class="form-group">
<input type="<?= $Grid->MIOocytesDonate2->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate2" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MIOocytesDonate2->getPlaceHolder()) ?>" value="<?= $Grid->MIOocytesDonate2->EditValue ?>"<?= $Grid->MIOocytesDonate2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MIOocytesDonate2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MIOocytesDonate2" id="o<?= $Grid->RowIndex ?>_MIOocytesDonate2" value="<?= HtmlEncode($Grid->MIOocytesDonate2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate2" class="form-group">
<input type="<?= $Grid->MIOocytesDonate2->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate2" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MIOocytesDonate2->getPlaceHolder()) ?>" value="<?= $Grid->MIOocytesDonate2->EditValue ?>"<?= $Grid->MIOocytesDonate2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MIOocytesDonate2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate2">
<span<?= $Grid->MIOocytesDonate2->viewAttributes() ?>>
<?= $Grid->MIOocytesDonate2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_MIOocytesDonate2" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_MIOocytesDonate2" value="<?= HtmlEncode($Grid->MIOocytesDonate2->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_MIOocytesDonate2" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_MIOocytesDonate2" value="<?= HtmlEncode($Grid->MIOocytesDonate2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SelfMI->Visible) { // SelfMI ?>
        <td data-name="SelfMI" <?= $Grid->SelfMI->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SelfMI" class="form-group">
<input type="<?= $Grid->SelfMI->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x<?= $Grid->RowIndex ?>_SelfMI" id="x<?= $Grid->RowIndex ?>_SelfMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SelfMI->getPlaceHolder()) ?>" value="<?= $Grid->SelfMI->EditValue ?>"<?= $Grid->SelfMI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SelfMI->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SelfMI" id="o<?= $Grid->RowIndex ?>_SelfMI" value="<?= HtmlEncode($Grid->SelfMI->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SelfMI" class="form-group">
<input type="<?= $Grid->SelfMI->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x<?= $Grid->RowIndex ?>_SelfMI" id="x<?= $Grid->RowIndex ?>_SelfMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SelfMI->getPlaceHolder()) ?>" value="<?= $Grid->SelfMI->EditValue ?>"<?= $Grid->SelfMI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SelfMI->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SelfMI">
<span<?= $Grid->SelfMI->viewAttributes() ?>>
<?= $Grid->SelfMI->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_SelfMI" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_SelfMI" value="<?= HtmlEncode($Grid->SelfMI->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_SelfMI" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_SelfMI" value="<?= HtmlEncode($Grid->SelfMI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SelfMII->Visible) { // SelfMII ?>
        <td data-name="SelfMII" <?= $Grid->SelfMII->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SelfMII" class="form-group">
<input type="<?= $Grid->SelfMII->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x<?= $Grid->RowIndex ?>_SelfMII" id="x<?= $Grid->RowIndex ?>_SelfMII" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SelfMII->getPlaceHolder()) ?>" value="<?= $Grid->SelfMII->EditValue ?>"<?= $Grid->SelfMII->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SelfMII->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SelfMII" id="o<?= $Grid->RowIndex ?>_SelfMII" value="<?= HtmlEncode($Grid->SelfMII->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SelfMII" class="form-group">
<input type="<?= $Grid->SelfMII->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x<?= $Grid->RowIndex ?>_SelfMII" id="x<?= $Grid->RowIndex ?>_SelfMII" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SelfMII->getPlaceHolder()) ?>" value="<?= $Grid->SelfMII->EditValue ?>"<?= $Grid->SelfMII->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SelfMII->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SelfMII">
<span<?= $Grid->SelfMII->viewAttributes() ?>>
<?= $Grid->SelfMII->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_SelfMII" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_SelfMII" value="<?= HtmlEncode($Grid->SelfMII->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_SelfMII" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_SelfMII" value="<?= HtmlEncode($Grid->SelfMII->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->patient3->Visible) { // patient3 ?>
        <td data-name="patient3" <?= $Grid->patient3->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_patient3" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_patient3"><?= EmptyValue(strval($Grid->patient3->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->patient3->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->patient3->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->patient3->ReadOnly || $Grid->patient3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_patient3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->patient3->getErrorMessage() ?></div>
<?= $Grid->patient3->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_patient3") ?>
<input type="hidden" is="selection-list" data-table="ivf_oocytedenudation" data-field="x_patient3" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->patient3->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_patient3" id="x<?= $Grid->RowIndex ?>_patient3" value="<?= $Grid->patient3->CurrentValue ?>"<?= $Grid->patient3->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patient3" id="o<?= $Grid->RowIndex ?>_patient3" value="<?= HtmlEncode($Grid->patient3->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_patient3" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_patient3"><?= EmptyValue(strval($Grid->patient3->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->patient3->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->patient3->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->patient3->ReadOnly || $Grid->patient3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_patient3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->patient3->getErrorMessage() ?></div>
<?= $Grid->patient3->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_patient3") ?>
<input type="hidden" is="selection-list" data-table="ivf_oocytedenudation" data-field="x_patient3" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->patient3->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_patient3" id="x<?= $Grid->RowIndex ?>_patient3" value="<?= $Grid->patient3->CurrentValue ?>"<?= $Grid->patient3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_patient3">
<span<?= $Grid->patient3->viewAttributes() ?>>
<?= $Grid->patient3->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_patient3" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_patient3" value="<?= HtmlEncode($Grid->patient3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_patient3" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_patient3" value="<?= HtmlEncode($Grid->patient3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->patient4->Visible) { // patient4 ?>
        <td data-name="patient4" <?= $Grid->patient4->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_patient4" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_patient4"><?= EmptyValue(strval($Grid->patient4->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->patient4->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->patient4->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->patient4->ReadOnly || $Grid->patient4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_patient4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->patient4->getErrorMessage() ?></div>
<?= $Grid->patient4->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_patient4") ?>
<input type="hidden" is="selection-list" data-table="ivf_oocytedenudation" data-field="x_patient4" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->patient4->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_patient4" id="x<?= $Grid->RowIndex ?>_patient4" value="<?= $Grid->patient4->CurrentValue ?>"<?= $Grid->patient4->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patient4" id="o<?= $Grid->RowIndex ?>_patient4" value="<?= HtmlEncode($Grid->patient4->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_patient4" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_patient4"><?= EmptyValue(strval($Grid->patient4->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->patient4->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->patient4->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->patient4->ReadOnly || $Grid->patient4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_patient4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->patient4->getErrorMessage() ?></div>
<?= $Grid->patient4->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_patient4") ?>
<input type="hidden" is="selection-list" data-table="ivf_oocytedenudation" data-field="x_patient4" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->patient4->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_patient4" id="x<?= $Grid->RowIndex ?>_patient4" value="<?= $Grid->patient4->CurrentValue ?>"<?= $Grid->patient4->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_patient4">
<span<?= $Grid->patient4->viewAttributes() ?>>
<?= $Grid->patient4->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_patient4" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_patient4" value="<?= HtmlEncode($Grid->patient4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_patient4" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_patient4" value="<?= HtmlEncode($Grid->patient4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->OocytesDonate3->Visible) { // OocytesDonate3 ?>
        <td data-name="OocytesDonate3" <?= $Grid->OocytesDonate3->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_OocytesDonate3" class="form-group">
<input type="<?= $Grid->OocytesDonate3->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x<?= $Grid->RowIndex ?>_OocytesDonate3" id="x<?= $Grid->RowIndex ?>_OocytesDonate3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OocytesDonate3->getPlaceHolder()) ?>" value="<?= $Grid->OocytesDonate3->EditValue ?>"<?= $Grid->OocytesDonate3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OocytesDonate3->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OocytesDonate3" id="o<?= $Grid->RowIndex ?>_OocytesDonate3" value="<?= HtmlEncode($Grid->OocytesDonate3->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_OocytesDonate3" class="form-group">
<input type="<?= $Grid->OocytesDonate3->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x<?= $Grid->RowIndex ?>_OocytesDonate3" id="x<?= $Grid->RowIndex ?>_OocytesDonate3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OocytesDonate3->getPlaceHolder()) ?>" value="<?= $Grid->OocytesDonate3->EditValue ?>"<?= $Grid->OocytesDonate3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OocytesDonate3->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_OocytesDonate3">
<span<?= $Grid->OocytesDonate3->viewAttributes() ?>>
<?= $Grid->OocytesDonate3->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_OocytesDonate3" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_OocytesDonate3" value="<?= HtmlEncode($Grid->OocytesDonate3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_OocytesDonate3" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_OocytesDonate3" value="<?= HtmlEncode($Grid->OocytesDonate3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->OocytesDonate4->Visible) { // OocytesDonate4 ?>
        <td data-name="OocytesDonate4" <?= $Grid->OocytesDonate4->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_OocytesDonate4" class="form-group">
<input type="<?= $Grid->OocytesDonate4->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x<?= $Grid->RowIndex ?>_OocytesDonate4" id="x<?= $Grid->RowIndex ?>_OocytesDonate4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OocytesDonate4->getPlaceHolder()) ?>" value="<?= $Grid->OocytesDonate4->EditValue ?>"<?= $Grid->OocytesDonate4->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OocytesDonate4->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OocytesDonate4" id="o<?= $Grid->RowIndex ?>_OocytesDonate4" value="<?= HtmlEncode($Grid->OocytesDonate4->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_OocytesDonate4" class="form-group">
<input type="<?= $Grid->OocytesDonate4->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x<?= $Grid->RowIndex ?>_OocytesDonate4" id="x<?= $Grid->RowIndex ?>_OocytesDonate4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OocytesDonate4->getPlaceHolder()) ?>" value="<?= $Grid->OocytesDonate4->EditValue ?>"<?= $Grid->OocytesDonate4->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OocytesDonate4->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_OocytesDonate4">
<span<?= $Grid->OocytesDonate4->viewAttributes() ?>>
<?= $Grid->OocytesDonate4->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_OocytesDonate4" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_OocytesDonate4" value="<?= HtmlEncode($Grid->OocytesDonate4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_OocytesDonate4" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_OocytesDonate4" value="<?= HtmlEncode($Grid->OocytesDonate4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
        <td data-name="MIOocytesDonate3" <?= $Grid->MIOocytesDonate3->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate3" class="form-group">
<input type="<?= $Grid->MIOocytesDonate3->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate3" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MIOocytesDonate3->getPlaceHolder()) ?>" value="<?= $Grid->MIOocytesDonate3->EditValue ?>"<?= $Grid->MIOocytesDonate3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MIOocytesDonate3->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MIOocytesDonate3" id="o<?= $Grid->RowIndex ?>_MIOocytesDonate3" value="<?= HtmlEncode($Grid->MIOocytesDonate3->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate3" class="form-group">
<input type="<?= $Grid->MIOocytesDonate3->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate3" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MIOocytesDonate3->getPlaceHolder()) ?>" value="<?= $Grid->MIOocytesDonate3->EditValue ?>"<?= $Grid->MIOocytesDonate3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MIOocytesDonate3->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate3">
<span<?= $Grid->MIOocytesDonate3->viewAttributes() ?>>
<?= $Grid->MIOocytesDonate3->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_MIOocytesDonate3" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_MIOocytesDonate3" value="<?= HtmlEncode($Grid->MIOocytesDonate3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_MIOocytesDonate3" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_MIOocytesDonate3" value="<?= HtmlEncode($Grid->MIOocytesDonate3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
        <td data-name="MIOocytesDonate4" <?= $Grid->MIOocytesDonate4->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate4" class="form-group">
<input type="<?= $Grid->MIOocytesDonate4->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate4" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MIOocytesDonate4->getPlaceHolder()) ?>" value="<?= $Grid->MIOocytesDonate4->EditValue ?>"<?= $Grid->MIOocytesDonate4->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MIOocytesDonate4->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MIOocytesDonate4" id="o<?= $Grid->RowIndex ?>_MIOocytesDonate4" value="<?= HtmlEncode($Grid->MIOocytesDonate4->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate4" class="form-group">
<input type="<?= $Grid->MIOocytesDonate4->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate4" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MIOocytesDonate4->getPlaceHolder()) ?>" value="<?= $Grid->MIOocytesDonate4->EditValue ?>"<?= $Grid->MIOocytesDonate4->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MIOocytesDonate4->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate4">
<span<?= $Grid->MIOocytesDonate4->viewAttributes() ?>>
<?= $Grid->MIOocytesDonate4->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_MIOocytesDonate4" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_MIOocytesDonate4" value="<?= HtmlEncode($Grid->MIOocytesDonate4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_MIOocytesDonate4" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_MIOocytesDonate4" value="<?= HtmlEncode($Grid->MIOocytesDonate4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
        <td data-name="SelfOocytesMI" <?= $Grid->SelfOocytesMI->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SelfOocytesMI" class="form-group">
<input type="<?= $Grid->SelfOocytesMI->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x<?= $Grid->RowIndex ?>_SelfOocytesMI" id="x<?= $Grid->RowIndex ?>_SelfOocytesMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SelfOocytesMI->getPlaceHolder()) ?>" value="<?= $Grid->SelfOocytesMI->EditValue ?>"<?= $Grid->SelfOocytesMI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SelfOocytesMI->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SelfOocytesMI" id="o<?= $Grid->RowIndex ?>_SelfOocytesMI" value="<?= HtmlEncode($Grid->SelfOocytesMI->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SelfOocytesMI" class="form-group">
<input type="<?= $Grid->SelfOocytesMI->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x<?= $Grid->RowIndex ?>_SelfOocytesMI" id="x<?= $Grid->RowIndex ?>_SelfOocytesMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SelfOocytesMI->getPlaceHolder()) ?>" value="<?= $Grid->SelfOocytesMI->EditValue ?>"<?= $Grid->SelfOocytesMI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SelfOocytesMI->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SelfOocytesMI">
<span<?= $Grid->SelfOocytesMI->viewAttributes() ?>>
<?= $Grid->SelfOocytesMI->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_SelfOocytesMI" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_SelfOocytesMI" value="<?= HtmlEncode($Grid->SelfOocytesMI->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_SelfOocytesMI" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_SelfOocytesMI" value="<?= HtmlEncode($Grid->SelfOocytesMI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
        <td data-name="SelfOocytesMII" <?= $Grid->SelfOocytesMII->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SelfOocytesMII" class="form-group">
<input type="<?= $Grid->SelfOocytesMII->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x<?= $Grid->RowIndex ?>_SelfOocytesMII" id="x<?= $Grid->RowIndex ?>_SelfOocytesMII" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SelfOocytesMII->getPlaceHolder()) ?>" value="<?= $Grid->SelfOocytesMII->EditValue ?>"<?= $Grid->SelfOocytesMII->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SelfOocytesMII->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SelfOocytesMII" id="o<?= $Grid->RowIndex ?>_SelfOocytesMII" value="<?= HtmlEncode($Grid->SelfOocytesMII->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SelfOocytesMII" class="form-group">
<input type="<?= $Grid->SelfOocytesMII->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x<?= $Grid->RowIndex ?>_SelfOocytesMII" id="x<?= $Grid->RowIndex ?>_SelfOocytesMII" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SelfOocytesMII->getPlaceHolder()) ?>" value="<?= $Grid->SelfOocytesMII->EditValue ?>"<?= $Grid->SelfOocytesMII->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SelfOocytesMII->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_SelfOocytesMII">
<span<?= $Grid->SelfOocytesMII->viewAttributes() ?>>
<?= $Grid->SelfOocytesMII->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_SelfOocytesMII" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_SelfOocytesMII" value="<?= HtmlEncode($Grid->SelfOocytesMII->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_SelfOocytesMII" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_SelfOocytesMII" value="<?= HtmlEncode($Grid->SelfOocytesMII->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->donor->Visible) { // donor ?>
        <td data-name="donor" <?= $Grid->donor->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_donor" class="form-group">
<input type="<?= $Grid->donor->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_donor" name="x<?= $Grid->RowIndex ?>_donor" id="x<?= $Grid->RowIndex ?>_donor" size="30" placeholder="<?= HtmlEncode($Grid->donor->getPlaceHolder()) ?>" value="<?= $Grid->donor->EditValue ?>"<?= $Grid->donor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->donor->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_donor" data-hidden="1" name="o<?= $Grid->RowIndex ?>_donor" id="o<?= $Grid->RowIndex ?>_donor" value="<?= HtmlEncode($Grid->donor->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_donor" class="form-group">
<input type="<?= $Grid->donor->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_donor" name="x<?= $Grid->RowIndex ?>_donor" id="x<?= $Grid->RowIndex ?>_donor" size="30" placeholder="<?= HtmlEncode($Grid->donor->getPlaceHolder()) ?>" value="<?= $Grid->donor->EditValue ?>"<?= $Grid->donor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->donor->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_oocytedenudation_donor">
<span<?= $Grid->donor->viewAttributes() ?>>
<?= $Grid->donor->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_donor" data-hidden="1" name="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_donor" id="fivf_oocytedenudationgrid$x<?= $Grid->RowIndex ?>_donor" value="<?= HtmlEncode($Grid->donor->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_donor" data-hidden="1" name="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_donor" id="fivf_oocytedenudationgrid$o<?= $Grid->RowIndex ?>_donor" value="<?= HtmlEncode($Grid->donor->OldValue) ?>">
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
loadjs.ready(["fivf_oocytedenudationgrid","load"], function () {
    fivf_oocytedenudationgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_ivf_oocytedenudation", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_ivf_oocytedenudation_id" class="form-group ivf_oocytedenudation_id"></span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_id" class="form-group ivf_oocytedenudation_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->RIDNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RIDNo" class="form-group ivf_oocytedenudation_RIDNo">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNo->getDisplayValue($Grid->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RIDNo" class="form-group ivf_oocytedenudation_RIDNo">
<input type="<?= $Grid->RIDNo->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" id="x<?= $Grid->RowIndex ?>_RIDNo" size="30" placeholder="<?= HtmlEncode($Grid->RIDNo->getPlaceHolder()) ?>" value="<?= $Grid->RIDNo->EditValue ?>"<?= $Grid->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RIDNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RIDNo" class="form-group ivf_oocytedenudation_RIDNo">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNo->getDisplayValue($Grid->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RIDNo" id="x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RIDNo" id="o<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Name->Visible) { // Name ?>
        <td data-name="Name">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->Name->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Name" class="form-group ivf_oocytedenudation_Name">
<span<?= $Grid->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Name->getDisplayValue($Grid->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Name" name="x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Name" class="form-group ivf_oocytedenudation_Name">
<input type="<?= $Grid->Name->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Name" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Name->getPlaceHolder()) ?>" value="<?= $Grid->Name->EditValue ?>"<?= $Grid->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Name" class="form-group ivf_oocytedenudation_Name">
<span<?= $Grid->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Name->getDisplayValue($Grid->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Name" id="o<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_ResultDate" class="form-group ivf_oocytedenudation_ResultDate">
<input type="<?= $Grid->ResultDate->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-format="11" name="x<?= $Grid->RowIndex ?>_ResultDate" id="x<?= $Grid->RowIndex ?>_ResultDate" placeholder="<?= HtmlEncode($Grid->ResultDate->getPlaceHolder()) ?>" value="<?= $Grid->ResultDate->EditValue ?>"<?= $Grid->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultDate->getErrorMessage() ?></div>
<?php if (!$Grid->ResultDate->ReadOnly && !$Grid->ResultDate->Disabled && !isset($Grid->ResultDate->EditAttrs["readonly"]) && !isset($Grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?= $Grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_ResultDate" class="form-group ivf_oocytedenudation_ResultDate">
<span<?= $Grid->ResultDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ResultDate->getDisplayValue($Grid->ResultDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ResultDate" id="x<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultDate" id="o<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Surgeon->Visible) { // Surgeon ?>
        <td data-name="Surgeon">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Surgeon" class="form-group ivf_oocytedenudation_Surgeon">
<input type="<?= $Grid->Surgeon->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x<?= $Grid->RowIndex ?>_Surgeon" id="x<?= $Grid->RowIndex ?>_Surgeon" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Surgeon->getPlaceHolder()) ?>" value="<?= $Grid->Surgeon->EditValue ?>"<?= $Grid->Surgeon->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Surgeon->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Surgeon" class="form-group ivf_oocytedenudation_Surgeon">
<span<?= $Grid->Surgeon->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Surgeon->getDisplayValue($Grid->Surgeon->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Surgeon" id="x<?= $Grid->RowIndex ?>_Surgeon" value="<?= HtmlEncode($Grid->Surgeon->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Surgeon" id="o<?= $Grid->RowIndex ?>_Surgeon" value="<?= HtmlEncode($Grid->Surgeon->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AsstSurgeon->Visible) { // AsstSurgeon ?>
        <td data-name="AsstSurgeon">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_AsstSurgeon" class="form-group ivf_oocytedenudation_AsstSurgeon">
<input type="<?= $Grid->AsstSurgeon->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x<?= $Grid->RowIndex ?>_AsstSurgeon" id="x<?= $Grid->RowIndex ?>_AsstSurgeon" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->AsstSurgeon->getPlaceHolder()) ?>" value="<?= $Grid->AsstSurgeon->EditValue ?>"<?= $Grid->AsstSurgeon->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AsstSurgeon->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_AsstSurgeon" class="form-group ivf_oocytedenudation_AsstSurgeon">
<span<?= $Grid->AsstSurgeon->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AsstSurgeon->getDisplayValue($Grid->AsstSurgeon->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AsstSurgeon" id="x<?= $Grid->RowIndex ?>_AsstSurgeon" value="<?= HtmlEncode($Grid->AsstSurgeon->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AsstSurgeon" id="o<?= $Grid->RowIndex ?>_AsstSurgeon" value="<?= HtmlEncode($Grid->AsstSurgeon->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Anaesthetist->Visible) { // Anaesthetist ?>
        <td data-name="Anaesthetist">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Anaesthetist" class="form-group ivf_oocytedenudation_Anaesthetist">
<input type="<?= $Grid->Anaesthetist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x<?= $Grid->RowIndex ?>_Anaesthetist" id="x<?= $Grid->RowIndex ?>_Anaesthetist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Anaesthetist->getPlaceHolder()) ?>" value="<?= $Grid->Anaesthetist->EditValue ?>"<?= $Grid->Anaesthetist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Anaesthetist->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Anaesthetist" class="form-group ivf_oocytedenudation_Anaesthetist">
<span<?= $Grid->Anaesthetist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Anaesthetist->getDisplayValue($Grid->Anaesthetist->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Anaesthetist" id="x<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= HtmlEncode($Grid->Anaesthetist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Anaesthetist" id="o<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= HtmlEncode($Grid->Anaesthetist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AnaestheiaType->Visible) { // AnaestheiaType ?>
        <td data-name="AnaestheiaType">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_AnaestheiaType" class="form-group ivf_oocytedenudation_AnaestheiaType">
<input type="<?= $Grid->AnaestheiaType->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x<?= $Grid->RowIndex ?>_AnaestheiaType" id="x<?= $Grid->RowIndex ?>_AnaestheiaType" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->AnaestheiaType->getPlaceHolder()) ?>" value="<?= $Grid->AnaestheiaType->EditValue ?>"<?= $Grid->AnaestheiaType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnaestheiaType->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_AnaestheiaType" class="form-group ivf_oocytedenudation_AnaestheiaType">
<span<?= $Grid->AnaestheiaType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AnaestheiaType->getDisplayValue($Grid->AnaestheiaType->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AnaestheiaType" id="x<?= $Grid->RowIndex ?>_AnaestheiaType" value="<?= HtmlEncode($Grid->AnaestheiaType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnaestheiaType" id="o<?= $Grid->RowIndex ?>_AnaestheiaType" value="<?= HtmlEncode($Grid->AnaestheiaType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <td data-name="PrimaryEmbryologist">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_PrimaryEmbryologist" class="form-group ivf_oocytedenudation_PrimaryEmbryologist">
<input type="<?= $Grid->PrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x<?= $Grid->RowIndex ?>_PrimaryEmbryologist" id="x<?= $Grid->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->PrimaryEmbryologist->EditValue ?>"<?= $Grid->PrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_PrimaryEmbryologist" class="form-group ivf_oocytedenudation_PrimaryEmbryologist">
<span<?= $Grid->PrimaryEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PrimaryEmbryologist->getDisplayValue($Grid->PrimaryEmbryologist->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PrimaryEmbryologist" id="x<?= $Grid->RowIndex ?>_PrimaryEmbryologist" value="<?= HtmlEncode($Grid->PrimaryEmbryologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrimaryEmbryologist" id="o<?= $Grid->RowIndex ?>_PrimaryEmbryologist" value="<?= HtmlEncode($Grid->PrimaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <td data-name="SecondaryEmbryologist">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SecondaryEmbryologist" class="form-group ivf_oocytedenudation_SecondaryEmbryologist">
<input type="<?= $Grid->SecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x<?= $Grid->RowIndex ?>_SecondaryEmbryologist" id="x<?= $Grid->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->SecondaryEmbryologist->EditValue ?>"<?= $Grid->SecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SecondaryEmbryologist" class="form-group ivf_oocytedenudation_SecondaryEmbryologist">
<span<?= $Grid->SecondaryEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SecondaryEmbryologist->getDisplayValue($Grid->SecondaryEmbryologist->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SecondaryEmbryologist" id="x<?= $Grid->RowIndex ?>_SecondaryEmbryologist" value="<?= HtmlEncode($Grid->SecondaryEmbryologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SecondaryEmbryologist" id="o<?= $Grid->RowIndex ?>_SecondaryEmbryologist" value="<?= HtmlEncode($Grid->SecondaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
        <td data-name="NoOfFolliclesRight">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfFolliclesRight" class="form-group ivf_oocytedenudation_NoOfFolliclesRight">
<input type="<?= $Grid->NoOfFolliclesRight->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x<?= $Grid->RowIndex ?>_NoOfFolliclesRight" id="x<?= $Grid->RowIndex ?>_NoOfFolliclesRight" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->NoOfFolliclesRight->getPlaceHolder()) ?>" value="<?= $Grid->NoOfFolliclesRight->EditValue ?>"<?= $Grid->NoOfFolliclesRight->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoOfFolliclesRight->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfFolliclesRight" class="form-group ivf_oocytedenudation_NoOfFolliclesRight">
<span<?= $Grid->NoOfFolliclesRight->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NoOfFolliclesRight->getDisplayValue($Grid->NoOfFolliclesRight->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NoOfFolliclesRight" id="x<?= $Grid->RowIndex ?>_NoOfFolliclesRight" value="<?= HtmlEncode($Grid->NoOfFolliclesRight->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NoOfFolliclesRight" id="o<?= $Grid->RowIndex ?>_NoOfFolliclesRight" value="<?= HtmlEncode($Grid->NoOfFolliclesRight->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
        <td data-name="NoOfFolliclesLeft">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfFolliclesLeft" class="form-group ivf_oocytedenudation_NoOfFolliclesLeft">
<input type="<?= $Grid->NoOfFolliclesLeft->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" id="x<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->NoOfFolliclesLeft->getPlaceHolder()) ?>" value="<?= $Grid->NoOfFolliclesLeft->EditValue ?>"<?= $Grid->NoOfFolliclesLeft->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoOfFolliclesLeft->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfFolliclesLeft" class="form-group ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?= $Grid->NoOfFolliclesLeft->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NoOfFolliclesLeft->getDisplayValue($Grid->NoOfFolliclesLeft->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" id="x<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" value="<?= HtmlEncode($Grid->NoOfFolliclesLeft->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" id="o<?= $Grid->RowIndex ?>_NoOfFolliclesLeft" value="<?= HtmlEncode($Grid->NoOfFolliclesLeft->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NoOfOocytes->Visible) { // NoOfOocytes ?>
        <td data-name="NoOfOocytes">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfOocytes" class="form-group ivf_oocytedenudation_NoOfOocytes">
<input type="<?= $Grid->NoOfOocytes->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x<?= $Grid->RowIndex ?>_NoOfOocytes" id="x<?= $Grid->RowIndex ?>_NoOfOocytes" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->NoOfOocytes->getPlaceHolder()) ?>" value="<?= $Grid->NoOfOocytes->EditValue ?>"<?= $Grid->NoOfOocytes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoOfOocytes->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfOocytes" class="form-group ivf_oocytedenudation_NoOfOocytes">
<span<?= $Grid->NoOfOocytes->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NoOfOocytes->getDisplayValue($Grid->NoOfOocytes->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NoOfOocytes" id="x<?= $Grid->RowIndex ?>_NoOfOocytes" value="<?= HtmlEncode($Grid->NoOfOocytes->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NoOfOocytes" id="o<?= $Grid->RowIndex ?>_NoOfOocytes" value="<?= HtmlEncode($Grid->NoOfOocytes->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
        <td data-name="RecordOocyteDenudation">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RecordOocyteDenudation" class="form-group ivf_oocytedenudation_RecordOocyteDenudation">
<input type="<?= $Grid->RecordOocyteDenudation->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x<?= $Grid->RowIndex ?>_RecordOocyteDenudation" id="x<?= $Grid->RowIndex ?>_RecordOocyteDenudation" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->RecordOocyteDenudation->getPlaceHolder()) ?>" value="<?= $Grid->RecordOocyteDenudation->EditValue ?>"<?= $Grid->RecordOocyteDenudation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RecordOocyteDenudation->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RecordOocyteDenudation" class="form-group ivf_oocytedenudation_RecordOocyteDenudation">
<span<?= $Grid->RecordOocyteDenudation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RecordOocyteDenudation->getDisplayValue($Grid->RecordOocyteDenudation->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RecordOocyteDenudation" id="x<?= $Grid->RowIndex ?>_RecordOocyteDenudation" value="<?= HtmlEncode($Grid->RecordOocyteDenudation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RecordOocyteDenudation" id="o<?= $Grid->RowIndex ?>_RecordOocyteDenudation" value="<?= HtmlEncode($Grid->RecordOocyteDenudation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DateOfDenudation->Visible) { // DateOfDenudation ?>
        <td data-name="DateOfDenudation">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_DateOfDenudation" class="form-group ivf_oocytedenudation_DateOfDenudation">
<input type="<?= $Grid->DateOfDenudation->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-format="11" name="x<?= $Grid->RowIndex ?>_DateOfDenudation" id="x<?= $Grid->RowIndex ?>_DateOfDenudation" placeholder="<?= HtmlEncode($Grid->DateOfDenudation->getPlaceHolder()) ?>" value="<?= $Grid->DateOfDenudation->EditValue ?>"<?= $Grid->DateOfDenudation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DateOfDenudation->getErrorMessage() ?></div>
<?php if (!$Grid->DateOfDenudation->ReadOnly && !$Grid->DateOfDenudation->Disabled && !isset($Grid->DateOfDenudation->EditAttrs["readonly"]) && !isset($Grid->DateOfDenudation->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?= $Grid->RowIndex ?>_DateOfDenudation", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_DateOfDenudation" class="form-group ivf_oocytedenudation_DateOfDenudation">
<span<?= $Grid->DateOfDenudation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DateOfDenudation->getDisplayValue($Grid->DateOfDenudation->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DateOfDenudation" id="x<?= $Grid->RowIndex ?>_DateOfDenudation" value="<?= HtmlEncode($Grid->DateOfDenudation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DateOfDenudation" id="o<?= $Grid->RowIndex ?>_DateOfDenudation" value="<?= HtmlEncode($Grid->DateOfDenudation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
        <td data-name="DenudationDoneBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_DenudationDoneBy" class="form-group ivf_oocytedenudation_DenudationDoneBy">
<input type="<?= $Grid->DenudationDoneBy->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x<?= $Grid->RowIndex ?>_DenudationDoneBy" id="x<?= $Grid->RowIndex ?>_DenudationDoneBy" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->DenudationDoneBy->getPlaceHolder()) ?>" value="<?= $Grid->DenudationDoneBy->EditValue ?>"<?= $Grid->DenudationDoneBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DenudationDoneBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_DenudationDoneBy" class="form-group ivf_oocytedenudation_DenudationDoneBy">
<span<?= $Grid->DenudationDoneBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DenudationDoneBy->getDisplayValue($Grid->DenudationDoneBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DenudationDoneBy" id="x<?= $Grid->RowIndex ?>_DenudationDoneBy" value="<?= HtmlEncode($Grid->DenudationDoneBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DenudationDoneBy" id="o<?= $Grid->RowIndex ?>_DenudationDoneBy" value="<?= HtmlEncode($Grid->DenudationDoneBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_status" class="form-group ivf_oocytedenudation_status">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_status" class="form-group ivf_oocytedenudation_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_createdby" class="form-group ivf_oocytedenudation_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdby->getDisplayValue($Grid->createdby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_createddatetime" class="form-group ivf_oocytedenudation_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_modifiedby" class="form-group ivf_oocytedenudation_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifiedby->getDisplayValue($Grid->modifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_modifieddatetime" class="form-group ivf_oocytedenudation_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifieddatetime->getDisplayValue($Grid->modifieddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->TidNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_oocytedenudation_TidNo" class="form-group ivf_oocytedenudation_TidNo">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_TidNo" class="form-group ivf_oocytedenudation_TidNo">
<input type="<?= $Grid->TidNo->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Grid->TidNo->getPlaceHolder()) ?>" value="<?= $Grid->TidNo->EditValue ?>"<?= $Grid->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_TidNo" class="form-group ivf_oocytedenudation_TidNo">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TidNo" id="o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ExpFollicles->Visible) { // ExpFollicles ?>
        <td data-name="ExpFollicles">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_ExpFollicles" class="form-group ivf_oocytedenudation_ExpFollicles">
<input type="<?= $Grid->ExpFollicles->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x<?= $Grid->RowIndex ?>_ExpFollicles" id="x<?= $Grid->RowIndex ?>_ExpFollicles" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ExpFollicles->getPlaceHolder()) ?>" value="<?= $Grid->ExpFollicles->EditValue ?>"<?= $Grid->ExpFollicles->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExpFollicles->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_ExpFollicles" class="form-group ivf_oocytedenudation_ExpFollicles">
<span<?= $Grid->ExpFollicles->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ExpFollicles->getDisplayValue($Grid->ExpFollicles->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ExpFollicles" id="x<?= $Grid->RowIndex ?>_ExpFollicles" value="<?= HtmlEncode($Grid->ExpFollicles->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ExpFollicles" id="o<?= $Grid->RowIndex ?>_ExpFollicles" value="<?= HtmlEncode($Grid->ExpFollicles->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
        <td data-name="SecondaryDenudationDoneBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="form-group ivf_oocytedenudation_SecondaryDenudationDoneBy">
<input type="<?= $Grid->SecondaryDenudationDoneBy->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" id="x<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SecondaryDenudationDoneBy->getPlaceHolder()) ?>" value="<?= $Grid->SecondaryDenudationDoneBy->EditValue ?>"<?= $Grid->SecondaryDenudationDoneBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SecondaryDenudationDoneBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="form-group ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?= $Grid->SecondaryDenudationDoneBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SecondaryDenudationDoneBy->getDisplayValue($Grid->SecondaryDenudationDoneBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" id="x<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?= HtmlEncode($Grid->SecondaryDenudationDoneBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" id="o<?= $Grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?= HtmlEncode($Grid->SecondaryDenudationDoneBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->OocyteOrgin->Visible) { // OocyteOrgin ?>
        <td data-name="OocyteOrgin">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocyteOrgin" class="form-group ivf_oocytedenudation_OocyteOrgin">
    <select
        id="x<?= $Grid->RowIndex ?>_OocyteOrgin"
        name="x<?= $Grid->RowIndex ?>_OocyteOrgin"
        class="form-control ew-select<?= $Grid->OocyteOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_oocytedenudation_x<?= $Grid->RowIndex ?>_OocyteOrgin"
        data-table="ivf_oocytedenudation"
        data-field="x_OocyteOrgin"
        data-value-separator="<?= $Grid->OocyteOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->OocyteOrgin->getPlaceHolder()) ?>"
        <?= $Grid->OocyteOrgin->editAttributes() ?>>
        <?= $Grid->OocyteOrgin->selectOptionListHtml("x{$Grid->RowIndex}_OocyteOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->OocyteOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_oocytedenudation_x<?= $Grid->RowIndex ?>_OocyteOrgin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_OocyteOrgin", selectId: "ivf_oocytedenudation_x<?= $Grid->RowIndex ?>_OocyteOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_oocytedenudation.fields.OocyteOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_oocytedenudation.fields.OocyteOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocyteOrgin" class="form-group ivf_oocytedenudation_OocyteOrgin">
<span<?= $Grid->OocyteOrgin->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->OocyteOrgin->getDisplayValue($Grid->OocyteOrgin->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" data-hidden="1" name="x<?= $Grid->RowIndex ?>_OocyteOrgin" id="x<?= $Grid->RowIndex ?>_OocyteOrgin" value="<?= HtmlEncode($Grid->OocyteOrgin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OocyteOrgin" id="o<?= $Grid->RowIndex ?>_OocyteOrgin" value="<?= HtmlEncode($Grid->OocyteOrgin->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->patient1->Visible) { // patient1 ?>
        <td data-name="patient1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient1" class="form-group ivf_oocytedenudation_patient1">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_patient1"><?= EmptyValue(strval($Grid->patient1->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->patient1->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->patient1->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->patient1->ReadOnly || $Grid->patient1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_patient1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->patient1->getErrorMessage() ?></div>
<?= $Grid->patient1->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_patient1") ?>
<input type="hidden" is="selection-list" data-table="ivf_oocytedenudation" data-field="x_patient1" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->patient1->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_patient1" id="x<?= $Grid->RowIndex ?>_patient1" value="<?= $Grid->patient1->CurrentValue ?>"<?= $Grid->patient1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient1" class="form-group ivf_oocytedenudation_patient1">
<span<?= $Grid->patient1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient1->getDisplayValue($Grid->patient1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_patient1" id="x<?= $Grid->RowIndex ?>_patient1" value="<?= HtmlEncode($Grid->patient1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patient1" id="o<?= $Grid->RowIndex ?>_patient1" value="<?= HtmlEncode($Grid->patient1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->OocyteType->Visible) { // OocyteType ?>
        <td data-name="OocyteType">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocyteType" class="form-group ivf_oocytedenudation_OocyteType">
<template id="tp_x<?= $Grid->RowIndex ?>_OocyteType">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="x<?= $Grid->RowIndex ?>_OocyteType" id="x<?= $Grid->RowIndex ?>_OocyteType"<?= $Grid->OocyteType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_OocyteType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_OocyteType[]"
    name="x<?= $Grid->RowIndex ?>_OocyteType[]"
    value="<?= HtmlEncode($Grid->OocyteType->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_OocyteType"
    data-target="dsl_x<?= $Grid->RowIndex ?>_OocyteType"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->OocyteType->isInvalidClass() ?>"
    data-table="ivf_oocytedenudation"
    data-field="x_OocyteType"
    data-value-separator="<?= $Grid->OocyteType->displayValueSeparatorAttribute() ?>"
    <?= $Grid->OocyteType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OocyteType->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocyteType" class="form-group ivf_oocytedenudation_OocyteType">
<span<?= $Grid->OocyteType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->OocyteType->getDisplayValue($Grid->OocyteType->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" data-hidden="1" name="x<?= $Grid->RowIndex ?>_OocyteType" id="x<?= $Grid->RowIndex ?>_OocyteType" value="<?= HtmlEncode($Grid->OocyteType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OocyteType[]" id="o<?= $Grid->RowIndex ?>_OocyteType[]" value="<?= HtmlEncode($Grid->OocyteType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
        <td data-name="MIOocytesDonate1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate1" class="form-group ivf_oocytedenudation_MIOocytesDonate1">
<input type="<?= $Grid->MIOocytesDonate1->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate1" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MIOocytesDonate1->getPlaceHolder()) ?>" value="<?= $Grid->MIOocytesDonate1->EditValue ?>"<?= $Grid->MIOocytesDonate1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MIOocytesDonate1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate1" class="form-group ivf_oocytedenudation_MIOocytesDonate1">
<span<?= $Grid->MIOocytesDonate1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MIOocytesDonate1->getDisplayValue($Grid->MIOocytesDonate1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate1" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate1" value="<?= HtmlEncode($Grid->MIOocytesDonate1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MIOocytesDonate1" id="o<?= $Grid->RowIndex ?>_MIOocytesDonate1" value="<?= HtmlEncode($Grid->MIOocytesDonate1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
        <td data-name="MIOocytesDonate2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate2" class="form-group ivf_oocytedenudation_MIOocytesDonate2">
<input type="<?= $Grid->MIOocytesDonate2->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate2" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MIOocytesDonate2->getPlaceHolder()) ?>" value="<?= $Grid->MIOocytesDonate2->EditValue ?>"<?= $Grid->MIOocytesDonate2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MIOocytesDonate2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate2" class="form-group ivf_oocytedenudation_MIOocytesDonate2">
<span<?= $Grid->MIOocytesDonate2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MIOocytesDonate2->getDisplayValue($Grid->MIOocytesDonate2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate2" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate2" value="<?= HtmlEncode($Grid->MIOocytesDonate2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MIOocytesDonate2" id="o<?= $Grid->RowIndex ?>_MIOocytesDonate2" value="<?= HtmlEncode($Grid->MIOocytesDonate2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SelfMI->Visible) { // SelfMI ?>
        <td data-name="SelfMI">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfMI" class="form-group ivf_oocytedenudation_SelfMI">
<input type="<?= $Grid->SelfMI->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x<?= $Grid->RowIndex ?>_SelfMI" id="x<?= $Grid->RowIndex ?>_SelfMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SelfMI->getPlaceHolder()) ?>" value="<?= $Grid->SelfMI->EditValue ?>"<?= $Grid->SelfMI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SelfMI->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfMI" class="form-group ivf_oocytedenudation_SelfMI">
<span<?= $Grid->SelfMI->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SelfMI->getDisplayValue($Grid->SelfMI->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SelfMI" id="x<?= $Grid->RowIndex ?>_SelfMI" value="<?= HtmlEncode($Grid->SelfMI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SelfMI" id="o<?= $Grid->RowIndex ?>_SelfMI" value="<?= HtmlEncode($Grid->SelfMI->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SelfMII->Visible) { // SelfMII ?>
        <td data-name="SelfMII">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfMII" class="form-group ivf_oocytedenudation_SelfMII">
<input type="<?= $Grid->SelfMII->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x<?= $Grid->RowIndex ?>_SelfMII" id="x<?= $Grid->RowIndex ?>_SelfMII" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SelfMII->getPlaceHolder()) ?>" value="<?= $Grid->SelfMII->EditValue ?>"<?= $Grid->SelfMII->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SelfMII->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfMII" class="form-group ivf_oocytedenudation_SelfMII">
<span<?= $Grid->SelfMII->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SelfMII->getDisplayValue($Grid->SelfMII->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SelfMII" id="x<?= $Grid->RowIndex ?>_SelfMII" value="<?= HtmlEncode($Grid->SelfMII->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SelfMII" id="o<?= $Grid->RowIndex ?>_SelfMII" value="<?= HtmlEncode($Grid->SelfMII->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->patient3->Visible) { // patient3 ?>
        <td data-name="patient3">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient3" class="form-group ivf_oocytedenudation_patient3">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_patient3"><?= EmptyValue(strval($Grid->patient3->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->patient3->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->patient3->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->patient3->ReadOnly || $Grid->patient3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_patient3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->patient3->getErrorMessage() ?></div>
<?= $Grid->patient3->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_patient3") ?>
<input type="hidden" is="selection-list" data-table="ivf_oocytedenudation" data-field="x_patient3" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->patient3->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_patient3" id="x<?= $Grid->RowIndex ?>_patient3" value="<?= $Grid->patient3->CurrentValue ?>"<?= $Grid->patient3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient3" class="form-group ivf_oocytedenudation_patient3">
<span<?= $Grid->patient3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient3->getDisplayValue($Grid->patient3->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" data-hidden="1" name="x<?= $Grid->RowIndex ?>_patient3" id="x<?= $Grid->RowIndex ?>_patient3" value="<?= HtmlEncode($Grid->patient3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patient3" id="o<?= $Grid->RowIndex ?>_patient3" value="<?= HtmlEncode($Grid->patient3->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->patient4->Visible) { // patient4 ?>
        <td data-name="patient4">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient4" class="form-group ivf_oocytedenudation_patient4">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_patient4"><?= EmptyValue(strval($Grid->patient4->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->patient4->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->patient4->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->patient4->ReadOnly || $Grid->patient4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_patient4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->patient4->getErrorMessage() ?></div>
<?= $Grid->patient4->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_patient4") ?>
<input type="hidden" is="selection-list" data-table="ivf_oocytedenudation" data-field="x_patient4" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->patient4->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_patient4" id="x<?= $Grid->RowIndex ?>_patient4" value="<?= $Grid->patient4->CurrentValue ?>"<?= $Grid->patient4->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient4" class="form-group ivf_oocytedenudation_patient4">
<span<?= $Grid->patient4->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient4->getDisplayValue($Grid->patient4->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" data-hidden="1" name="x<?= $Grid->RowIndex ?>_patient4" id="x<?= $Grid->RowIndex ?>_patient4" value="<?= HtmlEncode($Grid->patient4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patient4" id="o<?= $Grid->RowIndex ?>_patient4" value="<?= HtmlEncode($Grid->patient4->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->OocytesDonate3->Visible) { // OocytesDonate3 ?>
        <td data-name="OocytesDonate3">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocytesDonate3" class="form-group ivf_oocytedenudation_OocytesDonate3">
<input type="<?= $Grid->OocytesDonate3->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x<?= $Grid->RowIndex ?>_OocytesDonate3" id="x<?= $Grid->RowIndex ?>_OocytesDonate3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OocytesDonate3->getPlaceHolder()) ?>" value="<?= $Grid->OocytesDonate3->EditValue ?>"<?= $Grid->OocytesDonate3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OocytesDonate3->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocytesDonate3" class="form-group ivf_oocytedenudation_OocytesDonate3">
<span<?= $Grid->OocytesDonate3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->OocytesDonate3->getDisplayValue($Grid->OocytesDonate3->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" data-hidden="1" name="x<?= $Grid->RowIndex ?>_OocytesDonate3" id="x<?= $Grid->RowIndex ?>_OocytesDonate3" value="<?= HtmlEncode($Grid->OocytesDonate3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OocytesDonate3" id="o<?= $Grid->RowIndex ?>_OocytesDonate3" value="<?= HtmlEncode($Grid->OocytesDonate3->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->OocytesDonate4->Visible) { // OocytesDonate4 ?>
        <td data-name="OocytesDonate4">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocytesDonate4" class="form-group ivf_oocytedenudation_OocytesDonate4">
<input type="<?= $Grid->OocytesDonate4->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x<?= $Grid->RowIndex ?>_OocytesDonate4" id="x<?= $Grid->RowIndex ?>_OocytesDonate4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OocytesDonate4->getPlaceHolder()) ?>" value="<?= $Grid->OocytesDonate4->EditValue ?>"<?= $Grid->OocytesDonate4->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OocytesDonate4->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocytesDonate4" class="form-group ivf_oocytedenudation_OocytesDonate4">
<span<?= $Grid->OocytesDonate4->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->OocytesDonate4->getDisplayValue($Grid->OocytesDonate4->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" data-hidden="1" name="x<?= $Grid->RowIndex ?>_OocytesDonate4" id="x<?= $Grid->RowIndex ?>_OocytesDonate4" value="<?= HtmlEncode($Grid->OocytesDonate4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OocytesDonate4" id="o<?= $Grid->RowIndex ?>_OocytesDonate4" value="<?= HtmlEncode($Grid->OocytesDonate4->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
        <td data-name="MIOocytesDonate3">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate3" class="form-group ivf_oocytedenudation_MIOocytesDonate3">
<input type="<?= $Grid->MIOocytesDonate3->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate3" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MIOocytesDonate3->getPlaceHolder()) ?>" value="<?= $Grid->MIOocytesDonate3->EditValue ?>"<?= $Grid->MIOocytesDonate3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MIOocytesDonate3->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate3" class="form-group ivf_oocytedenudation_MIOocytesDonate3">
<span<?= $Grid->MIOocytesDonate3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MIOocytesDonate3->getDisplayValue($Grid->MIOocytesDonate3->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate3" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate3" value="<?= HtmlEncode($Grid->MIOocytesDonate3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MIOocytesDonate3" id="o<?= $Grid->RowIndex ?>_MIOocytesDonate3" value="<?= HtmlEncode($Grid->MIOocytesDonate3->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
        <td data-name="MIOocytesDonate4">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate4" class="form-group ivf_oocytedenudation_MIOocytesDonate4">
<input type="<?= $Grid->MIOocytesDonate4->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate4" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MIOocytesDonate4->getPlaceHolder()) ?>" value="<?= $Grid->MIOocytesDonate4->EditValue ?>"<?= $Grid->MIOocytesDonate4->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MIOocytesDonate4->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate4" class="form-group ivf_oocytedenudation_MIOocytesDonate4">
<span<?= $Grid->MIOocytesDonate4->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MIOocytesDonate4->getDisplayValue($Grid->MIOocytesDonate4->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MIOocytesDonate4" id="x<?= $Grid->RowIndex ?>_MIOocytesDonate4" value="<?= HtmlEncode($Grid->MIOocytesDonate4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MIOocytesDonate4" id="o<?= $Grid->RowIndex ?>_MIOocytesDonate4" value="<?= HtmlEncode($Grid->MIOocytesDonate4->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
        <td data-name="SelfOocytesMI">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfOocytesMI" class="form-group ivf_oocytedenudation_SelfOocytesMI">
<input type="<?= $Grid->SelfOocytesMI->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x<?= $Grid->RowIndex ?>_SelfOocytesMI" id="x<?= $Grid->RowIndex ?>_SelfOocytesMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SelfOocytesMI->getPlaceHolder()) ?>" value="<?= $Grid->SelfOocytesMI->EditValue ?>"<?= $Grid->SelfOocytesMI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SelfOocytesMI->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfOocytesMI" class="form-group ivf_oocytedenudation_SelfOocytesMI">
<span<?= $Grid->SelfOocytesMI->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SelfOocytesMI->getDisplayValue($Grid->SelfOocytesMI->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SelfOocytesMI" id="x<?= $Grid->RowIndex ?>_SelfOocytesMI" value="<?= HtmlEncode($Grid->SelfOocytesMI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SelfOocytesMI" id="o<?= $Grid->RowIndex ?>_SelfOocytesMI" value="<?= HtmlEncode($Grid->SelfOocytesMI->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
        <td data-name="SelfOocytesMII">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfOocytesMII" class="form-group ivf_oocytedenudation_SelfOocytesMII">
<input type="<?= $Grid->SelfOocytesMII->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x<?= $Grid->RowIndex ?>_SelfOocytesMII" id="x<?= $Grid->RowIndex ?>_SelfOocytesMII" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SelfOocytesMII->getPlaceHolder()) ?>" value="<?= $Grid->SelfOocytesMII->EditValue ?>"<?= $Grid->SelfOocytesMII->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SelfOocytesMII->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfOocytesMII" class="form-group ivf_oocytedenudation_SelfOocytesMII">
<span<?= $Grid->SelfOocytesMII->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SelfOocytesMII->getDisplayValue($Grid->SelfOocytesMII->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SelfOocytesMII" id="x<?= $Grid->RowIndex ?>_SelfOocytesMII" value="<?= HtmlEncode($Grid->SelfOocytesMII->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SelfOocytesMII" id="o<?= $Grid->RowIndex ?>_SelfOocytesMII" value="<?= HtmlEncode($Grid->SelfOocytesMII->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->donor->Visible) { // donor ?>
        <td data-name="donor">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_donor" class="form-group ivf_oocytedenudation_donor">
<input type="<?= $Grid->donor->getInputTextType() ?>" data-table="ivf_oocytedenudation" data-field="x_donor" name="x<?= $Grid->RowIndex ?>_donor" id="x<?= $Grid->RowIndex ?>_donor" size="30" placeholder="<?= HtmlEncode($Grid->donor->getPlaceHolder()) ?>" value="<?= $Grid->donor->EditValue ?>"<?= $Grid->donor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->donor->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_donor" class="form-group ivf_oocytedenudation_donor">
<span<?= $Grid->donor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->donor->getDisplayValue($Grid->donor->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_donor" data-hidden="1" name="x<?= $Grid->RowIndex ?>_donor" id="x<?= $Grid->RowIndex ?>_donor" value="<?= HtmlEncode($Grid->donor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_donor" data-hidden="1" name="o<?= $Grid->RowIndex ?>_donor" id="o<?= $Grid->RowIndex ?>_donor" value="<?= HtmlEncode($Grid->donor->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid","load"], function() {
    fivf_oocytedenudationgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fivf_oocytedenudationgrid">
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
    ew.addEventHandlers("ivf_oocytedenudation");
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
        container: "gmp_ivf_oocytedenudation",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
