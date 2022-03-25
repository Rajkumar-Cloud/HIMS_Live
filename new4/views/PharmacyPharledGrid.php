<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PharmacyPharledGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_pharledgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpharmacy_pharledgrid = new ew.Form("fpharmacy_pharledgrid", "grid");
    fpharmacy_pharledgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_pharled")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_pharled)
        ew.vars.tables.pharmacy_pharled = currentTable;
    fpharmacy_pharledgrid.addFields([
        ["SiNo", [fields.SiNo.visible && fields.SiNo.required ? ew.Validators.required(fields.SiNo.caption) : null, ew.Validators.integer], fields.SiNo.isInvalid],
        ["SLNO", [fields.SLNO.visible && fields.SLNO.required ? ew.Validators.required(fields.SLNO.caption) : null, ew.Validators.integer], fields.SLNO.isInvalid],
        ["Product", [fields.Product.visible && fields.Product.required ? ew.Validators.required(fields.Product.caption) : null], fields.Product.isInvalid],
        ["RT", [fields.RT.visible && fields.RT.required ? ew.Validators.required(fields.RT.caption) : null, ew.Validators.float], fields.RT.isInvalid],
        ["IQ", [fields.IQ.visible && fields.IQ.required ? ew.Validators.required(fields.IQ.caption) : null, ew.Validators.float], fields.IQ.isInvalid],
        ["DAMT", [fields.DAMT.visible && fields.DAMT.required ? ew.Validators.required(fields.DAMT.caption) : null, ew.Validators.float], fields.DAMT.isInvalid],
        ["Mfg", [fields.Mfg.visible && fields.Mfg.required ? ew.Validators.required(fields.Mfg.caption) : null], fields.Mfg.isInvalid],
        ["EXPDT", [fields.EXPDT.visible && fields.EXPDT.required ? ew.Validators.required(fields.EXPDT.caption) : null, ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["BATCHNO", [fields.BATCHNO.visible && fields.BATCHNO.required ? ew.Validators.required(fields.BATCHNO.caption) : null], fields.BATCHNO.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["UR", [fields.UR.visible && fields.UR.required ? ew.Validators.required(fields.UR.caption) : null, ew.Validators.float], fields.UR.isInvalid],
        ["_USERID", [fields._USERID.visible && fields._USERID.required ? ew.Validators.required(fields._USERID.caption) : null], fields._USERID.isInvalid],
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["HosoID", [fields.HosoID.visible && fields.HosoID.required ? ew.Validators.required(fields.HosoID.caption) : null], fields.HosoID.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["BRNAME", [fields.BRNAME.visible && fields.BRNAME.required ? ew.Validators.required(fields.BRNAME.caption) : null], fields.BRNAME.isInvalid],
        ["baid", [fields.baid.visible && fields.baid.required ? ew.Validators.required(fields.baid.caption) : null, ew.Validators.integer], fields.baid.isInvalid],
        ["isdate", [fields.isdate.visible && fields.isdate.required ? ew.Validators.required(fields.isdate.caption) : null], fields.isdate.isInvalid],
        ["PSGST", [fields.PSGST.visible && fields.PSGST.required ? ew.Validators.required(fields.PSGST.caption) : null, ew.Validators.float], fields.PSGST.isInvalid],
        ["PCGST", [fields.PCGST.visible && fields.PCGST.required ? ew.Validators.required(fields.PCGST.caption) : null, ew.Validators.float], fields.PCGST.isInvalid],
        ["SSGST", [fields.SSGST.visible && fields.SSGST.required ? ew.Validators.required(fields.SSGST.caption) : null, ew.Validators.float], fields.SSGST.isInvalid],
        ["SCGST", [fields.SCGST.visible && fields.SCGST.required ? ew.Validators.required(fields.SCGST.caption) : null, ew.Validators.float], fields.SCGST.isInvalid],
        ["PurValue", [fields.PurValue.visible && fields.PurValue.required ? ew.Validators.required(fields.PurValue.caption) : null, ew.Validators.float], fields.PurValue.isInvalid],
        ["PurRate", [fields.PurRate.visible && fields.PurRate.required ? ew.Validators.required(fields.PurRate.caption) : null, ew.Validators.float], fields.PurRate.isInvalid],
        ["PUnit", [fields.PUnit.visible && fields.PUnit.required ? ew.Validators.required(fields.PUnit.caption) : null, ew.Validators.integer], fields.PUnit.isInvalid],
        ["SUnit", [fields.SUnit.visible && fields.SUnit.required ? ew.Validators.required(fields.SUnit.caption) : null, ew.Validators.integer], fields.SUnit.isInvalid],
        ["HSNCODE", [fields.HSNCODE.visible && fields.HSNCODE.required ? ew.Validators.required(fields.HSNCODE.caption) : null], fields.HSNCODE.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_pharledgrid,
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
    fpharmacy_pharledgrid.validate = function () {
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
    fpharmacy_pharledgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "SiNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SLNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Product", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IQ", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DAMT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Mfg", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EXPDT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BATCHNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PRC", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "UR", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "baid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PSGST", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PCGST", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SSGST", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SCGST", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PurValue", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PurRate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PUnit", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SUnit", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HSNCODE", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpharmacy_pharledgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_pharledgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_pharledgrid.lists.SLNO = <?= $Grid->SLNO->toClientList($Grid) ?>;
    loadjs.done("fpharmacy_pharledgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_pharled">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpharmacy_pharledgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pharmacy_pharled" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_pharmacy_pharledgrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->SiNo->Visible) { // SiNo ?>
        <th data-name="SiNo" class="<?= $Grid->SiNo->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo"><?= $Grid->renderSort($Grid->SiNo) ?></div></th>
<?php } ?>
<?php if ($Grid->SLNO->Visible) { // SLNO ?>
        <th data-name="SLNO" class="<?= $Grid->SLNO->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO"><?= $Grid->renderSort($Grid->SLNO) ?></div></th>
<?php } ?>
<?php if ($Grid->Product->Visible) { // Product ?>
        <th data-name="Product" class="<?= $Grid->Product->headerCellClass() ?>"><div id="elh_pharmacy_pharled_Product" class="pharmacy_pharled_Product"><?= $Grid->renderSort($Grid->Product) ?></div></th>
<?php } ?>
<?php if ($Grid->RT->Visible) { // RT ?>
        <th data-name="RT" class="<?= $Grid->RT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_RT" class="pharmacy_pharled_RT"><?= $Grid->renderSort($Grid->RT) ?></div></th>
<?php } ?>
<?php if ($Grid->IQ->Visible) { // IQ ?>
        <th data-name="IQ" class="<?= $Grid->IQ->headerCellClass() ?>"><div id="elh_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ"><?= $Grid->renderSort($Grid->IQ) ?></div></th>
<?php } ?>
<?php if ($Grid->DAMT->Visible) { // DAMT ?>
        <th data-name="DAMT" class="<?= $Grid->DAMT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT"><?= $Grid->renderSort($Grid->DAMT) ?></div></th>
<?php } ?>
<?php if ($Grid->Mfg->Visible) { // Mfg ?>
        <th data-name="Mfg" class="<?= $Grid->Mfg->headerCellClass() ?>"><div id="elh_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg"><?= $Grid->renderSort($Grid->Mfg) ?></div></th>
<?php } ?>
<?php if ($Grid->EXPDT->Visible) { // EXPDT ?>
        <th data-name="EXPDT" class="<?= $Grid->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT"><?= $Grid->renderSort($Grid->EXPDT) ?></div></th>
<?php } ?>
<?php if ($Grid->BATCHNO->Visible) { // BATCHNO ?>
        <th data-name="BATCHNO" class="<?= $Grid->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO"><?= $Grid->renderSort($Grid->BATCHNO) ?></div></th>
<?php } ?>
<?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Grid->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE"><?= $Grid->renderSort($Grid->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Grid->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Grid->PRC->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC"><?= $Grid->renderSort($Grid->PRC) ?></div></th>
<?php } ?>
<?php if ($Grid->UR->Visible) { // UR ?>
        <th data-name="UR" class="<?= $Grid->UR->headerCellClass() ?>"><div id="elh_pharmacy_pharled_UR" class="pharmacy_pharled_UR"><?= $Grid->renderSort($Grid->UR) ?></div></th>
<?php } ?>
<?php if ($Grid->_USERID->Visible) { // USERID ?>
        <th data-name="_USERID" class="<?= $Grid->_USERID->headerCellClass() ?>"><div id="elh_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID"><?= $Grid->renderSort($Grid->_USERID) ?></div></th>
<?php } ?>
<?php if ($Grid->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_pharmacy_pharled_id" class="pharmacy_pharled_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->HosoID->Visible) { // HosoID ?>
        <th data-name="HosoID" class="<?= $Grid->HosoID->headerCellClass() ?>"><div id="elh_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID"><?= $Grid->renderSort($Grid->HosoID) ?></div></th>
<?php } ?>
<?php if ($Grid->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Grid->createdby->headerCellClass() ?>"><div id="elh_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby"><?= $Grid->renderSort($Grid->createdby) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Grid->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby"><?= $Grid->renderSort($Grid->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Grid->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime"><?= $Grid->renderSort($Grid->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->BRNAME->Visible) { // BRNAME ?>
        <th data-name="BRNAME" class="<?= $Grid->BRNAME->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME"><?= $Grid->renderSort($Grid->BRNAME) ?></div></th>
<?php } ?>
<?php if ($Grid->baid->Visible) { // baid ?>
        <th data-name="baid" class="<?= $Grid->baid->headerCellClass() ?>"><div id="elh_pharmacy_pharled_baid" class="pharmacy_pharled_baid"><?= $Grid->renderSort($Grid->baid) ?></div></th>
<?php } ?>
<?php if ($Grid->isdate->Visible) { // isdate ?>
        <th data-name="isdate" class="<?= $Grid->isdate->headerCellClass() ?>"><div id="elh_pharmacy_pharled_isdate" class="pharmacy_pharled_isdate"><?= $Grid->renderSort($Grid->isdate) ?></div></th>
<?php } ?>
<?php if ($Grid->PSGST->Visible) { // PSGST ?>
        <th data-name="PSGST" class="<?= $Grid->PSGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PSGST" class="pharmacy_pharled_PSGST"><?= $Grid->renderSort($Grid->PSGST) ?></div></th>
<?php } ?>
<?php if ($Grid->PCGST->Visible) { // PCGST ?>
        <th data-name="PCGST" class="<?= $Grid->PCGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PCGST" class="pharmacy_pharled_PCGST"><?= $Grid->renderSort($Grid->PCGST) ?></div></th>
<?php } ?>
<?php if ($Grid->SSGST->Visible) { // SSGST ?>
        <th data-name="SSGST" class="<?= $Grid->SSGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SSGST" class="pharmacy_pharled_SSGST"><?= $Grid->renderSort($Grid->SSGST) ?></div></th>
<?php } ?>
<?php if ($Grid->SCGST->Visible) { // SCGST ?>
        <th data-name="SCGST" class="<?= $Grid->SCGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SCGST" class="pharmacy_pharled_SCGST"><?= $Grid->renderSort($Grid->SCGST) ?></div></th>
<?php } ?>
<?php if ($Grid->PurValue->Visible) { // PurValue ?>
        <th data-name="PurValue" class="<?= $Grid->PurValue->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PurValue" class="pharmacy_pharled_PurValue"><?= $Grid->renderSort($Grid->PurValue) ?></div></th>
<?php } ?>
<?php if ($Grid->PurRate->Visible) { // PurRate ?>
        <th data-name="PurRate" class="<?= $Grid->PurRate->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PurRate" class="pharmacy_pharled_PurRate"><?= $Grid->renderSort($Grid->PurRate) ?></div></th>
<?php } ?>
<?php if ($Grid->PUnit->Visible) { // PUnit ?>
        <th data-name="PUnit" class="<?= $Grid->PUnit->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PUnit" class="pharmacy_pharled_PUnit"><?= $Grid->renderSort($Grid->PUnit) ?></div></th>
<?php } ?>
<?php if ($Grid->SUnit->Visible) { // SUnit ?>
        <th data-name="SUnit" class="<?= $Grid->SUnit->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SUnit" class="pharmacy_pharled_SUnit"><?= $Grid->renderSort($Grid->SUnit) ?></div></th>
<?php } ?>
<?php if ($Grid->HSNCODE->Visible) { // HSNCODE ?>
        <th data-name="HSNCODE" class="<?= $Grid->HSNCODE->headerCellClass() ?>"><div id="elh_pharmacy_pharled_HSNCODE" class="pharmacy_pharled_HSNCODE"><?= $Grid->renderSort($Grid->HSNCODE) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_pharmacy_pharled", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->SiNo->Visible) { // SiNo ?>
        <td data-name="SiNo" <?= $Grid->SiNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SiNo" class="form-group">
<input type="<?= $Grid->SiNo->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?= $Grid->RowIndex ?>_SiNo" id="x<?= $Grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?= HtmlEncode($Grid->SiNo->getPlaceHolder()) ?>" value="<?= $Grid->SiNo->EditValue ?>"<?= $Grid->SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SiNo" id="o<?= $Grid->RowIndex ?>_SiNo" value="<?= HtmlEncode($Grid->SiNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SiNo" class="form-group">
<input type="<?= $Grid->SiNo->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?= $Grid->RowIndex ?>_SiNo" id="x<?= $Grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?= HtmlEncode($Grid->SiNo->getPlaceHolder()) ?>" value="<?= $Grid->SiNo->EditValue ?>"<?= $Grid->SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SiNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SiNo">
<span<?= $Grid->SiNo->viewAttributes() ?>>
<?= $Grid->SiNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_SiNo" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_SiNo" value="<?= HtmlEncode($Grid->SiNo->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_SiNo" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_SiNo" value="<?= HtmlEncode($Grid->SiNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SLNO->Visible) { // SLNO ?>
        <td data-name="SLNO" <?= $Grid->SLNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SLNO" class="form-group">
<?php
$onchange = $Grid->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_SLNO" class="ew-auto-suggest">
    <input type="<?= $Grid->SLNO->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_SLNO" id="sv_x<?= $Grid->RowIndex ?>_SLNO" value="<?= RemoveHtml($Grid->SLNO->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->SLNO->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->SLNO->getPlaceHolder()) ?>"<?= $Grid->SLNO->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_pharled" data-field="x_SLNO" data-input="sv_x<?= $Grid->RowIndex ?>_SLNO" data-value-separator="<?= $Grid->SLNO->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_SLNO" id="x<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->SLNO->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_pharledgrid"], function() {
    fpharmacy_pharledgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_SLNO","forceSelect":true}, ew.vars.tables.pharmacy_pharled.fields.SLNO.autoSuggestOptions));
});
</script>
<?= $Grid->SLNO->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SLNO" id="o<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SLNO" class="form-group">
<?php
$onchange = $Grid->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_SLNO" class="ew-auto-suggest">
    <input type="<?= $Grid->SLNO->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_SLNO" id="sv_x<?= $Grid->RowIndex ?>_SLNO" value="<?= RemoveHtml($Grid->SLNO->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->SLNO->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->SLNO->getPlaceHolder()) ?>"<?= $Grid->SLNO->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_pharled" data-field="x_SLNO" data-input="sv_x<?= $Grid->RowIndex ?>_SLNO" data-value-separator="<?= $Grid->SLNO->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_SLNO" id="x<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->SLNO->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_pharledgrid"], function() {
    fpharmacy_pharledgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_SLNO","forceSelect":true}, ew.vars.tables.pharmacy_pharled.fields.SLNO.autoSuggestOptions));
});
</script>
<?= $Grid->SLNO->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_SLNO") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SLNO">
<span<?= $Grid->SLNO->viewAttributes() ?>>
<?= $Grid->SLNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_SLNO" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_SLNO" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Product->Visible) { // Product ?>
        <td data-name="Product" <?= $Grid->Product->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_Product" class="form-group">
<input type="<?= $Grid->Product->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_Product" name="x<?= $Grid->RowIndex ?>_Product" id="x<?= $Grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->Product->getPlaceHolder()) ?>" value="<?= $Grid->Product->EditValue ?>"<?= $Grid->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Product->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Product" id="o<?= $Grid->RowIndex ?>_Product" value="<?= HtmlEncode($Grid->Product->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_Product" class="form-group">
<input type="<?= $Grid->Product->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_Product" name="x<?= $Grid->RowIndex ?>_Product" id="x<?= $Grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->Product->getPlaceHolder()) ?>" value="<?= $Grid->Product->EditValue ?>"<?= $Grid->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Product->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_Product">
<span<?= $Grid->Product->viewAttributes() ?>>
<?= $Grid->Product->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_Product" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_Product" value="<?= HtmlEncode($Grid->Product->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_Product" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_Product" value="<?= HtmlEncode($Grid->Product->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RT->Visible) { // RT ?>
        <td data-name="RT" <?= $Grid->RT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_RT" class="form-group">
<input type="<?= $Grid->RT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_RT" name="x<?= $Grid->RowIndex ?>_RT" id="x<?= $Grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->RT->getPlaceHolder()) ?>" value="<?= $Grid->RT->EditValue ?>"<?= $Grid->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RT" id="o<?= $Grid->RowIndex ?>_RT" value="<?= HtmlEncode($Grid->RT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_RT" class="form-group">
<input type="<?= $Grid->RT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_RT" name="x<?= $Grid->RowIndex ?>_RT" id="x<?= $Grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->RT->getPlaceHolder()) ?>" value="<?= $Grid->RT->EditValue ?>"<?= $Grid->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_RT">
<span<?= $Grid->RT->viewAttributes() ?>>
<?= $Grid->RT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_RT" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_RT" value="<?= HtmlEncode($Grid->RT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_RT" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_RT" value="<?= HtmlEncode($Grid->RT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->IQ->Visible) { // IQ ?>
        <td data-name="IQ" <?= $Grid->IQ->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_IQ" class="form-group">
<input type="<?= $Grid->IQ->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?= $Grid->RowIndex ?>_IQ" id="x<?= $Grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->IQ->getPlaceHolder()) ?>" value="<?= $Grid->IQ->EditValue ?>"<?= $Grid->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IQ" id="o<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_IQ" class="form-group">
<input type="<?= $Grid->IQ->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?= $Grid->RowIndex ?>_IQ" id="x<?= $Grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->IQ->getPlaceHolder()) ?>" value="<?= $Grid->IQ->EditValue ?>"<?= $Grid->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IQ->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_IQ">
<span<?= $Grid->IQ->viewAttributes() ?>>
<?= $Grid->IQ->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_IQ" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_IQ" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DAMT->Visible) { // DAMT ?>
        <td data-name="DAMT" <?= $Grid->DAMT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_DAMT" class="form-group">
<input type="<?= $Grid->DAMT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?= $Grid->RowIndex ?>_DAMT" id="x<?= $Grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->DAMT->getPlaceHolder()) ?>" value="<?= $Grid->DAMT->EditValue ?>"<?= $Grid->DAMT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DAMT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DAMT" id="o<?= $Grid->RowIndex ?>_DAMT" value="<?= HtmlEncode($Grid->DAMT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_DAMT" class="form-group">
<input type="<?= $Grid->DAMT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?= $Grid->RowIndex ?>_DAMT" id="x<?= $Grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->DAMT->getPlaceHolder()) ?>" value="<?= $Grid->DAMT->EditValue ?>"<?= $Grid->DAMT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DAMT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_DAMT">
<span<?= $Grid->DAMT->viewAttributes() ?>>
<?= $Grid->DAMT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_DAMT" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_DAMT" value="<?= HtmlEncode($Grid->DAMT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_DAMT" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_DAMT" value="<?= HtmlEncode($Grid->DAMT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Mfg->Visible) { // Mfg ?>
        <td data-name="Mfg" <?= $Grid->Mfg->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_Mfg" class="form-group">
<input type="<?= $Grid->Mfg->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?= $Grid->RowIndex ?>_Mfg" id="x<?= $Grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->Mfg->getPlaceHolder()) ?>" value="<?= $Grid->Mfg->EditValue ?>"<?= $Grid->Mfg->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mfg->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Mfg" id="o<?= $Grid->RowIndex ?>_Mfg" value="<?= HtmlEncode($Grid->Mfg->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_Mfg" class="form-group">
<input type="<?= $Grid->Mfg->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?= $Grid->RowIndex ?>_Mfg" id="x<?= $Grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->Mfg->getPlaceHolder()) ?>" value="<?= $Grid->Mfg->EditValue ?>"<?= $Grid->Mfg->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mfg->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_Mfg">
<span<?= $Grid->Mfg->viewAttributes() ?>>
<?= $Grid->Mfg->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_Mfg" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_Mfg" value="<?= HtmlEncode($Grid->Mfg->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_Mfg" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_Mfg" value="<?= HtmlEncode($Grid->Mfg->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT" <?= $Grid->EXPDT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_EXPDT" class="form-group">
<input type="<?= $Grid->EXPDT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?= $Grid->RowIndex ?>_EXPDT" id="x<?= $Grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Grid->EXPDT->getPlaceHolder()) ?>" value="<?= $Grid->EXPDT->EditValue ?>"<?= $Grid->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EXPDT->getErrorMessage() ?></div>
<?php if (!$Grid->EXPDT->ReadOnly && !$Grid->EXPDT->Disabled && !isset($Grid->EXPDT->EditAttrs["readonly"]) && !isset($Grid->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_pharledgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_pharledgrid", "x<?= $Grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EXPDT" id="o<?= $Grid->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Grid->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_EXPDT" class="form-group">
<input type="<?= $Grid->EXPDT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?= $Grid->RowIndex ?>_EXPDT" id="x<?= $Grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Grid->EXPDT->getPlaceHolder()) ?>" value="<?= $Grid->EXPDT->EditValue ?>"<?= $Grid->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EXPDT->getErrorMessage() ?></div>
<?php if (!$Grid->EXPDT->ReadOnly && !$Grid->EXPDT->Disabled && !isset($Grid->EXPDT->EditAttrs["readonly"]) && !isset($Grid->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_pharledgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_pharledgrid", "x<?= $Grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_EXPDT">
<span<?= $Grid->EXPDT->viewAttributes() ?>>
<?= $Grid->EXPDT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_EXPDT" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Grid->EXPDT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_EXPDT" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Grid->EXPDT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO" <?= $Grid->BATCHNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_BATCHNO" class="form-group">
<input type="<?= $Grid->BATCHNO->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?= $Grid->RowIndex ?>_BATCHNO" id="x<?= $Grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->BATCHNO->getPlaceHolder()) ?>" value="<?= $Grid->BATCHNO->EditValue ?>"<?= $Grid->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BATCHNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BATCHNO" id="o<?= $Grid->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Grid->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_BATCHNO" class="form-group">
<input type="<?= $Grid->BATCHNO->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?= $Grid->RowIndex ?>_BATCHNO" id="x<?= $Grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->BATCHNO->getPlaceHolder()) ?>" value="<?= $Grid->BATCHNO->EditValue ?>"<?= $Grid->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BATCHNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_BATCHNO">
<span<?= $Grid->BATCHNO->viewAttributes() ?>>
<?= $Grid->BATCHNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_BATCHNO" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Grid->BATCHNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_BATCHNO" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Grid->BATCHNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Grid->BRCODE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRCODE" id="o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_BRCODE">
<span<?= $Grid->BRCODE->viewAttributes() ?>>
<?= $Grid->BRCODE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_BRCODE" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_BRCODE" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Grid->PRC->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PRC" class="form-group">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PRC" id="o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PRC" class="form-group">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PRC">
<span<?= $Grid->PRC->viewAttributes() ?>>
<?= $Grid->PRC->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_PRC" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_PRC" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->UR->Visible) { // UR ?>
        <td data-name="UR" <?= $Grid->UR->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_UR" class="form-group">
<input type="<?= $Grid->UR->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_UR" name="x<?= $Grid->RowIndex ?>_UR" id="x<?= $Grid->RowIndex ?>_UR" size="30" placeholder="<?= HtmlEncode($Grid->UR->getPlaceHolder()) ?>" value="<?= $Grid->UR->EditValue ?>"<?= $Grid->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->UR->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" data-hidden="1" name="o<?= $Grid->RowIndex ?>_UR" id="o<?= $Grid->RowIndex ?>_UR" value="<?= HtmlEncode($Grid->UR->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_UR" class="form-group">
<input type="<?= $Grid->UR->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_UR" name="x<?= $Grid->RowIndex ?>_UR" id="x<?= $Grid->RowIndex ?>_UR" size="30" placeholder="<?= HtmlEncode($Grid->UR->getPlaceHolder()) ?>" value="<?= $Grid->UR->EditValue ?>"<?= $Grid->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->UR->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_UR">
<span<?= $Grid->UR->viewAttributes() ?>>
<?= $Grid->UR->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_UR" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_UR" value="<?= HtmlEncode($Grid->UR->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_UR" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_UR" value="<?= HtmlEncode($Grid->UR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->_USERID->Visible) { // USERID ?>
        <td data-name="_USERID" <?= $Grid->_USERID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" data-hidden="1" name="o<?= $Grid->RowIndex ?>__USERID" id="o<?= $Grid->RowIndex ?>__USERID" value="<?= HtmlEncode($Grid->_USERID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled__USERID">
<span<?= $Grid->_USERID->viewAttributes() ?>>
<?= $Grid->_USERID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>__USERID" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>__USERID" value="<?= HtmlEncode($Grid->_USERID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>__USERID" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>__USERID" value="<?= HtmlEncode($Grid->_USERID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id" <?= $Grid->id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_id" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_id" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="pharmacy_pharled" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID" <?= $Grid->HosoID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HosoID" id="o<?= $Grid->RowIndex ?>_HosoID" value="<?= HtmlEncode($Grid->HosoID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_HosoID">
<span<?= $Grid->HosoID->viewAttributes() ?>>
<?= $Grid->HosoID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_HosoID" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_HosoID" value="<?= HtmlEncode($Grid->HosoID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_HosoID" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_HosoID" value="<?= HtmlEncode($Grid->HosoID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Grid->createdby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<?= $Grid->createdby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_createdby" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_createdby" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_createddatetime" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_createddatetime" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Grid->modifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<?= $Grid->modifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_modifiedby" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_modifiedby" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Grid->modifieddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<?= $Grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BRNAME->Visible) { // BRNAME ?>
        <td data-name="BRNAME" <?= $Grid->BRNAME->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRNAME" id="o<?= $Grid->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Grid->BRNAME->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_BRNAME">
<span<?= $Grid->BRNAME->viewAttributes() ?>>
<?= $Grid->BRNAME->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_BRNAME" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Grid->BRNAME->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_BRNAME" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Grid->BRNAME->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->baid->Visible) { // baid ?>
        <td data-name="baid" <?= $Grid->baid->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_baid" class="form-group">
<input type="<?= $Grid->baid->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_baid" name="x<?= $Grid->RowIndex ?>_baid" id="x<?= $Grid->RowIndex ?>_baid" size="30" placeholder="<?= HtmlEncode($Grid->baid->getPlaceHolder()) ?>" value="<?= $Grid->baid->EditValue ?>"<?= $Grid->baid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->baid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_baid" id="o<?= $Grid->RowIndex ?>_baid" value="<?= HtmlEncode($Grid->baid->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_baid" class="form-group">
<input type="<?= $Grid->baid->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_baid" name="x<?= $Grid->RowIndex ?>_baid" id="x<?= $Grid->RowIndex ?>_baid" size="30" placeholder="<?= HtmlEncode($Grid->baid->getPlaceHolder()) ?>" value="<?= $Grid->baid->EditValue ?>"<?= $Grid->baid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->baid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_baid">
<span<?= $Grid->baid->viewAttributes() ?>>
<?= $Grid->baid->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_baid" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_baid" value="<?= HtmlEncode($Grid->baid->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_baid" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_baid" value="<?= HtmlEncode($Grid->baid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->isdate->Visible) { // isdate ?>
        <td data-name="isdate" <?= $Grid->isdate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_isdate" id="o<?= $Grid->RowIndex ?>_isdate" value="<?= HtmlEncode($Grid->isdate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_isdate">
<span<?= $Grid->isdate->viewAttributes() ?>>
<?= $Grid->isdate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_isdate" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_isdate" value="<?= HtmlEncode($Grid->isdate->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_isdate" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_isdate" value="<?= HtmlEncode($Grid->isdate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST" <?= $Grid->PSGST->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PSGST" class="form-group">
<input type="<?= $Grid->PSGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PSGST" name="x<?= $Grid->RowIndex ?>_PSGST" id="x<?= $Grid->RowIndex ?>_PSGST" size="30" placeholder="<?= HtmlEncode($Grid->PSGST->getPlaceHolder()) ?>" value="<?= $Grid->PSGST->EditValue ?>"<?= $Grid->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PSGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PSGST" id="o<?= $Grid->RowIndex ?>_PSGST" value="<?= HtmlEncode($Grid->PSGST->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PSGST" class="form-group">
<input type="<?= $Grid->PSGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PSGST" name="x<?= $Grid->RowIndex ?>_PSGST" id="x<?= $Grid->RowIndex ?>_PSGST" size="30" placeholder="<?= HtmlEncode($Grid->PSGST->getPlaceHolder()) ?>" value="<?= $Grid->PSGST->EditValue ?>"<?= $Grid->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PSGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PSGST">
<span<?= $Grid->PSGST->viewAttributes() ?>>
<?= $Grid->PSGST->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_PSGST" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_PSGST" value="<?= HtmlEncode($Grid->PSGST->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_PSGST" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_PSGST" value="<?= HtmlEncode($Grid->PSGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST" <?= $Grid->PCGST->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PCGST" class="form-group">
<input type="<?= $Grid->PCGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PCGST" name="x<?= $Grid->RowIndex ?>_PCGST" id="x<?= $Grid->RowIndex ?>_PCGST" size="30" placeholder="<?= HtmlEncode($Grid->PCGST->getPlaceHolder()) ?>" value="<?= $Grid->PCGST->EditValue ?>"<?= $Grid->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PCGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PCGST" id="o<?= $Grid->RowIndex ?>_PCGST" value="<?= HtmlEncode($Grid->PCGST->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PCGST" class="form-group">
<input type="<?= $Grid->PCGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PCGST" name="x<?= $Grid->RowIndex ?>_PCGST" id="x<?= $Grid->RowIndex ?>_PCGST" size="30" placeholder="<?= HtmlEncode($Grid->PCGST->getPlaceHolder()) ?>" value="<?= $Grid->PCGST->EditValue ?>"<?= $Grid->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PCGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PCGST">
<span<?= $Grid->PCGST->viewAttributes() ?>>
<?= $Grid->PCGST->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_PCGST" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_PCGST" value="<?= HtmlEncode($Grid->PCGST->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_PCGST" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_PCGST" value="<?= HtmlEncode($Grid->PCGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" <?= $Grid->SSGST->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SSGST" class="form-group">
<input type="<?= $Grid->SSGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SSGST" name="x<?= $Grid->RowIndex ?>_SSGST" id="x<?= $Grid->RowIndex ?>_SSGST" size="30" placeholder="<?= HtmlEncode($Grid->SSGST->getPlaceHolder()) ?>" value="<?= $Grid->SSGST->EditValue ?>"<?= $Grid->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SSGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SSGST" id="o<?= $Grid->RowIndex ?>_SSGST" value="<?= HtmlEncode($Grid->SSGST->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SSGST" class="form-group">
<input type="<?= $Grid->SSGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SSGST" name="x<?= $Grid->RowIndex ?>_SSGST" id="x<?= $Grid->RowIndex ?>_SSGST" size="30" placeholder="<?= HtmlEncode($Grid->SSGST->getPlaceHolder()) ?>" value="<?= $Grid->SSGST->EditValue ?>"<?= $Grid->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SSGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SSGST">
<span<?= $Grid->SSGST->viewAttributes() ?>>
<?= $Grid->SSGST->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_SSGST" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_SSGST" value="<?= HtmlEncode($Grid->SSGST->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_SSGST" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_SSGST" value="<?= HtmlEncode($Grid->SSGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" <?= $Grid->SCGST->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SCGST" class="form-group">
<input type="<?= $Grid->SCGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SCGST" name="x<?= $Grid->RowIndex ?>_SCGST" id="x<?= $Grid->RowIndex ?>_SCGST" size="30" placeholder="<?= HtmlEncode($Grid->SCGST->getPlaceHolder()) ?>" value="<?= $Grid->SCGST->EditValue ?>"<?= $Grid->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SCGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SCGST" id="o<?= $Grid->RowIndex ?>_SCGST" value="<?= HtmlEncode($Grid->SCGST->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SCGST" class="form-group">
<input type="<?= $Grid->SCGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SCGST" name="x<?= $Grid->RowIndex ?>_SCGST" id="x<?= $Grid->RowIndex ?>_SCGST" size="30" placeholder="<?= HtmlEncode($Grid->SCGST->getPlaceHolder()) ?>" value="<?= $Grid->SCGST->EditValue ?>"<?= $Grid->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SCGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SCGST">
<span<?= $Grid->SCGST->viewAttributes() ?>>
<?= $Grid->SCGST->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_SCGST" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_SCGST" value="<?= HtmlEncode($Grid->SCGST->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_SCGST" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_SCGST" value="<?= HtmlEncode($Grid->SCGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue" <?= $Grid->PurValue->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PurValue" class="form-group">
<input type="<?= $Grid->PurValue->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PurValue" name="x<?= $Grid->RowIndex ?>_PurValue" id="x<?= $Grid->RowIndex ?>_PurValue" size="30" placeholder="<?= HtmlEncode($Grid->PurValue->getPlaceHolder()) ?>" value="<?= $Grid->PurValue->EditValue ?>"<?= $Grid->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PurValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PurValue" id="o<?= $Grid->RowIndex ?>_PurValue" value="<?= HtmlEncode($Grid->PurValue->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PurValue" class="form-group">
<input type="<?= $Grid->PurValue->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PurValue" name="x<?= $Grid->RowIndex ?>_PurValue" id="x<?= $Grid->RowIndex ?>_PurValue" size="30" placeholder="<?= HtmlEncode($Grid->PurValue->getPlaceHolder()) ?>" value="<?= $Grid->PurValue->EditValue ?>"<?= $Grid->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PurValue->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PurValue">
<span<?= $Grid->PurValue->viewAttributes() ?>>
<?= $Grid->PurValue->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_PurValue" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_PurValue" value="<?= HtmlEncode($Grid->PurValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_PurValue" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_PurValue" value="<?= HtmlEncode($Grid->PurValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PurRate->Visible) { // PurRate ?>
        <td data-name="PurRate" <?= $Grid->PurRate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PurRate" class="form-group">
<input type="<?= $Grid->PurRate->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PurRate" name="x<?= $Grid->RowIndex ?>_PurRate" id="x<?= $Grid->RowIndex ?>_PurRate" size="30" placeholder="<?= HtmlEncode($Grid->PurRate->getPlaceHolder()) ?>" value="<?= $Grid->PurRate->EditValue ?>"<?= $Grid->PurRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PurRate->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PurRate" id="o<?= $Grid->RowIndex ?>_PurRate" value="<?= HtmlEncode($Grid->PurRate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PurRate" class="form-group">
<input type="<?= $Grid->PurRate->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PurRate" name="x<?= $Grid->RowIndex ?>_PurRate" id="x<?= $Grid->RowIndex ?>_PurRate" size="30" placeholder="<?= HtmlEncode($Grid->PurRate->getPlaceHolder()) ?>" value="<?= $Grid->PurRate->EditValue ?>"<?= $Grid->PurRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PurRate->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PurRate">
<span<?= $Grid->PurRate->viewAttributes() ?>>
<?= $Grid->PurRate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_PurRate" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_PurRate" value="<?= HtmlEncode($Grid->PurRate->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_PurRate" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_PurRate" value="<?= HtmlEncode($Grid->PurRate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit" <?= $Grid->PUnit->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PUnit" class="form-group">
<input type="<?= $Grid->PUnit->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PUnit" name="x<?= $Grid->RowIndex ?>_PUnit" id="x<?= $Grid->RowIndex ?>_PUnit" size="30" placeholder="<?= HtmlEncode($Grid->PUnit->getPlaceHolder()) ?>" value="<?= $Grid->PUnit->EditValue ?>"<?= $Grid->PUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PUnit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PUnit" id="o<?= $Grid->RowIndex ?>_PUnit" value="<?= HtmlEncode($Grid->PUnit->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PUnit" class="form-group">
<input type="<?= $Grid->PUnit->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PUnit" name="x<?= $Grid->RowIndex ?>_PUnit" id="x<?= $Grid->RowIndex ?>_PUnit" size="30" placeholder="<?= HtmlEncode($Grid->PUnit->getPlaceHolder()) ?>" value="<?= $Grid->PUnit->EditValue ?>"<?= $Grid->PUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PUnit->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_PUnit">
<span<?= $Grid->PUnit->viewAttributes() ?>>
<?= $Grid->PUnit->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_PUnit" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_PUnit" value="<?= HtmlEncode($Grid->PUnit->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_PUnit" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_PUnit" value="<?= HtmlEncode($Grid->PUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SUnit->Visible) { // SUnit ?>
        <td data-name="SUnit" <?= $Grid->SUnit->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SUnit" class="form-group">
<input type="<?= $Grid->SUnit->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SUnit" name="x<?= $Grid->RowIndex ?>_SUnit" id="x<?= $Grid->RowIndex ?>_SUnit" size="30" placeholder="<?= HtmlEncode($Grid->SUnit->getPlaceHolder()) ?>" value="<?= $Grid->SUnit->EditValue ?>"<?= $Grid->SUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SUnit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SUnit" id="o<?= $Grid->RowIndex ?>_SUnit" value="<?= HtmlEncode($Grid->SUnit->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SUnit" class="form-group">
<input type="<?= $Grid->SUnit->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SUnit" name="x<?= $Grid->RowIndex ?>_SUnit" id="x<?= $Grid->RowIndex ?>_SUnit" size="30" placeholder="<?= HtmlEncode($Grid->SUnit->getPlaceHolder()) ?>" value="<?= $Grid->SUnit->EditValue ?>"<?= $Grid->SUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SUnit->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_SUnit">
<span<?= $Grid->SUnit->viewAttributes() ?>>
<?= $Grid->SUnit->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_SUnit" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_SUnit" value="<?= HtmlEncode($Grid->SUnit->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_SUnit" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_SUnit" value="<?= HtmlEncode($Grid->SUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HSNCODE->Visible) { // HSNCODE ?>
        <td data-name="HSNCODE" <?= $Grid->HSNCODE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_HSNCODE" class="form-group">
<input type="<?= $Grid->HSNCODE->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x<?= $Grid->RowIndex ?>_HSNCODE" id="x<?= $Grid->RowIndex ?>_HSNCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->HSNCODE->getPlaceHolder()) ?>" value="<?= $Grid->HSNCODE->EditValue ?>"<?= $Grid->HSNCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HSNCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HSNCODE" id="o<?= $Grid->RowIndex ?>_HSNCODE" value="<?= HtmlEncode($Grid->HSNCODE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_HSNCODE" class="form-group">
<input type="<?= $Grid->HSNCODE->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x<?= $Grid->RowIndex ?>_HSNCODE" id="x<?= $Grid->RowIndex ?>_HSNCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->HSNCODE->getPlaceHolder()) ?>" value="<?= $Grid->HSNCODE->EditValue ?>"<?= $Grid->HSNCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HSNCODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_pharled_HSNCODE">
<span<?= $Grid->HSNCODE->viewAttributes() ?>>
<?= $Grid->HSNCODE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" data-hidden="1" name="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_HSNCODE" id="fpharmacy_pharledgrid$x<?= $Grid->RowIndex ?>_HSNCODE" value="<?= HtmlEncode($Grid->HSNCODE->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" data-hidden="1" name="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_HSNCODE" id="fpharmacy_pharledgrid$o<?= $Grid->RowIndex ?>_HSNCODE" value="<?= HtmlEncode($Grid->HSNCODE->OldValue) ?>">
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
loadjs.ready(["fpharmacy_pharledgrid","load"], function () {
    fpharmacy_pharledgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_pharmacy_pharled", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->SiNo->Visible) { // SiNo ?>
        <td data-name="SiNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_SiNo" class="form-group pharmacy_pharled_SiNo">
<input type="<?= $Grid->SiNo->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?= $Grid->RowIndex ?>_SiNo" id="x<?= $Grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?= HtmlEncode($Grid->SiNo->getPlaceHolder()) ?>" value="<?= $Grid->SiNo->EditValue ?>"<?= $Grid->SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SiNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_SiNo" class="form-group pharmacy_pharled_SiNo">
<span<?= $Grid->SiNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SiNo->getDisplayValue($Grid->SiNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SiNo" id="x<?= $Grid->RowIndex ?>_SiNo" value="<?= HtmlEncode($Grid->SiNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SiNo" id="o<?= $Grid->RowIndex ?>_SiNo" value="<?= HtmlEncode($Grid->SiNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SLNO->Visible) { // SLNO ?>
        <td data-name="SLNO">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_SLNO" class="form-group pharmacy_pharled_SLNO">
<?php
$onchange = $Grid->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_SLNO" class="ew-auto-suggest">
    <input type="<?= $Grid->SLNO->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_SLNO" id="sv_x<?= $Grid->RowIndex ?>_SLNO" value="<?= RemoveHtml($Grid->SLNO->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->SLNO->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->SLNO->getPlaceHolder()) ?>"<?= $Grid->SLNO->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_pharled" data-field="x_SLNO" data-input="sv_x<?= $Grid->RowIndex ?>_SLNO" data-value-separator="<?= $Grid->SLNO->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_SLNO" id="x<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->SLNO->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_pharledgrid"], function() {
    fpharmacy_pharledgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_SLNO","forceSelect":true}, ew.vars.tables.pharmacy_pharled.fields.SLNO.autoSuggestOptions));
});
</script>
<?= $Grid->SLNO->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_SLNO") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_SLNO" class="form-group pharmacy_pharled_SLNO">
<span<?= $Grid->SLNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SLNO->getDisplayValue($Grid->SLNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SLNO" id="x<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SLNO" id="o<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Product->Visible) { // Product ?>
        <td data-name="Product">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_Product" class="form-group pharmacy_pharled_Product">
<input type="<?= $Grid->Product->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_Product" name="x<?= $Grid->RowIndex ?>_Product" id="x<?= $Grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->Product->getPlaceHolder()) ?>" value="<?= $Grid->Product->EditValue ?>"<?= $Grid->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Product->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_Product" class="form-group pharmacy_pharled_Product">
<span<?= $Grid->Product->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Product->getDisplayValue($Grid->Product->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Product" id="x<?= $Grid->RowIndex ?>_Product" value="<?= HtmlEncode($Grid->Product->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Product" id="o<?= $Grid->RowIndex ?>_Product" value="<?= HtmlEncode($Grid->Product->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RT->Visible) { // RT ?>
        <td data-name="RT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_RT" class="form-group pharmacy_pharled_RT">
<input type="<?= $Grid->RT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_RT" name="x<?= $Grid->RowIndex ?>_RT" id="x<?= $Grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->RT->getPlaceHolder()) ?>" value="<?= $Grid->RT->EditValue ?>"<?= $Grid->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_RT" class="form-group pharmacy_pharled_RT">
<span<?= $Grid->RT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RT->getDisplayValue($Grid->RT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RT" id="x<?= $Grid->RowIndex ?>_RT" value="<?= HtmlEncode($Grid->RT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RT" id="o<?= $Grid->RowIndex ?>_RT" value="<?= HtmlEncode($Grid->RT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->IQ->Visible) { // IQ ?>
        <td data-name="IQ">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_IQ" class="form-group pharmacy_pharled_IQ">
<input type="<?= $Grid->IQ->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?= $Grid->RowIndex ?>_IQ" id="x<?= $Grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->IQ->getPlaceHolder()) ?>" value="<?= $Grid->IQ->EditValue ?>"<?= $Grid->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IQ->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_IQ" class="form-group pharmacy_pharled_IQ">
<span<?= $Grid->IQ->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->IQ->getDisplayValue($Grid->IQ->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" data-hidden="1" name="x<?= $Grid->RowIndex ?>_IQ" id="x<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IQ" id="o<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DAMT->Visible) { // DAMT ?>
        <td data-name="DAMT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_DAMT" class="form-group pharmacy_pharled_DAMT">
<input type="<?= $Grid->DAMT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?= $Grid->RowIndex ?>_DAMT" id="x<?= $Grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->DAMT->getPlaceHolder()) ?>" value="<?= $Grid->DAMT->EditValue ?>"<?= $Grid->DAMT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DAMT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_DAMT" class="form-group pharmacy_pharled_DAMT">
<span<?= $Grid->DAMT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DAMT->getDisplayValue($Grid->DAMT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DAMT" id="x<?= $Grid->RowIndex ?>_DAMT" value="<?= HtmlEncode($Grid->DAMT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DAMT" id="o<?= $Grid->RowIndex ?>_DAMT" value="<?= HtmlEncode($Grid->DAMT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Mfg->Visible) { // Mfg ?>
        <td data-name="Mfg">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_Mfg" class="form-group pharmacy_pharled_Mfg">
<input type="<?= $Grid->Mfg->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?= $Grid->RowIndex ?>_Mfg" id="x<?= $Grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->Mfg->getPlaceHolder()) ?>" value="<?= $Grid->Mfg->EditValue ?>"<?= $Grid->Mfg->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mfg->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_Mfg" class="form-group pharmacy_pharled_Mfg">
<span<?= $Grid->Mfg->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Mfg->getDisplayValue($Grid->Mfg->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Mfg" id="x<?= $Grid->RowIndex ?>_Mfg" value="<?= HtmlEncode($Grid->Mfg->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Mfg" id="o<?= $Grid->RowIndex ?>_Mfg" value="<?= HtmlEncode($Grid->Mfg->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_EXPDT" class="form-group pharmacy_pharled_EXPDT">
<input type="<?= $Grid->EXPDT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?= $Grid->RowIndex ?>_EXPDT" id="x<?= $Grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Grid->EXPDT->getPlaceHolder()) ?>" value="<?= $Grid->EXPDT->EditValue ?>"<?= $Grid->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EXPDT->getErrorMessage() ?></div>
<?php if (!$Grid->EXPDT->ReadOnly && !$Grid->EXPDT->Disabled && !isset($Grid->EXPDT->EditAttrs["readonly"]) && !isset($Grid->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_pharledgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_pharledgrid", "x<?= $Grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_EXPDT" class="form-group pharmacy_pharled_EXPDT">
<span<?= $Grid->EXPDT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EXPDT->getDisplayValue($Grid->EXPDT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EXPDT" id="x<?= $Grid->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Grid->EXPDT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EXPDT" id="o<?= $Grid->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Grid->EXPDT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_BATCHNO" class="form-group pharmacy_pharled_BATCHNO">
<input type="<?= $Grid->BATCHNO->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?= $Grid->RowIndex ?>_BATCHNO" id="x<?= $Grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->BATCHNO->getPlaceHolder()) ?>" value="<?= $Grid->BATCHNO->EditValue ?>"<?= $Grid->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BATCHNO->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_BATCHNO" class="form-group pharmacy_pharled_BATCHNO">
<span<?= $Grid->BATCHNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BATCHNO->getDisplayValue($Grid->BATCHNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BATCHNO" id="x<?= $Grid->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Grid->BATCHNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BATCHNO" id="o<?= $Grid->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Grid->BATCHNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_BRCODE" class="form-group pharmacy_pharled_BRCODE">
<span<?= $Grid->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BRCODE->getDisplayValue($Grid->BRCODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BRCODE" id="x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRCODE" id="o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_PRC" class="form-group pharmacy_pharled_PRC">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_PRC" class="form-group pharmacy_pharled_PRC">
<span<?= $Grid->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PRC->getDisplayValue($Grid->PRC->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PRC" id="o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->UR->Visible) { // UR ?>
        <td data-name="UR">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_UR" class="form-group pharmacy_pharled_UR">
<input type="<?= $Grid->UR->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_UR" name="x<?= $Grid->RowIndex ?>_UR" id="x<?= $Grid->RowIndex ?>_UR" size="30" placeholder="<?= HtmlEncode($Grid->UR->getPlaceHolder()) ?>" value="<?= $Grid->UR->EditValue ?>"<?= $Grid->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->UR->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_UR" class="form-group pharmacy_pharled_UR">
<span<?= $Grid->UR->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->UR->getDisplayValue($Grid->UR->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" data-hidden="1" name="x<?= $Grid->RowIndex ?>_UR" id="x<?= $Grid->RowIndex ?>_UR" value="<?= HtmlEncode($Grid->UR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" data-hidden="1" name="o<?= $Grid->RowIndex ?>_UR" id="o<?= $Grid->RowIndex ?>_UR" value="<?= HtmlEncode($Grid->UR->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->_USERID->Visible) { // USERID ?>
        <td data-name="_USERID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled__USERID" class="form-group pharmacy_pharled__USERID">
<span<?= $Grid->_USERID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->_USERID->getDisplayValue($Grid->_USERID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" data-hidden="1" name="x<?= $Grid->RowIndex ?>__USERID" id="x<?= $Grid->RowIndex ?>__USERID" value="<?= HtmlEncode($Grid->_USERID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" data-hidden="1" name="o<?= $Grid->RowIndex ?>__USERID" id="o<?= $Grid->RowIndex ?>__USERID" value="<?= HtmlEncode($Grid->_USERID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_id" class="form-group pharmacy_pharled_id"></span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_id" class="form-group pharmacy_pharled_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_HosoID" class="form-group pharmacy_pharled_HosoID">
<span<?= $Grid->HosoID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HosoID->getDisplayValue($Grid->HosoID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HosoID" id="x<?= $Grid->RowIndex ?>_HosoID" value="<?= HtmlEncode($Grid->HosoID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HosoID" id="o<?= $Grid->RowIndex ?>_HosoID" value="<?= HtmlEncode($Grid->HosoID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_createdby" class="form-group pharmacy_pharled_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdby->getDisplayValue($Grid->createdby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_createddatetime" class="form-group pharmacy_pharled_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_modifiedby" class="form-group pharmacy_pharled_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifiedby->getDisplayValue($Grid->modifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_modifieddatetime" class="form-group pharmacy_pharled_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifieddatetime->getDisplayValue($Grid->modifieddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BRNAME->Visible) { // BRNAME ?>
        <td data-name="BRNAME">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_BRNAME" class="form-group pharmacy_pharled_BRNAME">
<span<?= $Grid->BRNAME->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BRNAME->getDisplayValue($Grid->BRNAME->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BRNAME" id="x<?= $Grid->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Grid->BRNAME->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRNAME" id="o<?= $Grid->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Grid->BRNAME->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->baid->Visible) { // baid ?>
        <td data-name="baid">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_baid" class="form-group pharmacy_pharled_baid">
<input type="<?= $Grid->baid->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_baid" name="x<?= $Grid->RowIndex ?>_baid" id="x<?= $Grid->RowIndex ?>_baid" size="30" placeholder="<?= HtmlEncode($Grid->baid->getPlaceHolder()) ?>" value="<?= $Grid->baid->EditValue ?>"<?= $Grid->baid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->baid->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_baid" class="form-group pharmacy_pharled_baid">
<span<?= $Grid->baid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->baid->getDisplayValue($Grid->baid->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_baid" id="x<?= $Grid->RowIndex ?>_baid" value="<?= HtmlEncode($Grid->baid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_baid" id="o<?= $Grid->RowIndex ?>_baid" value="<?= HtmlEncode($Grid->baid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->isdate->Visible) { // isdate ?>
        <td data-name="isdate">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_isdate" class="form-group pharmacy_pharled_isdate">
<span<?= $Grid->isdate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->isdate->getDisplayValue($Grid->isdate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_isdate" id="x<?= $Grid->RowIndex ?>_isdate" value="<?= HtmlEncode($Grid->isdate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_isdate" id="o<?= $Grid->RowIndex ?>_isdate" value="<?= HtmlEncode($Grid->isdate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_PSGST" class="form-group pharmacy_pharled_PSGST">
<input type="<?= $Grid->PSGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PSGST" name="x<?= $Grid->RowIndex ?>_PSGST" id="x<?= $Grid->RowIndex ?>_PSGST" size="30" placeholder="<?= HtmlEncode($Grid->PSGST->getPlaceHolder()) ?>" value="<?= $Grid->PSGST->EditValue ?>"<?= $Grid->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PSGST->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_PSGST" class="form-group pharmacy_pharled_PSGST">
<span<?= $Grid->PSGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PSGST->getDisplayValue($Grid->PSGST->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PSGST" id="x<?= $Grid->RowIndex ?>_PSGST" value="<?= HtmlEncode($Grid->PSGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PSGST" id="o<?= $Grid->RowIndex ?>_PSGST" value="<?= HtmlEncode($Grid->PSGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_PCGST" class="form-group pharmacy_pharled_PCGST">
<input type="<?= $Grid->PCGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PCGST" name="x<?= $Grid->RowIndex ?>_PCGST" id="x<?= $Grid->RowIndex ?>_PCGST" size="30" placeholder="<?= HtmlEncode($Grid->PCGST->getPlaceHolder()) ?>" value="<?= $Grid->PCGST->EditValue ?>"<?= $Grid->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PCGST->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_PCGST" class="form-group pharmacy_pharled_PCGST">
<span<?= $Grid->PCGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PCGST->getDisplayValue($Grid->PCGST->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PCGST" id="x<?= $Grid->RowIndex ?>_PCGST" value="<?= HtmlEncode($Grid->PCGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PCGST" id="o<?= $Grid->RowIndex ?>_PCGST" value="<?= HtmlEncode($Grid->PCGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_SSGST" class="form-group pharmacy_pharled_SSGST">
<input type="<?= $Grid->SSGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SSGST" name="x<?= $Grid->RowIndex ?>_SSGST" id="x<?= $Grid->RowIndex ?>_SSGST" size="30" placeholder="<?= HtmlEncode($Grid->SSGST->getPlaceHolder()) ?>" value="<?= $Grid->SSGST->EditValue ?>"<?= $Grid->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SSGST->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_SSGST" class="form-group pharmacy_pharled_SSGST">
<span<?= $Grid->SSGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SSGST->getDisplayValue($Grid->SSGST->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SSGST" id="x<?= $Grid->RowIndex ?>_SSGST" value="<?= HtmlEncode($Grid->SSGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SSGST" id="o<?= $Grid->RowIndex ?>_SSGST" value="<?= HtmlEncode($Grid->SSGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_SCGST" class="form-group pharmacy_pharled_SCGST">
<input type="<?= $Grid->SCGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SCGST" name="x<?= $Grid->RowIndex ?>_SCGST" id="x<?= $Grid->RowIndex ?>_SCGST" size="30" placeholder="<?= HtmlEncode($Grid->SCGST->getPlaceHolder()) ?>" value="<?= $Grid->SCGST->EditValue ?>"<?= $Grid->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SCGST->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_SCGST" class="form-group pharmacy_pharled_SCGST">
<span<?= $Grid->SCGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SCGST->getDisplayValue($Grid->SCGST->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SCGST" id="x<?= $Grid->RowIndex ?>_SCGST" value="<?= HtmlEncode($Grid->SCGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SCGST" id="o<?= $Grid->RowIndex ?>_SCGST" value="<?= HtmlEncode($Grid->SCGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_PurValue" class="form-group pharmacy_pharled_PurValue">
<input type="<?= $Grid->PurValue->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PurValue" name="x<?= $Grid->RowIndex ?>_PurValue" id="x<?= $Grid->RowIndex ?>_PurValue" size="30" placeholder="<?= HtmlEncode($Grid->PurValue->getPlaceHolder()) ?>" value="<?= $Grid->PurValue->EditValue ?>"<?= $Grid->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PurValue->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_PurValue" class="form-group pharmacy_pharled_PurValue">
<span<?= $Grid->PurValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PurValue->getDisplayValue($Grid->PurValue->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PurValue" id="x<?= $Grid->RowIndex ?>_PurValue" value="<?= HtmlEncode($Grid->PurValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PurValue" id="o<?= $Grid->RowIndex ?>_PurValue" value="<?= HtmlEncode($Grid->PurValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PurRate->Visible) { // PurRate ?>
        <td data-name="PurRate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_PurRate" class="form-group pharmacy_pharled_PurRate">
<input type="<?= $Grid->PurRate->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PurRate" name="x<?= $Grid->RowIndex ?>_PurRate" id="x<?= $Grid->RowIndex ?>_PurRate" size="30" placeholder="<?= HtmlEncode($Grid->PurRate->getPlaceHolder()) ?>" value="<?= $Grid->PurRate->EditValue ?>"<?= $Grid->PurRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PurRate->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_PurRate" class="form-group pharmacy_pharled_PurRate">
<span<?= $Grid->PurRate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PurRate->getDisplayValue($Grid->PurRate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PurRate" id="x<?= $Grid->RowIndex ?>_PurRate" value="<?= HtmlEncode($Grid->PurRate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PurRate" id="o<?= $Grid->RowIndex ?>_PurRate" value="<?= HtmlEncode($Grid->PurRate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_PUnit" class="form-group pharmacy_pharled_PUnit">
<input type="<?= $Grid->PUnit->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PUnit" name="x<?= $Grid->RowIndex ?>_PUnit" id="x<?= $Grid->RowIndex ?>_PUnit" size="30" placeholder="<?= HtmlEncode($Grid->PUnit->getPlaceHolder()) ?>" value="<?= $Grid->PUnit->EditValue ?>"<?= $Grid->PUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PUnit->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_PUnit" class="form-group pharmacy_pharled_PUnit">
<span<?= $Grid->PUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PUnit->getDisplayValue($Grid->PUnit->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PUnit" id="x<?= $Grid->RowIndex ?>_PUnit" value="<?= HtmlEncode($Grid->PUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PUnit" id="o<?= $Grid->RowIndex ?>_PUnit" value="<?= HtmlEncode($Grid->PUnit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SUnit->Visible) { // SUnit ?>
        <td data-name="SUnit">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_SUnit" class="form-group pharmacy_pharled_SUnit">
<input type="<?= $Grid->SUnit->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SUnit" name="x<?= $Grid->RowIndex ?>_SUnit" id="x<?= $Grid->RowIndex ?>_SUnit" size="30" placeholder="<?= HtmlEncode($Grid->SUnit->getPlaceHolder()) ?>" value="<?= $Grid->SUnit->EditValue ?>"<?= $Grid->SUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SUnit->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_SUnit" class="form-group pharmacy_pharled_SUnit">
<span<?= $Grid->SUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SUnit->getDisplayValue($Grid->SUnit->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SUnit" id="x<?= $Grid->RowIndex ?>_SUnit" value="<?= HtmlEncode($Grid->SUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SUnit" id="o<?= $Grid->RowIndex ?>_SUnit" value="<?= HtmlEncode($Grid->SUnit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HSNCODE->Visible) { // HSNCODE ?>
        <td data-name="HSNCODE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_HSNCODE" class="form-group pharmacy_pharled_HSNCODE">
<input type="<?= $Grid->HSNCODE->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x<?= $Grid->RowIndex ?>_HSNCODE" id="x<?= $Grid->RowIndex ?>_HSNCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->HSNCODE->getPlaceHolder()) ?>" value="<?= $Grid->HSNCODE->EditValue ?>"<?= $Grid->HSNCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HSNCODE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_HSNCODE" class="form-group pharmacy_pharled_HSNCODE">
<span<?= $Grid->HSNCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HSNCODE->getDisplayValue($Grid->HSNCODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HSNCODE" id="x<?= $Grid->RowIndex ?>_HSNCODE" value="<?= HtmlEncode($Grid->HSNCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HSNCODE" id="o<?= $Grid->RowIndex ?>_HSNCODE" value="<?= HtmlEncode($Grid->HSNCODE->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_pharledgrid","load"], function() {
    fpharmacy_pharledgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpharmacy_pharledgrid">
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
    ew.addEventHandlers("pharmacy_pharled");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");
     $("[data-name='baid']").hide();
      $("[data-name='isdate']").hide();

    //$("[data-name='SiNo']").hide();
    $("[data-name='Product']").hide();
    //$("[data-name='Mfg']").hide();

     //$("[data-name='SLNO']").hide();
    		  $("[data-name='BRCODE']").hide();
    		  $("[data-name='TYPE']").hide();
    		  $("[data-name='DN']").hide();
    		  $("[data-name='RDN']").hide();
    		  $("[data-name='DT']").hide();
    		  $("[data-name='PRC']").hide();
    		  $("[data-name='OQ']").hide();
    		  $("[data-name='RQ']").hide();
    		  $("[data-name='MRQ']").hide();
    		//  $("[data-name='IQ']").hide();

    	//	  $("[data-name='BATCHNO']").hide();
    	//	  $("[data-name='EXPDT']").hide();
    		  $("[data-name='BILLNO']").hide();
    		  $("[data-name='BILLDT']").hide();
    	//	  $("[data-name='RT']").hide();
    		  $("[data-name='VALUE']").hide();
    		  $("[data-name='DISC']").hide();
    		  $("[data-name='TAXP']").hide();
    		  $("[data-name='TAX']").hide();
    		  $("[data-name='TAXR']").hide();

    	//	  $("[data-name='DAMT']").hide();
    		  $("[data-name='EMPNO']").hide();
    		  $("[data-name='PC']").hide();
    		  $("[data-name='DRNAME']").hide();
    		  $("[data-name='BTIME']").hide();
    		  $("[data-name='ONO']").hide();
    		  $("[data-name='ODT']").hide();
    		  $("[data-name='PURRT']").hide();
    		  $("[data-name='GRP']").hide();
    		  $("[data-name='IBATCH']").hide();
    		  $("[data-name='IPNO']").hide();
    		  $("[data-name='OPNO']").hide();
    		  $("[data-name='RECID']").hide();
    		  $("[data-name='FQTY']").hide();
    		  $("[data-name='UR']").hide();		  
    		  $("[data-name='DCID']").hide();
    		  $("[data-name='USERID']").hide();
    		  $("[data-name='MODDT']").hide();
    		  $("[data-name='FYM']").hide();
    		  $("[data-name='PRCBATCH']").hide();
    		  $("[data-name='MRP']").hide();
    		  $("[data-name='BILLYM']").hide();
    		  $("[data-name='BILLGRP']").hide();
    		  $("[data-name='STAFF']").hide();
    		  $("[data-name='TEMPIPNO']").hide();
    		  $("[data-name='PRNTED']").hide();
    		  $("[data-name='PATNAME']").hide();
    		  $("[data-name='PJVNO']").hide();
    		  $("[data-name='PJVSLNO']").hide();
    		  $("[data-name='OTHDISC']").hide();
    		  $("[data-name='PJVYM']").hide();
    		  $("[data-name='PURDISCPER']").hide();
    		  $("[data-name='CASHIER']").hide();
    		  $("[data-name='CASHTIME']").hide();
    		  $("[data-name='CASHRECD']").hide();
    		  $("[data-name='CASHREFNO']").hide();
    		  $("[data-name='CASHIERSHIFT']").hide();
    		  $("[data-name='PRCODE']").hide();
    		  $("[data-name='RELEASEBY']").hide();
    		  $("[data-name='CRAUTHOR']").hide();
    		  $("[data-name='PAYMENT']").hide();
    		  $("[data-name='DRID']").hide();
    		  $("[data-name='WARD']").hide();
    		  $("[data-name='STAXTYPE']").hide();
    		  $("[data-name='PURDISCVAL']").hide();
    		  $("[data-name='RNDOFF']").hide();
    		  $("[data-name='DISCONMRP']").hide();
    		  $("[data-name='DELVDT']").hide();
    		  $("[data-name='DELVTIME']").hide();
    		  $("[data-name='DELVBY']").hide();
    		  $("[data-name='HOSPNO']").hide();
    		  $("[data-name='pbv']").hide();
    		  $("[data-name='pbt']").hide();
    		  $("[data-name='Reception']").hide();
    		  $("[data-name='PatID']").hide();
    		  $("[data-name='mrnno']").hide();

    function addtotalSum()
    {	
    	var totSum = 0;
    	for (var i = 1; i < 40; i++) {
    			try {
    				var amount = document.getElementById("x" + i + "_DAMT");
    				if (amount.value != '') {
    					totSum = parseInt(totSum) + parseInt(amount.value);
    				 var SiNo = document.getElementById("x" + i + "_SiNo");
    				 SiNo.value = i;
    				}
    				var RT = document.getElementById("x" + i + "_RT");
    				var Product = document.getElementById("sv_x" + i + "_Product").value;
    				if(Product!= '')
    				{
    				 var SiNo = document.getElementById("x" + i + "_SiNo");
    				 SiNo.value = i;
    				 }
    			}
    			catch(err) {
    			}
    	}
    		var BillAmount = document.getElementById("x_Amount");
    	//	BillAmount.value = totSum;
    }
    </script>
    <style>
    .input-group>.form-control {
    	width: 1%;
    	flex-grow: 1;
    }
    </style>
    <script>
});
</script>
<?php if (!$Grid->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_pharmacy_pharled",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
