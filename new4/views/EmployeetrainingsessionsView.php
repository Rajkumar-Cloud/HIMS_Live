<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeetrainingsessionsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployeetrainingsessionsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployeetrainingsessionsview = currentForm = new ew.Form("femployeetrainingsessionsview", "view");
    loadjs.done("femployeetrainingsessionsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employeetrainingsessions) ew.vars.tables.employeetrainingsessions = <?= JsonEncode(GetClientVar("tables", "employeetrainingsessions")) ?>;
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
<form name="femployeetrainingsessionsview" id="femployeetrainingsessionsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employeetrainingsessions">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employeetrainingsessions_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employeetrainingsessions_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <tr id="r_employee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employeetrainingsessions_employee"><?= $Page->employee->caption() ?></span></td>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el_employeetrainingsessions_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->trainingSession->Visible) { // trainingSession ?>
    <tr id="r_trainingSession">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employeetrainingsessions_trainingSession"><?= $Page->trainingSession->caption() ?></span></td>
        <td data-name="trainingSession" <?= $Page->trainingSession->cellAttributes() ?>>
<span id="el_employeetrainingsessions_trainingSession">
<span<?= $Page->trainingSession->viewAttributes() ?>>
<?= $Page->trainingSession->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->feedBack->Visible) { // feedBack ?>
    <tr id="r_feedBack">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employeetrainingsessions_feedBack"><?= $Page->feedBack->caption() ?></span></td>
        <td data-name="feedBack" <?= $Page->feedBack->cellAttributes() ?>>
<span id="el_employeetrainingsessions_feedBack">
<span<?= $Page->feedBack->viewAttributes() ?>>
<?= $Page->feedBack->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employeetrainingsessions_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_employeetrainingsessions_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->proof->Visible) { // proof ?>
    <tr id="r_proof">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employeetrainingsessions_proof"><?= $Page->proof->caption() ?></span></td>
        <td data-name="proof" <?= $Page->proof->cellAttributes() ?>>
<span id="el_employeetrainingsessions_proof">
<span<?= $Page->proof->viewAttributes() ?>>
<?= $Page->proof->getViewValue() ?></span>
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
