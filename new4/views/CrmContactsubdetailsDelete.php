<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmContactsubdetailsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_contactsubdetailsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fcrm_contactsubdetailsdelete = currentForm = new ew.Form("fcrm_contactsubdetailsdelete", "delete");
    loadjs.done("fcrm_contactsubdetailsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.crm_contactsubdetails) ew.vars.tables.crm_contactsubdetails = <?= JsonEncode(GetClientVar("tables", "crm_contactsubdetails")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fcrm_contactsubdetailsdelete" id="fcrm_contactsubdetailsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_contactsubdetails">
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
<?php if ($Page->contactsubscriptionid->Visible) { // contactsubscriptionid ?>
        <th class="<?= $Page->contactsubscriptionid->headerCellClass() ?>"><span id="elh_crm_contactsubdetails_contactsubscriptionid" class="crm_contactsubdetails_contactsubscriptionid"><?= $Page->contactsubscriptionid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->birthday->Visible) { // birthday ?>
        <th class="<?= $Page->birthday->headerCellClass() ?>"><span id="elh_crm_contactsubdetails_birthday" class="crm_contactsubdetails_birthday"><?= $Page->birthday->caption() ?></span></th>
<?php } ?>
<?php if ($Page->laststayintouchrequest->Visible) { // laststayintouchrequest ?>
        <th class="<?= $Page->laststayintouchrequest->headerCellClass() ?>"><span id="elh_crm_contactsubdetails_laststayintouchrequest" class="crm_contactsubdetails_laststayintouchrequest"><?= $Page->laststayintouchrequest->caption() ?></span></th>
<?php } ?>
<?php if ($Page->laststayintouchsavedate->Visible) { // laststayintouchsavedate ?>
        <th class="<?= $Page->laststayintouchsavedate->headerCellClass() ?>"><span id="elh_crm_contactsubdetails_laststayintouchsavedate" class="crm_contactsubdetails_laststayintouchsavedate"><?= $Page->laststayintouchsavedate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leadsource->Visible) { // leadsource ?>
        <th class="<?= $Page->leadsource->headerCellClass() ?>"><span id="elh_crm_contactsubdetails_leadsource" class="crm_contactsubdetails_leadsource"><?= $Page->leadsource->caption() ?></span></th>
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
<?php if ($Page->contactsubscriptionid->Visible) { // contactsubscriptionid ?>
        <td <?= $Page->contactsubscriptionid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactsubdetails_contactsubscriptionid" class="crm_contactsubdetails_contactsubscriptionid">
<span<?= $Page->contactsubscriptionid->viewAttributes() ?>>
<?= $Page->contactsubscriptionid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->birthday->Visible) { // birthday ?>
        <td <?= $Page->birthday->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactsubdetails_birthday" class="crm_contactsubdetails_birthday">
<span<?= $Page->birthday->viewAttributes() ?>>
<?= $Page->birthday->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->laststayintouchrequest->Visible) { // laststayintouchrequest ?>
        <td <?= $Page->laststayintouchrequest->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactsubdetails_laststayintouchrequest" class="crm_contactsubdetails_laststayintouchrequest">
<span<?= $Page->laststayintouchrequest->viewAttributes() ?>>
<?= $Page->laststayintouchrequest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->laststayintouchsavedate->Visible) { // laststayintouchsavedate ?>
        <td <?= $Page->laststayintouchsavedate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactsubdetails_laststayintouchsavedate" class="crm_contactsubdetails_laststayintouchsavedate">
<span<?= $Page->laststayintouchsavedate->viewAttributes() ?>>
<?= $Page->laststayintouchsavedate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leadsource->Visible) { // leadsource ?>
        <td <?= $Page->leadsource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactsubdetails_leadsource" class="crm_contactsubdetails_leadsource">
<span<?= $Page->leadsource->viewAttributes() ?>>
<?= $Page->leadsource->getViewValue() ?></span>
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
