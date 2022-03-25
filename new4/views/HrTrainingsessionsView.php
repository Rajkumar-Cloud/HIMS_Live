<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrTrainingsessionsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fhr_trainingsessionsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fhr_trainingsessionsview = currentForm = new ew.Form("fhr_trainingsessionsview", "view");
    loadjs.done("fhr_trainingsessionsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.hr_trainingsessions) ew.vars.tables.hr_trainingsessions = <?= JsonEncode(GetClientVar("tables", "hr_trainingsessions")) ?>;
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
<form name="fhr_trainingsessionsview" id="fhr_trainingsessionsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_trainingsessions">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_hr_trainingsessions_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <tr id="r_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_name"><?= $Page->name->caption() ?></span></td>
        <td data-name="name" <?= $Page->name->cellAttributes() ?>>
<span id="el_hr_trainingsessions_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->course->Visible) { // course ?>
    <tr id="r_course">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_course"><?= $Page->course->caption() ?></span></td>
        <td data-name="course" <?= $Page->course->cellAttributes() ?>>
<span id="el_hr_trainingsessions_course">
<span<?= $Page->course->viewAttributes() ?>>
<?= $Page->course->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description" <?= $Page->description->cellAttributes() ?>>
<span id="el_hr_trainingsessions_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->scheduled->Visible) { // scheduled ?>
    <tr id="r_scheduled">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_scheduled"><?= $Page->scheduled->caption() ?></span></td>
        <td data-name="scheduled" <?= $Page->scheduled->cellAttributes() ?>>
<span id="el_hr_trainingsessions_scheduled">
<span<?= $Page->scheduled->viewAttributes() ?>>
<?= $Page->scheduled->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->dueDate->Visible) { // dueDate ?>
    <tr id="r_dueDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_dueDate"><?= $Page->dueDate->caption() ?></span></td>
        <td data-name="dueDate" <?= $Page->dueDate->cellAttributes() ?>>
<span id="el_hr_trainingsessions_dueDate">
<span<?= $Page->dueDate->viewAttributes() ?>>
<?= $Page->dueDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->deliveryMethod->Visible) { // deliveryMethod ?>
    <tr id="r_deliveryMethod">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_deliveryMethod"><?= $Page->deliveryMethod->caption() ?></span></td>
        <td data-name="deliveryMethod" <?= $Page->deliveryMethod->cellAttributes() ?>>
<span id="el_hr_trainingsessions_deliveryMethod">
<span<?= $Page->deliveryMethod->viewAttributes() ?>>
<?= $Page->deliveryMethod->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->deliveryLocation->Visible) { // deliveryLocation ?>
    <tr id="r_deliveryLocation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_deliveryLocation"><?= $Page->deliveryLocation->caption() ?></span></td>
        <td data-name="deliveryLocation" <?= $Page->deliveryLocation->cellAttributes() ?>>
<span id="el_hr_trainingsessions_deliveryLocation">
<span<?= $Page->deliveryLocation->viewAttributes() ?>>
<?= $Page->deliveryLocation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_hr_trainingsessions_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->attendanceType->Visible) { // attendanceType ?>
    <tr id="r_attendanceType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_attendanceType"><?= $Page->attendanceType->caption() ?></span></td>
        <td data-name="attendanceType" <?= $Page->attendanceType->cellAttributes() ?>>
<span id="el_hr_trainingsessions_attendanceType">
<span<?= $Page->attendanceType->viewAttributes() ?>>
<?= $Page->attendanceType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->attachment->Visible) { // attachment ?>
    <tr id="r_attachment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_attachment"><?= $Page->attachment->caption() ?></span></td>
        <td data-name="attachment" <?= $Page->attachment->cellAttributes() ?>>
<span id="el_hr_trainingsessions_attachment">
<span<?= $Page->attachment->viewAttributes() ?>>
<?= $Page->attachment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <tr id="r_created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_created"><?= $Page->created->caption() ?></span></td>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el_hr_trainingsessions_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <tr id="r_updated">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_updated"><?= $Page->updated->caption() ?></span></td>
        <td data-name="updated" <?= $Page->updated->cellAttributes() ?>>
<span id="el_hr_trainingsessions_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->requireProof->Visible) { // requireProof ?>
    <tr id="r_requireProof">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_requireProof"><?= $Page->requireProof->caption() ?></span></td>
        <td data-name="requireProof" <?= $Page->requireProof->cellAttributes() ?>>
<span id="el_hr_trainingsessions_requireProof">
<span<?= $Page->requireProof->viewAttributes() ?>>
<?= $Page->requireProof->getViewValue() ?></span>
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
