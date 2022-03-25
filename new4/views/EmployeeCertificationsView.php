<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeCertificationsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_certificationsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_certificationsview = currentForm = new ew.Form("femployee_certificationsview", "view");
    loadjs.done("femployee_certificationsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_certifications) ew.vars.tables.employee_certifications = <?= JsonEncode(GetClientVar("tables", "employee_certifications")) ?>;
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
<form name="femployee_certificationsview" id="femployee_certificationsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_certifications">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_certifications_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_certifications_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->certification_id->Visible) { // certification_id ?>
    <tr id="r_certification_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_certifications_certification_id"><?= $Page->certification_id->caption() ?></span></td>
        <td data-name="certification_id" <?= $Page->certification_id->cellAttributes() ?>>
<span id="el_employee_certifications_certification_id">
<span<?= $Page->certification_id->viewAttributes() ?>>
<?= $Page->certification_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <tr id="r_employee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_certifications_employee"><?= $Page->employee->caption() ?></span></td>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_certifications_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->institute->Visible) { // institute ?>
    <tr id="r_institute">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_certifications_institute"><?= $Page->institute->caption() ?></span></td>
        <td data-name="institute" <?= $Page->institute->cellAttributes() ?>>
<span id="el_employee_certifications_institute">
<span<?= $Page->institute->viewAttributes() ?>>
<?= $Page->institute->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->date_start->Visible) { // date_start ?>
    <tr id="r_date_start">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_certifications_date_start"><?= $Page->date_start->caption() ?></span></td>
        <td data-name="date_start" <?= $Page->date_start->cellAttributes() ?>>
<span id="el_employee_certifications_date_start">
<span<?= $Page->date_start->viewAttributes() ?>>
<?= $Page->date_start->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->date_end->Visible) { // date_end ?>
    <tr id="r_date_end">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_certifications_date_end"><?= $Page->date_end->caption() ?></span></td>
        <td data-name="date_end" <?= $Page->date_end->cellAttributes() ?>>
<span id="el_employee_certifications_date_end">
<span<?= $Page->date_end->viewAttributes() ?>>
<?= $Page->date_end->getViewValue() ?></span>
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
