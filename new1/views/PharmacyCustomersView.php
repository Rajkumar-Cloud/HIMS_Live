<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyCustomersView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_customersview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_customersview = currentForm = new ew.Form("fpharmacy_customersview", "view");
    loadjs.done("fpharmacy_customersview");
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
<form name="fpharmacy_customersview" id="fpharmacy_customersview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_customers">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->Customercode->Visible) { // Customercode ?>
    <tr id="r_Customercode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Customercode"><?= $Page->Customercode->caption() ?></span></td>
        <td data-name="Customercode" <?= $Page->Customercode->cellAttributes() ?>>
<span id="el_pharmacy_customers_Customercode">
<span<?= $Page->Customercode->viewAttributes() ?>>
<?= $Page->Customercode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
    <tr id="r_Customername">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Customername"><?= $Page->Customername->caption() ?></span></td>
        <td data-name="Customername" <?= $Page->Customername->cellAttributes() ?>>
<span id="el_pharmacy_customers_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
    <tr id="r_Address1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Address1"><?= $Page->Address1->caption() ?></span></td>
        <td data-name="Address1" <?= $Page->Address1->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address1">
<span<?= $Page->Address1->viewAttributes() ?>>
<?= $Page->Address1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
    <tr id="r_Address2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Address2"><?= $Page->Address2->caption() ?></span></td>
        <td data-name="Address2" <?= $Page->Address2->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address2">
<span<?= $Page->Address2->viewAttributes() ?>>
<?= $Page->Address2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
    <tr id="r_Address3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Address3"><?= $Page->Address3->caption() ?></span></td>
        <td data-name="Address3" <?= $Page->Address3->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address3">
<span<?= $Page->Address3->viewAttributes() ?>>
<?= $Page->Address3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <tr id="r_State">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_State"><?= $Page->State->caption() ?></span></td>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el_pharmacy_customers_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
    <tr id="r_Pincode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Pincode"><?= $Page->Pincode->caption() ?></span></td>
        <td data-name="Pincode" <?= $Page->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_customers_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
    <tr id="r_Phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Phone"><?= $Page->Phone->caption() ?></span></td>
        <td data-name="Phone" <?= $Page->Phone->cellAttributes() ?>>
<span id="el_pharmacy_customers_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
    <tr id="r_Fax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Fax"><?= $Page->Fax->caption() ?></span></td>
        <td data-name="Fax" <?= $Page->Fax->cellAttributes() ?>>
<span id="el_pharmacy_customers_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_Email->Visible) { // Email ?>
    <tr id="r__Email">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers__Email"><?= $Page->_Email->caption() ?></span></td>
        <td data-name="_Email" <?= $Page->_Email->cellAttributes() ?>>
<span id="el_pharmacy_customers__Email">
<span<?= $Page->_Email->viewAttributes() ?>>
<?= $Page->_Email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Ratetype->Visible) { // Ratetype ?>
    <tr id="r_Ratetype">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Ratetype"><?= $Page->Ratetype->caption() ?></span></td>
        <td data-name="Ratetype" <?= $Page->Ratetype->cellAttributes() ?>>
<span id="el_pharmacy_customers_Ratetype">
<span<?= $Page->Ratetype->viewAttributes() ?>>
<?= $Page->Ratetype->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Creationdate->Visible) { // Creationdate ?>
    <tr id="r_Creationdate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Creationdate"><?= $Page->Creationdate->caption() ?></span></td>
        <td data-name="Creationdate" <?= $Page->Creationdate->cellAttributes() ?>>
<span id="el_pharmacy_customers_Creationdate">
<span<?= $Page->Creationdate->viewAttributes() ?>>
<?= $Page->Creationdate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ContactPerson->Visible) { // ContactPerson ?>
    <tr id="r_ContactPerson">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_ContactPerson"><?= $Page->ContactPerson->caption() ?></span></td>
        <td data-name="ContactPerson" <?= $Page->ContactPerson->cellAttributes() ?>>
<span id="el_pharmacy_customers_ContactPerson">
<span<?= $Page->ContactPerson->viewAttributes() ?>>
<?= $Page->ContactPerson->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CPPhone->Visible) { // CPPhone ?>
    <tr id="r_CPPhone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_CPPhone"><?= $Page->CPPhone->caption() ?></span></td>
        <td data-name="CPPhone" <?= $Page->CPPhone->cellAttributes() ?>>
<span id="el_pharmacy_customers_CPPhone">
<span<?= $Page->CPPhone->viewAttributes() ?>>
<?= $Page->CPPhone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_customers_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
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
