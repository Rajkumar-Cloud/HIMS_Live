<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("ViewPharmacyPharledReturnGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_pharled_returngrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fview_pharmacy_pharled_returngrid = new ew.Form("fview_pharmacy_pharled_returngrid", "grid");
    fview_pharmacy_pharled_returngrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_pharled_return")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_pharmacy_pharled_return)
        ew.vars.tables.view_pharmacy_pharled_return = currentTable;
    fview_pharmacy_pharled_returngrid.addFields([
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["SiNo", [fields.SiNo.visible && fields.SiNo.required ? ew.Validators.required(fields.SiNo.caption) : null, ew.Validators.integer], fields.SiNo.isInvalid],
        ["Product", [fields.Product.visible && fields.Product.required ? ew.Validators.required(fields.Product.caption) : null], fields.Product.isInvalid],
        ["SLNO", [fields.SLNO.visible && fields.SLNO.required ? ew.Validators.required(fields.SLNO.caption) : null, ew.Validators.integer], fields.SLNO.isInvalid],
        ["RT", [fields.RT.visible && fields.RT.required ? ew.Validators.required(fields.RT.caption) : null, ew.Validators.float], fields.RT.isInvalid],
        ["MRQ", [fields.MRQ.visible && fields.MRQ.required ? ew.Validators.required(fields.MRQ.caption) : null, ew.Validators.float], fields.MRQ.isInvalid],
        ["IQ", [fields.IQ.visible && fields.IQ.required ? ew.Validators.required(fields.IQ.caption) : null, ew.Validators.float], fields.IQ.isInvalid],
        ["DAMT", [fields.DAMT.visible && fields.DAMT.required ? ew.Validators.required(fields.DAMT.caption) : null, ew.Validators.float], fields.DAMT.isInvalid],
        ["BATCHNO", [fields.BATCHNO.visible && fields.BATCHNO.required ? ew.Validators.required(fields.BATCHNO.caption) : null], fields.BATCHNO.isInvalid],
        ["EXPDT", [fields.EXPDT.visible && fields.EXPDT.required ? ew.Validators.required(fields.EXPDT.caption) : null, ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["Mfg", [fields.Mfg.visible && fields.Mfg.required ? ew.Validators.required(fields.Mfg.caption) : null], fields.Mfg.isInvalid],
        ["UR", [fields.UR.visible && fields.UR.required ? ew.Validators.required(fields.UR.caption) : null, ew.Validators.float], fields.UR.isInvalid],
        ["_USERID", [fields._USERID.visible && fields._USERID.required ? ew.Validators.required(fields._USERID.caption) : null], fields._USERID.isInvalid],
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["HosoID", [fields.HosoID.visible && fields.HosoID.required ? ew.Validators.required(fields.HosoID.caption) : null], fields.HosoID.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["BRNAME", [fields.BRNAME.visible && fields.BRNAME.required ? ew.Validators.required(fields.BRNAME.caption) : null], fields.BRNAME.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_pharmacy_pharled_returngrid,
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
    fview_pharmacy_pharled_returngrid.validate = function () {
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
    fview_pharmacy_pharled_returngrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PRC", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SiNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Product", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SLNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MRQ", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IQ", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DAMT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BATCHNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EXPDT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Mfg", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "UR", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_pharmacy_pharled_returngrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_pharled_returngrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_pharmacy_pharled_returngrid.lists.SLNO = <?= $Grid->SLNO->toClientList($Grid) ?>;
    loadjs.done("fview_pharmacy_pharled_returngrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_pharled_return">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_pharmacy_pharled_returngrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_pharmacy_pharled_return" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_pharmacy_pharled_returngrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Grid->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE"><?= $Grid->renderSort($Grid->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Grid->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Grid->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC"><?= $Grid->renderSort($Grid->PRC) ?></div></th>
<?php } ?>
<?php if ($Grid->SiNo->Visible) { // SiNo ?>
        <th data-name="SiNo" class="<?= $Grid->SiNo->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo"><?= $Grid->renderSort($Grid->SiNo) ?></div></th>
<?php } ?>
<?php if ($Grid->Product->Visible) { // Product ?>
        <th data-name="Product" class="<?= $Grid->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product"><?= $Grid->renderSort($Grid->Product) ?></div></th>
<?php } ?>
<?php if ($Grid->SLNO->Visible) { // SLNO ?>
        <th data-name="SLNO" class="<?= $Grid->SLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_SLNO" class="view_pharmacy_pharled_return_SLNO"><?= $Grid->renderSort($Grid->SLNO) ?></div></th>
<?php } ?>
<?php if ($Grid->RT->Visible) { // RT ?>
        <th data-name="RT" class="<?= $Grid->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT"><?= $Grid->renderSort($Grid->RT) ?></div></th>
<?php } ?>
<?php if ($Grid->MRQ->Visible) { // MRQ ?>
        <th data-name="MRQ" class="<?= $Grid->MRQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ"><?= $Grid->renderSort($Grid->MRQ) ?></div></th>
<?php } ?>
<?php if ($Grid->IQ->Visible) { // IQ ?>
        <th data-name="IQ" class="<?= $Grid->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ"><?= $Grid->renderSort($Grid->IQ) ?></div></th>
<?php } ?>
<?php if ($Grid->DAMT->Visible) { // DAMT ?>
        <th data-name="DAMT" class="<?= $Grid->DAMT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT"><?= $Grid->renderSort($Grid->DAMT) ?></div></th>
<?php } ?>
<?php if ($Grid->BATCHNO->Visible) { // BATCHNO ?>
        <th data-name="BATCHNO" class="<?= $Grid->BATCHNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO"><?= $Grid->renderSort($Grid->BATCHNO) ?></div></th>
<?php } ?>
<?php if ($Grid->EXPDT->Visible) { // EXPDT ?>
        <th data-name="EXPDT" class="<?= $Grid->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT"><?= $Grid->renderSort($Grid->EXPDT) ?></div></th>
<?php } ?>
<?php if ($Grid->Mfg->Visible) { // Mfg ?>
        <th data-name="Mfg" class="<?= $Grid->Mfg->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg"><?= $Grid->renderSort($Grid->Mfg) ?></div></th>
<?php } ?>
<?php if ($Grid->UR->Visible) { // UR ?>
        <th data-name="UR" class="<?= $Grid->UR->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR"><?= $Grid->renderSort($Grid->UR) ?></div></th>
<?php } ?>
<?php if ($Grid->_USERID->Visible) { // USERID ?>
        <th data-name="_USERID" class="<?= $Grid->_USERID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID"><?= $Grid->renderSort($Grid->_USERID) ?></div></th>
<?php } ?>
<?php if ($Grid->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->HosoID->Visible) { // HosoID ?>
        <th data-name="HosoID" class="<?= $Grid->HosoID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID"><?= $Grid->renderSort($Grid->HosoID) ?></div></th>
<?php } ?>
<?php if ($Grid->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Grid->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby"><?= $Grid->renderSort($Grid->createdby) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Grid->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby"><?= $Grid->renderSort($Grid->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Grid->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime"><?= $Grid->renderSort($Grid->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->BRNAME->Visible) { // BRNAME ?>
        <th data-name="BRNAME" class="<?= $Grid->BRNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME"><?= $Grid->renderSort($Grid->BRNAME) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_view_pharmacy_pharled_return", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Grid->BRCODE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRCODE" id="o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_BRCODE">
<span<?= $Grid->BRCODE->viewAttributes() ?>>
<?= $Grid->BRCODE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_BRCODE" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_BRCODE" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Grid->PRC->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_PRC" class="form-group">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PRC" id="o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_PRC" class="form-group">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_PRC">
<span<?= $Grid->PRC->viewAttributes() ?>>
<?= $Grid->PRC->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_PRC" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_PRC" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SiNo->Visible) { // SiNo ?>
        <td data-name="SiNo" <?= $Grid->SiNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_SiNo" class="form-group">
<input type="<?= $Grid->SiNo->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?= $Grid->RowIndex ?>_SiNo" id="x<?= $Grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?= HtmlEncode($Grid->SiNo->getPlaceHolder()) ?>" value="<?= $Grid->SiNo->EditValue ?>"<?= $Grid->SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SiNo" id="o<?= $Grid->RowIndex ?>_SiNo" value="<?= HtmlEncode($Grid->SiNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_SiNo" class="form-group">
<input type="<?= $Grid->SiNo->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?= $Grid->RowIndex ?>_SiNo" id="x<?= $Grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?= HtmlEncode($Grid->SiNo->getPlaceHolder()) ?>" value="<?= $Grid->SiNo->EditValue ?>"<?= $Grid->SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SiNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_SiNo">
<span<?= $Grid->SiNo->viewAttributes() ?>>
<?= $Grid->SiNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_SiNo" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_SiNo" value="<?= HtmlEncode($Grid->SiNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_SiNo" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_SiNo" value="<?= HtmlEncode($Grid->SiNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Product->Visible) { // Product ?>
        <td data-name="Product" <?= $Grid->Product->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_Product" class="form-group">
<input type="<?= $Grid->Product->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?= $Grid->RowIndex ?>_Product" id="x<?= $Grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->Product->getPlaceHolder()) ?>" value="<?= $Grid->Product->EditValue ?>"<?= $Grid->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Product->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Product" id="o<?= $Grid->RowIndex ?>_Product" value="<?= HtmlEncode($Grid->Product->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_Product" class="form-group">
<input type="<?= $Grid->Product->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?= $Grid->RowIndex ?>_Product" id="x<?= $Grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->Product->getPlaceHolder()) ?>" value="<?= $Grid->Product->EditValue ?>"<?= $Grid->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Product->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_Product">
<span<?= $Grid->Product->viewAttributes() ?>>
<?= $Grid->Product->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_Product" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_Product" value="<?= HtmlEncode($Grid->Product->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_Product" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_Product" value="<?= HtmlEncode($Grid->Product->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SLNO->Visible) { // SLNO ?>
        <td data-name="SLNO" <?= $Grid->SLNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_SLNO" class="form-group">
<?php
$onchange = $Grid->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_SLNO" class="ew-auto-suggest">
    <input type="<?= $Grid->SLNO->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_SLNO" id="sv_x<?= $Grid->RowIndex ?>_SLNO" value="<?= RemoveHtml($Grid->SLNO->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->SLNO->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->SLNO->getPlaceHolder()) ?>"<?= $Grid->SLNO->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-input="sv_x<?= $Grid->RowIndex ?>_SLNO" data-value-separator="<?= $Grid->SLNO->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_SLNO" id="x<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->SLNO->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid"], function() {
    fview_pharmacy_pharled_returngrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_SLNO","forceSelect":true}, ew.vars.tables.view_pharmacy_pharled_return.fields.SLNO.autoSuggestOptions));
});
</script>
<?= $Grid->SLNO->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SLNO" id="o<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_SLNO" class="form-group">
<?php
$onchange = $Grid->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_SLNO" class="ew-auto-suggest">
    <input type="<?= $Grid->SLNO->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_SLNO" id="sv_x<?= $Grid->RowIndex ?>_SLNO" value="<?= RemoveHtml($Grid->SLNO->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->SLNO->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->SLNO->getPlaceHolder()) ?>"<?= $Grid->SLNO->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-input="sv_x<?= $Grid->RowIndex ?>_SLNO" data-value-separator="<?= $Grid->SLNO->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_SLNO" id="x<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->SLNO->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid"], function() {
    fview_pharmacy_pharled_returngrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_SLNO","forceSelect":true}, ew.vars.tables.view_pharmacy_pharled_return.fields.SLNO.autoSuggestOptions));
});
</script>
<?= $Grid->SLNO->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_SLNO") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_SLNO">
<span<?= $Grid->SLNO->viewAttributes() ?>>
<?= $Grid->SLNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_SLNO" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_SLNO" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RT->Visible) { // RT ?>
        <td data-name="RT" <?= $Grid->RT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_RT" class="form-group">
<input type="<?= $Grid->RT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?= $Grid->RowIndex ?>_RT" id="x<?= $Grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->RT->getPlaceHolder()) ?>" value="<?= $Grid->RT->EditValue ?>"<?= $Grid->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RT" id="o<?= $Grid->RowIndex ?>_RT" value="<?= HtmlEncode($Grid->RT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_RT" class="form-group">
<input type="<?= $Grid->RT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?= $Grid->RowIndex ?>_RT" id="x<?= $Grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->RT->getPlaceHolder()) ?>" value="<?= $Grid->RT->EditValue ?>"<?= $Grid->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_RT">
<span<?= $Grid->RT->viewAttributes() ?>>
<?= $Grid->RT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_RT" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_RT" value="<?= HtmlEncode($Grid->RT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_RT" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_RT" value="<?= HtmlEncode($Grid->RT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MRQ->Visible) { // MRQ ?>
        <td data-name="MRQ" <?= $Grid->MRQ->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_MRQ" class="form-group">
<input type="<?= $Grid->MRQ->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?= $Grid->RowIndex ?>_MRQ" id="x<?= $Grid->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->MRQ->getPlaceHolder()) ?>" value="<?= $Grid->MRQ->EditValue ?>"<?= $Grid->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MRQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MRQ" id="o<?= $Grid->RowIndex ?>_MRQ" value="<?= HtmlEncode($Grid->MRQ->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_MRQ" class="form-group">
<input type="<?= $Grid->MRQ->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?= $Grid->RowIndex ?>_MRQ" id="x<?= $Grid->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->MRQ->getPlaceHolder()) ?>" value="<?= $Grid->MRQ->EditValue ?>"<?= $Grid->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MRQ->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_MRQ">
<span<?= $Grid->MRQ->viewAttributes() ?>>
<?= $Grid->MRQ->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_MRQ" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_MRQ" value="<?= HtmlEncode($Grid->MRQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_MRQ" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_MRQ" value="<?= HtmlEncode($Grid->MRQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->IQ->Visible) { // IQ ?>
        <td data-name="IQ" <?= $Grid->IQ->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_IQ" class="form-group">
<input type="<?= $Grid->IQ->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?= $Grid->RowIndex ?>_IQ" id="x<?= $Grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->IQ->getPlaceHolder()) ?>" value="<?= $Grid->IQ->EditValue ?>"<?= $Grid->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IQ" id="o<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_IQ" class="form-group">
<input type="<?= $Grid->IQ->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?= $Grid->RowIndex ?>_IQ" id="x<?= $Grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->IQ->getPlaceHolder()) ?>" value="<?= $Grid->IQ->EditValue ?>"<?= $Grid->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IQ->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_IQ">
<span<?= $Grid->IQ->viewAttributes() ?>>
<?= $Grid->IQ->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_IQ" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_IQ" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DAMT->Visible) { // DAMT ?>
        <td data-name="DAMT" <?= $Grid->DAMT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_DAMT" class="form-group">
<input type="<?= $Grid->DAMT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?= $Grid->RowIndex ?>_DAMT" id="x<?= $Grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->DAMT->getPlaceHolder()) ?>" value="<?= $Grid->DAMT->EditValue ?>"<?= $Grid->DAMT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DAMT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DAMT" id="o<?= $Grid->RowIndex ?>_DAMT" value="<?= HtmlEncode($Grid->DAMT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_DAMT" class="form-group">
<input type="<?= $Grid->DAMT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?= $Grid->RowIndex ?>_DAMT" id="x<?= $Grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->DAMT->getPlaceHolder()) ?>" value="<?= $Grid->DAMT->EditValue ?>"<?= $Grid->DAMT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DAMT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_DAMT">
<span<?= $Grid->DAMT->viewAttributes() ?>>
<?= $Grid->DAMT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_DAMT" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_DAMT" value="<?= HtmlEncode($Grid->DAMT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_DAMT" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_DAMT" value="<?= HtmlEncode($Grid->DAMT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO" <?= $Grid->BATCHNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_BATCHNO" class="form-group">
<input type="<?= $Grid->BATCHNO->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?= $Grid->RowIndex ?>_BATCHNO" id="x<?= $Grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->BATCHNO->getPlaceHolder()) ?>" value="<?= $Grid->BATCHNO->EditValue ?>"<?= $Grid->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BATCHNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BATCHNO" id="o<?= $Grid->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Grid->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_BATCHNO" class="form-group">
<input type="<?= $Grid->BATCHNO->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?= $Grid->RowIndex ?>_BATCHNO" id="x<?= $Grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->BATCHNO->getPlaceHolder()) ?>" value="<?= $Grid->BATCHNO->EditValue ?>"<?= $Grid->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BATCHNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_BATCHNO">
<span<?= $Grid->BATCHNO->viewAttributes() ?>>
<?= $Grid->BATCHNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_BATCHNO" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Grid->BATCHNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_BATCHNO" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Grid->BATCHNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT" <?= $Grid->EXPDT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_EXPDT" class="form-group">
<input type="<?= $Grid->EXPDT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?= $Grid->RowIndex ?>_EXPDT" id="x<?= $Grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Grid->EXPDT->getPlaceHolder()) ?>" value="<?= $Grid->EXPDT->EditValue ?>"<?= $Grid->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EXPDT->getErrorMessage() ?></div>
<?php if (!$Grid->EXPDT->ReadOnly && !$Grid->EXPDT->Disabled && !isset($Grid->EXPDT->EditAttrs["readonly"]) && !isset($Grid->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_pharled_returngrid", "x<?= $Grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EXPDT" id="o<?= $Grid->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Grid->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_EXPDT" class="form-group">
<input type="<?= $Grid->EXPDT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?= $Grid->RowIndex ?>_EXPDT" id="x<?= $Grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Grid->EXPDT->getPlaceHolder()) ?>" value="<?= $Grid->EXPDT->EditValue ?>"<?= $Grid->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EXPDT->getErrorMessage() ?></div>
<?php if (!$Grid->EXPDT->ReadOnly && !$Grid->EXPDT->Disabled && !isset($Grid->EXPDT->EditAttrs["readonly"]) && !isset($Grid->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_pharled_returngrid", "x<?= $Grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_EXPDT">
<span<?= $Grid->EXPDT->viewAttributes() ?>>
<?= $Grid->EXPDT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_EXPDT" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Grid->EXPDT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_EXPDT" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Grid->EXPDT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Mfg->Visible) { // Mfg ?>
        <td data-name="Mfg" <?= $Grid->Mfg->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_Mfg" class="form-group">
<input type="<?= $Grid->Mfg->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?= $Grid->RowIndex ?>_Mfg" id="x<?= $Grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->Mfg->getPlaceHolder()) ?>" value="<?= $Grid->Mfg->EditValue ?>"<?= $Grid->Mfg->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mfg->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Mfg" id="o<?= $Grid->RowIndex ?>_Mfg" value="<?= HtmlEncode($Grid->Mfg->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_Mfg" class="form-group">
<input type="<?= $Grid->Mfg->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?= $Grid->RowIndex ?>_Mfg" id="x<?= $Grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->Mfg->getPlaceHolder()) ?>" value="<?= $Grid->Mfg->EditValue ?>"<?= $Grid->Mfg->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mfg->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_Mfg">
<span<?= $Grid->Mfg->viewAttributes() ?>>
<?= $Grid->Mfg->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_Mfg" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_Mfg" value="<?= HtmlEncode($Grid->Mfg->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_Mfg" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_Mfg" value="<?= HtmlEncode($Grid->Mfg->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->UR->Visible) { // UR ?>
        <td data-name="UR" <?= $Grid->UR->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_UR" class="form-group">
<input type="<?= $Grid->UR->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?= $Grid->RowIndex ?>_UR" id="x<?= $Grid->RowIndex ?>_UR" size="30" placeholder="<?= HtmlEncode($Grid->UR->getPlaceHolder()) ?>" value="<?= $Grid->UR->EditValue ?>"<?= $Grid->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->UR->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" data-hidden="1" name="o<?= $Grid->RowIndex ?>_UR" id="o<?= $Grid->RowIndex ?>_UR" value="<?= HtmlEncode($Grid->UR->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_UR" class="form-group">
<input type="<?= $Grid->UR->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?= $Grid->RowIndex ?>_UR" id="x<?= $Grid->RowIndex ?>_UR" size="30" placeholder="<?= HtmlEncode($Grid->UR->getPlaceHolder()) ?>" value="<?= $Grid->UR->EditValue ?>"<?= $Grid->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->UR->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_UR">
<span<?= $Grid->UR->viewAttributes() ?>>
<?= $Grid->UR->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_UR" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_UR" value="<?= HtmlEncode($Grid->UR->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_UR" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_UR" value="<?= HtmlEncode($Grid->UR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->_USERID->Visible) { // USERID ?>
        <td data-name="_USERID" <?= $Grid->_USERID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" data-hidden="1" name="o<?= $Grid->RowIndex ?>__USERID" id="o<?= $Grid->RowIndex ?>__USERID" value="<?= HtmlEncode($Grid->_USERID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return__USERID">
<span<?= $Grid->_USERID->viewAttributes() ?>>
<?= $Grid->_USERID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>__USERID" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>__USERID" value="<?= HtmlEncode($Grid->_USERID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>__USERID" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>__USERID" value="<?= HtmlEncode($Grid->_USERID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id" <?= $Grid->id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_id" class="form-group"></span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_id" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_id" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID" <?= $Grid->HosoID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HosoID" id="o<?= $Grid->RowIndex ?>_HosoID" value="<?= HtmlEncode($Grid->HosoID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_HosoID">
<span<?= $Grid->HosoID->viewAttributes() ?>>
<?= $Grid->HosoID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_HosoID" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_HosoID" value="<?= HtmlEncode($Grid->HosoID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_HosoID" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_HosoID" value="<?= HtmlEncode($Grid->HosoID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Grid->createdby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<?= $Grid->createdby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_createdby" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_createdby" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_createddatetime" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_createddatetime" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Grid->modifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<?= $Grid->modifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_modifiedby" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_modifiedby" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Grid->modifieddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<?= $Grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_modifieddatetime" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_modifieddatetime" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BRNAME->Visible) { // BRNAME ?>
        <td data-name="BRNAME" <?= $Grid->BRNAME->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRNAME" id="o<?= $Grid->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Grid->BRNAME->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_pharled_return_BRNAME">
<span<?= $Grid->BRNAME->viewAttributes() ?>>
<?= $Grid->BRNAME->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" data-hidden="1" name="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_BRNAME" id="fview_pharmacy_pharled_returngrid$x<?= $Grid->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Grid->BRNAME->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" data-hidden="1" name="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_BRNAME" id="fview_pharmacy_pharled_returngrid$o<?= $Grid->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Grid->BRNAME->OldValue) ?>">
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
loadjs.ready(["fview_pharmacy_pharled_returngrid","load"], function () {
    fview_pharmacy_pharled_returngrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_view_pharmacy_pharled_return", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_BRCODE" class="form-group view_pharmacy_pharled_return_BRCODE">
<span<?= $Grid->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BRCODE->getDisplayValue($Grid->BRCODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BRCODE" id="x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRCODE" id="o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_PRC" class="form-group view_pharmacy_pharled_return_PRC">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_PRC" class="form-group view_pharmacy_pharled_return_PRC">
<span<?= $Grid->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PRC->getDisplayValue($Grid->PRC->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PRC" id="o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SiNo->Visible) { // SiNo ?>
        <td data-name="SiNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_SiNo" class="form-group view_pharmacy_pharled_return_SiNo">
<input type="<?= $Grid->SiNo->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?= $Grid->RowIndex ?>_SiNo" id="x<?= $Grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?= HtmlEncode($Grid->SiNo->getPlaceHolder()) ?>" value="<?= $Grid->SiNo->EditValue ?>"<?= $Grid->SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SiNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_SiNo" class="form-group view_pharmacy_pharled_return_SiNo">
<span<?= $Grid->SiNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SiNo->getDisplayValue($Grid->SiNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SiNo" id="x<?= $Grid->RowIndex ?>_SiNo" value="<?= HtmlEncode($Grid->SiNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SiNo" id="o<?= $Grid->RowIndex ?>_SiNo" value="<?= HtmlEncode($Grid->SiNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Product->Visible) { // Product ?>
        <td data-name="Product">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_Product" class="form-group view_pharmacy_pharled_return_Product">
<input type="<?= $Grid->Product->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?= $Grid->RowIndex ?>_Product" id="x<?= $Grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->Product->getPlaceHolder()) ?>" value="<?= $Grid->Product->EditValue ?>"<?= $Grid->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Product->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_Product" class="form-group view_pharmacy_pharled_return_Product">
<span<?= $Grid->Product->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Product->getDisplayValue($Grid->Product->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Product" id="x<?= $Grid->RowIndex ?>_Product" value="<?= HtmlEncode($Grid->Product->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Product" id="o<?= $Grid->RowIndex ?>_Product" value="<?= HtmlEncode($Grid->Product->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SLNO->Visible) { // SLNO ?>
        <td data-name="SLNO">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_SLNO" class="form-group view_pharmacy_pharled_return_SLNO">
<?php
$onchange = $Grid->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_SLNO" class="ew-auto-suggest">
    <input type="<?= $Grid->SLNO->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_SLNO" id="sv_x<?= $Grid->RowIndex ?>_SLNO" value="<?= RemoveHtml($Grid->SLNO->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->SLNO->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->SLNO->getPlaceHolder()) ?>"<?= $Grid->SLNO->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-input="sv_x<?= $Grid->RowIndex ?>_SLNO" data-value-separator="<?= $Grid->SLNO->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_SLNO" id="x<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->SLNO->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid"], function() {
    fview_pharmacy_pharled_returngrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_SLNO","forceSelect":true}, ew.vars.tables.view_pharmacy_pharled_return.fields.SLNO.autoSuggestOptions));
});
</script>
<?= $Grid->SLNO->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_SLNO") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_SLNO" class="form-group view_pharmacy_pharled_return_SLNO">
<span<?= $Grid->SLNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SLNO->getDisplayValue($Grid->SLNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SLNO" id="x<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SLNO" id="o<?= $Grid->RowIndex ?>_SLNO" value="<?= HtmlEncode($Grid->SLNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RT->Visible) { // RT ?>
        <td data-name="RT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_RT" class="form-group view_pharmacy_pharled_return_RT">
<input type="<?= $Grid->RT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?= $Grid->RowIndex ?>_RT" id="x<?= $Grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->RT->getPlaceHolder()) ?>" value="<?= $Grid->RT->EditValue ?>"<?= $Grid->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_RT" class="form-group view_pharmacy_pharled_return_RT">
<span<?= $Grid->RT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RT->getDisplayValue($Grid->RT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RT" id="x<?= $Grid->RowIndex ?>_RT" value="<?= HtmlEncode($Grid->RT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RT" id="o<?= $Grid->RowIndex ?>_RT" value="<?= HtmlEncode($Grid->RT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MRQ->Visible) { // MRQ ?>
        <td data-name="MRQ">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_MRQ" class="form-group view_pharmacy_pharled_return_MRQ">
<input type="<?= $Grid->MRQ->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?= $Grid->RowIndex ?>_MRQ" id="x<?= $Grid->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->MRQ->getPlaceHolder()) ?>" value="<?= $Grid->MRQ->EditValue ?>"<?= $Grid->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MRQ->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_MRQ" class="form-group view_pharmacy_pharled_return_MRQ">
<span<?= $Grid->MRQ->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MRQ->getDisplayValue($Grid->MRQ->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MRQ" id="x<?= $Grid->RowIndex ?>_MRQ" value="<?= HtmlEncode($Grid->MRQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MRQ" id="o<?= $Grid->RowIndex ?>_MRQ" value="<?= HtmlEncode($Grid->MRQ->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->IQ->Visible) { // IQ ?>
        <td data-name="IQ">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_IQ" class="form-group view_pharmacy_pharled_return_IQ">
<input type="<?= $Grid->IQ->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?= $Grid->RowIndex ?>_IQ" id="x<?= $Grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->IQ->getPlaceHolder()) ?>" value="<?= $Grid->IQ->EditValue ?>"<?= $Grid->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IQ->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_IQ" class="form-group view_pharmacy_pharled_return_IQ">
<span<?= $Grid->IQ->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->IQ->getDisplayValue($Grid->IQ->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" data-hidden="1" name="x<?= $Grid->RowIndex ?>_IQ" id="x<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IQ" id="o<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DAMT->Visible) { // DAMT ?>
        <td data-name="DAMT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_DAMT" class="form-group view_pharmacy_pharled_return_DAMT">
<input type="<?= $Grid->DAMT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?= $Grid->RowIndex ?>_DAMT" id="x<?= $Grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->DAMT->getPlaceHolder()) ?>" value="<?= $Grid->DAMT->EditValue ?>"<?= $Grid->DAMT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DAMT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_DAMT" class="form-group view_pharmacy_pharled_return_DAMT">
<span<?= $Grid->DAMT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DAMT->getDisplayValue($Grid->DAMT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DAMT" id="x<?= $Grid->RowIndex ?>_DAMT" value="<?= HtmlEncode($Grid->DAMT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DAMT" id="o<?= $Grid->RowIndex ?>_DAMT" value="<?= HtmlEncode($Grid->DAMT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_BATCHNO" class="form-group view_pharmacy_pharled_return_BATCHNO">
<input type="<?= $Grid->BATCHNO->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?= $Grid->RowIndex ?>_BATCHNO" id="x<?= $Grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->BATCHNO->getPlaceHolder()) ?>" value="<?= $Grid->BATCHNO->EditValue ?>"<?= $Grid->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BATCHNO->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_BATCHNO" class="form-group view_pharmacy_pharled_return_BATCHNO">
<span<?= $Grid->BATCHNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BATCHNO->getDisplayValue($Grid->BATCHNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BATCHNO" id="x<?= $Grid->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Grid->BATCHNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BATCHNO" id="o<?= $Grid->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Grid->BATCHNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_EXPDT" class="form-group view_pharmacy_pharled_return_EXPDT">
<input type="<?= $Grid->EXPDT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?= $Grid->RowIndex ?>_EXPDT" id="x<?= $Grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Grid->EXPDT->getPlaceHolder()) ?>" value="<?= $Grid->EXPDT->EditValue ?>"<?= $Grid->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EXPDT->getErrorMessage() ?></div>
<?php if (!$Grid->EXPDT->ReadOnly && !$Grid->EXPDT->Disabled && !isset($Grid->EXPDT->EditAttrs["readonly"]) && !isset($Grid->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_pharled_returngrid", "x<?= $Grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_EXPDT" class="form-group view_pharmacy_pharled_return_EXPDT">
<span<?= $Grid->EXPDT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EXPDT->getDisplayValue($Grid->EXPDT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EXPDT" id="x<?= $Grid->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Grid->EXPDT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EXPDT" id="o<?= $Grid->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Grid->EXPDT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Mfg->Visible) { // Mfg ?>
        <td data-name="Mfg">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_Mfg" class="form-group view_pharmacy_pharled_return_Mfg">
<input type="<?= $Grid->Mfg->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?= $Grid->RowIndex ?>_Mfg" id="x<?= $Grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->Mfg->getPlaceHolder()) ?>" value="<?= $Grid->Mfg->EditValue ?>"<?= $Grid->Mfg->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mfg->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_Mfg" class="form-group view_pharmacy_pharled_return_Mfg">
<span<?= $Grid->Mfg->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Mfg->getDisplayValue($Grid->Mfg->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Mfg" id="x<?= $Grid->RowIndex ?>_Mfg" value="<?= HtmlEncode($Grid->Mfg->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Mfg" id="o<?= $Grid->RowIndex ?>_Mfg" value="<?= HtmlEncode($Grid->Mfg->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->UR->Visible) { // UR ?>
        <td data-name="UR">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_UR" class="form-group view_pharmacy_pharled_return_UR">
<input type="<?= $Grid->UR->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?= $Grid->RowIndex ?>_UR" id="x<?= $Grid->RowIndex ?>_UR" size="30" placeholder="<?= HtmlEncode($Grid->UR->getPlaceHolder()) ?>" value="<?= $Grid->UR->EditValue ?>"<?= $Grid->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->UR->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_UR" class="form-group view_pharmacy_pharled_return_UR">
<span<?= $Grid->UR->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->UR->getDisplayValue($Grid->UR->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" data-hidden="1" name="x<?= $Grid->RowIndex ?>_UR" id="x<?= $Grid->RowIndex ?>_UR" value="<?= HtmlEncode($Grid->UR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" data-hidden="1" name="o<?= $Grid->RowIndex ?>_UR" id="o<?= $Grid->RowIndex ?>_UR" value="<?= HtmlEncode($Grid->UR->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->_USERID->Visible) { // USERID ?>
        <td data-name="_USERID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return__USERID" class="form-group view_pharmacy_pharled_return__USERID">
<span<?= $Grid->_USERID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->_USERID->getDisplayValue($Grid->_USERID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" data-hidden="1" name="x<?= $Grid->RowIndex ?>__USERID" id="x<?= $Grid->RowIndex ?>__USERID" value="<?= HtmlEncode($Grid->_USERID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" data-hidden="1" name="o<?= $Grid->RowIndex ?>__USERID" id="o<?= $Grid->RowIndex ?>__USERID" value="<?= HtmlEncode($Grid->_USERID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_id" class="form-group view_pharmacy_pharled_return_id"></span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_id" class="form-group view_pharmacy_pharled_return_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_HosoID" class="form-group view_pharmacy_pharled_return_HosoID">
<span<?= $Grid->HosoID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HosoID->getDisplayValue($Grid->HosoID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HosoID" id="x<?= $Grid->RowIndex ?>_HosoID" value="<?= HtmlEncode($Grid->HosoID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HosoID" id="o<?= $Grid->RowIndex ?>_HosoID" value="<?= HtmlEncode($Grid->HosoID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_createdby" class="form-group view_pharmacy_pharled_return_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdby->getDisplayValue($Grid->createdby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_createddatetime" class="form-group view_pharmacy_pharled_return_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_modifiedby" class="form-group view_pharmacy_pharled_return_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifiedby->getDisplayValue($Grid->modifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_modifieddatetime" class="form-group view_pharmacy_pharled_return_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifieddatetime->getDisplayValue($Grid->modifieddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BRNAME->Visible) { // BRNAME ?>
        <td data-name="BRNAME">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_BRNAME" class="form-group view_pharmacy_pharled_return_BRNAME">
<span<?= $Grid->BRNAME->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BRNAME->getDisplayValue($Grid->BRNAME->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BRNAME" id="x<?= $Grid->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Grid->BRNAME->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRNAME" id="o<?= $Grid->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Grid->BRNAME->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid","load"], function() {
    fview_pharmacy_pharled_returngrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fview_pharmacy_pharled_returngrid">
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
    ew.addEventHandlers("view_pharmacy_pharled_return");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");

    // Write your table-specific startup script here
    // document.write("page loaded");

    //$("[data-name='SiNo']").hide();
    //$("[data-name='Product']").hide();
    //$("[data-name='Mfg']").hide();
    		  $("[data-name='BRCODE']").hide();
    		  $("[data-name='TYPE']").hide();
    		  $("[data-name='DN']").hide();
    		  $("[data-name='RDN']").hide();
    		  $("[data-name='DT']").hide();
    		  $("[data-name='UR']").hide();
    		  $("[data-name='PRC']").hide();
    		  $("[data-name='OQ']").hide();
    		  $("[data-name='RQ']").hide();
    		//  $("[data-name='MRQ']").hide();
    		  $("[data-name='IQ']").hide();

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
    		  $("[data-name='SLNO']").hide();
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
        container: "gmp_view_pharmacy_pharled_return",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
