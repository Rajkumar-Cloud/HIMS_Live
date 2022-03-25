<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeDependentsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_dependentsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_dependentsview = currentForm = new ew.Form("femployee_dependentsview", "view");
    loadjs.done("femployee_dependentsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_dependents) ew.vars.tables.employee_dependents = <?= JsonEncode(GetClientVar("tables", "employee_dependents")) ?>;
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
<form name="femployee_dependentsview" id="femployee_dependentsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_dependents">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_dependents_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_dependents_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <tr id="r_employee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_dependents_employee"><?= $Page->employee->caption() ?></span></td>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_dependents_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <tr id="r_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_dependents_name"><?= $Page->name->caption() ?></span></td>
        <td data-name="name" <?= $Page->name->cellAttributes() ?>>
<span id="el_employee_dependents_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->relationship->Visible) { // relationship ?>
    <tr id="r_relationship">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_dependents_relationship"><?= $Page->relationship->caption() ?></span></td>
        <td data-name="relationship" <?= $Page->relationship->cellAttributes() ?>>
<span id="el_employee_dependents_relationship">
<span<?= $Page->relationship->viewAttributes() ?>>
<?= $Page->relationship->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
    <tr id="r_dob">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_dependents_dob"><?= $Page->dob->caption() ?></span></td>
        <td data-name="dob" <?= $Page->dob->cellAttributes() ?>>
<span id="el_employee_dependents_dob">
<span<?= $Page->dob->viewAttributes() ?>>
<?= $Page->dob->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_number->Visible) { // id_number ?>
    <tr id="r_id_number">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_dependents_id_number"><?= $Page->id_number->caption() ?></span></td>
        <td data-name="id_number" <?= $Page->id_number->cellAttributes() ?>>
<span id="el_employee_dependents_id_number">
<span<?= $Page->id_number->viewAttributes() ?>>
<?= $Page->id_number->getViewValue() ?></span>
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
