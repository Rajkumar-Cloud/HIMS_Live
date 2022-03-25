<?php

namespace PHPMaker2021\HIMS;

// Table
$view_dashboard_service_servicetype = Container("view_dashboard_service_servicetype");
?>
<?php if ($view_dashboard_service_servicetype->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_dashboard_service_servicetypemaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($view_dashboard_service_servicetype->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <tr id="r_DEPARTMENT">
            <td class="<?= $view_dashboard_service_servicetype->TableLeftColumnClass ?>"><?= $view_dashboard_service_servicetype->DEPARTMENT->caption() ?></td>
            <td <?= $view_dashboard_service_servicetype->DEPARTMENT->cellAttributes() ?>>
<span id="el_view_dashboard_service_servicetype_DEPARTMENT">
<span<?= $view_dashboard_service_servicetype->DEPARTMENT->viewAttributes() ?>>
<?= $view_dashboard_service_servicetype->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <tr id="r_SERVICE_TYPE">
            <td class="<?= $view_dashboard_service_servicetype->TableLeftColumnClass ?>"><?= $view_dashboard_service_servicetype->SERVICE_TYPE->caption() ?></td>
            <td <?= $view_dashboard_service_servicetype->SERVICE_TYPE->cellAttributes() ?>>
<span id="el_view_dashboard_service_servicetype_SERVICE_TYPE">
<span<?= $view_dashboard_service_servicetype->SERVICE_TYPE->viewAttributes() ?>>
<?= $view_dashboard_service_servicetype->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->sumSubTotal->Visible) { // sum(SubTotal) ?>
        <tr id="r_sumSubTotal">
            <td class="<?= $view_dashboard_service_servicetype->TableLeftColumnClass ?>"><?= $view_dashboard_service_servicetype->sumSubTotal->caption() ?></td>
            <td <?= $view_dashboard_service_servicetype->sumSubTotal->cellAttributes() ?>>
<span id="el_view_dashboard_service_servicetype_sumSubTotal">
<span<?= $view_dashboard_service_servicetype->sumSubTotal->viewAttributes() ?>>
<?= $view_dashboard_service_servicetype->sumSubTotal->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->createdDate->Visible) { // createdDate ?>
        <tr id="r_createdDate">
            <td class="<?= $view_dashboard_service_servicetype->TableLeftColumnClass ?>"><?= $view_dashboard_service_servicetype->createdDate->caption() ?></td>
            <td <?= $view_dashboard_service_servicetype->createdDate->cellAttributes() ?>>
<span id="el_view_dashboard_service_servicetype_createdDate">
<span<?= $view_dashboard_service_servicetype->createdDate->viewAttributes() ?>>
<?= $view_dashboard_service_servicetype->createdDate->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $view_dashboard_service_servicetype->TableLeftColumnClass ?>"><?= $view_dashboard_service_servicetype->HospID->caption() ?></td>
            <td <?= $view_dashboard_service_servicetype->HospID->cellAttributes() ?>>
<span id="el_view_dashboard_service_servicetype_HospID">
<span<?= $view_dashboard_service_servicetype->HospID->viewAttributes() ?>>
<?= $view_dashboard_service_servicetype->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
