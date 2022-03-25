<?php

namespace PHPMaker2021\project3;

// Page object
$StoreSuppliersView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fstore_suppliersview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fstore_suppliersview = currentForm = new ew.Form("fstore_suppliersview", "view");
    loadjs.done("fstore_suppliersview");
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
<form name="fstore_suppliersview" id="fstore_suppliersview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_suppliers">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->Suppliercode->Visible) { // Suppliercode ?>
    <tr id="r_Suppliercode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Suppliercode"><?= $Page->Suppliercode->caption() ?></span></td>
        <td data-name="Suppliercode" <?= $Page->Suppliercode->cellAttributes() ?>>
<span id="el_store_suppliers_Suppliercode">
<span<?= $Page->Suppliercode->viewAttributes() ?>>
<?= $Page->Suppliercode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Suppliername->Visible) { // Suppliername ?>
    <tr id="r_Suppliername">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Suppliername"><?= $Page->Suppliername->caption() ?></span></td>
        <td data-name="Suppliername" <?= $Page->Suppliername->cellAttributes() ?>>
<span id="el_store_suppliers_Suppliername">
<span<?= $Page->Suppliername->viewAttributes() ?>>
<?= $Page->Suppliername->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Abbreviation->Visible) { // Abbreviation ?>
    <tr id="r_Abbreviation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Abbreviation"><?= $Page->Abbreviation->caption() ?></span></td>
        <td data-name="Abbreviation" <?= $Page->Abbreviation->cellAttributes() ?>>
<span id="el_store_suppliers_Abbreviation">
<span<?= $Page->Abbreviation->viewAttributes() ?>>
<?= $Page->Abbreviation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Creationdate->Visible) { // Creationdate ?>
    <tr id="r_Creationdate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Creationdate"><?= $Page->Creationdate->caption() ?></span></td>
        <td data-name="Creationdate" <?= $Page->Creationdate->cellAttributes() ?>>
<span id="el_store_suppliers_Creationdate">
<span<?= $Page->Creationdate->viewAttributes() ?>>
<?= $Page->Creationdate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
    <tr id="r_Address1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Address1"><?= $Page->Address1->caption() ?></span></td>
        <td data-name="Address1" <?= $Page->Address1->cellAttributes() ?>>
<span id="el_store_suppliers_Address1">
<span<?= $Page->Address1->viewAttributes() ?>>
<?= $Page->Address1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
    <tr id="r_Address2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Address2"><?= $Page->Address2->caption() ?></span></td>
        <td data-name="Address2" <?= $Page->Address2->cellAttributes() ?>>
<span id="el_store_suppliers_Address2">
<span<?= $Page->Address2->viewAttributes() ?>>
<?= $Page->Address2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
    <tr id="r_Address3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Address3"><?= $Page->Address3->caption() ?></span></td>
        <td data-name="Address3" <?= $Page->Address3->cellAttributes() ?>>
<span id="el_store_suppliers_Address3">
<span<?= $Page->Address3->viewAttributes() ?>>
<?= $Page->Address3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Citycode->Visible) { // Citycode ?>
    <tr id="r_Citycode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Citycode"><?= $Page->Citycode->caption() ?></span></td>
        <td data-name="Citycode" <?= $Page->Citycode->cellAttributes() ?>>
<span id="el_store_suppliers_Citycode">
<span<?= $Page->Citycode->viewAttributes() ?>>
<?= $Page->Citycode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <tr id="r_State">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_State"><?= $Page->State->caption() ?></span></td>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el_store_suppliers_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
    <tr id="r_Pincode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Pincode"><?= $Page->Pincode->caption() ?></span></td>
        <td data-name="Pincode" <?= $Page->Pincode->cellAttributes() ?>>
<span id="el_store_suppliers_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tngstnumber->Visible) { // Tngstnumber ?>
    <tr id="r_Tngstnumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Tngstnumber"><?= $Page->Tngstnumber->caption() ?></span></td>
        <td data-name="Tngstnumber" <?= $Page->Tngstnumber->cellAttributes() ?>>
<span id="el_store_suppliers_Tngstnumber">
<span<?= $Page->Tngstnumber->viewAttributes() ?>>
<?= $Page->Tngstnumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
    <tr id="r_Phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Phone"><?= $Page->Phone->caption() ?></span></td>
        <td data-name="Phone" <?= $Page->Phone->cellAttributes() ?>>
<span id="el_store_suppliers_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
    <tr id="r_Fax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Fax"><?= $Page->Fax->caption() ?></span></td>
        <td data-name="Fax" <?= $Page->Fax->cellAttributes() ?>>
<span id="el_store_suppliers_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_Email->Visible) { // Email ?>
    <tr id="r__Email">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers__Email"><?= $Page->_Email->caption() ?></span></td>
        <td data-name="_Email" <?= $Page->_Email->cellAttributes() ?>>
<span id="el_store_suppliers__Email">
<span<?= $Page->_Email->viewAttributes() ?>>
<?= $Page->_Email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Paymentmode->Visible) { // Paymentmode ?>
    <tr id="r_Paymentmode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Paymentmode"><?= $Page->Paymentmode->caption() ?></span></td>
        <td data-name="Paymentmode" <?= $Page->Paymentmode->cellAttributes() ?>>
<span id="el_store_suppliers_Paymentmode">
<span<?= $Page->Paymentmode->viewAttributes() ?>>
<?= $Page->Paymentmode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Contactperson1->Visible) { // Contactperson1 ?>
    <tr id="r_Contactperson1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Contactperson1"><?= $Page->Contactperson1->caption() ?></span></td>
        <td data-name="Contactperson1" <?= $Page->Contactperson1->cellAttributes() ?>>
<span id="el_store_suppliers_Contactperson1">
<span<?= $Page->Contactperson1->viewAttributes() ?>>
<?= $Page->Contactperson1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP1Address1->Visible) { // CP1Address1 ?>
    <tr id="r_CP1Address1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Address1"><?= $Page->CP1Address1->caption() ?></span></td>
        <td data-name="CP1Address1" <?= $Page->CP1Address1->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Address1">
<span<?= $Page->CP1Address1->viewAttributes() ?>>
<?= $Page->CP1Address1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP1Address2->Visible) { // CP1Address2 ?>
    <tr id="r_CP1Address2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Address2"><?= $Page->CP1Address2->caption() ?></span></td>
        <td data-name="CP1Address2" <?= $Page->CP1Address2->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Address2">
<span<?= $Page->CP1Address2->viewAttributes() ?>>
<?= $Page->CP1Address2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP1Address3->Visible) { // CP1Address3 ?>
    <tr id="r_CP1Address3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Address3"><?= $Page->CP1Address3->caption() ?></span></td>
        <td data-name="CP1Address3" <?= $Page->CP1Address3->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Address3">
<span<?= $Page->CP1Address3->viewAttributes() ?>>
<?= $Page->CP1Address3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP1Citycode->Visible) { // CP1Citycode ?>
    <tr id="r_CP1Citycode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Citycode"><?= $Page->CP1Citycode->caption() ?></span></td>
        <td data-name="CP1Citycode" <?= $Page->CP1Citycode->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Citycode">
<span<?= $Page->CP1Citycode->viewAttributes() ?>>
<?= $Page->CP1Citycode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP1State->Visible) { // CP1State ?>
    <tr id="r_CP1State">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1State"><?= $Page->CP1State->caption() ?></span></td>
        <td data-name="CP1State" <?= $Page->CP1State->cellAttributes() ?>>
<span id="el_store_suppliers_CP1State">
<span<?= $Page->CP1State->viewAttributes() ?>>
<?= $Page->CP1State->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP1Pincode->Visible) { // CP1Pincode ?>
    <tr id="r_CP1Pincode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Pincode"><?= $Page->CP1Pincode->caption() ?></span></td>
        <td data-name="CP1Pincode" <?= $Page->CP1Pincode->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Pincode">
<span<?= $Page->CP1Pincode->viewAttributes() ?>>
<?= $Page->CP1Pincode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP1Designation->Visible) { // CP1Designation ?>
    <tr id="r_CP1Designation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Designation"><?= $Page->CP1Designation->caption() ?></span></td>
        <td data-name="CP1Designation" <?= $Page->CP1Designation->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Designation">
<span<?= $Page->CP1Designation->viewAttributes() ?>>
<?= $Page->CP1Designation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP1Phone->Visible) { // CP1Phone ?>
    <tr id="r_CP1Phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Phone"><?= $Page->CP1Phone->caption() ?></span></td>
        <td data-name="CP1Phone" <?= $Page->CP1Phone->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Phone">
<span<?= $Page->CP1Phone->viewAttributes() ?>>
<?= $Page->CP1Phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP1MobileNo->Visible) { // CP1MobileNo ?>
    <tr id="r_CP1MobileNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1MobileNo"><?= $Page->CP1MobileNo->caption() ?></span></td>
        <td data-name="CP1MobileNo" <?= $Page->CP1MobileNo->cellAttributes() ?>>
<span id="el_store_suppliers_CP1MobileNo">
<span<?= $Page->CP1MobileNo->viewAttributes() ?>>
<?= $Page->CP1MobileNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP1Fax->Visible) { // CP1Fax ?>
    <tr id="r_CP1Fax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Fax"><?= $Page->CP1Fax->caption() ?></span></td>
        <td data-name="CP1Fax" <?= $Page->CP1Fax->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Fax">
<span<?= $Page->CP1Fax->viewAttributes() ?>>
<?= $Page->CP1Fax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP1Email->Visible) { // CP1Email ?>
    <tr id="r_CP1Email">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Email"><?= $Page->CP1Email->caption() ?></span></td>
        <td data-name="CP1Email" <?= $Page->CP1Email->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Email">
<span<?= $Page->CP1Email->viewAttributes() ?>>
<?= $Page->CP1Email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Contactperson2->Visible) { // Contactperson2 ?>
    <tr id="r_Contactperson2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Contactperson2"><?= $Page->Contactperson2->caption() ?></span></td>
        <td data-name="Contactperson2" <?= $Page->Contactperson2->cellAttributes() ?>>
<span id="el_store_suppliers_Contactperson2">
<span<?= $Page->Contactperson2->viewAttributes() ?>>
<?= $Page->Contactperson2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP2Address1->Visible) { // CP2Address1 ?>
    <tr id="r_CP2Address1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Address1"><?= $Page->CP2Address1->caption() ?></span></td>
        <td data-name="CP2Address1" <?= $Page->CP2Address1->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Address1">
<span<?= $Page->CP2Address1->viewAttributes() ?>>
<?= $Page->CP2Address1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP2Address2->Visible) { // CP2Address2 ?>
    <tr id="r_CP2Address2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Address2"><?= $Page->CP2Address2->caption() ?></span></td>
        <td data-name="CP2Address2" <?= $Page->CP2Address2->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Address2">
<span<?= $Page->CP2Address2->viewAttributes() ?>>
<?= $Page->CP2Address2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP2Address3->Visible) { // CP2Address3 ?>
    <tr id="r_CP2Address3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Address3"><?= $Page->CP2Address3->caption() ?></span></td>
        <td data-name="CP2Address3" <?= $Page->CP2Address3->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Address3">
<span<?= $Page->CP2Address3->viewAttributes() ?>>
<?= $Page->CP2Address3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP2Citycode->Visible) { // CP2Citycode ?>
    <tr id="r_CP2Citycode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Citycode"><?= $Page->CP2Citycode->caption() ?></span></td>
        <td data-name="CP2Citycode" <?= $Page->CP2Citycode->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Citycode">
<span<?= $Page->CP2Citycode->viewAttributes() ?>>
<?= $Page->CP2Citycode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP2State->Visible) { // CP2State ?>
    <tr id="r_CP2State">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2State"><?= $Page->CP2State->caption() ?></span></td>
        <td data-name="CP2State" <?= $Page->CP2State->cellAttributes() ?>>
<span id="el_store_suppliers_CP2State">
<span<?= $Page->CP2State->viewAttributes() ?>>
<?= $Page->CP2State->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP2Pincode->Visible) { // CP2Pincode ?>
    <tr id="r_CP2Pincode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Pincode"><?= $Page->CP2Pincode->caption() ?></span></td>
        <td data-name="CP2Pincode" <?= $Page->CP2Pincode->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Pincode">
<span<?= $Page->CP2Pincode->viewAttributes() ?>>
<?= $Page->CP2Pincode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP2Designation->Visible) { // CP2Designation ?>
    <tr id="r_CP2Designation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Designation"><?= $Page->CP2Designation->caption() ?></span></td>
        <td data-name="CP2Designation" <?= $Page->CP2Designation->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Designation">
<span<?= $Page->CP2Designation->viewAttributes() ?>>
<?= $Page->CP2Designation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP2Phone->Visible) { // CP2Phone ?>
    <tr id="r_CP2Phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Phone"><?= $Page->CP2Phone->caption() ?></span></td>
        <td data-name="CP2Phone" <?= $Page->CP2Phone->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Phone">
<span<?= $Page->CP2Phone->viewAttributes() ?>>
<?= $Page->CP2Phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP2MobileNo->Visible) { // CP2MobileNo ?>
    <tr id="r_CP2MobileNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2MobileNo"><?= $Page->CP2MobileNo->caption() ?></span></td>
        <td data-name="CP2MobileNo" <?= $Page->CP2MobileNo->cellAttributes() ?>>
<span id="el_store_suppliers_CP2MobileNo">
<span<?= $Page->CP2MobileNo->viewAttributes() ?>>
<?= $Page->CP2MobileNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP2Fax->Visible) { // CP2Fax ?>
    <tr id="r_CP2Fax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Fax"><?= $Page->CP2Fax->caption() ?></span></td>
        <td data-name="CP2Fax" <?= $Page->CP2Fax->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Fax">
<span<?= $Page->CP2Fax->viewAttributes() ?>>
<?= $Page->CP2Fax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CP2Email->Visible) { // CP2Email ?>
    <tr id="r_CP2Email">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Email"><?= $Page->CP2Email->caption() ?></span></td>
        <td data-name="CP2Email" <?= $Page->CP2Email->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Email">
<span<?= $Page->CP2Email->viewAttributes() ?>>
<?= $Page->CP2Email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <tr id="r_Type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Type"><?= $Page->Type->caption() ?></span></td>
        <td data-name="Type" <?= $Page->Type->cellAttributes() ?>>
<span id="el_store_suppliers_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Creditterms->Visible) { // Creditterms ?>
    <tr id="r_Creditterms">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Creditterms"><?= $Page->Creditterms->caption() ?></span></td>
        <td data-name="Creditterms" <?= $Page->Creditterms->cellAttributes() ?>>
<span id="el_store_suppliers_Creditterms">
<span<?= $Page->Creditterms->viewAttributes() ?>>
<?= $Page->Creditterms->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Remarks"><?= $Page->Remarks->caption() ?></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_store_suppliers_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tinnumber->Visible) { // Tinnumber ?>
    <tr id="r_Tinnumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Tinnumber"><?= $Page->Tinnumber->caption() ?></span></td>
        <td data-name="Tinnumber" <?= $Page->Tinnumber->cellAttributes() ?>>
<span id="el_store_suppliers_Tinnumber">
<span<?= $Page->Tinnumber->viewAttributes() ?>>
<?= $Page->Tinnumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
    <tr id="r_Universalsuppliercode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Universalsuppliercode"><?= $Page->Universalsuppliercode->caption() ?></span></td>
        <td data-name="Universalsuppliercode" <?= $Page->Universalsuppliercode->cellAttributes() ?>>
<span id="el_store_suppliers_Universalsuppliercode">
<span<?= $Page->Universalsuppliercode->viewAttributes() ?>>
<?= $Page->Universalsuppliercode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mobilenumber->Visible) { // Mobilenumber ?>
    <tr id="r_Mobilenumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Mobilenumber"><?= $Page->Mobilenumber->caption() ?></span></td>
        <td data-name="Mobilenumber" <?= $Page->Mobilenumber->cellAttributes() ?>>
<span id="el_store_suppliers_Mobilenumber">
<span<?= $Page->Mobilenumber->viewAttributes() ?>>
<?= $Page->Mobilenumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PANNumber->Visible) { // PANNumber ?>
    <tr id="r_PANNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_PANNumber"><?= $Page->PANNumber->caption() ?></span></td>
        <td data-name="PANNumber" <?= $Page->PANNumber->cellAttributes() ?>>
<span id="el_store_suppliers_PANNumber">
<span<?= $Page->PANNumber->viewAttributes() ?>>
<?= $Page->PANNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
    <tr id="r_SalesRepMobileNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_SalesRepMobileNo"><?= $Page->SalesRepMobileNo->caption() ?></span></td>
        <td data-name="SalesRepMobileNo" <?= $Page->SalesRepMobileNo->cellAttributes() ?>>
<span id="el_store_suppliers_SalesRepMobileNo">
<span<?= $Page->SalesRepMobileNo->viewAttributes() ?>>
<?= $Page->SalesRepMobileNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GSTNumber->Visible) { // GSTNumber ?>
    <tr id="r_GSTNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_GSTNumber"><?= $Page->GSTNumber->caption() ?></span></td>
        <td data-name="GSTNumber" <?= $Page->GSTNumber->cellAttributes() ?>>
<span id="el_store_suppliers_GSTNumber">
<span<?= $Page->GSTNumber->viewAttributes() ?>>
<?= $Page->GSTNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TANNumber->Visible) { // TANNumber ?>
    <tr id="r_TANNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_TANNumber"><?= $Page->TANNumber->caption() ?></span></td>
        <td data-name="TANNumber" <?= $Page->TANNumber->cellAttributes() ?>>
<span id="el_store_suppliers_TANNumber">
<span<?= $Page->TANNumber->viewAttributes() ?>>
<?= $Page->TANNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_suppliers_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_store_suppliers_id">
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
