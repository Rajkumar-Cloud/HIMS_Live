<?php

namespace PHPMaker2021\HIMS;

// Page object
$SmsCintentDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fsms_cintentdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fsms_cintentdelete = currentForm = new ew.Form("fsms_cintentdelete", "delete");
    loadjs.done("fsms_cintentdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.sms_cintent) ew.vars.tables.sms_cintent = <?= JsonEncode(GetClientVar("tables", "sms_cintent")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fsms_cintentdelete" id="fsms_cintentdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="sms_cintent">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_sms_cintent_id" class="sms_cintent_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SMSType->Visible) { // SMSType ?>
        <th class="<?= $Page->SMSType->headerCellClass() ?>"><span id="elh_sms_cintent_SMSType" class="sms_cintent_SMSType"><?= $Page->SMSType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_Content->Visible) { // Content ?>
        <th class="<?= $Page->_Content->headerCellClass() ?>"><span id="elh_sms_cintent__Content" class="sms_cintent__Content"><?= $Page->_Content->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Enabled->Visible) { // Enabled ?>
        <th class="<?= $Page->Enabled->headerCellClass() ?>"><span id="elh_sms_cintent_Enabled" class="sms_cintent_Enabled"><?= $Page->Enabled->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_sms_cintent_HospID" class="sms_cintent_HospID"><?= $Page->HospID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_sms_cintent_id" class="sms_cintent_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SMSType->Visible) { // SMSType ?>
        <td <?= $Page->SMSType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_sms_cintent_SMSType" class="sms_cintent_SMSType">
<span<?= $Page->SMSType->viewAttributes() ?>>
<?= $Page->SMSType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_Content->Visible) { // Content ?>
        <td <?= $Page->_Content->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_sms_cintent__Content" class="sms_cintent__Content">
<span<?= $Page->_Content->viewAttributes() ?>>
<?= $Page->_Content->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Enabled->Visible) { // Enabled ?>
        <td <?= $Page->Enabled->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_sms_cintent_Enabled" class="sms_cintent_Enabled">
<span<?= $Page->Enabled->viewAttributes() ?>>
<?= $Page->Enabled->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_sms_cintent_HospID" class="sms_cintent_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
