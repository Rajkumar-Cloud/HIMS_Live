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
$patient_ot_surgery_register_preview = new patient_ot_surgery_register_preview();

// Run the page
$patient_ot_surgery_register_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_ot_surgery_register_preview->Page_Render();
?>
<?php $patient_ot_surgery_register_preview->showPageHeader(); ?>
<?php if ($patient_ot_surgery_register_preview->TotalRecords > 0) { ?>
<div class="card ew-grid patient_ot_surgery_register"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_ot_surgery_register_preview->renderListOptions();

// Render list options (header, left)
$patient_ot_surgery_register_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_ot_surgery_register_preview->id->Visible) { // id ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->id) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->id->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->id->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->id->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->id->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->PatID->Visible) { // PatID ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->PatID) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->PatID->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->PatID->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->PatID->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->PatID->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->PatientName) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->PatientName->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->PatientName->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->PatientName->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->PatientName->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->mrnno) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->mrnno->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->mrnno->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->mrnno->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->mrnno->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->MobileNumber) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->MobileNumber->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->MobileNumber->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->MobileNumber->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->MobileNumber->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->Age->Visible) { // Age ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->Age) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->Age->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->Age->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->Age->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->Age->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->Gender->Visible) { // Gender ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->Gender) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->Gender->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->Gender->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->Gender->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->Gender->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->RecievedTime->Visible) { // RecievedTime ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->RecievedTime) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->RecievedTime->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->RecievedTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->RecievedTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->RecievedTime->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->RecievedTime->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->RecievedTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->RecievedTime->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->AnaesthesiaStarted) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->AnaesthesiaStarted->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->AnaesthesiaStarted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->AnaesthesiaStarted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->AnaesthesiaStarted->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->AnaesthesiaStarted->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->AnaesthesiaStarted->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->AnaesthesiaStarted->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->AnaesthesiaEnded) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->AnaesthesiaEnded->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->AnaesthesiaEnded->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->AnaesthesiaEnded->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->AnaesthesiaEnded->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->AnaesthesiaEnded->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->AnaesthesiaEnded->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->AnaesthesiaEnded->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->surgeryStarted->Visible) { // surgeryStarted ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->surgeryStarted) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->surgeryStarted->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->surgeryStarted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->surgeryStarted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->surgeryStarted->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->surgeryStarted->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->surgeryStarted->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->surgeryStarted->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->surgeryEnded->Visible) { // surgeryEnded ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->surgeryEnded) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->surgeryEnded->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->surgeryEnded->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->surgeryEnded->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->surgeryEnded->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->surgeryEnded->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->surgeryEnded->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->surgeryEnded->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->RecoveryTime->Visible) { // RecoveryTime ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->RecoveryTime) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->RecoveryTime->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->RecoveryTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->RecoveryTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->RecoveryTime->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->RecoveryTime->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->RecoveryTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->RecoveryTime->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->ShiftedTime->Visible) { // ShiftedTime ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->ShiftedTime) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->ShiftedTime->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->ShiftedTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->ShiftedTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->ShiftedTime->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->ShiftedTime->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->ShiftedTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->ShiftedTime->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->Duration->Visible) { // Duration ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->Duration) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->Duration->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->Duration->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->Duration->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->Duration->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->Duration->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->Duration->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->Duration->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->Surgeon->Visible) { // Surgeon ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->Surgeon) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->Surgeon->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->Surgeon->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->Surgeon->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->Surgeon->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->Surgeon->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->Surgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->Surgeon->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->Anaesthetist->Visible) { // Anaesthetist ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->Anaesthetist) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->Anaesthetist->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->Anaesthetist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->Anaesthetist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->Anaesthetist->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->Anaesthetist->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->Anaesthetist->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->Anaesthetist->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->AsstSurgeon1) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->AsstSurgeon1->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->AsstSurgeon1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->AsstSurgeon1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->AsstSurgeon1->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->AsstSurgeon1->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->AsstSurgeon1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->AsstSurgeon1->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->AsstSurgeon2) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->AsstSurgeon2->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->AsstSurgeon2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->AsstSurgeon2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->AsstSurgeon2->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->AsstSurgeon2->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->AsstSurgeon2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->AsstSurgeon2->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->paediatric->Visible) { // paediatric ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->paediatric) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->paediatric->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->paediatric->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->paediatric->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->paediatric->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->paediatric->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->paediatric->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->paediatric->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->ScrubNurse1->Visible) { // ScrubNurse1 ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->ScrubNurse1) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->ScrubNurse1->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->ScrubNurse1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->ScrubNurse1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->ScrubNurse1->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->ScrubNurse1->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->ScrubNurse1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->ScrubNurse1->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->ScrubNurse2->Visible) { // ScrubNurse2 ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->ScrubNurse2) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->ScrubNurse2->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->ScrubNurse2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->ScrubNurse2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->ScrubNurse2->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->ScrubNurse2->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->ScrubNurse2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->ScrubNurse2->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->FloorNurse->Visible) { // FloorNurse ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->FloorNurse) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->FloorNurse->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->FloorNurse->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->FloorNurse->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->FloorNurse->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->FloorNurse->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->FloorNurse->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->FloorNurse->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->Technician->Visible) { // Technician ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->Technician) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->Technician->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->Technician->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->Technician->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->Technician->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->Technician->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->Technician->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->Technician->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->HouseKeeping->Visible) { // HouseKeeping ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->HouseKeeping) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->HouseKeeping->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->HouseKeeping->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->HouseKeeping->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->HouseKeeping->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->HouseKeeping->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->HouseKeeping->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->HouseKeeping->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->countsCheckedMops->Visible) { // countsCheckedMops ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->countsCheckedMops) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->countsCheckedMops->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->countsCheckedMops->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->countsCheckedMops->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->countsCheckedMops->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->countsCheckedMops->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->countsCheckedMops->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->countsCheckedMops->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->gauze->Visible) { // gauze ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->gauze) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->gauze->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->gauze->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->gauze->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->gauze->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->gauze->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->gauze->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->gauze->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->needles->Visible) { // needles ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->needles) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->needles->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->needles->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->needles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->needles->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->needles->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->needles->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->needles->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->bloodloss->Visible) { // bloodloss ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->bloodloss) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->bloodloss->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->bloodloss->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->bloodloss->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->bloodloss->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->bloodloss->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->bloodloss->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->bloodloss->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->bloodtransfusion->Visible) { // bloodtransfusion ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->bloodtransfusion) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->bloodtransfusion->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->bloodtransfusion->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->bloodtransfusion->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->bloodtransfusion->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->bloodtransfusion->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->bloodtransfusion->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->bloodtransfusion->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->status->Visible) { // status ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->status) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->status->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->status->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->status->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->status->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->createdby->Visible) { // createdby ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->createdby) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->createdby->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->createdby->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->createdby->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->createdby->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->createddatetime) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->createddatetime->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->createddatetime->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->createddatetime->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->modifiedby) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->modifiedby->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->modifiedby->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->modifiedby->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->modifieddatetime->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->modifieddatetime->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->modifieddatetime->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->HospID->Visible) { // HospID ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->HospID) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->HospID->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->HospID->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->HospID->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->HospID->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->Reception->Visible) { // Reception ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->Reception) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->Reception->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->Reception->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->Reception->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->Reception->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->PatientID->Visible) { // PatientID ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->PatientID) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->PatientID->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->PatientID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->PatientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->PatientID->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->PatientID->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->PatientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->PatientID->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->PId->Visible) { // PId ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register_preview->PId) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->PId->headerCellClass() ?>"><?php echo $patient_ot_surgery_register_preview->PId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register_preview->PId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_ot_surgery_register_preview->PId->Name) ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->PId->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register_preview->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register_preview->PId->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_ot_surgery_register_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_ot_surgery_register_preview->RecCount = 0;
$patient_ot_surgery_register_preview->RowCount = 0;
while ($patient_ot_surgery_register_preview->Recordset && !$patient_ot_surgery_register_preview->Recordset->EOF) {

	// Init row class and style
	$patient_ot_surgery_register_preview->RecCount++;
	$patient_ot_surgery_register_preview->RowCount++;
	$patient_ot_surgery_register_preview->CssStyle = "";
	$patient_ot_surgery_register_preview->loadListRowValues($patient_ot_surgery_register_preview->Recordset);

	// Render row
	$patient_ot_surgery_register->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_ot_surgery_register_preview->resetAttributes();
	$patient_ot_surgery_register_preview->renderListRow();

	// Render list options
	$patient_ot_surgery_register_preview->renderListOptions();
?>
	<tr <?php echo $patient_ot_surgery_register->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_ot_surgery_register_preview->ListOptions->render("body", "left", $patient_ot_surgery_register_preview->RowCount);
?>
<?php if ($patient_ot_surgery_register_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_ot_surgery_register_preview->id->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->id->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $patient_ot_surgery_register_preview->PatID->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->PatID->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_ot_surgery_register_preview->PatientName->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->PatientName->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_ot_surgery_register_preview->mrnno->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->mrnno->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $patient_ot_surgery_register_preview->MobileNumber->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->MobileNumber->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_ot_surgery_register_preview->Age->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->Age->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_ot_surgery_register_preview->Gender->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->Gender->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->RecievedTime->Visible) { // RecievedTime ?>
		<!-- RecievedTime -->
		<td<?php echo $patient_ot_surgery_register_preview->RecievedTime->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->RecievedTime->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->RecievedTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<!-- AnaesthesiaStarted -->
		<td<?php echo $patient_ot_surgery_register_preview->AnaesthesiaStarted->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->AnaesthesiaStarted->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->AnaesthesiaStarted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<!-- AnaesthesiaEnded -->
		<td<?php echo $patient_ot_surgery_register_preview->AnaesthesiaEnded->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->AnaesthesiaEnded->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->AnaesthesiaEnded->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->surgeryStarted->Visible) { // surgeryStarted ?>
		<!-- surgeryStarted -->
		<td<?php echo $patient_ot_surgery_register_preview->surgeryStarted->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->surgeryStarted->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->surgeryStarted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->surgeryEnded->Visible) { // surgeryEnded ?>
		<!-- surgeryEnded -->
		<td<?php echo $patient_ot_surgery_register_preview->surgeryEnded->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->surgeryEnded->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->surgeryEnded->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->RecoveryTime->Visible) { // RecoveryTime ?>
		<!-- RecoveryTime -->
		<td<?php echo $patient_ot_surgery_register_preview->RecoveryTime->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->RecoveryTime->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->RecoveryTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->ShiftedTime->Visible) { // ShiftedTime ?>
		<!-- ShiftedTime -->
		<td<?php echo $patient_ot_surgery_register_preview->ShiftedTime->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->ShiftedTime->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->ShiftedTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->Duration->Visible) { // Duration ?>
		<!-- Duration -->
		<td<?php echo $patient_ot_surgery_register_preview->Duration->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->Duration->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->Duration->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->Surgeon->Visible) { // Surgeon ?>
		<!-- Surgeon -->
		<td<?php echo $patient_ot_surgery_register_preview->Surgeon->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->Surgeon->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->Surgeon->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->Anaesthetist->Visible) { // Anaesthetist ?>
		<!-- Anaesthetist -->
		<td<?php echo $patient_ot_surgery_register_preview->Anaesthetist->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->Anaesthetist->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->Anaesthetist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<!-- AsstSurgeon1 -->
		<td<?php echo $patient_ot_surgery_register_preview->AsstSurgeon1->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->AsstSurgeon1->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->AsstSurgeon1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<!-- AsstSurgeon2 -->
		<td<?php echo $patient_ot_surgery_register_preview->AsstSurgeon2->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->AsstSurgeon2->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->AsstSurgeon2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->paediatric->Visible) { // paediatric ?>
		<!-- paediatric -->
		<td<?php echo $patient_ot_surgery_register_preview->paediatric->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->paediatric->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->paediatric->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<!-- ScrubNurse1 -->
		<td<?php echo $patient_ot_surgery_register_preview->ScrubNurse1->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->ScrubNurse1->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->ScrubNurse1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<!-- ScrubNurse2 -->
		<td<?php echo $patient_ot_surgery_register_preview->ScrubNurse2->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->ScrubNurse2->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->ScrubNurse2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->FloorNurse->Visible) { // FloorNurse ?>
		<!-- FloorNurse -->
		<td<?php echo $patient_ot_surgery_register_preview->FloorNurse->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->FloorNurse->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->FloorNurse->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->Technician->Visible) { // Technician ?>
		<!-- Technician -->
		<td<?php echo $patient_ot_surgery_register_preview->Technician->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->Technician->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->Technician->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->HouseKeeping->Visible) { // HouseKeeping ?>
		<!-- HouseKeeping -->
		<td<?php echo $patient_ot_surgery_register_preview->HouseKeeping->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->HouseKeeping->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->HouseKeeping->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<!-- countsCheckedMops -->
		<td<?php echo $patient_ot_surgery_register_preview->countsCheckedMops->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->countsCheckedMops->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->countsCheckedMops->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->gauze->Visible) { // gauze ?>
		<!-- gauze -->
		<td<?php echo $patient_ot_surgery_register_preview->gauze->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->gauze->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->gauze->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->needles->Visible) { // needles ?>
		<!-- needles -->
		<td<?php echo $patient_ot_surgery_register_preview->needles->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->needles->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->needles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->bloodloss->Visible) { // bloodloss ?>
		<!-- bloodloss -->
		<td<?php echo $patient_ot_surgery_register_preview->bloodloss->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->bloodloss->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->bloodloss->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<!-- bloodtransfusion -->
		<td<?php echo $patient_ot_surgery_register_preview->bloodtransfusion->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->bloodtransfusion->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->bloodtransfusion->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_ot_surgery_register_preview->status->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->status->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $patient_ot_surgery_register_preview->createdby->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->createdby->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $patient_ot_surgery_register_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->createddatetime->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $patient_ot_surgery_register_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->modifiedby->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $patient_ot_surgery_register_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->modifieddatetime->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $patient_ot_surgery_register_preview->HospID->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->HospID->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_ot_surgery_register_preview->Reception->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->Reception->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->PatientID->Visible) { // PatientID ?>
		<!-- PatientID -->
		<td<?php echo $patient_ot_surgery_register_preview->PatientID->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->PatientID->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->PatientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_preview->PId->Visible) { // PId ?>
		<!-- PId -->
		<td<?php echo $patient_ot_surgery_register_preview->PId->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register_preview->PId->viewAttributes() ?>><?php echo $patient_ot_surgery_register_preview->PId->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_ot_surgery_register_preview->ListOptions->render("body", "right", $patient_ot_surgery_register_preview->RowCount);
?>
	</tr>
<?php
	$patient_ot_surgery_register_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $patient_ot_surgery_register_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_ot_surgery_register_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($patient_ot_surgery_register_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$patient_ot_surgery_register_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($patient_ot_surgery_register_preview->Recordset)
	$patient_ot_surgery_register_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_ot_surgery_register_preview->terminate();
?>