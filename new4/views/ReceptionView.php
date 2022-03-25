<?php

namespace PHPMaker2021\HIMS;

// Page object
$ReceptionView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var freceptionview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    freceptionview = currentForm = new ew.Form("freceptionview", "view");
    loadjs.done("freceptionview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.reception) ew.vars.tables.reception = <?= JsonEncode(GetClientVar("tables", "reception")) ?>;
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
<form name="freceptionview" id="freceptionview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="reception">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_reception_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_reception_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_reception_PatientID"><?= $Page->PatientID->caption() ?></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_reception_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_reception_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_reception_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OorN->Visible) { // OorN ?>
    <tr id="r_OorN">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_reception_OorN"><?= $Page->OorN->caption() ?></span></td>
        <td data-name="OorN" <?= $Page->OorN->cellAttributes() ?>>
<span id="el_reception_OorN">
<span<?= $Page->OorN->viewAttributes() ?>>
<?= $Page->OorN->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
    <tr id="r_PRIMARY_CONSULTANT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_reception_PRIMARY_CONSULTANT"><?= $Page->PRIMARY_CONSULTANT->caption() ?></span></td>
        <td data-name="PRIMARY_CONSULTANT" <?= $Page->PRIMARY_CONSULTANT->cellAttributes() ?>>
<span id="el_reception_PRIMARY_CONSULTANT">
<span<?= $Page->PRIMARY_CONSULTANT->viewAttributes() ?>>
<?= $Page->PRIMARY_CONSULTANT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CATEGORY->Visible) { // CATEGORY ?>
    <tr id="r_CATEGORY">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_reception_CATEGORY"><?= $Page->CATEGORY->caption() ?></span></td>
        <td data-name="CATEGORY" <?= $Page->CATEGORY->cellAttributes() ?>>
<span id="el_reception_CATEGORY">
<span<?= $Page->CATEGORY->viewAttributes() ?>>
<?= $Page->CATEGORY->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
    <tr id="r_PROCEDURE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_reception_PROCEDURE"><?= $Page->PROCEDURE->caption() ?></span></td>
        <td data-name="PROCEDURE" <?= $Page->PROCEDURE->cellAttributes() ?>>
<span id="el_reception_PROCEDURE">
<span<?= $Page->PROCEDURE->viewAttributes() ?>>
<?= $Page->PROCEDURE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <tr id="r_Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_reception_Amount"><?= $Page->Amount->caption() ?></span></td>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el_reception_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MODEOFPAYMENT->Visible) { // MODE OF PAYMENT ?>
    <tr id="r_MODEOFPAYMENT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_reception_MODEOFPAYMENT"><?= $Page->MODEOFPAYMENT->caption() ?></span></td>
        <td data-name="MODEOFPAYMENT" <?= $Page->MODEOFPAYMENT->cellAttributes() ?>>
<span id="el_reception_MODEOFPAYMENT">
<span<?= $Page->MODEOFPAYMENT->viewAttributes() ?>>
<?= $Page->MODEOFPAYMENT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NEXTREVIEWDATE->Visible) { // NEXT REVIEW DATE ?>
    <tr id="r_NEXTREVIEWDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_reception_NEXTREVIEWDATE"><?= $Page->NEXTREVIEWDATE->caption() ?></span></td>
        <td data-name="NEXTREVIEWDATE" <?= $Page->NEXTREVIEWDATE->cellAttributes() ?>>
<span id="el_reception_NEXTREVIEWDATE">
<span<?= $Page->NEXTREVIEWDATE->viewAttributes() ?>>
<?= $Page->NEXTREVIEWDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->REMARKS->Visible) { // REMARKS ?>
    <tr id="r_REMARKS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_reception_REMARKS"><?= $Page->REMARKS->caption() ?></span></td>
        <td data-name="REMARKS" <?= $Page->REMARKS->cellAttributes() ?>>
<span id="el_reception_REMARKS">
<span<?= $Page->REMARKS->viewAttributes() ?>>
<?= $Page->REMARKS->getViewValue() ?></span>
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
