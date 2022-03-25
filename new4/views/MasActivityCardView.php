<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasActivityCardView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fmas_activity_cardview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fmas_activity_cardview = currentForm = new ew.Form("fmas_activity_cardview", "view");
    loadjs.done("fmas_activity_cardview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.mas_activity_card) ew.vars.tables.mas_activity_card = <?= JsonEncode(GetClientVar("tables", "mas_activity_card")) ?>;
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
<form name="fmas_activity_cardview" id="fmas_activity_cardview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_activity_card">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_mas_activity_card_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Activity->Visible) { // Activity ?>
    <tr id="r_Activity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Activity"><?= $Page->Activity->caption() ?></span></td>
        <td data-name="Activity" <?= $Page->Activity->cellAttributes() ?>>
<span id="el_mas_activity_card_Activity">
<span<?= $Page->Activity->viewAttributes() ?>>
<?= $Page->Activity->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <tr id="r_Type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Type"><?= $Page->Type->caption() ?></span></td>
        <td data-name="Type" <?= $Page->Type->cellAttributes() ?>>
<span id="el_mas_activity_card_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Units->Visible) { // Units ?>
    <tr id="r_Units">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Units"><?= $Page->Units->caption() ?></span></td>
        <td data-name="Units" <?= $Page->Units->cellAttributes() ?>>
<span id="el_mas_activity_card_Units">
<span<?= $Page->Units->viewAttributes() ?>>
<?= $Page->Units->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <tr id="r_Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Amount"><?= $Page->Amount->caption() ?></span></td>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el_mas_activity_card_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Selected->Visible) { // Selected ?>
    <tr id="r_Selected">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Selected"><?= $Page->Selected->caption() ?></span></td>
        <td data-name="Selected" <?= $Page->Selected->cellAttributes() ?>>
<span id="el_mas_activity_card_Selected">
<span<?= $Page->Selected->viewAttributes() ?>>
<?= $Page->Selected->getViewValue() ?></span>
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
