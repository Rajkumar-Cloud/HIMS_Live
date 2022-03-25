<?php

namespace PHPMaker2021\project3;

// Page object
$MasUserTemplatePrescriptionView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fmas_user_template_prescriptionview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fmas_user_template_prescriptionview = currentForm = new ew.Form("fmas_user_template_prescriptionview", "view");
    loadjs.done("fmas_user_template_prescriptionview");
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
<form name="fmas_user_template_prescriptionview" id="fmas_user_template_prescriptionview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_user_template_prescription">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplateName->Visible) { // TemplateName ?>
    <tr id="r_TemplateName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_TemplateName"><?= $Page->TemplateName->caption() ?></span></td>
        <td data-name="TemplateName" <?= $Page->TemplateName->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_TemplateName">
<span<?= $Page->TemplateName->viewAttributes() ?>>
<?= $Page->TemplateName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Medicine->Visible) { // Medicine ?>
    <tr id="r_Medicine">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_Medicine"><?= $Page->Medicine->caption() ?></span></td>
        <td data-name="Medicine" <?= $Page->Medicine->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_Medicine">
<span<?= $Page->Medicine->viewAttributes() ?>>
<?= $Page->Medicine->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
    <tr id="r_M">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_M"><?= $Page->M->caption() ?></span></td>
        <td data-name="M" <?= $Page->M->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_M">
<span<?= $Page->M->viewAttributes() ?>>
<?= $Page->M->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
    <tr id="r_A">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_A"><?= $Page->A->caption() ?></span></td>
        <td data-name="A" <?= $Page->A->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_A">
<span<?= $Page->A->viewAttributes() ?>>
<?= $Page->A->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->N->Visible) { // N ?>
    <tr id="r_N">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_N"><?= $Page->N->caption() ?></span></td>
        <td data-name="N" <?= $Page->N->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_N">
<span<?= $Page->N->viewAttributes() ?>>
<?= $Page->N->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
    <tr id="r_NoOfDays">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_NoOfDays"><?= $Page->NoOfDays->caption() ?></span></td>
        <td data-name="NoOfDays" <?= $Page->NoOfDays->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_NoOfDays">
<span<?= $Page->NoOfDays->viewAttributes() ?>>
<?= $Page->NoOfDays->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { // PreRoute ?>
    <tr id="r_PreRoute">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_PreRoute"><?= $Page->PreRoute->caption() ?></span></td>
        <td data-name="PreRoute" <?= $Page->PreRoute->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_PreRoute">
<span<?= $Page->PreRoute->viewAttributes() ?>>
<?= $Page->PreRoute->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
    <tr id="r_TimeOfTaking">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_TimeOfTaking"><?= $Page->TimeOfTaking->caption() ?></span></td>
        <td data-name="TimeOfTaking" <?= $Page->TimeOfTaking->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_TimeOfTaking">
<span<?= $Page->TimeOfTaking->viewAttributes() ?>>
<?= $Page->TimeOfTaking->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <tr id="r_Type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_Type"><?= $Page->Type->caption() ?></span></td>
        <td data-name="Type" <?= $Page->Type->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <tr id="r_Status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_Status"><?= $Page->Status->caption() ?></span></td>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <tr id="r_CreatedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_CreatedBy"><?= $Page->CreatedBy->caption() ?></span></td>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
    <tr id="r_CreateDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_CreateDateTime"><?= $Page->CreateDateTime->caption() ?></span></td>
        <td data-name="CreateDateTime" <?= $Page->CreateDateTime->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_CreateDateTime">
<span<?= $Page->CreateDateTime->viewAttributes() ?>>
<?= $Page->CreateDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <tr id="r_ModifiedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></span></td>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <tr id="r_ModifiedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></span></td>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
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
