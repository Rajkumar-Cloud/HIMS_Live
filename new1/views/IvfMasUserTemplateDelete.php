<?php

namespace PHPMaker2021\project3;

// Page object
$IvfMasUserTemplateDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_mas_user_templatedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_mas_user_templatedelete = currentForm = new ew.Form("fivf_mas_user_templatedelete", "delete");
    loadjs.done("fivf_mas_user_templatedelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fivf_mas_user_templatedelete" id="fivf_mas_user_templatedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_user_template">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_mas_user_template_id" class="ivf_mas_user_template_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TemplateName->Visible) { // TemplateName ?>
        <th class="<?= $Page->TemplateName->headerCellClass() ?>"><span id="elh_ivf_mas_user_template_TemplateName" class="ivf_mas_user_template_TemplateName"><?= $Page->TemplateName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TemplateType->Visible) { // TemplateType ?>
        <th class="<?= $Page->TemplateType->headerCellClass() ?>"><span id="elh_ivf_mas_user_template_TemplateType" class="ivf_mas_user_template_TemplateType"><?= $Page->TemplateType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th class="<?= $Page->created->headerCellClass() ?>"><span id="elh_ivf_mas_user_template_created" class="ivf_mas_user_template_created"><?= $Page->created->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdDatetime->Visible) { // createdDatetime ?>
        <th class="<?= $Page->createdDatetime->headerCellClass() ?>"><span id="elh_ivf_mas_user_template_createdDatetime" class="ivf_mas_user_template_createdDatetime"><?= $Page->createdDatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modified->Visible) { // modified ?>
        <th class="<?= $Page->modified->headerCellClass() ?>"><span id="elh_ivf_mas_user_template_modified" class="ivf_mas_user_template_modified"><?= $Page->modified->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedDatetime->Visible) { // modifiedDatetime ?>
        <th class="<?= $Page->modifiedDatetime->headerCellClass() ?>"><span id="elh_ivf_mas_user_template_modifiedDatetime" class="ivf_mas_user_template_modifiedDatetime"><?= $Page->modifiedDatetime->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_mas_user_template_id" class="ivf_mas_user_template_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TemplateName->Visible) { // TemplateName ?>
        <td <?= $Page->TemplateName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_mas_user_template_TemplateName" class="ivf_mas_user_template_TemplateName">
<span<?= $Page->TemplateName->viewAttributes() ?>>
<?= $Page->TemplateName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TemplateType->Visible) { // TemplateType ?>
        <td <?= $Page->TemplateType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_mas_user_template_TemplateType" class="ivf_mas_user_template_TemplateType">
<span<?= $Page->TemplateType->viewAttributes() ?>>
<?= $Page->TemplateType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <td <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_mas_user_template_created" class="ivf_mas_user_template_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdDatetime->Visible) { // createdDatetime ?>
        <td <?= $Page->createdDatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_mas_user_template_createdDatetime" class="ivf_mas_user_template_createdDatetime">
<span<?= $Page->createdDatetime->viewAttributes() ?>>
<?= $Page->createdDatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modified->Visible) { // modified ?>
        <td <?= $Page->modified->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_mas_user_template_modified" class="ivf_mas_user_template_modified">
<span<?= $Page->modified->viewAttributes() ?>>
<?= $Page->modified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedDatetime->Visible) { // modifiedDatetime ?>
        <td <?= $Page->modifiedDatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_mas_user_template_modifiedDatetime" class="ivf_mas_user_template_modifiedDatetime">
<span<?= $Page->modifiedDatetime->viewAttributes() ?>>
<?= $Page->modifiedDatetime->getViewValue() ?></span>
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
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
