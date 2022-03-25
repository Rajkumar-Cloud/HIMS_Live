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
<?php if ($ivf_outcome_preview->TotalRecords > 0) { ?>
<div class="card ew-grid ivf_outcome"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_outcome_preview->renderListOptions();

// Render list options (header, left)
$ivf_outcome_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_outcome_preview->id->Visible) { // id ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->id) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->id->headerCellClass() ?>"><?php echo $ivf_outcome_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->id->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->id->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->id->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->RIDNO) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->RIDNO->headerCellClass() ?>"><?php echo $ivf_outcome_preview->RIDNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->RIDNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->RIDNO->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->RIDNO->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->RIDNO->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->Name->Visible) { // Name ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->Name) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->Name->headerCellClass() ?>"><?php echo $ivf_outcome_preview->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->Name->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->Name->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->Name->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->Age->Visible) { // Age ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->Age) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->Age->headerCellClass() ?>"><?php echo $ivf_outcome_preview->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->Age->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->Age->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->Age->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->treatment_status->Visible) { // treatment_status ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->treatment_status) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->treatment_status->headerCellClass() ?>"><?php echo $ivf_outcome_preview->treatment_status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->treatment_status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->treatment_status->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->treatment_status->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->treatment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->treatment_status->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->ARTCYCLE) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->ARTCYCLE->headerCellClass() ?>"><?php echo $ivf_outcome_preview->ARTCYCLE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->ARTCYCLE->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->ARTCYCLE->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->ARTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->ARTCYCLE->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->RESULT->Visible) { // RESULT ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->RESULT) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->RESULT->headerCellClass() ?>"><?php echo $ivf_outcome_preview->RESULT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->RESULT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->RESULT->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->RESULT->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->RESULT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->RESULT->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->status->Visible) { // status ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->status) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->status->headerCellClass() ?>"><?php echo $ivf_outcome_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->status->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->status->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->status->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->createdby->Visible) { // createdby ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->createdby) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->createdby->headerCellClass() ?>"><?php echo $ivf_outcome_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->createdby->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->createdby->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->createdby->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->createddatetime) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->createddatetime->headerCellClass() ?>"><?php echo $ivf_outcome_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->createddatetime->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->createddatetime->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->modifiedby) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->modifiedby->headerCellClass() ?>"><?php echo $ivf_outcome_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->modifiedby->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->modifiedby->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->modifieddatetime->headerCellClass() ?>"><?php echo $ivf_outcome_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->modifieddatetime->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->modifieddatetime->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->outcomeDate->Visible) { // outcomeDate ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->outcomeDate) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->outcomeDate->headerCellClass() ?>"><?php echo $ivf_outcome_preview->outcomeDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->outcomeDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->outcomeDate->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->outcomeDate->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->outcomeDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->outcomeDate->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->outcomeDay->Visible) { // outcomeDay ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->outcomeDay) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->outcomeDay->headerCellClass() ?>"><?php echo $ivf_outcome_preview->outcomeDay->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->outcomeDay->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->outcomeDay->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->outcomeDay->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->outcomeDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->outcomeDay->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->OPResult->Visible) { // OPResult ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->OPResult) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->OPResult->headerCellClass() ?>"><?php echo $ivf_outcome_preview->OPResult->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->OPResult->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->OPResult->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->OPResult->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->OPResult->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->OPResult->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->Gestation->Visible) { // Gestation ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->Gestation) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->Gestation->headerCellClass() ?>"><?php echo $ivf_outcome_preview->Gestation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->Gestation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->Gestation->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->Gestation->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->Gestation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->Gestation->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->TransferdEmbryos) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->TransferdEmbryos->headerCellClass() ?>"><?php echo $ivf_outcome_preview->TransferdEmbryos->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->TransferdEmbryos->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->TransferdEmbryos->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->TransferdEmbryos->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->TransferdEmbryos->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->TransferdEmbryos->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->InitalOfSacs->Visible) { // InitalOfSacs ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->InitalOfSacs) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->InitalOfSacs->headerCellClass() ?>"><?php echo $ivf_outcome_preview->InitalOfSacs->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->InitalOfSacs->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->InitalOfSacs->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->InitalOfSacs->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->InitalOfSacs->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->InitalOfSacs->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->ImplimentationRate->Visible) { // ImplimentationRate ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->ImplimentationRate) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->ImplimentationRate->headerCellClass() ?>"><?php echo $ivf_outcome_preview->ImplimentationRate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->ImplimentationRate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->ImplimentationRate->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->ImplimentationRate->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->ImplimentationRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->ImplimentationRate->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->EmbryoNo->Visible) { // EmbryoNo ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->EmbryoNo) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->EmbryoNo->headerCellClass() ?>"><?php echo $ivf_outcome_preview->EmbryoNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->EmbryoNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->EmbryoNo->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->EmbryoNo->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->EmbryoNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->EmbryoNo->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->ExtrauterineSac) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->ExtrauterineSac->headerCellClass() ?>"><?php echo $ivf_outcome_preview->ExtrauterineSac->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->ExtrauterineSac->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->ExtrauterineSac->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->ExtrauterineSac->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->ExtrauterineSac->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->ExtrauterineSac->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->PregnancyMonozygotic) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->PregnancyMonozygotic->headerCellClass() ?>"><?php echo $ivf_outcome_preview->PregnancyMonozygotic->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->PregnancyMonozygotic->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->PregnancyMonozygotic->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->PregnancyMonozygotic->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->PregnancyMonozygotic->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->PregnancyMonozygotic->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->TypeGestation->Visible) { // TypeGestation ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->TypeGestation) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->TypeGestation->headerCellClass() ?>"><?php echo $ivf_outcome_preview->TypeGestation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->TypeGestation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->TypeGestation->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->TypeGestation->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->TypeGestation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->TypeGestation->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->Urine->Visible) { // Urine ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->Urine) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->Urine->headerCellClass() ?>"><?php echo $ivf_outcome_preview->Urine->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->Urine->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->Urine->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->Urine->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->Urine->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->Urine->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->PTdate->Visible) { // PTdate ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->PTdate) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->PTdate->headerCellClass() ?>"><?php echo $ivf_outcome_preview->PTdate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->PTdate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->PTdate->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->PTdate->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->PTdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->PTdate->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->Reduced->Visible) { // Reduced ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->Reduced) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->Reduced->headerCellClass() ?>"><?php echo $ivf_outcome_preview->Reduced->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->Reduced->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->Reduced->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->Reduced->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->Reduced->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->Reduced->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->INduced->Visible) { // INduced ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->INduced) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->INduced->headerCellClass() ?>"><?php echo $ivf_outcome_preview->INduced->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->INduced->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->INduced->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->INduced->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->INduced->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->INduced->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->INducedDate->Visible) { // INducedDate ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->INducedDate) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->INducedDate->headerCellClass() ?>"><?php echo $ivf_outcome_preview->INducedDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->INducedDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->INducedDate->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->INducedDate->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->INducedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->INducedDate->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->Miscarriage->Visible) { // Miscarriage ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->Miscarriage) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->Miscarriage->headerCellClass() ?>"><?php echo $ivf_outcome_preview->Miscarriage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->Miscarriage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->Miscarriage->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->Miscarriage->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->Miscarriage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->Miscarriage->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->Induced1->Visible) { // Induced1 ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->Induced1) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->Induced1->headerCellClass() ?>"><?php echo $ivf_outcome_preview->Induced1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->Induced1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->Induced1->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->Induced1->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->Induced1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->Induced1->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->Type->Visible) { // Type ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->Type) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->Type->headerCellClass() ?>"><?php echo $ivf_outcome_preview->Type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->Type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->Type->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->Type->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->Type->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->IfClinical->Visible) { // IfClinical ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->IfClinical) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->IfClinical->headerCellClass() ?>"><?php echo $ivf_outcome_preview->IfClinical->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->IfClinical->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->IfClinical->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->IfClinical->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->IfClinical->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->IfClinical->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->GADate->Visible) { // GADate ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->GADate) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->GADate->headerCellClass() ?>"><?php echo $ivf_outcome_preview->GADate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->GADate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->GADate->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->GADate->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->GADate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->GADate->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->GA->Visible) { // GA ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->GA) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->GA->headerCellClass() ?>"><?php echo $ivf_outcome_preview->GA->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->GA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->GA->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->GA->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->GA->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->GA->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->FoetalDeath->Visible) { // FoetalDeath ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->FoetalDeath) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->FoetalDeath->headerCellClass() ?>"><?php echo $ivf_outcome_preview->FoetalDeath->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->FoetalDeath->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->FoetalDeath->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->FoetalDeath->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->FoetalDeath->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->FoetalDeath->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->FerinatalDeath->Visible) { // FerinatalDeath ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->FerinatalDeath) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->FerinatalDeath->headerCellClass() ?>"><?php echo $ivf_outcome_preview->FerinatalDeath->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->FerinatalDeath->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->FerinatalDeath->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->FerinatalDeath->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->FerinatalDeath->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->FerinatalDeath->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->TidNo) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->TidNo->headerCellClass() ?>"><?php echo $ivf_outcome_preview->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->TidNo->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->TidNo->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->TidNo->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->Ectopic->Visible) { // Ectopic ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->Ectopic) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->Ectopic->headerCellClass() ?>"><?php echo $ivf_outcome_preview->Ectopic->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->Ectopic->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->Ectopic->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->Ectopic->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->Ectopic->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->Ectopic->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_preview->Extra->Visible) { // Extra ?>
	<?php if ($ivf_outcome->SortUrl($ivf_outcome_preview->Extra) == "") { ?>
		<th class="<?php echo $ivf_outcome_preview->Extra->headerCellClass() ?>"><?php echo $ivf_outcome_preview->Extra->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_outcome_preview->Extra->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_outcome_preview->Extra->Name) ?>" data-sort-order="<?php echo $ivf_outcome_preview->SortField == $ivf_outcome_preview->Extra->Name && $ivf_outcome_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_preview->Extra->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_preview->SortField == $ivf_outcome_preview->Extra->Name) { ?><?php if ($ivf_outcome_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$ivf_outcome_preview->RowCount = 0;
while ($ivf_outcome_preview->Recordset && !$ivf_outcome_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_outcome_preview->RecCount++;
	$ivf_outcome_preview->RowCount++;
	$ivf_outcome_preview->CssStyle = "";
	$ivf_outcome_preview->loadListRowValues($ivf_outcome_preview->Recordset);

	// Render row
	$ivf_outcome->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_outcome_preview->resetAttributes();
	$ivf_outcome_preview->renderListRow();

	// Render list options
	$ivf_outcome_preview->renderListOptions();
?>
	<tr <?php echo $ivf_outcome->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_outcome_preview->ListOptions->render("body", "left", $ivf_outcome_preview->RowCount);
?>
<?php if ($ivf_outcome_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_outcome_preview->id->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->id->viewAttributes() ?>><?php echo $ivf_outcome_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->RIDNO->Visible) { // RIDNO ?>
		<!-- RIDNO -->
		<td<?php echo $ivf_outcome_preview->RIDNO->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->RIDNO->viewAttributes() ?>><?php echo $ivf_outcome_preview->RIDNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $ivf_outcome_preview->Name->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->Name->viewAttributes() ?>><?php echo $ivf_outcome_preview->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $ivf_outcome_preview->Age->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->Age->viewAttributes() ?>><?php echo $ivf_outcome_preview->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->treatment_status->Visible) { // treatment_status ?>
		<!-- treatment_status -->
		<td<?php echo $ivf_outcome_preview->treatment_status->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->treatment_status->viewAttributes() ?>><?php echo $ivf_outcome_preview->treatment_status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<!-- ARTCYCLE -->
		<td<?php echo $ivf_outcome_preview->ARTCYCLE->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->ARTCYCLE->viewAttributes() ?>><?php echo $ivf_outcome_preview->ARTCYCLE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->RESULT->Visible) { // RESULT ?>
		<!-- RESULT -->
		<td<?php echo $ivf_outcome_preview->RESULT->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->RESULT->viewAttributes() ?>><?php echo $ivf_outcome_preview->RESULT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $ivf_outcome_preview->status->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->status->viewAttributes() ?>><?php echo $ivf_outcome_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $ivf_outcome_preview->createdby->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->createdby->viewAttributes() ?>><?php echo $ivf_outcome_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $ivf_outcome_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->createddatetime->viewAttributes() ?>><?php echo $ivf_outcome_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $ivf_outcome_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->modifiedby->viewAttributes() ?>><?php echo $ivf_outcome_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $ivf_outcome_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->modifieddatetime->viewAttributes() ?>><?php echo $ivf_outcome_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->outcomeDate->Visible) { // outcomeDate ?>
		<!-- outcomeDate -->
		<td<?php echo $ivf_outcome_preview->outcomeDate->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->outcomeDate->viewAttributes() ?>><?php echo $ivf_outcome_preview->outcomeDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->outcomeDay->Visible) { // outcomeDay ?>
		<!-- outcomeDay -->
		<td<?php echo $ivf_outcome_preview->outcomeDay->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->outcomeDay->viewAttributes() ?>><?php echo $ivf_outcome_preview->outcomeDay->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->OPResult->Visible) { // OPResult ?>
		<!-- OPResult -->
		<td<?php echo $ivf_outcome_preview->OPResult->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->OPResult->viewAttributes() ?>><?php echo $ivf_outcome_preview->OPResult->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->Gestation->Visible) { // Gestation ?>
		<!-- Gestation -->
		<td<?php echo $ivf_outcome_preview->Gestation->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->Gestation->viewAttributes() ?>><?php echo $ivf_outcome_preview->Gestation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
		<!-- TransferdEmbryos -->
		<td<?php echo $ivf_outcome_preview->TransferdEmbryos->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->TransferdEmbryos->viewAttributes() ?>><?php echo $ivf_outcome_preview->TransferdEmbryos->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->InitalOfSacs->Visible) { // InitalOfSacs ?>
		<!-- InitalOfSacs -->
		<td<?php echo $ivf_outcome_preview->InitalOfSacs->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->InitalOfSacs->viewAttributes() ?>><?php echo $ivf_outcome_preview->InitalOfSacs->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->ImplimentationRate->Visible) { // ImplimentationRate ?>
		<!-- ImplimentationRate -->
		<td<?php echo $ivf_outcome_preview->ImplimentationRate->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->ImplimentationRate->viewAttributes() ?>><?php echo $ivf_outcome_preview->ImplimentationRate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->EmbryoNo->Visible) { // EmbryoNo ?>
		<!-- EmbryoNo -->
		<td<?php echo $ivf_outcome_preview->EmbryoNo->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->EmbryoNo->viewAttributes() ?>><?php echo $ivf_outcome_preview->EmbryoNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
		<!-- ExtrauterineSac -->
		<td<?php echo $ivf_outcome_preview->ExtrauterineSac->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->ExtrauterineSac->viewAttributes() ?>><?php echo $ivf_outcome_preview->ExtrauterineSac->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
		<!-- PregnancyMonozygotic -->
		<td<?php echo $ivf_outcome_preview->PregnancyMonozygotic->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->PregnancyMonozygotic->viewAttributes() ?>><?php echo $ivf_outcome_preview->PregnancyMonozygotic->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->TypeGestation->Visible) { // TypeGestation ?>
		<!-- TypeGestation -->
		<td<?php echo $ivf_outcome_preview->TypeGestation->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->TypeGestation->viewAttributes() ?>><?php echo $ivf_outcome_preview->TypeGestation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->Urine->Visible) { // Urine ?>
		<!-- Urine -->
		<td<?php echo $ivf_outcome_preview->Urine->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->Urine->viewAttributes() ?>><?php echo $ivf_outcome_preview->Urine->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->PTdate->Visible) { // PTdate ?>
		<!-- PTdate -->
		<td<?php echo $ivf_outcome_preview->PTdate->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->PTdate->viewAttributes() ?>><?php echo $ivf_outcome_preview->PTdate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->Reduced->Visible) { // Reduced ?>
		<!-- Reduced -->
		<td<?php echo $ivf_outcome_preview->Reduced->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->Reduced->viewAttributes() ?>><?php echo $ivf_outcome_preview->Reduced->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->INduced->Visible) { // INduced ?>
		<!-- INduced -->
		<td<?php echo $ivf_outcome_preview->INduced->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->INduced->viewAttributes() ?>><?php echo $ivf_outcome_preview->INduced->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->INducedDate->Visible) { // INducedDate ?>
		<!-- INducedDate -->
		<td<?php echo $ivf_outcome_preview->INducedDate->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->INducedDate->viewAttributes() ?>><?php echo $ivf_outcome_preview->INducedDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->Miscarriage->Visible) { // Miscarriage ?>
		<!-- Miscarriage -->
		<td<?php echo $ivf_outcome_preview->Miscarriage->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->Miscarriage->viewAttributes() ?>><?php echo $ivf_outcome_preview->Miscarriage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->Induced1->Visible) { // Induced1 ?>
		<!-- Induced1 -->
		<td<?php echo $ivf_outcome_preview->Induced1->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->Induced1->viewAttributes() ?>><?php echo $ivf_outcome_preview->Induced1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->Type->Visible) { // Type ?>
		<!-- Type -->
		<td<?php echo $ivf_outcome_preview->Type->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->Type->viewAttributes() ?>><?php echo $ivf_outcome_preview->Type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->IfClinical->Visible) { // IfClinical ?>
		<!-- IfClinical -->
		<td<?php echo $ivf_outcome_preview->IfClinical->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->IfClinical->viewAttributes() ?>><?php echo $ivf_outcome_preview->IfClinical->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->GADate->Visible) { // GADate ?>
		<!-- GADate -->
		<td<?php echo $ivf_outcome_preview->GADate->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->GADate->viewAttributes() ?>><?php echo $ivf_outcome_preview->GADate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->GA->Visible) { // GA ?>
		<!-- GA -->
		<td<?php echo $ivf_outcome_preview->GA->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->GA->viewAttributes() ?>><?php echo $ivf_outcome_preview->GA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->FoetalDeath->Visible) { // FoetalDeath ?>
		<!-- FoetalDeath -->
		<td<?php echo $ivf_outcome_preview->FoetalDeath->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->FoetalDeath->viewAttributes() ?>><?php echo $ivf_outcome_preview->FoetalDeath->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->FerinatalDeath->Visible) { // FerinatalDeath ?>
		<!-- FerinatalDeath -->
		<td<?php echo $ivf_outcome_preview->FerinatalDeath->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->FerinatalDeath->viewAttributes() ?>><?php echo $ivf_outcome_preview->FerinatalDeath->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_outcome_preview->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->TidNo->viewAttributes() ?>><?php echo $ivf_outcome_preview->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->Ectopic->Visible) { // Ectopic ?>
		<!-- Ectopic -->
		<td<?php echo $ivf_outcome_preview->Ectopic->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->Ectopic->viewAttributes() ?>><?php echo $ivf_outcome_preview->Ectopic->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_outcome_preview->Extra->Visible) { // Extra ?>
		<!-- Extra -->
		<td<?php echo $ivf_outcome_preview->Extra->cellAttributes() ?>>
<span<?php echo $ivf_outcome_preview->Extra->viewAttributes() ?>><?php echo $ivf_outcome_preview->Extra->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_outcome_preview->ListOptions->render("body", "right", $ivf_outcome_preview->RowCount);
?>
	</tr>
<?php
	$ivf_outcome_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $ivf_outcome_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_outcome_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($ivf_outcome_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$ivf_outcome_preview->showPageFooter();
if (Config("DEBUG"))
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