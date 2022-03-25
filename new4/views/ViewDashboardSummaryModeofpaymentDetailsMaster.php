<?php

namespace PHPMaker2021\HIMS;

// Table
$view_dashboard_summary_modeofpayment_details = Container("view_dashboard_summary_modeofpayment_details");
?>
<?php if ($view_dashboard_summary_modeofpayment_details->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_dashboard_summary_modeofpayment_detailsmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($view_dashboard_summary_modeofpayment_details->_UserName->Visible) { // UserName ?>
        <tr id="r__UserName">
            <td class="<?= $view_dashboard_summary_modeofpayment_details->TableLeftColumnClass ?>"><?= $view_dashboard_summary_modeofpayment_details->_UserName->caption() ?></td>
            <td <?= $view_dashboard_summary_modeofpayment_details->_UserName->cellAttributes() ?>>
<span id="el_view_dashboard_summary_modeofpayment_details__UserName">
<span<?= $view_dashboard_summary_modeofpayment_details->_UserName->viewAttributes() ?>>
<?= $view_dashboard_summary_modeofpayment_details->_UserName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->ModeofPayment->Visible) { // ModeofPayment ?>
        <tr id="r_ModeofPayment">
            <td class="<?= $view_dashboard_summary_modeofpayment_details->TableLeftColumnClass ?>"><?= $view_dashboard_summary_modeofpayment_details->ModeofPayment->caption() ?></td>
            <td <?= $view_dashboard_summary_modeofpayment_details->ModeofPayment->cellAttributes() ?>>
<span id="el_view_dashboard_summary_modeofpayment_details_ModeofPayment">
<span<?= $view_dashboard_summary_modeofpayment_details->ModeofPayment->viewAttributes() ?>>
<?= $view_dashboard_summary_modeofpayment_details->ModeofPayment->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->sumAmount->Visible) { // sum(Amount) ?>
        <tr id="r_sumAmount">
            <td class="<?= $view_dashboard_summary_modeofpayment_details->TableLeftColumnClass ?>"><?= $view_dashboard_summary_modeofpayment_details->sumAmount->caption() ?></td>
            <td <?= $view_dashboard_summary_modeofpayment_details->sumAmount->cellAttributes() ?>>
<span id="el_view_dashboard_summary_modeofpayment_details_sumAmount">
<span<?= $view_dashboard_summary_modeofpayment_details->sumAmount->viewAttributes() ?>>
<?= $view_dashboard_summary_modeofpayment_details->sumAmount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->createddate->Visible) { // createddate ?>
        <tr id="r_createddate">
            <td class="<?= $view_dashboard_summary_modeofpayment_details->TableLeftColumnClass ?>"><?= $view_dashboard_summary_modeofpayment_details->createddate->caption() ?></td>
            <td <?= $view_dashboard_summary_modeofpayment_details->createddate->cellAttributes() ?>>
<span id="el_view_dashboard_summary_modeofpayment_details_createddate">
<span<?= $view_dashboard_summary_modeofpayment_details->createddate->viewAttributes() ?>>
<?= $view_dashboard_summary_modeofpayment_details->createddate->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $view_dashboard_summary_modeofpayment_details->TableLeftColumnClass ?>"><?= $view_dashboard_summary_modeofpayment_details->HospID->caption() ?></td>
            <td <?= $view_dashboard_summary_modeofpayment_details->HospID->cellAttributes() ?>>
<span id="el_view_dashboard_summary_modeofpayment_details_HospID">
<span<?= $view_dashboard_summary_modeofpayment_details->HospID->viewAttributes() ?>>
<?= $view_dashboard_summary_modeofpayment_details->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->BillType->Visible) { // BillType ?>
        <tr id="r_BillType">
            <td class="<?= $view_dashboard_summary_modeofpayment_details->TableLeftColumnClass ?>"><?= $view_dashboard_summary_modeofpayment_details->BillType->caption() ?></td>
            <td <?= $view_dashboard_summary_modeofpayment_details->BillType->cellAttributes() ?>>
<span id="el_view_dashboard_summary_modeofpayment_details_BillType">
<span<?= $view_dashboard_summary_modeofpayment_details->BillType->viewAttributes() ?>>
<?= $view_dashboard_summary_modeofpayment_details->BillType->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
