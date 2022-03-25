<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeImmigrationdocumentsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_immigrationdocumentsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_immigrationdocumentsview = currentForm = new ew.Form("femployee_immigrationdocumentsview", "view");
    loadjs.done("femployee_immigrationdocumentsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_immigrationdocuments) ew.vars.tables.employee_immigrationdocuments = <?= JsonEncode(GetClientVar("tables", "employee_immigrationdocuments")) ?>;
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
<form name="femployee_immigrationdocumentsview" id="femployee_immigrationdocumentsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_immigrationdocuments">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <tr id="r_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_name"><?= $Page->name->caption() ?></span></td>
        <td data-name="name" <?= $Page->name->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <tr id="r_details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_details"><?= $Page->details->caption() ?></span></td>
        <td data-name="details" <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_details">
<span<?= $Page->details->viewAttributes() ?>>
<?= $Page->details->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->required->Visible) { // required ?>
    <tr id="r_required">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_required"><?= $Page->required->caption() ?></span></td>
        <td data-name="required" <?= $Page->required->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_required">
<span<?= $Page->required->viewAttributes() ?>>
<?= $Page->required->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->alert_on_missing->Visible) { // alert_on_missing ?>
    <tr id="r_alert_on_missing">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_alert_on_missing"><?= $Page->alert_on_missing->caption() ?></span></td>
        <td data-name="alert_on_missing" <?= $Page->alert_on_missing->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_alert_on_missing">
<span<?= $Page->alert_on_missing->viewAttributes() ?>>
<?= $Page->alert_on_missing->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->alert_before_expiry->Visible) { // alert_before_expiry ?>
    <tr id="r_alert_before_expiry">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_alert_before_expiry"><?= $Page->alert_before_expiry->caption() ?></span></td>
        <td data-name="alert_before_expiry" <?= $Page->alert_before_expiry->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_alert_before_expiry">
<span<?= $Page->alert_before_expiry->viewAttributes() ?>>
<?= $Page->alert_before_expiry->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->alert_before_day_number->Visible) { // alert_before_day_number ?>
    <tr id="r_alert_before_day_number">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_alert_before_day_number"><?= $Page->alert_before_day_number->caption() ?></span></td>
        <td data-name="alert_before_day_number" <?= $Page->alert_before_day_number->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_alert_before_day_number">
<span<?= $Page->alert_before_day_number->viewAttributes() ?>>
<?= $Page->alert_before_day_number->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <tr id="r_created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_created"><?= $Page->created->caption() ?></span></td>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <tr id="r_updated">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_updated"><?= $Page->updated->caption() ?></span></td>
        <td data-name="updated" <?= $Page->updated->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_updated">
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
