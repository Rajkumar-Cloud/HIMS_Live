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
<?php if ($pres_trade_combination_names_new_preview->TotalRecords > 0) { ?>
<div class="card ew-grid pres_trade_combination_names_new"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$pres_trade_combination_names_new_preview->renderListOptions();

// Render list options (header, left)
$pres_trade_combination_names_new_preview->ListOptions->render("header", "left");
?>
<?php if ($pres_trade_combination_names_new_preview->ID->Visible) { // ID ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new_preview->ID) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->ID->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new_preview->ID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->ID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pres_trade_combination_names_new_preview->ID->Name) ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->ID->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_preview->ID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->ID->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->tradenames_id->Visible) { // tradenames_id ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new_preview->tradenames_id) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->tradenames_id->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new_preview->tradenames_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->tradenames_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pres_trade_combination_names_new_preview->tradenames_id->Name) ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->tradenames_id->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_preview->tradenames_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->tradenames_id->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->Drug_Name->Visible) { // Drug_Name ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new_preview->Drug_Name) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->Drug_Name->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new_preview->Drug_Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->Drug_Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pres_trade_combination_names_new_preview->Drug_Name->Name) ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->Drug_Name->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_preview->Drug_Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->Drug_Name->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->Generic_Name->Visible) { // Generic_Name ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new_preview->Generic_Name) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->Generic_Name->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new_preview->Generic_Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->Generic_Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pres_trade_combination_names_new_preview->Generic_Name->Name) ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->Generic_Name->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_preview->Generic_Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->Generic_Name->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->Trade_Name->Visible) { // Trade_Name ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new_preview->Trade_Name) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->Trade_Name->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new_preview->Trade_Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->Trade_Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pres_trade_combination_names_new_preview->Trade_Name->Name) ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->Trade_Name->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_preview->Trade_Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->Trade_Name->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->PR_CODE->Visible) { // PR_CODE ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new_preview->PR_CODE) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->PR_CODE->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new_preview->PR_CODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->PR_CODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pres_trade_combination_names_new_preview->PR_CODE->Name) ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->PR_CODE->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_preview->PR_CODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->PR_CODE->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->Form->Visible) { // Form ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new_preview->Form) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->Form->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new_preview->Form->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->Form->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pres_trade_combination_names_new_preview->Form->Name) ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->Form->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_preview->Form->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->Form->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->Strength->Visible) { // Strength ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new_preview->Strength) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->Strength->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new_preview->Strength->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->Strength->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pres_trade_combination_names_new_preview->Strength->Name) ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->Strength->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_preview->Strength->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->Strength->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->Unit->Visible) { // Unit ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new_preview->Unit) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->Unit->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new_preview->Unit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->Unit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pres_trade_combination_names_new_preview->Unit->Name) ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->Unit->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_preview->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->Unit->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new_preview->CONTAINER_TYPE) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->CONTAINER_TYPE->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new_preview->CONTAINER_TYPE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->CONTAINER_TYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pres_trade_combination_names_new_preview->CONTAINER_TYPE->Name) ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->CONTAINER_TYPE->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_preview->CONTAINER_TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->CONTAINER_TYPE->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new_preview->CONTAINER_STRENGTH) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->CONTAINER_STRENGTH->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new_preview->CONTAINER_STRENGTH->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->CONTAINER_STRENGTH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pres_trade_combination_names_new_preview->CONTAINER_STRENGTH->Name) ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->CONTAINER_STRENGTH->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_preview->CONTAINER_STRENGTH->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->CONTAINER_STRENGTH->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<?php if ($pres_trade_combination_names_new->SortUrl($pres_trade_combination_names_new_preview->TypeOfDrug) == "") { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->TypeOfDrug->headerCellClass() ?>"><?php echo $pres_trade_combination_names_new_preview->TypeOfDrug->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pres_trade_combination_names_new_preview->TypeOfDrug->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pres_trade_combination_names_new_preview->TypeOfDrug->Name) ?>" data-sort-order="<?php echo $pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->TypeOfDrug->Name && $pres_trade_combination_names_new_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_preview->TypeOfDrug->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_preview->SortField == $pres_trade_combination_names_new_preview->TypeOfDrug->Name) { ?><?php if ($pres_trade_combination_names_new_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$pres_trade_combination_names_new_preview->RowCount = 0;
while ($pres_trade_combination_names_new_preview->Recordset && !$pres_trade_combination_names_new_preview->Recordset->EOF) {

	// Init row class and style
	$pres_trade_combination_names_new_preview->RecCount++;
	$pres_trade_combination_names_new_preview->RowCount++;
	$pres_trade_combination_names_new_preview->CssStyle = "";
	$pres_trade_combination_names_new_preview->loadListRowValues($pres_trade_combination_names_new_preview->Recordset);

	// Render row
	$pres_trade_combination_names_new->RowType = ROWTYPE_PREVIEW; // Preview record
	$pres_trade_combination_names_new_preview->resetAttributes();
	$pres_trade_combination_names_new_preview->renderListRow();

	// Render list options
	$pres_trade_combination_names_new_preview->renderListOptions();
?>
	<tr <?php echo $pres_trade_combination_names_new->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_trade_combination_names_new_preview->ListOptions->render("body", "left", $pres_trade_combination_names_new_preview->RowCount);
?>
<?php if ($pres_trade_combination_names_new_preview->ID->Visible) { // ID ?>
		<!-- ID -->
		<td<?php echo $pres_trade_combination_names_new_preview->ID->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new_preview->ID->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_preview->ID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->tradenames_id->Visible) { // tradenames_id ?>
		<!-- tradenames_id -->
		<td<?php echo $pres_trade_combination_names_new_preview->tradenames_id->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new_preview->tradenames_id->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_preview->tradenames_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->Drug_Name->Visible) { // Drug_Name ?>
		<!-- Drug_Name -->
		<td<?php echo $pres_trade_combination_names_new_preview->Drug_Name->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new_preview->Drug_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_preview->Drug_Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->Generic_Name->Visible) { // Generic_Name ?>
		<!-- Generic_Name -->
		<td<?php echo $pres_trade_combination_names_new_preview->Generic_Name->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new_preview->Generic_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_preview->Generic_Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->Trade_Name->Visible) { // Trade_Name ?>
		<!-- Trade_Name -->
		<td<?php echo $pres_trade_combination_names_new_preview->Trade_Name->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new_preview->Trade_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_preview->Trade_Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->PR_CODE->Visible) { // PR_CODE ?>
		<!-- PR_CODE -->
		<td<?php echo $pres_trade_combination_names_new_preview->PR_CODE->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new_preview->PR_CODE->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_preview->PR_CODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->Form->Visible) { // Form ?>
		<!-- Form -->
		<td<?php echo $pres_trade_combination_names_new_preview->Form->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new_preview->Form->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_preview->Form->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->Strength->Visible) { // Strength ?>
		<!-- Strength -->
		<td<?php echo $pres_trade_combination_names_new_preview->Strength->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new_preview->Strength->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_preview->Strength->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->Unit->Visible) { // Unit ?>
		<!-- Unit -->
		<td<?php echo $pres_trade_combination_names_new_preview->Unit->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new_preview->Unit->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_preview->Unit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<!-- CONTAINER_TYPE -->
		<td<?php echo $pres_trade_combination_names_new_preview->CONTAINER_TYPE->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new_preview->CONTAINER_TYPE->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_preview->CONTAINER_TYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
		<!-- CONTAINER_STRENGTH -->
		<td<?php echo $pres_trade_combination_names_new_preview->CONTAINER_STRENGTH->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new_preview->CONTAINER_STRENGTH->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_preview->CONTAINER_STRENGTH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_preview->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<!-- TypeOfDrug -->
		<td<?php echo $pres_trade_combination_names_new_preview->TypeOfDrug->cellAttributes() ?>>
<span<?php echo $pres_trade_combination_names_new_preview->TypeOfDrug->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_preview->TypeOfDrug->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$pres_trade_combination_names_new_preview->ListOptions->render("body", "right", $pres_trade_combination_names_new_preview->RowCount);
?>
	</tr>
<?php
	$pres_trade_combination_names_new_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $pres_trade_combination_names_new_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($pres_trade_combination_names_new_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($pres_trade_combination_names_new_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$pres_trade_combination_names_new_preview->showPageFooter();
if (Config("DEBUG"))
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