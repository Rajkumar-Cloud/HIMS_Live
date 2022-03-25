<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentJobDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var frecruitment_jobdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    frecruitment_jobdelete = currentForm = new ew.Form("frecruitment_jobdelete", "delete");
    loadjs.done("frecruitment_jobdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.recruitment_job) ew.vars.tables.recruitment_job = <?= JsonEncode(GetClientVar("tables", "recruitment_job")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="frecruitment_jobdelete" id="frecruitment_jobdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_job">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_recruitment_job_id" class="recruitment_job_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
        <th class="<?= $Page->title->headerCellClass() ?>"><span id="elh_recruitment_job_title" class="recruitment_job_title"><?= $Page->title->caption() ?></span></th>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <th class="<?= $Page->country->headerCellClass() ?>"><span id="elh_recruitment_job_country" class="recruitment_job_country"><?= $Page->country->caption() ?></span></th>
<?php } ?>
<?php if ($Page->company->Visible) { // company ?>
        <th class="<?= $Page->company->headerCellClass() ?>"><span id="elh_recruitment_job_company" class="recruitment_job_company"><?= $Page->company->caption() ?></span></th>
<?php } ?>
<?php if ($Page->department->Visible) { // department ?>
        <th class="<?= $Page->department->headerCellClass() ?>"><span id="elh_recruitment_job_department" class="recruitment_job_department"><?= $Page->department->caption() ?></span></th>
<?php } ?>
<?php if ($Page->code->Visible) { // code ?>
        <th class="<?= $Page->code->headerCellClass() ?>"><span id="elh_recruitment_job_code" class="recruitment_job_code"><?= $Page->code->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employementType->Visible) { // employementType ?>
        <th class="<?= $Page->employementType->headerCellClass() ?>"><span id="elh_recruitment_job_employementType" class="recruitment_job_employementType"><?= $Page->employementType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->industry->Visible) { // industry ?>
        <th class="<?= $Page->industry->headerCellClass() ?>"><span id="elh_recruitment_job_industry" class="recruitment_job_industry"><?= $Page->industry->caption() ?></span></th>
<?php } ?>
<?php if ($Page->experienceLevel->Visible) { // experienceLevel ?>
        <th class="<?= $Page->experienceLevel->headerCellClass() ?>"><span id="elh_recruitment_job_experienceLevel" class="recruitment_job_experienceLevel"><?= $Page->experienceLevel->caption() ?></span></th>
<?php } ?>
<?php if ($Page->jobFunction->Visible) { // jobFunction ?>
        <th class="<?= $Page->jobFunction->headerCellClass() ?>"><span id="elh_recruitment_job_jobFunction" class="recruitment_job_jobFunction"><?= $Page->jobFunction->caption() ?></span></th>
<?php } ?>
<?php if ($Page->educationLevel->Visible) { // educationLevel ?>
        <th class="<?= $Page->educationLevel->headerCellClass() ?>"><span id="elh_recruitment_job_educationLevel" class="recruitment_job_educationLevel"><?= $Page->educationLevel->caption() ?></span></th>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
        <th class="<?= $Page->currency->headerCellClass() ?>"><span id="elh_recruitment_job_currency" class="recruitment_job_currency"><?= $Page->currency->caption() ?></span></th>
<?php } ?>
<?php if ($Page->showSalary->Visible) { // showSalary ?>
        <th class="<?= $Page->showSalary->headerCellClass() ?>"><span id="elh_recruitment_job_showSalary" class="recruitment_job_showSalary"><?= $Page->showSalary->caption() ?></span></th>
<?php } ?>
<?php if ($Page->salaryMin->Visible) { // salaryMin ?>
        <th class="<?= $Page->salaryMin->headerCellClass() ?>"><span id="elh_recruitment_job_salaryMin" class="recruitment_job_salaryMin"><?= $Page->salaryMin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->salaryMax->Visible) { // salaryMax ?>
        <th class="<?= $Page->salaryMax->headerCellClass() ?>"><span id="elh_recruitment_job_salaryMax" class="recruitment_job_salaryMax"><?= $Page->salaryMax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_recruitment_job_status" class="recruitment_job_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->closingDate->Visible) { // closingDate ?>
        <th class="<?= $Page->closingDate->headerCellClass() ?>"><span id="elh_recruitment_job_closingDate" class="recruitment_job_closingDate"><?= $Page->closingDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->attachment->Visible) { // attachment ?>
        <th class="<?= $Page->attachment->headerCellClass() ?>"><span id="elh_recruitment_job_attachment" class="recruitment_job_attachment"><?= $Page->attachment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->display->Visible) { // display ?>
        <th class="<?= $Page->display->headerCellClass() ?>"><span id="elh_recruitment_job_display" class="recruitment_job_display"><?= $Page->display->caption() ?></span></th>
<?php } ?>
<?php if ($Page->postedBy->Visible) { // postedBy ?>
        <th class="<?= $Page->postedBy->headerCellClass() ?>"><span id="elh_recruitment_job_postedBy" class="recruitment_job_postedBy"><?= $Page->postedBy->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_id" class="recruitment_job_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
        <td <?= $Page->title->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_title" class="recruitment_job_title">
<span<?= $Page->title->viewAttributes() ?>>
<?= $Page->title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <td <?= $Page->country->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_country" class="recruitment_job_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->company->Visible) { // company ?>
        <td <?= $Page->company->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_company" class="recruitment_job_company">
<span<?= $Page->company->viewAttributes() ?>>
<?= $Page->company->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->department->Visible) { // department ?>
        <td <?= $Page->department->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_department" class="recruitment_job_department">
<span<?= $Page->department->viewAttributes() ?>>
<?= $Page->department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->code->Visible) { // code ?>
        <td <?= $Page->code->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_code" class="recruitment_job_code">
<span<?= $Page->code->viewAttributes() ?>>
<?= $Page->code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employementType->Visible) { // employementType ?>
        <td <?= $Page->employementType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_employementType" class="recruitment_job_employementType">
<span<?= $Page->employementType->viewAttributes() ?>>
<?= $Page->employementType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->industry->Visible) { // industry ?>
        <td <?= $Page->industry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_industry" class="recruitment_job_industry">
<span<?= $Page->industry->viewAttributes() ?>>
<?= $Page->industry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->experienceLevel->Visible) { // experienceLevel ?>
        <td <?= $Page->experienceLevel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_experienceLevel" class="recruitment_job_experienceLevel">
<span<?= $Page->experienceLevel->viewAttributes() ?>>
<?= $Page->experienceLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->jobFunction->Visible) { // jobFunction ?>
        <td <?= $Page->jobFunction->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_jobFunction" class="recruitment_job_jobFunction">
<span<?= $Page->jobFunction->viewAttributes() ?>>
<?= $Page->jobFunction->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->educationLevel->Visible) { // educationLevel ?>
        <td <?= $Page->educationLevel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_educationLevel" class="recruitment_job_educationLevel">
<span<?= $Page->educationLevel->viewAttributes() ?>>
<?= $Page->educationLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
        <td <?= $Page->currency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_currency" class="recruitment_job_currency">
<span<?= $Page->currency->viewAttributes() ?>>
<?= $Page->currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->showSalary->Visible) { // showSalary ?>
        <td <?= $Page->showSalary->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_showSalary" class="recruitment_job_showSalary">
<span<?= $Page->showSalary->viewAttributes() ?>>
<?= $Page->showSalary->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->salaryMin->Visible) { // salaryMin ?>
        <td <?= $Page->salaryMin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_salaryMin" class="recruitment_job_salaryMin">
<span<?= $Page->salaryMin->viewAttributes() ?>>
<?= $Page->salaryMin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->salaryMax->Visible) { // salaryMax ?>
        <td <?= $Page->salaryMax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_salaryMax" class="recruitment_job_salaryMax">
<span<?= $Page->salaryMax->viewAttributes() ?>>
<?= $Page->salaryMax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_status" class="recruitment_job_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->closingDate->Visible) { // closingDate ?>
        <td <?= $Page->closingDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_closingDate" class="recruitment_job_closingDate">
<span<?= $Page->closingDate->viewAttributes() ?>>
<?= $Page->closingDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->attachment->Visible) { // attachment ?>
        <td <?= $Page->attachment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_attachment" class="recruitment_job_attachment">
<span<?= $Page->attachment->viewAttributes() ?>>
<?= $Page->attachment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->display->Visible) { // display ?>
        <td <?= $Page->display->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_display" class="recruitment_job_display">
<span<?= $Page->display->viewAttributes() ?>>
<?= $Page->display->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->postedBy->Visible) { // postedBy ?>
        <td <?= $Page->postedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_job_postedBy" class="recruitment_job_postedBy">
<span<?= $Page->postedBy->viewAttributes() ?>>
<?= $Page->postedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
