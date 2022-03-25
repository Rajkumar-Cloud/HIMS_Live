<?php

namespace PHPMaker2021\HIMS;

// Page object
$BanktransfertoDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fbanktransfertodelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fbanktransfertodelete = currentForm = new ew.Form("fbanktransfertodelete", "delete");
    loadjs.done("fbanktransfertodelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.banktransferto) ew.vars.tables.banktransferto = <?= JsonEncode(GetClientVar("tables", "banktransferto")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fbanktransfertodelete" id="fbanktransfertodelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="banktransferto">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_banktransferto_id" class="banktransferto_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_banktransferto_Name" class="banktransferto_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Street_Address->Visible) { // Street_Address ?>
        <th class="<?= $Page->Street_Address->headerCellClass() ?>"><span id="elh_banktransferto_Street_Address" class="banktransferto_Street_Address"><?= $Page->Street_Address->caption() ?></span></th>
<?php } ?>
<?php if ($Page->City->Visible) { // City ?>
        <th class="<?= $Page->City->headerCellClass() ?>"><span id="elh_banktransferto_City" class="banktransferto_City"><?= $Page->City->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th class="<?= $Page->State->headerCellClass() ?>"><span id="elh_banktransferto_State" class="banktransferto_State"><?= $Page->State->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Zipcode->Visible) { // Zipcode ?>
        <th class="<?= $Page->Zipcode->headerCellClass() ?>"><span id="elh_banktransferto_Zipcode" class="banktransferto_Zipcode"><?= $Page->Zipcode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mobile_Number->Visible) { // Mobile_Number ?>
        <th class="<?= $Page->Mobile_Number->headerCellClass() ?>"><span id="elh_banktransferto_Mobile_Number" class="banktransferto_Mobile_Number"><?= $Page->Mobile_Number->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AccountNo->Visible) { // AccountNo ?>
        <th class="<?= $Page->AccountNo->headerCellClass() ?>"><span id="elh_banktransferto_AccountNo" class="banktransferto_AccountNo"><?= $Page->AccountNo->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_banktransferto_id" class="banktransferto_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_banktransferto_Name" class="banktransferto_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Street_Address->Visible) { // Street_Address ?>
        <td <?= $Page->Street_Address->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_banktransferto_Street_Address" class="banktransferto_Street_Address">
<span<?= $Page->Street_Address->viewAttributes() ?>>
<?= $Page->Street_Address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->City->Visible) { // City ?>
        <td <?= $Page->City->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_banktransferto_City" class="banktransferto_City">
<span<?= $Page->City->viewAttributes() ?>>
<?= $Page->City->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <td <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_banktransferto_State" class="banktransferto_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Zipcode->Visible) { // Zipcode ?>
        <td <?= $Page->Zipcode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_banktransferto_Zipcode" class="banktransferto_Zipcode">
<span<?= $Page->Zipcode->viewAttributes() ?>>
<?= $Page->Zipcode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mobile_Number->Visible) { // Mobile_Number ?>
        <td <?= $Page->Mobile_Number->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_banktransferto_Mobile_Number" class="banktransferto_Mobile_Number">
<span<?= $Page->Mobile_Number->viewAttributes() ?>>
<?= $Page->Mobile_Number->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AccountNo->Visible) { // AccountNo ?>
        <td <?= $Page->AccountNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_banktransferto_AccountNo" class="banktransferto_AccountNo">
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
