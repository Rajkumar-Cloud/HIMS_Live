<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasUserTemplatePrescriptionList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fmas_user_template_prescriptionlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fmas_user_template_prescriptionlist = currentForm = new ew.Form("fmas_user_template_prescriptionlist", "list");
    fmas_user_template_prescriptionlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "mas_user_template_prescription")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.mas_user_template_prescription)
        ew.vars.tables.mas_user_template_prescription = currentTable;
    fmas_user_template_prescriptionlist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["TemplateName", [fields.TemplateName.visible && fields.TemplateName.required ? ew.Validators.required(fields.TemplateName.caption) : null], fields.TemplateName.isInvalid],
        ["Medicine", [fields.Medicine.visible && fields.Medicine.required ? ew.Validators.required(fields.Medicine.caption) : null], fields.Medicine.isInvalid],
        ["M", [fields.M.visible && fields.M.required ? ew.Validators.required(fields.M.caption) : null], fields.M.isInvalid],
        ["A", [fields.A.visible && fields.A.required ? ew.Validators.required(fields.A.caption) : null], fields.A.isInvalid],
        ["N", [fields.N.visible && fields.N.required ? ew.Validators.required(fields.N.caption) : null], fields.N.isInvalid],
        ["NoOfDays", [fields.NoOfDays.visible && fields.NoOfDays.required ? ew.Validators.required(fields.NoOfDays.caption) : null], fields.NoOfDays.isInvalid],
        ["PreRoute", [fields.PreRoute.visible && fields.PreRoute.required ? ew.Validators.required(fields.PreRoute.caption) : null], fields.PreRoute.isInvalid],
        ["TimeOfTaking", [fields.TimeOfTaking.visible && fields.TimeOfTaking.required ? ew.Validators.required(fields.TimeOfTaking.caption) : null], fields.TimeOfTaking.isInvalid],
        ["CreatedBy", [fields.CreatedBy.visible && fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["CreateDateTime", [fields.CreateDateTime.visible && fields.CreateDateTime.required ? ew.Validators.required(fields.CreateDateTime.caption) : null], fields.CreateDateTime.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.visible && fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.visible && fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null], fields.ModifiedDateTime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmas_user_template_prescriptionlist,
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
    fmas_user_template_prescriptionlist.validate = function () {
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
    fmas_user_template_prescriptionlist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "TemplateName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Medicine", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "M", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "N", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NoOfDays", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PreRoute", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TimeOfTaking", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fmas_user_template_prescriptionlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmas_user_template_prescriptionlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fmas_user_template_prescriptionlist.lists.TemplateName = <?= $Page->TemplateName->toClientList($Page) ?>;
    fmas_user_template_prescriptionlist.lists.Medicine = <?= $Page->Medicine->toClientList($Page) ?>;
    fmas_user_template_prescriptionlist.lists.PreRoute = <?= $Page->PreRoute->toClientList($Page) ?>;
    fmas_user_template_prescriptionlist.lists.TimeOfTaking = <?= $Page->TimeOfTaking->toClientList($Page) ?>;
    loadjs.done("fmas_user_template_prescriptionlist");
});
var fmas_user_template_prescriptionlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fmas_user_template_prescriptionlistsrch = currentSearchForm = new ew.Form("fmas_user_template_prescriptionlistsrch");

    // Dynamic selection lists

    // Filters
    fmas_user_template_prescriptionlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fmas_user_template_prescriptionlistsrch");
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
<form name="fmas_user_template_prescriptionlistsrch" id="fmas_user_template_prescriptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fmas_user_template_prescriptionlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_user_template_prescription">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_user_template_prescription">
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
<form name="fmas_user_template_prescriptionlist" id="fmas_user_template_prescriptionlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_user_template_prescription">
<div id="gmp_mas_user_template_prescription" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_mas_user_template_prescriptionlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_id" class="mas_user_template_prescription_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->TemplateName->Visible) { // TemplateName ?>
        <th data-name="TemplateName" class="<?= $Page->TemplateName->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_TemplateName" class="mas_user_template_prescription_TemplateName"><?= $Page->renderSort($Page->TemplateName) ?></div></th>
<?php } ?>
<?php if ($Page->Medicine->Visible) { // Medicine ?>
        <th data-name="Medicine" class="<?= $Page->Medicine->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_Medicine" class="mas_user_template_prescription_Medicine"><?= $Page->renderSort($Page->Medicine) ?></div></th>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
        <th data-name="M" class="<?= $Page->M->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_M" class="mas_user_template_prescription_M"><?= $Page->renderSort($Page->M) ?></div></th>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
        <th data-name="A" class="<?= $Page->A->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_A" class="mas_user_template_prescription_A"><?= $Page->renderSort($Page->A) ?></div></th>
<?php } ?>
<?php if ($Page->N->Visible) { // N ?>
        <th data-name="N" class="<?= $Page->N->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_N" class="mas_user_template_prescription_N"><?= $Page->renderSort($Page->N) ?></div></th>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
        <th data-name="NoOfDays" class="<?= $Page->NoOfDays->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_NoOfDays" class="mas_user_template_prescription_NoOfDays"><?= $Page->renderSort($Page->NoOfDays) ?></div></th>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { // PreRoute ?>
        <th data-name="PreRoute" class="<?= $Page->PreRoute->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_PreRoute" class="mas_user_template_prescription_PreRoute"><?= $Page->renderSort($Page->PreRoute) ?></div></th>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
        <th data-name="TimeOfTaking" class="<?= $Page->TimeOfTaking->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_TimeOfTaking" class="mas_user_template_prescription_TimeOfTaking"><?= $Page->renderSort($Page->TimeOfTaking) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <th data-name="CreatedBy" class="<?= $Page->CreatedBy->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_CreatedBy" class="mas_user_template_prescription_CreatedBy"><?= $Page->renderSort($Page->CreatedBy) ?></div></th>
<?php } ?>
<?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
        <th data-name="CreateDateTime" class="<?= $Page->CreateDateTime->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_CreateDateTime" class="mas_user_template_prescription_CreateDateTime"><?= $Page->renderSort($Page->CreateDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <th data-name="ModifiedBy" class="<?= $Page->ModifiedBy->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_ModifiedBy" class="mas_user_template_prescription_ModifiedBy"><?= $Page->renderSort($Page->ModifiedBy) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th data-name="ModifiedDateTime" class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_ModifiedDateTime" class="mas_user_template_prescription_ModifiedDateTime"><?= $Page->renderSort($Page->ModifiedDateTime) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_mas_user_template_prescription", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_id" class="form-group"></span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="mas_user_template_prescription" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->TemplateName->Visible) { // TemplateName ?>
        <td data-name="TemplateName" <?= $Page->TemplateName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_TemplateName" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_TemplateName"
        name="x<?= $Page->RowIndex ?>_TemplateName"
        class="form-control ew-select<?= $Page->TemplateName->isInvalidClass() ?>"
        data-select2-id="mas_user_template_prescription_x<?= $Page->RowIndex ?>_TemplateName"
        data-table="mas_user_template_prescription"
        data-field="x_TemplateName"
        data-value-separator="<?= $Page->TemplateName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateName->getPlaceHolder()) ?>"
        <?= $Page->TemplateName->editAttributes() ?>>
        <?= $Page->TemplateName->selectOptionListHtml("x{$Page->RowIndex}_TemplateName") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_template_prescription_type") && !$Page->TemplateName->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_TemplateName" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateName->caption() ?>" data-title="<?= $Page->TemplateName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_TemplateName',url:'<?= GetUrl("MasTemplatePrescriptionTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->TemplateName->getErrorMessage() ?></div>
<?= $Page->TemplateName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_TemplateName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_user_template_prescription_x<?= $Page->RowIndex ?>_TemplateName']"),
        options = { name: "x<?= $Page->RowIndex ?>_TemplateName", selectId: "mas_user_template_prescription_x<?= $Page->RowIndex ?>_TemplateName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_user_template_prescription.fields.TemplateName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_TemplateName" data-hidden="1" name="o<?= $Page->RowIndex ?>_TemplateName" id="o<?= $Page->RowIndex ?>_TemplateName" value="<?= HtmlEncode($Page->TemplateName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_TemplateName" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_TemplateName"
        name="x<?= $Page->RowIndex ?>_TemplateName"
        class="form-control ew-select<?= $Page->TemplateName->isInvalidClass() ?>"
        data-select2-id="mas_user_template_prescription_x<?= $Page->RowIndex ?>_TemplateName"
        data-table="mas_user_template_prescription"
        data-field="x_TemplateName"
        data-value-separator="<?= $Page->TemplateName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateName->getPlaceHolder()) ?>"
        <?= $Page->TemplateName->editAttributes() ?>>
        <?= $Page->TemplateName->selectOptionListHtml("x{$Page->RowIndex}_TemplateName") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_template_prescription_type") && !$Page->TemplateName->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_TemplateName" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateName->caption() ?>" data-title="<?= $Page->TemplateName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_TemplateName',url:'<?= GetUrl("MasTemplatePrescriptionTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->TemplateName->getErrorMessage() ?></div>
<?= $Page->TemplateName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_TemplateName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_user_template_prescription_x<?= $Page->RowIndex ?>_TemplateName']"),
        options = { name: "x<?= $Page->RowIndex ?>_TemplateName", selectId: "mas_user_template_prescription_x<?= $Page->RowIndex ?>_TemplateName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_user_template_prescription.fields.TemplateName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_TemplateName">
<span<?= $Page->TemplateName->viewAttributes() ?>>
<?= $Page->TemplateName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Medicine->Visible) { // Medicine ?>
        <td data-name="Medicine" <?= $Page->Medicine->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_Medicine" class="form-group">
<?php
$onchange = $Page->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_Medicine" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->Medicine->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_Medicine" id="sv_x<?= $Page->RowIndex ?>_Medicine" value="<?= RemoveHtml($Page->Medicine->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>"<?= $Page->Medicine->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Medicine->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_Medicine',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?= ($Page->Medicine->ReadOnly || $Page->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
            <?php if (AllowAdd(CurrentProjectID() . "pres_tradenames_new") && !$Page->Medicine->ReadOnly) { ?>
            <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_Medicine" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->Medicine->caption() ?>" data-title="<?= $Page->Medicine->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_Medicine',url:'<?= GetUrl("PresTradenamesNewAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
            <?php } ?>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="mas_user_template_prescription" data-field="x_Medicine" data-input="sv_x<?= $Page->RowIndex ?>_Medicine" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Medicine->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_Medicine" id="x<?= $Page->RowIndex ?>_Medicine" value="<?= HtmlEncode($Page->Medicine->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Medicine->getErrorMessage() ?></div>
<script>
loadjs.ready(["fmas_user_template_prescriptionlist"], function() {
    fmas_user_template_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_Medicine","forceSelect":true}, ew.vars.tables.mas_user_template_prescription.fields.Medicine.autoSuggestOptions));
});
</script>
<?= $Page->Medicine->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Medicine") ?>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_Medicine" data-hidden="1" name="o<?= $Page->RowIndex ?>_Medicine" id="o<?= $Page->RowIndex ?>_Medicine" value="<?= HtmlEncode($Page->Medicine->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_Medicine" class="form-group">
<?php
$onchange = $Page->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_Medicine" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->Medicine->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_Medicine" id="sv_x<?= $Page->RowIndex ?>_Medicine" value="<?= RemoveHtml($Page->Medicine->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>"<?= $Page->Medicine->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Medicine->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_Medicine',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?= ($Page->Medicine->ReadOnly || $Page->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
            <?php if (AllowAdd(CurrentProjectID() . "pres_tradenames_new") && !$Page->Medicine->ReadOnly) { ?>
            <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_Medicine" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->Medicine->caption() ?>" data-title="<?= $Page->Medicine->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_Medicine',url:'<?= GetUrl("PresTradenamesNewAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
            <?php } ?>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="mas_user_template_prescription" data-field="x_Medicine" data-input="sv_x<?= $Page->RowIndex ?>_Medicine" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Medicine->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_Medicine" id="x<?= $Page->RowIndex ?>_Medicine" value="<?= HtmlEncode($Page->Medicine->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Medicine->getErrorMessage() ?></div>
<script>
loadjs.ready(["fmas_user_template_prescriptionlist"], function() {
    fmas_user_template_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_Medicine","forceSelect":true}, ew.vars.tables.mas_user_template_prescription.fields.Medicine.autoSuggestOptions));
});
</script>
<?= $Page->Medicine->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Medicine") ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_Medicine">
<span<?= $Page->Medicine->viewAttributes() ?>>
<?= $Page->Medicine->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->M->Visible) { // M ?>
        <td data-name="M" <?= $Page->M->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_M" class="form-group">
<input type="<?= $Page->M->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_M" name="x<?= $Page->RowIndex ?>_M" id="x<?= $Page->RowIndex ?>_M" size="2" maxlength="3" placeholder="<?= HtmlEncode($Page->M->getPlaceHolder()) ?>" value="<?= $Page->M->EditValue ?>"<?= $Page->M->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->M->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_M" data-hidden="1" name="o<?= $Page->RowIndex ?>_M" id="o<?= $Page->RowIndex ?>_M" value="<?= HtmlEncode($Page->M->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_M" class="form-group">
<input type="<?= $Page->M->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_M" name="x<?= $Page->RowIndex ?>_M" id="x<?= $Page->RowIndex ?>_M" size="2" maxlength="3" placeholder="<?= HtmlEncode($Page->M->getPlaceHolder()) ?>" value="<?= $Page->M->EditValue ?>"<?= $Page->M->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->M->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_M">
<span<?= $Page->M->viewAttributes() ?>>
<?= $Page->M->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->A->Visible) { // A ?>
        <td data-name="A" <?= $Page->A->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_A" class="form-group">
<input type="<?= $Page->A->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_A" name="x<?= $Page->RowIndex ?>_A" id="x<?= $Page->RowIndex ?>_A" size="2" maxlength="3" placeholder="<?= HtmlEncode($Page->A->getPlaceHolder()) ?>" value="<?= $Page->A->EditValue ?>"<?= $Page->A->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->A->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_A" data-hidden="1" name="o<?= $Page->RowIndex ?>_A" id="o<?= $Page->RowIndex ?>_A" value="<?= HtmlEncode($Page->A->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_A" class="form-group">
<input type="<?= $Page->A->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_A" name="x<?= $Page->RowIndex ?>_A" id="x<?= $Page->RowIndex ?>_A" size="2" maxlength="3" placeholder="<?= HtmlEncode($Page->A->getPlaceHolder()) ?>" value="<?= $Page->A->EditValue ?>"<?= $Page->A->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->A->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_A">
<span<?= $Page->A->viewAttributes() ?>>
<?= $Page->A->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->N->Visible) { // N ?>
        <td data-name="N" <?= $Page->N->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_N" class="form-group">
<input type="<?= $Page->N->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_N" name="x<?= $Page->RowIndex ?>_N" id="x<?= $Page->RowIndex ?>_N" size="2" maxlength="3" placeholder="<?= HtmlEncode($Page->N->getPlaceHolder()) ?>" value="<?= $Page->N->EditValue ?>"<?= $Page->N->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->N->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_N" data-hidden="1" name="o<?= $Page->RowIndex ?>_N" id="o<?= $Page->RowIndex ?>_N" value="<?= HtmlEncode($Page->N->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_N" class="form-group">
<input type="<?= $Page->N->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_N" name="x<?= $Page->RowIndex ?>_N" id="x<?= $Page->RowIndex ?>_N" size="2" maxlength="3" placeholder="<?= HtmlEncode($Page->N->getPlaceHolder()) ?>" value="<?= $Page->N->EditValue ?>"<?= $Page->N->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->N->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_N">
<span<?= $Page->N->viewAttributes() ?>>
<?= $Page->N->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
        <td data-name="NoOfDays" <?= $Page->NoOfDays->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_NoOfDays" class="form-group">
<input type="<?= $Page->NoOfDays->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_NoOfDays" name="x<?= $Page->RowIndex ?>_NoOfDays" id="x<?= $Page->RowIndex ?>_NoOfDays" size="5" maxlength="10" placeholder="<?= HtmlEncode($Page->NoOfDays->getPlaceHolder()) ?>" value="<?= $Page->NoOfDays->EditValue ?>"<?= $Page->NoOfDays->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoOfDays->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_NoOfDays" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoOfDays" id="o<?= $Page->RowIndex ?>_NoOfDays" value="<?= HtmlEncode($Page->NoOfDays->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_NoOfDays" class="form-group">
<input type="<?= $Page->NoOfDays->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_NoOfDays" name="x<?= $Page->RowIndex ?>_NoOfDays" id="x<?= $Page->RowIndex ?>_NoOfDays" size="5" maxlength="10" placeholder="<?= HtmlEncode($Page->NoOfDays->getPlaceHolder()) ?>" value="<?= $Page->NoOfDays->EditValue ?>"<?= $Page->NoOfDays->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoOfDays->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_NoOfDays">
<span<?= $Page->NoOfDays->viewAttributes() ?>>
<?= $Page->NoOfDays->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PreRoute->Visible) { // PreRoute ?>
        <td data-name="PreRoute" <?= $Page->PreRoute->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_PreRoute" class="form-group">
<?php
$onchange = $Page->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PreRoute" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->PreRoute->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PreRoute" id="sv_x<?= $Page->RowIndex ?>_PreRoute" value="<?= RemoveHtml($Page->PreRoute->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>"<?= $Page->PreRoute->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PreRoute->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_PreRoute',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->PreRoute->ReadOnly || $Page->PreRoute->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
            <?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$Page->PreRoute->ReadOnly) { ?>
            <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_PreRoute" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->PreRoute->caption() ?>" data-title="<?= $Page->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_PreRoute',url:'<?= GetUrl("PresMasRouteAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
            <?php } ?>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="mas_user_template_prescription" data-field="x_PreRoute" data-input="sv_x<?= $Page->RowIndex ?>_PreRoute" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PreRoute" id="x<?= $Page->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Page->PreRoute->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PreRoute->getErrorMessage() ?></div>
<script>
loadjs.ready(["fmas_user_template_prescriptionlist"], function() {
    fmas_user_template_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PreRoute","forceSelect":false}, ew.vars.tables.mas_user_template_prescription.fields.PreRoute.autoSuggestOptions));
});
</script>
<?= $Page->PreRoute->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PreRoute") ?>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_PreRoute" data-hidden="1" name="o<?= $Page->RowIndex ?>_PreRoute" id="o<?= $Page->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Page->PreRoute->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_PreRoute" class="form-group">
<?php
$onchange = $Page->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PreRoute" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->PreRoute->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PreRoute" id="sv_x<?= $Page->RowIndex ?>_PreRoute" value="<?= RemoveHtml($Page->PreRoute->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>"<?= $Page->PreRoute->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PreRoute->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_PreRoute',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->PreRoute->ReadOnly || $Page->PreRoute->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
            <?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$Page->PreRoute->ReadOnly) { ?>
            <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_PreRoute" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->PreRoute->caption() ?>" data-title="<?= $Page->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_PreRoute',url:'<?= GetUrl("PresMasRouteAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
            <?php } ?>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="mas_user_template_prescription" data-field="x_PreRoute" data-input="sv_x<?= $Page->RowIndex ?>_PreRoute" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PreRoute" id="x<?= $Page->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Page->PreRoute->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PreRoute->getErrorMessage() ?></div>
<script>
loadjs.ready(["fmas_user_template_prescriptionlist"], function() {
    fmas_user_template_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PreRoute","forceSelect":false}, ew.vars.tables.mas_user_template_prescription.fields.PreRoute.autoSuggestOptions));
});
</script>
<?= $Page->PreRoute->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PreRoute") ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_PreRoute">
<span<?= $Page->PreRoute->viewAttributes() ?>>
<?= $Page->PreRoute->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
        <td data-name="TimeOfTaking" <?= $Page->TimeOfTaking->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_TimeOfTaking" class="form-group">
<?php
$onchange = $Page->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_TimeOfTaking" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Page->TimeOfTaking->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" id="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= RemoveHtml($Page->TimeOfTaking->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>"<?= $Page->TimeOfTaking->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$Page->TimeOfTaking->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_TimeOfTaking" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TimeOfTaking->caption() ?>" data-title="<?= $Page->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_TimeOfTaking',url:'<?= GetUrl("PresMasTimeoftakingAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="mas_user_template_prescription" data-field="x_TimeOfTaking" data-input="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" data-value-separator="<?= $Page->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_TimeOfTaking" id="x<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Page->TimeOfTaking->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->TimeOfTaking->getErrorMessage() ?></div>
<script>
loadjs.ready(["fmas_user_template_prescriptionlist"], function() {
    fmas_user_template_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_TimeOfTaking","forceSelect":false}, ew.vars.tables.mas_user_template_prescription.fields.TimeOfTaking.autoSuggestOptions));
});
</script>
<?= $Page->TimeOfTaking->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_TimeOfTaking") ?>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_TimeOfTaking" data-hidden="1" name="o<?= $Page->RowIndex ?>_TimeOfTaking" id="o<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Page->TimeOfTaking->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_TimeOfTaking" class="form-group">
<?php
$onchange = $Page->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_TimeOfTaking" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Page->TimeOfTaking->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" id="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= RemoveHtml($Page->TimeOfTaking->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>"<?= $Page->TimeOfTaking->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$Page->TimeOfTaking->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_TimeOfTaking" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TimeOfTaking->caption() ?>" data-title="<?= $Page->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_TimeOfTaking',url:'<?= GetUrl("PresMasTimeoftakingAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="mas_user_template_prescription" data-field="x_TimeOfTaking" data-input="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" data-value-separator="<?= $Page->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_TimeOfTaking" id="x<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Page->TimeOfTaking->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->TimeOfTaking->getErrorMessage() ?></div>
<script>
loadjs.ready(["fmas_user_template_prescriptionlist"], function() {
    fmas_user_template_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_TimeOfTaking","forceSelect":false}, ew.vars.tables.mas_user_template_prescription.fields.TimeOfTaking.autoSuggestOptions));
});
</script>
<?= $Page->TimeOfTaking->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_TimeOfTaking") ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_TimeOfTaking">
<span<?= $Page->TimeOfTaking->viewAttributes() ?>>
<?= $Page->TimeOfTaking->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_CreatedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreatedBy" id="o<?= $Page->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Page->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
        <td data-name="CreateDateTime" <?= $Page->CreateDateTime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_CreateDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreateDateTime" id="o<?= $Page->RowIndex ?>_CreateDateTime" value="<?= HtmlEncode($Page->CreateDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_CreateDateTime">
<span<?= $Page->CreateDateTime->viewAttributes() ?>>
<?= $Page->CreateDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_ModifiedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModifiedBy" id="o<?= $Page->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Page->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_ModifiedDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModifiedDateTime" id="o<?= $Page->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Page->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
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
loadjs.ready(["fmas_user_template_prescriptionlist","load"], function () {
    fmas_user_template_prescriptionlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_mas_user_template_prescription", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_mas_user_template_prescription_id" class="form-group mas_user_template_prescription_id"></span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TemplateName->Visible) { // TemplateName ?>
        <td data-name="TemplateName">
<span id="el$rowindex$_mas_user_template_prescription_TemplateName" class="form-group mas_user_template_prescription_TemplateName">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_TemplateName"
        name="x<?= $Page->RowIndex ?>_TemplateName"
        class="form-control ew-select<?= $Page->TemplateName->isInvalidClass() ?>"
        data-select2-id="mas_user_template_prescription_x<?= $Page->RowIndex ?>_TemplateName"
        data-table="mas_user_template_prescription"
        data-field="x_TemplateName"
        data-value-separator="<?= $Page->TemplateName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateName->getPlaceHolder()) ?>"
        <?= $Page->TemplateName->editAttributes() ?>>
        <?= $Page->TemplateName->selectOptionListHtml("x{$Page->RowIndex}_TemplateName") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_template_prescription_type") && !$Page->TemplateName->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_TemplateName" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateName->caption() ?>" data-title="<?= $Page->TemplateName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_TemplateName',url:'<?= GetUrl("MasTemplatePrescriptionTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->TemplateName->getErrorMessage() ?></div>
<?= $Page->TemplateName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_TemplateName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_user_template_prescription_x<?= $Page->RowIndex ?>_TemplateName']"),
        options = { name: "x<?= $Page->RowIndex ?>_TemplateName", selectId: "mas_user_template_prescription_x<?= $Page->RowIndex ?>_TemplateName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_user_template_prescription.fields.TemplateName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_TemplateName" data-hidden="1" name="o<?= $Page->RowIndex ?>_TemplateName" id="o<?= $Page->RowIndex ?>_TemplateName" value="<?= HtmlEncode($Page->TemplateName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Medicine->Visible) { // Medicine ?>
        <td data-name="Medicine">
<span id="el$rowindex$_mas_user_template_prescription_Medicine" class="form-group mas_user_template_prescription_Medicine">
<?php
$onchange = $Page->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_Medicine" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->Medicine->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_Medicine" id="sv_x<?= $Page->RowIndex ?>_Medicine" value="<?= RemoveHtml($Page->Medicine->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>"<?= $Page->Medicine->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Medicine->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_Medicine',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?= ($Page->Medicine->ReadOnly || $Page->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
            <?php if (AllowAdd(CurrentProjectID() . "pres_tradenames_new") && !$Page->Medicine->ReadOnly) { ?>
            <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_Medicine" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->Medicine->caption() ?>" data-title="<?= $Page->Medicine->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_Medicine',url:'<?= GetUrl("PresTradenamesNewAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
            <?php } ?>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="mas_user_template_prescription" data-field="x_Medicine" data-input="sv_x<?= $Page->RowIndex ?>_Medicine" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Medicine->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_Medicine" id="x<?= $Page->RowIndex ?>_Medicine" value="<?= HtmlEncode($Page->Medicine->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Medicine->getErrorMessage() ?></div>
<script>
loadjs.ready(["fmas_user_template_prescriptionlist"], function() {
    fmas_user_template_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_Medicine","forceSelect":true}, ew.vars.tables.mas_user_template_prescription.fields.Medicine.autoSuggestOptions));
});
</script>
<?= $Page->Medicine->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Medicine") ?>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_Medicine" data-hidden="1" name="o<?= $Page->RowIndex ?>_Medicine" id="o<?= $Page->RowIndex ?>_Medicine" value="<?= HtmlEncode($Page->Medicine->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->M->Visible) { // M ?>
        <td data-name="M">
<span id="el$rowindex$_mas_user_template_prescription_M" class="form-group mas_user_template_prescription_M">
<input type="<?= $Page->M->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_M" name="x<?= $Page->RowIndex ?>_M" id="x<?= $Page->RowIndex ?>_M" size="2" maxlength="3" placeholder="<?= HtmlEncode($Page->M->getPlaceHolder()) ?>" value="<?= $Page->M->EditValue ?>"<?= $Page->M->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->M->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_M" data-hidden="1" name="o<?= $Page->RowIndex ?>_M" id="o<?= $Page->RowIndex ?>_M" value="<?= HtmlEncode($Page->M->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->A->Visible) { // A ?>
        <td data-name="A">
<span id="el$rowindex$_mas_user_template_prescription_A" class="form-group mas_user_template_prescription_A">
<input type="<?= $Page->A->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_A" name="x<?= $Page->RowIndex ?>_A" id="x<?= $Page->RowIndex ?>_A" size="2" maxlength="3" placeholder="<?= HtmlEncode($Page->A->getPlaceHolder()) ?>" value="<?= $Page->A->EditValue ?>"<?= $Page->A->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->A->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_A" data-hidden="1" name="o<?= $Page->RowIndex ?>_A" id="o<?= $Page->RowIndex ?>_A" value="<?= HtmlEncode($Page->A->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->N->Visible) { // N ?>
        <td data-name="N">
<span id="el$rowindex$_mas_user_template_prescription_N" class="form-group mas_user_template_prescription_N">
<input type="<?= $Page->N->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_N" name="x<?= $Page->RowIndex ?>_N" id="x<?= $Page->RowIndex ?>_N" size="2" maxlength="3" placeholder="<?= HtmlEncode($Page->N->getPlaceHolder()) ?>" value="<?= $Page->N->EditValue ?>"<?= $Page->N->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->N->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_N" data-hidden="1" name="o<?= $Page->RowIndex ?>_N" id="o<?= $Page->RowIndex ?>_N" value="<?= HtmlEncode($Page->N->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
        <td data-name="NoOfDays">
<span id="el$rowindex$_mas_user_template_prescription_NoOfDays" class="form-group mas_user_template_prescription_NoOfDays">
<input type="<?= $Page->NoOfDays->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_NoOfDays" name="x<?= $Page->RowIndex ?>_NoOfDays" id="x<?= $Page->RowIndex ?>_NoOfDays" size="5" maxlength="10" placeholder="<?= HtmlEncode($Page->NoOfDays->getPlaceHolder()) ?>" value="<?= $Page->NoOfDays->EditValue ?>"<?= $Page->NoOfDays->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoOfDays->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_NoOfDays" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoOfDays" id="o<?= $Page->RowIndex ?>_NoOfDays" value="<?= HtmlEncode($Page->NoOfDays->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PreRoute->Visible) { // PreRoute ?>
        <td data-name="PreRoute">
<span id="el$rowindex$_mas_user_template_prescription_PreRoute" class="form-group mas_user_template_prescription_PreRoute">
<?php
$onchange = $Page->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PreRoute" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->PreRoute->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PreRoute" id="sv_x<?= $Page->RowIndex ?>_PreRoute" value="<?= RemoveHtml($Page->PreRoute->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>"<?= $Page->PreRoute->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PreRoute->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_PreRoute',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->PreRoute->ReadOnly || $Page->PreRoute->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
            <?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$Page->PreRoute->ReadOnly) { ?>
            <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_PreRoute" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->PreRoute->caption() ?>" data-title="<?= $Page->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_PreRoute',url:'<?= GetUrl("PresMasRouteAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
            <?php } ?>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="mas_user_template_prescription" data-field="x_PreRoute" data-input="sv_x<?= $Page->RowIndex ?>_PreRoute" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PreRoute" id="x<?= $Page->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Page->PreRoute->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PreRoute->getErrorMessage() ?></div>
<script>
loadjs.ready(["fmas_user_template_prescriptionlist"], function() {
    fmas_user_template_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PreRoute","forceSelect":false}, ew.vars.tables.mas_user_template_prescription.fields.PreRoute.autoSuggestOptions));
});
</script>
<?= $Page->PreRoute->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PreRoute") ?>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_PreRoute" data-hidden="1" name="o<?= $Page->RowIndex ?>_PreRoute" id="o<?= $Page->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Page->PreRoute->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
        <td data-name="TimeOfTaking">
<span id="el$rowindex$_mas_user_template_prescription_TimeOfTaking" class="form-group mas_user_template_prescription_TimeOfTaking">
<?php
$onchange = $Page->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_TimeOfTaking" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Page->TimeOfTaking->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" id="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= RemoveHtml($Page->TimeOfTaking->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>"<?= $Page->TimeOfTaking->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$Page->TimeOfTaking->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_TimeOfTaking" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TimeOfTaking->caption() ?>" data-title="<?= $Page->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_TimeOfTaking',url:'<?= GetUrl("PresMasTimeoftakingAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="mas_user_template_prescription" data-field="x_TimeOfTaking" data-input="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" data-value-separator="<?= $Page->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_TimeOfTaking" id="x<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Page->TimeOfTaking->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->TimeOfTaking->getErrorMessage() ?></div>
<script>
loadjs.ready(["fmas_user_template_prescriptionlist"], function() {
    fmas_user_template_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_TimeOfTaking","forceSelect":false}, ew.vars.tables.mas_user_template_prescription.fields.TimeOfTaking.autoSuggestOptions));
});
</script>
<?= $Page->TimeOfTaking->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_TimeOfTaking") ?>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_TimeOfTaking" data-hidden="1" name="o<?= $Page->RowIndex ?>_TimeOfTaking" id="o<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Page->TimeOfTaking->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy">
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_CreatedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreatedBy" id="o<?= $Page->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Page->CreatedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
        <td data-name="CreateDateTime">
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_CreateDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreateDateTime" id="o<?= $Page->RowIndex ?>_CreateDateTime" value="<?= HtmlEncode($Page->CreateDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy">
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_ModifiedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModifiedBy" id="o<?= $Page->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Page->ModifiedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime">
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_ModifiedDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModifiedDateTime" id="o<?= $Page->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Page->ModifiedDateTime->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fmas_user_template_prescriptionlist","load"], function() {
    fmas_user_template_prescriptionlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("mas_user_template_prescription");
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
        container: "gmp_mas_user_template_prescription",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
