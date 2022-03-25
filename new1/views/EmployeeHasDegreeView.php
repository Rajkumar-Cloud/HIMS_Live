<?php

namespace PHPMaker2021\project3;

// Page object
$EmployeeHasDegreeView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_has_degreeview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_has_degreeview = currentForm = new ew.Form("femployee_has_degreeview", "view");
    loadjs.done("femployee_has_degreeview");
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
<form name="femployee_has_degreeview" id="femployee_has_degreeview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_has_degree">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_has_degree_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
    <tr id="r_employee_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_employee_id"><?= $Page->employee_id->caption() ?></span></td>
        <td data-name="employee_id" <?= $Page->employee_id->cellAttributes() ?>>
<span id="el_employee_has_degree_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->degree_id->Visible) { // degree_id ?>
    <tr id="r_degree_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_degree_id"><?= $Page->degree_id->caption() ?></span></td>
        <td data-name="degree_id" <?= $Page->degree_id->cellAttributes() ?>>
<span id="el_employee_has_degree_degree_id">
<span<?= $Page->degree_id->viewAttributes() ?>>
<?= $Page->degree_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->college_or_school->Visible) { // college_or_school ?>
    <tr id="r_college_or_school">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_college_or_school"><?= $Page->college_or_school->caption() ?></span></td>
        <td data-name="college_or_school" <?= $Page->college_or_school->cellAttributes() ?>>
<span id="el_employee_has_degree_college_or_school">
<span<?= $Page->college_or_school->viewAttributes() ?>>
<?= $Page->college_or_school->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->university_or_board->Visible) { // university_or_board ?>
    <tr id="r_university_or_board">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_university_or_board"><?= $Page->university_or_board->caption() ?></span></td>
        <td data-name="university_or_board" <?= $Page->university_or_board->cellAttributes() ?>>
<span id="el_employee_has_degree_university_or_board">
<span<?= $Page->university_or_board->viewAttributes() ?>>
<?= $Page->university_or_board->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->year_of_passing->Visible) { // year_of_passing ?>
    <tr id="r_year_of_passing">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_year_of_passing"><?= $Page->year_of_passing->caption() ?></span></td>
        <td data-name="year_of_passing" <?= $Page->year_of_passing->cellAttributes() ?>>
<span id="el_employee_has_degree_year_of_passing">
<span<?= $Page->year_of_passing->viewAttributes() ?>>
<?= $Page->year_of_passing->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->scoring_marks->Visible) { // scoring_marks ?>
    <tr id="r_scoring_marks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_scoring_marks"><?= $Page->scoring_marks->caption() ?></span></td>
        <td data-name="scoring_marks" <?= $Page->scoring_marks->cellAttributes() ?>>
<span id="el_employee_has_degree_scoring_marks">
<span<?= $Page->scoring_marks->viewAttributes() ?>>
<?= $Page->scoring_marks->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->certificates->Visible) { // certificates ?>
    <tr id="r_certificates">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_certificates"><?= $Page->certificates->caption() ?></span></td>
        <td data-name="certificates" <?= $Page->certificates->cellAttributes() ?>>
<span id="el_employee_has_degree_certificates">
<span<?= $Page->certificates->viewAttributes() ?>>
<?= $Page->certificates->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
    <tr id="r__others">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_degree__others"><?= $Page->_others->caption() ?></span></td>
        <td data-name="_others" <?= $Page->_others->cellAttributes() ?>>
<span id="el_employee_has_degree__others">
<span<?= $Page->_others->viewAttributes() ?>>
<?= $Page->_others->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_has_degree_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_employee_has_degree_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_employee_has_degree_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_employee_has_degree_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_has_degree_modifieddatetime">
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
