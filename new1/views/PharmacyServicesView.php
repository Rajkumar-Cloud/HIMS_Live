<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyServicesView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_servicesview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_servicesview = currentForm = new ew.Form("fpharmacy_servicesview", "view");
    loadjs.done("fpharmacy_servicesview");
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
<form name="fpharmacy_servicesview" id="fpharmacy_servicesview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_services">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_services_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pharmacy_id->Visible) { // pharmacy_id ?>
    <tr id="r_pharmacy_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_pharmacy_id"><?= $Page->pharmacy_id->caption() ?></span></td>
        <td data-name="pharmacy_id" <?= $Page->pharmacy_id->cellAttributes() ?>>
<span id="el_pharmacy_services_pharmacy_id">
<span<?= $Page->pharmacy_id->viewAttributes() ?>>
<?= $Page->pharmacy_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <tr id="r_patient_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_patient_id"><?= $Page->patient_id->caption() ?></span></td>
        <td data-name="patient_id" <?= $Page->patient_id->cellAttributes() ?>>
<span id="el_pharmacy_services_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <tr id="r_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_name"><?= $Page->name->caption() ?></span></td>
        <td data-name="name" <?= $Page->name->cellAttributes() ?>>
<span id="el_pharmacy_services_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <tr id="r_amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_amount"><?= $Page->amount->caption() ?></span></td>
        <td data-name="amount" <?= $Page->amount->cellAttributes() ?>>
<span id="el_pharmacy_services_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description" <?= $Page->description->cellAttributes() ?>>
<span id="el_pharmacy_services_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
    <tr id="r_charged_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_charged_date"><?= $Page->charged_date->caption() ?></span></td>
        <td data-name="charged_date" <?= $Page->charged_date->cellAttributes() ?>>
<span id="el_pharmacy_services_charged_date">
<span<?= $Page->charged_date->viewAttributes() ?>>
<?= $Page->charged_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_pharmacy_services_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_pharmacy_services_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_services_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_services_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_services_modifieddatetime">
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
