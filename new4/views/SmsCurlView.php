<?php

namespace PHPMaker2021\HIMS;

// Page object
$SmsCurlView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fsms_curlview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fsms_curlview = currentForm = new ew.Form("fsms_curlview", "view");
    loadjs.done("fsms_curlview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.sms_curl) ew.vars.tables.sms_curl = <?= JsonEncode(GetClientVar("tables", "sms_curl")) ?>;
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
<form name="fsms_curlview" id="fsms_curlview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="sms_curl">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sms_curl_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_sms_curl_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SMSType->Visible) { // SMSType ?>
    <tr id="r_SMSType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sms_curl_SMSType"><?= $Page->SMSType->caption() ?></span></td>
        <td data-name="SMSType" <?= $Page->SMSType->cellAttributes() ?>>
<span id="el_sms_curl_SMSType">
<span<?= $Page->SMSType->viewAttributes() ?>>
<?= $Page->SMSType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_Content->Visible) { // Content ?>
    <tr id="r__Content">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sms_curl__Content"><?= $Page->_Content->caption() ?></span></td>
        <td data-name="_Content" <?= $Page->_Content->cellAttributes() ?>>
<span id="el_sms_curl__Content">
<span<?= $Page->_Content->viewAttributes() ?>>
<?= $Page->_Content->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Enabled->Visible) { // Enabled ?>
    <tr id="r_Enabled">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sms_curl_Enabled"><?= $Page->Enabled->caption() ?></span></td>
        <td data-name="Enabled" <?= $Page->Enabled->cellAttributes() ?>>
<span id="el_sms_curl_Enabled">
<span<?= $Page->Enabled->viewAttributes() ?>>
<?= $Page->Enabled->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sms_curl_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_sms_curl_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
