<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadsRelationView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fcrm_leads_relationview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fcrm_leads_relationview = currentForm = new ew.Form("fcrm_leads_relationview", "view");
    loadjs.done("fcrm_leads_relationview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.crm_leads_relation) ew.vars.tables.crm_leads_relation = <?= JsonEncode(GetClientVar("tables", "crm_leads_relation")) ?>;
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
<form name="fcrm_leads_relationview" id="fcrm_leads_relationview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leads_relation">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->leads_relationid->Visible) { // leads_relationid ?>
    <tr id="r_leads_relationid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leads_relation_leads_relationid"><?= $Page->leads_relationid->caption() ?></span></td>
        <td data-name="leads_relationid" <?= $Page->leads_relationid->cellAttributes() ?>>
<span id="el_crm_leads_relation_leads_relationid">
<span<?= $Page->leads_relationid->viewAttributes() ?>>
<?= $Page->leads_relationid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leads_relation->Visible) { // leads_relation ?>
    <tr id="r_leads_relation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leads_relation_leads_relation"><?= $Page->leads_relation->caption() ?></span></td>
        <td data-name="leads_relation" <?= $Page->leads_relation->cellAttributes() ?>>
<span id="el_crm_leads_relation_leads_relation">
<span<?= $Page->leads_relation->viewAttributes() ?>>
<?= $Page->leads_relation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sortorderid->Visible) { // sortorderid ?>
    <tr id="r_sortorderid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leads_relation_sortorderid"><?= $Page->sortorderid->caption() ?></span></td>
        <td data-name="sortorderid" <?= $Page->sortorderid->cellAttributes() ?>>
<span id="el_crm_leads_relation_sortorderid">
<span<?= $Page->sortorderid->viewAttributes() ?>>
<?= $Page->sortorderid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
    <tr id="r_presence">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leads_relation_presence"><?= $Page->presence->caption() ?></span></td>
        <td data-name="presence" <?= $Page->presence->cellAttributes() ?>>
<span id="el_crm_leads_relation_presence">
<span<?= $Page->presence->viewAttributes() ?>>
<?= $Page->presence->getViewValue() ?></span>
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
