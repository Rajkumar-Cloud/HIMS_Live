<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmContactdetailsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fcrm_contactdetailslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fcrm_contactdetailslist = currentForm = new ew.Form("fcrm_contactdetailslist", "list");
    fcrm_contactdetailslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fcrm_contactdetailslist");
});
var fcrm_contactdetailslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fcrm_contactdetailslistsrch = currentSearchForm = new ew.Form("fcrm_contactdetailslistsrch");

    // Dynamic selection lists

    // Filters
    fcrm_contactdetailslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fcrm_contactdetailslistsrch");
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
<form name="fcrm_contactdetailslistsrch" id="fcrm_contactdetailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fcrm_contactdetailslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="crm_contactdetails">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> crm_contactdetails">
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
<form name="fcrm_contactdetailslist" id="fcrm_contactdetailslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_contactdetails">
<div id="gmp_crm_contactdetails" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_crm_contactdetailslist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->contactid->Visible) { // contactid ?>
        <th data-name="contactid" class="<?= $Page->contactid->headerCellClass() ?>"><div id="elh_crm_contactdetails_contactid" class="crm_contactdetails_contactid"><?= $Page->renderSort($Page->contactid) ?></div></th>
<?php } ?>
<?php if ($Page->contact_no->Visible) { // contact_no ?>
        <th data-name="contact_no" class="<?= $Page->contact_no->headerCellClass() ?>"><div id="elh_crm_contactdetails_contact_no" class="crm_contactdetails_contact_no"><?= $Page->renderSort($Page->contact_no) ?></div></th>
<?php } ?>
<?php if ($Page->parentid->Visible) { // parentid ?>
        <th data-name="parentid" class="<?= $Page->parentid->headerCellClass() ?>"><div id="elh_crm_contactdetails_parentid" class="crm_contactdetails_parentid"><?= $Page->renderSort($Page->parentid) ?></div></th>
<?php } ?>
<?php if ($Page->salutation->Visible) { // salutation ?>
        <th data-name="salutation" class="<?= $Page->salutation->headerCellClass() ?>"><div id="elh_crm_contactdetails_salutation" class="crm_contactdetails_salutation"><?= $Page->renderSort($Page->salutation) ?></div></th>
<?php } ?>
<?php if ($Page->firstname->Visible) { // firstname ?>
        <th data-name="firstname" class="<?= $Page->firstname->headerCellClass() ?>"><div id="elh_crm_contactdetails_firstname" class="crm_contactdetails_firstname"><?= $Page->renderSort($Page->firstname) ?></div></th>
<?php } ?>
<?php if ($Page->lastname->Visible) { // lastname ?>
        <th data-name="lastname" class="<?= $Page->lastname->headerCellClass() ?>"><div id="elh_crm_contactdetails_lastname" class="crm_contactdetails_lastname"><?= $Page->renderSort($Page->lastname) ?></div></th>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
        <th data-name="_email" class="<?= $Page->_email->headerCellClass() ?>"><div id="elh_crm_contactdetails__email" class="crm_contactdetails__email"><?= $Page->renderSort($Page->_email) ?></div></th>
<?php } ?>
<?php if ($Page->phone->Visible) { // phone ?>
        <th data-name="phone" class="<?= $Page->phone->headerCellClass() ?>"><div id="elh_crm_contactdetails_phone" class="crm_contactdetails_phone"><?= $Page->renderSort($Page->phone) ?></div></th>
<?php } ?>
<?php if ($Page->mobile->Visible) { // mobile ?>
        <th data-name="mobile" class="<?= $Page->mobile->headerCellClass() ?>"><div id="elh_crm_contactdetails_mobile" class="crm_contactdetails_mobile"><?= $Page->renderSort($Page->mobile) ?></div></th>
<?php } ?>
<?php if ($Page->reportsto->Visible) { // reportsto ?>
        <th data-name="reportsto" class="<?= $Page->reportsto->headerCellClass() ?>"><div id="elh_crm_contactdetails_reportsto" class="crm_contactdetails_reportsto"><?= $Page->renderSort($Page->reportsto) ?></div></th>
<?php } ?>
<?php if ($Page->training->Visible) { // training ?>
        <th data-name="training" class="<?= $Page->training->headerCellClass() ?>"><div id="elh_crm_contactdetails_training" class="crm_contactdetails_training"><?= $Page->renderSort($Page->training) ?></div></th>
<?php } ?>
<?php if ($Page->usertype->Visible) { // usertype ?>
        <th data-name="usertype" class="<?= $Page->usertype->headerCellClass() ?>"><div id="elh_crm_contactdetails_usertype" class="crm_contactdetails_usertype"><?= $Page->renderSort($Page->usertype) ?></div></th>
<?php } ?>
<?php if ($Page->contacttype->Visible) { // contacttype ?>
        <th data-name="contacttype" class="<?= $Page->contacttype->headerCellClass() ?>"><div id="elh_crm_contactdetails_contacttype" class="crm_contactdetails_contacttype"><?= $Page->renderSort($Page->contacttype) ?></div></th>
<?php } ?>
<?php if ($Page->otheremail->Visible) { // otheremail ?>
        <th data-name="otheremail" class="<?= $Page->otheremail->headerCellClass() ?>"><div id="elh_crm_contactdetails_otheremail" class="crm_contactdetails_otheremail"><?= $Page->renderSort($Page->otheremail) ?></div></th>
<?php } ?>
<?php if ($Page->donotcall->Visible) { // donotcall ?>
        <th data-name="donotcall" class="<?= $Page->donotcall->headerCellClass() ?>"><div id="elh_crm_contactdetails_donotcall" class="crm_contactdetails_donotcall"><?= $Page->renderSort($Page->donotcall) ?></div></th>
<?php } ?>
<?php if ($Page->emailoptout->Visible) { // emailoptout ?>
        <th data-name="emailoptout" class="<?= $Page->emailoptout->headerCellClass() ?>"><div id="elh_crm_contactdetails_emailoptout" class="crm_contactdetails_emailoptout"><?= $Page->renderSort($Page->emailoptout) ?></div></th>
<?php } ?>
<?php if ($Page->isconvertedfromlead->Visible) { // isconvertedfromlead ?>
        <th data-name="isconvertedfromlead" class="<?= $Page->isconvertedfromlead->headerCellClass() ?>"><div id="elh_crm_contactdetails_isconvertedfromlead" class="crm_contactdetails_isconvertedfromlead"><?= $Page->renderSort($Page->isconvertedfromlead) ?></div></th>
<?php } ?>
<?php if ($Page->secondary_email->Visible) { // secondary_email ?>
        <th data-name="secondary_email" class="<?= $Page->secondary_email->headerCellClass() ?>"><div id="elh_crm_contactdetails_secondary_email" class="crm_contactdetails_secondary_email"><?= $Page->renderSort($Page->secondary_email) ?></div></th>
<?php } ?>
<?php if ($Page->notifilanguage->Visible) { // notifilanguage ?>
        <th data-name="notifilanguage" class="<?= $Page->notifilanguage->headerCellClass() ?>"><div id="elh_crm_contactdetails_notifilanguage" class="crm_contactdetails_notifilanguage"><?= $Page->renderSort($Page->notifilanguage) ?></div></th>
<?php } ?>
<?php if ($Page->contactstatus->Visible) { // contactstatus ?>
        <th data-name="contactstatus" class="<?= $Page->contactstatus->headerCellClass() ?>"><div id="elh_crm_contactdetails_contactstatus" class="crm_contactdetails_contactstatus"><?= $Page->renderSort($Page->contactstatus) ?></div></th>
<?php } ?>
<?php if ($Page->dav_status->Visible) { // dav_status ?>
        <th data-name="dav_status" class="<?= $Page->dav_status->headerCellClass() ?>"><div id="elh_crm_contactdetails_dav_status" class="crm_contactdetails_dav_status"><?= $Page->renderSort($Page->dav_status) ?></div></th>
<?php } ?>
<?php if ($Page->jobtitle->Visible) { // jobtitle ?>
        <th data-name="jobtitle" class="<?= $Page->jobtitle->headerCellClass() ?>"><div id="elh_crm_contactdetails_jobtitle" class="crm_contactdetails_jobtitle"><?= $Page->renderSort($Page->jobtitle) ?></div></th>
<?php } ?>
<?php if ($Page->decision_maker->Visible) { // decision_maker ?>
        <th data-name="decision_maker" class="<?= $Page->decision_maker->headerCellClass() ?>"><div id="elh_crm_contactdetails_decision_maker" class="crm_contactdetails_decision_maker"><?= $Page->renderSort($Page->decision_maker) ?></div></th>
<?php } ?>
<?php if ($Page->sum_time->Visible) { // sum_time ?>
        <th data-name="sum_time" class="<?= $Page->sum_time->headerCellClass() ?>"><div id="elh_crm_contactdetails_sum_time" class="crm_contactdetails_sum_time"><?= $Page->renderSort($Page->sum_time) ?></div></th>
<?php } ?>
<?php if ($Page->phone_extra->Visible) { // phone_extra ?>
        <th data-name="phone_extra" class="<?= $Page->phone_extra->headerCellClass() ?>"><div id="elh_crm_contactdetails_phone_extra" class="crm_contactdetails_phone_extra"><?= $Page->renderSort($Page->phone_extra) ?></div></th>
<?php } ?>
<?php if ($Page->mobile_extra->Visible) { // mobile_extra ?>
        <th data-name="mobile_extra" class="<?= $Page->mobile_extra->headerCellClass() ?>"><div id="elh_crm_contactdetails_mobile_extra" class="crm_contactdetails_mobile_extra"><?= $Page->renderSort($Page->mobile_extra) ?></div></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th data-name="gender" class="<?= $Page->gender->headerCellClass() ?>"><div id="elh_crm_contactdetails_gender" class="crm_contactdetails_gender"><?= $Page->renderSort($Page->gender) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_crm_contactdetails", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->contactid->Visible) { // contactid ?>
        <td data-name="contactid" <?= $Page->contactid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_contactid">
<span<?= $Page->contactid->viewAttributes() ?>>
<?= $Page->contactid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->contact_no->Visible) { // contact_no ?>
        <td data-name="contact_no" <?= $Page->contact_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_contact_no">
<span<?= $Page->contact_no->viewAttributes() ?>>
<?= $Page->contact_no->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->parentid->Visible) { // parentid ?>
        <td data-name="parentid" <?= $Page->parentid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_parentid">
<span<?= $Page->parentid->viewAttributes() ?>>
<?= $Page->parentid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->salutation->Visible) { // salutation ?>
        <td data-name="salutation" <?= $Page->salutation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_salutation">
<span<?= $Page->salutation->viewAttributes() ?>>
<?= $Page->salutation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->firstname->Visible) { // firstname ?>
        <td data-name="firstname" <?= $Page->firstname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_firstname">
<span<?= $Page->firstname->viewAttributes() ?>>
<?= $Page->firstname->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->lastname->Visible) { // lastname ?>
        <td data-name="lastname" <?= $Page->lastname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_lastname">
<span<?= $Page->lastname->viewAttributes() ?>>
<?= $Page->lastname->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_email->Visible) { // email ?>
        <td data-name="_email" <?= $Page->_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails__email">
<span<?= $Page->_email->viewAttributes() ?>>
<?= $Page->_email->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->phone->Visible) { // phone ?>
        <td data-name="phone" <?= $Page->phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_phone">
<span<?= $Page->phone->viewAttributes() ?>>
<?= $Page->phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mobile->Visible) { // mobile ?>
        <td data-name="mobile" <?= $Page->mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_mobile">
<span<?= $Page->mobile->viewAttributes() ?>>
<?= $Page->mobile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->reportsto->Visible) { // reportsto ?>
        <td data-name="reportsto" <?= $Page->reportsto->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_reportsto">
<span<?= $Page->reportsto->viewAttributes() ?>>
<?= $Page->reportsto->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->training->Visible) { // training ?>
        <td data-name="training" <?= $Page->training->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_training">
<span<?= $Page->training->viewAttributes() ?>>
<?= $Page->training->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->usertype->Visible) { // usertype ?>
        <td data-name="usertype" <?= $Page->usertype->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_usertype">
<span<?= $Page->usertype->viewAttributes() ?>>
<?= $Page->usertype->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->contacttype->Visible) { // contacttype ?>
        <td data-name="contacttype" <?= $Page->contacttype->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_contacttype">
<span<?= $Page->contacttype->viewAttributes() ?>>
<?= $Page->contacttype->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->otheremail->Visible) { // otheremail ?>
        <td data-name="otheremail" <?= $Page->otheremail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_otheremail">
<span<?= $Page->otheremail->viewAttributes() ?>>
<?= $Page->otheremail->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->donotcall->Visible) { // donotcall ?>
        <td data-name="donotcall" <?= $Page->donotcall->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_donotcall">
<span<?= $Page->donotcall->viewAttributes() ?>>
<?= $Page->donotcall->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->emailoptout->Visible) { // emailoptout ?>
        <td data-name="emailoptout" <?= $Page->emailoptout->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_emailoptout">
<span<?= $Page->emailoptout->viewAttributes() ?>>
<?= $Page->emailoptout->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->isconvertedfromlead->Visible) { // isconvertedfromlead ?>
        <td data-name="isconvertedfromlead" <?= $Page->isconvertedfromlead->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_isconvertedfromlead">
<span<?= $Page->isconvertedfromlead->viewAttributes() ?>>
<?= $Page->isconvertedfromlead->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->secondary_email->Visible) { // secondary_email ?>
        <td data-name="secondary_email" <?= $Page->secondary_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_secondary_email">
<span<?= $Page->secondary_email->viewAttributes() ?>>
<?= $Page->secondary_email->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->notifilanguage->Visible) { // notifilanguage ?>
        <td data-name="notifilanguage" <?= $Page->notifilanguage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_notifilanguage">
<span<?= $Page->notifilanguage->viewAttributes() ?>>
<?= $Page->notifilanguage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->contactstatus->Visible) { // contactstatus ?>
        <td data-name="contactstatus" <?= $Page->contactstatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_contactstatus">
<span<?= $Page->contactstatus->viewAttributes() ?>>
<?= $Page->contactstatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->dav_status->Visible) { // dav_status ?>
        <td data-name="dav_status" <?= $Page->dav_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_dav_status">
<span<?= $Page->dav_status->viewAttributes() ?>>
<?= $Page->dav_status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->jobtitle->Visible) { // jobtitle ?>
        <td data-name="jobtitle" <?= $Page->jobtitle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_jobtitle">
<span<?= $Page->jobtitle->viewAttributes() ?>>
<?= $Page->jobtitle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->decision_maker->Visible) { // decision_maker ?>
        <td data-name="decision_maker" <?= $Page->decision_maker->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_decision_maker">
<span<?= $Page->decision_maker->viewAttributes() ?>>
<?= $Page->decision_maker->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->sum_time->Visible) { // sum_time ?>
        <td data-name="sum_time" <?= $Page->sum_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_sum_time">
<span<?= $Page->sum_time->viewAttributes() ?>>
<?= $Page->sum_time->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->phone_extra->Visible) { // phone_extra ?>
        <td data-name="phone_extra" <?= $Page->phone_extra->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_phone_extra">
<span<?= $Page->phone_extra->viewAttributes() ?>>
<?= $Page->phone_extra->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mobile_extra->Visible) { // mobile_extra ?>
        <td data-name="mobile_extra" <?= $Page->mobile_extra->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_mobile_extra">
<span<?= $Page->mobile_extra->viewAttributes() ?>>
<?= $Page->mobile_extra->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->gender->Visible) { // gender ?>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
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
    ew.addEventHandlers("crm_contactdetails");
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
        container: "gmp_crm_contactdetails",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
