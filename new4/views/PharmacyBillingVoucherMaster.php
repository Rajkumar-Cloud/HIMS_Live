<?php

namespace PHPMaker2021\HIMS;

// Table
$pharmacy_billing_voucher = Container("pharmacy_billing_voucher");
?>
<?php if ($pharmacy_billing_voucher->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacy_billing_vouchermaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($pharmacy_billing_voucher->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->id->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->id->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_id">
<span<?= $pharmacy_billing_voucher->id->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillNumber->Visible) { // BillNumber ?>
        <tr id="r_BillNumber">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->BillNumber->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->BillNumber->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_BillNumber">
<span<?= $pharmacy_billing_voucher->BillNumber->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->BillNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientId->Visible) { // PatientId ?>
        <tr id="r_PatientId">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->PatientId->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->PatientId->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_PatientId">
<span<?= $pharmacy_billing_voucher->PatientId->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->PatientId->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientName->Visible) { // PatientName ?>
        <tr id="r_PatientName">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->PatientName->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->PatientName->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_PatientName">
<span<?= $pharmacy_billing_voucher->PatientName->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->PatientName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Mobile->Visible) { // Mobile ?>
        <tr id="r_Mobile">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->Mobile->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->Mobile->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_Mobile">
<span<?= $pharmacy_billing_voucher->Mobile->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->Mobile->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->mrnno->Visible) { // mrnno ?>
        <tr id="r_mrnno">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->mrnno->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->mrnno->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_mrnno">
<span<?= $pharmacy_billing_voucher->mrnno->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->mrnno->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->IP_OP->Visible) { // IP_OP ?>
        <tr id="r_IP_OP">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->IP_OP->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->IP_OP->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_IP_OP">
<span<?= $pharmacy_billing_voucher->IP_OP->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->IP_OP->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Doctor->Visible) { // Doctor ?>
        <tr id="r_Doctor">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->Doctor->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->Doctor->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_Doctor">
<span<?= $pharmacy_billing_voucher->Doctor->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->Doctor->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
        <tr id="r_ModeofPayment">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->ModeofPayment->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->ModeofPayment->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_ModeofPayment">
<span<?= $pharmacy_billing_voucher->ModeofPayment->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Amount->Visible) { // Amount ?>
        <tr id="r_Amount">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->Amount->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->Amount->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_Amount">
<span<?= $pharmacy_billing_voucher->Amount->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->Amount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->AnyDues->Visible) { // AnyDues ?>
        <tr id="r_AnyDues">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->AnyDues->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->AnyDues->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_AnyDues">
<span<?= $pharmacy_billing_voucher->AnyDues->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->AnyDues->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->createdby->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->createdby->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_createdby">
<span<?= $pharmacy_billing_voucher->createdby->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->createdby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->createddatetime->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_createddatetime">
<span<?= $pharmacy_billing_voucher->createddatetime->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->createddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->modifiedby->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_modifiedby">
<span<?= $pharmacy_billing_voucher->modifiedby->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->modifiedby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->modifieddatetime->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_modifieddatetime">
<span<?= $pharmacy_billing_voucher->modifieddatetime->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->modifieddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
        <tr id="r_RealizationAmount">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->RealizationAmount->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->RealizationAmount->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_RealizationAmount">
<span<?= $pharmacy_billing_voucher->RealizationAmount->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->RealizationAmount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CId->Visible) { // CId ?>
        <tr id="r_CId">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->CId->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->CId->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_CId">
<span<?= $pharmacy_billing_voucher->CId->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->CId->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PartnerName->Visible) { // PartnerName ?>
        <tr id="r_PartnerName">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->PartnerName->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->PartnerName->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_PartnerName">
<span<?= $pharmacy_billing_voucher->PartnerName->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->PartnerName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CardNumber->Visible) { // CardNumber ?>
        <tr id="r_CardNumber">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->CardNumber->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->CardNumber->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_CardNumber">
<span<?= $pharmacy_billing_voucher->CardNumber->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->CardNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillStatus->Visible) { // BillStatus ?>
        <tr id="r_BillStatus">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->BillStatus->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->BillStatus->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_BillStatus">
<span<?= $pharmacy_billing_voucher->BillStatus->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->BillStatus->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ReportHeader->Visible) { // ReportHeader ?>
        <tr id="r_ReportHeader">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->ReportHeader->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->ReportHeader->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_ReportHeader">
<span<?= $pharmacy_billing_voucher->ReportHeader->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->ReportHeader->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PharID->Visible) { // PharID ?>
        <tr id="r_PharID">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->PharID->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->PharID->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_PharID">
<span<?= $pharmacy_billing_voucher->PharID->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->PharID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->_UserName->Visible) { // UserName ?>
        <tr id="r__UserName">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->_UserName->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->_UserName->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher__UserName">
<span<?= $pharmacy_billing_voucher->_UserName->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->_UserName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CardType->Visible) { // CardType ?>
        <tr id="r_CardType">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->CardType->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->CardType->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_CardType">
<span<?= $pharmacy_billing_voucher->CardType->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->CardType->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
        <tr id="r_DiscountAmount">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->DiscountAmount->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->DiscountAmount->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_DiscountAmount">
<span<?= $pharmacy_billing_voucher->DiscountAmount->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->DiscountAmount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ApprovalNumber->Visible) { // ApprovalNumber ?>
        <tr id="r_ApprovalNumber">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->ApprovalNumber->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->ApprovalNumber->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_ApprovalNumber">
<span<?= $pharmacy_billing_voucher->ApprovalNumber->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->ApprovalNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Cash->Visible) { // Cash ?>
        <tr id="r_Cash">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->Cash->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->Cash->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_Cash">
<span<?= $pharmacy_billing_voucher->Cash->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->Cash->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Card->Visible) { // Card ?>
        <tr id="r_Card">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->Card->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->Card->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_Card">
<span<?= $pharmacy_billing_voucher->Card->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->Card->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillType->Visible) { // BillType ?>
        <tr id="r_BillType">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->BillType->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->BillType->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_BillType">
<span<?= $pharmacy_billing_voucher->BillType->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->BillType->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PartialSave->Visible) { // PartialSave ?>
        <tr id="r_PartialSave">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->PartialSave->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->PartialSave->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_PartialSave">
<span<?= $pharmacy_billing_voucher->PartialSave->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->PartialSave->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientGST->Visible) { // PatientGST ?>
        <tr id="r_PatientGST">
            <td class="<?= $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?= $pharmacy_billing_voucher->PatientGST->caption() ?></td>
            <td <?= $pharmacy_billing_voucher->PatientGST->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_PatientGST">
<span<?= $pharmacy_billing_voucher->PatientGST->viewAttributes() ?>>
<?= $pharmacy_billing_voucher->PatientGST->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
