<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIvfOocytedenudationEmbryologyChartView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_ivf_oocytedenudation_embryology_chartview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fview_ivf_oocytedenudation_embryology_chartview = currentForm = new ew.Form("fview_ivf_oocytedenudation_embryology_chartview", "view");
    loadjs.done("fview_ivf_oocytedenudation_embryology_chartview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.view_ivf_oocytedenudation_embryology_chart) ew.vars.tables.view_ivf_oocytedenudation_embryology_chart = <?= JsonEncode(GetClientVar("tables", "view_ivf_oocytedenudation_embryology_chart")) ?>;
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
<form name="fview_ivf_oocytedenudation_embryology_chartview" id="fview_ivf_oocytedenudation_embryology_chartview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ivf_oocytedenudation_embryology_chart">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
    <tr id="r_OocyteNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_OocyteNo"><?= $Page->OocyteNo->caption() ?></span></td>
        <td data-name="OocyteNo" <?= $Page->OocyteNo->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_OocyteNo">
<span<?= $Page->OocyteNo->viewAttributes() ?>>
<?= $Page->OocyteNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
    <tr id="r_Stage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Stage"><?= $Page->Stage->caption() ?></span></td>
        <td data-name="Stage" <?= $Page->Stage->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_RIDNo"><?= $Page->RIDNo->caption() ?></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
    <tr id="r_Day0OocyteStage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage"><?= $Page->Day0OocyteStage->caption() ?></span></td>
        <td data-name="Day0OocyteStage" <?= $Page->Day0OocyteStage->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage">
<span<?= $Page->Day0OocyteStage->viewAttributes() ?>>
<?= $Page->Day0OocyteStage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day0sino->Visible) { // Day0sino ?>
    <tr id="r_Day0sino">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Day0sino"><?= $Page->Day0sino->caption() ?></span></td>
        <td data-name="Day0sino" <?= $Page->Day0sino->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Day0sino">
<span<?= $Page->Day0sino->viewAttributes() ?>>
<?= $Page->Day0sino->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DidNO->Visible) { // DidNO ?>
    <tr id="r_DidNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_DidNO"><?= $Page->DidNO->caption() ?></span></td>
        <td data-name="DidNO" <?= $Page->DidNO->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_DidNO">
<span<?= $Page->DidNO->viewAttributes() ?>>
<?= $Page->DidNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Remarks"><?= $Page->Remarks->caption() ?></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
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
