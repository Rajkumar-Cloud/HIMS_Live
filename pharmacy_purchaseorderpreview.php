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
$pharmacy_purchaseorder_preview = new pharmacy_purchaseorder_preview();

// Run the page
$pharmacy_purchaseorder_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchaseorder_preview->Page_Render();
?>
<?php $pharmacy_purchaseorder_preview->showPageHeader(); ?>
<div class="card ew-grid pharmacy_purchaseorder"><!-- .card -->
<?php if ($pharmacy_purchaseorder_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$pharmacy_purchaseorder_preview->renderListOptions();

// Render list options (header, left)
$pharmacy_purchaseorder_preview->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_purchaseorder->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->PRC) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->PRC->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->PRC->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->PRC->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->PRC->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->PRC->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->QTY->Visible) { // QTY ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->QTY) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->QTY->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->QTY->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->QTY->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->QTY->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->QTY->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->QTY->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->QTY->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->Stock->Visible) { // Stock ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->Stock) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->Stock->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->Stock->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->Stock->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->Stock->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->Stock->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->Stock->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->Stock->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->LastMonthSale) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->LastMonthSale->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->LastMonthSale->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->LastMonthSale->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->LastMonthSale->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->LastMonthSale->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->LastMonthSale->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->LastMonthSale->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->HospID) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->HospID->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->HospID->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->HospID->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->HospID->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->CreatedBy) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->CreatedBy->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->CreatedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->CreatedBy->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->CreatedBy->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->CreatedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->CreatedBy->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->CreatedDateTime) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->CreatedDateTime->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->CreatedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->CreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->CreatedDateTime->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->CreatedDateTime->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->CreatedDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->CreatedDateTime->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->ModifiedBy) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->ModifiedBy->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->ModifiedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->ModifiedBy->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->ModifiedBy->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->ModifiedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->ModifiedBy->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->ModifiedDateTime) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->ModifiedDateTime->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->ModifiedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->ModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->ModifiedDateTime->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->ModifiedDateTime->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->ModifiedDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->ModifiedDateTime->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->BillDate->Visible) { // BillDate ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->BillDate) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->BillDate->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->BillDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->BillDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->BillDate->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->BillDate->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->BillDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->BillDate->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CurStock->Visible) { // CurStock ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->CurStock) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->CurStock->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->CurStock->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->CurStock->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->CurStock->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->CurStock->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->CurStock->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->CurStock->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grndate->Visible) { // grndate ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->grndate) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->grndate->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->grndate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->grndate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->grndate->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->grndate->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->grndate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->grndate->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grndatetime->Visible) { // grndatetime ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->grndatetime) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->grndatetime->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->grndatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->grndatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->grndatetime->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->grndatetime->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->grndatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->grndatetime->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->strid->Visible) { // strid ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->strid) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->strid->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->strid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->strid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->strid->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->strid->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->strid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->strid->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->GRNPer->Visible) { // GRNPer ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->GRNPer) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->GRNPer->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->GRNPer->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->GRNPer->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->GRNPer->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->GRNPer->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->GRNPer->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->GRNPer->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder->FreeQtyyy) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder->FreeQtyyy->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder->FreeQtyyy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder->FreeQtyyy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchaseorder->FreeQtyyy->Name ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->FreeQtyyy->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->FreeQtyyy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder->FreeQtyyy->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_purchaseorder_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$pharmacy_purchaseorder_preview->RecCount = 0;
$pharmacy_purchaseorder_preview->RowCnt = 0;
while ($pharmacy_purchaseorder_preview->Recordset && !$pharmacy_purchaseorder_preview->Recordset->EOF) {

	// Init row class and style
	$pharmacy_purchaseorder_preview->RecCount++;
	$pharmacy_purchaseorder_preview->RowCnt++;
	$pharmacy_purchaseorder_preview->CssStyle = "";
	$pharmacy_purchaseorder_preview->loadListRowValues($pharmacy_purchaseorder_preview->Recordset);

	// Render row
	$pharmacy_purchaseorder_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$pharmacy_purchaseorder_preview->resetAttributes();
	$pharmacy_purchaseorder_preview->renderListRow();

	// Render list options
	$pharmacy_purchaseorder_preview->renderListOptions();
?>
	<tr<?php echo $pharmacy_purchaseorder_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchaseorder_preview->ListOptions->render("body", "left", $pharmacy_purchaseorder_preview->RowCnt);
?>
<?php if ($pharmacy_purchaseorder->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $pharmacy_purchaseorder->PRC->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->PRC->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->QTY->Visible) { // QTY ?>
		<!-- QTY -->
		<td<?php echo $pharmacy_purchaseorder->QTY->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->QTY->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->QTY->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->Stock->Visible) { // Stock ?>
		<!-- Stock -->
		<td<?php echo $pharmacy_purchaseorder->Stock->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->Stock->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->Stock->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
		<!-- LastMonthSale -->
		<td<?php echo $pharmacy_purchaseorder->LastMonthSale->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->LastMonthSale->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->LastMonthSale->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $pharmacy_purchaseorder->HospID->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->HospID->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CreatedBy->Visible) { // CreatedBy ?>
		<!-- CreatedBy -->
		<td<?php echo $pharmacy_purchaseorder->CreatedBy->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->CreatedBy->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->CreatedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<!-- CreatedDateTime -->
		<td<?php echo $pharmacy_purchaseorder->CreatedDateTime->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->CreatedDateTime->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->CreatedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->ModifiedBy->Visible) { // ModifiedBy ?>
		<!-- ModifiedBy -->
		<td<?php echo $pharmacy_purchaseorder->ModifiedBy->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->ModifiedBy->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->ModifiedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<!-- ModifiedDateTime -->
		<td<?php echo $pharmacy_purchaseorder->ModifiedDateTime->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->ModifiedDateTime->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->ModifiedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->BillDate->Visible) { // BillDate ?>
		<!-- BillDate -->
		<td<?php echo $pharmacy_purchaseorder->BillDate->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->BillDate->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->BillDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CurStock->Visible) { // CurStock ?>
		<!-- CurStock -->
		<td<?php echo $pharmacy_purchaseorder->CurStock->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->CurStock->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->CurStock->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grndate->Visible) { // grndate ?>
		<!-- grndate -->
		<td<?php echo $pharmacy_purchaseorder->grndate->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->grndate->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->grndate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grndatetime->Visible) { // grndatetime ?>
		<!-- grndatetime -->
		<td<?php echo $pharmacy_purchaseorder->grndatetime->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->grndatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->grndatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->strid->Visible) { // strid ?>
		<!-- strid -->
		<td<?php echo $pharmacy_purchaseorder->strid->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->strid->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->strid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->GRNPer->Visible) { // GRNPer ?>
		<!-- GRNPer -->
		<td<?php echo $pharmacy_purchaseorder->GRNPer->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->GRNPer->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->GRNPer->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<!-- FreeQtyyy -->
		<td<?php echo $pharmacy_purchaseorder->FreeQtyyy->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder->FreeQtyyy->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->FreeQtyyy->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchaseorder_preview->ListOptions->render("body", "right", $pharmacy_purchaseorder_preview->RowCnt);
?>
	</tr>
<?php
	$pharmacy_purchaseorder_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($pharmacy_purchaseorder_preview->TotalRecs > 0) { ?>
<?php if (!isset($pharmacy_purchaseorder_preview->Pager)) $pharmacy_purchaseorder_preview->Pager = new PrevNextPager($pharmacy_purchaseorder_preview->StartRec, $pharmacy_purchaseorder_preview->DisplayRecs, $pharmacy_purchaseorder_preview->TotalRecs) ?>
<?php if ($pharmacy_purchaseorder_preview->Pager->RecordCount > 0 && $pharmacy_purchaseorder_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($pharmacy_purchaseorder_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $pharmacy_purchaseorder_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($pharmacy_purchaseorder_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $pharmacy_purchaseorder_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($pharmacy_purchaseorder_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $pharmacy_purchaseorder_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($pharmacy_purchaseorder_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $pharmacy_purchaseorder_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_purchaseorder_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_purchaseorder_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_purchaseorder_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($pharmacy_purchaseorder_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$pharmacy_purchaseorder_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($pharmacy_purchaseorder_preview->Recordset)
	$pharmacy_purchaseorder_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$pharmacy_purchaseorder_preview->terminate();
?>