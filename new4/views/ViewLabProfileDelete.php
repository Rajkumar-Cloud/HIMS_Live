<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewLabProfileDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_lab_profiledelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fview_lab_profiledelete = currentForm = new ew.Form("fview_lab_profiledelete", "delete");
    loadjs.done("fview_lab_profiledelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.view_lab_profile) ew.vars.tables.view_lab_profile = <?= JsonEncode(GetClientVar("tables", "view_lab_profile")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_lab_profiledelete" id="fview_lab_profiledelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_lab_profile">
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
        <th class="<?= $Page->Id->headerCellClass() ?>"><span id="elh_view_lab_profile_Id" class="view_lab_profile_Id"><?= $Page->Id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <th class="<?= $Page->CODE->headerCellClass() ?>"><span id="elh_view_lab_profile_CODE" class="view_lab_profile_CODE"><?= $Page->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <th class="<?= $Page->SERVICE->headerCellClass() ?>"><span id="elh_view_lab_profile_SERVICE" class="view_lab_profile_SERVICE"><?= $Page->SERVICE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UNITS->Visible) { // UNITS ?>
        <th class="<?= $Page->UNITS->headerCellClass() ?>"><span id="elh_view_lab_profile_UNITS" class="view_lab_profile_UNITS"><?= $Page->UNITS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AMOUNT->Visible) { // AMOUNT ?>
        <th class="<?= $Page->AMOUNT->headerCellClass() ?>"><span id="elh_view_lab_profile_AMOUNT" class="view_lab_profile_AMOUNT"><?= $Page->AMOUNT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <th class="<?= $Page->SERVICE_TYPE->headerCellClass() ?>"><span id="elh_view_lab_profile_SERVICE_TYPE" class="view_lab_profile_SERVICE_TYPE"><?= $Page->SERVICE_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <th class="<?= $Page->DEPARTMENT->headerCellClass() ?>"><span id="elh_view_lab_profile_DEPARTMENT" class="view_lab_profile_DEPARTMENT"><?= $Page->DEPARTMENT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
        <th class="<?= $Page->mas_services_billingcol->headerCellClass() ?>"><span id="elh_view_lab_profile_mas_services_billingcol" class="view_lab_profile_mas_services_billingcol"><?= $Page->mas_services_billingcol->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <th class="<?= $Page->DrShareAmount->headerCellClass() ?>"><span id="elh_view_lab_profile_DrShareAmount" class="view_lab_profile_DrShareAmount"><?= $Page->DrShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <th class="<?= $Page->HospShareAmount->headerCellClass() ?>"><span id="elh_view_lab_profile_HospShareAmount" class="view_lab_profile_HospShareAmount"><?= $Page->HospShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrSharePer->Visible) { // DrSharePer ?>
        <th class="<?= $Page->DrSharePer->headerCellClass() ?>"><span id="elh_view_lab_profile_DrSharePer" class="view_lab_profile_DrSharePer"><?= $Page->DrSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospSharePer->Visible) { // HospSharePer ?>
        <th class="<?= $Page->HospSharePer->headerCellClass() ?>"><span id="elh_view_lab_profile_HospSharePer" class="view_lab_profile_HospSharePer"><?= $Page->HospSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_view_lab_profile_HospID" class="view_lab_profile_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <th class="<?= $Page->TestSubCd->headerCellClass() ?>"><span id="elh_view_lab_profile_TestSubCd" class="view_lab_profile_TestSubCd"><?= $Page->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th class="<?= $Page->Method->headerCellClass() ?>"><span id="elh_view_lab_profile_Method" class="view_lab_profile_Method"><?= $Page->Method->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th class="<?= $Page->Order->headerCellClass() ?>"><span id="elh_view_lab_profile_Order" class="view_lab_profile_Order"><?= $Page->Order->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <th class="<?= $Page->ResType->headerCellClass() ?>"><span id="elh_view_lab_profile_ResType" class="view_lab_profile_ResType"><?= $Page->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <th class="<?= $Page->UnitCD->headerCellClass() ?>"><span id="elh_view_lab_profile_UnitCD" class="view_lab_profile_UnitCD"><?= $Page->UnitCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <th class="<?= $Page->Sample->headerCellClass() ?>"><span id="elh_view_lab_profile_Sample" class="view_lab_profile_Sample"><?= $Page->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <th class="<?= $Page->NoD->headerCellClass() ?>"><span id="elh_view_lab_profile_NoD" class="view_lab_profile_NoD"><?= $Page->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <th class="<?= $Page->BillOrder->headerCellClass() ?>"><span id="elh_view_lab_profile_BillOrder" class="view_lab_profile_BillOrder"><?= $Page->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <th class="<?= $Page->Inactive->headerCellClass() ?>"><span id="elh_view_lab_profile_Inactive" class="view_lab_profile_Inactive"><?= $Page->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
        <th class="<?= $Page->Outsource->headerCellClass() ?>"><span id="elh_view_lab_profile_Outsource" class="view_lab_profile_Outsource"><?= $Page->Outsource->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <th class="<?= $Page->CollSample->headerCellClass() ?>"><span id="elh_view_lab_profile_CollSample" class="view_lab_profile_CollSample"><?= $Page->CollSample->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <th class="<?= $Page->TestType->headerCellClass() ?>"><span id="elh_view_lab_profile_TestType" class="view_lab_profile_TestType"><?= $Page->TestType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
        <th class="<?= $Page->NoHeading->headerCellClass() ?>"><span id="elh_view_lab_profile_NoHeading" class="view_lab_profile_NoHeading"><?= $Page->NoHeading->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChemicalCode->Visible) { // ChemicalCode ?>
        <th class="<?= $Page->ChemicalCode->headerCellClass() ?>"><span id="elh_view_lab_profile_ChemicalCode" class="view_lab_profile_ChemicalCode"><?= $Page->ChemicalCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChemicalName->Visible) { // ChemicalName ?>
        <th class="<?= $Page->ChemicalName->headerCellClass() ?>"><span id="elh_view_lab_profile_ChemicalName" class="view_lab_profile_ChemicalName"><?= $Page->ChemicalName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Utilaization->Visible) { // Utilaization ?>
        <th class="<?= $Page->Utilaization->headerCellClass() ?>"><span id="elh_view_lab_profile_Utilaization" class="view_lab_profile_Utilaization"><?= $Page->Utilaization->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_view_lab_profile_Id" class="view_lab_profile_Id">
<span<?= $Page->Id->viewAttributes() ?>>
<?= $Page->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <td <?= $Page->CODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_CODE" class="view_lab_profile_CODE">
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <td <?= $Page->SERVICE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_SERVICE" class="view_lab_profile_SERVICE">
<span<?= $Page->SERVICE->viewAttributes() ?>>
<?= $Page->SERVICE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UNITS->Visible) { // UNITS ?>
        <td <?= $Page->UNITS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_UNITS" class="view_lab_profile_UNITS">
<span<?= $Page->UNITS->viewAttributes() ?>>
<?= $Page->UNITS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AMOUNT->Visible) { // AMOUNT ?>
        <td <?= $Page->AMOUNT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_AMOUNT" class="view_lab_profile_AMOUNT">
<span<?= $Page->AMOUNT->viewAttributes() ?>>
<?= $Page->AMOUNT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <td <?= $Page->SERVICE_TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_SERVICE_TYPE" class="view_lab_profile_SERVICE_TYPE">
<span<?= $Page->SERVICE_TYPE->viewAttributes() ?>>
<?= $Page->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td <?= $Page->DEPARTMENT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_DEPARTMENT" class="view_lab_profile_DEPARTMENT">
<span<?= $Page->DEPARTMENT->viewAttributes() ?>>
<?= $Page->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
        <td <?= $Page->mas_services_billingcol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_mas_services_billingcol" class="view_lab_profile_mas_services_billingcol">
<span<?= $Page->mas_services_billingcol->viewAttributes() ?>>
<?= $Page->mas_services_billingcol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <td <?= $Page->DrShareAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_DrShareAmount" class="view_lab_profile_DrShareAmount">
<span<?= $Page->DrShareAmount->viewAttributes() ?>>
<?= $Page->DrShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <td <?= $Page->HospShareAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_HospShareAmount" class="view_lab_profile_HospShareAmount">
<span<?= $Page->HospShareAmount->viewAttributes() ?>>
<?= $Page->HospShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrSharePer->Visible) { // DrSharePer ?>
        <td <?= $Page->DrSharePer->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_DrSharePer" class="view_lab_profile_DrSharePer">
<span<?= $Page->DrSharePer->viewAttributes() ?>>
<?= $Page->DrSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospSharePer->Visible) { // HospSharePer ?>
        <td <?= $Page->HospSharePer->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_HospSharePer" class="view_lab_profile_HospSharePer">
<span<?= $Page->HospSharePer->viewAttributes() ?>>
<?= $Page->HospSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_HospID" class="view_lab_profile_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_TestSubCd" class="view_lab_profile_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <td <?= $Page->Method->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_Method" class="view_lab_profile_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <td <?= $Page->Order->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_Order" class="view_lab_profile_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <td <?= $Page->ResType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_ResType" class="view_lab_profile_ResType">
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <td <?= $Page->UnitCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_UnitCD" class="view_lab_profile_UnitCD">
<span<?= $Page->UnitCD->viewAttributes() ?>>
<?= $Page->UnitCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <td <?= $Page->Sample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_Sample" class="view_lab_profile_Sample">
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <td <?= $Page->NoD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_NoD" class="view_lab_profile_NoD">
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <td <?= $Page->BillOrder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_BillOrder" class="view_lab_profile_BillOrder">
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <td <?= $Page->Inactive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_Inactive" class="view_lab_profile_Inactive">
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
        <td <?= $Page->Outsource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_Outsource" class="view_lab_profile_Outsource">
<span<?= $Page->Outsource->viewAttributes() ?>>
<?= $Page->Outsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <td <?= $Page->CollSample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_CollSample" class="view_lab_profile_CollSample">
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <td <?= $Page->TestType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_TestType" class="view_lab_profile_TestType">
<span<?= $Page->TestType->viewAttributes() ?>>
<?= $Page->TestType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
        <td <?= $Page->NoHeading->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_NoHeading" class="view_lab_profile_NoHeading">
<span<?= $Page->NoHeading->viewAttributes() ?>>
<?= $Page->NoHeading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChemicalCode->Visible) { // ChemicalCode ?>
        <td <?= $Page->ChemicalCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_ChemicalCode" class="view_lab_profile_ChemicalCode">
<span<?= $Page->ChemicalCode->viewAttributes() ?>>
<?= $Page->ChemicalCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChemicalName->Visible) { // ChemicalName ?>
        <td <?= $Page->ChemicalName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_ChemicalName" class="view_lab_profile_ChemicalName">
<span<?= $Page->ChemicalName->viewAttributes() ?>>
<?= $Page->ChemicalName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Utilaization->Visible) { // Utilaization ?>
        <td <?= $Page->Utilaization->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_profile_Utilaization" class="view_lab_profile_Utilaization">
<span<?= $Page->Utilaization->viewAttributes() ?>>
<?= $Page->Utilaization->getViewValue() ?></span>
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
