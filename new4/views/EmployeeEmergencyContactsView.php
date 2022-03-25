<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeEmergencyContactsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_emergency_contactsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_emergency_contactsview = currentForm = new ew.Form("femployee_emergency_contactsview", "view");
    loadjs.done("femployee_emergency_contactsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_emergency_contacts) ew.vars.tables.employee_emergency_contacts = <?= JsonEncode(GetClientVar("tables", "employee_emergency_contacts")) ?>;
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
<form name="femployee_emergency_contactsview" id="femployee_emergency_contactsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_emergency_contacts">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_emergency_contacts_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <tr id="r_employee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_emergency_contacts_employee"><?= $Page->employee->caption() ?></span></td>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <tr id="r_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_emergency_contacts_name"><?= $Page->name->caption() ?></span></td>
        <td data-name="name" <?= $Page->name->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->relationship->Visible) { // relationship ?>
    <tr id="r_relationship">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_emergency_contacts_relationship"><?= $Page->relationship->caption() ?></span></td>
        <td data-name="relationship" <?= $Page->relationship->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_relationship">
<span<?= $Page->relationship->viewAttributes() ?>>
<?= $Page->relationship->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->home_phone->Visible) { // home_phone ?>
    <tr id="r_home_phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_emergency_contacts_home_phone"><?= $Page->home_phone->caption() ?></span></td>
        <td data-name="home_phone" <?= $Page->home_phone->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_home_phone">
<span<?= $Page->home_phone->viewAttributes() ?>>
<?= $Page->home_phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->work_phone->Visible) { // work_phone ?>
    <tr id="r_work_phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_emergency_contacts_work_phone"><?= $Page->work_phone->caption() ?></span></td>
        <td data-name="work_phone" <?= $Page->work_phone->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_work_phone">
<span<?= $Page->work_phone->viewAttributes() ?>>
<?= $Page->work_phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
    <tr id="r_mobile_phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_emergency_contacts_mobile_phone"><?= $Page->mobile_phone->caption() ?></span></td>
        <td data-name="mobile_phone" <?= $Page->mobile_phone->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_mobile_phone">
<span<?= $Page->mobile_phone->viewAttributes() ?>>
<?= $Page->mobile_phone->getViewValue() ?></span>
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
