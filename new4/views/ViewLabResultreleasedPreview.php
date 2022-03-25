<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewLabResultreleasedPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid view_lab_resultreleased"><!-- .card -->
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
<?php if ($Page->PatID->Visible) { // PatID ?>
    <?php if ($Page->SortUrl($Page->PatID) == "") { ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><?= $Page->PatID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <?php if ($Page->SortUrl($Page->PatientName) == "") { ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><?= $Page->PatientName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <?php if ($Page->SortUrl($Page->Age) == "") { ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><?= $Page->Age->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Age->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Age->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Age->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <?php if ($Page->SortUrl($Page->Gender) == "") { ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><?= $Page->Gender->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Gender->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Gender->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Gender->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
    <?php if ($Page->SortUrl($Page->sid) == "") { ?>
        <th class="<?= $Page->sid->headerCellClass() ?>"><?= $Page->sid->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->sid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->sid->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->sid->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->sid->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
    <?php if ($Page->SortUrl($Page->ItemCode) == "") { ?>
        <th class="<?= $Page->ItemCode->headerCellClass() ?>"><?= $Page->ItemCode->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ItemCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ItemCode->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ItemCode->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ItemCode->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
    <?php if ($Page->SortUrl($Page->DEptCd) == "") { ?>
        <th class="<?= $Page->DEptCd->headerCellClass() ?>"><?= $Page->DEptCd->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DEptCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DEptCd->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DEptCd->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DEptCd->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Resulted->Visible) { // Resulted ?>
    <?php if ($Page->SortUrl($Page->Resulted) == "") { ?>
        <th class="<?= $Page->Resulted->headerCellClass() ?>"><?= $Page->Resulted->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Resulted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Resulted->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Resulted->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Resulted->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Resulted->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
    <?php if ($Page->SortUrl($Page->Services) == "") { ?>
        <th class="<?= $Page->Services->headerCellClass() ?>"><?= $Page->Services->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Services->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Services->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Services->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Services->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->LabReport->Visible) { // LabReport ?>
    <?php if ($Page->SortUrl($Page->LabReport) == "") { ?>
        <th class="<?= $Page->LabReport->headerCellClass() ?>"><?= $Page->LabReport->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->LabReport->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->LabReport->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->LabReport->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->LabReport->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->LabReport->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
    <?php if ($Page->SortUrl($Page->Pic1) == "") { ?>
        <th class="<?= $Page->Pic1->headerCellClass() ?>"><?= $Page->Pic1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Pic1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Pic1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Pic1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Pic1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Pic1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
    <?php if ($Page->SortUrl($Page->Pic2) == "") { ?>
        <th class="<?= $Page->Pic2->headerCellClass() ?>"><?= $Page->Pic2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Pic2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Pic2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Pic2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Pic2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Pic2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TestUnit->Visible) { // TestUnit ?>
    <?php if ($Page->SortUrl($Page->TestUnit) == "") { ?>
        <th class="<?= $Page->TestUnit->headerCellClass() ?>"><?= $Page->TestUnit->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TestUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TestUnit->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TestUnit->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TestUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TestUnit->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RefValue->Visible) { // RefValue ?>
    <?php if ($Page->SortUrl($Page->RefValue) == "") { ?>
        <th class="<?= $Page->RefValue->headerCellClass() ?>"><?= $Page->RefValue->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RefValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RefValue->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RefValue->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RefValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RefValue->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <?php if ($Page->SortUrl($Page->Order) == "") { ?>
        <th class="<?= $Page->Order->headerCellClass() ?>"><?= $Page->Order->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Order->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Order->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Order->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Order->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Repeated->Visible) { // Repeated ?>
    <?php if ($Page->SortUrl($Page->Repeated) == "") { ?>
        <th class="<?= $Page->Repeated->headerCellClass() ?>"><?= $Page->Repeated->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Repeated->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Repeated->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Repeated->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Repeated->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Repeated->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
    <?php if ($Page->SortUrl($Page->Vid) == "") { ?>
        <th class="<?= $Page->Vid->headerCellClass() ?>"><?= $Page->Vid->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Vid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Vid->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Vid->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Vid->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
    <?php if ($Page->SortUrl($Page->invoiceId) == "") { ?>
        <th class="<?= $Page->invoiceId->headerCellClass() ?>"><?= $Page->invoiceId->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->invoiceId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->invoiceId->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->invoiceId->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->invoiceId->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <?php if ($Page->SortUrl($Page->DrID) == "") { ?>
        <th class="<?= $Page->DrID->headerCellClass() ?>"><?= $Page->DrID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DrID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DrID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DrID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DrID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DrCODE->Visible) { // DrCODE ?>
    <?php if ($Page->SortUrl($Page->DrCODE) == "") { ?>
        <th class="<?= $Page->DrCODE->headerCellClass() ?>"><?= $Page->DrCODE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DrCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DrCODE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DrCODE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DrCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DrCODE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <?php if ($Page->SortUrl($Page->DrName) == "") { ?>
        <th class="<?= $Page->DrName->headerCellClass() ?>"><?= $Page->DrName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DrName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DrName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DrName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
    <?php if ($Page->SortUrl($Page->Department) == "") { ?>
        <th class="<?= $Page->Department->headerCellClass() ?>"><?= $Page->Department->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Department->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Department->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Department->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Department->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <?php if ($Page->SortUrl($Page->createddatetime) == "") { ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><?= $Page->createddatetime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->createddatetime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->createddatetime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->createddatetime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <?php if ($Page->SortUrl($Page->status) == "") { ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><?= $Page->status->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->status->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->status->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->status->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
    <?php if ($Page->SortUrl($Page->TestType) == "") { ?>
        <th class="<?= $Page->TestType->headerCellClass() ?>"><?= $Page->TestType->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TestType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TestType->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TestType->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TestType->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <?php if ($Page->SortUrl($Page->ResultDate) == "") { ?>
        <th class="<?= $Page->ResultDate->headerCellClass() ?>"><?= $Page->ResultDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ResultDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ResultDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ResultDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ResultDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
    <?php if ($Page->SortUrl($Page->ResultedBy) == "") { ?>
        <th class="<?= $Page->ResultedBy->headerCellClass() ?>"><?= $Page->ResultedBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ResultedBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ResultedBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ResultedBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <?php if ($Page->SortUrl($Page->HospID) == "") { ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><?= $Page->HospID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HospID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HospID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HospID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->PatID->Visible) { // PatID ?>
        <!-- PatID -->
        <td<?= $Page->PatID->cellAttributes() ?>>
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <!-- PatientName -->
        <td<?= $Page->PatientName->cellAttributes() ?>>
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <!-- Age -->
        <td<?= $Page->Age->cellAttributes() ?>>
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <!-- Gender -->
        <td<?= $Page->Gender->cellAttributes() ?>>
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <!-- sid -->
        <td<?= $Page->sid->cellAttributes() ?>>
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <!-- ItemCode -->
        <td<?= $Page->ItemCode->cellAttributes() ?>>
<span<?= $Page->ItemCode->viewAttributes() ?>>
<?= $Page->ItemCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <!-- DEptCd -->
        <td<?= $Page->DEptCd->cellAttributes() ?>>
<span<?= $Page->DEptCd->viewAttributes() ?>>
<?= $Page->DEptCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Resulted->Visible) { // Resulted ?>
        <!-- Resulted -->
        <td<?= $Page->Resulted->cellAttributes() ?>>
<span<?= $Page->Resulted->viewAttributes() ?>>
<?= $Page->Resulted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
        <!-- Services -->
        <td<?= $Page->Services->cellAttributes() ?>>
<span<?= $Page->Services->viewAttributes() ?>>
<?= $Page->Services->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->LabReport->Visible) { // LabReport ?>
        <!-- LabReport -->
        <td<?= $Page->LabReport->cellAttributes() ?>>
<span<?= $Page->LabReport->viewAttributes() ?>>
<?= $Page->LabReport->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <!-- Pic1 -->
        <td<?= $Page->Pic1->cellAttributes() ?>>
<span<?= $Page->Pic1->viewAttributes() ?>>
<?= GetFileViewTag($Page->Pic1, $Page->Pic1->getViewValue(), false) ?>
</span>
</td>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <!-- Pic2 -->
        <td<?= $Page->Pic2->cellAttributes() ?>>
<span<?= $Page->Pic2->viewAttributes() ?>>
<?= GetFileViewTag($Page->Pic2, $Page->Pic2->getViewValue(), false) ?>
</span>
</td>
<?php } ?>
<?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <!-- TestUnit -->
        <td<?= $Page->TestUnit->cellAttributes() ?>>
<span<?= $Page->TestUnit->viewAttributes() ?>>
<?= $Page->TestUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RefValue->Visible) { // RefValue ?>
        <!-- RefValue -->
        <td<?= $Page->RefValue->cellAttributes() ?>>
<span<?= $Page->RefValue->viewAttributes() ?>>
<?= $Page->RefValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <!-- Order -->
        <td<?= $Page->Order->cellAttributes() ?>>
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Repeated->Visible) { // Repeated ?>
        <!-- Repeated -->
        <td<?= $Page->Repeated->cellAttributes() ?>>
<span<?= $Page->Repeated->viewAttributes() ?>>
<?= $Page->Repeated->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
        <!-- Vid -->
        <td<?= $Page->Vid->cellAttributes() ?>>
<span<?= $Page->Vid->viewAttributes() ?>>
<?= $Page->Vid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <!-- invoiceId -->
        <td<?= $Page->invoiceId->cellAttributes() ?>>
<span<?= $Page->invoiceId->viewAttributes() ?>>
<?= $Page->invoiceId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <!-- DrID -->
        <td<?= $Page->DrID->cellAttributes() ?>>
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <!-- DrCODE -->
        <td<?= $Page->DrCODE->cellAttributes() ?>>
<span<?= $Page->DrCODE->viewAttributes() ?>>
<?= $Page->DrCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <!-- DrName -->
        <td<?= $Page->DrName->cellAttributes() ?>>
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <!-- Department -->
        <td<?= $Page->Department->cellAttributes() ?>>
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <!-- createddatetime -->
        <td<?= $Page->createddatetime->cellAttributes() ?>>
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <!-- status -->
        <td<?= $Page->status->cellAttributes() ?>>
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <!-- TestType -->
        <td<?= $Page->TestType->cellAttributes() ?>>
<span<?= $Page->TestType->viewAttributes() ?>>
<?= $Page->TestType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <!-- ResultDate -->
        <td<?= $Page->ResultDate->cellAttributes() ?>>
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <!-- ResultedBy -->
        <td<?= $Page->ResultedBy->cellAttributes() ?>>
<span<?= $Page->ResultedBy->viewAttributes() ?>>
<?= $Page->ResultedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td<?= $Page->HospID->cellAttributes() ?>>
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
