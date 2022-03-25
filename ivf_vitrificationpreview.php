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
$ivf_vitrification_preview = new ivf_vitrification_preview();

// Run the page
$ivf_vitrification_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitrification_preview->Page_Render();
?>
<?php $ivf_vitrification_preview->showPageHeader(); ?>
<div class="card ew-grid ivf_vitrification"><!-- .card -->
<?php if ($ivf_vitrification_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_vitrification_preview->renderListOptions();

// Render list options (header, left)
$ivf_vitrification_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_vitrification->vitrificationDate->Visible) { // vitrificationDate ?>
	<?php if ($ivf_vitrification->SortUrl($ivf_vitrification->vitrificationDate) == "") { ?>
		<th class="<?php echo $ivf_vitrification->vitrificationDate->headerCellClass() ?>"><?php echo $ivf_vitrification->vitrificationDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitrification->vitrificationDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitrification->vitrificationDate->Name ?>" data-sort-order="<?php echo $ivf_vitrification_preview->SortField == $ivf_vitrification->vitrificationDate->Name && $ivf_vitrification_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitrification->vitrificationDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitrification_preview->SortField == $ivf_vitrification->vitrificationDate->Name) { ?><?php if ($ivf_vitrification_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitrification_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<?php if ($ivf_vitrification->SortUrl($ivf_vitrification->PrimaryEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_vitrification->PrimaryEmbryologist->headerCellClass() ?>"><?php echo $ivf_vitrification->PrimaryEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitrification->PrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitrification->PrimaryEmbryologist->Name ?>" data-sort-order="<?php echo $ivf_vitrification_preview->SortField == $ivf_vitrification->PrimaryEmbryologist->Name && $ivf_vitrification_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitrification->PrimaryEmbryologist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitrification_preview->SortField == $ivf_vitrification->PrimaryEmbryologist->Name) { ?><?php if ($ivf_vitrification_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitrification_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<?php if ($ivf_vitrification->SortUrl($ivf_vitrification->SecondaryEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_vitrification->SecondaryEmbryologist->headerCellClass() ?>"><?php echo $ivf_vitrification->SecondaryEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitrification->SecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitrification->SecondaryEmbryologist->Name ?>" data-sort-order="<?php echo $ivf_vitrification_preview->SortField == $ivf_vitrification->SecondaryEmbryologist->Name && $ivf_vitrification_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitrification->SecondaryEmbryologist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitrification_preview->SortField == $ivf_vitrification->SecondaryEmbryologist->Name) { ?><?php if ($ivf_vitrification_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitrification_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->EmbryoNo->Visible) { // EmbryoNo ?>
	<?php if ($ivf_vitrification->SortUrl($ivf_vitrification->EmbryoNo) == "") { ?>
		<th class="<?php echo $ivf_vitrification->EmbryoNo->headerCellClass() ?>"><?php echo $ivf_vitrification->EmbryoNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitrification->EmbryoNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitrification->EmbryoNo->Name ?>" data-sort-order="<?php echo $ivf_vitrification_preview->SortField == $ivf_vitrification->EmbryoNo->Name && $ivf_vitrification_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitrification->EmbryoNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitrification_preview->SortField == $ivf_vitrification->EmbryoNo->Name) { ?><?php if ($ivf_vitrification_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitrification_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->FertilisationDate->Visible) { // FertilisationDate ?>
	<?php if ($ivf_vitrification->SortUrl($ivf_vitrification->FertilisationDate) == "") { ?>
		<th class="<?php echo $ivf_vitrification->FertilisationDate->headerCellClass() ?>"><?php echo $ivf_vitrification->FertilisationDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitrification->FertilisationDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitrification->FertilisationDate->Name ?>" data-sort-order="<?php echo $ivf_vitrification_preview->SortField == $ivf_vitrification->FertilisationDate->Name && $ivf_vitrification_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitrification->FertilisationDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitrification_preview->SortField == $ivf_vitrification->FertilisationDate->Name) { ?><?php if ($ivf_vitrification_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitrification_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Day->Visible) { // Day ?>
	<?php if ($ivf_vitrification->SortUrl($ivf_vitrification->Day) == "") { ?>
		<th class="<?php echo $ivf_vitrification->Day->headerCellClass() ?>"><?php echo $ivf_vitrification->Day->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitrification->Day->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitrification->Day->Name ?>" data-sort-order="<?php echo $ivf_vitrification_preview->SortField == $ivf_vitrification->Day->Name && $ivf_vitrification_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitrification->Day->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitrification_preview->SortField == $ivf_vitrification->Day->Name) { ?><?php if ($ivf_vitrification_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitrification_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Grade->Visible) { // Grade ?>
	<?php if ($ivf_vitrification->SortUrl($ivf_vitrification->Grade) == "") { ?>
		<th class="<?php echo $ivf_vitrification->Grade->headerCellClass() ?>"><?php echo $ivf_vitrification->Grade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitrification->Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitrification->Grade->Name ?>" data-sort-order="<?php echo $ivf_vitrification_preview->SortField == $ivf_vitrification->Grade->Name && $ivf_vitrification_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitrification->Grade->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitrification_preview->SortField == $ivf_vitrification->Grade->Name) { ?><?php if ($ivf_vitrification_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitrification_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Incubator->Visible) { // Incubator ?>
	<?php if ($ivf_vitrification->SortUrl($ivf_vitrification->Incubator) == "") { ?>
		<th class="<?php echo $ivf_vitrification->Incubator->headerCellClass() ?>"><?php echo $ivf_vitrification->Incubator->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitrification->Incubator->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitrification->Incubator->Name ?>" data-sort-order="<?php echo $ivf_vitrification_preview->SortField == $ivf_vitrification->Incubator->Name && $ivf_vitrification_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitrification->Incubator->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitrification_preview->SortField == $ivf_vitrification->Incubator->Name) { ?><?php if ($ivf_vitrification_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitrification_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Tank->Visible) { // Tank ?>
	<?php if ($ivf_vitrification->SortUrl($ivf_vitrification->Tank) == "") { ?>
		<th class="<?php echo $ivf_vitrification->Tank->headerCellClass() ?>"><?php echo $ivf_vitrification->Tank->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitrification->Tank->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitrification->Tank->Name ?>" data-sort-order="<?php echo $ivf_vitrification_preview->SortField == $ivf_vitrification->Tank->Name && $ivf_vitrification_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitrification->Tank->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitrification_preview->SortField == $ivf_vitrification->Tank->Name) { ?><?php if ($ivf_vitrification_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitrification_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Canister->Visible) { // Canister ?>
	<?php if ($ivf_vitrification->SortUrl($ivf_vitrification->Canister) == "") { ?>
		<th class="<?php echo $ivf_vitrification->Canister->headerCellClass() ?>"><?php echo $ivf_vitrification->Canister->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitrification->Canister->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitrification->Canister->Name ?>" data-sort-order="<?php echo $ivf_vitrification_preview->SortField == $ivf_vitrification->Canister->Name && $ivf_vitrification_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitrification->Canister->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitrification_preview->SortField == $ivf_vitrification->Canister->Name) { ?><?php if ($ivf_vitrification_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitrification_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Gobiet->Visible) { // Gobiet ?>
	<?php if ($ivf_vitrification->SortUrl($ivf_vitrification->Gobiet) == "") { ?>
		<th class="<?php echo $ivf_vitrification->Gobiet->headerCellClass() ?>"><?php echo $ivf_vitrification->Gobiet->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitrification->Gobiet->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitrification->Gobiet->Name ?>" data-sort-order="<?php echo $ivf_vitrification_preview->SortField == $ivf_vitrification->Gobiet->Name && $ivf_vitrification_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitrification->Gobiet->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitrification_preview->SortField == $ivf_vitrification->Gobiet->Name) { ?><?php if ($ivf_vitrification_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitrification_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->CryolockNo->Visible) { // CryolockNo ?>
	<?php if ($ivf_vitrification->SortUrl($ivf_vitrification->CryolockNo) == "") { ?>
		<th class="<?php echo $ivf_vitrification->CryolockNo->headerCellClass() ?>"><?php echo $ivf_vitrification->CryolockNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitrification->CryolockNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitrification->CryolockNo->Name ?>" data-sort-order="<?php echo $ivf_vitrification_preview->SortField == $ivf_vitrification->CryolockNo->Name && $ivf_vitrification_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitrification->CryolockNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitrification_preview->SortField == $ivf_vitrification->CryolockNo->Name) { ?><?php if ($ivf_vitrification_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitrification_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->CryolockColour->Visible) { // CryolockColour ?>
	<?php if ($ivf_vitrification->SortUrl($ivf_vitrification->CryolockColour) == "") { ?>
		<th class="<?php echo $ivf_vitrification->CryolockColour->headerCellClass() ?>"><?php echo $ivf_vitrification->CryolockColour->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitrification->CryolockColour->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitrification->CryolockColour->Name ?>" data-sort-order="<?php echo $ivf_vitrification_preview->SortField == $ivf_vitrification->CryolockColour->Name && $ivf_vitrification_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitrification->CryolockColour->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitrification_preview->SortField == $ivf_vitrification->CryolockColour->Name) { ?><?php if ($ivf_vitrification_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitrification_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Stage->Visible) { // Stage ?>
	<?php if ($ivf_vitrification->SortUrl($ivf_vitrification->Stage) == "") { ?>
		<th class="<?php echo $ivf_vitrification->Stage->headerCellClass() ?>"><?php echo $ivf_vitrification->Stage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitrification->Stage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitrification->Stage->Name ?>" data-sort-order="<?php echo $ivf_vitrification_preview->SortField == $ivf_vitrification->Stage->Name && $ivf_vitrification_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitrification->Stage->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitrification_preview->SortField == $ivf_vitrification->Stage->Name) { ?><?php if ($ivf_vitrification_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitrification_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_vitrification_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ivf_vitrification_preview->RecCount = 0;
$ivf_vitrification_preview->RowCnt = 0;
while ($ivf_vitrification_preview->Recordset && !$ivf_vitrification_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_vitrification_preview->RecCount++;
	$ivf_vitrification_preview->RowCnt++;
	$ivf_vitrification_preview->CssStyle = "";
	$ivf_vitrification_preview->loadListRowValues($ivf_vitrification_preview->Recordset);

	// Render row
	$ivf_vitrification_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_vitrification_preview->resetAttributes();
	$ivf_vitrification_preview->renderListRow();

	// Render list options
	$ivf_vitrification_preview->renderListOptions();
?>
	<tr<?php echo $ivf_vitrification_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_vitrification_preview->ListOptions->render("body", "left", $ivf_vitrification_preview->RowCnt);
?>
<?php if ($ivf_vitrification->vitrificationDate->Visible) { // vitrificationDate ?>
		<!-- vitrificationDate -->
		<td<?php echo $ivf_vitrification->vitrificationDate->cellAttributes() ?>>
<span<?php echo $ivf_vitrification->vitrificationDate->viewAttributes() ?>>
<?php echo $ivf_vitrification->vitrificationDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<!-- PrimaryEmbryologist -->
		<td<?php echo $ivf_vitrification->PrimaryEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_vitrification->PrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_vitrification->PrimaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<!-- SecondaryEmbryologist -->
		<td<?php echo $ivf_vitrification->SecondaryEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_vitrification->SecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_vitrification->SecondaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->EmbryoNo->Visible) { // EmbryoNo ?>
		<!-- EmbryoNo -->
		<td<?php echo $ivf_vitrification->EmbryoNo->cellAttributes() ?>>
<span<?php echo $ivf_vitrification->EmbryoNo->viewAttributes() ?>>
<?php echo $ivf_vitrification->EmbryoNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->FertilisationDate->Visible) { // FertilisationDate ?>
		<!-- FertilisationDate -->
		<td<?php echo $ivf_vitrification->FertilisationDate->cellAttributes() ?>>
<span<?php echo $ivf_vitrification->FertilisationDate->viewAttributes() ?>>
<?php echo $ivf_vitrification->FertilisationDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->Day->Visible) { // Day ?>
		<!-- Day -->
		<td<?php echo $ivf_vitrification->Day->cellAttributes() ?>>
<span<?php echo $ivf_vitrification->Day->viewAttributes() ?>>
<?php echo $ivf_vitrification->Day->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->Grade->Visible) { // Grade ?>
		<!-- Grade -->
		<td<?php echo $ivf_vitrification->Grade->cellAttributes() ?>>
<span<?php echo $ivf_vitrification->Grade->viewAttributes() ?>>
<?php echo $ivf_vitrification->Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->Incubator->Visible) { // Incubator ?>
		<!-- Incubator -->
		<td<?php echo $ivf_vitrification->Incubator->cellAttributes() ?>>
<span<?php echo $ivf_vitrification->Incubator->viewAttributes() ?>>
<?php echo $ivf_vitrification->Incubator->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->Tank->Visible) { // Tank ?>
		<!-- Tank -->
		<td<?php echo $ivf_vitrification->Tank->cellAttributes() ?>>
<span<?php echo $ivf_vitrification->Tank->viewAttributes() ?>>
<?php echo $ivf_vitrification->Tank->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->Canister->Visible) { // Canister ?>
		<!-- Canister -->
		<td<?php echo $ivf_vitrification->Canister->cellAttributes() ?>>
<span<?php echo $ivf_vitrification->Canister->viewAttributes() ?>>
<?php echo $ivf_vitrification->Canister->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->Gobiet->Visible) { // Gobiet ?>
		<!-- Gobiet -->
		<td<?php echo $ivf_vitrification->Gobiet->cellAttributes() ?>>
<span<?php echo $ivf_vitrification->Gobiet->viewAttributes() ?>>
<?php echo $ivf_vitrification->Gobiet->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->CryolockNo->Visible) { // CryolockNo ?>
		<!-- CryolockNo -->
		<td<?php echo $ivf_vitrification->CryolockNo->cellAttributes() ?>>
<span<?php echo $ivf_vitrification->CryolockNo->viewAttributes() ?>>
<?php echo $ivf_vitrification->CryolockNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->CryolockColour->Visible) { // CryolockColour ?>
		<!-- CryolockColour -->
		<td<?php echo $ivf_vitrification->CryolockColour->cellAttributes() ?>>
<span<?php echo $ivf_vitrification->CryolockColour->viewAttributes() ?>>
<?php echo $ivf_vitrification->CryolockColour->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->Stage->Visible) { // Stage ?>
		<!-- Stage -->
		<td<?php echo $ivf_vitrification->Stage->cellAttributes() ?>>
<span<?php echo $ivf_vitrification->Stage->viewAttributes() ?>>
<?php echo $ivf_vitrification->Stage->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_vitrification_preview->ListOptions->render("body", "right", $ivf_vitrification_preview->RowCnt);
?>
	</tr>
<?php
	$ivf_vitrification_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($ivf_vitrification_preview->TotalRecs > 0) { ?>
<?php if (!isset($ivf_vitrification_preview->Pager)) $ivf_vitrification_preview->Pager = new PrevNextPager($ivf_vitrification_preview->StartRec, $ivf_vitrification_preview->DisplayRecs, $ivf_vitrification_preview->TotalRecs) ?>
<?php if ($ivf_vitrification_preview->Pager->RecordCount > 0 && $ivf_vitrification_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($ivf_vitrification_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $ivf_vitrification_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($ivf_vitrification_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $ivf_vitrification_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($ivf_vitrification_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $ivf_vitrification_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($ivf_vitrification_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $ivf_vitrification_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_vitrification_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_vitrification_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_vitrification_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_vitrification_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$ivf_vitrification_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($ivf_vitrification_preview->Recordset)
	$ivf_vitrification_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$ivf_vitrification_preview->terminate();
?>