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
<?php if ($pharmacy_purchaseorder_preview->TotalRecords > 0) { ?>
<div class="card ew-grid pharmacy_purchaseorder"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$pharmacy_purchaseorder_preview->renderListOptions();

// Render list options (header, left)
$pharmacy_purchaseorder_preview->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_purchaseorder_preview->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder_preview->PRC) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->PRC->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder_preview->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchaseorder_preview->PRC->Name) ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->PRC->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_preview->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->PRC->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->QTY->Visible) { // QTY ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder_preview->QTY) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->QTY->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder_preview->QTY->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->QTY->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchaseorder_preview->QTY->Name) ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->QTY->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_preview->QTY->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->QTY->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->Stock->Visible) { // Stock ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder_preview->Stock) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->Stock->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder_preview->Stock->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->Stock->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchaseorder_preview->Stock->Name) ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->Stock->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_preview->Stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->Stock->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->LastMonthSale->Visible) { // LastMonthSale ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder_preview->LastMonthSale) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->LastMonthSale->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder_preview->LastMonthSale->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->LastMonthSale->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchaseorder_preview->LastMonthSale->Name) ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->LastMonthSale->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_preview->LastMonthSale->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->LastMonthSale->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder_preview->HospID) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->HospID->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchaseorder_preview->HospID->Name) ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->HospID->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->HospID->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder_preview->CreatedBy) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->CreatedBy->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder_preview->CreatedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchaseorder_preview->CreatedBy->Name) ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->CreatedBy->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_preview->CreatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->CreatedBy->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder_preview->CreatedDateTime) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->CreatedDateTime->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder_preview->CreatedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->CreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchaseorder_preview->CreatedDateTime->Name) ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->CreatedDateTime->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_preview->CreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->CreatedDateTime->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder_preview->ModifiedBy) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->ModifiedBy->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder_preview->ModifiedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchaseorder_preview->ModifiedBy->Name) ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->ModifiedBy->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_preview->ModifiedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->ModifiedBy->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder_preview->ModifiedDateTime) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->ModifiedDateTime->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder_preview->ModifiedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->ModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchaseorder_preview->ModifiedDateTime->Name) ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->ModifiedDateTime->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_preview->ModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->ModifiedDateTime->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->BillDate->Visible) { // BillDate ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder_preview->BillDate) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->BillDate->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder_preview->BillDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->BillDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchaseorder_preview->BillDate->Name) ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->BillDate->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_preview->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->BillDate->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->CurStock->Visible) { // CurStock ?>
	<?php if ($pharmacy_purchaseorder->SortUrl($pharmacy_purchaseorder_preview->CurStock) == "") { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->CurStock->headerCellClass() ?>"><?php echo $pharmacy_purchaseorder_preview->CurStock->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchaseorder_preview->CurStock->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchaseorder_preview->CurStock->Name) ?>" data-sort-order="<?php echo $pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->CurStock->Name && $pharmacy_purchaseorder_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_preview->CurStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_preview->SortField == $pharmacy_purchaseorder_preview->CurStock->Name) { ?><?php if ($pharmacy_purchaseorder_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$pharmacy_purchaseorder_preview->RowCount = 0;
while ($pharmacy_purchaseorder_preview->Recordset && !$pharmacy_purchaseorder_preview->Recordset->EOF) {

	// Init row class and style
	$pharmacy_purchaseorder_preview->RecCount++;
	$pharmacy_purchaseorder_preview->RowCount++;
	$pharmacy_purchaseorder_preview->CssStyle = "";
	$pharmacy_purchaseorder_preview->loadListRowValues($pharmacy_purchaseorder_preview->Recordset);

	// Render row
	$pharmacy_purchaseorder->RowType = ROWTYPE_PREVIEW; // Preview record
	$pharmacy_purchaseorder_preview->resetAttributes();
	$pharmacy_purchaseorder_preview->renderListRow();

	// Render list options
	$pharmacy_purchaseorder_preview->renderListOptions();
?>
	<tr <?php echo $pharmacy_purchaseorder->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchaseorder_preview->ListOptions->render("body", "left", $pharmacy_purchaseorder_preview->RowCount);
?>
<?php if ($pharmacy_purchaseorder_preview->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $pharmacy_purchaseorder_preview->PRC->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder_preview->PRC->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_preview->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->QTY->Visible) { // QTY ?>
		<!-- QTY -->
		<td<?php echo $pharmacy_purchaseorder_preview->QTY->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder_preview->QTY->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_preview->QTY->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->Stock->Visible) { // Stock ?>
		<!-- Stock -->
		<td<?php echo $pharmacy_purchaseorder_preview->Stock->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder_preview->Stock->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_preview->Stock->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->LastMonthSale->Visible) { // LastMonthSale ?>
		<!-- LastMonthSale -->
		<td<?php echo $pharmacy_purchaseorder_preview->LastMonthSale->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder_preview->LastMonthSale->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_preview->LastMonthSale->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $pharmacy_purchaseorder_preview->HospID->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder_preview->HospID->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->CreatedBy->Visible) { // CreatedBy ?>
		<!-- CreatedBy -->
		<td<?php echo $pharmacy_purchaseorder_preview->CreatedBy->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder_preview->CreatedBy->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_preview->CreatedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<!-- CreatedDateTime -->
		<td<?php echo $pharmacy_purchaseorder_preview->CreatedDateTime->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder_preview->CreatedDateTime->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_preview->CreatedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->ModifiedBy->Visible) { // ModifiedBy ?>
		<!-- ModifiedBy -->
		<td<?php echo $pharmacy_purchaseorder_preview->ModifiedBy->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder_preview->ModifiedBy->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_preview->ModifiedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<!-- ModifiedDateTime -->
		<td<?php echo $pharmacy_purchaseorder_preview->ModifiedDateTime->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder_preview->ModifiedDateTime->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_preview->ModifiedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->BillDate->Visible) { // BillDate ?>
		<!-- BillDate -->
		<td<?php echo $pharmacy_purchaseorder_preview->BillDate->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder_preview->BillDate->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_preview->BillDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_preview->CurStock->Visible) { // CurStock ?>
		<!-- CurStock -->
		<td<?php echo $pharmacy_purchaseorder_preview->CurStock->cellAttributes() ?>>
<span<?php echo $pharmacy_purchaseorder_preview->CurStock->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_preview->CurStock->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchaseorder_preview->ListOptions->render("body", "right", $pharmacy_purchaseorder_preview->RowCount);
?>
	</tr>
<?php
	$pharmacy_purchaseorder_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $pharmacy_purchaseorder_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($pharmacy_purchaseorder_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($pharmacy_purchaseorder_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$pharmacy_purchaseorder_preview->showPageFooter();
if (Config("DEBUG"))
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