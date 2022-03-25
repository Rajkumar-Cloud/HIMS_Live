<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfDonorsemendetailsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_donorsemendetailslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_donorsemendetailslist = currentForm = new ew.Form("fivf_donorsemendetailslist", "list");
    fivf_donorsemendetailslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_donorsemendetails")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_donorsemendetails)
        ew.vars.tables.ivf_donorsemendetails = currentTable;
    fivf_donorsemendetailslist.addFields([
        ["DonorNo", [fields.DonorNo.visible && fields.DonorNo.required ? ew.Validators.required(fields.DonorNo.caption) : null], fields.DonorNo.isInvalid],
        ["BatchNo", [fields.BatchNo.visible && fields.BatchNo.required ? ew.Validators.required(fields.BatchNo.caption) : null], fields.BatchNo.isInvalid],
        ["BloodGroup", [fields.BloodGroup.visible && fields.BloodGroup.required ? ew.Validators.required(fields.BloodGroup.caption) : null], fields.BloodGroup.isInvalid],
        ["Height", [fields.Height.visible && fields.Height.required ? ew.Validators.required(fields.Height.caption) : null], fields.Height.isInvalid],
        ["SkinColor", [fields.SkinColor.visible && fields.SkinColor.required ? ew.Validators.required(fields.SkinColor.caption) : null], fields.SkinColor.isInvalid],
        ["EyeColor", [fields.EyeColor.visible && fields.EyeColor.required ? ew.Validators.required(fields.EyeColor.caption) : null], fields.EyeColor.isInvalid],
        ["HairColor", [fields.HairColor.visible && fields.HairColor.required ? ew.Validators.required(fields.HairColor.caption) : null], fields.HairColor.isInvalid],
        ["NoOfVials", [fields.NoOfVials.visible && fields.NoOfVials.required ? ew.Validators.required(fields.NoOfVials.caption) : null], fields.NoOfVials.isInvalid],
        ["Tank", [fields.Tank.visible && fields.Tank.required ? ew.Validators.required(fields.Tank.caption) : null], fields.Tank.isInvalid],
        ["Canister", [fields.Canister.visible && fields.Canister.required ? ew.Validators.required(fields.Canister.caption) : null], fields.Canister.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_donorsemendetailslist,
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
    fivf_donorsemendetailslist.validate = function () {
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
    fivf_donorsemendetailslist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "DonorNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BatchNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BloodGroup", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Height", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SkinColor", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EyeColor", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HairColor", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NoOfVials", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Tank", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Canister", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Remarks", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fivf_donorsemendetailslist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_donorsemendetailslist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_donorsemendetailslist.lists.BloodGroup = <?= $Page->BloodGroup->toClientList($Page) ?>;
    fivf_donorsemendetailslist.lists.SkinColor = <?= $Page->SkinColor->toClientList($Page) ?>;
    fivf_donorsemendetailslist.lists.EyeColor = <?= $Page->EyeColor->toClientList($Page) ?>;
    fivf_donorsemendetailslist.lists.HairColor = <?= $Page->HairColor->toClientList($Page) ?>;
    loadjs.done("fivf_donorsemendetailslist");
});
var fivf_donorsemendetailslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_donorsemendetailslistsrch = currentSearchForm = new ew.Form("fivf_donorsemendetailslistsrch");

    // Dynamic selection lists

    // Filters
    fivf_donorsemendetailslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_donorsemendetailslistsrch");
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
    // Client script
    // Write your client script here, no need to add script tags.
    </script>
    <?php
    $dbhelper = &DbHelper();
    $sql = "SELECT * FROM ganeshkumar_bjhims.ivf_agency;";
    $results = $dbhelper->ExecuteRows($sql);
    $AgencyName = '<div class="row"><div class="col-sm-4"><div class="form-group"><label>Agency   :  </label><select class="form-control">';
    $length = count($results);
    for ($i = 0; $i < $length; $i++) {
       $AgencyName .=  '<option>'. $results[$i]["Name"]. '</option>';
    }
       $AgencyName .= '</select></div></div>';
    	 $AgencyName .=  '  <div class="col-sm-4">          <div class="form-group row"><label for="inputEmail3" class="col-sm-2 col-form-label">Received By</label><div class="col-sm-10"><input type="email" class="form-control" id="inputEmail3" placeholder="Received By"></div></div>          </div>';
    	 $AgencyName .='<div class="col-sm-4"><div class="form-group row"><label>Date :</label><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div><input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false"></div> </div></div></div>';
    ?>
    <script>
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
<form name="fivf_donorsemendetailslistsrch" id="fivf_donorsemendetailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fivf_donorsemendetailslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_donorsemendetails">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_donorsemendetails">
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
<form name="fivf_donorsemendetailslist" id="fivf_donorsemendetailslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_donorsemendetails">
<div id="gmp_ivf_donorsemendetails" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_donorsemendetailslist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->DonorNo->Visible) { // DonorNo ?>
        <th data-name="DonorNo" class="<?= $Page->DonorNo->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_DonorNo" class="ivf_donorsemendetails_DonorNo"><?= $Page->renderSort($Page->DonorNo) ?></div></th>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <th data-name="BatchNo" class="<?= $Page->BatchNo->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_BatchNo" class="ivf_donorsemendetails_BatchNo"><?= $Page->renderSort($Page->BatchNo) ?></div></th>
<?php } ?>
<?php if ($Page->BloodGroup->Visible) { // BloodGroup ?>
        <th data-name="BloodGroup" class="<?= $Page->BloodGroup->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_BloodGroup" class="ivf_donorsemendetails_BloodGroup"><?= $Page->renderSort($Page->BloodGroup) ?></div></th>
<?php } ?>
<?php if ($Page->Height->Visible) { // Height ?>
        <th data-name="Height" class="<?= $Page->Height->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_Height" class="ivf_donorsemendetails_Height"><?= $Page->renderSort($Page->Height) ?></div></th>
<?php } ?>
<?php if ($Page->SkinColor->Visible) { // SkinColor ?>
        <th data-name="SkinColor" class="<?= $Page->SkinColor->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_SkinColor" class="ivf_donorsemendetails_SkinColor"><?= $Page->renderSort($Page->SkinColor) ?></div></th>
<?php } ?>
<?php if ($Page->EyeColor->Visible) { // EyeColor ?>
        <th data-name="EyeColor" class="<?= $Page->EyeColor->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_EyeColor" class="ivf_donorsemendetails_EyeColor"><?= $Page->renderSort($Page->EyeColor) ?></div></th>
<?php } ?>
<?php if ($Page->HairColor->Visible) { // HairColor ?>
        <th data-name="HairColor" class="<?= $Page->HairColor->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_HairColor" class="ivf_donorsemendetails_HairColor"><?= $Page->renderSort($Page->HairColor) ?></div></th>
<?php } ?>
<?php if ($Page->NoOfVials->Visible) { // NoOfVials ?>
        <th data-name="NoOfVials" class="<?= $Page->NoOfVials->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_NoOfVials" class="ivf_donorsemendetails_NoOfVials"><?= $Page->renderSort($Page->NoOfVials) ?></div></th>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
        <th data-name="Tank" class="<?= $Page->Tank->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_Tank" class="ivf_donorsemendetails_Tank"><?= $Page->renderSort($Page->Tank) ?></div></th>
<?php } ?>
<?php if ($Page->Canister->Visible) { // Canister ?>
        <th data-name="Canister" class="<?= $Page->Canister->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_Canister" class="ivf_donorsemendetails_Canister"><?= $Page->renderSort($Page->Canister) ?></div></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th data-name="Remarks" class="<?= $Page->Remarks->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_Remarks" class="ivf_donorsemendetails_Remarks"><?= $Page->renderSort($Page->Remarks) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_donorsemendetails", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->DonorNo->Visible) { // DonorNo ?>
        <td data-name="DonorNo" <?= $Page->DonorNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_DonorNo" class="form-group">
<input type="<?= $Page->DonorNo->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_DonorNo" name="x<?= $Page->RowIndex ?>_DonorNo" id="x<?= $Page->RowIndex ?>_DonorNo" size="8" maxlength="45" placeholder="<?= HtmlEncode($Page->DonorNo->getPlaceHolder()) ?>" value="<?= $Page->DonorNo->EditValue ?>"<?= $Page->DonorNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DonorNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_DonorNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_DonorNo" id="o<?= $Page->RowIndex ?>_DonorNo" value="<?= HtmlEncode($Page->DonorNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_DonorNo" class="form-group">
<input type="<?= $Page->DonorNo->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_DonorNo" name="x<?= $Page->RowIndex ?>_DonorNo" id="x<?= $Page->RowIndex ?>_DonorNo" size="8" maxlength="45" placeholder="<?= HtmlEncode($Page->DonorNo->getPlaceHolder()) ?>" value="<?= $Page->DonorNo->EditValue ?>"<?= $Page->DonorNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DonorNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_DonorNo">
<span<?= $Page->DonorNo->viewAttributes() ?>>
<?= $Page->DonorNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" <?= $Page->BatchNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_BatchNo" class="form-group">
<input type="<?= $Page->BatchNo->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_BatchNo" name="x<?= $Page->RowIndex ?>_BatchNo" id="x<?= $Page->RowIndex ?>_BatchNo" size="6" maxlength="50" placeholder="<?= HtmlEncode($Page->BatchNo->getPlaceHolder()) ?>" value="<?= $Page->BatchNo->EditValue ?>"<?= $Page->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BatchNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_BatchNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_BatchNo" id="o<?= $Page->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Page->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_BatchNo" class="form-group">
<input type="<?= $Page->BatchNo->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_BatchNo" name="x<?= $Page->RowIndex ?>_BatchNo" id="x<?= $Page->RowIndex ?>_BatchNo" size="6" maxlength="50" placeholder="<?= HtmlEncode($Page->BatchNo->getPlaceHolder()) ?>" value="<?= $Page->BatchNo->EditValue ?>"<?= $Page->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BatchNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_BatchNo">
<span<?= $Page->BatchNo->viewAttributes() ?>>
<?= $Page->BatchNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BloodGroup->Visible) { // BloodGroup ?>
        <td data-name="BloodGroup" <?= $Page->BloodGroup->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_BloodGroup" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_BloodGroup"
        name="x<?= $Page->RowIndex ?>_BloodGroup"
        class="form-control ew-select<?= $Page->BloodGroup->isInvalidClass() ?>"
        data-select2-id="ivf_donorsemendetails_x<?= $Page->RowIndex ?>_BloodGroup"
        data-table="ivf_donorsemendetails"
        data-field="x_BloodGroup"
        data-value-separator="<?= $Page->BloodGroup->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->BloodGroup->getPlaceHolder()) ?>"
        <?= $Page->BloodGroup->editAttributes() ?>>
        <?= $Page->BloodGroup->selectOptionListHtml("x{$Page->RowIndex}_BloodGroup") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->BloodGroup->getErrorMessage() ?></div>
<?= $Page->BloodGroup->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_BloodGroup") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_donorsemendetails_x<?= $Page->RowIndex ?>_BloodGroup']"),
        options = { name: "x<?= $Page->RowIndex ?>_BloodGroup", selectId: "ivf_donorsemendetails_x<?= $Page->RowIndex ?>_BloodGroup", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_donorsemendetails.fields.BloodGroup.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_BloodGroup" data-hidden="1" name="o<?= $Page->RowIndex ?>_BloodGroup" id="o<?= $Page->RowIndex ?>_BloodGroup" value="<?= HtmlEncode($Page->BloodGroup->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_BloodGroup" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_BloodGroup"
        name="x<?= $Page->RowIndex ?>_BloodGroup"
        class="form-control ew-select<?= $Page->BloodGroup->isInvalidClass() ?>"
        data-select2-id="ivf_donorsemendetails_x<?= $Page->RowIndex ?>_BloodGroup"
        data-table="ivf_donorsemendetails"
        data-field="x_BloodGroup"
        data-value-separator="<?= $Page->BloodGroup->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->BloodGroup->getPlaceHolder()) ?>"
        <?= $Page->BloodGroup->editAttributes() ?>>
        <?= $Page->BloodGroup->selectOptionListHtml("x{$Page->RowIndex}_BloodGroup") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->BloodGroup->getErrorMessage() ?></div>
<?= $Page->BloodGroup->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_BloodGroup") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_donorsemendetails_x<?= $Page->RowIndex ?>_BloodGroup']"),
        options = { name: "x<?= $Page->RowIndex ?>_BloodGroup", selectId: "ivf_donorsemendetails_x<?= $Page->RowIndex ?>_BloodGroup", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_donorsemendetails.fields.BloodGroup.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_BloodGroup">
<span<?= $Page->BloodGroup->viewAttributes() ?>>
<?= $Page->BloodGroup->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Height->Visible) { // Height ?>
        <td data-name="Height" <?= $Page->Height->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Height" class="form-group">
<input type="<?= $Page->Height->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Height" name="x<?= $Page->RowIndex ?>_Height" id="x<?= $Page->RowIndex ?>_Height" size="4" maxlength="50" placeholder="<?= HtmlEncode($Page->Height->getPlaceHolder()) ?>" value="<?= $Page->Height->EditValue ?>"<?= $Page->Height->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Height->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Height" data-hidden="1" name="o<?= $Page->RowIndex ?>_Height" id="o<?= $Page->RowIndex ?>_Height" value="<?= HtmlEncode($Page->Height->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Height" class="form-group">
<input type="<?= $Page->Height->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Height" name="x<?= $Page->RowIndex ?>_Height" id="x<?= $Page->RowIndex ?>_Height" size="4" maxlength="50" placeholder="<?= HtmlEncode($Page->Height->getPlaceHolder()) ?>" value="<?= $Page->Height->EditValue ?>"<?= $Page->Height->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Height->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Height">
<span<?= $Page->Height->viewAttributes() ?>>
<?= $Page->Height->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SkinColor->Visible) { // SkinColor ?>
        <td data-name="SkinColor" <?= $Page->SkinColor->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_SkinColor" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_SkinColor"
        name="x<?= $Page->RowIndex ?>_SkinColor"
        class="form-control ew-select<?= $Page->SkinColor->isInvalidClass() ?>"
        data-select2-id="ivf_donorsemendetails_x<?= $Page->RowIndex ?>_SkinColor"
        data-table="ivf_donorsemendetails"
        data-field="x_SkinColor"
        data-value-separator="<?= $Page->SkinColor->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SkinColor->getPlaceHolder()) ?>"
        <?= $Page->SkinColor->editAttributes() ?>>
        <?= $Page->SkinColor->selectOptionListHtml("x{$Page->RowIndex}_SkinColor") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->SkinColor->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_donorsemendetails_x<?= $Page->RowIndex ?>_SkinColor']"),
        options = { name: "x<?= $Page->RowIndex ?>_SkinColor", selectId: "ivf_donorsemendetails_x<?= $Page->RowIndex ?>_SkinColor", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_donorsemendetails.fields.SkinColor.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_donorsemendetails.fields.SkinColor.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_SkinColor" data-hidden="1" name="o<?= $Page->RowIndex ?>_SkinColor" id="o<?= $Page->RowIndex ?>_SkinColor" value="<?= HtmlEncode($Page->SkinColor->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_SkinColor" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_SkinColor"
        name="x<?= $Page->RowIndex ?>_SkinColor"
        class="form-control ew-select<?= $Page->SkinColor->isInvalidClass() ?>"
        data-select2-id="ivf_donorsemendetails_x<?= $Page->RowIndex ?>_SkinColor"
        data-table="ivf_donorsemendetails"
        data-field="x_SkinColor"
        data-value-separator="<?= $Page->SkinColor->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SkinColor->getPlaceHolder()) ?>"
        <?= $Page->SkinColor->editAttributes() ?>>
        <?= $Page->SkinColor->selectOptionListHtml("x{$Page->RowIndex}_SkinColor") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->SkinColor->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_donorsemendetails_x<?= $Page->RowIndex ?>_SkinColor']"),
        options = { name: "x<?= $Page->RowIndex ?>_SkinColor", selectId: "ivf_donorsemendetails_x<?= $Page->RowIndex ?>_SkinColor", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_donorsemendetails.fields.SkinColor.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_donorsemendetails.fields.SkinColor.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_SkinColor">
<span<?= $Page->SkinColor->viewAttributes() ?>>
<?= $Page->SkinColor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EyeColor->Visible) { // EyeColor ?>
        <td data-name="EyeColor" <?= $Page->EyeColor->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_EyeColor" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_EyeColor"
        name="x<?= $Page->RowIndex ?>_EyeColor"
        class="form-control ew-select<?= $Page->EyeColor->isInvalidClass() ?>"
        data-select2-id="ivf_donorsemendetails_x<?= $Page->RowIndex ?>_EyeColor"
        data-table="ivf_donorsemendetails"
        data-field="x_EyeColor"
        data-value-separator="<?= $Page->EyeColor->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EyeColor->getPlaceHolder()) ?>"
        <?= $Page->EyeColor->editAttributes() ?>>
        <?= $Page->EyeColor->selectOptionListHtml("x{$Page->RowIndex}_EyeColor") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EyeColor->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_donorsemendetails_x<?= $Page->RowIndex ?>_EyeColor']"),
        options = { name: "x<?= $Page->RowIndex ?>_EyeColor", selectId: "ivf_donorsemendetails_x<?= $Page->RowIndex ?>_EyeColor", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_donorsemendetails.fields.EyeColor.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_donorsemendetails.fields.EyeColor.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_EyeColor" data-hidden="1" name="o<?= $Page->RowIndex ?>_EyeColor" id="o<?= $Page->RowIndex ?>_EyeColor" value="<?= HtmlEncode($Page->EyeColor->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_EyeColor" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_EyeColor"
        name="x<?= $Page->RowIndex ?>_EyeColor"
        class="form-control ew-select<?= $Page->EyeColor->isInvalidClass() ?>"
        data-select2-id="ivf_donorsemendetails_x<?= $Page->RowIndex ?>_EyeColor"
        data-table="ivf_donorsemendetails"
        data-field="x_EyeColor"
        data-value-separator="<?= $Page->EyeColor->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EyeColor->getPlaceHolder()) ?>"
        <?= $Page->EyeColor->editAttributes() ?>>
        <?= $Page->EyeColor->selectOptionListHtml("x{$Page->RowIndex}_EyeColor") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EyeColor->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_donorsemendetails_x<?= $Page->RowIndex ?>_EyeColor']"),
        options = { name: "x<?= $Page->RowIndex ?>_EyeColor", selectId: "ivf_donorsemendetails_x<?= $Page->RowIndex ?>_EyeColor", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_donorsemendetails.fields.EyeColor.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_donorsemendetails.fields.EyeColor.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_EyeColor">
<span<?= $Page->EyeColor->viewAttributes() ?>>
<?= $Page->EyeColor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HairColor->Visible) { // HairColor ?>
        <td data-name="HairColor" <?= $Page->HairColor->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_HairColor" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_HairColor"
        name="x<?= $Page->RowIndex ?>_HairColor"
        class="form-control ew-select<?= $Page->HairColor->isInvalidClass() ?>"
        data-select2-id="ivf_donorsemendetails_x<?= $Page->RowIndex ?>_HairColor"
        data-table="ivf_donorsemendetails"
        data-field="x_HairColor"
        data-value-separator="<?= $Page->HairColor->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HairColor->getPlaceHolder()) ?>"
        <?= $Page->HairColor->editAttributes() ?>>
        <?= $Page->HairColor->selectOptionListHtml("x{$Page->RowIndex}_HairColor") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->HairColor->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_donorsemendetails_x<?= $Page->RowIndex ?>_HairColor']"),
        options = { name: "x<?= $Page->RowIndex ?>_HairColor", selectId: "ivf_donorsemendetails_x<?= $Page->RowIndex ?>_HairColor", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_donorsemendetails.fields.HairColor.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_donorsemendetails.fields.HairColor.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_HairColor" data-hidden="1" name="o<?= $Page->RowIndex ?>_HairColor" id="o<?= $Page->RowIndex ?>_HairColor" value="<?= HtmlEncode($Page->HairColor->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_HairColor" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_HairColor"
        name="x<?= $Page->RowIndex ?>_HairColor"
        class="form-control ew-select<?= $Page->HairColor->isInvalidClass() ?>"
        data-select2-id="ivf_donorsemendetails_x<?= $Page->RowIndex ?>_HairColor"
        data-table="ivf_donorsemendetails"
        data-field="x_HairColor"
        data-value-separator="<?= $Page->HairColor->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HairColor->getPlaceHolder()) ?>"
        <?= $Page->HairColor->editAttributes() ?>>
        <?= $Page->HairColor->selectOptionListHtml("x{$Page->RowIndex}_HairColor") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->HairColor->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_donorsemendetails_x<?= $Page->RowIndex ?>_HairColor']"),
        options = { name: "x<?= $Page->RowIndex ?>_HairColor", selectId: "ivf_donorsemendetails_x<?= $Page->RowIndex ?>_HairColor", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_donorsemendetails.fields.HairColor.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_donorsemendetails.fields.HairColor.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_HairColor">
<span<?= $Page->HairColor->viewAttributes() ?>>
<?= $Page->HairColor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->NoOfVials->Visible) { // NoOfVials ?>
        <td data-name="NoOfVials" <?= $Page->NoOfVials->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_NoOfVials" class="form-group">
<input type="<?= $Page->NoOfVials->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_NoOfVials" name="x<?= $Page->RowIndex ?>_NoOfVials" id="x<?= $Page->RowIndex ?>_NoOfVials" size="2" maxlength="50" placeholder="<?= HtmlEncode($Page->NoOfVials->getPlaceHolder()) ?>" value="<?= $Page->NoOfVials->EditValue ?>"<?= $Page->NoOfVials->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoOfVials->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_NoOfVials" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoOfVials" id="o<?= $Page->RowIndex ?>_NoOfVials" value="<?= HtmlEncode($Page->NoOfVials->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_NoOfVials" class="form-group">
<input type="<?= $Page->NoOfVials->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_NoOfVials" name="x<?= $Page->RowIndex ?>_NoOfVials" id="x<?= $Page->RowIndex ?>_NoOfVials" size="2" maxlength="50" placeholder="<?= HtmlEncode($Page->NoOfVials->getPlaceHolder()) ?>" value="<?= $Page->NoOfVials->EditValue ?>"<?= $Page->NoOfVials->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoOfVials->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_NoOfVials">
<span<?= $Page->NoOfVials->viewAttributes() ?>>
<?= $Page->NoOfVials->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Tank->Visible) { // Tank ?>
        <td data-name="Tank" <?= $Page->Tank->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Tank" class="form-group">
<input type="<?= $Page->Tank->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Tank" name="x<?= $Page->RowIndex ?>_Tank" id="x<?= $Page->RowIndex ?>_Tank" size="4" maxlength="50" placeholder="<?= HtmlEncode($Page->Tank->getPlaceHolder()) ?>" value="<?= $Page->Tank->EditValue ?>"<?= $Page->Tank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Tank->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Tank" data-hidden="1" name="o<?= $Page->RowIndex ?>_Tank" id="o<?= $Page->RowIndex ?>_Tank" value="<?= HtmlEncode($Page->Tank->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Tank" class="form-group">
<input type="<?= $Page->Tank->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Tank" name="x<?= $Page->RowIndex ?>_Tank" id="x<?= $Page->RowIndex ?>_Tank" size="4" maxlength="50" placeholder="<?= HtmlEncode($Page->Tank->getPlaceHolder()) ?>" value="<?= $Page->Tank->EditValue ?>"<?= $Page->Tank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Tank->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Tank">
<span<?= $Page->Tank->viewAttributes() ?>>
<?= $Page->Tank->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Canister->Visible) { // Canister ?>
        <td data-name="Canister" <?= $Page->Canister->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Canister" class="form-group">
<input type="<?= $Page->Canister->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Canister" name="x<?= $Page->RowIndex ?>_Canister" id="x<?= $Page->RowIndex ?>_Canister" size="8" maxlength="50" placeholder="<?= HtmlEncode($Page->Canister->getPlaceHolder()) ?>" value="<?= $Page->Canister->EditValue ?>"<?= $Page->Canister->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Canister->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Canister" data-hidden="1" name="o<?= $Page->RowIndex ?>_Canister" id="o<?= $Page->RowIndex ?>_Canister" value="<?= HtmlEncode($Page->Canister->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Canister" class="form-group">
<input type="<?= $Page->Canister->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Canister" name="x<?= $Page->RowIndex ?>_Canister" id="x<?= $Page->RowIndex ?>_Canister" size="8" maxlength="50" placeholder="<?= HtmlEncode($Page->Canister->getPlaceHolder()) ?>" value="<?= $Page->Canister->EditValue ?>"<?= $Page->Canister->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Canister->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Canister">
<span<?= $Page->Canister->viewAttributes() ?>>
<?= $Page->Canister->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Remarks" class="form-group">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Remarks" name="x<?= $Page->RowIndex ?>_Remarks" id="x<?= $Page->RowIndex ?>_Remarks" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Remarks" data-hidden="1" name="o<?= $Page->RowIndex ?>_Remarks" id="o<?= $Page->RowIndex ?>_Remarks" value="<?= HtmlEncode($Page->Remarks->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Remarks" class="form-group">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Remarks" name="x<?= $Page->RowIndex ?>_Remarks" id="x<?= $Page->RowIndex ?>_Remarks" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
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
loadjs.ready(["fivf_donorsemendetailslist","load"], function () {
    fivf_donorsemendetailslist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_ivf_donorsemendetails", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->DonorNo->Visible) { // DonorNo ?>
        <td data-name="DonorNo">
<span id="el$rowindex$_ivf_donorsemendetails_DonorNo" class="form-group ivf_donorsemendetails_DonorNo">
<input type="<?= $Page->DonorNo->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_DonorNo" name="x<?= $Page->RowIndex ?>_DonorNo" id="x<?= $Page->RowIndex ?>_DonorNo" size="8" maxlength="45" placeholder="<?= HtmlEncode($Page->DonorNo->getPlaceHolder()) ?>" value="<?= $Page->DonorNo->EditValue ?>"<?= $Page->DonorNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DonorNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_DonorNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_DonorNo" id="o<?= $Page->RowIndex ?>_DonorNo" value="<?= HtmlEncode($Page->DonorNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo">
<span id="el$rowindex$_ivf_donorsemendetails_BatchNo" class="form-group ivf_donorsemendetails_BatchNo">
<input type="<?= $Page->BatchNo->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_BatchNo" name="x<?= $Page->RowIndex ?>_BatchNo" id="x<?= $Page->RowIndex ?>_BatchNo" size="6" maxlength="50" placeholder="<?= HtmlEncode($Page->BatchNo->getPlaceHolder()) ?>" value="<?= $Page->BatchNo->EditValue ?>"<?= $Page->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BatchNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_BatchNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_BatchNo" id="o<?= $Page->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Page->BatchNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BloodGroup->Visible) { // BloodGroup ?>
        <td data-name="BloodGroup">
<span id="el$rowindex$_ivf_donorsemendetails_BloodGroup" class="form-group ivf_donorsemendetails_BloodGroup">
    <select
        id="x<?= $Page->RowIndex ?>_BloodGroup"
        name="x<?= $Page->RowIndex ?>_BloodGroup"
        class="form-control ew-select<?= $Page->BloodGroup->isInvalidClass() ?>"
        data-select2-id="ivf_donorsemendetails_x<?= $Page->RowIndex ?>_BloodGroup"
        data-table="ivf_donorsemendetails"
        data-field="x_BloodGroup"
        data-value-separator="<?= $Page->BloodGroup->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->BloodGroup->getPlaceHolder()) ?>"
        <?= $Page->BloodGroup->editAttributes() ?>>
        <?= $Page->BloodGroup->selectOptionListHtml("x{$Page->RowIndex}_BloodGroup") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->BloodGroup->getErrorMessage() ?></div>
<?= $Page->BloodGroup->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_BloodGroup") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_donorsemendetails_x<?= $Page->RowIndex ?>_BloodGroup']"),
        options = { name: "x<?= $Page->RowIndex ?>_BloodGroup", selectId: "ivf_donorsemendetails_x<?= $Page->RowIndex ?>_BloodGroup", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_donorsemendetails.fields.BloodGroup.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_BloodGroup" data-hidden="1" name="o<?= $Page->RowIndex ?>_BloodGroup" id="o<?= $Page->RowIndex ?>_BloodGroup" value="<?= HtmlEncode($Page->BloodGroup->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Height->Visible) { // Height ?>
        <td data-name="Height">
<span id="el$rowindex$_ivf_donorsemendetails_Height" class="form-group ivf_donorsemendetails_Height">
<input type="<?= $Page->Height->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Height" name="x<?= $Page->RowIndex ?>_Height" id="x<?= $Page->RowIndex ?>_Height" size="4" maxlength="50" placeholder="<?= HtmlEncode($Page->Height->getPlaceHolder()) ?>" value="<?= $Page->Height->EditValue ?>"<?= $Page->Height->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Height->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Height" data-hidden="1" name="o<?= $Page->RowIndex ?>_Height" id="o<?= $Page->RowIndex ?>_Height" value="<?= HtmlEncode($Page->Height->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SkinColor->Visible) { // SkinColor ?>
        <td data-name="SkinColor">
<span id="el$rowindex$_ivf_donorsemendetails_SkinColor" class="form-group ivf_donorsemendetails_SkinColor">
    <select
        id="x<?= $Page->RowIndex ?>_SkinColor"
        name="x<?= $Page->RowIndex ?>_SkinColor"
        class="form-control ew-select<?= $Page->SkinColor->isInvalidClass() ?>"
        data-select2-id="ivf_donorsemendetails_x<?= $Page->RowIndex ?>_SkinColor"
        data-table="ivf_donorsemendetails"
        data-field="x_SkinColor"
        data-value-separator="<?= $Page->SkinColor->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SkinColor->getPlaceHolder()) ?>"
        <?= $Page->SkinColor->editAttributes() ?>>
        <?= $Page->SkinColor->selectOptionListHtml("x{$Page->RowIndex}_SkinColor") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->SkinColor->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_donorsemendetails_x<?= $Page->RowIndex ?>_SkinColor']"),
        options = { name: "x<?= $Page->RowIndex ?>_SkinColor", selectId: "ivf_donorsemendetails_x<?= $Page->RowIndex ?>_SkinColor", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_donorsemendetails.fields.SkinColor.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_donorsemendetails.fields.SkinColor.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_SkinColor" data-hidden="1" name="o<?= $Page->RowIndex ?>_SkinColor" id="o<?= $Page->RowIndex ?>_SkinColor" value="<?= HtmlEncode($Page->SkinColor->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EyeColor->Visible) { // EyeColor ?>
        <td data-name="EyeColor">
<span id="el$rowindex$_ivf_donorsemendetails_EyeColor" class="form-group ivf_donorsemendetails_EyeColor">
    <select
        id="x<?= $Page->RowIndex ?>_EyeColor"
        name="x<?= $Page->RowIndex ?>_EyeColor"
        class="form-control ew-select<?= $Page->EyeColor->isInvalidClass() ?>"
        data-select2-id="ivf_donorsemendetails_x<?= $Page->RowIndex ?>_EyeColor"
        data-table="ivf_donorsemendetails"
        data-field="x_EyeColor"
        data-value-separator="<?= $Page->EyeColor->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EyeColor->getPlaceHolder()) ?>"
        <?= $Page->EyeColor->editAttributes() ?>>
        <?= $Page->EyeColor->selectOptionListHtml("x{$Page->RowIndex}_EyeColor") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EyeColor->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_donorsemendetails_x<?= $Page->RowIndex ?>_EyeColor']"),
        options = { name: "x<?= $Page->RowIndex ?>_EyeColor", selectId: "ivf_donorsemendetails_x<?= $Page->RowIndex ?>_EyeColor", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_donorsemendetails.fields.EyeColor.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_donorsemendetails.fields.EyeColor.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_EyeColor" data-hidden="1" name="o<?= $Page->RowIndex ?>_EyeColor" id="o<?= $Page->RowIndex ?>_EyeColor" value="<?= HtmlEncode($Page->EyeColor->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HairColor->Visible) { // HairColor ?>
        <td data-name="HairColor">
<span id="el$rowindex$_ivf_donorsemendetails_HairColor" class="form-group ivf_donorsemendetails_HairColor">
    <select
        id="x<?= $Page->RowIndex ?>_HairColor"
        name="x<?= $Page->RowIndex ?>_HairColor"
        class="form-control ew-select<?= $Page->HairColor->isInvalidClass() ?>"
        data-select2-id="ivf_donorsemendetails_x<?= $Page->RowIndex ?>_HairColor"
        data-table="ivf_donorsemendetails"
        data-field="x_HairColor"
        data-value-separator="<?= $Page->HairColor->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HairColor->getPlaceHolder()) ?>"
        <?= $Page->HairColor->editAttributes() ?>>
        <?= $Page->HairColor->selectOptionListHtml("x{$Page->RowIndex}_HairColor") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->HairColor->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_donorsemendetails_x<?= $Page->RowIndex ?>_HairColor']"),
        options = { name: "x<?= $Page->RowIndex ?>_HairColor", selectId: "ivf_donorsemendetails_x<?= $Page->RowIndex ?>_HairColor", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_donorsemendetails.fields.HairColor.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_donorsemendetails.fields.HairColor.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_HairColor" data-hidden="1" name="o<?= $Page->RowIndex ?>_HairColor" id="o<?= $Page->RowIndex ?>_HairColor" value="<?= HtmlEncode($Page->HairColor->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->NoOfVials->Visible) { // NoOfVials ?>
        <td data-name="NoOfVials">
<span id="el$rowindex$_ivf_donorsemendetails_NoOfVials" class="form-group ivf_donorsemendetails_NoOfVials">
<input type="<?= $Page->NoOfVials->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_NoOfVials" name="x<?= $Page->RowIndex ?>_NoOfVials" id="x<?= $Page->RowIndex ?>_NoOfVials" size="2" maxlength="50" placeholder="<?= HtmlEncode($Page->NoOfVials->getPlaceHolder()) ?>" value="<?= $Page->NoOfVials->EditValue ?>"<?= $Page->NoOfVials->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoOfVials->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_NoOfVials" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoOfVials" id="o<?= $Page->RowIndex ?>_NoOfVials" value="<?= HtmlEncode($Page->NoOfVials->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Tank->Visible) { // Tank ?>
        <td data-name="Tank">
<span id="el$rowindex$_ivf_donorsemendetails_Tank" class="form-group ivf_donorsemendetails_Tank">
<input type="<?= $Page->Tank->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Tank" name="x<?= $Page->RowIndex ?>_Tank" id="x<?= $Page->RowIndex ?>_Tank" size="4" maxlength="50" placeholder="<?= HtmlEncode($Page->Tank->getPlaceHolder()) ?>" value="<?= $Page->Tank->EditValue ?>"<?= $Page->Tank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Tank->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Tank" data-hidden="1" name="o<?= $Page->RowIndex ?>_Tank" id="o<?= $Page->RowIndex ?>_Tank" value="<?= HtmlEncode($Page->Tank->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Canister->Visible) { // Canister ?>
        <td data-name="Canister">
<span id="el$rowindex$_ivf_donorsemendetails_Canister" class="form-group ivf_donorsemendetails_Canister">
<input type="<?= $Page->Canister->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Canister" name="x<?= $Page->RowIndex ?>_Canister" id="x<?= $Page->RowIndex ?>_Canister" size="8" maxlength="50" placeholder="<?= HtmlEncode($Page->Canister->getPlaceHolder()) ?>" value="<?= $Page->Canister->EditValue ?>"<?= $Page->Canister->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Canister->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Canister" data-hidden="1" name="o<?= $Page->RowIndex ?>_Canister" id="o<?= $Page->RowIndex ?>_Canister" value="<?= HtmlEncode($Page->Canister->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks">
<span id="el$rowindex$_ivf_donorsemendetails_Remarks" class="form-group ivf_donorsemendetails_Remarks">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Remarks" name="x<?= $Page->RowIndex ?>_Remarks" id="x<?= $Page->RowIndex ?>_Remarks" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Remarks" data-hidden="1" name="o<?= $Page->RowIndex ?>_Remarks" id="o<?= $Page->RowIndex ?>_Remarks" value="<?= HtmlEncode($Page->Remarks->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fivf_donorsemendetailslist","load"], function() {
    fivf_donorsemendetailslist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("ivf_donorsemendetails");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    jQuery("#tpd_ivf_donorsemendetailslist th.ew-list-option-header").each((function(){this.rowSpan=1})),jQuery("#tpd_ivf_donorsemendetailslist td.ew-list-option-body").each((function(){this.rowSpan=1})),jQuery("script.ivf_donorsemendetailslist_js").each((function(){ew.addScript(this.text)}));var idelement=document.getElementById("gmp_ivf_donorsemendetails"),node=document.createElement("div");node.innerHTML="<?php echo $AgencyName; ?>",idelement.appendChild(node);
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_ivf_donorsemendetails",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
