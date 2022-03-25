<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfMasUserTemplateView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_mas_user_templateview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_mas_user_templateview = currentForm = new ew.Form("fivf_mas_user_templateview", "view");
    loadjs.done("fivf_mas_user_templateview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.ivf_mas_user_template) ew.vars.tables.ivf_mas_user_template = <?= JsonEncode(GetClientVar("tables", "ivf_mas_user_template")) ?>;
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
<form name="fivf_mas_user_templateview" id="fivf_mas_user_templateview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_user_template">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplateName->Visible) { // TemplateName ?>
    <tr id="r_TemplateName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_TemplateName"><?= $Page->TemplateName->caption() ?></span></td>
        <td data-name="TemplateName" <?= $Page->TemplateName->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_TemplateName">
<span<?= $Page->TemplateName->viewAttributes() ?>>
<?= $Page->TemplateName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplateType->Visible) { // TemplateType ?>
    <tr id="r_TemplateType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_TemplateType"><?= $Page->TemplateType->caption() ?></span></td>
        <td data-name="TemplateType" <?= $Page->TemplateType->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_TemplateType">
<span<?= $Page->TemplateType->viewAttributes() ?>>
<?= $Page->TemplateType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_Template->Visible) { // Template ?>
    <tr id="r__Template">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template__Template"><?= $Page->_Template->caption() ?></span></td>
        <td data-name="_Template" <?= $Page->_Template->cellAttributes() ?>>
<span id="el_ivf_mas_user_template__Template">
<span<?= $Page->_Template->viewAttributes() ?>>
<?= $Page->_Template->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <tr id="r_created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_created"><?= $Page->created->caption() ?></span></td>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdDatetime->Visible) { // createdDatetime ?>
    <tr id="r_createdDatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_createdDatetime"><?= $Page->createdDatetime->caption() ?></span></td>
        <td data-name="createdDatetime" <?= $Page->createdDatetime->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_createdDatetime">
<span<?= $Page->createdDatetime->viewAttributes() ?>>
<?= $Page->createdDatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modified->Visible) { // modified ?>
    <tr id="r_modified">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_modified"><?= $Page->modified->caption() ?></span></td>
        <td data-name="modified" <?= $Page->modified->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_modified">
<span<?= $Page->modified->viewAttributes() ?>>
<?= $Page->modified->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedDatetime->Visible) { // modifiedDatetime ?>
    <tr id="r_modifiedDatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_modifiedDatetime"><?= $Page->modifiedDatetime->caption() ?></span></td>
        <td data-name="modifiedDatetime" <?= $Page->modifiedDatetime->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_modifiedDatetime">
<span<?= $Page->modifiedDatetime->viewAttributes() ?>>
<?= $Page->modifiedDatetime->getViewValue() ?></span>
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
