<?php

namespace PHPMaker2021\HIMS;

// Page object
$QaqcrecordAndrologyView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fqaqcrecord_andrologyview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fqaqcrecord_andrologyview = currentForm = new ew.Form("fqaqcrecord_andrologyview", "view");
    loadjs.done("fqaqcrecord_andrologyview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.qaqcrecord_andrology) ew.vars.tables.qaqcrecord_andrology = <?= JsonEncode(GetClientVar("tables", "qaqcrecord_andrology")) ?>;
</script>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fqaqcrecord_andrologyview" id="fqaqcrecord_andrologyview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="qaqcrecord_andrology">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
    <tr id="r_Date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_Date"><?= $Page->Date->caption() ?></span></td>
        <td data-name="Date" <?= $Page->Date->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LN2_Level->Visible) { // LN2_Level ?>
    <tr id="r_LN2_Level">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_LN2_Level"><?= $Page->LN2_Level->caption() ?></span></td>
        <td data-name="LN2_Level" <?= $Page->LN2_Level->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LN2_Level">
<span<?= $Page->LN2_Level->viewAttributes() ?>>
<?= $Page->LN2_Level->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LN2_Checked->Visible) { // LN2_Checked ?>
    <tr id="r_LN2_Checked">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_LN2_Checked"><?= $Page->LN2_Checked->caption() ?></span></td>
        <td data-name="LN2_Checked" <?= $Page->LN2_Checked->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LN2_Checked">
<span<?= $Page->LN2_Checked->viewAttributes() ?>>
<?= $Page->LN2_Checked->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Incubator_Temp->Visible) { // Incubator_Temp ?>
    <tr id="r_Incubator_Temp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_Incubator_Temp"><?= $Page->Incubator_Temp->caption() ?></span></td>
        <td data-name="Incubator_Temp" <?= $Page->Incubator_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Incubator_Temp">
<span<?= $Page->Incubator_Temp->viewAttributes() ?>>
<?= $Page->Incubator_Temp->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
    <tr id="r_Incubator_Cleaned">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_Incubator_Cleaned"><?= $Page->Incubator_Cleaned->caption() ?></span></td>
        <td data-name="Incubator_Cleaned" <?= $Page->Incubator_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Incubator_Cleaned">
<span<?= $Page->Incubator_Cleaned->viewAttributes() ?>>
<?= $Page->Incubator_Cleaned->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LAF_MG->Visible) { // LAF_MG ?>
    <tr id="r_LAF_MG">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_LAF_MG"><?= $Page->LAF_MG->caption() ?></span></td>
        <td data-name="LAF_MG" <?= $Page->LAF_MG->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LAF_MG">
<span<?= $Page->LAF_MG->viewAttributes() ?>>
<?= $Page->LAF_MG->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
    <tr id="r_LAF_Cleaned">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_LAF_Cleaned"><?= $Page->LAF_Cleaned->caption() ?></span></td>
        <td data-name="LAF_Cleaned" <?= $Page->LAF_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LAF_Cleaned">
<span<?= $Page->LAF_Cleaned->viewAttributes() ?>>
<?= $Page->LAF_Cleaned->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->REF_Temp->Visible) { // REF_Temp ?>
    <tr id="r_REF_Temp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_REF_Temp"><?= $Page->REF_Temp->caption() ?></span></td>
        <td data-name="REF_Temp" <?= $Page->REF_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_REF_Temp">
<span<?= $Page->REF_Temp->viewAttributes() ?>>
<?= $Page->REF_Temp->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->REF_Cleaned->Visible) { // REF_Cleaned ?>
    <tr id="r_REF_Cleaned">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_REF_Cleaned"><?= $Page->REF_Cleaned->caption() ?></span></td>
        <td data-name="REF_Cleaned" <?= $Page->REF_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_REF_Cleaned">
<span<?= $Page->REF_Cleaned->viewAttributes() ?>>
<?= $Page->REF_Cleaned->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Heating_Temp->Visible) { // Heating_Temp ?>
    <tr id="r_Heating_Temp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_Heating_Temp"><?= $Page->Heating_Temp->caption() ?></span></td>
        <td data-name="Heating_Temp" <?= $Page->Heating_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Heating_Temp">
<span<?= $Page->Heating_Temp->viewAttributes() ?>>
<?= $Page->Heating_Temp->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
    <tr id="r_Heating_Cleaned">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_Heating_Cleaned"><?= $Page->Heating_Cleaned->caption() ?></span></td>
        <td data-name="Heating_Cleaned" <?= $Page->Heating_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Heating_Cleaned">
<span<?= $Page->Heating_Cleaned->viewAttributes() ?>>
<?= $Page->Heating_Cleaned->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Createdby->Visible) { // Createdby ?>
    <tr id="r_Createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_Createdby"><?= $Page->Createdby->caption() ?></span></td>
        <td data-name="Createdby" <?= $Page->Createdby->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Createdby">
<span<?= $Page->Createdby->viewAttributes() ?>>
<?= $Page->Createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
    <tr id="r_CreatedDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_CreatedDate"><?= $Page->CreatedDate->caption() ?></span></td>
        <td data-name="CreatedDate" <?= $Page->CreatedDate->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_CreatedDate">
<span<?= $Page->CreatedDate->viewAttributes() ?>>
<?= $Page->CreatedDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
