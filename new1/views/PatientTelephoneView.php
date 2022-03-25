<?php

namespace PHPMaker2021\project3;

// Page object
$PatientTelephoneView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_telephoneview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_telephoneview = currentForm = new ew.Form("fpatient_telephoneview", "view");
    loadjs.done("fpatient_telephoneview");
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
<form name="fpatient_telephoneview" id="fpatient_telephoneview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_telephone">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_telephone_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_telephone_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <tr id="r_patient_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_telephone_patient_id"><?= $Page->patient_id->caption() ?></span></td>
        <td data-name="patient_id" <?= $Page->patient_id->cellAttributes() ?>>
<span id="el_patient_telephone_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tele_type->Visible) { // tele_type ?>
    <tr id="r_tele_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_telephone_tele_type"><?= $Page->tele_type->caption() ?></span></td>
        <td data-name="tele_type" <?= $Page->tele_type->cellAttributes() ?>>
<span id="el_patient_telephone_tele_type">
<span<?= $Page->tele_type->viewAttributes() ?>>
<?= $Page->tele_type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->telephone->Visible) { // telephone ?>
    <tr id="r_telephone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_telephone_telephone"><?= $Page->telephone->caption() ?></span></td>
        <td data-name="telephone" <?= $Page->telephone->cellAttributes() ?>>
<span id="el_patient_telephone_telephone">
<span<?= $Page->telephone->viewAttributes() ?>>
<?= $Page->telephone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->telephone_type->Visible) { // telephone_type ?>
    <tr id="r_telephone_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_telephone_telephone_type"><?= $Page->telephone_type->caption() ?></span></td>
        <td data-name="telephone_type" <?= $Page->telephone_type->cellAttributes() ?>>
<span id="el_patient_telephone_telephone_type">
<span<?= $Page->telephone_type->viewAttributes() ?>>
<?= $Page->telephone_type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_telephone_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_patient_telephone_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_telephone_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_patient_telephone_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_telephone_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_patient_telephone_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_telephone_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_patient_telephone_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_telephone_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_telephone_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
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
