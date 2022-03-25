<?php

namespace PHPMaker2021\HIMS;

// Table
$pharmacy_billing_issue = Container("pharmacy_billing_issue");
?>
<?php if ($pharmacy_billing_issue->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacy_billing_issuemaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($pharmacy_billing_issue->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->id->caption() ?></td>
            <td <?= $pharmacy_billing_issue->id->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_id">
<span<?= $pharmacy_billing_issue->id->viewAttributes() ?>>
<?= $pharmacy_billing_issue->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->PatientId->Visible) { // PatientId ?>
        <tr id="r_PatientId">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->PatientId->caption() ?></td>
            <td <?= $pharmacy_billing_issue->PatientId->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_PatientId">
<span<?= $pharmacy_billing_issue->PatientId->viewAttributes() ?>>
<?= $pharmacy_billing_issue->PatientId->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->mrnno->Visible) { // mrnno ?>
        <tr id="r_mrnno">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->mrnno->caption() ?></td>
            <td <?= $pharmacy_billing_issue->mrnno->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_mrnno">
<span<?= $pharmacy_billing_issue->mrnno->viewAttributes() ?>>
<?= $pharmacy_billing_issue->mrnno->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->PatientName->Visible) { // PatientName ?>
        <tr id="r_PatientName">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->PatientName->caption() ?></td>
            <td <?= $pharmacy_billing_issue->PatientName->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_PatientName">
<span<?= $pharmacy_billing_issue->PatientName->viewAttributes() ?>>
<?= $pharmacy_billing_issue->PatientName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Mobile->Visible) { // Mobile ?>
        <tr id="r_Mobile">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->Mobile->caption() ?></td>
            <td <?= $pharmacy_billing_issue->Mobile->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_Mobile">
<span<?= $pharmacy_billing_issue->Mobile->viewAttributes() ?>>
<?= $pharmacy_billing_issue->Mobile->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->IP_OP->Visible) { // IP_OP ?>
        <tr id="r_IP_OP">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->IP_OP->caption() ?></td>
            <td <?= $pharmacy_billing_issue->IP_OP->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_IP_OP">
<span<?= $pharmacy_billing_issue->IP_OP->viewAttributes() ?>>
<?= $pharmacy_billing_issue->IP_OP->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Doctor->Visible) { // Doctor ?>
        <tr id="r_Doctor">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->Doctor->caption() ?></td>
            <td <?= $pharmacy_billing_issue->Doctor->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_Doctor">
<span<?= $pharmacy_billing_issue->Doctor->viewAttributes() ?>>
<?= $pharmacy_billing_issue->Doctor->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->voucher_type->Visible) { // voucher_type ?>
        <tr id="r_voucher_type">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->voucher_type->caption() ?></td>
            <td <?= $pharmacy_billing_issue->voucher_type->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_voucher_type">
<span<?= $pharmacy_billing_issue->voucher_type->viewAttributes() ?>>
<?= $pharmacy_billing_issue->voucher_type->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->ModeofPayment->Visible) { // ModeofPayment ?>
        <tr id="r_ModeofPayment">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->ModeofPayment->caption() ?></td>
            <td <?= $pharmacy_billing_issue->ModeofPayment->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_ModeofPayment">
<span<?= $pharmacy_billing_issue->ModeofPayment->viewAttributes() ?>>
<?= $pharmacy_billing_issue->ModeofPayment->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Amount->Visible) { // Amount ?>
        <tr id="r_Amount">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->Amount->caption() ?></td>
            <td <?= $pharmacy_billing_issue->Amount->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_Amount">
<span<?= $pharmacy_billing_issue->Amount->viewAttributes() ?>>
<?= $pharmacy_billing_issue->Amount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->AnyDues->Visible) { // AnyDues ?>
        <tr id="r_AnyDues">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->AnyDues->caption() ?></td>
            <td <?= $pharmacy_billing_issue->AnyDues->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_AnyDues">
<span<?= $pharmacy_billing_issue->AnyDues->viewAttributes() ?>>
<?= $pharmacy_billing_issue->AnyDues->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->createdby->caption() ?></td>
            <td <?= $pharmacy_billing_issue->createdby->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_createdby">
<span<?= $pharmacy_billing_issue->createdby->viewAttributes() ?>>
<?= $pharmacy_billing_issue->createdby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->createddatetime->caption() ?></td>
            <td <?= $pharmacy_billing_issue->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_createddatetime">
<span<?= $pharmacy_billing_issue->createddatetime->viewAttributes() ?>>
<?= $pharmacy_billing_issue->createddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->modifiedby->caption() ?></td>
            <td <?= $pharmacy_billing_issue->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_modifiedby">
<span<?= $pharmacy_billing_issue->modifiedby->viewAttributes() ?>>
<?= $pharmacy_billing_issue->modifiedby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->modifieddatetime->caption() ?></td>
            <td <?= $pharmacy_billing_issue->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_modifieddatetime">
<span<?= $pharmacy_billing_issue->modifieddatetime->viewAttributes() ?>>
<?= $pharmacy_billing_issue->modifieddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->RealizationAmount->Visible) { // RealizationAmount ?>
        <tr id="r_RealizationAmount">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->RealizationAmount->caption() ?></td>
            <td <?= $pharmacy_billing_issue->RealizationAmount->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_RealizationAmount">
<span<?= $pharmacy_billing_issue->RealizationAmount->viewAttributes() ?>>
<?= $pharmacy_billing_issue->RealizationAmount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->CId->Visible) { // CId ?>
        <tr id="r_CId">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->CId->caption() ?></td>
            <td <?= $pharmacy_billing_issue->CId->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_CId">
<span<?= $pharmacy_billing_issue->CId->viewAttributes() ?>>
<?= $pharmacy_billing_issue->CId->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->PartnerName->Visible) { // PartnerName ?>
        <tr id="r_PartnerName">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->PartnerName->caption() ?></td>
            <td <?= $pharmacy_billing_issue->PartnerName->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_PartnerName">
<span<?= $pharmacy_billing_issue->PartnerName->viewAttributes() ?>>
<?= $pharmacy_billing_issue->PartnerName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->BillNumber->Visible) { // BillNumber ?>
        <tr id="r_BillNumber">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->BillNumber->caption() ?></td>
            <td <?= $pharmacy_billing_issue->BillNumber->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_BillNumber">
<span<?= $pharmacy_billing_issue->BillNumber->viewAttributes() ?>>
<?= $pharmacy_billing_issue->BillNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->CardNumber->Visible) { // CardNumber ?>
        <tr id="r_CardNumber">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->CardNumber->caption() ?></td>
            <td <?= $pharmacy_billing_issue->CardNumber->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_CardNumber">
<span<?= $pharmacy_billing_issue->CardNumber->viewAttributes() ?>>
<?= $pharmacy_billing_issue->CardNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->BillStatus->Visible) { // BillStatus ?>
        <tr id="r_BillStatus">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->BillStatus->caption() ?></td>
            <td <?= $pharmacy_billing_issue->BillStatus->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_BillStatus">
<span<?= $pharmacy_billing_issue->BillStatus->viewAttributes() ?>>
<?= $pharmacy_billing_issue->BillStatus->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->ReportHeader->Visible) { // ReportHeader ?>
        <tr id="r_ReportHeader">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->ReportHeader->caption() ?></td>
            <td <?= $pharmacy_billing_issue->ReportHeader->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_ReportHeader">
<span<?= $pharmacy_billing_issue->ReportHeader->viewAttributes() ?>>
<?= $pharmacy_billing_issue->ReportHeader->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->PharID->Visible) { // PharID ?>
        <tr id="r_PharID">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->PharID->caption() ?></td>
            <td <?= $pharmacy_billing_issue->PharID->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_PharID">
<span<?= $pharmacy_billing_issue->PharID->viewAttributes() ?>>
<?= $pharmacy_billing_issue->PharID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->_UserName->Visible) { // UserName ?>
        <tr id="r__UserName">
            <td class="<?= $pharmacy_billing_issue->TableLeftColumnClass ?>"><?= $pharmacy_billing_issue->_UserName->caption() ?></td>
            <td <?= $pharmacy_billing_issue->_UserName->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue__UserName">
<span<?= $pharmacy_billing_issue->_UserName->viewAttributes() ?>>
<?= $pharmacy_billing_issue->_UserName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
