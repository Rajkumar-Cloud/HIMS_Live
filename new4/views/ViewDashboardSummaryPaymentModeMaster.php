<?php

namespace PHPMaker2021\HIMS;

// Table
$view_dashboard_summary_payment_mode = Container("view_dashboard_summary_payment_mode");
?>
<?php if ($view_dashboard_summary_payment_mode->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_dashboard_summary_payment_modemaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($view_dashboard_summary_payment_mode->createddate->Visible) { // createddate ?>
        <tr id="r_createddate">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->createddate->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->createddate->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_createddate">
<span<?= $view_dashboard_summary_payment_mode->createddate->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->createddate->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->_UserName->Visible) { // UserName ?>
        <tr id="r__UserName">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->_UserName->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->_UserName->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode__UserName">
<span<?= $view_dashboard_summary_payment_mode->_UserName->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->_UserName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->CARD->Visible) { // CARD ?>
        <tr id="r_CARD">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->CARD->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->CARD->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_CARD">
<span<?= $view_dashboard_summary_payment_mode->CARD->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->CARD->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->CASH->Visible) { // CASH ?>
        <tr id="r_CASH">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->CASH->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->CASH->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_CASH">
<span<?= $view_dashboard_summary_payment_mode->CASH->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->CASH->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->NEFT->Visible) { // NEFT ?>
        <tr id="r_NEFT">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->NEFT->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->NEFT->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_NEFT">
<span<?= $view_dashboard_summary_payment_mode->NEFT->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->NEFT->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->PAYTM->Visible) { // PAYTM ?>
        <tr id="r_PAYTM">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->PAYTM->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->PAYTM->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_PAYTM">
<span<?= $view_dashboard_summary_payment_mode->PAYTM->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->PAYTM->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->CHEQUE->Visible) { // CHEQUE ?>
        <tr id="r_CHEQUE">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->CHEQUE->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->CHEQUE->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_CHEQUE">
<span<?= $view_dashboard_summary_payment_mode->CHEQUE->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->CHEQUE->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->RTGS->Visible) { // RTGS ?>
        <tr id="r_RTGS">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->RTGS->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->RTGS->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_RTGS">
<span<?= $view_dashboard_summary_payment_mode->RTGS->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->RTGS->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->NotSelected->Visible) { // NotSelected ?>
        <tr id="r_NotSelected">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->NotSelected->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->NotSelected->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_NotSelected">
<span<?= $view_dashboard_summary_payment_mode->NotSelected->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->NotSelected->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->Total->Visible) { // Total ?>
        <tr id="r_Total">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->Total->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->Total->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_Total">
<span<?= $view_dashboard_summary_payment_mode->Total->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->Total->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->REFUND->Visible) { // REFUND ?>
        <tr id="r_REFUND">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->REFUND->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->REFUND->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_REFUND">
<span<?= $view_dashboard_summary_payment_mode->REFUND->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->REFUND->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->CANCEL->Visible) { // CANCEL ?>
        <tr id="r_CANCEL">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->CANCEL->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->CANCEL->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_CANCEL">
<span<?= $view_dashboard_summary_payment_mode->CANCEL->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->CANCEL->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->HospID->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->HospID->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_HospID">
<span<?= $view_dashboard_summary_payment_mode->HospID->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->BillType->Visible) { // BillType ?>
        <tr id="r_BillType">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->BillType->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->BillType->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_BillType">
<span<?= $view_dashboard_summary_payment_mode->BillType->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->BillType->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->AdjAdvance->Visible) { // AdjAdvance ?>
        <tr id="r_AdjAdvance">
            <td class="<?= $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?= $view_dashboard_summary_payment_mode->AdjAdvance->caption() ?></td>
            <td <?= $view_dashboard_summary_payment_mode->AdjAdvance->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_AdjAdvance">
<span<?= $view_dashboard_summary_payment_mode->AdjAdvance->viewAttributes() ?>>
<?= $view_dashboard_summary_payment_mode->AdjAdvance->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
