<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentApplicationsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var frecruitment_applicationsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    frecruitment_applicationsview = currentForm = new ew.Form("frecruitment_applicationsview", "view");
    loadjs.done("frecruitment_applicationsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.recruitment_applications) ew.vars.tables.recruitment_applications = <?= JsonEncode(GetClientVar("tables", "recruitment_applications")) ?>;
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
<form name="frecruitment_applicationsview" id="frecruitment_applicationsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_applications">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_applications_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_recruitment_applications_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->job->Visible) { // job ?>
    <tr id="r_job">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_applications_job"><?= $Page->job->caption() ?></span></td>
        <td data-name="job" <?= $Page->job->cellAttributes() ?>>
<span id="el_recruitment_applications_job">
<span<?= $Page->job->viewAttributes() ?>>
<?= $Page->job->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->candidate->Visible) { // candidate ?>
    <tr id="r_candidate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_applications_candidate"><?= $Page->candidate->caption() ?></span></td>
        <td data-name="candidate" <?= $Page->candidate->cellAttributes() ?>>
<span id="el_recruitment_applications_candidate">
<span<?= $Page->candidate->viewAttributes() ?>>
<?= $Page->candidate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <tr id="r_created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_applications_created"><?= $Page->created->caption() ?></span></td>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el_recruitment_applications_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->referredByEmail->Visible) { // referredByEmail ?>
    <tr id="r_referredByEmail">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_applications_referredByEmail"><?= $Page->referredByEmail->caption() ?></span></td>
        <td data-name="referredByEmail" <?= $Page->referredByEmail->cellAttributes() ?>>
<span id="el_recruitment_applications_referredByEmail">
<span<?= $Page->referredByEmail->viewAttributes() ?>>
<?= $Page->referredByEmail->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->notes->Visible) { // notes ?>
    <tr id="r_notes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_applications_notes"><?= $Page->notes->caption() ?></span></td>
        <td data-name="notes" <?= $Page->notes->cellAttributes() ?>>
<span id="el_recruitment_applications_notes">
<span<?= $Page->notes->viewAttributes() ?>>
<?= $Page->notes->getViewValue() ?></span>
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
