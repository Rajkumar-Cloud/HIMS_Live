<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPoDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_podelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_podelete = currentForm = new ew.Form("fpharmacy_podelete", "delete");
    loadjs.done("fpharmacy_podelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.pharmacy_po) ew.vars.tables.pharmacy_po = <?= JsonEncode(GetClientVar("tables", "pharmacy_po")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_podelete" id="fpharmacy_podelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_po">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_po_id" class="pharmacy_po_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
        <th class="<?= $Page->ORDNO->headerCellClass() ?>"><span id="elh_pharmacy_po_ORDNO" class="pharmacy_po_ORDNO"><?= $Page->ORDNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th class="<?= $Page->DT->headerCellClass() ?>"><span id="elh_pharmacy_po_DT" class="pharmacy_po_DT"><?= $Page->DT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
        <th class="<?= $Page->YM->headerCellClass() ?>"><span id="elh_pharmacy_po_YM" class="pharmacy_po_YM"><?= $Page->YM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th class="<?= $Page->PC->headerCellClass() ?>"><span id="elh_pharmacy_po_PC" class="pharmacy_po_PC"><?= $Page->PC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
        <th class="<?= $Page->Customercode->headerCellClass() ?>"><span id="elh_pharmacy_po_Customercode" class="pharmacy_po_Customercode"><?= $Page->Customercode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <th class="<?= $Page->Customername->headerCellClass() ?>"><span id="elh_pharmacy_po_Customername" class="pharmacy_po_Customername"><?= $Page->Customername->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <th class="<?= $Page->pharmacy_pocol->headerCellClass() ?>"><span id="elh_pharmacy_po_pharmacy_pocol" class="pharmacy_po_pharmacy_pocol"><?= $Page->pharmacy_pocol->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
        <th class="<?= $Page->Address1->headerCellClass() ?>"><span id="elh_pharmacy_po_Address1" class="pharmacy_po_Address1"><?= $Page->Address1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
        <th class="<?= $Page->Address2->headerCellClass() ?>"><span id="elh_pharmacy_po_Address2" class="pharmacy_po_Address2"><?= $Page->Address2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
        <th class="<?= $Page->Address3->headerCellClass() ?>"><span id="elh_pharmacy_po_Address3" class="pharmacy_po_Address3"><?= $Page->Address3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th class="<?= $Page->State->headerCellClass() ?>"><span id="elh_pharmacy_po_State" class="pharmacy_po_State"><?= $Page->State->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <th class="<?= $Page->Pincode->headerCellClass() ?>"><span id="elh_pharmacy_po_Pincode" class="pharmacy_po_Pincode"><?= $Page->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <th class="<?= $Page->Phone->headerCellClass() ?>"><span id="elh_pharmacy_po_Phone" class="pharmacy_po_Phone"><?= $Page->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <th class="<?= $Page->Fax->headerCellClass() ?>"><span id="elh_pharmacy_po_Fax" class="pharmacy_po_Fax"><?= $Page->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
        <th class="<?= $Page->EEmail->headerCellClass() ?>"><span id="elh_pharmacy_po_EEmail" class="pharmacy_po_EEmail"><?= $Page->EEmail->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_pharmacy_po_HospID" class="pharmacy_po_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_pharmacy_po_createdby" class="pharmacy_po_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_po_createddatetime" class="pharmacy_po_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_po_modifiedby" class="pharmacy_po_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_po_modifieddatetime" class="pharmacy_po_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_po_BRCODE" class="pharmacy_po_BRCODE"><?= $Page->BRCODE->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_pharmacy_po_id" class="pharmacy_po_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
        <td <?= $Page->ORDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_ORDNO" class="pharmacy_po_ORDNO">
<span<?= $Page->ORDNO->viewAttributes() ?>>
<?= $Page->ORDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <td <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_DT" class="pharmacy_po_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
        <td <?= $Page->YM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_YM" class="pharmacy_po_YM">
<span<?= $Page->YM->viewAttributes() ?>>
<?= $Page->YM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <td <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_PC" class="pharmacy_po_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
        <td <?= $Page->Customercode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_Customercode" class="pharmacy_po_Customercode">
<span<?= $Page->Customercode->viewAttributes() ?>>
<?= $Page->Customercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <td <?= $Page->Customername->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_Customername" class="pharmacy_po_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <td <?= $Page->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_pharmacy_pocol" class="pharmacy_po_pharmacy_pocol">
<span<?= $Page->pharmacy_pocol->viewAttributes() ?>>
<?= $Page->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
        <td <?= $Page->Address1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_Address1" class="pharmacy_po_Address1">
<span<?= $Page->Address1->viewAttributes() ?>>
<?= $Page->Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
        <td <?= $Page->Address2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_Address2" class="pharmacy_po_Address2">
<span<?= $Page->Address2->viewAttributes() ?>>
<?= $Page->Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
        <td <?= $Page->Address3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_Address3" class="pharmacy_po_Address3">
<span<?= $Page->Address3->viewAttributes() ?>>
<?= $Page->Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <td <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_State" class="pharmacy_po_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td <?= $Page->Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_Pincode" class="pharmacy_po_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <td <?= $Page->Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_Phone" class="pharmacy_po_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <td <?= $Page->Fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_Fax" class="pharmacy_po_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
        <td <?= $Page->EEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_EEmail" class="pharmacy_po_EEmail">
<span<?= $Page->EEmail->viewAttributes() ?>>
<?= $Page->EEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_HospID" class="pharmacy_po_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_createdby" class="pharmacy_po_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_createddatetime" class="pharmacy_po_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_modifiedby" class="pharmacy_po_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_modifieddatetime" class="pharmacy_po_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_BRCODE" class="pharmacy_po_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
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
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
