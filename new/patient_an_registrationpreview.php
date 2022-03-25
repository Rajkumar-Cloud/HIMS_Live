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
$patient_an_registration_preview = new patient_an_registration_preview();

// Run the page
$patient_an_registration_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_an_registration_preview->Page_Render();
?>
<?php $patient_an_registration_preview->showPageHeader(); ?>
<?php if ($patient_an_registration_preview->TotalRecords > 0) { ?>
<div class="card ew-grid patient_an_registration"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_an_registration_preview->renderListOptions();

// Render list options (header, left)
$patient_an_registration_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_an_registration_preview->id->Visible) { // id ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->id) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->id->headerCellClass() ?>"><?php echo $patient_an_registration_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->id->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->id->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->id->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->pid->Visible) { // pid ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->pid) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->pid->headerCellClass() ?>"><?php echo $patient_an_registration_preview->pid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->pid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->pid->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->pid->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->pid->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->fid->Visible) { // fid ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->fid) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->fid->headerCellClass() ?>"><?php echo $patient_an_registration_preview->fid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->fid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->fid->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->fid->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->fid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->fid->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->G->Visible) { // G ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->G) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->G->headerCellClass() ?>"><?php echo $patient_an_registration_preview->G->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->G->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->G->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->G->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->G->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->G->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->P->Visible) { // P ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->P) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->P->headerCellClass() ?>"><?php echo $patient_an_registration_preview->P->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->P->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->P->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->P->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->P->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->P->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->L->Visible) { // L ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->L) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->L->headerCellClass() ?>"><?php echo $patient_an_registration_preview->L->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->L->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->L->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->L->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->L->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->L->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->A->Visible) { // A ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->A) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->A->headerCellClass() ?>"><?php echo $patient_an_registration_preview->A->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->A->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->A->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->A->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->A->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->A->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->E->Visible) { // E ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->E) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->E->headerCellClass() ?>"><?php echo $patient_an_registration_preview->E->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->E->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->E->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->E->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->E->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->E->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->M->Visible) { // M ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->M) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->M->headerCellClass() ?>"><?php echo $patient_an_registration_preview->M->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->M->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->M->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->M->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->M->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->M->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->LMP->Visible) { // LMP ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->LMP) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->LMP->headerCellClass() ?>"><?php echo $patient_an_registration_preview->LMP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->LMP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->LMP->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->LMP->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->LMP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->LMP->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->EDO->Visible) { // EDO ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->EDO) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->EDO->headerCellClass() ?>"><?php echo $patient_an_registration_preview->EDO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->EDO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->EDO->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->EDO->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->EDO->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->EDO->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->MenstrualHistory) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->MenstrualHistory->headerCellClass() ?>"><?php echo $patient_an_registration_preview->MenstrualHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->MenstrualHistory->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->MenstrualHistory->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->MenstrualHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->MenstrualHistory->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->MaritalHistory->Visible) { // MaritalHistory ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->MaritalHistory) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->MaritalHistory->headerCellClass() ?>"><?php echo $patient_an_registration_preview->MaritalHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->MaritalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->MaritalHistory->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->MaritalHistory->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->MaritalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->MaritalHistory->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ObstetricHistory) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ObstetricHistory->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ObstetricHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ObstetricHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ObstetricHistory->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ObstetricHistory->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ObstetricHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ObstetricHistory->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->PreviousHistoryofGDM) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->PreviousHistoryofGDM->headerCellClass() ?>"><?php echo $patient_an_registration_preview->PreviousHistoryofGDM->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->PreviousHistoryofGDM->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->PreviousHistoryofGDM->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->PreviousHistoryofGDM->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->PreviousHistoryofGDM->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->PreviousHistoryofGDM->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->PreviousHistorofPIH) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->PreviousHistorofPIH->headerCellClass() ?>"><?php echo $patient_an_registration_preview->PreviousHistorofPIH->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->PreviousHistorofPIH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->PreviousHistorofPIH->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->PreviousHistorofPIH->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->PreviousHistorofPIH->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->PreviousHistorofPIH->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->PreviousHistoryofIUGR) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->PreviousHistoryofIUGR->headerCellClass() ?>"><?php echo $patient_an_registration_preview->PreviousHistoryofIUGR->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->PreviousHistoryofIUGR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->PreviousHistoryofIUGR->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->PreviousHistoryofIUGR->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->PreviousHistoryofIUGR->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->PreviousHistoryofIUGR->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->PreviousHistoryofOligohydramnios) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><?php echo $patient_an_registration_preview->PreviousHistoryofOligohydramnios->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->PreviousHistoryofOligohydramnios->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->PreviousHistoryofOligohydramnios->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->PreviousHistoryofOligohydramnios->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->PreviousHistoryofOligohydramnios->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->PreviousHistoryofPreterm) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->PreviousHistoryofPreterm->headerCellClass() ?>"><?php echo $patient_an_registration_preview->PreviousHistoryofPreterm->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->PreviousHistoryofPreterm->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->PreviousHistoryofPreterm->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->PreviousHistoryofPreterm->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->PreviousHistoryofPreterm->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->PreviousHistoryofPreterm->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->G1->Visible) { // G1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->G1) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->G1->headerCellClass() ?>"><?php echo $patient_an_registration_preview->G1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->G1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->G1->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->G1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->G1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->G1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->G2->Visible) { // G2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->G2) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->G2->headerCellClass() ?>"><?php echo $patient_an_registration_preview->G2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->G2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->G2->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->G2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->G2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->G2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->G3->Visible) { // G3 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->G3) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->G3->headerCellClass() ?>"><?php echo $patient_an_registration_preview->G3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->G3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->G3->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->G3->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->G3->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->G3->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->DeliveryNDLSCS1) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->DeliveryNDLSCS1->headerCellClass() ?>"><?php echo $patient_an_registration_preview->DeliveryNDLSCS1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->DeliveryNDLSCS1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->DeliveryNDLSCS1->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->DeliveryNDLSCS1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->DeliveryNDLSCS1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->DeliveryNDLSCS1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->DeliveryNDLSCS2) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->DeliveryNDLSCS2->headerCellClass() ?>"><?php echo $patient_an_registration_preview->DeliveryNDLSCS2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->DeliveryNDLSCS2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->DeliveryNDLSCS2->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->DeliveryNDLSCS2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->DeliveryNDLSCS2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->DeliveryNDLSCS2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->DeliveryNDLSCS3) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->DeliveryNDLSCS3->headerCellClass() ?>"><?php echo $patient_an_registration_preview->DeliveryNDLSCS3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->DeliveryNDLSCS3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->DeliveryNDLSCS3->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->DeliveryNDLSCS3->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->DeliveryNDLSCS3->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->DeliveryNDLSCS3->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->BabySexweight1->Visible) { // BabySexweight1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->BabySexweight1) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->BabySexweight1->headerCellClass() ?>"><?php echo $patient_an_registration_preview->BabySexweight1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->BabySexweight1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->BabySexweight1->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->BabySexweight1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->BabySexweight1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->BabySexweight1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->BabySexweight2->Visible) { // BabySexweight2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->BabySexweight2) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->BabySexweight2->headerCellClass() ?>"><?php echo $patient_an_registration_preview->BabySexweight2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->BabySexweight2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->BabySexweight2->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->BabySexweight2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->BabySexweight2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->BabySexweight2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->BabySexweight3->Visible) { // BabySexweight3 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->BabySexweight3) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->BabySexweight3->headerCellClass() ?>"><?php echo $patient_an_registration_preview->BabySexweight3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->BabySexweight3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->BabySexweight3->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->BabySexweight3->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->BabySexweight3->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->BabySexweight3->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->PastMedicalHistory) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->PastMedicalHistory->headerCellClass() ?>"><?php echo $patient_an_registration_preview->PastMedicalHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->PastMedicalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->PastMedicalHistory->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->PastMedicalHistory->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->PastMedicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->PastMedicalHistory->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->PastSurgicalHistory) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->PastSurgicalHistory->headerCellClass() ?>"><?php echo $patient_an_registration_preview->PastSurgicalHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->PastSurgicalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->PastSurgicalHistory->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->PastSurgicalHistory->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->PastSurgicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->PastSurgicalHistory->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->FamilyHistory) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->FamilyHistory->headerCellClass() ?>"><?php echo $patient_an_registration_preview->FamilyHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->FamilyHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->FamilyHistory->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->FamilyHistory->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->FamilyHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->FamilyHistory->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Viability->Visible) { // Viability ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Viability) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Viability->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Viability->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Viability->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Viability->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Viability->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Viability->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Viability->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ViabilityDATE->Visible) { // ViabilityDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ViabilityDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ViabilityDATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ViabilityDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ViabilityDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ViabilityDATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ViabilityDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ViabilityDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ViabilityDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ViabilityREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ViabilityREPORT->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ViabilityREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ViabilityREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ViabilityREPORT->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ViabilityREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ViabilityREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ViabilityREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Viability2->Visible) { // Viability2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Viability2) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Viability2->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Viability2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Viability2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Viability2->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Viability2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Viability2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Viability2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Viability2DATE->Visible) { // Viability2DATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Viability2DATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Viability2DATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Viability2DATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Viability2DATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Viability2DATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Viability2DATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Viability2DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Viability2DATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Viability2REPORT->Visible) { // Viability2REPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Viability2REPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Viability2REPORT->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Viability2REPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Viability2REPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Viability2REPORT->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Viability2REPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Viability2REPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Viability2REPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->NTscan->Visible) { // NTscan ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->NTscan) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->NTscan->headerCellClass() ?>"><?php echo $patient_an_registration_preview->NTscan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->NTscan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->NTscan->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->NTscan->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->NTscan->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->NTscan->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->NTscanDATE->Visible) { // NTscanDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->NTscanDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->NTscanDATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->NTscanDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->NTscanDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->NTscanDATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->NTscanDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->NTscanDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->NTscanDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->NTscanREPORT->Visible) { // NTscanREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->NTscanREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->NTscanREPORT->headerCellClass() ?>"><?php echo $patient_an_registration_preview->NTscanREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->NTscanREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->NTscanREPORT->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->NTscanREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->NTscanREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->NTscanREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->EarlyTarget->Visible) { // EarlyTarget ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->EarlyTarget) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->EarlyTarget->headerCellClass() ?>"><?php echo $patient_an_registration_preview->EarlyTarget->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->EarlyTarget->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->EarlyTarget->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->EarlyTarget->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->EarlyTarget->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->EarlyTarget->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->EarlyTargetDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->EarlyTargetDATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->EarlyTargetDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->EarlyTargetDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->EarlyTargetDATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->EarlyTargetDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->EarlyTargetDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->EarlyTargetDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->EarlyTargetREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->EarlyTargetREPORT->headerCellClass() ?>"><?php echo $patient_an_registration_preview->EarlyTargetREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->EarlyTargetREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->EarlyTargetREPORT->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->EarlyTargetREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->EarlyTargetREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->EarlyTargetREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Anomaly->Visible) { // Anomaly ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Anomaly) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Anomaly->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Anomaly->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Anomaly->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Anomaly->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Anomaly->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Anomaly->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Anomaly->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->AnomalyDATE->Visible) { // AnomalyDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->AnomalyDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->AnomalyDATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->AnomalyDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->AnomalyDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->AnomalyDATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->AnomalyDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->AnomalyDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->AnomalyDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->AnomalyREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->AnomalyREPORT->headerCellClass() ?>"><?php echo $patient_an_registration_preview->AnomalyREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->AnomalyREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->AnomalyREPORT->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->AnomalyREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->AnomalyREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->AnomalyREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Growth->Visible) { // Growth ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Growth) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Growth->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Growth->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Growth->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Growth->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Growth->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Growth->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Growth->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->GrowthDATE->Visible) { // GrowthDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->GrowthDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->GrowthDATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->GrowthDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->GrowthDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->GrowthDATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->GrowthDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->GrowthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->GrowthDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->GrowthREPORT->Visible) { // GrowthREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->GrowthREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->GrowthREPORT->headerCellClass() ?>"><?php echo $patient_an_registration_preview->GrowthREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->GrowthREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->GrowthREPORT->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->GrowthREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->GrowthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->GrowthREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Growth1->Visible) { // Growth1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Growth1) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Growth1->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Growth1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Growth1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Growth1->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Growth1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Growth1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Growth1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Growth1DATE->Visible) { // Growth1DATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Growth1DATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Growth1DATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Growth1DATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Growth1DATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Growth1DATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Growth1DATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Growth1DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Growth1DATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Growth1REPORT->Visible) { // Growth1REPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Growth1REPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Growth1REPORT->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Growth1REPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Growth1REPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Growth1REPORT->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Growth1REPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Growth1REPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Growth1REPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ANProfile->Visible) { // ANProfile ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ANProfile) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ANProfile->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ANProfile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ANProfile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ANProfile->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ANProfile->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ANProfile->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ANProfile->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ANProfileDATE->Visible) { // ANProfileDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ANProfileDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ANProfileDATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ANProfileDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ANProfileDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ANProfileDATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ANProfileDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ANProfileDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ANProfileDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ANProfileINHOUSE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ANProfileINHOUSE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ANProfileINHOUSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ANProfileINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ANProfileINHOUSE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ANProfileINHOUSE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ANProfileINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ANProfileINHOUSE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ANProfileREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ANProfileREPORT->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ANProfileREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ANProfileREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ANProfileREPORT->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ANProfileREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ANProfileREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ANProfileREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->DualMarker->Visible) { // DualMarker ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->DualMarker) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->DualMarker->headerCellClass() ?>"><?php echo $patient_an_registration_preview->DualMarker->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->DualMarker->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->DualMarker->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->DualMarker->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->DualMarker->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->DualMarker->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->DualMarkerDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->DualMarkerDATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->DualMarkerDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->DualMarkerDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->DualMarkerDATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->DualMarkerDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->DualMarkerDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->DualMarkerDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->DualMarkerINHOUSE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->DualMarkerINHOUSE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->DualMarkerINHOUSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->DualMarkerINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->DualMarkerINHOUSE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->DualMarkerINHOUSE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->DualMarkerINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->DualMarkerINHOUSE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->DualMarkerREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->DualMarkerREPORT->headerCellClass() ?>"><?php echo $patient_an_registration_preview->DualMarkerREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->DualMarkerREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->DualMarkerREPORT->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->DualMarkerREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->DualMarkerREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->DualMarkerREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Quadruple->Visible) { // Quadruple ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Quadruple) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Quadruple->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Quadruple->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Quadruple->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Quadruple->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Quadruple->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Quadruple->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Quadruple->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->QuadrupleDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->QuadrupleDATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->QuadrupleDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->QuadrupleDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->QuadrupleDATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->QuadrupleDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->QuadrupleDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->QuadrupleDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->QuadrupleINHOUSE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->QuadrupleINHOUSE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->QuadrupleINHOUSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->QuadrupleINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->QuadrupleINHOUSE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->QuadrupleINHOUSE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->QuadrupleINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->QuadrupleINHOUSE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->QuadrupleREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->QuadrupleREPORT->headerCellClass() ?>"><?php echo $patient_an_registration_preview->QuadrupleREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->QuadrupleREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->QuadrupleREPORT->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->QuadrupleREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->QuadrupleREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->QuadrupleREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->A5month->Visible) { // A5month ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->A5month) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->A5month->headerCellClass() ?>"><?php echo $patient_an_registration_preview->A5month->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->A5month->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->A5month->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->A5month->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->A5month->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->A5month->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->A5monthDATE->Visible) { // A5monthDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->A5monthDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->A5monthDATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->A5monthDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->A5monthDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->A5monthDATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->A5monthDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->A5monthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->A5monthDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->A5monthINHOUSE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->A5monthINHOUSE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->A5monthINHOUSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->A5monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->A5monthINHOUSE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->A5monthINHOUSE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->A5monthINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->A5monthINHOUSE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->A5monthREPORT->Visible) { // A5monthREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->A5monthREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->A5monthREPORT->headerCellClass() ?>"><?php echo $patient_an_registration_preview->A5monthREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->A5monthREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->A5monthREPORT->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->A5monthREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->A5monthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->A5monthREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->A7month->Visible) { // A7month ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->A7month) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->A7month->headerCellClass() ?>"><?php echo $patient_an_registration_preview->A7month->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->A7month->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->A7month->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->A7month->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->A7month->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->A7month->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->A7monthDATE->Visible) { // A7monthDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->A7monthDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->A7monthDATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->A7monthDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->A7monthDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->A7monthDATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->A7monthDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->A7monthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->A7monthDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->A7monthINHOUSE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->A7monthINHOUSE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->A7monthINHOUSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->A7monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->A7monthINHOUSE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->A7monthINHOUSE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->A7monthINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->A7monthINHOUSE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->A7monthREPORT->Visible) { // A7monthREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->A7monthREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->A7monthREPORT->headerCellClass() ?>"><?php echo $patient_an_registration_preview->A7monthREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->A7monthREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->A7monthREPORT->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->A7monthREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->A7monthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->A7monthREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->A9month->Visible) { // A9month ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->A9month) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->A9month->headerCellClass() ?>"><?php echo $patient_an_registration_preview->A9month->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->A9month->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->A9month->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->A9month->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->A9month->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->A9month->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->A9monthDATE->Visible) { // A9monthDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->A9monthDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->A9monthDATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->A9monthDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->A9monthDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->A9monthDATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->A9monthDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->A9monthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->A9monthDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->A9monthINHOUSE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->A9monthINHOUSE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->A9monthINHOUSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->A9monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->A9monthINHOUSE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->A9monthINHOUSE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->A9monthINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->A9monthINHOUSE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->A9monthREPORT->Visible) { // A9monthREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->A9monthREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->A9monthREPORT->headerCellClass() ?>"><?php echo $patient_an_registration_preview->A9monthREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->A9monthREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->A9monthREPORT->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->A9monthREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->A9monthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->A9monthREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->INJ->Visible) { // INJ ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->INJ) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->INJ->headerCellClass() ?>"><?php echo $patient_an_registration_preview->INJ->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->INJ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->INJ->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->INJ->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->INJ->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->INJ->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->INJDATE->Visible) { // INJDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->INJDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->INJDATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->INJDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->INJDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->INJDATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->INJDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->INJDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->INJDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->INJINHOUSE->Visible) { // INJINHOUSE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->INJINHOUSE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->INJINHOUSE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->INJINHOUSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->INJINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->INJINHOUSE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->INJINHOUSE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->INJINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->INJINHOUSE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->INJREPORT->Visible) { // INJREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->INJREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->INJREPORT->headerCellClass() ?>"><?php echo $patient_an_registration_preview->INJREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->INJREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->INJREPORT->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->INJREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->INJREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->INJREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Bleeding->Visible) { // Bleeding ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Bleeding) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Bleeding->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Bleeding->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Bleeding->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Bleeding->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Bleeding->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Bleeding->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Bleeding->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Hypothyroidism->Visible) { // Hypothyroidism ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Hypothyroidism) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Hypothyroidism->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Hypothyroidism->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Hypothyroidism->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Hypothyroidism->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Hypothyroidism->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Hypothyroidism->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Hypothyroidism->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->PICMENumber->Visible) { // PICMENumber ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->PICMENumber) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->PICMENumber->headerCellClass() ?>"><?php echo $patient_an_registration_preview->PICMENumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->PICMENumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->PICMENumber->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->PICMENumber->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->PICMENumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->PICMENumber->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Outcome->Visible) { // Outcome ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Outcome) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Outcome->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Outcome->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Outcome->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Outcome->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Outcome->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Outcome->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Outcome->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->DateofAdmission->Visible) { // DateofAdmission ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->DateofAdmission) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->DateofAdmission->headerCellClass() ?>"><?php echo $patient_an_registration_preview->DateofAdmission->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->DateofAdmission->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->DateofAdmission->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->DateofAdmission->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->DateofAdmission->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->DateofAdmission->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->DateodProcedure->Visible) { // DateodProcedure ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->DateodProcedure) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->DateodProcedure->headerCellClass() ?>"><?php echo $patient_an_registration_preview->DateodProcedure->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->DateodProcedure->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->DateodProcedure->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->DateodProcedure->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->DateodProcedure->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->DateodProcedure->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Miscarriage->Visible) { // Miscarriage ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Miscarriage) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Miscarriage->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Miscarriage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Miscarriage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Miscarriage->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Miscarriage->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Miscarriage->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Miscarriage->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ModeOfDelivery) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ModeOfDelivery->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ModeOfDelivery->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ModeOfDelivery->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ModeOfDelivery->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ModeOfDelivery->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ModeOfDelivery->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ModeOfDelivery->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ND->Visible) { // ND ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ND) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ND->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ND->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ND->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ND->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ND->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ND->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ND->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->NDS->Visible) { // NDS ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->NDS) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->NDS->headerCellClass() ?>"><?php echo $patient_an_registration_preview->NDS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->NDS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->NDS->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->NDS->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->NDS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->NDS->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->NDP->Visible) { // NDP ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->NDP) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->NDP->headerCellClass() ?>"><?php echo $patient_an_registration_preview->NDP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->NDP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->NDP->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->NDP->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->NDP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->NDP->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Vaccum->Visible) { // Vaccum ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Vaccum) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Vaccum->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Vaccum->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Vaccum->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Vaccum->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Vaccum->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Vaccum->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Vaccum->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->VaccumS->Visible) { // VaccumS ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->VaccumS) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->VaccumS->headerCellClass() ?>"><?php echo $patient_an_registration_preview->VaccumS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->VaccumS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->VaccumS->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->VaccumS->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->VaccumS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->VaccumS->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->VaccumP->Visible) { // VaccumP ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->VaccumP) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->VaccumP->headerCellClass() ?>"><?php echo $patient_an_registration_preview->VaccumP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->VaccumP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->VaccumP->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->VaccumP->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->VaccumP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->VaccumP->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Forceps->Visible) { // Forceps ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Forceps) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Forceps->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Forceps->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Forceps->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Forceps->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Forceps->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Forceps->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Forceps->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ForcepsS->Visible) { // ForcepsS ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ForcepsS) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ForcepsS->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ForcepsS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ForcepsS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ForcepsS->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ForcepsS->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ForcepsS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ForcepsS->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ForcepsP->Visible) { // ForcepsP ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ForcepsP) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ForcepsP->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ForcepsP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ForcepsP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ForcepsP->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ForcepsP->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ForcepsP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ForcepsP->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Elective->Visible) { // Elective ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Elective) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Elective->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Elective->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Elective->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Elective->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Elective->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Elective->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Elective->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ElectiveS->Visible) { // ElectiveS ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ElectiveS) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ElectiveS->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ElectiveS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ElectiveS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ElectiveS->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ElectiveS->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ElectiveS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ElectiveS->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ElectiveP->Visible) { // ElectiveP ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ElectiveP) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ElectiveP->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ElectiveP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ElectiveP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ElectiveP->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ElectiveP->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ElectiveP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ElectiveP->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Emergency->Visible) { // Emergency ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Emergency) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Emergency->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Emergency->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Emergency->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Emergency->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Emergency->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Emergency->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Emergency->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->EmergencyS->Visible) { // EmergencyS ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->EmergencyS) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->EmergencyS->headerCellClass() ?>"><?php echo $patient_an_registration_preview->EmergencyS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->EmergencyS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->EmergencyS->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->EmergencyS->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->EmergencyS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->EmergencyS->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->EmergencyP->Visible) { // EmergencyP ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->EmergencyP) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->EmergencyP->headerCellClass() ?>"><?php echo $patient_an_registration_preview->EmergencyP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->EmergencyP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->EmergencyP->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->EmergencyP->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->EmergencyP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->EmergencyP->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Maturity->Visible) { // Maturity ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Maturity) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Maturity->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Maturity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Maturity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Maturity->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Maturity->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Maturity->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Maturity->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Baby1->Visible) { // Baby1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Baby1) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Baby1->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Baby1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Baby1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Baby1->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Baby1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Baby1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Baby1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Baby2->Visible) { // Baby2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Baby2) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Baby2->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Baby2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Baby2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Baby2->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Baby2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Baby2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Baby2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->sex1->Visible) { // sex1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->sex1) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->sex1->headerCellClass() ?>"><?php echo $patient_an_registration_preview->sex1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->sex1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->sex1->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->sex1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->sex1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->sex1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->sex2->Visible) { // sex2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->sex2) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->sex2->headerCellClass() ?>"><?php echo $patient_an_registration_preview->sex2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->sex2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->sex2->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->sex2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->sex2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->sex2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->weight1->Visible) { // weight1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->weight1) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->weight1->headerCellClass() ?>"><?php echo $patient_an_registration_preview->weight1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->weight1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->weight1->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->weight1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->weight1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->weight1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->weight2->Visible) { // weight2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->weight2) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->weight2->headerCellClass() ?>"><?php echo $patient_an_registration_preview->weight2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->weight2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->weight2->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->weight2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->weight2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->weight2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->NICU1->Visible) { // NICU1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->NICU1) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->NICU1->headerCellClass() ?>"><?php echo $patient_an_registration_preview->NICU1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->NICU1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->NICU1->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->NICU1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->NICU1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->NICU1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->NICU2->Visible) { // NICU2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->NICU2) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->NICU2->headerCellClass() ?>"><?php echo $patient_an_registration_preview->NICU2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->NICU2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->NICU2->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->NICU2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->NICU2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->NICU2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Jaundice1->Visible) { // Jaundice1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Jaundice1) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Jaundice1->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Jaundice1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Jaundice1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Jaundice1->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Jaundice1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Jaundice1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Jaundice1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Jaundice2->Visible) { // Jaundice2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Jaundice2) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Jaundice2->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Jaundice2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Jaundice2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Jaundice2->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Jaundice2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Jaundice2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Jaundice2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Others1->Visible) { // Others1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Others1) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Others1->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Others1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Others1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Others1->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Others1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Others1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Others1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->Others2->Visible) { // Others2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->Others2) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->Others2->headerCellClass() ?>"><?php echo $patient_an_registration_preview->Others2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->Others2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->Others2->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->Others2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->Others2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->Others2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->SpillOverReasons->Visible) { // SpillOverReasons ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->SpillOverReasons) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->SpillOverReasons->headerCellClass() ?>"><?php echo $patient_an_registration_preview->SpillOverReasons->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->SpillOverReasons->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->SpillOverReasons->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->SpillOverReasons->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->SpillOverReasons->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->SpillOverReasons->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ANClosed->Visible) { // ANClosed ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ANClosed) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ANClosed->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ANClosed->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ANClosed->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ANClosed->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ANClosed->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ANClosed->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ANClosed->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ANClosedDATE->Visible) { // ANClosedDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ANClosedDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ANClosedDATE->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ANClosedDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ANClosedDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ANClosedDATE->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ANClosedDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ANClosedDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ANClosedDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->PastMedicalHistoryOthers) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->PastMedicalHistoryOthers->headerCellClass() ?>"><?php echo $patient_an_registration_preview->PastMedicalHistoryOthers->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->PastMedicalHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->PastMedicalHistoryOthers->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->PastMedicalHistoryOthers->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->PastMedicalHistoryOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->PastMedicalHistoryOthers->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->PastSurgicalHistoryOthers) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->PastSurgicalHistoryOthers->headerCellClass() ?>"><?php echo $patient_an_registration_preview->PastSurgicalHistoryOthers->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->PastSurgicalHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->PastSurgicalHistoryOthers->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->PastSurgicalHistoryOthers->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->PastSurgicalHistoryOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->PastSurgicalHistoryOthers->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->FamilyHistoryOthers) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->FamilyHistoryOthers->headerCellClass() ?>"><?php echo $patient_an_registration_preview->FamilyHistoryOthers->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->FamilyHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->FamilyHistoryOthers->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->FamilyHistoryOthers->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->FamilyHistoryOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->FamilyHistoryOthers->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->PresentPregnancyComplicationsOthers) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><?php echo $patient_an_registration_preview->PresentPregnancyComplicationsOthers->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->PresentPregnancyComplicationsOthers->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->PresentPregnancyComplicationsOthers->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->PresentPregnancyComplicationsOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->PresentPregnancyComplicationsOthers->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_preview->ETdate->Visible) { // ETdate ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration_preview->ETdate) == "") { ?>
		<th class="<?php echo $patient_an_registration_preview->ETdate->headerCellClass() ?>"><?php echo $patient_an_registration_preview->ETdate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration_preview->ETdate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_an_registration_preview->ETdate->Name) ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration_preview->ETdate->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_preview->ETdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration_preview->ETdate->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_an_registration_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_an_registration_preview->RecCount = 0;
