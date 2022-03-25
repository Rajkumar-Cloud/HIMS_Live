<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfHistoryMasterView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_history_masterview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_history_masterview = currentForm = new ew.Form("fivf_history_masterview", "view");
    loadjs.done("fivf_history_masterview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.ivf_history_master) ew.vars.tables.ivf_history_master = <?= JsonEncode(GetClientVar("tables", "ivf_history_master")) ?>;
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
<form name="fivf_history_masterview" id="fivf_history_masterview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_history_master">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_history_master_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_history_master_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->History->Visible) { // History ?>
    <tr id="r_History">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_history_master_History"><?= $Page->History->caption() ?></span></td>
        <td data-name="History" <?= $Page->History->cellAttributes() ?>>
<span id="el_ivf_history_master_History">
<span<?= $Page->History->viewAttributes() ?>>
<?= $Page->History->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HistoryType->Visible) { // HistoryType ?>
    <tr id="r_HistoryType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_history_master_HistoryType"><?= $Page->HistoryType->caption() ?></span></td>
        <td data-name="HistoryType" <?= $Page->HistoryType->cellAttributes() ?>>
<span id="el_ivf_history_master_HistoryType">
<span<?= $Page->HistoryType->viewAttributes() ?>>
<?= $Page->HistoryType->getViewValue() ?></span>
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
