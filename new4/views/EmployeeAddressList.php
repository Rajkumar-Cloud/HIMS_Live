<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeAddressList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_addresslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    femployee_addresslist = currentForm = new ew.Form("femployee_addresslist", "list");
    femployee_addresslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_address")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_address)
        ew.vars.tables.employee_address = currentTable;
    femployee_addresslist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee_id", [fields.employee_id.visible && fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["contact_persion", [fields.contact_persion.visible && fields.contact_persion.required ? ew.Validators.required(fields.contact_persion.caption) : null], fields.contact_persion.isInvalid],
        ["street", [fields.street.visible && fields.street.required ? ew.Validators.required(fields.street.caption) : null], fields.street.isInvalid],
        ["town", [fields.town.visible && fields.town.required ? ew.Validators.required(fields.town.caption) : null], fields.town.isInvalid],
        ["province", [fields.province.visible && fields.province.required ? ew.Validators.required(fields.province.caption) : null], fields.province.isInvalid],
        ["postal_code", [fields.postal_code.visible && fields.postal_code.required ? ew.Validators.required(fields.postal_code.caption) : null], fields.postal_code.isInvalid],
        ["address_type", [fields.address_type.visible && fields.address_type.required ? ew.Validators.required(fields.address_type.caption) : null], fields.address_type.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_addresslist,
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
    femployee_addresslist.validate = function () {
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
    femployee_addresslist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "employee_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "contact_persion", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "street", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "town", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "province", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "postal_code", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "address_type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospID", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    femployee_addresslist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_addresslist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_addresslist.lists.address_type = <?= $Page->address_type->toClientList($Page) ?>;
    femployee_addresslist.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("femployee_addresslist");
});
var femployee_addresslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    femployee_addresslistsrch = currentSearchForm = new ew.Form("femployee_addresslistsrch");

    // Dynamic selection lists

    // Filters
    femployee_addresslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("femployee_addresslistsrch");
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
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "employee") {
    if ($Page->MasterRecordExists) {
        include_once "views/EmployeeMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="femployee_addresslistsrch" id="femployee_addresslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="femployee_addresslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_address">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_address">
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
<form name="femployee_addresslist" id="femployee_addresslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_address">
<?php if ($Page->getCurrentMasterTable() == "employee" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->employee_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_employee_address" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_employee_addresslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_employee_address_id" class="employee_address_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <th data-name="employee_id" class="<?= $Page->employee_id->headerCellClass() ?>"><div id="elh_employee_address_employee_id" class="employee_address_employee_id"><?= $Page->renderSort($Page->employee_id) ?></div></th>
<?php } ?>
<?php if ($Page->contact_persion->Visible) { // contact_persion ?>
        <th data-name="contact_persion" class="<?= $Page->contact_persion->headerCellClass() ?>"><div id="elh_employee_address_contact_persion" class="employee_address_contact_persion"><?= $Page->renderSort($Page->contact_persion) ?></div></th>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
        <th data-name="street" class="<?= $Page->street->headerCellClass() ?>"><div id="elh_employee_address_street" class="employee_address_street"><?= $Page->renderSort($Page->street) ?></div></th>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <th data-name="town" class="<?= $Page->town->headerCellClass() ?>"><div id="elh_employee_address_town" class="employee_address_town"><?= $Page->renderSort($Page->town) ?></div></th>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <th data-name="province" class="<?= $Page->province->headerCellClass() ?>"><div id="elh_employee_address_province" class="employee_address_province"><?= $Page->renderSort($Page->province) ?></div></th>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <th data-name="postal_code" class="<?= $Page->postal_code->headerCellClass() ?>"><div id="elh_employee_address_postal_code" class="employee_address_postal_code"><?= $Page->renderSort($Page->postal_code) ?></div></th>
<?php } ?>
<?php if ($Page->address_type->Visible) { // address_type ?>
        <th data-name="address_type" class="<?= $Page->address_type->headerCellClass() ?>"><div id="elh_employee_address_address_type" class="employee_address_address_type"><?= $Page->renderSort($Page->address_type) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_employee_address_status" class="employee_address_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_employee_address_HospID" class="employee_address_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_employee_address", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_employee_address_id" class="form-group"></span>
<input type="hidden" data-table="employee_address" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="employee_address" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id" <?= $Page->employee_id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_employee_address_employee_id" class="form-group">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_employee_address_employee_id" class="form-group">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_address" data-field="x_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" id="x<?= $Page->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_employee_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_employee_id" id="o<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_employee_address_employee_id" class="form-group">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_employee_address_employee_id" class="form-group">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_address" data-field="x_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" id="x<?= $Page->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->contact_persion->Visible) { // contact_persion ?>
        <td data-name="contact_persion" <?= $Page->contact_persion->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_contact_persion" class="form-group">
<input type="<?= $Page->contact_persion->getInputTextType() ?>" data-table="employee_address" data-field="x_contact_persion" name="x<?= $Page->RowIndex ?>_contact_persion" id="x<?= $Page->RowIndex ?>_contact_persion" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->contact_persion->getPlaceHolder()) ?>" value="<?= $Page->contact_persion->EditValue ?>"<?= $Page->contact_persion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->contact_persion->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" data-hidden="1" name="o<?= $Page->RowIndex ?>_contact_persion" id="o<?= $Page->RowIndex ?>_contact_persion" value="<?= HtmlEncode($Page->contact_persion->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_contact_persion" class="form-group">
<input type="<?= $Page->contact_persion->getInputTextType() ?>" data-table="employee_address" data-field="x_contact_persion" name="x<?= $Page->RowIndex ?>_contact_persion" id="x<?= $Page->RowIndex ?>_contact_persion" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->contact_persion->getPlaceHolder()) ?>" value="<?= $Page->contact_persion->EditValue ?>"<?= $Page->contact_persion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->contact_persion->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_contact_persion">
<span<?= $Page->contact_persion->viewAttributes() ?>>
<?= $Page->contact_persion->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->street->Visible) { // street ?>
        <td data-name="street" <?= $Page->street->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_street" class="form-group">
<input type="<?= $Page->street->getInputTextType() ?>" data-table="employee_address" data-field="x_street" name="x<?= $Page->RowIndex ?>_street" id="x<?= $Page->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->street->getPlaceHolder()) ?>" value="<?= $Page->street->EditValue ?>"<?= $Page->street->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->street->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_street" data-hidden="1" name="o<?= $Page->RowIndex ?>_street" id="o<?= $Page->RowIndex ?>_street" value="<?= HtmlEncode($Page->street->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_street" class="form-group">
<input type="<?= $Page->street->getInputTextType() ?>" data-table="employee_address" data-field="x_street" name="x<?= $Page->RowIndex ?>_street" id="x<?= $Page->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->street->getPlaceHolder()) ?>" value="<?= $Page->street->EditValue ?>"<?= $Page->street->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->street->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->town->Visible) { // town ?>
        <td data-name="town" <?= $Page->town->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_town" class="form-group">
<input type="<?= $Page->town->getInputTextType() ?>" data-table="employee_address" data-field="x_town" name="x<?= $Page->RowIndex ?>_town" id="x<?= $Page->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->town->getPlaceHolder()) ?>" value="<?= $Page->town->EditValue ?>"<?= $Page->town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->town->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_town" data-hidden="1" name="o<?= $Page->RowIndex ?>_town" id="o<?= $Page->RowIndex ?>_town" value="<?= HtmlEncode($Page->town->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_town" class="form-group">
<input type="<?= $Page->town->getInputTextType() ?>" data-table="employee_address" data-field="x_town" name="x<?= $Page->RowIndex ?>_town" id="x<?= $Page->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->town->getPlaceHolder()) ?>" value="<?= $Page->town->EditValue ?>"<?= $Page->town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->town->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->province->Visible) { // province ?>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_province" class="form-group">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="employee_address" data-field="x_province" name="x<?= $Page->RowIndex ?>_province" id="x<?= $Page->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_province" data-hidden="1" name="o<?= $Page->RowIndex ?>_province" id="o<?= $Page->RowIndex ?>_province" value="<?= HtmlEncode($Page->province->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_province" class="form-group">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="employee_address" data-field="x_province" name="x<?= $Page->RowIndex ?>_province" id="x<?= $Page->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_postal_code" class="form-group">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="employee_address" data-field="x_postal_code" name="x<?= $Page->RowIndex ?>_postal_code" id="x<?= $Page->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_postal_code" data-hidden="1" name="o<?= $Page->RowIndex ?>_postal_code" id="o<?= $Page->RowIndex ?>_postal_code" value="<?= HtmlEncode($Page->postal_code->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_postal_code" class="form-group">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="employee_address" data-field="x_postal_code" name="x<?= $Page->RowIndex ?>_postal_code" id="x<?= $Page->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->address_type->Visible) { // address_type ?>
        <td data-name="address_type" <?= $Page->address_type->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_address_type" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_address_type"
        name="x<?= $Page->RowIndex ?>_address_type"
        class="form-control ew-select<?= $Page->address_type->isInvalidClass() ?>"
        data-select2-id="employee_address_x<?= $Page->RowIndex ?>_address_type"
        data-table="employee_address"
        data-field="x_address_type"
        data-value-separator="<?= $Page->address_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->address_type->getPlaceHolder()) ?>"
        <?= $Page->address_type->editAttributes() ?>>
        <?= $Page->address_type->selectOptionListHtml("x{$Page->RowIndex}_address_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_address_type") && !$Page->address_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_address_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->address_type->caption() ?>" data-title="<?= $Page->address_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_address_type',url:'<?= GetUrl("SysAddressTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->address_type->getErrorMessage() ?></div>
<?= $Page->address_type->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_address_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_address_x<?= $Page->RowIndex ?>_address_type']"),
        options = { name: "x<?= $Page->RowIndex ?>_address_type", selectId: "employee_address_x<?= $Page->RowIndex ?>_address_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_address.fields.address_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_address" data-field="x_address_type" data-hidden="1" name="o<?= $Page->RowIndex ?>_address_type" id="o<?= $Page->RowIndex ?>_address_type" value="<?= HtmlEncode($Page->address_type->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_address_type" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_address_type"
        name="x<?= $Page->RowIndex ?>_address_type"
        class="form-control ew-select<?= $Page->address_type->isInvalidClass() ?>"
        data-select2-id="employee_address_x<?= $Page->RowIndex ?>_address_type"
        data-table="employee_address"
        data-field="x_address_type"
        data-value-separator="<?= $Page->address_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->address_type->getPlaceHolder()) ?>"
        <?= $Page->address_type->editAttributes() ?>>
        <?= $Page->address_type->selectOptionListHtml("x{$Page->RowIndex}_address_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_address_type") && !$Page->address_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_address_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->address_type->caption() ?>" data-title="<?= $Page->address_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_address_type',url:'<?= GetUrl("SysAddressTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->address_type->getErrorMessage() ?></div>
<?= $Page->address_type->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_address_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_address_x<?= $Page->RowIndex ?>_address_type']"),
        options = { name: "x<?= $Page->RowIndex ?>_address_type", selectId: "employee_address_x<?= $Page->RowIndex ?>_address_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_address.fields.address_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_address_type">
<span<?= $Page->address_type->viewAttributes() ?>>
<?= $Page->address_type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_status" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_status"
        name="x<?= $Page->RowIndex ?>_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_address_x<?= $Page->RowIndex ?>_status"
        data-table="employee_address"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x{$Page->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_address_x<?= $Page->RowIndex ?>_status']"),
        options = { name: "x<?= $Page->RowIndex ?>_status", selectId: "employee_address_x<?= $Page->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_address.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_address" data-field="x_status" data-hidden="1" name="o<?= $Page->RowIndex ?>_status" id="o<?= $Page->RowIndex ?>_status" value="<?= HtmlEncode($Page->status->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_status" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_status"
        name="x<?= $Page->RowIndex ?>_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_address_x<?= $Page->RowIndex ?>_status"
        data-table="employee_address"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x{$Page->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_address_x<?= $Page->RowIndex ?>_status']"),
        options = { name: "x<?= $Page->RowIndex ?>_status", selectId: "employee_address_x<?= $Page->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_address.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_HospID" class="form-group">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_address" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_HospID" class="form-group">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_address" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_address_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
loadjs.ready(["femployee_addresslist","load"], function () {
    femployee_addresslist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_employee_address", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_employee_address_id" class="form-group employee_address_id"></span>
<input type="hidden" data-table="employee_address" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id">
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_address_employee_id" class="form-group employee_address_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_employee_address_employee_id" class="form-group employee_address_employee_id">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_address" data-field="x_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" id="x<?= $Page->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_employee_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_employee_id" id="o<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->contact_persion->Visible) { // contact_persion ?>
        <td data-name="contact_persion">
<span id="el$rowindex$_employee_address_contact_persion" class="form-group employee_address_contact_persion">
<input type="<?= $Page->contact_persion->getInputTextType() ?>" data-table="employee_address" data-field="x_contact_persion" name="x<?= $Page->RowIndex ?>_contact_persion" id="x<?= $Page->RowIndex ?>_contact_persion" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->contact_persion->getPlaceHolder()) ?>" value="<?= $Page->contact_persion->EditValue ?>"<?= $Page->contact_persion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->contact_persion->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" data-hidden="1" name="o<?= $Page->RowIndex ?>_contact_persion" id="o<?= $Page->RowIndex ?>_contact_persion" value="<?= HtmlEncode($Page->contact_persion->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->street->Visible) { // street ?>
        <td data-name="street">
<span id="el$rowindex$_employee_address_street" class="form-group employee_address_street">
<input type="<?= $Page->street->getInputTextType() ?>" data-table="employee_address" data-field="x_street" name="x<?= $Page->RowIndex ?>_street" id="x<?= $Page->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->street->getPlaceHolder()) ?>" value="<?= $Page->street->EditValue ?>"<?= $Page->street->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->street->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_street" data-hidden="1" name="o<?= $Page->RowIndex ?>_street" id="o<?= $Page->RowIndex ?>_street" value="<?= HtmlEncode($Page->street->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->town->Visible) { // town ?>
        <td data-name="town">
<span id="el$rowindex$_employee_address_town" class="form-group employee_address_town">
<input type="<?= $Page->town->getInputTextType() ?>" data-table="employee_address" data-field="x_town" name="x<?= $Page->RowIndex ?>_town" id="x<?= $Page->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->town->getPlaceHolder()) ?>" value="<?= $Page->town->EditValue ?>"<?= $Page->town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->town->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_town" data-hidden="1" name="o<?= $Page->RowIndex ?>_town" id="o<?= $Page->RowIndex ?>_town" value="<?= HtmlEncode($Page->town->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->province->Visible) { // province ?>
        <td data-name="province">
<span id="el$rowindex$_employee_address_province" class="form-group employee_address_province">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="employee_address" data-field="x_province" name="x<?= $Page->RowIndex ?>_province" id="x<?= $Page->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_province" data-hidden="1" name="o<?= $Page->RowIndex ?>_province" id="o<?= $Page->RowIndex ?>_province" value="<?= HtmlEncode($Page->province->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td data-name="postal_code">
<span id="el$rowindex$_employee_address_postal_code" class="form-group employee_address_postal_code">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="employee_address" data-field="x_postal_code" name="x<?= $Page->RowIndex ?>_postal_code" id="x<?= $Page->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_postal_code" data-hidden="1" name="o<?= $Page->RowIndex ?>_postal_code" id="o<?= $Page->RowIndex ?>_postal_code" value="<?= HtmlEncode($Page->postal_code->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->address_type->Visible) { // address_type ?>
        <td data-name="address_type">
<span id="el$rowindex$_employee_address_address_type" class="form-group employee_address_address_type">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_address_type"
        name="x<?= $Page->RowIndex ?>_address_type"
        class="form-control ew-select<?= $Page->address_type->isInvalidClass() ?>"
        data-select2-id="employee_address_x<?= $Page->RowIndex ?>_address_type"
        data-table="employee_address"
        data-field="x_address_type"
        data-value-separator="<?= $Page->address_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->address_type->getPlaceHolder()) ?>"
        <?= $Page->address_type->editAttributes() ?>>
        <?= $Page->address_type->selectOptionListHtml("x{$Page->RowIndex}_address_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_address_type") && !$Page->address_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_address_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->address_type->caption() ?>" data-title="<?= $Page->address_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_address_type',url:'<?= GetUrl("SysAddressTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->address_type->getErrorMessage() ?></div>
<?= $Page->address_type->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_address_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_address_x<?= $Page->RowIndex ?>_address_type']"),
        options = { name: "x<?= $Page->RowIndex ?>_address_type", selectId: "employee_address_x<?= $Page->RowIndex ?>_address_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_address.fields.address_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_address" data-field="x_address_type" data-hidden="1" name="o<?= $Page->RowIndex ?>_address_type" id="o<?= $Page->RowIndex ?>_address_type" value="<?= HtmlEncode($Page->address_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status">
<span id="el$rowindex$_employee_address_status" class="form-group employee_address_status">
    <select
        id="x<?= $Page->RowIndex ?>_status"
        name="x<?= $Page->RowIndex ?>_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_address_x<?= $Page->RowIndex ?>_status"
        data-table="employee_address"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x{$Page->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_address_x<?= $Page->RowIndex ?>_status']"),
        options = { name: "x<?= $Page->RowIndex ?>_status", selectId: "employee_address_x<?= $Page->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_address.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_address" data-field="x_status" data-hidden="1" name="o<?= $Page->RowIndex ?>_status" id="o<?= $Page->RowIndex ?>_status" value="<?= HtmlEncode($Page->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<span id="el$rowindex$_employee_address_HospID" class="form-group employee_address_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_address" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["femployee_addresslist","load"], function() {
    femployee_addresslist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("employee_address");
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
        container: "gmp_employee_address",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
