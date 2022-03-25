<?php

namespace PHPMaker2021\HIMS;

// Page object
$AppointmentSchedulerPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid appointment_scheduler"><!-- .card -->
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
<?php if ($Page->start_date->Visible) { // start_date ?>
    <?php if ($Page->SortUrl($Page->start_date) == "") { ?>
        <th class="<?= $Page->start_date->headerCellClass() ?>"><?= $Page->start_date->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->start_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->start_date->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->start_date->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->start_date->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
    <?php if ($Page->SortUrl($Page->end_date) == "") { ?>
        <th class="<?= $Page->end_date->headerCellClass() ?>"><?= $Page->end_date->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->end_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->end_date->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->end_date->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->end_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->end_date->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->patientID->Visible) { // patientID ?>
    <?php if ($Page->SortUrl($Page->patientID) == "") { ?>
        <th class="<?= $Page->patientID->headerCellClass() ?>"><?= $Page->patientID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->patientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->patientID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->patientID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->patientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->patientID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
    <?php if ($Page->SortUrl($Page->patientName) == "") { ?>
        <th class="<?= $Page->patientName->headerCellClass() ?>"><?= $Page->patientName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->patientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->patientName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->patientName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->patientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->patientName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DoctorID->Visible) { // DoctorID ?>
    <?php if ($Page->SortUrl($Page->DoctorID) == "") { ?>
        <th class="<?= $Page->DoctorID->headerCellClass() ?>"><?= $Page->DoctorID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DoctorID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DoctorID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DoctorID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DoctorID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DoctorID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
    <?php if ($Page->SortUrl($Page->DoctorName) == "") { ?>
        <th class="<?= $Page->DoctorName->headerCellClass() ?>"><?= $Page->DoctorName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DoctorName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DoctorName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DoctorName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DoctorName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DoctorName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AppointmentStatus->Visible) { // AppointmentStatus ?>
    <?php if ($Page->SortUrl($Page->AppointmentStatus) == "") { ?>
        <th class="<?= $Page->AppointmentStatus->headerCellClass() ?>"><?= $Page->AppointmentStatus->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AppointmentStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AppointmentStatus->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AppointmentStatus->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AppointmentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AppointmentStatus->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->DoctorCode->Visible) { // DoctorCode ?>
    <?php if ($Page->SortUrl($Page->DoctorCode) == "") { ?>
        <th class="<?= $Page->DoctorCode->headerCellClass() ?>"><?= $Page->DoctorCode->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DoctorCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DoctorCode->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DoctorCode->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DoctorCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DoctorCode->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
    <?php if ($Page->SortUrl($Page->scheduler_id) == "") { ?>
        <th class="<?= $Page->scheduler_id->headerCellClass() ?>"><?= $Page->scheduler_id->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->scheduler_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->scheduler_id->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->scheduler_id->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->scheduler_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->scheduler_id->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->text->Visible) { // text ?>
    <?php if ($Page->SortUrl($Page->text) == "") { ?>
        <th class="<?= $Page->text->headerCellClass() ?>"><?= $Page->text->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->text->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->text->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->text->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->text->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->text->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->appointment_status->Visible) { // appointment_status ?>
    <?php if ($Page->SortUrl($Page->appointment_status) == "") { ?>
        <th class="<?= $Page->appointment_status->headerCellClass() ?>"><?= $Page->appointment_status->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->appointment_status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->appointment_status->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->appointment_status->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->appointment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->appointment_status->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
    <?php if ($Page->SortUrl($Page->PId) == "") { ?>
        <th class="<?= $Page->PId->headerCellClass() ?>"><?= $Page->PId->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PId->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PId->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PId->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <?php if ($Page->SortUrl($Page->MobileNumber) == "") { ?>
        <th class="<?= $Page->MobileNumber->headerCellClass() ?>"><?= $Page->MobileNumber->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MobileNumber->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MobileNumber->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MobileNumber->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SchEmail->Visible) { // SchEmail ?>
    <?php if ($Page->SortUrl($Page->SchEmail) == "") { ?>
        <th class="<?= $Page->SchEmail->headerCellClass() ?>"><?= $Page->SchEmail->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SchEmail->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SchEmail->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SchEmail->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SchEmail->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SchEmail->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->appointment_type->Visible) { // appointment_type ?>
    <?php if ($Page->SortUrl($Page->appointment_type) == "") { ?>
        <th class="<?= $Page->appointment_type->headerCellClass() ?>"><?= $Page->appointment_type->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->appointment_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->appointment_type->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->appointment_type->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->appointment_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->appointment_type->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Notified->Visible) { // Notified ?>
    <?php if ($Page->SortUrl($Page->Notified) == "") { ?>
        <th class="<?= $Page->Notified->headerCellClass() ?>"><?= $Page->Notified->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Notified->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Notified->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Notified->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Notified->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Notified->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
    <?php if ($Page->SortUrl($Page->Purpose) == "") { ?>
        <th class="<?= $Page->Purpose->headerCellClass() ?>"><?= $Page->Purpose->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Purpose->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Purpose->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Purpose->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Purpose->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Purpose->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
    <?php if ($Page->SortUrl($Page->Notes) == "") { ?>
        <th class="<?= $Page->Notes->headerCellClass() ?>"><?= $Page->Notes->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Notes->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Notes->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Notes->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Notes->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Notes->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientType->Visible) { // PatientType ?>
    <?php if ($Page->SortUrl($Page->PatientType) == "") { ?>
        <th class="<?= $Page->PatientType->headerCellClass() ?>"><?= $Page->PatientType->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientType->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientType->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientType->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientType->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
    <?php if ($Page->SortUrl($Page->Referal) == "") { ?>
        <th class="<?= $Page->Referal->headerCellClass() ?>"><?= $Page->Referal->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Referal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Referal->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Referal->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Referal->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Referal->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
    <?php if ($Page->SortUrl($Page->paymentType) == "") { ?>
        <th class="<?= $Page->paymentType->headerCellClass() ?>"><?= $Page->paymentType->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->paymentType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->paymentType->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->paymentType->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->paymentType->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->paymentType->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
    <?php if ($Page->SortUrl($Page->WhereDidYouHear) == "") { ?>
        <th class="<?= $Page->WhereDidYouHear->headerCellClass() ?>"><?= $Page->WhereDidYouHear->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->WhereDidYouHear->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->WhereDidYouHear->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->WhereDidYouHear->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->WhereDidYouHear->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->createdBy->Visible) { // createdBy ?>
    <?php if ($Page->SortUrl($Page->createdBy) == "") { ?>
        <th class="<?= $Page->createdBy->headerCellClass() ?>"><?= $Page->createdBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->createdBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->createdBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->createdBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->createdBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->createdBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->createdDateTime->Visible) { // createdDateTime ?>
    <?php if ($Page->SortUrl($Page->createdDateTime) == "") { ?>
        <th class="<?= $Page->createdDateTime->headerCellClass() ?>"><?= $Page->createdDateTime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->createdDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->createdDateTime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->createdDateTime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->createdDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->createdDateTime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
    <?php if ($Page->SortUrl($Page->PatientTypee) == "") { ?>
        <th class="<?= $Page->PatientTypee->headerCellClass() ?>"><?= $Page->PatientTypee->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientTypee->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientTypee->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientTypee->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientTypee->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientTypee->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->start_date->Visible) { // start_date ?>
        <!-- start_date -->
        <td<?= $Page->start_date->cellAttributes() ?>>
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
        <!-- end_date -->
        <td<?= $Page->end_date->cellAttributes() ?>>
<span<?= $Page->end_date->viewAttributes() ?>>
<?= $Page->end_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->patientID->Visible) { // patientID ?>
        <!-- patientID -->
        <td<?= $Page->patientID->cellAttributes() ?>>
<span<?= $Page->patientID->viewAttributes() ?>>
<?= $Page->patientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
        <!-- patientName -->
        <td<?= $Page->patientName->cellAttributes() ?>>
<span<?= $Page->patientName->viewAttributes() ?>>
<?= $Page->patientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DoctorID->Visible) { // DoctorID ?>
        <!-- DoctorID -->
        <td<?= $Page->DoctorID->cellAttributes() ?>>
<span<?= $Page->DoctorID->viewAttributes() ?>>
<?= $Page->DoctorID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
        <!-- DoctorName -->
        <td<?= $Page->DoctorName->cellAttributes() ?>>
<span<?= $Page->DoctorName->viewAttributes() ?>>
<?= $Page->DoctorName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AppointmentStatus->Visible) { // AppointmentStatus ?>
        <!-- AppointmentStatus -->
        <td<?= $Page->AppointmentStatus->cellAttributes() ?>>
<span<?= $Page->AppointmentStatus->viewAttributes() ?>>
<?= $Page->AppointmentStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <!-- status -->
        <td<?= $Page->status->cellAttributes() ?>>
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DoctorCode->Visible) { // DoctorCode ?>
        <!-- DoctorCode -->
        <td<?= $Page->DoctorCode->cellAttributes() ?>>
<span<?= $Page->DoctorCode->viewAttributes() ?>>
<?= $Page->DoctorCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <!-- Department -->
        <td<?= $Page->Department->cellAttributes() ?>>
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
        <!-- scheduler_id -->
        <td<?= $Page->scheduler_id->cellAttributes() ?>>
<span<?= $Page->scheduler_id->viewAttributes() ?>>
<?= $Page->scheduler_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->text->Visible) { // text ?>
        <!-- text -->
        <td<?= $Page->text->cellAttributes() ?>>
<span<?= $Page->text->viewAttributes() ?>>
<?= $Page->text->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->appointment_status->Visible) { // appointment_status ?>
        <!-- appointment_status -->
        <td<?= $Page->appointment_status->cellAttributes() ?>>
<span<?= $Page->appointment_status->viewAttributes() ?>>
<?= $Page->appointment_status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
        <!-- PId -->
        <td<?= $Page->PId->cellAttributes() ?>>
<span<?= $Page->PId->viewAttributes() ?>>
<?= $Page->PId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <!-- MobileNumber -->
        <td<?= $Page->MobileNumber->cellAttributes() ?>>
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SchEmail->Visible) { // SchEmail ?>
        <!-- SchEmail -->
        <td<?= $Page->SchEmail->cellAttributes() ?>>
<span<?= $Page->SchEmail->viewAttributes() ?>>
<?= $Page->SchEmail->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->appointment_type->Visible) { // appointment_type ?>
        <!-- appointment_type -->
        <td<?= $Page->appointment_type->cellAttributes() ?>>
<span<?= $Page->appointment_type->viewAttributes() ?>>
<?= $Page->appointment_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Notified->Visible) { // Notified ?>
        <!-- Notified -->
        <td<?= $Page->Notified->cellAttributes() ?>>
<span<?= $Page->Notified->viewAttributes() ?>>
<?= $Page->Notified->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
        <!-- Purpose -->
        <td<?= $Page->Purpose->cellAttributes() ?>>
<span<?= $Page->Purpose->viewAttributes() ?>>
<?= $Page->Purpose->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
        <!-- Notes -->
        <td<?= $Page->Notes->cellAttributes() ?>>
<span<?= $Page->Notes->viewAttributes() ?>>
<?= $Page->Notes->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PatientType->Visible) { // PatientType ?>
        <!-- PatientType -->
        <td<?= $Page->PatientType->cellAttributes() ?>>
<span<?= $Page->PatientType->viewAttributes() ?>>
<?= $Page->PatientType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
        <!-- Referal -->
        <td<?= $Page->Referal->cellAttributes() ?>>
<span<?= $Page->Referal->viewAttributes() ?>>
<?= $Page->Referal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
        <!-- paymentType -->
        <td<?= $Page->paymentType->cellAttributes() ?>>
<span<?= $Page->paymentType->viewAttributes() ?>>
<?= $Page->paymentType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <!-- WhereDidYouHear -->
        <td<?= $Page->WhereDidYouHear->cellAttributes() ?>>
<span<?= $Page->WhereDidYouHear->viewAttributes() ?>>
<?= $Page->WhereDidYouHear->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td<?= $Page->HospID->cellAttributes() ?>>
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->createdBy->Visible) { // createdBy ?>
        <!-- createdBy -->
        <td<?= $Page->createdBy->cellAttributes() ?>>
<span<?= $Page->createdBy->viewAttributes() ?>>
<?= $Page->createdBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->createdDateTime->Visible) { // createdDateTime ?>
        <!-- createdDateTime -->
        <td<?= $Page->createdDateTime->cellAttributes() ?>>
<span<?= $Page->createdDateTime->viewAttributes() ?>>
<?= $Page->createdDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
        <!-- PatientTypee -->
        <td<?= $Page->PatientTypee->cellAttributes() ?>>
<span<?= $Page->PatientTypee->viewAttributes() ?>>
<?= $Page->PatientTypee->getViewValue() ?></span>
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
