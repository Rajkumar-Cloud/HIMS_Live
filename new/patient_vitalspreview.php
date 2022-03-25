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
<?php if ($patient_vitals_preview->TotalRecords > 0) { ?>
<div class="card ew-grid patient_vitals"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_vitals_preview->renderListOptions();

// Render list options (header, left)
$patient_vitals_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_vitals_preview->id->Visible) { // id ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->id) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->id->headerCellClass() ?>"><?php echo $patient_vitals_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->id->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->id->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->id->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->mrnno) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->mrnno->headerCellClass() ?>"><?php echo $patient_vitals_preview->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->mrnno->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->mrnno->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->mrnno->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->PatientName) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->PatientName->headerCellClass() ?>"><?php echo $patient_vitals_preview->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->PatientName->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->PatientName->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->PatientName->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->PatID->Visible) { // PatID ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->PatID) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->PatID->headerCellClass() ?>"><?php echo $patient_vitals_preview->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->PatID->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->PatID->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->PatID->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->MobileNumber) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->MobileNumber->headerCellClass() ?>"><?php echo $patient_vitals_preview->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->MobileNumber->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->MobileNumber->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->MobileNumber->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->HT->Visible) { // HT ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->HT) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->HT->headerCellClass() ?>"><?php echo $patient_vitals_preview->HT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->HT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->HT->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->HT->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->HT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->HT->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->WT->Visible) { // WT ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->WT) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->WT->headerCellClass() ?>"><?php echo $patient_vitals_preview->WT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->WT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->WT->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->WT->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->WT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->WT->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->SurfaceArea->Visible) { // SurfaceArea ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->SurfaceArea) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->SurfaceArea->headerCellClass() ?>"><?php echo $patient_vitals_preview->SurfaceArea->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->SurfaceArea->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->SurfaceArea->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->SurfaceArea->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->SurfaceArea->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->SurfaceArea->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->BodyMassIndex->Visible) { // BodyMassIndex ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->BodyMassIndex) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->BodyMassIndex->headerCellClass() ?>"><?php echo $patient_vitals_preview->BodyMassIndex->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->BodyMassIndex->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->BodyMassIndex->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->BodyMassIndex->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->BodyMassIndex->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->BodyMassIndex->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->AnticoagulantifAny) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->AnticoagulantifAny->headerCellClass() ?>"><?php echo $patient_vitals_preview->AnticoagulantifAny->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->AnticoagulantifAny->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->AnticoagulantifAny->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->AnticoagulantifAny->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->AnticoagulantifAny->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->AnticoagulantifAny->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->FoodAllergies->Visible) { // FoodAllergies ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->FoodAllergies) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->FoodAllergies->headerCellClass() ?>"><?php echo $patient_vitals_preview->FoodAllergies->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->FoodAllergies->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->FoodAllergies->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->FoodAllergies->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->FoodAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->FoodAllergies->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->GenericAllergies->Visible) { // GenericAllergies ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->GenericAllergies) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->GenericAllergies->headerCellClass() ?>"><?php echo $patient_vitals_preview->GenericAllergies->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->GenericAllergies->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->GenericAllergies->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->GenericAllergies->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->GenericAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->GenericAllergies->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->GroupAllergies->Visible) { // GroupAllergies ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->GroupAllergies) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->GroupAllergies->headerCellClass() ?>"><?php echo $patient_vitals_preview->GroupAllergies->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->GroupAllergies->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->GroupAllergies->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->GroupAllergies->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->GroupAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->GroupAllergies->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->Temp->Visible) { // Temp ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->Temp) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->Temp->headerCellClass() ?>"><?php echo $patient_vitals_preview->Temp->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->Temp->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->Temp->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->Temp->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->Temp->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->Temp->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->Pulse->Visible) { // Pulse ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->Pulse) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->Pulse->headerCellClass() ?>"><?php echo $patient_vitals_preview->Pulse->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->Pulse->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->Pulse->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->Pulse->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->Pulse->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->Pulse->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->BP->Visible) { // BP ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->BP) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->BP->headerCellClass() ?>"><?php echo $patient_vitals_preview->BP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->BP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->BP->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->BP->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->BP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->BP->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->PR->Visible) { // PR ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->PR) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->PR->headerCellClass() ?>"><?php echo $patient_vitals_preview->PR->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->PR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->PR->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->PR->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->PR->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->PR->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->CNS->Visible) { // CNS ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->CNS) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->CNS->headerCellClass() ?>"><?php echo $patient_vitals_preview->CNS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->CNS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->CNS->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->CNS->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->CNS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->CNS->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->RSA->Visible) { // RSA ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->RSA) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->RSA->headerCellClass() ?>"><?php echo $patient_vitals_preview->RSA->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->RSA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->RSA->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->RSA->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->RSA->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->RSA->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->CVS->Visible) { // CVS ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->CVS) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->CVS->headerCellClass() ?>"><?php echo $patient_vitals_preview->CVS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->CVS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->CVS->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->CVS->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->CVS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->CVS->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->PA->Visible) { // PA ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->PA) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->PA->headerCellClass() ?>"><?php echo $patient_vitals_preview->PA->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->PA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->PA->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->PA->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->PA->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->PA->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->PS->Visible) { // PS ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->PS) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->PS->headerCellClass() ?>"><?php echo $patient_vitals_preview->PS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->PS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->PS->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->PS->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->PS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->PS->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->PV->Visible) { // PV ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->PV) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->PV->headerCellClass() ?>"><?php echo $patient_vitals_preview->PV->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->PV->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->PV->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->PV->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->PV->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->PV->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->clinicaldetails->Visible) { // clinicaldetails ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->clinicaldetails) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->clinicaldetails->headerCellClass() ?>"><?php echo $patient_vitals_preview->clinicaldetails->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->clinicaldetails->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->clinicaldetails->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->clinicaldetails->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->clinicaldetails->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->clinicaldetails->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->status->Visible) { // status ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->status) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->status->headerCellClass() ?>"><?php echo $patient_vitals_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->status->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->status->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->status->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->createdby->Visible) { // createdby ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->createdby) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->createdby->headerCellClass() ?>"><?php echo $patient_vitals_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->createdby->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->createdby->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->createdby->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->createddatetime) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->createddatetime->headerCellClass() ?>"><?php echo $patient_vitals_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->createddatetime->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->createddatetime->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->modifiedby) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->modifiedby->headerCellClass() ?>"><?php echo $patient_vitals_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->modifiedby->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->modifiedby->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->modifieddatetime->headerCellClass() ?>"><?php echo $patient_vitals_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->modifieddatetime->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->modifieddatetime->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->Age->Visible) { // Age ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->Age) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->Age->headerCellClass() ?>"><?php echo $patient_vitals_preview->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->Age->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->Age->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->Age->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->Gender->Visible) { // Gender ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->Gender) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->Gender->headerCellClass() ?>"><?php echo $patient_vitals_preview->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->Gender->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->Gender->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->Gender->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->PatientId) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->PatientId->headerCellClass() ?>"><?php echo $patient_vitals_preview->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->PatientId->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->PatientId->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->PatientId->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->Reception->Visible) { // Reception ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->Reception) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->Reception->headerCellClass() ?>"><?php echo $patient_vitals_preview->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->Reception->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->Reception->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->Reception->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_preview->HospID->Visible) { // HospID ?>
	<?php if ($patient_vitals->SortUrl($patient_vitals_preview->HospID) == "") { ?>
		<th class="<?php echo $patient_vitals_preview->HospID->headerCellClass() ?>"><?php echo $patient_vitals_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_vitals_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_vitals_preview->HospID->Name) ?>" data-sort-order="<?php echo $patient_vitals_preview->SortField == $patient_vitals_preview->HospID->Name && $patient_vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_preview->SortField == $patient_vitals_preview->HospID->Name) { ?><?php if ($patient_vitals_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$patient_vitals_preview->RowCount = 0;
while ($patient_vitals_preview->Recordset && !$patient_vitals_preview->Recordset->EOF) {

	// Init row class and style
	$patient_vitals_preview->RecCount++;
	$patient_vitals_preview->RowCount++;
	$patient_vitals_preview->CssStyle = "";
	$patient_vitals_preview->loadListRowValues($patient_vitals_preview->Recordset);

	// Render row
	$patient_vitals->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_vitals_preview->resetAttributes();
	$patient_vitals_preview->renderListRow();

	// Render list options
	$patient_vitals_preview->renderListOptions();
?>
	<tr <?php echo $patient_vitals->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_vitals_preview->ListOptions->render("body", "left", $patient_vitals_preview->RowCount);
?>
<?php if ($patient_vitals_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_vitals_preview->id->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->id->viewAttributes() ?>><?php echo $patient_vitals_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_vitals_preview->mrnno->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->mrnno->viewAttributes() ?>><?php echo $patient_vitals_preview->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_vitals_preview->PatientName->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->PatientName->viewAttributes() ?>><?php echo $patient_vitals_preview->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $patient_vitals_preview->PatID->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->PatID->viewAttributes() ?>><?php echo $patient_vitals_preview->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $patient_vitals_preview->MobileNumber->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->MobileNumber->viewAttributes() ?>><?php echo $patient_vitals_preview->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->HT->Visible) { // HT ?>
		<!-- HT -->
		<td<?php echo $patient_vitals_preview->HT->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->HT->viewAttributes() ?>><?php echo $patient_vitals_preview->HT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->WT->Visible) { // WT ?>
		<!-- WT -->
		<td<?php echo $patient_vitals_preview->WT->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->WT->viewAttributes() ?>><?php echo $patient_vitals_preview->WT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->SurfaceArea->Visible) { // SurfaceArea ?>
		<!-- SurfaceArea -->
		<td<?php echo $patient_vitals_preview->SurfaceArea->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->SurfaceArea->viewAttributes() ?>><?php echo $patient_vitals_preview->SurfaceArea->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->BodyMassIndex->Visible) { // BodyMassIndex ?>
		<!-- BodyMassIndex -->
		<td<?php echo $patient_vitals_preview->BodyMassIndex->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->BodyMassIndex->viewAttributes() ?>><?php echo $patient_vitals_preview->BodyMassIndex->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
		<!-- AnticoagulantifAny -->
		<td<?php echo $patient_vitals_preview->AnticoagulantifAny->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->AnticoagulantifAny->viewAttributes() ?>><?php echo $patient_vitals_preview->AnticoagulantifAny->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->FoodAllergies->Visible) { // FoodAllergies ?>
		<!-- FoodAllergies -->
		<td<?php echo $patient_vitals_preview->FoodAllergies->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->FoodAllergies->viewAttributes() ?>><?php echo $patient_vitals_preview->FoodAllergies->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->GenericAllergies->Visible) { // GenericAllergies ?>
		<!-- GenericAllergies -->
		<td<?php echo $patient_vitals_preview->GenericAllergies->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->GenericAllergies->viewAttributes() ?>><?php echo $patient_vitals_preview->GenericAllergies->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->GroupAllergies->Visible) { // GroupAllergies ?>
		<!-- GroupAllergies -->
		<td<?php echo $patient_vitals_preview->GroupAllergies->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->GroupAllergies->viewAttributes() ?>><?php echo $patient_vitals_preview->GroupAllergies->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->Temp->Visible) { // Temp ?>
		<!-- Temp -->
		<td<?php echo $patient_vitals_preview->Temp->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->Temp->viewAttributes() ?>><?php echo $patient_vitals_preview->Temp->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->Pulse->Visible) { // Pulse ?>
		<!-- Pulse -->
		<td<?php echo $patient_vitals_preview->Pulse->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->Pulse->viewAttributes() ?>><?php echo $patient_vitals_preview->Pulse->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->BP->Visible) { // BP ?>
		<!-- BP -->
		<td<?php echo $patient_vitals_preview->BP->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->BP->viewAttributes() ?>><?php echo $patient_vitals_preview->BP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->PR->Visible) { // PR ?>
		<!-- PR -->
		<td<?php echo $patient_vitals_preview->PR->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->PR->viewAttributes() ?>><?php echo $patient_vitals_preview->PR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->CNS->Visible) { // CNS ?>
		<!-- CNS -->
		<td<?php echo $patient_vitals_preview->CNS->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->CNS->viewAttributes() ?>><?php echo $patient_vitals_preview->CNS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->RSA->Visible) { // RSA ?>
		<!-- RSA -->
		<td<?php echo $patient_vitals_preview->RSA->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->RSA->viewAttributes() ?>><?php echo $patient_vitals_preview->RSA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->CVS->Visible) { // CVS ?>
		<!-- CVS -->
		<td<?php echo $patient_vitals_preview->CVS->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->CVS->viewAttributes() ?>><?php echo $patient_vitals_preview->CVS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->PA->Visible) { // PA ?>
		<!-- PA -->
		<td<?php echo $patient_vitals_preview->PA->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->PA->viewAttributes() ?>><?php echo $patient_vitals_preview->PA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->PS->Visible) { // PS ?>
		<!-- PS -->
		<td<?php echo $patient_vitals_preview->PS->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->PS->viewAttributes() ?>><?php echo $patient_vitals_preview->PS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->PV->Visible) { // PV ?>
		<!-- PV -->
		<td<?php echo $patient_vitals_preview->PV->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->PV->viewAttributes() ?>><?php echo $patient_vitals_preview->PV->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->clinicaldetails->Visible) { // clinicaldetails ?>
		<!-- clinicaldetails -->
		<td<?php echo $patient_vitals_preview->clinicaldetails->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->clinicaldetails->viewAttributes() ?>><?php echo $patient_vitals_preview->clinicaldetails->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_vitals_preview->status->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->status->viewAttributes() ?>><?php echo $patient_vitals_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $patient_vitals_preview->createdby->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->createdby->viewAttributes() ?>><?php echo $patient_vitals_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $patient_vitals_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->createddatetime->viewAttributes() ?>><?php echo $patient_vitals_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $patient_vitals_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->modifiedby->viewAttributes() ?>><?php echo $patient_vitals_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $patient_vitals_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->modifieddatetime->viewAttributes() ?>><?php echo $patient_vitals_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_vitals_preview->Age->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->Age->viewAttributes() ?>><?php echo $patient_vitals_preview->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_vitals_preview->Gender->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->Gender->viewAttributes() ?>><?php echo $patient_vitals_preview->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $patient_vitals_preview->PatientId->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->PatientId->viewAttributes() ?>><?php echo $patient_vitals_preview->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_vitals_preview->Reception->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->Reception->viewAttributes() ?>><?php echo $patient_vitals_preview->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_vitals_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $patient_vitals_preview->HospID->cellAttributes() ?>>
<span<?php echo $patient_vitals_preview->HospID->viewAttributes() ?>><?php echo $patient_vitals_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_vitals_preview->ListOptions->render("body", "right", $patient_vitals_preview->RowCount);
?>
	</tr>
<?php
	$patient_vitals_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $patient_vitals_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_vitals_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($patient_vitals_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$patient_vitals_preview->showPageFooter();
if (Config("DEBUG"))
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