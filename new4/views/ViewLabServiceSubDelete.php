<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewLabServiceSubDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_lab_service_subdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fview_lab_service_subdelete = currentForm = new ew.Form("fview_lab_service_subdelete", "delete");
    loadjs.done("fview_lab_service_subdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.view_lab_service_sub) ew.vars.tables.view_lab_service_sub = <?= JsonEncode(GetClientVar("tables", "view_lab_service_sub")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_lab_service_subdelete" id="fview_lab_service_subdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_lab_service_sub">
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
<?php if ($Page->Id->Visible) { // Id ?>
        <th class="<?= $Page->Id->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Id" class="view_lab_service_sub_Id"><?= $Page->Id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <th class="<?= $Page->CODE->headerCellClass() ?>"><span id="elh_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE"><?= $Page->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <th class="<?= $Page->SERVICE->headerCellClass() ?>"><span id="elh_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE"><?= $Page->SERVICE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UNITS->Visible) { // UNITS ?>
        <th class="<?= $Page->UNITS->headerCellClass() ?>"><span id="elh_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS"><?= $Page->UNITS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <th class="<?= $Page->TestSubCd->headerCellClass() ?>"><span id="elh_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd"><?= $Page->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th class="<?= $Page->Method->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Method" class="view_lab_service_sub_Method"><?= $Page->Method->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th class="<?= $Page->Order->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Order" class="view_lab_service_sub_Order"><?= $Page->Order->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <th class="<?= $Page->ResType->headerCellClass() ?>"><span id="elh_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType"><?= $Page->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <th class="<?= $Page->UnitCD->headerCellClass() ?>"><span id="elh_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD"><?= $Page->UnitCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <th class="<?= $Page->Sample->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample"><?= $Page->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <th class="<?= $Page->NoD->headerCellClass() ?>"><span id="elh_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD"><?= $Page->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <th class="<?= $Page->BillOrder->headerCellClass() ?>"><span id="elh_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder"><?= $Page->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Formula->Visible) { // Formula ?>
        <th class="<?= $Page->Formula->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula"><?= $Page->Formula->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <th class="<?= $Page->Inactive->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive"><?= $Page->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
        <th class="<?= $Page->Outsource->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource"><?= $Page->Outsource->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <th class="<?= $Page->CollSample->headerCellClass() ?>"><span id="elh_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample"><?= $Page->CollSample->caption() ?></span></th>
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
<?php if ($Page->Id->Visible) { // Id ?>
        <td <?= $Page->Id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_Id" class="view_lab_service_sub_Id">
<span<?= $Page->Id->viewAttributes() ?>>
<?= $Page->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <td <?= $Page->CODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE">
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <td <?= $Page->SERVICE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE">
<span<?= $Page->SERVICE->viewAttributes() ?>>
<?= $Page->SERVICE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UNITS->Visible) { // UNITS ?>
        <td <?= $Page->UNITS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS">
<span<?= $Page->UNITS->viewAttributes() ?>>
<?= $Page->UNITS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <td <?= $Page->Method->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_Method" class="view_lab_service_sub_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <td <?= $Page->Order->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_Order" class="view_lab_service_sub_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <td <?= $Page->ResType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType">
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <td <?= $Page->UnitCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD">
<span<?= $Page->UnitCD->viewAttributes() ?>>
<?= $Page->UnitCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <td <?= $Page->Sample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample">
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <td <?= $Page->NoD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD">
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <td <?= $Page->BillOrder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder">
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Formula->Visible) { // Formula ?>
        <td <?= $Page->Formula->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula">
<span<?= $Page->Formula->viewAttributes() ?>>
<?= $Page->Formula->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <td <?= $Page->Inactive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive">
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
        <td <?= $Page->Outsource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource">
<span<?= $Page->Outsource->viewAttributes() ?>>
<?= $Page->Outsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <td <?= $Page->CollSample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample">
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
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
