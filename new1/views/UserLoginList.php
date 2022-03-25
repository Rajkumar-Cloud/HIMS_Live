<?php

namespace PHPMaker2021\project3;

// Page object
$UserLoginList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fuser_loginlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fuser_loginlist = currentForm = new ew.Form("fuser_loginlist", "list");
    fuser_loginlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fuser_loginlist");
});
var fuser_loginlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fuser_loginlistsrch = currentSearchForm = new ew.Form("fuser_loginlistsrch");

    // Dynamic selection lists

    // Filters
    fuser_loginlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fuser_loginlistsrch");
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
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fuser_loginlistsrch" id="fuser_loginlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fuser_loginlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="user_login">
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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> user_login">
<form name="fuser_loginlist" id="fuser_loginlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="user_login">
<div id="gmp_user_login" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_user_loginlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_user_login_id" class="user_login_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->User_Name->Visible) { // User_Name ?>
        <th data-name="User_Name" class="<?= $Page->User_Name->headerCellClass() ?>"><div id="elh_user_login_User_Name" class="user_login_User_Name"><?= $Page->renderSort($Page->User_Name) ?></div></th>
<?php } ?>
<?php if ($Page->mail_id->Visible) { // mail_id ?>
        <th data-name="mail_id" class="<?= $Page->mail_id->headerCellClass() ?>"><div id="elh_user_login_mail_id" class="user_login_mail_id"><?= $Page->renderSort($Page->mail_id) ?></div></th>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <th data-name="mobile_no" class="<?= $Page->mobile_no->headerCellClass() ?>"><div id="elh_user_login_mobile_no" class="user_login_mobile_no"><?= $Page->renderSort($Page->mobile_no) ?></div></th>
<?php } ?>
<?php if ($Page->_password->Visible) { // password ?>
        <th data-name="_password" class="<?= $Page->_password->headerCellClass() ?>"><div id="elh_user_login__password" class="user_login__password"><?= $Page->renderSort($Page->_password) ?></div></th>
<?php } ?>
<?php if ($Page->email_verified->Visible) { // email_verified ?>
        <th data-name="email_verified" class="<?= $Page->email_verified->headerCellClass() ?>"><div id="elh_user_login_email_verified" class="user_login_email_verified"><?= $Page->renderSort($Page->email_verified) ?></div></th>
<?php } ?>
<?php if ($Page->ReportTo->Visible) { // ReportTo ?>
        <th data-name="ReportTo" class="<?= $Page->ReportTo->headerCellClass() ?>"><div id="elh_user_login_ReportTo" class="user_login_ReportTo"><?= $Page->renderSort($Page->ReportTo) ?></div></th>
<?php } ?>
<?php if ($Page->_UserLevel->Visible) { // UserLevel ?>
        <th data-name="_UserLevel" class="<?= $Page->_UserLevel->headerCellClass() ?>"><div id="elh_user_login__UserLevel" class="user_login__UserLevel"><?= $Page->renderSort($Page->_UserLevel) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th data-name="CreatedDateTime" class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><div id="elh_user_login_CreatedDateTime" class="user_login_CreatedDateTime"><?= $Page->renderSort($Page->CreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->profilefield->Visible) { // profilefield ?>
        <th data-name="profilefield" class="<?= $Page->profilefield->headerCellClass() ?>"><div id="elh_user_login_profilefield" class="user_login_profilefield"><?= $Page->renderSort($Page->profilefield) ?></div></th>
<?php } ?>
<?php if ($Page->_UserID->Visible) { // UserID ?>
        <th data-name="_UserID" class="<?= $Page->_UserID->headerCellClass() ?>"><div id="elh_user_login__UserID" class="user_login__UserID"><?= $Page->renderSort($Page->_UserID) ?></div></th>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
        <th data-name="GroupID" class="<?= $Page->GroupID->headerCellClass() ?>"><div id="elh_user_login_GroupID" class="user_login_GroupID"><?= $Page->renderSort($Page->GroupID) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_user_login_HospID" class="user_login_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
        <th data-name="PharID" class="<?= $Page->PharID->headerCellClass() ?>"><div id="elh_user_login_PharID" class="user_login_PharID"><?= $Page->renderSort($Page->PharID) ?></div></th>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
        <th data-name="StoreID" class="<?= $Page->StoreID->headerCellClass() ?>"><div id="elh_user_login_StoreID" class="user_login_StoreID"><?= $Page->renderSort($Page->StoreID) ?></div></th>
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
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_user_login", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->User_Name->Visible) { // User_Name ?>
        <td data-name="User_Name" <?= $Page->User_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_User_Name">
<span<?= $Page->User_Name->viewAttributes() ?>>
<?= $Page->User_Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mail_id->Visible) { // mail_id ?>
        <td data-name="mail_id" <?= $Page->mail_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_mail_id">
<span<?= $Page->mail_id->viewAttributes() ?>>
<?= $Page->mail_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <td data-name="mobile_no" <?= $Page->mobile_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_mobile_no">
<span<?= $Page->mobile_no->viewAttributes() ?>>
<?= $Page->mobile_no->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_password->Visible) { // password ?>
        <td data-name="_password" <?= $Page->_password->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login__password">
<span<?= $Page->_password->viewAttributes() ?>>
<?= $Page->_password->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->email_verified->Visible) { // email_verified ?>
        <td data-name="email_verified" <?= $Page->email_verified->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_email_verified">
<span<?= $Page->email_verified->viewAttributes() ?>>
<?= $Page->email_verified->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReportTo->Visible) { // ReportTo ?>
        <td data-name="ReportTo" <?= $Page->ReportTo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_ReportTo">
<span<?= $Page->ReportTo->viewAttributes() ?>>
<?= $Page->ReportTo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_UserLevel->Visible) { // UserLevel ?>
        <td data-name="_UserLevel" <?= $Page->_UserLevel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login__UserLevel">
<span<?= $Page->_UserLevel->viewAttributes() ?>>
<?= $Page->_UserLevel->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->profilefield->Visible) { // profilefield ?>
        <td data-name="profilefield" <?= $Page->profilefield->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_profilefield">
<span<?= $Page->profilefield->viewAttributes() ?>>
<?= $Page->profilefield->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_UserID->Visible) { // UserID ?>
        <td data-name="_UserID" <?= $Page->_UserID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login__UserID">
<span<?= $Page->_UserID->viewAttributes() ?>>
<?= $Page->_UserID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GroupID->Visible) { // GroupID ?>
        <td data-name="GroupID" <?= $Page->GroupID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_GroupID">
<span<?= $Page->GroupID->viewAttributes() ?>>
<?= $Page->GroupID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PharID->Visible) { // PharID ?>
        <td data-name="PharID" <?= $Page->PharID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_PharID">
<span<?= $Page->PharID->viewAttributes() ?>>
<?= $Page->PharID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StoreID->Visible) { // StoreID ?>
        <td data-name="StoreID" <?= $Page->StoreID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_StoreID">
<span<?= $Page->StoreID->viewAttributes() ?>>
<?= $Page->StoreID->getViewValue() ?></span>
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
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl() ?>">
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
    ew.addEventHandlers("user_login");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
