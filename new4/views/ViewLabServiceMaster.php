<?php

namespace PHPMaker2021\HIMS;

// Table
$view_lab_service = Container("view_lab_service");
?>
<?php if ($view_lab_service->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_lab_servicemaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($view_lab_service->Id->Visible) { // Id ?>
        <tr id="r_Id">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->Id->caption() ?></td>
            <td <?= $view_lab_service->Id->cellAttributes() ?>>
<span id="el_view_lab_service_Id">
<span<?= $view_lab_service->Id->viewAttributes() ?>>
<?= $view_lab_service->Id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->CODE->Visible) { // CODE ?>
        <tr id="r_CODE">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->CODE->caption() ?></td>
            <td <?= $view_lab_service->CODE->cellAttributes() ?>>
<span id="el_view_lab_service_CODE">
<span<?= $view_lab_service->CODE->viewAttributes() ?>>
<?= $view_lab_service->CODE->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->SERVICE->Visible) { // SERVICE ?>
        <tr id="r_SERVICE">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->SERVICE->caption() ?></td>
            <td <?= $view_lab_service->SERVICE->cellAttributes() ?>>
<span id="el_view_lab_service_SERVICE">
<span<?= $view_lab_service->SERVICE->viewAttributes() ?>>
<?= $view_lab_service->SERVICE->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->UNITS->Visible) { // UNITS ?>
        <tr id="r_UNITS">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->UNITS->caption() ?></td>
            <td <?= $view_lab_service->UNITS->cellAttributes() ?>>
<span id="el_view_lab_service_UNITS">
<span<?= $view_lab_service->UNITS->viewAttributes() ?>>
<?= $view_lab_service->UNITS->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->AMOUNT->Visible) { // AMOUNT ?>
        <tr id="r_AMOUNT">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->AMOUNT->caption() ?></td>
            <td <?= $view_lab_service->AMOUNT->cellAttributes() ?>>
<span id="el_view_lab_service_AMOUNT">
<span<?= $view_lab_service->AMOUNT->viewAttributes() ?>>
<?= $view_lab_service->AMOUNT->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <tr id="r_SERVICE_TYPE">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->SERVICE_TYPE->caption() ?></td>
            <td <?= $view_lab_service->SERVICE_TYPE->cellAttributes() ?>>
<span id="el_view_lab_service_SERVICE_TYPE">
<span<?= $view_lab_service->SERVICE_TYPE->viewAttributes() ?>>
<?= $view_lab_service->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <tr id="r_DEPARTMENT">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->DEPARTMENT->caption() ?></td>
            <td <?= $view_lab_service->DEPARTMENT->cellAttributes() ?>>
<span id="el_view_lab_service_DEPARTMENT">
<span<?= $view_lab_service->DEPARTMENT->viewAttributes() ?>>
<?= $view_lab_service->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
        <tr id="r_mas_services_billingcol">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->mas_services_billingcol->caption() ?></td>
            <td <?= $view_lab_service->mas_services_billingcol->cellAttributes() ?>>
<span id="el_view_lab_service_mas_services_billingcol">
<span<?= $view_lab_service->mas_services_billingcol->viewAttributes() ?>>
<?= $view_lab_service->mas_services_billingcol->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->DrShareAmount->Visible) { // DrShareAmount ?>
        <tr id="r_DrShareAmount">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->DrShareAmount->caption() ?></td>
            <td <?= $view_lab_service->DrShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_DrShareAmount">
<span<?= $view_lab_service->DrShareAmount->viewAttributes() ?>>
<?= $view_lab_service->DrShareAmount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->HospShareAmount->Visible) { // HospShareAmount ?>
        <tr id="r_HospShareAmount">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->HospShareAmount->caption() ?></td>
            <td <?= $view_lab_service->HospShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_HospShareAmount">
<span<?= $view_lab_service->HospShareAmount->viewAttributes() ?>>
<?= $view_lab_service->HospShareAmount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->DrSharePer->Visible) { // DrSharePer ?>
        <tr id="r_DrSharePer">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->DrSharePer->caption() ?></td>
            <td <?= $view_lab_service->DrSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_DrSharePer">
<span<?= $view_lab_service->DrSharePer->viewAttributes() ?>>
<?= $view_lab_service->DrSharePer->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->HospSharePer->Visible) { // HospSharePer ?>
        <tr id="r_HospSharePer">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->HospSharePer->caption() ?></td>
            <td <?= $view_lab_service->HospSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_HospSharePer">
<span<?= $view_lab_service->HospSharePer->viewAttributes() ?>>
<?= $view_lab_service->HospSharePer->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->HospID->caption() ?></td>
            <td <?= $view_lab_service->HospID->cellAttributes() ?>>
<span id="el_view_lab_service_HospID">
<span<?= $view_lab_service->HospID->viewAttributes() ?>>
<?= $view_lab_service->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->TestSubCd->Visible) { // TestSubCd ?>
        <tr id="r_TestSubCd">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->TestSubCd->caption() ?></td>
            <td <?= $view_lab_service->TestSubCd->cellAttributes() ?>>
<span id="el_view_lab_service_TestSubCd">
<span<?= $view_lab_service->TestSubCd->viewAttributes() ?>>
<?= $view_lab_service->TestSubCd->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->Method->Visible) { // Method ?>
        <tr id="r_Method">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->Method->caption() ?></td>
            <td <?= $view_lab_service->Method->cellAttributes() ?>>
<span id="el_view_lab_service_Method">
<span<?= $view_lab_service->Method->viewAttributes() ?>>
<?= $view_lab_service->Method->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->Order->Visible) { // Order ?>
        <tr id="r_Order">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->Order->caption() ?></td>
            <td <?= $view_lab_service->Order->cellAttributes() ?>>
<span id="el_view_lab_service_Order">
<span<?= $view_lab_service->Order->viewAttributes() ?>>
<?= $view_lab_service->Order->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->ResType->Visible) { // ResType ?>
        <tr id="r_ResType">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->ResType->caption() ?></td>
            <td <?= $view_lab_service->ResType->cellAttributes() ?>>
<span id="el_view_lab_service_ResType">
<span<?= $view_lab_service->ResType->viewAttributes() ?>>
<?= $view_lab_service->ResType->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->UnitCD->Visible) { // UnitCD ?>
        <tr id="r_UnitCD">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->UnitCD->caption() ?></td>
            <td <?= $view_lab_service->UnitCD->cellAttributes() ?>>
<span id="el_view_lab_service_UnitCD">
<span<?= $view_lab_service->UnitCD->viewAttributes() ?>>
<?= $view_lab_service->UnitCD->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->Sample->Visible) { // Sample ?>
        <tr id="r_Sample">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->Sample->caption() ?></td>
            <td <?= $view_lab_service->Sample->cellAttributes() ?>>
<span id="el_view_lab_service_Sample">
<span<?= $view_lab_service->Sample->viewAttributes() ?>>
<?= $view_lab_service->Sample->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->NoD->Visible) { // NoD ?>
        <tr id="r_NoD">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->NoD->caption() ?></td>
            <td <?= $view_lab_service->NoD->cellAttributes() ?>>
<span id="el_view_lab_service_NoD">
<span<?= $view_lab_service->NoD->viewAttributes() ?>>
<?= $view_lab_service->NoD->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->BillOrder->Visible) { // BillOrder ?>
        <tr id="r_BillOrder">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->BillOrder->caption() ?></td>
            <td <?= $view_lab_service->BillOrder->cellAttributes() ?>>
<span id="el_view_lab_service_BillOrder">
<span<?= $view_lab_service->BillOrder->viewAttributes() ?>>
<?= $view_lab_service->BillOrder->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->Inactive->Visible) { // Inactive ?>
        <tr id="r_Inactive">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->Inactive->caption() ?></td>
            <td <?= $view_lab_service->Inactive->cellAttributes() ?>>
<span id="el_view_lab_service_Inactive">
<span<?= $view_lab_service->Inactive->viewAttributes() ?>>
<?= $view_lab_service->Inactive->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->Outsource->Visible) { // Outsource ?>
        <tr id="r_Outsource">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->Outsource->caption() ?></td>
            <td <?= $view_lab_service->Outsource->cellAttributes() ?>>
<span id="el_view_lab_service_Outsource">
<span<?= $view_lab_service->Outsource->viewAttributes() ?>>
<?= $view_lab_service->Outsource->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->CollSample->Visible) { // CollSample ?>
        <tr id="r_CollSample">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->CollSample->caption() ?></td>
            <td <?= $view_lab_service->CollSample->cellAttributes() ?>>
<span id="el_view_lab_service_CollSample">
<span<?= $view_lab_service->CollSample->viewAttributes() ?>>
<?= $view_lab_service->CollSample->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->TestType->Visible) { // TestType ?>
        <tr id="r_TestType">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->TestType->caption() ?></td>
            <td <?= $view_lab_service->TestType->cellAttributes() ?>>
<span id="el_view_lab_service_TestType">
<span<?= $view_lab_service->TestType->viewAttributes() ?>>
<?= $view_lab_service->TestType->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->NoHeading->Visible) { // NoHeading ?>
        <tr id="r_NoHeading">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->NoHeading->caption() ?></td>
            <td <?= $view_lab_service->NoHeading->cellAttributes() ?>>
<span id="el_view_lab_service_NoHeading">
<span<?= $view_lab_service->NoHeading->viewAttributes() ?>>
<?= $view_lab_service->NoHeading->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->ChemicalCode->Visible) { // ChemicalCode ?>
        <tr id="r_ChemicalCode">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->ChemicalCode->caption() ?></td>
            <td <?= $view_lab_service->ChemicalCode->cellAttributes() ?>>
<span id="el_view_lab_service_ChemicalCode">
<span<?= $view_lab_service->ChemicalCode->viewAttributes() ?>>
<?= $view_lab_service->ChemicalCode->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->ChemicalName->Visible) { // ChemicalName ?>
        <tr id="r_ChemicalName">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->ChemicalName->caption() ?></td>
            <td <?= $view_lab_service->ChemicalName->cellAttributes() ?>>
<span id="el_view_lab_service_ChemicalName">
<span<?= $view_lab_service->ChemicalName->viewAttributes() ?>>
<?= $view_lab_service->ChemicalName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_service->Utilaization->Visible) { // Utilaization ?>
        <tr id="r_Utilaization">
            <td class="<?= $view_lab_service->TableLeftColumnClass ?>"><?= $view_lab_service->Utilaization->caption() ?></td>
            <td <?= $view_lab_service->Utilaization->cellAttributes() ?>>
<span id="el_view_lab_service_Utilaization">
<span<?= $view_lab_service->Utilaization->viewAttributes() ?>>
<?= $view_lab_service->Utilaization->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
