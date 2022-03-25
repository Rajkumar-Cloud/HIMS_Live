<?php

namespace PHPMaker2021\project3;

// Page object
$PresIndicationstableView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_indicationstableview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpres_indicationstableview = currentForm = new ew.Form("fpres_indicationstableview", "view");
    loadjs.done("fpres_indicationstableview");
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
<form name="fpres_indicationstableview" id="fpres_indicationstableview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_indicationstable">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->Sno->Visible) { // Sno ?>
    <tr id="r_Sno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Sno"><?= $Page->Sno->caption() ?></span></td>
        <td data-name="Sno" <?= $Page->Sno->cellAttributes() ?>>
<span id="el_pres_indicationstable_Sno">
<span<?= $Page->Sno->viewAttributes() ?>>
<?= $Page->Sno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
    <tr id="r_Genericname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Genericname"><?= $Page->Genericname->caption() ?></span></td>
        <td data-name="Genericname" <?= $Page->Genericname->cellAttributes() ?>>
<span id="el_pres_indicationstable_Genericname">
<span<?= $Page->Genericname->viewAttributes() ?>>
<?= $Page->Genericname->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Indications->Visible) { // Indications ?>
    <tr id="r_Indications">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Indications"><?= $Page->Indications->caption() ?></span></td>
        <td data-name="Indications" <?= $Page->Indications->cellAttributes() ?>>
<span id="el_pres_indicationstable_Indications">
<span<?= $Page->Indications->viewAttributes() ?>>
<?= $Page->Indications->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Category->Visible) { // Category ?>
    <tr id="r_Category">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Category"><?= $Page->Category->caption() ?></span></td>
        <td data-name="Category" <?= $Page->Category->cellAttributes() ?>>
<span id="el_pres_indicationstable_Category">
<span<?= $Page->Category->viewAttributes() ?>>
<?= $Page->Category->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Min_Age->Visible) { // Min_Age ?>
    <tr id="r_Min_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Min_Age"><?= $Page->Min_Age->caption() ?></span></td>
        <td data-name="Min_Age" <?= $Page->Min_Age->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Age">
<span<?= $Page->Min_Age->viewAttributes() ?>>
<?= $Page->Min_Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Min_Days->Visible) { // Min_Days ?>
    <tr id="r_Min_Days">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Min_Days"><?= $Page->Min_Days->caption() ?></span></td>
        <td data-name="Min_Days" <?= $Page->Min_Days->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Days">
<span<?= $Page->Min_Days->viewAttributes() ?>>
<?= $Page->Min_Days->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Max_Age->Visible) { // Max_Age ?>
    <tr id="r_Max_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Max_Age"><?= $Page->Max_Age->caption() ?></span></td>
        <td data-name="Max_Age" <?= $Page->Max_Age->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Age">
<span<?= $Page->Max_Age->viewAttributes() ?>>
<?= $Page->Max_Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Max_Days->Visible) { // Max_Days ?>
    <tr id="r_Max_Days">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Max_Days"><?= $Page->Max_Days->caption() ?></span></td>
        <td data-name="Max_Days" <?= $Page->Max_Days->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Days">
<span<?= $Page->Max_Days->viewAttributes() ?>>
<?= $Page->Max_Days->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_Route->Visible) { // Route ?>
    <tr id="r__Route">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable__Route"><?= $Page->_Route->caption() ?></span></td>
        <td data-name="_Route" <?= $Page->_Route->cellAttributes() ?>>
<span id="el_pres_indicationstable__Route">
<span<?= $Page->_Route->viewAttributes() ?>>
<?= $Page->_Route->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <tr id="r_Form">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Form"><?= $Page->Form->caption() ?></span></td>
        <td data-name="Form" <?= $Page->Form->cellAttributes() ?>>
<span id="el_pres_indicationstable_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
    <tr id="r_Min_Dose_Val">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Min_Dose_Val"><?= $Page->Min_Dose_Val->caption() ?></span></td>
        <td data-name="Min_Dose_Val" <?= $Page->Min_Dose_Val->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Dose_Val">
<span<?= $Page->Min_Dose_Val->viewAttributes() ?>>
<?= $Page->Min_Dose_Val->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
    <tr id="r_Min_Dose_Unit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Min_Dose_Unit"><?= $Page->Min_Dose_Unit->caption() ?></span></td>
        <td data-name="Min_Dose_Unit" <?= $Page->Min_Dose_Unit->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Dose_Unit">
<span<?= $Page->Min_Dose_Unit->viewAttributes() ?>>
<?= $Page->Min_Dose_Unit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
    <tr id="r_Max_Dose_Val">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Max_Dose_Val"><?= $Page->Max_Dose_Val->caption() ?></span></td>
        <td data-name="Max_Dose_Val" <?= $Page->Max_Dose_Val->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Dose_Val">
<span<?= $Page->Max_Dose_Val->viewAttributes() ?>>
<?= $Page->Max_Dose_Val->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
    <tr id="r_Max_Dose_Unit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Max_Dose_Unit"><?= $Page->Max_Dose_Unit->caption() ?></span></td>
        <td data-name="Max_Dose_Unit" <?= $Page->Max_Dose_Unit->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Dose_Unit">
<span<?= $Page->Max_Dose_Unit->viewAttributes() ?>>
<?= $Page->Max_Dose_Unit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Frequency->Visible) { // Frequency ?>
    <tr id="r_Frequency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Frequency"><?= $Page->Frequency->caption() ?></span></td>
        <td data-name="Frequency" <?= $Page->Frequency->cellAttributes() ?>>
<span id="el_pres_indicationstable_Frequency">
<span<?= $Page->Frequency->viewAttributes() ?>>
<?= $Page->Frequency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
    <tr id="r_Duration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Duration"><?= $Page->Duration->caption() ?></span></td>
        <td data-name="Duration" <?= $Page->Duration->cellAttributes() ?>>
<span id="el_pres_indicationstable_Duration">
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DWMY->Visible) { // DWMY ?>
    <tr id="r_DWMY">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_DWMY"><?= $Page->DWMY->caption() ?></span></td>
        <td data-name="DWMY" <?= $Page->DWMY->cellAttributes() ?>>
<span id="el_pres_indicationstable_DWMY">
<span<?= $Page->DWMY->viewAttributes() ?>>
<?= $Page->DWMY->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Contraindications->Visible) { // Contraindications ?>
    <tr id="r_Contraindications">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Contraindications"><?= $Page->Contraindications->caption() ?></span></td>
        <td data-name="Contraindications" <?= $Page->Contraindications->cellAttributes() ?>>
<span id="el_pres_indicationstable_Contraindications">
<span<?= $Page->Contraindications->viewAttributes() ?>>
<?= $Page->Contraindications->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RecStatus->Visible) { // RecStatus ?>
    <tr id="r_RecStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_RecStatus"><?= $Page->RecStatus->caption() ?></span></td>
        <td data-name="RecStatus" <?= $Page->RecStatus->cellAttributes() ?>>
<span id="el_pres_indicationstable_RecStatus">
<span<?= $Page->RecStatus->viewAttributes() ?>>
<?= $Page->RecStatus->getViewValue() ?></span>
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
