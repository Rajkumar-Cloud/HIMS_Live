<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfVitrificationList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_vitrificationlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_vitrificationlist = currentForm = new ew.Form("fivf_vitrificationlist", "list");
    fivf_vitrificationlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_vitrification")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_vitrification)
        ew.vars.tables.ivf_vitrification = currentTable;
    fivf_vitrificationlist.addFields([
        ["vitrificationDate", [fields.vitrificationDate.visible && fields.vitrificationDate.required ? ew.Validators.required(fields.vitrificationDate.caption) : null, ew.Validators.datetime(0)], fields.vitrificationDate.isInvalid],
        ["PrimaryEmbryologist", [fields.PrimaryEmbryologist.visible && fields.PrimaryEmbryologist.required ? ew.Validators.required(fields.PrimaryEmbryologist.caption) : null], fields.PrimaryEmbryologist.isInvalid],
        ["SecondaryEmbryologist", [fields.SecondaryEmbryologist.visible && fields.SecondaryEmbryologist.required ? ew.Validators.required(fields.SecondaryEmbryologist.caption) : null], fields.SecondaryEmbryologist.isInvalid],
        ["EmbryoNo", [fields.EmbryoNo.visible && fields.EmbryoNo.required ? ew.Validators.required(fields.EmbryoNo.caption) : null], fields.EmbryoNo.isInvalid],
        ["FertilisationDate", [fields.FertilisationDate.visible && fields.FertilisationDate.required ? ew.Validators.required(fields.FertilisationDate.caption) : null, ew.Validators.datetime(0)], fields.FertilisationDate.isInvalid],
        ["Day", [fields.Day.visible && fields.Day.required ? ew.Validators.required(fields.Day.caption) : null], fields.Day.isInvalid],
        ["Grade", [fields.Grade.visible && fields.Grade.required ? ew.Validators.required(fields.Grade.caption) : null], fields.Grade.isInvalid],
        ["Incubator", [fields.Incubator.visible && fields.Incubator.required ? ew.Validators.required(fields.Incubator.caption) : null], fields.Incubator.isInvalid],
        ["Tank", [fields.Tank.visible && fields.Tank.required ? ew.Validators.required(fields.Tank.caption) : null], fields.Tank.isInvalid],
        ["Canister", [fields.Canister.visible && fields.Canister.required ? ew.Validators.required(fields.Canister.caption) : null], fields.Canister.isInvalid],
        ["Gobiet", [fields.Gobiet.visible && fields.Gobiet.required ? ew.Validators.required(fields.Gobiet.caption) : null], fields.Gobiet.isInvalid],
        ["CryolockNo", [fields.CryolockNo.visible && fields.CryolockNo.required ? ew.Validators.required(fields.CryolockNo.caption) : null], fields.CryolockNo.isInvalid],
        ["CryolockColour", [fields.CryolockColour.visible && fields.CryolockColour.required ? ew.Validators.required(fields.CryolockColour.caption) : null], fields.CryolockColour.isInvalid],
        ["Stage", [fields.Stage.visible && fields.Stage.required ? ew.Validators.required(fields.Stage.caption) : null], fields.Stage.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_vitrificationlist,
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
    fivf_vitrificationlist.validate = function () {
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
    fivf_vitrificationlist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "vitrificationDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrimaryEmbryologist", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SecondaryEmbryologist", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EmbryoNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "FertilisationDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Grade", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Incubator", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Tank", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Canister", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Gobiet", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CryolockNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CryolockColour", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Stage", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fivf_vitrificationlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_vitrificationlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_vitrificationlist.lists.Day = <?= $Page->Day->toClientList($Page) ?>;
    fivf_vitrificationlist.lists.Grade = <?= $Page->Grade->toClientList($Page) ?>;
    loadjs.done("fivf_vitrificationlist");
});
var fivf_vitrificationlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_vitrificationlistsrch = currentSearchForm = new ew.Form("fivf_vitrificationlistsrch");

    // Dynamic selection lists

    // Filters
    fivf_vitrificationlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_vitrificationlistsrch");
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
<form name="fivf_vitrificationlistsrch" id="fivf_vitrificationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fivf_vitrificationlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_vitrification">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_vitrification">
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
<form name="fivf_vitrificationlist" id="fivf_vitrificationlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_vitrification">
<div id="gmp_ivf_vitrification" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_vitrificationlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <th data-name="vitrificationDate" class="<?= $Page->vitrificationDate->headerCellClass() ?>"><div id="elh_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate"><?= $Page->renderSort($Page->vitrificationDate) ?></div></th>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <th data-name="PrimaryEmbryologist" class="<?= $Page->PrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist"><?= $Page->renderSort($Page->PrimaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <th data-name="SecondaryEmbryologist" class="<?= $Page->SecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist"><?= $Page->renderSort($Page->SecondaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <th data-name="EmbryoNo" class="<?= $Page->EmbryoNo->headerCellClass() ?>"><div id="elh_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo"><?= $Page->renderSort($Page->EmbryoNo) ?></div></th>
<?php } ?>
<?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
        <th data-name="FertilisationDate" class="<?= $Page->FertilisationDate->headerCellClass() ?>"><div id="elh_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate"><?= $Page->renderSort($Page->FertilisationDate) ?></div></th>
<?php } ?>
<?php if ($Page->Day->Visible) { // Day ?>
        <th data-name="Day" class="<?= $Page->Day->headerCellClass() ?>"><div id="elh_ivf_vitrification_Day" class="ivf_vitrification_Day"><?= $Page->renderSort($Page->Day) ?></div></th>
<?php } ?>
<?php if ($Page->Grade->Visible) { // Grade ?>
        <th data-name="Grade" class="<?= $Page->Grade->headerCellClass() ?>"><div id="elh_ivf_vitrification_Grade" class="ivf_vitrification_Grade"><?= $Page->renderSort($Page->Grade) ?></div></th>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
        <th data-name="Incubator" class="<?= $Page->Incubator->headerCellClass() ?>"><div id="elh_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator"><?= $Page->renderSort($Page->Incubator) ?></div></th>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
        <th data-name="Tank" class="<?= $Page->Tank->headerCellClass() ?>"><div id="elh_ivf_vitrification_Tank" class="ivf_vitrification_Tank"><?= $Page->renderSort($Page->Tank) ?></div></th>
<?php } ?>
<?php if ($Page->Canister->Visible) { // Canister ?>
        <th data-name="Canister" class="<?= $Page->Canister->headerCellClass() ?>"><div id="elh_ivf_vitrification_Canister" class="ivf_vitrification_Canister"><?= $Page->renderSort($Page->Canister) ?></div></th>
<?php } ?>
<?php if ($Page->Gobiet->Visible) { // Gobiet ?>
        <th data-name="Gobiet" class="<?= $Page->Gobiet->headerCellClass() ?>"><div id="elh_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet"><?= $Page->renderSort($Page->Gobiet) ?></div></th>
<?php } ?>
<?php if ($Page->CryolockNo->Visible) { // CryolockNo ?>
        <th data-name="CryolockNo" class="<?= $Page->CryolockNo->headerCellClass() ?>"><div id="elh_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo"><?= $Page->renderSort($Page->CryolockNo) ?></div></th>
<?php } ?>
<?php if ($Page->CryolockColour->Visible) { // CryolockColour ?>
        <th data-name="CryolockColour" class="<?= $Page->CryolockColour->headerCellClass() ?>"><div id="elh_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour"><?= $Page->renderSort($Page->CryolockColour) ?></div></th>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <th data-name="Stage" class="<?= $Page->Stage->headerCellClass() ?>"><div id="elh_ivf_vitrification_Stage" class="ivf_vitrification_Stage"><?= $Page->renderSort($Page->Stage) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_vitrification", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <td data-name="vitrificationDate" <?= $Page->vitrificationDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_vitrificationDate" class="form-group">
<input type="<?= $Page->vitrificationDate->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x<?= $Page->RowIndex ?>_vitrificationDate" id="x<?= $Page->RowIndex ?>_vitrificationDate" placeholder="<?= HtmlEncode($Page->vitrificationDate->getPlaceHolder()) ?>" value="<?= $Page->vitrificationDate->EditValue ?>"<?= $Page->vitrificationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitrificationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitrificationDate->ReadOnly && !$Page->vitrificationDate->Disabled && !isset($Page->vitrificationDate->EditAttrs["readonly"]) && !isset($Page->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_vitrificationlist", "x<?= $Page->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_vitrificationDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitrificationDate" id="o<?= $Page->RowIndex ?>_vitrificationDate" value="<?= HtmlEncode($Page->vitrificationDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_vitrificationDate" class="form-group">
<input type="<?= $Page->vitrificationDate->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x<?= $Page->RowIndex ?>_vitrificationDate" id="x<?= $Page->RowIndex ?>_vitrificationDate" placeholder="<?= HtmlEncode($Page->vitrificationDate->getPlaceHolder()) ?>" value="<?= $Page->vitrificationDate->EditValue ?>"<?= $Page->vitrificationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitrificationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitrificationDate->ReadOnly && !$Page->vitrificationDate->Disabled && !isset($Page->vitrificationDate->EditAttrs["readonly"]) && !isset($Page->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_vitrificationlist", "x<?= $Page->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_vitrificationDate">
<span<?= $Page->vitrificationDate->viewAttributes() ?>>
<?= $Page->vitrificationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <td data-name="PrimaryEmbryologist" <?= $Page->PrimaryEmbryologist->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_PrimaryEmbryologist" class="form-group">
<input type="<?= $Page->PrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x<?= $Page->RowIndex ?>_PrimaryEmbryologist" id="x<?= $Page->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->PrimaryEmbryologist->EditValue ?>"<?= $Page->PrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrimaryEmbryologist" id="o<?= $Page->RowIndex ?>_PrimaryEmbryologist" value="<?= HtmlEncode($Page->PrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_PrimaryEmbryologist" class="form-group">
<input type="<?= $Page->PrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x<?= $Page->RowIndex ?>_PrimaryEmbryologist" id="x<?= $Page->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->PrimaryEmbryologist->EditValue ?>"<?= $Page->PrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_PrimaryEmbryologist">
<span<?= $Page->PrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->PrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <td data-name="SecondaryEmbryologist" <?= $Page->SecondaryEmbryologist->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_SecondaryEmbryologist" class="form-group">
<input type="<?= $Page->SecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x<?= $Page->RowIndex ?>_SecondaryEmbryologist" id="x<?= $Page->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->SecondaryEmbryologist->EditValue ?>"<?= $Page->SecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_SecondaryEmbryologist" id="o<?= $Page->RowIndex ?>_SecondaryEmbryologist" value="<?= HtmlEncode($Page->SecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_SecondaryEmbryologist" class="form-group">
<input type="<?= $Page->SecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x<?= $Page->RowIndex ?>_SecondaryEmbryologist" id="x<?= $Page->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->SecondaryEmbryologist->EditValue ?>"<?= $Page->SecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_SecondaryEmbryologist">
<span<?= $Page->SecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->SecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <td data-name="EmbryoNo" <?= $Page->EmbryoNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_EmbryoNo" class="form-group">
<input type="<?= $Page->EmbryoNo->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x<?= $Page->RowIndex ?>_EmbryoNo" id="x<?= $Page->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->EmbryoNo->EditValue ?>"<?= $Page->EmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EmbryoNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_EmbryoNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_EmbryoNo" id="o<?= $Page->RowIndex ?>_EmbryoNo" value="<?= HtmlEncode($Page->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_EmbryoNo" class="form-group">
<input type="<?= $Page->EmbryoNo->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x<?= $Page->RowIndex ?>_EmbryoNo" id="x<?= $Page->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->EmbryoNo->EditValue ?>"<?= $Page->EmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EmbryoNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_EmbryoNo">
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<?= $Page->EmbryoNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
        <td data-name="FertilisationDate" <?= $Page->FertilisationDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_FertilisationDate" class="form-group">
<input type="<?= $Page->FertilisationDate->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x<?= $Page->RowIndex ?>_FertilisationDate" id="x<?= $Page->RowIndex ?>_FertilisationDate" placeholder="<?= HtmlEncode($Page->FertilisationDate->getPlaceHolder()) ?>" value="<?= $Page->FertilisationDate->EditValue ?>"<?= $Page->FertilisationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FertilisationDate->getErrorMessage() ?></div>
<?php if (!$Page->FertilisationDate->ReadOnly && !$Page->FertilisationDate->Disabled && !isset($Page->FertilisationDate->EditAttrs["readonly"]) && !isset($Page->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_vitrificationlist", "x<?= $Page->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_FertilisationDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_FertilisationDate" id="o<?= $Page->RowIndex ?>_FertilisationDate" value="<?= HtmlEncode($Page->FertilisationDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_FertilisationDate" class="form-group">
<input type="<?= $Page->FertilisationDate->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x<?= $Page->RowIndex ?>_FertilisationDate" id="x<?= $Page->RowIndex ?>_FertilisationDate" placeholder="<?= HtmlEncode($Page->FertilisationDate->getPlaceHolder()) ?>" value="<?= $Page->FertilisationDate->EditValue ?>"<?= $Page->FertilisationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FertilisationDate->getErrorMessage() ?></div>
<?php if (!$Page->FertilisationDate->ReadOnly && !$Page->FertilisationDate->Disabled && !isset($Page->FertilisationDate->EditAttrs["readonly"]) && !isset($Page->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_vitrificationlist", "x<?= $Page->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_FertilisationDate">
<span<?= $Page->FertilisationDate->viewAttributes() ?>>
<?= $Page->FertilisationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day->Visible) { // Day ?>
        <td data-name="Day" <?= $Page->Day->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Day" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day"
        name="x<?= $Page->RowIndex ?>_Day"
        class="form-control ew-select<?= $Page->Day->isInvalidClass() ?>"
        data-select2-id="ivf_vitrification_x<?= $Page->RowIndex ?>_Day"
        data-table="ivf_vitrification"
        data-field="x_Day"
        data-value-separator="<?= $Page->Day->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day->getPlaceHolder()) ?>"
        <?= $Page->Day->editAttributes() ?>>
        <?= $Page->Day->selectOptionListHtml("x{$Page->RowIndex}_Day") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitrification_x<?= $Page->RowIndex ?>_Day']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day", selectId: "ivf_vitrification_x<?= $Page->RowIndex ?>_Day", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_vitrification.fields.Day.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitrification.fields.Day.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Day" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day" id="o<?= $Page->RowIndex ?>_Day" value="<?= HtmlEncode($Page->Day->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Day" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day"
        name="x<?= $Page->RowIndex ?>_Day"
        class="form-control ew-select<?= $Page->Day->isInvalidClass() ?>"
        data-select2-id="ivf_vitrification_x<?= $Page->RowIndex ?>_Day"
        data-table="ivf_vitrification"
        data-field="x_Day"
        data-value-separator="<?= $Page->Day->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day->getPlaceHolder()) ?>"
        <?= $Page->Day->editAttributes() ?>>
        <?= $Page->Day->selectOptionListHtml("x{$Page->RowIndex}_Day") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitrification_x<?= $Page->RowIndex ?>_Day']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day", selectId: "ivf_vitrification_x<?= $Page->RowIndex ?>_Day", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_vitrification.fields.Day.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitrification.fields.Day.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Day">
<span<?= $Page->Day->viewAttributes() ?>>
<?= $Page->Day->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Grade->Visible) { // Grade ?>
        <td data-name="Grade" <?= $Page->Grade->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Grade" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Grade"
        name="x<?= $Page->RowIndex ?>_Grade"
        class="form-control ew-select<?= $Page->Grade->isInvalidClass() ?>"
        data-select2-id="ivf_vitrification_x<?= $Page->RowIndex ?>_Grade"
        data-table="ivf_vitrification"
        data-field="x_Grade"
        data-value-separator="<?= $Page->Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Grade->getPlaceHolder()) ?>"
        <?= $Page->Grade->editAttributes() ?>>
        <?= $Page->Grade->selectOptionListHtml("x{$Page->RowIndex}_Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitrification_x<?= $Page->RowIndex ?>_Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Grade", selectId: "ivf_vitrification_x<?= $Page->RowIndex ?>_Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_vitrification.fields.Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitrification.fields.Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Grade" id="o<?= $Page->RowIndex ?>_Grade" value="<?= HtmlEncode($Page->Grade->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Grade" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Grade"
        name="x<?= $Page->RowIndex ?>_Grade"
        class="form-control ew-select<?= $Page->Grade->isInvalidClass() ?>"
        data-select2-id="ivf_vitrification_x<?= $Page->RowIndex ?>_Grade"
        data-table="ivf_vitrification"
        data-field="x_Grade"
        data-value-separator="<?= $Page->Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Grade->getPlaceHolder()) ?>"
        <?= $Page->Grade->editAttributes() ?>>
        <?= $Page->Grade->selectOptionListHtml("x{$Page->RowIndex}_Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitrification_x<?= $Page->RowIndex ?>_Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Grade", selectId: "ivf_vitrification_x<?= $Page->RowIndex ?>_Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_vitrification.fields.Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitrification.fields.Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Grade">
<span<?= $Page->Grade->viewAttributes() ?>>
<?= $Page->Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Incubator->Visible) { // Incubator ?>
        <td data-name="Incubator" <?= $Page->Incubator->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Incubator" class="form-group">
<input type="<?= $Page->Incubator->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Incubator" name="x<?= $Page->RowIndex ?>_Incubator" id="x<?= $Page->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Incubator->getPlaceHolder()) ?>" value="<?= $Page->Incubator->EditValue ?>"<?= $Page->Incubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Incubator" data-hidden="1" name="o<?= $Page->RowIndex ?>_Incubator" id="o<?= $Page->RowIndex ?>_Incubator" value="<?= HtmlEncode($Page->Incubator->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Incubator" class="form-group">
<input type="<?= $Page->Incubator->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Incubator" name="x<?= $Page->RowIndex ?>_Incubator" id="x<?= $Page->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Incubator->getPlaceHolder()) ?>" value="<?= $Page->Incubator->EditValue ?>"<?= $Page->Incubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Incubator">
<span<?= $Page->Incubator->viewAttributes() ?>>
<?= $Page->Incubator->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Tank->Visible) { // Tank ?>
        <td data-name="Tank" <?= $Page->Tank->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Tank" class="form-group">
<input type="<?= $Page->Tank->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Tank" name="x<?= $Page->RowIndex ?>_Tank" id="x<?= $Page->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tank->getPlaceHolder()) ?>" value="<?= $Page->Tank->EditValue ?>"<?= $Page->Tank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Tank->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Tank" data-hidden="1" name="o<?= $Page->RowIndex ?>_Tank" id="o<?= $Page->RowIndex ?>_Tank" value="<?= HtmlEncode($Page->Tank->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Tank" class="form-group">
<input type="<?= $Page->Tank->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Tank" name="x<?= $Page->RowIndex ?>_Tank" id="x<?= $Page->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tank->getPlaceHolder()) ?>" value="<?= $Page->Tank->EditValue ?>"<?= $Page->Tank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Tank->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Tank">
<span<?= $Page->Tank->viewAttributes() ?>>
<?= $Page->Tank->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Canister->Visible) { // Canister ?>
        <td data-name="Canister" <?= $Page->Canister->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Canister" class="form-group">
<input type="<?= $Page->Canister->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Canister" name="x<?= $Page->RowIndex ?>_Canister" id="x<?= $Page->RowIndex ?>_Canister" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Canister->getPlaceHolder()) ?>" value="<?= $Page->Canister->EditValue ?>"<?= $Page->Canister->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Canister->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Canister" data-hidden="1" name="o<?= $Page->RowIndex ?>_Canister" id="o<?= $Page->RowIndex ?>_Canister" value="<?= HtmlEncode($Page->Canister->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Canister" class="form-group">
<input type="<?= $Page->Canister->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Canister" name="x<?= $Page->RowIndex ?>_Canister" id="x<?= $Page->RowIndex ?>_Canister" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Canister->getPlaceHolder()) ?>" value="<?= $Page->Canister->EditValue ?>"<?= $Page->Canister->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Canister->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Canister">
<span<?= $Page->Canister->viewAttributes() ?>>
<?= $Page->Canister->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Gobiet->Visible) { // Gobiet ?>
        <td data-name="Gobiet" <?= $Page->Gobiet->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Gobiet" class="form-group">
<input type="<?= $Page->Gobiet->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Gobiet" name="x<?= $Page->RowIndex ?>_Gobiet" id="x<?= $Page->RowIndex ?>_Gobiet" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gobiet->getPlaceHolder()) ?>" value="<?= $Page->Gobiet->EditValue ?>"<?= $Page->Gobiet->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gobiet->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Gobiet" data-hidden="1" name="o<?= $Page->RowIndex ?>_Gobiet" id="o<?= $Page->RowIndex ?>_Gobiet" value="<?= HtmlEncode($Page->Gobiet->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Gobiet" class="form-group">
<input type="<?= $Page->Gobiet->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Gobiet" name="x<?= $Page->RowIndex ?>_Gobiet" id="x<?= $Page->RowIndex ?>_Gobiet" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gobiet->getPlaceHolder()) ?>" value="<?= $Page->Gobiet->EditValue ?>"<?= $Page->Gobiet->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gobiet->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Gobiet">
<span<?= $Page->Gobiet->viewAttributes() ?>>
<?= $Page->Gobiet->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CryolockNo->Visible) { // CryolockNo ?>
        <td data-name="CryolockNo" <?= $Page->CryolockNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_CryolockNo" class="form-group">
<input type="<?= $Page->CryolockNo->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x<?= $Page->RowIndex ?>_CryolockNo" id="x<?= $Page->RowIndex ?>_CryolockNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CryolockNo->getPlaceHolder()) ?>" value="<?= $Page->CryolockNo->EditValue ?>"<?= $Page->CryolockNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CryolockNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_CryolockNo" id="o<?= $Page->RowIndex ?>_CryolockNo" value="<?= HtmlEncode($Page->CryolockNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_CryolockNo" class="form-group">
<input type="<?= $Page->CryolockNo->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x<?= $Page->RowIndex ?>_CryolockNo" id="x<?= $Page->RowIndex ?>_CryolockNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CryolockNo->getPlaceHolder()) ?>" value="<?= $Page->CryolockNo->EditValue ?>"<?= $Page->CryolockNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CryolockNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_CryolockNo">
<span<?= $Page->CryolockNo->viewAttributes() ?>>
<?= $Page->CryolockNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CryolockColour->Visible) { // CryolockColour ?>
        <td data-name="CryolockColour" <?= $Page->CryolockColour->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_CryolockColour" class="form-group">
<input type="<?= $Page->CryolockColour->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x<?= $Page->RowIndex ?>_CryolockColour" id="x<?= $Page->RowIndex ?>_CryolockColour" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CryolockColour->getPlaceHolder()) ?>" value="<?= $Page->CryolockColour->EditValue ?>"<?= $Page->CryolockColour->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CryolockColour->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockColour" data-hidden="1" name="o<?= $Page->RowIndex ?>_CryolockColour" id="o<?= $Page->RowIndex ?>_CryolockColour" value="<?= HtmlEncode($Page->CryolockColour->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_CryolockColour" class="form-group">
<input type="<?= $Page->CryolockColour->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x<?= $Page->RowIndex ?>_CryolockColour" id="x<?= $Page->RowIndex ?>_CryolockColour" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CryolockColour->getPlaceHolder()) ?>" value="<?= $Page->CryolockColour->EditValue ?>"<?= $Page->CryolockColour->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CryolockColour->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_CryolockColour">
<span<?= $Page->CryolockColour->viewAttributes() ?>>
<?= $Page->CryolockColour->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Stage->Visible) { // Stage ?>
        <td data-name="Stage" <?= $Page->Stage->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Stage" class="form-group">
<input type="<?= $Page->Stage->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Stage" name="x<?= $Page->RowIndex ?>_Stage" id="x<?= $Page->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>" value="<?= $Page->Stage->EditValue ?>"<?= $Page->Stage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Stage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Stage" id="o<?= $Page->RowIndex ?>_Stage" value="<?= HtmlEncode($Page->Stage->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Stage" class="form-group">
<input type="<?= $Page->Stage->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Stage" name="x<?= $Page->RowIndex ?>_Stage" id="x<?= $Page->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>" value="<?= $Page->Stage->EditValue ?>"<?= $Page->Stage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
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
loadjs.ready(["fivf_vitrificationlist","load"], function () {
    fivf_vitrificationlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_ivf_vitrification", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <td data-name="vitrificationDate">
<span id="el$rowindex$_ivf_vitrification_vitrificationDate" class="form-group ivf_vitrification_vitrificationDate">
<input type="<?= $Page->vitrificationDate->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x<?= $Page->RowIndex ?>_vitrificationDate" id="x<?= $Page->RowIndex ?>_vitrificationDate" placeholder="<?= HtmlEncode($Page->vitrificationDate->getPlaceHolder()) ?>" value="<?= $Page->vitrificationDate->EditValue ?>"<?= $Page->vitrificationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitrificationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitrificationDate->ReadOnly && !$Page->vitrificationDate->Disabled && !isset($Page->vitrificationDate->EditAttrs["readonly"]) && !isset($Page->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_vitrificationlist", "x<?= $Page->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_vitrificationDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitrificationDate" id="o<?= $Page->RowIndex ?>_vitrificationDate" value="<?= HtmlEncode($Page->vitrificationDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <td data-name="PrimaryEmbryologist">
<span id="el$rowindex$_ivf_vitrification_PrimaryEmbryologist" class="form-group ivf_vitrification_PrimaryEmbryologist">
<input type="<?= $Page->PrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x<?= $Page->RowIndex ?>_PrimaryEmbryologist" id="x<?= $Page->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->PrimaryEmbryologist->EditValue ?>"<?= $Page->PrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrimaryEmbryologist" id="o<?= $Page->RowIndex ?>_PrimaryEmbryologist" value="<?= HtmlEncode($Page->PrimaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <td data-name="SecondaryEmbryologist">
<span id="el$rowindex$_ivf_vitrification_SecondaryEmbryologist" class="form-group ivf_vitrification_SecondaryEmbryologist">
<input type="<?= $Page->SecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x<?= $Page->RowIndex ?>_SecondaryEmbryologist" id="x<?= $Page->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->SecondaryEmbryologist->EditValue ?>"<?= $Page->SecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_SecondaryEmbryologist" id="o<?= $Page->RowIndex ?>_SecondaryEmbryologist" value="<?= HtmlEncode($Page->SecondaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <td data-name="EmbryoNo">
<span id="el$rowindex$_ivf_vitrification_EmbryoNo" class="form-group ivf_vitrification_EmbryoNo">
<input type="<?= $Page->EmbryoNo->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x<?= $Page->RowIndex ?>_EmbryoNo" id="x<?= $Page->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->EmbryoNo->EditValue ?>"<?= $Page->EmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EmbryoNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_EmbryoNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_EmbryoNo" id="o<?= $Page->RowIndex ?>_EmbryoNo" value="<?= HtmlEncode($Page->EmbryoNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
        <td data-name="FertilisationDate">
<span id="el$rowindex$_ivf_vitrification_FertilisationDate" class="form-group ivf_vitrification_FertilisationDate">
<input type="<?= $Page->FertilisationDate->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x<?= $Page->RowIndex ?>_FertilisationDate" id="x<?= $Page->RowIndex ?>_FertilisationDate" placeholder="<?= HtmlEncode($Page->FertilisationDate->getPlaceHolder()) ?>" value="<?= $Page->FertilisationDate->EditValue ?>"<?= $Page->FertilisationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FertilisationDate->getErrorMessage() ?></div>
<?php if (!$Page->FertilisationDate->ReadOnly && !$Page->FertilisationDate->Disabled && !isset($Page->FertilisationDate->EditAttrs["readonly"]) && !isset($Page->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_vitrificationlist", "x<?= $Page->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_FertilisationDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_FertilisationDate" id="o<?= $Page->RowIndex ?>_FertilisationDate" value="<?= HtmlEncode($Page->FertilisationDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day->Visible) { // Day ?>
        <td data-name="Day">
<span id="el$rowindex$_ivf_vitrification_Day" class="form-group ivf_vitrification_Day">
    <select
        id="x<?= $Page->RowIndex ?>_Day"
        name="x<?= $Page->RowIndex ?>_Day"
        class="form-control ew-select<?= $Page->Day->isInvalidClass() ?>"
        data-select2-id="ivf_vitrification_x<?= $Page->RowIndex ?>_Day"
        data-table="ivf_vitrification"
        data-field="x_Day"
        data-value-separator="<?= $Page->Day->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day->getPlaceHolder()) ?>"
        <?= $Page->Day->editAttributes() ?>>
        <?= $Page->Day->selectOptionListHtml("x{$Page->RowIndex}_Day") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitrification_x<?= $Page->RowIndex ?>_Day']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day", selectId: "ivf_vitrification_x<?= $Page->RowIndex ?>_Day", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_vitrification.fields.Day.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitrification.fields.Day.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Day" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day" id="o<?= $Page->RowIndex ?>_Day" value="<?= HtmlEncode($Page->Day->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Grade->Visible) { // Grade ?>
        <td data-name="Grade">
<span id="el$rowindex$_ivf_vitrification_Grade" class="form-group ivf_vitrification_Grade">
    <select
        id="x<?= $Page->RowIndex ?>_Grade"
        name="x<?= $Page->RowIndex ?>_Grade"
        class="form-control ew-select<?= $Page->Grade->isInvalidClass() ?>"
        data-select2-id="ivf_vitrification_x<?= $Page->RowIndex ?>_Grade"
        data-table="ivf_vitrification"
        data-field="x_Grade"
        data-value-separator="<?= $Page->Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Grade->getPlaceHolder()) ?>"
        <?= $Page->Grade->editAttributes() ?>>
        <?= $Page->Grade->selectOptionListHtml("x{$Page->RowIndex}_Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitrification_x<?= $Page->RowIndex ?>_Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Grade", selectId: "ivf_vitrification_x<?= $Page->RowIndex ?>_Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_vitrification.fields.Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitrification.fields.Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Grade" id="o<?= $Page->RowIndex ?>_Grade" value="<?= HtmlEncode($Page->Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Incubator->Visible) { // Incubator ?>
        <td data-name="Incubator">
<span id="el$rowindex$_ivf_vitrification_Incubator" class="form-group ivf_vitrification_Incubator">
<input type="<?= $Page->Incubator->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Incubator" name="x<?= $Page->RowIndex ?>_Incubator" id="x<?= $Page->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Incubator->getPlaceHolder()) ?>" value="<?= $Page->Incubator->EditValue ?>"<?= $Page->Incubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Incubator" data-hidden="1" name="o<?= $Page->RowIndex ?>_Incubator" id="o<?= $Page->RowIndex ?>_Incubator" value="<?= HtmlEncode($Page->Incubator->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Tank->Visible) { // Tank ?>
        <td data-name="Tank">
<span id="el$rowindex$_ivf_vitrification_Tank" class="form-group ivf_vitrification_Tank">
<input type="<?= $Page->Tank->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Tank" name="x<?= $Page->RowIndex ?>_Tank" id="x<?= $Page->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tank->getPlaceHolder()) ?>" value="<?= $Page->Tank->EditValue ?>"<?= $Page->Tank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Tank->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Tank" data-hidden="1" name="o<?= $Page->RowIndex ?>_Tank" id="o<?= $Page->RowIndex ?>_Tank" value="<?= HtmlEncode($Page->Tank->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Canister->Visible) { // Canister ?>
        <td data-name="Canister">
<span id="el$rowindex$_ivf_vitrification_Canister" class="form-group ivf_vitrification_Canister">
<input type="<?= $Page->Canister->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Canister" name="x<?= $Page->RowIndex ?>_Canister" id="x<?= $Page->RowIndex ?>_Canister" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Canister->getPlaceHolder()) ?>" value="<?= $Page->Canister->EditValue ?>"<?= $Page->Canister->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Canister->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Canister" data-hidden="1" name="o<?= $Page->RowIndex ?>_Canister" id="o<?= $Page->RowIndex ?>_Canister" value="<?= HtmlEncode($Page->Canister->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Gobiet->Visible) { // Gobiet ?>
        <td data-name="Gobiet">
<span id="el$rowindex$_ivf_vitrification_Gobiet" class="form-group ivf_vitrification_Gobiet">
<input type="<?= $Page->Gobiet->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Gobiet" name="x<?= $Page->RowIndex ?>_Gobiet" id="x<?= $Page->RowIndex ?>_Gobiet" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gobiet->getPlaceHolder()) ?>" value="<?= $Page->Gobiet->EditValue ?>"<?= $Page->Gobiet->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gobiet->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Gobiet" data-hidden="1" name="o<?= $Page->RowIndex ?>_Gobiet" id="o<?= $Page->RowIndex ?>_Gobiet" value="<?= HtmlEncode($Page->Gobiet->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CryolockNo->Visible) { // CryolockNo ?>
        <td data-name="CryolockNo">
<span id="el$rowindex$_ivf_vitrification_CryolockNo" class="form-group ivf_vitrification_CryolockNo">
<input type="<?= $Page->CryolockNo->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x<?= $Page->RowIndex ?>_CryolockNo" id="x<?= $Page->RowIndex ?>_CryolockNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CryolockNo->getPlaceHolder()) ?>" value="<?= $Page->CryolockNo->EditValue ?>"<?= $Page->CryolockNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CryolockNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_CryolockNo" id="o<?= $Page->RowIndex ?>_CryolockNo" value="<?= HtmlEncode($Page->CryolockNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CryolockColour->Visible) { // CryolockColour ?>
        <td data-name="CryolockColour">
<span id="el$rowindex$_ivf_vitrification_CryolockColour" class="form-group ivf_vitrification_CryolockColour">
<input type="<?= $Page->CryolockColour->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x<?= $Page->RowIndex ?>_CryolockColour" id="x<?= $Page->RowIndex ?>_CryolockColour" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CryolockColour->getPlaceHolder()) ?>" value="<?= $Page->CryolockColour->EditValue ?>"<?= $Page->CryolockColour->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CryolockColour->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockColour" data-hidden="1" name="o<?= $Page->RowIndex ?>_CryolockColour" id="o<?= $Page->RowIndex ?>_CryolockColour" value="<?= HtmlEncode($Page->CryolockColour->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Stage->Visible) { // Stage ?>
        <td data-name="Stage">
<span id="el$rowindex$_ivf_vitrification_Stage" class="form-group ivf_vitrification_Stage">
<input type="<?= $Page->Stage->getInputTextType() ?>" data-table="ivf_vitrification" data-field="x_Stage" name="x<?= $Page->RowIndex ?>_Stage" id="x<?= $Page->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>" value="<?= $Page->Stage->EditValue ?>"<?= $Page->Stage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Stage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Stage" id="o<?= $Page->RowIndex ?>_Stage" value="<?= HtmlEncode($Page->Stage->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fivf_vitrificationlist","load"], function() {
    fivf_vitrificationlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("ivf_vitrification");
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
        container: "gmp_ivf_vitrification",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
