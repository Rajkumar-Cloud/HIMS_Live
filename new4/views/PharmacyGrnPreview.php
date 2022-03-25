<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyGrnPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid pharmacy_grn"><!-- .card -->
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
    <thead><!-- Table header -->
        <tr class="ew-table-header">
<?php
// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id->Visible) { // id ?>
    <?php if ($Page->SortUrl($Page->id) == "") { ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><?= $Page->id->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->id->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->id->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->id->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
    <?php if ($Page->SortUrl($Page->GRNNO) == "") { ?>
        <th class="<?= $Page->GRNNO->headerCellClass() ?>"><?= $Page->GRNNO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GRNNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GRNNO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GRNNO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GRNNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GRNNO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <?php if ($Page->SortUrl($Page->DT) == "") { ?>
        <th class="<?= $Page->DT->headerCellClass() ?>"><?= $Page->DT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
    <?php if ($Page->SortUrl($Page->Customername) == "") { ?>
        <th class="<?= $Page->Customername->headerCellClass() ?>"><?= $Page->Customername->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Customername->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Customername->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Customername->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Customername->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Customername->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <?php if ($Page->SortUrl($Page->State) == "") { ?>
        <th class="<?= $Page->State->headerCellClass() ?>"><?= $Page->State->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->State->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->State->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->State->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->State->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->State->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
    <?php if ($Page->SortUrl($Page->Pincode) == "") { ?>
        <th class="<?= $Page->Pincode->headerCellClass() ?>"><?= $Page->Pincode->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Pincode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Pincode->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Pincode->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Pincode->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Pincode->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
    <?php if ($Page->SortUrl($Page->Phone) == "") { ?>
        <th class="<?= $Page->Phone->headerCellClass() ?>"><?= $Page->Phone->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Phone->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Phone->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Phone->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Phone->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Phone->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
    <?php if ($Page->SortUrl($Page->BILLNO) == "") { ?>
        <th class="<?= $Page->BILLNO->headerCellClass() ?>"><?= $Page->BILLNO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BILLNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BILLNO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BILLNO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BILLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BILLNO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
    <?php if ($Page->SortUrl($Page->BILLDT) == "") { ?>
        <th class="<?= $Page->BILLDT->headerCellClass() ?>"><?= $Page->BILLDT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BILLDT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BILLDT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BILLDT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BILLDT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
    <?php if ($Page->SortUrl($Page->BillTotalValue) == "") { ?>
        <th class="<?= $Page->BillTotalValue->headerCellClass() ?>"><?= $Page->BillTotalValue->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BillTotalValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BillTotalValue->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BillTotalValue->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BillTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BillTotalValue->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
    <?php if ($Page->SortUrl($Page->GRNTotalValue) == "") { ?>
        <th class="<?= $Page->GRNTotalValue->headerCellClass() ?>"><?= $Page->GRNTotalValue->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GRNTotalValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GRNTotalValue->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GRNTotalValue->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GRNTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GRNTotalValue->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
    <?php if ($Page->SortUrl($Page->BillDiscount) == "") { ?>
        <th class="<?= $Page->BillDiscount->headerCellClass() ?>"><?= $Page->BillDiscount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BillDiscount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BillDiscount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BillDiscount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BillDiscount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BillDiscount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GrnValue->Visible) { // GrnValue ?>
    <?php if ($Page->SortUrl($Page->GrnValue) == "") { ?>
        <th class="<?= $Page->GrnValue->headerCellClass() ?>"><?= $Page->GrnValue->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GrnValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GrnValue->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GrnValue->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GrnValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GrnValue->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Pid->Visible) { // Pid ?>
    <?php if ($Page->SortUrl($Page->Pid) == "") { ?>
        <th class="<?= $Page->Pid->headerCellClass() ?>"><?= $Page->Pid->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Pid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Pid->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Pid->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Pid->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
    <?php if ($Page->SortUrl($Page->PaymentNo) == "") { ?>
        <th class="<?= $Page->PaymentNo->headerCellClass() ?>"><?= $Page->PaymentNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PaymentNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PaymentNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PaymentNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PaymentNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PaymentNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <?php if ($Page->SortUrl($Page->PaymentStatus) == "") { ?>
        <th class="<?= $Page->PaymentStatus->headerCellClass() ?>"><?= $Page->PaymentStatus->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PaymentStatus->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PaymentStatus->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PaymentStatus->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
    <?php if ($Page->SortUrl($Page->PaidAmount) == "") { ?>
        <th class="<?= $Page->PaidAmount->headerCellClass() ?>"><?= $Page->PaidAmount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PaidAmount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PaidAmount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PaidAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PaidAmount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
        </tr>
    </thead>
    <tbody><!-- Table body -->
<?php
$Page->RecCount = 0;
$Page->RowCount = 0;
while ($Page->Recordset && !$Page->Recordset->EOF) {
    // Init row class and style
    $Page->RecCount++;
    $Page->RowCount++;
    $Page->CssStyle = "";
    $Page->loadListRowValues($Page->Recordset);
    $Page->aggregateListRowValues(); // Aggregate row values

    // Render row
    $Page->RowType = ROWTYPE_PREVIEW; // Preview record
    $Page->resetAttributes();
    $Page->renderListRow();

    // Render list options
    $Page->renderListOptions();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
<?php if ($Page->id->Visible) { // id ?>
        <!-- id -->
        <td<?= $Page->id->cellAttributes() ?>>
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
        <!-- GRNNO -->
        <td<?= $Page->GRNNO->cellAttributes() ?>>
<span<?= $Page->GRNNO->viewAttributes() ?>>
<?= $Page->GRNNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <!-- DT -->
        <td<?= $Page->DT->cellAttributes() ?>>
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <!-- Customername -->
        <td<?= $Page->Customername->cellAttributes() ?>>
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <!-- State -->
        <td<?= $Page->State->cellAttributes() ?>>
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <!-- Pincode -->
        <td<?= $Page->Pincode->cellAttributes() ?>>
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <!-- Phone -->
        <td<?= $Page->Phone->cellAttributes() ?>>
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <!-- BILLNO -->
        <td<?= $Page->BILLNO->cellAttributes() ?>>
<span<?= $Page->BILLNO->viewAttributes() ?>>
<?= $Page->BILLNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <!-- BILLDT -->
        <td<?= $Page->BILLDT->cellAttributes() ?>>
<span<?= $Page->BILLDT->viewAttributes() ?>>
<?= $Page->BILLDT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <!-- BillTotalValue -->
        <td<?= $Page->BillTotalValue->cellAttributes() ?>>
<span<?= $Page->BillTotalValue->viewAttributes() ?>>
<?= $Page->BillTotalValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <!-- GRNTotalValue -->
        <td<?= $Page->GRNTotalValue->cellAttributes() ?>>
<span<?= $Page->GRNTotalValue->viewAttributes() ?>>
<?= $Page->GRNTotalValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <!-- BillDiscount -->
        <td<?= $Page->BillDiscount->cellAttributes() ?>>
<span<?= $Page->BillDiscount->viewAttributes() ?>>
<?= $Page->BillDiscount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GrnValue->Visible) { // GrnValue ?>
        <!-- GrnValue -->
        <td<?= $Page->GrnValue->cellAttributes() ?>>
<span<?= $Page->GrnValue->viewAttributes() ?>>
<?= $Page->GrnValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Pid->Visible) { // Pid ?>
        <!-- Pid -->
        <td<?= $Page->Pid->cellAttributes() ?>>
<span<?= $Page->Pid->viewAttributes() ?>>
<?= $Page->Pid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
        <!-- PaymentNo -->
        <td<?= $Page->PaymentNo->cellAttributes() ?>>
<span<?= $Page->PaymentNo->viewAttributes() ?>>
<?= $Page->PaymentNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <!-- PaymentStatus -->
        <td<?= $Page->PaymentStatus->cellAttributes() ?>>
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <!-- PaidAmount -->
        <td<?= $Page->PaidAmount->cellAttributes() ?>>
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    $Page->Recordset->moveNext();
} // while
?>
    </tbody>
<?php
    // Render aggregate row
    $Page->RowType = ROWTYPE_AGGREGATE; // Aggregate
    $Page->aggregateListRow(); // Prepare aggregate row

    // Render list options
    $Page->renderListOptions();
?>
    <tfoot><!-- Table footer -->
    <tr class="ew-table-footer">
<?php
// Render list options (footer, left)
$Page->ListOptions->render("footer", "left");
?>
<?php if ($Page->id->Visible) { // id ?>
        <!-- id -->
        <td class="<?= $Page->id->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
        <!-- GRNNO -->
        <td class="<?= $Page->GRNNO->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <!-- DT -->
        <td class="<?= $Page->DT->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <!-- Customername -->
        <td class="<?= $Page->Customername->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <!-- State -->
        <td class="<?= $Page->State->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <!-- Pincode -->
        <td class="<?= $Page->Pincode->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <!-- Phone -->
        <td class="<?= $Page->Phone->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <!-- BILLNO -->
        <td class="<?= $Page->BILLNO->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <!-- BILLDT -->
        <td class="<?= $Page->BILLDT->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <!-- BillTotalValue -->
        <td class="<?= $Page->BillTotalValue->footerCellClass() ?>">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->BillTotalValue->ViewValue ?></span>
        </td>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <!-- GRNTotalValue -->
        <td class="<?= $Page->GRNTotalValue->footerCellClass() ?>">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->GRNTotalValue->ViewValue ?></span>
        </td>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <!-- BillDiscount -->
        <td class="<?= $Page->BillDiscount->footerCellClass() ?>">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->BillDiscount->ViewValue ?></span>
        </td>
<?php } ?>
<?php if ($Page->GrnValue->Visible) { // GrnValue ?>
        <!-- GrnValue -->
        <td class="<?= $Page->GrnValue->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Pid->Visible) { // Pid ?>
        <!-- Pid -->
        <td class="<?= $Page->Pid->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
        <!-- PaymentNo -->
        <td class="<?= $Page->PaymentNo->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <!-- PaymentStatus -->
        <td class="<?= $Page->PaymentStatus->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <!-- PaidAmount -->
        <td class="<?= $Page->PaidAmount->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php
// Render list options (footer, right)
$Page->ListOptions->render("footer", "right");
?>
    </tr>
    </tfoot>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?= $Page->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?= $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
    foreach ($Page->OtherOptions as $option)
        $option->render("body");
?>
</div>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>
