<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyCustomersDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_customersdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_customersdelete = currentForm = new ew.Form("fpharmacy_customersdelete", "delete");
    loadjs.done("fpharmacy_customersdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.pharmacy_customers) ew.vars.tables.pharmacy_customers = <?= JsonEncode(GetClientVar("tables", "pharmacy_customers")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_customersdelete" id="fpharmacy_customersdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_customers">
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
<?php if ($Page->Customercode->Visible) { // Customercode ?>
        <th class="<?= $Page->Customercode->headerCellClass() ?>"><span id="elh_pharmacy_customers_Customercode" class="pharmacy_customers_Customercode"><?= $Page->Customercode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
        <th class="<?= $Page->Address1->headerCellClass() ?>"><span id="elh_pharmacy_customers_Address1" class="pharmacy_customers_Address1"><?= $Page->Address1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
        <th class="<?= $Page->Address2->headerCellClass() ?>"><span id="elh_pharmacy_customers_Address2" class="pharmacy_customers_Address2"><?= $Page->Address2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
        <th class="<?= $Page->Address3->headerCellClass() ?>"><span id="elh_pharmacy_customers_Address3" class="pharmacy_customers_Address3"><?= $Page->Address3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th class="<?= $Page->State->headerCellClass() ?>"><span id="elh_pharmacy_customers_State" class="pharmacy_customers_State"><?= $Page->State->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <th class="<?= $Page->Pincode->headerCellClass() ?>"><span id="elh_pharmacy_customers_Pincode" class="pharmacy_customers_Pincode"><?= $Page->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <th class="<?= $Page->Phone->headerCellClass() ?>"><span id="elh_pharmacy_customers_Phone" class="pharmacy_customers_Phone"><?= $Page->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <th class="<?= $Page->Fax->headerCellClass() ?>"><span id="elh_pharmacy_customers_Fax" class="pharmacy_customers_Fax"><?= $Page->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_Email->Visible) { // Email ?>
        <th class="<?= $Page->_Email->headerCellClass() ?>"><span id="elh_pharmacy_customers__Email" class="pharmacy_customers__Email"><?= $Page->_Email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Ratetype->Visible) { // Ratetype ?>
        <th class="<?= $Page->Ratetype->headerCellClass() ?>"><span id="elh_pharmacy_customers_Ratetype" class="pharmacy_customers_Ratetype"><?= $Page->Ratetype->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Creationdate->Visible) { // Creationdate ?>
        <th class="<?= $Page->Creationdate->headerCellClass() ?>"><span id="elh_pharmacy_customers_Creationdate" class="pharmacy_customers_Creationdate"><?= $Page->Creationdate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ContactPerson->Visible) { // ContactPerson ?>
        <th class="<?= $Page->ContactPerson->headerCellClass() ?>"><span id="elh_pharmacy_customers_ContactPerson" class="pharmacy_customers_ContactPerson"><?= $Page->ContactPerson->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CPPhone->Visible) { // CPPhone ?>
        <th class="<?= $Page->CPPhone->headerCellClass() ?>"><span id="elh_pharmacy_customers_CPPhone" class="pharmacy_customers_CPPhone"><?= $Page->CPPhone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_customers_id" class="pharmacy_customers_id"><?= $Page->id->caption() ?></span></th>
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
<?php if ($Page->Customercode->Visible) { // Customercode ?>
        <td <?= $Page->Customercode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Customercode" class="pharmacy_customers_Customercode">
<span<?= $Page->Customercode->viewAttributes() ?>>
<?= $Page->Customercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
        <td <?= $Page->Address1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Address1" class="pharmacy_customers_Address1">
<span<?= $Page->Address1->viewAttributes() ?>>
<?= $Page->Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
        <td <?= $Page->Address2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Address2" class="pharmacy_customers_Address2">
<span<?= $Page->Address2->viewAttributes() ?>>
<?= $Page->Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
        <td <?= $Page->Address3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Address3" class="pharmacy_customers_Address3">
<span<?= $Page->Address3->viewAttributes() ?>>
<?= $Page->Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <td <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_State" class="pharmacy_customers_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td <?= $Page->Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Pincode" class="pharmacy_customers_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <td <?= $Page->Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Phone" class="pharmacy_customers_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <td <?= $Page->Fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Fax" class="pharmacy_customers_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_Email->Visible) { // Email ?>
        <td <?= $Page->_Email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers__Email" class="pharmacy_customers__Email">
<span<?= $Page->_Email->viewAttributes() ?>>
<?= $Page->_Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Ratetype->Visible) { // Ratetype ?>
        <td <?= $Page->Ratetype->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Ratetype" class="pharmacy_customers_Ratetype">
<span<?= $Page->Ratetype->viewAttributes() ?>>
<?= $Page->Ratetype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Creationdate->Visible) { // Creationdate ?>
        <td <?= $Page->Creationdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Creationdate" class="pharmacy_customers_Creationdate">
<span<?= $Page->Creationdate->viewAttributes() ?>>
<?= $Page->Creationdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ContactPerson->Visible) { // ContactPerson ?>
        <td <?= $Page->ContactPerson->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_ContactPerson" class="pharmacy_customers_ContactPerson">
<span<?= $Page->ContactPerson->viewAttributes() ?>>
<?= $Page->ContactPerson->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CPPhone->Visible) { // CPPhone ?>
        <td <?= $Page->CPPhone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_CPPhone" class="pharmacy_customers_CPPhone">
<span<?= $Page->CPPhone->viewAttributes() ?>>
<?= $Page->CPPhone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_id" class="pharmacy_customers_id">
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
