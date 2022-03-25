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
<?php if ($ivf_treatment_plan_preview->TotalRecords > 0) { ?>
<div class="card ew-grid ivf_treatment_plan"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_treatment_plan_preview->renderListOptions();

// Render list options (header, left)
$ivf_treatment_plan_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_treatment_plan_preview->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->TreatmentStartDate) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->TreatmentStartDate->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->TreatmentStartDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->TreatmentStartDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->TreatmentStartDate->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->TreatmentStartDate->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->TreatmentStartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->TreatmentStartDate->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->treatment_status->Visible) { // treatment_status ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->treatment_status) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->treatment_status->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->treatment_status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->treatment_status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->treatment_status->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->treatment_status->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->treatment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->treatment_status->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->ARTCYCLE) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->ARTCYCLE->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->ARTCYCLE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->ARTCYCLE->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->ARTCYCLE->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->ARTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->ARTCYCLE->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->IVFCycleNO->Visible) { // IVFCycleNO ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->IVFCycleNO) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->IVFCycleNO->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->IVFCycleNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->IVFCycleNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->IVFCycleNO->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->IVFCycleNO->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->IVFCycleNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->IVFCycleNO->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->Treatment->Visible) { // Treatment ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->Treatment) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->Treatment->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->Treatment->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->Treatment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->Treatment->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->Treatment->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->Treatment->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->Treatment->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->TreatmentTec->Visible) { // TreatmentTec ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->TreatmentTec) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->TreatmentTec->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->TreatmentTec->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->TreatmentTec->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->TreatmentTec->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->TreatmentTec->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->TreatmentTec->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->TreatmentTec->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->TypeOfCycle) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->TypeOfCycle->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->TypeOfCycle->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->TypeOfCycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->TypeOfCycle->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->TypeOfCycle->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->TypeOfCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->TypeOfCycle->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->SpermOrgin->Visible) { // SpermOrgin ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->SpermOrgin) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->SpermOrgin->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->SpermOrgin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->SpermOrgin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->SpermOrgin->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->SpermOrgin->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->SpermOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->SpermOrgin->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->State->Visible) { // State ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->State) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->State->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->State->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->State->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->State->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->State->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->State->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->State->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->Origin->Visible) { // Origin ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->Origin) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->Origin->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->Origin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->Origin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->Origin->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->Origin->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->Origin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->Origin->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->MACS->Visible) { // MACS ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->MACS) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->MACS->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->MACS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->MACS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->MACS->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->MACS->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->MACS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->MACS->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->Technique->Visible) { // Technique ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->Technique) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->Technique->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->Technique->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->Technique->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->Technique->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->Technique->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->Technique->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->Technique->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->PgdPlanning->Visible) { // PgdPlanning ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->PgdPlanning) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->PgdPlanning->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->PgdPlanning->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->PgdPlanning->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->PgdPlanning->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->PgdPlanning->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->PgdPlanning->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->PgdPlanning->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->IMSI->Visible) { // IMSI ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->IMSI) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->IMSI->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->IMSI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->IMSI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->IMSI->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->IMSI->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->IMSI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->IMSI->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->SequentialCulture->Visible) { // SequentialCulture ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->SequentialCulture) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->SequentialCulture->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->SequentialCulture->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->SequentialCulture->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->SequentialCulture->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->SequentialCulture->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->SequentialCulture->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->SequentialCulture->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->TimeLapse->Visible) { // TimeLapse ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->TimeLapse) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->TimeLapse->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->TimeLapse->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->TimeLapse->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->TimeLapse->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->TimeLapse->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->TimeLapse->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->TimeLapse->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->AH->Visible) { // AH ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->AH) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->AH->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->AH->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->AH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->AH->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->AH->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->AH->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->AH->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->Weight->Visible) { // Weight ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->Weight) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->Weight->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->Weight->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->Weight->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->Weight->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->Weight->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->Weight->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->Weight->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->BMI->Visible) { // BMI ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->BMI) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->BMI->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->BMI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->BMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->BMI->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->BMI->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->BMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->BMI->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->MaleIndications->Visible) { // MaleIndications ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->MaleIndications) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->MaleIndications->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->MaleIndications->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->MaleIndications->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->MaleIndications->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->MaleIndications->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->MaleIndications->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->MaleIndications->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->FemaleIndications->Visible) { // FemaleIndications ?>
	<?php if ($ivf_treatment_plan->SortUrl($ivf_treatment_plan_preview->FemaleIndications) == "") { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->FemaleIndications->headerCellClass() ?>"><?php echo $ivf_treatment_plan_preview->FemaleIndications->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_treatment_plan_preview->FemaleIndications->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_treatment_plan_preview->FemaleIndications->Name) ?>" data-sort-order="<?php echo $ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->FemaleIndications->Name && $ivf_treatment_plan_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_preview->FemaleIndications->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_preview->SortField == $ivf_treatment_plan_preview->FemaleIndications->Name) { ?><?php if ($ivf_treatment_plan_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$ivf_treatment_plan_preview->RowCount = 0;
while ($ivf_treatment_plan_preview->Recordset && !$ivf_treatment_plan_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_treatment_plan_preview->RecCount++;
	$ivf_treatment_plan_preview->RowCount++;
	$ivf_treatment_plan_preview->CssStyle = "";
	$ivf_treatment_plan_preview->loadListRowValues($ivf_treatment_plan_preview->Recordset);

	// Render row
	$ivf_treatment_plan->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_treatment_plan_preview->resetAttributes();
	$ivf_treatment_plan_preview->renderListRow();

	// Render list options
	$ivf_treatment_plan_preview->renderListOptions();
?>
	<tr <?php echo $ivf_treatment_plan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_treatment_plan_preview->ListOptions->render("body", "left", $ivf_treatment_plan_preview->RowCount);
?>
<?php if ($ivf_treatment_plan_preview->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<!-- TreatmentStartDate -->
		<td<?php echo $ivf_treatment_plan_preview->TreatmentStartDate->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->TreatmentStartDate->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->TreatmentStartDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->treatment_status->Visible) { // treatment_status ?>
		<!-- treatment_status -->
		<td<?php echo $ivf_treatment_plan_preview->treatment_status->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->treatment_status->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->treatment_status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<!-- ARTCYCLE -->
		<td<?php echo $ivf_treatment_plan_preview->ARTCYCLE->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->ARTCYCLE->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->ARTCYCLE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->IVFCycleNO->Visible) { // IVFCycleNO ?>
		<!-- IVFCycleNO -->
		<td<?php echo $ivf_treatment_plan_preview->IVFCycleNO->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->IVFCycleNO->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->IVFCycleNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->Treatment->Visible) { // Treatment ?>
		<!-- Treatment -->
		<td<?php echo $ivf_treatment_plan_preview->Treatment->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->Treatment->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->Treatment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->TreatmentTec->Visible) { // TreatmentTec ?>
		<!-- TreatmentTec -->
		<td<?php echo $ivf_treatment_plan_preview->TreatmentTec->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->TreatmentTec->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->TreatmentTec->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<!-- TypeOfCycle -->
		<td<?php echo $ivf_treatment_plan_preview->TypeOfCycle->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->TypeOfCycle->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->TypeOfCycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->SpermOrgin->Visible) { // SpermOrgin ?>
		<!-- SpermOrgin -->
		<td<?php echo $ivf_treatment_plan_preview->SpermOrgin->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->SpermOrgin->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->SpermOrgin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->State->Visible) { // State ?>
		<!-- State -->
		<td<?php echo $ivf_treatment_plan_preview->State->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->State->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->State->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->Origin->Visible) { // Origin ?>
		<!-- Origin -->
		<td<?php echo $ivf_treatment_plan_preview->Origin->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->Origin->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->Origin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->MACS->Visible) { // MACS ?>
		<!-- MACS -->
		<td<?php echo $ivf_treatment_plan_preview->MACS->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->MACS->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->MACS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->Technique->Visible) { // Technique ?>
		<!-- Technique -->
		<td<?php echo $ivf_treatment_plan_preview->Technique->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->Technique->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->Technique->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->PgdPlanning->Visible) { // PgdPlanning ?>
		<!-- PgdPlanning -->
		<td<?php echo $ivf_treatment_plan_preview->PgdPlanning->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->PgdPlanning->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->PgdPlanning->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->IMSI->Visible) { // IMSI ?>
		<!-- IMSI -->
		<td<?php echo $ivf_treatment_plan_preview->IMSI->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->IMSI->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->IMSI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->SequentialCulture->Visible) { // SequentialCulture ?>
		<!-- SequentialCulture -->
		<td<?php echo $ivf_treatment_plan_preview->SequentialCulture->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->SequentialCulture->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->SequentialCulture->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->TimeLapse->Visible) { // TimeLapse ?>
		<!-- TimeLapse -->
		<td<?php echo $ivf_treatment_plan_preview->TimeLapse->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->TimeLapse->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->TimeLapse->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->AH->Visible) { // AH ?>
		<!-- AH -->
		<td<?php echo $ivf_treatment_plan_preview->AH->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->AH->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->AH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->Weight->Visible) { // Weight ?>
		<!-- Weight -->
		<td<?php echo $ivf_treatment_plan_preview->Weight->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->Weight->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->Weight->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->BMI->Visible) { // BMI ?>
		<!-- BMI -->
		<td<?php echo $ivf_treatment_plan_preview->BMI->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->BMI->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->BMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->MaleIndications->Visible) { // MaleIndications ?>
		<!-- MaleIndications -->
		<td<?php echo $ivf_treatment_plan_preview->MaleIndications->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->MaleIndications->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->MaleIndications->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_preview->FemaleIndications->Visible) { // FemaleIndications ?>
		<!-- FemaleIndications -->
		<td<?php echo $ivf_treatment_plan_preview->FemaleIndications->cellAttributes() ?>>
<span<?php echo $ivf_treatment_plan_preview->FemaleIndications->viewAttributes() ?>><?php echo $ivf_treatment_plan_preview->FemaleIndications->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_treatment_plan_preview->ListOptions->render("body", "right", $ivf_treatment_plan_preview->RowCount);
?>
	</tr>
<?php
	$ivf_treatment_plan_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $ivf_treatment_plan_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_treatment_plan_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($ivf_treatment_plan_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$ivf_treatment_plan_preview->showPageFooter();
if (Config("DEBUG"))
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