$patient_an_registration_preview->RowCount = 0;
while ($patient_an_registration_preview->Recordset && !$patient_an_registration_preview->Recordset->EOF) {

	// Init row class and style
	$patient_an_registration_preview->RecCount++;
	$patient_an_registration_preview->RowCount++;
	$patient_an_registration_preview->CssStyle = "";
	$patient_an_registration_preview->loadListRowValues($patient_an_registration_preview->Recordset);

	// Render row
	$patient_an_registration->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_an_registration_preview->resetAttributes();
	$patient_an_registration_preview->renderListRow();

	// Render list options
	$patient_an_registration_preview->renderListOptions();
?>
	<tr <?php echo $patient_an_registration->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_an_registration_preview->ListOptions->render("body", "left", $patient_an_registration_preview->RowCount);
?>
<?php if ($patient_an_registration_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_an_registration_preview->id->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->id->viewAttributes() ?>><?php echo $patient_an_registration_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->pid->Visible) { // pid ?>
		<!-- pid -->
		<td<?php echo $patient_an_registration_preview->pid->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->pid->viewAttributes() ?>><?php echo $patient_an_registration_preview->pid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->fid->Visible) { // fid ?>
		<!-- fid -->
		<td<?php echo $patient_an_registration_preview->fid->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->fid->viewAttributes() ?>><?php echo $patient_an_registration_preview->fid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->G->Visible) { // G ?>
		<!-- G -->
		<td<?php echo $patient_an_registration_preview->G->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->G->viewAttributes() ?>><?php echo $patient_an_registration_preview->G->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->P->Visible) { // P ?>
		<!-- P -->
		<td<?php echo $patient_an_registration_preview->P->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->P->viewAttributes() ?>><?php echo $patient_an_registration_preview->P->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->L->Visible) { // L ?>
		<!-- L -->
		<td<?php echo $patient_an_registration_preview->L->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->L->viewAttributes() ?>><?php echo $patient_an_registration_preview->L->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->A->Visible) { // A ?>
		<!-- A -->
		<td<?php echo $patient_an_registration_preview->A->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->A->viewAttributes() ?>><?php echo $patient_an_registration_preview->A->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->E->Visible) { // E ?>
		<!-- E -->
		<td<?php echo $patient_an_registration_preview->E->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->E->viewAttributes() ?>><?php echo $patient_an_registration_preview->E->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->M->Visible) { // M ?>
		<!-- M -->
		<td<?php echo $patient_an_registration_preview->M->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->M->viewAttributes() ?>><?php echo $patient_an_registration_preview->M->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->LMP->Visible) { // LMP ?>
		<!-- LMP -->
		<td<?php echo $patient_an_registration_preview->LMP->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->LMP->viewAttributes() ?>><?php echo $patient_an_registration_preview->LMP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->EDO->Visible) { // EDO ?>
		<!-- EDO -->
		<td<?php echo $patient_an_registration_preview->EDO->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->EDO->viewAttributes() ?>><?php echo $patient_an_registration_preview->EDO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<!-- MenstrualHistory -->
		<td<?php echo $patient_an_registration_preview->MenstrualHistory->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->MenstrualHistory->viewAttributes() ?>><?php echo $patient_an_registration_preview->MenstrualHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->MaritalHistory->Visible) { // MaritalHistory ?>
		<!-- MaritalHistory -->
		<td<?php echo $patient_an_registration_preview->MaritalHistory->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->MaritalHistory->viewAttributes() ?>><?php echo $patient_an_registration_preview->MaritalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<!-- ObstetricHistory -->
		<td<?php echo $patient_an_registration_preview->ObstetricHistory->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ObstetricHistory->viewAttributes() ?>><?php echo $patient_an_registration_preview->ObstetricHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
		<!-- PreviousHistoryofGDM -->
		<td<?php echo $patient_an_registration_preview->PreviousHistoryofGDM->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->PreviousHistoryofGDM->viewAttributes() ?>><?php echo $patient_an_registration_preview->PreviousHistoryofGDM->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
		<!-- PreviousHistorofPIH -->
		<td<?php echo $patient_an_registration_preview->PreviousHistorofPIH->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->PreviousHistorofPIH->viewAttributes() ?>><?php echo $patient_an_registration_preview->PreviousHistorofPIH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
		<!-- PreviousHistoryofIUGR -->
		<td<?php echo $patient_an_registration_preview->PreviousHistoryofIUGR->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->PreviousHistoryofIUGR->viewAttributes() ?>><?php echo $patient_an_registration_preview->PreviousHistoryofIUGR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
		<!-- PreviousHistoryofOligohydramnios -->
		<td<?php echo $patient_an_registration_preview->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->PreviousHistoryofOligohydramnios->viewAttributes() ?>><?php echo $patient_an_registration_preview->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
		<!-- PreviousHistoryofPreterm -->
		<td<?php echo $patient_an_registration_preview->PreviousHistoryofPreterm->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->PreviousHistoryofPreterm->viewAttributes() ?>><?php echo $patient_an_registration_preview->PreviousHistoryofPreterm->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->G1->Visible) { // G1 ?>
		<!-- G1 -->
		<td<?php echo $patient_an_registration_preview->G1->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->G1->viewAttributes() ?>><?php echo $patient_an_registration_preview->G1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->G2->Visible) { // G2 ?>
		<!-- G2 -->
		<td<?php echo $patient_an_registration_preview->G2->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->G2->viewAttributes() ?>><?php echo $patient_an_registration_preview->G2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->G3->Visible) { // G3 ?>
		<!-- G3 -->
		<td<?php echo $patient_an_registration_preview->G3->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->G3->viewAttributes() ?>><?php echo $patient_an_registration_preview->G3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
		<!-- DeliveryNDLSCS1 -->
		<td<?php echo $patient_an_registration_preview->DeliveryNDLSCS1->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->DeliveryNDLSCS1->viewAttributes() ?>><?php echo $patient_an_registration_preview->DeliveryNDLSCS1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
		<!-- DeliveryNDLSCS2 -->
		<td<?php echo $patient_an_registration_preview->DeliveryNDLSCS2->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->DeliveryNDLSCS2->viewAttributes() ?>><?php echo $patient_an_registration_preview->DeliveryNDLSCS2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
		<!-- DeliveryNDLSCS3 -->
		<td<?php echo $patient_an_registration_preview->DeliveryNDLSCS3->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->DeliveryNDLSCS3->viewAttributes() ?>><?php echo $patient_an_registration_preview->DeliveryNDLSCS3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->BabySexweight1->Visible) { // BabySexweight1 ?>
		<!-- BabySexweight1 -->
		<td<?php echo $patient_an_registration_preview->BabySexweight1->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->BabySexweight1->viewAttributes() ?>><?php echo $patient_an_registration_preview->BabySexweight1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->BabySexweight2->Visible) { // BabySexweight2 ?>
		<!-- BabySexweight2 -->
		<td<?php echo $patient_an_registration_preview->BabySexweight2->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->BabySexweight2->viewAttributes() ?>><?php echo $patient_an_registration_preview->BabySexweight2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->BabySexweight3->Visible) { // BabySexweight3 ?>
		<!-- BabySexweight3 -->
		<td<?php echo $patient_an_registration_preview->BabySexweight3->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->BabySexweight3->viewAttributes() ?>><?php echo $patient_an_registration_preview->BabySexweight3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
		<!-- PastMedicalHistory -->
		<td<?php echo $patient_an_registration_preview->PastMedicalHistory->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->PastMedicalHistory->viewAttributes() ?>><?php echo $patient_an_registration_preview->PastMedicalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
		<!-- PastSurgicalHistory -->
		<td<?php echo $patient_an_registration_preview->PastSurgicalHistory->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->PastSurgicalHistory->viewAttributes() ?>><?php echo $patient_an_registration_preview->PastSurgicalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->FamilyHistory->Visible) { // FamilyHistory ?>
		<!-- FamilyHistory -->
		<td<?php echo $patient_an_registration_preview->FamilyHistory->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->FamilyHistory->viewAttributes() ?>><?php echo $patient_an_registration_preview->FamilyHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Viability->Visible) { // Viability ?>
		<!-- Viability -->
		<td<?php echo $patient_an_registration_preview->Viability->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Viability->viewAttributes() ?>><?php echo $patient_an_registration_preview->Viability->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ViabilityDATE->Visible) { // ViabilityDATE ?>
		<!-- ViabilityDATE -->
		<td<?php echo $patient_an_registration_preview->ViabilityDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ViabilityDATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->ViabilityDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
		<!-- ViabilityREPORT -->
		<td<?php echo $patient_an_registration_preview->ViabilityREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ViabilityREPORT->viewAttributes() ?>><?php echo $patient_an_registration_preview->ViabilityREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Viability2->Visible) { // Viability2 ?>
		<!-- Viability2 -->
		<td<?php echo $patient_an_registration_preview->Viability2->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Viability2->viewAttributes() ?>><?php echo $patient_an_registration_preview->Viability2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Viability2DATE->Visible) { // Viability2DATE ?>
		<!-- Viability2DATE -->
		<td<?php echo $patient_an_registration_preview->Viability2DATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Viability2DATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->Viability2DATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Viability2REPORT->Visible) { // Viability2REPORT ?>
		<!-- Viability2REPORT -->
		<td<?php echo $patient_an_registration_preview->Viability2REPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Viability2REPORT->viewAttributes() ?>><?php echo $patient_an_registration_preview->Viability2REPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->NTscan->Visible) { // NTscan ?>
		<!-- NTscan -->
		<td<?php echo $patient_an_registration_preview->NTscan->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->NTscan->viewAttributes() ?>><?php echo $patient_an_registration_preview->NTscan->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->NTscanDATE->Visible) { // NTscanDATE ?>
		<!-- NTscanDATE -->
		<td<?php echo $patient_an_registration_preview->NTscanDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->NTscanDATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->NTscanDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->NTscanREPORT->Visible) { // NTscanREPORT ?>
		<!-- NTscanREPORT -->
		<td<?php echo $patient_an_registration_preview->NTscanREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->NTscanREPORT->viewAttributes() ?>><?php echo $patient_an_registration_preview->NTscanREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->EarlyTarget->Visible) { // EarlyTarget ?>
		<!-- EarlyTarget -->
		<td<?php echo $patient_an_registration_preview->EarlyTarget->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->EarlyTarget->viewAttributes() ?>><?php echo $patient_an_registration_preview->EarlyTarget->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
		<!-- EarlyTargetDATE -->
		<td<?php echo $patient_an_registration_preview->EarlyTargetDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->EarlyTargetDATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->EarlyTargetDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
		<!-- EarlyTargetREPORT -->
		<td<?php echo $patient_an_registration_preview->EarlyTargetREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->EarlyTargetREPORT->viewAttributes() ?>><?php echo $patient_an_registration_preview->EarlyTargetREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Anomaly->Visible) { // Anomaly ?>
		<!-- Anomaly -->
		<td<?php echo $patient_an_registration_preview->Anomaly->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Anomaly->viewAttributes() ?>><?php echo $patient_an_registration_preview->Anomaly->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->AnomalyDATE->Visible) { // AnomalyDATE ?>
		<!-- AnomalyDATE -->
		<td<?php echo $patient_an_registration_preview->AnomalyDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->AnomalyDATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->AnomalyDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
		<!-- AnomalyREPORT -->
		<td<?php echo $patient_an_registration_preview->AnomalyREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->AnomalyREPORT->viewAttributes() ?>><?php echo $patient_an_registration_preview->AnomalyREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Growth->Visible) { // Growth ?>
		<!-- Growth -->
		<td<?php echo $patient_an_registration_preview->Growth->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Growth->viewAttributes() ?>><?php echo $patient_an_registration_preview->Growth->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->GrowthDATE->Visible) { // GrowthDATE ?>
		<!-- GrowthDATE -->
		<td<?php echo $patient_an_registration_preview->GrowthDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->GrowthDATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->GrowthDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->GrowthREPORT->Visible) { // GrowthREPORT ?>
		<!-- GrowthREPORT -->
		<td<?php echo $patient_an_registration_preview->GrowthREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->GrowthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_preview->GrowthREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Growth1->Visible) { // Growth1 ?>
		<!-- Growth1 -->
		<td<?php echo $patient_an_registration_preview->Growth1->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Growth1->viewAttributes() ?>><?php echo $patient_an_registration_preview->Growth1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Growth1DATE->Visible) { // Growth1DATE ?>
		<!-- Growth1DATE -->
		<td<?php echo $patient_an_registration_preview->Growth1DATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Growth1DATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->Growth1DATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Growth1REPORT->Visible) { // Growth1REPORT ?>
		<!-- Growth1REPORT -->
		<td<?php echo $patient_an_registration_preview->Growth1REPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Growth1REPORT->viewAttributes() ?>><?php echo $patient_an_registration_preview->Growth1REPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ANProfile->Visible) { // ANProfile ?>
		<!-- ANProfile -->
		<td<?php echo $patient_an_registration_preview->ANProfile->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ANProfile->viewAttributes() ?>><?php echo $patient_an_registration_preview->ANProfile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ANProfileDATE->Visible) { // ANProfileDATE ?>
		<!-- ANProfileDATE -->
		<td<?php echo $patient_an_registration_preview->ANProfileDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ANProfileDATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->ANProfileDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
		<!-- ANProfileINHOUSE -->
		<td<?php echo $patient_an_registration_preview->ANProfileINHOUSE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ANProfileINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_preview->ANProfileINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
		<!-- ANProfileREPORT -->
		<td<?php echo $patient_an_registration_preview->ANProfileREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ANProfileREPORT->viewAttributes() ?>><?php echo $patient_an_registration_preview->ANProfileREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->DualMarker->Visible) { // DualMarker ?>
		<!-- DualMarker -->
		<td<?php echo $patient_an_registration_preview->DualMarker->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->DualMarker->viewAttributes() ?>><?php echo $patient_an_registration_preview->DualMarker->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
		<!-- DualMarkerDATE -->
		<td<?php echo $patient_an_registration_preview->DualMarkerDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->DualMarkerDATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->DualMarkerDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
		<!-- DualMarkerINHOUSE -->
		<td<?php echo $patient_an_registration_preview->DualMarkerINHOUSE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->DualMarkerINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_preview->DualMarkerINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
		<!-- DualMarkerREPORT -->
		<td<?php echo $patient_an_registration_preview->DualMarkerREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->DualMarkerREPORT->viewAttributes() ?>><?php echo $patient_an_registration_preview->DualMarkerREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Quadruple->Visible) { // Quadruple ?>
		<!-- Quadruple -->
		<td<?php echo $patient_an_registration_preview->Quadruple->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Quadruple->viewAttributes() ?>><?php echo $patient_an_registration_preview->Quadruple->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
		<!-- QuadrupleDATE -->
		<td<?php echo $patient_an_registration_preview->QuadrupleDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->QuadrupleDATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->QuadrupleDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
		<!-- QuadrupleINHOUSE -->
		<td<?php echo $patient_an_registration_preview->QuadrupleINHOUSE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->QuadrupleINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_preview->QuadrupleINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
		<!-- QuadrupleREPORT -->
		<td<?php echo $patient_an_registration_preview->QuadrupleREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->QuadrupleREPORT->viewAttributes() ?>><?php echo $patient_an_registration_preview->QuadrupleREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->A5month->Visible) { // A5month ?>
		<!-- A5month -->
		<td<?php echo $patient_an_registration_preview->A5month->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->A5month->viewAttributes() ?>><?php echo $patient_an_registration_preview->A5month->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->A5monthDATE->Visible) { // A5monthDATE ?>
		<!-- A5monthDATE -->
		<td<?php echo $patient_an_registration_preview->A5monthDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->A5monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->A5monthDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
		<!-- A5monthINHOUSE -->
		<td<?php echo $patient_an_registration_preview->A5monthINHOUSE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->A5monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_preview->A5monthINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->A5monthREPORT->Visible) { // A5monthREPORT ?>
		<!-- A5monthREPORT -->
		<td<?php echo $patient_an_registration_preview->A5monthREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->A5monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_preview->A5monthREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->A7month->Visible) { // A7month ?>
		<!-- A7month -->
		<td<?php echo $patient_an_registration_preview->A7month->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->A7month->viewAttributes() ?>><?php echo $patient_an_registration_preview->A7month->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->A7monthDATE->Visible) { // A7monthDATE ?>
		<!-- A7monthDATE -->
		<td<?php echo $patient_an_registration_preview->A7monthDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->A7monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->A7monthDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
		<!-- A7monthINHOUSE -->
		<td<?php echo $patient_an_registration_preview->A7monthINHOUSE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->A7monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_preview->A7monthINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->A7monthREPORT->Visible) { // A7monthREPORT ?>
		<!-- A7monthREPORT -->
		<td<?php echo $patient_an_registration_preview->A7monthREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->A7monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_preview->A7monthREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->A9month->Visible) { // A9month ?>
		<!-- A9month -->
		<td<?php echo $patient_an_registration_preview->A9month->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->A9month->viewAttributes() ?>><?php echo $patient_an_registration_preview->A9month->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->A9monthDATE->Visible) { // A9monthDATE ?>
		<!-- A9monthDATE -->
		<td<?php echo $patient_an_registration_preview->A9monthDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->A9monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->A9monthDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
		<!-- A9monthINHOUSE -->
		<td<?php echo $patient_an_registration_preview->A9monthINHOUSE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->A9monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_preview->A9monthINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->A9monthREPORT->Visible) { // A9monthREPORT ?>
		<!-- A9monthREPORT -->
		<td<?php echo $patient_an_registration_preview->A9monthREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->A9monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_preview->A9monthREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->INJ->Visible) { // INJ ?>
		<!-- INJ -->
		<td<?php echo $patient_an_registration_preview->INJ->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->INJ->viewAttributes() ?>><?php echo $patient_an_registration_preview->INJ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->INJDATE->Visible) { // INJDATE ?>
		<!-- INJDATE -->
		<td<?php echo $patient_an_registration_preview->INJDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->INJDATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->INJDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->INJINHOUSE->Visible) { // INJINHOUSE ?>
		<!-- INJINHOUSE -->
		<td<?php echo $patient_an_registration_preview->INJINHOUSE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->INJINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_preview->INJINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->INJREPORT->Visible) { // INJREPORT ?>
		<!-- INJREPORT -->
		<td<?php echo $patient_an_registration_preview->INJREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->INJREPORT->viewAttributes() ?>><?php echo $patient_an_registration_preview->INJREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Bleeding->Visible) { // Bleeding ?>
		<!-- Bleeding -->
		<td<?php echo $patient_an_registration_preview->Bleeding->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Bleeding->viewAttributes() ?>><?php echo $patient_an_registration_preview->Bleeding->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Hypothyroidism->Visible) { // Hypothyroidism ?>
		<!-- Hypothyroidism -->
		<td<?php echo $patient_an_registration_preview->Hypothyroidism->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Hypothyroidism->viewAttributes() ?>><?php echo $patient_an_registration_preview->Hypothyroidism->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->PICMENumber->Visible) { // PICMENumber ?>
		<!-- PICMENumber -->
		<td<?php echo $patient_an_registration_preview->PICMENumber->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->PICMENumber->viewAttributes() ?>><?php echo $patient_an_registration_preview->PICMENumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Outcome->Visible) { // Outcome ?>
		<!-- Outcome -->
		<td<?php echo $patient_an_registration_preview->Outcome->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Outcome->viewAttributes() ?>><?php echo $patient_an_registration_preview->Outcome->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->DateofAdmission->Visible) { // DateofAdmission ?>
		<!-- DateofAdmission -->
		<td<?php echo $patient_an_registration_preview->DateofAdmission->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->DateofAdmission->viewAttributes() ?>><?php echo $patient_an_registration_preview->DateofAdmission->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->DateodProcedure->Visible) { // DateodProcedure ?>
		<!-- DateodProcedure -->
		<td<?php echo $patient_an_registration_preview->DateodProcedure->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->DateodProcedure->viewAttributes() ?>><?php echo $patient_an_registration_preview->DateodProcedure->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Miscarriage->Visible) { // Miscarriage ?>
		<!-- Miscarriage -->
		<td<?php echo $patient_an_registration_preview->Miscarriage->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Miscarriage->viewAttributes() ?>><?php echo $patient_an_registration_preview->Miscarriage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
		<!-- ModeOfDelivery -->
		<td<?php echo $patient_an_registration_preview->ModeOfDelivery->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ModeOfDelivery->viewAttributes() ?>><?php echo $patient_an_registration_preview->ModeOfDelivery->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ND->Visible) { // ND ?>
		<!-- ND -->
		<td<?php echo $patient_an_registration_preview->ND->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ND->viewAttributes() ?>><?php echo $patient_an_registration_preview->ND->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->NDS->Visible) { // NDS ?>
		<!-- NDS -->
		<td<?php echo $patient_an_registration_preview->NDS->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->NDS->viewAttributes() ?>><?php echo $patient_an_registration_preview->NDS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->NDP->Visible) { // NDP ?>
		<!-- NDP -->
		<td<?php echo $patient_an_registration_preview->NDP->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->NDP->viewAttributes() ?>><?php echo $patient_an_registration_preview->NDP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Vaccum->Visible) { // Vaccum ?>
		<!-- Vaccum -->
		<td<?php echo $patient_an_registration_preview->Vaccum->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Vaccum->viewAttributes() ?>><?php echo $patient_an_registration_preview->Vaccum->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->VaccumS->Visible) { // VaccumS ?>
		<!-- VaccumS -->
		<td<?php echo $patient_an_registration_preview->VaccumS->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->VaccumS->viewAttributes() ?>><?php echo $patient_an_registration_preview->VaccumS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->VaccumP->Visible) { // VaccumP ?>
		<!-- VaccumP -->
		<td<?php echo $patient_an_registration_preview->VaccumP->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->VaccumP->viewAttributes() ?>><?php echo $patient_an_registration_preview->VaccumP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Forceps->Visible) { // Forceps ?>
		<!-- Forceps -->
		<td<?php echo $patient_an_registration_preview->Forceps->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Forceps->viewAttributes() ?>><?php echo $patient_an_registration_preview->Forceps->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ForcepsS->Visible) { // ForcepsS ?>
		<!-- ForcepsS -->
		<td<?php echo $patient_an_registration_preview->ForcepsS->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ForcepsS->viewAttributes() ?>><?php echo $patient_an_registration_preview->ForcepsS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ForcepsP->Visible) { // ForcepsP ?>
		<!-- ForcepsP -->
		<td<?php echo $patient_an_registration_preview->ForcepsP->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ForcepsP->viewAttributes() ?>><?php echo $patient_an_registration_preview->ForcepsP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Elective->Visible) { // Elective ?>
		<!-- Elective -->
		<td<?php echo $patient_an_registration_preview->Elective->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Elective->viewAttributes() ?>><?php echo $patient_an_registration_preview->Elective->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ElectiveS->Visible) { // ElectiveS ?>
		<!-- ElectiveS -->
		<td<?php echo $patient_an_registration_preview->ElectiveS->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ElectiveS->viewAttributes() ?>><?php echo $patient_an_registration_preview->ElectiveS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ElectiveP->Visible) { // ElectiveP ?>
		<!-- ElectiveP -->
		<td<?php echo $patient_an_registration_preview->ElectiveP->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ElectiveP->viewAttributes() ?>><?php echo $patient_an_registration_preview->ElectiveP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Emergency->Visible) { // Emergency ?>
		<!-- Emergency -->
		<td<?php echo $patient_an_registration_preview->Emergency->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Emergency->viewAttributes() ?>><?php echo $patient_an_registration_preview->Emergency->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->EmergencyS->Visible) { // EmergencyS ?>
		<!-- EmergencyS -->
		<td<?php echo $patient_an_registration_preview->EmergencyS->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->EmergencyS->viewAttributes() ?>><?php echo $patient_an_registration_preview->EmergencyS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->EmergencyP->Visible) { // EmergencyP ?>
		<!-- EmergencyP -->
		<td<?php echo $patient_an_registration_preview->EmergencyP->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->EmergencyP->viewAttributes() ?>><?php echo $patient_an_registration_preview->EmergencyP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Maturity->Visible) { // Maturity ?>
		<!-- Maturity -->
		<td<?php echo $patient_an_registration_preview->Maturity->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Maturity->viewAttributes() ?>><?php echo $patient_an_registration_preview->Maturity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Baby1->Visible) { // Baby1 ?>
		<!-- Baby1 -->
		<td<?php echo $patient_an_registration_preview->Baby1->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Baby1->viewAttributes() ?>><?php echo $patient_an_registration_preview->Baby1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Baby2->Visible) { // Baby2 ?>
		<!-- Baby2 -->
		<td<?php echo $patient_an_registration_preview->Baby2->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Baby2->viewAttributes() ?>><?php echo $patient_an_registration_preview->Baby2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->sex1->Visible) { // sex1 ?>
		<!-- sex1 -->
		<td<?php echo $patient_an_registration_preview->sex1->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->sex1->viewAttributes() ?>><?php echo $patient_an_registration_preview->sex1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->sex2->Visible) { // sex2 ?>
		<!-- sex2 -->
		<td<?php echo $patient_an_registration_preview->sex2->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->sex2->viewAttributes() ?>><?php echo $patient_an_registration_preview->sex2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->weight1->Visible) { // weight1 ?>
		<!-- weight1 -->
		<td<?php echo $patient_an_registration_preview->weight1->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->weight1->viewAttributes() ?>><?php echo $patient_an_registration_preview->weight1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->weight2->Visible) { // weight2 ?>
		<!-- weight2 -->
		<td<?php echo $patient_an_registration_preview->weight2->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->weight2->viewAttributes() ?>><?php echo $patient_an_registration_preview->weight2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->NICU1->Visible) { // NICU1 ?>
		<!-- NICU1 -->
		<td<?php echo $patient_an_registration_preview->NICU1->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->NICU1->viewAttributes() ?>><?php echo $patient_an_registration_preview->NICU1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->NICU2->Visible) { // NICU2 ?>
		<!-- NICU2 -->
		<td<?php echo $patient_an_registration_preview->NICU2->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->NICU2->viewAttributes() ?>><?php echo $patient_an_registration_preview->NICU2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Jaundice1->Visible) { // Jaundice1 ?>
		<!-- Jaundice1 -->
		<td<?php echo $patient_an_registration_preview->Jaundice1->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Jaundice1->viewAttributes() ?>><?php echo $patient_an_registration_preview->Jaundice1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Jaundice2->Visible) { // Jaundice2 ?>
		<!-- Jaundice2 -->
		<td<?php echo $patient_an_registration_preview->Jaundice2->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Jaundice2->viewAttributes() ?>><?php echo $patient_an_registration_preview->Jaundice2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Others1->Visible) { // Others1 ?>
		<!-- Others1 -->
		<td<?php echo $patient_an_registration_preview->Others1->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Others1->viewAttributes() ?>><?php echo $patient_an_registration_preview->Others1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->Others2->Visible) { // Others2 ?>
		<!-- Others2 -->
		<td<?php echo $patient_an_registration_preview->Others2->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->Others2->viewAttributes() ?>><?php echo $patient_an_registration_preview->Others2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->SpillOverReasons->Visible) { // SpillOverReasons ?>
		<!-- SpillOverReasons -->
		<td<?php echo $patient_an_registration_preview->SpillOverReasons->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->SpillOverReasons->viewAttributes() ?>><?php echo $patient_an_registration_preview->SpillOverReasons->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ANClosed->Visible) { // ANClosed ?>
		<!-- ANClosed -->
		<td<?php echo $patient_an_registration_preview->ANClosed->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ANClosed->viewAttributes() ?>><?php echo $patient_an_registration_preview->ANClosed->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ANClosedDATE->Visible) { // ANClosedDATE ?>
		<!-- ANClosedDATE -->
		<td<?php echo $patient_an_registration_preview->ANClosedDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ANClosedDATE->viewAttributes() ?>><?php echo $patient_an_registration_preview->ANClosedDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
		<!-- PastMedicalHistoryOthers -->
		<td<?php echo $patient_an_registration_preview->PastMedicalHistoryOthers->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->PastMedicalHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_preview->PastMedicalHistoryOthers->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
		<!-- PastSurgicalHistoryOthers -->
		<td<?php echo $patient_an_registration_preview->PastSurgicalHistoryOthers->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->PastSurgicalHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_preview->PastSurgicalHistoryOthers->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
		<!-- FamilyHistoryOthers -->
		<td<?php echo $patient_an_registration_preview->FamilyHistoryOthers->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->FamilyHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_preview->FamilyHistoryOthers->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
		<!-- PresentPregnancyComplicationsOthers -->
		<td<?php echo $patient_an_registration_preview->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->PresentPregnancyComplicationsOthers->viewAttributes() ?>><?php echo $patient_an_registration_preview->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration_preview->ETdate->Visible) { // ETdate ?>
		<!-- ETdate -->
		<td<?php echo $patient_an_registration_preview->ETdate->cellAttributes() ?>>
<span<?php echo $patient_an_registration_preview->ETdate->viewAttributes() ?>><?php echo $patient_an_registration_preview->ETdate->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_an_registration_preview->ListOptions->render("body", "right", $patient_an_registration_preview->RowCount);
?>
	</tr>
<?php
	$patient_an_registration_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $patient_an_registration_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_an_registration_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($patient_an_registration_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$patient_an_registration_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($patient_an_registration_preview->Recordset)
	$patient_an_registration_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_an_registration_preview->terminate();
?>