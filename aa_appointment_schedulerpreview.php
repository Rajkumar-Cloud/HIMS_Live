<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE, "utf-8");

// Create page object
$aa_appointment_scheduler_preview = new aa_appointment_scheduler_preview();

// Run the page
$aa_appointment_scheduler_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$aa_appointment_scheduler_preview->Page_Render();
?>
<?php $aa_appointment_scheduler_preview->showPageHeader(); ?>
<?php if ($aa_appointment_scheduler_preview->TotalRecords > 0) { ?>
<div class="card ew-grid aa_appointment_scheduler"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$aa_appointment_scheduler_preview->renderListOptions();

// Render list options (header, left)
$aa_appointment_scheduler_preview->ListOptions->render("header", "left");
?>
<?php if ($aa_appointment_scheduler_preview->id->Visible) { // id ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->id) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->id->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->id->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->id->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->id->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->start_date->Visible) { // start_date ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->start_date) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->start_date->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->start_date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->start_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->start_date->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->start_date->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->start_date->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->end_date->Visible) { // end_date ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->end_date) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->end_date->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->end_date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->end_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->end_date->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->end_date->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->end_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->end_date->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->patientID->Visible) { // patientID ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->patientID) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->patientID->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->patientID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->patientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->patientID->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->patientID->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->patientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->patientID->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->patientName->Visible) { // patientName ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->patientName) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->patientName->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->patientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->patientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->patientName->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->patientName->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->patientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->patientName->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->DoctorID->Visible) { // DoctorID ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->DoctorID) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->DoctorID->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->DoctorID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->DoctorID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->DoctorID->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->DoctorID->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->DoctorID->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->DoctorID->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->DoctorName->Visible) { // DoctorName ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->DoctorName) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->DoctorName->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->DoctorName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->DoctorName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->DoctorName->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->DoctorName->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->DoctorName->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->DoctorName->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->AppointmentStatus) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->AppointmentStatus->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->AppointmentStatus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->AppointmentStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->AppointmentStatus->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->AppointmentStatus->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->AppointmentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->AppointmentStatus->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->status->Visible) { // status ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->status) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->status->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->status->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->status->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->status->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->DoctorCode->Visible) { // DoctorCode ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->DoctorCode) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->DoctorCode->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->DoctorCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->DoctorCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->DoctorCode->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->DoctorCode->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->DoctorCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->DoctorCode->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->Department->Visible) { // Department ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->Department) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->Department->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->Department->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->Department->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->Department->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->Department->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->Department->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->scheduler_id->Visible) { // scheduler_id ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->scheduler_id) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->scheduler_id->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->scheduler_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->scheduler_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->scheduler_id->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->scheduler_id->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->scheduler_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->scheduler_id->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->text->Visible) { // text ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->text) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->text->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->text->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->text->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->text->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->text->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->text->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->text->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->appointment_status->Visible) { // appointment_status ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->appointment_status) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->appointment_status->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->appointment_status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->appointment_status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->appointment_status->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->appointment_status->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->appointment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->appointment_status->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->PId->Visible) { // PId ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->PId) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->PId->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->PId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->PId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->PId->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->PId->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->PId->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->MobileNumber) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->MobileNumber->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->MobileNumber->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->MobileNumber->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->MobileNumber->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->SchEmail->Visible) { // SchEmail ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->SchEmail) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->SchEmail->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->SchEmail->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->SchEmail->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->SchEmail->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->SchEmail->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->SchEmail->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->SchEmail->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->appointment_type->Visible) { // appointment_type ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->appointment_type) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->appointment_type->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->appointment_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->appointment_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->appointment_type->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->appointment_type->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->appointment_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->appointment_type->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->Notified->Visible) { // Notified ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->Notified) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->Notified->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->Notified->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->Notified->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->Notified->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->Notified->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->Notified->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->Notified->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->Purpose->Visible) { // Purpose ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->Purpose) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->Purpose->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->Purpose->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->Purpose->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->Purpose->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->Purpose->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->Purpose->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->Purpose->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->Notes->Visible) { // Notes ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->Notes) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->Notes->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->Notes->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->Notes->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->Notes->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->Notes->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->Notes->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->Notes->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->PatientType->Visible) { // PatientType ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->PatientType) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->PatientType->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->PatientType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->PatientType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->PatientType->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->PatientType->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->PatientType->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->PatientType->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->Referal->Visible) { // Referal ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->Referal) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->Referal->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->Referal->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->Referal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->Referal->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->Referal->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->Referal->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->Referal->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->paymentType->Visible) { // paymentType ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->paymentType) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->paymentType->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->paymentType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->paymentType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->paymentType->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->paymentType->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->paymentType->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->paymentType->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->WhereDidYouHear) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->WhereDidYouHear->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->WhereDidYouHear->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->WhereDidYouHear->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->WhereDidYouHear->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->WhereDidYouHear->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->WhereDidYouHear->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->HospID->Visible) { // HospID ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->HospID) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->HospID->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->HospID->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->HospID->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->HospID->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->createdBy->Visible) { // createdBy ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->createdBy) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->createdBy->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->createdBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->createdBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->createdBy->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->createdBy->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->createdBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->createdBy->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->createdDateTime->Visible) { // createdDateTime ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->createdDateTime) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->createdDateTime->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->createdDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->createdDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->createdDateTime->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->createdDateTime->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->createdDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->createdDateTime->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->PatientTypee->Visible) { // PatientTypee ?>
	<?php if ($aa_appointment_scheduler->SortUrl($aa_appointment_scheduler_preview->PatientTypee) == "") { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->PatientTypee->headerCellClass() ?>"><?php echo $aa_appointment_scheduler_preview->PatientTypee->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $aa_appointment_scheduler_preview->PatientTypee->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($aa_appointment_scheduler_preview->PatientTypee->Name) ?>" data-sort-order="<?php echo $aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->PatientTypee->Name && $aa_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $aa_appointment_scheduler_preview->PatientTypee->caption() ?></span><span class="ew-table-header-sort"><?php if ($aa_appointment_scheduler_preview->SortField == $aa_appointment_scheduler_preview->PatientTypee->Name) { ?><?php if ($aa_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($aa_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$aa_appointment_scheduler_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$aa_appointment_scheduler_preview->RecCount = 0;
$aa_appointment_scheduler_preview->RowCount = 0;
while ($aa_appointment_scheduler_preview->Recordset && !$aa_appointment_scheduler_preview->Recordset->EOF) {

	// Init row class and style
	$aa_appointment_scheduler_preview->RecCount++;
	$aa_appointment_scheduler_preview->RowCount++;
	$aa_appointment_scheduler_preview->CssStyle = "";
	$aa_appointment_scheduler_preview->loadListRowValues($aa_appointment_scheduler_preview->Recordset);

	// Render row
	$aa_appointment_scheduler->RowType = ROWTYPE_PREVIEW; // Preview record
	$aa_appointment_scheduler_preview->resetAttributes();
	$aa_appointment_scheduler_preview->renderListRow();

	// Render list options
	$aa_appointment_scheduler_preview->renderListOptions();
?>
	<tr <?php echo $aa_appointment_scheduler->rowAttributes() ?>>
<?php

// Render list options (body, left)
$aa_appointment_scheduler_preview->ListOptions->render("body", "left", $aa_appointment_scheduler_preview->RowCount);
?>
<?php if ($aa_appointment_scheduler_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $aa_appointment_scheduler_preview->id->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->id->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->start_date->Visible) { // start_date ?>
		<!-- start_date -->
		<td<?php echo $aa_appointment_scheduler_preview->start_date->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->start_date->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->start_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->end_date->Visible) { // end_date ?>
		<!-- end_date -->
		<td<?php echo $aa_appointment_scheduler_preview->end_date->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->end_date->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->end_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->patientID->Visible) { // patientID ?>
		<!-- patientID -->
		<td<?php echo $aa_appointment_scheduler_preview->patientID->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->patientID->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->patientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->patientName->Visible) { // patientName ?>
		<!-- patientName -->
		<td<?php echo $aa_appointment_scheduler_preview->patientName->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->patientName->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->patientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->DoctorID->Visible) { // DoctorID ?>
		<!-- DoctorID -->
		<td<?php echo $aa_appointment_scheduler_preview->DoctorID->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->DoctorID->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->DoctorID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->DoctorName->Visible) { // DoctorName ?>
		<!-- DoctorName -->
		<td<?php echo $aa_appointment_scheduler_preview->DoctorName->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->DoctorName->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->DoctorName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<!-- AppointmentStatus -->
		<td<?php echo $aa_appointment_scheduler_preview->AppointmentStatus->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->AppointmentStatus->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->AppointmentStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $aa_appointment_scheduler_preview->status->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->status->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->DoctorCode->Visible) { // DoctorCode ?>
		<!-- DoctorCode -->
		<td<?php echo $aa_appointment_scheduler_preview->DoctorCode->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->DoctorCode->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->DoctorCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->Department->Visible) { // Department ?>
		<!-- Department -->
		<td<?php echo $aa_appointment_scheduler_preview->Department->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->Department->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->scheduler_id->Visible) { // scheduler_id ?>
		<!-- scheduler_id -->
		<td<?php echo $aa_appointment_scheduler_preview->scheduler_id->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->scheduler_id->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->scheduler_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->text->Visible) { // text ?>
		<!-- text -->
		<td<?php echo $aa_appointment_scheduler_preview->text->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->text->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->text->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->appointment_status->Visible) { // appointment_status ?>
		<!-- appointment_status -->
		<td<?php echo $aa_appointment_scheduler_preview->appointment_status->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->appointment_status->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->appointment_status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->PId->Visible) { // PId ?>
		<!-- PId -->
		<td<?php echo $aa_appointment_scheduler_preview->PId->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->PId->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->PId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $aa_appointment_scheduler_preview->MobileNumber->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->MobileNumber->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->SchEmail->Visible) { // SchEmail ?>
		<!-- SchEmail -->
		<td<?php echo $aa_appointment_scheduler_preview->SchEmail->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->SchEmail->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->SchEmail->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->appointment_type->Visible) { // appointment_type ?>
		<!-- appointment_type -->
		<td<?php echo $aa_appointment_scheduler_preview->appointment_type->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->appointment_type->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->appointment_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->Notified->Visible) { // Notified ?>
		<!-- Notified -->
		<td<?php echo $aa_appointment_scheduler_preview->Notified->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->Notified->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->Notified->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->Purpose->Visible) { // Purpose ?>
		<!-- Purpose -->
		<td<?php echo $aa_appointment_scheduler_preview->Purpose->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->Purpose->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->Purpose->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->Notes->Visible) { // Notes ?>
		<!-- Notes -->
		<td<?php echo $aa_appointment_scheduler_preview->Notes->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->Notes->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->Notes->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->PatientType->Visible) { // PatientType ?>
		<!-- PatientType -->
		<td<?php echo $aa_appointment_scheduler_preview->PatientType->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->PatientType->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->PatientType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->Referal->Visible) { // Referal ?>
		<!-- Referal -->
		<td<?php echo $aa_appointment_scheduler_preview->Referal->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->Referal->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->Referal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->paymentType->Visible) { // paymentType ?>
		<!-- paymentType -->
		<td<?php echo $aa_appointment_scheduler_preview->paymentType->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->paymentType->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->paymentType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<!-- WhereDidYouHear -->
		<td<?php echo $aa_appointment_scheduler_preview->WhereDidYouHear->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->WhereDidYouHear->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->WhereDidYouHear->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $aa_appointment_scheduler_preview->HospID->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->HospID->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->createdBy->Visible) { // createdBy ?>
		<!-- createdBy -->
		<td<?php echo $aa_appointment_scheduler_preview->createdBy->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->createdBy->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->createdBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->createdDateTime->Visible) { // createdDateTime ?>
		<!-- createdDateTime -->
		<td<?php echo $aa_appointment_scheduler_preview->createdDateTime->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->createdDateTime->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->createdDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_preview->PatientTypee->Visible) { // PatientTypee ?>
		<!-- PatientTypee -->
		<td<?php echo $aa_appointment_scheduler_preview->PatientTypee->cellAttributes() ?>>
<span<?php echo $aa_appointment_scheduler_preview->PatientTypee->viewAttributes() ?>><?php echo $aa_appointment_scheduler_preview->PatientTypee->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$aa_appointment_scheduler_preview->ListOptions->render("body", "right", $aa_appointment_scheduler_preview->RowCount);
?>
	</tr>
<?php
	$aa_appointment_scheduler_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $aa_appointment_scheduler_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($aa_appointment_scheduler_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($aa_appointment_scheduler_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$aa_appointment_scheduler_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($aa_appointment_scheduler_preview->Recordset)
	$aa_appointment_scheduler_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$aa_appointment_scheduler_preview->terminate();
?>