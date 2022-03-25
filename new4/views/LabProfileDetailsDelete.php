<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabProfileDetailsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_profile_detailsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    flab_profile_detailsdelete = currentForm = new ew.Form("flab_profile_detailsdelete", "delete");
    loadjs.done("flab_profile_detailsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.lab_profile_details) ew.vars.tables.lab_profile_details = <?= JsonEncode(GetClientVar("tables", "lab_profile_details")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="flab_profile_detailsdelete" id="flab_profile_detailsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_profile_details">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_lab_profile_details_id" class="lab_profile_details_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
        <th class="<?= $Page->ProfileCode->headerCellClass() ?>"><span id="elh_lab_profile_details_ProfileCode" class="lab_profile_details_ProfileCode"><?= $Page->ProfileCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SubProfileCode->Visible) { // SubProfileCode ?>
        <th class="<?= $Page->SubProfileCode->headerCellClass() ?>"><span id="elh_lab_profile_details_SubProfileCode" class="lab_profile_details_SubProfileCode"><?= $Page->SubProfileCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProfileTestCode->Visible) { // ProfileTestCode ?>
        <th class="<?= $Page->ProfileTestCode->headerCellClass() ?>"><span id="elh_lab_profile_details_ProfileTestCode" class="lab_profile_details_ProfileTestCode"><?= $Page->ProfileTestCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
        <th class="<?= $Page->ProfileSubTestCode->headerCellClass() ?>"><span id="elh_lab_profile_details_ProfileSubTestCode" class="lab_profile_details_ProfileSubTestCode"><?= $Page->ProfileSubTestCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestOrder->Visible) { // TestOrder ?>
        <th class="<?= $Page->TestOrder->headerCellClass() ?>"><span id="elh_lab_profile_details_TestOrder" class="lab_profile_details_TestOrder"><?= $Page->TestOrder->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestAmount->Visible) { // TestAmount ?>
        <th class="<?= $Page->TestAmount->headerCellClass() ?>"><span id="elh_lab_profile_details_TestAmount" class="lab_profile_details_TestAmount"><?= $Page->TestAmount->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_lab_profile_details_id" class="lab_profile_details_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
        <td <?= $Page->ProfileCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_ProfileCode" class="lab_profile_details_ProfileCode">
<span<?= $Page->ProfileCode->viewAttributes() ?>>
<?= $Page->ProfileCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SubProfileCode->Visible) { // SubProfileCode ?>
        <td <?= $Page->SubProfileCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_SubProfileCode" class="lab_profile_details_SubProfileCode">
<span<?= $Page->SubProfileCode->viewAttributes() ?>>
<?= $Page->SubProfileCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProfileTestCode->Visible) { // ProfileTestCode ?>
        <td <?= $Page->ProfileTestCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_ProfileTestCode" class="lab_profile_details_ProfileTestCode">
<span<?= $Page->ProfileTestCode->viewAttributes() ?>>
<?= $Page->ProfileTestCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
        <td <?= $Page->ProfileSubTestCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_ProfileSubTestCode" class="lab_profile_details_ProfileSubTestCode">
<span<?= $Page->ProfileSubTestCode->viewAttributes() ?>>
<?= $Page->ProfileSubTestCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestOrder->Visible) { // TestOrder ?>
        <td <?= $Page->TestOrder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_TestOrder" class="lab_profile_details_TestOrder">
<span<?= $Page->TestOrder->viewAttributes() ?>>
<?= $Page->TestOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestAmount->Visible) { // TestAmount ?>
        <td <?= $Page->TestAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_TestAmount" class="lab_profile_details_TestAmount">
<span<?= $Page->TestAmount->viewAttributes() ?>>
<?= $Page->TestAmount->getViewValue() ?></span>
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
