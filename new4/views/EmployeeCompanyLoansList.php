<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeCompanyLoansList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_company_loanslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    femployee_company_loanslist = currentForm = new ew.Form("femployee_company_loanslist", "list");
    femployee_company_loanslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("femployee_company_loanslist");
});
var femployee_company_loanslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    femployee_company_loanslistsrch = currentSearchForm = new ew.Form("femployee_company_loanslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_company_loans")) ?>,
        fields = currentTable.fields;
    femployee_company_loanslistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["employee", [], fields.employee.isInvalid],
        ["loan", [], fields.loan.isInvalid],
        ["start_date", [], fields.start_date.isInvalid],
        ["last_installment_date", [], fields.last_installment_date.isInvalid],
        ["period_months", [], fields.period_months.isInvalid],
        ["currency", [], fields.currency.isInvalid],
        ["amount", [], fields.amount.isInvalid],
        ["monthly_installment", [], fields.monthly_installment.isInvalid],
        ["status", [], fields.status.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        femployee_company_loanslistsrch.setInvalid();
    });

    // Validate form
    femployee_company_loanslistsrch.validate = function () {
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
    femployee_company_loanslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_company_loanslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_company_loanslistsrch.lists.status = <?= $Page->status->toClientList($Page) ?>;

    // Filters
    femployee_company_loanslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("femployee_company_loanslistsrch");
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
<form name="femployee_company_loanslistsrch" id="femployee_company_loanslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="femployee_company_loanslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_company_loans">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->status->Visible) { // status ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_status" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->status->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_status" id="z_status" value="=">
</span>
        <span id="el_employee_company_loans_status" class="ew-search-field">
<template id="tp_x_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_company_loans" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_status" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_status"
    name="x_status"
    value="<?= HtmlEncode($Page->status->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_status"
    data-target="dsl_x_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->status->isInvalidClass() ?>"
    data-table="employee_company_loans"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage(false) ?></div>
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
    <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_company_loans">
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
<form name="femployee_company_loanslist" id="femployee_company_loanslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_company_loans">
<div id="gmp_employee_company_loans" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_employee_company_loanslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_employee_company_loans_id" class="employee_company_loans_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th data-name="employee" class="<?= $Page->employee->headerCellClass() ?>"><div id="elh_employee_company_loans_employee" class="employee_company_loans_employee"><?= $Page->renderSort($Page->employee) ?></div></th>
<?php } ?>
<?php if ($Page->loan->Visible) { // loan ?>
        <th data-name="loan" class="<?= $Page->loan->headerCellClass() ?>"><div id="elh_employee_company_loans_loan" class="employee_company_loans_loan"><?= $Page->renderSort($Page->loan) ?></div></th>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <th data-name="start_date" class="<?= $Page->start_date->headerCellClass() ?>"><div id="elh_employee_company_loans_start_date" class="employee_company_loans_start_date"><?= $Page->renderSort($Page->start_date) ?></div></th>
<?php } ?>
<?php if ($Page->last_installment_date->Visible) { // last_installment_date ?>
        <th data-name="last_installment_date" class="<?= $Page->last_installment_date->headerCellClass() ?>"><div id="elh_employee_company_loans_last_installment_date" class="employee_company_loans_last_installment_date"><?= $Page->renderSort($Page->last_installment_date) ?></div></th>
<?php } ?>
<?php if ($Page->period_months->Visible) { // period_months ?>
        <th data-name="period_months" class="<?= $Page->period_months->headerCellClass() ?>"><div id="elh_employee_company_loans_period_months" class="employee_company_loans_period_months"><?= $Page->renderSort($Page->period_months) ?></div></th>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
        <th data-name="currency" class="<?= $Page->currency->headerCellClass() ?>"><div id="elh_employee_company_loans_currency" class="employee_company_loans_currency"><?= $Page->renderSort($Page->currency) ?></div></th>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <th data-name="amount" class="<?= $Page->amount->headerCellClass() ?>"><div id="elh_employee_company_loans_amount" class="employee_company_loans_amount"><?= $Page->renderSort($Page->amount) ?></div></th>
<?php } ?>
<?php if ($Page->monthly_installment->Visible) { // monthly_installment ?>
        <th data-name="monthly_installment" class="<?= $Page->monthly_installment->headerCellClass() ?>"><div id="elh_employee_company_loans_monthly_installment" class="employee_company_loans_monthly_installment"><?= $Page->renderSort($Page->monthly_installment) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_employee_company_loans_status" class="employee_company_loans_status"><?= $Page->renderSort($Page->status) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_employee_company_loans", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_employee_company_loans_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->employee->Visible) { // employee ?>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->loan->Visible) { // loan ?>
        <td data-name="loan" <?= $Page->loan->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_loan">
<span<?= $Page->loan->viewAttributes() ?>>
<?= $Page->loan->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->start_date->Visible) { // start_date ?>
        <td data-name="start_date" <?= $Page->start_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->last_installment_date->Visible) { // last_installment_date ?>
        <td data-name="last_installment_date" <?= $Page->last_installment_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_last_installment_date">
<span<?= $Page->last_installment_date->viewAttributes() ?>>
<?= $Page->last_installment_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->period_months->Visible) { // period_months ?>
        <td data-name="period_months" <?= $Page->period_months->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_period_months">
<span<?= $Page->period_months->viewAttributes() ?>>
<?= $Page->period_months->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->currency->Visible) { // currency ?>
        <td data-name="currency" <?= $Page->currency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_currency">
<span<?= $Page->currency->viewAttributes() ?>>
<?= $Page->currency->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->amount->Visible) { // amount ?>
        <td data-name="amount" <?= $Page->amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->monthly_installment->Visible) { // monthly_installment ?>
        <td data-name="monthly_installment" <?= $Page->monthly_installment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_monthly_installment">
<span<?= $Page->monthly_installment->viewAttributes() ?>>
<?= $Page->monthly_installment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
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
    ew.addEventHandlers("employee_company_loans");
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
        container: "gmp_employee_company_loans",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
