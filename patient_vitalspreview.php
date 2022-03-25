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
$patient_vitals_preview = new patient_vitals_preview();

// Run the page
$patient_vitals_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_vitals_preview->Page_Render();
?>
<?php $patient_vitals_preview->showPageHeader(); ?>
<div class="card ew-grid patient_vitals"><!-- .card -->
<?php if ($patient_vitals_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_vitals_preview->renderListOptions();

// Render list options (header, left)
$patient_vitals_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_vitals->id->Visible) { // id ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->id) == "") { ?>
		<th class="<?php echo $patient_vitals->id->headerCellClass() ?>"><?php echo $patient_vitals->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->id->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->id->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->id->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->mrnno) == "") { ?>
		<th class="<?php echo $patient_vitals->mrnno->headerCellClass() ?>"><?php echo $patient_vitals->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->mrnno->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->mrnno->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->mrnno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->mrnno->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->PatientName) == "") { ?>
		<th class="<?php echo $patient_vitals->PatientName->headerCellClass() ?>"><?php echo $patient_vitals->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->PatientName->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->PatientName->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->PatientName->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PatID->Visible) { // PatID ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->PatID) == "") { ?>
		<th class="<?php echo $patient_vitals->PatID->headerCellClass() ?>"><?php echo $patient_vitals->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->PatID->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->PatID->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->PatID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->PatID->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->MobileNumber) == "") { ?>
		<th class="<?php echo $patient_vitals->MobileNumber->headerCellClass() ?>"><?php echo $patient_vitals->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->MobileNumber->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->MobileNumber->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->MobileNumber->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->MobileNumber->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->HT->Visible) { // HT ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->HT) == "") { ?>
		<th class="<?php echo $patient_vitals->HT->headerCellClass() ?>"><?php echo $patient_vitals->HT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->HT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->HT->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->HT->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->HT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->HT->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->WT->Visible) { // WT ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->WT) == "") { ?>
		<th class="<?php echo $patient_vitals->WT->headerCellClass() ?>"><?php echo $patient_vitals->WT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->WT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->WT->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->WT->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->WT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->WT->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->SurfaceArea->Visible) { // SurfaceArea ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->SurfaceArea) == "") { ?>
		<th class="<?php echo $patient_vitals->SurfaceArea->headerCellClass() ?>"><?php echo $patient_vitals->SurfaceArea->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->SurfaceArea->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->SurfaceArea->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->SurfaceArea->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->SurfaceArea->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->SurfaceArea->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->BodyMassIndex->Visible) { // BodyMassIndex ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->BodyMassIndex) == "") { ?>
		<th class="<?php echo $patient_vitals->BodyMassIndex->headerCellClass() ?>"><?php echo $patient_vitals->BodyMassIndex->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->BodyMassIndex->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->BodyMassIndex->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->BodyMassIndex->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->BodyMassIndex->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->BodyMassIndex->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->AnticoagulantifAny) == "") { ?>
		<th class="<?php echo $patient_vitals->AnticoagulantifAny->headerCellClass() ?>"><?php echo $patient_vitals->AnticoagulantifAny->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->AnticoagulantifAny->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->AnticoagulantifAny->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->AnticoagulantifAny->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->AnticoagulantifAny->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->AnticoagulantifAny->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->FoodAllergies->Visible) { // FoodAllergies ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->FoodAllergies) == "") { ?>
		<th class="<?php echo $patient_vitals->FoodAllergies->headerCellClass() ?>"><?php echo $patient_vitals->FoodAllergies->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->FoodAllergies->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->FoodAllergies->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->FoodAllergies->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->FoodAllergies->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->FoodAllergies->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->GenericAllergies->Visible) { // GenericAllergies ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->GenericAllergies) == "") { ?>
		<th class="<?php echo $patient_vitals->GenericAllergies->headerCellClass() ?>"><?php echo $patient_vitals->GenericAllergies->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->GenericAllergies->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->GenericAllergies->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->GenericAllergies->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->GenericAllergies->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->GenericAllergies->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->GroupAllergies->Visible) { // GroupAllergies ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->GroupAllergies) == "") { ?>
		<th class="<?php echo $patient_vitals->GroupAllergies->headerCellClass() ?>"><?php echo $patient_vitals->GroupAllergies->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->GroupAllergies->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->GroupAllergies->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->GroupAllergies->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->GroupAllergies->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->GroupAllergies->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Temp->Visible) { // Temp ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->Temp) == "") { ?>
		<th class="<?php echo $patient_vitals->Temp->headerCellClass() ?>"><?php echo $patient_vitals->Temp->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->Temp->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->Temp->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->Temp->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->Temp->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->Temp->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Pulse->Visible) { // Pulse ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->Pulse) == "") { ?>
		<th class="<?php echo $patient_vitals->Pulse->headerCellClass() ?>"><?php echo $patient_vitals->Pulse->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->Pulse->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->Pulse->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->Pulse->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->Pulse->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->Pulse->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->BP->Visible) { // BP ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->BP) == "") { ?>
		<th class="<?php echo $patient_vitals->BP->headerCellClass() ?>"><?php echo $patient_vitals->BP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->BP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->BP->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->BP->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->BP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->BP->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PR->Visible) { // PR ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->PR) == "") { ?>
		<th class="<?php echo $patient_vitals->PR->headerCellClass() ?>"><?php echo $patient_vitals->PR->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->PR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->PR->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->PR->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->PR->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->PR->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->CNS->Visible) { // CNS ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->CNS) == "") { ?>
		<th class="<?php echo $patient_vitals->CNS->headerCellClass() ?>"><?php echo $patient_vitals->CNS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->CNS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->CNS->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->CNS->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->CNS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->CNS->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->RSA->Visible) { // RSA ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->RSA) == "") { ?>
		<th class="<?php echo $patient_vitals->RSA->headerCellClass() ?>"><?php echo $patient_vitals->RSA->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->RSA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->RSA->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->RSA->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->RSA->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->RSA->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->CVS->Visible) { // CVS ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->CVS) == "") { ?>
		<th class="<?php echo $patient_vitals->CVS->headerCellClass() ?>"><?php echo $patient_vitals->CVS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->CVS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->CVS->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->CVS->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->CVS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->CVS->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PA->Visible) { // PA ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->PA) == "") { ?>
		<th class="<?php echo $patient_vitals->PA->headerCellClass() ?>"><?php echo $patient_vitals->PA->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->PA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->PA->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->PA->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->PA->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->PA->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PS->Visible) { // PS ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->PS) == "") { ?>
		<th class="<?php echo $patient_vitals->PS->headerCellClass() ?>"><?php echo $patient_vitals->PS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->PS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->PS->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->PS->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->PS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->PS->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PV->Visible) { // PV ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->PV) == "") { ?>
		<th class="<?php echo $patient_vitals->PV->headerCellClass() ?>"><?php echo $patient_vitals->PV->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->PV->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->PV->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->PV->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->PV->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->PV->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->clinicaldetails->Visible) { // clinicaldetails ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->clinicaldetails) == "") { ?>
		<th class="<?php echo $patient_vitals->clinicaldetails->headerCellClass() ?>"><?php echo $patient_vitals->clinicaldetails->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->clinicaldetails->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->clinicaldetails->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->clinicaldetails->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->clinicaldetails->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->clinicaldetails->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->status->Visible) { // status ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->status) == "") { ?>
		<th class="<?php echo $patient_vitals->status->headerCellClass() ?>"><?php echo $patient_vitals->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->status->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->status->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->status->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->createdby->Visible) { // createdby ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->createdby) == "") { ?>
		<th class="<?php echo $patient_vitals->createdby->headerCellClass() ?>"><?php echo $patient_vitals->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->createdby->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->createdby->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->createdby->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->createddatetime) == "") { ?>
		<th class="<?php echo $patient_vitals->createddatetime->headerCellClass() ?>"><?php echo $patient_vitals->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->createddatetime->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->createddatetime->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->createddatetime->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->modifiedby) == "") { ?>
		<th class="<?php echo $patient_vitals->modifiedby->headerCellClass() ?>"><?php echo $patient_vitals->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->modifiedby->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->modifiedby->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->modifiedby->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->modifieddatetime) == "") { ?>
		<th class="<?php echo $patient_vitals->modifieddatetime->headerCellClass() ?>"><?php echo $patient_vitals->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->modifieddatetime->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->modifieddatetime->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->modifieddatetime->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Age->Visible) { // Age ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->Age) == "") { ?>
		<th class="<?php echo $patient_vitals->Age->headerCellClass() ?>"><?php echo $patient_vitals->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->Age->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->Age->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->Age->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Gender->Visible) { // Gender ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->Gender) == "") { ?>
		<th class="<?php echo $patient_vitals->Gender->headerCellClass() ?>"><?php echo $patient_vitals->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->Gender->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->Gender->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->Gender->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->PatientId) == "") { ?>
		<th class="<?php echo $patient_vitals->PatientId->headerCellClass() ?>"><?php echo $patient_vitals->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->PatientId->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->PatientId->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->PatientId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->PatientId->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Reception->Visible) { // Reception ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->Reception) == "") { ?>
		<th class="<?php echo $patient_vitals->Reception->headerCellClass() ?>"><?php echo $patient_vitals->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->Reception->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->Reception->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->Reception->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->Reception->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->HospID->Visible) { // HospID ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals->HospID) == "") { ?>
		<th class="<?php echo $patient_vitals->HospID->headerCellClass() ?>"><?php echo $patient_vitals->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_vitals->HospID->Name ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals->HospID->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_vitals->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals->HospID->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_vitals_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_vitals_preview->RecCount = 0;
$patient_vitals_preview->RowCnt = 0;
while ($patient_vitals_preview->Recordset && !$patient_vitals_preview->Recordset->EOF) {

	// Init row class and style
	$patient_vitals_preview->RecCount++;
	$patient_vitals_preview->RowCnt++;
	$patient_vitals_preview->CssStyle = "";
	$patient_vitals_preview->loadListRowValues($patient_vitals_preview->Recordset);

	// Render row
	$patient_vitals_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_vitals_preview->resetAttributes();
	$patient_vitals_preview->renderListRow();

	// Render list options
	$patient_vitals_preview->renderListOptions();
?>
	<tr<?php echo $patient_vitals_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_vitals_preview->ListOptions->render("body", "left", $patient_vitals_preview->RowCnt);
?>
<?php if ($patient_vitals->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_vitals->id->cellAttributes() ?>>
<span<?php echo $patient_vitals->id->viewAttributes() ?>>
<?php echo $patient_vitals->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_vitals->mrnno->cellAttributes() ?>>
<span<?php echo $patient_vitals->mrnno->viewAttributes() ?>>
<?php echo $patient_vitals->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_vitals->PatientName->cellAttributes() ?>>
<span<?php echo $patient_vitals->PatientName->viewAttributes() ?>>
<?php echo $patient_vitals->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $patient_vitals->PatID->cellAttributes() ?>>
<span<?php echo $patient_vitals->PatID->viewAttributes() ?>>
<?php echo $patient_vitals->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $patient_vitals->MobileNumber->cellAttributes() ?>>
<span<?php echo $patient_vitals->MobileNumber->viewAttributes() ?>>
<?php echo $patient_vitals->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->HT->Visible) { // HT ?>
		<!-- HT -->
		<td<?php echo $patient_vitals->HT->cellAttributes() ?>>
<span<?php echo $patient_vitals->HT->viewAttributes() ?>>
<?php echo $patient_vitals->HT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->WT->Visible) { // WT ?>
		<!-- WT -->
		<td<?php echo $patient_vitals->WT->cellAttributes() ?>>
<span<?php echo $patient_vitals->WT->viewAttributes() ?>>
<?php echo $patient_vitals->WT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->SurfaceArea->Visible) { // SurfaceArea ?>
		<!-- SurfaceArea -->
		<td<?php echo $patient_vitals->SurfaceArea->cellAttributes() ?>>
<span<?php echo $patient_vitals->SurfaceArea->viewAttributes() ?>>
<?php echo $patient_vitals->SurfaceArea->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->BodyMassIndex->Visible) { // BodyMassIndex ?>
		<!-- BodyMassIndex -->
		<td<?php echo $patient_vitals->BodyMassIndex->cellAttributes() ?>>
<span<?php echo $patient_vitals->BodyMassIndex->viewAttributes() ?>>
<?php echo $patient_vitals->BodyMassIndex->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
		<!-- AnticoagulantifAny -->
		<td<?php echo $patient_vitals->AnticoagulantifAny->cellAttributes() ?>>
<span<?php echo $patient_vitals->AnticoagulantifAny->viewAttributes() ?>>
<?php echo $patient_vitals->AnticoagulantifAny->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->FoodAllergies->Visible) { // FoodAllergies ?>
		<!-- FoodAllergies -->
		<td<?php echo $patient_vitals->FoodAllergies->cellAttributes() ?>>
<span<?php echo $patient_vitals->FoodAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->FoodAllergies->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->GenericAllergies->Visible) { // GenericAllergies ?>
		<!-- GenericAllergies -->
		<td<?php echo $patient_vitals->GenericAllergies->cellAttributes() ?>>
<span<?php echo $patient_vitals->GenericAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->GenericAllergies->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->GroupAllergies->Visible) { // GroupAllergies ?>
		<!-- GroupAllergies -->
		<td<?php echo $patient_vitals->GroupAllergies->cellAttributes() ?>>
<span<?php echo $patient_vitals->GroupAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->GroupAllergies->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->Temp->Visible) { // Temp ?>
		<!-- Temp -->
		<td<?php echo $patient_vitals->Temp->cellAttributes() ?>>
<span<?php echo $patient_vitals->Temp->viewAttributes() ?>>
<?php echo $patient_vitals->Temp->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->Pulse->Visible) { // Pulse ?>
		<!-- Pulse -->
		<td<?php echo $patient_vitals->Pulse->cellAttributes() ?>>
<span<?php echo $patient_vitals->Pulse->viewAttributes() ?>>
<?php echo $patient_vitals->Pulse->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->BP->Visible) { // BP ?>
		<!-- BP -->
		<td<?php echo $patient_vitals->BP->cellAttributes() ?>>
<span<?php echo $patient_vitals->BP->viewAttributes() ?>>
<?php echo $patient_vitals->BP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->PR->Visible) { // PR ?>
		<!-- PR -->
		<td<?php echo $patient_vitals->PR->cellAttributes() ?>>
<span<?php echo $patient_vitals->PR->viewAttributes() ?>>
<?php echo $patient_vitals->PR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->CNS->Visible) { // CNS ?>
		<!-- CNS -->
		<td<?php echo $patient_vitals->CNS->cellAttributes() ?>>
<span<?php echo $patient_vitals->CNS->viewAttributes() ?>>
<?php echo $patient_vitals->CNS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->RSA->Visible) { // RSA ?>
		<!-- RSA -->
		<td<?php echo $patient_vitals->RSA->cellAttributes() ?>>
<span<?php echo $patient_vitals->RSA->viewAttributes() ?>>
<?php echo $patient_vitals->RSA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->CVS->Visible) { // CVS ?>
		<!-- CVS -->
		<td<?php echo $patient_vitals->CVS->cellAttributes() ?>>
<span<?php echo $patient_vitals->CVS->viewAttributes() ?>>
<?php echo $patient_vitals->CVS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->PA->Visible) { // PA ?>
		<!-- PA -->
		<td<?php echo $patient_vitals->PA->cellAttributes() ?>>
<span<?php echo $patient_vitals->PA->viewAttributes() ?>>
<?php echo $patient_vitals->PA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->PS->Visible) { // PS ?>
		<!-- PS -->
		<td<?php echo $patient_vitals->PS->cellAttributes() ?>>
<span<?php echo $patient_vitals->PS->viewAttributes() ?>>
<?php echo $patient_vitals->PS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->PV->Visible) { // PV ?>
		<!-- PV -->
		<td<?php echo $patient_vitals->PV->cellAttributes() ?>>
<span<?php echo $patient_vitals->PV->viewAttributes() ?>>
<?php echo $patient_vitals->PV->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->clinicaldetails->Visible) { // clinicaldetails ?>
		<!-- clinicaldetails -->
		<td<?php echo $patient_vitals->clinicaldetails->cellAttributes() ?>>
<span<?php echo $patient_vitals->clinicaldetails->viewAttributes() ?>>
<?php echo $patient_vitals->clinicaldetails->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_vitals->status->cellAttributes() ?>>
<span<?php echo $patient_vitals->status->viewAttributes() ?>>
<?php echo $patient_vitals->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $patient_vitals->createdby->cellAttributes() ?>>
<span<?php echo $patient_vitals->createdby->viewAttributes() ?>>
<?php echo $patient_vitals->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $patient_vitals->createddatetime->cellAttributes() ?>>
<span<?php echo $patient_vitals->createddatetime->viewAttributes() ?>>
<?php echo $patient_vitals->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $patient_vitals->modifiedby->cellAttributes() ?>>
<span<?php echo $patient_vitals->modifiedby->viewAttributes() ?>>
<?php echo $patient_vitals->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $patient_vitals->modifieddatetime->cellAttributes() ?>>
<span<?php echo $patient_vitals->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_vitals->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_vitals->Age->cellAttributes() ?>>
<span<?php echo $patient_vitals->Age->viewAttributes() ?>>
<?php echo $patient_vitals->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_vitals->Gender->cellAttributes() ?>>
<span<?php echo $patient_vitals->Gender->viewAttributes() ?>>
<?php echo $patient_vitals->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $patient_vitals->PatientId->cellAttributes() ?>>
<span<?php echo $patient_vitals->PatientId->viewAttributes() ?>>
<?php echo $patient_vitals->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_vitals->Reception->cellAttributes() ?>>
<span<?php echo $patient_vitals->Reception->viewAttributes() ?>>
<?php echo $patient_vitals->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $patient_vitals->HospID->cellAttributes() ?>>
<span<?php echo $patient_vitals->HospID->viewAttributes() ?>>
<?php echo $patient_vitals->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_vitals_preview->ListOptions->render("body", "right", $patient_vitals_preview->RowCnt);
?>
	</tr>
<?php
	$patient_vitals_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_vitals_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_vitals_preview->Pager)) $patient_vitals_preview->Pager = new PrevNextPager($patient_vitals_preview->StartRec, $patient_vitals_preview->DisplayRecs, $patient_vitals_preview->TotalRecs) ?>
<?php if ($patient_vitals_preview->Pager->RecordCount > 0 && $patient_vitals_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_vitals_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_vitals_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_vitals_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_vitals_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_vitals_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_vitals_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_vitals_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_vitals_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_vitals_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_vitals_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_vitals_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_vitals_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_vitals_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($patient_vitals_preview->Recordset)
	$patient_vitals_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_vitals_preview->terminate();
?>