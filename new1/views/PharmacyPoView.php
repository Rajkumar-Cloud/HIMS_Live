<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyPoView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_poview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_poview = currentForm = new ew.Form("fpharmacy_poview", "view");
    loadjs.done("fpharmacy_poview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_poview" id="fpharmacy_poview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_po">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_po_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
    <tr id="r_ORDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_ORDNO"><?= $Page->ORDNO->caption() ?></span></td>
        <td data-name="ORDNO" <?= $Page->ORDNO->cellAttributes() ?>>
<span id="el_pharmacy_po_ORDNO">
<span<?= $Page->ORDNO->viewAttributes() ?>>
<?= $Page->ORDNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <tr id="r_DT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_DT"><?= $Page->DT->caption() ?></span></td>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<span id="el_pharmacy_po_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
    <tr id="r_YM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_YM"><?= $Page->YM->caption() ?></span></td>
        <td data-name="YM" <?= $Page->YM->cellAttributes() ?>>
<span id="el_pharmacy_po_YM">
<span<?= $Page->YM->viewAttributes() ?>>
<?= $Page->YM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <tr id="r_PC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_PC"><?= $Page->PC->caption() ?></span></td>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<span id="el_pharmacy_po_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
    <tr id="r_Customercode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Customercode"><?= $Page->Customercode->caption() ?></span></td>
        <td data-name="Customercode" <?= $Page->Customercode->cellAttributes() ?>>
<span id="el_pharmacy_po_Customercode">
<span<?= $Page->Customercode->viewAttributes() ?>>
<?= $Page->Customercode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
    <tr id="r_Customername">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Customername"><?= $Page->Customername->caption() ?></span></td>
        <td data-name="Customername" <?= $Page->Customername->cellAttributes() ?>>
<span id="el_pharmacy_po_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
    <tr id="r_pharmacy_pocol">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_pharmacy_pocol"><?= $Page->pharmacy_pocol->caption() ?></span></td>
        <td data-name="pharmacy_pocol" <?= $Page->pharmacy_pocol->cellAttributes() ?>>
<span id="el_pharmacy_po_pharmacy_pocol">
<span<?= $Page->pharmacy_pocol->viewAttributes() ?>>
<?= $Page->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
    <tr id="r_Address1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Address1"><?= $Page->Address1->caption() ?></span></td>
        <td data-name="Address1" <?= $Page->Address1->cellAttributes() ?>>
<span id="el_pharmacy_po_Address1">
<span<?= $Page->Address1->viewAttributes() ?>>
<?= $Page->Address1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
    <tr id="r_Address2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Address2"><?= $Page->Address2->caption() ?></span></td>
        <td data-name="Address2" <?= $Page->Address2->cellAttributes() ?>>
<span id="el_pharmacy_po_Address2">
<span<?= $Page->Address2->viewAttributes() ?>>
<?= $Page->Address2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
    <tr id="r_Address3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Address3"><?= $Page->Address3->caption() ?></span></td>
        <td data-name="Address3" <?= $Page->Address3->cellAttributes() ?>>
<span id="el_pharmacy_po_Address3">
<span<?= $Page->Address3->viewAttributes() ?>>
<?= $Page->Address3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <tr id="r_State">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_State"><?= $Page->State->caption() ?></span></td>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el_pharmacy_po_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
    <tr id="r_Pincode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Pincode"><?= $Page->Pincode->caption() ?></span></td>
        <td data-name="Pincode" <?= $Page->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_po_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
    <tr id="r_Phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Phone"><?= $Page->Phone->caption() ?></span></td>
        <td data-name="Phone" <?= $Page->Phone->cellAttributes() ?>>
<span id="el_pharmacy_po_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
    <tr id="r_Fax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Fax"><?= $Page->Fax->caption() ?></span></td>
        <td data-name="Fax" <?= $Page->Fax->cellAttributes() ?>>
<span id="el_pharmacy_po_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
    <tr id="r_EEmail">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_EEmail"><?= $Page->EEmail->caption() ?></span></td>
        <td data-name="EEmail" <?= $Page->EEmail->cellAttributes() ?>>
<span id="el_pharmacy_po_EEmail">
<span<?= $Page->EEmail->viewAttributes() ?>>
<?= $Page->EEmail->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_pharmacy_po_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_pharmacy_po_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_po_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_po_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_po_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <tr id="r_BRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_BRCODE"><?= $Page->BRCODE->caption() ?></span></td>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_po_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
