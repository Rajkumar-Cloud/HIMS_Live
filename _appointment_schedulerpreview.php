<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE, "utf-8");

// Create page object
$_appointment_scheduler_preview = new _appointment_scheduler_preview();

// Run the page
$_appointment_scheduler_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_appointment_scheduler_preview->Page_Render();
?>
<?php $_appointment_scheduler_preview->showPageHeader(); ?>
<div class="card ew-grid _appointment_scheduler"><!-- .card -->
<?php if ($_appointment_scheduler_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$_appointment_scheduler_preview->renderListOptions();

// Render list options (header, left)
$_appointment_scheduler_preview->ListOptions->render("header", "left");
?>
<?php if ($_appointment_scheduler->id->Visible) { // id ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->id) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->id->headerCellClass() ?>"><?php echo $_appointment_scheduler->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->id->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->id->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->id->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->start_date->Visible) { // start_date ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->start_date) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->start_date->headerCellClass() ?>"><?php echo $_appointment_scheduler->start_date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->start_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->start_date->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->start_date->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->start_date->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->start_date->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->end_date->Visible) { // end_date ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->end_date) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->end_date->headerCellClass() ?>"><?php echo $_appointment_scheduler->end_date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->end_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->end_date->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->end_date->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->end_date->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->end_date->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->patientID->Visible) { // patientID ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->patientID) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->patientID->headerCellClass() ?>"><?php echo $_appointment_scheduler->patientID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->patientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->patientID->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->patientID->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->patientID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->patientID->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->patientName->Visible) { // patientName ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->patientName) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->patientName->headerCellClass() ?>"><?php echo $_appointment_scheduler->patientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->patientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->patientName->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->patientName->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->patientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->patientName->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->DoctorID) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->DoctorID->headerCellClass() ?>"><?php echo $_appointment_scheduler->DoctorID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->DoctorID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->DoctorID->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->DoctorID->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->DoctorID->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->DoctorName) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->DoctorName->headerCellClass() ?>"><?php echo $_appointment_scheduler->DoctorName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->DoctorName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->DoctorName->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->DoctorName->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->DoctorName->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->AppointmentStatus) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->AppointmentStatus->headerCellClass() ?>"><?php echo $_appointment_scheduler->AppointmentStatus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->AppointmentStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->AppointmentStatus->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->AppointmentStatus->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->AppointmentStatus->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->AppointmentStatus->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->status->Visible) { // status ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->status) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->status->headerCellClass() ?>"><?php echo $_appointment_scheduler->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->status->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->status->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->status->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->DoctorCode) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->DoctorCode->headerCellClass() ?>"><?php echo $_appointment_scheduler->DoctorCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->DoctorCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->DoctorCode->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->DoctorCode->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorCode->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->DoctorCode->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Department->Visible) { // Department ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->Department) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->Department->headerCellClass() ?>"><?php echo $_appointment_scheduler->Department->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->Department->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->Department->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->Department->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Department->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->Department->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->scheduler_id) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->scheduler_id->headerCellClass() ?>"><?php echo $_appointment_scheduler->scheduler_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->scheduler_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->scheduler_id->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->scheduler_id->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->scheduler_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->scheduler_id->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->text->Visible) { // text ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->text) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->text->headerCellClass() ?>"><?php echo $_appointment_scheduler->text->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->text->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->text->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->text->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->text->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->text->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->appointment_status) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->appointment_status->headerCellClass() ?>"><?php echo $_appointment_scheduler->appointment_status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->appointment_status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->appointment_status->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->appointment_status->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->appointment_status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->appointment_status->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->PId->Visible) { // PId ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->PId) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->PId->headerCellClass() ?>"><?php echo $_appointment_scheduler->PId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->PId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->PId->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->PId->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->PId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->PId->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->MobileNumber) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->MobileNumber->headerCellClass() ?>"><?php echo $_appointment_scheduler->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->MobileNumber->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->MobileNumber->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->MobileNumber->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->MobileNumber->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->SchEmail) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->SchEmail->headerCellClass() ?>"><?php echo $_appointment_scheduler->SchEmail->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->SchEmail->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->SchEmail->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->SchEmail->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->SchEmail->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->SchEmail->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->appointment_type) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->appointment_type->headerCellClass() ?>"><?php echo $_appointment_scheduler->appointment_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->appointment_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->appointment_type->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->appointment_type->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->appointment_type->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->appointment_type->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Notified->Visible) { // Notified ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->Notified) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->Notified->headerCellClass() ?>"><?php echo $_appointment_scheduler->Notified->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->Notified->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->Notified->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->Notified->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Notified->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->Notified->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Purpose->Visible) { // Purpose ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->Purpose) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->Purpose->headerCellClass() ?>"><?php echo $_appointment_scheduler->Purpose->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->Purpose->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->Purpose->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->Purpose->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Purpose->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->Purpose->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Notes->Visible) { // Notes ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->Notes) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->Notes->headerCellClass() ?>"><?php echo $_appointment_scheduler->Notes->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->Notes->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->Notes->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->Notes->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Notes->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->Notes->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->PatientType->Visible) { // PatientType ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->PatientType) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->PatientType->headerCellClass() ?>"><?php echo $_appointment_scheduler->PatientType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->PatientType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->PatientType->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->PatientType->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->PatientType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->PatientType->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Referal->Visible) { // Referal ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->Referal) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->Referal->headerCellClass() ?>"><?php echo $_appointment_scheduler->Referal->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->Referal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->Referal->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->Referal->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Referal->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->Referal->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->paymentType->Visible) { // paymentType ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->paymentType) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->paymentType->headerCellClass() ?>"><?php echo $_appointment_scheduler->paymentType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->paymentType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->paymentType->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->paymentType->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->paymentType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->paymentType->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->WhereDidYouHear) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->WhereDidYouHear->headerCellClass() ?>"><?php echo $_appointment_scheduler->WhereDidYouHear->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->WhereDidYouHear->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->WhereDidYouHear->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->WhereDidYouHear->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->WhereDidYouHear->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->HospID->Visible) { // HospID ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->HospID) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->HospID->headerCellClass() ?>"><?php echo $_appointment_scheduler->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->HospID->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->HospID->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->HospID->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->createdBy->Visible) { // createdBy ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->createdBy) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->createdBy->headerCellClass() ?>"><?php echo $_appointment_scheduler->createdBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->createdBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->createdBy->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->createdBy->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->createdBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->createdBy->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->createdDateTime->Visible) { // createdDateTime ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->createdDateTime) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->createdDateTime->headerCellClass() ?>"><?php echo $_appointment_scheduler->createdDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->createdDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->createdDateTime->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->createdDateTime->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->createdDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->createdDateTime->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
	<?php if ($_appointment_scheduler->SortUrl($_appointment_scheduler->PatientTypee) == "") { ?>
		<th class="<?php echo $_appointment_scheduler->PatientTypee->headerCellClass() ?>"><?php echo $_appointment_scheduler->PatientTypee->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $_appointment_scheduler->PatientTypee->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $_appointment_scheduler->PatientTypee->Name ?>" data-sort-order="<?php echo $_appointment_scheduler_preview->SortField == $_appointment_scheduler->PatientTypee->Name && $_appointment_scheduler_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $_appointment_scheduler->PatientTypee->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($_appointment_scheduler_preview->SortField == $_appointment_scheduler->PatientTypee->Name) { ?><?php if ($_appointment_scheduler_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($_appointment_scheduler_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$_appointment_scheduler_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$_appointment_scheduler_preview->RecCount = 0;
$_appointment_scheduler_preview->RowCnt = 0;
while ($_appointment_scheduler_preview->Recordset && !$_appointment_scheduler_preview->Recordset->EOF) {

	// Init row class and style
	$_appointment_scheduler_preview->RecCount++;
	$_appointment_scheduler_preview->RowCnt++;
	$_appointment_scheduler_preview->CssStyle = "";
	$_appointment_scheduler_preview->loadListRowValues($_appointment_scheduler_preview->Recordset);

	// Render row
	$_appointment_scheduler_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$_appointment_scheduler_preview->resetAttributes();
	$_appointment_scheduler_preview->renderListRow();

	// Render list options
	$_appointment_scheduler_preview->renderListOptions();
?>
	<tr<?php echo $_appointment_scheduler_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$_appointment_scheduler_preview->ListOptions->render("body", "left", $_appointment_scheduler_preview->RowCnt);
?>
<?php if ($_appointment_scheduler->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $_appointment_scheduler->id->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->id->viewAttributes() ?>>
<?php echo $_appointment_scheduler->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->start_date->Visible) { // start_date ?>
		<!-- start_date -->
		<td<?php echo $_appointment_scheduler->start_date->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->start_date->viewAttributes() ?>>
<?php echo $_appointment_scheduler->start_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->end_date->Visible) { // end_date ?>
		<!-- end_date -->
		<td<?php echo $_appointment_scheduler->end_date->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->end_date->viewAttributes() ?>>
<?php echo $_appointment_scheduler->end_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->patientID->Visible) { // patientID ?>
		<!-- patientID -->
		<td<?php echo $_appointment_scheduler->patientID->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->patientID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->patientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->patientName->Visible) { // patientName ?>
		<!-- patientName -->
		<td<?php echo $_appointment_scheduler->patientName->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->patientName->viewAttributes() ?>>
<?php echo $_appointment_scheduler->patientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
		<!-- DoctorID -->
		<td<?php echo $_appointment_scheduler->DoctorID->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->DoctorID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
		<!-- DoctorName -->
		<td<?php echo $_appointment_scheduler->DoctorName->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->DoctorName->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<!-- AppointmentStatus -->
		<td<?php echo $_appointment_scheduler->AppointmentStatus->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->AppointmentStatus->viewAttributes() ?>>
<?php echo $_appointment_scheduler->AppointmentStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $_appointment_scheduler->status->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->status->viewAttributes() ?>>
<?php echo $_appointment_scheduler->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
		<!-- DoctorCode -->
		<td<?php echo $_appointment_scheduler->DoctorCode->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->DoctorCode->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->Department->Visible) { // Department ?>
		<!-- Department -->
		<td<?php echo $_appointment_scheduler->Department->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->Department->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
		<!-- scheduler_id -->
		<td<?php echo $_appointment_scheduler->scheduler_id->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->scheduler_id->viewAttributes() ?>>
<?php echo $_appointment_scheduler->scheduler_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->text->Visible) { // text ?>
		<!-- text -->
		<td<?php echo $_appointment_scheduler->text->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->text->viewAttributes() ?>>
<?php echo $_appointment_scheduler->text->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
		<!-- appointment_status -->
		<td<?php echo $_appointment_scheduler->appointment_status->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->appointment_status->viewAttributes() ?>>
<?php echo $_appointment_scheduler->appointment_status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->PId->Visible) { // PId ?>
		<!-- PId -->
		<td<?php echo $_appointment_scheduler->PId->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->PId->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $_appointment_scheduler->MobileNumber->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->MobileNumber->viewAttributes() ?>>
<?php echo $_appointment_scheduler->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
		<!-- SchEmail -->
		<td<?php echo $_appointment_scheduler->SchEmail->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->SchEmail->viewAttributes() ?>>
<?php echo $_appointment_scheduler->SchEmail->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
		<!-- appointment_type -->
		<td<?php echo $_appointment_scheduler->appointment_type->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->appointment_type->viewAttributes() ?>>
<?php echo $_appointment_scheduler->appointment_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->Notified->Visible) { // Notified ?>
		<!-- Notified -->
		<td<?php echo $_appointment_scheduler->Notified->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->Notified->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Notified->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->Purpose->Visible) { // Purpose ?>
		<!-- Purpose -->
		<td<?php echo $_appointment_scheduler->Purpose->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->Purpose->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Purpose->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->Notes->Visible) { // Notes ?>
		<!-- Notes -->
		<td<?php echo $_appointment_scheduler->Notes->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->Notes->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Notes->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->PatientType->Visible) { // PatientType ?>
		<!-- PatientType -->
		<td<?php echo $_appointment_scheduler->PatientType->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->PatientType->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PatientType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->Referal->Visible) { // Referal ?>
		<!-- Referal -->
		<td<?php echo $_appointment_scheduler->Referal->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->Referal->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Referal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->paymentType->Visible) { // paymentType ?>
		<!-- paymentType -->
		<td<?php echo $_appointment_scheduler->paymentType->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->paymentType->viewAttributes() ?>>
<?php echo $_appointment_scheduler->paymentType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<!-- WhereDidYouHear -->
		<td<?php echo $_appointment_scheduler->WhereDidYouHear->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->WhereDidYouHear->viewAttributes() ?>>
<?php echo $_appointment_scheduler->WhereDidYouHear->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $_appointment_scheduler->HospID->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->HospID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->createdBy->Visible) { // createdBy ?>
		<!-- createdBy -->
		<td<?php echo $_appointment_scheduler->createdBy->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->createdBy->viewAttributes() ?>>
<?php echo $_appointment_scheduler->createdBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->createdDateTime->Visible) { // createdDateTime ?>
		<!-- createdDateTime -->
		<td<?php echo $_appointment_scheduler->createdDateTime->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->createdDateTime->viewAttributes() ?>>
<?php echo $_appointment_scheduler->createdDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
		<!-- PatientTypee -->
		<td<?php echo $_appointment_scheduler->PatientTypee->cellAttributes() ?>>
<span<?php echo $_appointment_scheduler->PatientTypee->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PatientTypee->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$_appointment_scheduler_preview->ListOptions->render("body", "right", $_appointment_scheduler_preview->RowCnt);
?>
	</tr>
<?php
	$_appointment_scheduler_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($_appointment_scheduler_preview->TotalRecs > 0) { ?>
<?php if (!isset($_appointment_scheduler_preview->Pager)) $_appointment_scheduler_preview->Pager = new PrevNextPager($_appointment_scheduler_preview->StartRec, $_appointment_scheduler_preview->DisplayRecs, $_appointment_scheduler_preview->TotalRecs) ?>
<?php if ($_appointment_scheduler_preview->Pager->RecordCount > 0 && $_appointment_scheduler_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($_appointment_scheduler_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $_appointment_scheduler_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($_appointment_scheduler_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $_appointment_scheduler_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($_appointment_scheduler_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $_appointment_scheduler_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($_appointment_scheduler_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $_appointment_scheduler_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $_appointment_scheduler_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $_appointment_scheduler_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $_appointment_scheduler_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($_appointment_scheduler_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$_appointment_scheduler_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($_appointment_scheduler_preview->Recordset)
	$_appointment_scheduler_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$_appointment_scheduler_preview->terminate();
?>