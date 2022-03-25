<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabProfileDetailsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flab_profile_detailslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    flab_profile_detailslist = currentForm = new ew.Form("flab_profile_detailslist", "list");
    flab_profile_detailslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "lab_profile_details")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.lab_profile_details)
        ew.vars.tables.lab_profile_details = currentTable;
    flab_profile_detailslist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["ProfileCode", [fields.ProfileCode.visible && fields.ProfileCode.required ? ew.Validators.required(fields.ProfileCode.caption) : null], fields.ProfileCode.isInvalid],
        ["SubProfileCode", [fields.SubProfileCode.visible && fields.SubProfileCode.required ? ew.Validators.required(fields.SubProfileCode.caption) : null], fields.SubProfileCode.isInvalid],
        ["ProfileTestCode", [fields.ProfileTestCode.visible && fields.ProfileTestCode.required ? ew.Validators.required(fields.ProfileTestCode.caption) : null], fields.ProfileTestCode.isInvalid],
        ["ProfileSubTestCode", [fields.ProfileSubTestCode.visible && fields.ProfileSubTestCode.required ? ew.Validators.required(fields.ProfileSubTestCode.caption) : null], fields.ProfileSubTestCode.isInvalid],
        ["TestOrder", [fields.TestOrder.visible && fields.TestOrder.required ? ew.Validators.required(fields.TestOrder.caption) : null, ew.Validators.float], fields.TestOrder.isInvalid],
        ["TestAmount", [fields.TestAmount.visible && fields.TestAmount.required ? ew.Validators.required(fields.TestAmount.caption) : null, ew.Validators.float], fields.TestAmount.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = flab_profile_detailslist,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    flab_profile_detailslist.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);
            var checkrow = (gridinsert) ? !this.emptyRow(rowIndex) : true;
            if (checkrow) {
                addcnt++;

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
            } // End Grid Add checking
        }
        if (gridinsert && addcnt == 0) { // No row added
            ew.alert(ew.language.phrase("NoAddRecord"));
            return false;
        }
        return true;
    }

    // Check empty row
    flab_profile_detailslist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "ProfileCode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SubProfileCode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ProfileTestCode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ProfileSubTestCode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestOrder", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestAmount", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    flab_profile_detailslist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_profile_detailslist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    flab_profile_detailslist.lists.SubProfileCode = <?= $Page->SubProfileCode->toClientList($Page) ?>;
    flab_profile_detailslist.lists.ProfileTestCode = <?= $Page->ProfileTestCode->toClientList($Page) ?>;
    loadjs.done("flab_profile_detailslist");
});
var flab_profile_detailslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    flab_profile_detailslistsrch = currentSearchForm = new ew.Form("flab_profile_detailslistsrch");

    // Dynamic selection lists

    // Filters
    flab_profile_detailslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("flab_profile_detailslistsrch");
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
<?php if (!$Page->isExport() || Config("EXPORT_MASTER_RECORD") && $Page->isExport("print")) { ?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "view_lab_profile") {
    if ($Page->MasterRecordExists) {
        include_once "views/ViewLabProfileMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="flab_profile_detailslistsrch" id="flab_profile_detailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="flab_profile_detailslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_profile_details">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_profile_details">
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
<form name="flab_profile_detailslist" id="flab_profile_detailslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_profile_details">
<?php if ($Page->getCurrentMasterTable() == "view_lab_profile" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="view_lab_profile">
<input type="hidden" name="fk_CODE" value="<?= HtmlEncode($Page->ProfileCode->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_lab_profile_details" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_lab_profile_detailslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_lab_profile_details_id" class="lab_profile_details_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
        <th data-name="ProfileCode" class="<?= $Page->ProfileCode->headerCellClass() ?>"><div id="elh_lab_profile_details_ProfileCode" class="lab_profile_details_ProfileCode"><?= $Page->renderSort($Page->ProfileCode) ?></div></th>
<?php } ?>
<?php if ($Page->SubProfileCode->Visible) { // SubProfileCode ?>
        <th data-name="SubProfileCode" class="<?= $Page->SubProfileCode->headerCellClass() ?>"><div id="elh_lab_profile_details_SubProfileCode" class="lab_profile_details_SubProfileCode"><?= $Page->renderSort($Page->SubProfileCode) ?></div></th>
<?php } ?>
<?php if ($Page->ProfileTestCode->Visible) { // ProfileTestCode ?>
        <th data-name="ProfileTestCode" class="<?= $Page->ProfileTestCode->headerCellClass() ?>"><div id="elh_lab_profile_details_ProfileTestCode" class="lab_profile_details_ProfileTestCode"><?= $Page->renderSort($Page->ProfileTestCode) ?></div></th>
<?php } ?>
<?php if ($Page->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
        <th data-name="ProfileSubTestCode" class="<?= $Page->ProfileSubTestCode->headerCellClass() ?>"><div id="elh_lab_profile_details_ProfileSubTestCode" class="lab_profile_details_ProfileSubTestCode"><?= $Page->renderSort($Page->ProfileSubTestCode) ?></div></th>
<?php } ?>
<?php if ($Page->TestOrder->Visible) { // TestOrder ?>
        <th data-name="TestOrder" class="<?= $Page->TestOrder->headerCellClass() ?>"><div id="elh_lab_profile_details_TestOrder" class="lab_profile_details_TestOrder"><?= $Page->renderSort($Page->TestOrder) ?></div></th>
<?php } ?>
<?php if ($Page->TestAmount->Visible) { // TestAmount ?>
        <th data-name="TestAmount" class="<?= $Page->TestAmount->headerCellClass() ?>"><div id="elh_lab_profile_details_TestAmount" class="lab_profile_details_TestAmount"><?= $Page->renderSort($Page->TestAmount) ?></div></th>
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

// Restore number of post back records
if ($CurrentForm && ($Page->isConfirm() || $Page->EventCancelled)) {
    $CurrentForm->Index = -1;
    if ($CurrentForm->hasValue($Page->FormKeyCountName) && ($Page->isGridAdd() || $Page->isGridEdit() || $Page->isConfirm())) {
        $Page->KeyCount = $CurrentForm->getValue($Page->FormKeyCountName);
        $Page->StopRecord = $Page->StartRecord + $Page->KeyCount - 1;
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
if ($Page->isGridAdd())
    $Page->RowIndex = 0;
if ($Page->isGridEdit())
    $Page->RowIndex = 0;
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;
        if ($Page->isGridAdd() || $Page->isGridEdit() || $Page->isConfirm()) {
            $Page->RowIndex++;
            $CurrentForm->Index = $Page->RowIndex;
            if ($CurrentForm->hasValue($Page->FormActionName) && ($Page->isConfirm() || $Page->EventCancelled)) {
                $Page->RowAction = strval($CurrentForm->getValue($Page->FormActionName));
            } elseif ($Page->isGridAdd()) {
                $Page->RowAction = "insert";
            } else {
                $Page->RowAction = "";
            }
        }

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
        if ($Page->isGridAdd()) { // Grid add
            $Page->RowType = ROWTYPE_ADD; // Render add
        }
        if ($Page->isGridAdd() && $Page->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) { // Insert failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->isGridEdit()) { // Grid edit
            if ($Page->EventCancelled) {
                $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
            }
            if ($Page->RowAction == "insert") {
                $Page->RowType = ROWTYPE_ADD; // Render add
            } else {
                $Page->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Page->isGridEdit() && ($Page->RowType == ROWTYPE_EDIT || $Page->RowType == ROWTYPE_ADD) && $Page->EventCancelled) { // Update failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->RowType == ROWTYPE_EDIT) { // Edit row
            $Page->EditRowCount++;
        }

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_lab_profile_details", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();

        // Skip delete row / empty row for confirm page
        if ($Page->RowAction != "delete" && $Page->RowAction != "insertdelete" && !($Page->RowAction == "insert" && $Page->isConfirm() && $Page->emptyRow())) {
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_id" class="form-group"></span>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="lab_profile_details" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
        <td data-name="ProfileCode" <?= $Page->ProfileCode->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->ProfileCode->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_ProfileCode" class="form-group">
<span<?= $Page->ProfileCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ProfileCode->getDisplayValue($Page->ProfileCode->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_ProfileCode" name="x<?= $Page->RowIndex ?>_ProfileCode" value="<?= HtmlEncode($Page->ProfileCode->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_ProfileCode" class="form-group">
<input type="<?= $Page->ProfileCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileCode" name="x<?= $Page->RowIndex ?>_ProfileCode" id="x<?= $Page->RowIndex ?>_ProfileCode" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProfileCode->getPlaceHolder()) ?>" value="<?= $Page->ProfileCode->EditValue ?>"<?= $Page->ProfileCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProfileCode->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_ProfileCode" id="o<?= $Page->RowIndex ?>_ProfileCode" value="<?= HtmlEncode($Page->ProfileCode->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Page->ProfileCode->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_ProfileCode" class="form-group">
<span<?= $Page->ProfileCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ProfileCode->getDisplayValue($Page->ProfileCode->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_ProfileCode" name="x<?= $Page->RowIndex ?>_ProfileCode" value="<?= HtmlEncode($Page->ProfileCode->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_ProfileCode" class="form-group">
<input type="<?= $Page->ProfileCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileCode" name="x<?= $Page->RowIndex ?>_ProfileCode" id="x<?= $Page->RowIndex ?>_ProfileCode" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProfileCode->getPlaceHolder()) ?>" value="<?= $Page->ProfileCode->EditValue ?>"<?= $Page->ProfileCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProfileCode->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_ProfileCode">
<span<?= $Page->ProfileCode->viewAttributes() ?>>
<?= $Page->ProfileCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SubProfileCode->Visible) { // SubProfileCode ?>
        <td data-name="SubProfileCode" <?= $Page->SubProfileCode->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_SubProfileCode" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_SubProfileCode"><?= EmptyValue(strval($Page->SubProfileCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->SubProfileCode->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->SubProfileCode->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->SubProfileCode->ReadOnly || $Page->SubProfileCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_SubProfileCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->SubProfileCode->getErrorMessage() ?></div>
<?= $Page->SubProfileCode->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_SubProfileCode") ?>
<input type="hidden" is="selection-list" data-table="lab_profile_details" data-field="x_SubProfileCode" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_SubProfileCode" id="x<?= $Page->RowIndex ?>_SubProfileCode" value="<?= $Page->SubProfileCode->CurrentValue ?>"<?= $Page->SubProfileCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_SubProfileCode" id="o<?= $Page->RowIndex ?>_SubProfileCode" value="<?= HtmlEncode($Page->SubProfileCode->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_SubProfileCode" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_SubProfileCode"><?= EmptyValue(strval($Page->SubProfileCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->SubProfileCode->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->SubProfileCode->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->SubProfileCode->ReadOnly || $Page->SubProfileCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_SubProfileCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->SubProfileCode->getErrorMessage() ?></div>
<?= $Page->SubProfileCode->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_SubProfileCode") ?>
<input type="hidden" is="selection-list" data-table="lab_profile_details" data-field="x_SubProfileCode" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_SubProfileCode" id="x<?= $Page->RowIndex ?>_SubProfileCode" value="<?= $Page->SubProfileCode->CurrentValue ?>"<?= $Page->SubProfileCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_SubProfileCode">
<span<?= $Page->SubProfileCode->viewAttributes() ?>>
<?= $Page->SubProfileCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ProfileTestCode->Visible) { // ProfileTestCode ?>
        <td data-name="ProfileTestCode" <?= $Page->ProfileTestCode->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_ProfileTestCode" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_ProfileTestCode"><?= EmptyValue(strval($Page->ProfileTestCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->ProfileTestCode->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->ProfileTestCode->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->ProfileTestCode->ReadOnly || $Page->ProfileTestCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_ProfileTestCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->ProfileTestCode->getErrorMessage() ?></div>
<?= $Page->ProfileTestCode->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_ProfileTestCode") ?>
<input type="hidden" is="selection-list" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_ProfileTestCode" id="x<?= $Page->RowIndex ?>_ProfileTestCode" value="<?= $Page->ProfileTestCode->CurrentValue ?>"<?= $Page->ProfileTestCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_ProfileTestCode" id="o<?= $Page->RowIndex ?>_ProfileTestCode" value="<?= HtmlEncode($Page->ProfileTestCode->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_ProfileTestCode" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_ProfileTestCode"><?= EmptyValue(strval($Page->ProfileTestCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->ProfileTestCode->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->ProfileTestCode->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->ProfileTestCode->ReadOnly || $Page->ProfileTestCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_ProfileTestCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->ProfileTestCode->getErrorMessage() ?></div>
<?= $Page->ProfileTestCode->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_ProfileTestCode") ?>
<input type="hidden" is="selection-list" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_ProfileTestCode" id="x<?= $Page->RowIndex ?>_ProfileTestCode" value="<?= $Page->ProfileTestCode->CurrentValue ?>"<?= $Page->ProfileTestCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_ProfileTestCode">
<span<?= $Page->ProfileTestCode->viewAttributes() ?>>
<?= $Page->ProfileTestCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
        <td data-name="ProfileSubTestCode" <?= $Page->ProfileSubTestCode->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_ProfileSubTestCode" class="form-group">
<input type="<?= $Page->ProfileSubTestCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x<?= $Page->RowIndex ?>_ProfileSubTestCode" id="x<?= $Page->RowIndex ?>_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?= $Page->ProfileSubTestCode->EditValue ?>"<?= $Page->ProfileSubTestCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProfileSubTestCode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_ProfileSubTestCode" id="o<?= $Page->RowIndex ?>_ProfileSubTestCode" value="<?= HtmlEncode($Page->ProfileSubTestCode->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_ProfileSubTestCode" class="form-group">
<input type="<?= $Page->ProfileSubTestCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x<?= $Page->RowIndex ?>_ProfileSubTestCode" id="x<?= $Page->RowIndex ?>_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?= $Page->ProfileSubTestCode->EditValue ?>"<?= $Page->ProfileSubTestCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProfileSubTestCode->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_ProfileSubTestCode">
<span<?= $Page->ProfileSubTestCode->viewAttributes() ?>>
<?= $Page->ProfileSubTestCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TestOrder->Visible) { // TestOrder ?>
        <td data-name="TestOrder" <?= $Page->TestOrder->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_TestOrder" class="form-group">
<input type="<?= $Page->TestOrder->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestOrder" name="x<?= $Page->RowIndex ?>_TestOrder" id="x<?= $Page->RowIndex ?>_TestOrder" size="30" placeholder="<?= HtmlEncode($Page->TestOrder->getPlaceHolder()) ?>" value="<?= $Page->TestOrder->EditValue ?>"<?= $Page->TestOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestOrder->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestOrder" id="o<?= $Page->RowIndex ?>_TestOrder" value="<?= HtmlEncode($Page->TestOrder->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_TestOrder" class="form-group">
<input type="<?= $Page->TestOrder->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestOrder" name="x<?= $Page->RowIndex ?>_TestOrder" id="x<?= $Page->RowIndex ?>_TestOrder" size="30" placeholder="<?= HtmlEncode($Page->TestOrder->getPlaceHolder()) ?>" value="<?= $Page->TestOrder->EditValue ?>"<?= $Page->TestOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestOrder->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_TestOrder">
<span<?= $Page->TestOrder->viewAttributes() ?>>
<?= $Page->TestOrder->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TestAmount->Visible) { // TestAmount ?>
        <td data-name="TestAmount" <?= $Page->TestAmount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_TestAmount" class="form-group">
<input type="<?= $Page->TestAmount->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestAmount" name="x<?= $Page->RowIndex ?>_TestAmount" id="x<?= $Page->RowIndex ?>_TestAmount" size="30" placeholder="<?= HtmlEncode($Page->TestAmount->getPlaceHolder()) ?>" value="<?= $Page->TestAmount->EditValue ?>"<?= $Page->TestAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestAmount" id="o<?= $Page->RowIndex ?>_TestAmount" value="<?= HtmlEncode($Page->TestAmount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_TestAmount" class="form-group">
<input type="<?= $Page->TestAmount->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestAmount" name="x<?= $Page->RowIndex ?>_TestAmount" id="x<?= $Page->RowIndex ?>_TestAmount" size="30" placeholder="<?= HtmlEncode($Page->TestAmount->getPlaceHolder()) ?>" value="<?= $Page->TestAmount->EditValue ?>"<?= $Page->TestAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_profile_details_TestAmount">
<span<?= $Page->TestAmount->viewAttributes() ?>>
<?= $Page->TestAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php if ($Page->RowType == ROWTYPE_ADD || $Page->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["flab_profile_detailslist","load"], function () {
    flab_profile_detailslist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
<?php } ?>
<?php
    }
    } // End delete row checking
    if (!$Page->isGridAdd())
        if (!$Page->Recordset->EOF) {
            $Page->Recordset->moveNext();
        }
}
?>
<?php
    if ($Page->isGridAdd() || $Page->isGridEdit()) {
        $Page->RowIndex = '$rowindex$';
        $Page->loadRowValues();

        // Set row properties
        $Page->resetAttributes();
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_lab_profile_details", "data-rowtype" => ROWTYPE_ADD]);
        $Page->RowAttrs->appendClass("ew-template");
        $Page->RowType = ROWTYPE_ADD;

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
        $Page->StartRowCount = 0;
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowIndex);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id">
<span id="el$rowindex$_lab_profile_details_id" class="form-group lab_profile_details_id"></span>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
        <td data-name="ProfileCode">
<?php if ($Page->ProfileCode->getSessionValue() != "") { ?>
<span id="el$rowindex$_lab_profile_details_ProfileCode" class="form-group lab_profile_details_ProfileCode">
<span<?= $Page->ProfileCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ProfileCode->getDisplayValue($Page->ProfileCode->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_ProfileCode" name="x<?= $Page->RowIndex ?>_ProfileCode" value="<?= HtmlEncode($Page->ProfileCode->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_ProfileCode" class="form-group lab_profile_details_ProfileCode">
<input type="<?= $Page->ProfileCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileCode" name="x<?= $Page->RowIndex ?>_ProfileCode" id="x<?= $Page->RowIndex ?>_ProfileCode" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProfileCode->getPlaceHolder()) ?>" value="<?= $Page->ProfileCode->EditValue ?>"<?= $Page->ProfileCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProfileCode->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_ProfileCode" id="o<?= $Page->RowIndex ?>_ProfileCode" value="<?= HtmlEncode($Page->ProfileCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SubProfileCode->Visible) { // SubProfileCode ?>
        <td data-name="SubProfileCode">
<span id="el$rowindex$_lab_profile_details_SubProfileCode" class="form-group lab_profile_details_SubProfileCode">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_SubProfileCode"><?= EmptyValue(strval($Page->SubProfileCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->SubProfileCode->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->SubProfileCode->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->SubProfileCode->ReadOnly || $Page->SubProfileCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_SubProfileCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->SubProfileCode->getErrorMessage() ?></div>
<?= $Page->SubProfileCode->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_SubProfileCode") ?>
<input type="hidden" is="selection-list" data-table="lab_profile_details" data-field="x_SubProfileCode" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_SubProfileCode" id="x<?= $Page->RowIndex ?>_SubProfileCode" value="<?= $Page->SubProfileCode->CurrentValue ?>"<?= $Page->SubProfileCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_SubProfileCode" id="o<?= $Page->RowIndex ?>_SubProfileCode" value="<?= HtmlEncode($Page->SubProfileCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ProfileTestCode->Visible) { // ProfileTestCode ?>
        <td data-name="ProfileTestCode">
<span id="el$rowindex$_lab_profile_details_ProfileTestCode" class="form-group lab_profile_details_ProfileTestCode">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_ProfileTestCode"><?= EmptyValue(strval($Page->ProfileTestCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->ProfileTestCode->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->ProfileTestCode->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->ProfileTestCode->ReadOnly || $Page->ProfileTestCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_ProfileTestCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->ProfileTestCode->getErrorMessage() ?></div>
<?= $Page->ProfileTestCode->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_ProfileTestCode") ?>
<input type="hidden" is="selection-list" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_ProfileTestCode" id="x<?= $Page->RowIndex ?>_ProfileTestCode" value="<?= $Page->ProfileTestCode->CurrentValue ?>"<?= $Page->ProfileTestCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_ProfileTestCode" id="o<?= $Page->RowIndex ?>_ProfileTestCode" value="<?= HtmlEncode($Page->ProfileTestCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
        <td data-name="ProfileSubTestCode">
<span id="el$rowindex$_lab_profile_details_ProfileSubTestCode" class="form-group lab_profile_details_ProfileSubTestCode">
<input type="<?= $Page->ProfileSubTestCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x<?= $Page->RowIndex ?>_ProfileSubTestCode" id="x<?= $Page->RowIndex ?>_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?= $Page->ProfileSubTestCode->EditValue ?>"<?= $Page->ProfileSubTestCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProfileSubTestCode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_ProfileSubTestCode" id="o<?= $Page->RowIndex ?>_ProfileSubTestCode" value="<?= HtmlEncode($Page->ProfileSubTestCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TestOrder->Visible) { // TestOrder ?>
        <td data-name="TestOrder">
<span id="el$rowindex$_lab_profile_details_TestOrder" class="form-group lab_profile_details_TestOrder">
<input type="<?= $Page->TestOrder->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestOrder" name="x<?= $Page->RowIndex ?>_TestOrder" id="x<?= $Page->RowIndex ?>_TestOrder" size="30" placeholder="<?= HtmlEncode($Page->TestOrder->getPlaceHolder()) ?>" value="<?= $Page->TestOrder->EditValue ?>"<?= $Page->TestOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestOrder->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestOrder" id="o<?= $Page->RowIndex ?>_TestOrder" value="<?= HtmlEncode($Page->TestOrder->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TestAmount->Visible) { // TestAmount ?>
        <td data-name="TestAmount">
<span id="el$rowindex$_lab_profile_details_TestAmount" class="form-group lab_profile_details_TestAmount">
<input type="<?= $Page->TestAmount->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestAmount" name="x<?= $Page->RowIndex ?>_TestAmount" id="x<?= $Page->RowIndex ?>_TestAmount" size="30" placeholder="<?= HtmlEncode($Page->TestAmount->getPlaceHolder()) ?>" value="<?= $Page->TestAmount->EditValue ?>"<?= $Page->TestAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestAmount" id="o<?= $Page->RowIndex ?>_TestAmount" value="<?= HtmlEncode($Page->TestAmount->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["flab_profile_detailslist","load"], function() {
    flab_profile_detailslist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Page->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<?= $Page->MultiSelectKey ?>
<?php } ?>
<?php if ($Page->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<?= $Page->MultiSelectKey ?>
<?php } ?>
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
    ew.addEventHandlers("lab_profile_details");
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
        container: "gmp_lab_profile_details",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
