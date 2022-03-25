<?php

namespace PHPMaker2021\HIMS;

// Table
$view_billing_voucher_print = Container("view_billing_voucher_print");
?>
<?php if ($view_billing_voucher_print->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_billing_voucher_printmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($view_billing_voucher_print->PatientId->Visible) { // PatientId ?>
        <tr id="r_PatientId">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->PatientId->caption() ?></td>
            <td <?= $view_billing_voucher_print->PatientId->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_PatientId">
<span<?= $view_billing_voucher_print->PatientId->viewAttributes() ?>>
<?= $view_billing_voucher_print->PatientId->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->PatientName->Visible) { // PatientName ?>
        <tr id="r_PatientName">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->PatientName->caption() ?></td>
            <td <?= $view_billing_voucher_print->PatientName->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_PatientName">
<span<?= $view_billing_voucher_print->PatientName->viewAttributes() ?>>
<?= $view_billing_voucher_print->PatientName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->Mobile->Visible) { // Mobile ?>
        <tr id="r_Mobile">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->Mobile->caption() ?></td>
            <td <?= $view_billing_voucher_print->Mobile->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_Mobile">
<span<?= $view_billing_voucher_print->Mobile->viewAttributes() ?>>
<?= $view_billing_voucher_print->Mobile->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->Doctor->Visible) { // Doctor ?>
        <tr id="r_Doctor">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->Doctor->caption() ?></td>
            <td <?= $view_billing_voucher_print->Doctor->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_Doctor">
<span<?= $view_billing_voucher_print->Doctor->viewAttributes() ?>>
<?= $view_billing_voucher_print->Doctor->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->ModeofPayment->Visible) { // ModeofPayment ?>
        <tr id="r_ModeofPayment">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->ModeofPayment->caption() ?></td>
            <td <?= $view_billing_voucher_print->ModeofPayment->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_ModeofPayment">
<span<?= $view_billing_voucher_print->ModeofPayment->viewAttributes() ?>>
<?= $view_billing_voucher_print->ModeofPayment->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->Amount->Visible) { // Amount ?>
        <tr id="r_Amount">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->Amount->caption() ?></td>
            <td <?= $view_billing_voucher_print->Amount->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_Amount">
<span<?= $view_billing_voucher_print->Amount->viewAttributes() ?>>
<?= $view_billing_voucher_print->Amount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->createddatetime->caption() ?></td>
            <td <?= $view_billing_voucher_print->createddatetime->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_createddatetime">
<span<?= $view_billing_voucher_print->createddatetime->viewAttributes() ?>>
<?= $view_billing_voucher_print->createddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->BillNumber->Visible) { // BillNumber ?>
        <tr id="r_BillNumber">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->BillNumber->caption() ?></td>
            <td <?= $view_billing_voucher_print->BillNumber->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_BillNumber">
<span<?= $view_billing_voucher_print->BillNumber->viewAttributes() ?>>
<?= $view_billing_voucher_print->BillNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->BankName->Visible) { // BankName ?>
        <tr id="r_BankName">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->BankName->caption() ?></td>
            <td <?= $view_billing_voucher_print->BankName->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_BankName">
<span<?= $view_billing_voucher_print->BankName->viewAttributes() ?>>
<?= $view_billing_voucher_print->BankName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->_UserName->Visible) { // UserName ?>
        <tr id="r__UserName">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->_UserName->caption() ?></td>
            <td <?= $view_billing_voucher_print->_UserName->cellAttributes() ?>>
<span id="el_view_billing_voucher_print__UserName">
<span<?= $view_billing_voucher_print->_UserName->viewAttributes() ?>>
<?= $view_billing_voucher_print->_UserName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->BillType->Visible) { // BillType ?>
        <tr id="r_BillType">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->BillType->caption() ?></td>
            <td <?= $view_billing_voucher_print->BillType->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_BillType">
<span<?= $view_billing_voucher_print->BillType->viewAttributes() ?>>
<?= $view_billing_voucher_print->BillType->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
        <tr id="r_CancelModeOfPayment">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->CancelModeOfPayment->caption() ?></td>
            <td <?= $view_billing_voucher_print->CancelModeOfPayment->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_CancelModeOfPayment">
<span<?= $view_billing_voucher_print->CancelModeOfPayment->viewAttributes() ?>>
<?= $view_billing_voucher_print->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelAmount->Visible) { // CancelAmount ?>
        <tr id="r_CancelAmount">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->CancelAmount->caption() ?></td>
            <td <?= $view_billing_voucher_print->CancelAmount->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_CancelAmount">
<span<?= $view_billing_voucher_print->CancelAmount->viewAttributes() ?>>
<?= $view_billing_voucher_print->CancelAmount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelBankName->Visible) { // CancelBankName ?>
        <tr id="r_CancelBankName">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->CancelBankName->caption() ?></td>
            <td <?= $view_billing_voucher_print->CancelBankName->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_CancelBankName">
<span<?= $view_billing_voucher_print->CancelBankName->viewAttributes() ?>>
<?= $view_billing_voucher_print->CancelBankName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
        <tr id="r_CancelTransactionNumber">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->CancelTransactionNumber->caption() ?></td>
            <td <?= $view_billing_voucher_print->CancelTransactionNumber->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_CancelTransactionNumber">
<span<?= $view_billing_voucher_print->CancelTransactionNumber->viewAttributes() ?>>
<?= $view_billing_voucher_print->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->LabTest->Visible) { // LabTest ?>
        <tr id="r_LabTest">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->LabTest->caption() ?></td>
            <td <?= $view_billing_voucher_print->LabTest->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_LabTest">
<span<?= $view_billing_voucher_print->LabTest->viewAttributes() ?>>
<?= $view_billing_voucher_print->LabTest->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->sid->Visible) { // sid ?>
        <tr id="r_sid">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->sid->caption() ?></td>
            <td <?= $view_billing_voucher_print->sid->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_sid">
<span<?= $view_billing_voucher_print->sid->viewAttributes() ?>>
<?= $view_billing_voucher_print->sid->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher_print->SidNo->Visible) { // SidNo ?>
        <tr id="r_SidNo">
            <td class="<?= $view_billing_voucher_print->TableLeftColumnClass ?>"><?= $view_billing_voucher_print->SidNo->caption() ?></td>
            <td <?= $view_billing_voucher_print->SidNo->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_SidNo">
<span<?= $view_billing_voucher_print->SidNo->viewAttributes() ?>>
<?= $view_billing_voucher_print->SidNo->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
