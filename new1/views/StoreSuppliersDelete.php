<?php

namespace PHPMaker2021\project3;

// Page object
$StoreSuppliersDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fstore_suppliersdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fstore_suppliersdelete = currentForm = new ew.Form("fstore_suppliersdelete", "delete");
    loadjs.done("fstore_suppliersdelete");
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
<form name="fstore_suppliersdelete" id="fstore_suppliersdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_suppliers">
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
<?php if ($Page->Suppliercode->Visible) { // Suppliercode ?>
        <th class="<?= $Page->Suppliercode->headerCellClass() ?>"><span id="elh_store_suppliers_Suppliercode" class="store_suppliers_Suppliercode"><?= $Page->Suppliercode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Suppliername->Visible) { // Suppliername ?>
        <th class="<?= $Page->Suppliername->headerCellClass() ?>"><span id="elh_store_suppliers_Suppliername" class="store_suppliers_Suppliername"><?= $Page->Suppliername->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Abbreviation->Visible) { // Abbreviation ?>
        <th class="<?= $Page->Abbreviation->headerCellClass() ?>"><span id="elh_store_suppliers_Abbreviation" class="store_suppliers_Abbreviation"><?= $Page->Abbreviation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Creationdate->Visible) { // Creationdate ?>
        <th class="<?= $Page->Creationdate->headerCellClass() ?>"><span id="elh_store_suppliers_Creationdate" class="store_suppliers_Creationdate"><?= $Page->Creationdate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
        <th class="<?= $Page->Address1->headerCellClass() ?>"><span id="elh_store_suppliers_Address1" class="store_suppliers_Address1"><?= $Page->Address1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
        <th class="<?= $Page->Address2->headerCellClass() ?>"><span id="elh_store_suppliers_Address2" class="store_suppliers_Address2"><?= $Page->Address2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
        <th class="<?= $Page->Address3->headerCellClass() ?>"><span id="elh_store_suppliers_Address3" class="store_suppliers_Address3"><?= $Page->Address3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Citycode->Visible) { // Citycode ?>
        <th class="<?= $Page->Citycode->headerCellClass() ?>"><span id="elh_store_suppliers_Citycode" class="store_suppliers_Citycode"><?= $Page->Citycode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th class="<?= $Page->State->headerCellClass() ?>"><span id="elh_store_suppliers_State" class="store_suppliers_State"><?= $Page->State->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <th class="<?= $Page->Pincode->headerCellClass() ?>"><span id="elh_store_suppliers_Pincode" class="store_suppliers_Pincode"><?= $Page->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tngstnumber->Visible) { // Tngstnumber ?>
        <th class="<?= $Page->Tngstnumber->headerCellClass() ?>"><span id="elh_store_suppliers_Tngstnumber" class="store_suppliers_Tngstnumber"><?= $Page->Tngstnumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <th class="<?= $Page->Phone->headerCellClass() ?>"><span id="elh_store_suppliers_Phone" class="store_suppliers_Phone"><?= $Page->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <th class="<?= $Page->Fax->headerCellClass() ?>"><span id="elh_store_suppliers_Fax" class="store_suppliers_Fax"><?= $Page->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_Email->Visible) { // Email ?>
        <th class="<?= $Page->_Email->headerCellClass() ?>"><span id="elh_store_suppliers__Email" class="store_suppliers__Email"><?= $Page->_Email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Paymentmode->Visible) { // Paymentmode ?>
        <th class="<?= $Page->Paymentmode->headerCellClass() ?>"><span id="elh_store_suppliers_Paymentmode" class="store_suppliers_Paymentmode"><?= $Page->Paymentmode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Contactperson1->Visible) { // Contactperson1 ?>
        <th class="<?= $Page->Contactperson1->headerCellClass() ?>"><span id="elh_store_suppliers_Contactperson1" class="store_suppliers_Contactperson1"><?= $Page->Contactperson1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP1Address1->Visible) { // CP1Address1 ?>
        <th class="<?= $Page->CP1Address1->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Address1" class="store_suppliers_CP1Address1"><?= $Page->CP1Address1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP1Address2->Visible) { // CP1Address2 ?>
        <th class="<?= $Page->CP1Address2->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Address2" class="store_suppliers_CP1Address2"><?= $Page->CP1Address2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP1Address3->Visible) { // CP1Address3 ?>
        <th class="<?= $Page->CP1Address3->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Address3" class="store_suppliers_CP1Address3"><?= $Page->CP1Address3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP1Citycode->Visible) { // CP1Citycode ?>
        <th class="<?= $Page->CP1Citycode->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Citycode" class="store_suppliers_CP1Citycode"><?= $Page->CP1Citycode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP1State->Visible) { // CP1State ?>
        <th class="<?= $Page->CP1State->headerCellClass() ?>"><span id="elh_store_suppliers_CP1State" class="store_suppliers_CP1State"><?= $Page->CP1State->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP1Pincode->Visible) { // CP1Pincode ?>
        <th class="<?= $Page->CP1Pincode->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Pincode" class="store_suppliers_CP1Pincode"><?= $Page->CP1Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP1Designation->Visible) { // CP1Designation ?>
        <th class="<?= $Page->CP1Designation->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Designation" class="store_suppliers_CP1Designation"><?= $Page->CP1Designation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP1Phone->Visible) { // CP1Phone ?>
        <th class="<?= $Page->CP1Phone->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Phone" class="store_suppliers_CP1Phone"><?= $Page->CP1Phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP1MobileNo->Visible) { // CP1MobileNo ?>
        <th class="<?= $Page->CP1MobileNo->headerCellClass() ?>"><span id="elh_store_suppliers_CP1MobileNo" class="store_suppliers_CP1MobileNo"><?= $Page->CP1MobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP1Fax->Visible) { // CP1Fax ?>
        <th class="<?= $Page->CP1Fax->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Fax" class="store_suppliers_CP1Fax"><?= $Page->CP1Fax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP1Email->Visible) { // CP1Email ?>
        <th class="<?= $Page->CP1Email->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Email" class="store_suppliers_CP1Email"><?= $Page->CP1Email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Contactperson2->Visible) { // Contactperson2 ?>
        <th class="<?= $Page->Contactperson2->headerCellClass() ?>"><span id="elh_store_suppliers_Contactperson2" class="store_suppliers_Contactperson2"><?= $Page->Contactperson2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP2Address1->Visible) { // CP2Address1 ?>
        <th class="<?= $Page->CP2Address1->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Address1" class="store_suppliers_CP2Address1"><?= $Page->CP2Address1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP2Address2->Visible) { // CP2Address2 ?>
        <th class="<?= $Page->CP2Address2->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Address2" class="store_suppliers_CP2Address2"><?= $Page->CP2Address2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP2Address3->Visible) { // CP2Address3 ?>
        <th class="<?= $Page->CP2Address3->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Address3" class="store_suppliers_CP2Address3"><?= $Page->CP2Address3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP2Citycode->Visible) { // CP2Citycode ?>
        <th class="<?= $Page->CP2Citycode->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Citycode" class="store_suppliers_CP2Citycode"><?= $Page->CP2Citycode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP2State->Visible) { // CP2State ?>
        <th class="<?= $Page->CP2State->headerCellClass() ?>"><span id="elh_store_suppliers_CP2State" class="store_suppliers_CP2State"><?= $Page->CP2State->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP2Pincode->Visible) { // CP2Pincode ?>
        <th class="<?= $Page->CP2Pincode->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Pincode" class="store_suppliers_CP2Pincode"><?= $Page->CP2Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP2Designation->Visible) { // CP2Designation ?>
        <th class="<?= $Page->CP2Designation->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Designation" class="store_suppliers_CP2Designation"><?= $Page->CP2Designation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP2Phone->Visible) { // CP2Phone ?>
        <th class="<?= $Page->CP2Phone->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Phone" class="store_suppliers_CP2Phone"><?= $Page->CP2Phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP2MobileNo->Visible) { // CP2MobileNo ?>
        <th class="<?= $Page->CP2MobileNo->headerCellClass() ?>"><span id="elh_store_suppliers_CP2MobileNo" class="store_suppliers_CP2MobileNo"><?= $Page->CP2MobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP2Fax->Visible) { // CP2Fax ?>
        <th class="<?= $Page->CP2Fax->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Fax" class="store_suppliers_CP2Fax"><?= $Page->CP2Fax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CP2Email->Visible) { // CP2Email ?>
        <th class="<?= $Page->CP2Email->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Email" class="store_suppliers_CP2Email"><?= $Page->CP2Email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <th class="<?= $Page->Type->headerCellClass() ?>"><span id="elh_store_suppliers_Type" class="store_suppliers_Type"><?= $Page->Type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Creditterms->Visible) { // Creditterms ?>
        <th class="<?= $Page->Creditterms->headerCellClass() ?>"><span id="elh_store_suppliers_Creditterms" class="store_suppliers_Creditterms"><?= $Page->Creditterms->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th class="<?= $Page->Remarks->headerCellClass() ?>"><span id="elh_store_suppliers_Remarks" class="store_suppliers_Remarks"><?= $Page->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tinnumber->Visible) { // Tinnumber ?>
        <th class="<?= $Page->Tinnumber->headerCellClass() ?>"><span id="elh_store_suppliers_Tinnumber" class="store_suppliers_Tinnumber"><?= $Page->Tinnumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
        <th class="<?= $Page->Universalsuppliercode->headerCellClass() ?>"><span id="elh_store_suppliers_Universalsuppliercode" class="store_suppliers_Universalsuppliercode"><?= $Page->Universalsuppliercode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mobilenumber->Visible) { // Mobilenumber ?>
        <th class="<?= $Page->Mobilenumber->headerCellClass() ?>"><span id="elh_store_suppliers_Mobilenumber" class="store_suppliers_Mobilenumber"><?= $Page->Mobilenumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PANNumber->Visible) { // PANNumber ?>
        <th class="<?= $Page->PANNumber->headerCellClass() ?>"><span id="elh_store_suppliers_PANNumber" class="store_suppliers_PANNumber"><?= $Page->PANNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
        <th class="<?= $Page->SalesRepMobileNo->headerCellClass() ?>"><span id="elh_store_suppliers_SalesRepMobileNo" class="store_suppliers_SalesRepMobileNo"><?= $Page->SalesRepMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GSTNumber->Visible) { // GSTNumber ?>
        <th class="<?= $Page->GSTNumber->headerCellClass() ?>"><span id="elh_store_suppliers_GSTNumber" class="store_suppliers_GSTNumber"><?= $Page->GSTNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TANNumber->Visible) { // TANNumber ?>
        <th class="<?= $Page->TANNumber->headerCellClass() ?>"><span id="elh_store_suppliers_TANNumber" class="store_suppliers_TANNumber"><?= $Page->TANNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_store_suppliers_id" class="store_suppliers_id"><?= $Page->id->caption() ?></span></th>
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
<?php if ($Page->Suppliercode->Visible) { // Suppliercode ?>
        <td <?= $Page->Suppliercode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Suppliercode" class="store_suppliers_Suppliercode">
<span<?= $Page->Suppliercode->viewAttributes() ?>>
<?= $Page->Suppliercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Suppliername->Visible) { // Suppliername ?>
        <td <?= $Page->Suppliername->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Suppliername" class="store_suppliers_Suppliername">
<span<?= $Page->Suppliername->viewAttributes() ?>>
<?= $Page->Suppliername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Abbreviation->Visible) { // Abbreviation ?>
        <td <?= $Page->Abbreviation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Abbreviation" class="store_suppliers_Abbreviation">
<span<?= $Page->Abbreviation->viewAttributes() ?>>
<?= $Page->Abbreviation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Creationdate->Visible) { // Creationdate ?>
        <td <?= $Page->Creationdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Creationdate" class="store_suppliers_Creationdate">
<span<?= $Page->Creationdate->viewAttributes() ?>>
<?= $Page->Creationdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
        <td <?= $Page->Address1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Address1" class="store_suppliers_Address1">
<span<?= $Page->Address1->viewAttributes() ?>>
<?= $Page->Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
        <td <?= $Page->Address2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Address2" class="store_suppliers_Address2">
<span<?= $Page->Address2->viewAttributes() ?>>
<?= $Page->Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
        <td <?= $Page->Address3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Address3" class="store_suppliers_Address3">
<span<?= $Page->Address3->viewAttributes() ?>>
<?= $Page->Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Citycode->Visible) { // Citycode ?>
        <td <?= $Page->Citycode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Citycode" class="store_suppliers_Citycode">
<span<?= $Page->Citycode->viewAttributes() ?>>
<?= $Page->Citycode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <td <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_State" class="store_suppliers_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td <?= $Page->Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Pincode" class="store_suppliers_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tngstnumber->Visible) { // Tngstnumber ?>
        <td <?= $Page->Tngstnumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Tngstnumber" class="store_suppliers_Tngstnumber">
<span<?= $Page->Tngstnumber->viewAttributes() ?>>
<?= $Page->Tngstnumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <td <?= $Page->Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Phone" class="store_suppliers_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <td <?= $Page->Fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Fax" class="store_suppliers_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_Email->Visible) { // Email ?>
        <td <?= $Page->_Email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers__Email" class="store_suppliers__Email">
<span<?= $Page->_Email->viewAttributes() ?>>
<?= $Page->_Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Paymentmode->Visible) { // Paymentmode ?>
        <td <?= $Page->Paymentmode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Paymentmode" class="store_suppliers_Paymentmode">
<span<?= $Page->Paymentmode->viewAttributes() ?>>
<?= $Page->Paymentmode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Contactperson1->Visible) { // Contactperson1 ?>
        <td <?= $Page->Contactperson1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Contactperson1" class="store_suppliers_Contactperson1">
<span<?= $Page->Contactperson1->viewAttributes() ?>>
<?= $Page->Contactperson1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP1Address1->Visible) { // CP1Address1 ?>
        <td <?= $Page->CP1Address1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP1Address1" class="store_suppliers_CP1Address1">
<span<?= $Page->CP1Address1->viewAttributes() ?>>
<?= $Page->CP1Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP1Address2->Visible) { // CP1Address2 ?>
        <td <?= $Page->CP1Address2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP1Address2" class="store_suppliers_CP1Address2">
<span<?= $Page->CP1Address2->viewAttributes() ?>>
<?= $Page->CP1Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP1Address3->Visible) { // CP1Address3 ?>
        <td <?= $Page->CP1Address3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP1Address3" class="store_suppliers_CP1Address3">
<span<?= $Page->CP1Address3->viewAttributes() ?>>
<?= $Page->CP1Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP1Citycode->Visible) { // CP1Citycode ?>
        <td <?= $Page->CP1Citycode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP1Citycode" class="store_suppliers_CP1Citycode">
<span<?= $Page->CP1Citycode->viewAttributes() ?>>
<?= $Page->CP1Citycode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP1State->Visible) { // CP1State ?>
        <td <?= $Page->CP1State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP1State" class="store_suppliers_CP1State">
<span<?= $Page->CP1State->viewAttributes() ?>>
<?= $Page->CP1State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP1Pincode->Visible) { // CP1Pincode ?>
        <td <?= $Page->CP1Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP1Pincode" class="store_suppliers_CP1Pincode">
<span<?= $Page->CP1Pincode->viewAttributes() ?>>
<?= $Page->CP1Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP1Designation->Visible) { // CP1Designation ?>
        <td <?= $Page->CP1Designation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP1Designation" class="store_suppliers_CP1Designation">
<span<?= $Page->CP1Designation->viewAttributes() ?>>
<?= $Page->CP1Designation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP1Phone->Visible) { // CP1Phone ?>
        <td <?= $Page->CP1Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP1Phone" class="store_suppliers_CP1Phone">
<span<?= $Page->CP1Phone->viewAttributes() ?>>
<?= $Page->CP1Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP1MobileNo->Visible) { // CP1MobileNo ?>
        <td <?= $Page->CP1MobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP1MobileNo" class="store_suppliers_CP1MobileNo">
<span<?= $Page->CP1MobileNo->viewAttributes() ?>>
<?= $Page->CP1MobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP1Fax->Visible) { // CP1Fax ?>
        <td <?= $Page->CP1Fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP1Fax" class="store_suppliers_CP1Fax">
<span<?= $Page->CP1Fax->viewAttributes() ?>>
<?= $Page->CP1Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP1Email->Visible) { // CP1Email ?>
        <td <?= $Page->CP1Email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP1Email" class="store_suppliers_CP1Email">
<span<?= $Page->CP1Email->viewAttributes() ?>>
<?= $Page->CP1Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Contactperson2->Visible) { // Contactperson2 ?>
        <td <?= $Page->Contactperson2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Contactperson2" class="store_suppliers_Contactperson2">
<span<?= $Page->Contactperson2->viewAttributes() ?>>
<?= $Page->Contactperson2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP2Address1->Visible) { // CP2Address1 ?>
        <td <?= $Page->CP2Address1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP2Address1" class="store_suppliers_CP2Address1">
<span<?= $Page->CP2Address1->viewAttributes() ?>>
<?= $Page->CP2Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP2Address2->Visible) { // CP2Address2 ?>
        <td <?= $Page->CP2Address2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP2Address2" class="store_suppliers_CP2Address2">
<span<?= $Page->CP2Address2->viewAttributes() ?>>
<?= $Page->CP2Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP2Address3->Visible) { // CP2Address3 ?>
        <td <?= $Page->CP2Address3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP2Address3" class="store_suppliers_CP2Address3">
<span<?= $Page->CP2Address3->viewAttributes() ?>>
<?= $Page->CP2Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP2Citycode->Visible) { // CP2Citycode ?>
        <td <?= $Page->CP2Citycode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP2Citycode" class="store_suppliers_CP2Citycode">
<span<?= $Page->CP2Citycode->viewAttributes() ?>>
<?= $Page->CP2Citycode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP2State->Visible) { // CP2State ?>
        <td <?= $Page->CP2State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP2State" class="store_suppliers_CP2State">
<span<?= $Page->CP2State->viewAttributes() ?>>
<?= $Page->CP2State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP2Pincode->Visible) { // CP2Pincode ?>
        <td <?= $Page->CP2Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP2Pincode" class="store_suppliers_CP2Pincode">
<span<?= $Page->CP2Pincode->viewAttributes() ?>>
<?= $Page->CP2Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP2Designation->Visible) { // CP2Designation ?>
        <td <?= $Page->CP2Designation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP2Designation" class="store_suppliers_CP2Designation">
<span<?= $Page->CP2Designation->viewAttributes() ?>>
<?= $Page->CP2Designation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP2Phone->Visible) { // CP2Phone ?>
        <td <?= $Page->CP2Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP2Phone" class="store_suppliers_CP2Phone">
<span<?= $Page->CP2Phone->viewAttributes() ?>>
<?= $Page->CP2Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP2MobileNo->Visible) { // CP2MobileNo ?>
        <td <?= $Page->CP2MobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP2MobileNo" class="store_suppliers_CP2MobileNo">
<span<?= $Page->CP2MobileNo->viewAttributes() ?>>
<?= $Page->CP2MobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP2Fax->Visible) { // CP2Fax ?>
        <td <?= $Page->CP2Fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP2Fax" class="store_suppliers_CP2Fax">
<span<?= $Page->CP2Fax->viewAttributes() ?>>
<?= $Page->CP2Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CP2Email->Visible) { // CP2Email ?>
        <td <?= $Page->CP2Email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_CP2Email" class="store_suppliers_CP2Email">
<span<?= $Page->CP2Email->viewAttributes() ?>>
<?= $Page->CP2Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <td <?= $Page->Type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Type" class="store_suppliers_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Creditterms->Visible) { // Creditterms ?>
        <td <?= $Page->Creditterms->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Creditterms" class="store_suppliers_Creditterms">
<span<?= $Page->Creditterms->viewAttributes() ?>>
<?= $Page->Creditterms->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Remarks" class="store_suppliers_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tinnumber->Visible) { // Tinnumber ?>
        <td <?= $Page->Tinnumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Tinnumber" class="store_suppliers_Tinnumber">
<span<?= $Page->Tinnumber->viewAttributes() ?>>
<?= $Page->Tinnumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
        <td <?= $Page->Universalsuppliercode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Universalsuppliercode" class="store_suppliers_Universalsuppliercode">
<span<?= $Page->Universalsuppliercode->viewAttributes() ?>>
<?= $Page->Universalsuppliercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mobilenumber->Visible) { // Mobilenumber ?>
        <td <?= $Page->Mobilenumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_Mobilenumber" class="store_suppliers_Mobilenumber">
<span<?= $Page->Mobilenumber->viewAttributes() ?>>
<?= $Page->Mobilenumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PANNumber->Visible) { // PANNumber ?>
        <td <?= $Page->PANNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_PANNumber" class="store_suppliers_PANNumber">
<span<?= $Page->PANNumber->viewAttributes() ?>>
<?= $Page->PANNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
        <td <?= $Page->SalesRepMobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_SalesRepMobileNo" class="store_suppliers_SalesRepMobileNo">
<span<?= $Page->SalesRepMobileNo->viewAttributes() ?>>
<?= $Page->SalesRepMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GSTNumber->Visible) { // GSTNumber ?>
        <td <?= $Page->GSTNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_GSTNumber" class="store_suppliers_GSTNumber">
<span<?= $Page->GSTNumber->viewAttributes() ?>>
<?= $Page->GSTNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TANNumber->Visible) { // TANNumber ?>
        <td <?= $Page->TANNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_TANNumber" class="store_suppliers_TANNumber">
<span<?= $Page->TANNumber->viewAttributes() ?>>
<?= $Page->TANNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_suppliers_id" class="store_suppliers_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
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
