<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyGrnDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_grndelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_grndelete = currentForm = new ew.Form("fpharmacy_grndelete", "delete");
    loadjs.done("fpharmacy_grndelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.pharmacy_grn) ew.vars.tables.pharmacy_grn = <?= JsonEncode(GetClientVar("tables", "pharmacy_grn")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_grndelete" id="fpharmacy_grndelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_grn">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_grn_id" class="pharmacy_grn_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
        <th class="<?= $Page->GRNNO->headerCellClass() ?>"><span id="elh_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO"><?= $Page->GRNNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th class="<?= $Page->DT->headerCellClass() ?>"><span id="elh_pharmacy_grn_DT" class="pharmacy_grn_DT"><?= $Page->DT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <th class="<?= $Page->Customername->headerCellClass() ?>"><span id="elh_pharmacy_grn_Customername" class="pharmacy_grn_Customername"><?= $Page->Customername->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th class="<?= $Page->State->headerCellClass() ?>"><span id="elh_pharmacy_grn_State" class="pharmacy_grn_State"><?= $Page->State->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <th class="<?= $Page->Pincode->headerCellClass() ?>"><span id="elh_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode"><?= $Page->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <th class="<?= $Page->Phone->headerCellClass() ?>"><span id="elh_pharmacy_grn_Phone" class="pharmacy_grn_Phone"><?= $Page->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <th class="<?= $Page->BILLNO->headerCellClass() ?>"><span id="elh_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO"><?= $Page->BILLNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <th class="<?= $Page->BILLDT->headerCellClass() ?>"><span id="elh_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT"><?= $Page->BILLDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <th class="<?= $Page->BillTotalValue->headerCellClass() ?>"><span id="elh_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue"><?= $Page->BillTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <th class="<?= $Page->GRNTotalValue->headerCellClass() ?>"><span id="elh_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue"><?= $Page->GRNTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <th class="<?= $Page->BillDiscount->headerCellClass() ?>"><span id="elh_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount"><?= $Page->BillDiscount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GrnValue->Visible) { // GrnValue ?>
        <th class="<?= $Page->GrnValue->headerCellClass() ?>"><span id="elh_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue"><?= $Page->GrnValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pid->Visible) { // Pid ?>
        <th class="<?= $Page->Pid->headerCellClass() ?>"><span id="elh_pharmacy_grn_Pid" class="pharmacy_grn_Pid"><?= $Page->Pid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
        <th class="<?= $Page->PaymentNo->headerCellClass() ?>"><span id="elh_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo"><?= $Page->PaymentNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <th class="<?= $Page->PaymentStatus->headerCellClass() ?>"><span id="elh_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus"><?= $Page->PaymentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <th class="<?= $Page->PaidAmount->headerCellClass() ?>"><span id="elh_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount"><?= $Page->PaidAmount->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_id" class="pharmacy_grn_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
        <td <?= $Page->GRNNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
<span<?= $Page->GRNNO->viewAttributes() ?>>
<?= $Page->GRNNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <td <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_DT" class="pharmacy_grn_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <td <?= $Page->Customername->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <td <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_State" class="pharmacy_grn_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td <?= $Page->Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <td <?= $Page->Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <td <?= $Page->BILLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
<span<?= $Page->BILLNO->viewAttributes() ?>>
<?= $Page->BILLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <td <?= $Page->BILLDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
<span<?= $Page->BILLDT->viewAttributes() ?>>
<?= $Page->BILLDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <td <?= $Page->BillTotalValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
<span<?= $Page->BillTotalValue->viewAttributes() ?>>
<?= $Page->BillTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <td <?= $Page->GRNTotalValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
<span<?= $Page->GRNTotalValue->viewAttributes() ?>>
<?= $Page->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <td <?= $Page->BillDiscount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
<span<?= $Page->BillDiscount->viewAttributes() ?>>
<?= $Page->BillDiscount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GrnValue->Visible) { // GrnValue ?>
        <td <?= $Page->GrnValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
<span<?= $Page->GrnValue->viewAttributes() ?>>
<?= $Page->GrnValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pid->Visible) { // Pid ?>
        <td <?= $Page->Pid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
<span<?= $Page->Pid->viewAttributes() ?>>
<?= $Page->Pid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
        <td <?= $Page->PaymentNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
<span<?= $Page->PaymentNo->viewAttributes() ?>>
<?= $Page->PaymentNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <td <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <td <?= $Page->PaidAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
