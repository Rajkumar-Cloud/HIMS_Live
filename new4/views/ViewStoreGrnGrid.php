<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("ViewStoreGrnGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_store_grngrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fview_store_grngrid = new ew.Form("fview_store_grngrid", "grid");
    fview_store_grngrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_store_grn")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_store_grn)
        ew.vars.tables.view_store_grn = currentTable;
    fview_store_grngrid.addFields([
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["PrName", [fields.PrName.visible && fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["GrnQuantity", [fields.GrnQuantity.visible && fields.GrnQuantity.required ? ew.Validators.required(fields.GrnQuantity.caption) : null, ew.Validators.integer], fields.GrnQuantity.isInvalid],
        ["FreeQty", [fields.FreeQty.visible && fields.FreeQty.required ? ew.Validators.required(fields.FreeQty.caption) : null, ew.Validators.integer], fields.FreeQty.isInvalid],
        ["MFRCODE", [fields.MFRCODE.visible && fields.MFRCODE.required ? ew.Validators.required(fields.MFRCODE.caption) : null], fields.MFRCODE.isInvalid],
        ["PUnit", [fields.PUnit.visible && fields.PUnit.required ? ew.Validators.required(fields.PUnit.caption) : null, ew.Validators.integer], fields.PUnit.isInvalid],
        ["SUnit", [fields.SUnit.visible && fields.SUnit.required ? ew.Validators.required(fields.SUnit.caption) : null, ew.Validators.integer], fields.SUnit.isInvalid],
        ["MRP", [fields.MRP.visible && fields.MRP.required ? ew.Validators.required(fields.MRP.caption) : null, ew.Validators.float], fields.MRP.isInvalid],
        ["PurValue", [fields.PurValue.visible && fields.PurValue.required ? ew.Validators.required(fields.PurValue.caption) : null, ew.Validators.float], fields.PurValue.isInvalid],
        ["Disc", [fields.Disc.visible && fields.Disc.required ? ew.Validators.required(fields.Disc.caption) : null, ew.Validators.float], fields.Disc.isInvalid],
        ["PSGST", [fields.PSGST.visible && fields.PSGST.required ? ew.Validators.required(fields.PSGST.caption) : null], fields.PSGST.isInvalid],
        ["PCGST", [fields.PCGST.visible && fields.PCGST.required ? ew.Validators.required(fields.PCGST.caption) : null], fields.PCGST.isInvalid],
        ["PTax", [fields.PTax.visible && fields.PTax.required ? ew.Validators.required(fields.PTax.caption) : null, ew.Validators.float], fields.PTax.isInvalid],
        ["ItemValue", [fields.ItemValue.visible && fields.ItemValue.required ? ew.Validators.required(fields.ItemValue.caption) : null, ew.Validators.float], fields.ItemValue.isInvalid],
        ["SalTax", [fields.SalTax.visible && fields.SalTax.required ? ew.Validators.required(fields.SalTax.caption) : null, ew.Validators.float], fields.SalTax.isInvalid],
        ["BatchNo", [fields.BatchNo.visible && fields.BatchNo.required ? ew.Validators.required(fields.BatchNo.caption) : null], fields.BatchNo.isInvalid],
        ["ExpDate", [fields.ExpDate.visible && fields.ExpDate.required ? ew.Validators.required(fields.ExpDate.caption) : null, ew.Validators.datetime(7)], fields.ExpDate.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null, ew.Validators.integer], fields.Quantity.isInvalid],
        ["SalRate", [fields.SalRate.visible && fields.SalRate.required ? ew.Validators.required(fields.SalRate.caption) : null, ew.Validators.float], fields.SalRate.isInvalid],
        ["SSGST", [fields.SSGST.visible && fields.SSGST.required ? ew.Validators.required(fields.SSGST.caption) : null], fields.SSGST.isInvalid],
        ["SCGST", [fields.SCGST.visible && fields.SCGST.required ? ew.Validators.required(fields.SCGST.caption) : null], fields.SCGST.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["HSN", [fields.HSN.visible && fields.HSN.required ? ew.Validators.required(fields.HSN.caption) : null], fields.HSN.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["grncreatedby", [fields.grncreatedby.visible && fields.grncreatedby.required ? ew.Validators.required(fields.grncreatedby.caption) : null], fields.grncreatedby.isInvalid],
        ["grncreatedDateTime", [fields.grncreatedDateTime.visible && fields.grncreatedDateTime.required ? ew.Validators.required(fields.grncreatedDateTime.caption) : null], fields.grncreatedDateTime.isInvalid],
        ["grnModifiedby", [fields.grnModifiedby.visible && fields.grnModifiedby.required ? ew.Validators.required(fields.grnModifiedby.caption) : null], fields.grnModifiedby.isInvalid],
        ["grnModifiedDateTime", [fields.grnModifiedDateTime.visible && fields.grnModifiedDateTime.required ? ew.Validators.required(fields.grnModifiedDateTime.caption) : null], fields.grnModifiedDateTime.isInvalid],
        ["BillDate", [fields.BillDate.visible && fields.BillDate.required ? ew.Validators.required(fields.BillDate.caption) : null, ew.Validators.datetime(0)], fields.BillDate.isInvalid],
        ["CurStock", [fields.CurStock.visible && fields.CurStock.required ? ew.Validators.required(fields.CurStock.caption) : null, ew.Validators.integer], fields.CurStock.isInvalid],
        ["FreeQtyyy", [fields.FreeQtyyy.visible && fields.FreeQtyyy.required ? ew.Validators.required(fields.FreeQtyyy.caption) : null, ew.Validators.integer], fields.FreeQtyyy.isInvalid],
        ["grndate", [fields.grndate.visible && fields.grndate.required ? ew.Validators.required(fields.grndate.caption) : null, ew.Validators.datetime(0)], fields.grndate.isInvalid],
        ["grndatetime", [fields.grndatetime.visible && fields.grndatetime.required ? ew.Validators.required(fields.grndatetime.caption) : null, ew.Validators.datetime(0)], fields.grndatetime.isInvalid],
        ["strid", [fields.strid.visible && fields.strid.required ? ew.Validators.required(fields.strid.caption) : null, ew.Validators.integer], fields.strid.isInvalid],
        ["GRNPer", [fields.GRNPer.visible && fields.GRNPer.required ? ew.Validators.required(fields.GRNPer.caption) : null, ew.Validators.float], fields.GRNPer.isInvalid],
        ["StoreID", [fields.StoreID.visible && fields.StoreID.required ? ew.Validators.required(fields.StoreID.caption) : null], fields.StoreID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_store_grngrid,
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
    fview_store_grngrid.validate = function () {
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
    fview_store_grngrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PRC", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GrnQuantity", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "FreeQty", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MFRCODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PUnit", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SUnit", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MRP", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PurValue", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Disc", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PSGST", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PCGST", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PTax", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ItemValue", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SalTax", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BatchNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ExpDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Quantity", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SalRate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SSGST", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SCGST", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HSN", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CurStock", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "FreeQtyyy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "grndate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "grndatetime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "strid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GRNPer", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "StoreID", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_store_grngrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_store_grngrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_store_grngrid.lists.PrName = <?= $Grid->PrName->toClientList($Grid) ?>;
    loadjs.done("fview_store_grngrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_store_grn">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_store_grngrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_store_grn" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_store_grngrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Grid->PRC->headerCellClass() ?>"><div id="elh_view_store_grn_PRC" class="view_store_grn_PRC"><?= $Grid->renderSort($Grid->PRC) ?></div></th>
<?php } ?>
<?php if ($Grid->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Grid->PrName->headerCellClass() ?>"><div id="elh_view_store_grn_PrName" class="view_store_grn_PrName"><?= $Grid->renderSort($Grid->PrName) ?></div></th>
<?php } ?>
<?php if ($Grid->GrnQuantity->Visible) { // GrnQuantity ?>
        <th data-name="GrnQuantity" class="<?= $Grid->GrnQuantity->headerCellClass() ?>"><div id="elh_view_store_grn_GrnQuantity" class="view_store_grn_GrnQuantity"><?= $Grid->renderSort($Grid->GrnQuantity) ?></div></th>
<?php } ?>
<?php if ($Grid->FreeQty->Visible) { // FreeQty ?>
        <th data-name="FreeQty" class="<?= $Grid->FreeQty->headerCellClass() ?>"><div id="elh_view_store_grn_FreeQty" class="view_store_grn_FreeQty"><?= $Grid->renderSort($Grid->FreeQty) ?></div></th>
<?php } ?>
<?php if ($Grid->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Grid->MFRCODE->headerCellClass() ?>"><div id="elh_view_store_grn_MFRCODE" class="view_store_grn_MFRCODE"><?= $Grid->renderSort($Grid->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Grid->PUnit->Visible) { // PUnit ?>
        <th data-name="PUnit" class="<?= $Grid->PUnit->headerCellClass() ?>"><div id="elh_view_store_grn_PUnit" class="view_store_grn_PUnit"><?= $Grid->renderSort($Grid->PUnit) ?></div></th>
<?php } ?>
<?php if ($Grid->SUnit->Visible) { // SUnit ?>
        <th data-name="SUnit" class="<?= $Grid->SUnit->headerCellClass() ?>"><div id="elh_view_store_grn_SUnit" class="view_store_grn_SUnit"><?= $Grid->renderSort($Grid->SUnit) ?></div></th>
<?php } ?>
<?php if ($Grid->MRP->Visible) { // MRP ?>
        <th data-name="MRP" class="<?= $Grid->MRP->headerCellClass() ?>"><div id="elh_view_store_grn_MRP" class="view_store_grn_MRP"><?= $Grid->renderSort($Grid->MRP) ?></div></th>
<?php } ?>
<?php if ($Grid->PurValue->Visible) { // PurValue ?>
        <th data-name="PurValue" class="<?= $Grid->PurValue->headerCellClass() ?>"><div id="elh_view_store_grn_PurValue" class="view_store_grn_PurValue"><?= $Grid->renderSort($Grid->PurValue) ?></div></th>
<?php } ?>
<?php if ($Grid->Disc->Visible) { // Disc ?>
        <th data-name="Disc" class="<?= $Grid->Disc->headerCellClass() ?>"><div id="elh_view_store_grn_Disc" class="view_store_grn_Disc"><?= $Grid->renderSort($Grid->Disc) ?></div></th>
<?php } ?>
<?php if ($Grid->PSGST->Visible) { // PSGST ?>
        <th data-name="PSGST" class="<?= $Grid->PSGST->headerCellClass() ?>"><div id="elh_view_store_grn_PSGST" class="view_store_grn_PSGST"><?= $Grid->renderSort($Grid->PSGST) ?></div></th>
<?php } ?>
<?php if ($Grid->PCGST->Visible) { // PCGST ?>
        <th data-name="PCGST" class="<?= $Grid->PCGST->headerCellClass() ?>"><div id="elh_view_store_grn_PCGST" class="view_store_grn_PCGST"><?= $Grid->renderSort($Grid->PCGST) ?></div></th>
<?php } ?>
<?php if ($Grid->PTax->Visible) { // PTax ?>
        <th data-name="PTax" class="<?= $Grid->PTax->headerCellClass() ?>"><div id="elh_view_store_grn_PTax" class="view_store_grn_PTax"><?= $Grid->renderSort($Grid->PTax) ?></div></th>
<?php } ?>
<?php if ($Grid->ItemValue->Visible) { // ItemValue ?>
        <th data-name="ItemValue" class="<?= $Grid->ItemValue->headerCellClass() ?>"><div id="elh_view_store_grn_ItemValue" class="view_store_grn_ItemValue"><?= $Grid->renderSort($Grid->ItemValue) ?></div></th>
<?php } ?>
<?php if ($Grid->SalTax->Visible) { // SalTax ?>
        <th data-name="SalTax" class="<?= $Grid->SalTax->headerCellClass() ?>"><div id="elh_view_store_grn_SalTax" class="view_store_grn_SalTax"><?= $Grid->renderSort($Grid->SalTax) ?></div></th>
<?php } ?>
<?php if ($Grid->BatchNo->Visible) { // BatchNo ?>
        <th data-name="BatchNo" class="<?= $Grid->BatchNo->headerCellClass() ?>"><div id="elh_view_store_grn_BatchNo" class="view_store_grn_BatchNo"><?= $Grid->renderSort($Grid->BatchNo) ?></div></th>
<?php } ?>
<?php if ($Grid->ExpDate->Visible) { // ExpDate ?>
        <th data-name="ExpDate" class="<?= $Grid->ExpDate->headerCellClass() ?>"><div id="elh_view_store_grn_ExpDate" class="view_store_grn_ExpDate"><?= $Grid->renderSort($Grid->ExpDate) ?></div></th>
<?php } ?>
<?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Grid->Quantity->headerCellClass() ?>"><div id="elh_view_store_grn_Quantity" class="view_store_grn_Quantity"><?= $Grid->renderSort($Grid->Quantity) ?></div></th>
<?php } ?>
<?php if ($Grid->SalRate->Visible) { // SalRate ?>
        <th data-name="SalRate" class="<?= $Grid->SalRate->headerCellClass() ?>"><div id="elh_view_store_grn_SalRate" class="view_store_grn_SalRate"><?= $Grid->renderSort($Grid->SalRate) ?></div></th>
<?php } ?>
<?php if ($Grid->SSGST->Visible) { // SSGST ?>
        <th data-name="SSGST" class="<?= $Grid->SSGST->headerCellClass() ?>"><div id="elh_view_store_grn_SSGST" class="view_store_grn_SSGST"><?= $Grid->renderSort($Grid->SSGST) ?></div></th>
<?php } ?>
<?php if ($Grid->SCGST->Visible) { // SCGST ?>
        <th data-name="SCGST" class="<?= $Grid->SCGST->headerCellClass() ?>"><div id="elh_view_store_grn_SCGST" class="view_store_grn_SCGST"><?= $Grid->renderSort($Grid->SCGST) ?></div></th>
<?php } ?>
<?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Grid->BRCODE->headerCellClass() ?>"><div id="elh_view_store_grn_BRCODE" class="view_store_grn_BRCODE"><?= $Grid->renderSort($Grid->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Grid->HSN->Visible) { // HSN ?>
        <th data-name="HSN" class="<?= $Grid->HSN->headerCellClass() ?>"><div id="elh_view_store_grn_HSN" class="view_store_grn_HSN"><?= $Grid->renderSort($Grid->HSN) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_view_store_grn_HospID" class="view_store_grn_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
<?php } ?>
<?php if ($Grid->grncreatedby->Visible) { // grncreatedby ?>
        <th data-name="grncreatedby" class="<?= $Grid->grncreatedby->headerCellClass() ?>"><div id="elh_view_store_grn_grncreatedby" class="view_store_grn_grncreatedby"><?= $Grid->renderSort($Grid->grncreatedby) ?></div></th>
<?php } ?>
<?php if ($Grid->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <th data-name="grncreatedDateTime" class="<?= $Grid->grncreatedDateTime->headerCellClass() ?>"><div id="elh_view_store_grn_grncreatedDateTime" class="view_store_grn_grncreatedDateTime"><?= $Grid->renderSort($Grid->grncreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Grid->grnModifiedby->Visible) { // grnModifiedby ?>
        <th data-name="grnModifiedby" class="<?= $Grid->grnModifiedby->headerCellClass() ?>"><div id="elh_view_store_grn_grnModifiedby" class="view_store_grn_grnModifiedby"><?= $Grid->renderSort($Grid->grnModifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <th data-name="grnModifiedDateTime" class="<?= $Grid->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_view_store_grn_grnModifiedDateTime" class="view_store_grn_grnModifiedDateTime"><?= $Grid->renderSort($Grid->grnModifiedDateTime) ?></div></th>
<?php } ?>
<?php if ($Grid->BillDate->Visible) { // BillDate ?>
        <th data-name="BillDate" class="<?= $Grid->BillDate->headerCellClass() ?>"><div id="elh_view_store_grn_BillDate" class="view_store_grn_BillDate"><?= $Grid->renderSort($Grid->BillDate) ?></div></th>
<?php } ?>
<?php if ($Grid->CurStock->Visible) { // CurStock ?>
        <th data-name="CurStock" class="<?= $Grid->CurStock->headerCellClass() ?>"><div id="elh_view_store_grn_CurStock" class="view_store_grn_CurStock"><?= $Grid->renderSort($Grid->CurStock) ?></div></th>
<?php } ?>
<?php if ($Grid->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <th data-name="FreeQtyyy" class="<?= $Grid->FreeQtyyy->headerCellClass() ?>"><div id="elh_view_store_grn_FreeQtyyy" class="view_store_grn_FreeQtyyy"><?= $Grid->renderSort($Grid->FreeQtyyy) ?></div></th>
<?php } ?>
<?php if ($Grid->grndate->Visible) { // grndate ?>
        <th data-name="grndate" class="<?= $Grid->grndate->headerCellClass() ?>"><div id="elh_view_store_grn_grndate" class="view_store_grn_grndate"><?= $Grid->renderSort($Grid->grndate) ?></div></th>
<?php } ?>
<?php if ($Grid->grndatetime->Visible) { // grndatetime ?>
        <th data-name="grndatetime" class="<?= $Grid->grndatetime->headerCellClass() ?>"><div id="elh_view_store_grn_grndatetime" class="view_store_grn_grndatetime"><?= $Grid->renderSort($Grid->grndatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->strid->Visible) { // strid ?>
        <th data-name="strid" class="<?= $Grid->strid->headerCellClass() ?>"><div id="elh_view_store_grn_strid" class="view_store_grn_strid"><?= $Grid->renderSort($Grid->strid) ?></div></th>
<?php } ?>
<?php if ($Grid->GRNPer->Visible) { // GRNPer ?>
        <th data-name="GRNPer" class="<?= $Grid->GRNPer->headerCellClass() ?>"><div id="elh_view_store_grn_GRNPer" class="view_store_grn_GRNPer"><?= $Grid->renderSort($Grid->GRNPer) ?></div></th>
<?php } ?>
<?php if ($Grid->StoreID->Visible) { // StoreID ?>
        <th data-name="StoreID" class="<?= $Grid->StoreID->headerCellClass() ?>"><div id="elh_view_store_grn_StoreID" class="view_store_grn_StoreID"><?= $Grid->renderSort($Grid->StoreID) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_view_store_grn", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Grid->PRC->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PRC" class="form-group">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="4" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PRC" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PRC" id="o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PRC" class="form-group">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="4" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PRC">
<span<?= $Grid->PRC->viewAttributes() ?>>
<?= $Grid->PRC->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PRC" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_PRC" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PRC" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_PRC" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Grid->PrName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PrName" class="form-group">
<?php
$onchange = $Grid->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_PrName" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Grid->PrName->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_PrName" id="sv_x<?= $Grid->RowIndex ?>_PrName" value="<?= RemoveHtml($Grid->PrName->EditValue) ?>" size="20" maxlength="45" placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>"<?= $Grid->PrName->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "store_storemast") && !$Grid->PrName->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_PrName" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->PrName->caption() ?>" data-title="<?= $Grid->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_PrName',url:'<?= GetUrl("StoreStoremastAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_store_grn" data-field="x_PrName" data-input="sv_x<?= $Grid->RowIndex ?>_PrName" data-value-separator="<?= $Grid->PrName->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->PrName->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_store_grngrid"], function() {
    fview_store_grngrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_PrName","forceSelect":true}, ew.vars.tables.view_store_grn.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Grid->PrName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrName" id="o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PrName" class="form-group">
<?php
$onchange = $Grid->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_PrName" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Grid->PrName->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_PrName" id="sv_x<?= $Grid->RowIndex ?>_PrName" value="<?= RemoveHtml($Grid->PrName->EditValue) ?>" size="20" maxlength="45" placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>"<?= $Grid->PrName->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "store_storemast") && !$Grid->PrName->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_PrName" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->PrName->caption() ?>" data-title="<?= $Grid->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_PrName',url:'<?= GetUrl("StoreStoremastAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_store_grn" data-field="x_PrName" data-input="sv_x<?= $Grid->RowIndex ?>_PrName" data-value-separator="<?= $Grid->PrName->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->PrName->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_store_grngrid"], function() {
    fview_store_grngrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_PrName","forceSelect":true}, ew.vars.tables.view_store_grn.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Grid->PrName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PrName") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PrName">
<span<?= $Grid->PrName->viewAttributes() ?>>
<?= $Grid->PrName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_PrName" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_PrName" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->GrnQuantity->Visible) { // GrnQuantity ?>
        <td data-name="GrnQuantity" <?= $Grid->GrnQuantity->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_GrnQuantity" class="form-group">
<input type="<?= $Grid->GrnQuantity->getInputTextType() ?>" data-table="view_store_grn" data-field="x_GrnQuantity" name="x<?= $Grid->RowIndex ?>_GrnQuantity" id="x<?= $Grid->RowIndex ?>_GrnQuantity" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->GrnQuantity->getPlaceHolder()) ?>" value="<?= $Grid->GrnQuantity->EditValue ?>"<?= $Grid->GrnQuantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GrnQuantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_GrnQuantity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GrnQuantity" id="o<?= $Grid->RowIndex ?>_GrnQuantity" value="<?= HtmlEncode($Grid->GrnQuantity->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_GrnQuantity" class="form-group">
<input type="<?= $Grid->GrnQuantity->getInputTextType() ?>" data-table="view_store_grn" data-field="x_GrnQuantity" name="x<?= $Grid->RowIndex ?>_GrnQuantity" id="x<?= $Grid->RowIndex ?>_GrnQuantity" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->GrnQuantity->getPlaceHolder()) ?>" value="<?= $Grid->GrnQuantity->EditValue ?>"<?= $Grid->GrnQuantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GrnQuantity->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_GrnQuantity">
<span<?= $Grid->GrnQuantity->viewAttributes() ?>>
<?= $Grid->GrnQuantity->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_GrnQuantity" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_GrnQuantity" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_GrnQuantity" value="<?= HtmlEncode($Grid->GrnQuantity->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_GrnQuantity" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_GrnQuantity" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_GrnQuantity" value="<?= HtmlEncode($Grid->GrnQuantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->FreeQty->Visible) { // FreeQty ?>
        <td data-name="FreeQty" <?= $Grid->FreeQty->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_FreeQty" class="form-group">
<input type="<?= $Grid->FreeQty->getInputTextType() ?>" data-table="view_store_grn" data-field="x_FreeQty" name="x<?= $Grid->RowIndex ?>_FreeQty" id="x<?= $Grid->RowIndex ?>_FreeQty" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->FreeQty->getPlaceHolder()) ?>" value="<?= $Grid->FreeQty->EditValue ?>"<?= $Grid->FreeQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FreeQty->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQty" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FreeQty" id="o<?= $Grid->RowIndex ?>_FreeQty" value="<?= HtmlEncode($Grid->FreeQty->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_FreeQty" class="form-group">
<input type="<?= $Grid->FreeQty->getInputTextType() ?>" data-table="view_store_grn" data-field="x_FreeQty" name="x<?= $Grid->RowIndex ?>_FreeQty" id="x<?= $Grid->RowIndex ?>_FreeQty" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->FreeQty->getPlaceHolder()) ?>" value="<?= $Grid->FreeQty->EditValue ?>"<?= $Grid->FreeQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FreeQty->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_FreeQty">
<span<?= $Grid->FreeQty->viewAttributes() ?>>
<?= $Grid->FreeQty->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQty" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_FreeQty" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_FreeQty" value="<?= HtmlEncode($Grid->FreeQty->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQty" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_FreeQty" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_FreeQty" value="<?= HtmlEncode($Grid->FreeQty->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Grid->MFRCODE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_MFRCODE" class="form-group">
<input type="<?= $Grid->MFRCODE->getInputTextType() ?>" data-table="view_store_grn" data-field="x_MFRCODE" name="x<?= $Grid->RowIndex ?>_MFRCODE" id="x<?= $Grid->RowIndex ?>_MFRCODE" size="6" maxlength="6" placeholder="<?= HtmlEncode($Grid->MFRCODE->getPlaceHolder()) ?>" value="<?= $Grid->MFRCODE->EditValue ?>"<?= $Grid->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MFRCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_MFRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MFRCODE" id="o<?= $Grid->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Grid->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_MFRCODE" class="form-group">
<input type="<?= $Grid->MFRCODE->getInputTextType() ?>" data-table="view_store_grn" data-field="x_MFRCODE" name="x<?= $Grid->RowIndex ?>_MFRCODE" id="x<?= $Grid->RowIndex ?>_MFRCODE" size="6" maxlength="6" placeholder="<?= HtmlEncode($Grid->MFRCODE->getPlaceHolder()) ?>" value="<?= $Grid->MFRCODE->EditValue ?>"<?= $Grid->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MFRCODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_MFRCODE">
<span<?= $Grid->MFRCODE->viewAttributes() ?>>
<?= $Grid->MFRCODE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_MFRCODE" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_MFRCODE" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Grid->MFRCODE->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_MFRCODE" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_MFRCODE" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Grid->MFRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit" <?= $Grid->PUnit->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PUnit" class="form-group">
<input type="<?= $Grid->PUnit->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PUnit" name="x<?= $Grid->RowIndex ?>_PUnit" id="x<?= $Grid->RowIndex ?>_PUnit" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->PUnit->getPlaceHolder()) ?>" value="<?= $Grid->PUnit->EditValue ?>"<?= $Grid->PUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PUnit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PUnit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PUnit" id="o<?= $Grid->RowIndex ?>_PUnit" value="<?= HtmlEncode($Grid->PUnit->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PUnit" class="form-group">
<input type="<?= $Grid->PUnit->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PUnit" name="x<?= $Grid->RowIndex ?>_PUnit" id="x<?= $Grid->RowIndex ?>_PUnit" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->PUnit->getPlaceHolder()) ?>" value="<?= $Grid->PUnit->EditValue ?>"<?= $Grid->PUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PUnit->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PUnit">
<span<?= $Grid->PUnit->viewAttributes() ?>>
<?= $Grid->PUnit->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PUnit" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_PUnit" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_PUnit" value="<?= HtmlEncode($Grid->PUnit->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PUnit" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_PUnit" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_PUnit" value="<?= HtmlEncode($Grid->PUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SUnit->Visible) { // SUnit ?>
        <td data-name="SUnit" <?= $Grid->SUnit->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SUnit" class="form-group">
<input type="<?= $Grid->SUnit->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SUnit" name="x<?= $Grid->RowIndex ?>_SUnit" id="x<?= $Grid->RowIndex ?>_SUnit" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->SUnit->getPlaceHolder()) ?>" value="<?= $Grid->SUnit->EditValue ?>"<?= $Grid->SUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SUnit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SUnit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SUnit" id="o<?= $Grid->RowIndex ?>_SUnit" value="<?= HtmlEncode($Grid->SUnit->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SUnit" class="form-group">
<input type="<?= $Grid->SUnit->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SUnit" name="x<?= $Grid->RowIndex ?>_SUnit" id="x<?= $Grid->RowIndex ?>_SUnit" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->SUnit->getPlaceHolder()) ?>" value="<?= $Grid->SUnit->EditValue ?>"<?= $Grid->SUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SUnit->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SUnit">
<span<?= $Grid->SUnit->viewAttributes() ?>>
<?= $Grid->SUnit->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SUnit" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_SUnit" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_SUnit" value="<?= HtmlEncode($Grid->SUnit->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SUnit" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_SUnit" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_SUnit" value="<?= HtmlEncode($Grid->SUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MRP->Visible) { // MRP ?>
        <td data-name="MRP" <?= $Grid->MRP->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_MRP" class="form-group">
<input type="<?= $Grid->MRP->getInputTextType() ?>" data-table="view_store_grn" data-field="x_MRP" name="x<?= $Grid->RowIndex ?>_MRP" id="x<?= $Grid->RowIndex ?>_MRP" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->MRP->getPlaceHolder()) ?>" value="<?= $Grid->MRP->EditValue ?>"<?= $Grid->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MRP->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_MRP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MRP" id="o<?= $Grid->RowIndex ?>_MRP" value="<?= HtmlEncode($Grid->MRP->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_MRP" class="form-group">
<input type="<?= $Grid->MRP->getInputTextType() ?>" data-table="view_store_grn" data-field="x_MRP" name="x<?= $Grid->RowIndex ?>_MRP" id="x<?= $Grid->RowIndex ?>_MRP" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->MRP->getPlaceHolder()) ?>" value="<?= $Grid->MRP->EditValue ?>"<?= $Grid->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MRP->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_MRP">
<span<?= $Grid->MRP->viewAttributes() ?>>
<?= $Grid->MRP->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_MRP" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_MRP" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_MRP" value="<?= HtmlEncode($Grid->MRP->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_MRP" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_MRP" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_MRP" value="<?= HtmlEncode($Grid->MRP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue" <?= $Grid->PurValue->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PurValue" class="form-group">
<input type="<?= $Grid->PurValue->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PurValue" name="x<?= $Grid->RowIndex ?>_PurValue" id="x<?= $Grid->RowIndex ?>_PurValue" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->PurValue->getPlaceHolder()) ?>" value="<?= $Grid->PurValue->EditValue ?>"<?= $Grid->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PurValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PurValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PurValue" id="o<?= $Grid->RowIndex ?>_PurValue" value="<?= HtmlEncode($Grid->PurValue->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PurValue" class="form-group">
<input type="<?= $Grid->PurValue->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PurValue" name="x<?= $Grid->RowIndex ?>_PurValue" id="x<?= $Grid->RowIndex ?>_PurValue" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->PurValue->getPlaceHolder()) ?>" value="<?= $Grid->PurValue->EditValue ?>"<?= $Grid->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PurValue->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PurValue">
<span<?= $Grid->PurValue->viewAttributes() ?>>
<?= $Grid->PurValue->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PurValue" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_PurValue" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_PurValue" value="<?= HtmlEncode($Grid->PurValue->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PurValue" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_PurValue" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_PurValue" value="<?= HtmlEncode($Grid->PurValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Disc->Visible) { // Disc ?>
        <td data-name="Disc" <?= $Grid->Disc->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_Disc" class="form-group">
<input type="<?= $Grid->Disc->getInputTextType() ?>" data-table="view_store_grn" data-field="x_Disc" name="x<?= $Grid->RowIndex ?>_Disc" id="x<?= $Grid->RowIndex ?>_Disc" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->Disc->getPlaceHolder()) ?>" value="<?= $Grid->Disc->EditValue ?>"<?= $Grid->Disc->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Disc->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_Disc" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Disc" id="o<?= $Grid->RowIndex ?>_Disc" value="<?= HtmlEncode($Grid->Disc->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_Disc" class="form-group">
<input type="<?= $Grid->Disc->getInputTextType() ?>" data-table="view_store_grn" data-field="x_Disc" name="x<?= $Grid->RowIndex ?>_Disc" id="x<?= $Grid->RowIndex ?>_Disc" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->Disc->getPlaceHolder()) ?>" value="<?= $Grid->Disc->EditValue ?>"<?= $Grid->Disc->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Disc->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_Disc">
<span<?= $Grid->Disc->viewAttributes() ?>>
<?= $Grid->Disc->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_Disc" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_Disc" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_Disc" value="<?= HtmlEncode($Grid->Disc->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_Disc" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_Disc" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_Disc" value="<?= HtmlEncode($Grid->Disc->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST" <?= $Grid->PSGST->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PSGST" class="form-group">
<input type="<?= $Grid->PSGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PSGST" name="x<?= $Grid->RowIndex ?>_PSGST" id="x<?= $Grid->RowIndex ?>_PSGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->PSGST->getPlaceHolder()) ?>" value="<?= $Grid->PSGST->EditValue ?>"<?= $Grid->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PSGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PSGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PSGST" id="o<?= $Grid->RowIndex ?>_PSGST" value="<?= HtmlEncode($Grid->PSGST->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PSGST" class="form-group">
<input type="<?= $Grid->PSGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PSGST" name="x<?= $Grid->RowIndex ?>_PSGST" id="x<?= $Grid->RowIndex ?>_PSGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->PSGST->getPlaceHolder()) ?>" value="<?= $Grid->PSGST->EditValue ?>"<?= $Grid->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PSGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PSGST">
<span<?= $Grid->PSGST->viewAttributes() ?>>
<?= $Grid->PSGST->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PSGST" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_PSGST" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_PSGST" value="<?= HtmlEncode($Grid->PSGST->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PSGST" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_PSGST" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_PSGST" value="<?= HtmlEncode($Grid->PSGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST" <?= $Grid->PCGST->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PCGST" class="form-group">
<input type="<?= $Grid->PCGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PCGST" name="x<?= $Grid->RowIndex ?>_PCGST" id="x<?= $Grid->RowIndex ?>_PCGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->PCGST->getPlaceHolder()) ?>" value="<?= $Grid->PCGST->EditValue ?>"<?= $Grid->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PCGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PCGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PCGST" id="o<?= $Grid->RowIndex ?>_PCGST" value="<?= HtmlEncode($Grid->PCGST->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PCGST" class="form-group">
<input type="<?= $Grid->PCGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PCGST" name="x<?= $Grid->RowIndex ?>_PCGST" id="x<?= $Grid->RowIndex ?>_PCGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->PCGST->getPlaceHolder()) ?>" value="<?= $Grid->PCGST->EditValue ?>"<?= $Grid->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PCGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PCGST">
<span<?= $Grid->PCGST->viewAttributes() ?>>
<?= $Grid->PCGST->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PCGST" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_PCGST" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_PCGST" value="<?= HtmlEncode($Grid->PCGST->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PCGST" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_PCGST" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_PCGST" value="<?= HtmlEncode($Grid->PCGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PTax->Visible) { // PTax ?>
        <td data-name="PTax" <?= $Grid->PTax->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PTax" class="form-group">
<input type="<?= $Grid->PTax->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PTax" name="x<?= $Grid->RowIndex ?>_PTax" id="x<?= $Grid->RowIndex ?>_PTax" size="6" maxlength="10" placeholder="<?= HtmlEncode($Grid->PTax->getPlaceHolder()) ?>" value="<?= $Grid->PTax->EditValue ?>"<?= $Grid->PTax->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PTax->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PTax" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PTax" id="o<?= $Grid->RowIndex ?>_PTax" value="<?= HtmlEncode($Grid->PTax->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PTax" class="form-group">
<input type="<?= $Grid->PTax->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PTax" name="x<?= $Grid->RowIndex ?>_PTax" id="x<?= $Grid->RowIndex ?>_PTax" size="6" maxlength="10" placeholder="<?= HtmlEncode($Grid->PTax->getPlaceHolder()) ?>" value="<?= $Grid->PTax->EditValue ?>"<?= $Grid->PTax->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PTax->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_PTax">
<span<?= $Grid->PTax->viewAttributes() ?>>
<?= $Grid->PTax->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PTax" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_PTax" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_PTax" value="<?= HtmlEncode($Grid->PTax->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PTax" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_PTax" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_PTax" value="<?= HtmlEncode($Grid->PTax->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ItemValue->Visible) { // ItemValue ?>
        <td data-name="ItemValue" <?= $Grid->ItemValue->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_ItemValue" class="form-group">
<input type="<?= $Grid->ItemValue->getInputTextType() ?>" data-table="view_store_grn" data-field="x_ItemValue" name="x<?= $Grid->RowIndex ?>_ItemValue" id="x<?= $Grid->RowIndex ?>_ItemValue" size="8" maxlength="12" placeholder="<?= HtmlEncode($Grid->ItemValue->getPlaceHolder()) ?>" value="<?= $Grid->ItemValue->EditValue ?>"<?= $Grid->ItemValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_ItemValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ItemValue" id="o<?= $Grid->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Grid->ItemValue->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_ItemValue" class="form-group">
<input type="<?= $Grid->ItemValue->getInputTextType() ?>" data-table="view_store_grn" data-field="x_ItemValue" name="x<?= $Grid->RowIndex ?>_ItemValue" id="x<?= $Grid->RowIndex ?>_ItemValue" size="8" maxlength="12" placeholder="<?= HtmlEncode($Grid->ItemValue->getPlaceHolder()) ?>" value="<?= $Grid->ItemValue->EditValue ?>"<?= $Grid->ItemValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemValue->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_ItemValue">
<span<?= $Grid->ItemValue->viewAttributes() ?>>
<?= $Grid->ItemValue->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_ItemValue" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_ItemValue" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Grid->ItemValue->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_ItemValue" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_ItemValue" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Grid->ItemValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SalTax->Visible) { // SalTax ?>
        <td data-name="SalTax" <?= $Grid->SalTax->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SalTax" class="form-group">
<input type="<?= $Grid->SalTax->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SalTax" name="x<?= $Grid->RowIndex ?>_SalTax" id="x<?= $Grid->RowIndex ?>_SalTax" size="8" maxlength="12" placeholder="<?= HtmlEncode($Grid->SalTax->getPlaceHolder()) ?>" value="<?= $Grid->SalTax->EditValue ?>"<?= $Grid->SalTax->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SalTax->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SalTax" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SalTax" id="o<?= $Grid->RowIndex ?>_SalTax" value="<?= HtmlEncode($Grid->SalTax->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SalTax" class="form-group">
<input type="<?= $Grid->SalTax->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SalTax" name="x<?= $Grid->RowIndex ?>_SalTax" id="x<?= $Grid->RowIndex ?>_SalTax" size="8" maxlength="12" placeholder="<?= HtmlEncode($Grid->SalTax->getPlaceHolder()) ?>" value="<?= $Grid->SalTax->EditValue ?>"<?= $Grid->SalTax->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SalTax->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SalTax">
<span<?= $Grid->SalTax->viewAttributes() ?>>
<?= $Grid->SalTax->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SalTax" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_SalTax" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_SalTax" value="<?= HtmlEncode($Grid->SalTax->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SalTax" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_SalTax" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_SalTax" value="<?= HtmlEncode($Grid->SalTax->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" <?= $Grid->BatchNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_BatchNo" class="form-group">
<input type="<?= $Grid->BatchNo->getInputTextType() ?>" data-table="view_store_grn" data-field="x_BatchNo" name="x<?= $Grid->RowIndex ?>_BatchNo" id="x<?= $Grid->RowIndex ?>_BatchNo" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->BatchNo->getPlaceHolder()) ?>" value="<?= $Grid->BatchNo->EditValue ?>"<?= $Grid->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BatchNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_BatchNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BatchNo" id="o<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_BatchNo" class="form-group">
<input type="<?= $Grid->BatchNo->getInputTextType() ?>" data-table="view_store_grn" data-field="x_BatchNo" name="x<?= $Grid->RowIndex ?>_BatchNo" id="x<?= $Grid->RowIndex ?>_BatchNo" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->BatchNo->getPlaceHolder()) ?>" value="<?= $Grid->BatchNo->EditValue ?>"<?= $Grid->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BatchNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_BatchNo">
<span<?= $Grid->BatchNo->viewAttributes() ?>>
<?= $Grid->BatchNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BatchNo" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_BatchNo" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_BatchNo" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_BatchNo" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate" <?= $Grid->ExpDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_ExpDate" class="form-group">
<input type="<?= $Grid->ExpDate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_ExpDate" data-format="7" name="x<?= $Grid->RowIndex ?>_ExpDate" id="x<?= $Grid->RowIndex ?>_ExpDate" size="8" maxlength="10" placeholder="<?= HtmlEncode($Grid->ExpDate->getPlaceHolder()) ?>" value="<?= $Grid->ExpDate->EditValue ?>"<?= $Grid->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExpDate->getErrorMessage() ?></div>
<?php if (!$Grid->ExpDate->ReadOnly && !$Grid->ExpDate->Disabled && !isset($Grid->ExpDate->EditAttrs["readonly"]) && !isset($Grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grngrid", "x<?= $Grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_ExpDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ExpDate" id="o<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_ExpDate" class="form-group">
<input type="<?= $Grid->ExpDate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_ExpDate" data-format="7" name="x<?= $Grid->RowIndex ?>_ExpDate" id="x<?= $Grid->RowIndex ?>_ExpDate" size="8" maxlength="10" placeholder="<?= HtmlEncode($Grid->ExpDate->getPlaceHolder()) ?>" value="<?= $Grid->ExpDate->EditValue ?>"<?= $Grid->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExpDate->getErrorMessage() ?></div>
<?php if (!$Grid->ExpDate->ReadOnly && !$Grid->ExpDate->Disabled && !isset($Grid->ExpDate->EditAttrs["readonly"]) && !isset($Grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grngrid", "x<?= $Grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_ExpDate">
<span<?= $Grid->ExpDate->viewAttributes() ?>>
<?= $Grid->ExpDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_ExpDate" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_ExpDate" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_ExpDate" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_ExpDate" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Grid->Quantity->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_Quantity" class="form-group">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="view_store_grn" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_Quantity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Quantity" id="o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_Quantity" class="form-group">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="view_store_grn" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_Quantity">
<span<?= $Grid->Quantity->viewAttributes() ?>>
<?= $Grid->Quantity->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_Quantity" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_Quantity" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_Quantity" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_Quantity" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SalRate->Visible) { // SalRate ?>
        <td data-name="SalRate" <?= $Grid->SalRate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SalRate" class="form-group">
<input type="<?= $Grid->SalRate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SalRate" name="x<?= $Grid->RowIndex ?>_SalRate" id="x<?= $Grid->RowIndex ?>_SalRate" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->SalRate->getPlaceHolder()) ?>" value="<?= $Grid->SalRate->EditValue ?>"<?= $Grid->SalRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SalRate->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SalRate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SalRate" id="o<?= $Grid->RowIndex ?>_SalRate" value="<?= HtmlEncode($Grid->SalRate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SalRate" class="form-group">
<input type="<?= $Grid->SalRate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SalRate" name="x<?= $Grid->RowIndex ?>_SalRate" id="x<?= $Grid->RowIndex ?>_SalRate" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->SalRate->getPlaceHolder()) ?>" value="<?= $Grid->SalRate->EditValue ?>"<?= $Grid->SalRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SalRate->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SalRate">
<span<?= $Grid->SalRate->viewAttributes() ?>>
<?= $Grid->SalRate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SalRate" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_SalRate" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_SalRate" value="<?= HtmlEncode($Grid->SalRate->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SalRate" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_SalRate" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_SalRate" value="<?= HtmlEncode($Grid->SalRate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" <?= $Grid->SSGST->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SSGST" class="form-group">
<input type="<?= $Grid->SSGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SSGST" name="x<?= $Grid->RowIndex ?>_SSGST" id="x<?= $Grid->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->SSGST->getPlaceHolder()) ?>" value="<?= $Grid->SSGST->EditValue ?>"<?= $Grid->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SSGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SSGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SSGST" id="o<?= $Grid->RowIndex ?>_SSGST" value="<?= HtmlEncode($Grid->SSGST->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SSGST" class="form-group">
<input type="<?= $Grid->SSGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SSGST" name="x<?= $Grid->RowIndex ?>_SSGST" id="x<?= $Grid->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->SSGST->getPlaceHolder()) ?>" value="<?= $Grid->SSGST->EditValue ?>"<?= $Grid->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SSGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SSGST">
<span<?= $Grid->SSGST->viewAttributes() ?>>
<?= $Grid->SSGST->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SSGST" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_SSGST" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_SSGST" value="<?= HtmlEncode($Grid->SSGST->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SSGST" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_SSGST" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_SSGST" value="<?= HtmlEncode($Grid->SSGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" <?= $Grid->SCGST->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SCGST" class="form-group">
<input type="<?= $Grid->SCGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SCGST" name="x<?= $Grid->RowIndex ?>_SCGST" id="x<?= $Grid->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->SCGST->getPlaceHolder()) ?>" value="<?= $Grid->SCGST->EditValue ?>"<?= $Grid->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SCGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SCGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SCGST" id="o<?= $Grid->RowIndex ?>_SCGST" value="<?= HtmlEncode($Grid->SCGST->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SCGST" class="form-group">
<input type="<?= $Grid->SCGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SCGST" name="x<?= $Grid->RowIndex ?>_SCGST" id="x<?= $Grid->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->SCGST->getPlaceHolder()) ?>" value="<?= $Grid->SCGST->EditValue ?>"<?= $Grid->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SCGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_SCGST">
<span<?= $Grid->SCGST->viewAttributes() ?>>
<?= $Grid->SCGST->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SCGST" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_SCGST" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_SCGST" value="<?= HtmlEncode($Grid->SCGST->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SCGST" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_SCGST" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_SCGST" value="<?= HtmlEncode($Grid->SCGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Grid->BRCODE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRCODE" id="o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_BRCODE">
<span<?= $Grid->BRCODE->viewAttributes() ?>>
<?= $Grid->BRCODE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BRCODE" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_BRCODE" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_BRCODE" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_BRCODE" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HSN->Visible) { // HSN ?>
        <td data-name="HSN" <?= $Grid->HSN->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_HSN" class="form-group">
<input type="<?= $Grid->HSN->getInputTextType() ?>" data-table="view_store_grn" data-field="x_HSN" name="x<?= $Grid->RowIndex ?>_HSN" id="x<?= $Grid->RowIndex ?>_HSN" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->HSN->getPlaceHolder()) ?>" value="<?= $Grid->HSN->EditValue ?>"<?= $Grid->HSN->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HSN->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_HSN" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HSN" id="o<?= $Grid->RowIndex ?>_HSN" value="<?= HtmlEncode($Grid->HSN->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_HSN" class="form-group">
<input type="<?= $Grid->HSN->getInputTextType() ?>" data-table="view_store_grn" data-field="x_HSN" name="x<?= $Grid->RowIndex ?>_HSN" id="x<?= $Grid->RowIndex ?>_HSN" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->HSN->getPlaceHolder()) ?>" value="<?= $Grid->HSN->EditValue ?>"<?= $Grid->HSN->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HSN->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_HSN">
<span<?= $Grid->HSN->viewAttributes() ?>>
<?= $Grid->HSN->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_HSN" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_HSN" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_HSN" value="<?= HtmlEncode($Grid->HSN->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_HSN" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_HSN" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_HSN" value="<?= HtmlEncode($Grid->HSN->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_grn" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_HospID" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_HospID" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_HospID" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_HospID" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->grncreatedby->Visible) { // grncreatedby ?>
        <td data-name="grncreatedby" <?= $Grid->grncreatedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grncreatedby" id="o<?= $Grid->RowIndex ?>_grncreatedby" value="<?= HtmlEncode($Grid->grncreatedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_grncreatedby">
<span<?= $Grid->grncreatedby->viewAttributes() ?>>
<?= $Grid->grncreatedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedby" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_grncreatedby" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_grncreatedby" value="<?= HtmlEncode($Grid->grncreatedby->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedby" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_grncreatedby" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_grncreatedby" value="<?= HtmlEncode($Grid->grncreatedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <td data-name="grncreatedDateTime" <?= $Grid->grncreatedDateTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grncreatedDateTime" id="o<?= $Grid->RowIndex ?>_grncreatedDateTime" value="<?= HtmlEncode($Grid->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_grncreatedDateTime">
<span<?= $Grid->grncreatedDateTime->viewAttributes() ?>>
<?= $Grid->grncreatedDateTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedDateTime" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_grncreatedDateTime" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_grncreatedDateTime" value="<?= HtmlEncode($Grid->grncreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedDateTime" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_grncreatedDateTime" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_grncreatedDateTime" value="<?= HtmlEncode($Grid->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->grnModifiedby->Visible) { // grnModifiedby ?>
        <td data-name="grnModifiedby" <?= $Grid->grnModifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grnModifiedby" id="o<?= $Grid->RowIndex ?>_grnModifiedby" value="<?= HtmlEncode($Grid->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_grnModifiedby">
<span<?= $Grid->grnModifiedby->viewAttributes() ?>>
<?= $Grid->grnModifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedby" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_grnModifiedby" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_grnModifiedby" value="<?= HtmlEncode($Grid->grnModifiedby->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedby" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_grnModifiedby" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_grnModifiedby" value="<?= HtmlEncode($Grid->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <td data-name="grnModifiedDateTime" <?= $Grid->grnModifiedDateTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grnModifiedDateTime" id="o<?= $Grid->RowIndex ?>_grnModifiedDateTime" value="<?= HtmlEncode($Grid->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_grnModifiedDateTime">
<span<?= $Grid->grnModifiedDateTime->viewAttributes() ?>>
<?= $Grid->grnModifiedDateTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedDateTime" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_grnModifiedDateTime" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_grnModifiedDateTime" value="<?= HtmlEncode($Grid->grnModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedDateTime" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_grnModifiedDateTime" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_grnModifiedDateTime" value="<?= HtmlEncode($Grid->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" <?= $Grid->BillDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_BillDate" class="form-group">
<input type="<?= $Grid->BillDate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_BillDate" name="x<?= $Grid->RowIndex ?>_BillDate" id="x<?= $Grid->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Grid->BillDate->getPlaceHolder()) ?>" value="<?= $Grid->BillDate->EditValue ?>"<?= $Grid->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillDate->getErrorMessage() ?></div>
<?php if (!$Grid->BillDate->ReadOnly && !$Grid->BillDate->Disabled && !isset($Grid->BillDate->EditAttrs["readonly"]) && !isset($Grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grngrid", "x<?= $Grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_BillDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillDate" id="o<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_BillDate" class="form-group">
<input type="<?= $Grid->BillDate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_BillDate" name="x<?= $Grid->RowIndex ?>_BillDate" id="x<?= $Grid->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Grid->BillDate->getPlaceHolder()) ?>" value="<?= $Grid->BillDate->EditValue ?>"<?= $Grid->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillDate->getErrorMessage() ?></div>
<?php if (!$Grid->BillDate->ReadOnly && !$Grid->BillDate->Disabled && !isset($Grid->BillDate->EditAttrs["readonly"]) && !isset($Grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grngrid", "x<?= $Grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_BillDate">
<span<?= $Grid->BillDate->viewAttributes() ?>>
<?= $Grid->BillDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BillDate" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_BillDate" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_BillDate" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_BillDate" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CurStock->Visible) { // CurStock ?>
        <td data-name="CurStock" <?= $Grid->CurStock->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_CurStock" class="form-group">
<input type="<?= $Grid->CurStock->getInputTextType() ?>" data-table="view_store_grn" data-field="x_CurStock" name="x<?= $Grid->RowIndex ?>_CurStock" id="x<?= $Grid->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Grid->CurStock->getPlaceHolder()) ?>" value="<?= $Grid->CurStock->EditValue ?>"<?= $Grid->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CurStock->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_CurStock" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CurStock" id="o<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_CurStock" class="form-group">
<input type="<?= $Grid->CurStock->getInputTextType() ?>" data-table="view_store_grn" data-field="x_CurStock" name="x<?= $Grid->RowIndex ?>_CurStock" id="x<?= $Grid->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Grid->CurStock->getPlaceHolder()) ?>" value="<?= $Grid->CurStock->EditValue ?>"<?= $Grid->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CurStock->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_CurStock">
<span<?= $Grid->CurStock->viewAttributes() ?>>
<?= $Grid->CurStock->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_CurStock" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_CurStock" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_CurStock" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_CurStock" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <td data-name="FreeQtyyy" <?= $Grid->FreeQtyyy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_FreeQtyyy" class="form-group">
<input type="<?= $Grid->FreeQtyyy->getInputTextType() ?>" data-table="view_store_grn" data-field="x_FreeQtyyy" name="x<?= $Grid->RowIndex ?>_FreeQtyyy" id="x<?= $Grid->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?= HtmlEncode($Grid->FreeQtyyy->getPlaceHolder()) ?>" value="<?= $Grid->FreeQtyyy->EditValue ?>"<?= $Grid->FreeQtyyy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FreeQtyyy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQtyyy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FreeQtyyy" id="o<?= $Grid->RowIndex ?>_FreeQtyyy" value="<?= HtmlEncode($Grid->FreeQtyyy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_FreeQtyyy" class="form-group">
<input type="<?= $Grid->FreeQtyyy->getInputTextType() ?>" data-table="view_store_grn" data-field="x_FreeQtyyy" name="x<?= $Grid->RowIndex ?>_FreeQtyyy" id="x<?= $Grid->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?= HtmlEncode($Grid->FreeQtyyy->getPlaceHolder()) ?>" value="<?= $Grid->FreeQtyyy->EditValue ?>"<?= $Grid->FreeQtyyy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FreeQtyyy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_FreeQtyyy">
<span<?= $Grid->FreeQtyyy->viewAttributes() ?>>
<?= $Grid->FreeQtyyy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQtyyy" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_FreeQtyyy" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_FreeQtyyy" value="<?= HtmlEncode($Grid->FreeQtyyy->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQtyyy" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_FreeQtyyy" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_FreeQtyyy" value="<?= HtmlEncode($Grid->FreeQtyyy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->grndate->Visible) { // grndate ?>
        <td data-name="grndate" <?= $Grid->grndate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_grndate" class="form-group">
<input type="<?= $Grid->grndate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_grndate" name="x<?= $Grid->RowIndex ?>_grndate" id="x<?= $Grid->RowIndex ?>_grndate" placeholder="<?= HtmlEncode($Grid->grndate->getPlaceHolder()) ?>" value="<?= $Grid->grndate->EditValue ?>"<?= $Grid->grndate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->grndate->getErrorMessage() ?></div>
<?php if (!$Grid->grndate->ReadOnly && !$Grid->grndate->Disabled && !isset($Grid->grndate->EditAttrs["readonly"]) && !isset($Grid->grndate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grngrid", "x<?= $Grid->RowIndex ?>_grndate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grndate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grndate" id="o<?= $Grid->RowIndex ?>_grndate" value="<?= HtmlEncode($Grid->grndate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_grndate" class="form-group">
<input type="<?= $Grid->grndate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_grndate" name="x<?= $Grid->RowIndex ?>_grndate" id="x<?= $Grid->RowIndex ?>_grndate" placeholder="<?= HtmlEncode($Grid->grndate->getPlaceHolder()) ?>" value="<?= $Grid->grndate->EditValue ?>"<?= $Grid->grndate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->grndate->getErrorMessage() ?></div>
<?php if (!$Grid->grndate->ReadOnly && !$Grid->grndate->Disabled && !isset($Grid->grndate->EditAttrs["readonly"]) && !isset($Grid->grndate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grngrid", "x<?= $Grid->RowIndex ?>_grndate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_grndate">
<span<?= $Grid->grndate->viewAttributes() ?>>
<?= $Grid->grndate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grndate" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_grndate" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_grndate" value="<?= HtmlEncode($Grid->grndate->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grndate" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_grndate" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_grndate" value="<?= HtmlEncode($Grid->grndate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->grndatetime->Visible) { // grndatetime ?>
        <td data-name="grndatetime" <?= $Grid->grndatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_grndatetime" class="form-group">
<input type="<?= $Grid->grndatetime->getInputTextType() ?>" data-table="view_store_grn" data-field="x_grndatetime" name="x<?= $Grid->RowIndex ?>_grndatetime" id="x<?= $Grid->RowIndex ?>_grndatetime" placeholder="<?= HtmlEncode($Grid->grndatetime->getPlaceHolder()) ?>" value="<?= $Grid->grndatetime->EditValue ?>"<?= $Grid->grndatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->grndatetime->getErrorMessage() ?></div>
<?php if (!$Grid->grndatetime->ReadOnly && !$Grid->grndatetime->Disabled && !isset($Grid->grndatetime->EditAttrs["readonly"]) && !isset($Grid->grndatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grngrid", "x<?= $Grid->RowIndex ?>_grndatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grndatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grndatetime" id="o<?= $Grid->RowIndex ?>_grndatetime" value="<?= HtmlEncode($Grid->grndatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_grndatetime" class="form-group">
<input type="<?= $Grid->grndatetime->getInputTextType() ?>" data-table="view_store_grn" data-field="x_grndatetime" name="x<?= $Grid->RowIndex ?>_grndatetime" id="x<?= $Grid->RowIndex ?>_grndatetime" placeholder="<?= HtmlEncode($Grid->grndatetime->getPlaceHolder()) ?>" value="<?= $Grid->grndatetime->EditValue ?>"<?= $Grid->grndatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->grndatetime->getErrorMessage() ?></div>
<?php if (!$Grid->grndatetime->ReadOnly && !$Grid->grndatetime->Disabled && !isset($Grid->grndatetime->EditAttrs["readonly"]) && !isset($Grid->grndatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grngrid", "x<?= $Grid->RowIndex ?>_grndatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_grndatetime">
<span<?= $Grid->grndatetime->viewAttributes() ?>>
<?= $Grid->grndatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grndatetime" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_grndatetime" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_grndatetime" value="<?= HtmlEncode($Grid->grndatetime->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grndatetime" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_grndatetime" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_grndatetime" value="<?= HtmlEncode($Grid->grndatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->strid->Visible) { // strid ?>
        <td data-name="strid" <?= $Grid->strid->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_strid" class="form-group">
<input type="<?= $Grid->strid->getInputTextType() ?>" data-table="view_store_grn" data-field="x_strid" name="x<?= $Grid->RowIndex ?>_strid" id="x<?= $Grid->RowIndex ?>_strid" size="30" placeholder="<?= HtmlEncode($Grid->strid->getPlaceHolder()) ?>" value="<?= $Grid->strid->EditValue ?>"<?= $Grid->strid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->strid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_strid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_strid" id="o<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_strid" class="form-group">
<input type="<?= $Grid->strid->getInputTextType() ?>" data-table="view_store_grn" data-field="x_strid" name="x<?= $Grid->RowIndex ?>_strid" id="x<?= $Grid->RowIndex ?>_strid" size="30" placeholder="<?= HtmlEncode($Grid->strid->getPlaceHolder()) ?>" value="<?= $Grid->strid->EditValue ?>"<?= $Grid->strid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->strid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_strid">
<span<?= $Grid->strid->viewAttributes() ?>>
<?= $Grid->strid->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_strid" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_strid" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_strid" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_strid" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->GRNPer->Visible) { // GRNPer ?>
        <td data-name="GRNPer" <?= $Grid->GRNPer->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_GRNPer" class="form-group">
<input type="<?= $Grid->GRNPer->getInputTextType() ?>" data-table="view_store_grn" data-field="x_GRNPer" name="x<?= $Grid->RowIndex ?>_GRNPer" id="x<?= $Grid->RowIndex ?>_GRNPer" size="30" placeholder="<?= HtmlEncode($Grid->GRNPer->getPlaceHolder()) ?>" value="<?= $Grid->GRNPer->EditValue ?>"<?= $Grid->GRNPer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNPer->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_GRNPer" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GRNPer" id="o<?= $Grid->RowIndex ?>_GRNPer" value="<?= HtmlEncode($Grid->GRNPer->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_GRNPer" class="form-group">
<input type="<?= $Grid->GRNPer->getInputTextType() ?>" data-table="view_store_grn" data-field="x_GRNPer" name="x<?= $Grid->RowIndex ?>_GRNPer" id="x<?= $Grid->RowIndex ?>_GRNPer" size="30" placeholder="<?= HtmlEncode($Grid->GRNPer->getPlaceHolder()) ?>" value="<?= $Grid->GRNPer->EditValue ?>"<?= $Grid->GRNPer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNPer->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_GRNPer">
<span<?= $Grid->GRNPer->viewAttributes() ?>>
<?= $Grid->GRNPer->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_GRNPer" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_GRNPer" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_GRNPer" value="<?= HtmlEncode($Grid->GRNPer->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_GRNPer" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_GRNPer" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_GRNPer" value="<?= HtmlEncode($Grid->GRNPer->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->StoreID->Visible) { // StoreID ?>
        <td data-name="StoreID" <?= $Grid->StoreID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_StoreID" class="form-group">
<input type="<?= $Grid->StoreID->getInputTextType() ?>" data-table="view_store_grn" data-field="x_StoreID" name="x<?= $Grid->RowIndex ?>_StoreID" id="x<?= $Grid->RowIndex ?>_StoreID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->StoreID->getPlaceHolder()) ?>" value="<?= $Grid->StoreID->EditValue ?>"<?= $Grid->StoreID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->StoreID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_StoreID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_StoreID" id="o<?= $Grid->RowIndex ?>_StoreID" value="<?= HtmlEncode($Grid->StoreID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_StoreID" class="form-group">
<input type="<?= $Grid->StoreID->getInputTextType() ?>" data-table="view_store_grn" data-field="x_StoreID" name="x<?= $Grid->RowIndex ?>_StoreID" id="x<?= $Grid->RowIndex ?>_StoreID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->StoreID->getPlaceHolder()) ?>" value="<?= $Grid->StoreID->EditValue ?>"<?= $Grid->StoreID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->StoreID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_grn_StoreID">
<span<?= $Grid->StoreID->viewAttributes() ?>>
<?= $Grid->StoreID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_StoreID" data-hidden="1" name="fview_store_grngrid$x<?= $Grid->RowIndex ?>_StoreID" id="fview_store_grngrid$x<?= $Grid->RowIndex ?>_StoreID" value="<?= HtmlEncode($Grid->StoreID->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_StoreID" data-hidden="1" name="fview_store_grngrid$o<?= $Grid->RowIndex ?>_StoreID" id="fview_store_grngrid$o<?= $Grid->RowIndex ?>_StoreID" value="<?= HtmlEncode($Grid->StoreID->OldValue) ?>">
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
loadjs.ready(["fview_store_grngrid","load"], function () {
    fview_store_grngrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_view_store_grn", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_PRC" class="form-group view_store_grn_PRC">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="4" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_PRC" class="form-group view_store_grn_PRC">
<span<?= $Grid->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PRC->getDisplayValue($Grid->PRC->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PRC" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PRC" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PRC" id="o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PrName->Visible) { // PrName ?>
        <td data-name="PrName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_PrName" class="form-group view_store_grn_PrName">
<?php
$onchange = $Grid->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_PrName" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Grid->PrName->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_PrName" id="sv_x<?= $Grid->RowIndex ?>_PrName" value="<?= RemoveHtml($Grid->PrName->EditValue) ?>" size="20" maxlength="45" placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>"<?= $Grid->PrName->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "store_storemast") && !$Grid->PrName->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_PrName" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->PrName->caption() ?>" data-title="<?= $Grid->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_PrName',url:'<?= GetUrl("StoreStoremastAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_store_grn" data-field="x_PrName" data-input="sv_x<?= $Grid->RowIndex ?>_PrName" data-value-separator="<?= $Grid->PrName->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->PrName->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_store_grngrid"], function() {
    fview_store_grngrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_PrName","forceSelect":true}, ew.vars.tables.view_store_grn.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Grid->PrName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PrName") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_PrName" class="form-group view_store_grn_PrName">
<span<?= $Grid->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PrName->getDisplayValue($Grid->PrName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrName" id="o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GrnQuantity->Visible) { // GrnQuantity ?>
        <td data-name="GrnQuantity">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_GrnQuantity" class="form-group view_store_grn_GrnQuantity">
<input type="<?= $Grid->GrnQuantity->getInputTextType() ?>" data-table="view_store_grn" data-field="x_GrnQuantity" name="x<?= $Grid->RowIndex ?>_GrnQuantity" id="x<?= $Grid->RowIndex ?>_GrnQuantity" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->GrnQuantity->getPlaceHolder()) ?>" value="<?= $Grid->GrnQuantity->EditValue ?>"<?= $Grid->GrnQuantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GrnQuantity->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_GrnQuantity" class="form-group view_store_grn_GrnQuantity">
<span<?= $Grid->GrnQuantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GrnQuantity->getDisplayValue($Grid->GrnQuantity->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_GrnQuantity" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GrnQuantity" id="x<?= $Grid->RowIndex ?>_GrnQuantity" value="<?= HtmlEncode($Grid->GrnQuantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_GrnQuantity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GrnQuantity" id="o<?= $Grid->RowIndex ?>_GrnQuantity" value="<?= HtmlEncode($Grid->GrnQuantity->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->FreeQty->Visible) { // FreeQty ?>
        <td data-name="FreeQty">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_FreeQty" class="form-group view_store_grn_FreeQty">
<input type="<?= $Grid->FreeQty->getInputTextType() ?>" data-table="view_store_grn" data-field="x_FreeQty" name="x<?= $Grid->RowIndex ?>_FreeQty" id="x<?= $Grid->RowIndex ?>_FreeQty" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->FreeQty->getPlaceHolder()) ?>" value="<?= $Grid->FreeQty->EditValue ?>"<?= $Grid->FreeQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FreeQty->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_FreeQty" class="form-group view_store_grn_FreeQty">
<span<?= $Grid->FreeQty->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->FreeQty->getDisplayValue($Grid->FreeQty->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQty" data-hidden="1" name="x<?= $Grid->RowIndex ?>_FreeQty" id="x<?= $Grid->RowIndex ?>_FreeQty" value="<?= HtmlEncode($Grid->FreeQty->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQty" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FreeQty" id="o<?= $Grid->RowIndex ?>_FreeQty" value="<?= HtmlEncode($Grid->FreeQty->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_MFRCODE" class="form-group view_store_grn_MFRCODE">
<input type="<?= $Grid->MFRCODE->getInputTextType() ?>" data-table="view_store_grn" data-field="x_MFRCODE" name="x<?= $Grid->RowIndex ?>_MFRCODE" id="x<?= $Grid->RowIndex ?>_MFRCODE" size="6" maxlength="6" placeholder="<?= HtmlEncode($Grid->MFRCODE->getPlaceHolder()) ?>" value="<?= $Grid->MFRCODE->EditValue ?>"<?= $Grid->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MFRCODE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_MFRCODE" class="form-group view_store_grn_MFRCODE">
<span<?= $Grid->MFRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MFRCODE->getDisplayValue($Grid->MFRCODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_MFRCODE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MFRCODE" id="x<?= $Grid->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Grid->MFRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_MFRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MFRCODE" id="o<?= $Grid->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Grid->MFRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_PUnit" class="form-group view_store_grn_PUnit">
<input type="<?= $Grid->PUnit->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PUnit" name="x<?= $Grid->RowIndex ?>_PUnit" id="x<?= $Grid->RowIndex ?>_PUnit" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->PUnit->getPlaceHolder()) ?>" value="<?= $Grid->PUnit->EditValue ?>"<?= $Grid->PUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PUnit->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_PUnit" class="form-group view_store_grn_PUnit">
<span<?= $Grid->PUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PUnit->getDisplayValue($Grid->PUnit->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PUnit" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PUnit" id="x<?= $Grid->RowIndex ?>_PUnit" value="<?= HtmlEncode($Grid->PUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PUnit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PUnit" id="o<?= $Grid->RowIndex ?>_PUnit" value="<?= HtmlEncode($Grid->PUnit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SUnit->Visible) { // SUnit ?>
        <td data-name="SUnit">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_SUnit" class="form-group view_store_grn_SUnit">
<input type="<?= $Grid->SUnit->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SUnit" name="x<?= $Grid->RowIndex ?>_SUnit" id="x<?= $Grid->RowIndex ?>_SUnit" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->SUnit->getPlaceHolder()) ?>" value="<?= $Grid->SUnit->EditValue ?>"<?= $Grid->SUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SUnit->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_SUnit" class="form-group view_store_grn_SUnit">
<span<?= $Grid->SUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SUnit->getDisplayValue($Grid->SUnit->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SUnit" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SUnit" id="x<?= $Grid->RowIndex ?>_SUnit" value="<?= HtmlEncode($Grid->SUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SUnit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SUnit" id="o<?= $Grid->RowIndex ?>_SUnit" value="<?= HtmlEncode($Grid->SUnit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MRP->Visible) { // MRP ?>
        <td data-name="MRP">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_MRP" class="form-group view_store_grn_MRP">
<input type="<?= $Grid->MRP->getInputTextType() ?>" data-table="view_store_grn" data-field="x_MRP" name="x<?= $Grid->RowIndex ?>_MRP" id="x<?= $Grid->RowIndex ?>_MRP" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->MRP->getPlaceHolder()) ?>" value="<?= $Grid->MRP->EditValue ?>"<?= $Grid->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MRP->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_MRP" class="form-group view_store_grn_MRP">
<span<?= $Grid->MRP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MRP->getDisplayValue($Grid->MRP->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_MRP" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MRP" id="x<?= $Grid->RowIndex ?>_MRP" value="<?= HtmlEncode($Grid->MRP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_MRP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MRP" id="o<?= $Grid->RowIndex ?>_MRP" value="<?= HtmlEncode($Grid->MRP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_PurValue" class="form-group view_store_grn_PurValue">
<input type="<?= $Grid->PurValue->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PurValue" name="x<?= $Grid->RowIndex ?>_PurValue" id="x<?= $Grid->RowIndex ?>_PurValue" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->PurValue->getPlaceHolder()) ?>" value="<?= $Grid->PurValue->EditValue ?>"<?= $Grid->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PurValue->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_PurValue" class="form-group view_store_grn_PurValue">
<span<?= $Grid->PurValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PurValue->getDisplayValue($Grid->PurValue->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PurValue" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PurValue" id="x<?= $Grid->RowIndex ?>_PurValue" value="<?= HtmlEncode($Grid->PurValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PurValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PurValue" id="o<?= $Grid->RowIndex ?>_PurValue" value="<?= HtmlEncode($Grid->PurValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Disc->Visible) { // Disc ?>
        <td data-name="Disc">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_Disc" class="form-group view_store_grn_Disc">
<input type="<?= $Grid->Disc->getInputTextType() ?>" data-table="view_store_grn" data-field="x_Disc" name="x<?= $Grid->RowIndex ?>_Disc" id="x<?= $Grid->RowIndex ?>_Disc" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->Disc->getPlaceHolder()) ?>" value="<?= $Grid->Disc->EditValue ?>"<?= $Grid->Disc->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Disc->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_Disc" class="form-group view_store_grn_Disc">
<span<?= $Grid->Disc->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Disc->getDisplayValue($Grid->Disc->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_Disc" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Disc" id="x<?= $Grid->RowIndex ?>_Disc" value="<?= HtmlEncode($Grid->Disc->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_Disc" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Disc" id="o<?= $Grid->RowIndex ?>_Disc" value="<?= HtmlEncode($Grid->Disc->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_PSGST" class="form-group view_store_grn_PSGST">
<input type="<?= $Grid->PSGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PSGST" name="x<?= $Grid->RowIndex ?>_PSGST" id="x<?= $Grid->RowIndex ?>_PSGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->PSGST->getPlaceHolder()) ?>" value="<?= $Grid->PSGST->EditValue ?>"<?= $Grid->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PSGST->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_PSGST" class="form-group view_store_grn_PSGST">
<span<?= $Grid->PSGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PSGST->getDisplayValue($Grid->PSGST->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PSGST" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PSGST" id="x<?= $Grid->RowIndex ?>_PSGST" value="<?= HtmlEncode($Grid->PSGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PSGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PSGST" id="o<?= $Grid->RowIndex ?>_PSGST" value="<?= HtmlEncode($Grid->PSGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_PCGST" class="form-group view_store_grn_PCGST">
<input type="<?= $Grid->PCGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PCGST" name="x<?= $Grid->RowIndex ?>_PCGST" id="x<?= $Grid->RowIndex ?>_PCGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->PCGST->getPlaceHolder()) ?>" value="<?= $Grid->PCGST->EditValue ?>"<?= $Grid->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PCGST->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_PCGST" class="form-group view_store_grn_PCGST">
<span<?= $Grid->PCGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PCGST->getDisplayValue($Grid->PCGST->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PCGST" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PCGST" id="x<?= $Grid->RowIndex ?>_PCGST" value="<?= HtmlEncode($Grid->PCGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PCGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PCGST" id="o<?= $Grid->RowIndex ?>_PCGST" value="<?= HtmlEncode($Grid->PCGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PTax->Visible) { // PTax ?>
        <td data-name="PTax">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_PTax" class="form-group view_store_grn_PTax">
<input type="<?= $Grid->PTax->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PTax" name="x<?= $Grid->RowIndex ?>_PTax" id="x<?= $Grid->RowIndex ?>_PTax" size="6" maxlength="10" placeholder="<?= HtmlEncode($Grid->PTax->getPlaceHolder()) ?>" value="<?= $Grid->PTax->EditValue ?>"<?= $Grid->PTax->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PTax->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_PTax" class="form-group view_store_grn_PTax">
<span<?= $Grid->PTax->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PTax->getDisplayValue($Grid->PTax->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PTax" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PTax" id="x<?= $Grid->RowIndex ?>_PTax" value="<?= HtmlEncode($Grid->PTax->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PTax" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PTax" id="o<?= $Grid->RowIndex ?>_PTax" value="<?= HtmlEncode($Grid->PTax->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ItemValue->Visible) { // ItemValue ?>
        <td data-name="ItemValue">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_ItemValue" class="form-group view_store_grn_ItemValue">
<input type="<?= $Grid->ItemValue->getInputTextType() ?>" data-table="view_store_grn" data-field="x_ItemValue" name="x<?= $Grid->RowIndex ?>_ItemValue" id="x<?= $Grid->RowIndex ?>_ItemValue" size="8" maxlength="12" placeholder="<?= HtmlEncode($Grid->ItemValue->getPlaceHolder()) ?>" value="<?= $Grid->ItemValue->EditValue ?>"<?= $Grid->ItemValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemValue->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_ItemValue" class="form-group view_store_grn_ItemValue">
<span<?= $Grid->ItemValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ItemValue->getDisplayValue($Grid->ItemValue->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_ItemValue" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ItemValue" id="x<?= $Grid->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Grid->ItemValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_ItemValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ItemValue" id="o<?= $Grid->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Grid->ItemValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SalTax->Visible) { // SalTax ?>
        <td data-name="SalTax">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_SalTax" class="form-group view_store_grn_SalTax">
<input type="<?= $Grid->SalTax->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SalTax" name="x<?= $Grid->RowIndex ?>_SalTax" id="x<?= $Grid->RowIndex ?>_SalTax" size="8" maxlength="12" placeholder="<?= HtmlEncode($Grid->SalTax->getPlaceHolder()) ?>" value="<?= $Grid->SalTax->EditValue ?>"<?= $Grid->SalTax->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SalTax->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_SalTax" class="form-group view_store_grn_SalTax">
<span<?= $Grid->SalTax->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SalTax->getDisplayValue($Grid->SalTax->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SalTax" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SalTax" id="x<?= $Grid->RowIndex ?>_SalTax" value="<?= HtmlEncode($Grid->SalTax->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SalTax" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SalTax" id="o<?= $Grid->RowIndex ?>_SalTax" value="<?= HtmlEncode($Grid->SalTax->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_BatchNo" class="form-group view_store_grn_BatchNo">
<input type="<?= $Grid->BatchNo->getInputTextType() ?>" data-table="view_store_grn" data-field="x_BatchNo" name="x<?= $Grid->RowIndex ?>_BatchNo" id="x<?= $Grid->RowIndex ?>_BatchNo" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->BatchNo->getPlaceHolder()) ?>" value="<?= $Grid->BatchNo->EditValue ?>"<?= $Grid->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BatchNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_BatchNo" class="form-group view_store_grn_BatchNo">
<span<?= $Grid->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BatchNo->getDisplayValue($Grid->BatchNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_BatchNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BatchNo" id="x<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BatchNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BatchNo" id="o<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_ExpDate" class="form-group view_store_grn_ExpDate">
<input type="<?= $Grid->ExpDate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_ExpDate" data-format="7" name="x<?= $Grid->RowIndex ?>_ExpDate" id="x<?= $Grid->RowIndex ?>_ExpDate" size="8" maxlength="10" placeholder="<?= HtmlEncode($Grid->ExpDate->getPlaceHolder()) ?>" value="<?= $Grid->ExpDate->EditValue ?>"<?= $Grid->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExpDate->getErrorMessage() ?></div>
<?php if (!$Grid->ExpDate->ReadOnly && !$Grid->ExpDate->Disabled && !isset($Grid->ExpDate->EditAttrs["readonly"]) && !isset($Grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grngrid", "x<?= $Grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_ExpDate" class="form-group view_store_grn_ExpDate">
<span<?= $Grid->ExpDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ExpDate->getDisplayValue($Grid->ExpDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_ExpDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ExpDate" id="x<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_ExpDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ExpDate" id="o<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_Quantity" class="form-group view_store_grn_Quantity">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="view_store_grn" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_Quantity" class="form-group view_store_grn_Quantity">
<span<?= $Grid->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Quantity->getDisplayValue($Grid->Quantity->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_Quantity" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_Quantity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Quantity" id="o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SalRate->Visible) { // SalRate ?>
        <td data-name="SalRate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_SalRate" class="form-group view_store_grn_SalRate">
<input type="<?= $Grid->SalRate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SalRate" name="x<?= $Grid->RowIndex ?>_SalRate" id="x<?= $Grid->RowIndex ?>_SalRate" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->SalRate->getPlaceHolder()) ?>" value="<?= $Grid->SalRate->EditValue ?>"<?= $Grid->SalRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SalRate->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_SalRate" class="form-group view_store_grn_SalRate">
<span<?= $Grid->SalRate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SalRate->getDisplayValue($Grid->SalRate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SalRate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SalRate" id="x<?= $Grid->RowIndex ?>_SalRate" value="<?= HtmlEncode($Grid->SalRate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SalRate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SalRate" id="o<?= $Grid->RowIndex ?>_SalRate" value="<?= HtmlEncode($Grid->SalRate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_SSGST" class="form-group view_store_grn_SSGST">
<input type="<?= $Grid->SSGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SSGST" name="x<?= $Grid->RowIndex ?>_SSGST" id="x<?= $Grid->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->SSGST->getPlaceHolder()) ?>" value="<?= $Grid->SSGST->EditValue ?>"<?= $Grid->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SSGST->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_SSGST" class="form-group view_store_grn_SSGST">
<span<?= $Grid->SSGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SSGST->getDisplayValue($Grid->SSGST->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SSGST" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SSGST" id="x<?= $Grid->RowIndex ?>_SSGST" value="<?= HtmlEncode($Grid->SSGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SSGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SSGST" id="o<?= $Grid->RowIndex ?>_SSGST" value="<?= HtmlEncode($Grid->SSGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_SCGST" class="form-group view_store_grn_SCGST">
<input type="<?= $Grid->SCGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SCGST" name="x<?= $Grid->RowIndex ?>_SCGST" id="x<?= $Grid->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->SCGST->getPlaceHolder()) ?>" value="<?= $Grid->SCGST->EditValue ?>"<?= $Grid->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SCGST->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_SCGST" class="form-group view_store_grn_SCGST">
<span<?= $Grid->SCGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SCGST->getDisplayValue($Grid->SCGST->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SCGST" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SCGST" id="x<?= $Grid->RowIndex ?>_SCGST" value="<?= HtmlEncode($Grid->SCGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SCGST" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SCGST" id="o<?= $Grid->RowIndex ?>_SCGST" value="<?= HtmlEncode($Grid->SCGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_BRCODE" class="form-group view_store_grn_BRCODE">
<span<?= $Grid->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BRCODE->getDisplayValue($Grid->BRCODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_BRCODE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BRCODE" id="x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRCODE" id="o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HSN->Visible) { // HSN ?>
        <td data-name="HSN">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_HSN" class="form-group view_store_grn_HSN">
<input type="<?= $Grid->HSN->getInputTextType() ?>" data-table="view_store_grn" data-field="x_HSN" name="x<?= $Grid->RowIndex ?>_HSN" id="x<?= $Grid->RowIndex ?>_HSN" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->HSN->getPlaceHolder()) ?>" value="<?= $Grid->HSN->EditValue ?>"<?= $Grid->HSN->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HSN->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_HSN" class="form-group view_store_grn_HSN">
<span<?= $Grid->HSN->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HSN->getDisplayValue($Grid->HSN->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_HSN" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HSN" id="x<?= $Grid->RowIndex ?>_HSN" value="<?= HtmlEncode($Grid->HSN->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_HSN" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HSN" id="o<?= $Grid->RowIndex ?>_HSN" value="<?= HtmlEncode($Grid->HSN->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_HospID" class="form-group view_store_grn_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->grncreatedby->Visible) { // grncreatedby ?>
        <td data-name="grncreatedby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_grncreatedby" class="form-group view_store_grn_grncreatedby">
<span<?= $Grid->grncreatedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->grncreatedby->getDisplayValue($Grid->grncreatedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_grncreatedby" id="x<?= $Grid->RowIndex ?>_grncreatedby" value="<?= HtmlEncode($Grid->grncreatedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grncreatedby" id="o<?= $Grid->RowIndex ?>_grncreatedby" value="<?= HtmlEncode($Grid->grncreatedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <td data-name="grncreatedDateTime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_grncreatedDateTime" class="form-group view_store_grn_grncreatedDateTime">
<span<?= $Grid->grncreatedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->grncreatedDateTime->getDisplayValue($Grid->grncreatedDateTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedDateTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_grncreatedDateTime" id="x<?= $Grid->RowIndex ?>_grncreatedDateTime" value="<?= HtmlEncode($Grid->grncreatedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grncreatedDateTime" id="o<?= $Grid->RowIndex ?>_grncreatedDateTime" value="<?= HtmlEncode($Grid->grncreatedDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->grnModifiedby->Visible) { // grnModifiedby ?>
        <td data-name="grnModifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_grnModifiedby" class="form-group view_store_grn_grnModifiedby">
<span<?= $Grid->grnModifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->grnModifiedby->getDisplayValue($Grid->grnModifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_grnModifiedby" id="x<?= $Grid->RowIndex ?>_grnModifiedby" value="<?= HtmlEncode($Grid->grnModifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grnModifiedby" id="o<?= $Grid->RowIndex ?>_grnModifiedby" value="<?= HtmlEncode($Grid->grnModifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <td data-name="grnModifiedDateTime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_grnModifiedDateTime" class="form-group view_store_grn_grnModifiedDateTime">
<span<?= $Grid->grnModifiedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->grnModifiedDateTime->getDisplayValue($Grid->grnModifiedDateTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedDateTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_grnModifiedDateTime" id="x<?= $Grid->RowIndex ?>_grnModifiedDateTime" value="<?= HtmlEncode($Grid->grnModifiedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grnModifiedDateTime" id="o<?= $Grid->RowIndex ?>_grnModifiedDateTime" value="<?= HtmlEncode($Grid->grnModifiedDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_BillDate" class="form-group view_store_grn_BillDate">
<input type="<?= $Grid->BillDate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_BillDate" name="x<?= $Grid->RowIndex ?>_BillDate" id="x<?= $Grid->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Grid->BillDate->getPlaceHolder()) ?>" value="<?= $Grid->BillDate->EditValue ?>"<?= $Grid->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillDate->getErrorMessage() ?></div>
<?php if (!$Grid->BillDate->ReadOnly && !$Grid->BillDate->Disabled && !isset($Grid->BillDate->EditAttrs["readonly"]) && !isset($Grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grngrid", "x<?= $Grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_BillDate" class="form-group view_store_grn_BillDate">
<span<?= $Grid->BillDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BillDate->getDisplayValue($Grid->BillDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_BillDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BillDate" id="x<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BillDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillDate" id="o<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CurStock->Visible) { // CurStock ?>
        <td data-name="CurStock">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_CurStock" class="form-group view_store_grn_CurStock">
<input type="<?= $Grid->CurStock->getInputTextType() ?>" data-table="view_store_grn" data-field="x_CurStock" name="x<?= $Grid->RowIndex ?>_CurStock" id="x<?= $Grid->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Grid->CurStock->getPlaceHolder()) ?>" value="<?= $Grid->CurStock->EditValue ?>"<?= $Grid->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CurStock->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_CurStock" class="form-group view_store_grn_CurStock">
<span<?= $Grid->CurStock->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CurStock->getDisplayValue($Grid->CurStock->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_CurStock" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CurStock" id="x<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_CurStock" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CurStock" id="o<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <td data-name="FreeQtyyy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_FreeQtyyy" class="form-group view_store_grn_FreeQtyyy">
<input type="<?= $Grid->FreeQtyyy->getInputTextType() ?>" data-table="view_store_grn" data-field="x_FreeQtyyy" name="x<?= $Grid->RowIndex ?>_FreeQtyyy" id="x<?= $Grid->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?= HtmlEncode($Grid->FreeQtyyy->getPlaceHolder()) ?>" value="<?= $Grid->FreeQtyyy->EditValue ?>"<?= $Grid->FreeQtyyy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FreeQtyyy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_FreeQtyyy" class="form-group view_store_grn_FreeQtyyy">
<span<?= $Grid->FreeQtyyy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->FreeQtyyy->getDisplayValue($Grid->FreeQtyyy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQtyyy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_FreeQtyyy" id="x<?= $Grid->RowIndex ?>_FreeQtyyy" value="<?= HtmlEncode($Grid->FreeQtyyy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQtyyy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FreeQtyyy" id="o<?= $Grid->RowIndex ?>_FreeQtyyy" value="<?= HtmlEncode($Grid->FreeQtyyy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->grndate->Visible) { // grndate ?>
        <td data-name="grndate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_grndate" class="form-group view_store_grn_grndate">
<input type="<?= $Grid->grndate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_grndate" name="x<?= $Grid->RowIndex ?>_grndate" id="x<?= $Grid->RowIndex ?>_grndate" placeholder="<?= HtmlEncode($Grid->grndate->getPlaceHolder()) ?>" value="<?= $Grid->grndate->EditValue ?>"<?= $Grid->grndate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->grndate->getErrorMessage() ?></div>
<?php if (!$Grid->grndate->ReadOnly && !$Grid->grndate->Disabled && !isset($Grid->grndate->EditAttrs["readonly"]) && !isset($Grid->grndate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grngrid", "x<?= $Grid->RowIndex ?>_grndate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_grndate" class="form-group view_store_grn_grndate">
<span<?= $Grid->grndate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->grndate->getDisplayValue($Grid->grndate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grndate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_grndate" id="x<?= $Grid->RowIndex ?>_grndate" value="<?= HtmlEncode($Grid->grndate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grndate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grndate" id="o<?= $Grid->RowIndex ?>_grndate" value="<?= HtmlEncode($Grid->grndate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->grndatetime->Visible) { // grndatetime ?>
        <td data-name="grndatetime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_grndatetime" class="form-group view_store_grn_grndatetime">
<input type="<?= $Grid->grndatetime->getInputTextType() ?>" data-table="view_store_grn" data-field="x_grndatetime" name="x<?= $Grid->RowIndex ?>_grndatetime" id="x<?= $Grid->RowIndex ?>_grndatetime" placeholder="<?= HtmlEncode($Grid->grndatetime->getPlaceHolder()) ?>" value="<?= $Grid->grndatetime->EditValue ?>"<?= $Grid->grndatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->grndatetime->getErrorMessage() ?></div>
<?php if (!$Grid->grndatetime->ReadOnly && !$Grid->grndatetime->Disabled && !isset($Grid->grndatetime->EditAttrs["readonly"]) && !isset($Grid->grndatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grngrid", "x<?= $Grid->RowIndex ?>_grndatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_grndatetime" class="form-group view_store_grn_grndatetime">
<span<?= $Grid->grndatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->grndatetime->getDisplayValue($Grid->grndatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grndatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_grndatetime" id="x<?= $Grid->RowIndex ?>_grndatetime" value="<?= HtmlEncode($Grid->grndatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grndatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grndatetime" id="o<?= $Grid->RowIndex ?>_grndatetime" value="<?= HtmlEncode($Grid->grndatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->strid->Visible) { // strid ?>
        <td data-name="strid">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_strid" class="form-group view_store_grn_strid">
<input type="<?= $Grid->strid->getInputTextType() ?>" data-table="view_store_grn" data-field="x_strid" name="x<?= $Grid->RowIndex ?>_strid" id="x<?= $Grid->RowIndex ?>_strid" size="30" placeholder="<?= HtmlEncode($Grid->strid->getPlaceHolder()) ?>" value="<?= $Grid->strid->EditValue ?>"<?= $Grid->strid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->strid->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_strid" class="form-group view_store_grn_strid">
<span<?= $Grid->strid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->strid->getDisplayValue($Grid->strid->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_strid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_strid" id="x<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_strid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_strid" id="o<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GRNPer->Visible) { // GRNPer ?>
        <td data-name="GRNPer">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_GRNPer" class="form-group view_store_grn_GRNPer">
<input type="<?= $Grid->GRNPer->getInputTextType() ?>" data-table="view_store_grn" data-field="x_GRNPer" name="x<?= $Grid->RowIndex ?>_GRNPer" id="x<?= $Grid->RowIndex ?>_GRNPer" size="30" placeholder="<?= HtmlEncode($Grid->GRNPer->getPlaceHolder()) ?>" value="<?= $Grid->GRNPer->EditValue ?>"<?= $Grid->GRNPer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNPer->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_GRNPer" class="form-group view_store_grn_GRNPer">
<span<?= $Grid->GRNPer->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GRNPer->getDisplayValue($Grid->GRNPer->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_GRNPer" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GRNPer" id="x<?= $Grid->RowIndex ?>_GRNPer" value="<?= HtmlEncode($Grid->GRNPer->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_GRNPer" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GRNPer" id="o<?= $Grid->RowIndex ?>_GRNPer" value="<?= HtmlEncode($Grid->GRNPer->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->StoreID->Visible) { // StoreID ?>
        <td data-name="StoreID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_StoreID" class="form-group view_store_grn_StoreID">
<input type="<?= $Grid->StoreID->getInputTextType() ?>" data-table="view_store_grn" data-field="x_StoreID" name="x<?= $Grid->RowIndex ?>_StoreID" id="x<?= $Grid->RowIndex ?>_StoreID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->StoreID->getPlaceHolder()) ?>" value="<?= $Grid->StoreID->EditValue ?>"<?= $Grid->StoreID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->StoreID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_StoreID" class="form-group view_store_grn_StoreID">
<span<?= $Grid->StoreID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->StoreID->getDisplayValue($Grid->StoreID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_StoreID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_StoreID" id="x<?= $Grid->RowIndex ?>_StoreID" value="<?= HtmlEncode($Grid->StoreID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_StoreID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_StoreID" id="o<?= $Grid->RowIndex ?>_StoreID" value="<?= HtmlEncode($Grid->StoreID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fview_store_grngrid","load"], function() {
    fview_store_grngrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
<?php
// Render aggregate row
$Grid->RowType = ROWTYPE_AGGREGATE;
$Grid->resetAttributes();
$Grid->renderRow();
?>
<?php if ($Grid->TotalRecords > 0 && $Grid->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
    <tr class="ew-table-footer">
<?php
// Render list options
$Grid->renderListOptions();

// Render list options (footer, left)
$Grid->ListOptions->render("footer", "left");
?>
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC" class="<?= $Grid->PRC->footerCellClass() ?>"><span id="elf_view_store_grn_PRC" class="view_store_grn_PRC">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PrName->Visible) { // PrName ?>
        <td data-name="PrName" class="<?= $Grid->PrName->footerCellClass() ?>"><span id="elf_view_store_grn_PrName" class="view_store_grn_PrName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->GrnQuantity->Visible) { // GrnQuantity ?>
        <td data-name="GrnQuantity" class="<?= $Grid->GrnQuantity->footerCellClass() ?>"><span id="elf_view_store_grn_GrnQuantity" class="view_store_grn_GrnQuantity">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->FreeQty->Visible) { // FreeQty ?>
        <td data-name="FreeQty" class="<?= $Grid->FreeQty->footerCellClass() ?>"><span id="elf_view_store_grn_FreeQty" class="view_store_grn_FreeQty">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" class="<?= $Grid->MFRCODE->footerCellClass() ?>"><span id="elf_view_store_grn_MFRCODE" class="view_store_grn_MFRCODE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit" class="<?= $Grid->PUnit->footerCellClass() ?>"><span id="elf_view_store_grn_PUnit" class="view_store_grn_PUnit">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->SUnit->Visible) { // SUnit ?>
        <td data-name="SUnit" class="<?= $Grid->SUnit->footerCellClass() ?>"><span id="elf_view_store_grn_SUnit" class="view_store_grn_SUnit">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->MRP->Visible) { // MRP ?>
        <td data-name="MRP" class="<?= $Grid->MRP->footerCellClass() ?>"><span id="elf_view_store_grn_MRP" class="view_store_grn_MRP">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue" class="<?= $Grid->PurValue->footerCellClass() ?>"><span id="elf_view_store_grn_PurValue" class="view_store_grn_PurValue">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Disc->Visible) { // Disc ?>
        <td data-name="Disc" class="<?= $Grid->Disc->footerCellClass() ?>"><span id="elf_view_store_grn_Disc" class="view_store_grn_Disc">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST" class="<?= $Grid->PSGST->footerCellClass() ?>"><span id="elf_view_store_grn_PSGST" class="view_store_grn_PSGST">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST" class="<?= $Grid->PCGST->footerCellClass() ?>"><span id="elf_view_store_grn_PCGST" class="view_store_grn_PCGST">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PTax->Visible) { // PTax ?>
        <td data-name="PTax" class="<?= $Grid->PTax->footerCellClass() ?>"><span id="elf_view_store_grn_PTax" class="view_store_grn_PTax">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Grid->PTax->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Grid->ItemValue->Visible) { // ItemValue ?>
        <td data-name="ItemValue" class="<?= $Grid->ItemValue->footerCellClass() ?>"><span id="elf_view_store_grn_ItemValue" class="view_store_grn_ItemValue">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Grid->ItemValue->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Grid->SalTax->Visible) { // SalTax ?>
        <td data-name="SalTax" class="<?= $Grid->SalTax->footerCellClass() ?>"><span id="elf_view_store_grn_SalTax" class="view_store_grn_SalTax">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Grid->SalTax->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Grid->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" class="<?= $Grid->BatchNo->footerCellClass() ?>"><span id="elf_view_store_grn_BatchNo" class="view_store_grn_BatchNo">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate" class="<?= $Grid->ExpDate->footerCellClass() ?>"><span id="elf_view_store_grn_ExpDate" class="view_store_grn_ExpDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" class="<?= $Grid->Quantity->footerCellClass() ?>"><span id="elf_view_store_grn_Quantity" class="view_store_grn_Quantity">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->SalRate->Visible) { // SalRate ?>
        <td data-name="SalRate" class="<?= $Grid->SalRate->footerCellClass() ?>"><span id="elf_view_store_grn_SalRate" class="view_store_grn_SalRate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" class="<?= $Grid->SSGST->footerCellClass() ?>"><span id="elf_view_store_grn_SSGST" class="view_store_grn_SSGST">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" class="<?= $Grid->SCGST->footerCellClass() ?>"><span id="elf_view_store_grn_SCGST" class="view_store_grn_SCGST">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" class="<?= $Grid->BRCODE->footerCellClass() ?>"><span id="elf_view_store_grn_BRCODE" class="view_store_grn_BRCODE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->HSN->Visible) { // HSN ?>
        <td data-name="HSN" class="<?= $Grid->HSN->footerCellClass() ?>"><span id="elf_view_store_grn_HSN" class="view_store_grn_HSN">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" class="<?= $Grid->HospID->footerCellClass() ?>"><span id="elf_view_store_grn_HospID" class="view_store_grn_HospID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->grncreatedby->Visible) { // grncreatedby ?>
        <td data-name="grncreatedby" class="<?= $Grid->grncreatedby->footerCellClass() ?>"><span id="elf_view_store_grn_grncreatedby" class="view_store_grn_grncreatedby">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <td data-name="grncreatedDateTime" class="<?= $Grid->grncreatedDateTime->footerCellClass() ?>"><span id="elf_view_store_grn_grncreatedDateTime" class="view_store_grn_grncreatedDateTime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->grnModifiedby->Visible) { // grnModifiedby ?>
        <td data-name="grnModifiedby" class="<?= $Grid->grnModifiedby->footerCellClass() ?>"><span id="elf_view_store_grn_grnModifiedby" class="view_store_grn_grnModifiedby">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <td data-name="grnModifiedDateTime" class="<?= $Grid->grnModifiedDateTime->footerCellClass() ?>"><span id="elf_view_store_grn_grnModifiedDateTime" class="view_store_grn_grnModifiedDateTime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" class="<?= $Grid->BillDate->footerCellClass() ?>"><span id="elf_view_store_grn_BillDate" class="view_store_grn_BillDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->CurStock->Visible) { // CurStock ?>
        <td data-name="CurStock" class="<?= $Grid->CurStock->footerCellClass() ?>"><span id="elf_view_store_grn_CurStock" class="view_store_grn_CurStock">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <td data-name="FreeQtyyy" class="<?= $Grid->FreeQtyyy->footerCellClass() ?>"><span id="elf_view_store_grn_FreeQtyyy" class="view_store_grn_FreeQtyyy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->grndate->Visible) { // grndate ?>
        <td data-name="grndate" class="<?= $Grid->grndate->footerCellClass() ?>"><span id="elf_view_store_grn_grndate" class="view_store_grn_grndate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->grndatetime->Visible) { // grndatetime ?>
        <td data-name="grndatetime" class="<?= $Grid->grndatetime->footerCellClass() ?>"><span id="elf_view_store_grn_grndatetime" class="view_store_grn_grndatetime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->strid->Visible) { // strid ?>
        <td data-name="strid" class="<?= $Grid->strid->footerCellClass() ?>"><span id="elf_view_store_grn_strid" class="view_store_grn_strid">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->GRNPer->Visible) { // GRNPer ?>
        <td data-name="GRNPer" class="<?= $Grid->GRNPer->footerCellClass() ?>"><span id="elf_view_store_grn_GRNPer" class="view_store_grn_GRNPer">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->StoreID->Visible) { // StoreID ?>
        <td data-name="StoreID" class="<?= $Grid->StoreID->footerCellClass() ?>"><span id="elf_view_store_grn_StoreID" class="view_store_grn_StoreID">
        &nbsp;
        </span></td>
    <?php } ?>
<?php
// Render list options (footer, right)
$Grid->ListOptions->render("footer", "right");
?>
    </tr>
</tfoot>
<?php } ?>
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
<input type="hidden" name="detailpage" value="fview_store_grngrid">
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
    ew.addEventHandlers("view_store_grn");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    $("[data-name='Quantity']").hide();
});
</script>
<?php if (!$Grid->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_view_store_grn",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
