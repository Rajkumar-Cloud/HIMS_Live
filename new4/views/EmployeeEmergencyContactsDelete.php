<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeEmergencyContactsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_emergency_contactsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_emergency_contactsdelete = currentForm = new ew.Form("femployee_emergency_contactsdelete", "delete");
    loadjs.done("femployee_emergency_contactsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employee_emergency_contacts) ew.vars.tables.employee_emergency_contacts = <?= JsonEncode(GetClientVar("tables", "employee_emergency_contacts")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployee_emergency_contactsdelete" id="femployee_emergency_contactsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_emergency_contacts">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_emergency_contacts_id" class="employee_emergency_contacts_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th class="<?= $Page->employee->headerCellClass() ?>"><span id="elh_employee_emergency_contacts_employee" class="employee_emergency_contacts_employee"><?= $Page->employee->caption() ?></span></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th class="<?= $Page->name->headerCellClass() ?>"><span id="elh_employee_emergency_contacts_name" class="employee_emergency_contacts_name"><?= $Page->name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->relationship->Visible) { // relationship ?>
        <th class="<?= $Page->relationship->headerCellClass() ?>"><span id="elh_employee_emergency_contacts_relationship" class="employee_emergency_contacts_relationship"><?= $Page->relationship->caption() ?></span></th>
<?php } ?>
<?php if ($Page->home_phone->Visible) { // home_phone ?>
        <th class="<?= $Page->home_phone->headerCellClass() ?>"><span id="elh_employee_emergency_contacts_home_phone" class="employee_emergency_contacts_home_phone"><?= $Page->home_phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->work_phone->Visible) { // work_phone ?>
        <th class="<?= $Page->work_phone->headerCellClass() ?>"><span id="elh_employee_emergency_contacts_work_phone" class="employee_emergency_contacts_work_phone"><?= $Page->work_phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
        <th class="<?= $Page->mobile_phone->headerCellClass() ?>"><span id="elh_employee_emergency_contacts_mobile_phone" class="employee_emergency_contacts_mobile_phone"><?= $Page->mobile_phone->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_emergency_contacts_id" class="employee_emergency_contacts_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <td <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_emergency_contacts_employee" class="employee_emergency_contacts_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <td <?= $Page->name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_emergency_contacts_name" class="employee_emergency_contacts_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->relationship->Visible) { // relationship ?>
        <td <?= $Page->relationship->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_emergency_contacts_relationship" class="employee_emergency_contacts_relationship">
<span<?= $Page->relationship->viewAttributes() ?>>
<?= $Page->relationship->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->home_phone->Visible) { // home_phone ?>
        <td <?= $Page->home_phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_emergency_contacts_home_phone" class="employee_emergency_contacts_home_phone">
<span<?= $Page->home_phone->viewAttributes() ?>>
<?= $Page->home_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->work_phone->Visible) { // work_phone ?>
        <td <?= $Page->work_phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_emergency_contacts_work_phone" class="employee_emergency_contacts_work_phone">
<span<?= $Page->work_phone->viewAttributes() ?>>
<?= $Page->work_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
        <td <?= $Page->mobile_phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_emergency_contacts_mobile_phone" class="employee_emergency_contacts_mobile_phone">
<span<?= $Page->mobile_phone->viewAttributes() ?>>
<?= $Page->mobile_phone->getViewValue() ?></span>
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
