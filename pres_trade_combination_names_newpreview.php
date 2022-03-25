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
$pres_trade_combination_names_new_preview = new pres_trade_combination_names_new_preview();

// Run the page
$pres_trade_combination_names_new_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_trade_combination_names_new_preview->Page_Render();
?>
<?php $pres_trade_combination_names_new_preview->showPageHeader(); ?>
<div class="card ew-grid pres_trade_combination_names_new"><!-- .card -->
<?php if ($pres_trade_combination_names_new_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$pres_trade_combination_names_new_preview->renderListOptions();

// Render list options (header, left)
$pres_trade_combination_names_new_preview->ListOptions->render("header", "left");
?>
<?php if ($pres_trade_combination_names_new->ID->Visible) { // ID ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new->ID) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new->ID->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new->ID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new->ID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pres_trade_combination_names_new->ID->Name ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->ID->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new->ID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->ID->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->tradenames_id->Visible) { // tradenames_id ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new->tradenames_id) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new->tradenames_id->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new->tradenames_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new->tradenames_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pres_trade_combination_names_new->tradenames_id->Name ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->tradenames_id->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new->tradenames_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->tradenames_id->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Drug_Name->Visible) { // Drug_Name ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new->Drug_Name) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new->Drug_Name->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new->Drug_Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new->Drug_Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pres_trade_combination_names_new->Drug_Name->Name ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->Drug_Name->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new->Drug_Name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->Drug_Name->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Generic_Name->Visible) { // Generic_Name ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new->Generic_Name) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new->Generic_Name->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new->Generic_Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new->Generic_Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pres_trade_combination_names_new->Generic_Name->Name ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->Generic_Name->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new->Generic_Name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->Generic_Name->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Trade_Name->Visible) { // Trade_Name ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new->Trade_Name) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new->Trade_Name->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new->Trade_Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new->Trade_Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pres_trade_combination_names_new->Trade_Name->Name ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->Trade_Name->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new->Trade_Name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->Trade_Name->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->PR_CODE->Visible) { // PR_CODE ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new->PR_CODE) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new->PR_CODE->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new->PR_CODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new->PR_CODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pres_trade_combination_names_new->PR_CODE->Name ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->PR_CODE->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new->PR_CODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->PR_CODE->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Form->Visible) { // Form ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new->Form) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new->Form->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new->Form->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new->Form->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pres_trade_combination_names_new->Form->Name ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->Form->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new->Form->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->Form->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Strength->Visible) { // Strength ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new->Strength) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new->Strength->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new->Strength->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new->Strength->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pres_trade_combination_names_new->Strength->Name ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->Strength->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new->Strength->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->Strength->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Unit->Visible) { // Unit ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new->Unit) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new->Unit->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new->Unit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new->Unit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pres_trade_combination_names_new->Unit->Name ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->Unit->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new->Unit->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->Unit->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new->CONTAINER_TYPE) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new->CONTAINER_TYPE->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new->CONTAINER_TYPE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new->CONTAINER_TYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pres_trade_combination_names_new->CONTAINER_TYPE->Name ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->CONTAINER_TYPE->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new->CONTAINER_TYPE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->CONTAINER_TYPE->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new->CONTAINER_STRENGTH) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new->CONTAINER_STRENGTH->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new->CONTAINER_STRENGTH->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new->CONTAINER_STRENGTH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pres_trade_combination_names_new->CONTAINER_STRENGTH->Name ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->CONTAINER_STRENGTH->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new->CONTAINER_STRENGTH->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->CONTAINER_STRENGTH->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new->TypeOfDrug) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new->TypeOfDrug->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new->TypeOfDrug->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new->TypeOfDrug->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pres_trade_combination_names_new->TypeOfDrug->Name ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->TypeOfDrug->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new->TypeOfDrug->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new->TypeOfDrug->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_trade_combination_names_new_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$pres_trade_combination_names_new_preview->RecCount = 0;
$pres_trade_combination_names_new_preview->RowCnt = 0;
while ($pres_trade_combination_names_new_preview->Recordset && !$pres_trade_combination_names_new_preview->Recordset->EOF) {

	// Init row class and style
	$pres_trade_combination_names_new_preview->RecCount++;
	$pres_trade_combination_names_new_preview->RowCnt++;
	$pres_trade_combination_names_new_preview->CssStyle = "";
	$pres_trade_combination_names_new_preview->loadListRowValues($pres_trade_combination_names_new_preview->Recordset);

	// Render row
	$pres_trade_combination_names_new_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$pres_trade_combination_names_new_preview->resetAttributes();
	$pres_trade_combination_names_new_preview->renderListRow();

	// Render list options
	$pres_trade_combination_names_new_preview->renderListOptions();
?>
	<tr<?php echo $pres_trade_combination_names_new_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_trade_combination_names_new_preview->ListOptions->render("body", "left", $pres_trade_combination_names_new_preview->RowCnt);
?>
<?php if ($pres_trade_combination_names_new->ID->Visible) { // ID ?>
		<!-- ID -->
		<td<?php echo $pres_trade_combination_names_new->ID->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new->ID->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->ID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new->tradenames_id->Visible) { // tradenames_id ?>
		<!-- tradenames_id -->
		<td<?php echo $pres_trade_combination_names_new->tradenames_id->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new->tradenames_id->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->tradenames_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Drug_Name->Visible) { // Drug_Name ?>
		<!-- Drug_Name -->
		<td<?php echo $pres_trade_combination_names_new->Drug_Name->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new->Drug_Name->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->Drug_Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Generic_Name->Visible) { // Generic_Name ?>
		<!-- Generic_Name -->
		<td<?php echo $pres_trade_combination_names_new->Generic_Name->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new->Generic_Name->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->Generic_Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Trade_Name->Visible) { // Trade_Name ?>
		<!-- Trade_Name -->
		<td<?php echo $pres_trade_combination_names_new->Trade_Name->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new->Trade_Name->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->Trade_Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new->PR_CODE->Visible) { // PR_CODE ?>
		<!-- PR_CODE -->
		<td<?php echo $pres_trade_combination_names_new->PR_CODE->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new->PR_CODE->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->PR_CODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Form->Visible) { // Form ?>
		<!-- Form -->
		<td<?php echo $pres_trade_combination_names_new->Form->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new->Form->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->Form->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Strength->Visible) { // Strength ?>
		<!-- Strength -->
		<td<?php echo $pres_trade_combination_names_new->Strength->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new->Strength->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->Strength->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Unit->Visible) { // Unit ?>
		<!-- Unit -->
		<td<?php echo $pres_trade_combination_names_new->Unit->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new->Unit->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->Unit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<!-- CONTAINER_TYPE -->
		<td<?php echo $pres_trade_combination_names_new->CONTAINER_TYPE->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new->CONTAINER_TYPE->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->CONTAINER_TYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
		<!-- CONTAINER_STRENGTH -->
		<td<?php echo $pres_trade_combination_names_new->CONTAINER_STRENGTH->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new->CONTAINER_STRENGTH->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->CONTAINER_STRENGTH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<!-- TypeOfDrug -->
		<td<?php echo $pres_trade_combination_names_new->TypeOfDrug->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new->TypeOfDrug->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->TypeOfDrug->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$pres_trade_combination_names_new_preview->ListOptions->render("body", "right", $pres_trade_combination_names_new_preview->RowCnt);
?>
	</tr>
<?php
	$pres_trade_combination_names_new_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($pres_trade_combination_names_new_preview->TotalRecs > 0) { ?>
<?php if (!isset($pres_trade_combination_names_new_preview->Pager)) $pres_trade_combination_names_new_preview->Pager = new PrevNextPager($pres_trade_combination_names_new_preview->StartRec, $pres_trade_combination_names_new_preview->DisplayRecs, $pres_trade_combination_names_new_preview->TotalRecs) ?>
<?php if ($pres_trade_combination_names_new_preview->Pager->RecordCount > 0 && $pres_trade_combination_names_new_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($pres_trade_combination_names_new_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $pres_trade_combination_names_new_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($pres_trade_combination_names_new_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $pres_trade_combination_names_new_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($pres_trade_combination_names_new_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $pres_trade_combination_names_new_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($pres_trade_combination_names_new_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $pres_trade_combination_names_new_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_trade_combination_names_new_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_trade_combination_names_new_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_trade_combination_names_new_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($pres_trade_combination_names_new_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$pres_trade_combination_names_new_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($pres_trade_combination_names_new_preview->Recordset)
	$pres_trade_combination_names_new_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$pres_trade_combination_names_new_preview->terminate();
?>