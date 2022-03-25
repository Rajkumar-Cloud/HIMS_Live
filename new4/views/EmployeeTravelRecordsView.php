<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeTravelRecordsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_travel_recordsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_travel_recordsview = currentForm = new ew.Form("femployee_travel_recordsview", "view");
    loadjs.done("femployee_travel_recordsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_travel_records) ew.vars.tables.employee_travel_records = <?= JsonEncode(GetClientVar("tables", "employee_travel_records")) ?>;
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
<form name="femployee_travel_recordsview" id="femployee_travel_recordsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_travel_records">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_travel_records_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <tr id="r_employee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_employee"><?= $Page->employee->caption() ?></span></td>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_travel_records_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->type->Visible) { // type ?>
    <tr id="r_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_type"><?= $Page->type->caption() ?></span></td>
        <td data-name="type" <?= $Page->type->cellAttributes() ?>>
<span id="el_employee_travel_records_type">
<span<?= $Page->type->viewAttributes() ?>>
<?= $Page->type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->purpose->Visible) { // purpose ?>
    <tr id="r_purpose">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_purpose"><?= $Page->purpose->caption() ?></span></td>
        <td data-name="purpose" <?= $Page->purpose->cellAttributes() ?>>
<span id="el_employee_travel_records_purpose">
<span<?= $Page->purpose->viewAttributes() ?>>
<?= $Page->purpose->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->travel_from->Visible) { // travel_from ?>
    <tr id="r_travel_from">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_travel_from"><?= $Page->travel_from->caption() ?></span></td>
        <td data-name="travel_from" <?= $Page->travel_from->cellAttributes() ?>>
<span id="el_employee_travel_records_travel_from">
<span<?= $Page->travel_from->viewAttributes() ?>>
<?= $Page->travel_from->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->travel_to->Visible) { // travel_to ?>
    <tr id="r_travel_to">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_travel_to"><?= $Page->travel_to->caption() ?></span></td>
        <td data-name="travel_to" <?= $Page->travel_to->cellAttributes() ?>>
<span id="el_employee_travel_records_travel_to">
<span<?= $Page->travel_to->viewAttributes() ?>>
<?= $Page->travel_to->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->travel_date->Visible) { // travel_date ?>
    <tr id="r_travel_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_travel_date"><?= $Page->travel_date->caption() ?></span></td>
        <td data-name="travel_date" <?= $Page->travel_date->cellAttributes() ?>>
<span id="el_employee_travel_records_travel_date">
<span<?= $Page->travel_date->viewAttributes() ?>>
<?= $Page->travel_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->return_date->Visible) { // return_date ?>
    <tr id="r_return_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_return_date"><?= $Page->return_date->caption() ?></span></td>
        <td data-name="return_date" <?= $Page->return_date->cellAttributes() ?>>
<span id="el_employee_travel_records_return_date">
<span<?= $Page->return_date->viewAttributes() ?>>
<?= $Page->return_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <tr id="r_details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_details"><?= $Page->details->caption() ?></span></td>
        <td data-name="details" <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_travel_records_details">
<span<?= $Page->details->viewAttributes() ?>>
<?= $Page->details->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->funding->Visible) { // funding ?>
    <tr id="r_funding">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_funding"><?= $Page->funding->caption() ?></span></td>
        <td data-name="funding" <?= $Page->funding->cellAttributes() ?>>
<span id="el_employee_travel_records_funding">
<span<?= $Page->funding->viewAttributes() ?>>
<?= $Page->funding->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
    <tr id="r_currency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_currency"><?= $Page->currency->caption() ?></span></td>
        <td data-name="currency" <?= $Page->currency->cellAttributes() ?>>
<span id="el_employee_travel_records_currency">
<span<?= $Page->currency->viewAttributes() ?>>
<?= $Page->currency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->attachment1->Visible) { // attachment1 ?>
    <tr id="r_attachment1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_attachment1"><?= $Page->attachment1->caption() ?></span></td>
        <td data-name="attachment1" <?= $Page->attachment1->cellAttributes() ?>>
<span id="el_employee_travel_records_attachment1">
<span<?= $Page->attachment1->viewAttributes() ?>>
<?= $Page->attachment1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->attachment2->Visible) { // attachment2 ?>
    <tr id="r_attachment2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_attachment2"><?= $Page->attachment2->caption() ?></span></td>
        <td data-name="attachment2" <?= $Page->attachment2->cellAttributes() ?>>
<span id="el_employee_travel_records_attachment2">
<span<?= $Page->attachment2->viewAttributes() ?>>
<?= $Page->attachment2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->attachment3->Visible) { // attachment3 ?>
    <tr id="r_attachment3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_attachment3"><?= $Page->attachment3->caption() ?></span></td>
        <td data-name="attachment3" <?= $Page->attachment3->cellAttributes() ?>>
<span id="el_employee_travel_records_attachment3">
<span<?= $Page->attachment3->viewAttributes() ?>>
<?= $Page->attachment3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <tr id="r_created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_created"><?= $Page->created->caption() ?></span></td>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el_employee_travel_records_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <tr id="r_updated">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_updated"><?= $Page->updated->caption() ?></span></td>
        <td data-name="updated" <?= $Page->updated->cellAttributes() ?>>
<span id="el_employee_travel_records_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_travel_records_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
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
