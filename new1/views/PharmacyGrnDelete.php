<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyGrnDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_grndelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_grndelete = currentForm = new ew.Form("fpharmacy_grndelete", "delete");
    loadjs.done("fpharmacy_grndelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_grndelete" id="fpharmacy_grndelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_grn">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_grn_id" class="pharmacy_grn_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
        <th class="<?= $Page->GRNNO->headerCellClass() ?>"><span id="elh_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO"><?= $Page->GRNNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th class="<?= $Page->DT->headerCellClass() ?>"><span id="elh_pharmacy_grn_DT" class="pharmacy_grn_DT"><?= $Page->DT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
        <th class="<?= $Page->YM->headerCellClass() ?>"><span id="elh_pharmacy_grn_YM" class="pharmacy_grn_YM"><?= $Page->YM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th class="<?= $Page->PC->headerCellClass() ?>"><span id="elh_pharmacy_grn_PC" class="pharmacy_grn_PC"><?= $Page->PC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
        <th class="<?= $Page->Customercode->headerCellClass() ?>"><span id="elh_pharmacy_grn_Customercode" class="pharmacy_grn_Customercode"><?= $Page->Customercode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <th class="<?= $Page->Customername->headerCellClass() ?>"><span id="elh_pharmacy_grn_Customername" class="pharmacy_grn_Customername"><?= $Page->Customername->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <th class="<?= $Page->pharmacy_pocol->headerCellClass() ?>"><span id="elh_pharmacy_grn_pharmacy_pocol" class="pharmacy_grn_pharmacy_pocol"><?= $Page->pharmacy_pocol->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th class="<?= $Page->State->headerCellClass() ?>"><span id="elh_pharmacy_grn_State" class="pharmacy_grn_State"><?= $Page->State->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <th class="<?= $Page->Pincode->headerCellClass() ?>"><span id="elh_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode"><?= $Page->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <th class="<?= $Page->Phone->headerCellClass() ?>"><span id="elh_pharmacy_grn_Phone" class="pharmacy_grn_Phone"><?= $Page->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <th class="<?= $Page->Fax->headerCellClass() ?>"><span id="elh_pharmacy_grn_Fax" class="pharmacy_grn_Fax"><?= $Page->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
        <th class="<?= $Page->EEmail->headerCellClass() ?>"><span id="elh_pharmacy_grn_EEmail" class="pharmacy_grn_EEmail"><?= $Page->EEmail->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_pharmacy_grn_HospID" class="pharmacy_grn_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_pharmacy_grn_createdby" class="pharmacy_grn_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_grn_createddatetime" class="pharmacy_grn_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_grn_modifiedby" class="pharmacy_grn_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_grn_modifieddatetime" class="pharmacy_grn_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <th class="<?= $Page->BILLNO->headerCellClass() ?>"><span id="elh_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO"><?= $Page->BILLNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <th class="<?= $Page->BILLDT->headerCellClass() ?>"><span id="elh_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT"><?= $Page->BILLDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_grn_BRCODE" class="pharmacy_grn_BRCODE"><?= $Page->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PharmacyID->Visible) { // PharmacyID ?>
        <th class="<?= $Page->PharmacyID->headerCellClass() ?>"><span id="elh_pharmacy_grn_PharmacyID" class="pharmacy_grn_PharmacyID"><?= $Page->PharmacyID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <th class="<?= $Page->BillTotalValue->headerCellClass() ?>"><span id="elh_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue"><?= $Page->BillTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <th class="<?= $Page->GRNTotalValue->headerCellClass() ?>"><span id="elh_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue"><?= $Page->GRNTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <th class="<?= $Page->BillDiscount->headerCellClass() ?>"><span id="elh_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount"><?= $Page->BillDiscount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TransPort->Visible) { // TransPort ?>
        <th class="<?= $Page->TransPort->headerCellClass() ?>"><span id="elh_pharmacy_grn_TransPort" class="pharmacy_grn_TransPort"><?= $Page->TransPort->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AnyOther->Visible) { // AnyOther ?>
        <th class="<?= $Page->AnyOther->headerCellClass() ?>"><span id="elh_pharmacy_grn_AnyOther" class="pharmacy_grn_AnyOther"><?= $Page->AnyOther->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th class="<?= $Page->Remarks->headerCellClass() ?>"><span id="elh_pharmacy_grn_Remarks" class="pharmacy_grn_Remarks"><?= $Page->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GrnValue->Visible) { // GrnValue ?>
        <th class="<?= $Page->GrnValue->headerCellClass() ?>"><span id="elh_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue"><?= $Page->GrnValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pid->Visible) { // Pid ?>
        <th class="<?= $Page->Pid->headerCellClass() ?>"><span id="elh_pharmacy_grn_Pid" class="pharmacy_grn_Pid"><?= $Page->Pid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
        <th class="<?= $Page->PaymentNo->headerCellClass() ?>"><span id="elh_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo"><?= $Page->PaymentNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <th class="<?= $Page->PaymentStatus->headerCellClass() ?>"><span id="elh_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus"><?= $Page->PaymentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <th class="<?= $Page->PaidAmount->headerCellClass() ?>"><span id="elh_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount"><?= $Page->PaidAmount->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_id" class="pharmacy_grn_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
        <td <?= $Page->GRNNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
<span<?= $Page->GRNNO->viewAttributes() ?>>
<?= $Page->GRNNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <td <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_DT" class="pharmacy_grn_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
        <td <?= $Page->YM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_YM" class="pharmacy_grn_YM">
<span<?= $Page->YM->viewAttributes() ?>>
<?= $Page->YM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <td <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_PC" class="pharmacy_grn_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
        <td <?= $Page->Customercode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Customercode" class="pharmacy_grn_Customercode">
<span<?= $Page->Customercode->viewAttributes() ?>>
<?= $Page->Customercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <td <?= $Page->Customername->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <td <?= $Page->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_pharmacy_pocol" class="pharmacy_grn_pharmacy_pocol">
<span<?= $Page->pharmacy_pocol->viewAttributes() ?>>
<?= $Page->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <td <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_State" class="pharmacy_grn_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td <?= $Page->Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <td <?= $Page->Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <td <?= $Page->Fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Fax" class="pharmacy_grn_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
        <td <?= $Page->EEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_EEmail" class="pharmacy_grn_EEmail">
<span<?= $Page->EEmail->viewAttributes() ?>>
<?= $Page->EEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_HospID" class="pharmacy_grn_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_createdby" class="pharmacy_grn_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_createddatetime" class="pharmacy_grn_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_modifiedby" class="pharmacy_grn_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_modifieddatetime" class="pharmacy_grn_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <td <?= $Page->BILLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
<span<?= $Page->BILLNO->viewAttributes() ?>>
<?= $Page->BILLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <td <?= $Page->BILLDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
<span<?= $Page->BILLDT->viewAttributes() ?>>
<?= $Page->BILLDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_BRCODE" class="pharmacy_grn_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PharmacyID->Visible) { // PharmacyID ?>
        <td <?= $Page->PharmacyID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_PharmacyID" class="pharmacy_grn_PharmacyID">
<span<?= $Page->PharmacyID->viewAttributes() ?>>
<?= $Page->PharmacyID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <td <?= $Page->BillTotalValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
<span<?= $Page->BillTotalValue->viewAttributes() ?>>
<?= $Page->BillTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <td <?= $Page->GRNTotalValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
<span<?= $Page->GRNTotalValue->viewAttributes() ?>>
<?= $Page->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <td <?= $Page->BillDiscount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
<span<?= $Page->BillDiscount->viewAttributes() ?>>
<?= $Page->BillDiscount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TransPort->Visible) { // TransPort ?>
        <td <?= $Page->TransPort->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_TransPort" class="pharmacy_grn_TransPort">
<span<?= $Page->TransPort->viewAttributes() ?>>
<?= $Page->TransPort->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AnyOther->Visible) { // AnyOther ?>
        <td <?= $Page->AnyOther->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_AnyOther" class="pharmacy_grn_AnyOther">
<span<?= $Page->AnyOther->viewAttributes() ?>>
<?= $Page->AnyOther->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Remarks" class="pharmacy_grn_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GrnValue->Visible) { // GrnValue ?>
        <td <?= $Page->GrnValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
<span<?= $Page->GrnValue->viewAttributes() ?>>
<?= $Page->GrnValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pid->Visible) { // Pid ?>
        <td <?= $Page->Pid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
<span<?= $Page->Pid->viewAttributes() ?>>
<?= $Page->Pid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
        <td <?= $Page->PaymentNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
<span<?= $Page->PaymentNo->viewAttributes() ?>>
<?= $Page->PaymentNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <td <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <td <?= $Page->PaidAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
