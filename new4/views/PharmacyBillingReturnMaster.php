<?php

namespace PHPMaker2021\HIMS;

// Table
$pharmacy_billing_return = Container("pharmacy_billing_return");
?>
<?php if ($pharmacy_billing_return->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacy_billing_returnmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($pharmacy_billing_return->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->id->caption() ?></td>
            <td <?= $pharmacy_billing_return->id->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_id">
<span<?= $pharmacy_billing_return->id->viewAttributes() ?>>
<?= $pharmacy_billing_return->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->PatientId->Visible) { // PatientId ?>
        <tr id="r_PatientId">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->PatientId->caption() ?></td>
            <td <?= $pharmacy_billing_return->PatientId->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_PatientId">
<span<?= $pharmacy_billing_return->PatientId->viewAttributes() ?>>
<?= $pharmacy_billing_return->PatientId->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->mrnno->Visible) { // mrnno ?>
        <tr id="r_mrnno">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->mrnno->caption() ?></td>
            <td <?= $pharmacy_billing_return->mrnno->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_mrnno">
<span<?= $pharmacy_billing_return->mrnno->viewAttributes() ?>>
<?= $pharmacy_billing_return->mrnno->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->PatientName->Visible) { // PatientName ?>
        <tr id="r_PatientName">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->PatientName->caption() ?></td>
            <td <?= $pharmacy_billing_return->PatientName->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_PatientName">
<span<?= $pharmacy_billing_return->PatientName->viewAttributes() ?>>
<?= $pharmacy_billing_return->PatientName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->Mobile->Visible) { // Mobile ?>
        <tr id="r_Mobile">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->Mobile->caption() ?></td>
            <td <?= $pharmacy_billing_return->Mobile->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_Mobile">
<span<?= $pharmacy_billing_return->Mobile->viewAttributes() ?>>
<?= $pharmacy_billing_return->Mobile->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->IP_OP->Visible) { // IP_OP ?>
        <tr id="r_IP_OP">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->IP_OP->caption() ?></td>
            <td <?= $pharmacy_billing_return->IP_OP->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_IP_OP">
<span<?= $pharmacy_billing_return->IP_OP->viewAttributes() ?>>
<?= $pharmacy_billing_return->IP_OP->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->Doctor->Visible) { // Doctor ?>
        <tr id="r_Doctor">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->Doctor->caption() ?></td>
            <td <?= $pharmacy_billing_return->Doctor->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_Doctor">
<span<?= $pharmacy_billing_return->Doctor->viewAttributes() ?>>
<?= $pharmacy_billing_return->Doctor->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->voucher_type->Visible) { // voucher_type ?>
        <tr id="r_voucher_type">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->voucher_type->caption() ?></td>
            <td <?= $pharmacy_billing_return->voucher_type->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_voucher_type">
<span<?= $pharmacy_billing_return->voucher_type->viewAttributes() ?>>
<?= $pharmacy_billing_return->voucher_type->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->ModeofPayment->Visible) { // ModeofPayment ?>
        <tr id="r_ModeofPayment">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->ModeofPayment->caption() ?></td>
            <td <?= $pharmacy_billing_return->ModeofPayment->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_ModeofPayment">
<span<?= $pharmacy_billing_return->ModeofPayment->viewAttributes() ?>>
<?= $pharmacy_billing_return->ModeofPayment->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->Amount->Visible) { // Amount ?>
        <tr id="r_Amount">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->Amount->caption() ?></td>
            <td <?= $pharmacy_billing_return->Amount->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_Amount">
<span<?= $pharmacy_billing_return->Amount->viewAttributes() ?>>
<?= $pharmacy_billing_return->Amount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->AnyDues->Visible) { // AnyDues ?>
        <tr id="r_AnyDues">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->AnyDues->caption() ?></td>
            <td <?= $pharmacy_billing_return->AnyDues->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_AnyDues">
<span<?= $pharmacy_billing_return->AnyDues->viewAttributes() ?>>
<?= $pharmacy_billing_return->AnyDues->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->createdby->caption() ?></td>
            <td <?= $pharmacy_billing_return->createdby->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_createdby">
<span<?= $pharmacy_billing_return->createdby->viewAttributes() ?>>
<?= $pharmacy_billing_return->createdby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->createddatetime->caption() ?></td>
            <td <?= $pharmacy_billing_return->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_createddatetime">
<span<?= $pharmacy_billing_return->createddatetime->viewAttributes() ?>>
<?= $pharmacy_billing_return->createddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->modifiedby->caption() ?></td>
            <td <?= $pharmacy_billing_return->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_modifiedby">
<span<?= $pharmacy_billing_return->modifiedby->viewAttributes() ?>>
<?= $pharmacy_billing_return->modifiedby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->modifieddatetime->caption() ?></td>
            <td <?= $pharmacy_billing_return->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_modifieddatetime">
<span<?= $pharmacy_billing_return->modifieddatetime->viewAttributes() ?>>
<?= $pharmacy_billing_return->modifieddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->RealizationAmount->Visible) { // RealizationAmount ?>
        <tr id="r_RealizationAmount">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->RealizationAmount->caption() ?></td>
            <td <?= $pharmacy_billing_return->RealizationAmount->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_RealizationAmount">
<span<?= $pharmacy_billing_return->RealizationAmount->viewAttributes() ?>>
<?= $pharmacy_billing_return->RealizationAmount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->CId->Visible) { // CId ?>
        <tr id="r_CId">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->CId->caption() ?></td>
            <td <?= $pharmacy_billing_return->CId->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_CId">
<span<?= $pharmacy_billing_return->CId->viewAttributes() ?>>
<?= $pharmacy_billing_return->CId->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->PartnerName->Visible) { // PartnerName ?>
        <tr id="r_PartnerName">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->PartnerName->caption() ?></td>
            <td <?= $pharmacy_billing_return->PartnerName->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_PartnerName">
<span<?= $pharmacy_billing_return->PartnerName->viewAttributes() ?>>
<?= $pharmacy_billing_return->PartnerName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->BillNumber->Visible) { // BillNumber ?>
        <tr id="r_BillNumber">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->BillNumber->caption() ?></td>
            <td <?= $pharmacy_billing_return->BillNumber->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_BillNumber">
<span<?= $pharmacy_billing_return->BillNumber->viewAttributes() ?>>
<?= $pharmacy_billing_return->BillNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->CardNumber->Visible) { // CardNumber ?>
        <tr id="r_CardNumber">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->CardNumber->caption() ?></td>
            <td <?= $pharmacy_billing_return->CardNumber->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_CardNumber">
<span<?= $pharmacy_billing_return->CardNumber->viewAttributes() ?>>
<?= $pharmacy_billing_return->CardNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->BillStatus->Visible) { // BillStatus ?>
        <tr id="r_BillStatus">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->BillStatus->caption() ?></td>
            <td <?= $pharmacy_billing_return->BillStatus->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_BillStatus">
<span<?= $pharmacy_billing_return->BillStatus->viewAttributes() ?>>
<?= $pharmacy_billing_return->BillStatus->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->ReportHeader->Visible) { // ReportHeader ?>
        <tr id="r_ReportHeader">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->ReportHeader->caption() ?></td>
            <td <?= $pharmacy_billing_return->ReportHeader->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_ReportHeader">
<span<?= $pharmacy_billing_return->ReportHeader->viewAttributes() ?>>
<?= $pharmacy_billing_return->ReportHeader->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_return->PharID->Visible) { // PharID ?>
        <tr id="r_PharID">
            <td class="<?= $pharmacy_billing_return->TableLeftColumnClass ?>"><?= $pharmacy_billing_return->PharID->caption() ?></td>
            <td <?= $pharmacy_billing_return->PharID->cellAttributes() ?>>
<span id="el_pharmacy_billing_return_PharID">
<span<?= $pharmacy_billing_return->PharID->viewAttributes() ?>>
<?= $pharmacy_billing_return->PharID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
