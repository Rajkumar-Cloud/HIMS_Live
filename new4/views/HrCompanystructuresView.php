<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrCompanystructuresView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fhr_companystructuresview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fhr_companystructuresview = currentForm = new ew.Form("fhr_companystructuresview", "view");
    loadjs.done("fhr_companystructuresview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.hr_companystructures) ew.vars.tables.hr_companystructures = <?= JsonEncode(GetClientVar("tables", "hr_companystructures")) ?>;
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
<form name="fhr_companystructuresview" id="fhr_companystructuresview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_companystructures">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_hr_companystructures_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
    <tr id="r_title">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_title"><?= $Page->title->caption() ?></span></td>
        <td data-name="title" <?= $Page->title->cellAttributes() ?>>
<span id="el_hr_companystructures_title">
<span<?= $Page->title->viewAttributes() ?>>
<?= $Page->title->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description" <?= $Page->description->cellAttributes() ?>>
<span id="el_hr_companystructures_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->address->Visible) { // address ?>
    <tr id="r_address">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_address"><?= $Page->address->caption() ?></span></td>
        <td data-name="address" <?= $Page->address->cellAttributes() ?>>
<span id="el_hr_companystructures_address">
<span<?= $Page->address->viewAttributes() ?>>
<?= $Page->address->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->type->Visible) { // type ?>
    <tr id="r_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_type"><?= $Page->type->caption() ?></span></td>
        <td data-name="type" <?= $Page->type->cellAttributes() ?>>
<span id="el_hr_companystructures_type">
<span<?= $Page->type->viewAttributes() ?>>
<?= $Page->type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
    <tr id="r_country">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_country"><?= $Page->country->caption() ?></span></td>
        <td data-name="country" <?= $Page->country->cellAttributes() ?>>
<span id="el_hr_companystructures_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->parent->Visible) { // parent ?>
    <tr id="r_parent">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_parent"><?= $Page->parent->caption() ?></span></td>
        <td data-name="parent" <?= $Page->parent->cellAttributes() ?>>
<span id="el_hr_companystructures_parent">
<span<?= $Page->parent->viewAttributes() ?>>
<?= $Page->parent->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->timezone->Visible) { // timezone ?>
    <tr id="r_timezone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_timezone"><?= $Page->timezone->caption() ?></span></td>
        <td data-name="timezone" <?= $Page->timezone->cellAttributes() ?>>
<span id="el_hr_companystructures_timezone">
<span<?= $Page->timezone->viewAttributes() ?>>
<?= $Page->timezone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->heads->Visible) { // heads ?>
    <tr id="r_heads">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_heads"><?= $Page->heads->caption() ?></span></td>
        <td data-name="heads" <?= $Page->heads->cellAttributes() ?>>
<span id="el_hr_companystructures_heads">
<span<?= $Page->heads->viewAttributes() ?>>
<?= $Page->heads->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_hr_companystructures_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
