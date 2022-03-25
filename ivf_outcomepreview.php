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
$ivf_outcome_preview = new ivf_outcome_preview();

// Run the page
$ivf_outcome_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_outcome_preview->Page_Render();
?>
<?php $ivf_outcome_preview->showPageHeader(); ?>
<div class="card ew-grid ivf_outcome"><!-- .card -->
<?php if ($ivf_outcome_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_outcome_preview->renderListOptions();

// Render list options (header, left)
$ivf_outcome_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_outcome->id->Visible) { // id ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->id) == "") { ?>
		<th class="<?php echo $ivf_outcome->id->headerCellClass() ?>"><?php echo $ivf_outcome->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->id->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->id->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->id->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->RIDNO) == "") { ?>
		<th class="<?php echo $ivf_outcome->RIDNO->headerCellClass() ?>"><?php echo $ivf_outcome->RIDNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->RIDNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->RIDNO->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->RIDNO->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->RIDNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->RIDNO->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Name->Visible) { // Name ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->Name) == "") { ?>
		<th class="<?php echo $ivf_outcome->Name->headerCellClass() ?>"><?php echo $ivf_outcome->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->Name->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->Name->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->Name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->Name->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Age->Visible) { // Age ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->Age) == "") { ?>
		<th class="<?php echo $ivf_outcome->Age->headerCellClass() ?>"><?php echo $ivf_outcome->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->Age->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->Age->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->Age->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->treatment_status->Visible) { // treatment_status ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->treatment_status) == "") { ?>
		<th class="<?php echo $ivf_outcome->treatment_status->headerCellClass() ?>"><?php echo $ivf_outcome->treatment_status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->treatment_status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->treatment_status->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->treatment_status->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->treatment_status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->treatment_status->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->ARTCYCLE) == "") { ?>
		<th class="<?php echo $ivf_outcome->ARTCYCLE->headerCellClass() ?>"><?php echo $ivf_outcome->ARTCYCLE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->ARTCYCLE->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->ARTCYCLE->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->ARTCYCLE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->ARTCYCLE->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->RESULT->Visible) { // RESULT ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->RESULT) == "") { ?>
		<th class="<?php echo $ivf_outcome->RESULT->headerCellClass() ?>"><?php echo $ivf_outcome->RESULT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->RESULT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->RESULT->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->RESULT->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->RESULT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->RESULT->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->status->Visible) { // status ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->status) == "") { ?>
		<th class="<?php echo $ivf_outcome->status->headerCellClass() ?>"><?php echo $ivf_outcome->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->status->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->status->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->status->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->createdby->Visible) { // createdby ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->createdby) == "") { ?>
		<th class="<?php echo $ivf_outcome->createdby->headerCellClass() ?>"><?php echo $ivf_outcome->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->createdby->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->createdby->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->createdby->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->createddatetime) == "") { ?>
		<th class="<?php echo $ivf_outcome->createddatetime->headerCellClass() ?>"><?php echo $ivf_outcome->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->createddatetime->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->createddatetime->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->createddatetime->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->modifiedby) == "") { ?>
		<th class="<?php echo $ivf_outcome->modifiedby->headerCellClass() ?>"><?php echo $ivf_outcome->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->modifiedby->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->modifiedby->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->modifiedby->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->modifieddatetime) == "") { ?>
		<th class="<?php echo $ivf_outcome->modifieddatetime->headerCellClass() ?>"><?php echo $ivf_outcome->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->modifieddatetime->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->modifieddatetime->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->modifieddatetime->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->outcomeDate->Visible) { // outcomeDate ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->outcomeDate) == "") { ?>
		<th class="<?php echo $ivf_outcome->outcomeDate->headerCellClass() ?>"><?php echo $ivf_outcome->outcomeDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->outcomeDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->outcomeDate->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->outcomeDate->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->outcomeDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->outcomeDate->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->outcomeDay->Visible) { // outcomeDay ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->outcomeDay) == "") { ?>
		<th class="<?php echo $ivf_outcome->outcomeDay->headerCellClass() ?>"><?php echo $ivf_outcome->outcomeDay->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->outcomeDay->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->outcomeDay->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->outcomeDay->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->outcomeDay->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->outcomeDay->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->OPResult->Visible) { // OPResult ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->OPResult) == "") { ?>
		<th class="<?php echo $ivf_outcome->OPResult->headerCellClass() ?>"><?php echo $ivf_outcome->OPResult->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->OPResult->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->OPResult->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->OPResult->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->OPResult->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->OPResult->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Gestation->Visible) { // Gestation ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->Gestation) == "") { ?>
		<th class="<?php echo $ivf_outcome->Gestation->headerCellClass() ?>"><?php echo $ivf_outcome->Gestation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->Gestation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->Gestation->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->Gestation->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->Gestation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->Gestation->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->TransferdEmbryos) == "") { ?>
		<th class="<?php echo $ivf_outcome->TransferdEmbryos->headerCellClass() ?>"><?php echo $ivf_outcome->TransferdEmbryos->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->TransferdEmbryos->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->TransferdEmbryos->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->TransferdEmbryos->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->TransferdEmbryos->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->TransferdEmbryos->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->InitalOfSacs->Visible) { // InitalOfSacs ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->InitalOfSacs) == "") { ?>
		<th class="<?php echo $ivf_outcome->InitalOfSacs->headerCellClass() ?>"><?php echo $ivf_outcome->InitalOfSacs->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->InitalOfSacs->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->InitalOfSacs->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->InitalOfSacs->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->InitalOfSacs->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->InitalOfSacs->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->ImplimentationRate->Visible) { // ImplimentationRate ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->ImplimentationRate) == "") { ?>
		<th class="<?php echo $ivf_outcome->ImplimentationRate->headerCellClass() ?>"><?php echo $ivf_outcome->ImplimentationRate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->ImplimentationRate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->ImplimentationRate->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->ImplimentationRate->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->ImplimentationRate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->ImplimentationRate->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->EmbryoNo->Visible) { // EmbryoNo ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->EmbryoNo) == "") { ?>
		<th class="<?php echo $ivf_outcome->EmbryoNo->headerCellClass() ?>"><?php echo $ivf_outcome->EmbryoNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->EmbryoNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->EmbryoNo->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->EmbryoNo->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->EmbryoNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->EmbryoNo->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->ExtrauterineSac) == "") { ?>
		<th class="<?php echo $ivf_outcome->ExtrauterineSac->headerCellClass() ?>"><?php echo $ivf_outcome->ExtrauterineSac->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->ExtrauterineSac->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->ExtrauterineSac->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->ExtrauterineSac->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->ExtrauterineSac->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->ExtrauterineSac->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->PregnancyMonozygotic) == "") { ?>
		<th class="<?php echo $ivf_outcome->PregnancyMonozygotic->headerCellClass() ?>"><?php echo $ivf_outcome->PregnancyMonozygotic->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->PregnancyMonozygotic->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->PregnancyMonozygotic->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->PregnancyMonozygotic->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->PregnancyMonozygotic->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->PregnancyMonozygotic->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->TypeGestation->Visible) { // TypeGestation ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->TypeGestation) == "") { ?>
		<th class="<?php echo $ivf_outcome->TypeGestation->headerCellClass() ?>"><?php echo $ivf_outcome->TypeGestation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->TypeGestation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->TypeGestation->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->TypeGestation->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->TypeGestation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->TypeGestation->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Urine->Visible) { // Urine ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->Urine) == "") { ?>
		<th class="<?php echo $ivf_outcome->Urine->headerCellClass() ?>"><?php echo $ivf_outcome->Urine->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->Urine->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->Urine->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->Urine->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->Urine->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->Urine->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->PTdate->Visible) { // PTdate ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->PTdate) == "") { ?>
		<th class="<?php echo $ivf_outcome->PTdate->headerCellClass() ?>"><?php echo $ivf_outcome->PTdate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->PTdate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->PTdate->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->PTdate->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->PTdate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->PTdate->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Reduced->Visible) { // Reduced ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->Reduced) == "") { ?>
		<th class="<?php echo $ivf_outcome->Reduced->headerCellClass() ?>"><?php echo $ivf_outcome->Reduced->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->Reduced->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->Reduced->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->Reduced->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->Reduced->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->Reduced->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->INduced->Visible) { // INduced ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->INduced) == "") { ?>
		<th class="<?php echo $ivf_outcome->INduced->headerCellClass() ?>"><?php echo $ivf_outcome->INduced->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->INduced->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->INduced->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->INduced->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->INduced->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->INduced->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->INducedDate->Visible) { // INducedDate ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->INducedDate) == "") { ?>
		<th class="<?php echo $ivf_outcome->INducedDate->headerCellClass() ?>"><?php echo $ivf_outcome->INducedDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->INducedDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->INducedDate->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->INducedDate->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->INducedDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->INducedDate->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Miscarriage->Visible) { // Miscarriage ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->Miscarriage) == "") { ?>
		<th class="<?php echo $ivf_outcome->Miscarriage->headerCellClass() ?>"><?php echo $ivf_outcome->Miscarriage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->Miscarriage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->Miscarriage->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->Miscarriage->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->Miscarriage->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->Miscarriage->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Induced1->Visible) { // Induced1 ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->Induced1) == "") { ?>
		<th class="<?php echo $ivf_outcome->Induced1->headerCellClass() ?>"><?php echo $ivf_outcome->Induced1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->Induced1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->Induced1->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->Induced1->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->Induced1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->Induced1->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Type->Visible) { // Type ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->Type) == "") { ?>
		<th class="<?php echo $ivf_outcome->Type->headerCellClass() ?>"><?php echo $ivf_outcome->Type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->Type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->Type->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->Type->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->Type->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->Type->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->IfClinical->Visible) { // IfClinical ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->IfClinical) == "") { ?>
		<th class="<?php echo $ivf_outcome->IfClinical->headerCellClass() ?>"><?php echo $ivf_outcome->IfClinical->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->IfClinical->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->IfClinical->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->IfClinical->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->IfClinical->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->IfClinical->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->GADate->Visible) { // GADate ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->GADate) == "") { ?>
		<th class="<?php echo $ivf_outcome->GADate->headerCellClass() ?>"><?php echo $ivf_outcome->GADate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->GADate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->GADate->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->GADate->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->GADate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->GADate->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->GA->Visible) { // GA ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->GA) == "") { ?>
		<th class="<?php echo $ivf_outcome->GA->headerCellClass() ?>"><?php echo $ivf_outcome->GA->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->GA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->GA->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->GA->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->GA->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->GA->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->FoetalDeath->Visible) { // FoetalDeath ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->FoetalDeath) == "") { ?>
		<th class="<?php echo $ivf_outcome->FoetalDeath->headerCellClass() ?>"><?php echo $ivf_outcome->FoetalDeath->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->FoetalDeath->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->FoetalDeath->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->FoetalDeath->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->FoetalDeath->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->FoetalDeath->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->FerinatalDeath->Visible) { // FerinatalDeath ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->FerinatalDeath) == "") { ?>
		<th class="<?php echo $ivf_outcome->FerinatalDeath->headerCellClass() ?>"><?php echo $ivf_outcome->FerinatalDeath->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->FerinatalDeath->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->FerinatalDeath->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->FerinatalDeath->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->FerinatalDeath->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->FerinatalDeath->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->TidNo) == "") { ?>
		<th class="<?php echo $ivf_outcome->TidNo->headerCellClass() ?>"><?php echo $ivf_outcome->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->TidNo->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->TidNo->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->TidNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->TidNo->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Ectopic->Visible) { // Ectopic ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->Ectopic) == "") { ?>
		<th class="<?php echo $ivf_outcome->Ectopic->headerCellClass() ?>"><?php echo $ivf_outcome->Ectopic->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->Ectopic->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->Ectopic->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->Ectopic->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->Ectopic->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->Ectopic->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Extra->Visible) { // Extra ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->Extra) == "") { ?>
		<th class="<?php echo $ivf_outcome->Extra->headerCellClass() ?>"><?php echo $ivf_outcome->Extra->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->Extra->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->Extra->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->Extra->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->Extra->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->Extra->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Implantation->Visible) { // Implantation ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->Implantation) == "") { ?>
		<th class="<?php echo $ivf_outcome->Implantation->headerCellClass() ?>"><?php echo $ivf_outcome->Implantation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->Implantation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->Implantation->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->Implantation->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->Implantation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->Implantation->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->DeliveryDate->Visible) { // DeliveryDate ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome->DeliveryDate) == "") { ?>
		<th class="<?php echo $ivf_outcome->DeliveryDate->headerCellClass() ?>"><?php echo $ivf_outcome->DeliveryDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome->DeliveryDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_outcome->DeliveryDate->Name ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome->DeliveryDate->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_outcome->DeliveryDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome->DeliveryDate->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_outcome_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ivf_outcome_preview->RecCount = 0;
$ivf_outcome_preview->RowCnt = 0;
while ($ivf_outcome_preview->Recordset && !$ivf_outcome_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_outcome_preview->RecCount++;
	$ivf_outcome_preview->RowCnt++;
	$ivf_outcome_preview->CssStyle = "";
	$ivf_outcome_preview->loadListRowValues($ivf_outcome_preview->Recordset);

	// Render row
	$ivf_outcome_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_outcome_preview->resetAttributes();
	$ivf_outcome_preview->renderListRow();

	// Render list options
	$ivf_outcome_preview->renderListOptions();
?>
	<tr<?php echo $ivf_outcome_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_outcome_preview->ListOptions->render("body", "left", $ivf_outcome_preview->RowCnt);
?>
<?php if ($ivf_outcome->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_outcome->id->cellAttributes() ?>>
<span<?php echo $ivf_outcome->id->viewAttributes() ?>>
<?php echo $ivf_outcome->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->RIDNO->Visible) { // RIDNO ?>
		<!-- RIDNO -->
		<td<?php echo $ivf_outcome->RIDNO->cellAttributes() ?>>
<span<?php echo $ivf_outcome->RIDNO->viewAttributes() ?>>
<?php echo $ivf_outcome->RIDNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $ivf_outcome->Name->cellAttributes() ?>>
<span<?php echo $ivf_outcome->Name->viewAttributes() ?>>
<?php echo $ivf_outcome->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $ivf_outcome->Age->cellAttributes() ?>>
<span<?php echo $ivf_outcome->Age->viewAttributes() ?>>
<?php echo $ivf_outcome->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->treatment_status->Visible) { // treatment_status ?>
		<!-- treatment_status -->
		<td<?php echo $ivf_outcome->treatment_status->cellAttributes() ?>>
<span<?php echo $ivf_outcome->treatment_status->viewAttributes() ?>>
<?php echo $ivf_outcome->treatment_status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<!-- ARTCYCLE -->
		<td<?php echo $ivf_outcome->ARTCYCLE->cellAttributes() ?>>
<span<?php echo $ivf_outcome->ARTCYCLE->viewAttributes() ?>>
<?php echo $ivf_outcome->ARTCYCLE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->RESULT->Visible) { // RESULT ?>
		<!-- RESULT -->
		<td<?php echo $ivf_outcome->RESULT->cellAttributes() ?>>
<span<?php echo $ivf_outcome->RESULT->viewAttributes() ?>>
<?php echo $ivf_outcome->RESULT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $ivf_outcome->status->cellAttributes() ?>>
<span<?php echo $ivf_outcome->status->viewAttributes() ?>>
<?php echo $ivf_outcome->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $ivf_outcome->createdby->cellAttributes() ?>>
<span<?php echo $ivf_outcome->createdby->viewAttributes() ?>>
<?php echo $ivf_outcome->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $ivf_outcome->createddatetime->cellAttributes() ?>>
<span<?php echo $ivf_outcome->createddatetime->viewAttributes() ?>>
<?php echo $ivf_outcome->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $ivf_outcome->modifiedby->cellAttributes() ?>>
<span<?php echo $ivf_outcome->modifiedby->viewAttributes() ?>>
<?php echo $ivf_outcome->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $ivf_outcome->modifieddatetime->cellAttributes() ?>>
<span<?php echo $ivf_outcome->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_outcome->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->outcomeDate->Visible) { // outcomeDate ?>
		<!-- outcomeDate -->
		<td<?php echo $ivf_outcome->outcomeDate->cellAttributes() ?>>
<span<?php echo $ivf_outcome->outcomeDate->viewAttributes() ?>>
<?php echo $ivf_outcome->outcomeDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->outcomeDay->Visible) { // outcomeDay ?>
		<!-- outcomeDay -->
		<td<?php echo $ivf_outcome->outcomeDay->cellAttributes() ?>>
<span<?php echo $ivf_outcome->outcomeDay->viewAttributes() ?>>
<?php echo $ivf_outcome->outcomeDay->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->OPResult->Visible) { // OPResult ?>
		<!-- OPResult -->
		<td<?php echo $ivf_outcome->OPResult->cellAttributes() ?>>
<span<?php echo $ivf_outcome->OPResult->viewAttributes() ?>>
<?php echo $ivf_outcome->OPResult->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Gestation->Visible) { // Gestation ?>
		<!-- Gestation -->
		<td<?php echo $ivf_outcome->Gestation->cellAttributes() ?>>
<span<?php echo $ivf_outcome->Gestation->viewAttributes() ?>>
<?php echo $ivf_outcome->Gestation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
		<!-- TransferdEmbryos -->
		<td<?php echo $ivf_outcome->TransferdEmbryos->cellAttributes() ?>>
<span<?php echo $ivf_outcome->TransferdEmbryos->viewAttributes() ?>>
<?php echo $ivf_outcome->TransferdEmbryos->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->InitalOfSacs->Visible) { // InitalOfSacs ?>
		<!-- InitalOfSacs -->
		<td<?php echo $ivf_outcome->InitalOfSacs->cellAttributes() ?>>
<span<?php echo $ivf_outcome->InitalOfSacs->viewAttributes() ?>>
<?php echo $ivf_outcome->InitalOfSacs->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->ImplimentationRate->Visible) { // ImplimentationRate ?>
		<!-- ImplimentationRate -->
		<td<?php echo $ivf_outcome->ImplimentationRate->cellAttributes() ?>>
<span<?php echo $ivf_outcome->ImplimentationRate->viewAttributes() ?>>
<?php echo $ivf_outcome->ImplimentationRate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->EmbryoNo->Visible) { // EmbryoNo ?>
		<!-- EmbryoNo -->
		<td<?php echo $ivf_outcome->EmbryoNo->cellAttributes() ?>>
<span<?php echo $ivf_outcome->EmbryoNo->viewAttributes() ?>>
<?php echo $ivf_outcome->EmbryoNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
		<!-- ExtrauterineSac -->
		<td<?php echo $ivf_outcome->ExtrauterineSac->cellAttributes() ?>>
<span<?php echo $ivf_outcome->ExtrauterineSac->viewAttributes() ?>>
<?php echo $ivf_outcome->ExtrauterineSac->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
		<!-- PregnancyMonozygotic -->
		<td<?php echo $ivf_outcome->PregnancyMonozygotic->cellAttributes() ?>>
<span<?php echo $ivf_outcome->PregnancyMonozygotic->viewAttributes() ?>>
<?php echo $ivf_outcome->PregnancyMonozygotic->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->TypeGestation->Visible) { // TypeGestation ?>
		<!-- TypeGestation -->
		<td<?php echo $ivf_outcome->TypeGestation->cellAttributes() ?>>
<span<?php echo $ivf_outcome->TypeGestation->viewAttributes() ?>>
<?php echo $ivf_outcome->TypeGestation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Urine->Visible) { // Urine ?>
		<!-- Urine -->
		<td<?php echo $ivf_outcome->Urine->cellAttributes() ?>>
<span<?php echo $ivf_outcome->Urine->viewAttributes() ?>>
<?php echo $ivf_outcome->Urine->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->PTdate->Visible) { // PTdate ?>
		<!-- PTdate -->
		<td<?php echo $ivf_outcome->PTdate->cellAttributes() ?>>
<span<?php echo $ivf_outcome->PTdate->viewAttributes() ?>>
<?php echo $ivf_outcome->PTdate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Reduced->Visible) { // Reduced ?>
		<!-- Reduced -->
		<td<?php echo $ivf_outcome->Reduced->cellAttributes() ?>>
<span<?php echo $ivf_outcome->Reduced->viewAttributes() ?>>
<?php echo $ivf_outcome->Reduced->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->INduced->Visible) { // INduced ?>
		<!-- INduced -->
		<td<?php echo $ivf_outcome->INduced->cellAttributes() ?>>
<span<?php echo $ivf_outcome->INduced->viewAttributes() ?>>
<?php echo $ivf_outcome->INduced->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->INducedDate->Visible) { // INducedDate ?>
		<!-- INducedDate -->
		<td<?php echo $ivf_outcome->INducedDate->cellAttributes() ?>>
<span<?php echo $ivf_outcome->INducedDate->viewAttributes() ?>>
<?php echo $ivf_outcome->INducedDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Miscarriage->Visible) { // Miscarriage ?>
		<!-- Miscarriage -->
		<td<?php echo $ivf_outcome->Miscarriage->cellAttributes() ?>>
<span<?php echo $ivf_outcome->Miscarriage->viewAttributes() ?>>
<?php echo $ivf_outcome->Miscarriage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Induced1->Visible) { // Induced1 ?>
		<!-- Induced1 -->
		<td<?php echo $ivf_outcome->Induced1->cellAttributes() ?>>
<span<?php echo $ivf_outcome->Induced1->viewAttributes() ?>>
<?php echo $ivf_outcome->Induced1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Type->Visible) { // Type ?>
		<!-- Type -->
		<td<?php echo $ivf_outcome->Type->cellAttributes() ?>>
<span<?php echo $ivf_outcome->Type->viewAttributes() ?>>
<?php echo $ivf_outcome->Type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->IfClinical->Visible) { // IfClinical ?>
		<!-- IfClinical -->
		<td<?php echo $ivf_outcome->IfClinical->cellAttributes() ?>>
<span<?php echo $ivf_outcome->IfClinical->viewAttributes() ?>>
<?php echo $ivf_outcome->IfClinical->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->GADate->Visible) { // GADate ?>
		<!-- GADate -->
		<td<?php echo $ivf_outcome->GADate->cellAttributes() ?>>
<span<?php echo $ivf_outcome->GADate->viewAttributes() ?>>
<?php echo $ivf_outcome->GADate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->GA->Visible) { // GA ?>
		<!-- GA -->
		<td<?php echo $ivf_outcome->GA->cellAttributes() ?>>
<span<?php echo $ivf_outcome->GA->viewAttributes() ?>>
<?php echo $ivf_outcome->GA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->FoetalDeath->Visible) { // FoetalDeath ?>
		<!-- FoetalDeath -->
		<td<?php echo $ivf_outcome->FoetalDeath->cellAttributes() ?>>
<span<?php echo $ivf_outcome->FoetalDeath->viewAttributes() ?>>
<?php echo $ivf_outcome->FoetalDeath->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->FerinatalDeath->Visible) { // FerinatalDeath ?>
		<!-- FerinatalDeath -->
		<td<?php echo $ivf_outcome->FerinatalDeath->cellAttributes() ?>>
<span<?php echo $ivf_outcome->FerinatalDeath->viewAttributes() ?>>
<?php echo $ivf_outcome->FerinatalDeath->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_outcome->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_outcome->TidNo->viewAttributes() ?>>
<?php echo $ivf_outcome->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Ectopic->Visible) { // Ectopic ?>
		<!-- Ectopic -->
		<td<?php echo $ivf_outcome->Ectopic->cellAttributes() ?>>
<span<?php echo $ivf_outcome->Ectopic->viewAttributes() ?>>
<?php echo $ivf_outcome->Ectopic->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Extra->Visible) { // Extra ?>
		<!-- Extra -->
		<td<?php echo $ivf_outcome->Extra->cellAttributes() ?>>
<span<?php echo $ivf_outcome->Extra->viewAttributes() ?>>
<?php echo $ivf_outcome->Extra->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Implantation->Visible) { // Implantation ?>
		<!-- Implantation -->
		<td<?php echo $ivf_outcome->Implantation->cellAttributes() ?>>
<span<?php echo $ivf_outcome->Implantation->viewAttributes() ?>>
<?php echo $ivf_outcome->Implantation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome->DeliveryDate->Visible) { // DeliveryDate ?>
		<!-- DeliveryDate -->
		<td<?php echo $ivf_outcome->DeliveryDate->cellAttributes() ?>>
<span<?php echo $ivf_outcome->DeliveryDate->viewAttributes() ?>>
<?php echo $ivf_outcome->DeliveryDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_outcome_preview->ListOptions->render("body", "right", $ivf_outcome_preview->RowCnt);
?>
	</tr>
<?php
	$ivf_outcome_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($ivf_outcome_preview->TotalRecs > 0) { ?>
<?php if (!isset($ivf_outcome_preview->Pager)) $ivf_outcome_preview->Pager = new PrevNextPager($ivf_outcome_preview->StartRec, $ivf_outcome_preview->DisplayRecs, $ivf_outcome_preview->TotalRecs) ?>
<?php if ($ivf_outcome_preview->Pager->RecordCount > 0 && $ivf_outcome_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($ivf_outcome_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $ivf_outcome_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($ivf_outcome_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $ivf_outcome_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($ivf_outcome_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $ivf_outcome_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($ivf_outcome_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $ivf_outcome_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_outcome_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_outcome_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_outcome_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_outcome_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$ivf_outcome_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($ivf_outcome_preview->Recordset)
	$ivf_outcome_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$ivf_outcome_preview->terminate();
?>