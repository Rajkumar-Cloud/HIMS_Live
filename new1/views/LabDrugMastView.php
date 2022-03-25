<?php

namespace PHPMaker2021\project3;

// Page object
$LabDrugMastView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flab_drug_mastview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    flab_drug_mastview = currentForm = new ew.Form("flab_drug_mastview", "view");
    loadjs.done("flab_drug_mastview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
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
<form name="flab_drug_mastview" id="flab_drug_mastview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_drug_mast">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->DrugName->Visible) { // DrugName ?>
    <tr id="r_DrugName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_DrugName"><?= $Page->DrugName->caption() ?></span></td>
        <td data-name="DrugName" <?= $Page->DrugName->cellAttributes() ?>>
<span id="el_lab_drug_mast_DrugName">
<span<?= $Page->DrugName->viewAttributes() ?>>
<?= $Page->DrugName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Positive->Visible) { // Positive ?>
    <tr id="r_Positive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_Positive"><?= $Page->Positive->caption() ?></span></td>
        <td data-name="Positive" <?= $Page->Positive->cellAttributes() ?>>
<span id="el_lab_drug_mast_Positive">
<span<?= $Page->Positive->viewAttributes() ?>>
<?= $Page->Positive->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Negative->Visible) { // Negative ?>
    <tr id="r_Negative">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_Negative"><?= $Page->Negative->caption() ?></span></td>
        <td data-name="Negative" <?= $Page->Negative->cellAttributes() ?>>
<span id="el_lab_drug_mast_Negative">
<span<?= $Page->Negative->viewAttributes() ?>>
<?= $Page->Negative->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
    <tr id="r_ShortName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_ShortName"><?= $Page->ShortName->caption() ?></span></td>
        <td data-name="ShortName" <?= $Page->ShortName->cellAttributes() ?>>
<span id="el_lab_drug_mast_ShortName">
<span<?= $Page->ShortName->viewAttributes() ?>>
<?= $Page->ShortName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GroupCD->Visible) { // GroupCD ?>
    <tr id="r_GroupCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_GroupCD"><?= $Page->GroupCD->caption() ?></span></td>
        <td data-name="GroupCD" <?= $Page->GroupCD->cellAttributes() ?>>
<span id="el_lab_drug_mast_GroupCD">
<span<?= $Page->GroupCD->viewAttributes() ?>>
<?= $Page->GroupCD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_Content->Visible) { // Content ?>
    <tr id="r__Content">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast__Content"><?= $Page->_Content->caption() ?></span></td>
        <td data-name="_Content" <?= $Page->_Content->cellAttributes() ?>>
<span id="el_lab_drug_mast__Content">
<span<?= $Page->_Content->viewAttributes() ?>>
<?= $Page->_Content->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <tr id="r_Order">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_Order"><?= $Page->Order->caption() ?></span></td>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<span id="el_lab_drug_mast_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrugCD->Visible) { // DrugCD ?>
    <tr id="r_DrugCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_DrugCD"><?= $Page->DrugCD->caption() ?></span></td>
        <td data-name="DrugCD" <?= $Page->DrugCD->cellAttributes() ?>>
<span id="el_lab_drug_mast_DrugCD">
<span<?= $Page->DrugCD->viewAttributes() ?>>
<?= $Page->DrugCD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_lab_drug_mast_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
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
