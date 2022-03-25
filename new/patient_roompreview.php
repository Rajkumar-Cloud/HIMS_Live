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
<?php if ($patient_room_preview->TotalRecords > 0) { ?>
<div class="card ew-grid patient_room"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_room_preview->renderListOptions();

// Render list options (header, left)
$patient_room_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_room_preview->id->Visible) { // id ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->id) == "") { ?>
		<th class="<?php echo $patient_room_preview->id->headerCellClass() ?>"><?php echo $patient_room_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->id->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->id->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->id->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->Reception->Visible) { // Reception ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->Reception) == "") { ?>
		<th class="<?php echo $patient_room_preview->Reception->headerCellClass() ?>"><?php echo $patient_room_preview->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->Reception->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->Reception->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->Reception->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->PatientId) == "") { ?>
		<th class="<?php echo $patient_room_preview->PatientId->headerCellClass() ?>"><?php echo $patient_room_preview->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->PatientId->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->PatientId->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->PatientId->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->mrnno) == "") { ?>
		<th class="<?php echo $patient_room_preview->mrnno->headerCellClass() ?>"><?php echo $patient_room_preview->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->mrnno->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->mrnno->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->mrnno->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->PatientName) == "") { ?>
		<th class="<?php echo $patient_room_preview->PatientName->headerCellClass() ?>"><?php echo $patient_room_preview->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->PatientName->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->PatientName->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->PatientName->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->Gender->Visible) { // Gender ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->Gender) == "") { ?>
		<th class="<?php echo $patient_room_preview->Gender->headerCellClass() ?>"><?php echo $patient_room_preview->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->Gender->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->Gender->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->Gender->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->RoomID->Visible) { // RoomID ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->RoomID) == "") { ?>
		<th class="<?php echo $patient_room_preview->RoomID->headerCellClass() ?>"><?php echo $patient_room_preview->RoomID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->RoomID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->RoomID->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->RoomID->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->RoomID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->RoomID->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->RoomNo->Visible) { // RoomNo ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->RoomNo) == "") { ?>
		<th class="<?php echo $patient_room_preview->RoomNo->headerCellClass() ?>"><?php echo $patient_room_preview->RoomNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->RoomNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->RoomNo->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->RoomNo->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->RoomNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->RoomNo->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->RoomType->Visible) { // RoomType ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->RoomType) == "") { ?>
		<th class="<?php echo $patient_room_preview->RoomType->headerCellClass() ?>"><?php echo $patient_room_preview->RoomType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->RoomType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->RoomType->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->RoomType->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->RoomType->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->RoomType->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->SharingRoom->Visible) { // SharingRoom ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->SharingRoom) == "") { ?>
		<th class="<?php echo $patient_room_preview->SharingRoom->headerCellClass() ?>"><?php echo $patient_room_preview->SharingRoom->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->SharingRoom->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->SharingRoom->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->SharingRoom->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->SharingRoom->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->SharingRoom->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->Amount->Visible) { // Amount ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->Amount) == "") { ?>
		<th class="<?php echo $patient_room_preview->Amount->headerCellClass() ?>"><?php echo $patient_room_preview->Amount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->Amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->Amount->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->Amount->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->Amount->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->Startdatetime->Visible) { // Startdatetime ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->Startdatetime) == "") { ?>
		<th class="<?php echo $patient_room_preview->Startdatetime->headerCellClass() ?>"><?php echo $patient_room_preview->Startdatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->Startdatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->Startdatetime->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->Startdatetime->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->Startdatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->Startdatetime->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->Enddatetime->Visible) { // Enddatetime ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->Enddatetime) == "") { ?>
		<th class="<?php echo $patient_room_preview->Enddatetime->headerCellClass() ?>"><?php echo $patient_room_preview->Enddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->Enddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->Enddatetime->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->Enddatetime->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->Enddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->Enddatetime->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->DaysHours->Visible) { // DaysHours ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->DaysHours) == "") { ?>
		<th class="<?php echo $patient_room_preview->DaysHours->headerCellClass() ?>"><?php echo $patient_room_preview->DaysHours->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->DaysHours->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->DaysHours->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->DaysHours->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->DaysHours->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->DaysHours->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->Days->Visible) { // Days ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->Days) == "") { ?>
		<th class="<?php echo $patient_room_preview->Days->headerCellClass() ?>"><?php echo $patient_room_preview->Days->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->Days->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->Days->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->Days->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->Days->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->Days->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->Hours->Visible) { // Hours ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->Hours) == "") { ?>
		<th class="<?php echo $patient_room_preview->Hours->headerCellClass() ?>"><?php echo $patient_room_preview->Hours->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->Hours->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->Hours->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->Hours->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->Hours->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->Hours->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->TotalAmount->Visible) { // TotalAmount ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->TotalAmount) == "") { ?>
		<th class="<?php echo $patient_room_preview->TotalAmount->headerCellClass() ?>"><?php echo $patient_room_preview->TotalAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->TotalAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->TotalAmount->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->TotalAmount->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->TotalAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->TotalAmount->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->PatID->Visible) { // PatID ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->PatID) == "") { ?>
		<th class="<?php echo $patient_room_preview->PatID->headerCellClass() ?>"><?php echo $patient_room_preview->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->PatID->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->PatID->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->PatID->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->MobileNumber) == "") { ?>
		<th class="<?php echo $patient_room_preview->MobileNumber->headerCellClass() ?>"><?php echo $patient_room_preview->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->MobileNumber->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->MobileNumber->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->MobileNumber->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->HospID->Visible) { // HospID ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->HospID) == "") { ?>
		<th class="<?php echo $patient_room_preview->HospID->headerCellClass() ?>"><?php echo $patient_room_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->HospID->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->HospID->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->HospID->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->status->Visible) { // status ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->status) == "") { ?>
		<th class="<?php echo $patient_room_preview->status->headerCellClass() ?>"><?php echo $patient_room_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->status->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->status->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->status->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->createdby->Visible) { // createdby ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->createdby) == "") { ?>
		<th class="<?php echo $patient_room_preview->createdby->headerCellClass() ?>"><?php echo $patient_room_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->createdby->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->createdby->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->createdby->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->createddatetime) == "") { ?>
		<th class="<?php echo $patient_room_preview->createddatetime->headerCellClass() ?>"><?php echo $patient_room_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->createddatetime->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->createddatetime->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->modifiedby) == "") { ?>
		<th class="<?php echo $patient_room_preview->modifiedby->headerCellClass() ?>"><?php echo $patient_room_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->modifiedby->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->modifiedby->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_room->SortUrl($patient_room_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $patient_room_preview->modifieddatetime->headerCellClass() ?>"><?php echo $patient_room_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_room_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_room_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $patient_room_preview->SortField == $patient_room_preview->modifieddatetime->Name && $patient_room_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_preview->SortField == $patient_room_preview->modifieddatetime->Name) { ?><?php if ($patient_room_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$patient_room_preview->RowCount = 0;
while ($patient_room_preview->Recordset && !$patient_room_preview->Recordset->EOF) {

	// Init row class and style
	$patient_room_preview->RecCount++;
	$patient_room_preview->RowCount++;
	$patient_room_preview->CssStyle = "";
	$patient_room_preview->loadListRowValues($patient_room_preview->Recordset);

	// Render row
	$patient_room->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_room_preview->resetAttributes();
	$patient_room_preview->renderListRow();

	// Render list options
	$patient_room_preview->renderListOptions();
?>
	<tr <?php echo $patient_room->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_room_preview->ListOptions->render("body", "left", $patient_room_preview->RowCount);
?>
<?php if ($patient_room_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_room_preview->id->cellAttributes() ?>>
<span<?php echo $patient_room_preview->id->viewAttributes() ?>><?php echo $patient_room_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_room_preview->Reception->cellAttributes() ?>>
<span<?php echo $patient_room_preview->Reception->viewAttributes() ?>><?php echo $patient_room_preview->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $patient_room_preview->PatientId->cellAttributes() ?>>
<span<?php echo $patient_room_preview->PatientId->viewAttributes() ?>><?php echo $patient_room_preview->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_room_preview->mrnno->cellAttributes() ?>>
<span<?php echo $patient_room_preview->mrnno->viewAttributes() ?>><?php echo $patient_room_preview->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_room_preview->PatientName->cellAttributes() ?>>
<span<?php echo $patient_room_preview->PatientName->viewAttributes() ?>><?php echo $patient_room_preview->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_room_preview->Gender->cellAttributes() ?>>
<span<?php echo $patient_room_preview->Gender->viewAttributes() ?>><?php echo $patient_room_preview->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->RoomID->Visible) { // RoomID ?>
		<!-- RoomID -->
		<td<?php echo $patient_room_preview->RoomID->cellAttributes() ?>>
<span<?php echo $patient_room_preview->RoomID->viewAttributes() ?>><?php echo $patient_room_preview->RoomID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->RoomNo->Visible) { // RoomNo ?>
		<!-- RoomNo -->
		<td<?php echo $patient_room_preview->RoomNo->cellAttributes() ?>>
<span<?php echo $patient_room_preview->RoomNo->viewAttributes() ?>><?php echo $patient_room_preview->RoomNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->RoomType->Visible) { // RoomType ?>
		<!-- RoomType -->
		<td<?php echo $patient_room_preview->RoomType->cellAttributes() ?>>
<span<?php echo $patient_room_preview->RoomType->viewAttributes() ?>><?php echo $patient_room_preview->RoomType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->SharingRoom->Visible) { // SharingRoom ?>
		<!-- SharingRoom -->
		<td<?php echo $patient_room_preview->SharingRoom->cellAttributes() ?>>
<span<?php echo $patient_room_preview->SharingRoom->viewAttributes() ?>><?php echo $patient_room_preview->SharingRoom->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->Amount->Visible) { // Amount ?>
		<!-- Amount -->
		<td<?php echo $patient_room_preview->Amount->cellAttributes() ?>>
<span<?php echo $patient_room_preview->Amount->viewAttributes() ?>><?php echo $patient_room_preview->Amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->Startdatetime->Visible) { // Startdatetime ?>
		<!-- Startdatetime -->
		<td<?php echo $patient_room_preview->Startdatetime->cellAttributes() ?>>
<span<?php echo $patient_room_preview->Startdatetime->viewAttributes() ?>><?php echo $patient_room_preview->Startdatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->Enddatetime->Visible) { // Enddatetime ?>
		<!-- Enddatetime -->
		<td<?php echo $patient_room_preview->Enddatetime->cellAttributes() ?>>
<span<?php echo $patient_room_preview->Enddatetime->viewAttributes() ?>><?php echo $patient_room_preview->Enddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->DaysHours->Visible) { // DaysHours ?>
		<!-- DaysHours -->
		<td<?php echo $patient_room_preview->DaysHours->cellAttributes() ?>>
<span<?php echo $patient_room_preview->DaysHours->viewAttributes() ?>><?php echo $patient_room_preview->DaysHours->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->Days->Visible) { // Days ?>
		<!-- Days -->
		<td<?php echo $patient_room_preview->Days->cellAttributes() ?>>
<span<?php echo $patient_room_preview->Days->viewAttributes() ?>><?php echo $patient_room_preview->Days->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->Hours->Visible) { // Hours ?>
		<!-- Hours -->
		<td<?php echo $patient_room_preview->Hours->cellAttributes() ?>>
<span<?php echo $patient_room_preview->Hours->viewAttributes() ?>><?php echo $patient_room_preview->Hours->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->TotalAmount->Visible) { // TotalAmount ?>
		<!-- TotalAmount -->
		<td<?php echo $patient_room_preview->TotalAmount->cellAttributes() ?>>
<span<?php echo $patient_room_preview->TotalAmount->viewAttributes() ?>><?php echo $patient_room_preview->TotalAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $patient_room_preview->PatID->cellAttributes() ?>>
<span<?php echo $patient_room_preview->PatID->viewAttributes() ?>><?php echo $patient_room_preview->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $patient_room_preview->MobileNumber->cellAttributes() ?>>
<span<?php echo $patient_room_preview->MobileNumber->viewAttributes() ?>><?php echo $patient_room_preview->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $patient_room_preview->HospID->cellAttributes() ?>>
<span<?php echo $patient_room_preview->HospID->viewAttributes() ?>><?php echo $patient_room_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_room_preview->status->cellAttributes() ?>>
<span<?php echo $patient_room_preview->status->viewAttributes() ?>><?php echo $patient_room_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $patient_room_preview->createdby->cellAttributes() ?>>
<span<?php echo $patient_room_preview->createdby->viewAttributes() ?>><?php echo $patient_room_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $patient_room_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $patient_room_preview->createddatetime->viewAttributes() ?>><?php echo $patient_room_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $patient_room_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $patient_room_preview->modifiedby->viewAttributes() ?>><?php echo $patient_room_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_room_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $patient_room_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $patient_room_preview->modifieddatetime->viewAttributes() ?>><?php echo $patient_room_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_room_preview->ListOptions->render("body", "right", $patient_room_preview->RowCount);
?>
	</tr>
<?php
	$patient_room_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $patient_room_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_room_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($patient_room_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$patient_room_preview->showPageFooter();
if (Config("DEBUG"))
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