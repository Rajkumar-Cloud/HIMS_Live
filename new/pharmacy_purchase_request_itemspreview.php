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
$pharmacy_purchase_request_items_preview = new pharmacy_purchase_request_items_preview();

// Run the page
$pharmacy_purchase_request_items_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchase_request_items_preview->Page_Render();
?>
<?php $pharmacy_purchase_request_items_preview->showPageHeader(); ?>
<?php if ($pharmacy_purchase_request_items_preview->TotalRecords > 0) { ?>
<div class="card ew-grid pharmacy_purchase_request_items"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$pharmacy_purchase_request_items_preview->renderListOptions();

// Render list options (header, left)
$pharmacy_purchase_request_items_preview->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_purchase_request_items_preview->id->Visible) { // id ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items_preview->id) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->id->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchase_request_items_preview->id->Name) ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->id->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->id->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items_preview->PRC) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->PRC->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items_preview->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchase_request_items_preview->PRC->Name) ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->PRC->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_preview->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->PRC->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->PrName->Visible) { // PrName ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items_preview->PrName) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->PrName->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items_preview->PrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->PrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchase_request_items_preview->PrName->Name) ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->PrName->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_preview->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->PrName->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->Quantity->Visible) { // Quantity ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items_preview->Quantity) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->Quantity->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items_preview->Quantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchase_request_items_preview->Quantity->Name) ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->Quantity->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_preview->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->Quantity->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items_preview->HospID) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->HospID->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchase_request_items_preview->HospID->Name) ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->HospID->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->HospID->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items_preview->createdby) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->createdby->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchase_request_items_preview->createdby->Name) ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->createdby->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->createdby->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items_preview->createddatetime) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->createddatetime->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchase_request_items_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->createddatetime->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->createddatetime->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items_preview->modifiedby) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->modifiedby->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchase_request_items_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->modifiedby->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->modifiedby->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->modifieddatetime->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchase_request_items_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->modifieddatetime->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->modifieddatetime->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items_preview->BRCODE) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->BRCODE->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items_preview->BRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchase_request_items_preview->BRCODE->Name) ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->BRCODE->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_preview->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->BRCODE->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->prid->Visible) { // prid ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items_preview->prid) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->prid->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items_preview->prid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items_preview->prid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_purchase_request_items_preview->prid->Name) ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->prid->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_preview->prid->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items_preview->prid->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_purchase_request_items_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$pharmacy_purchase_request_items_preview->RecCount = 0;
$pharmacy_purchase_request_items_preview->RowCount = 0;
while ($pharmacy_purchase_request_items_preview->Recordset && !$pharmacy_purchase_request_items_preview->Recordset->EOF) {

	// Init row class and style
	$pharmacy_purchase_request_items_preview->RecCount++;
	$pharmacy_purchase_request_items_preview->RowCount++;
	$pharmacy_purchase_request_items_preview->CssStyle = "";
	$pharmacy_purchase_request_items_preview->loadListRowValues($pharmacy_purchase_request_items_preview->Recordset);

	// Render row
	$pharmacy_purchase_request_items->RowType = ROWTYPE_PREVIEW; // Preview record
	$pharmacy_purchase_request_items_preview->resetAttributes();
	$pharmacy_purchase_request_items_preview->renderListRow();

	// Render list options
	$pharmacy_purchase_request_items_preview->renderListOptions();
?>
	<tr <?php echo $pharmacy_purchase_request_items->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchase_request_items_preview->ListOptions->render("body", "left", $pharmacy_purchase_request_items_preview->RowCount);
?>
<?php if ($pharmacy_purchase_request_items_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $pharmacy_purchase_request_items_preview->id->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items_preview->id->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $pharmacy_purchase_request_items_preview->PRC->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items_preview->PRC->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_preview->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td<?php echo $pharmacy_purchase_request_items_preview->PrName->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items_preview->PrName->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_preview->PrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td<?php echo $pharmacy_purchase_request_items_preview->Quantity->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items_preview->Quantity->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_preview->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $pharmacy_purchase_request_items_preview->HospID->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items_preview->HospID->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $pharmacy_purchase_request_items_preview->createdby->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items_preview->createdby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $pharmacy_purchase_request_items_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items_preview->createddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $pharmacy_purchase_request_items_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items_preview->modifiedby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $pharmacy_purchase_request_items_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items_preview->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td<?php echo $pharmacy_purchase_request_items_preview->BRCODE->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items_preview->BRCODE->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_preview->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_preview->prid->Visible) { // prid ?>
		<!-- prid -->
		<td<?php echo $pharmacy_purchase_request_items_preview->prid->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items_preview->prid->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_preview->prid->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchase_request_items_preview->ListOptions->render("body", "right", $pharmacy_purchase_request_items_preview->RowCount);
?>
	</tr>
<?php
	$pharmacy_purchase_request_items_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $pharmacy_purchase_request_items_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($pharmacy_purchase_request_items_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($pharmacy_purchase_request_items_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$pharmacy_purchase_request_items_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($pharmacy_purchase_request_items_preview->Recordset)
	$pharmacy_purchase_request_items_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$pharmacy_purchase_request_items_preview->terminate();
?>