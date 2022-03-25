<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeImmigrationsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_immigrationsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_immigrationsview = currentForm = new ew.Form("femployee_immigrationsview", "view");
    loadjs.done("femployee_immigrationsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_immigrations) ew.vars.tables.employee_immigrations = <?= JsonEncode(GetClientVar("tables", "employee_immigrations")) ?>;
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
<form name="femployee_immigrationsview" id="femployee_immigrationsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_immigrations">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_immigrations_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <tr id="r_employee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_employee"><?= $Page->employee->caption() ?></span></td>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_immigrations_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->document->Visible) { // document ?>
    <tr id="r_document">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_document"><?= $Page->document->caption() ?></span></td>
        <td data-name="document" <?= $Page->document->cellAttributes() ?>>
<span id="el_employee_immigrations_document">
<span<?= $Page->document->viewAttributes() ?>>
<?= $Page->document->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->documentname->Visible) { // documentname ?>
    <tr id="r_documentname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_documentname"><?= $Page->documentname->caption() ?></span></td>
        <td data-name="documentname" <?= $Page->documentname->cellAttributes() ?>>
<span id="el_employee_immigrations_documentname">
<span<?= $Page->documentname->viewAttributes() ?>>
<?= $Page->documentname->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->valid_until->Visible) { // valid_until ?>
    <tr id="r_valid_until">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_valid_until"><?= $Page->valid_until->caption() ?></span></td>
        <td data-name="valid_until" <?= $Page->valid_until->cellAttributes() ?>>
<span id="el_employee_immigrations_valid_until">
<span<?= $Page->valid_until->viewAttributes() ?>>
<?= $Page->valid_until->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_immigrations_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <tr id="r_details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_details"><?= $Page->details->caption() ?></span></td>
        <td data-name="details" <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_immigrations_details">
<span<?= $Page->details->viewAttributes() ?>>
<?= $Page->details->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->attachment1->Visible) { // attachment1 ?>
    <tr id="r_attachment1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_attachment1"><?= $Page->attachment1->caption() ?></span></td>
        <td data-name="attachment1" <?= $Page->attachment1->cellAttributes() ?>>
<span id="el_employee_immigrations_attachment1">
<span<?= $Page->attachment1->viewAttributes() ?>>
<?= $Page->attachment1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->attachment2->Visible) { // attachment2 ?>
    <tr id="r_attachment2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_attachment2"><?= $Page->attachment2->caption() ?></span></td>
        <td data-name="attachment2" <?= $Page->attachment2->cellAttributes() ?>>
<span id="el_employee_immigrations_attachment2">
<span<?= $Page->attachment2->viewAttributes() ?>>
<?= $Page->attachment2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->attachment3->Visible) { // attachment3 ?>
    <tr id="r_attachment3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_attachment3"><?= $Page->attachment3->caption() ?></span></td>
        <td data-name="attachment3" <?= $Page->attachment3->cellAttributes() ?>>
<span id="el_employee_immigrations_attachment3">
<span<?= $Page->attachment3->viewAttributes() ?>>
<?= $Page->attachment3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <tr id="r_created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_created"><?= $Page->created->caption() ?></span></td>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el_employee_immigrations_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <tr id="r_updated">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_updated"><?= $Page->updated->caption() ?></span></td>
        <td data-name="updated" <?= $Page->updated->cellAttributes() ?>>
<span id="el_employee_immigrations_updated">
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
