<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrCoursesView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fhr_coursesview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fhr_coursesview = currentForm = new ew.Form("fhr_coursesview", "view");
    loadjs.done("fhr_coursesview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.hr_courses) ew.vars.tables.hr_courses = <?= JsonEncode(GetClientVar("tables", "hr_courses")) ?>;
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
<form name="fhr_coursesview" id="fhr_coursesview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_courses">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_courses_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_hr_courses_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->code->Visible) { // code ?>
    <tr id="r_code">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_courses_code"><?= $Page->code->caption() ?></span></td>
        <td data-name="code" <?= $Page->code->cellAttributes() ?>>
<span id="el_hr_courses_code">
<span<?= $Page->code->viewAttributes() ?>>
<?= $Page->code->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <tr id="r_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_courses_name"><?= $Page->name->caption() ?></span></td>
        <td data-name="name" <?= $Page->name->cellAttributes() ?>>
<span id="el_hr_courses_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_courses_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description" <?= $Page->description->cellAttributes() ?>>
<span id="el_hr_courses_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->coordinator->Visible) { // coordinator ?>
    <tr id="r_coordinator">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_courses_coordinator"><?= $Page->coordinator->caption() ?></span></td>
        <td data-name="coordinator" <?= $Page->coordinator->cellAttributes() ?>>
<span id="el_hr_courses_coordinator">
<span<?= $Page->coordinator->viewAttributes() ?>>
<?= $Page->coordinator->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->trainer->Visible) { // trainer ?>
    <tr id="r_trainer">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_courses_trainer"><?= $Page->trainer->caption() ?></span></td>
        <td data-name="trainer" <?= $Page->trainer->cellAttributes() ?>>
<span id="el_hr_courses_trainer">
<span<?= $Page->trainer->viewAttributes() ?>>
<?= $Page->trainer->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->trainer_info->Visible) { // trainer_info ?>
    <tr id="r_trainer_info">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_courses_trainer_info"><?= $Page->trainer_info->caption() ?></span></td>
        <td data-name="trainer_info" <?= $Page->trainer_info->cellAttributes() ?>>
<span id="el_hr_courses_trainer_info">
<span<?= $Page->trainer_info->viewAttributes() ?>>
<?= $Page->trainer_info->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
    <tr id="r_paymentType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_courses_paymentType"><?= $Page->paymentType->caption() ?></span></td>
        <td data-name="paymentType" <?= $Page->paymentType->cellAttributes() ?>>
<span id="el_hr_courses_paymentType">
<span<?= $Page->paymentType->viewAttributes() ?>>
<?= $Page->paymentType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
    <tr id="r_currency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_courses_currency"><?= $Page->currency->caption() ?></span></td>
        <td data-name="currency" <?= $Page->currency->cellAttributes() ?>>
<span id="el_hr_courses_currency">
<span<?= $Page->currency->viewAttributes() ?>>
<?= $Page->currency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->cost->Visible) { // cost ?>
    <tr id="r_cost">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_courses_cost"><?= $Page->cost->caption() ?></span></td>
        <td data-name="cost" <?= $Page->cost->cellAttributes() ?>>
<span id="el_hr_courses_cost">
<span<?= $Page->cost->viewAttributes() ?>>
<?= $Page->cost->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_courses_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_hr_courses_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <tr id="r_created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_courses_created"><?= $Page->created->caption() ?></span></td>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el_hr_courses_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <tr id="r_updated">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_courses_updated"><?= $Page->updated->caption() ?></span></td>
        <td data-name="updated" <?= $Page->updated->cellAttributes() ?>>
<span id="el_hr_courses_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
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
