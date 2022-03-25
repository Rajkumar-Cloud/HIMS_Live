<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("ViewPharmacyMovementItemGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_movement_itemgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fview_pharmacy_movement_itemgrid = new ew.Form("fview_pharmacy_movement_itemgrid", "grid");
    fview_pharmacy_movement_itemgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_movement_item")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_pharmacy_movement_item)
        ew.vars.tables.view_pharmacy_movement_item = currentTable;
    fview_pharmacy_movement_itemgrid.addFields([
        ["ProductFrom", [fields.ProductFrom.visible && fields.ProductFrom.required ? ew.Validators.required(fields.ProductFrom.caption) : null], fields.ProductFrom.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null], fields.Quantity.isInvalid],
        ["FreeQty", [fields.FreeQty.visible && fields.FreeQty.required ? ew.Validators.required(fields.FreeQty.caption) : null], fields.FreeQty.isInvalid],
        ["IQ", [fields.IQ.visible && fields.IQ.required ? ew.Validators.required(fields.IQ.caption) : null], fields.IQ.isInvalid],
        ["MRQ", [fields.MRQ.visible && fields.MRQ.required ? ew.Validators.required(fields.MRQ.caption) : null], fields.MRQ.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["OPNO", [fields.OPNO.visible && fields.OPNO.required ? ew.Validators.required(fields.OPNO.caption) : null], fields.OPNO.isInvalid],
        ["IPNO", [fields.IPNO.visible && fields.IPNO.required ? ew.Validators.required(fields.IPNO.caption) : null], fields.IPNO.isInvalid],
        ["PatientBILLNO", [fields.PatientBILLNO.visible && fields.PatientBILLNO.required ? ew.Validators.required(fields.PatientBILLNO.caption) : null], fields.PatientBILLNO.isInvalid],
        ["BILLDT", [fields.BILLDT.visible && fields.BILLDT.required ? ew.Validators.required(fields.BILLDT.caption) : null], fields.BILLDT.isInvalid],
        ["GRNNO", [fields.GRNNO.visible && fields.GRNNO.required ? ew.Validators.required(fields.GRNNO.caption) : null], fields.GRNNO.isInvalid],
        ["DT", [fields.DT.visible && fields.DT.required ? ew.Validators.required(fields.DT.caption) : null], fields.DT.isInvalid],
        ["Customername", [fields.Customername.visible && fields.Customername.required ? ew.Validators.required(fields.Customername.caption) : null], fields.Customername.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(11)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(11)], fields.modifieddatetime.isInvalid],
        ["BILLNO", [fields.BILLNO.visible && fields.BILLNO.required ? ew.Validators.required(fields.BILLNO.caption) : null], fields.BILLNO.isInvalid],
        ["prc", [fields.prc.visible && fields.prc.required ? ew.Validators.required(fields.prc.caption) : null], fields.prc.isInvalid],
        ["PrName", [fields.PrName.visible && fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["BatchNo", [fields.BatchNo.visible && fields.BatchNo.required ? ew.Validators.required(fields.BatchNo.caption) : null], fields.BatchNo.isInvalid],
        ["ExpDate", [fields.ExpDate.visible && fields.ExpDate.required ? ew.Validators.required(fields.ExpDate.caption) : null, ew.Validators.datetime(7)], fields.ExpDate.isInvalid],
        ["MFRCODE", [fields.MFRCODE.visible && fields.MFRCODE.required ? ew.Validators.required(fields.MFRCODE.caption) : null], fields.MFRCODE.isInvalid],
        ["hsn", [fields.hsn.visible && fields.hsn.required ? ew.Validators.required(fields.hsn.caption) : null], fields.hsn.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_pharmacy_movement_itemgrid,
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
    fview_pharmacy_movement_itemgrid.validate = function () {
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
    fview_pharmacy_movement_itemgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "ProductFrom", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Quantity", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "FreeQty", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IQ", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MRQ", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BRCODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "OPNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IPNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientBILLNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BILLDT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GRNNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Customername", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createdby", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createddatetime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "modifiedby", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "modifieddatetime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BILLNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "prc", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BatchNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ExpDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MFRCODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "hsn", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_pharmacy_movement_itemgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_movement_itemgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_pharmacy_movement_itemgrid.lists.ProductFrom = <?= $Grid->ProductFrom->toClientList($Grid) ?>;
    fview_pharmacy_movement_itemgrid.lists.BRCODE = <?= $Grid->BRCODE->toClientList($Grid) ?>;
    loadjs.done("fview_pharmacy_movement_itemgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_movement_item">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_pharmacy_movement_itemgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_pharmacy_movement_item" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_pharmacy_movement_itemgrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->ProductFrom->Visible) { // ProductFrom ?>
        <th data-name="ProductFrom" class="<?= $Grid->ProductFrom->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_ProductFrom" class="view_pharmacy_movement_item_ProductFrom"><?= $Grid->renderSort($Grid->ProductFrom) ?></div></th>
<?php } ?>
<?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Grid->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_Quantity" class="view_pharmacy_movement_item_Quantity"><?= $Grid->renderSort($Grid->Quantity) ?></div></th>
<?php } ?>
<?php if ($Grid->FreeQty->Visible) { // FreeQty ?>
        <th data-name="FreeQty" class="<?= $Grid->FreeQty->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_FreeQty" class="view_pharmacy_movement_item_FreeQty"><?= $Grid->renderSort($Grid->FreeQty) ?></div></th>
<?php } ?>
<?php if ($Grid->IQ->Visible) { // IQ ?>
        <th data-name="IQ" class="<?= $Grid->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_IQ" class="view_pharmacy_movement_item_IQ"><?= $Grid->renderSort($Grid->IQ) ?></div></th>
<?php } ?>
<?php if ($Grid->MRQ->Visible) { // MRQ ?>
        <th data-name="MRQ" class="<?= $Grid->MRQ->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_MRQ" class="view_pharmacy_movement_item_MRQ"><?= $Grid->renderSort($Grid->MRQ) ?></div></th>
<?php } ?>
<?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Grid->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BRCODE" class="view_pharmacy_movement_item_BRCODE"><?= $Grid->renderSort($Grid->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Grid->OPNO->Visible) { // OPNO ?>
        <th data-name="OPNO" class="<?= $Grid->OPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_OPNO" class="view_pharmacy_movement_item_OPNO"><?= $Grid->renderSort($Grid->OPNO) ?></div></th>
<?php } ?>
<?php if ($Grid->IPNO->Visible) { // IPNO ?>
        <th data-name="IPNO" class="<?= $Grid->IPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_IPNO" class="view_pharmacy_movement_item_IPNO"><?= $Grid->renderSort($Grid->IPNO) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientBILLNO->Visible) { // PatientBILLNO ?>
        <th data-name="PatientBILLNO" class="<?= $Grid->PatientBILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_PatientBILLNO" class="view_pharmacy_movement_item_PatientBILLNO"><?= $Grid->renderSort($Grid->PatientBILLNO) ?></div></th>
<?php } ?>
<?php if ($Grid->BILLDT->Visible) { // BILLDT ?>
        <th data-name="BILLDT" class="<?= $Grid->BILLDT->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BILLDT" class="view_pharmacy_movement_item_BILLDT"><?= $Grid->renderSort($Grid->BILLDT) ?></div></th>
<?php } ?>
<?php if ($Grid->GRNNO->Visible) { // GRNNO ?>
        <th data-name="GRNNO" class="<?= $Grid->GRNNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_GRNNO" class="view_pharmacy_movement_item_GRNNO"><?= $Grid->renderSort($Grid->GRNNO) ?></div></th>
<?php } ?>
<?php if ($Grid->DT->Visible) { // DT ?>
        <th data-name="DT" class="<?= $Grid->DT->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_DT" class="view_pharmacy_movement_item_DT"><?= $Grid->renderSort($Grid->DT) ?></div></th>
<?php } ?>
<?php if ($Grid->Customername->Visible) { // Customername ?>
        <th data-name="Customername" class="<?= $Grid->Customername->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_Customername" class="view_pharmacy_movement_item_Customername"><?= $Grid->renderSort($Grid->Customername) ?></div></th>
<?php } ?>
<?php if ($Grid->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Grid->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_createdby" class="view_pharmacy_movement_item_createdby"><?= $Grid->renderSort($Grid->createdby) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_createddatetime" class="view_pharmacy_movement_item_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Grid->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_modifiedby" class="view_pharmacy_movement_item_modifiedby"><?= $Grid->renderSort($Grid->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Grid->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_modifieddatetime" class="view_pharmacy_movement_item_modifieddatetime"><?= $Grid->renderSort($Grid->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->BILLNO->Visible) { // BILLNO ?>
        <th data-name="BILLNO" class="<?= $Grid->BILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BILLNO" class="view_pharmacy_movement_item_BILLNO"><?= $Grid->renderSort($Grid->BILLNO) ?></div></th>
<?php } ?>
<?php if ($Grid->prc->Visible) { // prc ?>
        <th data-name="prc" class="<?= $Grid->prc->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_prc" class="view_pharmacy_movement_item_prc"><?= $Grid->renderSort($Grid->prc) ?></div></th>
<?php } ?>
<?php if ($Grid->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Grid->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_PrName" class="view_pharmacy_movement_item_PrName"><?= $Grid->renderSort($Grid->PrName) ?></div></th>
<?php } ?>
<?php if ($Grid->BatchNo->Visible) { // BatchNo ?>
        <th data-name="BatchNo" class="<?= $Grid->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BatchNo" class="view_pharmacy_movement_item_BatchNo"><?= $Grid->renderSort($Grid->BatchNo) ?></div></th>
<?php } ?>
<?php if ($Grid->ExpDate->Visible) { // ExpDate ?>
        <th data-name="ExpDate" class="<?= $Grid->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_ExpDate" class="view_pharmacy_movement_item_ExpDate"><?= $Grid->renderSort($Grid->ExpDate) ?></div></th>
<?php } ?>
<?php if ($Grid->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Grid->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_MFRCODE" class="view_pharmacy_movement_item_MFRCODE"><?= $Grid->renderSort($Grid->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Grid->hsn->Visible) { // hsn ?>
        <th data-name="hsn" class="<?= $Grid->hsn->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_hsn" class="view_pharmacy_movement_item_hsn"><?= $Grid->renderSort($Grid->hsn) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_HospID" class="view_pharmacy_movement_item_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_view_pharmacy_movement_item", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->ProductFrom->Visible) { // ProductFrom ?>
        <td data-name="ProductFrom" <?= $Grid->ProductFrom->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_ProductFrom" class="form-group">
<?php
$onchange = $Grid->ProductFrom->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->ProductFrom->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_ProductFrom" class="ew-auto-suggest">
    <input type="<?= $Grid->ProductFrom->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_ProductFrom" id="sv_x<?= $Grid->RowIndex ?>_ProductFrom" value="<?= RemoveHtml($Grid->ProductFrom->EditValue) ?>" size="30" maxlength="11" placeholder="<?= HtmlEncode($Grid->ProductFrom->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->ProductFrom->getPlaceHolder()) ?>"<?= $Grid->ProductFrom->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-input="sv_x<?= $Grid->RowIndex ?>_ProductFrom" data-value-separator="<?= $Grid->ProductFrom->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_ProductFrom" id="x<?= $Grid->RowIndex ?>_ProductFrom" value="<?= HtmlEncode($Grid->ProductFrom->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->ProductFrom->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid"], function() {
    fview_pharmacy_movement_itemgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_ProductFrom","forceSelect":true}, ew.vars.tables.view_pharmacy_movement_item.fields.ProductFrom.autoSuggestOptions));
});
</script>
<?= $Grid->ProductFrom->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_ProductFrom") ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProductFrom" id="o<?= $Grid->RowIndex ?>_ProductFrom" value="<?= HtmlEncode($Grid->ProductFrom->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_ProductFrom" class="form-group">
<?php
$onchange = $Grid->ProductFrom->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->ProductFrom->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_ProductFrom" class="ew-auto-suggest">
    <input type="<?= $Grid->ProductFrom->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_ProductFrom" id="sv_x<?= $Grid->RowIndex ?>_ProductFrom" value="<?= RemoveHtml($Grid->ProductFrom->EditValue) ?>" size="30" maxlength="11" placeholder="<?= HtmlEncode($Grid->ProductFrom->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->ProductFrom->getPlaceHolder()) ?>"<?= $Grid->ProductFrom->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-input="sv_x<?= $Grid->RowIndex ?>_ProductFrom" data-value-separator="<?= $Grid->ProductFrom->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_ProductFrom" id="x<?= $Grid->RowIndex ?>_ProductFrom" value="<?= HtmlEncode($Grid->ProductFrom->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->ProductFrom->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid"], function() {
    fview_pharmacy_movement_itemgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_ProductFrom","forceSelect":true}, ew.vars.tables.view_pharmacy_movement_item.fields.ProductFrom.autoSuggestOptions));
});
</script>
<?= $Grid->ProductFrom->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_ProductFrom") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_ProductFrom">
<span<?= $Grid->ProductFrom->viewAttributes() ?>>
<?= $Grid->ProductFrom->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_ProductFrom" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_ProductFrom" value="<?= HtmlEncode($Grid->ProductFrom->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_ProductFrom" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_ProductFrom" value="<?= HtmlEncode($Grid->ProductFrom->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Grid->Quantity->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_Quantity" class="form-group">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="30" maxlength="11" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Quantity" id="o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_Quantity" class="form-group">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="30" maxlength="11" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_Quantity">
<span<?= $Grid->Quantity->viewAttributes() ?>>
<?= $Grid->Quantity->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_Quantity" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_Quantity" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->FreeQty->Visible) { // FreeQty ?>
        <td data-name="FreeQty" <?= $Grid->FreeQty->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_FreeQty" class="form-group">
<input type="<?= $Grid->FreeQty->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x<?= $Grid->RowIndex ?>_FreeQty" id="x<?= $Grid->RowIndex ?>_FreeQty" size="30" maxlength="11" placeholder="<?= HtmlEncode($Grid->FreeQty->getPlaceHolder()) ?>" value="<?= $Grid->FreeQty->EditValue ?>"<?= $Grid->FreeQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FreeQty->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FreeQty" id="o<?= $Grid->RowIndex ?>_FreeQty" value="<?= HtmlEncode($Grid->FreeQty->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_FreeQty" class="form-group">
<input type="<?= $Grid->FreeQty->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x<?= $Grid->RowIndex ?>_FreeQty" id="x<?= $Grid->RowIndex ?>_FreeQty" size="30" maxlength="11" placeholder="<?= HtmlEncode($Grid->FreeQty->getPlaceHolder()) ?>" value="<?= $Grid->FreeQty->EditValue ?>"<?= $Grid->FreeQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FreeQty->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_FreeQty">
<span<?= $Grid->FreeQty->viewAttributes() ?>>
<?= $Grid->FreeQty->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_FreeQty" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_FreeQty" value="<?= HtmlEncode($Grid->FreeQty->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_FreeQty" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_FreeQty" value="<?= HtmlEncode($Grid->FreeQty->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->IQ->Visible) { // IQ ?>
        <td data-name="IQ" <?= $Grid->IQ->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_IQ" class="form-group">
<input type="<?= $Grid->IQ->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x<?= $Grid->RowIndex ?>_IQ" id="x<?= $Grid->RowIndex ?>_IQ" size="30" maxlength="14" placeholder="<?= HtmlEncode($Grid->IQ->getPlaceHolder()) ?>" value="<?= $Grid->IQ->EditValue ?>"<?= $Grid->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IQ" id="o<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_IQ" class="form-group">
<input type="<?= $Grid->IQ->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x<?= $Grid->RowIndex ?>_IQ" id="x<?= $Grid->RowIndex ?>_IQ" size="30" maxlength="14" placeholder="<?= HtmlEncode($Grid->IQ->getPlaceHolder()) ?>" value="<?= $Grid->IQ->EditValue ?>"<?= $Grid->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IQ->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_IQ">
<span<?= $Grid->IQ->viewAttributes() ?>>
<?= $Grid->IQ->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_IQ" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_IQ" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MRQ->Visible) { // MRQ ?>
        <td data-name="MRQ" <?= $Grid->MRQ->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_MRQ" class="form-group">
<input type="<?= $Grid->MRQ->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x<?= $Grid->RowIndex ?>_MRQ" id="x<?= $Grid->RowIndex ?>_MRQ" size="30" maxlength="14" placeholder="<?= HtmlEncode($Grid->MRQ->getPlaceHolder()) ?>" value="<?= $Grid->MRQ->EditValue ?>"<?= $Grid->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MRQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MRQ" id="o<?= $Grid->RowIndex ?>_MRQ" value="<?= HtmlEncode($Grid->MRQ->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_MRQ" class="form-group">
<input type="<?= $Grid->MRQ->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x<?= $Grid->RowIndex ?>_MRQ" id="x<?= $Grid->RowIndex ?>_MRQ" size="30" maxlength="14" placeholder="<?= HtmlEncode($Grid->MRQ->getPlaceHolder()) ?>" value="<?= $Grid->MRQ->EditValue ?>"<?= $Grid->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MRQ->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_MRQ">
<span<?= $Grid->MRQ->viewAttributes() ?>>
<?= $Grid->MRQ->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_MRQ" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_MRQ" value="<?= HtmlEncode($Grid->MRQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_MRQ" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_MRQ" value="<?= HtmlEncode($Grid->MRQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Grid->BRCODE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_BRCODE" class="form-group">
<?php
$onchange = $Grid->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_BRCODE" class="ew-auto-suggest">
    <input type="<?= $Grid->BRCODE->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_BRCODE" id="sv_x<?= $Grid->RowIndex ?>_BRCODE" value="<?= RemoveHtml($Grid->BRCODE->EditValue) ?>" size="30" maxlength="11" placeholder="<?= HtmlEncode($Grid->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->BRCODE->getPlaceHolder()) ?>"<?= $Grid->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-input="sv_x<?= $Grid->RowIndex ?>_BRCODE" data-value-separator="<?= $Grid->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_BRCODE" id="x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->BRCODE->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid"], function() {
    fview_pharmacy_movement_itemgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_BRCODE","forceSelect":true}, ew.vars.tables.view_pharmacy_movement_item.fields.BRCODE.autoSuggestOptions));
});
</script>
<?= $Grid->BRCODE->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRCODE" id="o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_BRCODE" class="form-group">
<?php
$onchange = $Grid->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_BRCODE" class="ew-auto-suggest">
    <input type="<?= $Grid->BRCODE->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_BRCODE" id="sv_x<?= $Grid->RowIndex ?>_BRCODE" value="<?= RemoveHtml($Grid->BRCODE->EditValue) ?>" size="30" maxlength="11" placeholder="<?= HtmlEncode($Grid->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->BRCODE->getPlaceHolder()) ?>"<?= $Grid->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-input="sv_x<?= $Grid->RowIndex ?>_BRCODE" data-value-separator="<?= $Grid->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_BRCODE" id="x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->BRCODE->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid"], function() {
    fview_pharmacy_movement_itemgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_BRCODE","forceSelect":true}, ew.vars.tables.view_pharmacy_movement_item.fields.BRCODE.autoSuggestOptions));
});
</script>
<?= $Grid->BRCODE->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_BRCODE") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_BRCODE">
<span<?= $Grid->BRCODE->viewAttributes() ?>>
<?= $Grid->BRCODE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_BRCODE" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_BRCODE" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->OPNO->Visible) { // OPNO ?>
        <td data-name="OPNO" <?= $Grid->OPNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_OPNO" class="form-group">
<input type="<?= $Grid->OPNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x<?= $Grid->RowIndex ?>_OPNO" id="x<?= $Grid->RowIndex ?>_OPNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OPNO->getPlaceHolder()) ?>" value="<?= $Grid->OPNO->EditValue ?>"<?= $Grid->OPNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OPNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OPNO" id="o<?= $Grid->RowIndex ?>_OPNO" value="<?= HtmlEncode($Grid->OPNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_OPNO" class="form-group">
<input type="<?= $Grid->OPNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x<?= $Grid->RowIndex ?>_OPNO" id="x<?= $Grid->RowIndex ?>_OPNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OPNO->getPlaceHolder()) ?>" value="<?= $Grid->OPNO->EditValue ?>"<?= $Grid->OPNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OPNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_OPNO">
<span<?= $Grid->OPNO->viewAttributes() ?>>
<?= $Grid->OPNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_OPNO" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_OPNO" value="<?= HtmlEncode($Grid->OPNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_OPNO" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_OPNO" value="<?= HtmlEncode($Grid->OPNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->IPNO->Visible) { // IPNO ?>
        <td data-name="IPNO" <?= $Grid->IPNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_IPNO" class="form-group">
<input type="<?= $Grid->IPNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x<?= $Grid->RowIndex ?>_IPNO" id="x<?= $Grid->RowIndex ?>_IPNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IPNO->getPlaceHolder()) ?>" value="<?= $Grid->IPNO->EditValue ?>"<?= $Grid->IPNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IPNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IPNO" id="o<?= $Grid->RowIndex ?>_IPNO" value="<?= HtmlEncode($Grid->IPNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_IPNO" class="form-group">
<input type="<?= $Grid->IPNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x<?= $Grid->RowIndex ?>_IPNO" id="x<?= $Grid->RowIndex ?>_IPNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IPNO->getPlaceHolder()) ?>" value="<?= $Grid->IPNO->EditValue ?>"<?= $Grid->IPNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IPNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_IPNO">
<span<?= $Grid->IPNO->viewAttributes() ?>>
<?= $Grid->IPNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_IPNO" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_IPNO" value="<?= HtmlEncode($Grid->IPNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_IPNO" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_IPNO" value="<?= HtmlEncode($Grid->IPNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientBILLNO->Visible) { // PatientBILLNO ?>
        <td data-name="PatientBILLNO" <?= $Grid->PatientBILLNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_PatientBILLNO" class="form-group">
<input type="<?= $Grid->PatientBILLNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x<?= $Grid->RowIndex ?>_PatientBILLNO" id="x<?= $Grid->RowIndex ?>_PatientBILLNO" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->PatientBILLNO->getPlaceHolder()) ?>" value="<?= $Grid->PatientBILLNO->EditValue ?>"<?= $Grid->PatientBILLNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientBILLNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientBILLNO" id="o<?= $Grid->RowIndex ?>_PatientBILLNO" value="<?= HtmlEncode($Grid->PatientBILLNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_PatientBILLNO" class="form-group">
<input type="<?= $Grid->PatientBILLNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x<?= $Grid->RowIndex ?>_PatientBILLNO" id="x<?= $Grid->RowIndex ?>_PatientBILLNO" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->PatientBILLNO->getPlaceHolder()) ?>" value="<?= $Grid->PatientBILLNO->EditValue ?>"<?= $Grid->PatientBILLNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientBILLNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_PatientBILLNO">
<span<?= $Grid->PatientBILLNO->viewAttributes() ?>>
<?= $Grid->PatientBILLNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_PatientBILLNO" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_PatientBILLNO" value="<?= HtmlEncode($Grid->PatientBILLNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_PatientBILLNO" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_PatientBILLNO" value="<?= HtmlEncode($Grid->PatientBILLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BILLDT->Visible) { // BILLDT ?>
        <td data-name="BILLDT" <?= $Grid->BILLDT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_BILLDT" class="form-group">
<input type="<?= $Grid->BILLDT->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x<?= $Grid->RowIndex ?>_BILLDT" id="x<?= $Grid->RowIndex ?>_BILLDT" size="30" maxlength="19" placeholder="<?= HtmlEncode($Grid->BILLDT->getPlaceHolder()) ?>" value="<?= $Grid->BILLDT->EditValue ?>"<?= $Grid->BILLDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BILLDT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BILLDT" id="o<?= $Grid->RowIndex ?>_BILLDT" value="<?= HtmlEncode($Grid->BILLDT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_BILLDT" class="form-group">
<input type="<?= $Grid->BILLDT->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x<?= $Grid->RowIndex ?>_BILLDT" id="x<?= $Grid->RowIndex ?>_BILLDT" size="30" maxlength="19" placeholder="<?= HtmlEncode($Grid->BILLDT->getPlaceHolder()) ?>" value="<?= $Grid->BILLDT->EditValue ?>"<?= $Grid->BILLDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BILLDT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_BILLDT">
<span<?= $Grid->BILLDT->viewAttributes() ?>>
<?= $Grid->BILLDT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_BILLDT" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_BILLDT" value="<?= HtmlEncode($Grid->BILLDT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_BILLDT" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_BILLDT" value="<?= HtmlEncode($Grid->BILLDT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->GRNNO->Visible) { // GRNNO ?>
        <td data-name="GRNNO" <?= $Grid->GRNNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_GRNNO" class="form-group">
<input type="<?= $Grid->GRNNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x<?= $Grid->RowIndex ?>_GRNNO" id="x<?= $Grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GRNNO->getPlaceHolder()) ?>" value="<?= $Grid->GRNNO->EditValue ?>"<?= $Grid->GRNNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GRNNO" id="o<?= $Grid->RowIndex ?>_GRNNO" value="<?= HtmlEncode($Grid->GRNNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_GRNNO" class="form-group">
<input type="<?= $Grid->GRNNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x<?= $Grid->RowIndex ?>_GRNNO" id="x<?= $Grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GRNNO->getPlaceHolder()) ?>" value="<?= $Grid->GRNNO->EditValue ?>"<?= $Grid->GRNNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_GRNNO">
<span<?= $Grid->GRNNO->viewAttributes() ?>>
<?= $Grid->GRNNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_GRNNO" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_GRNNO" value="<?= HtmlEncode($Grid->GRNNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_GRNNO" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_GRNNO" value="<?= HtmlEncode($Grid->GRNNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DT->Visible) { // DT ?>
        <td data-name="DT" <?= $Grid->DT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_DT" class="form-group">
<input type="<?= $Grid->DT->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x<?= $Grid->RowIndex ?>_DT" id="x<?= $Grid->RowIndex ?>_DT" size="30" maxlength="19" placeholder="<?= HtmlEncode($Grid->DT->getPlaceHolder()) ?>" value="<?= $Grid->DT->EditValue ?>"<?= $Grid->DT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DT" id="o<?= $Grid->RowIndex ?>_DT" value="<?= HtmlEncode($Grid->DT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_DT" class="form-group">
<input type="<?= $Grid->DT->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x<?= $Grid->RowIndex ?>_DT" id="x<?= $Grid->RowIndex ?>_DT" size="30" maxlength="19" placeholder="<?= HtmlEncode($Grid->DT->getPlaceHolder()) ?>" value="<?= $Grid->DT->EditValue ?>"<?= $Grid->DT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_DT">
<span<?= $Grid->DT->viewAttributes() ?>>
<?= $Grid->DT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_DT" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_DT" value="<?= HtmlEncode($Grid->DT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_DT" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_DT" value="<?= HtmlEncode($Grid->DT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Customername->Visible) { // Customername ?>
        <td data-name="Customername" <?= $Grid->Customername->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_Customername" class="form-group">
<input type="<?= $Grid->Customername->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x<?= $Grid->RowIndex ?>_Customername" id="x<?= $Grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Customername->getPlaceHolder()) ?>" value="<?= $Grid->Customername->EditValue ?>"<?= $Grid->Customername->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Customername->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Customername" id="o<?= $Grid->RowIndex ?>_Customername" value="<?= HtmlEncode($Grid->Customername->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_Customername" class="form-group">
<input type="<?= $Grid->Customername->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x<?= $Grid->RowIndex ?>_Customername" id="x<?= $Grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Customername->getPlaceHolder()) ?>" value="<?= $Grid->Customername->EditValue ?>"<?= $Grid->Customername->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Customername->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_Customername">
<span<?= $Grid->Customername->viewAttributes() ?>>
<?= $Grid->Customername->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_Customername" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_Customername" value="<?= HtmlEncode($Grid->Customername->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_Customername" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_Customername" value="<?= HtmlEncode($Grid->Customername->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Grid->createdby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_createdby" class="form-group">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_createdby" class="form-group">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<?= $Grid->createdby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_createdby" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_createdby" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_createddatetime" class="form-group">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-format="11" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_createddatetime" class="form-group">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-format="11" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_createddatetime" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_createddatetime" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Grid->modifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_modifiedby" class="form-group">
<input type="<?= $Grid->modifiedby->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->modifiedby->getPlaceHolder()) ?>" value="<?= $Grid->modifiedby->EditValue ?>"<?= $Grid->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifiedby->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_modifiedby" class="form-group">
<input type="<?= $Grid->modifiedby->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->modifiedby->getPlaceHolder()) ?>" value="<?= $Grid->modifiedby->EditValue ?>"<?= $Grid->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifiedby->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<?= $Grid->modifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_modifiedby" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_modifiedby" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Grid->modifieddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_modifieddatetime" class="form-group">
<input type="<?= $Grid->modifieddatetime->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-format="11" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" placeholder="<?= HtmlEncode($Grid->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Grid->modifieddatetime->EditValue ?>"<?= $Grid->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->modifieddatetime->ReadOnly && !$Grid->modifieddatetime->Disabled && !isset($Grid->modifieddatetime->EditAttrs["readonly"]) && !isset($Grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?= $Grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_modifieddatetime" class="form-group">
<input type="<?= $Grid->modifieddatetime->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-format="11" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" placeholder="<?= HtmlEncode($Grid->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Grid->modifieddatetime->EditValue ?>"<?= $Grid->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->modifieddatetime->ReadOnly && !$Grid->modifieddatetime->Disabled && !isset($Grid->modifieddatetime->EditAttrs["readonly"]) && !isset($Grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?= $Grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<?= $Grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BILLNO->Visible) { // BILLNO ?>
        <td data-name="BILLNO" <?= $Grid->BILLNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_BILLNO" class="form-group">
<input type="<?= $Grid->BILLNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x<?= $Grid->RowIndex ?>_BILLNO" id="x<?= $Grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BILLNO->getPlaceHolder()) ?>" value="<?= $Grid->BILLNO->EditValue ?>"<?= $Grid->BILLNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BILLNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BILLNO" id="o<?= $Grid->RowIndex ?>_BILLNO" value="<?= HtmlEncode($Grid->BILLNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_BILLNO" class="form-group">
<input type="<?= $Grid->BILLNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x<?= $Grid->RowIndex ?>_BILLNO" id="x<?= $Grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BILLNO->getPlaceHolder()) ?>" value="<?= $Grid->BILLNO->EditValue ?>"<?= $Grid->BILLNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BILLNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_BILLNO">
<span<?= $Grid->BILLNO->viewAttributes() ?>>
<?= $Grid->BILLNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_BILLNO" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_BILLNO" value="<?= HtmlEncode($Grid->BILLNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_BILLNO" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_BILLNO" value="<?= HtmlEncode($Grid->BILLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->prc->Visible) { // prc ?>
        <td data-name="prc" <?= $Grid->prc->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->prc->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_prc" class="form-group">
<span<?= $Grid->prc->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->prc->getDisplayValue($Grid->prc->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_prc" name="x<?= $Grid->RowIndex ?>_prc" value="<?= HtmlEncode($Grid->prc->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_prc" class="form-group">
<input type="<?= $Grid->prc->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x<?= $Grid->RowIndex ?>_prc" id="x<?= $Grid->RowIndex ?>_prc" size="30" maxlength="9" placeholder="<?= HtmlEncode($Grid->prc->getPlaceHolder()) ?>" value="<?= $Grid->prc->EditValue ?>"<?= $Grid->prc->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->prc->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" data-hidden="1" name="o<?= $Grid->RowIndex ?>_prc" id="o<?= $Grid->RowIndex ?>_prc" value="<?= HtmlEncode($Grid->prc->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->prc->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_prc" class="form-group">
<span<?= $Grid->prc->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->prc->getDisplayValue($Grid->prc->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_prc" name="x<?= $Grid->RowIndex ?>_prc" value="<?= HtmlEncode($Grid->prc->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_prc" class="form-group">
<input type="<?= $Grid->prc->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x<?= $Grid->RowIndex ?>_prc" id="x<?= $Grid->RowIndex ?>_prc" size="30" maxlength="9" placeholder="<?= HtmlEncode($Grid->prc->getPlaceHolder()) ?>" value="<?= $Grid->prc->EditValue ?>"<?= $Grid->prc->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->prc->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_prc">
<span<?= $Grid->prc->viewAttributes() ?>>
<?= $Grid->prc->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_prc" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_prc" value="<?= HtmlEncode($Grid->prc->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_prc" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_prc" value="<?= HtmlEncode($Grid->prc->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Grid->PrName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_PrName" class="form-group">
<input type="<?= $Grid->PrName->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>" value="<?= $Grid->PrName->EditValue ?>"<?= $Grid->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrName" id="o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_PrName" class="form-group">
<input type="<?= $Grid->PrName->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>" value="<?= $Grid->PrName->EditValue ?>"<?= $Grid->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_PrName">
<span<?= $Grid->PrName->viewAttributes() ?>>
<?= $Grid->PrName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_PrName" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_PrName" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" <?= $Grid->BatchNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->BatchNo->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_BatchNo" class="form-group">
<span<?= $Grid->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BatchNo->getDisplayValue($Grid->BatchNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_BatchNo" name="x<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_BatchNo" class="form-group">
<input type="<?= $Grid->BatchNo->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x<?= $Grid->RowIndex ?>_BatchNo" id="x<?= $Grid->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BatchNo->getPlaceHolder()) ?>" value="<?= $Grid->BatchNo->EditValue ?>"<?= $Grid->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BatchNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BatchNo" id="o<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->BatchNo->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_BatchNo" class="form-group">
<span<?= $Grid->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BatchNo->getDisplayValue($Grid->BatchNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_BatchNo" name="x<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_BatchNo" class="form-group">
<input type="<?= $Grid->BatchNo->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x<?= $Grid->RowIndex ?>_BatchNo" id="x<?= $Grid->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BatchNo->getPlaceHolder()) ?>" value="<?= $Grid->BatchNo->EditValue ?>"<?= $Grid->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BatchNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_BatchNo">
<span<?= $Grid->BatchNo->viewAttributes() ?>>
<?= $Grid->BatchNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_BatchNo" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_BatchNo" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate" <?= $Grid->ExpDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_ExpDate" class="form-group">
<input type="<?= $Grid->ExpDate->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="x<?= $Grid->RowIndex ?>_ExpDate" id="x<?= $Grid->RowIndex ?>_ExpDate" placeholder="<?= HtmlEncode($Grid->ExpDate->getPlaceHolder()) ?>" value="<?= $Grid->ExpDate->EditValue ?>"<?= $Grid->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExpDate->getErrorMessage() ?></div>
<?php if (!$Grid->ExpDate->ReadOnly && !$Grid->ExpDate->Disabled && !isset($Grid->ExpDate->EditAttrs["readonly"]) && !isset($Grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?= $Grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ExpDate" id="o<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_ExpDate" class="form-group">
<input type="<?= $Grid->ExpDate->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="x<?= $Grid->RowIndex ?>_ExpDate" id="x<?= $Grid->RowIndex ?>_ExpDate" placeholder="<?= HtmlEncode($Grid->ExpDate->getPlaceHolder()) ?>" value="<?= $Grid->ExpDate->EditValue ?>"<?= $Grid->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExpDate->getErrorMessage() ?></div>
<?php if (!$Grid->ExpDate->ReadOnly && !$Grid->ExpDate->Disabled && !isset($Grid->ExpDate->EditAttrs["readonly"]) && !isset($Grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?= $Grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_ExpDate">
<span<?= $Grid->ExpDate->viewAttributes() ?>>
<?= $Grid->ExpDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_ExpDate" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_ExpDate" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Grid->MFRCODE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_MFRCODE" class="form-group">
<input type="<?= $Grid->MFRCODE->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x<?= $Grid->RowIndex ?>_MFRCODE" id="x<?= $Grid->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MFRCODE->getPlaceHolder()) ?>" value="<?= $Grid->MFRCODE->EditValue ?>"<?= $Grid->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MFRCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MFRCODE" id="o<?= $Grid->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Grid->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_MFRCODE" class="form-group">
<input type="<?= $Grid->MFRCODE->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x<?= $Grid->RowIndex ?>_MFRCODE" id="x<?= $Grid->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MFRCODE->getPlaceHolder()) ?>" value="<?= $Grid->MFRCODE->EditValue ?>"<?= $Grid->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MFRCODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_MFRCODE">
<span<?= $Grid->MFRCODE->viewAttributes() ?>>
<?= $Grid->MFRCODE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_MFRCODE" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Grid->MFRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_MFRCODE" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Grid->MFRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->hsn->Visible) { // hsn ?>
        <td data-name="hsn" <?= $Grid->hsn->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_hsn" class="form-group">
<input type="<?= $Grid->hsn->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x<?= $Grid->RowIndex ?>_hsn" id="x<?= $Grid->RowIndex ?>_hsn" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->hsn->getPlaceHolder()) ?>" value="<?= $Grid->hsn->EditValue ?>"<?= $Grid->hsn->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->hsn->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" data-hidden="1" name="o<?= $Grid->RowIndex ?>_hsn" id="o<?= $Grid->RowIndex ?>_hsn" value="<?= HtmlEncode($Grid->hsn->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_hsn" class="form-group">
<input type="<?= $Grid->hsn->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x<?= $Grid->RowIndex ?>_hsn" id="x<?= $Grid->RowIndex ?>_hsn" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->hsn->getPlaceHolder()) ?>" value="<?= $Grid->hsn->EditValue ?>"<?= $Grid->hsn->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->hsn->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_hsn">
<span<?= $Grid->hsn->viewAttributes() ?>>
<?= $Grid->hsn->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_hsn" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_hsn" value="<?= HtmlEncode($Grid->hsn->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_hsn" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_hsn" value="<?= HtmlEncode($Grid->hsn->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_movement_item_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" data-hidden="1" name="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_HospID" id="fview_pharmacy_movement_itemgrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" data-hidden="1" name="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_HospID" id="fview_pharmacy_movement_itemgrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
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
loadjs.ready(["fview_pharmacy_movement_itemgrid","load"], function () {
    fview_pharmacy_movement_itemgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_view_pharmacy_movement_item", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->ProductFrom->Visible) { // ProductFrom ?>
        <td data-name="ProductFrom">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_ProductFrom" class="form-group view_pharmacy_movement_item_ProductFrom">
<?php
$onchange = $Grid->ProductFrom->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->ProductFrom->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_ProductFrom" class="ew-auto-suggest">
    <input type="<?= $Grid->ProductFrom->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_ProductFrom" id="sv_x<?= $Grid->RowIndex ?>_ProductFrom" value="<?= RemoveHtml($Grid->ProductFrom->EditValue) ?>" size="30" maxlength="11" placeholder="<?= HtmlEncode($Grid->ProductFrom->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->ProductFrom->getPlaceHolder()) ?>"<?= $Grid->ProductFrom->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-input="sv_x<?= $Grid->RowIndex ?>_ProductFrom" data-value-separator="<?= $Grid->ProductFrom->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_ProductFrom" id="x<?= $Grid->RowIndex ?>_ProductFrom" value="<?= HtmlEncode($Grid->ProductFrom->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->ProductFrom->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid"], function() {
    fview_pharmacy_movement_itemgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_ProductFrom","forceSelect":true}, ew.vars.tables.view_pharmacy_movement_item.fields.ProductFrom.autoSuggestOptions));
});
</script>
<?= $Grid->ProductFrom->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_ProductFrom") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_ProductFrom" class="form-group view_pharmacy_movement_item_ProductFrom">
<span<?= $Grid->ProductFrom->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ProductFrom->getDisplayValue($Grid->ProductFrom->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ProductFrom" id="x<?= $Grid->RowIndex ?>_ProductFrom" value="<?= HtmlEncode($Grid->ProductFrom->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProductFrom" id="o<?= $Grid->RowIndex ?>_ProductFrom" value="<?= HtmlEncode($Grid->ProductFrom->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_Quantity" class="form-group view_pharmacy_movement_item_Quantity">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="30" maxlength="11" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_Quantity" class="form-group view_pharmacy_movement_item_Quantity">
<span<?= $Grid->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Quantity->getDisplayValue($Grid->Quantity->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Quantity" id="o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->FreeQty->Visible) { // FreeQty ?>
        <td data-name="FreeQty">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_FreeQty" class="form-group view_pharmacy_movement_item_FreeQty">
<input type="<?= $Grid->FreeQty->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x<?= $Grid->RowIndex ?>_FreeQty" id="x<?= $Grid->RowIndex ?>_FreeQty" size="30" maxlength="11" placeholder="<?= HtmlEncode($Grid->FreeQty->getPlaceHolder()) ?>" value="<?= $Grid->FreeQty->EditValue ?>"<?= $Grid->FreeQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FreeQty->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_FreeQty" class="form-group view_pharmacy_movement_item_FreeQty">
<span<?= $Grid->FreeQty->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->FreeQty->getDisplayValue($Grid->FreeQty->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" data-hidden="1" name="x<?= $Grid->RowIndex ?>_FreeQty" id="x<?= $Grid->RowIndex ?>_FreeQty" value="<?= HtmlEncode($Grid->FreeQty->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FreeQty" id="o<?= $Grid->RowIndex ?>_FreeQty" value="<?= HtmlEncode($Grid->FreeQty->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->IQ->Visible) { // IQ ?>
        <td data-name="IQ">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_IQ" class="form-group view_pharmacy_movement_item_IQ">
<input type="<?= $Grid->IQ->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x<?= $Grid->RowIndex ?>_IQ" id="x<?= $Grid->RowIndex ?>_IQ" size="30" maxlength="14" placeholder="<?= HtmlEncode($Grid->IQ->getPlaceHolder()) ?>" value="<?= $Grid->IQ->EditValue ?>"<?= $Grid->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IQ->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_IQ" class="form-group view_pharmacy_movement_item_IQ">
<span<?= $Grid->IQ->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->IQ->getDisplayValue($Grid->IQ->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" data-hidden="1" name="x<?= $Grid->RowIndex ?>_IQ" id="x<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IQ" id="o<?= $Grid->RowIndex ?>_IQ" value="<?= HtmlEncode($Grid->IQ->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MRQ->Visible) { // MRQ ?>
        <td data-name="MRQ">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_MRQ" class="form-group view_pharmacy_movement_item_MRQ">
<input type="<?= $Grid->MRQ->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x<?= $Grid->RowIndex ?>_MRQ" id="x<?= $Grid->RowIndex ?>_MRQ" size="30" maxlength="14" placeholder="<?= HtmlEncode($Grid->MRQ->getPlaceHolder()) ?>" value="<?= $Grid->MRQ->EditValue ?>"<?= $Grid->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MRQ->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_MRQ" class="form-group view_pharmacy_movement_item_MRQ">
<span<?= $Grid->MRQ->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MRQ->getDisplayValue($Grid->MRQ->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MRQ" id="x<?= $Grid->RowIndex ?>_MRQ" value="<?= HtmlEncode($Grid->MRQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MRQ" id="o<?= $Grid->RowIndex ?>_MRQ" value="<?= HtmlEncode($Grid->MRQ->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BRCODE" class="form-group view_pharmacy_movement_item_BRCODE">
<?php
$onchange = $Grid->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_BRCODE" class="ew-auto-suggest">
    <input type="<?= $Grid->BRCODE->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_BRCODE" id="sv_x<?= $Grid->RowIndex ?>_BRCODE" value="<?= RemoveHtml($Grid->BRCODE->EditValue) ?>" size="30" maxlength="11" placeholder="<?= HtmlEncode($Grid->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->BRCODE->getPlaceHolder()) ?>"<?= $Grid->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-input="sv_x<?= $Grid->RowIndex ?>_BRCODE" data-value-separator="<?= $Grid->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_BRCODE" id="x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->BRCODE->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid"], function() {
    fview_pharmacy_movement_itemgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_BRCODE","forceSelect":true}, ew.vars.tables.view_pharmacy_movement_item.fields.BRCODE.autoSuggestOptions));
});
</script>
<?= $Grid->BRCODE->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_BRCODE") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BRCODE" class="form-group view_pharmacy_movement_item_BRCODE">
<span<?= $Grid->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BRCODE->getDisplayValue($Grid->BRCODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BRCODE" id="x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRCODE" id="o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->OPNO->Visible) { // OPNO ?>
        <td data-name="OPNO">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_OPNO" class="form-group view_pharmacy_movement_item_OPNO">
<input type="<?= $Grid->OPNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x<?= $Grid->RowIndex ?>_OPNO" id="x<?= $Grid->RowIndex ?>_OPNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OPNO->getPlaceHolder()) ?>" value="<?= $Grid->OPNO->EditValue ?>"<?= $Grid->OPNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OPNO->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_OPNO" class="form-group view_pharmacy_movement_item_OPNO">
<span<?= $Grid->OPNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->OPNO->getDisplayValue($Grid->OPNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_OPNO" id="x<?= $Grid->RowIndex ?>_OPNO" value="<?= HtmlEncode($Grid->OPNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OPNO" id="o<?= $Grid->RowIndex ?>_OPNO" value="<?= HtmlEncode($Grid->OPNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->IPNO->Visible) { // IPNO ?>
        <td data-name="IPNO">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_IPNO" class="form-group view_pharmacy_movement_item_IPNO">
<input type="<?= $Grid->IPNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x<?= $Grid->RowIndex ?>_IPNO" id="x<?= $Grid->RowIndex ?>_IPNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IPNO->getPlaceHolder()) ?>" value="<?= $Grid->IPNO->EditValue ?>"<?= $Grid->IPNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IPNO->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_IPNO" class="form-group view_pharmacy_movement_item_IPNO">
<span<?= $Grid->IPNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->IPNO->getDisplayValue($Grid->IPNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_IPNO" id="x<?= $Grid->RowIndex ?>_IPNO" value="<?= HtmlEncode($Grid->IPNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IPNO" id="o<?= $Grid->RowIndex ?>_IPNO" value="<?= HtmlEncode($Grid->IPNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientBILLNO->Visible) { // PatientBILLNO ?>
        <td data-name="PatientBILLNO">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_PatientBILLNO" class="form-group view_pharmacy_movement_item_PatientBILLNO">
<input type="<?= $Grid->PatientBILLNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x<?= $Grid->RowIndex ?>_PatientBILLNO" id="x<?= $Grid->RowIndex ?>_PatientBILLNO" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->PatientBILLNO->getPlaceHolder()) ?>" value="<?= $Grid->PatientBILLNO->EditValue ?>"<?= $Grid->PatientBILLNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientBILLNO->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_PatientBILLNO" class="form-group view_pharmacy_movement_item_PatientBILLNO">
<span<?= $Grid->PatientBILLNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientBILLNO->getDisplayValue($Grid->PatientBILLNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientBILLNO" id="x<?= $Grid->RowIndex ?>_PatientBILLNO" value="<?= HtmlEncode($Grid->PatientBILLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientBILLNO" id="o<?= $Grid->RowIndex ?>_PatientBILLNO" value="<?= HtmlEncode($Grid->PatientBILLNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BILLDT->Visible) { // BILLDT ?>
        <td data-name="BILLDT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BILLDT" class="form-group view_pharmacy_movement_item_BILLDT">
<input type="<?= $Grid->BILLDT->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x<?= $Grid->RowIndex ?>_BILLDT" id="x<?= $Grid->RowIndex ?>_BILLDT" size="30" maxlength="19" placeholder="<?= HtmlEncode($Grid->BILLDT->getPlaceHolder()) ?>" value="<?= $Grid->BILLDT->EditValue ?>"<?= $Grid->BILLDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BILLDT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BILLDT" class="form-group view_pharmacy_movement_item_BILLDT">
<span<?= $Grid->BILLDT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BILLDT->getDisplayValue($Grid->BILLDT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BILLDT" id="x<?= $Grid->RowIndex ?>_BILLDT" value="<?= HtmlEncode($Grid->BILLDT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BILLDT" id="o<?= $Grid->RowIndex ?>_BILLDT" value="<?= HtmlEncode($Grid->BILLDT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GRNNO->Visible) { // GRNNO ?>
        <td data-name="GRNNO">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_GRNNO" class="form-group view_pharmacy_movement_item_GRNNO">
<input type="<?= $Grid->GRNNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x<?= $Grid->RowIndex ?>_GRNNO" id="x<?= $Grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GRNNO->getPlaceHolder()) ?>" value="<?= $Grid->GRNNO->EditValue ?>"<?= $Grid->GRNNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNNO->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_GRNNO" class="form-group view_pharmacy_movement_item_GRNNO">
<span<?= $Grid->GRNNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GRNNO->getDisplayValue($Grid->GRNNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GRNNO" id="x<?= $Grid->RowIndex ?>_GRNNO" value="<?= HtmlEncode($Grid->GRNNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GRNNO" id="o<?= $Grid->RowIndex ?>_GRNNO" value="<?= HtmlEncode($Grid->GRNNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DT->Visible) { // DT ?>
        <td data-name="DT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_DT" class="form-group view_pharmacy_movement_item_DT">
<input type="<?= $Grid->DT->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x<?= $Grid->RowIndex ?>_DT" id="x<?= $Grid->RowIndex ?>_DT" size="30" maxlength="19" placeholder="<?= HtmlEncode($Grid->DT->getPlaceHolder()) ?>" value="<?= $Grid->DT->EditValue ?>"<?= $Grid->DT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_DT" class="form-group view_pharmacy_movement_item_DT">
<span<?= $Grid->DT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DT->getDisplayValue($Grid->DT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DT" id="x<?= $Grid->RowIndex ?>_DT" value="<?= HtmlEncode($Grid->DT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DT" id="o<?= $Grid->RowIndex ?>_DT" value="<?= HtmlEncode($Grid->DT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Customername->Visible) { // Customername ?>
        <td data-name="Customername">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_Customername" class="form-group view_pharmacy_movement_item_Customername">
<input type="<?= $Grid->Customername->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x<?= $Grid->RowIndex ?>_Customername" id="x<?= $Grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Customername->getPlaceHolder()) ?>" value="<?= $Grid->Customername->EditValue ?>"<?= $Grid->Customername->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Customername->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_Customername" class="form-group view_pharmacy_movement_item_Customername">
<span<?= $Grid->Customername->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Customername->getDisplayValue($Grid->Customername->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Customername" id="x<?= $Grid->RowIndex ?>_Customername" value="<?= HtmlEncode($Grid->Customername->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Customername" id="o<?= $Grid->RowIndex ?>_Customername" value="<?= HtmlEncode($Grid->Customername->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_createdby" class="form-group view_pharmacy_movement_item_createdby">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_createdby" class="form-group view_pharmacy_movement_item_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdby->getDisplayValue($Grid->createdby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_createddatetime" class="form-group view_pharmacy_movement_item_createddatetime">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-format="11" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_createddatetime" class="form-group view_pharmacy_movement_item_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_modifiedby" class="form-group view_pharmacy_movement_item_modifiedby">
<input type="<?= $Grid->modifiedby->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->modifiedby->getPlaceHolder()) ?>" value="<?= $Grid->modifiedby->EditValue ?>"<?= $Grid->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifiedby->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_modifiedby" class="form-group view_pharmacy_movement_item_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifiedby->getDisplayValue($Grid->modifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_modifieddatetime" class="form-group view_pharmacy_movement_item_modifieddatetime">
<input type="<?= $Grid->modifieddatetime->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-format="11" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" placeholder="<?= HtmlEncode($Grid->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Grid->modifieddatetime->EditValue ?>"<?= $Grid->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->modifieddatetime->ReadOnly && !$Grid->modifieddatetime->Disabled && !isset($Grid->modifieddatetime->EditAttrs["readonly"]) && !isset($Grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?= $Grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_modifieddatetime" class="form-group view_pharmacy_movement_item_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifieddatetime->getDisplayValue($Grid->modifieddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BILLNO->Visible) { // BILLNO ?>
        <td data-name="BILLNO">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BILLNO" class="form-group view_pharmacy_movement_item_BILLNO">
<input type="<?= $Grid->BILLNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x<?= $Grid->RowIndex ?>_BILLNO" id="x<?= $Grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BILLNO->getPlaceHolder()) ?>" value="<?= $Grid->BILLNO->EditValue ?>"<?= $Grid->BILLNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BILLNO->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BILLNO" class="form-group view_pharmacy_movement_item_BILLNO">
<span<?= $Grid->BILLNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BILLNO->getDisplayValue($Grid->BILLNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BILLNO" id="x<?= $Grid->RowIndex ?>_BILLNO" value="<?= HtmlEncode($Grid->BILLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BILLNO" id="o<?= $Grid->RowIndex ?>_BILLNO" value="<?= HtmlEncode($Grid->BILLNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->prc->Visible) { // prc ?>
        <td data-name="prc">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->prc->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_prc" class="form-group view_pharmacy_movement_item_prc">
<span<?= $Grid->prc->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->prc->getDisplayValue($Grid->prc->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_prc" name="x<?= $Grid->RowIndex ?>_prc" value="<?= HtmlEncode($Grid->prc->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_prc" class="form-group view_pharmacy_movement_item_prc">
<input type="<?= $Grid->prc->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x<?= $Grid->RowIndex ?>_prc" id="x<?= $Grid->RowIndex ?>_prc" size="30" maxlength="9" placeholder="<?= HtmlEncode($Grid->prc->getPlaceHolder()) ?>" value="<?= $Grid->prc->EditValue ?>"<?= $Grid->prc->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->prc->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_prc" class="form-group view_pharmacy_movement_item_prc">
<span<?= $Grid->prc->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->prc->getDisplayValue($Grid->prc->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" data-hidden="1" name="x<?= $Grid->RowIndex ?>_prc" id="x<?= $Grid->RowIndex ?>_prc" value="<?= HtmlEncode($Grid->prc->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" data-hidden="1" name="o<?= $Grid->RowIndex ?>_prc" id="o<?= $Grid->RowIndex ?>_prc" value="<?= HtmlEncode($Grid->prc->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PrName->Visible) { // PrName ?>
        <td data-name="PrName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_PrName" class="form-group view_pharmacy_movement_item_PrName">
<input type="<?= $Grid->PrName->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>" value="<?= $Grid->PrName->EditValue ?>"<?= $Grid->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_PrName" class="form-group view_pharmacy_movement_item_PrName">
<span<?= $Grid->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PrName->getDisplayValue($Grid->PrName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrName" id="o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->BatchNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BatchNo" class="form-group view_pharmacy_movement_item_BatchNo">
<span<?= $Grid->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BatchNo->getDisplayValue($Grid->BatchNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_BatchNo" name="x<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BatchNo" class="form-group view_pharmacy_movement_item_BatchNo">
<input type="<?= $Grid->BatchNo->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x<?= $Grid->RowIndex ?>_BatchNo" id="x<?= $Grid->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BatchNo->getPlaceHolder()) ?>" value="<?= $Grid->BatchNo->EditValue ?>"<?= $Grid->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BatchNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BatchNo" class="form-group view_pharmacy_movement_item_BatchNo">
<span<?= $Grid->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BatchNo->getDisplayValue($Grid->BatchNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BatchNo" id="x<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BatchNo" id="o<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_ExpDate" class="form-group view_pharmacy_movement_item_ExpDate">
<input type="<?= $Grid->ExpDate->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="x<?= $Grid->RowIndex ?>_ExpDate" id="x<?= $Grid->RowIndex ?>_ExpDate" placeholder="<?= HtmlEncode($Grid->ExpDate->getPlaceHolder()) ?>" value="<?= $Grid->ExpDate->EditValue ?>"<?= $Grid->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExpDate->getErrorMessage() ?></div>
<?php if (!$Grid->ExpDate->ReadOnly && !$Grid->ExpDate->Disabled && !isset($Grid->ExpDate->EditAttrs["readonly"]) && !isset($Grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?= $Grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_ExpDate" class="form-group view_pharmacy_movement_item_ExpDate">
<span<?= $Grid->ExpDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ExpDate->getDisplayValue($Grid->ExpDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ExpDate" id="x<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ExpDate" id="o<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_MFRCODE" class="form-group view_pharmacy_movement_item_MFRCODE">
<input type="<?= $Grid->MFRCODE->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x<?= $Grid->RowIndex ?>_MFRCODE" id="x<?= $Grid->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MFRCODE->getPlaceHolder()) ?>" value="<?= $Grid->MFRCODE->EditValue ?>"<?= $Grid->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MFRCODE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_MFRCODE" class="form-group view_pharmacy_movement_item_MFRCODE">
<span<?= $Grid->MFRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MFRCODE->getDisplayValue($Grid->MFRCODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MFRCODE" id="x<?= $Grid->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Grid->MFRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MFRCODE" id="o<?= $Grid->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Grid->MFRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->hsn->Visible) { // hsn ?>
        <td data-name="hsn">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_hsn" class="form-group view_pharmacy_movement_item_hsn">
<input type="<?= $Grid->hsn->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x<?= $Grid->RowIndex ?>_hsn" id="x<?= $Grid->RowIndex ?>_hsn" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->hsn->getPlaceHolder()) ?>" value="<?= $Grid->hsn->EditValue ?>"<?= $Grid->hsn->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->hsn->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_hsn" class="form-group view_pharmacy_movement_item_hsn">
<span<?= $Grid->hsn->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->hsn->getDisplayValue($Grid->hsn->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" data-hidden="1" name="x<?= $Grid->RowIndex ?>_hsn" id="x<?= $Grid->RowIndex ?>_hsn" value="<?= HtmlEncode($Grid->hsn->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" data-hidden="1" name="o<?= $Grid->RowIndex ?>_hsn" id="o<?= $Grid->RowIndex ?>_hsn" value="<?= HtmlEncode($Grid->hsn->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_HospID" class="form-group view_pharmacy_movement_item_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid","load"], function() {
    fview_pharmacy_movement_itemgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fview_pharmacy_movement_itemgrid">
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
    ew.addEventHandlers("view_pharmacy_movement_item");
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
        container: "gmp_view_pharmacy_movement_item",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
