<?php

namespace PHPMaker2021\project3;

// Page object
$MasServicesBillingDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_services_billingdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fmas_services_billingdelete = currentForm = new ew.Form("fmas_services_billingdelete", "delete");
    loadjs.done("fmas_services_billingdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fmas_services_billingdelete" id="fmas_services_billingdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_services_billing">
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
        <th class="<?= $Page->Id->headerCellClass() ?>"><span id="elh_mas_services_billing_Id" class="mas_services_billing_Id"><?= $Page->Id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <th class="<?= $Page->CODE->headerCellClass() ?>"><span id="elh_mas_services_billing_CODE" class="mas_services_billing_CODE"><?= $Page->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <th class="<?= $Page->SERVICE->headerCellClass() ?>"><span id="elh_mas_services_billing_SERVICE" class="mas_services_billing_SERVICE"><?= $Page->SERVICE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UNITS->Visible) { // UNITS ?>
        <th class="<?= $Page->UNITS->headerCellClass() ?>"><span id="elh_mas_services_billing_UNITS" class="mas_services_billing_UNITS"><?= $Page->UNITS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AMOUNT->Visible) { // AMOUNT ?>
        <th class="<?= $Page->AMOUNT->headerCellClass() ?>"><span id="elh_mas_services_billing_AMOUNT" class="mas_services_billing_AMOUNT"><?= $Page->AMOUNT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <th class="<?= $Page->SERVICE_TYPE->headerCellClass() ?>"><span id="elh_mas_services_billing_SERVICE_TYPE" class="mas_services_billing_SERVICE_TYPE"><?= $Page->SERVICE_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <th class="<?= $Page->DEPARTMENT->headerCellClass() ?>"><span id="elh_mas_services_billing_DEPARTMENT" class="mas_services_billing_DEPARTMENT"><?= $Page->DEPARTMENT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Created->Visible) { // Created ?>
        <th class="<?= $Page->Created->headerCellClass() ?>"><span id="elh_mas_services_billing_Created" class="mas_services_billing_Created"><?= $Page->Created->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><span id="elh_mas_services_billing_CreatedDateTime" class="mas_services_billing_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Modified->Visible) { // Modified ?>
        <th class="<?= $Page->Modified->headerCellClass() ?>"><span id="elh_mas_services_billing_Modified" class="mas_services_billing_Modified"><?= $Page->Modified->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><span id="elh_mas_services_billing_ModifiedDateTime" class="mas_services_billing_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
        <th class="<?= $Page->mas_services_billingcol->headerCellClass() ?>"><span id="elh_mas_services_billing_mas_services_billingcol" class="mas_services_billing_mas_services_billingcol"><?= $Page->mas_services_billingcol->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <th class="<?= $Page->DrShareAmount->headerCellClass() ?>"><span id="elh_mas_services_billing_DrShareAmount" class="mas_services_billing_DrShareAmount"><?= $Page->DrShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <th class="<?= $Page->HospShareAmount->headerCellClass() ?>"><span id="elh_mas_services_billing_HospShareAmount" class="mas_services_billing_HospShareAmount"><?= $Page->HospShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrSharePer->Visible) { // DrSharePer ?>
        <th class="<?= $Page->DrSharePer->headerCellClass() ?>"><span id="elh_mas_services_billing_DrSharePer" class="mas_services_billing_DrSharePer"><?= $Page->DrSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospSharePer->Visible) { // HospSharePer ?>
        <th class="<?= $Page->HospSharePer->headerCellClass() ?>"><span id="elh_mas_services_billing_HospSharePer" class="mas_services_billing_HospSharePer"><?= $Page->HospSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_mas_services_billing_HospID" class="mas_services_billing_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <th class="<?= $Page->TestSubCd->headerCellClass() ?>"><span id="elh_mas_services_billing_TestSubCd" class="mas_services_billing_TestSubCd"><?= $Page->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th class="<?= $Page->Method->headerCellClass() ?>"><span id="elh_mas_services_billing_Method" class="mas_services_billing_Method"><?= $Page->Method->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th class="<?= $Page->Order->headerCellClass() ?>"><span id="elh_mas_services_billing_Order" class="mas_services_billing_Order"><?= $Page->Order->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <th class="<?= $Page->ResType->headerCellClass() ?>"><span id="elh_mas_services_billing_ResType" class="mas_services_billing_ResType"><?= $Page->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <th class="<?= $Page->UnitCD->headerCellClass() ?>"><span id="elh_mas_services_billing_UnitCD" class="mas_services_billing_UnitCD"><?= $Page->UnitCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <th class="<?= $Page->Sample->headerCellClass() ?>"><span id="elh_mas_services_billing_Sample" class="mas_services_billing_Sample"><?= $Page->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <th class="<?= $Page->NoD->headerCellClass() ?>"><span id="elh_mas_services_billing_NoD" class="mas_services_billing_NoD"><?= $Page->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <th class="<?= $Page->BillOrder->headerCellClass() ?>"><span id="elh_mas_services_billing_BillOrder" class="mas_services_billing_BillOrder"><?= $Page->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <th class="<?= $Page->Inactive->headerCellClass() ?>"><span id="elh_mas_services_billing_Inactive" class="mas_services_billing_Inactive"><?= $Page->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
        <th class="<?= $Page->Outsource->headerCellClass() ?>"><span id="elh_mas_services_billing_Outsource" class="mas_services_billing_Outsource"><?= $Page->Outsource->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <th class="<?= $Page->CollSample->headerCellClass() ?>"><span id="elh_mas_services_billing_CollSample" class="mas_services_billing_CollSample"><?= $Page->CollSample->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <th class="<?= $Page->TestType->headerCellClass() ?>"><span id="elh_mas_services_billing_TestType" class="mas_services_billing_TestType"><?= $Page->TestType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
        <th class="<?= $Page->NoHeading->headerCellClass() ?>"><span id="elh_mas_services_billing_NoHeading" class="mas_services_billing_NoHeading"><?= $Page->NoHeading->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChemicalCode->Visible) { // ChemicalCode ?>
        <th class="<?= $Page->ChemicalCode->headerCellClass() ?>"><span id="elh_mas_services_billing_ChemicalCode" class="mas_services_billing_ChemicalCode"><?= $Page->ChemicalCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChemicalName->Visible) { // ChemicalName ?>
        <th class="<?= $Page->ChemicalName->headerCellClass() ?>"><span id="elh_mas_services_billing_ChemicalName" class="mas_services_billing_ChemicalName"><?= $Page->ChemicalName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Utilaization->Visible) { // Utilaization ?>
        <th class="<?= $Page->Utilaization->headerCellClass() ?>"><span id="elh_mas_services_billing_Utilaization" class="mas_services_billing_Utilaization"><?= $Page->Utilaization->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Id" class="mas_services_billing_Id">
<span<?= $Page->Id->viewAttributes() ?>>
<?= $Page->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <td <?= $Page->CODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_CODE" class="mas_services_billing_CODE">
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <td <?= $Page->SERVICE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_SERVICE" class="mas_services_billing_SERVICE">
<span<?= $Page->SERVICE->viewAttributes() ?>>
<?= $Page->SERVICE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UNITS->Visible) { // UNITS ?>
        <td <?= $Page->UNITS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_UNITS" class="mas_services_billing_UNITS">
<span<?= $Page->UNITS->viewAttributes() ?>>
<?= $Page->UNITS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AMOUNT->Visible) { // AMOUNT ?>
        <td <?= $Page->AMOUNT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_AMOUNT" class="mas_services_billing_AMOUNT">
<span<?= $Page->AMOUNT->viewAttributes() ?>>
<?= $Page->AMOUNT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <td <?= $Page->SERVICE_TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_SERVICE_TYPE" class="mas_services_billing_SERVICE_TYPE">
<span<?= $Page->SERVICE_TYPE->viewAttributes() ?>>
<?= $Page->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td <?= $Page->DEPARTMENT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DEPARTMENT" class="mas_services_billing_DEPARTMENT">
<span<?= $Page->DEPARTMENT->viewAttributes() ?>>
<?= $Page->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Created->Visible) { // Created ?>
        <td <?= $Page->Created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Created" class="mas_services_billing_Created">
<span<?= $Page->Created->viewAttributes() ?>>
<?= $Page->Created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_CreatedDateTime" class="mas_services_billing_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Modified->Visible) { // Modified ?>
        <td <?= $Page->Modified->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Modified" class="mas_services_billing_Modified">
<span<?= $Page->Modified->viewAttributes() ?>>
<?= $Page->Modified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ModifiedDateTime" class="mas_services_billing_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
        <td <?= $Page->mas_services_billingcol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_mas_services_billingcol" class="mas_services_billing_mas_services_billingcol">
<span<?= $Page->mas_services_billingcol->viewAttributes() ?>>
<?= $Page->mas_services_billingcol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <td <?= $Page->DrShareAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DrShareAmount" class="mas_services_billing_DrShareAmount">
<span<?= $Page->DrShareAmount->viewAttributes() ?>>
<?= $Page->DrShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <td <?= $Page->HospShareAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_HospShareAmount" class="mas_services_billing_HospShareAmount">
<span<?= $Page->HospShareAmount->viewAttributes() ?>>
<?= $Page->HospShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrSharePer->Visible) { // DrSharePer ?>
        <td <?= $Page->DrSharePer->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DrSharePer" class="mas_services_billing_DrSharePer">
<span<?= $Page->DrSharePer->viewAttributes() ?>>
<?= $Page->DrSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospSharePer->Visible) { // HospSharePer ?>
        <td <?= $Page->HospSharePer->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_HospSharePer" class="mas_services_billing_HospSharePer">
<span<?= $Page->HospSharePer->viewAttributes() ?>>
<?= $Page->HospSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_HospID" class="mas_services_billing_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_TestSubCd" class="mas_services_billing_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <td <?= $Page->Method->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Method" class="mas_services_billing_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <td <?= $Page->Order->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Order" class="mas_services_billing_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <td <?= $Page->ResType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ResType" class="mas_services_billing_ResType">
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <td <?= $Page->UnitCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_UnitCD" class="mas_services_billing_UnitCD">
<span<?= $Page->UnitCD->viewAttributes() ?>>
<?= $Page->UnitCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <td <?= $Page->Sample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Sample" class="mas_services_billing_Sample">
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <td <?= $Page->NoD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_NoD" class="mas_services_billing_NoD">
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <td <?= $Page->BillOrder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_BillOrder" class="mas_services_billing_BillOrder">
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <td <?= $Page->Inactive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Inactive" class="mas_services_billing_Inactive">
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
        <td <?= $Page->Outsource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Outsource" class="mas_services_billing_Outsource">
<span<?= $Page->Outsource->viewAttributes() ?>>
<?= $Page->Outsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <td <?= $Page->CollSample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_CollSample" class="mas_services_billing_CollSample">
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <td <?= $Page->TestType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_TestType" class="mas_services_billing_TestType">
<span<?= $Page->TestType->viewAttributes() ?>>
<?= $Page->TestType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
        <td <?= $Page->NoHeading->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_NoHeading" class="mas_services_billing_NoHeading">
<span<?= $Page->NoHeading->viewAttributes() ?>>
<?= $Page->NoHeading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChemicalCode->Visible) { // ChemicalCode ?>
        <td <?= $Page->ChemicalCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ChemicalCode" class="mas_services_billing_ChemicalCode">
<span<?= $Page->ChemicalCode->viewAttributes() ?>>
<?= $Page->ChemicalCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChemicalName->Visible) { // ChemicalName ?>
        <td <?= $Page->ChemicalName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ChemicalName" class="mas_services_billing_ChemicalName">
<span<?= $Page->ChemicalName->viewAttributes() ?>>
<?= $Page->ChemicalName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Utilaization->Visible) { // Utilaization ?>
        <td <?= $Page->Utilaization->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Utilaization" class="mas_services_billing_Utilaization">
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
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
