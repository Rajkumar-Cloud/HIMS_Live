<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmCrmentityView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fcrm_crmentityview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fcrm_crmentityview = currentForm = new ew.Form("fcrm_crmentityview", "view");
    loadjs.done("fcrm_crmentityview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.crm_crmentity) ew.vars.tables.crm_crmentity = <?= JsonEncode(GetClientVar("tables", "crm_crmentity")) ?>;
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
<form name="fcrm_crmentityview" id="fcrm_crmentityview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_crmentity">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->crmid->Visible) { // crmid ?>
    <tr id="r_crmid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_crmid"><?= $Page->crmid->caption() ?></span></td>
        <td data-name="crmid" <?= $Page->crmid->cellAttributes() ?>>
<span id="el_crm_crmentity_crmid">
<span<?= $Page->crmid->viewAttributes() ?>>
<?= $Page->crmid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->smcreatorid->Visible) { // smcreatorid ?>
    <tr id="r_smcreatorid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_smcreatorid"><?= $Page->smcreatorid->caption() ?></span></td>
        <td data-name="smcreatorid" <?= $Page->smcreatorid->cellAttributes() ?>>
<span id="el_crm_crmentity_smcreatorid">
<span<?= $Page->smcreatorid->viewAttributes() ?>>
<?= $Page->smcreatorid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->smownerid->Visible) { // smownerid ?>
    <tr id="r_smownerid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_smownerid"><?= $Page->smownerid->caption() ?></span></td>
        <td data-name="smownerid" <?= $Page->smownerid->cellAttributes() ?>>
<span id="el_crm_crmentity_smownerid">
<span<?= $Page->smownerid->viewAttributes() ?>>
<?= $Page->smownerid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->shownerid->Visible) { // shownerid ?>
    <tr id="r_shownerid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_shownerid"><?= $Page->shownerid->caption() ?></span></td>
        <td data-name="shownerid" <?= $Page->shownerid->cellAttributes() ?>>
<span id="el_crm_crmentity_shownerid">
<span<?= $Page->shownerid->viewAttributes() ?>>
<?= $Page->shownerid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_crm_crmentity_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->setype->Visible) { // setype ?>
    <tr id="r_setype">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_setype"><?= $Page->setype->caption() ?></span></td>
        <td data-name="setype" <?= $Page->setype->cellAttributes() ?>>
<span id="el_crm_crmentity_setype">
<span<?= $Page->setype->viewAttributes() ?>>
<?= $Page->setype->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description" <?= $Page->description->cellAttributes() ?>>
<span id="el_crm_crmentity_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->attention->Visible) { // attention ?>
    <tr id="r_attention">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_attention"><?= $Page->attention->caption() ?></span></td>
        <td data-name="attention" <?= $Page->attention->cellAttributes() ?>>
<span id="el_crm_crmentity_attention">
<span<?= $Page->attention->viewAttributes() ?>>
<?= $Page->attention->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdtime->Visible) { // createdtime ?>
    <tr id="r_createdtime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_createdtime"><?= $Page->createdtime->caption() ?></span></td>
        <td data-name="createdtime" <?= $Page->createdtime->cellAttributes() ?>>
<span id="el_crm_crmentity_createdtime">
<span<?= $Page->createdtime->viewAttributes() ?>>
<?= $Page->createdtime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedtime->Visible) { // modifiedtime ?>
    <tr id="r_modifiedtime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_modifiedtime"><?= $Page->modifiedtime->caption() ?></span></td>
        <td data-name="modifiedtime" <?= $Page->modifiedtime->cellAttributes() ?>>
<span id="el_crm_crmentity_modifiedtime">
<span<?= $Page->modifiedtime->viewAttributes() ?>>
<?= $Page->modifiedtime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->viewedtime->Visible) { // viewedtime ?>
    <tr id="r_viewedtime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_viewedtime"><?= $Page->viewedtime->caption() ?></span></td>
        <td data-name="viewedtime" <?= $Page->viewedtime->cellAttributes() ?>>
<span id="el_crm_crmentity_viewedtime">
<span<?= $Page->viewedtime->viewAttributes() ?>>
<?= $Page->viewedtime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_crm_crmentity_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->version->Visible) { // version ?>
    <tr id="r_version">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_version"><?= $Page->version->caption() ?></span></td>
        <td data-name="version" <?= $Page->version->cellAttributes() ?>>
<span id="el_crm_crmentity_version">
<span<?= $Page->version->viewAttributes() ?>>
<?= $Page->version->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
    <tr id="r_presence">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_presence"><?= $Page->presence->caption() ?></span></td>
        <td data-name="presence" <?= $Page->presence->cellAttributes() ?>>
<span id="el_crm_crmentity_presence">
<span<?= $Page->presence->viewAttributes() ?>>
<?= $Page->presence->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->deleted->Visible) { // deleted ?>
    <tr id="r_deleted">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_deleted"><?= $Page->deleted->caption() ?></span></td>
        <td data-name="deleted" <?= $Page->deleted->cellAttributes() ?>>
<span id="el_crm_crmentity_deleted">
<span<?= $Page->deleted->viewAttributes() ?>>
<?= $Page->deleted->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->was_read->Visible) { // was_read ?>
    <tr id="r_was_read">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_was_read"><?= $Page->was_read->caption() ?></span></td>
        <td data-name="was_read" <?= $Page->was_read->cellAttributes() ?>>
<span id="el_crm_crmentity_was_read">
<span<?= $Page->was_read->viewAttributes() ?>>
<?= $Page->was_read->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_private->Visible) { // private ?>
    <tr id="r__private">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity__private"><?= $Page->_private->caption() ?></span></td>
        <td data-name="_private" <?= $Page->_private->cellAttributes() ?>>
<span id="el_crm_crmentity__private">
<span<?= $Page->_private->viewAttributes() ?>>
<?= $Page->_private->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->users->Visible) { // users ?>
    <tr id="r_users">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_users"><?= $Page->users->caption() ?></span></td>
        <td data-name="users" <?= $Page->users->cellAttributes() ?>>
<span id="el_crm_crmentity_users">
<span<?= $Page->users->viewAttributes() ?>>
<?= $Page->users->getViewValue() ?></span>
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
