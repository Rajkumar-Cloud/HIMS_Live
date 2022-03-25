<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeaddetailsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fcrm_leaddetailslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fcrm_leaddetailslist = currentForm = new ew.Form("fcrm_leaddetailslist", "list");
    fcrm_leaddetailslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fcrm_leaddetailslist");
});
var fcrm_leaddetailslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fcrm_leaddetailslistsrch = currentSearchForm = new ew.Form("fcrm_leaddetailslistsrch");

    // Dynamic selection lists

    // Filters
    fcrm_leaddetailslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fcrm_leaddetailslistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
    background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
    display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
    <div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
        <ul class="nav nav-tabs"></ul>
        <div class="tab-content"><!-- .tab-content -->
            <div class="tab-pane fade active show"></div>
        </div><!-- /.tab-content -->
    </div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script>
loadjs.ready("head", function() {
    ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
    ew.PREVIEW_SINGLE_ROW = false;
    ew.PREVIEW_OVERLAY = false;
    loadjs(ew.PATH_BASE + "js/ewpreview.js", "preview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->SearchOptions->visible()) { ?>
<?php $Page->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($Page->FilterOptions->visible()) { ?>
<?php $Page->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fcrm_leaddetailslistsrch" id="fcrm_leaddetailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fcrm_leaddetailslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="crm_leaddetails">
    <div class="ew-extended-search">
<div id="xsr_<?= $Page->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
    <div class="ew-quick-search input-group">
        <input type="text" name="<?= Config("TABLE_BASIC_SEARCH") ?>" id="<?= Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?= HtmlEncode($Page->BasicSearch->getKeyword()) ?>" placeholder="<?= HtmlEncode($Language->phrase("Search")) ?>">
        <input type="hidden" name="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?= HtmlEncode($Page->BasicSearch->getType()) ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?= $Page->BasicSearch->getTypeNameShort() ?></span></button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?= $Language->phrase("QuickSearchAuto") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?= $Language->phrase("QuickSearchExact") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?= $Language->phrase("QuickSearchAll") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?= $Language->phrase("QuickSearchAny") ?></a>
            </div>
        </div>
    </div>
</div>
    </div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> crm_leaddetails">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcrm_leaddetailslist" id="fcrm_leaddetailslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leaddetails">
<div id="gmp_crm_leaddetails" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_crm_leaddetailslist" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->leadid->Visible) { // leadid ?>
        <th data-name="leadid" class="<?= $Page->leadid->headerCellClass() ?>"><div id="elh_crm_leaddetails_leadid" class="crm_leaddetails_leadid"><?= $Page->renderSort($Page->leadid) ?></div></th>
<?php } ?>
<?php if ($Page->lead_no->Visible) { // lead_no ?>
        <th data-name="lead_no" class="<?= $Page->lead_no->headerCellClass() ?>"><div id="elh_crm_leaddetails_lead_no" class="crm_leaddetails_lead_no"><?= $Page->renderSort($Page->lead_no) ?></div></th>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
        <th data-name="_email" class="<?= $Page->_email->headerCellClass() ?>"><div id="elh_crm_leaddetails__email" class="crm_leaddetails__email"><?= $Page->renderSort($Page->_email) ?></div></th>
<?php } ?>
<?php if ($Page->interest->Visible) { // interest ?>
        <th data-name="interest" class="<?= $Page->interest->headerCellClass() ?>"><div id="elh_crm_leaddetails_interest" class="crm_leaddetails_interest"><?= $Page->renderSort($Page->interest) ?></div></th>
<?php } ?>
<?php if ($Page->firstname->Visible) { // firstname ?>
        <th data-name="firstname" class="<?= $Page->firstname->headerCellClass() ?>"><div id="elh_crm_leaddetails_firstname" class="crm_leaddetails_firstname"><?= $Page->renderSort($Page->firstname) ?></div></th>
<?php } ?>
<?php if ($Page->salutation->Visible) { // salutation ?>
        <th data-name="salutation" class="<?= $Page->salutation->headerCellClass() ?>"><div id="elh_crm_leaddetails_salutation" class="crm_leaddetails_salutation"><?= $Page->renderSort($Page->salutation) ?></div></th>
<?php } ?>
<?php if ($Page->lastname->Visible) { // lastname ?>
        <th data-name="lastname" class="<?= $Page->lastname->headerCellClass() ?>"><div id="elh_crm_leaddetails_lastname" class="crm_leaddetails_lastname"><?= $Page->renderSort($Page->lastname) ?></div></th>
<?php } ?>
<?php if ($Page->company->Visible) { // company ?>
        <th data-name="company" class="<?= $Page->company->headerCellClass() ?>"><div id="elh_crm_leaddetails_company" class="crm_leaddetails_company"><?= $Page->renderSort($Page->company) ?></div></th>
<?php } ?>
<?php if ($Page->annualrevenue->Visible) { // annualrevenue ?>
        <th data-name="annualrevenue" class="<?= $Page->annualrevenue->headerCellClass() ?>"><div id="elh_crm_leaddetails_annualrevenue" class="crm_leaddetails_annualrevenue"><?= $Page->renderSort($Page->annualrevenue) ?></div></th>
<?php } ?>
<?php if ($Page->industry->Visible) { // industry ?>
        <th data-name="industry" class="<?= $Page->industry->headerCellClass() ?>"><div id="elh_crm_leaddetails_industry" class="crm_leaddetails_industry"><?= $Page->renderSort($Page->industry) ?></div></th>
<?php } ?>
<?php if ($Page->campaign->Visible) { // campaign ?>
        <th data-name="campaign" class="<?= $Page->campaign->headerCellClass() ?>"><div id="elh_crm_leaddetails_campaign" class="crm_leaddetails_campaign"><?= $Page->renderSort($Page->campaign) ?></div></th>
<?php } ?>
<?php if ($Page->leadstatus->Visible) { // leadstatus ?>
        <th data-name="leadstatus" class="<?= $Page->leadstatus->headerCellClass() ?>"><div id="elh_crm_leaddetails_leadstatus" class="crm_leaddetails_leadstatus"><?= $Page->renderSort($Page->leadstatus) ?></div></th>
<?php } ?>
<?php if ($Page->leadsource->Visible) { // leadsource ?>
        <th data-name="leadsource" class="<?= $Page->leadsource->headerCellClass() ?>"><div id="elh_crm_leaddetails_leadsource" class="crm_leaddetails_leadsource"><?= $Page->renderSort($Page->leadsource) ?></div></th>
<?php } ?>
<?php if ($Page->converted->Visible) { // converted ?>
        <th data-name="converted" class="<?= $Page->converted->headerCellClass() ?>"><div id="elh_crm_leaddetails_converted" class="crm_leaddetails_converted"><?= $Page->renderSort($Page->converted) ?></div></th>
<?php } ?>
<?php if ($Page->licencekeystatus->Visible) { // licencekeystatus ?>
        <th data-name="licencekeystatus" class="<?= $Page->licencekeystatus->headerCellClass() ?>"><div id="elh_crm_leaddetails_licencekeystatus" class="crm_leaddetails_licencekeystatus"><?= $Page->renderSort($Page->licencekeystatus) ?></div></th>
<?php } ?>
<?php if ($Page->space->Visible) { // space ?>
        <th data-name="space" class="<?= $Page->space->headerCellClass() ?>"><div id="elh_crm_leaddetails_space" class="crm_leaddetails_space"><?= $Page->renderSort($Page->space) ?></div></th>
<?php } ?>
<?php if ($Page->priority->Visible) { // priority ?>
        <th data-name="priority" class="<?= $Page->priority->headerCellClass() ?>"><div id="elh_crm_leaddetails_priority" class="crm_leaddetails_priority"><?= $Page->renderSort($Page->priority) ?></div></th>
<?php } ?>
<?php if ($Page->demorequest->Visible) { // demorequest ?>
        <th data-name="demorequest" class="<?= $Page->demorequest->headerCellClass() ?>"><div id="elh_crm_leaddetails_demorequest" class="crm_leaddetails_demorequest"><?= $Page->renderSort($Page->demorequest) ?></div></th>
<?php } ?>
<?php if ($Page->partnercontact->Visible) { // partnercontact ?>
        <th data-name="partnercontact" class="<?= $Page->partnercontact->headerCellClass() ?>"><div id="elh_crm_leaddetails_partnercontact" class="crm_leaddetails_partnercontact"><?= $Page->renderSort($Page->partnercontact) ?></div></th>
<?php } ?>
<?php if ($Page->productversion->Visible) { // productversion ?>
        <th data-name="productversion" class="<?= $Page->productversion->headerCellClass() ?>"><div id="elh_crm_leaddetails_productversion" class="crm_leaddetails_productversion"><?= $Page->renderSort($Page->productversion) ?></div></th>
<?php } ?>
<?php if ($Page->product->Visible) { // product ?>
        <th data-name="product" class="<?= $Page->product->headerCellClass() ?>"><div id="elh_crm_leaddetails_product" class="crm_leaddetails_product"><?= $Page->renderSort($Page->product) ?></div></th>
<?php } ?>
<?php if ($Page->maildate->Visible) { // maildate ?>
        <th data-name="maildate" class="<?= $Page->maildate->headerCellClass() ?>"><div id="elh_crm_leaddetails_maildate" class="crm_leaddetails_maildate"><?= $Page->renderSort($Page->maildate) ?></div></th>
<?php } ?>
<?php if ($Page->nextstepdate->Visible) { // nextstepdate ?>
        <th data-name="nextstepdate" class="<?= $Page->nextstepdate->headerCellClass() ?>"><div id="elh_crm_leaddetails_nextstepdate" class="crm_leaddetails_nextstepdate"><?= $Page->renderSort($Page->nextstepdate) ?></div></th>
<?php } ?>
<?php if ($Page->fundingsituation->Visible) { // fundingsituation ?>
        <th data-name="fundingsituation" class="<?= $Page->fundingsituation->headerCellClass() ?>"><div id="elh_crm_leaddetails_fundingsituation" class="crm_leaddetails_fundingsituation"><?= $Page->renderSort($Page->fundingsituation) ?></div></th>
<?php } ?>
<?php if ($Page->purpose->Visible) { // purpose ?>
        <th data-name="purpose" class="<?= $Page->purpose->headerCellClass() ?>"><div id="elh_crm_leaddetails_purpose" class="crm_leaddetails_purpose"><?= $Page->renderSort($Page->purpose) ?></div></th>
<?php } ?>
<?php if ($Page->evaluationstatus->Visible) { // evaluationstatus ?>
        <th data-name="evaluationstatus" class="<?= $Page->evaluationstatus->headerCellClass() ?>"><div id="elh_crm_leaddetails_evaluationstatus" class="crm_leaddetails_evaluationstatus"><?= $Page->renderSort($Page->evaluationstatus) ?></div></th>
<?php } ?>
<?php if ($Page->transferdate->Visible) { // transferdate ?>
        <th data-name="transferdate" class="<?= $Page->transferdate->headerCellClass() ?>"><div id="elh_crm_leaddetails_transferdate" class="crm_leaddetails_transferdate"><?= $Page->renderSort($Page->transferdate) ?></div></th>
<?php } ?>
<?php if ($Page->revenuetype->Visible) { // revenuetype ?>
        <th data-name="revenuetype" class="<?= $Page->revenuetype->headerCellClass() ?>"><div id="elh_crm_leaddetails_revenuetype" class="crm_leaddetails_revenuetype"><?= $Page->renderSort($Page->revenuetype) ?></div></th>
<?php } ?>
<?php if ($Page->noofemployees->Visible) { // noofemployees ?>
        <th data-name="noofemployees" class="<?= $Page->noofemployees->headerCellClass() ?>"><div id="elh_crm_leaddetails_noofemployees" class="crm_leaddetails_noofemployees"><?= $Page->renderSort($Page->noofemployees) ?></div></th>
<?php } ?>
<?php if ($Page->secondaryemail->Visible) { // secondaryemail ?>
        <th data-name="secondaryemail" class="<?= $Page->secondaryemail->headerCellClass() ?>"><div id="elh_crm_leaddetails_secondaryemail" class="crm_leaddetails_secondaryemail"><?= $Page->renderSort($Page->secondaryemail) ?></div></th>
<?php } ?>
<?php if ($Page->noapprovalcalls->Visible) { // noapprovalcalls ?>
        <th data-name="noapprovalcalls" class="<?= $Page->noapprovalcalls->headerCellClass() ?>"><div id="elh_crm_leaddetails_noapprovalcalls" class="crm_leaddetails_noapprovalcalls"><?= $Page->renderSort($Page->noapprovalcalls) ?></div></th>
<?php } ?>
<?php if ($Page->noapprovalemails->Visible) { // noapprovalemails ?>
        <th data-name="noapprovalemails" class="<?= $Page->noapprovalemails->headerCellClass() ?>"><div id="elh_crm_leaddetails_noapprovalemails" class="crm_leaddetails_noapprovalemails"><?= $Page->renderSort($Page->noapprovalemails) ?></div></th>
<?php } ?>
<?php if ($Page->vat_id->Visible) { // vat_id ?>
        <th data-name="vat_id" class="<?= $Page->vat_id->headerCellClass() ?>"><div id="elh_crm_leaddetails_vat_id" class="crm_leaddetails_vat_id"><?= $Page->renderSort($Page->vat_id) ?></div></th>
<?php } ?>
<?php if ($Page->registration_number_1->Visible) { // registration_number_1 ?>
        <th data-name="registration_number_1" class="<?= $Page->registration_number_1->headerCellClass() ?>"><div id="elh_crm_leaddetails_registration_number_1" class="crm_leaddetails_registration_number_1"><?= $Page->renderSort($Page->registration_number_1) ?></div></th>
<?php } ?>
<?php if ($Page->registration_number_2->Visible) { // registration_number_2 ?>
        <th data-name="registration_number_2" class="<?= $Page->registration_number_2->headerCellClass() ?>"><div id="elh_crm_leaddetails_registration_number_2" class="crm_leaddetails_registration_number_2"><?= $Page->renderSort($Page->registration_number_2) ?></div></th>
<?php } ?>
<?php if ($Page->subindustry->Visible) { // subindustry ?>
        <th data-name="subindustry" class="<?= $Page->subindustry->headerCellClass() ?>"><div id="elh_crm_leaddetails_subindustry" class="crm_leaddetails_subindustry"><?= $Page->renderSort($Page->subindustry) ?></div></th>
<?php } ?>
<?php if ($Page->leads_relation->Visible) { // leads_relation ?>
        <th data-name="leads_relation" class="<?= $Page->leads_relation->headerCellClass() ?>"><div id="elh_crm_leaddetails_leads_relation" class="crm_leaddetails_leads_relation"><?= $Page->renderSort($Page->leads_relation) ?></div></th>
<?php } ?>
<?php if ($Page->legal_form->Visible) { // legal_form ?>
        <th data-name="legal_form" class="<?= $Page->legal_form->headerCellClass() ?>"><div id="elh_crm_leaddetails_legal_form" class="crm_leaddetails_legal_form"><?= $Page->renderSort($Page->legal_form) ?></div></th>
<?php } ?>
<?php if ($Page->sum_time->Visible) { // sum_time ?>
        <th data-name="sum_time" class="<?= $Page->sum_time->headerCellClass() ?>"><div id="elh_crm_leaddetails_sum_time" class="crm_leaddetails_sum_time"><?= $Page->renderSort($Page->sum_time) ?></div></th>
<?php } ?>
<?php if ($Page->active->Visible) { // active ?>
        <th data-name="active" class="<?= $Page->active->headerCellClass() ?>"><div id="elh_crm_leaddetails_active" class="crm_leaddetails_active"><?= $Page->renderSort($Page->active) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
if ($Page->ExportAll && $Page->isExport()) {
    $Page->StopRecord = $Page->TotalRecords;
} else {
    // Set the last record to display
    if ($Page->TotalRecords > $Page->StartRecord + $Page->DisplayRecords - 1) {
        $Page->StopRecord = $Page->StartRecord + $Page->DisplayRecords - 1;
    } else {
        $Page->StopRecord = $Page->TotalRecords;
    }
}
$Page->RecordCount = $Page->StartRecord - 1;
if ($Page->Recordset && !$Page->Recordset->EOF) {
    // Nothing to do
} elseif (!$Page->AllowAddDeleteRow && $Page->StopRecord == 0) {
    $Page->StopRecord = $Page->GridAddRowCount;
}

// Initialize aggregate
$Page->RowType = ROWTYPE_AGGREGATEINIT;
$Page->resetAttributes();
$Page->renderRow();
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;

        // Set up key count
        $Page->KeyCount = $Page->RowIndex;

        // Init row class and style
        $Page->resetAttributes();
        $Page->CssClass = "";
        if ($Page->isGridAdd()) {
            $Page->loadRowValues(); // Load default values
            $Page->OldKey = "";
            $Page->setKey($Page->OldKey);
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
            if ($Page->isGridEdit()) {
                $Page->OldKey = $Page->getKey(true); // Get from CurrentValue
                $Page->setKey($Page->OldKey);
            }
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_crm_leaddetails", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->leadid->Visible) { // leadid ?>
        <td data-name="leadid" <?= $Page->leadid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_leadid">
<span<?= $Page->leadid->viewAttributes() ?>>
<?= $Page->leadid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->lead_no->Visible) { // lead_no ?>
        <td data-name="lead_no" <?= $Page->lead_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_lead_no">
<span<?= $Page->lead_no->viewAttributes() ?>>
<?= $Page->lead_no->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_email->Visible) { // email ?>
        <td data-name="_email" <?= $Page->_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails__email">
<span<?= $Page->_email->viewAttributes() ?>>
<?= $Page->_email->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->interest->Visible) { // interest ?>
        <td data-name="interest" <?= $Page->interest->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_interest">
<span<?= $Page->interest->viewAttributes() ?>>
<?= $Page->interest->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->firstname->Visible) { // firstname ?>
        <td data-name="firstname" <?= $Page->firstname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_firstname">
<span<?= $Page->firstname->viewAttributes() ?>>
<?= $Page->firstname->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->salutation->Visible) { // salutation ?>
        <td data-name="salutation" <?= $Page->salutation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_salutation">
<span<?= $Page->salutation->viewAttributes() ?>>
<?= $Page->salutation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->lastname->Visible) { // lastname ?>
        <td data-name="lastname" <?= $Page->lastname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_lastname">
<span<?= $Page->lastname->viewAttributes() ?>>
<?= $Page->lastname->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->company->Visible) { // company ?>
        <td data-name="company" <?= $Page->company->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_company">
<span<?= $Page->company->viewAttributes() ?>>
<?= $Page->company->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->annualrevenue->Visible) { // annualrevenue ?>
        <td data-name="annualrevenue" <?= $Page->annualrevenue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_annualrevenue">
<span<?= $Page->annualrevenue->viewAttributes() ?>>
<?= $Page->annualrevenue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->industry->Visible) { // industry ?>
        <td data-name="industry" <?= $Page->industry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_industry">
<span<?= $Page->industry->viewAttributes() ?>>
<?= $Page->industry->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->campaign->Visible) { // campaign ?>
        <td data-name="campaign" <?= $Page->campaign->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_campaign">
<span<?= $Page->campaign->viewAttributes() ?>>
<?= $Page->campaign->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->leadstatus->Visible) { // leadstatus ?>
        <td data-name="leadstatus" <?= $Page->leadstatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_leadstatus">
<span<?= $Page->leadstatus->viewAttributes() ?>>
<?= $Page->leadstatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->leadsource->Visible) { // leadsource ?>
        <td data-name="leadsource" <?= $Page->leadsource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_leadsource">
<span<?= $Page->leadsource->viewAttributes() ?>>
<?= $Page->leadsource->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->converted->Visible) { // converted ?>
        <td data-name="converted" <?= $Page->converted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_converted">
<span<?= $Page->converted->viewAttributes() ?>>
<?= $Page->converted->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->licencekeystatus->Visible) { // licencekeystatus ?>
        <td data-name="licencekeystatus" <?= $Page->licencekeystatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_licencekeystatus">
<span<?= $Page->licencekeystatus->viewAttributes() ?>>
<?= $Page->licencekeystatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->space->Visible) { // space ?>
        <td data-name="space" <?= $Page->space->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_space">
<span<?= $Page->space->viewAttributes() ?>>
<?= $Page->space->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->priority->Visible) { // priority ?>
        <td data-name="priority" <?= $Page->priority->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_priority">
<span<?= $Page->priority->viewAttributes() ?>>
<?= $Page->priority->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->demorequest->Visible) { // demorequest ?>
        <td data-name="demorequest" <?= $Page->demorequest->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_demorequest">
<span<?= $Page->demorequest->viewAttributes() ?>>
<?= $Page->demorequest->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->partnercontact->Visible) { // partnercontact ?>
        <td data-name="partnercontact" <?= $Page->partnercontact->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_partnercontact">
<span<?= $Page->partnercontact->viewAttributes() ?>>
<?= $Page->partnercontact->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->productversion->Visible) { // productversion ?>
        <td data-name="productversion" <?= $Page->productversion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_productversion">
<span<?= $Page->productversion->viewAttributes() ?>>
<?= $Page->productversion->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->product->Visible) { // product ?>
        <td data-name="product" <?= $Page->product->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_product">
<span<?= $Page->product->viewAttributes() ?>>
<?= $Page->product->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->maildate->Visible) { // maildate ?>
        <td data-name="maildate" <?= $Page->maildate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_maildate">
<span<?= $Page->maildate->viewAttributes() ?>>
<?= $Page->maildate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->nextstepdate->Visible) { // nextstepdate ?>
        <td data-name="nextstepdate" <?= $Page->nextstepdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_nextstepdate">
<span<?= $Page->nextstepdate->viewAttributes() ?>>
<?= $Page->nextstepdate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->fundingsituation->Visible) { // fundingsituation ?>
        <td data-name="fundingsituation" <?= $Page->fundingsituation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_fundingsituation">
<span<?= $Page->fundingsituation->viewAttributes() ?>>
<?= $Page->fundingsituation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->purpose->Visible) { // purpose ?>
        <td data-name="purpose" <?= $Page->purpose->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_purpose">
<span<?= $Page->purpose->viewAttributes() ?>>
<?= $Page->purpose->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->evaluationstatus->Visible) { // evaluationstatus ?>
        <td data-name="evaluationstatus" <?= $Page->evaluationstatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_evaluationstatus">
<span<?= $Page->evaluationstatus->viewAttributes() ?>>
<?= $Page->evaluationstatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->transferdate->Visible) { // transferdate ?>
        <td data-name="transferdate" <?= $Page->transferdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_transferdate">
<span<?= $Page->transferdate->viewAttributes() ?>>
<?= $Page->transferdate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->revenuetype->Visible) { // revenuetype ?>
        <td data-name="revenuetype" <?= $Page->revenuetype->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_revenuetype">
<span<?= $Page->revenuetype->viewAttributes() ?>>
<?= $Page->revenuetype->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->noofemployees->Visible) { // noofemployees ?>
        <td data-name="noofemployees" <?= $Page->noofemployees->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_noofemployees">
<span<?= $Page->noofemployees->viewAttributes() ?>>
<?= $Page->noofemployees->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->secondaryemail->Visible) { // secondaryemail ?>
        <td data-name="secondaryemail" <?= $Page->secondaryemail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_secondaryemail">
<span<?= $Page->secondaryemail->viewAttributes() ?>>
<?= $Page->secondaryemail->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->noapprovalcalls->Visible) { // noapprovalcalls ?>
        <td data-name="noapprovalcalls" <?= $Page->noapprovalcalls->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_noapprovalcalls">
<span<?= $Page->noapprovalcalls->viewAttributes() ?>>
<?= $Page->noapprovalcalls->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->noapprovalemails->Visible) { // noapprovalemails ?>
        <td data-name="noapprovalemails" <?= $Page->noapprovalemails->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_noapprovalemails">
<span<?= $Page->noapprovalemails->viewAttributes() ?>>
<?= $Page->noapprovalemails->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vat_id->Visible) { // vat_id ?>
        <td data-name="vat_id" <?= $Page->vat_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_vat_id">
<span<?= $Page->vat_id->viewAttributes() ?>>
<?= $Page->vat_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->registration_number_1->Visible) { // registration_number_1 ?>
        <td data-name="registration_number_1" <?= $Page->registration_number_1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_registration_number_1">
<span<?= $Page->registration_number_1->viewAttributes() ?>>
<?= $Page->registration_number_1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->registration_number_2->Visible) { // registration_number_2 ?>
        <td data-name="registration_number_2" <?= $Page->registration_number_2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_registration_number_2">
<span<?= $Page->registration_number_2->viewAttributes() ?>>
<?= $Page->registration_number_2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->subindustry->Visible) { // subindustry ?>
        <td data-name="subindustry" <?= $Page->subindustry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_subindustry">
<span<?= $Page->subindustry->viewAttributes() ?>>
<?= $Page->subindustry->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->leads_relation->Visible) { // leads_relation ?>
        <td data-name="leads_relation" <?= $Page->leads_relation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_leads_relation">
<span<?= $Page->leads_relation->viewAttributes() ?>>
<?= $Page->leads_relation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->legal_form->Visible) { // legal_form ?>
        <td data-name="legal_form" <?= $Page->legal_form->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_legal_form">
<span<?= $Page->legal_form->viewAttributes() ?>>
<?= $Page->legal_form->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->sum_time->Visible) { // sum_time ?>
        <td data-name="sum_time" <?= $Page->sum_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_sum_time">
<span<?= $Page->sum_time->viewAttributes() ?>>
<?= $Page->sum_time->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->active->Visible) { // active ?>
        <td data-name="active" <?= $Page->active->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_active">
<span<?= $Page->active->viewAttributes() ?>>
<?= $Page->active->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }
    if (!$Page->isGridAdd()) {
        $Page->Recordset->moveNext();
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("crm_leaddetails");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_crm_leaddetails",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
