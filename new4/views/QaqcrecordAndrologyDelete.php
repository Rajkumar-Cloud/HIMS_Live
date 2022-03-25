<?php

namespace PHPMaker2021\HIMS;

// Page object
$QaqcrecordAndrologyDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fqaqcrecord_andrologydelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fqaqcrecord_andrologydelete = currentForm = new ew.Form("fqaqcrecord_andrologydelete", "delete");
    loadjs.done("fqaqcrecord_andrologydelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.qaqcrecord_andrology) ew.vars.tables.qaqcrecord_andrology = <?= JsonEncode(GetClientVar("tables", "qaqcrecord_andrology")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fqaqcrecord_andrologydelete" id="fqaqcrecord_andrologydelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="qaqcrecord_andrology">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_id" class="qaqcrecord_andrology_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
        <th class="<?= $Page->Date->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_Date" class="qaqcrecord_andrology_Date"><?= $Page->Date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LN2_Level->Visible) { // LN2_Level ?>
        <th class="<?= $Page->LN2_Level->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_LN2_Level" class="qaqcrecord_andrology_LN2_Level"><?= $Page->LN2_Level->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LN2_Checked->Visible) { // LN2_Checked ?>
        <th class="<?= $Page->LN2_Checked->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_LN2_Checked" class="qaqcrecord_andrology_LN2_Checked"><?= $Page->LN2_Checked->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Incubator_Temp->Visible) { // Incubator_Temp ?>
        <th class="<?= $Page->Incubator_Temp->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_Incubator_Temp" class="qaqcrecord_andrology_Incubator_Temp"><?= $Page->Incubator_Temp->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
        <th class="<?= $Page->Incubator_Cleaned->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_Incubator_Cleaned" class="qaqcrecord_andrology_Incubator_Cleaned"><?= $Page->Incubator_Cleaned->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LAF_MG->Visible) { // LAF_MG ?>
        <th class="<?= $Page->LAF_MG->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_LAF_MG" class="qaqcrecord_andrology_LAF_MG"><?= $Page->LAF_MG->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
        <th class="<?= $Page->LAF_Cleaned->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_LAF_Cleaned" class="qaqcrecord_andrology_LAF_Cleaned"><?= $Page->LAF_Cleaned->caption() ?></span></th>
<?php } ?>
<?php if ($Page->REF_Temp->Visible) { // REF_Temp ?>
        <th class="<?= $Page->REF_Temp->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_REF_Temp" class="qaqcrecord_andrology_REF_Temp"><?= $Page->REF_Temp->caption() ?></span></th>
<?php } ?>
<?php if ($Page->REF_Cleaned->Visible) { // REF_Cleaned ?>
        <th class="<?= $Page->REF_Cleaned->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_REF_Cleaned" class="qaqcrecord_andrology_REF_Cleaned"><?= $Page->REF_Cleaned->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Heating_Temp->Visible) { // Heating_Temp ?>
        <th class="<?= $Page->Heating_Temp->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_Heating_Temp" class="qaqcrecord_andrology_Heating_Temp"><?= $Page->Heating_Temp->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
        <th class="<?= $Page->Heating_Cleaned->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_Heating_Cleaned" class="qaqcrecord_andrology_Heating_Cleaned"><?= $Page->Heating_Cleaned->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Createdby->Visible) { // Createdby ?>
        <th class="<?= $Page->Createdby->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_Createdby" class="qaqcrecord_andrology_Createdby"><?= $Page->Createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <th class="<?= $Page->CreatedDate->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_CreatedDate" class="qaqcrecord_andrology_CreatedDate"><?= $Page->CreatedDate->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_id" class="qaqcrecord_andrology_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
        <td <?= $Page->Date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Date" class="qaqcrecord_andrology_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LN2_Level->Visible) { // LN2_Level ?>
        <td <?= $Page->LN2_Level->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LN2_Level" class="qaqcrecord_andrology_LN2_Level">
<span<?= $Page->LN2_Level->viewAttributes() ?>>
<?= $Page->LN2_Level->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LN2_Checked->Visible) { // LN2_Checked ?>
        <td <?= $Page->LN2_Checked->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LN2_Checked" class="qaqcrecord_andrology_LN2_Checked">
<span<?= $Page->LN2_Checked->viewAttributes() ?>>
<?= $Page->LN2_Checked->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Incubator_Temp->Visible) { // Incubator_Temp ?>
        <td <?= $Page->Incubator_Temp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Incubator_Temp" class="qaqcrecord_andrology_Incubator_Temp">
<span<?= $Page->Incubator_Temp->viewAttributes() ?>>
<?= $Page->Incubator_Temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
        <td <?= $Page->Incubator_Cleaned->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Incubator_Cleaned" class="qaqcrecord_andrology_Incubator_Cleaned">
<span<?= $Page->Incubator_Cleaned->viewAttributes() ?>>
<?= $Page->Incubator_Cleaned->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LAF_MG->Visible) { // LAF_MG ?>
        <td <?= $Page->LAF_MG->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LAF_MG" class="qaqcrecord_andrology_LAF_MG">
<span<?= $Page->LAF_MG->viewAttributes() ?>>
<?= $Page->LAF_MG->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
        <td <?= $Page->LAF_Cleaned->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LAF_Cleaned" class="qaqcrecord_andrology_LAF_Cleaned">
<span<?= $Page->LAF_Cleaned->viewAttributes() ?>>
<?= $Page->LAF_Cleaned->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->REF_Temp->Visible) { // REF_Temp ?>
        <td <?= $Page->REF_Temp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_REF_Temp" class="qaqcrecord_andrology_REF_Temp">
<span<?= $Page->REF_Temp->viewAttributes() ?>>
<?= $Page->REF_Temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->REF_Cleaned->Visible) { // REF_Cleaned ?>
        <td <?= $Page->REF_Cleaned->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_REF_Cleaned" class="qaqcrecord_andrology_REF_Cleaned">
<span<?= $Page->REF_Cleaned->viewAttributes() ?>>
<?= $Page->REF_Cleaned->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Heating_Temp->Visible) { // Heating_Temp ?>
        <td <?= $Page->Heating_Temp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Heating_Temp" class="qaqcrecord_andrology_Heating_Temp">
<span<?= $Page->Heating_Temp->viewAttributes() ?>>
<?= $Page->Heating_Temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
        <td <?= $Page->Heating_Cleaned->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Heating_Cleaned" class="qaqcrecord_andrology_Heating_Cleaned">
<span<?= $Page->Heating_Cleaned->viewAttributes() ?>>
<?= $Page->Heating_Cleaned->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Createdby->Visible) { // Createdby ?>
        <td <?= $Page->Createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Createdby" class="qaqcrecord_andrology_Createdby">
<span<?= $Page->Createdby->viewAttributes() ?>>
<?= $Page->Createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <td <?= $Page->CreatedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_CreatedDate" class="qaqcrecord_andrology_CreatedDate">
<span<?= $Page->CreatedDate->viewAttributes() ?>>
<?= $Page->CreatedDate->getViewValue() ?></span>
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
