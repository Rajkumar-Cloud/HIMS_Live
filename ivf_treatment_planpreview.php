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
$ivf_treatment_plan_preview = new ivf_treatment_plan_preview();

// Run the page
$ivf_treatment_plan_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_treatment_plan_preview->Page_Render();
?>
<?php $ivf_treatment_plan_preview->showPageHeader(); ?>
<div class="card ew-grid ivf_treatment_plan"><!-- .card -->
<?php if ($ivf_treatment_plan_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_treatment_plan_preview->renderListOptions();

// Render list options (header, left)
$ivf_treatment_plan_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->TreatmentStartDate) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->TreatmentStartDate->headerCellClass() ?>"><?php echo $ivf_treatment_plan->TreatmentStartDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->TreatmentStartDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->TreatmentStartDate->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->TreatmentStartDate->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TreatmentStartDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->TreatmentStartDate->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->treatment_status) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->treatment_status->headerCellClass() ?>"><?php echo $ivf_treatment_plan->treatment_status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->treatment_status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->treatment_status->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->treatment_status->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->treatment_status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->treatment_status->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->ARTCYCLE) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->ARTCYCLE->headerCellClass() ?>"><?php echo $ivf_treatment_plan->ARTCYCLE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->ARTCYCLE->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->ARTCYCLE->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->ARTCYCLE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->ARTCYCLE->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->IVFCycleNO->Visible) { // IVFCycleNO ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->IVFCycleNO) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->IVFCycleNO->headerCellClass() ?>"><?php echo $ivf_treatment_plan->IVFCycleNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->IVFCycleNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->IVFCycleNO->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->IVFCycleNO->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->IVFCycleNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->IVFCycleNO->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->Treatment->Visible) { // Treatment ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->Treatment) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->Treatment->headerCellClass() ?>"><?php echo $ivf_treatment_plan->Treatment->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->Treatment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->Treatment->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->Treatment->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Treatment->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->Treatment->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->TreatmentTec->Visible) { // TreatmentTec ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->TreatmentTec) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->TreatmentTec->headerCellClass() ?>"><?php echo $ivf_treatment_plan->TreatmentTec->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->TreatmentTec->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->TreatmentTec->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->TreatmentTec->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TreatmentTec->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->TreatmentTec->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->TypeOfCycle) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->TypeOfCycle->headerCellClass() ?>"><?php echo $ivf_treatment_plan->TypeOfCycle->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->TypeOfCycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->TypeOfCycle->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->TypeOfCycle->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TypeOfCycle->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->TypeOfCycle->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->SpermOrgin->Visible) { // SpermOrgin ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->SpermOrgin) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->SpermOrgin->headerCellClass() ?>"><?php echo $ivf_treatment_plan->SpermOrgin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->SpermOrgin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->SpermOrgin->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->SpermOrgin->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->SpermOrgin->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->SpermOrgin->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->State->Visible) { // State ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->State) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->State->headerCellClass() ?>"><?php echo $ivf_treatment_plan->State->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->State->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->State->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->State->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->State->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->State->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->Origin->Visible) { // Origin ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->Origin) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->Origin->headerCellClass() ?>"><?php echo $ivf_treatment_plan->Origin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->Origin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->Origin->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->Origin->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Origin->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->Origin->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->MACS->Visible) { // MACS ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->MACS) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->MACS->headerCellClass() ?>"><?php echo $ivf_treatment_plan->MACS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->MACS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->MACS->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->MACS->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->MACS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->MACS->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->Technique->Visible) { // Technique ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->Technique) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->Technique->headerCellClass() ?>"><?php echo $ivf_treatment_plan->Technique->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->Technique->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->Technique->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->Technique->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Technique->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->Technique->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->PgdPlanning->Visible) { // PgdPlanning ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->PgdPlanning) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->PgdPlanning->headerCellClass() ?>"><?php echo $ivf_treatment_plan->PgdPlanning->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->PgdPlanning->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->PgdPlanning->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->PgdPlanning->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->PgdPlanning->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->PgdPlanning->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->IMSI->Visible) { // IMSI ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->IMSI) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->IMSI->headerCellClass() ?>"><?php echo $ivf_treatment_plan->IMSI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->IMSI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->IMSI->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->IMSI->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->IMSI->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->IMSI->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->SequentialCulture->Visible) { // SequentialCulture ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->SequentialCulture) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->SequentialCulture->headerCellClass() ?>"><?php echo $ivf_treatment_plan->SequentialCulture->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->SequentialCulture->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->SequentialCulture->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->SequentialCulture->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->SequentialCulture->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->SequentialCulture->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->TimeLapse->Visible) { // TimeLapse ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->TimeLapse) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->TimeLapse->headerCellClass() ?>"><?php echo $ivf_treatment_plan->TimeLapse->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->TimeLapse->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->TimeLapse->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->TimeLapse->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TimeLapse->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->TimeLapse->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->AH->Visible) { // AH ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->AH) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->AH->headerCellClass() ?>"><?php echo $ivf_treatment_plan->AH->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->AH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->AH->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->AH->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->AH->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->AH->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->Weight->Visible) { // Weight ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->Weight) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->Weight->headerCellClass() ?>"><?php echo $ivf_treatment_plan->Weight->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->Weight->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->Weight->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->Weight->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Weight->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->Weight->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->BMI->Visible) { // BMI ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->BMI) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->BMI->headerCellClass() ?>"><?php echo $ivf_treatment_plan->BMI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->BMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->BMI->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->BMI->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->BMI->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->BMI->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->MaleIndications->Visible) { // MaleIndications ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->MaleIndications) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->MaleIndications->headerCellClass() ?>"><?php echo $ivf_treatment_plan->MaleIndications->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->MaleIndications->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->MaleIndications->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->MaleIndications->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->MaleIndications->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->MaleIndications->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->FemaleIndications->Visible) { // FemaleIndications ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan->FemaleIndications) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan->FemaleIndications->headerCellClass() ?>"><?php echo $ivf_treatment_plan->FemaleIndications->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan->FemaleIndications->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_treatment_plan->FemaleIndications->Name ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->FemaleIndications->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->FemaleIndications->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan->FemaleIndications->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_treatment_plan_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ivf_treatment_plan_preview->RecCount = 0;
$ivf_treatment_plan_preview->RowCnt = 0;
while ($ivf_treatment_plan_preview->Recordset && !$ivf_treatment_plan_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_treatment_plan_preview->RecCount++;
	$ivf_treatment_plan_preview->RowCnt++;
	$ivf_treatment_plan_preview->CssStyle = "";
	$ivf_treatment_plan_preview->loadListRowValues($ivf_treatment_plan_preview->Recordset);

	// Render row
	$ivf_treatment_plan_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_treatment_plan_preview->resetAttributes();
	$ivf_treatment_plan_preview->renderListRow();

	// Render list options
	$ivf_treatment_plan_preview->renderListOptions();
?>
	<tr<?php echo $ivf_treatment_plan_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_treatment_plan_preview->ListOptions->render("body", "left", $ivf_treatment_plan_preview->RowCnt);
?>
<?php if ($ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<!-- TreatmentStartDate -->
		<td<?php echo $ivf_treatment_plan->TreatmentStartDate->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->TreatmentStartDate->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TreatmentStartDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
		<!-- treatment_status -->
		<td<?php echo $ivf_treatment_plan->treatment_status->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->treatment_status->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->treatment_status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<!-- ARTCYCLE -->
		<td<?php echo $ivf_treatment_plan->ARTCYCLE->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->ARTCYCLE->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->ARTCYCLE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->IVFCycleNO->Visible) { // IVFCycleNO ?>
		<!-- IVFCycleNO -->
		<td<?php echo $ivf_treatment_plan->IVFCycleNO->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->IVFCycleNO->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->IVFCycleNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->Treatment->Visible) { // Treatment ?>
		<!-- Treatment -->
		<td<?php echo $ivf_treatment_plan->Treatment->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->Treatment->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Treatment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->TreatmentTec->Visible) { // TreatmentTec ?>
		<!-- TreatmentTec -->
		<td<?php echo $ivf_treatment_plan->TreatmentTec->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->TreatmentTec->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TreatmentTec->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<!-- TypeOfCycle -->
		<td<?php echo $ivf_treatment_plan->TypeOfCycle->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->TypeOfCycle->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TypeOfCycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->SpermOrgin->Visible) { // SpermOrgin ?>
		<!-- SpermOrgin -->
		<td<?php echo $ivf_treatment_plan->SpermOrgin->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->SpermOrgin->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->SpermOrgin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->State->Visible) { // State ?>
		<!-- State -->
		<td<?php echo $ivf_treatment_plan->State->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->State->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->State->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->Origin->Visible) { // Origin ?>
		<!-- Origin -->
		<td<?php echo $ivf_treatment_plan->Origin->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->Origin->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Origin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->MACS->Visible) { // MACS ?>
		<!-- MACS -->
		<td<?php echo $ivf_treatment_plan->MACS->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->MACS->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->MACS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->Technique->Visible) { // Technique ?>
		<!-- Technique -->
		<td<?php echo $ivf_treatment_plan->Technique->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->Technique->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Technique->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->PgdPlanning->Visible) { // PgdPlanning ?>
		<!-- PgdPlanning -->
		<td<?php echo $ivf_treatment_plan->PgdPlanning->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->PgdPlanning->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->PgdPlanning->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->IMSI->Visible) { // IMSI ?>
		<!-- IMSI -->
		<td<?php echo $ivf_treatment_plan->IMSI->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->IMSI->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->IMSI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->SequentialCulture->Visible) { // SequentialCulture ?>
		<!-- SequentialCulture -->
		<td<?php echo $ivf_treatment_plan->SequentialCulture->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->SequentialCulture->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->SequentialCulture->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->TimeLapse->Visible) { // TimeLapse ?>
		<!-- TimeLapse -->
		<td<?php echo $ivf_treatment_plan->TimeLapse->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->TimeLapse->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TimeLapse->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->AH->Visible) { // AH ?>
		<!-- AH -->
		<td<?php echo $ivf_treatment_plan->AH->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->AH->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->AH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->Weight->Visible) { // Weight ?>
		<!-- Weight -->
		<td<?php echo $ivf_treatment_plan->Weight->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->Weight->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Weight->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->BMI->Visible) { // BMI ?>
		<!-- BMI -->
		<td<?php echo $ivf_treatment_plan->BMI->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->BMI->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->BMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->MaleIndications->Visible) { // MaleIndications ?>
		<!-- MaleIndications -->
		<td<?php echo $ivf_treatment_plan->MaleIndications->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->MaleIndications->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->MaleIndications->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->FemaleIndications->Visible) { // FemaleIndications ?>
		<!-- FemaleIndications -->
		<td<?php echo $ivf_treatment_plan->FemaleIndications->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan->FemaleIndications->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->FemaleIndications->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_treatment_plan_preview->ListOptions->render("body", "right", $ivf_treatment_plan_preview->RowCnt);
?>
	</tr>
<?php
	$ivf_treatment_plan_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($ivf_treatment_plan_preview->TotalRecs > 0) { ?>
<?php if (!isset($ivf_treatment_plan_preview->Pager)) $ivf_treatment_plan_preview->Pager = new PrevNextPager($ivf_treatment_plan_preview->StartRec, $ivf_treatment_plan_preview->DisplayRecs, $ivf_treatment_plan_preview->TotalRecs) ?>
<?php if ($ivf_treatment_plan_preview->Pager->RecordCount > 0 && $ivf_treatment_plan_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($ivf_treatment_plan_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $ivf_treatment_plan_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($ivf_treatment_plan_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $ivf_treatment_plan_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($ivf_treatment_plan_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $ivf_treatment_plan_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($ivf_treatment_plan_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $ivf_treatment_plan_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_treatment_plan_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_treatment_plan_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_treatment_plan_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_treatment_plan_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$ivf_treatment_plan_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($ivf_treatment_plan_preview->Recordset)
	$ivf_treatment_plan_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$ivf_treatment_plan_preview->terminate();
?>