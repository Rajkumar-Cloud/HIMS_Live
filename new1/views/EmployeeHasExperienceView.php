<?php

namespace PHPMaker2021\project3;

// Page object
$EmployeeHasExperienceView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_has_experienceview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_has_experienceview = currentForm = new ew.Form("femployee_has_experienceview", "view");
    loadjs.done("femployee_has_experienceview");
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
<form name="femployee_has_experienceview" id="femployee_has_experienceview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_has_experience">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_has_experience_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
    <tr id="r_employee_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_employee_id"><?= $Page->employee_id->caption() ?></span></td>
        <td data-name="employee_id" <?= $Page->employee_id->cellAttributes() ?>>
<span id="el_employee_has_experience_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->working_at->Visible) { // working_at ?>
    <tr id="r_working_at">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_working_at"><?= $Page->working_at->caption() ?></span></td>
        <td data-name="working_at" <?= $Page->working_at->cellAttributes() ?>>
<span id="el_employee_has_experience_working_at">
<span<?= $Page->working_at->viewAttributes() ?>>
<?= $Page->working_at->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->job_description->Visible) { // job description ?>
    <tr id="r_job_description">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_job_description"><?= $Page->job_description->caption() ?></span></td>
        <td data-name="job_description" <?= $Page->job_description->cellAttributes() ?>>
<span id="el_employee_has_experience_job_description">
<span<?= $Page->job_description->viewAttributes() ?>>
<?= $Page->job_description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->role->Visible) { // role ?>
    <tr id="r_role">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_role"><?= $Page->role->caption() ?></span></td>
        <td data-name="role" <?= $Page->role->cellAttributes() ?>>
<span id="el_employee_has_experience_role">
<span<?= $Page->role->viewAttributes() ?>>
<?= $Page->role->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <tr id="r_start_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_start_date"><?= $Page->start_date->caption() ?></span></td>
        <td data-name="start_date" <?= $Page->start_date->cellAttributes() ?>>
<span id="el_employee_has_experience_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
    <tr id="r_end_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_end_date"><?= $Page->end_date->caption() ?></span></td>
        <td data-name="end_date" <?= $Page->end_date->cellAttributes() ?>>
<span id="el_employee_has_experience_end_date">
<span<?= $Page->end_date->viewAttributes() ?>>
<?= $Page->end_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->total_experience->Visible) { // total_experience ?>
    <tr id="r_total_experience">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_total_experience"><?= $Page->total_experience->caption() ?></span></td>
        <td data-name="total_experience" <?= $Page->total_experience->cellAttributes() ?>>
<span id="el_employee_has_experience_total_experience">
<span<?= $Page->total_experience->viewAttributes() ?>>
<?= $Page->total_experience->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->certificates->Visible) { // certificates ?>
    <tr id="r_certificates">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_certificates"><?= $Page->certificates->caption() ?></span></td>
        <td data-name="certificates" <?= $Page->certificates->cellAttributes() ?>>
<span id="el_employee_has_experience_certificates">
<span<?= $Page->certificates->viewAttributes() ?>>
<?= $Page->certificates->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
    <tr id="r__others">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience__others"><?= $Page->_others->caption() ?></span></td>
        <td data-name="_others" <?= $Page->_others->cellAttributes() ?>>
<span id="el_employee_has_experience__others">
<span<?= $Page->_others->viewAttributes() ?>>
<?= $Page->_others->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_has_experience_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_employee_has_experience_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_employee_has_experience_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_employee_has_experience_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_has_experience_modifieddatetime">
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
