<?php

namespace PHPMaker2021\HIMS;

// Page object
$DepositPettycashList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fdeposit_pettycashlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fdeposit_pettycashlist = currentForm = new ew.Form("fdeposit_pettycashlist", "list");
    fdeposit_pettycashlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fdeposit_pettycashlist");
});
var fdeposit_pettycashlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fdeposit_pettycashlistsrch = currentSearchForm = new ew.Form("fdeposit_pettycashlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "deposit_pettycash")) ?>,
        fields = currentTable.fields;
    fdeposit_pettycashlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["TransType", [], fields.TransType.isInvalid],
        ["ShiftNumber", [], fields.ShiftNumber.isInvalid],
        ["TerminalNumber", [], fields.TerminalNumber.isInvalid],
        ["User", [], fields.User.isInvalid],
        ["OpenedDateTime", [ew.Validators.datetime(7)], fields.OpenedDateTime.isInvalid],
        ["y_OpenedDateTime", [ew.Validators.between], false],
        ["AccoundHead", [], fields.AccoundHead.isInvalid],
        ["Amount", [], fields.Amount.isInvalid],
        ["CreatedBy", [], fields.CreatedBy.isInvalid],
        ["CreatedDateTime", [], fields.CreatedDateTime.isInvalid],
        ["ModifiedBy", [], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [], fields.ModifiedDateTime.isInvalid],
        ["HospID", [], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fdeposit_pettycashlistsrch.setInvalid();
    });

    // Validate form
    fdeposit_pettycashlistsrch.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj),
            rowIndex = "";
        $fobj.data("rowindex", rowIndex);

        // Validate fields
        if (!this.validateFields(rowIndex))
            return false;

        // Call Form_CustomValidate event
        if (!this.customValidate(fobj)) {
            this.focus();
            return false;
        }
        return true;
    }

    // Form_CustomValidate
    fdeposit_pettycashlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fdeposit_pettycashlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fdeposit_pettycashlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fdeposit_pettycashlistsrch");
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
<form name="fdeposit_pettycashlistsrch" id="fdeposit_pettycashlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fdeposit_pettycashlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="deposit_pettycash">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->OpenedDateTime->Visible) { // OpenedDateTime ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_OpenedDateTime" class="ew-cell form-group">
        <label for="x_OpenedDateTime" class="ew-search-caption ew-label"><?= $Page->OpenedDateTime->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_OpenedDateTime" id="z_OpenedDateTime" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->OpenedDateTime->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->OpenedDateTime->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->OpenedDateTime->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->OpenedDateTime->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->OpenedDateTime->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->OpenedDateTime->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->OpenedDateTime->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->OpenedDateTime->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->OpenedDateTime->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_deposit_pettycash_OpenedDateTime" class="ew-search-field">
