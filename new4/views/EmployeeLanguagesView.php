<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeLanguagesView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_languagesview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_languagesview = currentForm = new ew.Form("femployee_languagesview", "view");
    loadjs.done("femployee_languagesview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_languages) ew.vars.tables.employee_languages = <?= JsonEncode(GetClientVar("tables", "employee_languages")) ?>;
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
<form name="femployee_languagesview" id="femployee_languagesview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_languages">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_languages_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_languages_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->language_id->Visible) { // language_id ?>
    <tr id="r_language_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_languages_language_id"><?= $Page->language_id->caption() ?></span></td>
        <td data-name="language_id" <?= $Page->language_id->cellAttributes() ?>>
<span id="el_employee_languages_language_id">
<span<?= $Page->language_id->viewAttributes() ?>>
<?= $Page->language_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <tr id="r_employee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_languages_employee"><?= $Page->employee->caption() ?></span></td>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_languages_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->reading->Visible) { // reading ?>
    <tr id="r_reading">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_languages_reading"><?= $Page->reading->caption() ?></span></td>
        <td data-name="reading" <?= $Page->reading->cellAttributes() ?>>
<span id="el_employee_languages_reading">
<span<?= $Page->reading->viewAttributes() ?>>
<?= $Page->reading->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->speaking->Visible) { // speaking ?>
    <tr id="r_speaking">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_languages_speaking"><?= $Page->speaking->caption() ?></span></td>
        <td data-name="speaking" <?= $Page->speaking->cellAttributes() ?>>
<span id="el_employee_languages_speaking">
<span<?= $Page->speaking->viewAttributes() ?>>
<?= $Page->speaking->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->writing->Visible) { // writing ?>
    <tr id="r_writing">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_languages_writing"><?= $Page->writing->caption() ?></span></td>
        <td data-name="writing" <?= $Page->writing->cellAttributes() ?>>
<span id="el_employee_languages_writing">
<span<?= $Page->writing->viewAttributes() ?>>
<?= $Page->writing->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->understanding->Visible) { // understanding ?>
    <tr id="r_understanding">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_languages_understanding"><?= $Page->understanding->caption() ?></span></td>
        <td data-name="understanding" <?= $Page->understanding->cellAttributes() ?>>
<span id="el_employee_languages_understanding">
<span<?= $Page->understanding->viewAttributes() ?>>
<?= $Page->understanding->getViewValue() ?></span>
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
