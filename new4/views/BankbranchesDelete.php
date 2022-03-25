<?php

namespace PHPMaker2021\HIMS;

// Page object
$BankbranchesDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fbankbranchesdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fbankbranchesdelete = currentForm = new ew.Form("fbankbranchesdelete", "delete");
    loadjs.done("fbankbranchesdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.bankbranches) ew.vars.tables.bankbranches = <?= JsonEncode(GetClientVar("tables", "bankbranches")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fbankbranchesdelete" id="fbankbranchesdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="bankbranches">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_bankbranches_id" class="bankbranches_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Branch_Name->Visible) { // Branch_Name ?>
        <th class="<?= $Page->Branch_Name->headerCellClass() ?>"><span id="elh_bankbranches_Branch_Name" class="bankbranches_Branch_Name"><?= $Page->Branch_Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Street_Address->Visible) { // Street_Address ?>
        <th class="<?= $Page->Street_Address->headerCellClass() ?>"><span id="elh_bankbranches_Street_Address" class="bankbranches_Street_Address"><?= $Page->Street_Address->caption() ?></span></th>
<?php } ?>
<?php if ($Page->City->Visible) { // City ?>
        <th class="<?= $Page->City->headerCellClass() ?>"><span id="elh_bankbranches_City" class="bankbranches_City"><?= $Page->City->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th class="<?= $Page->State->headerCellClass() ?>"><span id="elh_bankbranches_State" class="bankbranches_State"><?= $Page->State->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Zipcode->Visible) { // Zipcode ?>
        <th class="<?= $Page->Zipcode->headerCellClass() ?>"><span id="elh_bankbranches_Zipcode" class="bankbranches_Zipcode"><?= $Page->Zipcode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Phone_Number->Visible) { // Phone_Number ?>
        <th class="<?= $Page->Phone_Number->headerCellClass() ?>"><span id="elh_bankbranches_Phone_Number" class="bankbranches_Phone_Number"><?= $Page->Phone_Number->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AccountNo->Visible) { // AccountNo ?>
        <th class="<?= $Page->AccountNo->headerCellClass() ?>"><span id="elh_bankbranches_AccountNo" class="bankbranches_AccountNo"><?= $Page->AccountNo->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_bankbranches_id" class="bankbranches_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Branch_Name->Visible) { // Branch_Name ?>
        <td <?= $Page->Branch_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_bankbranches_Branch_Name" class="bankbranches_Branch_Name">
<span<?= $Page->Branch_Name->viewAttributes() ?>>
<?= $Page->Branch_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Street_Address->Visible) { // Street_Address ?>
        <td <?= $Page->Street_Address->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_bankbranches_Street_Address" class="bankbranches_Street_Address">
<span<?= $Page->Street_Address->viewAttributes() ?>>
<?= $Page->Street_Address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->City->Visible) { // City ?>
        <td <?= $Page->City->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_bankbranches_City" class="bankbranches_City">
<span<?= $Page->City->viewAttributes() ?>>
<?= $Page->City->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <td <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_bankbranches_State" class="bankbranches_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Zipcode->Visible) { // Zipcode ?>
        <td <?= $Page->Zipcode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_bankbranches_Zipcode" class="bankbranches_Zipcode">
<span<?= $Page->Zipcode->viewAttributes() ?>>
<?= $Page->Zipcode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Phone_Number->Visible) { // Phone_Number ?>
        <td <?= $Page->Phone_Number->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_bankbranches_Phone_Number" class="bankbranches_Phone_Number">
<span<?= $Page->Phone_Number->viewAttributes() ?>>
<?= $Page->Phone_Number->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AccountNo->Visible) { // AccountNo ?>
        <td <?= $Page->AccountNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_bankbranches_AccountNo" class="bankbranches_AccountNo">
<span<?= $Page->AccountNo->viewAttributes() ?>>
<?= $Page->AccountNo->getViewValue() ?></span>
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
