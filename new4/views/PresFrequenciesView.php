<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresFrequenciesView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_frequenciesview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpres_frequenciesview = currentForm = new ew.Form("fpres_frequenciesview", "view");
    loadjs.done("fpres_frequenciesview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pres_frequencies) ew.vars.tables.pres_frequencies = <?= JsonEncode(GetClientVar("tables", "pres_frequencies")) ?>;
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
<form name="fpres_frequenciesview" id="fpres_frequenciesview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_frequencies">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_frequencies_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pres_frequencies_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Frequency->Visible) { // Frequency ?>
    <tr id="r_Frequency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_frequencies_Frequency"><?= $Page->Frequency->caption() ?></span></td>
        <td data-name="Frequency" <?= $Page->Frequency->cellAttributes() ?>>
<span id="el_pres_frequencies_Frequency">
<span<?= $Page->Frequency->viewAttributes() ?>>
<?= $Page->Frequency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Freq_Exp->Visible) { // Freq_Exp ?>
    <tr id="r_Freq_Exp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_frequencies_Freq_Exp"><?= $Page->Freq_Exp->caption() ?></span></td>
        <td data-name="Freq_Exp" <?= $Page->Freq_Exp->cellAttributes() ?>>
<span id="el_pres_frequencies_Freq_Exp">
<span<?= $Page->Freq_Exp->viewAttributes() ?>>
<?= $Page->Freq_Exp->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Freq_Count->Visible) { // Freq_Count ?>
    <tr id="r_Freq_Count">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_frequencies_Freq_Count"><?= $Page->Freq_Count->caption() ?></span></td>
        <td data-name="Freq_Count" <?= $Page->Freq_Count->cellAttributes() ?>>
<span id="el_pres_frequencies_Freq_Count">
<span<?= $Page->Freq_Count->viewAttributes() ?>>
<?= $Page->Freq_Count->getViewValue() ?></span>
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
