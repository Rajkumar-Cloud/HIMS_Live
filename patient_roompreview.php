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
$patient_room_preview = new patient_room_preview();

// Run the page
$patient_room_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_room_preview->Page_Render();
?>
<?php $patient_room_preview->showPageHeader(); ?>
<div class="card ew-grid patient_room"><!-- .card -->
<?php if ($patient_room_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_room_preview->renderListOptions();

// Render list options (header, left)
$patient_room_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_room->id->Visible) { // id ?>
	<?php if ($patient_room->SortUrl($patient_room->id) == "") { ?>
		<th class="<?php echo $patient_room->id->headerCellClass() ?>"><?php echo $patient_room->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->id->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->id->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->id->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Reception->Visible) { // Reception ?>
	<?php if ($patient_room->SortUrl($patient_room->Reception) == "") { ?>
		<th class="<?php echo $patient_room->Reception->headerCellClass() ?>"><?php echo $patient_room->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->Reception->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->Reception->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->Reception->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->Reception->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_room->SortUrl($patient_room->PatientId) == "") { ?>
		<th class="<?php echo $patient_room->PatientId->headerCellClass() ?>"><?php echo $patient_room->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->PatientId->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->PatientId->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->PatientId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->PatientId->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_room->SortUrl($patient_room->mrnno) == "") { ?>
		<th class="<?php echo $patient_room->mrnno->headerCellClass() ?>"><?php echo $patient_room->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->mrnno->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->mrnno->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->mrnno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->mrnno->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_room->SortUrl($patient_room->PatientName) == "") { ?>
		<th class="<?php echo $patient_room->PatientName->headerCellClass() ?>"><?php echo $patient_room->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->PatientName->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->PatientName->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->PatientName->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Gender->Visible) { // Gender ?>
	<?php if ($patient_room->SortUrl($patient_room->Gender) == "") { ?>
		<th class="<?php echo $patient_room->Gender->headerCellClass() ?>"><?php echo $patient_room->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->Gender->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->Gender->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->Gender->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->RoomID->Visible) { // RoomID ?>
	<?php if ($patient_room->SortUrl($patient_room->RoomID) == "") { ?>
		<th class="<?php echo $patient_room->RoomID->headerCellClass() ?>"><?php echo $patient_room->RoomID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->RoomID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->RoomID->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->RoomID->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->RoomID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->RoomID->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->RoomNo->Visible) { // RoomNo ?>
	<?php if ($patient_room->SortUrl($patient_room->RoomNo) == "") { ?>
		<th class="<?php echo $patient_room->RoomNo->headerCellClass() ?>"><?php echo $patient_room->RoomNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->RoomNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->RoomNo->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->RoomNo->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->RoomNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->RoomNo->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->RoomType->Visible) { // RoomType ?>
	<?php if ($patient_room->SortUrl($patient_room->RoomType) == "") { ?>
		<th class="<?php echo $patient_room->RoomType->headerCellClass() ?>"><?php echo $patient_room->RoomType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->RoomType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->RoomType->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->RoomType->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->RoomType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->RoomType->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->SharingRoom->Visible) { // SharingRoom ?>
	<?php if ($patient_room->SortUrl($patient_room->SharingRoom) == "") { ?>
		<th class="<?php echo $patient_room->SharingRoom->headerCellClass() ?>"><?php echo $patient_room->SharingRoom->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->SharingRoom->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->SharingRoom->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->SharingRoom->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->SharingRoom->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->SharingRoom->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Amount->Visible) { // Amount ?>
	<?php if ($patient_room->SortUrl($patient_room->Amount) == "") { ?>
		<th class="<?php echo $patient_room->Amount->headerCellClass() ?>"><?php echo $patient_room->Amount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->Amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->Amount->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->Amount->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->Amount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->Amount->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Startdatetime->Visible) { // Startdatetime ?>
	<?php if ($patient_room->SortUrl($patient_room->Startdatetime) == "") { ?>
		<th class="<?php echo $patient_room->Startdatetime->headerCellClass() ?>"><?php echo $patient_room->Startdatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->Startdatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->Startdatetime->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->Startdatetime->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->Startdatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->Startdatetime->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Enddatetime->Visible) { // Enddatetime ?>
	<?php if ($patient_room->SortUrl($patient_room->Enddatetime) == "") { ?>
		<th class="<?php echo $patient_room->Enddatetime->headerCellClass() ?>"><?php echo $patient_room->Enddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->Enddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->Enddatetime->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->Enddatetime->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->Enddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->Enddatetime->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->DaysHours->Visible) { // DaysHours ?>
	<?php if ($patient_room->SortUrl($patient_room->DaysHours) == "") { ?>
		<th class="<?php echo $patient_room->DaysHours->headerCellClass() ?>"><?php echo $patient_room->DaysHours->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->DaysHours->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->DaysHours->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->DaysHours->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->DaysHours->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->DaysHours->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Days->Visible) { // Days ?>
	<?php if ($patient_room->SortUrl($patient_room->Days) == "") { ?>
		<th class="<?php echo $patient_room->Days->headerCellClass() ?>"><?php echo $patient_room->Days->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->Days->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->Days->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->Days->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->Days->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->Days->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Hours->Visible) { // Hours ?>
	<?php if ($patient_room->SortUrl($patient_room->Hours) == "") { ?>
		<th class="<?php echo $patient_room->Hours->headerCellClass() ?>"><?php echo $patient_room->Hours->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->Hours->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->Hours->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->Hours->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->Hours->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->Hours->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->TotalAmount->Visible) { // TotalAmount ?>
	<?php if ($patient_room->SortUrl($patient_room->TotalAmount) == "") { ?>
		<th class="<?php echo $patient_room->TotalAmount->headerCellClass() ?>"><?php echo $patient_room->TotalAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->TotalAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->TotalAmount->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->TotalAmount->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->TotalAmount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->TotalAmount->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->PatID->Visible) { // PatID ?>
	<?php if ($patient_room->SortUrl($patient_room->PatID) == "") { ?>
		<th class="<?php echo $patient_room->PatID->headerCellClass() ?>"><?php echo $patient_room->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->PatID->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->PatID->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->PatID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->PatID->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_room->SortUrl($patient_room->MobileNumber) == "") { ?>
		<th class="<?php echo $patient_room->MobileNumber->headerCellClass() ?>"><?php echo $patient_room->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->MobileNumber->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->MobileNumber->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->MobileNumber->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->MobileNumber->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->HospID->Visible) { // HospID ?>
	<?php if ($patient_room->SortUrl($patient_room->HospID) == "") { ?>
		<th class="<?php echo $patient_room->HospID->headerCellClass() ?>"><?php echo $patient_room->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->HospID->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->HospID->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->HospID->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->status->Visible) { // status ?>
	<?php if ($patient_room->SortUrl($patient_room->status) == "") { ?>
		<th class="<?php echo $patient_room->status->headerCellClass() ?>"><?php echo $patient_room->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->status->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->status->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->status->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->createdby->Visible) { // createdby ?>
	<?php if ($patient_room->SortUrl($patient_room->createdby) == "") { ?>
		<th class="<?php echo $patient_room->createdby->headerCellClass() ?>"><?php echo $patient_room->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->createdby->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->createdby->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->createdby->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_room->SortUrl($patient_room->createddatetime) == "") { ?>
		<th class="<?php echo $patient_room->createddatetime->headerCellClass() ?>"><?php echo $patient_room->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->createddatetime->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->createddatetime->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->createddatetime->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_room->SortUrl($patient_room->modifiedby) == "") { ?>
		<th class="<?php echo $patient_room->modifiedby->headerCellClass() ?>"><?php echo $patient_room->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->modifiedby->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->modifiedby->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->modifiedby->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_room->SortUrl($patient_room->modifieddatetime) == "") { ?>
		<th class="<?php echo $patient_room->modifieddatetime->headerCellClass() ?>"><?php echo $patient_room->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_room->modifieddatetime->Name ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room->modifieddatetime->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_room->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room->modifieddatetime->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_room_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_room_preview->RecCount = 0;
$patient_room_preview->RowCnt = 0;
while ($patient_room_preview->Recordset && !$patient_room_preview->Recordset->EOF) {

	// Init row class and style
	$patient_room_preview->RecCount++;
	$patient_room_preview->RowCnt++;
	$patient_room_preview->CssStyle = "";
	$patient_room_preview->loadListRowValues($patient_room_preview->Recordset);

	// Render row
	$patient_room_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_room_preview->resetAttributes();
	$patient_room_preview->renderListRow();

	// Render list options
	$patient_room_preview->renderListOptions();
?>
	<tr<?php echo $patient_room_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_room_preview->ListOptions->render("body", "left", $patient_room_preview->RowCnt);
?>
<?php if ($patient_room->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_room->id->cellAttributes() ?>>
<span<?php echo $patient_room->id->viewAttributes() ?>>
<?php echo $patient_room->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_room->Reception->cellAttributes() ?>>
<span<?php echo $patient_room->Reception->viewAttributes() ?>>
<?php echo $patient_room->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $patient_room->PatientId->cellAttributes() ?>>
<span<?php echo $patient_room->PatientId->viewAttributes() ?>>
<?php echo $patient_room->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_room->mrnno->cellAttributes() ?>>
<span<?php echo $patient_room->mrnno->viewAttributes() ?>>
<?php echo $patient_room->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_room->PatientName->cellAttributes() ?>>
<span<?php echo $patient_room->PatientName->viewAttributes() ?>>
<?php echo $patient_room->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_room->Gender->cellAttributes() ?>>
<span<?php echo $patient_room->Gender->viewAttributes() ?>>
<?php echo $patient_room->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->RoomID->Visible) { // RoomID ?>
		<!-- RoomID -->
		<td<?php echo $patient_room->RoomID->cellAttributes() ?>>
<span<?php echo $patient_room->RoomID->viewAttributes() ?>>
<?php echo $patient_room->RoomID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->RoomNo->Visible) { // RoomNo ?>
		<!-- RoomNo -->
		<td<?php echo $patient_room->RoomNo->cellAttributes() ?>>
<span<?php echo $patient_room->RoomNo->viewAttributes() ?>>
<?php echo $patient_room->RoomNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->RoomType->Visible) { // RoomType ?>
		<!-- RoomType -->
		<td<?php echo $patient_room->RoomType->cellAttributes() ?>>
<span<?php echo $patient_room->RoomType->viewAttributes() ?>>
<?php echo $patient_room->RoomType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->SharingRoom->Visible) { // SharingRoom ?>
		<!-- SharingRoom -->
		<td<?php echo $patient_room->SharingRoom->cellAttributes() ?>>
<span<?php echo $patient_room->SharingRoom->viewAttributes() ?>>
<?php echo $patient_room->SharingRoom->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->Amount->Visible) { // Amount ?>
		<!-- Amount -->
		<td<?php echo $patient_room->Amount->cellAttributes() ?>>
<span<?php echo $patient_room->Amount->viewAttributes() ?>>
<?php echo $patient_room->Amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->Startdatetime->Visible) { // Startdatetime ?>
		<!-- Startdatetime -->
		<td<?php echo $patient_room->Startdatetime->cellAttributes() ?>>
<span<?php echo $patient_room->Startdatetime->viewAttributes() ?>>
<?php echo $patient_room->Startdatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->Enddatetime->Visible) { // Enddatetime ?>
		<!-- Enddatetime -->
		<td<?php echo $patient_room->Enddatetime->cellAttributes() ?>>
<span<?php echo $patient_room->Enddatetime->viewAttributes() ?>>
<?php echo $patient_room->Enddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->DaysHours->Visible) { // DaysHours ?>
		<!-- DaysHours -->
		<td<?php echo $patient_room->DaysHours->cellAttributes() ?>>
<span<?php echo $patient_room->DaysHours->viewAttributes() ?>>
<?php echo $patient_room->DaysHours->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->Days->Visible) { // Days ?>
		<!-- Days -->
		<td<?php echo $patient_room->Days->cellAttributes() ?>>
<span<?php echo $patient_room->Days->viewAttributes() ?>>
<?php echo $patient_room->Days->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->Hours->Visible) { // Hours ?>
		<!-- Hours -->
		<td<?php echo $patient_room->Hours->cellAttributes() ?>>
<span<?php echo $patient_room->Hours->viewAttributes() ?>>
<?php echo $patient_room->Hours->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->TotalAmount->Visible) { // TotalAmount ?>
		<!-- TotalAmount -->
		<td<?php echo $patient_room->TotalAmount->cellAttributes() ?>>
<span<?php echo $patient_room->TotalAmount->viewAttributes() ?>>
<?php echo $patient_room->TotalAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $patient_room->PatID->cellAttributes() ?>>
<span<?php echo $patient_room->PatID->viewAttributes() ?>>
<?php echo $patient_room->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $patient_room->MobileNumber->cellAttributes() ?>>
<span<?php echo $patient_room->MobileNumber->viewAttributes() ?>>
<?php echo $patient_room->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $patient_room->HospID->cellAttributes() ?>>
<span<?php echo $patient_room->HospID->viewAttributes() ?>>
<?php echo $patient_room->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_room->status->cellAttributes() ?>>
<span<?php echo $patient_room->status->viewAttributes() ?>>
<?php echo $patient_room->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $patient_room->createdby->cellAttributes() ?>>
<span<?php echo $patient_room->createdby->viewAttributes() ?>>
<?php echo $patient_room->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $patient_room->createddatetime->cellAttributes() ?>>
<span<?php echo $patient_room->createddatetime->viewAttributes() ?>>
<?php echo $patient_room->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $patient_room->modifiedby->cellAttributes() ?>>
<span<?php echo $patient_room->modifiedby->viewAttributes() ?>>
<?php echo $patient_room->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $patient_room->modifieddatetime->cellAttributes() ?>>
<span<?php echo $patient_room->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_room->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_room_preview->ListOptions->render("body", "right", $patient_room_preview->RowCnt);
?>
	</tr>
<?php
	$patient_room_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_room_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_room_preview->Pager)) $patient_room_preview->Pager = new PrevNextPager($patient_room_preview->StartRec, $patient_room_preview->DisplayRecs, $patient_room_preview->TotalRecs) ?>
<?php if ($patient_room_preview->Pager->RecordCount > 0 && $patient_room_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_room_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_room_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_room_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_room_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_room_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_room_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_room_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_room_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_room_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_room_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_room_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_room_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_room_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($patient_room_preview->Recordset)
	$patient_room_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_room_preview->terminate();
?>