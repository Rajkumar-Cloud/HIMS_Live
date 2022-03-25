<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrClientsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhr_clientsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fhr_clientsdelete = currentForm = new ew.Form("fhr_clientsdelete", "delete");
    loadjs.done("fhr_clientsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.hr_clients) ew.vars.tables.hr_clients = <?= JsonEncode(GetClientVar("tables", "hr_clients")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fhr_clientsdelete" id="fhr_clientsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_clients">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_hr_clients_id" class="hr_clients_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th class="<?= $Page->name->headerCellClass() ?>"><span id="elh_hr_clients_name" class="hr_clients_name"><?= $Page->name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->first_contact_date->Visible) { // first_contact_date ?>
        <th class="<?= $Page->first_contact_date->headerCellClass() ?>"><span id="elh_hr_clients_first_contact_date" class="hr_clients_first_contact_date"><?= $Page->first_contact_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th class="<?= $Page->created->headerCellClass() ?>"><span id="elh_hr_clients_created" class="hr_clients_created"><?= $Page->created->caption() ?></span></th>
<?php } ?>
<?php if ($Page->contact_number->Visible) { // contact_number ?>
        <th class="<?= $Page->contact_number->headerCellClass() ?>"><span id="elh_hr_clients_contact_number" class="hr_clients_contact_number"><?= $Page->contact_number->caption() ?></span></th>
<?php } ?>
<?php if ($Page->contact_email->Visible) { // contact_email ?>
        <th class="<?= $Page->contact_email->headerCellClass() ?>"><span id="elh_hr_clients_contact_email" class="hr_clients_contact_email"><?= $Page->contact_email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_hr_clients_status" class="hr_clients_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_hr_clients_HospID" class="hr_clients_HospID"><?= $Page->HospID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_hr_clients_id" class="hr_clients_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <td <?= $Page->name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_clients_name" class="hr_clients_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->first_contact_date->Visible) { // first_contact_date ?>
        <td <?= $Page->first_contact_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_clients_first_contact_date" class="hr_clients_first_contact_date">
<span<?= $Page->first_contact_date->viewAttributes() ?>>
<?= $Page->first_contact_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <td <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_clients_created" class="hr_clients_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->contact_number->Visible) { // contact_number ?>
        <td <?= $Page->contact_number->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_clients_contact_number" class="hr_clients_contact_number">
<span<?= $Page->contact_number->viewAttributes() ?>>
<?= $Page->contact_number->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->contact_email->Visible) { // contact_email ?>
        <td <?= $Page->contact_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_clients_contact_email" class="hr_clients_contact_email">
<span<?= $Page->contact_email->viewAttributes() ?>>
<?= $Page->contact_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_clients_status" class="hr_clients_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_clients_HospID" class="hr_clients_HospID">
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
