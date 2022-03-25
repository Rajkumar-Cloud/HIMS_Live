<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasClinicaldetailsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_clinicaldetailsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fmas_clinicaldetailsdelete = currentForm = new ew.Form("fmas_clinicaldetailsdelete", "delete");
    loadjs.done("fmas_clinicaldetailsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.mas_clinicaldetails) ew.vars.tables.mas_clinicaldetails = <?= JsonEncode(GetClientVar("tables", "mas_clinicaldetails")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fmas_clinicaldetailsdelete" id="fmas_clinicaldetailsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_clinicaldetails">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_mas_clinicaldetails_id" class="mas_clinicaldetails_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ClinicalDetails->Visible) { // ClinicalDetails ?>
        <th class="<?= $Page->ClinicalDetails->headerCellClass() ?>"><span id="elh_mas_clinicaldetails_ClinicalDetails" class="mas_clinicaldetails_ClinicalDetails"><?= $Page->ClinicalDetails->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_mas_clinicaldetails_id" class="mas_clinicaldetails_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ClinicalDetails->Visible) { // ClinicalDetails ?>
        <td <?= $Page->ClinicalDetails->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_clinicaldetails_ClinicalDetails" class="mas_clinicaldetails_ClinicalDetails">
<span<?= $Page->ClinicalDetails->viewAttributes() ?>>
<?= $Page->ClinicalDetails->getViewValue() ?></span>
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
