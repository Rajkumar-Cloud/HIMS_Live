<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresGenericinteractionsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_genericinteractionsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpres_genericinteractionsview = currentForm = new ew.Form("fpres_genericinteractionsview", "view");
    loadjs.done("fpres_genericinteractionsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pres_genericinteractions) ew.vars.tables.pres_genericinteractions = <?= JsonEncode(GetClientVar("tables", "pres_genericinteractions")) ?>;
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
<form name="fpres_genericinteractionsview" id="fpres_genericinteractionsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_genericinteractions">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pres_genericinteractions_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
    <tr id="r_Genericname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Genericname"><?= $Page->Genericname->caption() ?></span></td>
        <td data-name="Genericname" <?= $Page->Genericname->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Genericname">
<span<?= $Page->Genericname->viewAttributes() ?>>
<?= $Page->Genericname->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Catid->Visible) { // Catid ?>
    <tr id="r_Catid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Catid"><?= $Page->Catid->caption() ?></span></td>
        <td data-name="Catid" <?= $Page->Catid->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Catid">
<span<?= $Page->Catid->viewAttributes() ?>>
<?= $Page->Catid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Interactions->Visible) { // Interactions ?>
    <tr id="r_Interactions">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Interactions"><?= $Page->Interactions->caption() ?></span></td>
        <td data-name="Interactions" <?= $Page->Interactions->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Interactions">
<span<?= $Page->Interactions->viewAttributes() ?>>
<?= $Page->Interactions->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Intid->Visible) { // Intid ?>
    <tr id="r_Intid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Intid"><?= $Page->Intid->caption() ?></span></td>
        <td data-name="Intid" <?= $Page->Intid->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Intid">
<span<?= $Page->Intid->viewAttributes() ?>>
<?= $Page->Intid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Createddt->Visible) { // Createddt ?>
    <tr id="r_Createddt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Createddt"><?= $Page->Createddt->caption() ?></span></td>
        <td data-name="Createddt" <?= $Page->Createddt->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Createddt">
<span<?= $Page->Createddt->viewAttributes() ?>>
<?= $Page->Createddt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Createdtm->Visible) { // Createdtm ?>
    <tr id="r_Createdtm">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Createdtm"><?= $Page->Createdtm->caption() ?></span></td>
        <td data-name="Createdtm" <?= $Page->Createdtm->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Createdtm">
<span<?= $Page->Createdtm->viewAttributes() ?>>
<?= $Page->Createdtm->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Statusbit->Visible) { // Statusbit ?>
    <tr id="r_Statusbit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Statusbit"><?= $Page->Statusbit->caption() ?></span></td>
        <td data-name="Statusbit" <?= $Page->Statusbit->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Statusbit">
<span<?= $Page->Statusbit->viewAttributes() ?>>
<?= $Page->Statusbit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Remarks"><?= $Page->Remarks->caption() ?></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_Username->Visible) { // Username ?>
    <tr id="r__Username">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions__Username"><?= $Page->_Username->caption() ?></span></td>
        <td data-name="_Username" <?= $Page->_Username->cellAttributes() ?>>
<span id="el_pres_genericinteractions__Username">
<span<?= $Page->_Username->viewAttributes() ?>>
<?= $Page->_Username->getViewValue() ?></span>
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
