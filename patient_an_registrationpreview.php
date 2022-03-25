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
<div class="card ew-grid patient_an_registration"><!-- .card -->
<?php if ($patient_an_registration_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_an_registration_preview->renderListOptions();

// Render list options (header, left)
$patient_an_registration_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_an_registration->id->Visible) { // id ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->id) == "") { ?>
		<th class="<?php echo $patient_an_registration->id->headerCellClass() ?>"><?php echo $patient_an_registration->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->id->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->id->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->id->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->pid->Visible) { // pid ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->pid) == "") { ?>
		<th class="<?php echo $patient_an_registration->pid->headerCellClass() ?>"><?php echo $patient_an_registration->pid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->pid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->pid->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->pid->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->pid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->pid->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->fid->Visible) { // fid ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->fid) == "") { ?>
		<th class="<?php echo $patient_an_registration->fid->headerCellClass() ?>"><?php echo $patient_an_registration->fid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->fid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->fid->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->fid->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->fid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->fid->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->G->Visible) { // G ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->G) == "") { ?>
		<th class="<?php echo $patient_an_registration->G->headerCellClass() ?>"><?php echo $patient_an_registration->G->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->G->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->G->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->G->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->G->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->G->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->P->Visible) { // P ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->P) == "") { ?>
		<th class="<?php echo $patient_an_registration->P->headerCellClass() ?>"><?php echo $patient_an_registration->P->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->P->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->P->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->P->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->P->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->P->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->L->Visible) { // L ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->L) == "") { ?>
		<th class="<?php echo $patient_an_registration->L->headerCellClass() ?>"><?php echo $patient_an_registration->L->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->L->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->L->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->L->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->L->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->L->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A->Visible) { // A ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->A) == "") { ?>
		<th class="<?php echo $patient_an_registration->A->headerCellClass() ?>"><?php echo $patient_an_registration->A->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->A->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->A->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->A->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->A->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->A->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->E->Visible) { // E ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->E) == "") { ?>
		<th class="<?php echo $patient_an_registration->E->headerCellClass() ?>"><?php echo $patient_an_registration->E->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->E->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->E->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->E->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->E->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->E->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->M->Visible) { // M ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->M) == "") { ?>
		<th class="<?php echo $patient_an_registration->M->headerCellClass() ?>"><?php echo $patient_an_registration->M->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->M->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->M->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->M->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->M->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->M->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->LMP->Visible) { // LMP ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->LMP) == "") { ?>
		<th class="<?php echo $patient_an_registration->LMP->headerCellClass() ?>"><?php echo $patient_an_registration->LMP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->LMP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->LMP->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->LMP->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->LMP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->LMP->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EDO->Visible) { // EDO ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->EDO) == "") { ?>
		<th class="<?php echo $patient_an_registration->EDO->headerCellClass() ?>"><?php echo $patient_an_registration->EDO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->EDO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->EDO->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->EDO->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->EDO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->EDO->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->MenstrualHistory) == "") { ?>
		<th class="<?php echo $patient_an_registration->MenstrualHistory->headerCellClass() ?>"><?php echo $patient_an_registration->MenstrualHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->MenstrualHistory->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->MenstrualHistory->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->MenstrualHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->MenstrualHistory->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->MaritalHistory->Visible) { // MaritalHistory ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->MaritalHistory) == "") { ?>
		<th class="<?php echo $patient_an_registration->MaritalHistory->headerCellClass() ?>"><?php echo $patient_an_registration->MaritalHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->MaritalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->MaritalHistory->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->MaritalHistory->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->MaritalHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->MaritalHistory->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ObstetricHistory) == "") { ?>
		<th class="<?php echo $patient_an_registration->ObstetricHistory->headerCellClass() ?>"><?php echo $patient_an_registration->ObstetricHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ObstetricHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ObstetricHistory->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ObstetricHistory->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ObstetricHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ObstetricHistory->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->PreviousHistoryofGDM) == "") { ?>
		<th class="<?php echo $patient_an_registration->PreviousHistoryofGDM->headerCellClass() ?>"><?php echo $patient_an_registration->PreviousHistoryofGDM->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->PreviousHistoryofGDM->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->PreviousHistoryofGDM->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->PreviousHistoryofGDM->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofGDM->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->PreviousHistoryofGDM->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->PreviousHistorofPIH) == "") { ?>
		<th class="<?php echo $patient_an_registration->PreviousHistorofPIH->headerCellClass() ?>"><?php echo $patient_an_registration->PreviousHistorofPIH->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->PreviousHistorofPIH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->PreviousHistorofPIH->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->PreviousHistorofPIH->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistorofPIH->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->PreviousHistorofPIH->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->PreviousHistoryofIUGR) == "") { ?>
		<th class="<?php echo $patient_an_registration->PreviousHistoryofIUGR->headerCellClass() ?>"><?php echo $patient_an_registration->PreviousHistoryofIUGR->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->PreviousHistoryofIUGR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->PreviousHistoryofIUGR->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->PreviousHistoryofIUGR->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofIUGR->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->PreviousHistoryofIUGR->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->PreviousHistoryofOligohydramnios) == "") { ?>
		<th class="<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->PreviousHistoryofOligohydramnios->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->PreviousHistoryofOligohydramnios->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->PreviousHistoryofPreterm) == "") { ?>
		<th class="<?php echo $patient_an_registration->PreviousHistoryofPreterm->headerCellClass() ?>"><?php echo $patient_an_registration->PreviousHistoryofPreterm->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->PreviousHistoryofPreterm->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->PreviousHistoryofPreterm->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->PreviousHistoryofPreterm->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofPreterm->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->PreviousHistoryofPreterm->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->G1->Visible) { // G1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->G1) == "") { ?>
		<th class="<?php echo $patient_an_registration->G1->headerCellClass() ?>"><?php echo $patient_an_registration->G1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->G1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->G1->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->G1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->G1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->G1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->G2->Visible) { // G2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->G2) == "") { ?>
		<th class="<?php echo $patient_an_registration->G2->headerCellClass() ?>"><?php echo $patient_an_registration->G2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->G2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->G2->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->G2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->G2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->G2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->G3->Visible) { // G3 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->G3) == "") { ?>
		<th class="<?php echo $patient_an_registration->G3->headerCellClass() ?>"><?php echo $patient_an_registration->G3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->G3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->G3->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->G3->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->G3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->G3->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->DeliveryNDLSCS1) == "") { ?>
		<th class="<?php echo $patient_an_registration->DeliveryNDLSCS1->headerCellClass() ?>"><?php echo $patient_an_registration->DeliveryNDLSCS1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->DeliveryNDLSCS1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->DeliveryNDLSCS1->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->DeliveryNDLSCS1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->DeliveryNDLSCS1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->DeliveryNDLSCS2) == "") { ?>
		<th class="<?php echo $patient_an_registration->DeliveryNDLSCS2->headerCellClass() ?>"><?php echo $patient_an_registration->DeliveryNDLSCS2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->DeliveryNDLSCS2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->DeliveryNDLSCS2->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->DeliveryNDLSCS2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->DeliveryNDLSCS2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->DeliveryNDLSCS3) == "") { ?>
		<th class="<?php echo $patient_an_registration->DeliveryNDLSCS3->headerCellClass() ?>"><?php echo $patient_an_registration->DeliveryNDLSCS3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->DeliveryNDLSCS3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->DeliveryNDLSCS3->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->DeliveryNDLSCS3->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->DeliveryNDLSCS3->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight1->Visible) { // BabySexweight1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->BabySexweight1) == "") { ?>
		<th class="<?php echo $patient_an_registration->BabySexweight1->headerCellClass() ?>"><?php echo $patient_an_registration->BabySexweight1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->BabySexweight1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->BabySexweight1->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->BabySexweight1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->BabySexweight1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight2->Visible) { // BabySexweight2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->BabySexweight2) == "") { ?>
		<th class="<?php echo $patient_an_registration->BabySexweight2->headerCellClass() ?>"><?php echo $patient_an_registration->BabySexweight2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->BabySexweight2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->BabySexweight2->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->BabySexweight2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->BabySexweight2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight3->Visible) { // BabySexweight3 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->BabySexweight3) == "") { ?>
		<th class="<?php echo $patient_an_registration->BabySexweight3->headerCellClass() ?>"><?php echo $patient_an_registration->BabySexweight3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->BabySexweight3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->BabySexweight3->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->BabySexweight3->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->BabySexweight3->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->PastMedicalHistory) == "") { ?>
		<th class="<?php echo $patient_an_registration->PastMedicalHistory->headerCellClass() ?>"><?php echo $patient_an_registration->PastMedicalHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->PastMedicalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->PastMedicalHistory->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->PastMedicalHistory->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->PastMedicalHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->PastMedicalHistory->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->PastSurgicalHistory) == "") { ?>
		<th class="<?php echo $patient_an_registration->PastSurgicalHistory->headerCellClass() ?>"><?php echo $patient_an_registration->PastSurgicalHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->PastSurgicalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->PastSurgicalHistory->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->PastSurgicalHistory->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->PastSurgicalHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->PastSurgicalHistory->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->FamilyHistory) == "") { ?>
		<th class="<?php echo $patient_an_registration->FamilyHistory->headerCellClass() ?>"><?php echo $patient_an_registration->FamilyHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->FamilyHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->FamilyHistory->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->FamilyHistory->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->FamilyHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->FamilyHistory->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Viability->Visible) { // Viability ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Viability) == "") { ?>
		<th class="<?php echo $patient_an_registration->Viability->headerCellClass() ?>"><?php echo $patient_an_registration->Viability->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Viability->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Viability->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Viability->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Viability->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Viability->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ViabilityDATE->Visible) { // ViabilityDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ViabilityDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->ViabilityDATE->headerCellClass() ?>"><?php echo $patient_an_registration->ViabilityDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ViabilityDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ViabilityDATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ViabilityDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ViabilityDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ViabilityDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ViabilityREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration->ViabilityREPORT->headerCellClass() ?>"><?php echo $patient_an_registration->ViabilityREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ViabilityREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ViabilityREPORT->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ViabilityREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ViabilityREPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ViabilityREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Viability2->Visible) { // Viability2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Viability2) == "") { ?>
		<th class="<?php echo $patient_an_registration->Viability2->headerCellClass() ?>"><?php echo $patient_an_registration->Viability2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Viability2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Viability2->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Viability2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Viability2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Viability2DATE->Visible) { // Viability2DATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Viability2DATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->Viability2DATE->headerCellClass() ?>"><?php echo $patient_an_registration->Viability2DATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Viability2DATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Viability2DATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Viability2DATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2DATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Viability2DATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Viability2REPORT->Visible) { // Viability2REPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Viability2REPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration->Viability2REPORT->headerCellClass() ?>"><?php echo $patient_an_registration->Viability2REPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Viability2REPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Viability2REPORT->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Viability2REPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2REPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Viability2REPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NTscan->Visible) { // NTscan ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->NTscan) == "") { ?>
		<th class="<?php echo $patient_an_registration->NTscan->headerCellClass() ?>"><?php echo $patient_an_registration->NTscan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->NTscan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->NTscan->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->NTscan->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->NTscan->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->NTscan->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NTscanDATE->Visible) { // NTscanDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->NTscanDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->NTscanDATE->headerCellClass() ?>"><?php echo $patient_an_registration->NTscanDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->NTscanDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->NTscanDATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->NTscanDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->NTscanDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->NTscanDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NTscanREPORT->Visible) { // NTscanREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->NTscanREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration->NTscanREPORT->headerCellClass() ?>"><?php echo $patient_an_registration->NTscanREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->NTscanREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->NTscanREPORT->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->NTscanREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->NTscanREPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->NTscanREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EarlyTarget->Visible) { // EarlyTarget ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->EarlyTarget) == "") { ?>
		<th class="<?php echo $patient_an_registration->EarlyTarget->headerCellClass() ?>"><?php echo $patient_an_registration->EarlyTarget->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->EarlyTarget->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->EarlyTarget->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->EarlyTarget->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTarget->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->EarlyTarget->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->EarlyTargetDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->EarlyTargetDATE->headerCellClass() ?>"><?php echo $patient_an_registration->EarlyTargetDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->EarlyTargetDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->EarlyTargetDATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->EarlyTargetDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTargetDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->EarlyTargetDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->EarlyTargetREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration->EarlyTargetREPORT->headerCellClass() ?>"><?php echo $patient_an_registration->EarlyTargetREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->EarlyTargetREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->EarlyTargetREPORT->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->EarlyTargetREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTargetREPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->EarlyTargetREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Anomaly->Visible) { // Anomaly ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Anomaly) == "") { ?>
		<th class="<?php echo $patient_an_registration->Anomaly->headerCellClass() ?>"><?php echo $patient_an_registration->Anomaly->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Anomaly->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Anomaly->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Anomaly->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Anomaly->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Anomaly->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->AnomalyDATE->Visible) { // AnomalyDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->AnomalyDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->AnomalyDATE->headerCellClass() ?>"><?php echo $patient_an_registration->AnomalyDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->AnomalyDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->AnomalyDATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->AnomalyDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->AnomalyDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->AnomalyDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->AnomalyREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration->AnomalyREPORT->headerCellClass() ?>"><?php echo $patient_an_registration->AnomalyREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->AnomalyREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->AnomalyREPORT->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->AnomalyREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->AnomalyREPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->AnomalyREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Growth->Visible) { // Growth ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Growth) == "") { ?>
		<th class="<?php echo $patient_an_registration->Growth->headerCellClass() ?>"><?php echo $patient_an_registration->Growth->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Growth->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Growth->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Growth->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Growth->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Growth->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->GrowthDATE->Visible) { // GrowthDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->GrowthDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->GrowthDATE->headerCellClass() ?>"><?php echo $patient_an_registration->GrowthDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->GrowthDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->GrowthDATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->GrowthDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->GrowthDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->GrowthDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->GrowthREPORT->Visible) { // GrowthREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->GrowthREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration->GrowthREPORT->headerCellClass() ?>"><?php echo $patient_an_registration->GrowthREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->GrowthREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->GrowthREPORT->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->GrowthREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->GrowthREPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->GrowthREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Growth1->Visible) { // Growth1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Growth1) == "") { ?>
		<th class="<?php echo $patient_an_registration->Growth1->headerCellClass() ?>"><?php echo $patient_an_registration->Growth1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Growth1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Growth1->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Growth1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Growth1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Growth1DATE->Visible) { // Growth1DATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Growth1DATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->Growth1DATE->headerCellClass() ?>"><?php echo $patient_an_registration->Growth1DATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Growth1DATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Growth1DATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Growth1DATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1DATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Growth1DATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Growth1REPORT->Visible) { // Growth1REPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Growth1REPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration->Growth1REPORT->headerCellClass() ?>"><?php echo $patient_an_registration->Growth1REPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Growth1REPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Growth1REPORT->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Growth1REPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1REPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Growth1REPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANProfile->Visible) { // ANProfile ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ANProfile) == "") { ?>
		<th class="<?php echo $patient_an_registration->ANProfile->headerCellClass() ?>"><?php echo $patient_an_registration->ANProfile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ANProfile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ANProfile->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ANProfile->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfile->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ANProfile->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANProfileDATE->Visible) { // ANProfileDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ANProfileDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->ANProfileDATE->headerCellClass() ?>"><?php echo $patient_an_registration->ANProfileDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ANProfileDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ANProfileDATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ANProfileDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ANProfileDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ANProfileINHOUSE) == "") { ?>
		<th class="<?php echo $patient_an_registration->ANProfileINHOUSE->headerCellClass() ?>"><?php echo $patient_an_registration->ANProfileINHOUSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ANProfileINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ANProfileINHOUSE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ANProfileINHOUSE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileINHOUSE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ANProfileINHOUSE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ANProfileREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration->ANProfileREPORT->headerCellClass() ?>"><?php echo $patient_an_registration->ANProfileREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ANProfileREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ANProfileREPORT->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ANProfileREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileREPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ANProfileREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DualMarker->Visible) { // DualMarker ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->DualMarker) == "") { ?>
		<th class="<?php echo $patient_an_registration->DualMarker->headerCellClass() ?>"><?php echo $patient_an_registration->DualMarker->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->DualMarker->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->DualMarker->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->DualMarker->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarker->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->DualMarker->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->DualMarkerDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->DualMarkerDATE->headerCellClass() ?>"><?php echo $patient_an_registration->DualMarkerDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->DualMarkerDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->DualMarkerDATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->DualMarkerDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->DualMarkerDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->DualMarkerINHOUSE) == "") { ?>
		<th class="<?php echo $patient_an_registration->DualMarkerINHOUSE->headerCellClass() ?>"><?php echo $patient_an_registration->DualMarkerINHOUSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->DualMarkerINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->DualMarkerINHOUSE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->DualMarkerINHOUSE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerINHOUSE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->DualMarkerINHOUSE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->DualMarkerREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration->DualMarkerREPORT->headerCellClass() ?>"><?php echo $patient_an_registration->DualMarkerREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->DualMarkerREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->DualMarkerREPORT->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->DualMarkerREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerREPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->DualMarkerREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Quadruple->Visible) { // Quadruple ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Quadruple) == "") { ?>
		<th class="<?php echo $patient_an_registration->Quadruple->headerCellClass() ?>"><?php echo $patient_an_registration->Quadruple->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Quadruple->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Quadruple->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Quadruple->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Quadruple->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Quadruple->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->QuadrupleDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->QuadrupleDATE->headerCellClass() ?>"><?php echo $patient_an_registration->QuadrupleDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->QuadrupleDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->QuadrupleDATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->QuadrupleDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->QuadrupleDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->QuadrupleINHOUSE) == "") { ?>
		<th class="<?php echo $patient_an_registration->QuadrupleINHOUSE->headerCellClass() ?>"><?php echo $patient_an_registration->QuadrupleINHOUSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->QuadrupleINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->QuadrupleINHOUSE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->QuadrupleINHOUSE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleINHOUSE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->QuadrupleINHOUSE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->QuadrupleREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration->QuadrupleREPORT->headerCellClass() ?>"><?php echo $patient_an_registration->QuadrupleREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->QuadrupleREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->QuadrupleREPORT->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->QuadrupleREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleREPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->QuadrupleREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A5month->Visible) { // A5month ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->A5month) == "") { ?>
		<th class="<?php echo $patient_an_registration->A5month->headerCellClass() ?>"><?php echo $patient_an_registration->A5month->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->A5month->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->A5month->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->A5month->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->A5month->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->A5month->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A5monthDATE->Visible) { // A5monthDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->A5monthDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->A5monthDATE->headerCellClass() ?>"><?php echo $patient_an_registration->A5monthDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->A5monthDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->A5monthDATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->A5monthDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->A5monthDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->A5monthINHOUSE) == "") { ?>
		<th class="<?php echo $patient_an_registration->A5monthINHOUSE->headerCellClass() ?>"><?php echo $patient_an_registration->A5monthINHOUSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->A5monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->A5monthINHOUSE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->A5monthINHOUSE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthINHOUSE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->A5monthINHOUSE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A5monthREPORT->Visible) { // A5monthREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->A5monthREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration->A5monthREPORT->headerCellClass() ?>"><?php echo $patient_an_registration->A5monthREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->A5monthREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->A5monthREPORT->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->A5monthREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthREPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->A5monthREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A7month->Visible) { // A7month ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->A7month) == "") { ?>
		<th class="<?php echo $patient_an_registration->A7month->headerCellClass() ?>"><?php echo $patient_an_registration->A7month->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->A7month->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->A7month->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->A7month->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->A7month->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->A7month->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A7monthDATE->Visible) { // A7monthDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->A7monthDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->A7monthDATE->headerCellClass() ?>"><?php echo $patient_an_registration->A7monthDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->A7monthDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->A7monthDATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->A7monthDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->A7monthDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->A7monthINHOUSE) == "") { ?>
		<th class="<?php echo $patient_an_registration->A7monthINHOUSE->headerCellClass() ?>"><?php echo $patient_an_registration->A7monthINHOUSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->A7monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->A7monthINHOUSE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->A7monthINHOUSE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthINHOUSE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->A7monthINHOUSE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A7monthREPORT->Visible) { // A7monthREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->A7monthREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration->A7monthREPORT->headerCellClass() ?>"><?php echo $patient_an_registration->A7monthREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->A7monthREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->A7monthREPORT->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->A7monthREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthREPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->A7monthREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A9month->Visible) { // A9month ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->A9month) == "") { ?>
		<th class="<?php echo $patient_an_registration->A9month->headerCellClass() ?>"><?php echo $patient_an_registration->A9month->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->A9month->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->A9month->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->A9month->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->A9month->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->A9month->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A9monthDATE->Visible) { // A9monthDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->A9monthDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->A9monthDATE->headerCellClass() ?>"><?php echo $patient_an_registration->A9monthDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->A9monthDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->A9monthDATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->A9monthDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->A9monthDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->A9monthINHOUSE) == "") { ?>
		<th class="<?php echo $patient_an_registration->A9monthINHOUSE->headerCellClass() ?>"><?php echo $patient_an_registration->A9monthINHOUSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->A9monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->A9monthINHOUSE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->A9monthINHOUSE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthINHOUSE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->A9monthINHOUSE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A9monthREPORT->Visible) { // A9monthREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->A9monthREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration->A9monthREPORT->headerCellClass() ?>"><?php echo $patient_an_registration->A9monthREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->A9monthREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->A9monthREPORT->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->A9monthREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthREPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->A9monthREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->INJ->Visible) { // INJ ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->INJ) == "") { ?>
		<th class="<?php echo $patient_an_registration->INJ->headerCellClass() ?>"><?php echo $patient_an_registration->INJ->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->INJ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->INJ->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->INJ->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->INJ->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->INJ->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->INJDATE->Visible) { // INJDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->INJDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->INJDATE->headerCellClass() ?>"><?php echo $patient_an_registration->INJDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->INJDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->INJDATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->INJDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->INJDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->INJDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->INJINHOUSE->Visible) { // INJINHOUSE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->INJINHOUSE) == "") { ?>
		<th class="<?php echo $patient_an_registration->INJINHOUSE->headerCellClass() ?>"><?php echo $patient_an_registration->INJINHOUSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->INJINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->INJINHOUSE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->INJINHOUSE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->INJINHOUSE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->INJINHOUSE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->INJREPORT->Visible) { // INJREPORT ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->INJREPORT) == "") { ?>
		<th class="<?php echo $patient_an_registration->INJREPORT->headerCellClass() ?>"><?php echo $patient_an_registration->INJREPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->INJREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->INJREPORT->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->INJREPORT->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->INJREPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->INJREPORT->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Bleeding->Visible) { // Bleeding ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Bleeding) == "") { ?>
		<th class="<?php echo $patient_an_registration->Bleeding->headerCellClass() ?>"><?php echo $patient_an_registration->Bleeding->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Bleeding->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Bleeding->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Bleeding->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Bleeding->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Bleeding->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Hypothyroidism->Visible) { // Hypothyroidism ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Hypothyroidism) == "") { ?>
		<th class="<?php echo $patient_an_registration->Hypothyroidism->headerCellClass() ?>"><?php echo $patient_an_registration->Hypothyroidism->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Hypothyroidism->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Hypothyroidism->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Hypothyroidism->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Hypothyroidism->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Hypothyroidism->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PICMENumber->Visible) { // PICMENumber ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->PICMENumber) == "") { ?>
		<th class="<?php echo $patient_an_registration->PICMENumber->headerCellClass() ?>"><?php echo $patient_an_registration->PICMENumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->PICMENumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->PICMENumber->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->PICMENumber->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->PICMENumber->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->PICMENumber->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Outcome->Visible) { // Outcome ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Outcome) == "") { ?>
		<th class="<?php echo $patient_an_registration->Outcome->headerCellClass() ?>"><?php echo $patient_an_registration->Outcome->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Outcome->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Outcome->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Outcome->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Outcome->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Outcome->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DateofAdmission->Visible) { // DateofAdmission ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->DateofAdmission) == "") { ?>
		<th class="<?php echo $patient_an_registration->DateofAdmission->headerCellClass() ?>"><?php echo $patient_an_registration->DateofAdmission->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->DateofAdmission->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->DateofAdmission->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->DateofAdmission->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->DateofAdmission->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->DateofAdmission->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DateodProcedure->Visible) { // DateodProcedure ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->DateodProcedure) == "") { ?>
		<th class="<?php echo $patient_an_registration->DateodProcedure->headerCellClass() ?>"><?php echo $patient_an_registration->DateodProcedure->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->DateodProcedure->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->DateodProcedure->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->DateodProcedure->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->DateodProcedure->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->DateodProcedure->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Miscarriage->Visible) { // Miscarriage ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Miscarriage) == "") { ?>
		<th class="<?php echo $patient_an_registration->Miscarriage->headerCellClass() ?>"><?php echo $patient_an_registration->Miscarriage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Miscarriage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Miscarriage->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Miscarriage->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Miscarriage->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Miscarriage->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ModeOfDelivery) == "") { ?>
		<th class="<?php echo $patient_an_registration->ModeOfDelivery->headerCellClass() ?>"><?php echo $patient_an_registration->ModeOfDelivery->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ModeOfDelivery->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ModeOfDelivery->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ModeOfDelivery->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ModeOfDelivery->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ModeOfDelivery->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ND->Visible) { // ND ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ND) == "") { ?>
		<th class="<?php echo $patient_an_registration->ND->headerCellClass() ?>"><?php echo $patient_an_registration->ND->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ND->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ND->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ND->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ND->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ND->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NDS->Visible) { // NDS ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->NDS) == "") { ?>
		<th class="<?php echo $patient_an_registration->NDS->headerCellClass() ?>"><?php echo $patient_an_registration->NDS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->NDS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->NDS->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->NDS->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->NDS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->NDS->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NDP->Visible) { // NDP ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->NDP) == "") { ?>
		<th class="<?php echo $patient_an_registration->NDP->headerCellClass() ?>"><?php echo $patient_an_registration->NDP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->NDP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->NDP->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->NDP->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->NDP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->NDP->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Vaccum->Visible) { // Vaccum ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Vaccum) == "") { ?>
		<th class="<?php echo $patient_an_registration->Vaccum->headerCellClass() ?>"><?php echo $patient_an_registration->Vaccum->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Vaccum->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Vaccum->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Vaccum->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Vaccum->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Vaccum->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->VaccumS->Visible) { // VaccumS ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->VaccumS) == "") { ?>
		<th class="<?php echo $patient_an_registration->VaccumS->headerCellClass() ?>"><?php echo $patient_an_registration->VaccumS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->VaccumS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->VaccumS->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->VaccumS->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->VaccumS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->VaccumS->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->VaccumP->Visible) { // VaccumP ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->VaccumP) == "") { ?>
		<th class="<?php echo $patient_an_registration->VaccumP->headerCellClass() ?>"><?php echo $patient_an_registration->VaccumP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->VaccumP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->VaccumP->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->VaccumP->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->VaccumP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->VaccumP->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Forceps->Visible) { // Forceps ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Forceps) == "") { ?>
		<th class="<?php echo $patient_an_registration->Forceps->headerCellClass() ?>"><?php echo $patient_an_registration->Forceps->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Forceps->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Forceps->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Forceps->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Forceps->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Forceps->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ForcepsS->Visible) { // ForcepsS ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ForcepsS) == "") { ?>
		<th class="<?php echo $patient_an_registration->ForcepsS->headerCellClass() ?>"><?php echo $patient_an_registration->ForcepsS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ForcepsS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ForcepsS->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ForcepsS->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ForcepsS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ForcepsS->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ForcepsP->Visible) { // ForcepsP ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ForcepsP) == "") { ?>
		<th class="<?php echo $patient_an_registration->ForcepsP->headerCellClass() ?>"><?php echo $patient_an_registration->ForcepsP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ForcepsP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ForcepsP->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ForcepsP->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ForcepsP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ForcepsP->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Elective->Visible) { // Elective ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Elective) == "") { ?>
		<th class="<?php echo $patient_an_registration->Elective->headerCellClass() ?>"><?php echo $patient_an_registration->Elective->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Elective->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Elective->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Elective->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Elective->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Elective->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ElectiveS->Visible) { // ElectiveS ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ElectiveS) == "") { ?>
		<th class="<?php echo $patient_an_registration->ElectiveS->headerCellClass() ?>"><?php echo $patient_an_registration->ElectiveS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ElectiveS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ElectiveS->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ElectiveS->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ElectiveS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ElectiveS->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ElectiveP->Visible) { // ElectiveP ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ElectiveP) == "") { ?>
		<th class="<?php echo $patient_an_registration->ElectiveP->headerCellClass() ?>"><?php echo $patient_an_registration->ElectiveP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ElectiveP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ElectiveP->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ElectiveP->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ElectiveP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ElectiveP->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Emergency->Visible) { // Emergency ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Emergency) == "") { ?>
		<th class="<?php echo $patient_an_registration->Emergency->headerCellClass() ?>"><?php echo $patient_an_registration->Emergency->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Emergency->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Emergency->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Emergency->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Emergency->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Emergency->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EmergencyS->Visible) { // EmergencyS ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->EmergencyS) == "") { ?>
		<th class="<?php echo $patient_an_registration->EmergencyS->headerCellClass() ?>"><?php echo $patient_an_registration->EmergencyS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->EmergencyS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->EmergencyS->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->EmergencyS->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->EmergencyS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->EmergencyS->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EmergencyP->Visible) { // EmergencyP ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->EmergencyP) == "") { ?>
		<th class="<?php echo $patient_an_registration->EmergencyP->headerCellClass() ?>"><?php echo $patient_an_registration->EmergencyP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->EmergencyP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->EmergencyP->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->EmergencyP->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->EmergencyP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->EmergencyP->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Maturity->Visible) { // Maturity ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Maturity) == "") { ?>
		<th class="<?php echo $patient_an_registration->Maturity->headerCellClass() ?>"><?php echo $patient_an_registration->Maturity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Maturity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Maturity->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Maturity->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Maturity->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Maturity->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Baby1->Visible) { // Baby1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Baby1) == "") { ?>
		<th class="<?php echo $patient_an_registration->Baby1->headerCellClass() ?>"><?php echo $patient_an_registration->Baby1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Baby1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Baby1->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Baby1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Baby1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Baby1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Baby2->Visible) { // Baby2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Baby2) == "") { ?>
		<th class="<?php echo $patient_an_registration->Baby2->headerCellClass() ?>"><?php echo $patient_an_registration->Baby2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Baby2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Baby2->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Baby2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Baby2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Baby2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->sex1->Visible) { // sex1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->sex1) == "") { ?>
		<th class="<?php echo $patient_an_registration->sex1->headerCellClass() ?>"><?php echo $patient_an_registration->sex1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->sex1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->sex1->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->sex1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->sex1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->sex1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->sex2->Visible) { // sex2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->sex2) == "") { ?>
		<th class="<?php echo $patient_an_registration->sex2->headerCellClass() ?>"><?php echo $patient_an_registration->sex2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->sex2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->sex2->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->sex2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->sex2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->sex2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->weight1->Visible) { // weight1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->weight1) == "") { ?>
		<th class="<?php echo $patient_an_registration->weight1->headerCellClass() ?>"><?php echo $patient_an_registration->weight1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->weight1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->weight1->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->weight1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->weight1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->weight1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->weight2->Visible) { // weight2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->weight2) == "") { ?>
		<th class="<?php echo $patient_an_registration->weight2->headerCellClass() ?>"><?php echo $patient_an_registration->weight2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->weight2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->weight2->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->weight2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->weight2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->weight2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NICU1->Visible) { // NICU1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->NICU1) == "") { ?>
		<th class="<?php echo $patient_an_registration->NICU1->headerCellClass() ?>"><?php echo $patient_an_registration->NICU1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->NICU1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->NICU1->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->NICU1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->NICU1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->NICU1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NICU2->Visible) { // NICU2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->NICU2) == "") { ?>
		<th class="<?php echo $patient_an_registration->NICU2->headerCellClass() ?>"><?php echo $patient_an_registration->NICU2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->NICU2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->NICU2->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->NICU2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->NICU2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->NICU2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Jaundice1->Visible) { // Jaundice1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Jaundice1) == "") { ?>
		<th class="<?php echo $patient_an_registration->Jaundice1->headerCellClass() ?>"><?php echo $patient_an_registration->Jaundice1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Jaundice1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Jaundice1->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Jaundice1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Jaundice1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Jaundice1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Jaundice2->Visible) { // Jaundice2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Jaundice2) == "") { ?>
		<th class="<?php echo $patient_an_registration->Jaundice2->headerCellClass() ?>"><?php echo $patient_an_registration->Jaundice2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Jaundice2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Jaundice2->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Jaundice2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Jaundice2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Jaundice2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Others1->Visible) { // Others1 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Others1) == "") { ?>
		<th class="<?php echo $patient_an_registration->Others1->headerCellClass() ?>"><?php echo $patient_an_registration->Others1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Others1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Others1->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Others1->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Others1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Others1->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Others2->Visible) { // Others2 ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->Others2) == "") { ?>
		<th class="<?php echo $patient_an_registration->Others2->headerCellClass() ?>"><?php echo $patient_an_registration->Others2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->Others2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->Others2->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->Others2->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->Others2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->Others2->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->SpillOverReasons->Visible) { // SpillOverReasons ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->SpillOverReasons) == "") { ?>
		<th class="<?php echo $patient_an_registration->SpillOverReasons->headerCellClass() ?>"><?php echo $patient_an_registration->SpillOverReasons->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->SpillOverReasons->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->SpillOverReasons->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->SpillOverReasons->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->SpillOverReasons->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->SpillOverReasons->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANClosed->Visible) { // ANClosed ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ANClosed) == "") { ?>
		<th class="<?php echo $patient_an_registration->ANClosed->headerCellClass() ?>"><?php echo $patient_an_registration->ANClosed->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ANClosed->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ANClosed->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ANClosed->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ANClosed->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ANClosed->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANClosedDATE->Visible) { // ANClosedDATE ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ANClosedDATE) == "") { ?>
		<th class="<?php echo $patient_an_registration->ANClosedDATE->headerCellClass() ?>"><?php echo $patient_an_registration->ANClosedDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ANClosedDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ANClosedDATE->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ANClosedDATE->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ANClosedDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ANClosedDATE->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->PastMedicalHistoryOthers) == "") { ?>
		<th class="<?php echo $patient_an_registration->PastMedicalHistoryOthers->headerCellClass() ?>"><?php echo $patient_an_registration->PastMedicalHistoryOthers->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->PastMedicalHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->PastMedicalHistoryOthers->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->PastMedicalHistoryOthers->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->PastMedicalHistoryOthers->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->PastMedicalHistoryOthers->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->PastSurgicalHistoryOthers) == "") { ?>
		<th class="<?php echo $patient_an_registration->PastSurgicalHistoryOthers->headerCellClass() ?>"><?php echo $patient_an_registration->PastSurgicalHistoryOthers->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->PastSurgicalHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->PastSurgicalHistoryOthers->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->PastSurgicalHistoryOthers->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->PastSurgicalHistoryOthers->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->PastSurgicalHistoryOthers->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->FamilyHistoryOthers) == "") { ?>
		<th class="<?php echo $patient_an_registration->FamilyHistoryOthers->headerCellClass() ?>"><?php echo $patient_an_registration->FamilyHistoryOthers->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->FamilyHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->FamilyHistoryOthers->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->FamilyHistoryOthers->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->FamilyHistoryOthers->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->FamilyHistoryOthers->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->PresentPregnancyComplicationsOthers) == "") { ?>
		<th class="<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->PresentPregnancyComplicationsOthers->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->PresentPregnancyComplicationsOthers->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ETdate->Visible) { // ETdate ?>
	<?php if ($patient_an_registration->SortUrl($patient_an_registration->ETdate) == "") { ?>
		<th class="<?php echo $patient_an_registration->ETdate->headerCellClass() ?>"><?php echo $patient_an_registration->ETdate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_an_registration->ETdate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_an_registration->ETdate->Name ?>" data-sort-order="<?php echo $patient_an_registration_preview->SortField == $patient_an_registration->ETdate->Name && $patient_an_registration_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_an_registration->ETdate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_an_registration_preview->SortField == $patient_an_registration->ETdate->Name) { ?><?php if ($patient_an_registration_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_an_registration_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
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
$patient_an_registration_preview->RowCnt = 0;
while ($patient_an_registration_preview->Recordset && !$patient_an_registration_preview->Recordset->EOF) {

	// Init row class and style
	$patient_an_registration_preview->RecCount++;
	$patient_an_registration_preview->RowCnt++;
	$patient_an_registration_preview->CssStyle = "";
	$patient_an_registration_preview->loadListRowValues($patient_an_registration_preview->Recordset);

	// Render row
	$patient_an_registration_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_an_registration_preview->resetAttributes();
	$patient_an_registration_preview->renderListRow();

	// Render list options
	$patient_an_registration_preview->renderListOptions();
?>
	<tr<?php echo $patient_an_registration_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_an_registration_preview->ListOptions->render("body", "left", $patient_an_registration_preview->RowCnt);
?>
<?php if ($patient_an_registration->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_an_registration->id->cellAttributes() ?>>
<span<?php echo $patient_an_registration->id->viewAttributes() ?>>
<?php echo $patient_an_registration->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->pid->Visible) { // pid ?>
		<!-- pid -->
		<td<?php echo $patient_an_registration->pid->cellAttributes() ?>>
<span<?php echo $patient_an_registration->pid->viewAttributes() ?>>
<?php echo $patient_an_registration->pid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->fid->Visible) { // fid ?>
		<!-- fid -->
		<td<?php echo $patient_an_registration->fid->cellAttributes() ?>>
<span<?php echo $patient_an_registration->fid->viewAttributes() ?>>
<?php echo $patient_an_registration->fid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->G->Visible) { // G ?>
		<!-- G -->
		<td<?php echo $patient_an_registration->G->cellAttributes() ?>>
<span<?php echo $patient_an_registration->G->viewAttributes() ?>>
<?php echo $patient_an_registration->G->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->P->Visible) { // P ?>
		<!-- P -->
		<td<?php echo $patient_an_registration->P->cellAttributes() ?>>
<span<?php echo $patient_an_registration->P->viewAttributes() ?>>
<?php echo $patient_an_registration->P->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->L->Visible) { // L ?>
		<!-- L -->
		<td<?php echo $patient_an_registration->L->cellAttributes() ?>>
<span<?php echo $patient_an_registration->L->viewAttributes() ?>>
<?php echo $patient_an_registration->L->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A->Visible) { // A ?>
		<!-- A -->
		<td<?php echo $patient_an_registration->A->cellAttributes() ?>>
<span<?php echo $patient_an_registration->A->viewAttributes() ?>>
<?php echo $patient_an_registration->A->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->E->Visible) { // E ?>
		<!-- E -->
		<td<?php echo $patient_an_registration->E->cellAttributes() ?>>
<span<?php echo $patient_an_registration->E->viewAttributes() ?>>
<?php echo $patient_an_registration->E->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->M->Visible) { // M ?>
		<!-- M -->
		<td<?php echo $patient_an_registration->M->cellAttributes() ?>>
<span<?php echo $patient_an_registration->M->viewAttributes() ?>>
<?php echo $patient_an_registration->M->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->LMP->Visible) { // LMP ?>
		<!-- LMP -->
		<td<?php echo $patient_an_registration->LMP->cellAttributes() ?>>
<span<?php echo $patient_an_registration->LMP->viewAttributes() ?>>
<?php echo $patient_an_registration->LMP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->EDO->Visible) { // EDO ?>
		<!-- EDO -->
		<td<?php echo $patient_an_registration->EDO->cellAttributes() ?>>
<span<?php echo $patient_an_registration->EDO->viewAttributes() ?>>
<?php echo $patient_an_registration->EDO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<!-- MenstrualHistory -->
		<td<?php echo $patient_an_registration->MenstrualHistory->cellAttributes() ?>>
<span<?php echo $patient_an_registration->MenstrualHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->MenstrualHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->MaritalHistory->Visible) { // MaritalHistory ?>
		<!-- MaritalHistory -->
		<td<?php echo $patient_an_registration->MaritalHistory->cellAttributes() ?>>
<span<?php echo $patient_an_registration->MaritalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->MaritalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<!-- ObstetricHistory -->
		<td<?php echo $patient_an_registration->ObstetricHistory->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ObstetricHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->ObstetricHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
		<!-- PreviousHistoryofGDM -->
		<td<?php echo $patient_an_registration->PreviousHistoryofGDM->cellAttributes() ?>>
<span<?php echo $patient_an_registration->PreviousHistoryofGDM->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofGDM->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
		<!-- PreviousHistorofPIH -->
		<td<?php echo $patient_an_registration->PreviousHistorofPIH->cellAttributes() ?>>
<span<?php echo $patient_an_registration->PreviousHistorofPIH->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistorofPIH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
		<!-- PreviousHistoryofIUGR -->
		<td<?php echo $patient_an_registration->PreviousHistoryofIUGR->cellAttributes() ?>>
<span<?php echo $patient_an_registration->PreviousHistoryofIUGR->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofIUGR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
		<!-- PreviousHistoryofOligohydramnios -->
		<td<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<span<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
		<!-- PreviousHistoryofPreterm -->
		<td<?php echo $patient_an_registration->PreviousHistoryofPreterm->cellAttributes() ?>>
<span<?php echo $patient_an_registration->PreviousHistoryofPreterm->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofPreterm->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->G1->Visible) { // G1 ?>
		<!-- G1 -->
		<td<?php echo $patient_an_registration->G1->cellAttributes() ?>>
<span<?php echo $patient_an_registration->G1->viewAttributes() ?>>
<?php echo $patient_an_registration->G1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->G2->Visible) { // G2 ?>
		<!-- G2 -->
		<td<?php echo $patient_an_registration->G2->cellAttributes() ?>>
<span<?php echo $patient_an_registration->G2->viewAttributes() ?>>
<?php echo $patient_an_registration->G2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->G3->Visible) { // G3 ?>
		<!-- G3 -->
		<td<?php echo $patient_an_registration->G3->cellAttributes() ?>>
<span<?php echo $patient_an_registration->G3->viewAttributes() ?>>
<?php echo $patient_an_registration->G3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
		<!-- DeliveryNDLSCS1 -->
		<td<?php echo $patient_an_registration->DeliveryNDLSCS1->cellAttributes() ?>>
<span<?php echo $patient_an_registration->DeliveryNDLSCS1->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
		<!-- DeliveryNDLSCS2 -->
		<td<?php echo $patient_an_registration->DeliveryNDLSCS2->cellAttributes() ?>>
<span<?php echo $patient_an_registration->DeliveryNDLSCS2->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
		<!-- DeliveryNDLSCS3 -->
		<td<?php echo $patient_an_registration->DeliveryNDLSCS3->cellAttributes() ?>>
<span<?php echo $patient_an_registration->DeliveryNDLSCS3->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight1->Visible) { // BabySexweight1 ?>
		<!-- BabySexweight1 -->
		<td<?php echo $patient_an_registration->BabySexweight1->cellAttributes() ?>>
<span<?php echo $patient_an_registration->BabySexweight1->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight2->Visible) { // BabySexweight2 ?>
		<!-- BabySexweight2 -->
		<td<?php echo $patient_an_registration->BabySexweight2->cellAttributes() ?>>
<span<?php echo $patient_an_registration->BabySexweight2->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight3->Visible) { // BabySexweight3 ?>
		<!-- BabySexweight3 -->
		<td<?php echo $patient_an_registration->BabySexweight3->cellAttributes() ?>>
<span<?php echo $patient_an_registration->BabySexweight3->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
		<!-- PastMedicalHistory -->
		<td<?php echo $patient_an_registration->PastMedicalHistory->cellAttributes() ?>>
<span<?php echo $patient_an_registration->PastMedicalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->PastMedicalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
		<!-- PastSurgicalHistory -->
		<td<?php echo $patient_an_registration->PastSurgicalHistory->cellAttributes() ?>>
<span<?php echo $patient_an_registration->PastSurgicalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->PastSurgicalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistory->Visible) { // FamilyHistory ?>
		<!-- FamilyHistory -->
		<td<?php echo $patient_an_registration->FamilyHistory->cellAttributes() ?>>
<span<?php echo $patient_an_registration->FamilyHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->FamilyHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Viability->Visible) { // Viability ?>
		<!-- Viability -->
		<td<?php echo $patient_an_registration->Viability->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Viability->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ViabilityDATE->Visible) { // ViabilityDATE ?>
		<!-- ViabilityDATE -->
		<td<?php echo $patient_an_registration->ViabilityDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ViabilityDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ViabilityDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
		<!-- ViabilityREPORT -->
		<td<?php echo $patient_an_registration->ViabilityREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ViabilityREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->ViabilityREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Viability2->Visible) { // Viability2 ?>
		<!-- Viability2 -->
		<td<?php echo $patient_an_registration->Viability2->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Viability2->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Viability2DATE->Visible) { // Viability2DATE ?>
		<!-- Viability2DATE -->
		<td<?php echo $patient_an_registration->Viability2DATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Viability2DATE->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2DATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Viability2REPORT->Visible) { // Viability2REPORT ?>
		<!-- Viability2REPORT -->
		<td<?php echo $patient_an_registration->Viability2REPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Viability2REPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2REPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->NTscan->Visible) { // NTscan ?>
		<!-- NTscan -->
		<td<?php echo $patient_an_registration->NTscan->cellAttributes() ?>>
<span<?php echo $patient_an_registration->NTscan->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscan->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->NTscanDATE->Visible) { // NTscanDATE ?>
		<!-- NTscanDATE -->
		<td<?php echo $patient_an_registration->NTscanDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->NTscanDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscanDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->NTscanREPORT->Visible) { // NTscanREPORT ?>
		<!-- NTscanREPORT -->
		<td<?php echo $patient_an_registration->NTscanREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration->NTscanREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscanREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->EarlyTarget->Visible) { // EarlyTarget ?>
		<!-- EarlyTarget -->
		<td<?php echo $patient_an_registration->EarlyTarget->cellAttributes() ?>>
<span<?php echo $patient_an_registration->EarlyTarget->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTarget->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
		<!-- EarlyTargetDATE -->
		<td<?php echo $patient_an_registration->EarlyTargetDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->EarlyTargetDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTargetDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
		<!-- EarlyTargetREPORT -->
		<td<?php echo $patient_an_registration->EarlyTargetREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration->EarlyTargetREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTargetREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Anomaly->Visible) { // Anomaly ?>
		<!-- Anomaly -->
		<td<?php echo $patient_an_registration->Anomaly->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Anomaly->viewAttributes() ?>>
<?php echo $patient_an_registration->Anomaly->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->AnomalyDATE->Visible) { // AnomalyDATE ?>
		<!-- AnomalyDATE -->
		<td<?php echo $patient_an_registration->AnomalyDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->AnomalyDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->AnomalyDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
		<!-- AnomalyREPORT -->
		<td<?php echo $patient_an_registration->AnomalyREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration->AnomalyREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->AnomalyREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Growth->Visible) { // Growth ?>
		<!-- Growth -->
		<td<?php echo $patient_an_registration->Growth->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Growth->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->GrowthDATE->Visible) { // GrowthDATE ?>
		<!-- GrowthDATE -->
		<td<?php echo $patient_an_registration->GrowthDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->GrowthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->GrowthDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->GrowthREPORT->Visible) { // GrowthREPORT ?>
		<!-- GrowthREPORT -->
		<td<?php echo $patient_an_registration->GrowthREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration->GrowthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->GrowthREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Growth1->Visible) { // Growth1 ?>
		<!-- Growth1 -->
		<td<?php echo $patient_an_registration->Growth1->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Growth1->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Growth1DATE->Visible) { // Growth1DATE ?>
		<!-- Growth1DATE -->
		<td<?php echo $patient_an_registration->Growth1DATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Growth1DATE->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1DATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Growth1REPORT->Visible) { // Growth1REPORT ?>
		<!-- Growth1REPORT -->
		<td<?php echo $patient_an_registration->Growth1REPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Growth1REPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1REPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ANProfile->Visible) { // ANProfile ?>
		<!-- ANProfile -->
		<td<?php echo $patient_an_registration->ANProfile->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ANProfile->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ANProfileDATE->Visible) { // ANProfileDATE ?>
		<!-- ANProfileDATE -->
		<td<?php echo $patient_an_registration->ANProfileDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ANProfileDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
		<!-- ANProfileINHOUSE -->
		<td<?php echo $patient_an_registration->ANProfileINHOUSE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ANProfileINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
		<!-- ANProfileREPORT -->
		<td<?php echo $patient_an_registration->ANProfileREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ANProfileREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DualMarker->Visible) { // DualMarker ?>
		<!-- DualMarker -->
		<td<?php echo $patient_an_registration->DualMarker->cellAttributes() ?>>
<span<?php echo $patient_an_registration->DualMarker->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarker->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
		<!-- DualMarkerDATE -->
		<td<?php echo $patient_an_registration->DualMarkerDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->DualMarkerDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
		<!-- DualMarkerINHOUSE -->
		<td<?php echo $patient_an_registration->DualMarkerINHOUSE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->DualMarkerINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
		<!-- DualMarkerREPORT -->
		<td<?php echo $patient_an_registration->DualMarkerREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration->DualMarkerREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Quadruple->Visible) { // Quadruple ?>
		<!-- Quadruple -->
		<td<?php echo $patient_an_registration->Quadruple->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Quadruple->viewAttributes() ?>>
<?php echo $patient_an_registration->Quadruple->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
		<!-- QuadrupleDATE -->
		<td<?php echo $patient_an_registration->QuadrupleDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->QuadrupleDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
		<!-- QuadrupleINHOUSE -->
		<td<?php echo $patient_an_registration->QuadrupleINHOUSE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->QuadrupleINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
		<!-- QuadrupleREPORT -->
		<td<?php echo $patient_an_registration->QuadrupleREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration->QuadrupleREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A5month->Visible) { // A5month ?>
		<!-- A5month -->
		<td<?php echo $patient_an_registration->A5month->cellAttributes() ?>>
<span<?php echo $patient_an_registration->A5month->viewAttributes() ?>>
<?php echo $patient_an_registration->A5month->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A5monthDATE->Visible) { // A5monthDATE ?>
		<!-- A5monthDATE -->
		<td<?php echo $patient_an_registration->A5monthDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->A5monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
		<!-- A5monthINHOUSE -->
		<td<?php echo $patient_an_registration->A5monthINHOUSE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->A5monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A5monthREPORT->Visible) { // A5monthREPORT ?>
		<!-- A5monthREPORT -->
		<td<?php echo $patient_an_registration->A5monthREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration->A5monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A7month->Visible) { // A7month ?>
		<!-- A7month -->
		<td<?php echo $patient_an_registration->A7month->cellAttributes() ?>>
<span<?php echo $patient_an_registration->A7month->viewAttributes() ?>>
<?php echo $patient_an_registration->A7month->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A7monthDATE->Visible) { // A7monthDATE ?>
		<!-- A7monthDATE -->
		<td<?php echo $patient_an_registration->A7monthDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->A7monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
		<!-- A7monthINHOUSE -->
		<td<?php echo $patient_an_registration->A7monthINHOUSE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->A7monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A7monthREPORT->Visible) { // A7monthREPORT ?>
		<!-- A7monthREPORT -->
		<td<?php echo $patient_an_registration->A7monthREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration->A7monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A9month->Visible) { // A9month ?>
		<!-- A9month -->
		<td<?php echo $patient_an_registration->A9month->cellAttributes() ?>>
<span<?php echo $patient_an_registration->A9month->viewAttributes() ?>>
<?php echo $patient_an_registration->A9month->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A9monthDATE->Visible) { // A9monthDATE ?>
		<!-- A9monthDATE -->
		<td<?php echo $patient_an_registration->A9monthDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->A9monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
		<!-- A9monthINHOUSE -->
		<td<?php echo $patient_an_registration->A9monthINHOUSE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->A9monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A9monthREPORT->Visible) { // A9monthREPORT ?>
		<!-- A9monthREPORT -->
		<td<?php echo $patient_an_registration->A9monthREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration->A9monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->INJ->Visible) { // INJ ?>
		<!-- INJ -->
		<td<?php echo $patient_an_registration->INJ->cellAttributes() ?>>
<span<?php echo $patient_an_registration->INJ->viewAttributes() ?>>
<?php echo $patient_an_registration->INJ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->INJDATE->Visible) { // INJDATE ?>
		<!-- INJDATE -->
		<td<?php echo $patient_an_registration->INJDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->INJDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->INJDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->INJINHOUSE->Visible) { // INJINHOUSE ?>
		<!-- INJINHOUSE -->
		<td<?php echo $patient_an_registration->INJINHOUSE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->INJINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->INJINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->INJREPORT->Visible) { // INJREPORT ?>
		<!-- INJREPORT -->
		<td<?php echo $patient_an_registration->INJREPORT->cellAttributes() ?>>
<span<?php echo $patient_an_registration->INJREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->INJREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Bleeding->Visible) { // Bleeding ?>
		<!-- Bleeding -->
		<td<?php echo $patient_an_registration->Bleeding->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Bleeding->viewAttributes() ?>>
<?php echo $patient_an_registration->Bleeding->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Hypothyroidism->Visible) { // Hypothyroidism ?>
		<!-- Hypothyroidism -->
		<td<?php echo $patient_an_registration->Hypothyroidism->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Hypothyroidism->viewAttributes() ?>>
<?php echo $patient_an_registration->Hypothyroidism->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PICMENumber->Visible) { // PICMENumber ?>
		<!-- PICMENumber -->
		<td<?php echo $patient_an_registration->PICMENumber->cellAttributes() ?>>
<span<?php echo $patient_an_registration->PICMENumber->viewAttributes() ?>>
<?php echo $patient_an_registration->PICMENumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Outcome->Visible) { // Outcome ?>
		<!-- Outcome -->
		<td<?php echo $patient_an_registration->Outcome->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Outcome->viewAttributes() ?>>
<?php echo $patient_an_registration->Outcome->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DateofAdmission->Visible) { // DateofAdmission ?>
		<!-- DateofAdmission -->
		<td<?php echo $patient_an_registration->DateofAdmission->cellAttributes() ?>>
<span<?php echo $patient_an_registration->DateofAdmission->viewAttributes() ?>>
<?php echo $patient_an_registration->DateofAdmission->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DateodProcedure->Visible) { // DateodProcedure ?>
		<!-- DateodProcedure -->
		<td<?php echo $patient_an_registration->DateodProcedure->cellAttributes() ?>>
<span<?php echo $patient_an_registration->DateodProcedure->viewAttributes() ?>>
<?php echo $patient_an_registration->DateodProcedure->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Miscarriage->Visible) { // Miscarriage ?>
		<!-- Miscarriage -->
		<td<?php echo $patient_an_registration->Miscarriage->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Miscarriage->viewAttributes() ?>>
<?php echo $patient_an_registration->Miscarriage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
		<!-- ModeOfDelivery -->
		<td<?php echo $patient_an_registration->ModeOfDelivery->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ModeOfDelivery->viewAttributes() ?>>
<?php echo $patient_an_registration->ModeOfDelivery->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ND->Visible) { // ND ?>
		<!-- ND -->
		<td<?php echo $patient_an_registration->ND->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ND->viewAttributes() ?>>
<?php echo $patient_an_registration->ND->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->NDS->Visible) { // NDS ?>
		<!-- NDS -->
		<td<?php echo $patient_an_registration->NDS->cellAttributes() ?>>
<span<?php echo $patient_an_registration->NDS->viewAttributes() ?>>
<?php echo $patient_an_registration->NDS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->NDP->Visible) { // NDP ?>
		<!-- NDP -->
		<td<?php echo $patient_an_registration->NDP->cellAttributes() ?>>
<span<?php echo $patient_an_registration->NDP->viewAttributes() ?>>
<?php echo $patient_an_registration->NDP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Vaccum->Visible) { // Vaccum ?>
		<!-- Vaccum -->
		<td<?php echo $patient_an_registration->Vaccum->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Vaccum->viewAttributes() ?>>
<?php echo $patient_an_registration->Vaccum->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->VaccumS->Visible) { // VaccumS ?>
		<!-- VaccumS -->
		<td<?php echo $patient_an_registration->VaccumS->cellAttributes() ?>>
<span<?php echo $patient_an_registration->VaccumS->viewAttributes() ?>>
<?php echo $patient_an_registration->VaccumS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->VaccumP->Visible) { // VaccumP ?>
		<!-- VaccumP -->
		<td<?php echo $patient_an_registration->VaccumP->cellAttributes() ?>>
<span<?php echo $patient_an_registration->VaccumP->viewAttributes() ?>>
<?php echo $patient_an_registration->VaccumP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Forceps->Visible) { // Forceps ?>
		<!-- Forceps -->
		<td<?php echo $patient_an_registration->Forceps->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Forceps->viewAttributes() ?>>
<?php echo $patient_an_registration->Forceps->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ForcepsS->Visible) { // ForcepsS ?>
		<!-- ForcepsS -->
		<td<?php echo $patient_an_registration->ForcepsS->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ForcepsS->viewAttributes() ?>>
<?php echo $patient_an_registration->ForcepsS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ForcepsP->Visible) { // ForcepsP ?>
		<!-- ForcepsP -->
		<td<?php echo $patient_an_registration->ForcepsP->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ForcepsP->viewAttributes() ?>>
<?php echo $patient_an_registration->ForcepsP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Elective->Visible) { // Elective ?>
		<!-- Elective -->
		<td<?php echo $patient_an_registration->Elective->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Elective->viewAttributes() ?>>
<?php echo $patient_an_registration->Elective->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ElectiveS->Visible) { // ElectiveS ?>
		<!-- ElectiveS -->
		<td<?php echo $patient_an_registration->ElectiveS->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ElectiveS->viewAttributes() ?>>
<?php echo $patient_an_registration->ElectiveS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ElectiveP->Visible) { // ElectiveP ?>
		<!-- ElectiveP -->
		<td<?php echo $patient_an_registration->ElectiveP->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ElectiveP->viewAttributes() ?>>
<?php echo $patient_an_registration->ElectiveP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Emergency->Visible) { // Emergency ?>
		<!-- Emergency -->
		<td<?php echo $patient_an_registration->Emergency->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Emergency->viewAttributes() ?>>
<?php echo $patient_an_registration->Emergency->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->EmergencyS->Visible) { // EmergencyS ?>
		<!-- EmergencyS -->
		<td<?php echo $patient_an_registration->EmergencyS->cellAttributes() ?>>
<span<?php echo $patient_an_registration->EmergencyS->viewAttributes() ?>>
<?php echo $patient_an_registration->EmergencyS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->EmergencyP->Visible) { // EmergencyP ?>
		<!-- EmergencyP -->
		<td<?php echo $patient_an_registration->EmergencyP->cellAttributes() ?>>
<span<?php echo $patient_an_registration->EmergencyP->viewAttributes() ?>>
<?php echo $patient_an_registration->EmergencyP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Maturity->Visible) { // Maturity ?>
		<!-- Maturity -->
		<td<?php echo $patient_an_registration->Maturity->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Maturity->viewAttributes() ?>>
<?php echo $patient_an_registration->Maturity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Baby1->Visible) { // Baby1 ?>
		<!-- Baby1 -->
		<td<?php echo $patient_an_registration->Baby1->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Baby1->viewAttributes() ?>>
<?php echo $patient_an_registration->Baby1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Baby2->Visible) { // Baby2 ?>
		<!-- Baby2 -->
		<td<?php echo $patient_an_registration->Baby2->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Baby2->viewAttributes() ?>>
<?php echo $patient_an_registration->Baby2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->sex1->Visible) { // sex1 ?>
		<!-- sex1 -->
		<td<?php echo $patient_an_registration->sex1->cellAttributes() ?>>
<span<?php echo $patient_an_registration->sex1->viewAttributes() ?>>
<?php echo $patient_an_registration->sex1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->sex2->Visible) { // sex2 ?>
		<!-- sex2 -->
		<td<?php echo $patient_an_registration->sex2->cellAttributes() ?>>
<span<?php echo $patient_an_registration->sex2->viewAttributes() ?>>
<?php echo $patient_an_registration->sex2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->weight1->Visible) { // weight1 ?>
		<!-- weight1 -->
		<td<?php echo $patient_an_registration->weight1->cellAttributes() ?>>
<span<?php echo $patient_an_registration->weight1->viewAttributes() ?>>
<?php echo $patient_an_registration->weight1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->weight2->Visible) { // weight2 ?>
		<!-- weight2 -->
		<td<?php echo $patient_an_registration->weight2->cellAttributes() ?>>
<span<?php echo $patient_an_registration->weight2->viewAttributes() ?>>
<?php echo $patient_an_registration->weight2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->NICU1->Visible) { // NICU1 ?>
		<!-- NICU1 -->
		<td<?php echo $patient_an_registration->NICU1->cellAttributes() ?>>
<span<?php echo $patient_an_registration->NICU1->viewAttributes() ?>>
<?php echo $patient_an_registration->NICU1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->NICU2->Visible) { // NICU2 ?>
		<!-- NICU2 -->
		<td<?php echo $patient_an_registration->NICU2->cellAttributes() ?>>
<span<?php echo $patient_an_registration->NICU2->viewAttributes() ?>>
<?php echo $patient_an_registration->NICU2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Jaundice1->Visible) { // Jaundice1 ?>
		<!-- Jaundice1 -->
		<td<?php echo $patient_an_registration->Jaundice1->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Jaundice1->viewAttributes() ?>>
<?php echo $patient_an_registration->Jaundice1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Jaundice2->Visible) { // Jaundice2 ?>
		<!-- Jaundice2 -->
		<td<?php echo $patient_an_registration->Jaundice2->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Jaundice2->viewAttributes() ?>>
<?php echo $patient_an_registration->Jaundice2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Others1->Visible) { // Others1 ?>
		<!-- Others1 -->
		<td<?php echo $patient_an_registration->Others1->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Others1->viewAttributes() ?>>
<?php echo $patient_an_registration->Others1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Others2->Visible) { // Others2 ?>
		<!-- Others2 -->
		<td<?php echo $patient_an_registration->Others2->cellAttributes() ?>>
<span<?php echo $patient_an_registration->Others2->viewAttributes() ?>>
<?php echo $patient_an_registration->Others2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->SpillOverReasons->Visible) { // SpillOverReasons ?>
		<!-- SpillOverReasons -->
		<td<?php echo $patient_an_registration->SpillOverReasons->cellAttributes() ?>>
<span<?php echo $patient_an_registration->SpillOverReasons->viewAttributes() ?>>
<?php echo $patient_an_registration->SpillOverReasons->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ANClosed->Visible) { // ANClosed ?>
		<!-- ANClosed -->
		<td<?php echo $patient_an_registration->ANClosed->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ANClosed->viewAttributes() ?>>
<?php echo $patient_an_registration->ANClosed->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ANClosedDATE->Visible) { // ANClosedDATE ?>
		<!-- ANClosedDATE -->
		<td<?php echo $patient_an_registration->ANClosedDATE->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ANClosedDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANClosedDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
		<!-- PastMedicalHistoryOthers -->
		<td<?php echo $patient_an_registration->PastMedicalHistoryOthers->cellAttributes() ?>>
<span<?php echo $patient_an_registration->PastMedicalHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PastMedicalHistoryOthers->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
		<!-- PastSurgicalHistoryOthers -->
		<td<?php echo $patient_an_registration->PastSurgicalHistoryOthers->cellAttributes() ?>>
<span<?php echo $patient_an_registration->PastSurgicalHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PastSurgicalHistoryOthers->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
		<!-- FamilyHistoryOthers -->
		<td<?php echo $patient_an_registration->FamilyHistoryOthers->cellAttributes() ?>>
<span<?php echo $patient_an_registration->FamilyHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->FamilyHistoryOthers->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
		<!-- PresentPregnancyComplicationsOthers -->
		<td<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<span<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ETdate->Visible) { // ETdate ?>
		<!-- ETdate -->
		<td<?php echo $patient_an_registration->ETdate->cellAttributes() ?>>
<span<?php echo $patient_an_registration->ETdate->viewAttributes() ?>>
<?php echo $patient_an_registration->ETdate->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_an_registration_preview->ListOptions->render("body", "right", $patient_an_registration_preview->RowCnt);
?>
	</tr>
<?php
	$patient_an_registration_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_an_registration_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_an_registration_preview->Pager)) $patient_an_registration_preview->Pager = new PrevNextPager($patient_an_registration_preview->StartRec, $patient_an_registration_preview->DisplayRecs, $patient_an_registration_preview->TotalRecs) ?>
<?php if ($patient_an_registration_preview->Pager->RecordCount > 0 && $patient_an_registration_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_an_registration_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_an_registration_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_an_registration_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_an_registration_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_an_registration_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_an_registration_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_an_registration_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_an_registration_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_an_registration_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_an_registration_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_an_registration_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_an_registration_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_an_registration_preview->showPageFooter();
if (DEBUG_ENABLED)
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