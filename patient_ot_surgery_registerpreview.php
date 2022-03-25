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
<div class="card ew-grid patient_ot_surgery_register"><!-- .card -->
<?php if ($patient_ot_surgery_register_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_ot_surgery_register_preview->renderListOptions();

// Render list options (header, left)
$patient_ot_surgery_register_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_ot_surgery_register->id->Visible) { // id ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->id) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->id->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->id->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->id->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->id->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatID->Visible) { // PatID ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->PatID) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->PatID->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->PatID->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->PatID->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->PatID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->PatID->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->PatientName) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->PatientName->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->PatientName->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->PatientName->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->PatientName->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->mrnno) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->mrnno->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->mrnno->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->mrnno->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->mrnno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->mrnno->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->MobileNumber) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->MobileNumber->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->MobileNumber->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->MobileNumber->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->MobileNumber->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->MobileNumber->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->Age->Visible) { // Age ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->Age) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->Age->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->Age->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->Age->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->Age->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->Gender->Visible) { // Gender ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->Gender) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->Gender->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->Gender->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->Gender->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->Gender->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->RecievedTime->Visible) { // RecievedTime ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->RecievedTime) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->RecievedTime->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->RecievedTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->RecievedTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->RecievedTime->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->RecievedTime->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->RecievedTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->RecievedTime->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->AnaesthesiaStarted) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->AnaesthesiaStarted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->AnaesthesiaStarted->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->AnaesthesiaStarted->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->AnaesthesiaStarted->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->AnaesthesiaEnded) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->AnaesthesiaEnded->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->AnaesthesiaEnded->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->AnaesthesiaEnded->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->AnaesthesiaEnded->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->surgeryStarted->Visible) { // surgeryStarted ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->surgeryStarted) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->surgeryStarted->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->surgeryStarted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->surgeryStarted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->surgeryStarted->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->surgeryStarted->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->surgeryStarted->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->surgeryStarted->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->surgeryEnded->Visible) { // surgeryEnded ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->surgeryEnded) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->surgeryEnded->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->surgeryEnded->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->surgeryEnded->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->surgeryEnded->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->surgeryEnded->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->surgeryEnded->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->surgeryEnded->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->RecoveryTime->Visible) { // RecoveryTime ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->RecoveryTime) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->RecoveryTime->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->RecoveryTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->RecoveryTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->RecoveryTime->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->RecoveryTime->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->RecoveryTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->RecoveryTime->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->ShiftedTime->Visible) { // ShiftedTime ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->ShiftedTime) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->ShiftedTime->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->ShiftedTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->ShiftedTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->ShiftedTime->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->ShiftedTime->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->ShiftedTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->ShiftedTime->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->Duration->Visible) { // Duration ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->Duration) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->Duration->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->Duration->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->Duration->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->Duration->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->Duration->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->Duration->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->Duration->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->Surgeon->Visible) { // Surgeon ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->Surgeon) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->Surgeon->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->Surgeon->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->Surgeon->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->Surgeon->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->Surgeon->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->Surgeon->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->Surgeon->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->Anaesthetist->Visible) { // Anaesthetist ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->Anaesthetist) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->Anaesthetist->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->Anaesthetist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->Anaesthetist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->Anaesthetist->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->Anaesthetist->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->Anaesthetist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->Anaesthetist->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->AsstSurgeon1) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->AsstSurgeon1->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->AsstSurgeon1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->AsstSurgeon1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->AsstSurgeon1->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->AsstSurgeon1->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->AsstSurgeon1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->AsstSurgeon1->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->AsstSurgeon2) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->AsstSurgeon2->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->AsstSurgeon2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->AsstSurgeon2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->AsstSurgeon2->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->AsstSurgeon2->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->AsstSurgeon2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->AsstSurgeon2->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->paediatric->Visible) { // paediatric ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->paediatric) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->paediatric->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->paediatric->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->paediatric->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->paediatric->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->paediatric->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->paediatric->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->paediatric->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->ScrubNurse1) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->ScrubNurse1->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->ScrubNurse1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->ScrubNurse1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->ScrubNurse1->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->ScrubNurse1->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->ScrubNurse1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->ScrubNurse1->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->ScrubNurse2) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->ScrubNurse2->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->ScrubNurse2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->ScrubNurse2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->ScrubNurse2->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->ScrubNurse2->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->ScrubNurse2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->ScrubNurse2->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->FloorNurse->Visible) { // FloorNurse ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->FloorNurse) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->FloorNurse->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->FloorNurse->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->FloorNurse->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->FloorNurse->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->FloorNurse->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->FloorNurse->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->FloorNurse->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->Technician->Visible) { // Technician ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->Technician) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->Technician->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->Technician->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->Technician->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->Technician->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->Technician->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->Technician->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->Technician->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->HouseKeeping->Visible) { // HouseKeeping ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->HouseKeeping) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->HouseKeeping->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->HouseKeeping->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->HouseKeeping->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->HouseKeeping->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->HouseKeeping->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->HouseKeeping->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->HouseKeeping->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->countsCheckedMops) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->countsCheckedMops->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->countsCheckedMops->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->countsCheckedMops->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->countsCheckedMops->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->countsCheckedMops->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->countsCheckedMops->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->countsCheckedMops->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->gauze->Visible) { // gauze ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->gauze) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->gauze->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->gauze->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->gauze->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->gauze->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->gauze->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->gauze->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->gauze->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->needles->Visible) { // needles ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->needles) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->needles->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->needles->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->needles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->needles->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->needles->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->needles->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->needles->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->bloodloss->Visible) { // bloodloss ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->bloodloss) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->bloodloss->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->bloodloss->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->bloodloss->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->bloodloss->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->bloodloss->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->bloodloss->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->bloodloss->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->bloodtransfusion) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->bloodtransfusion->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->bloodtransfusion->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->bloodtransfusion->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->bloodtransfusion->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->bloodtransfusion->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->bloodtransfusion->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->bloodtransfusion->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->status->Visible) { // status ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->status) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->status->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->status->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->status->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->status->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->createdby->Visible) { // createdby ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->createdby) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->createdby->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->createdby->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->createdby->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->createdby->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->createddatetime) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->createddatetime->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->createddatetime->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->createddatetime->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->createddatetime->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->modifiedby) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->modifiedby->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->modifiedby->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->modifiedby->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->modifiedby->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->modifieddatetime) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->modifieddatetime->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->modifieddatetime->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->modifieddatetime->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->modifieddatetime->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->HospID->Visible) { // HospID ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->HospID) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->HospID->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->HospID->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->HospID->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->HospID->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->Reception->Visible) { // Reception ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->Reception) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->Reception->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->Reception->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->Reception->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->Reception->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->Reception->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatientID->Visible) { // PatientID ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->PatientID) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->PatientID->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->PatientID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->PatientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->PatientID->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->PatientID->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->PatientID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->PatientID->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_surgery_register->PId->Visible) { // PId ?>
	<?php if ($patient_ot_surgery_register->SortUrl($patient_ot_surgery_register->PId) == "") { ?>
		<th class="<?php echo $patient_ot_surgery_register->PId->headerCellClass() ?>"><?php echo $patient_ot_surgery_register->PId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_surgery_register->PId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_surgery_register->PId->Name ?>" data-sort-order="<?php echo $patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->PId->Name && $patient_ot_surgery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_surgery_register->PId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_surgery_register_preview->SortField == $patient_ot_surgery_register->PId->Name) { ?><?php if ($patient_ot_surgery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_surgery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
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
$patient_ot_surgery_register_preview->RowCnt = 0;
while ($patient_ot_surgery_register_preview->Recordset && !$patient_ot_surgery_register_preview->Recordset->EOF) {

	// Init row class and style
	$patient_ot_surgery_register_preview->RecCount++;
	$patient_ot_surgery_register_preview->RowCnt++;
	$patient_ot_surgery_register_preview->CssStyle = "";
	$patient_ot_surgery_register_preview->loadListRowValues($patient_ot_surgery_register_preview->Recordset);

	// Render row
	$patient_ot_surgery_register_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_ot_surgery_register_preview->resetAttributes();
	$patient_ot_surgery_register_preview->renderListRow();

	// Render list options
	$patient_ot_surgery_register_preview->renderListOptions();
?>
	<tr<?php echo $patient_ot_surgery_register_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_ot_surgery_register_preview->ListOptions->render("body", "left", $patient_ot_surgery_register_preview->RowCnt);
?>
<?php if ($patient_ot_surgery_register->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_ot_surgery_register->id->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->id->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $patient_ot_surgery_register->PatID->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->PatID->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_ot_surgery_register->PatientName->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->PatientName->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_ot_surgery_register->mrnno->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->mrnno->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $patient_ot_surgery_register->MobileNumber->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->MobileNumber->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_ot_surgery_register->Age->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->Age->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_ot_surgery_register->Gender->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->Gender->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->RecievedTime->Visible) { // RecievedTime ?>
		<!-- RecievedTime -->
		<td<?php echo $patient_ot_surgery_register->RecievedTime->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->RecievedTime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->RecievedTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<!-- AnaesthesiaStarted -->
		<td<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<!-- AnaesthesiaEnded -->
		<td<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->surgeryStarted->Visible) { // surgeryStarted ?>
		<!-- surgeryStarted -->
		<td<?php echo $patient_ot_surgery_register->surgeryStarted->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->surgeryStarted->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->surgeryStarted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->surgeryEnded->Visible) { // surgeryEnded ?>
		<!-- surgeryEnded -->
		<td<?php echo $patient_ot_surgery_register->surgeryEnded->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->surgeryEnded->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->surgeryEnded->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->RecoveryTime->Visible) { // RecoveryTime ?>
		<!-- RecoveryTime -->
		<td<?php echo $patient_ot_surgery_register->RecoveryTime->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->RecoveryTime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->RecoveryTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->ShiftedTime->Visible) { // ShiftedTime ?>
		<!-- ShiftedTime -->
		<td<?php echo $patient_ot_surgery_register->ShiftedTime->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->ShiftedTime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->ShiftedTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->Duration->Visible) { // Duration ?>
		<!-- Duration -->
		<td<?php echo $patient_ot_surgery_register->Duration->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->Duration->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Duration->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->Surgeon->Visible) { // Surgeon ?>
		<!-- Surgeon -->
		<td<?php echo $patient_ot_surgery_register->Surgeon->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->Surgeon->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Surgeon->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->Anaesthetist->Visible) { // Anaesthetist ?>
		<!-- Anaesthetist -->
		<td<?php echo $patient_ot_surgery_register->Anaesthetist->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->Anaesthetist->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Anaesthetist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<!-- AsstSurgeon1 -->
		<td<?php echo $patient_ot_surgery_register->AsstSurgeon1->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->AsstSurgeon1->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->AsstSurgeon1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<!-- AsstSurgeon2 -->
		<td<?php echo $patient_ot_surgery_register->AsstSurgeon2->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->AsstSurgeon2->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->AsstSurgeon2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->paediatric->Visible) { // paediatric ?>
		<!-- paediatric -->
		<td<?php echo $patient_ot_surgery_register->paediatric->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->paediatric->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->paediatric->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<!-- ScrubNurse1 -->
		<td<?php echo $patient_ot_surgery_register->ScrubNurse1->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->ScrubNurse1->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->ScrubNurse1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<!-- ScrubNurse2 -->
		<td<?php echo $patient_ot_surgery_register->ScrubNurse2->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->ScrubNurse2->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->ScrubNurse2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->FloorNurse->Visible) { // FloorNurse ?>
		<!-- FloorNurse -->
		<td<?php echo $patient_ot_surgery_register->FloorNurse->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->FloorNurse->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->FloorNurse->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->Technician->Visible) { // Technician ?>
		<!-- Technician -->
		<td<?php echo $patient_ot_surgery_register->Technician->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->Technician->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Technician->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->HouseKeeping->Visible) { // HouseKeeping ?>
		<!-- HouseKeeping -->
		<td<?php echo $patient_ot_surgery_register->HouseKeeping->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->HouseKeeping->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->HouseKeeping->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<!-- countsCheckedMops -->
		<td<?php echo $patient_ot_surgery_register->countsCheckedMops->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->countsCheckedMops->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->countsCheckedMops->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->gauze->Visible) { // gauze ?>
		<!-- gauze -->
		<td<?php echo $patient_ot_surgery_register->gauze->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->gauze->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->gauze->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->needles->Visible) { // needles ?>
		<!-- needles -->
		<td<?php echo $patient_ot_surgery_register->needles->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->needles->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->needles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->bloodloss->Visible) { // bloodloss ?>
		<!-- bloodloss -->
		<td<?php echo $patient_ot_surgery_register->bloodloss->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->bloodloss->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->bloodloss->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<!-- bloodtransfusion -->
		<td<?php echo $patient_ot_surgery_register->bloodtransfusion->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->bloodtransfusion->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->bloodtransfusion->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_ot_surgery_register->status->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->status->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $patient_ot_surgery_register->createdby->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->createdby->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $patient_ot_surgery_register->createddatetime->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->createddatetime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $patient_ot_surgery_register->modifiedby->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->modifiedby->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $patient_ot_surgery_register->modifieddatetime->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $patient_ot_surgery_register->HospID->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->HospID->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_ot_surgery_register->Reception->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->Reception->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatientID->Visible) { // PatientID ?>
		<!-- PatientID -->
		<td<?php echo $patient_ot_surgery_register->PatientID->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->PatientID->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->PatientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->PId->Visible) { // PId ?>
		<!-- PId -->
		<td<?php echo $patient_ot_surgery_register->PId->cellAttributes() ?>>
<span<?php echo $patient_ot_surgery_register->PId->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->PId->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_ot_surgery_register_preview->ListOptions->render("body", "right", $patient_ot_surgery_register_preview->RowCnt);
?>
	</tr>
<?php
	$patient_ot_surgery_register_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_ot_surgery_register_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_ot_surgery_register_preview->Pager)) $patient_ot_surgery_register_preview->Pager = new PrevNextPager($patient_ot_surgery_register_preview->StartRec, $patient_ot_surgery_register_preview->DisplayRecs, $patient_ot_surgery_register_preview->TotalRecs) ?>
<?php if ($patient_ot_surgery_register_preview->Pager->RecordCount > 0 && $patient_ot_surgery_register_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_ot_surgery_register_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_ot_surgery_register_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_ot_surgery_register_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_ot_surgery_register_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_ot_surgery_register_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_ot_surgery_register_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_ot_surgery_register_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_ot_surgery_register_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_ot_surgery_register_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_ot_surgery_register_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_ot_surgery_register_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_ot_surgery_register_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_ot_surgery_register_preview->showPageFooter();
if (DEBUG_ENABLED)
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