<?php

namespace PHPMaker2021\HIMS;

// Table
$view_billing_voucher = Container("view_billing_voucher");
?>
<?php if ($view_billing_voucher->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_billing_vouchermaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($view_billing_voucher->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->createddatetime->caption() ?></td>
            <td <?= $view_billing_voucher->createddatetime->cellAttributes() ?>>
<span id="el_view_billing_voucher_createddatetime">
<span<?= $view_billing_voucher->createddatetime->viewAttributes() ?>>
<?= $view_billing_voucher->createddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->BillNumber->Visible) { // BillNumber ?>
        <tr id="r_BillNumber">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->BillNumber->caption() ?></td>
            <td <?= $view_billing_voucher->BillNumber->cellAttributes() ?>>
<span id="el_view_billing_voucher_BillNumber">
<span<?= $view_billing_voucher->BillNumber->viewAttributes() ?>>
<?= $view_billing_voucher->BillNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->PatientId->Visible) { // PatientId ?>
        <tr id="r_PatientId">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->PatientId->caption() ?></td>
            <td <?= $view_billing_voucher->PatientId->cellAttributes() ?>>
<span id="el_view_billing_voucher_PatientId">
<span<?= $view_billing_voucher->PatientId->viewAttributes() ?>>
<?= $view_billing_voucher->PatientId->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->PatientName->Visible) { // PatientName ?>
        <tr id="r_PatientName">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->PatientName->caption() ?></td>
            <td <?= $view_billing_voucher->PatientName->cellAttributes() ?>>
<span id="el_view_billing_voucher_PatientName">
<span<?= $view_billing_voucher->PatientName->viewAttributes() ?>>
<?= $view_billing_voucher->PatientName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->Mobile->Visible) { // Mobile ?>
        <tr id="r_Mobile">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->Mobile->caption() ?></td>
            <td <?= $view_billing_voucher->Mobile->cellAttributes() ?>>
<span id="el_view_billing_voucher_Mobile">
<span<?= $view_billing_voucher->Mobile->viewAttributes() ?>>
<?= $view_billing_voucher->Mobile->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->Doctor->Visible) { // Doctor ?>
        <tr id="r_Doctor">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->Doctor->caption() ?></td>
            <td <?= $view_billing_voucher->Doctor->cellAttributes() ?>>
<span id="el_view_billing_voucher_Doctor">
<span<?= $view_billing_voucher->Doctor->viewAttributes() ?>>
<?= $view_billing_voucher->Doctor->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
        <tr id="r_ModeofPayment">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->ModeofPayment->caption() ?></td>
            <td <?= $view_billing_voucher->ModeofPayment->cellAttributes() ?>>
<span id="el_view_billing_voucher_ModeofPayment">
<span<?= $view_billing_voucher->ModeofPayment->viewAttributes() ?>>
<?= $view_billing_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->Amount->Visible) { // Amount ?>
        <tr id="r_Amount">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->Amount->caption() ?></td>
            <td <?= $view_billing_voucher->Amount->cellAttributes() ?>>
<span id="el_view_billing_voucher_Amount">
<span<?= $view_billing_voucher->Amount->viewAttributes() ?>>
<?= $view_billing_voucher->Amount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
        <tr id="r_DiscountAmount">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->DiscountAmount->caption() ?></td>
            <td <?= $view_billing_voucher->DiscountAmount->cellAttributes() ?>>
<span id="el_view_billing_voucher_DiscountAmount">
<span<?= $view_billing_voucher->DiscountAmount->viewAttributes() ?>>
<?= $view_billing_voucher->DiscountAmount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->BankName->Visible) { // BankName ?>
        <tr id="r_BankName">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->BankName->caption() ?></td>
            <td <?= $view_billing_voucher->BankName->cellAttributes() ?>>
<span id="el_view_billing_voucher_BankName">
<span<?= $view_billing_voucher->BankName->viewAttributes() ?>>
<?= $view_billing_voucher->BankName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->_UserName->Visible) { // UserName ?>
        <tr id="r__UserName">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->_UserName->caption() ?></td>
            <td <?= $view_billing_voucher->_UserName->cellAttributes() ?>>
<span id="el_view_billing_voucher__UserName">
<span<?= $view_billing_voucher->_UserName->viewAttributes() ?>>
<?= $view_billing_voucher->_UserName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->BillType->Visible) { // BillType ?>
        <tr id="r_BillType">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->BillType->caption() ?></td>
            <td <?= $view_billing_voucher->BillType->cellAttributes() ?>>
<span id="el_view_billing_voucher_BillType">
<span<?= $view_billing_voucher->BillType->viewAttributes() ?>>
<?= $view_billing_voucher->BillType->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->CancelBill->Visible) { // CancelBill ?>
        <tr id="r_CancelBill">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->CancelBill->caption() ?></td>
            <td <?= $view_billing_voucher->CancelBill->cellAttributes() ?>>
<span id="el_view_billing_voucher_CancelBill">
<span<?= $view_billing_voucher->CancelBill->viewAttributes() ?>>
<?= $view_billing_voucher->CancelBill->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->LabTest->Visible) { // LabTest ?>
        <tr id="r_LabTest">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->LabTest->caption() ?></td>
            <td <?= $view_billing_voucher->LabTest->cellAttributes() ?>>
<span id="el_view_billing_voucher_LabTest">
<span<?= $view_billing_voucher->LabTest->viewAttributes() ?>>
<?= $view_billing_voucher->LabTest->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->sid->Visible) { // sid ?>
        <tr id="r_sid">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->sid->caption() ?></td>
            <td <?= $view_billing_voucher->sid->cellAttributes() ?>>
<span id="el_view_billing_voucher_sid">
<span<?= $view_billing_voucher->sid->viewAttributes() ?>>
<?= $view_billing_voucher->sid->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->SidNo->Visible) { // SidNo ?>
        <tr id="r_SidNo">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->SidNo->caption() ?></td>
            <td <?= $view_billing_voucher->SidNo->cellAttributes() ?>>
<span id="el_view_billing_voucher_SidNo">
<span<?= $view_billing_voucher->SidNo->viewAttributes() ?>>
<?= $view_billing_voucher->SidNo->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->createdDatettime->Visible) { // createdDatettime ?>
        <tr id="r_createdDatettime">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->createdDatettime->caption() ?></td>
            <td <?= $view_billing_voucher->createdDatettime->cellAttributes() ?>>
<span id="el_view_billing_voucher_createdDatettime">
<span<?= $view_billing_voucher->createdDatettime->viewAttributes() ?>>
<?= $view_billing_voucher->createdDatettime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
        <tr id="r_GoogleReviewID">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->GoogleReviewID->caption() ?></td>
            <td <?= $view_billing_voucher->GoogleReviewID->cellAttributes() ?>>
<span id="el_view_billing_voucher_GoogleReviewID">
<span<?= $view_billing_voucher->GoogleReviewID->viewAttributes() ?>>
<?= $view_billing_voucher->GoogleReviewID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->CardType->Visible) { // CardType ?>
        <tr id="r_CardType">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->CardType->caption() ?></td>
            <td <?= $view_billing_voucher->CardType->cellAttributes() ?>>
<span id="el_view_billing_voucher_CardType">
<span<?= $view_billing_voucher->CardType->viewAttributes() ?>>
<?= $view_billing_voucher->CardType->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->PharmacyBill->Visible) { // PharmacyBill ?>
        <tr id="r_PharmacyBill">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->PharmacyBill->caption() ?></td>
            <td <?= $view_billing_voucher->PharmacyBill->cellAttributes() ?>>
<span id="el_view_billing_voucher_PharmacyBill">
<span<?= $view_billing_voucher->PharmacyBill->viewAttributes() ?>>
<?= $view_billing_voucher->PharmacyBill->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->cash->Visible) { // cash ?>
        <tr id="r_cash">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->cash->caption() ?></td>
            <td <?= $view_billing_voucher->cash->cellAttributes() ?>>
<span id="el_view_billing_voucher_cash">
<span<?= $view_billing_voucher->cash->viewAttributes() ?>>
<?= $view_billing_voucher->cash->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_billing_voucher->Card->Visible) { // Card ?>
        <tr id="r_Card">
            <td class="<?= $view_billing_voucher->TableLeftColumnClass ?>"><?= $view_billing_voucher->Card->caption() ?></td>
            <td <?= $view_billing_voucher->Card->cellAttributes() ?>>
<span id="el_view_billing_voucher_Card">
<span<?= $view_billing_voucher->Card->viewAttributes() ?>>
<?= $view_billing_voucher->Card->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
