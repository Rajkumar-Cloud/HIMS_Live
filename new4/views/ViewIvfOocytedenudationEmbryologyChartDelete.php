<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIvfOocytedenudationEmbryologyChartDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_ivf_oocytedenudation_embryology_chartdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fview_ivf_oocytedenudation_embryology_chartdelete = currentForm = new ew.Form("fview_ivf_oocytedenudation_embryology_chartdelete", "delete");
    loadjs.done("fview_ivf_oocytedenudation_embryology_chartdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.view_ivf_oocytedenudation_embryology_chart) ew.vars.tables.view_ivf_oocytedenudation_embryology_chart = <?= JsonEncode(GetClientVar("tables", "view_ivf_oocytedenudation_embryology_chart")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_ivf_oocytedenudation_embryology_chartdelete" id="fview_ivf_oocytedenudation_embryology_chartdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ivf_oocytedenudation_embryology_chart">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_id" class="view_ivf_oocytedenudation_embryology_chart_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <th class="<?= $Page->OocyteNo->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_OocyteNo" class="view_ivf_oocytedenudation_embryology_chart_OocyteNo"><?= $Page->OocyteNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <th class="<?= $Page->Stage->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Stage" class="view_ivf_oocytedenudation_embryology_chart_Stage"><?= $Page->Stage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th class="<?= $Page->RIDNo->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_RIDNo" class="view_ivf_oocytedenudation_embryology_chart_RIDNo"><?= $Page->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Name" class="view_ivf_oocytedenudation_embryology_chart_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <th class="<?= $Page->Day0OocyteStage->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage" class="view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage"><?= $Page->Day0OocyteStage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day0sino->Visible) { // Day0sino ?>
        <th class="<?= $Page->Day0sino->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Day0sino" class="view_ivf_oocytedenudation_embryology_chart_Day0sino"><?= $Page->Day0sino->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_TidNo" class="view_ivf_oocytedenudation_embryology_chart_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DidNO->Visible) { // DidNO ?>
        <th class="<?= $Page->DidNO->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_DidNO" class="view_ivf_oocytedenudation_embryology_chart_DidNO"><?= $Page->DidNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th class="<?= $Page->Remarks->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Remarks" class="view_ivf_oocytedenudation_embryology_chart_Remarks"><?= $Page->Remarks->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_id" class="view_ivf_oocytedenudation_embryology_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <td <?= $Page->OocyteNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_OocyteNo" class="view_ivf_oocytedenudation_embryology_chart_OocyteNo">
<span<?= $Page->OocyteNo->viewAttributes() ?>>
<?= $Page->OocyteNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <td <?= $Page->Stage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Stage" class="view_ivf_oocytedenudation_embryology_chart_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_RIDNo" class="view_ivf_oocytedenudation_embryology_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Name" class="view_ivf_oocytedenudation_embryology_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <td <?= $Page->Day0OocyteStage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage" class="view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage">
<span<?= $Page->Day0OocyteStage->viewAttributes() ?>>
<?= $Page->Day0OocyteStage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day0sino->Visible) { // Day0sino ?>
        <td <?= $Page->Day0sino->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Day0sino" class="view_ivf_oocytedenudation_embryology_chart_Day0sino">
<span<?= $Page->Day0sino->viewAttributes() ?>>
<?= $Page->Day0sino->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_TidNo" class="view_ivf_oocytedenudation_embryology_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DidNO->Visible) { // DidNO ?>
        <td <?= $Page->DidNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_DidNO" class="view_ivf_oocytedenudation_embryology_chart_DidNO">
<span<?= $Page->DidNO->viewAttributes() ?>>
<?= $Page->DidNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Remarks" class="view_ivf_oocytedenudation_embryology_chart_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
