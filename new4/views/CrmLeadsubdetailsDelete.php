<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadsubdetailsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_leadsubdetailsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fcrm_leadsubdetailsdelete = currentForm = new ew.Form("fcrm_leadsubdetailsdelete", "delete");
    loadjs.done("fcrm_leadsubdetailsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.crm_leadsubdetails) ew.vars.tables.crm_leadsubdetails = <?= JsonEncode(GetClientVar("tables", "crm_leadsubdetails")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fcrm_leadsubdetailsdelete" id="fcrm_leadsubdetailsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leadsubdetails">
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
<?php if ($Page->leadsubscriptionid->Visible) { // leadsubscriptionid ?>
        <th class="<?= $Page->leadsubscriptionid->headerCellClass() ?>"><span id="elh_crm_leadsubdetails_leadsubscriptionid" class="crm_leadsubdetails_leadsubscriptionid"><?= $Page->leadsubscriptionid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->website->Visible) { // website ?>
        <th class="<?= $Page->website->headerCellClass() ?>"><span id="elh_crm_leadsubdetails_website" class="crm_leadsubdetails_website"><?= $Page->website->caption() ?></span></th>
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
<?php if ($Page->leadsubscriptionid->Visible) { // leadsubscriptionid ?>
        <td <?= $Page->leadsubscriptionid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadsubdetails_leadsubscriptionid" class="crm_leadsubdetails_leadsubscriptionid">
<span<?= $Page->leadsubscriptionid->viewAttributes() ?>>
<?= $Page->leadsubscriptionid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->website->Visible) { // website ?>
        <td <?= $Page->website->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadsubdetails_website" class="crm_leadsubdetails_website">
<span<?= $Page->website->viewAttributes() ?>>
<?= $Page->website->getViewValue() ?></span>
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
