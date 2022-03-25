<?php

namespace PHPMaker2021\HIMS;

// Table
$view_dashboard_service_summary = Container("view_dashboard_service_summary");
?>
<?php if ($view_dashboard_service_summary->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_dashboard_service_summarymaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($view_dashboard_service_summary->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <tr id="r_DEPARTMENT">
            <td class="<?= $view_dashboard_service_summary->TableLeftColumnClass ?>"><?= $view_dashboard_service_summary->DEPARTMENT->caption() ?></td>
            <td <?= $view_dashboard_service_summary->DEPARTMENT->cellAttributes() ?>>
<span id="el_view_dashboard_service_summary_DEPARTMENT">
<span<?= $view_dashboard_service_summary->DEPARTMENT->viewAttributes() ?>>
<?= $view_dashboard_service_summary->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_service_summary->SubTotal->Visible) { // SubTotal ?>
        <tr id="r_SubTotal">
            <td class="<?= $view_dashboard_service_summary->TableLeftColumnClass ?>"><?= $view_dashboard_service_summary->SubTotal->caption() ?></td>
            <td <?= $view_dashboard_service_summary->SubTotal->cellAttributes() ?>>
<span id="el_view_dashboard_service_summary_SubTotal">
<span<?= $view_dashboard_service_summary->SubTotal->viewAttributes() ?>>
<?= $view_dashboard_service_summary->SubTotal->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_service_summary->createdDate->Visible) { // createdDate ?>
        <tr id="r_createdDate">
            <td class="<?= $view_dashboard_service_summary->TableLeftColumnClass ?>"><?= $view_dashboard_service_summary->createdDate->caption() ?></td>
            <td <?= $view_dashboard_service_summary->createdDate->cellAttributes() ?>>
<span id="el_view_dashboard_service_summary_createdDate">
<span<?= $view_dashboard_service_summary->createdDate->viewAttributes() ?>>
<?= $view_dashboard_service_summary->createdDate->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_service_summary->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $view_dashboard_service_summary->TableLeftColumnClass ?>"><?= $view_dashboard_service_summary->HospID->caption() ?></td>
            <td <?= $view_dashboard_service_summary->HospID->cellAttributes() ?>>
<span id="el_view_dashboard_service_summary_HospID">
<span<?= $view_dashboard_service_summary->HospID->viewAttributes() ?>>
<?= $view_dashboard_service_summary->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_service_summary->vid->Visible) { // vid ?>
        <tr id="r_vid">
            <td class="<?= $view_dashboard_service_summary->TableLeftColumnClass ?>"><?= $view_dashboard_service_summary->vid->caption() ?></td>
            <td <?= $view_dashboard_service_summary->vid->cellAttributes() ?>>
<span id="el_view_dashboard_service_summary_vid">
<span<?= $view_dashboard_service_summary->vid->viewAttributes() ?>>
<?= $view_dashboard_service_summary->vid->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_service_summary->ItemCode->Visible) { // ItemCode ?>
        <tr id="r_ItemCode">
            <td class="<?= $view_dashboard_service_summary->TableLeftColumnClass ?>"><?= $view_dashboard_service_summary->ItemCode->caption() ?></td>
            <td <?= $view_dashboard_service_summary->ItemCode->cellAttributes() ?>>
<span id="el_view_dashboard_service_summary_ItemCode">
<span<?= $view_dashboard_service_summary->ItemCode->viewAttributes() ?>>
<?= $view_dashboard_service_summary->ItemCode->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_service_summary->PatientId->Visible) { // PatientId ?>
        <tr id="r_PatientId">
            <td class="<?= $view_dashboard_service_summary->TableLeftColumnClass ?>"><?= $view_dashboard_service_summary->PatientId->caption() ?></td>
            <td <?= $view_dashboard_service_summary->PatientId->cellAttributes() ?>>
<span id="el_view_dashboard_service_summary_PatientId">
<span<?= $view_dashboard_service_summary->PatientId->viewAttributes() ?>>
<?= $view_dashboard_service_summary->PatientId->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
