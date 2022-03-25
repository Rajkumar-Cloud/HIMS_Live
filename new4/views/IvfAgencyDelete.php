<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfAgencyDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_agencydelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_agencydelete = currentForm = new ew.Form("fivf_agencydelete", "delete");
    loadjs.done("fivf_agencydelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.ivf_agency) ew.vars.tables.ivf_agency = <?= JsonEncode(GetClientVar("tables", "ivf_agency")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fivf_agencydelete" id="fivf_agencydelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_agency">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_agency_id" class="ivf_agency_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_ivf_agency_Name" class="ivf_agency_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Street->Visible) { // Street ?>
        <th class="<?= $Page->Street->headerCellClass() ?>"><span id="elh_ivf_agency_Street" class="ivf_agency_Street"><?= $Page->Street->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Town->Visible) { // Town ?>
        <th class="<?= $Page->Town->headerCellClass() ?>"><span id="elh_ivf_agency_Town" class="ivf_agency_Town"><?= $Page->Town->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th class="<?= $Page->State->headerCellClass() ?>"><span id="elh_ivf_agency_State" class="ivf_agency_State"><?= $Page->State->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pin->Visible) { // Pin ?>
        <th class="<?= $Page->Pin->headerCellClass() ?>"><span id="elh_ivf_agency_Pin" class="ivf_agency_Pin"><?= $Page->Pin->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_agency_id" class="ivf_agency_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_agency_Name" class="ivf_agency_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Street->Visible) { // Street ?>
        <td <?= $Page->Street->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_agency_Street" class="ivf_agency_Street">
<span<?= $Page->Street->viewAttributes() ?>>
<?= $Page->Street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Town->Visible) { // Town ?>
        <td <?= $Page->Town->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_agency_Town" class="ivf_agency_Town">
<span<?= $Page->Town->viewAttributes() ?>>
<?= $Page->Town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <td <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_agency_State" class="ivf_agency_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pin->Visible) { // Pin ?>
        <td <?= $Page->Pin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_agency_Pin" class="ivf_agency_Pin">
<span<?= $Page->Pin->viewAttributes() ?>>
<?= $Page->Pin->getViewValue() ?></span>
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