<input type="<?= $Page->OpenedDateTime->getInputTextType() ?>" data-table="deposit_pettycash" data-field="x_OpenedDateTime" data-format="7" name="x_OpenedDateTime" id="x_OpenedDateTime" placeholder="<?= HtmlEncode($Page->OpenedDateTime->getPlaceHolder()) ?>" value="<?= $Page->OpenedDateTime->EditValue ?>"<?= $Page->OpenedDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OpenedDateTime->getErrorMessage(false) ?></div>
<?php if (!$Page->OpenedDateTime->ReadOnly && !$Page->OpenedDateTime->Disabled && !isset($Page->OpenedDateTime->EditAttrs["readonly"]) && !isset($Page->OpenedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdeposit_pettycashlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fdeposit_pettycashlistsrch", "x_OpenedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_deposit_pettycash_OpenedDateTime" class="ew-search-field2 d-none">
<input type="<?= $Page->OpenedDateTime->getInputTextType() ?>" data-table="deposit_pettycash" data-field="x_OpenedDateTime" data-format="7" name="y_OpenedDateTime" id="y_OpenedDateTime" placeholder="<?= HtmlEncode($Page->OpenedDateTime->getPlaceHolder()) ?>" value="<?= $Page->OpenedDateTime->EditValue2 ?>"<?= $Page->OpenedDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OpenedDateTime->getErrorMessage(false) ?></div>
<?php if (!$Page->OpenedDateTime->ReadOnly && !$Page->OpenedDateTime->Disabled && !isset($Page->OpenedDateTime->EditAttrs["readonly"]) && !isset($Page->OpenedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdeposit_pettycashlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fdeposit_pettycashlistsrch", "y_OpenedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow > 0) { ?>
</div>
    <?php } ?>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> deposit_pettycash">
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
<form name="fdeposit_pettycashlist" id="fdeposit_pettycashlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="deposit_pettycash">
<div id="gmp_deposit_pettycash" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_deposit_pettycashlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_deposit_pettycash_id" class="deposit_pettycash_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->TransType->Visible) { // TransType ?>
        <th data-name="TransType" class="<?= $Page->TransType->headerCellClass() ?>"><div id="elh_deposit_pettycash_TransType" class="deposit_pettycash_TransType"><?= $Page->renderSort($Page->TransType) ?></div></th>
<?php } ?>
<?php if ($Page->ShiftNumber->Visible) { // ShiftNumber ?>
        <th data-name="ShiftNumber" class="<?= $Page->ShiftNumber->headerCellClass() ?>"><div id="elh_deposit_pettycash_ShiftNumber" class="deposit_pettycash_ShiftNumber"><?= $Page->renderSort($Page->ShiftNumber) ?></div></th>
<?php } ?>
<?php if ($Page->TerminalNumber->Visible) { // TerminalNumber ?>
        <th data-name="TerminalNumber" class="<?= $Page->TerminalNumber->headerCellClass() ?>"><div id="elh_deposit_pettycash_TerminalNumber" class="deposit_pettycash_TerminalNumber"><?= $Page->renderSort($Page->TerminalNumber) ?></div></th>
<?php } ?>
<?php if ($Page->User->Visible) { // User ?>
        <th data-name="User" class="<?= $Page->User->headerCellClass() ?>"><div id="elh_deposit_pettycash_User" class="deposit_pettycash_User"><?= $Page->renderSort($Page->User) ?></div></th>
<?php } ?>
<?php if ($Page->OpenedDateTime->Visible) { // OpenedDateTime ?>
        <th data-name="OpenedDateTime" class="<?= $Page->OpenedDateTime->headerCellClass() ?>"><div id="elh_deposit_pettycash_OpenedDateTime" class="deposit_pettycash_OpenedDateTime"><?= $Page->renderSort($Page->OpenedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->AccoundHead->Visible) { // AccoundHead ?>
        <th data-name="AccoundHead" class="<?= $Page->AccoundHead->headerCellClass() ?>"><div id="elh_deposit_pettycash_AccoundHead" class="deposit_pettycash_AccoundHead"><?= $Page->renderSort($Page->AccoundHead) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_deposit_pettycash_Amount" class="deposit_pettycash_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <th data-name="CreatedBy" class="<?= $Page->CreatedBy->headerCellClass() ?>"><div id="elh_deposit_pettycash_CreatedBy" class="deposit_pettycash_CreatedBy"><?= $Page->renderSort($Page->CreatedBy) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th data-name="CreatedDateTime" class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><div id="elh_deposit_pettycash_CreatedDateTime" class="deposit_pettycash_CreatedDateTime"><?= $Page->renderSort($Page->CreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <th data-name="ModifiedBy" class="<?= $Page->ModifiedBy->headerCellClass() ?>"><div id="elh_deposit_pettycash_ModifiedBy" class="deposit_pettycash_ModifiedBy"><?= $Page->renderSort($Page->ModifiedBy) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th data-name="ModifiedDateTime" class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><div id="elh_deposit_pettycash_ModifiedDateTime" class="deposit_pettycash_ModifiedDateTime"><?= $Page->renderSort($Page->ModifiedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_deposit_pettycash_HospID" class="deposit_pettycash_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_deposit_pettycash", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TransType->Visible) { // TransType ?>
        <td data-name="TransType" <?= $Page->TransType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_TransType">
<span<?= $Page->TransType->viewAttributes() ?>>
<?= $Page->TransType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ShiftNumber->Visible) { // ShiftNumber ?>
        <td data-name="ShiftNumber" <?= $Page->ShiftNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_ShiftNumber">
<span<?= $Page->ShiftNumber->viewAttributes() ?>>
<?= $Page->ShiftNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TerminalNumber->Visible) { // TerminalNumber ?>
        <td data-name="TerminalNumber" <?= $Page->TerminalNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_TerminalNumber">
<span<?= $Page->TerminalNumber->viewAttributes() ?>>
<?= $Page->TerminalNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->User->Visible) { // User ?>
        <td data-name="User" <?= $Page->User->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_User">
<span<?= $Page->User->viewAttributes() ?>>
<?= $Page->User->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OpenedDateTime->Visible) { // OpenedDateTime ?>
        <td data-name="OpenedDateTime" <?= $Page->OpenedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_OpenedDateTime">
<span<?= $Page->OpenedDateTime->viewAttributes() ?>>
<?= $Page->OpenedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AccoundHead->Visible) { // AccoundHead ?>
        <td data-name="AccoundHead" <?= $Page->AccoundHead->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_AccoundHead">
<span<?= $Page->AccoundHead->viewAttributes() ?>>
<?= $Page->AccoundHead->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
<?php
// Render aggregate row
$Page->RowType = ROWTYPE_AGGREGATE;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->TotalRecords > 0 && !$Page->isGridAdd() && !$Page->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
    <tr class="ew-table-footer">
<?php
// Render list options
$Page->renderListOptions();

// Render list options (footer, left)
$Page->ListOptions->render("footer", "left");
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" class="<?= $Page->id->footerCellClass() ?>"><span id="elf_deposit_pettycash_id" class="deposit_pettycash_id">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->TransType->Visible) { // TransType ?>
        <td data-name="TransType" class="<?= $Page->TransType->footerCellClass() ?>"><span id="elf_deposit_pettycash_TransType" class="deposit_pettycash_TransType">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ShiftNumber->Visible) { // ShiftNumber ?>
        <td data-name="ShiftNumber" class="<?= $Page->ShiftNumber->footerCellClass() ?>"><span id="elf_deposit_pettycash_ShiftNumber" class="deposit_pettycash_ShiftNumber">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->TerminalNumber->Visible) { // TerminalNumber ?>
        <td data-name="TerminalNumber" class="<?= $Page->TerminalNumber->footerCellClass() ?>"><span id="elf_deposit_pettycash_TerminalNumber" class="deposit_pettycash_TerminalNumber">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->User->Visible) { // User ?>
        <td data-name="User" class="<?= $Page->User->footerCellClass() ?>"><span id="elf_deposit_pettycash_User" class="deposit_pettycash_User">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->OpenedDateTime->Visible) { // OpenedDateTime ?>
        <td data-name="OpenedDateTime" class="<?= $Page->OpenedDateTime->footerCellClass() ?>"><span id="elf_deposit_pettycash_OpenedDateTime" class="deposit_pettycash_OpenedDateTime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->AccoundHead->Visible) { // AccoundHead ?>
        <td data-name="AccoundHead" class="<?= $Page->AccoundHead->footerCellClass() ?>"><span id="elf_deposit_pettycash_AccoundHead" class="deposit_pettycash_AccoundHead">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" class="<?= $Page->Amount->footerCellClass() ?>"><span id="elf_deposit_pettycash_Amount" class="deposit_pettycash_Amount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->Amount->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy" class="<?= $Page->CreatedBy->footerCellClass() ?>"><span id="elf_deposit_pettycash_CreatedBy" class="deposit_pettycash_CreatedBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime" class="<?= $Page->CreatedDateTime->footerCellClass() ?>"><span id="elf_deposit_pettycash_CreatedDateTime" class="deposit_pettycash_CreatedDateTime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy" class="<?= $Page->ModifiedBy->footerCellClass() ?>"><span id="elf_deposit_pettycash_ModifiedBy" class="deposit_pettycash_ModifiedBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime" class="<?= $Page->ModifiedDateTime->footerCellClass() ?>"><span id="elf_deposit_pettycash_ModifiedDateTime" class="deposit_pettycash_ModifiedDateTime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" class="<?= $Page->HospID->footerCellClass() ?>"><span id="elf_deposit_pettycash_HospID" class="deposit_pettycash_HospID">
        &nbsp;
        </span></td>
    <?php } ?>
<?php
// Render list options (footer, right)
$Page->ListOptions->render("footer", "right");
?>
    </tr>
</tfoot>
<?php } ?>
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
    ew.addEventHandlers("deposit_pettycash");
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
        container: "gmp_deposit_pettycash",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
