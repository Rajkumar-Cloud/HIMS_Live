<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadsourceView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fcrm_leadsourceview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fcrm_leadsourceview = currentForm = new ew.Form("fcrm_leadsourceview", "view");
    loadjs.done("fcrm_leadsourceview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.crm_leadsource) ew.vars.tables.crm_leadsource = <?= JsonEncode(GetClientVar("tables", "crm_leadsource")) ?>;
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
<form name="fcrm_leadsourceview" id="fcrm_leadsourceview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leadsource">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->leadsourceid->Visible) { // leadsourceid ?>
    <tr id="r_leadsourceid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadsource_leadsourceid"><?= $Page->leadsourceid->caption() ?></span></td>
        <td data-name="leadsourceid" <?= $Page->leadsourceid->cellAttributes() ?>>
<span id="el_crm_leadsource_leadsourceid">
<span<?= $Page->leadsourceid->viewAttributes() ?>>
<?= $Page->leadsourceid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leadsource->Visible) { // leadsource ?>
    <tr id="r_leadsource">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadsource_leadsource"><?= $Page->leadsource->caption() ?></span></td>
        <td data-name="leadsource" <?= $Page->leadsource->cellAttributes() ?>>
<span id="el_crm_leadsource_leadsource">
<span<?= $Page->leadsource->viewAttributes() ?>>
<?= $Page->leadsource->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
    <tr id="r_presence">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadsource_presence"><?= $Page->presence->caption() ?></span></td>
        <td data-name="presence" <?= $Page->presence->cellAttributes() ?>>
<span id="el_crm_leadsource_presence">
<span<?= $Page->presence->viewAttributes() ?>>
<?= $Page->presence->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->picklist_valueid->Visible) { // picklist_valueid ?>
    <tr id="r_picklist_valueid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadsource_picklist_valueid"><?= $Page->picklist_valueid->caption() ?></span></td>
        <td data-name="picklist_valueid" <?= $Page->picklist_valueid->cellAttributes() ?>>
<span id="el_crm_leadsource_picklist_valueid">
<span<?= $Page->picklist_valueid->viewAttributes() ?>>
<?= $Page->picklist_valueid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sortorderid->Visible) { // sortorderid ?>
    <tr id="r_sortorderid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadsource_sortorderid"><?= $Page->sortorderid->caption() ?></span></td>
        <td data-name="sortorderid" <?= $Page->sortorderid->cellAttributes() ?>>
<span id="el_crm_leadsource_sortorderid">
<span<?= $Page->sortorderid->viewAttributes() ?>>
<?= $Page->sortorderid->getViewValue() ?></span>
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
